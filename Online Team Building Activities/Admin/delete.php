<?php
//Developed and Designed by MUNYAKAZI Gad with 222004929 Reg number
  $connection = new mysqli("localhost","root","","otbap");
  if(isset($_POST['stud_delete_btn'])){
      $id = $_POST['delete_stu_id'];
      $query = "DELETE FROM user WHERE id='$id'";
      $query_run = mysqli_query($connection,$query);
        if($query_run){
            header("Location: setting.php");
        } else {
            header("Location: setting.php");
        }
  }
?>