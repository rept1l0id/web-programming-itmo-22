<?php
$id=$_GET['id'];
echo $id;
$dom = new DOMDocument();
$dom->load('main.xml');
$knives = $dom->getElementsByTagName('knives')->item(0);
$knife=$knives->getElementsByTagName('knife');


if(isset($_POST['sbm'])){
    $knife_name = $_POST['knife_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $new_knife = $dom->createElement('knife');

    $node_id = $dom->createElement('id',$id);
    $new_knife->appendChild($node_id);

    $node_name = $dom->createElement('name',$knife_name);
    $new_knife->appendChild($node_name);

    $node_price = $dom->createElement('price',$price);
    $new_knife->appendChild($node_price);

    $node_description = $dom->createElement('description',$description);
    $new_knife->appendChild($node_description);
    $i=0;
    while (is_object($knife->item($i++))){
        $prd=$knife->item($i-1)->getElementsByTagName('id')->item(0);
        $prd_id= $prd->nodeValue;
        if( $prd_id== $id){
            $knives->replaceChild($new_knife,$knife->item($i-1));
            break;
        }
    }

    $dom->formatOutput=true;
    $dom->save('main.xml')or die('Error');
    header('location: index.php?page_layout=list');
}
?>

<style>
    .container{
        text-align: center;
    }
    body{
        background-color: #070707;
        color: white;
        font-family: 'Montserrat', sans-serif;
    }

    .form-group {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
    }

    .form-group > label {
        width: 100px;
        display: flex;
        justify-content: end;
        margin: 0 10px 0 0 ;

    }

    .btn-success {
        border: 1px solid white;
        background: transparent;
        color: white;
        padding: 10px 20px;
        margin-top: 20px;
        font-size: 20px;
        transition: all .8s;
    }

    .btn-success:hover {
        background: white;
        color: black;
    }
</style>


<div class="container">
    <div class="header">
        <h1>Edit</h1>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="knife_name" class="form-control" required  ">
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" name="price" class="form-control" required  ">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" name="description" class="form-control" required  ">
        </div>
        <button name="sbm" class="btn btn-success" type="submit">Update</button>
    </form>
</div>

