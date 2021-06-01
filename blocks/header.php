<header class="p-3 bg-dark text-white">
    <div class="container">

      <div class="d-flex flex-wrap align-items-center justify-content-start justify-content-end">
      <h2 class="my-0 mr-md-auto font-weight-normal"><a href = "/autosell/index.php" class = "nav-link px-4 text-white">AutoSell</a></h2>
        <?php 
          if($user->getnum() == NULL)
          {
            echo 
            '<form action="/autosell/index.php" method="POST" class="text-end mt-4">
              <a href="/autosell/blocks/login.php" type="button" class="btn btn-outline-light me-2">Разместить объявление</a>
              <a href="/autosell/blocks/login.php" type="button" class="btn btn-outline-light me-2">Вход</a>
              <a href="/autosell/blocks/registration.php" type="button" class="btn btn-info">Регистрация</a>
            </form>';
          }
          else
          {
            $tmp = $user->getlogin();
            echo '<form action="/autosell/index.php" method="GET" class="text-end mt-4">';
            echo '<h4>Добро пожаловать, ';
            echo $tmp;
            echo '<button type="submit" name="Myads" value="1" class="btn btn-outline-light me-2 ml-3">Мои объявления</a>';
            echo '<button type="submit" name="Newad" value="1" class="btn btn-outline-light me-2 ml-3">Разместить объявление</a>';
            echo '</form>';
            echo '<button type="submit" name="logout" class="btn btn-info ml-3">Выход</button>';
            echo '</h4>';
            echo '</form>';
          }
        ?>
      </div>
    </div>
</header>