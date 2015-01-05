<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>

     <img src="<?php echo Yii::app()->request->baseUrl; ?>/pictures/tj_lib2.jpg" style="position: relative; left:5%;"/> 
     <form class="form-signin" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/login/userAuthenticate" method="post" >
        <h2 class="form-signin-heading">请登陆</h2>
        <input type="text" class="form-control" placeholder="用户名(学号)" id="user_Name" name="user_Name" required autofocus>
        <input type="password" class="form-control" placeholder="密码" id="password" name="password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me">记住我
        </label>
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/login/userRegister">注册</a>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
      </form>
