<?php
$dom = new DOMDocument();
$dom->load('main.xml',LIBXML_NOWARNING);
$knives = $dom->getElementsByTagName('knives')->item(0);
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
        $i=0;
        $knife=$knives->getElementsByTagName('knife');
        while (is_object($knife->item($i++))){
            ?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $knife->item($i-1)->getElementsByTagName('name')->item(0)->nodeValue?></td>

                <td><?php echo $knife->item($i-1)->getElementsByTagName('price')->item(0)->nodeValue?></td>

                <td><?php echo $knife->item($i-1)->getElementsByTagName('description')->item(0)->nodeValue?></td>

                <td><a href="index.php?page_layout=update&id=<?php echo  $knife->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> Edit <?php echo  $knife->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?></a></td>
                <td><a  href= "index.php?page_layout=delete&id=<?php echo  $knife->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>" >Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="index.php?page_layout=create">Add</a>
</div>
</body>

