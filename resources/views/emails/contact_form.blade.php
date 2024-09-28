<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body>
    <h2>Contact Form Submission</h2>
    <p>Name: {{ $formData['form_name'] }}</p>
    <p>Email: {{ $formData['form_email'] }}</p>
    <p>Phone: {{ $formData['form_phone'] }}</p>
    <p>Location: {{ $formData['form_location'] }}</p>
    <p>Message: {{ $formData['form_message'] }}</p>
</body>
</html>
