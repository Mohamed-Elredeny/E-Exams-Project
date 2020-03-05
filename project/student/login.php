<?php include('C:\xampp1\htdocs\E Exams Project\php\student\login.php'); ?>
<?php login('stdemail','stdpassword','login'); ?>
<link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/student/login.css">

<div class="student-login-form">
	<form action="login.php" method="POST">
		<h3>E-exams login up </h3>
		<h5>Dont have an account? <a href="http://localhost/E%20Exams%20Project/project/student/register.php"> Signup</a></h5>

		<label class="txt2">Email</label>
		<input type="Emai2" name="stdemail" class="inp2">

		<label class="txt2">Password</label>
		<input type="Password" name="stdpassword" class="inp2">



  <button type="submit" class="btn btn-primary mb-2"  style="margin-top: 50px" name="login"> Login </button>

	</form>
</div>

<?php include ('../../php/header.php'); ?>

<?php include('../../php/footer.php'); ?>