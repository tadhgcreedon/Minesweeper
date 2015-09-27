<div id="minesweeperGameDiv">

  <table id="fieldTable" class="table-bordered">
    <?php

      if(!isset($_SESSION["minesPlaced"]))
      {
        $_SESSION["grid"] = array();

        //calculate number of mines
        if($_SESSION["mines"] === "a little")
        {
          $mineCount = $_SESSION["columns"] * $_SESSION["rows"];
          $mineCount = ceil($mineCount /= 4);
        }
        else if($_SESSION["mines"] === "some")
        {
          $mineCount = $_SESSION["columns"] * $_SESSION["rows"];
          $mineCount = ceil($mineCount /= 3);
        }
        else
        {
          $mineCount = $_SESSION["columns"] * $_SESSION["rows"];
          $mineCount = ceil($mineCount /= 2);
        }

        $_SESSION["mineCount"] = $mineCount;

        // place mines
        $minesLeft = $mineCount;

        for($i = 0; $i < $_SESSION["rows"]; $i++)
        {
          for($j = 0; $j < $_SESSION["columns"]; $j++)
          {
            $_SESSION["grid"][$i][$j] = " ";
          }
        }

        while($minesLeft > 0)
        {
          $tempRow = mt_rand(0, ($_SESSION["rows"]-1));
          $tempColumn = mt_rand(0, ($_SESSION["columns"]-1));

          if($_SESSION["grid"][$tempRow][$tempColumn] === " ")
          {
            $_SESSION["grid"][$tempRow][$tempColumn] = "X";
            $minesLeft--;
          }
        }

        $_SESSION["minesPlaced"] = true;

        //place numbers

        for($i = 0; $i < $_SESSION["rows"]; $i++)
        {
          for($j = 0; $j < $_SESSION["columns"]; $j++)
          {
            $minesNumber = 0;

            //bottom row
            if(isset($_SESSION["grid"][$i+1][$j-1], $_SESSION["grid"]))
            {
              if($_SESSION["grid"][$i+1][$j-1] === "X"){
                $minesNumber++;
              }
            }
            if(isset($_SESSION["grid"][$i+1][$j], $_SESSION["grid"]))
            {
              if($_SESSION["grid"][$i+1][$j] === "X"){
                $minesNumber++;
              }
            }
            if(isset($_SESSION["grid"][$i+1][$j+1], $_SESSION["grid"]))
            {
              if($_SESSION["grid"][$i+1][$j+1] === "X"){
                $minesNumber++;
              }
            }

            //middle row
            if(isset($_SESSION["grid"][$i][$j-1], $_SESSION["grid"]))
            {
              if($_SESSION["grid"][$i][$j-1] === "X"){
                $minesNumber++;
              }
            }
            if(isset($_SESSION["grid"][$i][$j+1], $_SESSION["grid"]))
            {
              if($_SESSION["grid"][$i][$j+1] === "X"){
                $minesNumber++;
              }
            }

            //top row
            if(isset($_SESSION["grid"][$i-1][$j-1], $_SESSION["grid"]))
            {
              if($_SESSION["grid"][$i-1][$j-1] === "X"){
                $minesNumber++;
              }
            }
            if(isset($_SESSION["grid"][$i-1][$j], $_SESSION["grid"]))
            {
              if($_SESSION["grid"][$i-1][$j] === "X"){
                $minesNumber++;
              }
            }
            if(isset($_SESSION["grid"][$i-1][$j+1], $_SESSION["grid"]))
            {
              if($_SESSION["grid"][$i-1][$j+1] === "X"){
                $minesNumber++;
              }
            }

            if($minesNumber > 0 && $_SESSION["grid"][$i][$j] !== "X")
            {
              $_SESSION["grid"][$i][$j] = strval($minesNumber);
            }
          }
        }
      }

      //assign colours to numbers
      for($i = 0; $i < $_SESSION["rows"]; $i++)
      {
        echo "<tr>";
        for($j = 0; $j < $_SESSION["columns"]; $j++)
        {
          echo "<td";
          if($_SESSION["grid"][$i][$j] === "1") {
            echo " class='numberOfMines1' ";
          }
          if($_SESSION["grid"][$i][$j] === "2") {
            echo " class='numberOfMines2' ";
          }
          if($_SESSION["grid"][$i][$j] === "3") {
            echo " class='numberOfMines3' ";
          }
          if($_SESSION["grid"][$i][$j] === "4") {
            echo " class='numberOfMines4' ";
          }
          if($_SESSION["grid"][$i][$j] === "5") {
            echo " class='numberOfMines5' ";
          }
          if($_SESSION["grid"][$i][$j] === "6") {
            echo " class='numberOfMines6' ";
          }
          if($_SESSION["grid"][$i][$j] === "7") {
            echo " class='numberOfMines7' ";
          }
          if($_SESSION["grid"][$i][$j] === "8") {
            echo " class='numberOfMines8' ";
          }
          echo ">";
          echo $_SESSION["grid"][$i][$j];
          echo "</td>";
        }
        echo "</tr>";

      }
     ?>
  </table>

  <div id="infoButton">
  <a class="tip btn btn-default inline-block buttonSize" href="#" data-toggle="popover" id="item1" data-title="Info"
    data-content="<?php echo "Columns: " . $_SESSION["columns"] . "\nRows: " . $_SESSION["rows"] . "\n Mines: " .
      $_SESSION["mineCount"];?>"
    data-placement="top">
    <span id="infoImage" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a>
  </div>

  <div id="quitButton" class="inline-block">
     |

    <form class="inline-block" action="index.php" method="post">
      <input type="hidden" name="startNewGame" value="true"></input>
      <input class="btn btn-danger buttonSize" type="submit" value="Quit?"></input>
    </form>


  </div>
</div>
