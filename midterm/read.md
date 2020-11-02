##  개발 환경  
### 데이터 베이스 : MySQL
1. 오픈 소스 라이센스를 따르기 때문에 누구나 무료로 다운받아 사용가능하다.   
2. 널리 알려진 표준 SQL 형식을 따르기 때문에 편리하게 사용할 수 있다.  
3. 다양한 운영체제에서 사용할 수 있으며, 여러 가지의 프로그래밍 언어를 지원한다.  
4. 크기가 큰 데이터 집합도 아주 빠르고 효과적으로 처리할 수 있다.  


### (백엔드) 서버 사이드 언어: PHP 

### (프론트엔드) 클라이언트 사이드 언어: HTML

### 웹 서버 : 윈도우 
1. 윈도우의 가장 편리한 점은 GUI환경을 제공한다는 점이다.
2. 윈도우 터미널을 사용해 데이터베이스와 쉽게 연결할 수 있다.
3. 가상환경을 따로 설치하지 않아도 된다.


##  발견환 정보 및 웹 사이트 소개

샘플 데이트 saklia를 이용해 영화 대여 사이트를 만들었다.  

+ 정보1  : 원하는 대여일 이상 대여 가능한 영화 목록 보여주기  
~~~
사용자가 입력한 날짜 이상 대여 가능한 영화들을 보여준다.    

$filtered_number = mysqli_real_escape_string($link, $_GET['num']);  
$query = "SELECT * FROM film where rental_duration > '".$filtered_number."' LIMIT 15";
~~~

+ 정보2 : 카테고리 별 영화 검색하기  
~~~  
사용자가 입력한 카테고리의 영화들을 보여준다.     

  $filtered_number = mysqli_real_escape_string($link, $_GET['name']);  
  $query = "SELECT c.name, f.title, f.film_id, f.length FROM film f
            inner join film_category fc ON fc.film_id = f.film_id
            inner join category c ON c.category_id = fc.category_id
            where c.name = '".$filtered_number."'  LIMIT 15";

~~~

+ 정보3 : 상영시간 별 영화 검색하기  
~~~
영화의 총 상영시간대 별로 영화를 보여준다.   

+ 60분 이하의 영화 목록 10개 
$query = "SELECT film_id,title, length FROM film
        where  length < 60  limit 10 ";  
      
+ 60분~90분 영화 목록 10개          
$query = "SELECT film_id,title, length FROM film
             where  length > 60 and length <90 limit 10";  
     
+ 90분 이하의 영화 목록 10개        
$query = "SELECT film_id,title, length FROM film
                where  length > 90 limit 10 ";  
               
~~~

+ 정보4 : 가장 영화를 많이 본 고객 TOP 15
~~~
영화를 가장 많이 본 고객 15명을 보여준다.    

$query = "SELECT x.customer_id, x.count, y.first_name, y.last_name, y.email FROM
    (SELECT customer_id, count(*) count FROM rental
    GROUP BY customer_id  ORDER BY count DESC
    LIMIT 15  )x JOIN  (SELECT*FROM customer)y
    ON x.customer_id=y.customer_id";
~~~
