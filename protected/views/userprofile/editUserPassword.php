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
   

    </div>
    
      
    </body>
</html>