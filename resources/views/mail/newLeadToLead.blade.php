<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Mail</title>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center mx-auto my-5 flex-column p-0 text-center">
    Ciao {{$data['name']}}.
    Il tuo messaggio <span>{{$data['message']}}</span> è stato ricevuto con successo.
  </div>
</body>
</html>
