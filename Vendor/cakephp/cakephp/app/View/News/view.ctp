<div class="news view">
<h2><?php echo __('Nova'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($news['News']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($news['News']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descrição'); ?></dt>
		<dd>
			<?php echo h($news['News']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($news['Category']['name'], array('controller' => 'categories', 'action' => 'view', $news['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Criada'); ?></dt>
		<dd>
			<?php echo h($news['News']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificada'); ?></dt>
		<dd>
			<?php echo h($news['News']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Dicas'), array('action' => 'edit', $news['News']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Deletar Dicas'), array('action' => 'delete', $news['News']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $news['News']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Dicas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novas Dicas'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Categoria'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
