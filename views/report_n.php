<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 style="text-align: center">Сведения о забронированных номерах за период с <?= $d1 ?> по <?= $d2 ?></h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <form class="form-inline" action="buhgalter/report_nomer" method="POST">
                <div class="mb-3">
                    <label for="date_1" class="form-label">C</label>
                    <input type="date" class="form-control" name="date_1">
                </div>
                <div class="mb-3">
                    <label for="date_2" class="form-label">По</label>
                    <input type="date" class="form-control" name="date_2">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Применить</button>
                </div>
            </form>
        </div>
        <div class="col-lg-9">
            <table class="table">
                <thead>
                    <tr class="table-info">
                        <th>№</th>
                        <th>Тип номера</th>
                        <th>Стоимость номера в сутки</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    if (!empty($bron)) {
                        foreach ($bron  as $row) {
                            echo "<tr>
                                       <td>" . $row['id_bron'] . "</td>
                                       <td>" . $row['namen'] . "</td>
                                        <td>" . $row['price'] . "</td>
                                        <td>" . $row['status'] . "</td>
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
