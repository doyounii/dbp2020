<?php
  $link = mysqli_connect('localhost:3307', 'root', 'rootroot', 'sakila');

  if (mysqli_connect_errno()) {
      echo "Failed to connect to MariaDB: " . mysqli_connect_error();
      exit();
  }

  settype($_GET['num'], 'integer');
  $filtered_number = mysqli_real_escape_string($link, $_GET['num']);

  $query = "SELECT * FROM film where rental_duration > '".$filtered_number."'  LIMIT 15";
  $result = mysqli_query($link, $query);
  $film = '';

  while ($row = mysqli_fetch_array($result)) {
      $film .= '<tr>';
      $film .= '<td>'.$row['film_id'].'</td>';
      $film .= '<td>'.$row['title'].'</td>';
      $film .= '<td>'.$row['rental_duration'].'</td>';
      $film .= '<td>'.$row['release_year'].'</td>';
      $film .= '<td>'.$row['rental_rate'].'</td>';
      $film .= '<td>'.$row['length'].'</td>';
      $film .= '<td>'.$row['replacement_cost'].'</td>';
      $film .= '<td>
            <form action="process_borrow.php" method="post">
                <input type="hidden" name="id" value="'.$row['title'].'">
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
      <h2><a href="index.php">원하는 대여일 이상 대여 가능한 DVD 목록</a> </h2>
      <table border="1">
          <tr>
             <th>film_id</th>
              <th>title</th>
              <th>최대 대여 가능일</th>
              <th>개봉 년도</th>
              <th>대여율</th>
              <th>상영 시간</th>
              <th>replacement_cost</th>
              <th>대여하기</th>
          </tr>
          <?= $film ?>

      </table>
  </body>

  </html>
