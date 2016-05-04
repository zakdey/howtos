<?php
namespace Application\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $recepyService = $serviceLocator->getServiceLocator()->get('Application\Service\RecepyService');

        return new IndexController($recepyService);

    }


}
