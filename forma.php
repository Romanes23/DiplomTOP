<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
</head>
<body>
    <div> </div>
    <div class="container">
    <div class="row">
    <div class="col-md-4"> </div>
    <div class="col-md-4">
        <h4>Форма обратной связи</h4>
        <!-- Закидываем  ч/з post.php в базу -->
        <form method="POST" action="post.php"> 
            <div class="form-group">
                <label for="name">Ваше имя:</label>
                <input type="name" name="name" class="form-control" id="name" placeholder="Name" required>
            </div>
            <div class ="form-group">
                <label for="email">Телефон в формате: +7 ххх ххх хх хх</label>
                <input class="form-control" type="text" name="tel" id="email" placeholder="tel" required>
            </div>
            <div class="form-group">
                <label  for="message">Сообщение:</label>
                <textarea class="form-control" name="text" rows="3"></textarea>
            </div>
    
            <button type="submit" class="btn btn-info">Отправить заявку</button>
            <a href="index.php" class="btn btn-info">на главную</a>
        </form> 
        </div>
        <div class="col-md-4">
    </div>
    </div>
    </div>
</body>
<style>div.row {
    background-image: url("interface/footer.jpg");
    background-color: #000;
    background-size: cover;
}
body{
    color:AntiqueWhite; 
}
</style>
</html>
