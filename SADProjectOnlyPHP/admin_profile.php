
<?php

$conn = mysqli_connect('localhost', 'syed', 'pass123', 'bazaarchai_only_php');




if(!$conn){
   echo 'connection error: ' . mysqli_connect_error();
}

if(isset($_POST['delete'])){


   $order_no_id = $_POST['order_no_id'];
   $sql_delete = "DELETE FROM orders WHERE order_no = '$order_no_id'";
   $query_run = mysqli_query($conn, $sql_delete);

  

}

if(isset($_POST['delete_return'])){


   $order_no_return = $_POST['order_no_return'];
   $sql_delete = "DELETE FROM return_orders WHERE order_id = '$order_no_return'";
   $query_run = mysqli_query($conn, $sql_delete);

  

}






$sql1 = 'SELECT * FROM orders';
$sql2 = 'SELECT * FROM return_orders';

$sql_customer = 'SELECT * FROM CUSTOMER JOIN ORDERS On id = customer_id';


$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
//$result3 = mysqli_query($conn, $sql3);
$result_customer = mysqli_query($conn, $sql_customer);

$orders = mysqli_fetch_all($result1, MYSQLI_ASSOC);
$return_orders = mysqli_fetch_all($result2, MYSQLI_ASSOC);
//$jobs = mysqli_fetch_all($result3, MYSQLI_ASSOC);
$customer_info = mysqli_fetch_all($result_customer, MYSQLI_ASSOC);
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



   <div class = "box-2">
         <h1>Jamil Ahmed</h1>

         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
         proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
         </p>
      </div>

      <div class = "box-3">
            <img src="admin_profile_picture.png" width:"600px" height:"600px">
      </div>

      <hr class="hr-line2">
      <hr class="hr-line2">

      
      <div class="panels">







  <!-- Pending Orders -->

         <div class = "segment">
            <h2>Pending Orders</h2>


            <hr class="hr-line">
            <hr class="hr-line">

         <form action="" method="GET">
         <div class = "form-box">
         <input type="text" class="search-field" placeholder="Search pending orders with order no." name="search1" required value="<?php if(isset($_GET['search1'])){echo $_GET['search1']; } ?>"/>
         <button type="submit" class="search-btn" name="submit-search1">Search </button>
         </div>

         </form>


      
     


         <?php 

       if(isset($_GET['search1'])){
          $values = $_GET['search1'];
       $query = "SELECT order_no, customer_id, items, delivery_id, shipping_add, bill FROM orders WHERE order_no LIKE '%$values%' OR customer_id LIKE '%$values%' OR items LIKE '%$values%' OR delivery_id LIKE '%$values%' OR shipping_add LIKE '%$values%' OR bill LIKE '%$values%'";
          $query_run = mysqli_query($conn, $query);
         if(mysqli_num_rows($query_run) > 0){



            ?>

             <div class = "box-panels">

          <table class = "content-table">
               <thead>
                     <tr>
                          <th style='width: 6%'>Order No.</th>
                           <th style='width: 18%'>Customer Info</th>
                           
                           
                           <th style='width: 12%'>Shipping Address</th>
                           <th style='width: 22%'>Items</th>
                           
                           <th style='width: 5%'>Bill</th>
                           <th style='width: 10%'>Delivery By</th>
                           <th style='width: 5%'>Action</th>
                           
                           
                           


                     </tr>


               </thead>

               <tbody>


            <?php
          
         foreach($query_run as $orders){

          $sql_cus = "SELECT * FROM customer where id = ". $orders['customer_id'];
         $res = mysqli_query($conn, $sql_cus);
         $cus_array = mysqli_fetch_all($res, MYSQLI_ASSOC);
         //print_r ($cus_array);

         $sql_del = "SELECT * FROM delivery_man where id = ". $orders['delivery_id'];
         $res_del = mysqli_query($conn, $sql_del);
         $del_array = mysqli_fetch_all($res_del, MYSQLI_ASSOC);
   ?>



        

               
                     <tr>
                           
                           <td><?php echo htmlspecialchars($orders['order_no']); ?></td>
                           <td>
                              <p><b>ID: </b> <?php echo htmlspecialchars($cus_array[0]['id']); ?>
                           </p>
                              
                              <p><b>Name: </b> <?php echo htmlspecialchars($cus_array[0]['name']); ?>
                           </p>
                           
                              <p><b>Phone: </b><?php echo htmlspecialchars($cus_array[0]['phone']); ?>
                           </p>
                              <p><b>Email: </b> <?php echo htmlspecialchars($cus_array[0]['email']); ?>
                           </p>
                              <p><b>Address: </b> <?php echo htmlspecialchars($cus_array[0]['address']); ?>
                           </p>
                           </td>
                           <td><?php echo htmlspecialchars($cus_array[0]['address']); ?></td>
                           <td><?php echo htmlspecialchars($orders['items']); ?></td>
                           <td><?php echo htmlspecialchars($orders['bill']); ?>
                              
                           </td>
                           
                           <td>
                                 <p><b>ID: </b> <?php echo htmlspecialchars($del_array[0]['id']); ?>
                           </p>
                              
                              <p><b>Name: </b> <?php echo htmlspecialchars($del_array[0]['name']); ?>
                           </p>
                           
                              <p><b>Phone: </b><?php echo htmlspecialchars($del_array[0]['phone']); ?>
                           </p>
                              <p><b>Email: </b> <?php echo htmlspecialchars($del_array[0]['email']); ?>
                           </p>
                              <p><b>Address: </b> <?php echo htmlspecialchars($del_array[0]['address']); ?>
                           </p>
                           </td>

                           <td>
                              <!-- <button type="submit" class="search-btn" name="submit-search1">Delete </button> -->

                             <form action="admin_profile.php" method="POST">
                              <input type = "hidden" name = "order_no_id" value="<?php echo $orders['order_no']?>">
                                <input type="submit" name="delete" class='search-btn' value="Delete">

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
                           <th style='width: 6%'>Order No.</th>
                           <th style='width: 15%'>Customer Info</th>
                           
                           
                           <th style='width: 12%'>Shipping Address</th>
                           <th style='width: 18%'>Items</th>
                           
                           <th style='width: 5%'>Bill</th>
                           <th style='width: 10%'>Delivery By</th>
                           <th style='width: 8%'>Action</th>


                     </tr>


               </thead>

               <tbody>

   <?php  



    foreach($orders as $order){
      $sql_cus = "SELECT * FROM customer where id = ". $order['customer_id'];
         $res = mysqli_query($conn, $sql_cus);
         $cus_array = mysqli_fetch_all($res, MYSQLI_ASSOC);
         //print_r ($cus_array);

         $sql_del = "SELECT * FROM delivery_man where id = ". $order['delivery_id'];
         $res_del = mysqli_query($conn, $sql_del);
         $del_array = mysqli_fetch_all($res_del, MYSQLI_ASSOC);

      ?>
   

         

               
                     <tr>
                             <td><?php echo htmlspecialchars($order['order_no']); ?></td>
                           <td>
                              <p><b>ID: </b> <?php echo htmlspecialchars($cus_array[0]['id']); ?>
                           </p>
                              
                              <p><b>Name: </b> <?php echo htmlspecialchars($cus_array[0]['name']); ?>
                           </p>
                           
                              <p><b>Phone: </b><?php echo htmlspecialchars($cus_array[0]['phone']); ?>
                           </p>
                              <p><b>Email: </b> <?php echo htmlspecialchars($cus_array[0]['email']); ?>
                           </p>
                              <p><b>Address: </b> <?php echo htmlspecialchars($cus_array[0]['address']); ?>
                           </p>
                           </td>
                           <td><?php echo htmlspecialchars($cus_array[0]['address']); ?></td>
                           <td><?php echo htmlspecialchars($order['items']); ?></td>
                           <td><?php echo htmlspecialchars($order['bill']); ?>
                              
                           </td>
                           
                           <td>
                                 <p><b>ID: </b> <?php echo htmlspecialchars($del_array[0]['id']); ?>
                           </p>
                              
                              <p><b>Name: </b> <?php echo htmlspecialchars($del_array[0]['name']); ?>
                           </p>
                           
                              <p><b>Phone: </b><?php echo htmlspecialchars($del_array[0]['phone']); ?>
                           </p>
                              <p><b>Email: </b> <?php echo htmlspecialchars($del_array[0]['email']); ?>
                           </p>
                              <p><b>Address: </b> <?php echo htmlspecialchars($del_array[0]['address']); ?>
                           </p>
                           </td>

                           <td>
                              <!-- <button type="submit" class="search-btn" name="submit-search1">Delete </button> -->

                             <form action="admin_profile.php" method="POST">
                              <input type = "hidden" name = "order_no_id" value="<?php echo $orders['order_no']?>">
                                <input type="submit" name="delete" class='search-btn' value="Delete">

                             </form>

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









<!-- Return Orders -->

          <div class = "segment">
            <h2>Return Orders</h2>


            <hr class="hr-line">
            <hr class="hr-line">

         <form action="" method="GET">
         <div class = "form-box">
         <input type="text" class="search-field" placeholder="Search return orders with order no." name="search2" required value="<?php if(isset($_GET['search2'])){echo $_GET['search2']; } ?>"/>
         <button type="submit" class="search-btn" name="submit-search2">Search </button>
         </div>

         </form>


      
     


         <?php 

       if(isset($_GET['search2'])){
          $values = $_GET['search2'];
       $query = "SELECT order_id, customer_id, reason, delivery_id FROM return_orders WHERE order_id LIKE '%$values%' OR customer_id LIKE '%$values%' OR reason LIKE '%$values%' OR delivery_id LIKE '%$values%'";
          $query_run = mysqli_query($conn, $query);
         if(mysqli_num_rows($query_run) > 0){



            ?>

             <div class = "box-panels">

          <table class = "content-table2">
               <thead>
                     <tr>
                           <th style='width: 6%'>Order No.</th>
                           <th style='width: 15%'>Customer Info</th>
                           
                           <th style='width: 18%'>Items</th>
                           
                           
                           <th style='width: 10%'>Reason</th>

                           <th style='width: 10%'>Delivery By</th>
                           <th style='width: 8%'>Action</th>
                           
                           
                           


                     </tr>


               </thead>

               <tbody>


            <?php
          
         foreach($query_run as $return_orders){
            $sql_cus = "SELECT * FROM customer where id = ". $return_orders['customer_id'];
         $res = mysqli_query($conn, $sql_cus);
         $cus_array = mysqli_fetch_all($res, MYSQLI_ASSOC);
         //print_r ($cus_array);

         $sql_del = "SELECT * FROM delivery_man where id = ". $return_orders['delivery_id'];
         $res_del = mysqli_query($conn, $sql_del);
         $del_array = mysqli_fetch_all($res_del, MYSQLI_ASSOC);

         $sql_item = "SELECT * FROM completed_orders where order_no = ". $return_orders['order_id'];
         $res_item = mysqli_query($conn, $sql_item);
         $item_array = mysqli_fetch_all($res_item, MYSQLI_ASSOC);
   ?>

         


        

               
                     <tr>
                           
                           <td><?php echo htmlspecialchars($return_orders['order_id']); ?></td>
                           <td>

                              <p><b>ID: </b> <?php echo htmlspecialchars($cus_array[0]['id']); ?>
                           </p>
                              
                              <p><b>Name: </b> <?php echo htmlspecialchars($cus_array[0]['name']); ?>
                           </p>
                           
                              <p><b>Phone: </b><?php echo htmlspecialchars($cus_array[0]['phone']); ?>
                           </p>
                              <p><b>Email: </b> <?php echo htmlspecialchars($cus_array[0]['email']); ?>
                           </p>
                              <p><b>Address: </b> <?php echo htmlspecialchars($cus_array[0]['address']); ?>
                           </p>
                           </td>
                           <td><?php echo htmlspecialchars($item_array[0]['items']); ?></td>
                           
                           <td><?php echo htmlspecialchars($return_orders['reason']); ?></td>
                           <td>
                              <p><b>ID: </b> <?php echo htmlspecialchars($del_array[0]['id']); ?>
                           </p>
                              
                              <p><b>Name: </b> <?php echo htmlspecialchars($del_array[0]['name']); ?>
                           </p>
                           
                              <p><b>Phone: </b><?php echo htmlspecialchars($del_array[0]['phone']); ?>
                           </p>
                              <p><b>Email: </b> <?php echo htmlspecialchars($del_array[0]['email']); ?>
                           </p>
                              <p><b>Address: </b> <?php echo htmlspecialchars($del_array[0]['address']); ?>
                           </p>
                           </td>

                           <td>
                              <!-- <button type="submit" class="search-btn" name="submit-search1">Delete </button> -->

                             <form action="admin_profile.php" method="POST">
                              <input type = "hidden" name = "order_no_return" value="<?php echo $return_orders['order_id']?>">
                                <input type="submit" name="delete_return" class='search-btn' value="Delete">

                             </form>

                           </td>



                     </tr>

                      <?php  

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
         
         <table class = "content-table2">
               <thead>
                     <tr>
                           <th style='width: 6%'>Order No.</th>
                           <th style='width: 15%'>Customer Info</th>
                           
                           <th style='width: 18%'>Items</th>
                           
                           
                           <th style='width: 15%'>Reason</th>

                           <th style='width: 10%'>Delivery By</th>
                           <th style='width: 8%'>Action</th>
                           


                     </tr>


               </thead>

               <tbody>

   <?php  



    foreach($return_orders as $return_order){
       $sql_cus = "SELECT * FROM customer where id = ". $return_order['customer_id'];
         $res = mysqli_query($conn, $sql_cus);
         $cus_array = mysqli_fetch_all($res, MYSQLI_ASSOC);
         //print_r ($cus_array);

         $sql_del = "SELECT * FROM delivery_man where id = ". $return_order['delivery_id'];
         $res_del = mysqli_query($conn, $sql_del);
         $del_array = mysqli_fetch_all($res_del, MYSQLI_ASSOC);

         $sql_item = "SELECT * FROM completed_orders where order_no = ". $return_order['order_id'];
         $res_item = mysqli_query($conn, $sql_item);
         $item_array = mysqli_fetch_all($res_item, MYSQLI_ASSOC);

      ?>
   

         

               
                     <tr>
                            <td><?php echo htmlspecialchars($return_order['order_id']); ?></td>
                           <td>  
                              <p><b>ID: </b> <?php echo htmlspecialchars($cus_array[0]['id']); ?>
                           </p>
                              
                              <p><b>Name: </b> <?php echo htmlspecialchars($cus_array[0]['name']); ?>
                           </p>
                           
                              <p><b>Phone: </b><?php echo htmlspecialchars($cus_array[0]['phone']); ?>
                           </p>
                              <p><b>Email: </b> <?php echo htmlspecialchars($cus_array[0]['email']); ?>
                           </p>
                              <p><b>Address: </b> <?php echo htmlspecialchars($cus_array[0]['address']); ?>
                           </p>
                        </td>
                           <td><?php echo htmlspecialchars($item_array[0]['items']); ?></td>
                           
                           <td><?php echo htmlspecialchars($return_order['reason']); ?></td>
                           <td>
                              <p><b>ID: </b> <?php echo htmlspecialchars($del_array[0]['id']); ?>
                           </p>
                              
                              <p><b>Name: </b> <?php echo htmlspecialchars($del_array[0]['name']); ?>
                           </p>
                           
                              <p><b>Phone: </b><?php echo htmlspecialchars($del_array[0]['phone']); ?>
                           </p>
                              <p><b>Email: </b> <?php echo htmlspecialchars($del_array[0]['email']); ?>
                           </p>
                              <p><b>Address: </b> <?php echo htmlspecialchars($del_array[0]['address']); ?>
                           </p>
                           </td>

                           <td>
                              <!-- <button type="submit" class="search-btn" name="submit-search1">Delete </button> -->

                             <form action="admin_profile.php" method="POST">
                              <input type = "hidden" name = "order_no_return" value="<?php echo $return_orders['order_id']?>">
                                <input type="submit" name="delete_return" class='search-btn' value="Delete">

                             </form>

                           </td>




                     </tr>


<?php } ?>
               </tbody>

         </table>
      </div>

      <hr class="hr-line">
      <hr class="hr-line">

      
   <?php } ?>

         </div>
      </div>







         

   

    <footer id="main-footer">
         <p>Copyright &copy; 2022 BazaarChai</p>
    </footer>


 </body>

 </html>