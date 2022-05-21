<?php

declare(strict_types=1);

namespace dacoto\SetEnv;

use dacoto\SetEnv\Exceptions\KeyNotFoundException;
use dacoto\SetEnv\Workers\SetEnvFormatter;
use dacoto\SetEnv\Workers\SetEnvReader;
use dacoto\SetEnv\Workers\SetEnvWriter;
use Illuminate\Contracts\Container\Container;

class SetEnv
{
    private $app;
    private $formatter;
    private $reader;
    private $writer;
    private $filePath;

    /**
     * SetEnv constructor.
     * @param  Container  $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->formatter = new SetEnvFormatter();
        $this->reader = new SetEnvReader($this->formatter);
        $this->writer = new SetEnvWriter($this->formatter);
        $this->load();
    }

    public function load($filePath = null, $restoreIfNotFound = false, $restorePath = null)
    {
        $this->resetContent();

        if (!is_null($filePath)) {
            $this->filePath = $filePath;
        } elseif (method_exists($this->app, 'environmentPath') && method_exists($this->app, 'environmentFile')) {
            $this->filePath = $this->app->environmentPath().'/'.$this->app->environmentFile();
        } else {
            $this->filePath = __DIR__.'/../../../../../../.env';
        }

        $this->reader->load($this->filePath);

        if (file_exists($this->filePath)) {
            $this->writer->setBuffer($this->getContent());

            return $this;
        }
        return $this;
    }

    protected function resetContent()
    {
        $this->filePath = null;
        $this->reader->load(null);
        $this->writer->setBuffer(null);
    }

    public function getContent()
    {
        return $this->reader->content();
    }

    public function getLines()
    {
        return $this->reader->lines();
    }

    public function getValue($key)
    {
        $allKeys = $this->getKeys([$key]);

        if (array_key_exists($key, $allKeys)) {
            return $allKeys[$key]['value'];
        }

        throw new KeyNotFoundException('Requested key not found in your file.');
    }

    public function getKeys($keys = [])
    {
        $allKeys = $this->reader->keys();

        return array_filter($allKeys, function ($key) use ($keys) {
            if (!empty($keys)) {
                return in_array($key, $keys, true);
            }

            return true;
        }, ARRAY_FILTER_USE_KEY);
    }

    public function getBuffer()
    {
        return $this->writer->getBuffer();
    }

    public function addEmpty()
    {
        $this->writer->appendEmptyLine();
        return $this;
    }

    public function addComment($comment)
    {
        $this->writer->appendCommentLine($comment);
        return $this;
    }

    public function setKey($key, $value = null, $comment = null, $export = false)
    {
        $data = [compact('key', 'value', 'comment', 'export')];
        return $this->setKeys($data);
    }

    public function setKeys($data)
    {
        foreach ($data as $i => $setter) {
            if (!is_array($setter)) {
                if (!is_string($i)) {
                    continue;
                }
                $setter = [
                    'key' => $i,
                    'value' => $setter,
                ];
            }
            if (array_key_exists('key', $setter)) {
                $key = $this->formatter->formatKey($setter['key']);
                $value = $setter['value'] ?? null;
                $comment = $setter['comment'] ?? null;
                $export = array_key_exists('export', $setter) ? $setter['export'] : false;

                if (!is_file($this->filePath) || !$this->keyExists($key)) {
                    $this->writer->appendSetter($key, $value, $comment, $export);
                } else {
                    $oldInfo = $this->getKeys([$key]);
                    $comment = is_null($comment) ? $oldInfo[$key]['comment'] : $comment;

                    $this->writer->updateSetter($key, $value, $comment, $export);
                }
            }
        }
        return $this;
    }

    public function keyExists($key)
    {
        $allKeys = $this->getKeys();

        return array_key_exists($key, $allKeys);
    }

    public function deleteKey($key)
    {
        $keys = [$key];
        return $this->deleteKeys($keys);
    }

    public function deleteKeys($keys = [])
    {
        foreach ($keys as $key) {
            $this->writer->deleteSetter($key);
        }
        return $this;
    }

    public function save()
    {
        $this->writer->save($this->filePath);
        return $this;
    }
}
