<?php

namespace FondOfSpryker\Yves\FileGetContent\Twig;

use Exception;
use Spryker\Shared\Twig\TwigExtension;
use Twig_Environment;
use Twig_SimpleFunction;

class FileGetContentTwigExtension extends TwigExtension
{
    public const FILE_GET_CONTENT = 'fileGetContent';

    /**
     * @return array
     */
    public function getFunctions(): array
    {
        return [
            $this->createFileGetContentFunction(),
        ];
    }

    /**
     * @return \Twig_SimpleFunction
     */
    protected function createFileGetContentFunction()
    {
        return new Twig_SimpleFunction(
            static::FILE_GET_CONTENT,
            [$this, 'renderFileGetContent'],
            [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]
        );
    }

    /**
     * @param string $url
     *
     * @return string|null
     */
    protected function checkValidURL(string $url): ?string
    {
        if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
            return $url;
        } else {
            $url = 'https:' . $url;
        }

        if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
            return $url;
        }

        return null;
    }

    /**
     * @param array $params
     *
     * @return string
     */
    public function renderFileGetContent(Twig_Environment $twig, $fileURL): string
    {
        $fileURL = $this->checkValidURL($fileURL);

        try {
            $response = @file_get_contents($fileURL);
        } catch (Exception $exception) {
            $response = false;
        }

        $response = ($response !== false) ? $response : '';

        return $response;
    }
}
