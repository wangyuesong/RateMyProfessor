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
　　alert('修改信息成功！');
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
                      <a href="editUserInformation.html" class="list-group-item active">编辑个人基本资料</a>
                      <a href="editPassword.html" class="list-group-item">修改密码</a>
                  </div>
              </div>
              <div class="col-md-9">
                  <div class="rightContainer">
        
        <form id="editUser" name="editUser" method="post" class="form-horizontal">
            <div class="form-group">
                <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">用户名：</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="username" name="username" value="<!-获取原用户信息-->" required=""/>
                            </div>
                </div>
                <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">昵称：</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="userNiceName" name="userNiceName" value="<!-获取原用户信息-->" required=""/>
                            </div>
                </div>
                <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">所在学院：</label>
                            </div>
                            <div class="col-md-8">
                            <select class="form-control" name="Xueyuan" id="Xueyuan">
                                <option id="old" value="0">#获取学院名称</option>
                                <option id="gx" value="gx">公选课</option>
                                <option id="rj" value="rj">软件学院</option>
                                <option id="jzcsgh" value="jzycsgh">建筑与城市规划学院</option>
                                <option id="tmgc" value="tmgc">土木工程学院</option>
                                <option id="jxnygc" value="jxnygc">机械与能源工程学院</option>
                                <option id="jjygl" value="jjygl">经济与管理学院</option>
                                <option id="hjkxygc" value="hjkxygc">环境科学与工程学院</option>
                                <option id="clkxygc" value="clkxygc">材料科学与工程学院</option>
                                <option id="dzyxxgc" value="dzyxxgc">电子与信息工程学院</option>
                                <option id="rw" value="rw">人文学院</option>
                                <option id="wgy" value="wgy">外国语学院</option>
                                <option id="fzscq" value="fzscq">法学院/知识产权学院</option>
                                <option id="mkszy" value="mkszy">马克思主义学院</option>
                                <option id="zzgjgx" value="zzgjgx">政治与国际关系学院</option>
                                <option id="l" value="l">理学部</option>
                                <option id="qc" value="qc">汽车学院</option>
                                <option id="jtysgc" value="jtysgc">交通运输工程学院</option>
                                <option id="chydlxx" value="chydlxx">测绘与地理信息学院</option>
                                <option id="smkxyjs" value="smkxyjs">生命科学与技术学院</option>
                                <option id="y" value="y">医学院</option>
                                <option id="sjyys" value="sjyys">设计与艺术学院</option>
                                <option id="kqyxy" value="kqyxy">口腔医学院</option>
                                <option id="gdjt" value="gdjt">铁道与城市轨道交通研究院</option>
                                <option id="ty" value="ty">体育教学部</option>
                                <option id="zyjsjy" value="zyjsjy">职业技术教育院</option>
                                <option id="nz" value="nz">女子学院</option>
                                <option id="gjwhjl" value="gjwhjl">国际文化交流院</option>
                                <option id="zd" value="zd">中德学院</option>
                                <option id="zdgc" value="zdgc">中德工程学院</option>
                                <option id="zfgchgl" value="zfgchgl">中法工程和管理学院</option>
                                <option id="zy" value="zy">中意学院</option>
                                <option id="hjycxfz" value="hjycxfz">环境与持续发展学院&nbsp;联合国环境桂花署</option>
                                <option id="swyxgc" value="swyxgc">生物医学工程与纳米科学研究院</option>
                                <option id="zx" value="zx">中西学院</option>
                                <option id="xdnykx" value="xdnykx">现代农业科学与工程研究院</option>
                            </select>
                            </div>
                </div>
                 <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">邮箱：</label>
                            </div>
                            <div class="col-md-3">
                               <input type="text" id="Email" name="Email" value="<!-获取原用户信息-->" required=""/>
                            </div>
                </div>
                <div class="form-group">
                            <div class="col-md-2">
                                <label class="control-label">手机号码：</label>
                            </div>
                            <div class="col-md-3">
                                <input  type="text" id="phone" name="phone" value="<!-获取原用户信息-->" required=""/>
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

