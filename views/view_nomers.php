<h2 class="name">Каталог доступных номеров</h2>
<section id="price">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="row row-cols-1  row-cols-md-3 g-4">
                <?php
                foreach ($nomersbooking as $row) {
                    echo '<div class="col">
                        <div class="card h-100">
                        <img src="img/' . $row['photo'] . '" class="card-img-top ic" alt="...">
                        <div class="card-body">
                        <h4 class="card-title"><b>'.$row['namen'].'</b></h4>
                        <p class="card-text">'.$row['description'].'</p> 
                        <h5 class="card-title"><b>Цена за сутки: <span style="color:red">'.$row['price'].'</b></span> руб.</h5>
                        </div>
                        <div class="card-footer">
                        <a class="btn btn-secondary" href="booking/bron?id_nomer='.$row['id_nomer'].'" role="button">Забронировать</a>
                        </div>
                        </div>
                        </div>';
                }
                ?>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>