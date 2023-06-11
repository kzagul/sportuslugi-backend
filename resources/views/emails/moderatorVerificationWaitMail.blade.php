<!DOCTYPE html>
<html>
<head>
    <title>Спортуслуги</title>
</head>
<body>
    <div class="">
        <img src="{{url('/images/sport_logo.svg')}}"  style="width: 200px;" alt="">
        <br>
        <h1>{{ $mailData['userName'] }}, добро пожаловать на Споруслуги!</h1>
        <br>
        <p>Вы зарегестрировались как представитель спортивного учреждения {{ $mailData['institutionName'] }}</p>
        <br>
        <p>Ожидайте подтверждения Вашего аккаунта. Профиль учреждения будет скоро доступен.</p>
        <br>
        <p>С уважением, </p>
        <p>Спортуслуги</p>
    </div>
</body>
</html>