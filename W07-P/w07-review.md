## 1. 새로 배운 내용

+ 3개 이상의 테이블 조회하기
ex)select e.*, salary
from dept_emp de
inner join employees e on e.emp_no=de.emp_no
inner join salaries s on s.emp_no=de.emp_no
where de.to_date=’9999-01-01’ and dept_no=’D005’
order by salary desc
limit 5;

+ php에서 print와 echo의 차이점
 print는 하나의 입력을 받아 리턴하는 것이고 echo는 하나 이상의 문자열 출력하는 것이다.


## 2. 문제가 발생한 부분과 해결 과정
딱히 없었다.

## 3. 참고할 만한 내용

+ 3개의 테이블 outer join에 대해서도 찾아보았다.
https://m.blog.naver.com/PostView.nhn?blogId=wideeyed&logNo=221435115388&proxyReferer=https:%2F%2Fwww.google.com%2F


## 4. 회고

\+ join에 대해 많이 잊어버렸는데 7주차 실습을 하면서 상기시키는 계기가 되었다.
특히, 3개 이상의 테이블 조인하기 실습이 재밌었다. 

\- 유투브에 영상을 올릴 때 sd처리 과정이 항상 시간을 빼앗긴다. 
보통은 5분~10분정도 기다리면 되다고 하는데 1분도 안되는 영상이 40분이 넘어도 올라가지 않아서 취소하고 다시 올렸더니 10분 안에 업로드 성공했다.
매주 업로드 되는 시간이 복불복인데 정확한 이유는 잘 모르겠다.

\! 중간 과제하기 전 sql문과 php코드에 대해 복습하는 시간이 그동안의 내용들이 다시 한번 잘 정리되었고 좋았습니다!


## 5. 실습 영상 

+ 추가한 부분

Sales 부서에서 급여를 가장 많이 받는 직원을 출력하는데
사용자에게 숫자를 입력받아 입력받은 수만큼 직원 출력하기 

### dept_emp,employees, salaries  3개의 테이블을 join해서 emp_no, first_name, last_name, salary 출력하기

select e.emp_no, e.first_name, e.last_name, salary
        from dept_emp de
        inner join employees e on e.emp_no=de.emp_no
        inner join salaries s on s.emp_no=de.emp_no
        where de.to_date='9999-01-01' and dept_no='D007'
        order by salary desc
        limit ".$filtered_number."

https://youtu.be/1leANvWK8cc
