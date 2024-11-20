<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
		body{
			background-color:darkblue;
		}
    
        form {
            max-width: 400px; /* Form width */
            margin: 50px auto; /* Center the form */
			margin-top:100px;
            padding: 20px;
            background-color:lightblue; /* Light background */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Slight shadow for depth */
            border-radius: 8px; /* Rounded corners */
        }

        /* Input field styles */
        input[type="text"], input[type="password"] {
            width: 100%; /* Full width */
            padding: 12px 15px; /* Padding inside the input */
            margin: 8px 0; /* Space between inputs */
            border: 1px solid #ccc; /* Border style */
            border-radius: 5px; /* Rounded corners */
            box-sizing: border-box; /* Make padding consistent */
            font-size: 16px; /* Text size */
            background-color: #fff; /* White background */
            color: #333; /* Dark text color */
        }

        /* Placeholder text styling */
        input[type="text"]::placeholder, input[type="password"]::placeholder {
            color: #aaa; /* Light gray placeholder */
        }

        /* Submit button styling */
        input[type="submit"] {
            width: 100%; /* Full width */
            padding: 12px 15px; /* Padding inside the button */
            margin: 15px 0; /* Space above and below button */
            background-color: #4CAF50; /* Green background */
            color: #fff; /* White text */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            font-size: 18px; /* Text size */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s ease; /* Smooth hover transition */
        }

        /* Submit button hover effect */
        input[type="submit"]:hover {
            background-color: #45a049; /* Slightly darker green */
        }

        /* Checkbox container styling */
        .checkbox {
            display: inline-block; /* Align with text */
            font-size: 14px; /* Font size */
            color: #333; /* Text color */
            cursor: pointer; /* Pointer cursor */
        }

        /* Checkbox styling */
        .checkbox input[type="checkbox"] {
            margin-right: 10px; /* Space between checkbox and text */
        }

        /* Forgot password link styling */
        .forgot {
            float: right; /* Align to the right */
            font-size: 14px; /* Font size */
            color: #007bff; /* Blue color */
        }

        /* Forgot password link hover effect */
        .forgot a {
            text-decoration: none; /* Remove underline */
            color: #007bff; /* Blue color */
            transition: color 0.3s ease; /* Smooth hover transition */
			margin-left:150px;
        }

        .forgot a:hover {
            color: #0056b3; /* Darker blue on hover */
        }

        /* Clearfix for floated elements */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Forgot grid container styling */
        .forgot-grid {
            display: flex;
            justify-content: space-between; /* Space between elements */
            align-items: center; /* Center vertically */
            margin-top: 15px; /* Space above the container */
        }

        /* Mobile responsiveness */
        @media screen and (max-width: 480px) {
            form {
                width: 90%; /* Full width on small screens */
                margin: 20px auto; /* Less margin */
            }
        }
    </style>
</head>
<body>
    <div>
        <form action="loginaction.php" method="post">
           <center> <h2>Login</h2></center>
            <input type="text" class="user" name="email" placeholder="Enter your email" required="">
            <input type="password" name="password" class="lock" placeholder="Password" required="">
            <input type="submit" name="Sign In" value="Sign In">
            
            <div class="forgot-grid">
                <label class="checkbox">
                    <input type="checkbox" name="checkbox" checked=""><i></i> Remember me
                </label>
                <div class="forgot">
                    <a href="#">Forgot password?</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
</body>
</html>

