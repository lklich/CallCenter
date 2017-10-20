<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('users');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Interviews', ['foreignKey' => 'user_id']);
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
  {
   $query->select(['id','username','password','email','role','name','surname','phone'])->andWhere(['Users.active' => 1]);
    return $query;
  }


    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('username')
            ->requirePresence('username', 'create')
            ->notEmpty('username',__('Należy podać nazwę użytkownika'));

        $validator
            ->notEmpty('role', 'Należy wybrać rolę')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'employer']],
                'message' => 'Proszę wybrać poprawną rolę użytkownika']);

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password',__('Należy podać hasło użytkownika'));

        $validator
            ->scalar('name')
            ->notEmpty('name',__('Należy podać imię pracownika'));

        $validator
            ->scalar('surname')
            ->notEmpty('surname',__('Należy podać nazwisko użytkownika'));

        $validator
            ->scalar('phone')
            ->allowEmpty('phone');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
