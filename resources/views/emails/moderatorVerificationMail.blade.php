<!DOCTYPE html>
<html>
<head>
    <title>Спортуслуги</title>
</head>
<body>

    <div class="">
        <img src="{{url('/images/sport_logo.svg')}}"  style="width: 200px;" alt="">

        <h1>{{ $mailData['title'] }}</h1>
        <p>{{ $mailData['body'] }}</p>
        
        <p>С уважением, </p>
        <p>Спортуслуги</p>
    </div>
</body>
</html>