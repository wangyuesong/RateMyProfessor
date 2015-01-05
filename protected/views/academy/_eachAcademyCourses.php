<?php
/* @var $this EmployeeController */
/* @var $data Course */
?>

<div class="view">

	<!--<b><?php // echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>-->
	<?php // echo $data->name ?>
        
	<?php echo CHtml::link(CHtml::encode($data->name), array('courses/eachCourse', 'courseName'=>$data->name)); ?>
	<br />


</div>