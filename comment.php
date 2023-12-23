<html>
    <head>
            <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
      @import url("https://v1.fontapi.ir/css/Vazir");
      h1,h2,h3,h4,h5,h6,div,span{

        font-family: "Vazir"!important;
        text-align: right;
      }
    </style>
    </head>
    <body>
    <?php
error_reporting(E_ERROR | E_PARSE);
include 'db.php';
//
  // var_dump($firstnameInput,$lastnameInput,$emailInput,$commentInput);
  $firstnameInput = $_POST["name"];
  $lastnameInput = $_POST["surname"];
  $emailInput = $_POST["email"];
  $commentInput = $_POST["message"];
  //   connection db
  $connNew = new mysqli($servername, $username, $password, $dbname);
  if ($connNew->connect_error) {
    die("ارتباط بر قرار نشد: " . $connNew->connect_error);
}
$sql = "INSERT INTO comment(firstname,lastname,email,comment) values('$firstnameInput','$lastnameInput','$emailInput','$commentInput')";

if ($connNew->query($sql) === TRUE) {
    echo '<div class="alert alert-success text-center w-50 mx-auto my-3" role="alert">
    نظر شما ثبت شد
  </div>';
}else {
    echo '<div class="alert alert-danger text-center w-50 mx-auto my-3" role="alert">
    مشکلی در ثبت نظر شما به وجود آمده :'.$connNew->error.'
  </div>';
}
?>
    </body>
</html>
