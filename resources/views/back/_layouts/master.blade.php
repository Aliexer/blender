<!DOCTYPE html>
<html lang="{{ locale() }}">
@include('front._layouts._partials.hiddenCredits')
<head>
    <meta charset="utf-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('pageDescription')">
    <title>{{ isset($title) ? $title  . ' | ' : '' }} Blender</title>

    <link rel="stylesheet" href="{{ mix('css/back.css') }}">

    <script src="{{ mix('js/back.head.js') }}"></script>

    @include('front._layouts._partials.head.favicons')
</head>
<body>
    @include('front._layouts._partials.deprecatedBrowser')

    @auth
        @include('back._layouts._partials.menu')
        <div class="grid">
            @if(html()->flashMessage())
                <div class="h-margin-bottom">
                    {{ html()->flashMessage() }}
                </div>
            @endif
            <nav class="breadcrumbs">
                {{ $breadcrumbs ?? '' }}
            </nav>
        </div>
    @endauth
    <main cla
    ss="main" id="app">
        {{ $slot }}
    </main>

    @auth
        @include('back._layouts._partials.footer')
    @endauth

    <script src="{{ mix('js/back.app.js') }}" defer></script>
    @yield('extraJs')
</body>
</html>
