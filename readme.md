# fond-of-spryker/google-custom-search
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/fond-of-spryker/google-custom-search)

Simple wrapper for using PHP file_get_contents() in twig. As example needed for inline SVG graphics

## Install

```
composer require fond-of-spryker/discount-widget
```

## Configuration

Register the new provider in your YvesBootstrap

```
$this->application->register(new FileGetContentServiceProvider());
```

Using the new fileGetContent function inside TWIG:

```
{{ fileGetContent(fileUrl) }}
```