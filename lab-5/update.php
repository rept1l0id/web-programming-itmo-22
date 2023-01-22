<?php
$id=$_GET['id'];
$connect = mysqli_connect('127.0.0.1','root','','Knives');


if(isset($_POST['plus'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    mysqli_query($connect,"UPDATE Knives SET name='$name', price='$price', description= '$description' WHERE id=$id");

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
            <input type="text" name="name" class="form-control" required  ">
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" name="price" class="form-control" required  ">
        </div>
        <div class="form-group">
            <label for="">description</label>
            <input type="text" name="description" class="form-control" required  ">
        </div>
        <button name="plus" class="btn btn-success" type="submit">Update</button>
    </form>
</div>