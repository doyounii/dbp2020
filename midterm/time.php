<?php
  $link = mysqli_connect('localhost:3307', 'root', 'rootroot', 'sakila');

  if (mysqli_connect_errno()) {
      echo "Failed to connect to MariaDB: " . mysqli_connect_error();
      exit();
  }


  $query = "SELECT film_id,title, length FROM film
        where  length < 60  limit 10
       ";

 $result = mysqli_query($link, $query);
 $film1 = '';
     while ($row = mysqli_fetch_array($result)) {
         $film1 .= '<tr>';
         $film1 .= '<td>'.$row['film_id'].'</td>';
         $film1 .= '<td>'.$row['title'].'</td>';
         $film1 .= '<td>'.$row['length'].'</td>';
         $film1 .= '<td>
               <form action="process_borrow.php" method="post">
                   <input type="hidden" name="id" value="'.$row['title'].'">
                   <input type="submit" value="대여하기">
               </form></td>
           ';
         $film1 .= '</tr>';
     }
     mysqli_free_result($result);

       $query = "SELECT film_id,title, length FROM film
             where  length > 60 and length <90 limit 10
            ";

      $result = mysqli_query($link, $query);
      $film = '';
          while ($row = mysqli_fetch_array($result)) {
              $film .= '<tr>';
              $film .= '<td>'.$row['film_id'].'</td>';
              $film .= '<td>'.$row['title'].'</td>';
              $film .= '<td>'.$row['length'].'</td>';
              $film .= '<td>
                    <form action="process_borrow.php" method="post">
                        <input type="hidden" name="id" value="'.$row['title'].'">
                        <input type="submit" value="대여하기">
                    </form></td>
                ';
              $film .= '</tr>';
          }
          mysqli_free_result($result);
          $query = "SELECT film_id,title, length FROM film
                where  length > 90 limit 10
               ";

          $result = mysqli_query($link, $query);
          $film2 = '';
             while ($row = mysqli_fetch_array($result)) {
                 $film2 .= '<tr>';
                 $film2 .= '<td>'.$row['film_id'].'</td>';
                 $film2 .= '<td>'.$row['title'].'</td>';
                 $film2 .= '<td>'.$row['length'].'</td>';
                 $film2 .= '<td>
                       <form action="process_borrow.php" method="post">
                           <input type="hidden" name="id" value="'.$row['title'].'">
                           <input type="submit" value="대여하기">
                       </form></td>
                   ';
                 $film2 .= '</tr>';
             }
        mysqli_close($link);

?>
  <!DOCTYPE html>
  <html>

  <head>
      <meta charset="utf-8">
      <title>영화 대여 사이트</title>
  </head>

  <body>
      <h2><a href="index.php">상영 시간대 별 영화 목록 </a> </h2>

      <h4>상영시간 60분 이하 영화 목록</h4>
      <table border="1">
          <tr>
             <th>film_id</th>
              <th>title</th>
              <th>length</th>
              <th>대여하기</th>
          </tr>
          <?= $film1 ?>
        </table>
          <h4>상영시간 60분~90분 영화 목록</h4>
          <table border="1">
              <tr>
                 <th>film_id</th>
                  <th>title</th>
                  <th>length</th>
                  <th>대여하기</th>
              </tr>
              <?= $film ?>

      </table>

      <h4>상영시간 90분 이상 영화 목록</h4>
      <table border="1">
          <tr>
             <th>film_id</th>
              <th>title</th>
              <th>length</th>
              <th>대여하기</th>
          </tr>
          <?= $film2 ?>

  </table>
  </body>

  </html>
