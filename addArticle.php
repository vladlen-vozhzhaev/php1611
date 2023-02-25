<div class="container my-3">
    <div class="col-sm-9 mx-auto">
        <form action="/addArticle" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="title" placeholder="Заголовок">
            </div>
            <div class="mb-3">
                <!--<textarea name="content" placeholder="Контент" class="form-control"></textarea>-->
                <textarea id="sample">Hi</textarea>
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
<link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
<!-- <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/assets/css/suneditor.css" rel="stylesheet"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/assets/css/suneditor-contents.css" rel="stylesheet"> -->
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
<!-- languages (Basic Language: English/en) -->
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/ru.js"></script>
<script>
    const editor = SUNEDITOR.create((document.getElementById('sample') || 'sample'),{
        lang: SUNEDITOR_LANG['ru'],
        width: '100%',
        height: '400px'
    });
</script>