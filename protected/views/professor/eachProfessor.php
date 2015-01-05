
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
                  <a href="<?php echo Yii::app()->request->baseUrl ?>/index.php/professor/professorList">返回教师列表</a>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <h1><?php echo $teacher['name']?></h1>
                  <br/>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3">
                  <img class="imageTea img-thumbnail"  src="<?php echo Yii::app()->request->baseUrl; ?>/teacherPhotos/<?php echo $teacher->photo?>"/>
              </div>
              <div class="col-md-4">
                  <p>姓名：<?php echo $teacher['name']; ?></p>
                  <p>性别：
                  <?php 
                    if($teacher['gender'] == '0')
                    {
                        echo "男";
                    }
                    elseif($teacher['gender'] == '1')
                    {
                        echo "女";
                    }
                    else
                    {
                        echo "error";
                    }
                  ?>
                  </p>
                  <p>所在学院：<?php echo $teacher['academy'] ?></p>
                  <p>综合评分：<?php echo $averageTeacherGrade ?></p> 
                  <a class="btn btn-primary" href="#pingjia">去评价</a>
              </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-md-10">
                <table class="table table-hover">
                    <thead>
                       <tr>
                        <th>课程</th>
                        <th>授课时间</th>
                        <th>添加日期</th>
                        <th>综合评分</th>
                      </tr> 
                    </thead>
                    <tbody>
                        <?php
                             $this->widget('zii.widgets.CListView', array(
	                    'dataProvider'=>$courseDataProvider,
                             'template'=>'{sorter}{pager}{items}{pager}',
                            	      'itemView'=>'_eachProfessor',
                        ));
                        ?>
                    </tbody>
                </table>
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
                                <?php 
                                $this->widget('zii.widgets.CListView', array(
                                                    'dataProvider'=>$teacherDataProvider,
                                                    'template'=>'{sorter}{pager}{items}{pager}',
                                                    'itemView'=>'_eachProfessor2',
                                )); ?>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <hr/>
          <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/professor/SubmitComment" method="post" class="form-horizontal">
          <div class="row" id="pingjia">
              <div class="col-md-12">
                <h3>立即评分</h3>
                <br/>
                
                    <div class="form-group">
                        <div class="col-md-2">
                            <label class="control-label">综合评分</label>
                        </div>
                        <div class="col-md-4">
                            <select required name="score" id="score" class="form-control">
                                <option value="">-请选择-</option>
                                <option id="score0">0</option>
                                <option id="score1">1</option>
                                <option id="score2">2</option>
                                <option id="score3">3</option>
                                <option id="score4">4</option>
                                <option id="score5">5</option>
                                <option id="score6">6</option>
                                <option id="score7">7</option>
                                <option id="score8">8</option>
                                <option id="score9">9</option>
                                <option id="score10">10</option>
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
                              <div class="form-group">
                                <div class="col-md-10">
                                    <textarea name="inputHF" class="form-control" rows="2" placeholder="有什么想分享的吗？" required=""></textarea>
                                </div>
                              </div>
                              <input type="text" name="teachername"  value="<?php echo $teacher['name'];?>"style="display: none">
                              <input type="text" name="teacher_id" value="<?php echo $teacher['teacher_id'];?>" style="display: none;"/>
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
              <br/>
              <div class="col-md-2">
                  <a href="<?php echo Yii::app()->request->baseUrl ?>/index.php/professor/professorList">返回本学院教师列表</a>
              </div>
              <div class="col-md-2 col-md-offset-8">
                  <a href="#top">回到顶部</a>
              </div>
          </div>
      </div>
  

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.3.js"></script>
    <!--date-->
    <script type="text/javascript" src="js/myDate.js"></script>
  </body>
</html>
