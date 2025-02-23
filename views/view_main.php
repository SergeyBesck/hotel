<main>
    <section id="banner">
        <div id="carouselExampleDark" class="carousel carousel-white slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleWhite" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleWhite" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleWhite" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/baner.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption  d-md-block">
                        <h1>ГИБКАЯ СИСТЕМА СКИДОК!</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/baner1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption  d-md-block">
                        <h1>ИНДИВИДУАЛЬНЫЙ ПОДХОД ДЛЯ КАЖДОГО КЛИЕНТА!</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/baner2.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption  d-md-block">
                        <h1>ИНДИВИДУАЛЬНЫЙ ПОДХОД ДЛЯ КАЖДОГО КЛИЕНТА!</h1>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
        </div>
    </section>
    <h2 class="name">УСЛОВИЯ БРОНИРОВАНИЯ</h2>
    <section id="bron">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <b> 1. Бронирование номеров, заселение и выписка гостей в отеле производится круглосуточно.
                    2. Бронирование считается гарантированным при условии предварительной оплаты номера. При гарантированном бронировании номер сохраняется за гостем на
                    оплаченный срок. Негарантированное бронирование - производится по предварительному запросу Гостя без предварительной оплаты за проживание. При
                    негарантированном бронировании, в случае незаезда Гостя, Исполнитель снимает бронь после расчетного часа (14 часов) на дату заезда.
                    3. При бронировании, размещении или свободном поселении Гость выбирает категорию номера, а право выбора конкретного номера, принадлежащего данной категории,
                    остается за Администратором Отеля. </b>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </section>
    <h2 class="name">КАТАЛОГ НОМЕРОВ</h2>
    <section id="price">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="row row-cols-1  row-cols-md-3 g-4">
                    <?php
                    foreach ($nomers as $row)  //в цикле для каждой строки переменной $uslugi обозначим ее как $row   
                    {
                        echo '<div class="col">
      <div class="card h-100">
      <div class="card">
         <img src="img/' . $row['photo'] . '" class="card-img-top" alt="...">
         </div>
      <div class="card-body">
         <p class="card-title"><b>' . $row['namen'] . '</b></p>
         <p class="card-text">' . $row['description'] . '</p> 
         <h5 class="card-title"><b>Цена за сутки. : <span style="color:red">' . $row['price'] . '</b></span> руб.</h5>
      </div>
    </div>
  </div>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
        <div class="row">
            <div class="col-lg-5"></div>
            <div class="col-lg-2">
                <button type="submit" class="btn btn-secondary"><a href="#"></a>Подобрать подходящий номер</button>
            </div>
            <div class="col-lg-5"></div>
            </div>
    </section>
    <h2 class="name">ДОПОЛНИТЕЛЬНЫЕ УСЛУГИ</h2>
    <section id="price">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="row row-cols-1  row-cols-md-3 g-4">
                    <?php
                    foreach ($uslugi as $row)  //в цикле для каждой строки переменной $uslugi обозначим ее как $row   
                    {
                        echo '<div class="col">
                                <div class="card h-100">
                                <div class="card">
                                   <img src="img/' . $row['img'] . '" class="card-img-top" alt="...">
                                    </div>
                                <div class="card-body">
                                   <p class="card-title"><b>' . $row['name_usluga'] . '</b></p>
                                    <p class="card-text">' . $row['opisanie'] . '</p> 
                                </div>
                                <h5 class="card-footer"><b>Цена за услугу: <span style="color:red">' . $row['price'] . '</b></span> руб.</h5>
                                </div>
                            </div>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </section>
    <h2 class="name">КОНТАКТНЫЕ ДАННЫЕ</h2>
    <section id="kompany">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A3caa6dc144569e42e0ee1dbdd5524378f60d4aded8784270fe83a166fec3ca8d&amp;source=constructor" width="500" height="400" frameborder="0"></iframe>
            </div>
            <div class="col-lg-5">
                <h4 class="name1">
                    <p>Адрес: г.Краснодар,Ростовское шоссе,11/1 <br>
                        Телефон: 8(861) 200-55-55<br>
                        E-mail: gostin555@mail.ru<br></p>
                    Наши социальные сети<br>

                </h4>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </section>
</main>
