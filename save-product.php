<?php
    echo "<pre>";
    print_r($_REQUEST);
    print_r($_FILES);
    // exit;
    if(isset($_FILES['image'])){
        if(!is_dir('product-image')){
            mkdir('product-image');
        }
        $path = 'product-image/'.$_FILES['image']['name'];
        if(move_uploaded_file($_FILES['image']['tmp_name'], $path)){

        }
    }
    echo "path:".$path.":end";
    // exit;
    if($conn = mysqli_connect('localhost', 'root', 'password', 'ecommerce')){
        $query = "INSERT INTO product VALUES ('', '".$_REQUEST['name']."', '".$_REQUEST['price']."', '".$_REQUEST['quantity']."', '".$path."', '".$_REQUEST['p_type']."')";
        mysqli_query($conn, $query);
    }else{
        echo "Could not connect.";
    }
    header('location: show.php');
    
?>
