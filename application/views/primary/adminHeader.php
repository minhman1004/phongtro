<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Style Sheet -->
    <link rel="apple-touch-icon" href="images/favicon.png">
    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">

    <!-- -------------------------------- -->
    <!-- Script -->
    <link href="assets/weather/css/weather-icons.css" rel="stylesheet" />
    <link href="assets/calendar/fullcalendar.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/charts/chartist.min.css" rel="stylesheet"> 
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <!--Chartist Chart-->
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/chartist/chartist-plugin-legend.js"></script>    
    <script src="assets/js/lib/flot-chart/jquery.flot.js"></script>
    <script src="assets/js/lib/flot-chart/jquery.flot.pie.js"></script>
    <script src="assets/js/lib/flot-chart/jquery.flot.spline.js"></script>
    <script src="assets/weather/js/jquery.simpleWeather.min.js"></script>
    <script src="assets/weather/js/weather-init.js"></script>
    <script src="assets/js/lib/moment/moment.js"></script>
    <script src="assets/calendar/fullcalendar.min.js"></script>
    <script src="assets/calendar/fullcalendar-init.js"></script>

    <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart { 
            min-height: 335px; 
        }
        #flotPie1  {
            height: 150px;
        } 
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        } 

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>

</head>
<body>
    <!-- Left Panel --> 
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default"> 
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"><i class="menu-icon fa fa-arrow-left"></i>Về trang chủ</a>
                    </li>
                    <li class="active">
                        <a href="dasboard.html"><i class="menu-icon fa fa-laptop"></i>Trang điều khiển </a>
                    </li>
                    <li class="menu-title">QUẢN LÍ</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users-cog"></i>Thành viên</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-users"></i><a href="#">Tất cả</a></li>
                            <li><i class="fas fa-user-tie"></i><a href="#">Nổi bật</a></li>
                            <li><i class="fas fa-user-edit"></i><a href="#">Người cho thuê</a></li>
                            <li><i class="fas fa-user-check"></i><a href="#">Người thuê</a></li>
                            <li><i class="fas fa-user-lock"></i><a href="#">Người môi giới</a></li>
                            <li><i class="fas fa-user-alt-slash"></i><a href="#">Danh sách cấm</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fab fa-readme"></i>Bài đăng</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fas fa-list-alt"></i><a href="#">Tất cả</a></li>
                            <li><i class="far fa-eye-slash"></i><a href="#">Danh sách ẩn</a></li>
                            <li><i class="far fa-trash-alt"></i><a href="#">Thùng rác</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fas fa-database"></i>Dữ liệu nền</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fas fa-info"></i><a href="#">Thông tin chung</a></li>
                            <li><i class="fas fa-map-marker-alt"></i><a href="#">Tỉnh thành</a></li>
                            <li><i class="far fa-building"></i></i><a href="#">Kiểu BĐS</a></li>
                            <li><i class="fas fa-filter"></i><a href="#">Kiểu Lọc</a></li>
                            <li><i class="fas fa-cube"></i><a href="#">Khác</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">HỆ THỐNG</li>

                    <li>
                        <a href="widgets.html"><i class="menu-icon fas fa-user-circle"></i></i>Phân quyền</a>
                    </li>
                    <li>
                        <a href="widgets.html"><i class="menu-icon fas fa-cogs"></i>Cài đặt</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">
        <header id="header" class="header">  
            <div class="top-left">
                <div class="navbar-header"> 
                    <!-- <a class="navbar-brand" style="width:100%; height:100%;" href="./"><img src="images/logo.png" alt="Logo"></a> -->
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> 
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
                </div> 
            </div>
            <div class="top-right"> 
                <div class="header-menu"> 
                    <div class="header-left">
                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have -- Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary"></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have -- Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src=""></span>
                                    <div class="message media-body">
                                        <span class="name float-left"></span>
                                        <span class="time float-right"></span>
                                        <p></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>Hồ sơ</a>

                            <a class="nav-link" href="#"><i class="fa fa-bell"></i>Thông báo<span class="count"></span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i>Cài đặt</a>

                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i>Đăng xuất</a>
                        </div>
                    </div> 
                </div>  
            </div>
        </header>
    </div>
    <div id="container">  
    </div>
</body>
</html>
