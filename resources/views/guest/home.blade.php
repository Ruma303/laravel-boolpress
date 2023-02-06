{{-- Struttura html base per il front office con Vue --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('css/back.css')}}">
    {{-- Importare il mio javascript --}}
    <script src="{{asset('js/front.js')}}" defer></script>
</head>
<body>
    <div id="root" class="container d-flex justify-content-center
    align-items-center mx-auto my-5 flex-column p-0 text-center">
    </div>
</body>
</html>

