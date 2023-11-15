<?php

// Initialize variables to store user input
$arg_pregnant = '';
$arg_glucose = '';
$arg_pressure = '';
$arg_triceps = '';
$arg_insulin = '';
$arg_mass = '';
$arg_pedigree = '';
$arg_age = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $arg_pregnant = $_POST['pregnant'];
    $arg_glucose = $_POST['glucose'];
    $arg_pressure = $_POST['pressure'];
    $arg_triceps = $_POST['triceps'];
    $arg_insulin = $_POST['insulin'];
    $arg_mass = $_POST['mass'];
    $arg_pedigree = $_POST['pedigree'];
    $arg_age = $_POST['age'];

    // Set the API endpoint URL
    $apiUrl = 'http://127.0.0.1:5022/diabetes';

    // Initialize a new cURL session/resource
    $curl = curl_init();

    // Set the values of the parameters to pass to the model
    $data = array(
        'pregnant' => $arg_pregnant,
        'glucose' => $arg_glucose,
        'pressure' => $arg_pressure,
        'triceps' => $arg_triceps,
        'insulin' => $arg_insulin,
        'mass' => $arg_mass,
        'pedigree' => $arg_pedigree,
        'age' => $arg_age
    );

    // Set cURL options
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session and store the result
    $response = curl_exec($curl);

    // Close cURL session
    curl_close($curl);

    // Display the API response
    echo 'API Response: ' . $response;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diabetes Prediction Form</title>
</head>
<body>

    <h2>Diabetes Prediction Form</h2>

    <!-- Create a simple form to gather user input -->
    <form method="post">
        <label for="pregnant">Pregnant:</label>
        <input type="text" name="pregnant" value="<?php echo $arg_pregnant; ?>" required><br>

        <label for="glucose">Glucose:</label>
        <input type="text" name="glucose" value="<?php echo $arg_glucose; ?>" required><br>

        <label for="pressure">Pressure:</label>
        <input type="text" name="pressure" value="<?php echo $arg_pressure; ?>" required><br>

        <label for="triceps">Triceps:</label>
        <input type="text" name="triceps" value="<?php echo $arg_triceps; ?>" required><br>

        <label for="insulin">Insulin:</label>
        <input type="text" name="insulin" value="<?php echo $arg_insulin; ?>" required><br>

        <label for="mass">Mass:</label>
        <input type="text" name="mass" value="<?php echo $arg_mass; ?>" required><br>

        <label for="pedigree">Pedigree:</label>
        <input type="text" name="pedigree" value="<?php echo $arg_pedigree; ?>" required><br>

        <label for="age">Age:</label>
        <input type="text" name="age" value="<?php echo $arg_age; ?>" required><br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
