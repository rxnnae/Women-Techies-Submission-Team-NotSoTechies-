<?php
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $ph_no = $_POST['ph_no'];
    $dob = $_POST['dob'];
    $password = $_POST['passsword'];

    // Database connection
    $conn = new mysqli('localhost','root','','driver');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into driver_details(name, address, city, state, ph_no, dob, password) values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiss", $name, $address, $city, $state, $ph_no,  $dob, $password);
        $execval = $stmt->execute();
        echo $execval;
        echo "Registration successful...";
        $stmt->close();
        $conn->close();
    }
?>
