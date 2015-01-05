<?php
/* @var $this HomeController */
/* @var $data Course */
/*这个文件是显示该开设该课程的教师信息所用的view*/
?>


	<!--<b><?php // echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>-->
	
<?php 
  $allCoursesComments = Coursecomment::model()->findAll('course_id=:courseid',array(':courseid'=>$data->course_id));
  $totalGrade = 0 ;
  $count = 0 ;
   foreach($allCoursesComments as $oneCourseComment)
                    {
                        if($oneCourseComment->commentgrade != NULL)
                        {
                            $totalGrade += $oneCourseComment->commentgrade;
                            $count ++;
                        }  
                    }
     $oneCourseAverageGrade = $totalGrade/$count;    
//     $short_pi = "3.14159";
$oneCourseAverageGrade = number_format($oneCourseAverageGrade, 2);
//echo $my_pi."\n";   // 3.14
     //找到某一门课的总评分
     
     $allTeachersComments = Teachercomment::model()->findAll('teacher_id=:teacherid',array(':teacherid'=>$data->teacher_id));
  $totalGrade1 = 0 ;
  $count1 = 0 ;
  $oneTeacherAverageGrade = 0;
  $test = 0;
   foreach($allTeachersComments as $oneTeacherComment)
                    {
                        if($oneTeacherComment->commentgrade != NULL)
                        {
                            $totalGrade1 += $oneTeacherComment->commentgrade;
                            $count1 ++;
                        }                        
                    }
     if($count1 > 0)
     {
        $oneTeacherAverageGrade = $totalGrade1/$count1; 
     }
    else 
     {
         $oneTeacherAverageGrade = 0;
     }   
     $oneTeacherAverageGrade = number_format($oneTeacherAverageGrade, 2);
?>
<tr>
    
    <td><?php echo CHtml::link(CHtml::encode($data->teacher->name),array('/professor/eachProfessor','professorID'=>$data->teacher->teacher_id));?></td>
    <td><?php echo $data->course_starttime . " -- " . $data->course_endtime ;?></td>
    <td><?php echo $oneTeacherAverageGrade?></td>
    <td><?php echo $oneCourseAverageGrade?></td>
</tr>

    <!--<br>-->

