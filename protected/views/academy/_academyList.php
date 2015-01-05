<?php
/* @var $this AcademyController */
/* @var $data Academy */
?>

<div class="view">

	<!--<b><?php // echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>-->
	
	<?php echo CHtml::link(CHtml::encode($data->name), array('eachAcademyCourses', 'name'=>$data->name)); ?>
    
        <hr>



	

</div>