      <div class="row">
            <div class="col-md-12 topImgDiv">
                <img class="img-rounded img-responsive topImg" src="<?php echo Yii::app()->request->baseUrl; ?>/pictures/tj_top.jpg"/>
            </div>
      </div>
      <div class="searchContainer">
          <div class="row">
              <div class="col-md-12">
                  <div class="searchMain">
                      <form action="<?php echo Yii::app()->request->baseUrl;?>/index.php/search/Search" method="post" class="search-form">
                        <div class="row">
                            <div class="col-md-9">
                            <input class="form-control" type="search" name="query" placeholder="请输入您想搜索的内容" required=""/>
                        </div>
                        <div class="col-md-2">
                            <select name="way" id="way" class="form-control">
                              <option name="courses" value="course">课程</option>
                              <option name="teachers" value="professor">教师</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                          <button class="btn btn-primary" type="submit">搜&nbsp;&nbsp;&nbsp;索</button>
                        </div>
                        </div>
                        <div class="row">
                      </div>
                      </form>
                  </div>
              </div>
          </div>
                    <?php
                        if($CourseDataProvider != NULL)
                        {
                            echo '<div class="row">';
                            echo '<div class="searchMain">';
                            echo '<div class="col-md-12">';
                            echo '<h2>课程搜索结果</h2>';
                            echo '<hr class="myHr"/>';
                            $this->widget('zii.widgets.CListView', array(
	                    'dataProvider'=>$CourseDataProvider,
                            'template'=>'{sorter}{pager}{items}{pager}',
                            'itemView'=>'_searchCourse',
                            ));
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        elseif($TeacherDataProvider != NULL)
                        {
                            echo '<div class="row">';
                            echo '<div class="searchMain">';
                            echo '<div class="col-md-12">';
                            echo '<h2>教师搜索结果</h2>';
                            echo '<hr class="myHr"/>';
                            $this->widget('zii.widgets.CListView', array(
	                    'dataProvider'=>$TeacherDataProvider,
                            'template'=>'{sorter}{pager}{items}{pager}',
                            'itemView'=>'_searchTeacher',
                            ));
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>
          
       </div>

          
     