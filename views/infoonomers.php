<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 style="text-align: center">Информация о номерах по дате</h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5"></div>
        <div class="col-lg-2">
            <form class="form-inline" action="otchets/infoonomers" method="POST">
                <div class="mb-3">
                    <label for="date_1" class="form-label">Дата</label>
                    <input type="date" class="form-control" name="target_date">
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Показать информацию</button>
                </div>
            </form>
        </div>
        <div class="col-lg-5"></div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <?php
            if (!empty($nomers)){
                echo '<h3 class="text-center">Показана информация о номерах на указанную дату ('.$target_date.')</h3>';

                echo '
                    <table class="table">
                        <thead>
                            <tr class="table-info">
                                <th>№</th>
                                <th>Название номера</th>
                                <th>Тип номера</th>
                                <th>Статус</th>

                                <th>ИД бронирования</th>
                                <th>ФИО арендатора</th>

                                <th>Дата начала бронирования</th>
                                <th>Дата конца бронирования</th>
                                <th>Дата начала следующего бронирования</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                ';
                foreach ($nomers  as $row) {
                    echo "<tr>
                            <td>".$row['id_nomer']."</td>
                            <td>".$row['nomer_name']."</td>
                            <td>".$row['type_name']."</td>
                            <td>".$row['status']."</td>

                            <td>".$row['id_bron']."</td>
                            <td>".$row['user_name']."</td>

                            <td>".$row['date_start']."</td>
                            <td>".$row['date_end']."</td>
                            <td>".$row['next_bron']."</td>
                        </tr>";
                }

                echo '</tbody></table>';
            }
        ?>
        </div>
    </div>
</div>