<?php include('C:\xampp1\htdocs\E Exams Project\php\student\student-main-page.php') ?>
<?php include('C:\xampp1\htdocs\E Exams Project\php\student\student-register.php') ?>
<link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/student/student-main-page.css">


<?php 

if(isset($_GET['subid'])){
$_SESSION['subject_id'] = $_GET['subject_id'];
$subid = $_GET["subid"];
$insertSubForStudent = mysqli_query($con,"INSERT INTO student_subjects (student_id,subject_id) VALUES ('".$_SESSION['id']."','".$subid ."')");
if($insertSubForStudent){
	header('location:http://localhost/E%20Exams%20Project/project/student/student-main-page.php');
}
	header('location:http://localhost/E%20Exams%20Project/project/student/student-register.php');

}

?>

<!-- Start of the page -->
<?php foreach($studentData as $stddata){ ?>
<div class="student-content">

	<h3>welcome <?php echo $stddata['name']; ?></h3>
	<h5><a href="http://localhost/E%20Exams%20Project/project/student/student-main-page.php">Check your info</a></h5>
	<br><br>
	<div class="student-check-info">
		<label>level:</label>
		<label><?php $_SESSION['level']=$stddata['level'];
		echo $stddata['level']; ?></label>
		<br>
		<label>Department:</label>
		<label><?php  $_SESSION['department']=$stddata['department'];
		echo $stddata['department']; ?></label>

	<!-- Register subjects part -->
	<div>
		<label>Register Subjects</label>
		<table border="2px" style="display: inline-block;">
			<tr>
				<td>
				<h5>Subject Name</h5>
		
				</td>
				<td>
					<h5>Credit Hours</h5>	
				</td>
			</tr>
		
			
			
			<?php  foreach($register_subjects_result as $re){ ?>
			<tr>
			<?php if((Check_subject($_SESSION["id"],$re["id"] )) === true){ ?>	
				<td>
					<input type="button" name="" value="<?php echo $re['name'] ?>"> 
					<a href="student-register.php?subid= <?php echo $re['id'] ?>"  > <input type="button"  value="add"> </a>
				</td>
				<td>
					<h6><?php echo $re['hours']; ?></h6>
				</td>
			<?php } ?>
			</tr>
			<?php } ?>
	
		</table>
		<table border="2px">
			<tr>
				<td>
					<h5>Subject Name</h5>
					</td>
				<td>
					<h5>Credit Hours</h5>
				</td>
			</tr>
			
			<?php foreach($studentsubjects as $stdsub){  ?>
			<tr>
				<td>
					<h6><?php echo subjectName($stdsub['subject_id']) ?></h6>
				</td>
				<td>
					<h6><?php echo GetSubjectHours($stdsub['subject_id']); ?></h6>
				</td>
			</tr>
		<?php } ?>
		
		</table>
		<br><br><br><br><br><br>
	</div>

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