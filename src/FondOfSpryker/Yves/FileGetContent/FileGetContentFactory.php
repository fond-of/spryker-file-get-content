<?php

namespace FondOfSpryker\Yves\FileGetContent;

use FondOfSpryker\Yves\FileGetContent\Twig\FileGetContentTwigExtension;
use Spryker\Yves\Kernel\AbstractFactory;

class FileGetContentFactory extends AbstractFactory
{
    public function createFileGetContentTwigExtension(): FileGetContentTwigExtension
    {
        return new FileGetContentTwigExtension();
    }
}
