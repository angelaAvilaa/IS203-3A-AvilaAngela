<?php
require ('./Database.php');


if (isset($_POST['create'])){
    $Name = $_POST['Name'];
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    
    $querryCreate = " INSERT INTO tbl3aaa VALUES (null, '$Name', '$UserName', '$Password')";
    $sqlcreate = mysqli_query($connection, $querryCreate);

    echo '<script>alert("Successfully Created!")</script>';
    echo '<script>window.location.href ="/ANGELA3A/Admin.php"</script>';
}
?>