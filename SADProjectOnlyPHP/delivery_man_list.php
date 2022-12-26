<?php

$conn = mysqli_connect('localhost', 'syed', 'pass123', 'bazaarchai_only_php');




if(!$conn){
   echo 'connection error: ' . mysqli_connect_error();
}

$sql1 = 'SELECT * FROM delivery_man';

$result1 = mysqli_query($conn, $sql1);
$man = mysqli_fetch_all($result1, MYSQLI_ASSOC);


  
?>


<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="delivery_man_list.css">


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



         <div class = "segment">
            <h2>Delivery Man List</h2>


            <hr class="hr-line">
            <hr class="hr-line">

         <form action="" method="GET">
         <div class = "form-box">
         <input type="text" class="search-field" placeholder="Search delivery men with id, name, phone..." name="search1" required value="<?php if(isset($_GET['search1'])){echo $_GET['search1']; } ?>"/>
         <button type="submit" class="search-btn" name="submit-search1">Search </button>
         </div>

         </form>


      
     


         <?php 

       if(isset($_GET['search1'])){
          $values = $_GET['search1'];
       $query = "SELECT id, name, address, email, phone FROM delivery_man WHERE id LIKE '%$values%' OR name LIKE '%$values%' OR address LIKE '%$values%' OR email LIKE '%$values%' OR phone LIKE '%$values%'";
          $query_run = mysqli_query($conn, $query);
         if(mysqli_num_rows($query_run) > 0){



            ?>

             <div class = "box-panels">

          <table class = "content-table">
               <thead>
                     <tr>
                          <th style='width: 6%'>ID.</th>
                           <th style='width: 18%'>Name</th>
                           
                           
                           <th style='width: 12%'>Phone</th>
                           <th style='width: 22%'>Address</th>
                           
                           <th style='width: 5%'>Email</th>
                           
                           <th style='width: 5%'>Action</th>
                           
                           
                           


                     </tr>


               </thead>

               <tbody>


            <?php
          
         foreach($query_run as $man){

          /* $sql3 = "SELECT name FROM customer WHERE id = (SELECT customer_id FROM orders WHERE order_no = orders['order_no'])";

           $result3 = mysqli_query($conn, $sql3);

$customers = mysqli_query($result3, MYSQLI_ASSOC);*/

      
   ?>



        

               
                     <tr>
                           
                           <td><?php echo htmlspecialchars($man['id']); ?></td>
                        
                           <td><?php echo htmlspecialchars($man['name']); ?></td>
                           <td><?php echo htmlspecialchars($man['phone']); ?></td>
                           <td><?php echo htmlspecialchars($man['address']); ?>
                              
                           </td>
                           
                           <td><?php echo htmlspecialchars($man['email']); ?></td>

                           <td>
                              <!-- <button type="submit" class="search-btn" name="submit-search1">Delete </button> -->

                             <form action="admin_profile.php" method="POST">
                              <input type = "hidden" name = "order_no_id" value="<?php echo $man['id']?>">
                                <input type="submit" name="delete" class='search-btn' value="Chat">

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
         
         <table class = "content-table">
               <thead>
                     <tr>
                           <th style='width: 6%'>ID.</th>
                           <th style='width: 18%'>Name</th>
                           
                           
                           <th style='width: 12%'>Phone</th>
                           <th style='width: 22%'>Address</th>
                           
                           <th style='width: 5%'>Email</th>
                           
                           <th style='width: 5%'>Action</th>


                     </tr>


               </thead>

               <tbody>

   <?php  



    foreach($man as $men){
      

      /*$sql4 = "SELECT name FROM customer WHERE id = (SELECT customer_id FROM orders WHERE order_no = 123)";

           $result4 = mysqli_query($conn, $sql4);

      $customers_no_search = mysqli_fetch_assoc($result4);*/

      ?>
   

         

               
                     <tr>
                             <td><?php echo htmlspecialchars($men['id']); ?></td>
                        
                           <td><?php echo htmlspecialchars($men['name']); ?></td>
                           <td><?php echo htmlspecialchars($men['phone']); ?></td>
                           <td><?php echo htmlspecialchars($men['address']); ?>
                              
                           </td>
                           
                           <td><?php echo htmlspecialchars($men['email']); ?></td>

                           <td>
                              <!-- <button type="submit" class="search-btn" name="submit-search1">Delete </button> -->

                             <form action="admin_profile.php" method="POST">
                              <input type = "hidden" name = "order_no_id" value="<?php echo $men['id']?>">
                                <input type="submit" name="delete" class='search-btn' value="Chat">

                             </form>

                           </td>

                     </tr>


<?php }
 ?>
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