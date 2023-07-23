
<!DOCTYPE html>
<html>
<head>
    <title>Choose Your Goal</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        form {
            text-align: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            font-size :24px;

            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h2 {
            margin-bottom: 20px;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        label {
            margin-right: 20px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .radio-group {
            text-align: left;
            margin-bottom: 10px;
        }
        .radio-group label {
            /* display: block; */
            margin-bottom: 5px;
            font-size: 24px;
            
        }
    </style>
</head>
<body>
    <form method="POST" action="process_forms.php">
        <h2>What is your gender?</h2>
        <div class="radio-group">
            <input type="radio" name="field_form2" value="male" id="lose_weight">
            <label for="male">Male</label><br>
        </div>
        <div class="radio-group">
        <input type="radio" name="field_form2" value="female" id="build_muscle">
        <label for="female">Female</label><br>
        </div>
     <button type="submit" name="form2_submit">Next</button>
       
    </form>
</body>
</html>
