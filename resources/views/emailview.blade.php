<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Test Email</title>
</head>
<body>
    <h1>Hello from Laravel!</h1>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>House Enrollment</title>
</head>
<body>
    <h1>Welcome to EasyColoc!</h1>
    <p>You have been invited to join a house.</p>
    <p>Please follow these steps:</p>
    <ol>
        <li>Open your browser and go to <strong>/houseenroll</strong>.</li>
        <li>When prompted, enter the following code to complete your enrollment:</li>
    </ol>
    <h2 style="color: #4F46E5;">{{ $token }}</h2>
    <h5>the identification of the house you are invited into is {{$code}}</h5>
    <p>If you encounter any issues, please contact support.</p>
</body>
</html>
