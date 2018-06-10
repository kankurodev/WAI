@extends('head')
@section('title', 'Raffler')
<body class="container bg-darker">
    <div id="app">
        @include('header')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

