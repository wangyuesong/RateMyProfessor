<?php
/* @var $this HomeController */
/* @var $data Academy */
?>


	<!--<b><?php // echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>-->
	
<?php echo CHtml::link(CHtml::encode($data->name), array('professor/eachProfessor','professorID'=>$data->teacher_id)); ?>

    <br>
