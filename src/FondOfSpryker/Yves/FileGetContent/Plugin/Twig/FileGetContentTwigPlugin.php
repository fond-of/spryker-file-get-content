<?php

namespace FondOfSpryker\Yves\FileGetContent\Plugin\Twig;

use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\TwigExtension\Dependency\Plugin\TwigPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig\Environment;
use Twig\TwigFunction;

/**
 * @method \FondOfSpryker\Yves\FileGetContent\FileGetContentFactory getFactory()
 */
class FileGetContentTwigPlugin extends AbstractPlugin implements TwigPluginInterface
{
    protected const TWIG_FUNCTION_FILE_GET_CONTENT = 'fileGetContent';

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Twig\Environment $twig
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return \Twig\Environment
     */
    public function extend(Environment $twig, ContainerInterface $container): Environment
    {
        $twig = $this->addTwigFunctions($twig);

        return $twig;
    }

    /**
     * @param \Twig\Environment $twig
     *
     * @return \Twig\Environment
     */
    protected function addTwigFunctions(Environment $twig): Environment
    {
        $twig->addFunction($this->createFileGetContent($twig));

        return $twig;
    }

    /**
     * @param \Twig\Environment $twig
     *
     * @return \Twig\TwigFunction
     */
    protected function createFileGetContent(Environment $twig): TwigFunction
    {
        return new TwigFunction(
            static::TWIG_FUNCTION_FILE_GET_CONTENT,
            function (Environment $twig, string $url) {
                return $this
                    ->getFactory()
                    ->createFileGetContentTwigExtension()->renderFileGetContent($twig, $url);
            },
            [
                'needs_environment' => true,
                'is_safe' => ['html'],
            ]
        );
    }
}
