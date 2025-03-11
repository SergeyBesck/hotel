<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 style="text-align: center">Отчёт о доходах от доп. услуг</h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5"></div>
        <div class="col-lg-2">
            <form class="form-inline" action="otchets/dopuslugi" method="POST">
                <div class="mb-3">
                    <label for="date_1" class="form-label">С</label>
                    <input type="date" class="form-control" name="dates">
                </div>
                <div class="mb-3">
                    <label for="date_2" class="form-label">По</label>
                    <input type="date" class="form-control" name="datepo">
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
            if (!empty($dopuslugi)){

                echo '<h3 class="text-center">Отчёт по заданному периоду:</h3>';

                echo '
                    <table class="table">
                        <thead>
                            <tr class="table-info">
                                <th>№</th>
                                <th>Название услуги</th>
                                <th>Единица измерения</th>
                                <th>Количество оказаний услуги</th>
                                <th>Сумма</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                ';
                foreach ($dopuslugi  as $row) {
                    echo "<tr>
                            <td>".$row['id_uslugi']."</td>
                            <td>".$row['usluga_name']."</td>";
                            if ($row["ed_izm"] == NULL) {
                                echo "<td>--</td>";
                            }
                            else {
                                echo "<td>".$row["ed_izm"]."</td>";
                            }
                            echo "
                            <td>".$row['colvo']."</td>
                            <td>".$row['sum']."</td>
                        </tr>";
                }

                echo '<tr>
                    <th colspan="4">Общая сумма за день:</th>
                    <th>'.$full_sum.'</th>
                </tr>';

                echo '</tbody></table>';
            }
        ?>
        </div>
    </div>
</div>