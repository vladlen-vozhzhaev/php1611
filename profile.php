<?php
require_once('header.php');
?>
        <!-- Конец меню -->
        <div class="container">
            <p>Имя: <?= $_SESSION['name']; ?></p>
            <p>Фамиля: <?= $_SESSION['lastname'] ?></p>
            <p>Email: <?= $_SESSION['email'] ?></p>
            <p>ID: <?= $_SESSION['id'] ?></p>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>