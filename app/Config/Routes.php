<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Enable Auto Routing for compatibility
$routes->setAutoRoute(true);

// Default Route
$routes->get('/', 'Loginpage::index');
$routes->add('login', 'Loginpage::login'); // Changed to add to match get/post if needed, or keep post. keeping post is fine but user had login redirect issues before.
$routes->get('logout', 'AdminDashboard::logout');


// Terms and Policy
$routes->get('terms-and-conditions', 'Loginpage::terms_and_conditions');
$routes->get('privacy-policy', 'Loginpage::privacy_policy');

// Dashboard Menus (Explicit to prevent 404/Object issues)
$routes->get('dashboard/sidemenu', 'Dashboard::sidemenu');
$routes->get('dashboard/topmenu', 'Dashboard::topmenu');
$routes->get('dashboard/pslogo', 'Dashboard::pslogo');

// Admin Dashboard Routes
$routes->get('admindashboard', 'AdminDashboard::index');
$routes->get('admindashboard/getmanager', 'AdminDashboard::getmanager'); // For Update Manager Modal
$routes->post('admindashboard/updateManager', 'AdminDashboard::updateManager'); // For Manager Update Submit
$routes->get('viewreceivedapplications', 'AdminDashboard::viewReceivedapplications');
$routes->get('changeapplicationspagesetup', 'AdminDashboard::changeapplicationspagesetup');
$routes->post('assignCoordinatorsfortaluk', 'AdminDashboard::assignCoordinatorsfortaluk');
$routes->post('approvemember', 'AdminDashboard::approveMember');
$routes->post('rejectmember', 'AdminDashboard::rejectMember');
$routes->get('assigncoordinator', 'AdminDashboard::assignCoordinator');
$routes->match(['get', 'post'], 'getOverallstatus', 'AdminDashboard::getOverallstatus');
$routes->match(['get', 'post'], 'register_manager', 'AdminDashboard::register_manager');
$routes->match(['get', 'post'], 'change_password', 'AdminDashboard::change_password');
$routes->get('viewManagerdata', 'AdminDashboard::viewManagerdata');

// AdminDashboard AJAX & Form Routes
$routes->post('AdminDashboard/checkExistvillage', 'AdminDashboard::checkExistvillage');
$routes->post('AdminDashboard/getOverallstatus', 'AdminDashboard::getOverallstatus'); // Explicit route for consistency
$routes->get('AdminDashboard/getDistrictsfordropdown', 'AdminDashboard::getDistrictsfordropdown');
$routes->post('AdminDashboard/getTaluksfordropdown', 'AdminDashboard::getTaluksfordropdown');
$routes->post('AdminDashboard/getPanchayatsfordropdown', 'AdminDashboard::getPanchayatsfordropdown');
$routes->post('AdminDashboard/getVillagesfordropdown', 'AdminDashboard::getVillagesfordropdown');
$routes->post('AdminDashboard/checkExistphoneno', 'Members::checkExistphoneno');
$routes->post('AdminDashboard/checkExistaadharno', 'Members::checkExistaadharno');
$routes->get('AdminDashboard/getMembersforassign', 'AdminDashboard::getMembersforassign');
$routes->post('AdminDashboard/reassignCoordinator', 'AdminDashboard::reassignCoordinator');
$routes->post('AdminDashboard/addVillage', 'AdminDashboard::addVillage');
$routes->post('AdminDashboard/removeVillage', 'AdminDashboard::removeVillage');

// Member Update Requests (Admin)
$routes->get('viewMemberUpdateRequests', 'AdminDashboard::viewMemberUpdateRequests');
$routes->post('approveMemberUpdate', 'AdminDashboard::approveMemberUpdate');
$routes->post('rejectMemberUpdate', 'AdminDashboard::rejectMemberUpdate');

// Coordinators Routes
$routes->get('coordinators', 'Coordinators::index');
$routes->post('coordinators/getpendingamount', 'Coordinators::getpendingamount'); // Explicit for AJAX
$routes->post('updateCoordinator', 'Coordinators::updateCoordinator');
$routes->get('coordinators/getcoordinator', 'Coordinators::getcoordinator'); 
$routes->post('coordinators/viewMemberdata', 'Coordinators::viewMemberdata');
$routes->get('viewCoordinatordata', 'Coordinators::viewCoordinatordata');
$routes->match(['get', 'post'], 'eventParticipation', 'Coordinators::eventParticipation');
$routes->get('viewundermembers', 'Coordinators::viewUnderMembers');
$routes->post('registerCoordinator', 'Coordinators::addcoordinator'); 
$routes->get('changecoordinatorspagesetup', 'Coordinators::changecoordinatorspagesetup');
$routes->get('changeviewcoordinatorspagesetup', 'Coordinators::changeViewcoordinatorspagesetup');
$routes->match(['get', 'post'], 'coordinators/trash/(:any)', 'Coordinators::movetotrash/$1');
$routes->get('coordinators/searchcoordinators', 'Coordinators::searchcoordinators');
$routes->get('coordinators/sidemenu', 'Coordinators::sidemenu');
$routes->get('coordinators/topmenu', 'Coordinators::topmenu');
$routes->get('coordinators/pslogo', 'Coordinators::pslogo');
$routes->get('coordinators/topsubmenu', 'Coordinators::topsubmenu');
$routes->get('coordinators/getDistrictsfordropdown', 'Members::getDistrictsfordropdown');
$routes->get('coordinators/getTaluksfordropdown', 'Members::getTaluksfordropdown');
$routes->get('coordinators/getPanchayatsfordropdown', 'Members::getPanchayatsfordropdown');
$routes->post('coordinators/checkExistphoneno', 'Members::checkExistphoneno');
$routes->post('coordinators/checkExistaadharno', 'Members::checkExistaadharno');


