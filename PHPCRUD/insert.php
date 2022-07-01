<?php

    require_once "conn.php";

    if(isset($_POST['submit'])){

        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $contact = $_POST['contact_number'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $sql = mysqli_query($conn,"INSERT INTO tblstudent(first_name, last_name, contact_number, email, address, creation_date) VALUES ('$fname','$lname','$contact','$email','$address',NOW())");

        if($sql){
            echo "<script>alert('Added Successfully!');</script>";
            echo "<script>document.location='index.php';</script>";
        }else{
            echo "<script>alert('Something went wrong!!!');</script>";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRUD Operation using PHP</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <div class="container" style="width:50%">

        <div class="row">
            <div class="col-md-6">
                <h2>Add New Record</h2>
            </div>
        </div>

        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                </div>
                <div class="col-md-6">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Contact Number</label>
                    <input type="text" name="contact_number" class="form-control" placeholder="Enter Contact Number" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="margin-top:1%">
                    <button type="text" name="submit" class="btn btn-primary">Submit</button>
                    <a href="index.php" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>

    </div>
  
</body>
</html>