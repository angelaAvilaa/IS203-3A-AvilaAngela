<?php
require ('./Database.php');


if (isset($_POST['create'])){
    $Name = $_POST['Name'];
    $EmailAddress = $_POST['EmailAddress'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Concern = $_POST['Concern'];
    
    $querryCreate = " INSERT INTO cform VALUES (null, '$Name', '$EmailAddress', '$PhoneNumber', '$Concern')";
    $sqlcreate = mysqli_query($connection, $querryCreate);

   // echo '<script>alert("Successfully Created!")</script>';
    echo '<script>window.location.href ="/ANGELA3A/Form.php"</script>';
}
?>