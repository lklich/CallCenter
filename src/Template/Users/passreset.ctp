<div class="container">
	<section id="content">
      <?= $this->Flash->render() ?>
      <?= $this->Form->create() ?>
			<h2>Resetowanie hasła operatora</h2>
			<div>
        <?= $this->Form->control('password',['label'=>'Nowe hasło','type'=>'password','placeholder'=>'Nowe hasło','id'=>'password']) ?>
			</div>
			<div>
         <?= $this->Html->link(__('Anuluj'), ['action' => 'index'],['class'=>'button']) ?>
          <?= $this->Form->button(__('Zmień')); ?>
        <?= $this->Form->end() ?>
			</div>
		</form><!-- form -->
		</section><!-- content -->
</div><!-- container -->
