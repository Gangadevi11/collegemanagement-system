<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Form</title>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 400px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"], input[type="number"], textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}

textarea {
    resize: vertical;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
}
input[type="file"] {
    border: none;
    padding: 0;
    background-color: transparent;
}

input[type="file"]::-webkit-file-upload-button {
    background-color: #28a745;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

input[type="file"]::-webkit-file-upload-button:hover {
    background-color: #218838;
}

</style>
</head>
<body>

    <div class="form-container">
        <h2>Course Registration Form</h2>
        <form action="course.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
          
                <label for="course_name">Course Name</label>
                <input type="text" id="course_name" name="name" required>
            </div>

            <div class="form-group">
                <label for="course_price">Course Price ($)</label>
                <input type="number" id="course_price" name="price" required>
            </div>

            <div class="form-group">
                <label for="course_description">Course Description</label>
                <textarea id="course_description" name="description" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="course_image">Course Image</label>
                <input type="file" id="course_image" name="image" accept="image/*" required>
             </div>  
             <button type="submit">submit</button>
           
        </form>
    </div>

</body>
</html>
