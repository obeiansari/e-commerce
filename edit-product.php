<?php
    // echo "<pre>";
    // print_r($_REQUEST);
    // print_r($_FILES);
    // exit();
    // $path_str = '';
    if(isset($_FILES['image']) && isset($_FILES['image']['name'])){
        if(!is_dir('product-image')){
            mkdir('product-image');
        }
        // echo "up";
        // exit();
        $path = 'product-image/'.$_FILES['image']['name'];
        if(move_uploaded_file($_FILES['image']['tmp_name'], $path)){
            $path_str = "product-image/".$_FILES['image']['name'];
        }
    }
    // echo "path: ".$path_str." :end";
    // exit();
    if($conn = mysqli_connect('localhost', 'root', 'password', 'ecommerce')){
        $query = "UPDATE product SET name = '".$_REQUEST['name']."', price = '".$_REQUEST['price']."', quantity = '".$_REQUEST['quantity']."', image = '".$path_str."', product_type_id = '".$_REQUEST['p_type']."' WHERE id = ".$_REQUEST['id'];
        // echo $query;
        // exit();
        mysqli_query($conn, $query);
    }else{
        echo "Could not connect.";
    }
    
?>
