<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edycja użytkownika systemu') ?></legend>
        <?= $this->Element('form_user') ?>
    </fieldset>
    <?= $this->Html->link(__('Anuluj'), ['action' => 'index'],['class'=>'button button-warning']) ?>
    <?= $this->Html->link(__('Reset hasła'), ['action' => 'passreset',$user->id],['class'=>'button button-info']) ?>
    <?= $this->Form->button(__('Zapisz')) ?>
    <?= $this->Form->end() ?>
</div>
