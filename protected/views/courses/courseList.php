    <div class="container">

      <div class="mainInfor">
        <div class="row">
          <div class="col-md-8 eachContainer">
              <h2>课程信息</h2>
              <hr class="myHr"/>
              <?php
               $this->widget('zii.widgets.CListView', array(
	                    'dataProvider'=>$dataProvider,
	      'itemView'=>'_courseList',
                  ));
              ?>
          </div>
          <div class="col-lg-4 imgDiv">
              <img class="img-rounded images img-responsive" src="<?php echo Yii::app()->request->baseUrl ?>/pictures/tj_lib.jpg"/>
          </div>
        </div>
      </div>
       
        
     
      <!-- Site footer -->
     

    </div> <!-- /container -->




