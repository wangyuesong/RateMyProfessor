<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
<!--
    <!-- Custom styles for this template -->
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/searchShape.css" rel="stylesheet"/>
    
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/add.css" rel="stylesheet"/>
    
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/home.css" rel="stylesheet"/>
     <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/signIn.css" rel="stylesheet">
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<!--       <script LANGUAGE="JavaScript">
　　function openwin() { 
　　alert('注册成功！');
    window.close();
    window.open('logonPage.html');
　　} 
　　</script> -->
</head>

<body>

<div class="container" id="page">

	
    <h2 class="text-muted">
                    <img class='tj' src="<?php echo Yii::app()->request->baseUrl; ?>/pictures/tongji.jpg" alt='tj'/>
                    同济大学评师评课网站
                </h2>
	<?php echo $content; ?>

	<div class="clear"></div>

	

</div><!-- page -->

</body>
</html>
