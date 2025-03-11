<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 style="text-align: center">Добавить отзыв</h1>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="user/leaveotziv" method="POST">
                <?php
                $id_bron = $_GET['id_bron'];
                    echo '<input type="hidden" value="' . $id_bron . '" name="id_bron" id="id_bron">';
                
                ?>
                <div class="mb-3">
                    <label for="customRange2" class="form-label">Оценка</label>
                    <input type="range" class="form-range" min="0" max="5" id="customRange2" name="ball">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Текст отзыва</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                        name="description"></textarea>
                </div>
                <div style="text-align: center; padding-top: 20px;">
                    <button type="submit" class="btn btn-outline-dark">Оставить отзыв</button><br><br>
                </div>
            </form>
        </div>
        <div class=" col-3">
        </div>
    </div>
</div>