<div class="container my-3">
    <div class="col-sm-6 mx-auto">
        <form action="/php/addArticle.php" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="title" placeholder="Заголовок">
            </div>
            <div class="mb-3">
                <textarea name="content" placeholder="Контент" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <input name="author" type="text" class="form-control" placeholder="Автор">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>