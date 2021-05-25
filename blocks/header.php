<header class="p-3 bg-dark text-white">
    <div class="container">

      <div class="d-flex flex-wrap align-items-center justify-content-start justify-content-end">
      <h3 class="my-0 mr-md-auto font-weight-normal"><a href = "/autosell" class = "nav-link px-4 text-white">AutoSell</a></h3>
        <?php 
          if($user->getnum() == NULL)
          {
            echo 
            '<div class="text-end">
              <a href="/autosell/blocks/login.php" type="button" class="btn btn-outline-light me-2">Вход</a>
              <a href="/autosell/blocks/registration.php" type="button" class="btn btn-info">Регистрация</a>
            </div>';
          }
          else
          {
            $tmp = $user->getlogin();
            echo '<form action="/autosell/index.php" method="POST" >';
            echo'<h3 class="my-0  font-weight-normal mt-4 ">Добро пожаловать, '; 
            echo $tmp; 
            echo '<button type="submit" name="logout" class="btn btn-info ml-3">Выход</button>';
            echo '</h3>';
            echo '</form>';

          }
        ?>
      </div>
    </div>
</header>