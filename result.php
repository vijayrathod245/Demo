<?php 
include('db.php');
if($_POST['action']=='insert'){
    $firstname = $_POST['firstname'];
    $gender = $_POST['gender'];
    $hobby =implode(",",$_POST['hobby']);

   $qry = "insert into student(`firstname`,`gender`,`hobby`)values('$firstname','$gender','$hobby')";
   mysqli_query($conn, $qry);
   //header("location:view.php");
}
?>