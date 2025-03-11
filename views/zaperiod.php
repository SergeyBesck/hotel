<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 style="text-align: center">Сводный отчёт о доходах за период</h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5"></div>
        <div class="col-lg-2">
            <form class="form-inline" action="otchets/zaperiod" method="POST">
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

            echo '<h3 class="text-center">Показан сводный отчёт за указанный период</h3>';

            //Номера
            if (!empty($nomerszaperiod)
            ){

                echo '<h4 class="text-center">Информация о номерах:</h4>';

                echo '
                    <table class="table">
                        <thead>
                            <tr class="table-info">
                                <th>ИД номера</th>
                                <th>Название</th>
                                <th>Тип</th>
                                <th>Количество бронирований</th>
                                <th>Стоимость</th>
                                <th>Средняя длительность бронирования (сут.)</th>
                                <th>Максимальная длительность бронирования (сут.)</th>
                                <th>Минимальная длительность бронирования (сут.)</th>
                                <th>Сумма</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                ';
                foreach ($nomerszaperiod as $row) {
                    echo "<tr>
                            <td>".$row['id_nomer']."</td>
                            <td>".$row['nomer_name']."</td>
                            <td>".$row['type_name']."</td>
                            <td>".$row['bron_colvo']."</td>
                            <td>".$row['price']."</td>
                            <td>".$row['avg_bron_lasting']."</td>
                            <td>".$row['max_bron_lasting']."</td>
                            <td>".$row['min_bron_lasting']."</td>
                            <td>".$row['nomer_sum']."</td>
                        </tr>";
                }

                echo '<tr>
                    <th colspan="8">Общая сумма:</th>
                    <th>'.$nomers_full_sum.'</th>
                </tr>';

                echo '</tbody></table>';
            }

            //Типы номеров

            if (!empty($typeszaperiod))
            //(!empty($dopuslugizaperiod))
            {

                echo '<h4 class="text-center">Информация о типах номеров:</h4>';

                echo '
                    <table class="table">
                        <thead>
                            <tr class="table-info">
                                <th>ИД типа</th>
                                <th>Название</th>
                                <th>Количество бронирований</th>
                                <th>Средняя длительность бронирования (сут.)</th>
                                <th>Максимальная длительность бронирования (сут.)</th>
                                <th>Минимальная длительность бронирования (сут.)</th>
                                <th>Сумма</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                ';
                foreach ($typeszaperiod as $row1) {
                    echo "<tr>
                            <td>".$row1['id_type']."</td>
                            <td>".$row1['name_type']."</td>
                            <td>".$row1['colvo_bron']."</td>
                            <td>".$row1['avg_bron_lasting']."</td>
                            <td>".$row1['max_bron_lasting']."</td>
                            <td>".$row1['min_bron_lasting']."</td>
                            <td>".$row1['total_sum']."</td>
                        </tr>";
                }

                echo '<tr>
                    <th colspan="6">Общая сумма:</th>
                    <th>'.$types_full_sum.'</th>
                </tr>';

                echo '</tbody></table>';
            }

            //Доп. услуги
            if (!empty($dopuslugizaperiod))
            {

                echo '<h4 class="text-center">Информация о доп. услугах:</h4>';

                echo '
                    <table class="table">
                        <thead>
                            <tr class="table-info">
                                <th>ИД услуги</th>
                                <th>Название</th>
                                <th>Единица измерения</th>
                                <th>Число оказания услуг</th>
                                <th>Сумма</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                ';
                foreach ($dopuslugizaperiod as $row2) {
                    echo "<tr>
                            <td>".$row2['id_uslugi']."</td>
                            <td>".$row2['usluga_name']."</td>
                            <td>".$row2['ed_izm']."</td>
                            <td>".$row2['colvo']."</td>
                            <td>".$row2['sum']."</td>
                        </tr>";
                }

                echo '<tr>
                    <th colspan="4">Общая сумма:</th>
                    <th>'.$u_full_sum.'</th>
                </tr>';

                echo '</tbody></table>';
            }

            if (!empty($nomers_full_sum) && !empty($types_full_sum) && !empty($u_full_sum)){
                $full_summ = $nomers_full_sum + $types_full_sum + $u_full_sum;
                echo '<h2 class="text-center">Общая сумма из всех источников составляет: '.$full_summ.'</h2>';
            }
        ?>
        </div>
    </div>
</div>