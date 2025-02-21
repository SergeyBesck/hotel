<header>
  <nav class="navbar">
    <div class="container">
      <div class="justify-content-sm-start">
        <a class="navbar-brand" href="main"><img src="images/logo.jpg" alt="logo" width="185" height="60"></a>
      </div>
      <div class="justify-content-sm-center">
        <p class="text-center">Оформить бронирование</p>
      </div>
      <div class="justify-content-sm-end">
        <div class="btn-group">
          <div class="dropdown">
          <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Отчёты</button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="">кассовый отчёт</a></li>
              <li><a class="dropdown-item" href="">сводный отчёт </a></li>
              <li><a class="dropdown-item" href="">сводный отчёт о доходах от доп. услуг </a></li>
            </ul>
          </div>
        </div>
        <?php
          if($this->session->userdata('id_role') == 3){
              echo '
                <a href=""><button class="btn btn-outline-dark" type="submit">Сведения о комнатах </button></a>
              ';
          }
        ?>
        <a href="main/exit"><button class="btn btn-outline-dark" type="submit">Выйти</button></a>
      </div>
    </div>
  </nav>
</header>