<!DOCTYPE html>
<html>
    <head>
             <title>Админ1</title>
             <html lang="ru">
             <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
             <link rel="stylesheet" href="css/admin.css">
    </head>

    <body>
           <div class="row">
                        <div class="media-body">Войти в панель администратора</div>
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
            </div>
    </body>

</html> 