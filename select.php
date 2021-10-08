<?php
    $conn = mysqli_connect('127.0.0.1','root','h20048686','opentutorials');
    $sql = "SELECT * FROM topic";
    $result = mysqli_query($conn, $sql);
?>