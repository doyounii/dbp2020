<?php
  $link = mysqli_connect('localhost:3307', 'root', 'rootroot', 'sakila');

  $query = "SELECT x.customer_id, x.count, y.first_name, y.last_name, y.email FROM
    (SELECT customer_id, count(*) count FROM rental
    GROUP BY customer_id  ORDER BY count DESC
    LIMIT 15  )x JOIN  (SELECT*FROM customer)y
    ON x.customer_id=y.customer_id";

  $result = mysqli_query($link, $query);
  $film = '';


  while ($row = mysqli_fetch_array($result)) {
      $film .= '<tr>';
      $film .= '<td>'.$row['customer_id'].'</td>';
      $film .= '<td>'.$row['count'].'</td>';
      $film .= '<td>'.$row['first_name'].'</td>';
      $film .= '<td>'.$row['last_name'].'</td>';
      $film .= '</tr>';
  }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 영화 대여 사이트 </title>
</head>

<body>
    <h2><a href="index.php"> 가장 영화를 많이 본 고객 TOP 15</a> </h2>
    <table border="1">
        <tr>
            <th>customer_id</th>
            <th>count</th>
            <th>first_name</th>
            <th>last_name</th>
        </tr>
        <?= $film ?>

    </table>
</body>

</html>
