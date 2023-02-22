<?php
class UserController{
    public static function login($email, $pass){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM `users` WHERE email = '$email'");
        if($result->num_rows){
            $row = $result->fetch_assoc();
            if(password_verify($pass, $row['pass'])){
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['email'] = $row['email'];
                header("Location: /profile.php");
            }else{
                header("Location: /login.php?m=error");
            }
        }else{
            header("Location: /login.php?m=error");
        }
    }

    public static function reg($name, $lastname, $email, $pass){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM `users` WHERE email = '$email'");
        if($result->num_rows){
            exit("Такой пользователь уже существует");
        }else{
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name','$lastname','$email','$pass')");
            header("Location: /login");
        }
    }

    public static function getUserData(){
        // Array
        $userData = [
            'id'=>$_SESSION['id'],
            'name'=>$_SESSION['name'],
            'lastname'=>$_SESSION['lastname'],
            'email'=>$_SESSION['email']
        ];
        // Преобразуем Array в JSON
        $jsonUserData = json_encode($userData);
        // Показываем на экране данные в формате JSON
        exit($jsonUserData);
    }

    // Метод получения всех пользователей из таблицы users в формате JSOB
    public static function getUsers(){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM users");
        $users = [];
        while (($row = $result->fetch_assoc())!=null){
            $users[] = $row; // Добавляем каждого пользователя в массив $users
        }
        return json_encode($users); // Кодируем массив в формат JSON
    }

    public static function logout(){
        session_destroy();
        header("Location: /");
    }
    public static function uploadAvatar(){
        $uploaddir = '/img/'; // <- это всего лишь строка
        $uploadfile = $uploaddir.$_FILES['userfile']['name'];
        move_uploaded_file($_FILES['userfile']["tmp_name"], $uploadfile);
        global $mysqli;
        $userId = $_SESSION['id'];
        $mysqli->query("UPDATE `users` SET `img`='$uploadfile' WHERE id='$userId'");
        header('Location: /profile');
    }
}