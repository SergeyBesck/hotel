<div class="container">
    <?php
    echo '<h4 style="text-align: center"> Добро пожаловать в личный кабинет, ' . $_SESSION['fio'] . '!</h4>'
        ?>
    <div class="row">
        <table border="1" class="table">
            <tr class="table-secondary">
                <th>№</th>
                <th>Название номера</th>
                <th>Итоговая стоимость</th>
                <th>Дата заезда</th>
                <th>Дата выезда</th>
                <th>Статус</th>
                <th>Дополнительные услуги</th>
            </tr>
            <?php
            foreach ($personalbron as $row) {
                echo '<tr><td>' . $row['id_bron'] . '</td>
          <td>' . $row['namen'] . '</td>
          <td></td>
          <td>' . $row['date_start'] . '</td>
          <td>' . $row['date_end'] . '</td>
          <td>' . $row['status'] . '</td></tr>';
            }
            ?>
        </table>
    </div>
</div>