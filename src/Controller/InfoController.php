<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

class InfoController extends AppController
{

  public function beforeFilter(Event $event){
    $this->Auth->allow(['index']);
  }

public function isAuthorized($user)
{
  if (in_array($this->request->getParam('action'), ['index'])) {
    return true; } else { return false;  }
    return parent::isAuthorized($user);
}

    public function index()
    {
      $lang = $this->getLang();
      $this->set('lang', $lang);
    }

}
