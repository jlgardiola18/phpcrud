<?php

    require_once "conn.php";
    require_once "fpdf/fpdf.php";

    $result = "SELECT * FROM tblstudent ORDER by id";
    $sql = $conn->query($result);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    while($row = $sql->fetch_object()){
        $id = $row->id;
        $firstname = $row->first_name;
        $lastname = $row->last_name;
        $contact = $row->contact_number;
        $email = $row->email;
        $address = $row->address;
        
        $pdf->Cell(10, 10, $id, 1);
        $pdf->Cell(30, 10, $firstname, 1);
        $pdf->Cell(30, 10, $lastname, 1);
        $pdf->Cell(30, 10, $contact, 1);
        $pdf->Cell(42, 10, $email, 1);
        $pdf->Cell(40, 10, $address, 1);
        $pdf->Ln();

    }

    $pdf->output();

?>