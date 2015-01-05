<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<script src="<?php  echo Yii::app()->baseUrl ; ?>/js/jquery-1.11.0.js"></script>
   <script src="<?php  echo Yii::app()->baseUrl ; ?>/js/jqBootstrapValidation.js"></script>
          <script>
            $(function() {
                
                $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            });
        </script>
         <span style="float:left;">  
                已经注册？请直接  
         <a href="<?php echo Yii::app()->request->baseUrl; ?>/login/userLogin">  <strong >  登录</strong>  </a>  
         </span> 
        <hr/> 
        <form>
   
            
          
        </form>
        <form id="registerUser" name="registerUser" method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/login/userSubmitRegister">
            <table width="71%" border="0" align="left">  
                <tr><td style="font-family:verdana;
                        color: #666666; "  align="left"><strong>请完善用户资料</strong></td></tr>
                <tr>  
                     <div class="tab-pane active" id="register">
                    <td style="color: #0099cc" align="left"><strong>用  户  名:</strong></td> 
                   
                    <td> 
                   <div class="control-group">
    
    <div class="controls">
      <input type="text" maxlength="20" name="account" />
      <label class="control-label">*必须小于20个字符</label>
     
    </div>
  </div>
                    </td>  
                    </div>
                     </tr>  
               
                <tr>  
                    <td style="color: #0099cc" align="left"><strong>性  别：</strong></td> 
                    <td><label><input name="gender" type="radio" value="0" />男 </label>
              <label><input name="gender" type="radio" value="1" />女 </label>
                    </td>
                </tr>  
            
                <tr>  
                
                    <td style="color: #0099cc" align="left"><strong> 密  码：</strong></td>
                    
                    <td> <div class="control-group">
                             <input type="password"  name="password" 
                           />  *  
                             <p class="help-block"></p> </div>
                    </td>
               
                </tr> 
                
                <tr>  
                    <td style="color: #0099cc" align="left"><strong>确  认  密  码：</strong></td> 
                    <td> 
                      
                    <div class="control-group">
                             <input type="password"  name="repassword" data-validation-matches-match="password" data-validation-matches-message="两次输入密码不一致"
                            />  *  
                             <p class="help-block"></p> </div>
                    </td>  
                </tr>  
                 <tr>  
                     <td style="color: #0099cc" align="left"><strong>昵    称：</strong></td> 
                    <td> 
                    <input type="text" id="userNiceName" name="userNiceName" required />  *  </td>  
                </tr> 
                 <tr>  
                 
                       <td style="color: #0099cc" align="left"><strong>所  属  学  院：</strong></td> 
                    <td> 
                <p></p>
                    <?php
                    echo CHtml::activeDropDownList($model,'name',$academyList);
                    ?>* 
                    <p></p>
               
                    </td> 
                </tr>
               
              
                 <tr class="form-group control-group">  
               
                     
               
                     
                    <td style="color: #0099cc" align="left"><strong>邮    箱：</strong></td> 
                    <td  class="controls"> 
                        
                              <input type="text" id="Email" name="Email" required  type="email" />  *  </td>
                       
                          
              
                <tr class="form-group control-group">  
                    
                    <td style="color: #0099cc" align="left"><strong>手  机  号  码：</strong></td> 
                    <td class="controls"> 
                    <input type="text" id="phone" name="phone" required />  *  </td> 
                    
                </tr>
            <p></p>
                <tr class="form-group control-group"> 
                     
                      <td style="color: #0099cc" align="left"><strong>密 码 保 护 问 题:  </strong>
                    </td>  
                    <td class="controls">  <input type="text" id="question" name="question" />    </td> 
                     
                </tr>  
                  <p></p>
                <tr class="form-group control-group">  
                     
                    <td style="color: #0099cc" align="left"> <strong> 密 码 保 护 的 答 案: </strong>  </td>  
                    <td class="controls">  <input type="text" id="answer" name="answer" />     </td>  
                </tr>
                <tr><td><hr></td></tr>
                <tr>  <td >  <input type="submit" id="submit" value="注册" />  </td>  
                      
                </tr>  
            </table>    
            
  

            <table  >
                <tr>
                <td><image src="<?php echo Yii::app()->request->baseUrl; ?>/pictures/tj_huabiao.jpg"/></td></tr>
            </table>
      </form>
    
                        
