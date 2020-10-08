<?php
    $link = mysqli_connect('localhost:3307', 'root', 'rootroot', 'dbp');

    $query = "SELECT * FROM author";
    $result = mysqli_query($link, $query);
    $author_info = '';
    while ($row = mysqli_fetch_array($result)) {
        $filtered = array(
            'id' => htmlspecialchars($row['id']),
            'name' => htmlspecialchars($row['name']),
            'profile' => htmlspecialchars($row['profile'])
        );
        $author_info .= '<tr>';
        $author_info .= '<td>'.$filtered['id'].'</td>';
        $author_info .= '<td>'.$filtered['name'].'</td>';
        $author_info .= '<td>'.$filtered['profile'].'</td>';
        $author_info .= '<td><a href="author.php?id='.$filtered['id'].'">update</a></td>';
        $author_info .= '<td>
            <form action="process_delete_author.php" method="post">
                <input type="hidden" name="id" value="'.$filtered['id'].'">
                <input type="submit" value="delete">
            </form></td>
        ';
        $author_info .= '</tr>';
    };

    $escaped = array(
        'name' => '',
        'profile' => ''
    );

    $label_submit = 'Create';
    $form_action = 'process_create_author.php';
    $form_id = '';

    if (isset($_GET['id'])) {
        $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
        settype($filtered_id, 'integer');
        $query = "SELECT * FROM author WHERE id = {$filtered_id}";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        $escaped['name'] = htmlspecialchars($row['name']);
        $escaped['profile'] = htmlspecialchars($row['profile']);
        $label_submit = 'Update author';
        $form_action = 'process_update_author.php';
        $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
    };
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DATABASE</title>
    </head>
    <body>
        <h1><a href="index.php">더보이즈 짱보이즈</a></h1>
        <p><a href="index.php">선곡 리스트</a></p>

        <table border="1">
            <tr>
                <th>번호</th>
                <th>노래 제목</th>
                <th>작곡가</th>
                <th>update</th>
                <th>delete</th>
            </tr>
            <?= $author_info ?>
        </table>
        <br>
        <form action="<?=$form_action?>" method="post">
            <?=$form_id?>
            <label for="fname">노래 제목:</label><br>
            <input type="text" id="name" name="name" placeholder="name" value="<?=$escaped['name']?>"><br>
            <label for="lname">자곡가:</label><br>
            <input type="text" id="profile" name="profile" placeholder="profile" value="<?=$escaped['profile']?>"><br><br>
            <input type="submit" value="<?=$label_submit?>">
        </form>
    </body>
</html>
