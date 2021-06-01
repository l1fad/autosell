<body>
  <form action="/autosell/index.php" method="POST" >
  <div class="container ">
    <?php 
    global $mysqli;
    $result = $mysqli->query('SELECT * FROM Ad WHERE ADNUM = \'' . $_GET['Ad'] . '\'');

    $row = mysqli_fetch_row($result);
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <h3 class="perenos-hyphens mb-4 mt-3"><?php echo $row[1] ?></h3>
    <?php
    
    $result = $mysqli->query('SELECT INAME FROM Img WHERE IADNUM = \'' . $_GET['Ad'] . '\'');

    $img = mysqli_fetch_row($result);
    
    ?>
    <input type="hidden" name="adname" value = "<?php echo $row[1] ?>">
    <div class="row">
      <div class="col-sm">
        <div id="carousel" class="carousel slide" data-interval="90000">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="img-fluid" src="img/<?php echo $img[0] ?>" width="690" height="390"></img>
            </div>
            <?php
              if ($row[15] > 1)
              {
            ?>
             <?php 
                for($i = 2; $i <= $row[15]; $i++)
                { 
                  $img = mysqli_fetch_row($result);
                  ?>
                <div class="carousel-item">
                  <img class="img-fluid" src="img/<?php echo $img[0] ?>" width="690" height="390"></img>
                </div>
            <?php 
                }
              }
             ?>
          </div>

          <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Предыдущий</span>
          </a>
          <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Следующий</span>
          </a>
      </div>

        <h4>Описание</h4>
        <label class="form-label perenos-hyphens"><?php echo $row[5] ?></label>
        <input type="hidden" name="desc" value = "<?php echo $row[5] ?>">
      </div>
      <div class="col-sm ">
        <h1 class>Характеристики:</h1>
        <h3>Цена: <?php echo $row[4] ?> руб.</h3>
        <input type="hidden" name="price" value = "<?php echo $row[4] ?>">
        <?php
          $result = $mysqli->query('SELECT MNAME, BNUM FROM Model WHERE MNUM = \'' . $row[3] . '\'');
          $row1 = mysqli_fetch_row($result);

          $result = $mysqli->query('SELECT BNAME FROM Brand WHERE BNUM = \'' . $row1[1] . '\'');
          $row2 = mysqli_fetch_row($result);
        ?>
        <label class="lead">Модель: <?php echo $row2[0] ?> <?php echo $row1[0] ?> <?php echo $row[13] ?> г.</label><br>
        <input type="hidden" name="brand" value = "<?php echo $row1[1] ?>">
        <input type="hidden" name="model" value = "<?php echo $row[3] ?>">
        <input type="hidden" name="year" value = "<?php echo $row[13] ?>">

        <?php
          $result = $mysqli->query('SELECT ENAME FROM Engine1 WHERE ENUM = \'' . $row[6] . '\'');
          $row1 = mysqli_fetch_row($result);

        ?>
        <label class="lead">Двигатель: <?php echo $row1[0] ?>, <?php echo $row[7] ?> л., <?php echo $row[14] ?> л.с.</label><br>
        <input type="hidden" name="engine" value = "<?php echo $row[6] ?>">
        <input type="hidden" name="engineval" value = "<?php echo $row[7] ?>">
        <input type="hidden" name="power" value = "<?php echo $row[14] ?>">
        <?php
          $result = $mysqli->query('SELECT TNAME FROM Transmission WHERE TNUM = \'' . $row[8] . '\'');
          $row1 = mysqli_fetch_row($result);

        ?>
        <label class="lead">Трансмиссия: <?php echo $row1[0] ?> </label><br>
        <input type="hidden" name="transmission" value = "<?php echo $row[8] ?>">

        <?php
          $result = $mysqli->query('SELECT DNAME FROM Dunit WHERE DNUM = \'' . $row[9] . '\'');
          $row1 = mysqli_fetch_row($result);

        ?>
        <label class="lead">Привод: <?php echo $row1[0] ?> </label><br>
        <input type="hidden" name="unit" value = "<?php echo $row[9] ?>">

        <?php
          $result = $mysqli->query('SELECT WNAME FROM Wheel WHERE WNUM = \'' . $row[10] . '\'');
          $row1 = mysqli_fetch_row($result);

        ?>
        <label class="lead">Руль: <?php echo $row1[0] ?> </label><br>
        <input type="hidden" name="wheel" value = "<?php echo $row[10] ?>">
        
        <label class="lead">Пробег: <?php echo $row[11] ?> км. </label><br>
        <input type="hidden" name="mil" value = "<?php echo $row[11] ?>">
        
        <?php
          $result = $mysqli->query('SELECT Uphone FROM Users WHERE UNUM = \'' . $row[2] . '\'');
          $row1 = mysqli_fetch_row($result);

        ?>
        <script type="text/javascript">
          var tel_div = document.getElementById("tel");
          var t = '<?php echo $row1[0];?>';
          function show(){
          tel.innerHTML = '<input type="button" value="Скрыть" class="btn btn-success mr-3" onclick="hide()" />'+t;
          }
          function hide(){
          tel.innerHTML = '<input type="button" class="btn btn-success mr-3" value="Показать" onclick="show()" />Номер телефона';
          }

        </script>
        <div id="tel"><input type="button" value="Показать" class="btn btn-success mr-3" onclick="show()" />Номер телефона</div>
        <?php
        if($row[2] == $user->getnum())
        {
        ?>
        
          <button type="submit" name="edit" class="btn btn-success mt-2" value = "<?php echo $_GET['Ad'] ?>">Редактировать</button>
        
        <?php
        }
        ?>
      </div>
    </div>
  </div>
  </form>
</body>
