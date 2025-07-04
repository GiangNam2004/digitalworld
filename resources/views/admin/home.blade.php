<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.parts.header')
    <!-- Montserrat Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('/backend/asset/dashboard.css')}}">
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
                        <h1 class="slide-bottom-effect">Dashboard</h1>
                        <!-- Main -->
                        <main class="main-container">
                            <div class="main-cards">

                                <div class="card slide-left-effect">
                                    <div class="card-inner">
                                        <p class="text-primary">SẢN PHẨM</p>
                                        <span class="material-icons-outlined text-blue">inventory_2</span>
                                    </div>
                                    <span class="text-primary font-weight-bold">249</span>
                                </div>

                                <div class="card slide-left-effect">
                                    <div class="card-inner">
                                        <p class="text-primary">ĐƠN MUA HÀNG</p>
                                        <span class="material-icons-outlined text-orange">add_shopping_cart</span>
                                    </div>
                                    <span class="text-primary font-weight-bold">83</span>
                                </div>

                                <div class="card slide-right-effect">
                                    <div class="card-inner">
                                        <p class="text-primary">ĐƠN BÁN HÀNG</p>
                                        <span class="material-icons-outlined text-green">shopping_cart</span>
                                    </div>
                                    <span class="text-primary font-weight-bold">79</span>
                                </div>

                                <div class="card slide-right-effect">
                                    <div class="card-inner">
                                        <p class="text-primary">CẢNH BÁO TỒN KHO</p>
                                        <span class="material-icons-outlined text-red">notification_important</span>
                                    </div>
                                    <span class="text-primary font-weight-bold">56</span>
                                </div>

                            </div>

                            <div class="charts">

                                <div class="charts-card">
                                    <p class="chart-title">Top 5 Sản Phẩm</p>
                                    <div id="bar-chart"></div>
                                </div>

                                <div class="charts-card">
                                    <p class="chart-title">Đơn Mua và Đơn Bán</p>
                                    <div id="area-chart"></div>
                                </div>

                            </div>
                        </main>
                        <!-- End Main -->
                    </div>
                    <div class="admin-content-main">

                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer>
        @include('admin.parts.footer')
        <!-- Scripts -->
        <!-- ApexCharts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
        <!-- Custom JS -->
        <script src={{asset('/backend/asset/dashboard.js')}}></script>
    </footer>
</body>

</html>
