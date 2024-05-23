<?php 
// Developed and Designed by MUNYAKAZI Gad with 222004929 Reg number
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "otbap";
    //create connection
    $connection = mysqli_connect($servername,$username,$password,$dbname);
    //check connection
    if(!$connection){
        die("Connection failed: ".mysqli_connect_errno());
    }

    $id = $_POST['id'];
    $changepwd = password_hash($_POST['changepwd'],PASSWORD_DEFAULT);
    $sql = "UPDATE user SET password='$changepwd'   WHERE id='$id' ";
    if(mysqli_query($connection,$sql)){
        echo "<script>alert('Record updated successfully');</script>;";
        header("location: setting.php");
    } else {
        echo "Error updating record: ".mysqli_error($connection);
    }
    mysqli_close($connection);
?>