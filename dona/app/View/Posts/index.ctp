<!--<?php  debug($user_id);?>-->
<link href='https://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>
	<!-- cssリンク -->
<link href="./blog_index.css" rel="stylesheet" type="text/css">
	<?php echo $this->Html->css( 'post.css');?>
    <?php echo $this->Html->css( 'bootstrap.min.css');?>
    <body>
<div class="posts index">
	<div class='town2 post-img' style="position: relative;"><?php echo $this->Html->image('town2.jpg');?></div>
	<h1 style="text-align: center; position: relative; top: -300px; font-size: 60;">POSTS</h1>
</div>
	<section class="section light-gray-bg　clearfix" style="position: relative; top: -170px; left: 20px;">
		<div class="container" style="text-align: center;">
	<div class="nav">
	<div class="row">
	<div class="col-md-3 col-sm-3 col-xs-3 main">
</div>
	</div>
	<div class="row">
	<body>
	<div class="col-md-12 main">
					<div class="separator-2"></div>
						<div class="row masonry-grid-fitrows grid-space-10">
							<div class="col-md-12">
									<?php foreach ($posts as $post): ?>
									<div class="col-md-4 col-sm-6 col-xs-10 post_img " style="padding-bottom: 20px;">
									<div class="listing-item white-bg bordered mb-20">
										<span class="post_img"><?php if($post['Post']['image_file_name'] == ''){
										echo $this->Html->image('no.jpg');
									}else{
	 									echo $this->Upload->uploadImage($post,'Post.image');}?>&nbsp;</span>
											<div class="overlay-container">
												<div class="body">
													<h3><?php echo h($post['Post']['title']); ?>&nbsp;</h3>
													<td><?php echo h($post['Post']['body']); ?>&nbsp;</td>		
													<td class="actions">
														<?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?>
													</td>
												</div>
											</div>
										</div>
									</div>
							<?php endforeach; ?>
						</div>
					</div>
					</div>
	<?php
	// echo $this->Paginator->counter(array(
	// 	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	// ));
	?>
	<!-- <div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div> -->
</div>
<div >
		<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?></li>
		</div>
	</div>			
</div>
</div>
</div>
</body>
</section>
