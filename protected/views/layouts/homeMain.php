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
     <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/replyBackground.css" rel="stylesheet"/>
        <?php include_once  Yii::getPathOfAlias('webroot') . '/constantList.php'  ?>
     <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.0.js" type="text/javascript"></script>
    <?php 
   $url = Yii::app()->request->getUrl();
   $home = Yii::app()->request->baseUrl. "/index.php/home";
   $academy = Yii::app()->request->baseUrl. "/index.php/academy";
   $course = Yii::app()->request->baseUrl. "/index.php/courses";
   $professor = Yii::app()->request->baseUrl. "/index.php/professor";
   $search = Yii::app()->request->baseUrl. "/index.php/search";
   $publish = Yii::app()->request->baseUrl. "/index.php/topics";
   echo "<script> $(document).ready(function(){ $('#homeNav').attr('class', 'title'); "
   . "$('#academyNav').attr('class', 'title');"
           . " $('#courseNav').attr('class', 'title');"
   . "$('#teacherNav').attr('class', 'title');  "
           . "$('#searchNav').attr('class', 'title'); "
           . "$('#publishNav').attr('class', 'title')});</script>";
   
   if(substr_count($url,$home) == 1)
   {
       echo "<script> $(document).ready(function(){ $('#homeNav').attr('class', 'active title');}) </script>";

   }
   if(substr_count($url,$academy) == 1)
   {
       echo "<script> $(document).ready(function(){ $('#academyNav').attr('class','active title');}) </script>";

   }
   if(substr_count($url,$course) == 1)
   {
       echo "<script> $(document).ready(function(){ $('#courseNav').attr('class', 'active title');}) </script>";

   }
   if(substr_count($url,$professor) == 1)
   {
       echo "<script> $(document).ready(function(){ $('#teacherNav').attr('class', 'active title');}) </script>";

   }
   if(substr_count($url,$search) == 1)
   {
       echo "<script> $(document).ready(function(){ $('#searchNav').attr('class', 'active title');}) </script>";

   }
   if(substr_count($url,$publish) == 1)
   {
       echo "<script> $(document).ready(function(){ $('#publishNav').attr('class', 'active title');}) </script>";

   }
   
//   　strstr($url,);
//从$str1(第一个的位置)搜索$str2并从它开始截取到结束字符串;若没有则返回FALSE。
    ?>
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
//                    echo CHTML::link('avc', array('userprofile/showUserInfo'));
        ?>
<!--                      <a href="<?php // echo Yii::app()->request->baseUrl; ?>/index.php/userprofile/showUserInfo">
                      我的账号</a>
                    &nbsp;|&nbsp;
                    <a href="<?php // echo Yii::app()->request->baseUrl; ?>/index.php/login/userLogin">退出</a>-->
                      <?php 
                       if(Yii::app()->user->id == "1152754")
                      {
                          echo "<a href=" . Yii::app()->request->baseUrl . "/index.php/admin>管理员</a>|";
                      }
                      if(Yii::app()->user->isGuest)
                      {
                          echo "<a href=" . Yii::app()->request->baseUrl . "/index.php/login/userLogin>登录</a>";
                      }
                      
                      else
                      {
                           echo "<a href=" . Yii::app()->request->baseUrl . "/index.php/personalcenter/update/".Yii::app()->user->id."/>".Yii::app()->user->name."</a>";
                           echo "&nbsp;|&nbsp;";
                           echo "<a href=" . Yii::app()->request->baseUrl . "/index.php/login/userLogout>注销</a>";
                      }
                      
                  ?>
                  </p>
              </div>
          </div>
        <ul class="nav nav-justified">
          <li id="homeNav"class="active title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/home/index">首&nbsp;页</a></li>
          <li id="academyNav" class="title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/academy/academyList">学&nbsp;院</a></li>
          <li id="courseNav" class="title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/courses/courseList">课&nbsp;程</a></li>
          <li id="teacherNav" class="title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/professor/professorList">教&nbsp;师</a></li>
          <li id="searchNav" class="title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/search/show">搜&nbsp;索</a></li>
          <li id="publishNav" class="title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/topics">发&nbsp;帖</a></li>
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
