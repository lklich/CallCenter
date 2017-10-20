<div class="container">
	<section id="content">
      <?= $this->Flash->render() ?>
      <?= $this->Form->create() ?>
			<h2><?= __('Resetowanie hasła operatora') ?></h2>
			<div>
        <?= $this->Form->control('password',['required'=>true,'label'=>__('Nowe hasło'),'type'=>'password','placeholder'=>__('Nowe hasło'),'id'=>'password']) ?>
			</div>
			<div>
         <?= $this->Html->link(__('Anuluj'), ['action' => 'index'],['class'=>'button']) ?>
          <?= $this->Form->button(__('Zmień')); ?>
        <?= $this->Form->end() ?>
			</div>
		</form><!-- form -->
		</section><!-- content -->
</div><!-- container -->
