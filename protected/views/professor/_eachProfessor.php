<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
  $allCoursesComments = Coursecomment::model()->findAll('course_id=:courseid',array(':courseid'=>$data->course_id));
  $totalGrade = 0 ;
  $count = 0 ;
   foreach($allCoursesComments as $oneCourseComment)
                    {
                        $totalGrade += $oneCourseComment->commentgrade;
                        $count ++;
                    }
     $oneCourseAverageGrade = $totalGrade/$count;    
//     $short_pi = "3.14159";
$oneCourseAverageGrade = number_format($oneCourseAverageGrade, 2);
//echo $my_pi."\n";   // 3.14
     //找到某一门课的总评分
     
     $allTeachersComments = Teachercomment::model()->findAll('teacher_id=:teacherid',array(':teacherid'=>$data->teacher_id));
  $totalGrade1 = 0 ;
  $count1 = 0 ;
   foreach($allTeachersComments as $oneTeacherComment)
                    {
                        $totalGrade += $oneTeacherComment->commentgrade;
                        $count ++;
                    }
     $oneTeacherAverageGrade = $totalGrade/$count;   
     $oneTeacherAverageGrade = number_format($oneTeacherAverageGrade, 2); 
?>
<tr>
    
    <td><?php echo CHtml::link(CHtml::encode($data->name),array('/courses/eachCourse','courseName'=>$data->name));?></td>
    <td><?php echo $data->course_starttime . " -- " . $data->course_endtime ;?></td>
    <td><?php echo $data->add_time?></td>
     <td><?php echo $oneCourseAverageGrade?></td>
</tr>

