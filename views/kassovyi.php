<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 style="text-align: center">Кассовый отчёт за день</h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5"></div>
        <div class="col-lg-2">
            <form class="form-inline" action="otchets/kassovyi" method="POST">
                <div class="mb-3">
                    <label for="date_1" class="form-label">Дата</label>
                    <input type="date" class="form-control" name="kassovyiDate">
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Показать отчёт</button>
                </div>
            </form>
        </div>
        <div class="col-lg-5"></div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <?php
            if (!empty($kassovyi)){

                echo '<h3 class="text-center">Показаны все бронировния, начинающиеся в выбранную дату</h3>';

                echo '
                    <table class="table">
                        <thead>
                            <tr class="table-info">
                                <th>№</th>
                                <th>Дата начала бронирования</th>
                                <th>Дата окончания бронирования</th>
                                <th>Стоимость номера в сутки</th>
                                <th>Длительность бронирования (сутки)</th>
                                <th>Общая стоимость номера</th>
                                <th>Дополнительные услуги</th>
                                <th>Общая стоимость услуг</th>
                                <th>Общая сумма</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                ';
                foreach ($kassovyi  as $row) {
                    echo "<tr>
                            <td>".$row['id_bron']."</td>
                            <td>".$row['date_start']."</td>
                            <td>".$row['date_end']."</td>
                            <td>".$row['nomer_price']."</td>
                            <td>".$row['bron_days']."</td>
                            <td>".$row['nomer_sum']."</td>
                            <td>".$row['uslugi_names']."</td>
                            <td>".$row['uslugi_sum']."</td>
                            <td>".$row['full_sum']."</td>
                        </tr>";
                }

                echo '<tr>
                    <th colspan="8">Общая сумма за день:</th>
                    <th>'.$full_sum_date.'</th>
                </tr>';

                echo '</tbody></table>';
            }
        ?>
        </div>
    </div>
</div>