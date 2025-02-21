<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 style="text-align: center">Регистрация</h1>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="main/registration" method="POST">
                <div class="mb-3">
                    <label for="fio" class="form-label">ФИО</label>
                    <input type="text" class="form-control" name="fio" required>
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">Номер телефон</label>
                    <input type="text" class="form-control" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="number_passport" class="form-label">Номер паспорта</label>
                    <input type="text" class="form-control" name="passport_number" required>
                </div>
                <div class="mb-3">
                    <label for="date_issue_passport" class="form-label">Дата выдачи паспорта</label>
                    <input type="date" class="form-control" name="number_date" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Дата рождения</label>
                    <input type="date" class="form-control" name="date_birthday" required>
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control" name="login" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="pass" required>
                </div>
                <div class="text">
                    <button type="submit" class="btn btn-outline-dark">Зарегистрироваться</button><br><br>
                </div>
            </form>
        </div>
        <div class=" col-3">
        </div>
    </div>
</div>