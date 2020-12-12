<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>CSS</title>
    <style>
      #container {
        background-color:#eaf7fe;
        width: 940px;
        margin: 0px auto;
        padding: 300px;
        border: 1px solid #a8daf9;
      }
      #header {
        border: 1px solid #a8daf9;
        border-radius:10px;
        padding: 20px;
        margin-bottom: 60px;
        text-align: center;

      }
      #left {
        background-color: #a8daf9;
        width: 185px;
        padding: 20px;
        margin-left: 70px;
        margin-right: 60px;
        margin-bottom: 100px;
        float: left;
        border: 1px solid #a8daf9;
      }
      #center {
        background-color: #a8daf9;
        width: 185px;
        padding: 20px;
        margin-right: 60px;
        margin-bottom: 20px;
        float: left;
        border: 1px solid #a8daf9;
      }

      #right {
        background-color: #a8daf9;
        width: 185px;
        padding: 20px;
        margin-right: 60px;
        margin-bottom: 20px;
        float: left;
        border: 1px solid #a8daf9;
      }


      a{
        color:black;
        text-decoration: none;
      }

    </style>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <h1> 채용 정보 서비스 </h1>
      </div>
      <div id="left">
        <h3><a> 지역별 채용 정보 </a></h3>
        <form action="local.php" method="get">
         <input type="text" name="name" placeholder="ex) 서울, 전북, 경북, 대구">
         <input type="submit" value="Select"></br>
      </form>

      </div>
      <div id="center">
        <h3><a> 직종별 채용 정보 </a></h3>


      </div>
      <div id="right">
        <h3><a> 마감일자별 채용 정보 </a></h3>

      </div>

    </div>
  </body>
</html>
