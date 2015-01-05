<!DOCTYPE html>


      <div class="addMainInfor">
          <div class="row">
              <div class="col-md-3">
                  <div class="list-group">
                      <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/academy/eachAcademyCourses/name/<?php echo $_GET['name']?>" class="list-group-item ">课程信息</a>
                      <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/academy/eachAcademyTeachers/name/<?php echo $_GET['name']?>" class="list-group-item active">教师信息</a>
                  </div>
              </div>
              <div class="col-md-9">
                  <div class="rightContainer">
                      <div class="row">
                          <div class="col-md-12 eachContainer">
                              <h2><?php echo $_GET['name'] ?>学院教师信息</h2>
                              <hr class="myHr"/>
                               <?php $this->widget('zii.widgets.CListView', array(
	                    'dataProvider'=>$dataProvider,
	          'itemView'=>'_eachAcademyTeachers',
                      )); ?>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2 col-md-offset-10">
                          <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/academy/academyList">返回学院列表</a>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
          
          
          
          
       </div>
     
      <!-- Site footer -->
  
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.3.js"></script>
    <!--date-->
    <script type="text/javascript" src="js/myDate.js"></script>
  </body>
</html>
