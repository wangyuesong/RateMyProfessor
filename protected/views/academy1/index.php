<?php
/* @var $this Academy1Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Academies',
);

$this->menu=array(
	array('label'=>'Create Academy', 'url'=>array('create')),
	array('label'=>'Manage Academy', 'url'=>array('admin')),
);
?>

<h1>Academies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
