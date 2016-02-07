# Installation

## Requirements
```json
    "require": {
        "php": ">=5.5",
        "symfony/framework-bundle": "~2.6",
        "lzakrzewski/symfony-form-generator": "0.0.*"
    },
```

## Require with composer
```bash
composer require lzakrzewski/symfony-form-generator-bundle
```

## Enable the SymfonyFormGeneratorBundle
```php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new \Lzakrzewski\SymfonyFormGeneratorBundle\SymfonyFormGeneratorBundle(),
        // ...
    );
}
```