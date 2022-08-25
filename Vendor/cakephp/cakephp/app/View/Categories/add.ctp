<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Categoria'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Categorias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Dicas'), array('controller' => 'news', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Dica'), array('controller' => 'news', 'action' => 'add')); ?> </li>
	</ul>
</div>
