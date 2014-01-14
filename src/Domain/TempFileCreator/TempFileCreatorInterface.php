<?php

namespace Pablodip\Symfony\ContainerConfigurator\Domain\TempFileCreator;

interface TempFileCreatorInterface
{
    function create($content, $extension);
}
