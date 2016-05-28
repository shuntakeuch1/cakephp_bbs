<?php

class User extends AppModel
{
    public $validate = array(
        'name' => array(
            'rule' => 'notBlank'
        ),
        'email' => array(
            'rule' => array('notBlank','email')
        ),
    );
}