<?php

namespace Application\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RecepyFormFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return DriverLicenseForm
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $prodottiService = $serviceLocator->get('Application\Service\RecepyService');
        //$listaCategorie = $prodottiService->getArrayCategorie();

        $inputFilter = new RecepyInputFilter();
        $form = new RecepyForm(/*$listaCategorie*/);

        $form->setInputFilter($inputFilter);

        return $form;
    }
}
