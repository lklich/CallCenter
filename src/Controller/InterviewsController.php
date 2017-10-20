<?php
namespace App\Controller;
use App\Controller\AppController;

class InterviewsController extends AppController
{

  public function isAuthorized($user)
   {
     if (isset($user['role']) && ($user['role'] === 'admin')) {
       $allowedActions = ['nadzisuser','view','passreset','add', 'edit', 'delete', 'index'];
       if(in_array($this->request->action, $allowedActions)) { return true; }}

     if (isset($user['role']) && ($user['role'] === 'employer')) {
      $allowedActions = ['view','add', 'edit', 'delete', 'index'];
      if(in_array($this->request->action, $allowedActions)) { return true; }}
      $this->Flash->success(__('Nie masz praw dosępu do tej funkcji.'));
     return false;
     return parent::isAuthorized($user);
   }

  public function index()
  {
    if ($this->Auth->user('role') == 'admin') { return $this->redirect(['action' => 'nadzisuser']); }
    $conditions = ['AND'=>['Interviews.user_id'=>$this->Auth->user('id'),'ended'=>0, 'Interviews.nextcall >= '=>date('Y-m-d'), 'Interviews.nextcall <= '=>date('Y-m-d')]];
    $datado = date('Y-m-d');
    $dataod = date('Y-m-d');
    if ($this->request->is('post')) {
    $jakie = $this->request->data['jakie'];
      if($jakie=='wszystkie') { $conditions = ['AND'=>['Interviews.user_id'=>$this->Auth->user('id')]]; }
      if($jakie=='koniec') { $conditions = ['AND'=>['Interviews.user_id'=>$this->Auth->user('id'),'ended'=>1]]; }
      if($jakie=='dzis') { $conditions = ['AND'=>['Interviews.user_id'=>$this->Auth->user('id'),'ended'=>0, 'Interviews.nextcall >= '=>date('Y-m-d'), 'Interviews.nextcall <= '=>date('Y-m-d')]]; }

  //  $conditions = ['AND'=>['Interviews.nextcall >= '=>date('Y-m-d'), 'Interviews.nextcall <= '=>date('Y-m-d')]];

} else { $conditions = ['AND'=>['Interviews.user_id'=>$this->Auth->user('id'), 'Interviews.nextcall >= '=>date('Y-m-d'), 'Interviews.nextcall <= '=>date('Y-m-d')]]; }
    $interviews = $this->paginate($this->Interviews,['conditions'=>[$conditions],'contain'=>'Users','order' => ['Interviews.nextcall'=>'desc']]);
    $prac = $this->Interviews->Users->get($this->Auth->user('id'));
    $this->set(compact('interviews','prac','dataod','datado'));
    $this->set('_serialize', ['interviews']);
  }

    public function nadzisuser()
    {
      $conditions=null;
      $datado = date('Y-m-d');
      $dataod = date('Y-m-d');
      if ($this->request->is('post')) {
      $oddnia = $this->request->data['dataod'];
      $dodnia = $this->request->data['datado'];
      $kto = $this->request->data['kto'];
      if($kto=='%') {
      $conditions = ['AND'=>['Interviews.calldate >= '=>$oddnia, 'Interviews.calldate <= '=>$dodnia]];
    } else $conditions = ['AND'=>['Interviews.user_id LIKE'=>$kto], ['Interviews.calldate >= '=>$oddnia, 'Interviews.calldate <= '=>$dodnia]];
      }
      $interviews = $this->paginate($this->Interviews,['conditions'=>[$conditions],'contain'=>'Users','order' => ['Interviews.calldate'=>'desc']]);
      $prac = $this->Interviews->Users->find('list');
      $this->set(compact('interviews','prac','dataod','datado'));
      $this->set('_serialize', ['interviews']);
    }

    public function view($id = null)
    {
        $interview = $this->Interviews->get($id, ['contain' => ['Users']]);
        $this->set('interview', $interview);
        $this->set('_serialize', ['interview']);
    }

    public function add()
    {
      $prac = $this->Auth->user('id');
        $interview = $this->Interviews->newEntity();
        if ($this->request->is('post')) {
            $interview = $this->Interviews->patchEntity($interview, $this->request->getData());
            $interview->user_id = $prac;
            if ($this->Interviews->save($interview)) {
                $this->Flash->success(__('Rozmowa została zapisana poprawnie. Pojawi się na liście w dniu ' . $oddnia = $this->request->data['nextcall']));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Błąd podczas zapisu. Popraw błędy i spróbuj ponownie.'));
        }
        $users = $this->Interviews->Users->find('list', ['limit' => 200]);
        $this->set(compact('interview', 'users','prac'));
        $this->set('_serialize', ['interview']);
    }

    public function edit($id = null)
    {
        $interview = $this->Interviews->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $interview = $this->Interviews->patchEntity($interview, $this->request->getData());
            if ($this->Interviews->save($interview)) {
              $this->Flash->success(__('Rozmowa została zapisana poprawnie. Pojawi się na liście w dniu ' . $oddnia = $this->request->data['nextcall']));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Błąd podczas zapisu. Popraw błędy i spróbuj ponownie.'));
        }
        $users = $this->Interviews->Users->find('list', ['limit' => 200]);
        $this->set(compact('interview', 'users'));
        $this->set('_serialize', ['interview']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $interview = $this->Interviews->get($id);
        if ($this->Interviews->delete($interview)) {
            $this->Flash->success(__('Wpis został usunięty.'));
        } else {
            $this->Flash->error(__('Błąd podczas usuwania wpisu.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
