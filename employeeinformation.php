<!DOCTYPE html>
<html>
<head>
    <title>Employee Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin: 10px 0;
        }

        label {
            display: block;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="tel"],
        textarea {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 5px;
        }

        textarea {
            height: 100px;
        }

        input[type="submit"] {
            background: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Employee Information Form</h1>
    <div class="container">
        <form action="Database/formdata.php" method="post">
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="text" name="employee_id" required>
            </div>

            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" name="full_name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" name="designation" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" required>
            </div>

            <div class="form-group">
                <label for="joining_date">Joining Date:</label>
                <input type="date" name="joining_date" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" required></textarea>
            </div>

            <div class="form-group">
                <label for="blood_group">Blood Group:</label>
                <input type="text" name="blood_group" required>
            </div>

            <div class="form-group">
                <label for="emergency_number">Emergency Number:</label>
                <input type="tel" name="emergency_number" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
