<?php debug($post); ?>
<div class="posts form">
<?php echo $this->Form->create('Post', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('title',array('default'=>$post['Post']['title']));
		echo $this->Form->input('body',array('default'=>$post['Post']['body']));
		echo $this->Form->input('image',array('type'=>'file'));
      	echo $this->Form->input('Post.image_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Post.id')), array(), __('投稿を削除しますか # %s?', $this->Form->value('Post.id'))); ?></li>
		<li><?php echo $this->Html->link(__('投稿記事一覧'), array('action' => 'index')); ?></li>
	</ul>
</div>
