<body>
  <div class="container ">
    <?php 
    global $mysqli;
    $result = $mysqli->query('SELECT * FROM Ad WHERE ADNUM = \'' . $_GET['Ad'] . '\'');

    $row = mysqli_fetch_row($result);
    ?>
    <h3 class="perenos-hyphens mb-4 mt-3"><?php echo $row[1] ?></h3>
    <div class="row">
      <div class="col-sm  ">
        <img src = img/<?php echo $_GET['Ad'] ?>_1.jpeg width="434" height="326"> </img>
        <h4>Описание</h4>
        <label class="form-label perenos-hyphens"><?php echo $row[5] ?></label>
        
      </div>
      <div class="col-sm ">
        <h1 class>Характеристики:</h1>
        <h3>Цена: <?php echo $row[4] ?> руб.</h3>

        <?php
          $result = $mysqli->query('SELECT MNAME, BNUM FROM Model WHERE MNUM = \'' . $row[3] . '\'');
          $row1 = mysqli_fetch_row($result);

          $result = $mysqli->query('SELECT BNAME FROM Brand WHERE BNUM = \'' . $row1[1] . '\'');
          $row2 = mysqli_fetch_row($result);
        ?>
        <label class="lead">Модель: <?php echo $row2[0] ?> <?php echo $row1[0] ?> <?php echo $row[13] ?> г.</label><br>


        <?php
          $result = $mysqli->query('SELECT ENAME FROM Engine1 WHERE ENUM = \'' . $row[6] . '\'');
          $row1 = mysqli_fetch_row($result);

        ?>
        <label class="lead">Двигатель: <?php echo $row1[0] ?>, <?php echo $row[7] ?> л., <?php echo $row[14] ?> л.с.</label><br>

        <?php
          $result = $mysqli->query('SELECT TNAME FROM Transmission WHERE TNUM = \'' . $row[8] . '\'');
          $row1 = mysqli_fetch_row($result);

        ?>
        <label class="lead">Трансмиссия: <?php echo $row1[0] ?> </label><br>

        <?php
          $result = $mysqli->query('SELECT DNAME FROM Dunit WHERE DNUM = \'' . $row[9] . '\'');
          $row1 = mysqli_fetch_row($result);

        ?>
        <label class="lead">Привод: <?php echo $row1[0] ?> </label><br>


        <?php
          $result = $mysqli->query('SELECT WNAME FROM Wheel WHERE WNUM = \'' . $row[10] . '\'');
          $row1 = mysqli_fetch_row($result);

        ?>
        <label class="lead">Руль: <?php echo $row1[0] ?> </label><br>

        
        <label class="lead">Пробег: <?php echo $row[11] ?> км. </label><br>
        
        
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

      </div>
    </div>
  </div>
</body>