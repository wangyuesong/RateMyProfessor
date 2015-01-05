<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReigstrationForm extends CFormModel
{
	public $account;
        public $password;
        public $name;
        public $gender;
        public $email;
        public $phone;
        public $photo;
        public $academy;
        public $visibility;
        public $question;
        public $answer;
        
      
       public function rules()
       {
              return array(
                     array('username, password', 'required'),
                     array('username', 'authenticate'),
              );
       }
       public function authenticate($attribute,$params)
       {
              if($this->username=='admin')
              $this->addError('username','can not login with admin!');
       }
}
                