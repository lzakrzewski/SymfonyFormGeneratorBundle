# Installation

## Requirements
```json
    "require": {
        "php": ">=5.5",
        "symfony/framework-bundle": "~2.6",
        "lucaszz/symfony-form-generator": "0.0.*"
    },
```

## Require with composer
```bash
composer require lucaszz/symfony-form-generator-bundle
```

## Enable the SymfonyFormGeneratorBundle
```php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new \Lucaszz\SymfonyFormGeneratorBundle\SymfonyFormGeneratorBundle(),
        // ...
    );
}
```