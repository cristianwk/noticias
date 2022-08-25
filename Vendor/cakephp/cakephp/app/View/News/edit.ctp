<div class="news form">
<?php echo $this->Form->create('Nova'); ?>
	<fieldset>
		<legend><?php echo __('Editar'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('News.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('News.id')))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Dicas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Categoria'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
