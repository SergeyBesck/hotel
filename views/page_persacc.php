<div class="container">
  <?php
  echo '<h4 style="text-align: center"> Добро пожаловать в личный кабинет, ' . $_SESSION['fio'] . '!</h4>'
    ?>
  <div class="row">
    <table border="1" class="table">
      <tr class="table-secondary">
        <th>№</th>
        <th>Название номера</th>
        <th>Кол-во дней</th>
        <th>Итог. стоимость</th>
        <th>Дата заезда</th>
        <th>Дата выезда</th>
        <th>Статус</th>
        <th>Доп. услуги</th>
        <th>Отзыв</th>
      </tr>
      <?php
      foreach ($personalbron as $row) {
        $id_bron = $row['id_bron'];
        $modal_id = "dopuslugi_" . $id_bron;
        echo '<form action="user/personal_account" method="POST"> 
        <tr><input type="hidden" value="' . $id_bron . '" name="id_bron" id="id_bron">
        <td>' . $row['id_bron'] . '</td>
          <td>' . $row['namen'] . '</td>
          <td>' . $row['date_difference'] . '</td>
          <td>' . $row['itogsum'] . '</td>
          <td>' . $row['date_start'] . '</td>
          <td>' . $row['date_end'] . '</td>
          <td>' . $row['status'] . '</td>
          <td>
             <div class="modal fade" id="' . $modal_id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Дополнительные услуги</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">';
        $id_user = $this->session->userdata('id_user');
        $additional_services = $this->model_uslugi->select_dop_uslugi($id_user, $id_bron);
        foreach ($additional_services as $service) {
          echo $service['name_usluga'] . ' (' . $service['opisanie'] . ') - ' . $service['price'] . 'руб <br>';
        }

        echo '</div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-dark usluga" data-bs-toggle="modal" data-bs-target="#' . $modal_id . '">Посмотреть</button>
        </td></form>';
        $otziv = $this->model_bron->select_otziv($id_bron);
        if ($row['status'] == 'Подтверждена') {
          if (!$otziv) {
            echo '<td><a class="btn btn-dark" href="user/leaveotziv?id_bron=' . $row['id_bron'] . '" role="button">Оставить</a></td></tr>';
          } else {
            echo '<td>Отзыв оставлен</td></tr>';
          }
        } else {
          echo '<td></td></tr>';
        }
      }
      ?>
    </table>
    <div style="text-align: center; padding-top: 20px;">
      <a class="btn btn-outline-dark" href="booking/view_booking" role="button">Оформить бронирование</a>
    </div>
  </div>
</div>
