<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name=>array('view','id'=>$model->account),
	'Update',
);

$this->menu=array(
	array('label'=>'用户列表', 'url'=>array('index')),
	array('label'=>'创建用户', 'url'=>array('create')),
	array('label'=>'查看用户', 'url'=>array('view', 'id'=>$model->account)),
	array('label'=>'管理用户', 'url'=>array('admin')),
);
?>

<h1>更新用户 <?php echo $model->account; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>