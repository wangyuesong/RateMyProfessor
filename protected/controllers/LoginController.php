<?php

class LoginController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
     public function init()  
    {  
        $this->layout='loginLayout';  
    }  
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
        
public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('showUserInfo','editUserInfo'),
				'users'=>array('*'),
			)
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
		);
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
        public function actionUserRegister()
        {
            $academy = new Academy;
            $array_academyList = array();
            $model_academyList = Academy::model()->findAll();
            foreach($model_academyList as $item)
            {
                $array_academyList[$item->name] = $item->name;
            }
             $this->render('userRegister',array(
                 'model'=> $academy,
                 'academyList' => $array_academyList
             ));  
        }
         public function actionUserLogin()
        {
            $this->render('userLogin');
        }
           public function actionUserLogout()
        {
          Yii::app()->user->logout(); 
           $this->redirect(array('home/index'));
        }
        //Above is navigation
        
        public function actionUserSubmitRegister()
        {
           $model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['account']))
		{
                      $model->account=$_POST['account'];
                       $model->password=$_POST['password'];
                       $model->name=$_POST['userNiceName'];
                       
                       $aca=implode('',$_POST['Academy']);
                       $model->academy=$aca;
                       //POST返回的是数组。。。很奇怪，需要转换成string才能存进数据库
                       $model->gender= (int)($_POST['gender']);
                       $model->email=$_POST['Email'];
                       $model->phone=$_POST['phone'];
                       $model->question = $_POST['question'];
                       $model->answer = $_POST['answer'];
			if($model->save())
			{
                            $this->render('userLogin');   
                        }
                      else
                       {
                        $this->render('userRegister'); 
                       }
                }  
        }
       
	public function actionUserAuthenticate()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
            $username = $_POST['user_Name'];
            $password = $_POST['password'];
   $identity=new UserIdentity($username,$password);
if($identity->authenticate()) 
{
    Yii::app()->user->login($identity); 
   Yii::app()->request->redirect(Yii::app()->user->returnUrl);
}
else 
//echo $identity->errorMessage;
//echo '';
{
		 $this->render('userLogin'); 
}
	}

      public function actionFailed()
      {
          echo '';
          
      }

	/**
	 * This is the action to handle external exceptions.
	 */
}