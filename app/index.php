<?php

define('DS', DIRECTORY_SEPARATOR);
define('LIB_PATH', dirname(__FILE__) . DS . 'lib');
require_once LIB_PATH . DS . 'DataGrid.php';

$testArr1 = array(
    array(
        'Name' => 'Trixie',
        'Color' => 'Green',
        'Element' => 'Earth',
        'Likes' => 'Flowers'
        ),
    array(
        'Name' => 'Tinkerbell',
        'Element' => 'Air',
        'Likes' => 'Singning',
        'Color' => 'Blue'
        ), 
    array(
        'Element' => 'Water',
        'Likes' => 'Dancing',
        'Name' => 'Blum',
        'Color' => 'Pink'
        ),
);
echo "Test1";

$order1 = array(
    'Name',
    'Color',
    'Element',
    'Likes'
);


$grid = new DataGrid($testArr1, $order1);
echo $grid->output();
echo "<pre>";
var_dump('Order:' . implode(',', $order1), 'Data:' ,$testArr1);
echo "</pre>";

echo "Changing align of cells left,right by default it is centered";
$grid = new DataGrid($testArr1, $order1, 'left');
echo $grid->output();
$grid = new DataGrid($testArr1, $order1, 'right');
echo $grid->output();

echo "Complex data, if you add new cols, which not exist in oder rows the cells will be empty";
$testArr2  = array(
    array(
        'Name' => 'Trixie',
        'Color' => 'Green',
        'Element' => 'Earth',
        'Likes' => 'Flowers'
        ),
    array(
        'Name' => 'Tinkerbell',
        'Element' => 'Air',
        'Likes' => 'Singning',
        'Color' => 'Blue',
        'asdas' => 'asdasd',
        'test3' => 'test3'
        ), 
    array(
        'Element' => 'Water',
        'Likes' => 'Dancing',
        'Name' => 'Blum',
        'Color' => 'Pink',
        'blah' => 'blah',
        'asdasd' => 'adasdasd',
        'test' => 'test2'
        ),
);
$order2 = array(
    'blah',
    'Name',
    'Color',
    'Element',
    'Likes',
    
    
);
$grid = new DataGrid($testArr2,$order2 );
echo $grid->output();


echo "<pre>";
var_dump('Order:' . implode(',', $order2), 'Data:' ,$testArr2);
echo "</pre>";


