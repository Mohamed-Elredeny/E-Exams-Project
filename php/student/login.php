<?php 
	function login($username,$password,$submit){
		$con = mysqli_connect('localhost','root','','e-examsproject');
		if(isset($_POST["$submit"])){
			$username =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$username"]));
			$password =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$password"]));
			if($username == Null || $password == Null){
				echo 'NICE TRY fields can not be empty<br>';

			}



			$sql = "SELECT * FROM students WHERE email='".$username."' AND password='".$password."' ";
			$result = mysqli_query($con, $sql);
			if($result){
				//echo "Query Done";
			}
			$student = mysqli_fetch_all($result,MYSQLI_ASSOC);
			session_start();

			
		
			
		
			if(count($student) > 0){
				$_SESSION['id']=$student[0]["id"];

				header('location:http://localhost/E%20Exams%20Project/project/student/student-main-page.php');
 			}else{
 				echo "Try Again with another username or password";
 				//redirect to specific page
 			}
 		
		
		
		}


	}
?>