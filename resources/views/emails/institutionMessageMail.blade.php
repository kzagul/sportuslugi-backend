<!DOCTYPE html>
<html>
<head>
    <title>Спортуслуги</title>
</head>
<body>
    <div class="">
        <img src="{{url('/images/sport_logo.svg')}}"  style="width: 200px;" alt="">

        <h1>{{ $mailData['topic'] }}</h1>
        <p>{{ $mailData['phone'] }}</p>
        <p>{{ $mailData['email'] }}</p>
    
        <p>{{ $mailData['body'] }}</p>
    </div>
    <!-- <p>С уважением, </p>
    <p>Спортуслуги</p> -->
</body>
</html>