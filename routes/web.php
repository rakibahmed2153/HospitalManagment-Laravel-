<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//HomePage
Route::get('/home/index', 'HomeController@index')->name('home.index');
Route::get('/home/appoint', 'HomeController@appoint')->name('home.appoint');
Route::post('/home/appoint', 'HomeController@create');
Route::get('/home/service', 'HomeController@service')->name('home.service');
Route::get('/home/about', 'HomeController@about')->name('home.about');
Route::get('/home/contact', 'HomeController@contact')->name('home.contact');
Route::post('/home/contact', 'HomeController@contactCreate');

//Login
Route::get('/login/index', 'LoginController@index')->name('login.index');
Route::post('/login/index', 'LoginController@valid');

//Logout
Route::get('/logout', 'LogoutController@index')->name('logout.index');

Route::group(['middleware'=>['sess']], function(){

//Admin Route Start

Route::get('/admin/index', 'AdminController@index')->name('admin.index');
//department

Route::get('/admin/Department', 'AdminController@adddepart')->name('admin.adddepart');
Route::post('/admin/Department', 'AdminController@deptCreate');

Route::get('/admin/EditDepartment/{sid}', 'AdminController@editdept')->name('admin.editdept');
Route::post('/admin/EditDepartment/{sid}', 'AdminController@editDepart');

Route::get('/admin/DepartmentDelete/{sid}', 'AdminController@deletedept')->name('admin.deletedept');
Route::post('/admin/DepartmentDelete/{sid}', 'AdminController@destroydept');

Route::get('/admin/DepartmentList', 'AdminController@deptlist')->name('admin.deptlist');
//Route::get('/admin/DepartmentList/action', 'AdminController@action')->name('admin.action');

//Docotor
Route::get('/admin/Doctor', 'AdminController@adddoctor')->name('admin.adddoctor');
Route::post('/admin/Doctor', 'AdminController@doctorCreate');

Route::get('/admin/EditDoctor/{sid}', 'AdminController@editdoct')->name('admin.editdoct');
Route::post('/admin/EditDoctor/{sid}', 'AdminController@editDoctor');

Route::get('/admin/DoctorDelete/{sid}', 'AdminController@deletedoct')->name('admin.deletedoct');
Route::post('/admin/DoctorDelete/{sid}', 'AdminController@destroydoct');

Route::get('/admin/DoctorList', 'AdminController@doctorlist')->name('admin.doctorlist');

//Nurse
Route::get('/admin/Nurse', 'AdminController@addnurse')->name('admin.addnurse');
Route::post('/admin/Nurse', 'AdminController@nurseCreate');

Route::get('/admin/EditNurse/{sid}', 'AdminController@editnur')->name('admin.editnur');
Route::post('/admin/EditNurse/{sid}', 'AdminController@editNurse');

Route::get('/admin/NurseDelete/{sid}', 'AdminController@deletenurse')->name('admin.deletenurse');
Route::post('/admin/NurseDelete/{sid}', 'AdminController@destroynurse');

Route::get('/admin/NurseList', 'AdminController@nurselist')->name('admin.nurselist');

//Admin
Route::get('/admin/Admin', 'AdminController@addadmin')->name('admin.addadmin');
Route::post('/admin/Admin', 'AdminController@adminCreate');

Route::get('/admin/EditAdmin/{sid}', 'AdminController@editadm')->name('admin.editadm');
Route::post('/admin/EditAdmin/{sid}', 'AdminController@editAdmin');

Route::get('/admin/AdminDelete/{sid}', 'AdminController@deleteadmin')->name('admin.deleteadmin');
Route::post('/admin/AdminDelete/{sid}', 'AdminController@destroyadmin');

Route::get('/admin/AdminList', 'AdminController@adminlist')->name('admin.adminlist');

//Patient
Route::get('/admin/Patient', 'AdminController@addpatient')->name('admin.addpatient');
Route::post('/admin/Patient', 'AdminController@patientCreate');

Route::get('/admin/PatientList', 'AdminController@patientlist')->name('admin.patientlist');

Route::get('/admin/EditPatient/{sid}', 'AdminController@editpact')->name('admin.editpatient');
Route::post('/admin/EditPatient/{sid}', 'AdminController@editPatient');

Route::get('/admin/PatientDelete/{sid}', 'AdminController@deletepatient')->name('admin.deletepatient');
Route::post('/admin/PatientDelete/{sid}', 'AdminController@destroypatient');

//NoticeBoard

Route::get('/admin/Noticeboard', 'AdminController@addnotice')->name('admin.addnotice');
Route::post('/admin/Noticeboard', 'AdminController@noticeCreate');

Route::get('/admin/EditNotice/{sid}', 'AdminController@editnote')->name('admin.editnote');
Route::post('/admin/EditNotice/{sid}', 'AdminController@editNotice');

Route::get('/admin/NoticeDelete/{sid}', 'AdminController@deletenotice')->name('admin.deletenotice');
Route::post('/admin/NoticeDelete/{sid}', 'AdminController@destroynotice');

Route::get('/admin/NoticeboardList', 'AdminController@noticelist')->name('admin.noticelist');

//Service
Route::get('/admin/Service', 'AdminController@addservice')->name('admin.addservice');
Route::post('/admin/Service', 'AdminController@serviceCreate');

Route::get('/admin/EditService/{sid}', 'AdminController@editser')->name('admin.editser');
Route::post('/admin/EditService/{sid}', 'AdminController@editService');

Route::get('/admin/ServiceDelete/{sid}', 'AdminController@deleteservice')->name('admin.deleteservice');
Route::post('/admin/ServiceDelete/{sid}', 'AdminController@destroyservice');

Route::get('/admin/ServiceList', 'AdminController@servicelist')->name('admin.servicelist');

//Profile
Route::get('/admin/Profile', 'AdminController@profile')->name('admin.profile');
Route::post('/admin/Profile', 'AdminController@editProfile');


//Change Password
Route::get('/admin/ChangePassword', 'AdminController@cngpassword')->name('admin.cngpassword');
Route::post('/admin/ChangePassword', 'AdminController@Password');

//Appointment Request
Route::get('/admin/AppointRequest', 'AdminController@appointreq')->name('admin.appointreq');
Route::post('/admin/AppointRequest', 'AdminController@valid');
Route::get('/admin/AppointRequest/{sid}', 'AdminController@deleteappoint')->name('admin.deleteappoint');

//Contacts
Route::get('/admin/Inbox','AdminController@inbox')->name('admin.inbox');
Route::get('/admin/Inbox/{sid}', 'AdminController@deleteinbox')->name('admin.deleteinbox');

//Admin Route Ends

//Doctor Route Start

Route::get('/doctor/index', 'DoctorController@index')->name('doctor.index');

//Patient
Route::get('/doctor/Patient', 'DoctorController@addpatient')->name('doctor.addpatient');
Route::post('/doctor/Patient', 'DoctorController@patientCreate');

Route::get('/doctor/PatientList', 'DoctorController@patientlist')->name('doctor.patientlist');

Route::get('/doctor/EditPatient/{sid}', 'DoctorController@editpact')->name('doctor.editpatient');
Route::post('/doctor/EditPatient/{sid}', 'DoctorController@editPatient');

Route::get('/doctor/PatientDelete/{sid}', 'DoctorController@deletepatient')->name('doctor.deletepatient');
Route::post('/doctor/PatientDelete/{sid}', 'DoctorController@destroypatient');

//Appoint
Route::get('/doctor/AppointList', 'DoctorController@viewappoint')->name('doctor.viewappoint');

//Profile
Route::get('/doctor/Profile', 'DoctorController@profile')->name('doctor.profile');
Route::post('/doctor/Profile', 'DoctorController@editProfile');

//Change Password
Route::get('/doctor/ChangePassword', 'DoctorController@cngpassword')->name('doctor.cngpassword');
Route::post('/doctor/ChangePassword', 'DoctorController@Password');

//NoticeBoard
Route::get('/doctor/NoticeboardList', 'DoctorController@noticelist')->name('doctor.noticelist');

//Blood
Route::get('/doctor/BloodList', 'DoctorController@bloodlist')->name('doctor.bloodlist');

//Prescription
Route::get('/doctor/Prescription', 'DoctorController@addprescription')->name('doctor.addprescription');
Route::post('/doctor/Prescription', 'DoctorController@prescriptionCreate');

Route::get('/doctor/PrescriptionList', 'DoctorController@prescriptionlist')->name('doctor.prescriptionlist');

Route::get('/doctor/EditPrescription/{sid}', 'DoctorController@editprescription')->name('doctor.editprescription');
Route::post('/doctor/EditPrescription/{sid}', 'DoctorController@editPrescrip');

Route::get('/doctor/PrescriptionDelete/{sid}', 'DoctorController@deleteprescription')->name('doctor.deleteprescription');
Route::post('/doctor/PrescriptionDelete/{sid}', 'DoctorController@destroyprescription');

//Bed Allotment
Route::get('/doctor/BedAllotment', 'DoctorController@addbed')->name('doctor.addbed');
Route::post('/doctor/BedAllotment', 'DoctorController@bedCreate');

Route::get('/doctor/BedAllotmentList', 'DoctorController@bedlist')->name('doctor.bedlist');

Route::get('/doctor/EditBedAllotment/{sid}', 'DoctorController@editbed')->name('doctor.editbed');
Route::post('/doctor/EditBedAllotment/{sid}', 'DoctorController@editBedAllot');

Route::get('/doctor/BedAllotmentDelete/{sid}', 'DoctorController@deletebed')->name('doctor.deletebed');
Route::post('/doctor/BedAllotmentDelete/{sid}', 'DoctorController@destroybed');

//Operation Report
Route::get('/doctor/OperationReport', 'DoctorController@addoperation')->name('doctor.addoperation');
Route::post('/doctor/OperationReport', 'DoctorController@operationCreate');

Route::get('/doctor/OperationReportList', 'DoctorController@operationlist')->name('doctor.operationlist');

Route::get('/doctor/EditOperationReport/{sid}', 'DoctorController@editoperation')->name('doctor.editoperation');
Route::post('/doctor/EditOperationReport/{sid}', 'DoctorController@editReport');

Route::get('/doctor/OperationReportDelete/{sid}', 'DoctorController@deleteoperation')->name('doctor.deleteoperation');
Route::post('/doctor/OperationReportDelete/{sid}', 'DoctorController@destroyoperation');

//Doctor Route Ends

//Nurse Route Starts

Route::get('/nurse/index', 'NurseController@index')->name('nurse.index');

//Patient
Route::get('/nurse/Patient', 'NurseController@addpatient')->name('nurse.addpatient');
Route::post('/nurse/Patient', 'NurseController@patientCreate');

Route::get('/nurse/PatientList', 'NurseController@patientlist')->name('nurse.patientlist');

Route::get('/nurse/EditPatient/{sid}', 'NurseController@editpact')->name('nurse.editpatient');
Route::post('/nurse/EditPatient/{sid}', 'NurseController@editPatient');

Route::get('/nurse/PatientDelete/{sid}', 'NurseController@deletepatient')->name('nurse.deletepatient');
Route::post('/nurse/PatientDelete/{sid}', 'NurseController@destroypatient');

//Bed Allotment
Route::get('/nurse/BedAllotment', 'NurseController@addbed')->name('nurse.addbed');
Route::post('/nurse/BedAllotment', 'NurseController@bedCreate');

Route::get('/nurse/BedAllotmentList', 'NurseController@bedlist')->name('nurse.bedlist');

Route::get('/nurse/EditBedAllotment/{sid}', 'NurseController@editbed')->name('nurse.editbed');
Route::post('/nurse/EditBedAllotment/{sid}', 'NurseController@editBedAllot');

Route::get('/nurse/BedAllotmentDelete/{sid}', 'NurseController@deletebed')->name('nurse.deletebed');
Route::post('/nurse/BedAllotmentDelete/{sid}', 'NurseController@destroybed');

//Blood
Route::get('/nurse/BloodList', 'NurseController@bloodlist')->name('nurse.bloodlist');

Route::get('/nurse/BloodBank', 'NurseController@addblood')->name('nurse.addblood');
Route::post('/nurse/BloodBank', 'NurseController@bloodCreate');

Route::get('/nurse/EditBloodBank/{sid}', 'NurseController@editblood')->name('nurse.editblood');
Route::post('/nurse/EditBloodBank/{sid}', 'NurseController@editBloodBank');

Route::get('/nurse/DeleteBloodBank/{sid}', 'NurseController@deleteblood')->name('nurse.deleteblood');
Route::post('/nurse/DeleteBloodBank/{sid}', 'NurseController@destroyblood');

//NoticeBoard
Route::get('/nurse/NoticeboardList', 'NurseController@noticelist')->name('nurse.noticelist');

//Operation Report
Route::get('/nurse/OperationReportList', 'NurseController@operationlist')->name('nurse.operationlist');

//prescription
Route::get('/nurse/PrescriptionList', 'NurseController@prescriptionlist')->name('nurse.prescriptionlist');

//Profile
Route::get('/nurse/Profile', 'NurseController@profile')->name('nurse.profile');
Route::post('/nurse/Profile', 'NurseController@editProfile');

//Change Password
Route::get('/nurse/ChangePassword', 'NurseController@cngpassword')->name('nurse.cngpassword');
Route::post('/nurse/ChangePassword', 'NurseController@Password');

//Appointment Request
Route::get('/nurse/AppointRequest', 'NurseController@appointreq')->name('nurse.appointreq');
Route::post('/nurse/AppointRequest', 'NurseController@valid');
Route::get('/nurse/AppointRequest/{sid}', 'NurseController@deleteappoint')->name('nurse.deleteappoint');

//Nurse Route Ends

//Patient Route Starts
 Route::get('/patient/index', 'PatientController@index')->name('patient.index');

//NoticeBoard
Route::get('/patient/NoticeboardList', 'PatientController@noticelist')->name('patient.noticelist');

//Operation Report
Route::get('/patient/OperationReportList', 'PatientController@operationlist')->name('patient.operationlist');

//prescription
Route::get('/patient/PrescriptionList', 'PatientController@prescriptionlist')->name('patient.prescriptionlist');

//BedAllotment
Route::get('/patient/BedAllotmentList', 'PatientController@bedlist')->name('patient.bedlist');

//Blood
Route::get('/patient/BloodList', 'PatientController@bloodlist')->name('patient.bloodlist');

//Doctor
Route::get('/patient/DoctorList', 'PatientController@doctorlist')->name('patient.doctorlist');

//Nurse
Route::get('/patient/NurseList', 'PatientController@nurselist')->name('patient.nurselist');

//Profile
Route::get('/patient/Profile', 'PatientController@profile')->name('patient.profile');
Route::post('/patient/Profile', 'PatientController@editProfile');

//Change Password
Route::get('/patient/ChangePassword', 'PatientController@cngpassword')->name('patient.cngpassword');
Route::post('/patient/ChangePassword', 'PatientController@Password');

//Patient Route Ends

});



