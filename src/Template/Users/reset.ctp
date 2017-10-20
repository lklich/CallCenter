<?php $this->assign('title', __('Resetowanie hasła')); ?>
<div id="login">
    <?= $this->Flash->render() ?>
    <?php echo $this->Form->create($user) ?>
    <span class="fontawesome-lock"></span>
    <?= $this->Form->control('password', ['autofocus' => true, 'label'=>false, 'required'=>true, 'placeholder'=>__('Nowe hasło')]) ?>
    <span class="fontawesome-lock"></span>
    <?= $this->Form->control('confirm_password',['label'=>false, 'required'=>true, 'type'=>'password','placeholder'=>__('Potwierdź hasło')]) ?>
    <?= $this->Form->submit(__('Zaloguj'), array('class' => 'button','style'=>'width: 290px; height: 50px;')) ?>
    <?= $this->Form->end() ?>
</div>
