<?php

namespace Application\Form;

use Zend\InputFilter\InputFilter;

class RecepyInputFilter extends InputFilter
{

    public function __construct()
    {

        $this->add([
            'name' => 'title',
            'required' => "true",
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim'],
            ]
        ]);

        /*$this->add([
            'name' => 'immagine',
            'required' => "false",
            'validators' => [
                new \Zend\Validator\File\Extension(array('jpg'))
            ]
        ]);*/

    }

}
