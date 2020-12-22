<?php
    if($conn = mysqli_connect('localhost', 'root', 'password', 'ecommerce')){
        $query = "SELECT p.id, p.name, p.price, p.quantity, p.image, pt.name AS Type 
        FROM `product` p 
        LEFT JOIN `product_type` pt ON pt.id = p.product_type_id;";
        $result = mysqli_query($conn, $query);
        $products = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        mysqli_close($conn);
    }else{
        echo "Could not connect.";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
        .border{
            border: 1px solid #ccc;
            margin-bottom: 40px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="col-md-offset-2 col-md-8 border">
            <table class="table-bordered" width="100%">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Product Type</th>
                    <th>Action</th>
                </tr>
                <?php
                    foreach ($products as $key => $value) {
                        echo "<tr>
                                <td>".$value['id']."</td>
                                <td>".$value['name']."</td>
                                <td>".$value['price']."</td>
                                <td>".$value['quantity']."</td>
                                <td><img height='100' src='".$value['image']."'/></td>
                                <td>".$value['Type']."</td>
                                <td> <a href='edit.php?id=".$value['id']."'>Edit</a></td>
                            </tr>";
                    }
                ?>
            </table>
        </div>
    </div>

</body>
</html>
