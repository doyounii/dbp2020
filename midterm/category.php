<?php
  $link = mysqli_connect('localhost:3307', 'root', 'rootroot', 'sakila');

  if (mysqli_connect_errno()) {
      echo "Failed to connect to MariaDB: " . mysqli_connect_error();
      exit();
  }

  settype($_GET['name'], 'string');
  $filtered_number = mysqli_real_escape_string($link, $_GET['name']);

  $query = "SELECT c.name, f.title, f.film_id, f.length FROM film f
            inner join film_category fc ON fc.film_id = f.film_id
            inner join category c ON c.category_id = fc.category_id
            where c.name = '".$filtered_number."'  LIMIT 15";

  $result = mysqli_query($link, $query);
  $film = '';

  while ($row = mysqli_fetch_array($result)) {
      $film .= '<tr>';
      $film .= '<td>'.$row['name'].'</td>';
      $film .= '<td>'.$row['film_id'].'</td>';
      $film .= '<td>'.$row['title'].'</td>';
      $film .= '<td>'.$row['length'].'</td>';
      $film .= '<td>
            <form action="process_borrow.php" method="post">
                <input type="hidden" name="id" value="'.$row['name'].'">
                <input type="submit" value="대여하기">
            </form></td>
        ';
      $film .= '</tr>';
  }
  ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>영화 대여 사이트</title>
    </head>

    <body>
        <h2><a href="index.php">카테고리 별 영화 목록</a> </h2>
        <table border="1">
            <tr>
               <th>name</th>
               <th>film_id</th>
                <th>title</th>
                <th>length</th>
                <th>대여하기</th>
            </tr>
            <?= $film ?>

        </table>
    </body>

    </html>
