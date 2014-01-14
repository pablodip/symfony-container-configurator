<?php

namespace Pablodip\Symfony\ContainerConfigurator\Infrastructure\TempFileCreator;

use Pablodip\Symfony\ContainerConfigurator\Domain\TempFileCreator\TempFileCreatorInterface;

class BasicTempFileCreator implements TempFileCreatorInterface
{
    public function create($content, $extension)
    {
        $file = sprintf('%s/%s-%s.%s', sys_get_temp_dir(), 'akamon-symfony-configurable-kernel', substr(sha1(microtime().mt_rand()), 0, 10), $extension);
        file_put_contents($file, $content);

        return $file;
    }
}
