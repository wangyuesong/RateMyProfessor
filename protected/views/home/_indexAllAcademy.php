<?php
/* @var $this HomeController */
/* @var $data Academy */
?>


	<!--<b><?php // echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>-->
	
<?php echo CHtml::link(CHtml::encode($data->name), array('academy/eachAcademyCourses/name/'.$data->name)); ?>
<em>
<?php echo " 教师: ". count($data->teachers). " 人"?>
</em>
    <br>

