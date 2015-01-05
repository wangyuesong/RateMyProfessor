<?php
error_reporting(0);
    try
    {
        $flag = $_GET['flag'];
        if($flag == 1)
        {
            echo '<script type="text/javascript">alert("评论成功")</script>';
        }
        else if($flag == 2)
        {
            echo '<script type="text/javascript">alert("评论失败")</script>';
        }
    }
    catch (Exception $e)
    {
        
    }
?>
      <div class="mainInfor">
          <div class="row">
              <div class="col-md-2 col-md-offset-11">
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/courses/courseList">返回课程列表</a>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <h1><?php echo $_GET['courseName']?></h1>
                  <br/>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3">
                  <img class="imageTea img-thumbnail" src="<?php echo Yii::app()->request->baseUrl; ?>/coursePhotos/<?php echo $courseDetail->photo?>"/>
              </div>
              <div class="col-md-4">
                  <p>课程名称：<?php echo $_GET['courseName']?></p>
                  <p>授课学院：<?php echo $courseDetail->academy?></p>                  
                  <!--<p>教师名称：<?php echo $courseDetail->teacher->name?></p>-->
                  <p>综合评分：<?php echo $averageCourseGrade?></p>
                  <p><?php // echo </p> ?>
                  <a class="btn btn-primary" href="#pingjia">去评价</a>
              </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-md-10">
               <table class="table table-hover">
                    <thead>
                       <tr>
                        <th>教师</th>
                        <th>授课时间</th>
                        <th>教师评分</th>
                        <th>课程评分</th>
                      </tr> 
                    </thead>
                    <tbody>
                        
                         <?php $this->widget('zii.widgets.CListView', array(
	                    'dataProvider'=>$courseDataProvider,
                             'template'=>'{sorter}{pager}{items}{pager}',
                            	      'itemView'=>'_eachCourse',
                  )); ?>
                        
                    </tbody>
                </table>
                
                             
            </div>
          </div>
          <hr/>
          <div class="row">
              <div class="col-md-10">
                  <h3>课程书籍</h3>
                  <div class="tieziDiv">
                      <div class="tiezi">
                          <div class="row">
                               <?php $this->widget('zii.widgets.CListView', array(
	                    'dataProvider'=>$allBooks,
                             'template'=>'{sorter}{pager}{items}{pager}',
                            	      'itemView'=>'_eachBook',
                          )); ?>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
          <hr/>
          <div class="row">
              <div class="col-md-10">
                  <h3>热帖</h3>
                  <div class="tieziDiv">
                      <div class="tiezi">
                          <div class="row">
                              <div class="col-md-12">
                                  <br/>
                              </div>
                      <?php $this->widget('zii.widgets.CListView', array(
	                    'dataProvider'=>$commentDataProvider,
                             'template'=>'{sorter}{pager}{items}{pager}',
                            	      'itemView'=>'_eachCourse2',
                  )); ?>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <hr/>
           <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/courses/submitComments" method="post">
          <div class="row" id="pingjia">
              <div class="col-md-12">
                <h3>立即评分</h3>
                <br/>
                <input name="course_name" type="text" value="<?php echo $_GET['courseName'];?>" style="display: none;">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label class="control-label">综合评分</label>
                        </div>
                        <div class="col-md-4">
                            <select required name="score" id="score" class="form-control">
                                <option value="">-请选择-</option>
                                <option id="score0" value="0">0</option>
                                <option id="score1" value="1">1</option>
                                <option id="score2" value="2">2</option>
                                <option id="score3" value="3">3</option>
                                <option id="score4" value="4">4</option>
                                <option id="score5" value="5">5</option>
                                <option id="score6" value="6">6</option>
                                <option id="score7" value="7">7</option>
                                <option id="score8" value="8">8</option>
                                <option id="score9" value="9">9</option>
                                <option id="score10" value="10">10</option>
                            </select>
                        </div>
                    </div>
                
              </div>
          </div>
          <hr/>
          <div class="row">
              <div class="col-md-12">
                <h3>分享您的听课体验</h3>
                <div class="tieziDiv">
                    <div class="row">
                      <div class="col-md-12">
                         
                              <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label">标题</label>
                                </div>
                                <div class="col-md-6">
                                    <input name="inputTitle" id="inputTitle" class="col-md-10 form-control" placeholder="请输入标题" required=""/>
                                </div>
                              </div>
                          <br/>    <br/>   
                              <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label">教师姓名</label>
                                </div>
                                <div class="col-md-6">
                                    <!--<input name="inputCourses" id="inputCourse" class="col-md-10 form-control" placeholder="请输入课程名称" required=""/>-->
                                    <select required name="teacher" id="teacher" class="form-control">
                                    <?php
                                    /* @var $course Course */
                                        foreach($allCourses as $course)
                                        {
                                            echo "<option value='".$course->teacher->teacher_id."'>".$course->teacher->name."</option>";
                                        }
                                    ?>
                                    </select>
                                  <?php
                    //echo CHtml::activeDropDownList($model,'teacher_name',$allTeachersName);
                    ?> 
                                </div>
                              </div>
                          <br/> <br/>
                              <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label">评论方式</label>
                                </div>
                                <div class="col-md-6">
                                    <!--<input name="inputCourses" id="inputCourse" class="col-md-10 form-control" placeholder="请输入课程名称" required=""/>-->
                                    <select required name="commentWay" id="course" class="form-control">
                                        <option value="1" selected="selected">实名评论</option>
                                        <option value="0">匿名评论</option>
                                    </select>
                                </div>
                              </div>
                              <br/>    <br/>      <br/>  
                              <div class="form-group">
                                <div class="col-md-10">
                                    <textarea name="inputHF" class="form-control" rows="2" placeholder="有什么想分享的吗？" required=""></textarea>
                                </div>
                                   
                              </div>
                                 <br/>    <br/>      <br/>    <br/>     
                              <div class="form-group">
                                <div class="col-md-2">
                                    <button class="btn btn-primary" type="submit">提交</button>
                                </div>
                            </div>
                          
                      </div>
                  </div>
                </div>
              </div>
          </div>
           </form>
          <div class="row">
              <div class="col-md-2">
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/courses/courseList">返回课程列表</a>
              </div>
              <div class="col-md-2 col-md-offset-8">
                  <a href="#top">回到顶部</a>
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
