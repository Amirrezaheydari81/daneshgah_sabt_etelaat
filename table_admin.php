
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
include 'db.php';
?>
<div class="container mt-4 bg-danger rounded py-1">
    <h1 class="text-center">لیست اطلاعات ثبت شده مشتریان برای تماس</h1>
            </div>

            <div class="container mt-4">
                <?php
    include 'db.php';
    $connNew = new mysqli($servername, $username, $password, $dbname);
    if ($connNew->connect_error) {
    die("ارتباط بر قرار نشد: " . $connNew->connect_error);
    }

    $sql = "SELECT firstname,lastname,email,comment FROM comment";
    $result = mysqli_query($connNew,$sql);

    if (mysqli_num_rows($result) > 0 ) {

        $row = mysqli_fetch_assoc($result);
        echo '<table class="table">
    <thead>
        <tr>
        <th scope="col">شماره</th>
        <th scope="col">نام</th>
        <th scope="col">نام خانوادگی</th>
        <th scope="col">ایمیل</th>
        <th scope="col">متن</th>
        </tr>
    </thead>
    <tbody>';
    $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
        $i++;
    echo '
    <tr>
    <th scope="row">'.$i.'</th>
    <td>'.$row["firstname"].'</td>
    <td>'.$row["lastname"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["comment"].'</td>
    </tr>
    ';
        }

    }else {
        echo "نتیجه ای یافت نشد";
    }
    echo'
    </tbody>
    </table>';
    ?>
</div>
