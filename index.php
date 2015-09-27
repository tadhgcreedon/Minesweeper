<?php
  session_start();
  if(isset($_POST["startNewGame"]))
  {
    unset($_SESSION["gameOn"]);
    unset($_SESSION["columns"]);
    unset($_SESSION["rows"]);
    unset($_SESSION["mines"]);
    unset($_SESSION["minesPlaced"]);
    unset($_SESSION["mineCount"]);
    unset($_SESSION["grid"]);
    unset($_SESSION["guesses"]);
  }
  if(isset($_POST["columns"]) && isset($_POST["rows"]) && isset($_POST["mines"]))
  {
    $_SESSION["columns"] = $_POST["columns"];
    $_SESSION["rows"] = $_POST["rows"];
    $_SESSION["mines"] = $_POST["mines"];
    $_SESSION["gameOn"] = 1;
  }
  //contains some boilerplate HTML
  include "php/startOfDocument.php";
?>
</head>
<body>

  <h1 class = "header">Minesweeper</h1>
  <?php
  if(!isset($_SESSION["gameOn"]))
  {
    include "php/newGame.php";
  }
  else {
    include "php/minesweeper.php";
  }
?>
<?php
  //contains some boilerplate HTML
  include "php/footer.php";
 ?>
