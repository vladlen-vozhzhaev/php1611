<div class="container my-5">
    <h1 class="text-center my-3">Регистрация на сайте</h1>
    <div class="col-sm-5 mx-auto">
        <form action="/php/handlerReg.php" method="post">
            <div class="mb-3">
                <input name="name" type="text" class="form-control" placeholder="Имя">
            </div>
            <div class="mb-3">
                <input name="lastname" type="text" class="form-control" placeholder="Фамилия">
            </div>
            <div class="mb-3">
                <input name="email" type="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="mb-3">
                <input name="pass" type="password" class="form-control" placeholder="Пароль">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Зарегистрироваться">
            </div>
        </form>
    </div>
</div>