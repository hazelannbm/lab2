<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple PHP Form Validation</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #000;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 400px;
        margin: 50px auto;
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    input[type="text"], input[type="email"], input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #EF2E8B;
        color: white;
        border: none;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    .error {
        color: red;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Simple PHP Form Validation</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    $name = $email = "";
    $nameErr = $emailErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr)) : ?>
        <div>
            <h2>Form submitted successfully!</h2>
            <p>Name: <?php echo $name; ?></p>
            <p>Email: <?php echo $email; ?></p>
        </div>
    <?php endif; ?>

    <?php if (!empty($nameErr) || !empty($emailErr)) : ?>
        <div class="error">
            <h2>Error:</h2>
            <ul>
                <?php if (!empty($nameErr)) : ?>
                    <li><?php echo $nameErr; ?></li>
                <?php endif; ?>
                <?php if (!empty($emailErr)) : ?>
                    <li><?php echo $emailErr; ?></li>
                <?php endif; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
