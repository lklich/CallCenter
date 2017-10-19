<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity
{
    protected $_accessible = [
        'username' => true,
        'password' => true,
        'name' => true,
        'surname' => true,
        'phone' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'active' => true,
        'interviews' => true,
        'role'=>true
    ];

    protected $_hidden = ['password'];

    protected function _getFullName()
      {
        return $this->_properties['name'] . '  ' . $this->_properties['surname'];
      }

      protected function _setPassword($value) {
          return (new DefaultPasswordHasher)->hash($value);
      }

}
