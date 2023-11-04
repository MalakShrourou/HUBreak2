<!DOCTYPE html>

<head>
  <title>Change price</title>
  <style type="text/css">
    body {
      background-image: url('cover.jpg');
    }

    div :hover {
      filter: brightness(65%);
    }

    .rest {
      width: 27%;
      margin: 20px;
      text-align: center;
      border-style: solid;
      border-color: #fff;
      background: #fff;
      border-radius: 30px;
      color: white;
      box-shadow: -30px 30px 20px rgba(0, 0, 0, 0.3);
    }

    .rest img {
      width: 70%;
      height: auto;
      border-radius: 200px;
      border-style: solid;
      margin: 20px;
    }

    .center {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      margin: 100px 0 100px 11%;
    }

    .name {
      text-align: center;
      font-size: 24px;
      color: rgb(124, 17, 17);
    }

    a {
      text-decoration: none;
      color: transparent;
    }

    nav h1 {
      text-align: center;
      background-color: #f18b05;
      padding-top: 2%;
      padding-bottom: 2%;
      margin-top: 0%;
      font-size: 250%;
      color: white;
      margin-right: 24%;
      margin-left: 25%;
    }
  </style>
</head>

<body>
  <nav>
    <h1>Select a restaurant to CHANGE items PRICE from </h1>
  </nav>
  <div class="center">
    <?php
    if (!$database = mysqli_connect("localhost", "root", "12345678", "hubreak2_db"))
      die("Sorry, could not connect to the server.");
    extract($_POST);
    $query = "select ID,Image,name from resturants ";
    $result = mysqli_query($database, $query);
    while ($row = mysqli_fetch_row($result)) {
      print("<div class='rest'>");
      $x = 0;
      $link = null;
      foreach ($row as $value) {
        if ($x == 0) {
          if ($value == 1) {
            $link = 'ChangeEastern.php';
          } elseif ($value == 2) {
            $link = 'ChangeEspresso.php';
          } elseif ($value == 3) {
            $link = 'ChangeMedicine.php';
          } elseif ($value == 4) {
            $link = 'ChangeVillage.php';
          } elseif ($value == 5) {
            $link = 'ChangeZaza.php';
          } elseif ($value == 6) {
            $link = 'ChangeWestern.php';
          }
        }
        if ($x == 1)
          print("<a href='$link'><img src='$value'></img></a><br>");
        elseif ($x == 2) {
          print("<a href='$link'><span class='name'>$value</span></a><br><br>");
        }
        $x++;
      }
      print("</div>");
    }
    mysqli_close($database);
    ?>
  </div>
</body>

</html>