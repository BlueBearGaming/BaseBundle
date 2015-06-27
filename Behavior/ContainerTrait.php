<?php

namespace BlueBear\BaseBundle\Behavior;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * ContainerTrait
 *
 * Capacity to have a ContainerInterface
 */
trait ContainerTrait
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Gets a service
     *
     * @param string $serviceId
     * @param int $invalidBehavior
     * @return object
     */
    public function get($serviceId, $invalidBehavior = ContainerInterface::EXCEPTION_ON_INVALID_REFERENCE)
    {
        return $this->container->get($serviceId, $invalidBehavior);
    }
}
