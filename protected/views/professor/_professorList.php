<?php
/* @var $this AcademyController */
/* @var $data Course */
?>

<div class="view">

	<!--<b><?php // echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>-->
	
	<?php echo CHtml::link(CHtml::encode($data->name), array('eachProfessor', 'professorID'=>$data->teacher_id)); ?>
    
        <hr>



	

</div>