<?php

$array = [
    1 => 'Один',
    3 => 'Два',
    2 => 'Три',
    4 => 'Четыре',
    5 => 'Пять',
];
$start = microtime(true);
    foreach ($array as $item){
        debug($item);
    }
echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 5).' сек.';



//debug($array);
//
//$obj = new ArrayObject($array);
//
//$obj->ksort();
//
//debug($obj);