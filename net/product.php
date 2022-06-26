<?php
@include 'config.php';

if(isset($_POST['add_to_cart'])){
    $pname=$_POST['pname'];
    $pprice=$_POST['pprice'];
    $pimage=$_POST['pimage'];
    $pdetails=$_POST['pdetails'];

    $show= mysqli_query($conn,"SELECT * FROM `cart` WHERE name = '$pname'");

    if(mysqli_num_rows($show)>0){
        $message[]='Product already added to cart';

    }else{
        $insert_cart = mysqli_query($conn,"INSERT INTO `cart`(name,price,image,quantity,details) VALUES('$pname','$pprice','$pimage','$pquantity','$pdetails')");
        $message[]="Product added to cart";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
    <section class="products">
        <h1 class="heading">Products</h1>
        <div class="product-container">
        <?php
        $select_products= mysqli_query($conn,"SELECT * FROM `items` ");
        if(mysqli_num_rows($select_products) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_products)){
         
        ?>
        <form action="" method="POST">
            <div class="product_box">
                <img src="uploaded_img/<?php echo $fetch_product['image'] ;?>" alt="">
                <div class="name">Name: <?php echo $fetch_product['name']; ?></div>
                <div class="price">Price (RS):<?php echo $fetch_product['price']; ?></div>
                <div class="quantity">Quantity: <input type="number" name="pquantity" value="1"></div>
                <div class="details">Details: <?php echo $fetch_product['detail']; ?></div>
                <input type="hidden" name="pname" value="<?php echo $fetch_product['name']; ?>">
                <input type="hidden" name="pprice" value="<?php echo $fetch_product['price']; ?>">
                <input type="hidden" name="pimage" value="<?php echo $fetch_product['image']; ?>">
                <input type="hidden" name="pdetails" value="<?php echo $fetch_product['detail']; ?>">
                <input type="submit" name="add_to_cart" class="btn" value="Add to cart">
            </div>
        </form>
                <?php
            };
        };
            ?>

        </div>
    </section>
</body>
</html>