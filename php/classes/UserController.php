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
}