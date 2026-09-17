<!DOCTYPE html>
<html>
    <head>
             <title>Админ</title>
             <link rel="stylesheet" href="admin.css">
             <html lang="ru">
             <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
             
             <link rel="stylesheet" href="css/admin.css">
    </head>
    <body>
    
    <?php
            session_start();
            include('config.php');
            include('helpers.php');

            if (isset($_POST['register'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $password_hash = password_hash($password, PASSWORD_BCRYPT);

                $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
                $query->bindParam("username", $username, PDO::PARAM_STR);
                $query->execute();
                if ($query->rowCount() > 0) {
                    echo '<p class="error">Это имя уже зарегистрирован!</p>';
                }
                if ($query->rowCount() == 0) {
                    $query = $connection->prepare("INSERT INTO users(username,password) VALUES (:username,:password_hash)");
                    $query->bindParam("username", $username, PDO::PARAM_STR);
                    $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
                    $result = $query->execute();
                    if ($result) {
                        echo '<p class="success">Регистрация прошла успешно!</p>';
                    } else {
                        echo '<p class="error">Неверные данные!</p>';
                    }
                }
            }
        ?>
        

        <form method="post" action="" name="signup-form">
            <div class="form-element">
            <label>Username1</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
            </div>
            <div class="form-element">
            <label>Password</label>
            <input type="password" name="password" required />
            </div>
            <button type="submit" name="register" value="register">Register</button>         
             <a href="index.php" class="btn btn-info">на главную</a>
        </form>
    </body>
</html>