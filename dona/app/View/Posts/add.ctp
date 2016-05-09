<html>
<head>
  <!-- fontの読み込み -->
  <link href='https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister|Special+Elite|Walter+Turncoat|Reenie+Beanie|Caesar+Dressing|Mountains+of+Christmas|Sunshiney|Ribeye+Marrow|Londrina+Shadow' rel='stylesheet' type='text/css'>
  <!-- cssリンク -->
  <?php echo $this->Html->css( 'add_user.css'); ?>
  <?php echo $this->Html->css( 'login.css'); ?>
  <link href="add_user.css" rel="stylesheet" type="text/css">
  <title>DONA POT</title>
</head>
<body>
 <div class='white'><?php echo $this->Html->image('white.png');?></div>
  <div class="info_user">
    <h1>Add Post...</h1>
    <p></p>
    <?php echo $this->Form->create('Post', array('type' => 'file')); ?>
    <div class="info-edit"><span>Title :</span><span class="detail-edit"><?php echo $this->Form->input('title',array('style'=>'border:2px; border-style:solid ; ','label'=>'')); ;?></span></div>
    <div class="info-edit"><span>Body :</span><span class="detail-edit"><?php echo $this->Form->input('body',array('style'=>'border:2px; border:solid #FFFFFF ; background:black; color:white; width:296.7px; height:150px; font-size: 20px;' ,'label'=>'')); ?></span></div>
    <div class="info-edit"><span>Image :</span> &nbsp; &nbsp;<span class="detail-edit"><?php echo $this->Form->input('image',array('type'=>'file','label'=>'')); ?></span></div>
    <?php echo $this->Form->input('Post.image_dir', array('type' => 'hidden')); ?>
    <a class="showf"><span><?php echo $this->Form->end(__('Add')); ?></span></a>
    <li><?php echo $this->Html->link(__('戻る'), array('action' => 'index')); ?></li>
  </ul>
</div>

</body>