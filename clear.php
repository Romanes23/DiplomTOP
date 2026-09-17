<?php
// очистить строку в базе
if(isset($_POST["id"]))
{
    
        include_once('config.php');
        $stmt = $connection->prepare("DELETE FROM us WHERE zakaz_id = :id");
        $stmt->bindValue(":id", $_POST["id"]);
        $stmt->execute();
        header("Location: client.php");
   
}
?>