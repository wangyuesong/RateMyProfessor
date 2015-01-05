<?php

class AcademyController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
     public function init()  
    {  
        $this->layout='academyMain';
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

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

        
         public function actionAcademyList()
        {
             $dataProvider = new CActiveDataProvider('Academy');
            $this->render('academyList', array(
                'dataProvider'=>$dataProvider,
            ));
        }
        
         public function actionEachAcademyCourses($name)
        {
            $criteria = new CDbCriteria();
            
            $criteria->addCondition("academy= :aca");     
          $criteria->params[':aca']=$name;    
            
            $dataProvider=new CActiveDataProvider('Course', array(
         'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>10,
    ),
       
));
//   $dataProvider = new CActiveDataProvider('Course');
            $this->render('eachAcademyCourses',array(
			'dataProvider'=>$dataProvider,
		));
        }
        
        
         public function actionEachAcademyTeachers($name)
        {
             $criteria = new CDbCriteria();
            
            $criteria->addCondition("academy= :aca");     
          $criteria->params[':aca']=$name;    
            
            $dataProvider=new CActiveDataProvider('Teacher', array(
         'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>10,
    ),
       
));
//   $dataProvider = new CActiveDataProvider('Course');
            $this->render('eachAcademyTeachers',array(
			'dataProvider'=>$dataProvider,
		));
        }
	//Above are redirect actions
        
        public function actionEachCourse($courseName)
        {
//             $criteria = new CDbCriteria();
//            
//            $criteria->addCondition("name= :n");     
//          $criteria->params[':n']=$courseName;    
//            
//            $courseDataProvider=new CActiveDataProvider('Course', array(
//         'criteria'=>$criteria,
//    ));
            $courseDetail = Course::model()->find('name=:name',array(':name'=>$courseName));
            $this->render("eachCourse",array('courseDetail'=>$courseDetail));
        }
       
}