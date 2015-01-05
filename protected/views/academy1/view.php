<?php
/* @var $this Academy1Controller */
/* @var $model Academy */

$this->breadcrumbs=array(
	'Academies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Academy', 'url'=>array('index')),
	array('label'=>'Create Academy', 'url'=>array('create')),
	array('label'=>'Update Academy', 'url'=>array('update', 'id'=>$model->name)),
	array('label'=>'Delete Academy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->name),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Academy', 'url'=>array('admin')),
);
?>

<h1>View Academy #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'description',
		'head',
	),
)); ?>
