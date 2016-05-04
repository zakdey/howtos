<?php

namespace Application\Form;

use Zend\Form\Form;

class RecepyForm extends Form
{
    public function __construct()
    {
        parent::__construct('recepy');
        $this->setAttribute('method', 'post');


        $this->add([
            'name'       => 'title',
            'type'       => 'Zend\Form\Element\Text',
            'options' => array(
                 'label' => 'Titolo',
                 'label_attributes' => array(
                     'class' => 'control-label',
                 ),
            ),
            'attributes' => [
                'id'       => 'title',
                'class'    => 'form-control'
            ]
        ]);

        $this->add([
            'name'       => 'content',
            'type'       => 'Zend\Form\Element\Textarea',
            'options' => array(
                 'label' => 'Istruzioni',
                 'label_attributes' => array(
                     'class' => 'control-label',
                 ),
            ),
            'attributes' => [
                'id'       => 'content',
                'class'    => 'form-control'
            ]
        ]);


/*

        $this->add([
            'name'       => 'categoria',
            'type'       => 'Zend\Form\Element\Select',
            'options' => array(
                 'label' => 'Categoria',
                 'label_attributes' => array(
                     'class' => 'control-label',
                 ),
                 'value_options' => $listaCategorie,
            ),
            'attributes' => [
                'id'       => 'categoria',
                'class'    => 'form-control'
            ]
        ]);

        $this->add([
            'name'       => 'immagine',
            'type'       => 'Zend\Form\Element\File',
            'options' => array(
                 'label' => 'Immagine',
                 'label_attributes' => array(
                     'class' => 'control-label',
                 ),
            ),
            'attributes' => [
                'id'       => 'immagine',
                'class'    => 'form-control'
            ]
        ]);*/

    }

}
