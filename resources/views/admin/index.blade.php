@extends('admin.layout.main')



@section('Dashboard')

<!-- Tiles -->
                    <!-- Row 1 -->
                    <div class="dash-tiles row">
                        <!-- Column 1 of Row 1 -->
                        <div class="col-sm-3">
                            <!-- Total Users Tile -->
                            <div class="dash-tile dash-tile-ocean clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Manage Users"><i class="fa fa-cog"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Statistics"><i class="fa fa-bar-chart-o"></i></a>
                                        </div>
                                    </div>
                                    Total Users
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text">265k</div>
                            </div>
                            <!-- END Total Users Tile -->

                            <!-- Total Profit Tile -->
                            <div class="dash-tile dash-tile-leaf clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <span class="dash-tile-options">
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="popover" data-placement="top" data-content="$500 (230 Sales)" title="Today's profit"><i class="fa fa-credit-card"></i></a>
                                    </span>
                                    Total Profit
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-money"></i></div>
                                <div class="dash-tile-text">$5M</div>
                            </div>
                            <!-- END Total Profit Tile -->
                        </div>
                        <!-- END Column 1 of Row 1 -->

                        <!-- Column 2 of Row 1 -->
                        <div class="col-sm-3">
                            <!-- Total Sales Tile -->
                            <div class="dash-tile dash-tile-flower clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="View new orders"><i class="fa fa-shopping-cart"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Statistics"><i class="fa fa-bar-chart-o"></i></a>
                                        </div>
                                    </div>
                                    Total Sales
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-tags"></i></div>
                                <div class="dash-tile-text">300k</div>
                            </div>
                            <!-- END Total Sales Tile -->

                            <!-- Total Downloads Tile -->
                            <div class="dash-tile dash-tile-fruit clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="View popular downloads"><i class="fa fa-asterisk"></i></a>
                                    </div>
                                    Total Downloads
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-cloud-download"></i></div>
                                <div class="dash-tile-text">360k</div>
                            </div>
                            <!-- END Total Downloads Tile -->
                        </div>
                        <!-- END Column 2 of Row 1 -->

                        <!-- Column 3 of Row 1 -->
                        <div class="col-sm-3">
                            <!-- Popularity Tile -->
                            <div class="dash-tile dash-tile-oil clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="What's changed?"><i class="fa fa-fire"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Share"><i class="fa fa-share-square-o"></i></a>
                                        </div>
                                    </div>
                                    Popularity
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-globe"></i></div>
                                <div class="dash-tile-text">+90%</div>
                            </div>
                            <!-- END Popularity Tile -->

                            <!-- Server Downtime Tile -->
                            <div class="dash-tile dash-tile-dark clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Monthly report"><i class="fa fa-bar-chart-o"></i></a>
                                    </div>
                                    Server Downtime
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-hdd-o"></i></div>
                                <div class="dash-tile-text">0.1%</div>
                            </div>
                            <!-- END Server Downtime Tile -->
                        </div>
                        <!-- END Column 3 of Row 1 -->

                        <!-- Column 4 of Row 1 -->
                        <div class="col-sm-3">
                            <!-- RSS Subscribers Tile -->
                            <div class="dash-tile dash-tile-balloon clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Manage subscribers"><i class="fa fa-cog"></i></a>
                                    </div>
                                    RSS Subscribers
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-rss"></i></div>
                                <div class="dash-tile-text">160k</div>
                            </div>
                            <!-- END RSS Subscribers Tile -->

                            <!-- Total Tickets Tile -->
                            <div class="dash-tile dash-tile-doll clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Open tickets"><i class="fa fa-file-o"></i></a>
                                    </div>
                                    Total Tickets
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-wrench"></i></div>
                                <div class="dash-tile-text">1.5k</div>
                            </div>
                            <!-- END Total Tickets Tile -->
                        </div>
                        <!-- END Column 4 of Row 1 -->
                    </div>
                    <!-- END Row 1 -->

                   
                    
@endsection