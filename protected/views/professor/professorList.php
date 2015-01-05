    <div class="container">
      <div class="mainInfor">
        <div class="row">
          <div class="col-md-8 eachContainer">
              <h2>教师信息</h2>
              <hr class="myHr"/>
              <?php
               $this->widget('zii.widgets.CListView', array(
	                    'dataProvider'=>$dataProvider,
	      'itemView'=>'_professorList',
                  ));
              ?>
          </div>
          <div class="col-lg-4 imgDiv">
              <img class="img-rounded images img-responsive" src="<?php echo Yii::app()->request->baseUrl ?>/pictures/tj_mzd.JPG"/>
          </div>
        </div>
      </div>
       
        
     
      <!-- Site footer -->
     
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>


