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
    <h1>Nuovo Lead!</h1>
    <h4>{{$data['name']}} ha appena inviato questo messaggio</h4>
    <p>{{$data['message']}}</p>
    <p>Rispondi all'indirizzo {{$data['email']}}</p>
  </div>
</body>
</html>
