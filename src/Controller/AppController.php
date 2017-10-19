<?php
namespace App\Controller;
use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
         'authorize' => ['Controller'],
         'loginRedirect' => ['controller' => 'Interviews', 'action' => 'index'],
         'authError' => 'Brak dostępu!',
         'flash' => ['element' => 'error'],
         'loginAction' => ['controller'=>'Users','action'=>'login'],
         'logoutRedirect' => ['controller' => 'Users','action' => 'login'],
         'authenticate' => ['Form' => ['userModel' => 'Users', 'finder' => 'auth' ]]]);
    }

    public function beforeFilter(Event $event){
      $this->Auth->allow(['login','password','reset','logout']);
    }

    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
