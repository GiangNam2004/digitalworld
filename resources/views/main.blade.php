<!DOCTYPE html>
<html lang="en">

<head>
    @include('parts.head')
</head>

<body>
    <!--header-->
        @include('parts.header')
    {{-- content --}}
    @yield('content')
    <!--sale-product-->
    @include('parts.saleproduct')
    <!--footer-->
    @include('parts.footer')
</body>

</html>