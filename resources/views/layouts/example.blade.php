<!DOCTYPE html>
<html lang='en'>

<head>

    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta charset="UTF-8">

    <title>Example App - @yield('title')</title>
</head>
<body>

    <h1>Example App - @yield('title')</h1>

    @if ($errors->any())
        <div>
            Errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div>
        @yield('content')
    </div>

</body>
</html>