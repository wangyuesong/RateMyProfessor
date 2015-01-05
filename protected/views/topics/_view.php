<?php
/* @var $this TopicsController */
/* @var $data Topic */
?>


</style>
<div class="view row tiezi " style="margin: 5px ; padding:0px">

    <div class="col-md-1">
        <em><?php echo $index?></em>
        <p> <?php if($index<1) echo "<em><label style='color:red; font-family:cursive'>Hot</label></em>" ?> </P>
    </div>
    <div class="col-md-2">
       
        
        <a href="<?php echo Yii::app()->request->baseUrl ?>/index.php/topics/<?php echo $data->id ?>"><h4 ><strong><?php echo $data->title ?></strong></h4></a>
      
    </div>
<!--	<b><?php // echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php // echo CHtml::encode($data->type); ?>
	<br />-->

	<div class="col-md-2">
            <h5>
	<b><?php echo "发帖人"; ?>:</b>
	<?php echo CHtml::encode($data->account0->name); ?>
            </h5>
	
        </div>
        <div class="col-md-3">
            <h5>
	<b><?php echo CHtml::encode($data->getAttributeLabel('addtime')); ?>:</b>
	<?php echo CHtml::encode($data->addtime); ?>
            </h5>

        </div>
        <div class="col-md-1">
            <h5>
	<b><?php echo CHtml::encode($data->getAttributeLabel('currentfloor')); ?>:</b>
	<?php echo CHtml::encode($data->currentfloor); ?>
            </h5>
        </div>
    <div class="col-md-1">
            <h5>
	<b>查看:</b>
	<?php echo CHtml::encode($data->clicktime); ?>
        
            </h5>
        </div>
    <div class="col-md-1">
        
	   <?php // if($index<1) echo "<img src='" . Yii::app()->request->baseUrl . "/pictures/hot.png' class='img-responsive'  />";?>
       
    </div>

</div>