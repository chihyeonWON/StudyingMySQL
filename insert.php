<?php
    //$mysqli = mysqli_connect("example.com", "user", "password", "database");
    //$result = mysqli_query($mysqli, "SELECT 'Please do not use the deprecated mysql extension for new development. ' AS _msg FROM DUAL");
    // $row = mysqli_fetch_assoc($result);
    //echo $row['_msg'];
    $conn = mysqli_connect("127.0.0.1","root","h20048686","opentutorials");
    $sql = "
        INSERT INTO topic (
            title,
            description,
            created
        ) VALUES (
            'MySQL',
            'MySQL is ...',
            NOW()
        )";
        mysqli_query($conn, $sql);
        echo mysqli_error($conn);
?>