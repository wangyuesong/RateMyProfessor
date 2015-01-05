<?php
/* @var $this TopicsController */
/* @var $data Topicreply */
?>

<style>
    .div_shadow{

border:#909090 1px solid;
background:#fff;
color:#333;
-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#000000')"; /* For IE 8 */
filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#000000'); /* For IE 5.5 - 7 */
-moz-box-shadow: 2px 2px 10px #909090;/* for firefox */
-webkit-box-shadow: 2px 2px 10px #909090;/* for safari or chrome */
box-shadow:2px 2px 10px #909090;/* for opera or ie9 */
}
</style>
<script>
    
    
    </script>
<div class="view row tiezi " style="margin: 5px ; padding:0px">

    <div class="col-md-2">
        <em><?php echo $data->floor?></em>&nbsp;&nbsp;&nbsp;&nbsp;
        <em><?php echo $data->account0->name?></em>
        <p> <?php if($index==0) echo "<em><label style='color:red; font-family:cursive'>沙发</label></em>" ?> </P>
        <p> <?php if($index==1) echo "<em><label style='color:red; font-family:cursive'>板凳</label></em>" ?> </P>
            <img class="img-responsive img-thumbnail " style=" min-height: 100px" src="<?php echo Yii::app()->request->baseUrl?>/headPhotos/<?php echo $data->account0->photo?>"/>
    <br/> <br/>
    </div>
    <div class="col-md-2">
       
    </div>
   
    <div class="col-md-8">
    &nbsp;<?php  echo $data->content ?>
    </div>
    <div class="col-md-6"  style="padding-top: 10px; padding-bottom: 10px ">
          <a href="#huifu">  <button  id="<?php echo $data->floor?>" class="btn btn-default replyReplyButton">回复</button> </a>
    </div>


</div>
  
    