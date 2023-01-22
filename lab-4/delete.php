<?php $id = $_GET['id'];
$dom = new DOMDocument();
$dom->load('main.xml');
$knives = $dom->getElementsByTagName('knife')->item(0);
$knife=$knives->getElementsByTagName('knife');

$i=0;
while (is_object($knife->item($i++))){
    $prd=$knife->item($i-1)->getElementsByTagName('id')->item(0);
    $prd_id= $prd->nodeValue;
    if( $prd_id== $id){
        $knife->removeChild($knife->item($i-1));
        break;
    }
}

$dom->formatOutput=true;
$dom->save('main.xml')or die('Error');
header('location: index.php?page_layout=list');
exit;
?>
