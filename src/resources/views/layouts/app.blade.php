<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <@yield('title')
    <!-- <link rel="stylesheet" href="css/reset.css" /> -->
    <link rel="stylesheet" href="/css/sanitize.css" />
    <link rel="stylesheet" href="/css/common.css" />
    @yield('css')
</head>

<body>
    <main>
     @yield('content')
    </main>
</body>

</html>