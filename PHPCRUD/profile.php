<?php

    require_once "conn.php";
    $eid = $_GET['profile'];
    
    $sql = mysqli_query($conn, "SELECT * FROM tblstudent WHERE id='$eid'");
    $result = mysqli_fetch_array($sql);

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

    <style>
        body{
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }
        .main-body{
            padding: 15px;
        }
        .card{
            box-shadow: 0 1px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06);
        }
        .card{
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
            width: 30%;
        }
        .card-body{
            flex: 1 1 auto;
            main-height: 1px;
            padding: 1rem;
        }
    </style>



</head>
<body>

    <div class="container">
        <div class="main-body">
            <nav aria-label="breadcrumb" class="main-breadcrubm">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php">User</a></li>
                    <li class="breadcrumb-item-active"><a href="#" aria-current="page">User Profile</a></li>
                </ol>
            </nav>
        <div class="row gutters-sm">
            <div class="col-md-mb3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?php echo htmlentities(!empty($result->photo))? ' ' .htmlentities($result->photo): 'upload/default.png';?>" class="img-circle" width="100" height="100">
                            <div class="mt-3">
                                <h4><?php echo $result['first_name'].' '.$result['last_name'];?></h4>
                                <p class="text-secondary mb-1"><span class="glyphicon glyphicon-phone"></span> <?php echo $result['contact_number'];?></p>
                                <p class="text-muted font-size-sm"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $result['address'];?></p>
                                <p class="text-muted font-size-sm"><span class="glyphicon glyphicon-envelope"></span> <?php echo $result['email'];?></p>
                                <!-- <button onclick="document.location='upload.php'" class="btn btn-primary"> Upload</button> -->
                                <button class="btn btn-info"> Follow</button>
                                <button class="btn btn-success"> Message</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        </div>
    </div>





    
</body>
</html>