<?php
/* @var $this CourseController */
/* @var $model Course */
/* @var $form CActiveForm */
?>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-1.11.0.js" type="text/javascript"></script>

<div class="form ">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'academy'); ?>
		<?php echo $form->textField($model,'academy',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'academy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teacher_id'); ?>
		<?php echo $form->textField($model,'teacher_id'); ?>
		<?php echo $form->error($model,'teacher_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_starttime'); ?>
		<?php echo $form->textField($model,'course_starttime'); ?>
		<?php echo $form->error($model,'course_starttime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_endtime'); ?>
		<?php echo $form->textField($model,'course_endtime'); ?>
		<?php echo $form->error($model,'course_endtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_time'); ?>
		<?php echo $form->textField($model,'add_time'); ?>
		<?php echo $form->error($model,'add_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo'); ?>
		<?php echo $form->textField($model,'photo',array('size'=>60,'maxlength'=>450)); ?>
            <input type="file" name="file"/>
	</div>
        <div class="row">
              <img class="img-responsive img-rounded"  style="max-height:300px" src="<?php echo Yii::app()->request->baseUrl ?>/coursePhotos/<?php echo $model->photo?>"/>
        </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
           $(document).ready(function()
           {
               $("form").attr("enctype","multipart/form-data");
           });
               
    </script>