<?php
error_reporting(0);
class SearchController extends Controller
{
    public function init()
    {
        $this->layout='homeMain';
    }
    public function  actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'blackColor'=>0xFFFFFF,
            ),
            'page'=>array(
                'class'=>'CViewAction',
            )
        );
    }
    
    public function actionShow()
    {
        $course = null;
        $teacher = null;
         $this->render('search',array('course'=>$course,'teacher'=>$teacher,));
         
    }
    
    public function actionSearch()
    {
        $CourseDataProvider = null;
        $TeacherDataProvider = null;
        $query = $_POST['query'];
        $way = $_POST['way'];
        
        if($way == 'course'){
            $criteria = new CDbCriteria;
            $criteria->condition = "name like '%".$query."%'";
            $criteria->select = 'name,academy,teacher_id';
            $CourseDataProvider = new CActiveDataProvider('Course',array(
                'criteria'=>$criteria,
                'pagination'=>array(  
                   'pageSize'=>10,  
               ),
            ));
            //$course = Course::model()->findAll($criteria);
            
        }
        elseif ($way == 'professor') {
            $criteria = new CDbCriteria;
            $criteria->condition = "name like '%".$query."%'";
            $criteria->select = "teacher_id,name,academy";
            $TeacherDataProvider = new CActiveDataProvider('Teacher',array(
                'criteria'=>$criteria,
                'pagination'=>array(  
                   'pageSize'=>10,  
               ),
            ));
            //$teacher = Teacher::model()->findAll($criteria);
        }
        $this->render('search',array('CourseDataProvider'=>$CourseDataProvider,'TeacherDataProvider'=>$TeacherDataProvider));
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

