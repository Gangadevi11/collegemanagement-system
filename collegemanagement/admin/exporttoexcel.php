
<?php 
require("connection.php");

// Fetch data from Users table
$res = $con->query("SELECT * FROM forms");

// Initialize serial number
$serial = 1;

// Create header of excel
$content = '<table border="1">
               <tr> 
                 <th>S.No</th>
                 <th>Student Name</th>
                 <th>Email</th>
                 <th>DoB</th>
                 <th>Gender</th>
                 <th>Course</th>
                 <th>Address</th>
                 <th>Phone Number</th>
                 <th>Image</th>
                 <th>Action</th>
               </tr>'; 

while($row = mysqli_fetch_array($res))  
{  
    $content .= '<tr>';
    $content .= '<td>'.$serial.'</td>'; // Serial number
    $content .= '<td>'.$row['Full Name'].'</td>';
    $content .= '<td>'.$row['Email'].'</td>';
    $content .= '<td>'.$row['Date of Birth'].'</td>';
    $content .= '<td>'.$row['Gender'].'</td>';
    $content .= '<td>'.$row['Course'].'</td>';
    $content .= '<td>'.$row['Address'].'</td>';
    $content .= '<td>'.$row['Phone Number'].'</td>';
    
    // Adding image link instead of trying to show the image
    $imageURL = 'http://localhost/collegemanagement/admin/images/' . $row['image'];

    $content .= '<td><a href="'.$imageURL.'" target="_blank">View Image</a></td>';
    
    $content .= '<td>Action Here</td>'; 
    $content .= '</tr>';   

    // Increment serial number for the next row
    $serial++;
}

$content .= '</table>'; 

// This code is used to create excel format
header('Content-Type: application/xls');  
header('Content-Disposition: attachment; filename=excel.xls');
echo $content;
exit();
?>
