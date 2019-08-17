@extends('doctor.layout.main')

@section('Active')
  Dashboard
@endsection


@section('Name')
   Dashboard
@endsection

@section('Iteams')
               


<!-- Tiles -->
                    <!-- Row 1 -->
                    <div class="dash-tiles row">
                        <!-- Column 1 of Row 1 -->
                        <div class="col-sm-3">
                            <!-- Total Doctor Tile -->
                            
                            <div class="dash-tile dash-tile-ocean clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <div class="btn-group">
                                            <a href="{{route('doctor.addpatient')}}" class="btn btn-default" data-toggle="tooltip" title="Add Patient"><i class="fa fa-cog"></i></a>
                                            <a href="{{route('doctor.patientlist')}}" class="btn btn-default" data-toggle="tooltip" title="Patient List"><i class="fa fa-th"></i></a>
                                        </div>
                                    </div>
                                    Patients
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text">{{$pat}}</div>
                            </div>
                            <!-- END Doctor Tile -->

                            <!-- Total Nurse Tile -->
                            <div class="dash-tile dash-tile-leaf clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <span class="dash-tile-options">
                                        <a href="{{route('doctor.addbed')}}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-content="$500 (230 Sales)" title="Add Bed"><i class="fa fa-cog"></i></a>
                                        <a href="{{route('doctor.bedlist')}}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-content="$500 (230 Sales)" title="BedAllotment List"><i class="fa fa-th"></i></a>
                                    </span>
                                    Bed Allotment
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text">{{$bed}}</div>
                            </div>
                            <!-- END Total Nurse Tile -->

                            <!-- Total Nurse Tile -->
                            <div class="dash-tile dash-tile-leaf clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <span class="dash-tile-options">
                                        <a href="{{route('doctor.addprescription')}}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-content="$500 (230 Sales)" title="Add Prescription"><i class="fa fa-cog"></i></a>
                                        <a href="{{route('doctor.prescriptionlist')}}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-content="$500 (230 Sales)" title="Prescription List"><i class="fa fa-th"></i></a>
                                    </span>
                                    Prescription
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text">{{$pres}}</div>
                            </div>
                            <!-- END Total Nurse Tile -->
                        </div>
                        <!-- END Column 1 of Row 1 -->

                        <!-- Column 2 of Row 1 -->
                        <div class="col-sm-3">
                            <!-- Patient Tile -->
                            <div class="dash-tile dash-tile-flower clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <div class="btn-group">
                                            <a href="{{route('doctor.viewappoint')}}" class="btn btn-default" data-toggle="tooltip" title="Patient List"><i class="fa fa-th"></i></a>
                                        </div>
                                    </div>
                                    Appointment
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text">{{$ser}}</div>
                            </div>
                            <!-- END Patient Tile -->

                            <!-- Notice Board Tile -->
                            <div class="dash-tile dash-tile-fruit clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="{{route('doctor.noticelist')}}" class="btn btn-default" data-toggle="tooltip" title="NoticeBoard List"><i class="fa fa-th"></i></a>
                                    </div>
                                    NoticeBoard
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-cloud-download"></i></div>
                                <div class="dash-tile-text">{{$note}}</div>
                            </div>
                            <!-- END Notice Board Tile -->
                        </div>
                        <!-- END Column 2 of Row 1 -->

                        <!-- Column 3 of Row 1 -->
                        <div class="col-sm-3">
                            <!-- Department Tile -->
                            <div class="dash-tile dash-tile-oil clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <div class="btn-group">
                                            <a href="{{route('doctor.bloodlist')}}" class="btn btn-default" data-toggle="tooltip" title="Blood List"><i class="fa fa-th"></i></a>
                                        </div>
                                    </div>
                                    BloodBank
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-hdd-o"></i></div>
                                <div class="dash-tile-text">{{$blood}}</div>
                            </div>
                            <!-- END Department Tile -->

                            <!-- Manage profile Tile -->
                            <div class="dash-tile dash-tile-dark clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="{{route('doctor.profile')}}" class="btn btn-default" data-toggle="tooltip" title="Profile"><i class="fa fa-th"></i></a>
                                    </div>
                                    Manage Profile
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-hdd-o"></i></div>
                                <div class="dash-tile-text">Profile</div>
                            </div>
                            <!-- END Manage profile Tile -->
                        </div>
                        <!-- END Column 3 of Row 1 -->

                        <!-- Column 4 of Row 1 -->
                        <div class="col-sm-3">
                            <!-- Admin Tile -->
                            <div class="dash-tile dash-tile-balloon clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="{{route('doctor.addoperation')}}" class="btn btn-default" data-toggle="tooltip" title="Add OperationReport"><i class="fa fa-cog"></i></a>
                                        <a href="{{route('doctor.operationlist')}}" class="btn btn-default" data-toggle="tooltip" title="OperationReport List"><i class="fa fa-th"></i></a>
                                    </div>
                                    Operation
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                                <div class="dash-tile-text">{{$report}}</div>
                            </div>
                            <!-- END Admin Tile -->

                             

                            <!-- Change Password Tile -->
                            <div class="dash-tile dash-tile-doll clearfix animation-pullDown">
                                <div class="dash-tile-header">
                                    <div class="dash-tile-options">
                                        <a href="{{route('doctor.cngpassword')}}" class="btn btn-default" data-toggle="tooltip" title="Change Password"><i class="fa fa-wrench"></i></a>
                                    </div>
                                    Change Password
                                </div>
                                <div class="dash-tile-icon"><i class="fa fa-wrench"></i></div>
                                <div class="dash-tile-text">Password</div>
                            </div>
                            <!-- END Change Password Tile -->
                        </div>
                        <!-- END Column 4 of Row 1 -->
                    </div>
                    <!-- END Row 1 -->

                   
                    
@endsection