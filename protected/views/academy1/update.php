<?php
/* @var $this Academy1Controller */
/* @var $model Academy */

$this->breadcrumbs=array(
	'Academies'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Update',
);

$this->menu=array(
	array('label'=>'List Academy', 'url'=>array('index')),
	array('label'=>'Create Academy', 'url'=>array('create')),
	array('label'=>'View Academy', 'url'=>array('view', 'id'=>$model->name)),
	array('label'=>'Manage Academy', 'url'=>array('admin')),
);
?>

<h1>Update Academy <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>