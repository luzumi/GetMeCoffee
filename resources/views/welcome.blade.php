@extends('layouts.app')

@section('content')
    <div id="content" class="text-center">
        GetMeCoffee
    </div>
    <script>
        const evtSource = new EventSource(' {{ route('send-request-to-rasp') }} ');

        evtSource.onmessage = function (event) {
               console.log(event.data + " - event");
            let xhr = new XMLHttpRequest();
            var data = JSON.parse(event.data);
            if(data.user == null) new EventSource(' {{ route('send-request-to-rasp') }} ');
            else {
                var user = data.user;

                let userId = user.id;
                let route = '{{ route('menu', 1) }}';
                route = route.substring(0, route.length - 2) + '/' + userId;
                xhr.open("GET", route);

                xhr.setRequestHeader("x-requested-with", "XMLHttpRequest");
                xhr.onreadystatechange = function () {
                    console.log(xhr.getResponseHeader("x-auth-event"))
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        console.log('event');
                        window.location.href = '/menu/' + userId;
                    }
                };
                xhr.send();
            }
        }

        {{--window.addEventListener("login", function() {--}}
        {{--    let xhr = new XMLHttpRequest();--}}
        {{--    let userId = <?php echo json_encode(Session::get('userId')) ?>;--}}
        {{--    console.log('USER_ID: ' + userId);--}}
        {{--    xhr.open("GET", "/menu/" + 1);--}}
        {{--    xhr.setRequestHeader("x-requested-with", "XMLHttpRequest");--}}
        {{--    xhr.onreadystatechange = function() {--}}
        {{--        if (xhr.readyState === XMLHttpRequest.DONE && xhr.getResponseHeader("x-auth-event") === "login") {--}}
        {{--            new Notification("Willkommen zurück!", {--}}
        {{--                body: "Sie sind erfolgreich angemeldet."--}}
        {{--            });--}}
        {{--        }--}}
        {{--    };--}}
        {{--    xhr.send();--}}
        {{--});--}}


    </script>
@endsection
