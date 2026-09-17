<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
</head>


<body>


<?php
     include('helpers.php');
// Заявка пользователя
$result = false;


       if (isset($_POST['name'])&&isset($_POST['tel'])&& isset($_POST['text'])){
         

        $name = $_POST['name'];
        $text = $_POST['text'];
        $tel =$_POST['tel'];
        $status = "1 Получена заявка";


        $db_host = "MySQL-8.2"; 
        $db_user = "root";
        $db_password = ""; 
        $db_base = 'Remstr';
        $db_table = "us"; 
        $db_table1 = "money"; 
        $date = date('Y-m-d');

        try {
            
            $db = new PDO("mysql:host=$db_host; dbname=$db_base", $db_user, $db_password);
            $db->exec("set names utf8");

            $data = array( 'name' => $name, 'tel' => $tel, 'text' => $text, 'status' => $status ); 
            $query = $db->prepare("INSERT INTO $db_table (name, tel, text, status) values (:name, :tel, :text, :status)");
            $query->execute($data);
           
     
 
 
            $N=$db->lastInsertId();  //последний Id запоминаем
         //   dd($N);

            $data1 = array( 'av_zak' => $N, 'av_sum' => 0, 'av_date' => $date); 
            $query = $db->prepare("INSERT INTO $db_table1 (av_zak, av_sum, av_date) values (:av_zak, :av_sum, :av_date)");
            $query->execute($data1);

            $result = true; } 
        catch (PDOException $e){
            echo "Ошибка!: " . $e->getMessage() . "<br/>"; }
         
        if ($result){ 
           
      
            echo "заявка создана!";}
            echo '<p class="success">Регистрация прошла успешно!</p>';





            unset($db);
    }
    ?>
    



    <a href="index.php" class="btn btn-info">на главную</a>
</body>
</html>
 
