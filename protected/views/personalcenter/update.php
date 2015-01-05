<?php
/* @var $this PersonalcenterController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name=>array('view','id'=>$model->account),
	'Update',
);

//$this->menu=array(
//	array('label'=>'List User', 'url'=>array('index')),
//	array('label'=>'Create User', 'url'=>array('create')),
//	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->account)),
//	array('label'=>'Manage User', 'url'=>array('admin')),
//);
//?>

<h1>更改我的个人信息 <?php echo $model->account; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>