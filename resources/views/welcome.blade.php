<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>BucketAdmin</title>

</head>
<body>
<div class="col-md-4"></div>
<div class="col-md-4">
    <h1>Multi lang</h1>
    {{session('lang_msg')}}
    <h3>{{Lang::get('home.hello')}}</h3>
    Default Language: {{Lang::getLocale()}}<br>
    select language: <a href="{{url('lang/tr')}}">Turkey</a> | <a href="{{url('lang/en')}}">English</a>
</div>
<div class="col-md-4"></div>

</body>
</html>