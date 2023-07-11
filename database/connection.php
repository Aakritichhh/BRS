<?php
$conn = mysqli_connect("localhost","root","","banquet");
if(mysqli_connect_error()){
    echo"<script>alert('cannot connect to the database');
    </script>";
    exit();
}

?>