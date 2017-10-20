<div id="login">
<?= $this->Flash->render() ?>
<?php $this->assign('title', __('Resetowanie hasła')); ?><div class="users content">
	<h3><center><?php echo __('Odzyskiwanie hasła'); ?></center></h3>
	<?php
    	echo $this->Form->create();
        echo $this->Form->input('email', ['autofocus' => true, 'label' => 'E-mail: ', 'required' => true]);
		echo '<br>';
		echo $this->Form->button(__('Resetuj hasło'));
    	echo $this->Form->end();
	?>
</div>
</div>
