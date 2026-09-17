<!DOCTYPE html>
<html>
    <head>
             <title>Админ</title>
             <html lang="ru">
             <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
             <link rel="stylesheet" href="css/admin.css">
    </head>
    <body>
            <?php
                session_start();
                include('config.php');
                include('helpers.php');
                if (isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
                    $query->bindParam("username", $username, PDO::PARAM_STR);
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_ASSOC);   //Получили массив из запроса
//dd($result);
                    
                    if (!$result) {
                        echo '<p class="error">Нет такого пользователя!</p>';}
                    else {
                        if (password_verify($password, $result['password'])) {
                            // $_SESSION['user_id'] = $result['id'];
                            // dd( $_SESSION);
                       //  echo '<p class="success">  Поздравляем, вы прошли авторизацию! </p>';
                       
                            ob_start(); // буферизация вывода
                            $new_url = 'client.php';  // данные клиентов
                            header('Location: '.$new_url); // перенаправляем
                            ob_end_flush();  // отправляет содержимое текущего буфера вывода в браузер и отключает буферизацию 
                        } else {
                            echo '<p class="error"> Неверные пароль или имя пользователя!</p>';
                        }
                    }
              }
            ?>
            <div class="row">

                <div class="media-body">Войти в панель менеджера</div>
                <div class='table-content'>


                <form method="post" action="" name="signin-form">
                        <div class="form-element">
                            <label>Username</label>
                            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
                        </div>
                        <div class="form-element">
                            <label>Password</label>
                            <input type="password" name="password" required />
                        </div>
                        <button type="submit" name="login" value="login" class="btn btn-info">войти</button>


                        <a href="index.php" class="btn btn-info">на главную</a>
                </form>
                </div>
            </div>
    </body>
</html>