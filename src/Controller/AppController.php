<?php
namespace App\Controller;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;

class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');
        $this->loadComponent('Auth', [
         'authorize' => ['Controller'],
         'loginRedirect' => ['controller' => 'Interviews', 'action' => 'index'],
         'authError' => __('Brak dostępu!'),
         'flash' => ['element' => 'error'],
         'loginAction' => ['controller'=>'Users','action'=>'login'],
         'logoutRedirect' => ['controller' => 'Users','action' => 'login'],
         'authenticate' => ['Form' => ['userModel' => 'Users', 'finder' => 'auth' ]]]);
    }

    public function beforeFilter(Event $event){
      $this->Auth->allow(['login','password','reset','logout','changeLang']);
      $lang = $this->Cookie->read('lang');
       if (empty($lang)) { return; }
          I18n::setLocale($lang);
        $this->set('lang', $lang);
    }

    public function changeLang($lang = 'pl_PL')
    {
        $this->Cookie->write('lang', $lang);
        return $this->redirect($this->request->referer());
    }

    public function getLang($lang = 'pl_PL')
    {
        $lang = $this->Cookie->read('lang');
         if (empty($lang)) { return 'pl_PL'; } else return $lang;
    }


    public function isAuthorized($user)
      {
       if (isset($user['role']) && $user['role'] === 'admin') { return true; }
       return false;
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
