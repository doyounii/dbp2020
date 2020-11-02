<?php
  $link = mysqli_connect('localhost:3307', 'root', 'rootroot', 'sakila');

  if (mysqli_connect_errno()) {
      echo "Failed to connect to MariaDB: " . mysqli_connect_error();
      exit();
  }

?>


  <!DOCTYPE html>
  <html>

  <head>
      <meta charset="utf-8">
      <title>영화 대여 사이트</title>


  </head>


  <body>
    <h3>
      <h2><a href="index.php">영화 대여 사이트</a> <h2>

      <form action="year.php" method="GET">
        원하는 대여일 이상 대여 가능한 영화 목록 :
        <input type="text" name="num" placeholder="day">
        <input type="submit" value="Select"></br>
      </form>



       <form action="category.php" method="GET">
         카테고리 별 영화 검색 :
         <input type="text" name="name" placeholder="category">
         <input type="submit" value="Select"></br>
      </form>

      <h2><a href="time.php">상영시간 별 영화 검색</a> <h2>
      <h2><a href="customer.php">가장 영화를 많이 본 고객 TOP 15 </a> <h2>  
        </h3>
  </body>

  </html>
