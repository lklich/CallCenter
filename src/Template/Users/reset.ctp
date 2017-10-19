<?php $this->assign('title', 'Resetowanie hasła'); ?>
<div id="login">
    <?= $this->Flash->render() ?>
    <?php echo $this->Form->create($user) ?>
    <span class="fontawesome-lock"></span>
    <?= $this->Form->control('password', ['autofocus' => true, 'label'=>false, 'required'=>true, 'placeholder'=>'Nowe hasło']) ?>
    <span class="fontawesome-lock"></span>
    <?= $this->Form->control('confirm_password',['label'=>false, 'required'=>true, 'type'=>'password','placeholder'=>'Potwierdź hasło']) ?>
    <?= $this->Form->submit('Zaloguj', array('class' => 'button','style'=>'width: 290px; height: 50px;')) ?>
    <?= $this->Form->end() ?>
</div>
