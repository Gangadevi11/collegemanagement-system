
<?php
// Include the FPDF library
require('fpdf.php');
require('connection.php');

// Fetch data from the database
$sql = "SELECT * FROM forms";
$result = $con->query($sql);

// Initialize FPDF and create a new PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

// Title
$pdf->Cell(0, 10, 'User Data Export', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(200, 220, 255); 

// Column headings
$column_headings = ['Full Name', 'Email', 'Date of Birth', 'Gender', 'Course', 'Address', 'Phone Number', 'image'];

// Set column widths
$column_widths = [20, 40, 25, 25, 15, 25, 28, 30]; // Adjusted widths to match the number of headings

// Print the column headings
foreach ($column_headings as $key => $heading) {
    $pdf->Cell($column_widths[$key], 10, $heading, 1, 0, 'C', true);
}
$pdf->Ln();

// Set font for the table body
$pdf->SetFont('Arial', '', 12);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        // Calculate the maximum height for the row, depending on the image
        $row_height = 20; // Default height for text-only rows
        
        // If there’s an image and it exists
        if (!empty($row['image']) && file_exists($row['image'])) {
            // Set a larger row height if the image exists
            $row_height = 20; // Adjust this if image size changes
        }

    
        $pdf->Cell($column_widths[0], $row_height, $row['Full Name'], 1);
        $pdf->Cell($column_widths[1], $row_height, $row['Email'], 1);

        $pdf->Cell($column_widths[2], $row_height, $row['Date of Birth'], 1);
        $pdf->Cell($column_widths[3], $row_height, $row['Gender'], 1);
        
        $pdf->Cell($column_widths[4], $row_height, $row['Course'], 1);
        
        $pdf->Cell($column_widths[5], $row_height, $row['Address'], 1);
        
        $pdf->Cell($column_widths[6], $row_height, $row['Phone Number'], 1);
        
        // Image
        
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/collegemanagement/admin/images/' . $row['image'];
if (!empty($row['image']) && file_exists($imagePath)) {
    $pdf->Cell($column_widths[7], $row_height, '', 1, 0, 'C');
    $pdf->Image($imagePath, $pdf->GetX() - $column_widths[7], $pdf->GetY(), 20, 20);
} else {
    $pdf->Cell($column_widths[7], $row_height, 'No Photo', 1, 0, 'C');
}

        
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No results found', 1);
}

// Close the database connection
$con->close();

// Output the PDF to the browser
$pdf->Output('I', 'user_data_export.pdf'); // 'D' forces the browser to download the file
?>
