<?php include('C:\xampp1\htdocs\E Exams Project\php\student\student-main-page.php') ?>
<link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/student/student-main-page.css">


<?php 

echo $_SESSION['id'] ?>

<!-- Start of the page -->
<?php foreach($studentData as $stddata){ ?>
<div class="student-content">

	<h3>welcome <?php echo $stddata['name']; ?></h3>
	<h5><a href="http://localhost/E%20Exams%20Project/project/student/student-main-page.php">Check your info</a></h5>
	<br><br>

	<div class="student-check-info">
			</div>
<?php } ?>
	




</div>




<div class="student-slider" style="margin-top: 50px;">
	<ul>
		<li>
			<label><a href="http://localhost/E%20Exams%20Project/project/student/student-study.php" >Study</a></label>
		</li>
		<li>
			<label><a href="http://localhost/E%20Exams%20Project/project/student/student-register.php"> Register</a></label>
		</li>
		<li>
			<label><a href="http://localhost/E%20Exams%20Project/project/student/student-contact-doctor.php"> Contact Doctor</a></label>
		</li>
		<li>
			<label><a href="http://localhost/E%20Exams%20Project/project/student/student-check-grads.php"> Check grades</a></label>
		</li>
	</ul>
</div>


<!-- Header and footer -->
<?php include ('../../php/header.php'); ?>

<?php include('../../php/footer.php'); ?>