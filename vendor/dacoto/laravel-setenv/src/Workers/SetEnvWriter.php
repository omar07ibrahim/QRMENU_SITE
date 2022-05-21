<?php

declare(strict_types=1);

namespace dacoto\SetEnv\Workers;

use dacoto\SetEnv\Contracts\SetEnvFormatter as SetEnvFormatterContract;
use dacoto\SetEnv\Exceptions\UnableWriteToFileException;

class SetEnvWriter implements \dacoto\SetEnv\Contracts\SetEnvWriter
{
    protected $buffer;
    protected $formatter;

    public function __construct(SetEnvFormatterContract $formatter)
    {
        $this->formatter = $formatter;
    }

    public function getBuffer()
    {
        return $this->buffer;
    }

    public function setBuffer($content)
    {
        if (!empty($content)) {
            $content = rtrim((string) $content).PHP_EOL;
        }
        $this->buffer = $content;
        return $this;
    }

    public function appendEmptyLine()
    {
        return $this->appendLine();
    }

    protected function appendLine($text = null)
    {
        $this->buffer .= $text.PHP_EOL;
        return $this;
    }

    public function appendCommentLine($comment)
    {
        return $this->appendLine('# '.$comment);
    }

    public function appendSetter($key, $value = null, $comment = null, $export = false)
    {
        $line = $this->formatter->formatSetterLine($key, $value, $comment, $export);

        return $this->appendLine($line);
    }

    public function updateSetter($key, $value = null, $comment = null, $export = false)
    {
        $pattern = "/^(export\h)?\h*{$key}=.*/m";
        $line = $this->formatter->formatSetterLine($key, $value, $comment, $export);
        $this->buffer = preg_replace_callback($pattern, function () use ($line) {
            return $line;
        }, $this->buffer);

        return $this;
    }

    public function deleteSetter($key)
    {
        $pattern = "/^(export\h)?\h*{$key}=.*\n/m";
        $this->buffer = preg_replace($pattern, null, $this->buffer);

        return $this;
    }

    public function save($filePath)
    {
        $this->ensureFileIsWritable($filePath);
        file_put_contents($filePath, $this->buffer);
        return $this;
    }

    protected function ensureFileIsWritable($filePath)
    {
        if ((is_file($filePath) && !is_writable($filePath)) || (!is_file($filePath) && !is_writable(dirname($filePath)))) {
            throw new UnableWriteToFileException(sprintf('Unable to write to the file at %s.', $filePath));
        }
    }
}
