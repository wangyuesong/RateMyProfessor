<?php
/* @var $this Academy1Controller */
/* @var $model Academy */

$this->breadcrumbs=array(
	'Academies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Academy', 'url'=>array('index')),
	array('label'=>'Manage Academy', 'url'=>array('admin')),
);
?>

<h1>Create Academy</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>