// Members Routes
$routes->get('members', 'Members::index');
$routes->get('add_family_member', 'Members::add_family_member');
$routes->post('addFamilyMember', 'Members::addFamilyMember'); 
$routes->post('updateMember', 'Members::updateMember');
$routes->post('members/addFamilyMember', 'Members::addFamilyMember');
$routes->post('members/updateMember', 'Members::updateMember');
$routes->post('admindashboard/updateManager', 'AdminDashboard::updateManager');
$routes->get('viewMemberdata', 'Members::viewMemberdata');
$routes->get('changememberspagesetup', 'Members::changememberspagesetup');
$routes->get('registrationform', 'Members::Registrationform');
$routes->get('members/registrationform', 'Members::Registrationform');
$routes->post('registerMember', 'Members::registerMember'); 
$routes->match(['get', 'post'], 'members/trash/(:any)', 'Members::movetotrash/$1');
$routes->get('download_members_details', 'ReportingController::download_members_data');
$routes->get('members/getDistrictsfordropdown', 'Members::getDistrictsfordropdown');
$routes->get('members/getTaluksfordropdown', 'Members::getTaluksfordropdown');
$routes->get('members/getPanchayatsfordropdown', 'Members::getPanchayatsfordropdown');
$routes->get('members/getVillagesfordropdown', 'Members::getVillagesfordropdown');
$routes->post('members/checkExistphoneno', 'Members::checkExistphoneno');
$routes->post('members/checkExistaadharno', 'Members::checkExistaadharno');
$routes->get('members/getmember', 'Members::getmember');
$routes->get('members/sidemenu', 'Members::sidemenu');
$routes->get('members/topmenu', 'Members::topmenu');
$routes->get('members/pslogo', 'Members::pslogo');
$routes->get('members/topsubmenu', 'Members::topsubmenu');

// Events Routes
$routes->get('events', 'Events::index');
$routes->get('changeEventspagesetup', 'Events::changeEventspagesetup');
$routes->match(['get', 'post'], 'events/trash/(:any)', 'Events::movetotrash/$1');
$routes->get('events/sidemenu', 'Events::sidemenu');
$routes->get('events/topmenu', 'Events::topmenu');
$routes->get('events/pslogo', 'Events::pslogo');

// Reports Routes
$routes->get('reports', 'Reports::index');
$routes->get('changeReportspagesetup', 'Reports::changeReportspagesetup');
$routes->get('reportFilterPage', 'Reports::reportFilterlist');
$routes->get('changeFilteredreportspagesetup', 'Reports::changeFilteredreportspagesetup');
$routes->get('reports/sidemenu', 'Reports::sidemenu');
$routes->get('reports/topmenu', 'Reports::topmenu');
$routes->get('reports/pslogo', 'Reports::pslogo');

// Payments Routes
$routes->get('paymentpage', 'Payments::index');
$routes->get('payments', 'Payments::index'); 
$routes->get('payments/sidemenu', 'Payments::sidemenu');
$routes->get('payments/topmenu', 'Payments::topmenu');
$routes->get('payments/pslogo', 'Payments::pslogo');
$routes->get('gopaymentpage', 'Payments::gopaymentpage');
$routes->get('paymentreceiptpdf', 'Payments::paymentReceiptpdf');
$routes->get('paymentReceiptlist', 'Payments::paymentReceiptlist');
$routes->get('downloadpdf', 'Payments::downloadPdf');
$routes->post('saveTaxreceiptforfiltereduserform', 'Payments::saveTaxreceipt'); 
$routes->get('changepaymentpagepagesetup', 'Payments::changepaymentpagepagesetup');
$routes->post('uploadBulkPayments', 'Payments::uploadBulkPayments');

// Payments Filter Routes
$routes->get('filteredusers', 'PaymentsFilter::index');
$routes->match(['get', 'post'], 'getFilteredusers', 'PaymentsFilter::getFilteredusers');
$routes->get('filteredUserpaymentform', 'PaymentsFilter::filteredUserpaymentform');
$routes->get('changefiltereduserspagesetup', 'PaymentsFilter::changefiltereduserspagesetup');

// Export & Reporting Routes
$routes->get('excel', 'PaidUnpaidController::excel');
$routes->get('download_members_data', 'ReportingController::download_members_data');
$routes->get('download_excel', 'ReportingController::download_excel');

// Bulk Upload
$routes->get('bulk_upload', 'Bulk_upload::index');
