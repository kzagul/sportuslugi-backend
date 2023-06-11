<!DOCTYPE html>
<html>
<head>
    <title>Спортуслуги</title>
</head>
<body>
    <div style="display: flex; flex-direction: column; justify-content: center;	align-items: center; gap: 2rem; margin-left: 3rem; margin-right: 3rem;">
        <img src="{{url('/images/sport_logo.svg')}}"  style="display: flex; width: 300px; justify-content: center; align-items: center;" alt="">
        <div style="display: flex; flex-direction: column; 	gap: 1rem; background-color: rgb(248 250 252); border: solid; border-radius: 1rem; padding: 0.625rem;">
            <h1>Новая заявка на услугу | {{ $mailData['title'] }}</h1> 
            
            <p>{{ $mailData['name'] }}, отправил(а) заявку на следующую услугу: <a href="${$mailData['serviceLink']}">{{ $mailData['serviceName'] }}</a></p>
            
            <div>
                <h3>Информация о клиенте.</h3>
                <p>Имя: {{ $mailData['name'] }}. Возраст: {{ $mailData['age'] }}. Пол: {{ $mailData['gender'] }}</p>
            </div>
            <div>
                <h3>Контакты клиента</h3>
                <p>Телефон: {{ $mailData['phone'] }}. Email: {{ $mailData['emailUser'] }}</p>
            </div>

            <div>
                <p>
                {{ $mailData['name'] }} дополнительно написал(а):
                </p>
                <p>
                    {{ $mailData['body'] }}
                </p>
            </div>
        </div>
    </div>
</body>
</html>