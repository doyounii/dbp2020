<?php
    $link = mysqli_connect('localhost:3307', 'root', 'rootroot', 'sakila');
    settype($_POST['title'], 'string');
    $filtered_number = mysqli_real_escape_string($link, $_POST['title']);


      print('  대여에 성공했습니다. <a href="index.php">돌아가기</a>');
?>
