<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Event\Event;

class UsersController extends AppController
{
   public function isAuthorized($user)
    {
      if (isset($user['role']) && ($user['role'] === 'admin')) {
          $allowedActions = ['view','passreset','add', 'edit', 'delete', 'index'];
          if(in_array($this->request->action, $allowedActions)) { return true; }}
          $this->Flash->success(__('Nie masz praw dostępu do tej funkcji.'));
      return false;
      return parent::isAuthorized($user);
    }

    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, ['contain' => ['Interviews']]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Nowy użytkownik został dodany poprawnie.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Błąd zapisu użytkownika. Popraw błędy i spróbuj ponownie.'));
        }
        $edycja = false;
        $this->set(compact('user','edycja'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Dane użytkownika zostały poprawnie zaktualizowane.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Błąd zapisu użytkownika. Popraw błędy i spróbuj ponownie.'));
        }
        $edycja = true;
        $this->set(compact('user','edycja'));
        $this->set('_serialize', ['user']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Użytkownik został usunięty.'));
        } else {
            $this->Flash->error(__('Błąd podczas usuwania użytkownika. Popraw błędy i spróbuj ponownie.'));
        }
        return $this->redirect(['action' => 'index']);
    }

           public function passreset($id = null)
           {
               $user = $this->Users->get($id, ['contain' => []]);
               if ($this->request->is(['patch', 'post', 'put'])) {
                   $user = $this->Users->patchEntity($user, $this->request->getData());
                   if ($user->config_id != $this->Auth->user('config_id')) {
                     throw new NotFoundException(__('Rekord o podanym identyfikatorze nie istnieje!'));
                     exit();
                    }
                   if ($this->Users->save($user)) {
                       $this->Flash->success(__('Nowe hasło operatora zostało zapisane poprawnie.'));
                       return $this->redirect(['action' => 'index']);
                   } else {
               $this->Flash->error(__('Błąd aktualizacji hasła użytkownika. Spróbuj ponownie.'));
                }
               }
               $pracowniks = $this->Users->find('list', ['limit' => 200]);
               $this->set(compact('user'));
               $this->set('_serialize', ['user']);
           }

    public function reset($passkey = null) {
            if ($passkey) {
                $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
                $user = $query->first();
                if ($user) {
                    if (!empty($this->request->data)) {
                        $this->request->data['passkey'] = null;
                        $this->request->data['timeout'] = null;
                        $user = $this->Users->patchEntity($user, $this->request->data);
                        if ($this->Users->save($user)) {
                            $this->Flash->set(__('Twoje hasło zostało zaktualizowane.'));
                            return $this->redirect(array('action' => 'login'));
                        } else {
                            $this->Flash->error(__('Hasło nie zostało popranie zmienione. Spróbuj ponownie.'));
                        }
                    }
                } else {
                    $this->Flash->error('Błęd podczas resetowania hasła. Sprawdź e-mail i spróbuj ponownie');
                    $this->redirect(['action' => 'password']);
                }
                unset($user->password);
                $this->set(compact('user'));
            } else {
                $this->redirect('/');
            }
        }

        public function login()
           {
             $this->set('title', 'Test-title');
               if ($this->request->is('post')) {
                   $user = $this->Auth->identify();
                   if ($user) {
                       $this->Auth->setUser($user);
                       return $this->redirect($this->Auth->redirectUrl());
                   }
                   $this->Flash->error(__('Błędna nazwa użytkownika lub hasło!'));
               }
           }

         public function password()
         {
             if ($this->request->is('post')) {
                 $query = $this->Users->findByEmail($this->request->data['email']);
                 $user = $query->first();
                 if (is_null($user)) {
                     $this->Flash->error('Podany adres E-mail nie istnieje w bazie danych.');
                 } else {
                     $passkey = uniqid();
                     $url = Router::Url(['controller' => 'users', 'action' => 'reset'], true) . '/' . $passkey;
                     $timeout = time() + DAY;
                      if ($this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['id' => $user->id])){
                         $this->sendResetEmail($url, $user);
                         $this->redirect(['action' => 'login']);
                     } else {
                         $this->Flash->error('Błąd zapisu klucza hasła.');
                     }
                 }
             }
         }

         private function sendResetEmail($url, $user) {
               $email = new Email();
               $email->template('resetpw');
               $email->emailFormat('both');
               $email->from('no-reply@alkor.edu.pl');
               $email->to($user->email, $user->full_name);
               $email->subject('Resetowanie hasła użytkownika');
               $email->viewVars(['url' => $url, 'username' => $user->username]);
               if ($email->send()) {
                   $this->Flash->success(__('Sprawdź pocztę E-mail i kliknij w wysłany link'));
               } else {
                   $this->Flash->error(__('Błąd wysyłania wiadomości: ') . $email->smtpError);
               }
           }

           public function logout()
              {
                  return $this->redirect($this->Auth->logout());
                  $this->Flash->error(__('Zostałeś poprawnie wylogowany z systemu.'));
              }
}
