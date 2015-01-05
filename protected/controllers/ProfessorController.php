<?php

class ProfessorController extends Controller
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
        public function actionProfessorList()
        {
             $dataProvider = new CActiveDataProvider('teacher');
            $this->render('professorList', array(
                'dataProvider'=>$dataProvider,
            ));
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

         public function actionEachProfessor()
        {
             $totalGrade = 0;
             $count = 0;
             $averageGrade = 0;
             
             $professor_criteria = new CDbCriteria;
             $professor_criteria->condition = "teacher_id = ".$_GET['professorID'];
             $teacher = Teacher::model()->find($professor_criteria);
             $allTeacherGrades = Teachercomment::model()->findAll('teacher_id=:id',array(':id'=>$_GET['professorID']));
             foreach ($allTeacherGrades as $oneTeacherGrade)
             {
                 if($oneTeacherGrade->commentgrade != NULL)
                 {
                    $totalGrade += $oneTeacherGrade->commentgrade;
                    $count ++;
                 }
             }
             if($count > 0)
             {
                 $averageGrade = $totalGrade/$count;
             }
             else
             {
                 $averageGrade = 0;
             }
             $averageGrade = number_format($averageGrade,2);
             $course_criteria = new CDbCriteria;
             $course_criteria->addCondition("teacher_id= :id");
             $course_criteria->params[':id']=$_GET['professorID'];
             $courseDataProvider=new CActiveDataProvider('Course', array(
         'criteria'=>$course_criteria,
    'pagination'=>array(
        'pageSize'=>10,
        )));
            
             $criteria = new CDbCriteria();
             $criteria->addCondition("teacher_id= :id");     
             $criteria->params[':id']=$_GET['professorID'];   
             $teacherDataProvider=new CActiveDataProvider('Teachercomment', array(
         'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>10,
    )));

             $this->render('eachProfessor',array('teacher'=>$teacher,
                                                 'averageTeacherGrade'=>$averageGrade,
                                                 'courseDataProvider' => $courseDataProvider,
                                                 'teacherDataProvider'=> $teacherDataProvider));
        }
        
        public function actionSubmitComment()
        {
            
            
            $model = new Teachercomment;
            if(Yii::app()->user->name != "Guest")
            {
                $commentWay = $_POST['commentWay'];
            
                $model->title = $_POST['inputTitle'];
                $model->content = $_POST['inputHF'];
                $model->teacher_id = $_POST['teacher_id'];
                $model->commentgrade = $_POST['score'];
                $model->teachername = $_POST['teachername'];
            
                if($commentWay == 1)
                {
                   $model->account = Yii::app()->user->id;
                   $model->user_name = Yii::app()->user->name;
                }
                else 
                {
                    $model->account = Yii::app()->user->id;
                    $model->user_name = "guest";
                }
            
                
                if($model->insert())
                {
                    $this->redirect(array('eachProfessor',"professorID"=>$_POST['teacher_id'],"flag"=>1));
                }
                else {
                    $this->redirect(array('eachProfessor',"professorID"=>$_POST['teacher_id'],"flag"=>2));
                }
            }     
            else 
            {
                $this->redirect(array('login/userLogin'));
            }
        }
       
}