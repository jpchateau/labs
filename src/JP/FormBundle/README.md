TmsFormGeneratorBundle
======================

Symfony2 bundle used to generate a Form from an array

Installation
------------

The installation is a quick 3 steps process!

### Step 1: Composer

First, add these dependencies in your `composer.json` file:

```json
"repositories": [
    ...,
    {
        "type": "vcs",
        "url": "https://github.com/Tessi-Tms/TmsFormGeneratorBundle.git"
    }
],
"require": {
        ...,
        "tms/form-generator-bundle": "dev-master"
    },
```

Then, retrieve the bundles with the command:

```sh
composer update      # WIN
composer.phar update # LINUX
```

### Step 3: Kernel

Enable the bundles in your application kernel:

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Tms\Bundle\FormGeneratorBundle\TmsFormGeneratorBundle(),
    );
}
```

### Step 4: Configuration

If you wish to generate form fields, import the bundle configuration in your `app/config.yml`

```yml
imports:
    ...
    - { resource: @TmsFormGeneratorBundle/Resources/config/config.yml }
```

and add this in your `app/routing.yml`

```yml
...
tms_form_generator:
    resource: "@TmsFormGeneratorBundle/Controller"
    type: annotation
```

Now you can use the `form_field` and `form_fields` form type in your form builder.