<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'列表', 'url'=>array('index')),
	array('label'=>'新建', 'url'=>array('create')),
	array('label'=>'更新', 'url'=>array('update', 'id'=>$model->course_id)),
	array('label'=>'删除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->course_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理', 'url'=>array('admin')),
);
?>

<h1>课程 #<?php echo $model->course_id; ?>:<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'course_id',
		'academy',
		'teacher_id',
		'name',
		'course_starttime',
		'course_endtime',
		'add_time',
		'photo',
	),
)); ?>
