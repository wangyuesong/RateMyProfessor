<?php

class HomeController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
    public function init()  
    {  
        $this->layout='homeMain';
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
            $AcademydataProvider = new CActiveDataProvider('Academy');
            
            $course_critetria = new CDbCriteria;
            $course_critetria->order = "course_id DESC";
            $course_critetria->limit = 3;
            $CoursedataProvidver = new CActiveDataProvider('Course',array(
                'criteria'=>$course_critetria,
                'pagination'=>FALSE,
            ));
            
            $teacher_critetria = new CDbCriteria;
            $teacher_critetria->order = "teacher_id DESC";
            $teacher_critetria->limit = 3;
            $TeacherdataProvidver = new CActiveDataProvider('Teacher',array(
                'criteria'=>$teacher_critetria,
                'pagination'=>FALSE,
            ));
            
            $topic_critetria = new CDbCriteria;
            $topic_critetria->order = "lastreplytime DESC";
            $topic_critetria->limit = 7;
            $TopicdataProvidver = new CActiveDataProvider('Topic',array(
                'criteria'=>$topic_critetria,
                'pagination'=>FALSE,
            ));
            
            $this->render('index', array(
                'AcademydataProvider'=>$AcademydataProvider,
                'CoursedataProvider'=>$CoursedataProvidver,
                'TeacherdataProvider'=>$TeacherdataProvidver,
                    'TopicdataProvider'=>$TopicdataProvidver
            ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
}