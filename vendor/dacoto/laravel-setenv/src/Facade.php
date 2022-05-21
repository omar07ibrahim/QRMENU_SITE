<?php

declare(strict_types=1);

namespace dacoto\SetEnv;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'setenv';
    }
}
