<?php
/* @var $this HomeController */
/* @var $data Course */
?>


	<!--<b><?php // echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>-->

<p><?php echo CHtml::link(CHtml::encode($data->name), array('courses/eachCourse','courseName'=>$data->name)); ?>
    &nbsp; &nbsp; &nbsp;
<?php echo CHtml::link(CHtml::encode($data->teacher->name), array('courses/eachCourse','courseName'=>$data->name)); ?></p>

    <br>
