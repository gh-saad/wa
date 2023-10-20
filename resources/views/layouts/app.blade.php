<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    <div class="wrapper">
        @include('includes.sidebar')

        <div class="main">
            @include('includes.nav')

            <main class="content">
                @yield('content')
            </main>


        </div>
    </div>
    @include('includes.footer')



</body>

</html>
