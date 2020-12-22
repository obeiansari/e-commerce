<?php
    if($conn = mysqli_connect('localhost', 'root', 'password', 'ecommerce')){
        $query = "SELECT * FROM `product_type`;";
        $result = mysqli_query($conn, $query);
        $types = [];
        // echo "<pre>";
        while ($row = mysqli_fetch_assoc($result)) {
            // print_r($row);
            $types[$row['id']] = $row['name'];
        }
        // print_r($types);
        // exit;
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
            <h2>Add Product</h2>
            <!-- <form action="save-product.php" method="post"> -->
            <form action="save-product.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" placeholder="Enter price" name="price">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" placeholder="Enter Quantity" name="quantity">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="type">Product Type:</label>
                    <select class="form-control" name="p_type" id="p_type">
                        <option value="0">-- Select --</option>
                        <?php
                            foreach ($types as $index => $name) {
                            	echo '<option value="'.$index.'">'.$name.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Save</button>
            </form>
        </div>
    </div>

</body>
</html>
