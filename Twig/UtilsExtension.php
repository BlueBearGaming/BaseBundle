<?php

namespace BlueBear\BaseBundle\Twig;

use BlueBear\BaseBundle\Behavior\ContainerTrait;
use Symfony\Component\HttpFoundation\Request;
use Twig_Extension;
use Twig_SimpleFunction;

/**
 * UtilsExtension
 *
 * Twig utils functions
 */
class UtilsExtension extends Twig_Extension
{
    use ContainerTrait;

    /**
     * Return twig methods
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('isCurrentRoute', [$this, 'isCurrentRoute']),
            new Twig_SimpleFunction('getClassForRoute', [$this, 'getClassForRoute']),
            new Twig_SimpleFunction('createArrayKey', [$this, 'createArrayKey'])
        ];
    }

    /**
     * Return true if $route is the current route
     *
     * @param $route
     * @return bool
     */
    public function isCurrentRoute($route)
    {
        /** @var Request $request */
        $request = $this->getContainer()->get('request');

        return $route == $request->get('_route');
    }

    /**
     * Return $cssClass ("active" by default) if $route is current route
     *
     * @param $route
     * @param string $cssClass
     * @return string
     */
    public function getClassForRoute($route, $cssClass = 'active')
    {
        return ($this->isCurrentRoute($route)) ? $cssClass : '';
    }

    public function createArrayKey($key, $value = null, array $array = [])
    {
        $array[$key] = $value;

        return $array;
    }

    public function getName()
    {
        return 'bluebear_extension';
    }
}