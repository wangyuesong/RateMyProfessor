<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->name=>array('view','id'=>$model->course_id),
	'Update',
);

$this->menu=array(
	array('label'=>'列表', 'url'=>array('index')),
	array('label'=>'创建', 'url'=>array('create')),
	array('label'=>'查看', 'url'=>array('view', 'id'=>$model->course_id)),
	array('label'=>'管理', 'url'=>array('admin')),
);
?>

<h1>更新课程 <?php echo $model->course_id; ?> <?php echo $model->name ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>