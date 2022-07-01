<?php

    require_once "conn.php";

    $filename = 'List of Records-'.date('m-d-y').'.csv';

    $sql = "SELECT * FROM tblstudent";
    $result = mysqli_query($conn, $sql);

    $array = array();

    $file = fopen($filename,'w');
    $array = array("ID","First Name","Last Name","Contact Number","Email","Address","Date Recorded");
    fputcsv($file,$array);

    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $contact = $row['contact_number'];
        $email = $row['email'];
        $address = $row['address'];
        $creation = $row['creation_date'];

        $array = array($id,$firstname,$lastname,$contact,$email,$address,$creation);
        fputcsv($file,$array);
    }

    fclose($file);

    header("Content-Description: File Transfer");
    header("Content-Disposition: Attachment; filename=$filename");
    header("Content-Type: application/csv");
    readfile($filename);
    unlink($filename);
    exit();

?>