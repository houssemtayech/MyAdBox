SfContainerInjector
===================

Use this package as a replacement-proxy for getting a service
from the Symfony DI container.

This should only be done when injecting the service directly would result
in a circular reference.

Installation
------------

SfContainerInjector uses Composer to manage its dependencies.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

Then add the following to your `composer.json` file:

```js
// composer.json
{
    // ...
    require: {
        // ...
        "rollerworks/sf-container-injector": "~1.0"
    }
}
```

Then, you can install the new dependencies by running Composer's ``update``
command from the directory where your ``composer.json`` file is located:

```bash
$ php composer.phar update rollerworks/sf-container-injector
```

Usage
-----

Use the `Rollerworks\Component\SfContainerInjector\ContainerInjector` class were you would normally inject
the container directly (remember you need to change the typehint to use the `ContainerInjector`).

Getting a service can be done by calling `get('service.id')` on the `ContainerInjector` object.

Setting services is not supported.
