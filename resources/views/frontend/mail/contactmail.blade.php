<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Me Mail</title>
</head>
<body>
    Hello Rahul Shakya,<br>
                    You have a message sent from : {{$form_data['email']}}<br>
        Name : {{$form_data['name']}}<br>
        Message : {{$form_data['message']}}<br>
        Subject : {{$form_data['subject']}}<br>
</body>
</html>
