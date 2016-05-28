<?php

class PostsController extends AppController
{

  public $uses = array('User');

  public $components = array(
             'Session',
             'Auth' => array(
                  'authenticate' => array(
                       'Form' =>  array(
                            'fields' =>
                              array('username' => 'name','password' => 'email')
                        )
                   ),
                   'loginRedirect' => array('action' => 'postlist'),
                   'logoutRedirect' => array('action' => 'index'),
                   'loginAction' => array('action' => 'index')
              )
         );

  public function beforeFilter ()
  {
      $this->Auth->allow('index');
  }


  public function index ()
  {
      if ($this->request->is('post'))
      {
          if ($this->Auth->login())
          {
              return $this->redirect($this->Auth->redirect());
          }
           else
          {
              $this->Session->setFlash('ユーザーネームかメールアドレスが間違っています', 'default', array(), 'auth');
          }
      }
  }

  public function postlist()
  {

  }

}
