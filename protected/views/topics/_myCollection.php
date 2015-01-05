<?php
/* @var $this TopicsController */
/* @var $data Topiccollection */
?>


<div class="view row tiezi " style="margin: 5px ; padding:0px">

    <div class="col-md-1">
        <em><?php echo $index?></em>
    </div>
    <div class="col-md-2">
       
        
        <a href="<?php echo Yii::app()->request->baseUrl ?>/index.php/topics/<?php echo $data->topic->id ?>"><h4 ><strong><?php echo $data->topic->title ?></strong></h4></a>
      
    </div>
<!--	<b><?php // echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php // echo CHtml::encode($data->type); ?>
	<br />-->

	<div class="col-md-3">
            <h5>
	<b><?php echo "发帖人"; ?>:</b>
	<?php echo CHtml::encode($data->topic->account0->name); ?>
            </h5>
	
        </div>
        <div class="col-md-1">
            <h5>
	<?php echo CHtml::encode($data->topic->type0->name); ?>
            </h5>
	
        </div>
        <div class="col-md-2">
            <h5>
	<b><?php echo CHtml::encode($data->topic->getAttributeLabel('currentfloor')); ?>:</b>
	<?php echo CHtml::encode($data->topic->currentfloor); ?>
            </h5>
        </div>
    <div class="col-md-2">
            <h5>
	<b>查看:</b>
	<?php echo CHtml::encode($data->topic->clicktime); ?>
        
            </h5>
        </div>
   

</div>