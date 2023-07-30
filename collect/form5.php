<!DOCTYPE html>
<html>
<head>
    <title>Input Age Form</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
}

.center {
    text-align: center;
}

input {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

    </style>
</head>
<body>
    <div class="center">
        <h2>Enter Your weight</h2>
        <form action="process_forms.php" method="post">
            <input type="number" name="weight" required>
            <button type="submit" name="for_weight" >Submit</button>
        </form>
    </div>
</body>
</html>
