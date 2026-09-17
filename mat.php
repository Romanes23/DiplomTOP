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
            <h2>материалы по заказу № <?= $_POST["id"];?></h2>
             
            <table class="table table-hover">
          <thead>
                    <tr>

                      <th>№ пп</th>
                    
                        <th>Наименование материала </th>
                        <th>План необходимос  </th>
                        <th>Факт наличие  </th>
                        <th>Дефицит </th>

 
                    </tr>                   
                </thead>


                  <tbody>

 <?php
 if(isset($_POST["id"])){
    //dd($_POST);
        $stmt = $connection->prepare("SELECT * FROM materials  WHERE mat_zak = :id");
        $stmt->bindValue(":id", $_POST["id"]);
        $stmt->execute();
        $mt = $stmt->fetchAll();   $rowNumber = 1;
        $sum=0;
     //  dd($mt);  
      
 }
    foreach($mt as $rezult){
        //  dd($mt);
?>
                        <ol>
                            <tr>
                                <td>
                                    <?php echo $rowNumber; $rowNumber++ ?>
                                </td>
                                <td>
                                    <?php echo $rezult['mat_name']; ?>
                                </td>
                                <td>
                                    <?php echo $rezult['mat_is']; ?>
                                </td>
                                <td>
                                    <?php echo $rezult['mat_need']; ?>
                                </td>
                                <td>
                                    <?php echo $rezult['mat_need']-$rezult['mat_is']; ?>
                                </td>

                            </tr>
                        </ol>
    <?php
    }

 

    ?>





    
                </tbody>
            </table>

   
          
                                <?php
                                    echo "<td><form action='edit.php' method='post'>
                                          <input type='hidden' name='id' value='" .$_POST["id"]. "' />
                                          <input class='btn btn-info' type='submit' value='Вернуться к заказу'>
                                          </form></td>";
                                    ?>         
                              &nbsp;


 <?php
                                    echo "<td><form action='dif.php' method='post'>
                                          <input type='hidden' name='id' value='" .$_POST["id"]. "' />
                                          <input class='btn btn-info' type='submit' value='Вывести  дифицит'>
                                          </form></td>";
                                ?>


        </div>
    </div>
</body>
 
</html>