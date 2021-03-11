<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset("/css/app.css")}}">
    <link rel="icon" href="{{ URL::asset('/images/favicon.ico') }}" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

</head>
<body>

<div class="bg-smoke-light flex flex-col flex-1 justify-center h-screen mx-10 p-2.5 bg-yellow-50">

    <x-layout.header>
    </x-layout.header>
    @auth
        @yield("opciones")
    @endauth
    @yield("contenido")
    <x-layout.footer>
    </x-layout.footer>
</div>

@section("script")
<script>
    function app(){
        return {
            newEntry: {
                'from': '',
                'to': '',
                'subject': '',
            },
            data: [],
            init() {
                if(!this.data.length > 0){
                    let now = new Date()
                    this.newEntry.from = this.formatTime(now,15)
                    now.setHours(now.getHours() + 1)
                    this.newEntry.to = this.formatTime(now,15)
                }else{
                    let entries = this.data[0].entries
                    this.newEntry.from = entries[entries.length-1].to
                    this.newEntry.to = this.formatTime(now, 15)
                }
            }
    }
    }
</script>
    @show
</body>
</html>
