<?php
 $link = mysqli_connect('localhost:3307','root','rootroot','dbp');
 $query = "SELECT * FROM topic";
 $result = mysqli_query($link, $query);
 $list ='';
 while ($row = mysqli_fetch_array($result)) {
 $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
 }
 $article = array(
 'title' => 'I Love 덥뮤다 ',
 'description' => '한국 남성 보이그룹 더보이즈 버뮤다 삼각지대'
 );
 if( isset($_GET['id'])) {
 $query = "SELECT * FROM topic WHERE id={$_GET['id']}";
 $result = mysqli_query($link, $query);
 $row = mysqli_fetch_array($result);
 $article = array(
 'title' => $row['title'],
 'description' => $row['description']
 );
 }
 ?>


 <!DOCTYPE html>
 <html>
  <head>
  <meta charset="utf-8">
  <title> 더보이즈 짱보이즈 </title>
  </head>
  <body>
  <h1><a href="index.php"> 더보이즈 짱보이즈 </a></h1>
  <ol><?= $list ?></ol>
  <a href="create.php">~멤버 추가하기~</a>
  <h2><?= $article['title'] ?></h2>
  <?= $article['description'] ?>
  </body>
 </html>
