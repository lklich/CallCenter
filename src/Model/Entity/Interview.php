<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Interview extends Entity
{
    protected $_accessible = [
        'user_id' => true,
        'calldate' => true,
        'calltime' => true,
        'company' => true,
        'person' => true,
        'address' => true,
        'phone' => true,
        'email' => true,
        'nextcall' => true,
        'nexttime' => true,
        'description' => true,
        'user' => true,
        'ended' => true
    ];
}
