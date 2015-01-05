<!DOCTYPE html>

<html lang="zh">
  
    
 
        
      <!-- Carousel
      ================================================== --> 
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/pictures/tj_lib2.jpg" alt="First slide">
              <div class="container">
                <div class="carousel-caption">
                  <p>我校学科设置涵盖工学、理学、医学、管理学、经济学、哲学、文学、法学、教育学、艺术学等10个门类，教师队伍庞大，开设课程众多。在这里您能立即分享您的课堂体验，也能了解到其他同学的课堂感受。</p>
                  <p><a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/search/show" role="button">搜&nbsp;&nbsp;索</a></p>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/pictures/tj_yh.JPG" alt="Second slide">
              <div class="container">
                <div class="carousel-caption">
                  <p>“同心同德同舟楫，济人济事济天下”。这是一个同济学子互帮互助的平台，同学们可以在这里畅所欲言，交流学习经验，共同创造美好未来。</p>
                  <p><a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/search/show" role="button">搜&nbsp;&nbsp;索</a></p>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/pictures/tj_jd.jpg" alt="Third slide">
              <div class="container">
                <div class="carousel-caption">
                  <p>欢迎同济学子留下您在课上课下的点点滴滴！这不仅是一段美好的回忆，更为其他学子提供了宝贵的学习资源。</p>
                  <p><a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/search/show" role="button">搜&nbsp;&nbsp;索</a></p>
                  </div>
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div><!-- /.carousel -->

      <div class="homeM">
        <div class="row">
          <div class="col-md-4 eachContainer homeE">
              <h4>学院<em><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/academy/academyList" class="inforLink">更多&Gt;</a></em></h4>
              <hr class="myHr"/>

                 <?php $this->widget('zii.widgets.CListView', array(
	                    'dataProvider'=>$AcademydataProvider,
                     'template'=>'{sorter}{pager}{items}{pager}',
	      'itemView'=>'_indexAllAcademy',
                  )); ?>
          </div>
          <div class="col-md-5 eachContainer homeE">
              <h4>最热帖子<em><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/topics" class="inforLink">更多&Gt;</a></em></h4>
              <hr class="myHr"/>
             <?php
                        $this->widget('zii.widgets.CListView',array(
                            'dataProvider'=>$TopicdataProvider,
                            'template'=>'{sorter}{pager}{items}{pager}',
                            'itemView'=>'_indexNewestTopic'));
                    ?>
          </div>
          <div class="col-md-3  eachContainer homeE">
              <div class="row">
                  <div class="col-lg-12">
                      <h4>最新添加课程<em><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/courses/courseList" class="inforLink">更多&Gt;</a></em></h4>
                    <hr class="myHr"/>
                    <?php
                        $this->widget('zii.widgets.CListView',array(
                            'dataProvider'=>$CoursedataProvider,
                            'template'=>'{sorter}{pager}{items}{pager}',
                            'itemView'=>'_indexCourse'));
                    ?>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                    <h4>最新添加教师<em><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/professor/professorList" class="inforLink">更多&Gt;</a></em></h4>
                    <hr class="myHr"/>
                    <?php
                        $this->widget('zii.widgets.CListView',array(
                            'dataProvider'=>$TeacherdataProvider,
                            'template'=>'{sorter}{pager}{items}{pager}',
                            'itemView'=>'_indexTeacher'));
                    ?>
                  </div>
              </div>
            </div>
        </div>
      </div>
        
     
   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
  </body>
</html>
