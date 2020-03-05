<?php 
echo $_SESSION['level'];
echo $_SESSION['department'];
echo $_SESSION['id'];
echo $_SESSION['subject_id'];
$con = mysqli_connect('localhost','root','','e-examsproject');




$register_subjects =mysqli_query($con,"SELECT * FROM subjects where department=".$_SESSION['department']." AND level=".$_SESSION['level']." ");
$register_subjects_result = mysqli_fetch_all($register_subjects,MYSQLI_ASSOC);





function GetSubjectHours($id){

	$con = mysqli_connect('localhost','root','','e-examsproject');
	$get_subject_hours = mysqli_query($con,"SELECT * FROM subjects where id ='".$id."' ");
	$get_subject_hours_result = mysqli_fetch_all($get_subject_hours,MYSQLI_ASSOC);
	return $get_subject_hours_result[0]['hours'];
}

function Check_subject($id,$subid){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$Check_subject_exist = mysqli_query($con,"SELECT * FROM student_subjects WHERE 
		(student_id='$id') AND (subject_id ='$subid')" ) ;
	$Check_subject_exist_res = mysqli_fetch_all($Check_subject_exist,MYSQLI_ASSOC);
	if(count($Check_subject_exist_res) > 0){
		return false;
	}else{
		return true;
	}	
}