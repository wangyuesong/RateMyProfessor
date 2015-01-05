<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>


    
        
      <div class="addMainInfor">
          <div class="row">
              <div class="col-md-3">
                  <div class="list-group">
                      <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/userprofile/showUserInfo" class="list-group-item active">个人基本资料</a>
                      <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/userprofile/editUserInfo" class="list-group-item">编辑个人基本资料</a>
                      <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/userprofile/editUserPassword" class="list-group-item">修改密码</a>
                  </div>
              </div>
              <div class="col-md-9">
                  <div class="rightContainer">
        
        <form id="showUser" name="showUser" method="post"  class="form-horizontal">
            <div class="form-group">
                <div class="form-group">
                       <label style="color: #000066" class="control-label">用户名：</label>
                       &nbsp;&nbsp;<label>#获取原用户信息</label>
                </div>
                <div class="form-group">
                    <label style="color: #000066" class="control-label">昵称：</label>
                            &nbsp;&nbsp;<label>#获取原用户信息</label>
                </div>
                <div class="form-group">
                       <label style="color: #000066" class="control-label">所在学院：</label>
                       &nbsp;&nbsp;<label>#获取原用户信息</label>
                </div>
                 <div class="form-group">
                       <label style="color: #000066" class="control-label">邮箱：</label>
                       &nbsp;&nbsp;<label>#获取原用户信息</label>
                </div>
                <div class="form-group">
                       <label style="color: #000066" class="control-label">手机号码：</label>
                       &nbsp;&nbsp;<label>#获取原用户信息</label>
                </div>
              
            </div>

      </form>
                      </div>
          </div>
          
          
          
          
       </div>
     
    

    </div>
    
      
    
</html>
