<?php
/* @var $this HomeController */
/* @var $data Topic */
?>


	<!--<b><?php // echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>-->
	

            <?php echo CHtml::link(CHtml::encode($data->title), array('topics/'.$data->id)); ?>
     <em>回复:<?php echo $data->currentfloor;  if($data->currentfloor>10) echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style='color:red; font-family:cursive';>Hot</label>";?> </em>

    <br>
