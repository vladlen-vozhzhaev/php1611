<?php
    $uploaddir = '../img/'; // <- это всего лишь строка
    $uploadfile = $uploaddir.$_FILES['userfile']['name'];
    move_uploaded_file($_FILES['userfile']["tmp_name"], $uploadfile);
    echo $uploadfile;