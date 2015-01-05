<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/searchShape.css" rel="stylesheet"/> 
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/add.css" rel="stylesheet"/> 
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/home.css" rel="stylesheet"/>
     <!--<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/signIn.css" rel="stylesheet">-->
     <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/each.css" rel="stylesheet"/>
    
        <?php include_once  Yii::getPathOfAlias('webroot') . '/constantList.php'  ?>
   
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
</head>

<body>

<div class="container" id="page">

	
     <div class="masthead">
          <div class="row">
              <div class="col-md-10">
                <h2 class="text-muted">
                    <img class='tj' src="<?php echo Yii::app()->request->baseUrl; ?>/pictures/tongji.jpg" alt='tj'/>
                    同济大学评师评课网站
                </h2>
              </div>
              <div class="col-md-2">
                  <p>
                       <?php 
                      if(Yii::app()->user->isGuest)
                      {
                          echo "<a href=" . Yii::app()->request->baseUrl . "/index.php/login/userLogin>登录</a>";
                      }
                      else
                      {
                           echo "<a href=" . Yii::app()->request->baseUrl . "/index.php/login/userLogin>个人中心</a>";
                           echo "&nbsp;|&nbsp;";
                             echo "<a href=" . Yii::app()->request->baseUrl . "/index.php/login/userLogout>注销</a>";
                      }
                      
                  ?>
                  </p>
              </div>
          </div>
        <ul class="nav nav-justified">
       <li class="title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/home/index">首&nbsp;页</a></li>
          <li class="active  title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/academy/academyList">学&nbsp;院</a></li>
          <li class=" title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/courses/courseList">课&nbsp;程</a></li>
          <li class="title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/professor/professorList">教&nbsp;师</a></li>
          <li class="title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/search/show">搜&nbsp;索</a></li>
          <li class="title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/topics">发&nbsp;帖</a></li>
         </ul>
      </div>
    
	<?php echo $content; ?>

	<div class="clear"></div>
<div class="footer">
        <p>&copy; 2014 Spring</p>
      </div>
	

</div><!-- page -->

</body>
</html>
