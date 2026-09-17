<!DOCTYPE html>
<html lang="en">
<!-- Таблица с данными клиентов  -->
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>users</title>
</head>
 
<body>


    <div class="container">
        <div class="row">
            <h2>Список заказов в работе</h2>
             
            <table class="table table-hover">

 <form method="POST"> <!-- // имя "pul" +куча значений, но первым выбран  zakaz_id-->
     
                <thead>
                    <tr>

                      <th>№ пп</th>
                        <th>№ заказа  <input type="radio" name="pul" value = zakaz_id  checked > </th>
                        <th>Комментарий <input type="radio" name="pul" value = text ></th>
                        <th>Статус <input type="radio" name="pul" value= status> </th>
                        <th>Клиент <input type="radio" name="pul" value= name> </th>
                        <th>Дата заявки <input type="radio" name="pul" value= date_in> </th>
                        <th>Дата выполнения <input type="radio" name="pul" value= date_out> </th>
                        <th>Сумма заказа <input type="radio" name="pul" value= sum_z></th>
                         <th>Сумма предоплат <input type="radio" name="pul" value= sum_a></th>
                         <th><input  class='btn btn-info' type="submit" value="Отобрать"> </th>


                    </tr>                   
                </thead>
 </form>
  
 
 
 <tbody>
 
 
 <?php
 
 if(isset($_POST["pul"]))  // это выбранное значение для фильтра
{
    $pul = $_POST["pul"];
  // echo $pul;
  

 
                        include_once('config.php');
                        $stmt = $connection->prepare("SELECT * FROM us where arhiv = 0 ORDER by $pul" );
                        $stmt->execute();
                        $users = $stmt->fetchAll();  $rowNumber = 1;
                        foreach($users as $user)
                        {
?>
                        <ol>
                            <tr>
                                <td>
                                    <?php echo $rowNumber; $rowNumber++ ?>
                                </td>
                                <td>
                                    <?php echo $user['zakaz_id']; ?>
                                </td>
                                <td>
                                    <?php echo $user['text']; ?>
                                </td>
                                <td>
                                 <?php echo $user['status']; ?>
                                </td>
                                <td>
                                    <?php echo $user['name']; ?>
                                </td>
                                <td>
                                    <?php echo $user['date_in']; ?>
                                </td>
                                <td>
                                    <?php echo $user['date_out']; ?>
                                </td>
                                <td>
                                    <?php echo $user['sum_z']; ?>
                                </td>
                                <td>
                                    <?php echo $user['sum_a']; ?>
                                </td>


                                <?php
                                    echo "<td><form action='edit.php' method='post'>
                                          <input type='hidden' name='id' value='" . $user['zakaz_id'] . "' />
                                          <input class='btn btn-info' type='submit' value='Редактировать'>
                                          </form></td>";


                                    echo "<td><form action='payment.php' method='post'>
                                          <input type='hidden' name='id' value='" . $user['zakaz_id'] . "' />
                                          <input class='btn btn-info' type='submit' value='В архив'>
                                          </form></td>";
                                          
                                          
                                    echo "<td><form action='clear.php' method='post'>
                                          <input type='hidden' name='id' value='" . $user['zakaz_id'] . "' />
                                          <input class='btn btn-info' type='submit' value='Удалить'>
                                          </form></td>";

                                ?>
                            </tr>
                        </ol>


                    <?php
                        }
                    }

                    ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-info">на главную</a>
        </div>
    </div>
</body>
 
</html>