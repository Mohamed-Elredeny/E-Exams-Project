<?php
session_start(); 
$con = mysqli_connect('localhost','root','','e-examsproject');


$studentquery = mysqli_query($con,"SELECT * FROM students WHERE id = '".$_SESSION['id']."'");
$studentData = mysqli_fetch_all($studentquery,MYSQLI_ASSOC);

$studentsub = mysqli_query($con,"SELECT * FROM student_subjects WHERE student_id='".$_SESSION['id']."' ");
$studentsubjects = mysqli_fetch_all($studentsub,MYSQLI_ASSOC);

//subjects query with id
function subjectName($id){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$subject_query_with_id = mysqli_query($con,"SELECT * FROM subjects where id = '".$id."' ");
	$subject_query_with_id_result = mysqli_fetch_all($subject_query_with_id,MYSQLI_ASSOC);
	
	return $subject_query_with_id_result[0]['name'];
}

function subjectDoctors($Subname){
	$con = mysqli_connect('localhost','root','','e-examsproject');
	$doctor_subject= mysqli_query($con,"SELECT * FROM subjects where name = '".$Subname."'");
	$doctor_subject_result = mysqli_fetch_all($doctor_subject,MYSQLI_ASSOC);
	foreach ($doctor_subject_result as $key ) {
		
		$doctor_name = mysqli_query($con,"SELECT * FROM professors where id ='".$key['doctor']."'");
		$doctor_name_result = mysqli_fetch_all($doctor_name,MYSQLI_ASSOC);

		return $doctor_name_result[0]['name'];
	}

}

