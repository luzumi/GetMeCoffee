<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>GetMeCoffee</title>
    {{--    <link rel="script" href="{{ mix('css/app.css') }}"/>--}}
</head>
<body>

<script>
    const source = new EventSource("/receive-data");
    source.addEventListener("update", function (event) {
        const data = JSON.parse(event.data);
        console.log(data.message);
        // Load the new view here
        <html lang="de">
            <div class="container my-4" id="content">
                @yield('content')
            </div>
        </html>
    }, false);
</script>


<!-- footer -->
<div class="copyright py-4 text-center text-white">
    <div class="container">
        <small>
            Copyright - Daniel - <b>luzumi</b>
        </small>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous">
</script>

</body>
</html>