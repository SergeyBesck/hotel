<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 style="text-align: center">Авторизация</h1>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="main/authorization" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control" name="login" placeholder="Логин" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="pass" placeholder="Пароль" required>
                </div>
                <?php if (!empty($error)): ?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
                <div class="text">
                    <button type="submit" class="btn btn-outline-dark">Войти</button><br><br>
                </div>
            </form>
        </div>
        <div class=" col-3">
        </div>
    </div>
</div>