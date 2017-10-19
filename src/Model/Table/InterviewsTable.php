<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class InterviewsTable extends Table
{

  public function isAuthorized($user)
   {
     if (isset($user['role']) && ($user['role'] === 'admin')) {
         $allowedActions = ['passreset','add', 'edit', 'delete', 'index'];
         if(in_array($this->request->action, $allowedActions)) {
           return true;
//           if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
//                      return true;
//                  }

         }}
     return false;
     return parent::isAuthorized($user);
   }


    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('interviews');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    public function isOwnedBy($interviewId, $userId)
    {
        return $this->exists(['user_id' => $articleId, 'user_id' => $userId]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('calldate')
            ->requirePresence('calldate', 'create')
            ->notEmpty('calldate');

        $validator
            ->scalar('calltime')
            ->requirePresence('calltime', 'create')
            ->notEmpty('calltime');

        $validator
            ->scalar('company')
            ->allowEmpty('company');

        $validator
            ->scalar('person')
            ->allowEmpty('person');

        $validator
            ->scalar('address')
            ->allowEmpty('address');

        $validator
            ->scalar('phone')
            ->allowEmpty('phone');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->date('nextcall')
            ->allowEmpty('nextcall');

            $validator
                ->time('nexttime')
                ->allowEmpty('nexttime');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        //$rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
