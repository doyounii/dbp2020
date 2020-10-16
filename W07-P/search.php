<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');

    if(mysqli_connect_errno()){
        echo "Failed to connect to MariaDB: " . mysqli_connect_error();
        exit();
    }    

    settype($_GET['num'], 'integer');
    $filtered_number = mysqli_real_escape_string($link, $_GET['num']);
    
    $query = "
        select e.emp_no, e.first_name, e.last_name, salary
        from dept_emp de
        inner join employees e on e.emp_no=de.emp_no
        inner join salaries s on s.emp_no=de.emp_no
        where de.to_date='9999-01-01' and dept_no='D007'
        order by salary desc
        limit ".$filtered_number."   
    ";

    $result = mysqli_query($link, $query);  
    
    $article = '';    
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row["emp_no"];
        $article .= '</td><td>';
        $article .= $row["first_name"];
        $article .= '</td><td>';
        $article .= $row["last_name"];
        $article .= '</td><td>';
        $article .= $row["salary"];
        $article .= '</td></tr>';
    }
    
    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>연봉 정보</title>
    <style>
        body {
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>

<body>
    <h2><a href="index.php">직원 관리 시스템</a> | 연봉 정보</h2>
    <table>
        <tr>
            <th>emp_no</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>salary</th>
        </tr>        
        <?= $article ?>
    </table>
</body>

</html>
