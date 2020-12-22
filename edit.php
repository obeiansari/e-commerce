<?php
    if($conn = mysqli_connect('localhost', 'root', 'password', 'ecommerce')){
        $query = "SELECT p.id, p.name, p.price, p.quantity, p.image, pt.name AS Type, pt.id as p_id 
        FROM `product` p 
        LEFT JOIN `product_type` pt ON pt.id = p.product_type_id WHERE p.id = ".$_REQUEST['id'].";";
        $result = mysqli_query($conn, $query);
        $products = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $products = $row;
        }
        // echo "<pre>";
        $query = "SELECT * FROM `product_type`;";
        $result = mysqli_query($conn, $query);
        $types = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $types[$row['id']] = $row['name'];
        }
        // print_r($types);
        // print_r($products);exit;
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
            <!-- <form action="save-product.php"> -->
            <form action="edit-product.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $products['id']; ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $products['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" placeholder="Enter price" name="price" value="<?php echo $products['price']; ?>">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" placeholder="Enter Quantity" name="quantity" value="<?php echo $products['quantity']; ?>">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image" value="<?php echo $products['image']; ?>">
                </div>
                <select>
                    <option>1</option>
                    <option selected="">2</option>
                </select>

                <div class="form-group">
                    <label for="type">Product Type:</label>
                    <select class="form-control" name="p_type" id="p_type">
                        <option value="0">-- Select --</option>
                        <?php
                            foreach ($types as $key => $value) {
                                if($key == $products['p_id']){
                                    echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';    
                                }else{
                                    echo '<option value="'.$key.'">'.$value.'</option>';
                                }
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
