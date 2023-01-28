<?php
    require_once('header.php');
?>
    <div class="container my-5">
        <h1 class="text-center my-3">Авторизация на сайте</h1>
        <div class="col-sm-5 mx-auto">
            <form action="/php/handlerLogin.php" method="post">
                <div class="mb-3">
                    <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="mb-3">
                    <input name="pass" type="password" class="form-control" placeholder="Пароль">
                </div>
                <p style="color: red;">
                    <?php if($_GET['m']=='error'): ?>
                        Неправильный логин или пароль
                    <?php endif; ?>
                </p>
                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-primary" value="Войти">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>