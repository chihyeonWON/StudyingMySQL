<?php  
    $conn = mysqli_connect("127.0.0.1","root","h20048686","opentutorials");

    $sql = "SELECT * FROM topic";
    $result = mysqli_query($conn,$sql);
    $list = '';

    while($row = mysqli_fetch_array($result)){
        $escaped_title = htmlspecialchars($row['title']);
        $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
    }
    $article = array(
        'title' => 'Welcome',
        'description' => 'Hello, web'
    );

    $update_link = '';

    //sql문을 서버에 전달하고 변수에 값 담기
    if(isset($_GET['id'])) {
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $article['title'] = htmlspecialchars($row['title']);
        $article['description'] = htmlspecialchars($row['description']);
        $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <ol>
            <?= $list ?>
        </ol>
        <form action="process_create.php" method="post">
            <p><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"></p>
            <p><textarea name="description" placeholder="description"><?=$article['description']?></textarea></p>
            <p><input type="submit"></p>
        </form>
        <h2>Welcome</h2>
        Lorem ipsum dolor sit amet consectetur adipisicing elit.
    </body>
</html>