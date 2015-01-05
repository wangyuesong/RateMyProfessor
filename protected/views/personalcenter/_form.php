<?php
/* @var $this PersonalcenterController */
/* @var $model User */
/* @var $form CActiveForm */
?>
<div class="row">
    
    <div class="form col-md-6">
        <hr>
<div class="col-md-3">
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/headPhotos/<?php echo Yii::app()->user->id ?>.jpg" class="img-responsive img-thumbnail"/>
     <!--<img src="../../../headPhotos/1152754.jpg" alt="" class="img-responsive"/>-->
</div>
       
        <div class="col-md-3">
            <form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/personalcenter/uploadPhoto" enctype="multipart/form-data">
                <input type="file" name="file">
                <input type="submit" name="sub" value="上传">
                <input type="reset" name="res" value="重置"/>
            </form>
        </div>
        
        <br>
        <br>
        <br>
        <br>
        <br>
        <hr/>
        <center>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-form',
            'enableAjaxValidation' => false,
            'action'=>Yii::app()->request->baseUrl.'/index.php/personalcenter/update/'.Yii::app()->user->id
        ));
        ?>

        <p class="note">带 <span class="required">*</span> 是必填项.</p>

            <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model, '账号'); ?>
<?php echo $form->textField($model, 'account', array('size' => 20, 'maxlength' => 20, 'disabled' => true)); ?>
<?php echo $form->error($model, 'account'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, '学院'); ?>
<?php echo $form->textField($model, 'academy', array('size' => 20, 'maxlength' => 20)); ?>
<?php echo $form->error($model, 'academy'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, '密码'); ?>
<?php echo $form->textField($model, 'password', array('size' => 20, 'maxlength' => 20)); ?>
<?php echo $form->error($model, 'password'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, '姓名'); ?>
<?php echo $form->textField($model, 'name', array('size' => 20, 'maxlength' => 20)); ?>
<?php echo $form->error($model, 'name'); ?>
        </div>

       

        <div class="row">
            <?php echo $form->labelEx($model, 'Email'); ?>
<?php echo $form->textField($model, 'email', array('size' => 30, 'maxlength' => 100)); ?>
<?php echo $form->error($model, 'email'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, '手机'); ?>
<?php echo $form->textField($model, 'phone', array('size' => 20, 'maxlength' => 20)); ?>
<?php echo $form->error($model, 'phone'); ?>
        </div>



        <div class="row">
            <?php echo $form->labelEx($model, 'visibility'); ?>
<?php echo $form->textField($model, 'visibility'); ?>
<?php echo $form->error($model, 'visibility'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, '密码提示问题'); ?>
<?php echo $form->textField($model, 'question', array('size' => 60, 'maxlength' => 500)); ?>
<?php echo $form->error($model, 'question'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, '提示问题答案'); ?>
<?php echo $form->textField($model, 'answer', array('size' => 60, 'maxlength' => 500)); ?>
<?php echo $form->error($model, 'answer'); ?>
        </div>

        <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : '保存',array('class'=>'btn btn-info')); ?>
        </div>

<?php $this->endWidget(); ?>
        </center>
    </div><!-- form -->
    <div class="col-md-6"><img src="<?php echo Yii::app()->request->baseUrl; ?>/pictures/tj_mzd.jpg" class="img-responsive"></div>
</div>