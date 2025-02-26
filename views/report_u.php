<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 style="text-align: center">Отчёт о доходах от дополнительных услуг за период с <?= $d1 ?> по <?= $d2 ?></h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <form class="form-inline" action="buhgalter/report_usluga" method="POST">
                <div class="mb-3">
                    <label for="date_1" class="form-label">C</label>
                    <input type="date" class="form-control" name="date_1">
                </div>
                <div class="mb-3">
                    <label for="date_2" class="form-label">По</label>
                    <input type="date" class="form-control" name="date_2">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-danger">Применить</button>
                </div>
            </form>
        </div>
        <div class="col-lg-9">
            <table class="table">
                <thead>
                    <tr class="table-info">
                        <th>Вид услуги</th>
                        <th>Ед.измерения</th>
                        <th>Количество услуг</th>
                        <th>Цена</th>
                        <th>Сумма</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    if (!empty($uslugi)) {
                        foreach ($uslugi  as $row) {
                            $total += $row['count(id)'];
                            $total += $row['sum(price)'];
                            echo "<tr> 
                                       <td>" . $row['name_usluga'] . "</td>
                                       <td>" . $row['ed_izm'] . "</td>
                                       <td>" . $row['count(id)'] . "</td>
                                        <td>" . $row['price'] . "</td>
                                        <td>" . $row['sum(price)'] . "</td>
                                    </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
