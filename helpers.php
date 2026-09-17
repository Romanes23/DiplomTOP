<!-- <H3> HELLO from helpers</H3> -->
<?php

// Наборы функций помошников
function dump($data): void
{
    echo "<pre>"; //для включения в документ предварительно отформатированного текста
    var_dump(value: $data);
    echo "/<pre>";
}
//Функция с типом never либо выбрасывает исключение, либо вызывает конструкцию языка exit()
function dd($data): never
{
    echo "<pre>";
    var_dump(value: $data);
    echo "<pre>";
    die(); //exit
}



//Получаем только те данные, что нужны в форму


function redirect($url =''){
    if ($url) {$redirect=$url;}
    else{
               //$redirect= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']:PATH;
                  $redirect = PATH;  
                }
        header("Location: $redirect");// предопред. ф-я отправляет HTTP заголовок
        die();
}



function prep($data){
    return htmlentities(trim($data),ENT_QUOTES);
    // преобразует все возможные символы в соответствующие HTML‑сущности (для тех символов, для которых такие сущности существуют). Главная задача — защита от XSS‑атак:
}

function len($str){
    return mb_strlen($str,"utf-8");   // для получения длины строки 
}

function old($fieldname){
    return isset($_POST[$fieldname]) ? prep($_POST[$fieldname]) :"";
    if (isset($_POST[$fieldname]))
   return $_POST[$fieldname];
}

function get_allerts(){
        $alerts = [
            "danger",
            "success",
            "info",
            "warning"
        ];

 
}






?>