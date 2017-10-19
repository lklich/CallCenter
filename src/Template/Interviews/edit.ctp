<div class="interviews form large-9 medium-8 columns content">
    <?= $this->Form->create($interview) ?>
    <fieldset>
        <legend><?= __('Edycja rozmowy z klientem') ?></legend>
        <?= $this->Element('form_interview') ?>
    </fieldset>
    <?= $this->Html->link(__('Anuluj'), ['action' => 'index'],['class'=>'button button-warning']) ?>
    <?= $this->Form->button(__('Zapisz')) ?>
    <?= $this->Form->end() ?>
</div>
