# BaseBundle
BaseBundle for Symfony2 projects. This bundle contains some shortcuts and code snippets to ease Symfony2 projects developpment.

# Installation
```
php composer.phar require white-october/pagerfanta-bundle
```

# Getting started
BaseBundle offers some features to help you :

## ControllerTrait
```php
<?php
...
use BlueBear\BaseBundle\Behavior\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MyController extends Controller {
    use ControllerTrait;
    
    ...
```
Your controller should have following methods :
```php
public function createNotFoundException($message = 'Not Found', Exception $previous = null)
public function generateUrl($route, $parameters = array(), $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH) 
```

ControllerTrait has following methods :
* _forward404Unless($boolean, $message = '404 Not Found')_ : Forward current request to a 404 page if $boolean is false
* _redirect($url, $status = 302)_ : Redirect to an url or a route (for route use "@my_route")


