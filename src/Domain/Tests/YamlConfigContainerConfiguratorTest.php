<?php

namespace Pablodip\Symfony\ContainerConfigurator\Domain\Tests;

use Pablodip\Symfony\ContainerConfigurator\Domain\YamlConfigContainerConfigurator;

class YamlConfigContainerConfiguratorTest extends \PHPUnit_Framework_TestCase
{
    public function testIt()
    {
        $file = 'foo';
        $fileCreator = \Mockery::mock('Pablodip\Symfony\ContainerConfigurator\Domain\TempFileCreator\TempFileCreatorInterface');

        $config = 'bar';
        $configurator = new YamlConfigContainerConfigurator($fileCreator, $config);

        $loader = \Mockery::mock('Symfony\Component\Config\Loader\LoaderInterface');

        $fileCreator->shouldReceive('create')->with($config, 'yml')->once()->andReturn($file)->ordered();
        $loader->shouldReceive('load')->with($file)->once()->ordered();

        $configurator($loader);
    }
}
