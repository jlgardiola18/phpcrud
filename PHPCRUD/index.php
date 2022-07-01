<?php

    require_once "conn.php";

    if(isset($_GET['del'])){

        $id = intval($_GET['del']);

        $sql = mysqli_query($conn, "DELETE FROM tblstudent WHERE id='$id'");

        echo "<script>alert('Deleted Successfully!');</script>";
        echo "<script>window.location='index.php';</script>";

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

    <script>
        $(document).ready(function(){
            $('#myInput').on("keyup", function(){
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function(){
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>


</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>List of Records
                    <a href="insert.php" class="btn btn-warning pull-right" style="margin-bottom:1%"><span class="glyphicon glyphicon-plus"></span> Add New Record</a>
                    | <a href="generatepdf.php" class="btn btn-danger"> PDF </a>
                    | <button type="submit" onClick="Export()" class="btn btn-success"> EXCEL </button>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="form-group">
                    <input type="text" id="myInput" placeholder="Search..." class="form-control">
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Date Added</th>
                            <th>Actions</th>
                        </thead>
                        <tbody id="myTable">
                            <?php
                                require_once "conn.php";

                                if(isset($_GET['page_no']) && $_GET['page_no']!=""){
                                    $page_no = $_GET['page_no'];
                                }else{
                                    $page_no = 1;
                                }

                                $total_records_per_page = 10;
                                $offset = ($page_no-1) * $total_records_per_page;
                                $previous_page = $page_no - 1;
                                $next_page = $page_no + 1;
                                $adjacents = "2";

                                $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM tblstudent");
                                $total_records = mysqli_fetch_array($result_count);
                                $total_records = $total_records['total_records'];
                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                $second_last = $total_no_of_pages - 1;

                                $sql = mysqli_query($conn,"SELECT * FROM tblstudent ORDER by first_name LIMIT $offset, $total_records_per_page");
                                $count = 1;
                                $row = mysqli_num_rows($sql);
                                if($row > 0){
                                    while($row = mysqli_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['first_name'];?></td>
                                <td><?php echo $row['last_name'];?></td>
                                <td><?php echo $row['contact_number'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['address'];?></td>
                                <td><?php echo $row['creation_date'];?></td>
                                <td>
                                    <a href="profile.php?profile=<?php echo htmlentities($row['id']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-user"></span> View</a>
                                    <a href="edit.php?edit=<?php echo htmlentities($row['id']);?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="index.php?del=<?php echo htmlentities($row['id']);?>" onClick = "return confirm('Do you really want to delete this Record?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </td>
                            </tr>
                            <?php
                                $count = $count+1;
                                }}
                            ?>
                        </tbody>
                    </table>
                </div>

                    <ul class="pagination pull-right">
                        <li class="pull-left btn btn-default disabled">Showing page <?php echo $page_no. " of ". $total_no_of_pages;?></li>
                            <li <?php if($page_no <= 1) { echo "class='disabled'";}?>>
                            <a <?php if($page_no > 1) { echo "href='?page_no=$previous_page'";}?>>Previous</a>
                        </li>

                        <?php
                            if($total_no_of_pages <= 10){

                                for($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                    if($counter == $page_no){
                                        echo "<li class='active'><a>$counter</a></li>";
                                    }else{
                                        echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                    }
                                }
                                
                            }elseif($total_no_of_pages > 10){
                                if($page_no <= 4){
                                    for($counter = 1; $counter < 8; $counter++){
                                        if($counter == $page_no){
                                            echo "<li class='active'><a>$counter</a></li>";
                                        }else{
                                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                        }
                                    }
                                    echo "<li><a>...</a></li>";
                                    echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                                    echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                }elseif($page_no > 4 && $page_no < $total_no_of_pages - 4){
                                    echo "<li><a href='?page_no=1'>1</a></li>";
                                    echo "<li><a href='?page_no=2'>2</a></li>";
                                    echo "<li><a>...</a></li>";

                                    for($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++){
                                        if($counter == $page_no){
                                            echo "<li class='active'><a>$counter</a></li>";
                                        }else{
                                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                        }
                                    }
                                    echo "<li><a>...</a></li>";
                                    echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                                    echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                }else{
                                    echo "<li><a href='?page_no=1'>1</a></li>";
                                    echo "<li><a href='?page_no=2'>2</a></li>";
                                    echo "<li><a>...</a></li>";
                                    for($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++){
                                        if($counter == $page_no){
                                            echo "<li class='active'><a>$counter</a></li>";
                                        }else{
                                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                        }
                                    }
                                }
                            }
                        ?>
                        <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'";}?>>
                            <a <?php if($page_no < $total_no_of_pages) {echo "href='?page_no=$next_page'";}?>>Next</a>
                        </li>
                        <?php if($page_no < $total_no_of_pages) { echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo; &rsaquo;</a></li>";}?>
                    </ul>

            </div>
        </div>
    </div>

    <script>
        function Export(){
            var conf = confirm("Please proceed to Download the EXCEL File.")
            if(conf == true){
                window.open("export.php",'_blank');
            }
        }
    </script>

</body>
</html>
