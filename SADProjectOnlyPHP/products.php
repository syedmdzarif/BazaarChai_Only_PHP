
<?php

$conn = mysqli_connect('localhost', 'syed', 'pass123', 'bazaarchai_only_php');




if(!$conn){
   echo 'connection error: ' . mysqli_connect_error();
}

if(isset($_POST['delete'])){


   $products_id = $_POST['product_id'];
   $sql_delete = "DELETE FROM products WHERE id = '$products_id'";
   $query_run = mysqli_query($conn, $sql_delete);

  

}

/*if(isset($_POST['delete_return'])){


   $order_no_return = $_POST['order_no_return'];
   $sql_delete = "DELETE FROM return_orders WHERE order_id = '$order_no_return'";
   $query_run = mysqli_query($conn, $sql_delete);

  

}*/






$sql1 = 'SELECT * FROM products';

$result1 = mysqli_query($conn, $sql1);


$products = mysqli_fetch_all($result1, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="admin_profile.css">


   <title>BazaarChai</title>
   <!-- CSS only -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
   
 </head>
 <body>
   <header id="main-header">
      <div class="container">
       <h1>BazaarChai</h1>
      </div>
   </header>

   <nav id="navbar">
      <div class="container">
       <ul>
         <li><a href="admin_profile.php">Profile</a></li>
         <li><a href="#">Chat</a></li>
            <li><a href="">Edit Profile</a></li>
         <li><a href="completed_orders_list.php">Order History</a></li>
         
         <li><a href="customer_list.php">Customers</a></li>
         <li><a href="delivery_man_list.php">Delivery Man</a></li>
         <li><a href="products.php">Products</a></li>
         <a class="logout" href="admin_logout.php">Log Out</a>
       </ul>
      </div>
   </nav>



   
      
      <div class="panels">







  <!-- Pending Orders -->

         <div class = "segment">
            <h2>Products List</h2>


            <hr class="hr-line">
            <hr class="hr-line">

         <form action="" method="GET">
         <div class = "form-box">
         <input type="text" class="search-field" placeholder="Search products with prodcut ID, name, category, price..." name="search1" required value="<?php if(isset($_GET['search1'])){echo $_GET['search1']; } ?>"/>
         <button type="submit" class="search-btn" name="submit-search1">Search </button>
         </div>

         </form>


      
     


         <?php 

       if(isset($_GET['search1'])){
          $values = $_GET['search1'];
       $query = "SELECT id, category, name, price, unit, rating FROM products WHERE id LIKE '%$values%' OR category LIKE '%$values%' OR name LIKE '%$values%' OR price LIKE '%$values%' OR unit LIKE '%$values%' OR rating LIKE '%$values%'";
          $query_run = mysqli_query($conn, $query);
         if(mysqli_num_rows($query_run) > 0){



            ?>

             <div class = "box-panels">

          <table class = "content-table">
               <thead>
                     <tr>
                          <th style='width: 10%'>Product ID</th>
                           <th style='width: 10%'>Category</th>
                           
                           
                           <th style='width: 10%'>Name</th>
                           <th style='width: 10%'>Price</th>
                           
                           <th style='width: 5%'>Unit</th>
                           <th style='width: 10%'>Rating</th>
                           <th style='width: 10%'>Action</th>
                           
                           
                           


                     </tr>


               </thead>

               <tbody>


            <?php
          
         foreach($query_run as $products){

         
   ?>



        

               
                     <tr>
                           
                           <td><?php echo htmlspecialchars($products['id']); ?></td>
                           
                           <td><?php echo htmlspecialchars($products['category']); ?></td>
                           <td><?php echo htmlspecialchars($products['name']); ?></td>
                           <td><?php echo htmlspecialchars($products['price']); ?></td>
                           <td><?php echo htmlspecialchars($products['unit']); ?>
                              
                           </td>
                           <td><?php echo htmlspecialchars($products['rating']); ?>
                              
                           </td>
                           
                           

                           <td>
                              <!-- <button type="submit" class="search-btn" name="submit-search1">Delete </button> -->

                             <form action="products.php" method="POST">
                              <input type = "hidden" name = "product_id" value="<?php echo $products['id']?>">
                                <input type="submit" name="delete" class='search-btn' value="Delete">

                             </form>

                             <br>



                             <form action="products_update.php" method="POST">
                              <input type="hidden" name="id_prod" value="<?php echo $products['id'] ?>">
                              <input type="submit" name="update" class = "search-btn" value="Update">

                             </form>

                           </td>



                     </tr>

                      <?php  

  // }
}

   ?>



               </tbody>

         </table>






      </div>

      

     
<?php


}



else{


   ?>



   <p>No search results</p>
   <hr class="hr-line2">
   <hr class="hr-line2">

   <?php 


}
}
else{  ?>

   <div class = "box-panels">
         
         <table class = "content-table">
               <thead>
                     <tr>
                           <th style='width: 10%'>Product ID</th>
                           <th style='width: 10%'>Category</th>
                           
                           
                           <th style='width: 10%'>Name</th>
                           <th style='width: 10%'>Price</th>
                           
                           <th style='width: 5%'>Unit</th>
                           <th style='width: 10%'>Rating</th>
                           <th style='width: 10%'>Action</th>


                     </tr>


               </thead>

               <tbody>

   <?php  



    foreach($products as $product){
     

      ?>
   

         

               
                     <tr>
                            <td><?php echo htmlspecialchars($product['id']); ?></td>
                           
                           <td><?php echo htmlspecialchars($product['category']); ?></td>
                           <td><?php echo htmlspecialchars($product['name']); ?></td>
                           <td><?php echo htmlspecialchars($product['price']); ?></td>
                           <td><?php echo htmlspecialchars($product['unit']); ?>
                              
                           </td>
                           <td><?php echo htmlspecialchars($product['rating']); ?>
                              
                           </td>
                           
                           

                           <td>
                              <!-- <button type="submit" class="search-btn" name="submit-search1">Delete </button> -->

                             <form action="products.php" method="POST">
                              <input type = "hidden" name = "product_id" value="<?php echo $product['id']?>">
                                <input type="submit" name="delete" class='search-btn' value="Delete">

                             </form>
                             <br>







                             <!--  <form action="products_update.php" method="POST">
                              <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                              <input type="submit" name="update" class = "search-btn" value="Update">

                             </form>  -->

                             <a href = "products_update.php?id=<?php echo $product['id']; ?>"> Update </a>

                           </td>
                     </tr>


<?php //}
} ?>
               </tbody>

         </table>
      </div>

      <hr class="hr-line">
      <hr class="hr-line">

      
   <?php } ?>

         </div>









<!-- New Product Add -->


<div class = segment>
   <h2>Add New Product</h2>


            <hr class="hr-line">
            <hr class="hr-line">
            <br>
            
<form action="products_insert.php" method="POST">
   <h4>Product ID</h4>
   <input type="number" class="search-field" name="id" placeholder="Enter product ID">
   <br>
   <h4>Category</h4>
   <input type="text" class="search-field" name="category" placeholder="Enter product category">
   <br>
   <h4>Name</h4>
   <input type="text" class="search-field" name="name" placeholder="Enter product name">
   <br>
   <h4>Price</h4>
   <input type="number" class="search-field" name="price" placeholder="Enter product price">
   <br>
   <h4>Unit</h4>
   <input type="text" class="search-field" name="unit" placeholder="Enter product unit">
   <br>
   <br>
   <button type="submit" class="search-btn" name="submit">Add</button>
</form>

</div>

</div>



         

   

    <footer id="main-footer">
         <p>Copyright &copy; 2022 BazaarChai</p>
    </footer>


 </body>

 </html>