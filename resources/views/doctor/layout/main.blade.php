

<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>u{{session('type')}}</title>

        <meta name="description" content="uAdmin is a Professional, Responsive and Flat Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="css/bootstrap.css">

        <!-- Related styles of various javascript plugins -->
        <link rel="stylesheet" href="css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="css/main.css">

        <!-- Load a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="js/vendor/modernizr-respond.min.js"></script>
    </head>

    <!-- Add the class .fixed to <body> for a fixed layout on large resolutions (min: 1200px) -->
    <!-- <body class="fixed"> -->
    <body>
        <!-- Page Container -->
        <div id="page-container">
            <!-- Header -->
            <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
            <!-- <header class="navbar navbar-inverse navbar-fixed-top"> -->
            <!-- <header class="navbar navbar-inverse navbar-fixed-bottom"> -->
            <header class="navbar navbar-inverse">
                <!-- Mobile Navigation, Shows up  on smaller screens -->
                <ul class="navbar-nav-custom pull-right hidden-md hidden-lg">
                    <li class="divider-vertical"></li>
                    <li>
                        <!-- It is set to open and close the main navigation on smaller screens. The class .navbar-main-collapse was added to aside#page-sidebar -->
                        <a href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-main-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
                <!-- END Mobile Navigation -->

                <!-- Logo -->
                <a href="{{route('doctor.index')}}" class="navbar-brand">U{{session('type')}}</a>

               
                    <li class="divider-vertical"></li>

                    <!-- User Menu -->
                    <li class="dropdown pull-right dropdown-user" style="margin-top: -30px; margin-right: 20px;">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('upload')}}/users/{{session('username')}}.jpeg" alt="ProfilePic" style="height: 30px; width: 35px; border-radius: 20px;"> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <!-- Just a button demostrating how loading of widgets could happen, check main.js- - uiDemo() -->
                            <li>
                                <a href="#" class="loading-on"><i class="fa fa-refresh"></i> Refresh</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <!-- Modal div is at the bottom of the page before including javascript code -->
                                <a href="{{route('doctor.profile')}}" role="button" data-toggle="modal"><i class="fa fa-user"></i> User Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{route('logout.index')}}"><i class="fa fa-lock"></i> Log out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- END User Menu -->
                </ul>
                <!-- END Header Widgets -->
            </header>
            <!-- END Header -->

            <!-- Inner Container -->
            <div id="inner-container">
                <!-- Sidebar -->
                <aside id="page-sidebar" class="collapse navbar-collapse navbar-main-collapse">
                    <!-- Sidebar search -->
                             @yield('Search')
                    <!-- END Sidebar search -->

                    <!-- Primary Navigation -->
                    <nav id="primary-nav">
                        <ul>
                           
                             <li>
                                <a href="{{route('doctor.index')}}" class="active"><i class="fa fa-fire"></i>Dashboard</a>
                            </li>        
                            <li>
                                <a href="#"><i class="fa fa-th-list"></i>Patients</a>
                                <ul>
                                    <li>
                                        <a href="{{route('doctor.addpatient')}}"><i class="fa fa-pencil"></i>Add Patient</a>
                                    </li>
                                    <li>
                                        <a href="{{route('doctor.patientlist')}}"><i class="fa fa-th"></i>Patient List</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-th-list"></i>Appointment</a>
                                <ul>
                                    <li>
                                        <a href="{{route('doctor.viewappoint')}}"><i class="fa fa-th"></i>View Appointment</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-th-list"></i>Notice Board</a>
                                <ul>
                                    <li>
                                        <a href="{{route('doctor.noticelist')}}"><i class="fa fa-th"></i>View Notice</a>
                                    </li>
                                    
                                </ul>
                            </li>
                             
                             <li>
                                <a href="#"><i class="fa fa-th-list"></i>Prescription</a>
                                <ul>
                                    <li>
                                        <a href="{{route('doctor.addprescription')}}"><i class="fa fa-pencil"></i>Add Prescription</a>
                                    </li>
                                    <li>
                                        <a href="{{route('doctor.prescriptionlist')}}"><i class="fa fa-th"></i>Prescription List</a>
                                    </li>
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-leaf"></i>Bed Allotment</a>
                                <ul>
                                 <li>
                                        <a href="{{route('doctor.addbed')}}"><i class="fa fa-picture-o"></i>Allotment Bed To Patient</a>
                                    </li>
                                    <li>
                                        <a href="{{route('doctor.bedlist')}}"><i class="fa fa-envelope"></i>View Bed Allotment Lists</a>
                                    </li>
                                    
                                    </ul>
                            </li>
                           
                            <li>
                                <a href="#"><i class="fa fa-leaf"></i>Blood Bank</a>
                                <ul>
                                    <li>
                                        <a href="{{route('doctor.bloodlist')}}"><i class="fa fa-envelope"></i>View Avaliable Blood</a>
                                    </li>
                                    
                                    </ul>
                            </li>

                             <li>
                                <a href="#"><i class="fa fa-leaf"></i>Manage Report</a>
                                <ul>
                                 <li>
                                        <a href="{{route('doctor.addoperation')}}"><i class="fa fa-picture-o"></i>Operation Occure</a>
                                    </li>
                                    <li>
                                        <a href="{{route('doctor.operationlist')}}"><i class="fa fa-envelope"></i>View Operation Lists</a>
                                    </li>
                                    
                                    </ul>
                            </li>

                            <li>
                                <a href="{{route('doctor.profile')}}"><i class="fa fa-th-list"></i>Manage Profile</a>
                            </li>
                            <li>
                                <a href="{{route('doctor.cngpassword')}}"><i class="fa fa-th-list"></i>Change Password</a>
                            </li>
                            
                        </ul>
                    </nav>
                    <!-- END Primary Navigation -->

                    </aside>
                <!-- END Sidebar -->

                <!-- Page Content -->
                <div id="page-content">
                    <!-- Navigation info -->
                    <ul id="nav-info" class="clearfix">
                        <li><a href="{{route('doctor.index')}}"><i class="fa fa-home"></i></a></li>
                        <li class="active"><a href="#">@yield('Name')</a></li>
                    </ul>
                    <!-- END Navigation info -->

                   
                    <!-- Home -->
                       @yield('Iteams')

                
            </div>
            <!-- END Inner Container -->
        </div>
        <!-- END Page Container -->
            <!-- Footer -->
                <footer style="background-color: #ddd; text-align: center;">
                    <span id="year-copy"></span> &copy; <strong><a href="http://goo.gl/9QhXQ">uAdmin 2.1</a></strong> - Crafted with <i class="fa fa-heart text-danger"></i> by <strong><a href="http://goo.gl/vNS3I" target="_blank">pixelcave</a></strong>
                </footer>
                <!-- END Footer -->

        <!-- Excanvas for canvas support on IE8 -->
        <!--[if lte IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script> 

        <!-- Bootstrap.js -->
        <script src="js/vendor/bootstrap.min.js"></script>

        <!-- Jquery plugins and custom javascript code -->
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>