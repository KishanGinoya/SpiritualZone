<?php
    require('fpdf/fpdf.php'); // Include the FPDF library

    // Fetch data from the URL parameters
    // Fetch data from the database as in your billing.php
        $con = mysqli_connect("localhost", "root", "", "project");

        if (mysqli_connect_errno()) {
            echo "Failed to connect to database: " . mysqli_connect_error();
        }

        $id = $_GET['id'];
        $place = $_GET['place'];

        $query1 = "select * from book where id=$id;";
        $result1 = mysqli_query($con, $query1);
        $fetch1 = mysqli_fetch_assoc($result1);

        $query2 = "select * from package where name='$place';";
        $result2 = mysqli_query($con, $query2);
        $fetch2 = mysqli_fetch_assoc($result2);

        // Populate variables
        $name = $fetch1['name'];
        $email = $fetch1['email'];
        $mob = $fetch1['mobile'];
        $city = $fetch1['city'];
        $place = $fetch1['place'];
        $price = $fetch2['price'];
        $from = $fetch1['fromdate'];
        $to = $fetch1['todate'];
        $person = $fetch1['person'];
        $total = $fetch2['price'] * $fetch1['person'];


        // Create a new PDF instance
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        
        // Add your logo (assuming it's in the same directory as your PHP script)
        $pdf->Image('img/logo2.png', 10, 10, 50); // Adjust the width and height as needed

       // Set font size and color
        $pdf->SetFont('Arial', 'B', 24); // Increase the font size and make it bold
        $pdf->SetTextColor(0, 0, 255);

        // Add the travel name
        $pdf->Cell(0, 10, 'Spiritual Zone', 0, 1, 'C');
        $pdf->Ln(10);

        // Draw a line separator
        $pdf->SetLineWidth(0.5); // Adjust the line width as needed
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); // Draws a line from left to right based on the current Y position

        
        // Reset font size and color for the rest of the content
        $pdf->SetFont('Arial', 'B', 18); // Reset font size to 12
        $pdf->SetTextColor(0, 0, 0); // Reset text color to black (RGB values: 0, 0, 0)


        // Your PDF content
        $pdf->SetTextColor(52, 173, 0);
        $pdf->Cell(0, 10, 'Ticket Details', 0, 1, 'C');
        $pdf->Ln(10);
       
        
        // Define cell widths and heights
        $cellWidth = 90;
        $cellHeight = 10;
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($cellWidth, $cellHeight, 'Name', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, $cellHeight, $name, 1, 0, 'C');
        $pdf->Ln();        

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($cellWidth, $cellHeight, 'Email', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, $cellHeight, $email, 1, 0, 'C');
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($cellWidth, $cellHeight, 'Mobile No', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, $cellHeight, $mob, 1, 0, 'C');
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($cellWidth, $cellHeight, 'City', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, $cellHeight, $city, 1, 0, 'C');
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($cellWidth, $cellHeight, 'Visit Place', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, $cellHeight, $place, 1, 0, 'C');
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($cellWidth, $cellHeight, 'Package price', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, $cellHeight, $price, 1, 0, 'C');
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($cellWidth, $cellHeight, 'From Date', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, $cellHeight, $from, 1, 0, 'C');
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($cellWidth, $cellHeight, 'To Date', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, $cellHeight, $to, 1, 0, 'C');
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell($cellWidth, $cellHeight, 'Total person', 1, 0, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, $cellHeight, $person, 1, 0, 'C');
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTextColor(195, 33, 72);
        $pdf->Cell($cellWidth, $cellHeight, 'Grand Total', 1, 0, 'C');
        $pdf->Cell(0, $cellHeight, $total, 1, 0, 'C');
        $pdf->Ln(20); // is used to add a vertical spacing of 20 units (usually in points) between the content lines. 

        $pdf->SetFont('Arial', 'B', 18);
        $pdf->SetTextColor(52, 173, 0);
        $pdf->Cell(0, 10, 'Thank You for Booking', 0, 1, 'C');

        // Output the PDF as a download
        $pdf->Output('ticket.pdf', 'D');
?>
