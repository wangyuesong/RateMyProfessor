<?php
/* @var $this HomeController */
/* @var $data Coursecomment */
/*这个文件是显示该开设该课程的所有回复所用的view*/
?>

       <script type="text/javascript"> 
$(document).ready(function(){
$("#<?php echo $data->comment_id?>-drop").click(function(){
    $("#<?php echo $data->comment_id?>").slideToggle("slow");
  });
});
</script>

<div class="col-md-12">
                   <div class="col-md-3">
                       <strong> <?php echo $data->title?></strong>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                         
                     </div>
    <div class="col-md-2">评分: 
        <em>
            <?php 
                if($data->commentgrade != NULL)
                {
                    echo $data->commentgrade;
                }
                else 
                {
                    echo "无";
                }
            ?>
        </em>
    </div>
    <div class="col-md-1"> <span class="glyphicon glyphicon-arrow-down" id="<?php echo $data->comment_id?>-drop"></span></div>
    <br/>         
</div>
<div class="col-md-12">
    <hr/>
</div>
<div class="col-md-10 col-md-offset-1" id="<?php echo $data->comment_id?>" style="display: none">
    <p><?php echo $data->content?></p>
   <br/>
   <small> 评论人: <?php echo $data->user_name?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;评论日期: <?php echo $data->time_add?></small>
   <hr/>
</div>

