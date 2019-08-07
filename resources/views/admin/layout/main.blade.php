

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
                <a href="{{route('admin.index')}}" class="navbar-brand">U{{session('type')}}</a>

               
                    <li class="divider-vertical"></li>

                    <!-- User Menu -->
                    <li class="dropdown pull-right dropdown-user" style="margin-top: -30px; margin-right: 20px;">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('upload')}}/users/{{session('username')}}.jpeg" alt="ProfilePic" style="height: 30px; width: 35px; border-radius: 20px;"> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <!-- Just a button demostrating how loading of widgets could happen, check main.js- - uiDemo() -->
                            <li>
                                <a href="javascript:void(0)" class="loading-on"><i class="fa fa-refresh"></i> Refresh</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <!-- Modal div is at the bottom of the page before including javascript code -->
                                <a href="#modal-user-settings" role="button" data-toggle="modal"><i class="fa fa-user"></i> User Profile</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="fa fa-wrench"></i> App Settings</a>
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
                    <form id="sidebar-search" action="page_search_results.html" method="post">
                        <div class="input-group">
                            <input type="text" id="sidebar-search-term" name="sidebar-search-term" placeholder="Search..">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                    <!-- END Sidebar search -->

                    <!-- Primary Navigation -->
                    <nav id="primary-nav">
                        <ul>
                            <li>
                                <a href="index.html" class="active"><i class="fa fa-fire"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="page_ui_elements.html"><i class="fa fa-glass"></i>UI Elements</a>
                            </li>
                            <li>
                                <a href="page_typography.html"><i class="fa fa-font"></i>Typography</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-th-list"></i>Forms</a>
                                <ul>
                                    <li>
                                        <a href="page_form_components.html"><i class="fa fa-file-text"></i>Components</a>
                                    </li>
                                    <li>
                                        <a href="page_form_validation.html"><i class="fa fa-exclamation-triangle"></i>Validation</a>
                                    </li>
                                    <li>
                                        <a href="page_form_wizard.html"><i class="fa fa-magic"></i>Wizard</a>
                                    </li>
                                    <li>
                                        <a href="page_form_masked.html"><i class="fa fa-flask"></i>Masked Inputs</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-table"></i>Tables</a>
                                <ul>
                                    <li>
                                        <a href="page_tables.html"><i class="fa fa-tint"></i>Styles</a>
                                    </li>
                                    <li>
                                        <a href="page_datatables.html"><i class="fa fa-th"></i>DataTables</a>
                                    </li>
                                    <li>
                                        <a href="page_datatables_editable.html"><i class="fa fa-pencil"></i>Editable DataTables</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-leaf"></i>Components</a>
                                <ul>
                                    <li>
                                        <a href="page_animations.html"><i class="fa fa-certificate animation-pulse"></i>CSS3 Animations</a>
                                    </li>
                                    <li>
                                        <a href="page_gallery.html"><i class="fa fa-picture-o"></i>Gallery</a>
                                    </li>
                                    <li>
                                        <a href="page_inbox.html"><i class="fa fa-envelope"></i>Inbox</a>
                                    </li>
                                    <li>
                                        <a href="page_chatui.html"><i class="fa fa-comments"></i>ChatUI</a>
                                    </li>
                                    <li>
                                        <a href="page_charts.html"><i class="fa fa-bar-chart-o"></i>Charts</a>
                                    </li>
                                    <li>
                                        <a href="page_calendar.html"><i class="fa fa-calendar"></i>Calendar</a>
                                    </li>
                                    <li>
                                        <a href="page_maps.html"><i class="fa fa-map-marker"></i>Maps</a>
                                    </li>
                                    <li>
                                        <a href="page_syntax_highlighting.html"><i class="fa fa-flask"></i>Syntax Highlighting</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-tint"></i>Icons</a>
                                <ul>
                                    <li>
                                        <a href="page_glyphicons_pro.html"><i class="gi gi-heart"></i>Glyphicons Pro</a>
                                    </li>
                                    <li>
                                        <a href="page_fontawesome.html"><i class="fa fa-gift"></i>FontAwesome</a>
                                    </li>
                                    <li>
                                        <a href="page_gemicon.html"><i class="fa fa-smile-o"></i>Gemicon</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-file-o"></i>Pages</a>
                                <ul>
                                    <li>
                                        <a href="page_search_results.html"><i class="fa fa-search"></i>Search Results</a>
                                    </li>
                                    <li>
                                        <a href="page_price_tables.html"><i class="fa fa-ticket"></i>Price Tables</a>
                                    </li>
                                    <li>
                                        <a href="page_forum.html"><i class="fa fa-comment"></i>Forum</a>
                                    </li>
                                    <li>
                                        <a href="page_article.html"><i class="fa fa-pencil"></i>Article</a>
                                    </li>
                                    <li>
                                        <a href="page_invoice.html"><i class="fa fa-book"></i>Invoice</a>
                                    </li>
                                    <li>
                                        <a href="page_profile.html"><i class="fa fa-user"></i>Profile</a>
                                    </li>
                                    <li>
                                        <a href="page_faq.html"><i class="fa fa-flag"></i>FAQ</a>
                                    </li>
                                    <li>
                                        <a href="page_errors.html"><i class="fa fa-exclamation-triangle"></i>Errors</a>
                                    </li>
                                    <li>
                                        <a href="page_blank.html"><i class="fa fa-circle-o"></i>Blank</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="page_login.html"><i class="fa fa-power-off"></i>Login Page</a>
                            </li>
                            <li>
                                <a href="page_landing.html"><i class="fa fa-rocket"></i>Landing Page</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- END Primary Navigation -->

                    <!-- Demo Theme Options -->
                    <div id="theme-options" class="text-left visible-md visible-lg">
                        <a href="javascript:void(0)" class="btn btn-theme-options"><i class="fa fa-cog"></i> Theme Options</a>
                        <div id="theme-options-content">
                            <h5>Color Themes</h5>
                            <ul class="theme-colors clearfix">
                                <li class="active">
                                    <a href="javascript:void(0)" class="themed-background-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Default"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="themed-background-deepblue themed-border-deepblue" data-theme="css/themes/deepblue.css" data-toggle="tooltip" title="DeepBlue"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="themed-background-deepwood themed-border-deepwood" data-theme="css/themes/deepwood.css" data-toggle="tooltip" title="DeepWood"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="themed-background-deeppurple themed-border-deeppurple" data-theme="css/themes/deeppurple.css" data-toggle="tooltip" title="DeepPurple"></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="themed-background-deepgreen themed-border-deepgreen" data-theme="css/themes/deepgreen.css" data-toggle="tooltip" title="DeepGreen"></a>
                                </li>
                            </ul>
                            <h5>Header</h5>
                            <label id="topt-fixed-header-top" class="switch switch-success" data-toggle="tooltip" title="Top fixed header"><input type="checkbox"><span></span></label>
                            <label id="topt-fixed-header-bottom" class="switch switch-success" data-toggle="tooltip" title="Bottom fixed header"><input type="checkbox"><span></span></label>
                            <label id="topt-fixed-layout" class="switch switch-success" data-toggle="tooltip" title="Fixed layout (for large resolutions)"><input type="checkbox"><span></span></label>
                        </div>
                    </div>
                    <!-- END Demo Theme Options -->
                </aside>
                <!-- END Sidebar -->

                <!-- Page Content -->
                <div id="page-content">
                    <!-- Navigation info -->
                    <ul id="nav-info" class="clearfix">
                        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                        <li class="active"><a href="">Dashboard</a></li>
                    </ul>
                    <!-- END Navigation info -->

                   
                    <!-- Home -->
                       @yield('Dashboard')

                
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