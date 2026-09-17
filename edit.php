<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
</head>

<?php
// редактирование заказов
//$user['status']=null;
include_once('config.php');
include_once('helpers.php');
$avans=0;
if(isset($_POST["id"])){
        $stmt = $connection->prepare("SELECT * FROM us WHERE zakaz_id = :id");
        $stmt->bindValue(":id", $_POST["id"]);
        $stmt->execute();
        $result = $stmt->fetchAll();
      
        //  dd($result);   
}


if(isset($_POST["change"])){   // усли установлена переменная change  определяем др переменные
 $st = $_POST["tipezan"];  // новый статус заказа
 $sz = $_POST["sz"];
 $d_out = $_POST["d_out"];
 $id = $_POST["id"];
 $arh =  (isset( $_POST["arh"])) ? 1 : 0;
 // dd($_POST );
 $stmt1 = $connection->prepare ("UPDATE `us` SET `status`='$st',`date_out`='$d_out',`sum_z`='$sz', `arhiv` =  '$arh'  WHERE `zakaz_id` = :id");
 $stmt1->bindValue(":id", $_POST["id"]);
 $stmt1->execute();
 echo "Изменено строк " . $stmt1->rowCount();   
 }
   

 
if(isset($_POST["pay"])){   
  // dd($_POST ); 
 (int)$sa = $_POST["sa"];
 (int)$za = $_POST["id"];
      $da =  date('Y-m-d');
   $stmt2 = $connection->prepare ("INSERT INTO `money` (`av_zak`, `av_sum`,  `av_date` ) VALUES($za, $sa, '$da')");
   $stmt2->execute();

 $stmt3 = $connection->query("SELECT SUM(`av_sum`) AS total FROM `money` WHERE `av_zak` = $za");
$row = $stmt3->fetch(PDO::FETCH_ASSOC);
$total = $row['total'];
echo "Общая сумма: " . $total;

$stmt4 = $connection->prepare ("UPDATE `us` SET `sum_a`='$total'  WHERE `zakaz_id` = :id");
$stmt4->bindValue(":id", $_POST["id"]);
$stmt4->execute();
echo "Изменено строк " . $stmt4->rowCount();   


 }
?>




<body>
      <?php   
    //  dd($result);
    
    foreach ($result as $user){?>

    <div class="container">
    <div class="row">
    <div class="col-md-4"> </div>
    <div class="col-md-4">
        <h3>Карточка заказа № <?= $user['zakaz_id'];?></h3>
 
   
        <form method= "POST" action="">

<!-- ================клиент===================== -->
        
            <div class="form-group">
                <label for="name">Клиент</label>
                <input type="text" name="nam" class="form-control" id="nam" value="<?= $user['name']?>" disabled>  
            </div>
             <div class="form-group">
               <input type="hidden" name="id" value="<?= $user['zakaz_id']?>" > 
            </div>
             <!-- ================date_in===================== -->
            <div class="form-group">
                <label for="name"> Дата заявки</label>
                <input type="datetime" name="d_in" class="form-control" id="d_in" value="<?=  $user['date_in'] ?>"disabled >   
            </div>
       <!-- =============status======================== -->
        <div class="form-group">
                <label for="name">Статус заказа</label>

        <select class="form-select" name="tipezan" >
            <?php
            $z = (isset( $_POST["tipezan"])) ? $_POST["tipezan"] : $user['status'];
             $d = ( $z == "1 Получена заявка") ? "" : "required";
              echo " $d";
            ?>

            <option selected  ><?=  $z  ?></option>
            <option value="1 Получена заявка">1 Получена заявка</option>
            <option value="2 Заключен договор">2 Заключен договор</option>
            <option value="3 Получена предоплата">3 Получена предоплата</option>
            <option value="4 Комплектация">4 Комплектация</option>
            <option value="5 Передан в производство">5 Передан в производство</option>
            <option value="6 Выполнен">6 Выполнен</option>
            <option value="7 Окончательный расчет">7 Окончательный расчет</option>
            <option value="8 Передан клиенту">8 Передан клиенту</option>
        </select>
         
        <!-- ================date_out===================== -->
            <div class="form-group">
            <?php $d_out = (isset( $_POST["d_out"]) ? $_POST["d_out"] : $user['date_out']);  ?>
                <label for="name"> Дата выполнения</label>
                <input type="date" name="d_out" class="form-control" id="d_out" value="<?= $d_out ?>"  required >  
            </div>

    

       
        
        <!-- ================sum===================== -->

            <div class="form-group">
            <?php $sz = (isset( $_POST["sz"]) ? $_POST["sz"] : $user['sum_z']);?>
                <label for="name">Сумма заказа</label>
                <input type="numeric" name="sz" class="form-control" id="sz" value="<?= $sz?>" required>  
            </div>

           <button type="submit"  class="btn btn-info" name="change" value="change"> Записать изменения</button> 


            <a href="client.php" class="btn btn-info">к заказам</a>


            <!-- ================payment===================== -->
            <div class="form-group">
                <?php $sa = (isset( $_POST["sa"]) ? $_POST["sa"] : 0);  ?>
                    <label for="name">Внести оплату</label>              
                    <input type="numeric" name="sa" class="form-control" id="sa" value="<?= $sa?>">                     
            <div>
            <div class="form-group"></div>
            </div>
                    <button type="submit"  class="btn btn-info"    name="pay" value= "pay"> Записать поступление платежа</button>     

                    
            </div>
  <!-- ================долг клиента===================== -->
        <div class="form-group">
                        <?php $sa = (isset( $_POST["sa"]) ? $_POST["sa"] : $user['sum_a']); 
                              $sz = (isset( $_POST["sz"]) ? $_POST["sz"] : $user['sum_z']);
                              $sdbt =$sz-$sa;
                              $sdbt =isset( $total) ? $sz-$total : $sz-$sa;
                              ?>
                <label for="name">Долг клиента</label>

                <input type="text" name="nam" class="form-control" id="nam" value="<?= $sdbt?>" disabled>  
            </div>

     
   

    
  <!-- ================arhive===================== -->
                <div class="btn btn-info">
                <label for="name"> Поместить  в архив</label>
                <input type="checkbox" name="arh"  >
                </div>
     
     
        
        </form> 



        <div class="form-group"></div>

 <div class="form-group">
  
       


      <div class="form-group"></div>

                   <?php                                 
                  echo "<form action='payment.php' method='post'>
                        <input type='hidden' name='id' value='" . $user['zakaz_id'] . "' />
                        <input class='btn btn-info' type='submit' value='история платежей клиента по заказу'>
                        </form>";
                            ?>

                          &nbsp;
                           <?php    
                  echo "<form action='mat.php' method='post'>
                        <input type='hidden' name='id' value='" . $user['zakaz_id'] . "' />
                        <input class='btn btn-info' type='submit' value='наличие материала на складе'>
                        </form>";
                ?>



        </div>


</div>

    </div>
    </div>
      <?php  }?>
</body>





<!-- <style>div.row {
    background-image: url("interface/footer.jpg");
    background-color: #000;
    background-size: cover;
}
body{
    color:AntiqueWhite; 
}
</style> -->
</html>
