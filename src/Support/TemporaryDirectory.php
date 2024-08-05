<?php

namespace Spatie\MediaLibrary\Support;

use Illuminate\Support\Str;
use Spatie\TemporaryDirectory\TemporaryDirectory as BaseTemporaryDirectory;

class TemporaryDirectory
{
    public static function create(?string $prefix = null): BaseTemporaryDirectory
    {
        return new BaseTemporaryDirectory(static::getTemporaryDirectoryPath($prefix));
    }

    protected static function getTemporaryDirectoryPath(?string $prefix = null): string
    {
        $path = config('media-library.temporary_directory_path') ?? storage_path('media-library/temp');

        return $path.DIRECTORY_SEPARATOR.$prefix.Str::random(32);
    }
}
