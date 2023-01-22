<?php
$connect = mysqli_connect('127.0.0.1','root','','Knives');
?>

<style>

    th{
        color: black;
    }
    body{
        background-color: #070707;
        color: white;
        font-family: 'Montserrat', sans-serif;
        justify-content: center;
    }
    .header{
        text-align: center;
    }
    .btn{
        display: flex;
        justify-content: center;
    }
    .table {
        margin: 0 auto;
    }

    .btn-primary {
        margin-top: 10px;
    }

    * {
        -webkit-border-horizontal-spacing: 0;
        -webkit-border-vertical-spacing: 0;
    }

    a:visited, a {
        color: inherit;
    }


    td, td {
        padding: 5px;
        border: 1px solid white;
        box-sizing: border-box;

    }

</style>


<body>
<div class="container">
    <div class="header">
        <h1>Favourite knives</h1>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $i=1;
        $knife = "SELECT * FROM Knives WHERE id = '$i' ";
        $res = mysqli_query($connect, $knife);
        $one = mysqli_fetch_assoc($res);
        while ($i < 50){
            if(!$one){
                $i++;
                $knife= "SELECT * FROM Knives WHERE id = '$i' ";
                $res = mysqli_query($connect, $knife);
                $one = mysqli_fetch_assoc($res);
                continue;
            }
            ?>
            <tr>
                <td><?php echo $i++?></td>

                <td><?php echo $one['name']?></td>

                <td><?php echo $one['price']?></td>

                <td><?php echo $one['description']?></td>

                <td><a href="index.php?page_layout=update&id=<?php  echo $one['id'];?>"> Edit</a></td>
                <td><a  href= "index.php?page_layout=delete&id=<?php echo  $one['id']; ?>" >Delete</a></td>
            </tr>
        <?php
            $knife= "SELECT * FROM Knives WHERE id = '$i' ";
            $res = mysqli_query($connect, $knife);
            $one = mysqli_fetch_assoc($res);
        } ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="index.php?page_layout=create">Add</a>
</div>
</body>

