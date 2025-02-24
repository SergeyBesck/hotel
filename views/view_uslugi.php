<h2 class="name">Дополнительные услуги</h2>
<section id="price">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <form action="booking/dop_uslugi_insert" method="POST">
                <div class="row row-cols-1  row-cols-md-3 g-4">
                    <?php
                    foreach ($uslugi as $row) {
                        echo '<div class="form-check">
                    <input class="form-check-input" type="checkbox" name="id_uslugi[]" value="' . $row['id_uslugi'] . '">
                    <label class="form-check-label" for="flexRadioDefault1">' . $row['name_usluga'] . ' - ' . $row['price'] . 'руб</label>
                    </div>';
                    }
                    ?>
                </div>
                <div style="text-align: center; padding-top: 20px;">
                    <button type="submit" class="btn btn-outline-dark">Оформить</button>
                </div>
                <?php
                foreach ($bron as $row) {
                    echo '<input type="hidden" id="id_bron" name="id_bron" value="' . $row['id_bron'] . '" />';
                }
                ?>
            </form>
        </div>
        <div class="col-lg-1"></div>

    </div>
</section>