<?php
	//Db connection 
	function dbcon($localhost,$dbusername,$dbpassword,$dbname){
		$dbconnection = mysqli_connect("$localhost","$dbusername","$dbpassword","$dbname");
		if(!$dbconnection){
			echo "Database Connection Error Error";
		}

	//dbcon('localhost','root','','eexams');

		return $dbconnection;
	}

	//=================================================================================================//

	//Login
	function login($username,$password,$submit){
		$con = dbcon('localhost','root','','eexams');
		if(isset($_POST["$submit"])){
			$username =htmlspecialchars(mysqli_real_escape_string($con,$_POST['username']));
			$password =htmlspecialchars(mysqli_real_escape_string($con,$_POST['password']));
			if($username == Null || $password == Null){
				echo 'NICE TRY fields can not be empty<br>';

			}



			$sql = "SELECT * FROM students WHERE username='".$username."' AND password='".$password."' ";
			$result = mysqli_query($con, $sql);
			if($result){
				//echo "Query Done";
			}
			$student = mysqli_fetch_all($result);
			if(count($student) > 0){
				echo "login page";
				//redirect to specific page
 			}else{
 				echo "Try Again with another username or password";
 				//redirect to specific page
 			}
 		
		
		
		}

	}
	//practice
	login('username','password','login');
	
	//=================================================================================================//
	//Register
	function signup($uname,$upass,$uemail,$submit){
		$con = dbcon('localhost','root','','eexams');

		if(isset($_POST["$submit"])){
		if($_POST["$uname"] != null) {
		$uname1 =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$uname"]));
		}else{
			echo "User name can not be empty<br>";
		}
		if($_POST["$upass"] != null) {
		$upass1 =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$upass"]));
		}else{
			echo "Password can not be empty<br>";
		}
		if($_POST["uemail"] != null) {
		$uemail1 =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$uemail"]));
		}else{
			echo "Enail can not be empty<br>";
		}
		if($uname1 != null and $upass1 != null and $uemail1 !=null){
		$sql = "INSERT INTO students (username,password,email) values('".$uname1."','".$upass1."','".$uemail1."')";
		$result = mysqli_query($con,$sql);
		if($result){
			header('location:test.php');
		}
		header('location:StudentFunctions.php');
	}
	

	}

	}
	signup('uname','upass','uemail','signup');
	//=================================================================================================//
	//Show student data
	function ShowStudntData(){
		$con = dbcon('localhost','root','','eexams');
		if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT * FROM students WHERE id = '".$id."'";
		$result = mysqli_query($con,$sql);
		$studentrecord = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$i=0;
		while (count($studentrecord) > $i) {
			echo "id : ". $studentrecord[$i]["id"] ."<br>";
			echo "username :".$studentrecord[$i]["username"]."<br>";
			echo "password : ".$studentrecord[$i]["password"]."<br>";
			$i++;
		}
	}

	}
	//	ShowStudntData();
	//=================================================================================================//
	function ShowStudents(){
		$con = dbcon('localhost','root','','eexams');
		$sql = "SELECT * FROM students";
		$student=mysqli_fetch_all( mysqli_query($con,$sql),MYSQLI_ASSOC);
		$i=0;
		while(count($student) > $i){
			echo "Student Name : ".$student[$i]['username']."<br>";
			$i++;
		}
	}
	//=================================================================================================//
	//Show Faculty lvls
	function lvls(){
		$con = dbcon('localhost','root','','eexams');
		$sql = "SELECT * FROM lvls";
		$lvl=mysqli_fetch_all( mysqli_query($con,$sql),MYSQLI_ASSOC);
		echo "<h3>Faculty lvls </h3>";
		foreach ($lvl as $l ) {
			echo "<form action='StudentFunctions.php' method='GET'>";
			echo $l['id']." :: ".$l['name']." <input name='Delete' type='submit' value='dellvl?id=". $l['id'] ."'><br>";
			echo "</form>";
		}
		echo "<input>";
		echo "<select>";
		foreach ($lvl as $l ) {
			echo "<option>".$l['id']."</option>";
		}
		echo "</select><br>";
		echo "
		<form method='post' action='StudentFunctions.php'>
		<input value='Add new level' type='submit' name='addlvl'>
		</form>";
		if(isset($_POST['addlvl'])){
			$sql2="INSERT INTO lvls (name) values('test')";
			$res= mysqli_query($con,$sql2);
			if($res){
				header('location:test.php');
			}
			header('location:StudentFunctions.php');
		}
		if(isset($_GET['Delete'])){
			$id=$_GET['Delete'];
			$sql3="DELETE FROM lvls WHERE id ='$id'";
			$result=mysqli_query($con,$sql3);
			if($result){
				header("location:test.php");
			}
			header("location:StudentFunctions.php");
		}
	
	}	
	//=================================================================================================
	function viewQuestions(){
		$con = dbcon('localhost','root','','eexams');
		$sql ="SELECT * FROM questions ";
		$res = mysqli_query($con,$sql);
		$que = mysqli_fetch_all($res,MYSQLI_ASSOC);
		echo "<h5> Select your question </h5>";
		echo "
		<form action='StudentFunctions.php' method='post'>
		<select name='questions'>";
 		foreach($que as $q){

 			echo "<option value='".$q['type']."'> ".$q['type']."<br> </option>";
 		}
 		echo "</select>
 		<input type='submit' value='ok' name='que'>
 		</form>";
 		if(isset($_POST['que'])){
 			$questions = $_POST['questions'];
 			echo "Specific Question id :". $questions."<br>";
 		}
 		

	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<!-- Login function-->
 	<H1>LOGIN</H1>
 	<form action="StudentFunctions.php" method="POST">
 		username <input type="text" name="username" required="">
 		password <input type="password" name="password" required="">
 		<input type="submit" name="login">
 	</form>

 	<H1>Register</H1>
 	<form action="StudentFunctions.php" method="POST">
 		username <input type="text" name="uname">
 		password <input type="password" name="upass">
 		email	 <input type="email" name="uemail">
 		<input type="submit" name="signup">
 		
 	</form>
 	<h1>Show student single record</h1>
 	<?php 	ShowStudntData(); ?>
 	<h1>Show all students  records</h1>
 	<?php ShowStudents(); ?>
 	<br>
 	<hr>
 	<?php lvls(); ?>
 	<h1>Questions to each chapter</h1>
 	<?php viewQuestions(); ?>

 	<form method="POST" action="StudentFunctions.php">
 	 	<h5>Content</h5>
 			<input type='text' name='content' style='width:400px;height:100px;'><br>
 			Correct Answer<input type='text' name='true'><br>
 			Wrong Answer<input type='text' name='false'><br>
 			Difficulty 
 			<select>
 				<option value="A">A</option>
 				<option value="B">B</option>
 				<option value="C">C</option>
 			</select>
 			<input type="submit" name="sendmcq" value="Send">
 	</form>

 </body>
 </html>