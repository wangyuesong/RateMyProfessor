<?php
/* @var $this CourseController */
/* @var $data Course */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->course_id), array('view', 'id'=>$data->course_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('academy')); ?>:</b>
	<?php echo CHtml::encode($data->academy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teacher_id')); ?></b>
	<?php echo CHtml::encode($data->teacher_id); ?>:<?php echo $data->teacher->name ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_starttime')); ?>:</b>
	<?php echo CHtml::encode($data->course_starttime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_endtime')); ?>:</b>
	<?php echo CHtml::encode($data->course_endtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_time')); ?>:</b>
	<?php echo CHtml::encode($data->add_time); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('photo')); ?>:</b>
	<?php echo CHtml::encode($data->photo); ?>
	<br />

	*/ ?>

</div>