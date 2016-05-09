<div class="posts view">
<h2><?php echo __('Post'); ?></h2>
	<dl>
		<dt><?php echo __('User name'); ?></dt>
		<dd>
			<?php echo h($post['Post']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($post['Post']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Picture'); ?></dt>
		<dd>
			<?php if($post['Post']['image_file_name'] == ''){
					echo "画像はありません";
				}else{
	 				echo $this->Upload->uploadImage($post,'Post.image');}?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="comments">
	<h3><?php echo __('Comments'); ?></h3>
	<ul>
		<?php foreach ($comments as $comment): ?>
		<li><?php echo h($comment['Comment']['body']).'&nbsp'."by".'&nbsp'.h($comment['Comment']['username']); ?></li>
		<?php endforeach; ?>
	</ul>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('コメントをする'), array('controller' => 'comments','action' => 'add',$post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('記事一覧にもどる'), array('action' => 'index')); ?> </li>
	</ul>
</div>
