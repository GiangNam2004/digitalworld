<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.parts.header')
</head>

<body>
    <section class="admin">
        <div class="row-grid">
            <div class="admin-sidebar">
                @include('admin.parts.sidebar')
            </div>
            <div class="admin-content">
                <div class="admin-content-top">
                    @include('admin.parts.top')
                </div>

                <div class="admin-content-middle">
                    <div class="admin-content-main-title">
                        <h1 class="slide-right-effect">{{isset($title)? $title : 'Dashboard'}}</h1>
                    </div>
                    <div class="admin-content-main">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>
    </section>
    <footer>
        @include('admin.parts.footer')
    </footer>
</body>

</html>