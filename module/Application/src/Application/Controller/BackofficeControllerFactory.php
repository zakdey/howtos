<?php
namespace Application\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BackofficeControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $recepyService = $serviceLocator->getServiceLocator()->get('Application\Service\RecepyService');
        $recepyForm = $serviceLocator->getServiceLocator()->get('Application\Form\RecepyForm');
        //$auth = $serviceLocator->getServiceLocator()->get('zfcuser_auth_service');

        return new BackofficeController($recepyService, $recepyForm);

    }


}
