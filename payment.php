<!DOCTYPE html>
<html lang="en">
<!-- Таблица платежей  -->
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>users</title>
</head>
 
<?php
 include_once('helpers.php');
 include_once('config.php');
 
?>

<body>
    <div class="container">
        <div class="row">
            <h2>история платежей по заказу № <?= $_POST["id"];?></h2>
             
            <table class="table table-hover">

                                            <form method="POST">  
                                                            <thead>
                                                                <tr>
                                                                <th>№ пп</th>
                                                                    <th>Дата поступления  </th>
                                                                    <th>Сумма</th>
                                                                </tr>                   
                                                            </thead>
                                            </form>
                  <tbody>

 <?php
 if(isset($_POST["id"])){
    //dd($_POST);
        $stmt = $connection->prepare("SELECT * FROM money  WHERE av_zak = :id");
        $stmt->bindValue(":id", $_POST["id"]);
        $stmt->execute();
        $money = $stmt->fetchAll();   $rowNumber = 1;
        $sum=0;
      
 }
    foreach($money as $rezult){
      //    dd($money);
?>
                        <ol>
                            <tr>
                                <td>
                                    <?php echo $rowNumber; $rowNumber++ ?>
                                </td>
                                <td>
                                    <?php echo $rezult['av_date']; ?>
                                </td>
                                <td>
                                    <?php echo $rezult['av_sum'];  $sum =$sum +$rezult['av_sum'];?>
                                </td>
                                <td>

                            </tr>
                        </ol>
    <?php
    }

 

    ?>
    <h4>Итог <?=  $sum  ;?> руб.</h4>
                </tbody>
            </table>
 
          
                                <?php
                                    echo "<td><form action='edit.php' method='post'>
                                          <input type='hidden' name='id' value='" .$_POST["id"]. "' />
                                          <input class='btn btn-info' type='submit' value='Вернуться к заказу'>
                                          </form></td>";
                                ?>

        </div>
    </div>
</body>
 
</html>