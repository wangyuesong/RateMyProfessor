<?php
/* @var $this Academy1Controller */
/* @var $model Academy */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'academy-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 500)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'head'); ?>
        <?php echo $form->textField($model, 'head', array('size' => 60, 'maxlength' => 450)); ?>
        <input type="file" name="file"/>
    </div>
    <div class="row">
        <img class="img-responsive img-rounded"  style="max-height:300px" src="<?php echo Yii::app()->request->baseUrl ?>/academyPhotos/<?php echo $model->head ?>"/>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-1.11.0.js" type="text/javascript"></script>
<script>
           $(document).ready(function()
           {
               $("form").attr("enctype","multipart/form-data");
           });
               
    </script>