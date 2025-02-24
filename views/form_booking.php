<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 style="text-align: center">Оформление бронирования</h1>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="booking/view_nomers" method="POST">
                <div class="mb-3">
                    <label for="date_start" class="form-label">Дата заезда</label>
                    <input type="date" class="form-control" name="date_start" required>
                </div>
                <div class="mb-3">
                    <label for="date_end" class="form-label">Дата выезда</label>
                    <input type="date" class="form-control" name="date_end" required>
                </div>
                <div class="mb-3">
                    <label for="date_end" class="form-label">Количество заселяемых</label>
                    <select class="form-select" aria-label="Пример выбора по умолчанию" name="person">
                        <option value="1">Один</option>
                        <option value="2">Два</option>
                        <option value="3">Три</option>
                    </select>
                </div>
                <h4 style="text-align: center">Выберите тип номера</h4>
                <?php
                foreach ($type as $row) {
                    echo '<div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="id_type" value="'.$row['id_type'].'">
                    <label class="form-check-label" for="flexRadioDefault1">'.$row['name_type'].'</label>
                    </div>';
                }
                ?>
                <div style="text-align: center; padding-top: 20px;">
                    <button type="submit" class="btn btn-outline-dark">Далее</button><br><br>
                </div>
            </form>
        </div>
        <div class=" col-3">
        </div>
    </div>
</div>