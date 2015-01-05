<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="pictures/tongjiTouming.png"/>

    <title>同济大学评师评课网站</title>

<link href="css/bootstrap.css" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="css/home.css" rel="stylesheet"/>
    <link href="css/searchShape.css" rel="stylesheet"/>
    <link href="css/add.css" rel="stylesheet"/>
    
    <script LANGUAGE="JavaScript">
　　function editsuccess() { 
　　alert('修改密码成功！');
　　} 
　　</script>
    
</head>

<body>
    <div class="container">  
        <div class="masthead">
          <div class="row">
              <div class="col-md-10">
                <h2 class="text-muted">
                    <img class='tj' src="pictures/tongji.jpg" alt='tj'/>
                    同济大学评师评课网站
                </h2>
              </div>
              <div class="col-md-2">
                  <p>
                    <a href="#">我的账号</a>
                    &nbsp;|&nbsp;
                    <a href="logonPage.html">退出</a>
                  </p>
              </div>
          </div>
        <ul class="nav nav-justified">
          <li class="title"><a href="home.html">首&nbsp;页</a></li>
          <li class="title"><a href="xueyuan.html">学&nbsp;院</a></li>
          <li class="title"><a href="courses.html">课&nbsp;程</a></li>
          <li class="title"><a href="teachers.html">教&nbsp;师</a></li>
          <li class="title"><a href="search.html">搜&nbsp;索</a></li>
          <li class="title"><a href="add_fatie.html">发&nbsp;帖</a></li>
        </ul>
            <div class="row">
            <div class="col-md-12 topImgDiv">
                <img class="img-rounded img-responsive topImg" src="pictures/tj_top.jpg"/>
            </div>
        </div>
      </div>
      <hr/>
        
      <div class="addMainInfor">
          <div class="row">
              <div class="col-md-3">
                  <div class="list-group">
                      <a href="showUserInformation.html" class="list-group-item">个人基本资料</a>
                      <a href="editUserInformation.html" class="list-group-item">编辑个人基本资料</a>
                      <a href="editPassword.html" class="list-group-item active">修改密码</a>
                  </div>
              </div>
              <div class="col-md-9">
                  <div class="rightContainer">
        
        <form id="editUser" name="editUser" method="post" class="form-horizontal">
            <div class="form-group">
                <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">原密码：</label>
                            </div>
                            <div class="col-md-3">
                                <input type="password" id="oldpassword" name="oldpassword" value="<!-获取原用户信息" />
                            </div>
                </div>
                <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">新密码：</label>
                            </div>
                            <div class="col-md-3">
                                <input type="password" id="newassword" name="newpassword" placeholder="请输入新密码" />
                            </div>
                </div>
                <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">重复新密码：</label>
                            </div>
                            <div class="col-md-3">
                                <input type="password" id="Rnewassword" name="Rnewpassword" placeholder="请再输入新密码" />
                            </div>
                </div>
               
                <div class="form-group">
                     <div class="col-md-2">
                         <button class="btn btn-primary" type="submit" id="editSubmit" name="editSubmit" onclick="editsuccess()">确认保存</button>                                
                     </div>
                 </div>  
           
            </div>
      </form>
                      </div>
          </div>
          
          
          
          
       </div>
     
      <!-- Site footer -->
      <div class="footer">
        <p>&copy; 2014 Spring</p>
      </div>

    </div>
    </div>
      
    </body>
</html>