
<?php include_once '../classes/package.php';?>
<?php
if (!empty($_POST['items'])){
    $items = $_POST['items'];
    $pkg = new Package();
    $insert_plant_to_package = $pkg->insert_plants($items);
//    $output = '';
//    foreach ($items as $key => $value){
//        $output .= "Quantity: " . $value['quantity'] . "Plant ID: " .$value['plant_id'];
//    }
//    echo $output;
////    var_dump($items);
////    $status = 'ok';
}
echo $insert_plant_to_package; die;
?>