<?php

/*
 * This file is part of the RollerworksMultiUserBundle package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rollerworks\Component\SfContainerInjector;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * ContainerInjector.
 *
 * Use this class a replacement-proxy for getting a service from the DI container.
 * This should only be done when injecting the service directly would result
 * in a circular reference.
 *
 * @author Sebastiaan Stok <s.stok@rollerscapes.net>
 */
class ContainerInjector
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function get($service)
    {
        return $this->container->get($service);
    }
}
