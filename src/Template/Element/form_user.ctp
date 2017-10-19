<?php
    echo $this->Form->control('username',['required'=>true,'label'=>__('Nazwa logowania')]);
    echo $this->Form->control('role', ['required'=>true,'label'=>__('Rola'),'options' => ['admin' => __('Administrator'), 'employer' => __('Pracownik')]]);
    echo $this->Form->control('name',['required'=>true,'label'=>__('Imię')]);
    echo $this->Form->control('surname',['required'=>true,'label'=>__('Nazwisko')]);
if ($edycja == false) { echo $this->Form->control('password',['label'=>__('Hasło')]); }
    echo $this->Form->control('phone',['label'=>__('Numer telefonu')]);
    echo $this->Form->control('email',['label'=>__('Adres E-mail')]);
    echo $this->Form->control('active',['label'=>__('Aktywny - może się zalogować'),'default'=>1]);
?>
