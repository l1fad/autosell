<body>
  <form action="/autosell/index.php" method="POST" enctype="multipart/form-data">

  <div class="container">
  <h3 class="display-4 fw-normal mb-5 text-center">Размещение объявления</h3> 
  <div class="row g-3">

      <div class="col-sm-6">
      <?php 
        global $mysqli;
        $result = $mysqli->query('SELECT COUNT(*) FROM Brand');
        $row = mysqli_fetch_row($result);


        $result = $mysqli->query('SELECT QIMG FROM Ad WHERE ADNUM = \'' . $_POST['edit'] . '\'');

        $q = mysqli_fetch_row($result);

        $result = $mysqli->query('SELECT BNAME FROM Brand WHERE BNUM = \'' . $_POST['brand'] . '\'');  
        $row1 = mysqli_fetch_row($result);
      ?>
          <label class="form-label">Марка автомобиля</label>
          <input class="form-control" type="text" name="brand1" required="" value="<?php echo $row1[0] ?>" disabled="">
          <input type="hidden" name="brand"  value="<?php echo $_POST['brand']?>">
          <?php  $b = $_POST['brand']; ?> 
        </div>

          <div class="col-sm-6">
              <label class="form-label">Модель автомобиля</label>
              <?php 
          global $mysqli;
          $result = $mysqli->query('SELECT COUNT(*) FROM Model WHERE BNUM = \'' . $b . '\'');
          $row = mysqli_fetch_row($result);
          $result = $mysqli->query('SELECT MNUM FROM Model WHERE BNUM = \'' . $b . '\'');
          $beg = mysqli_fetch_row($result);
            ?>
              <select class="form-select1" name="model" required="">
                <option value="">Выберите...</option>
                <?php
                  for($i = $beg[0]; $i < $row[0] + $beg[0]; $i++):
                    
                    $result = $mysqli->query('SELECT MNAME FROM Model WHERE MNUM = \'' . $i . '\'');  
                    $row1 = mysqli_fetch_row($result);
              ?>
              <option <?php if ($_POST['model']==$i) { echo "selected";} ?> value="<?php echo $i ?>"><?php echo $row1[0] ?></option>
                  <?php endfor; ?>
              </select>
            </div>
      <div class="col-12">
              <label class="form-label" >Введите название объявления </label>
              <input type="text" class="form-control" name="title" required="" maxlength="100" placeholder="Например: Продается автомобиль Honda Accord" value="<?php echo $_POST['adname'] ?>">
            </div>

           
            <div class="col-sm-6">
              <label class="form-label">Введите год автомобиля</label>
              <input type="number" onfocus="this.select();" class="form-control" name="year" required="" min="1940" max="2021" step="1" value="<?php echo $_POST['year'] ?>">
            </div>

            <div class="col-sm-6">
              <label class="form-label">Введите цену продажи, руб.</label>
              <input type="number" onfocus="this.select();" class="form-control" name="price" required="" min="0" step="1" value="<?php echo $_POST['price'] ?>">
            </div>

            <div class="col-sm-6">
        <?php 
        global $mysqli;
        $result = $mysqli->query('SELECT COUNT(*) FROM Transmission');

        $row = mysqli_fetch_row($result);
          ?>
              <label class="form-label">Тип коробки передач</label>
              <select class="form-select1" name="transmission" required="">
                <option value="">Выберите...</option>
                <?php
                  for($i = 1; $i <= $row[0]; $i++):
                  
                    $result = $mysqli->query('SELECT TNAME FROM Transmission WHERE TNUM = \'' . $i . '\''); 
                    $row1 = mysqli_fetch_row($result);
                ?>  
                <option <?php if ($_POST['transmission']==$i) { echo "selected";} ?> value="<?php echo $i ?>"><?php echo $row1[0] ?></option>
                  <?php endfor; ?>
              </select>
            </div>

            <div class="col-sm-6">
          <?php 
        global $mysqli;
        $result = $mysqli->query('SELECT COUNT(*) FROM Dunit');

        $row = mysqli_fetch_row($result);
          ?>
              <label class="form-label">Привод</label>
              <select class="form-select1" name="unit" required="">
                <option value="">Выберите...</option>
                <?php
                  for($i = 1; $i <= $row[0]; $i++):
                  
                    $result = $mysqli->query('SELECT DNAME FROM Dunit WHERE DNUM = \'' . $i . '\'');  
                    $row1 = mysqli_fetch_row($result);
                ?>  
                <option <?php if ($_POST['unit']==$i) { echo "selected";} ?> value="<?php echo $i ?>"><?php echo $row1[0] ?></option>
                <?php endfor; ?>
              </select>
            </div>

            <div class="col-sm-6">
          <?php 
        global $mysqli;
        $result = $mysqli->query('SELECT COUNT(*) FROM Wheel');

        $row = mysqli_fetch_row($result);
          ?>
              <label for="country" class="form-label">Сторона размещения руля</label>
              <select class="form-select1" name="wheel" required="">
                <option value="">Выберите...</option>
                <?php
                  for($i = 1; $i <= $row[0]; $i++):
                  
                    $result = $mysqli->query('SELECT WNAME FROM Wheel WHERE WNUM = \'' . $i . '\'');  
                    $row1 = mysqli_fetch_row($result);
                ?>
                   <option <?php if ($_POST['wheel']==$i) { echo "selected";} ?>  value="<?php echo $i ?>"><?php echo $row1[0] ?></option>
                  <?php endfor; ?>
              </select>
            </div>

            <div class="col-sm-6">
              <label for="address" class="form-label">Введите пробег, км.</label>
              <input type="number" onfocus="this.select();" class="form-control" name="mileage" required="" min="0" max="1000000" step="1" value="<?php echo $_POST['mil'] ?>">
            </div>
            
            <div class="col-md-4">
      <?php 
        global $mysqli;
        $result = $mysqli->query('SELECT COUNT(*) FROM Engine1');

        $row = mysqli_fetch_row($result);
          ?>
              <label for="country" class="form-label">Вид топлива</label>
              <select class="form-select1" name="engine" required="">
                <option value="">Выберите...</option>
                <?php
                  for($i = 1; $i <= $row[0]; $i++):
                    $result = $mysqli->query('SELECT ENAME FROM Engine1 WHERE ENUM = \'' . $i . '\'');  
                    $row1 = mysqli_fetch_row($result);
                ?>
                    <option <?php if ($_POST['engine']==$i) { echo "selected";} ?> value="<?php echo $i ?>"><?php echo $row1[0] ?></option>
                  <?php endfor; ?>
              </select>
            </div>

            <div class="col-md-4">
             <label for="address" class="form-label">Введите объем двигателя, л.</label>
              <input type="number" onfocus="this.select();" class="form-control" name="engineval" required="" min="0.7" max="6.0" step="0.1" value="<?php echo $_POST['engineval'] ?>">
            </div>

            <div class="col-md-4">
             <label for="address" class="form-label">Введите мощность двигателя, л.с.</label>
              <input type="number" onfocus="this.select();" class="form-control" name="enginepower" required="" min="1" max="1000" step="1" value="<?php echo $_POST['power'] ?>">
            </div>
            <div class="col-12">
              <label class="form-label">Введите описание</label>
              <textarea  class="form-control" name="description" rows="4" maxlength="1000" required="" value="<?php echo $_POST['desc'] ?>"><?php echo $_POST['desc'] ?></textarea>
            </div>


            <div class="col-md-4">
              <label class="form-label">Выберите количество изображений</label><br>
              <input name="img_q" type="number" id="col" value="<?php echo $q[0] ?>" class="form-control mb-3" disabled="">
              <input name="img_q1" type="hidden" id="col1" value="<?php echo $q[0] ?>">
              <input type="button" id="plus" class="btn btn-success plusandminus hover" value="+">
              <input type="button" id="minus" class="btn btn-success plusandminus hover" value="-">
        
              
            </div>
            <div class="col-md-4">
              <label class="form-label">Загруженные изображения</label>
             
              
            <?php 
              for($i = 1; $i <= $q[0]; $i++)
              {
            ?>
                <img src = "img/<?php echo $_POST['edit'] ?>_<?php echo $i ?>.jpeg" width="180" height="120" class="mb-2"> </img>
                <input type="radio" name="imgdel<?php echo $i ?>" value="0" checked/>Оставить
                <input type="radio" name="imgdel<?php echo $i ?>" value="1" />Удалить
        <?php } ?>

            </div>
            <div class="col-md-4">
              <script type="text/javascript">

                let col = document.getElementById('col');
                let col1 = document.getElementById('col1');
                let plus = document.getElementById('plus');
                let minus = document.getElementById('minus');

                var img_div = document.getElementById("img");
                var t = col.value;
                
                plus.onclick = function() 
                {
                  
                  if(t < 10)
                  {
                      t++;
                      img.innerHTML += '<input type="file" name="image'+t+'" class="form-control">';
                      col.value = parseInt(col.value) + 1;
                      col1.value = col.value;
                  }
                }

                minus.onclick = function() 
                {
                  if(t > <?php echo $q[0] ?>)
                  {
                    tmp = '<input type="file" name="image'+t+'" class="form-control">';
                    img.innerHTML=img.innerHTML.replace(new RegExp(tmp),'');
                    t--;
                    col.value = parseInt(col.value) - 1;
                    col1.value = col.value;
                  }
                }
            </script>
              <label class="form-label">Выберите изображения</label>
              <div id="img">
     
             
                <input type="file" name="image<?php echo $q[0]+1 ?>" class="form-control" src="img/<?php echo $_POST['edit'] ?>_<?php echo $i ?>.jpeg" accept=".jpg, .jpeg, .png">

            </div>
            </div>

            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <button type="submit" name="edit1" class="btn btn-success search hover mt-4" value = "1">Добавить</button>
            </div>
          </div>
      </div>
  </form>
</body>