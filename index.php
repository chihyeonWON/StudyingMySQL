<?php  
                $conn = mysqli_connect("127.0.0.1","root","h20048686","opentutorials");

                $sql = "SELECT * FROM topic";
                $result = mysqli_query($conn,$sql);
                $list = '';

                while($row = mysqli_fetch_array($result)){
                    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
                }
                //sql문을 서버에 전달하고 변수에 값 담기
                $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                $article = array(
                    'title' => $row['title'], //배열의 인덱스가 숫자가 아닌 문자 title로 연관배열이라고 한다.
                    'description' => $row['description']
                );
            ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>WEB</h1>
        <ol>
            <?= $list ?>
        </ol>
        <a href="create.php">create</a>
        <h2><?=$article['title']?></h2>
        <?=$article['description'];?>
    </body>
</html>