<?php
require('./Database.php');

if (isset($_POST['delete'])){
    $deleteID  = $_POST['deleteID'];

    $querrydelete = " DELETE FROM cform WHERE ID = $deleteID";
    $sqlqdelete = mysqli_query($connection, $querrydelete);

    //echo '<script>alert("Successfully Deleted!")</script>';
    echo '<script>window.location.href ="/ANGELA3A/Form.php"</script>';

}

?>