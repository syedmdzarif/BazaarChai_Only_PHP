<?php 
session_start(); 
$conn = mysqli_connect('localhost', 'syed', 'pass123', 'dbms_lab_kaajache');

    // check connection
    if (!$conn) {
        echo "Connection error: " . mysqli_connect_error();
    }

if (isset($_POST['name']) && isset($_POST['NID']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['dob']) && isset($_POST['genders'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $name = validate($_POST['name']);
    $NID = validate($_POST['NID']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $address = validate($_POST['address']);
    $phone = validate($_POST['phone']);
    $dob = validate($_POST['dob']);
    $genders = validate($_POST['genders']);

    // $user_data = 'uname='. $uname. '&name='. $name;


    if (empty($name)) {
        header("Location: admin_signup.php?error=User Name is required");
        exit();
    }	
    else if(empty($NID)){
        header("Location: admin_signup.php?error=NID is required");
        exit();
    }	
    else if(empty($email)){
        header("Location: admin_signup.php?error=Email is required");
        exit();
    }
    else if(empty($password)){
        header("Location: admin_signup.php?error=Password is required");
        exit();
    }
    else if(empty($address)){
        header("Location: admin_signup.php?error=Address is required&$user_data");
        exit();
    }
    else if(empty($phone)){
        header("Location: admin_signup.php?error=Phone number is required&$user_data");
        exit();
    }
    else if(empty($dob)){
        header("Location: admin_signup.php?error=DOB is required");
        exit();
    }
    else if(empty($genders)){
        header("Location: admin_signup.php?error=Gender is required");
        exit();
    }
    else{

        // // // hashing the password
        // $password = md5($password);

        // $sql = "SELECT * FROM moderator WHERE Email ='$email' ";
        // $result = mysqli_query($conn, $sql);

        // if (mysqli_num_rows($result) > 0) {
        //     header("Location: signup.php?error=This email is already in use");
        //     exit();
        // }
        // else {
        //    $sql2 = "INSERT INTO moderator(Full_Name, NID, Email, Password, Address, Phone, Date_of_Birth, Gender) VALUES('$name', '$NID', '$email', '$password', '$address', '$phone', '$dob', '$genders')";
        //    $result2 = mysqli_query($conn, $sql2);
        //    if ($result2) {
        //      header("Location: signup.php?success=Your account has been created successfully");
        //      exit();
        //    }
        //    else {
        //         header("Location: signup.php?error=unknown error occurred");
        //         exit();
        //    }
        // }


        $sql = "INSERT INTO moderator(full_name, nid, email, password, address, phone, dob, gender) VALUES('$name', '$NID', '$email', '$password', '$address', '$phone', '$dob', '$genders')";

        // $result = $conn->query($sql);
        $result = mysqli_query($conn, $sql);

        //Insert query results
        if($result == TRUE)
        {
            // echo "New Record Created Successfully";
            header("Location: admin_signup.php?success=Your account has been created successfully");
        //      exit();
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
 }
// }
// else{
//     header("Location: m_signup.php");
//     exit();
// } 
