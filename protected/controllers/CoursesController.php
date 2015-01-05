<?php

class CoursesController extends Controller
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
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
        
        
        public function actionCourseList()
        {
//             $dataProvider = new CActiveDataProvider('Course');
            $criteria = new CDbCriteria;
            $criteria->order = 'academy DESC';
             $allCourses = Course::model()->findAll($criteria);
             $coursesArray = array();
             
             $count =  0;
           
             foreach($allCourses as $oneCourse)
             {
                   /* @var $oneCourse Course */
                   $duplicate = 0;
                foreach($coursesArray as $checkedCourse)
                {
                    if($checkedCourse['name'] == $oneCourse->name )
                        $duplicate = 1;
                }
                //先检查是否有重复的课程
                //有，不加入array
                if($duplicate == 1)
                {
                    $duplicate = 0;
                    continue;
                }
                //否则就加入array
                else
                 {
                     $coursesArray[$count++] = array('name'=>$oneCourse->name);
                 }
              
                 
             }
             
              $dataProvider=new CArrayDataProvider($coursesArray, array(  
                  'keyField'=>'name',
               'id'=>'name',  
               'pagination'=>array(  
                   'pageSize'=>15,  
               ),  
           ));  
             
            $this->render('courseList', array(
                'dataProvider'=>$dataProvider,
            ));
        }
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
            //1.课程信息
            $courseDetail = Course::model()->find('name=:name',array(':name'=>$courseName));
            //1.1课程分数
//            foreach()
            $allCourses = Course::model()->findAll('name=:name',array(':name'=>$courseName));
            $count = 0 ;
            $totalGrade = 0;
            
            
            //获取所有同名课程的总平均分的算法
            foreach($allCourses as $oneCourse)
                //已经找到了所有的同名课程
            {
                /* @var $oneCourse Course */
                 /* @var $oneCourseComment Coursecomment */
                //对于每一个同名课程，找到对应的所有评论
                $oneCourseId = $oneCourse->course_id;
                $allCoursesComments = Coursecomment::model()->findAll('course_id=:courseid',array(':courseid'=>$oneCourseId));
                    foreach($allCoursesComments as $oneCourseComment)
                    {
                        $totalGrade += $oneCourseComment->commentgrade;
                        $count ++;
                    }
            }
            if($count > 0)
            {
                $averageCourseGrade = $totalGrade/$count;
            }
            else 
            {
                $averageCourseGrade = 0;
            }
            $averageCourseGrade = number_format($averageCourseGrade,2);
            
            //2.列表显示的课程所有老师
             $criteria = new CDbCriteria();
              $criteria->addCondition("name= :name");     
          $criteria->params[':name']=$courseName;   
           $courseDataProvider=new CActiveDataProvider('Course', array(
         'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>10,
    )));

           //3.列表显示的课程所有评价
           $criteria = new CDbCriteria();
              $criteria->addCondition("coursename= :name");     
          $criteria->params[':name']=$courseName;   
           $commentDataProvider=new CActiveDataProvider('Coursecomment', array(
         'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>10,
    )));
           
            //5.找出所有的对应的书
           $criteria = new CDbCriteria();
              $criteria->addCondition("coursename= :coursename");     
          $criteria->params[':coursename']=$courseName;   
           $allBooks=new CActiveDataProvider('Coursebook', array(
         'criteria'=>$criteria,
    'pagination'=>array(
        'pageSize'=>10,
    )));
   
            
           
           //4.显示评论区的老师下拉列表,Course中已经包含了老师的信息，所以可以传所有这个名字的Course过去，然后从中选取老师信息填写在下拉单上
            $course = new Course;
            $array_allTeachersName = array();
            $criteria=new CDbCriteria;
            $criteria->condition='name=:name';
            $criteria->params=array(':name'=>$courseName);
//            $criteria->select= 'name';
            $model_allTeachersName=Course::model()->find($criteria);
            $allCourses = Course::model()->findAll($criteria);
           
            foreach($model_allTeachersName as $item)
            {
                $array_allTeachersName[$item] = $item;
            }
            
            
            
           
            
            $this->render("eachCourse",array(
                    'courseDetail'=>$courseDetail, //传出 该课的整体共性信息（名称，开设学院）
                    'courseDataProvider' => $courseDataProvider,
                    'commentDataProvider'=> $commentDataProvider,
                     //下面两个是下拉列表要用的
                    'model'=>$course,
                'averageCourseGrade' => $averageCourseGrade,//同名课程平均分
                    'allTeachersName'=>$array_allTeachersName,
                 'allBooks'=>$allBooks,
                    'allCourses'=>$allCourses)
              );  //由于可能有好几个老师开同样名称的课，在这里把所有符合条件的老师的信息都传出去
            
           
           
        }
        
         public function actionSubmitComments()
         {
             $model = new Coursecomment;
             
             if(Yii::app()->user->name != 'Guest')
             {
                 $teacher_id = $_POST['teacher'];
                 $commentWay = $_POST['commentWay'];
                 
                 $course_criteria = new CDbCriteria;
                 $course_criteria->condition = "name = '".$_POST['course_name']."' and teacher_id = ".$teacher_id;
                 $course = Course::model()->find($course_criteria);
                
                 $model->course_id = $course->course_id;
                 $model->coursename = $_POST['course_name'];
                 $model->teacher_id = $_POST['teacher'];
                 $model->title = $_POST['inputTitle'];
                 $model->content = $_POST['inputHF'];              
                 $model->account = Yii::app()->user->id;
                 if($commentWay == 1)
                     //实名评论
                 {
                     $model->user_name = Yii::app()->user->name;
                 }
                 else
                 {
                     $model->user_name = "匿名用户";
                 }
                 $model->commentgrade = $_POST['score'];
                 if($model->insert())
                 {
                     $this->redirect(array('eachCourse',"courseName"=>$_POST['course_name'],"flag"=>1));
                 }
                 else
                 {
                     $this->redirect(array('eachCourse',"courseName"=>$_POST['course_name'],"flag"=>2));
                 }
                 
             }
             else
             {
                 $this->redirect(array('login/userLogin'));
             }
             
         }
        
       
       
}