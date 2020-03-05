<?php 
$con = mysqli_connect('localhost','root','','e-examsproject');

$q1 = mysqli_query($con,"SELECT * FROM universities");
$universities =mysqli_fetch_all($q1,MYSQLI_ASSOC);

$q2 =mysqli_query($con,"SELECT * FROM faculties");
$faculties =mysqli_fetch_all($q2,MYSQLI_ASSOC);

$q3 = mysqli_query($con,"SELECT * FROM levels");
$levels =mysqli_fetch_all($q3,MYSQLI_ASSOC);


$q4 = mysqli_query($con,"SELECT * FROM departments");
$departments =mysqli_fetch_all($q4,MYSQLI_ASSOC);
