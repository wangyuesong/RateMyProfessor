<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-1.11.0.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/bootstrap.min.js" type="text/javascript"></script>
<?php
if(Yii::app()->user->isGuest)
     $this->redirect(array('login/UserLogin')); 
?>
    <center>

        <h2  class="tiezi" style="font-family:  serif; ">课程交易&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #777" class="glyphicon glyphicon-pencil"></span></h2>
    </center>

    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $courseDataProvider,
        'template' => '{sorter}{pager}{items}',
        'itemView' => '_view',
        'sortableAttributes' => array(
            'title',
            'clicktime',
            'currentfloor'
        ),
    ))
    ;
    ?>

<center>

    <h2  class="tiezi" style="font-family:  serif">书本交易&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:  #0099cc" class="glyphicon glyphicon-book"></span></h2>
</center>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $bookDataProvider,
    'itemView' => '_view',
    'sortableAttributes' => array(
        'title',
        'clicktime',
        'currentfloor')
));
?>
<center>

    <h2  class="tiezi" style="font-family:  serif">约课区&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: salmon" class="glyphicon glyphicon-sound-7-1"></span></h2>
</center>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dateDataProvider,
    'itemView' => '_view',
    'sortableAttributes' => array(
        'title',
        'clicktime',
        'currentfloor')
));
?>



<hr/>

<div class="tiezi"> 
    <form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/topics/publishTopic" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    <h3 style="display: ">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #d6e9c6" class="glyphicon glyphicon-file"></span>&nbsp;&nbsp;&nbsp;&nbsp;发帖 </h3>
                </div>

                <div class="col-md-4">
                    <h4>分类:&nbsp;&nbsp;<span class="glyphicon glyphicon-list" style="color:  #4F81BD"/></h4>
                    <select required name="topicZone" id="score">
                        <option value="">-请选择-</option>
                        <option id="score0" value="换课区">换课区</option>
                        <option id="score1" value="换书区">换书区</option>
                        <option id="score2" value="约课区">约课区</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <h4>相关图片: &nbsp;&nbsp;<span class="glyphicon glyphicon-camera"/></h4>
                    <input type="file" name="file">
                    <hr/>
                </div>

            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                主题 <input name="topicTitle" class="form-control"  placeholder=主题 required=""></textarea>
            </div>
            <div class="col-md-12">
                内容 <textarea name="topicContent" class="form-control" rows="2" placeholder="内容" required=""></textarea>
            </div>

        </div>
        <br/>
        <div class="row">
            <center> <button  type="submit" class="btn btn-primary">&nbsp;&nbsp;&nbsp;发&nbsp;帖&nbsp;&nbsp;&nbsp;</button> </center>
        </div>
    </form>

</div>
<br/>
<center>

    <label id="AT"/>

</center>
<input type="text" name="ref" id="ref" value="NO" style="display:none"/>


<div class="tiezi row"  >
    <center><div class="col-md-4"><button id="abc" data-toggle="modal" data-target="#myCollection" class="btn btn-info"><center><h3>我的收藏</h3></center></button></div></center>
    
      <center><div class="col-md-4"><button id="abc" data-toggle="modal" data-target="#myTopic" class="btn btn-info"><center><h3>我的帖子</h3></center></button></div></center>
      <center> <div class="col-md-4"><button id="abc" data-toggle="modal" data-target="#myReply" class="btn btn-info"><center><h3>我的回复</h3></center></button></div></center>
</div>



<div class="modal fade" id="myCollection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel" >我的收藏</h4> <h3 id="editHint"></h3>
                            </div>

                            <div class="modal-body">
                                <?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $myCollectionDataProvider,
    'itemView' => '_myCollection',
    
));
?>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
                            </div>
                        </div>
                    </div>     
                </div>  

<div class="modal fade" id="myTopic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">我的帖子</h4> <h3 id="editHint"></h3>
                            </div>

                            <div class="modal-body">
                            <?php  $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $myTopicDataProvider,
    'itemView' => '_myTopic',
   
));
?>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
                            </div>
                        </div>
                    </div>     
                </div> 

<div class="modal fade" id="myReply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">我的回复</h4> <h3 id="editHint"></h3>
                            </div>

                            <div class="modal-body">
                                        <?php  $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $myReplyDataProvider,
    'itemView' => '_myReply'
    
));
?>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
                            </div>
                        </div>
                    </div>     
                </div> 