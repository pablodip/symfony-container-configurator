<?php

namespace Pablodip\Symfony\ContainerConfigurator\Infrastructure\Tests\TempFileCreator;

use Pablodip\Symfony\ContainerConfigurator\Infrastructure\TempFileCreator\BasicTempFileCreator;

class BasicTempFileCreatorTest extends \PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $creator = new BasicTempFileCreator();

        $content = 'foo';
        $extension = 'xml';
        $file = $creator->create($content, $extension);

        $this->assertInternalType('string', $file);
        $this->assertSame($extension, pathinfo($file, PATHINFO_EXTENSION));
        $this->assertSame(file_get_contents($file), $content);
    }
}
