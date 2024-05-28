<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HR-manager</title>
</head>

<body>
    <div>
        {{-- <h4>{{ $user['name'] }}</h4>
         --}}
        {{-- <h1>{{ $mailData['name'] }}</h1> --}}
        {{-- <p>{{ $mailData['reply'] }}</p> --}}
        <p>{{ $mailData->reply }}</p>

    </div>
</body>

</html>
