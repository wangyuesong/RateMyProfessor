<?php
/* @var $this EmployeeController */
/* @var $data Teacher */
?>

<div class="view">

	<!--<b><?php // echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>-->
	<?php // echo $data->name ?>
        
	<?php echo CHtml::link(CHtml::encode($data->name), array('professor/eachProfessor', 'professorID'=>$data->teacher_id)); ?>
	<br />


	

</div>