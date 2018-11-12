<?php

namespace FondOfSpryker\Yves\FileGetContent\Plugin\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yves\FileGetContent\FileGetContentFactory getFactory()
 */
class FileGetContentServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{
    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $twigExtension = $this
            ->getFactory()
            ->createFileGetContentTwigExtension();

        $app['twig'] = $app->share(
            $app->extend(
                'twig',
                function (\Twig_Environment $twig) use ($twigExtension) {
                    $twig->addExtension($twigExtension);

                    return $twig;
                }
            )
        );
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }
}
