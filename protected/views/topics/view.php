<?php
/* @var $this TopicsController */
/* @var $model Topic */
$collected = true;
$criteria = new CDbCriteria;
$criteria->addCondition("topic_id = :topicId");
$criteria->params["topicId"] = $model->id;
$criteria->addCondition("account = :account");
$criteria->params["account"] = Yii::app()->user->id;
$t = TopicCollection::model()->find($criteria);
if (is_null($t)) {
    
    echo "<script> $(document).ready(function(){ $('.collect').val('收藏');$('.collect').attr('class', 'btn btn-warning collect');}) </script>";

}
else
{
     echo "<script> $(document).ready(function(){ $('.collect').val('已收藏');$('.collect').attr('class', 'btn btn-primary collect');}) </script>";

}
?>
<style>
    .itemClass
    {
        font-family: fantasy;
    }

</style>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-1.11.0.js"></script>
<script>


    $(document).ready(function() {
        
     

        $("#huifuzhutie").click(function()
        {
            $("#ref").attr("value", "NO");
            $("#AT").html("");
        }
        );
        $(".replyReplyButton").click(function()
        {

            id = $(this).attr("id");
            $("#AT").html(" @ " + id + "楼");
            $("#ref").attr("value", id);
        });

        $(".collect").click(function()
        {
            $url = "<?php echo Yii::app()->request->baseUrl ?>/index.php/topics/collectTopic";
            $.ajax({
                type: "post",
                url: $url,
                data: "id=" + $(this).attr("id"),
                success: function() {
                    if ($(".collect").val() === "已收藏")
                    {
                        $(".collect").val("收藏");
                        $(".collect").attr("class", "btn btn-warning collect");
                    }
                    else
                    {
                        $(".collect").val("已收藏");
                        $(".collect").attr("class", "btn btn-primary collect");
                    }
                },
                error: function() {
                    alert("操作失败");
                }
            });
        });
        
        
        
      
           


    });
</script>



<div class="row">
<?php ?>
</div>




<div class="mainInfor">
    <div class="row">
        <div class="col-md-2 col-md-offset-11">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/topics/index">返回帖子列表</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <center>
                <h2>主题：<?php echo $model->title ?></h2>
            </center>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <img class="img-thumbnail img-responsive" src="<?php echo Yii::app()->request->baseUrl ?>/topicPhotos/<?php echo $model->photo ?>"/>
        </div>
        <div class="col-md-4 col-md-offset-2">
            <p>发帖人：<?php echo $model->account0->name ?></p>
            <p>点击次数：<?php echo $model->clicktime ?></p>                  

            <p>回复：<?php echo $model->currentfloor ?></p>
            <p>发帖时间：<?php echo $model->addtime ?></p>
            <p>最后回复：<?php echo $model->lastreplytime ?></p>

            <p><?php // echo </p>   ?>

        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="tiezidiv">
                <div class="tiezi">
                    <em> <h4>内容:</h4> </em>
<?php
echo $model->content;
?>
                </div>
            </div>


        </div>
    </div>
    <hr/>
    <div class="row">
        <center>
            <a href="#huifu"> <input class="btn btn-primary " id="huifuzhutie" value="回复主贴"/></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="btn btn-warning collect" id="<?php echo $model->id; ?>" value="收藏" />
        </center>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-12">
            <h3>全部回复</h3>
            <div class="tieziDiv">
                <div class="tiezi">
                    <div class="row">
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $replyDataProvider,
    'itemView' => '_replyview',
));
?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>

    <form method="post" action="<?php echo Yii::app()->request->baseUrl ?>/index.php/topics/makeReply/<?php echo $model->id; ?>">

        <div class="tiezi"> 
            <div class="row">
                <div class="col-md-12">
                    <h3>回复</h3>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea name="replyContent" class="form-control" rows="2" placeholder="有什么想分享的吗？" required=""></textarea>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <br/>
            <center>

                <button  type="submit" class="btn btn-primary">回复</button>

                <label id="AT"/>

            </center>
            <input type="text" name="ref" id="ref" value="NO" style="display:none"/>
        </div>
    </form>
    <a name="huifu" id="huifu"/>
    <!--          <div class="row">
                  <div class="col-md-2">
                      <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/courses/courseList">返回课程列表</a>
                  </div>
                  <div class="col-md-2 col-md-offset-8">
                      <a href="#top">回到顶部</a>
                  </div>
              </div>-->
</div>
<!-- Site footer -->



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.js"></script>
<!--date-->
<script type="text/javascript" src="js/myDate.js"></script>
