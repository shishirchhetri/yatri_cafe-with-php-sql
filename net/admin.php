<?php

@include 'config.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['pname'];
   $p_price = $_POST['pprice'];
   $p_details = $_POST['pdetails'];
   $p_image = $_FILES['pimage']['name'];
   $p_image_tmp_name = $_FILES['pimage']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `items`(name, price, image, detail) VALUES('$p_name', '$p_price', '$p_image','$p_details')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'Product added succesfully';
   }else{
      $message[] = 'Could not add the product';
   }
};
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `items` WHERE id = $delete_id ") or die('query failed');
    if($delete_query){
       header('location:admin.php');
       $message[] = 'product has been deleted';
    }else{
       header('location:admin.php');
       $message[] = 'product could not be deleted';
    };
 };

 if(isset($_POST['update_product'])){
    $updated_id = $_POST['update_p_id'];
    $updated_name = $_POST['update_p_name'];
    $updated_price = $_POST['update_p_price'];
    $updated_details= $_POST['updated_details'];
    $updated_image = $_FILES['update_p_image']['name'];
    $updated_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $updated_image_folder = 'uploaded_img/'.$update_p_image;
 
    $update_query = mysqli_query($conn, "UPDATE `items` SET name = '$updated_name', price = '$updated_price', image = '$updated_image' WHERE id = '$update_p_id'");
 
    if($update_query){
       move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
       $message[] = 'product updated succesfully';
       header('location:admin.php');
    }else{
       $message[] = 'product could not be updated';
       header('location:admin.php');
    }
 
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content="1s">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '<div class="message"><span>'.$message.'</span><i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i></div>';
        };
    };
    ?>
<div class="admin_header">
    
</div>    

<section class="sidebar">
   <div class="a_products"><h1>products</h1></div>
   <div class="user_accounts"><h1>user accounts</h1></div>
   <div class="admin_accounts"><h1>admin accounts</h1></div>
   <div class="orders_received"><h1>orders received</h1></div>
</section>

<section class="add_products">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="inputbox">
                <span>Product Name*</span>
                <input type="text" required placeholder="Enter product name" name="pname" class="inputbox" maxlength="20">

            </div>

            <div class="inputbox">
                <span>Product price*</span>
                <input type="number" required placeholder="Enter product price" name="pprice" class="inputbox" maxlength="20">
            </div>

            <div class="inputbox">
                <span>Product image*</span>
                <input type="file" required name="pimage" class="inputbox">
            </div>

            <div class="inputbox">
                <span>Product Details*</span>
                <textarea type="text" required placeholder="Enter product details" name="pdetails" class="inputbox" maxlength="50" cols="25" rows="5"></textarea>
            </div>

            <input type="submit" value="add product" name="add_product" class="btn">
        </div>

    </form>


</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the prodcut" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>
</body>
</html>