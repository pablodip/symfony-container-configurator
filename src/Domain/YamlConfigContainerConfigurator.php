<?php

namespace Pablodip\Symfony\ContainerConfigurator\Domain;

use Pablodip\Symfony\ContainerConfigurator\Domain\TempFileCreator\TempFileCreatorInterface;
use Symfony\Component\Config\Loader\LoaderInterface;

class YamlConfigContainerConfigurator
{
    private $tempFileCreator;
    private $config;

    public function __construct(TempFileCreatorInterface $tempFileCreator, $config)
    {
        $this->tempFileCreator = $tempFileCreator;
        $this->config = $config;
    }

    public function __invoke(LoaderInterface $loader)
    {
        $file = $this->tempFileCreator->create($this->config, 'yml');
        $loader->load($file);
    }
}
