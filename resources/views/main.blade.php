<!DOCTYPE html>
<html lang="en">

<head>
    @include('parts.head')
</head>

<body>
    <!--header-->
    @include('parts.header')
    {{-- loading --}}
    <div class="loading-effect">
        <div class="cat">
            <div class="ear ear-l">
            </div>
            <div class="ear ear-r">
            </div>
            <div class="eye eye-l">
                <div class="circle">
                </div>
            </div>
            <div class="eye eye-r">
                <div class="circle">
                </div>
            </div>
            <div class="nose"></div>
            <div class="mouth"></div>
            <div class="whiskers whiskers-1">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="whiskers whiskers-2">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="path">
            <div class="mouse">
                <div class="tail"></div>
            </div>
        </div>
    </div>
    <div class="dark-effect"></div>
    {{-- content --}}
    @yield('content')
    <!--sale-product-->
    @include('parts.saleproduct')
    <!--footer-->
    @include('parts.footer')
    <script type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "ece7c765-2090-4ee1-a7c8-47b9165a1dcc";
        (function() {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>
</body>

</html>
