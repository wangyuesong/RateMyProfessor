<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'用户列表', 'url'=>array('index')),
	array('label'=>'创建用户', 'url'=>array('create')),
	array('label'=>'更新用户', 'url'=>array('update', 'id'=>$model->account)),
	array('label'=>'删除用户', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->account),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理用户', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->account; ?> </h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'account',
		'academy',
		'password',
		'name',
		'gender',
		'email',
		'phone',
//		'photo',
		'visibility',
		'question',
		'answer',
	),
)); ?>
