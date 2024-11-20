
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <title>Student Details Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        h2 {
            text-align: center;
            color: #333;
        }
        
        .form-container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin-top:500px;
        }
        
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="tel"],
        select,
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        
        input[type="radio"] {
            margin-right: 10px;
        }

        .gender-label {
            display: inline;
            font-weight: normal;
        }
        
        button {
            background-color: #5cb85c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        
        button:hover {
            background-color: #4cae4c;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
    </style>
<script type="text/javascript">
$(document).ready(function() {
    // When the country dropdown changes
    $('#country').change(function() {
        var country = $(this).val(); 

        console.log(country);

        $.ajax({
            url: 'search_state.php',
            type: 'POST',
            data: { country: country },
            success: function(res) {
                console.log(res); 

                $('#state').html(res); 
            },
            error: function() {
                alert('Error occurred while fetching states'); // Error handler
            }
        });
    });
});
</script>




<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
</head>
<body>




<div class="form-container">
    <h2>Student Details Form</h2>
    <form action="formaction.php" method="post" enctype="multipart/form-data">
        <!-- Name -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!-- Date of Birth -->
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
        </div>

        <!-- Gender -->
        <div class="form-group">
            <label for="gender">Gender:</label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label class="gender-label" for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label class="gender-label" for="female">Female</label>
        </div>

        <!-- Phone Number -->
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phonenumber" pattern="[0-9]{10}" required>
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea>
        </div>

        <!-- Course -->
        <div class="form-group">
            <label for="course">Course:</label>
            <input type="text" id="course" name="course" required>
        </div>

        <!-- Country Dropdown -->
        <div class="form-group">
            <label for="country">Country:</label>
            
            <select id="country" name="country" required>
    <option value="">Select Country</option>
     <?php
    require("admin/connection.php");
    $res = $con->query("SELECT * from countries");
    $count = $res->num_rows;
    if($count > 0){
        while($row = $res->fetch_assoc()) {
            echo "<option value='" . htmlspecialchars($row['cont_id']) ."'>" . htmlspecialchars($row['name']) . "</option>";
        }
    } else {
        echo 'no country';
    }
?>

</select>

        </div>

        <!-- State Dropdown -->
        <div class="form-group">
            <label for="state">State:</label>
            <select id="state" name="state" required>
                <?php
            if (mysqli_num_rows($res) > 0) {
    ?>
    <option value="sel_state">--Select State--</option>
    <?php
    
    while ($row = mysqli_fetch_array($res)) {
        ?>
        <option value="<?php echo $row['stat_id']; ?>"><?php echo $row['sname']; ?></option>
        <?php
    }
} else {
    // If no results were found, output "No Results"
    echo "No Results";
}
?>
            </select>
        </div>

        <!-- Image Upload -->
        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <!-- Submit Button -->
        <button type="submit">Submit</button>
    </form>
</div>


        <!-- Submit Button -->
        <button type="submit">Submit</button>
    </form>
</div>

    </div>
</body>
</html>
