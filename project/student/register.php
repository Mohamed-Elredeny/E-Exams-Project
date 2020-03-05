<?php include('C:\xampp1\htdocs\E Exams Project\php\student\register.php'); ?>
<?php include('C:\xampp1\htdocs\E Exams Project\php\dbcon.php'); ?>
<?php  signup('stdname','stdpassword','stdemail','stduniversity','stdfacility','stdlevel','stddepartment' ,'std-register'); ?>
<link rel="stylesheet" type="text/css" href="http://localhost/E%20Exams%20Project/style/css/student/register.css">

<div class="student-signup-form">
	<form action="register.php" method="POST">
		<h3>E-exams Sign up </h3>
		<h5>Already have account? <a href="http://localhost/E%20Exams%20Project/project/student/login.php">  Login</a></h5>

		

		<label class="txt1">Name</label>
		<input type="txt" name="stdname" class="inp1">

		<label class="txt1">Email</label>
		<input type="Email" name="stdemail" class="inp1">

		<label class="txt1">Password</label>
		<input type="Password" name="stdpassword" class="inp1">

		<label class="txt1">University</label>
		<select name="stduniversity" class="sel1">
			<?php foreach($universities as $uni){ ?>
			<option value="<?php echo $uni['id'] ?>"><?php echo $uni['id'] ?></option>
			<?php } ?>
		</select>

		<label class="txt1">Facility</label>
		<select name="stdfacility" class="sel1">
			<?php foreach($faculties as $fac){ ?>
			<option value="<?php echo $fac['id'] ?>"><?php echo $fac['id']; ?></option>

		<?php } ?>
		</select>


		<label class="txt1">Level</label>
		<select name="stdlevel" class="sel1">
			<?php foreach($levels as $lev){ ?>
			<option value="<?php echo $lev['id'] ?>"><?php echo $lev['id'] ?></option>
		<?php } ?>
		</select>


		<label class="txt1">Department</label>
		<select name="stddepartment" class="sel1">
			<?php foreach($departments as $dep){ ?>
			<option value="<?php echo $dep['id'] ?>"><?php echo $dep['id']; ?></option>
		<?php } ?>
		</select>



  <button type="submit" class="btn btn-primary mb-2"  style="margin-top: 50px" name="std-register">Sign up</button>

	</form>
</div>

<?php include ('../../php/header.php'); ?>

<?php include('../../php/footer.php'); ?>