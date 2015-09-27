<div id="newGameFormDiv">
  <form id="newGameForm" method="post" action="../index.php"
    oninput="numberOfRows.value=rowInput.value; numberOfColumns.value=columnInput.value">
    <?php
      //Note: will work with higher numbers, but I kept them lower so that the grid size on page is reasonable
    ?>

    Columns: <input value="2" id="columnInput" class="sizeRange" type="range" name="columns" min="2" max="20">
    <output name="numberOfColumns" for="columnInput">2</output><br>

    Rows: <input value="2" id="rowInput" class="sizeRange" type="range" name="rows" min="2" max="20">
    <output name="numberOfRows" for="rowInput">2</output><br>

    <?php //This will be calculated with a function for a reasonable amount relative to grid size.
          //Could handle any integer, however.?>
    # of Mines: &nbsp;<select id="minesSelect" name="mines">
      <option>a little</option>
      <option>some</option>
      <option>a lot</option>
    </select><br><br>

    <?php //Submit Button ?>
    <input class="btn btn-success" type="submit" value="Start!"></input>

  </form>
</div>
