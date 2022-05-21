<?php

declare(strict_types=1);

namespace dacoto\SetEnv\Contracts;

interface SetEnvReader
{
    /**
     * Load .env file
     *
     * @param  string  $filePath
     */
    public function load($filePath);

    /**
     * Get content of .env file
     */
    public function content();

    /**
     * Get all lines informations from content of .env file
     */
    public function lines();

    /**
     * Get all key informations in .env file
     */
    public function keys();
}
