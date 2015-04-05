<?php
namespace Application\Form;

use Zend\Form\Form;

class Login extends Form
{
    public function __construct()
    {
        parent::__construct('login');
        $this->setAttribute('class', 'well form-vertical');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '/application/index/login');

        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' => 'Usuario'
            ),
            'options' => array(
                'label' => 'Usuario',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type'  => 'password',
                'placeholder' => 'Senha'
            ),
            'options' => array(
                'label' => 'Senha',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Entrar',
                'id' => 'submitbutton',
                'class' => 'btn'
            ),
        ));
    }
}