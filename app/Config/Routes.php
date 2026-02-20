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

// Forgot Password Routes
$routes->get('forgot-password', 'Loginpage::forgot_password');
$routes->post('send-otp', 'Loginpage::send_otp');
$routes->get('verify-otp', 'Loginpage::verify_otp_view');
$routes->post('verify-otp', 'Loginpage::verify_otp');
$routes->get('reset-password', 'Loginpage::reset_password_view');
$routes->post('update-password', 'Loginpage::update_password');

// Dashboard Menus (Explicit to prevent 404/Object issues)
$routes->get('dashboard/sidemenu', 'Dashboard::sidemenu');
$routes->get('dashboard/topmenu', 'Dashboard::topmenu');
$routes->get('dashboard/pslogo', 'Dashboard::pslogo');

// Admin Dashboard Routes
$routes->get('admindashboard', 'AdminDashboard::index');
$routes->get('admindashboard/getmanager', 'AdminDashboard::getmanager'); // For Update Manager Modal
$routes->post('admindashboard/update-manager', 'AdminDashboard::updateManager'); // For Manager Update Submit
$routes->get('viewreceivedapplications', 'AdminDashboard::viewReceivedapplications');
$routes->get('changeapplicationspagesetup', 'AdminDashboard::changeapplicationspagesetup');
$routes->post('assign-coordinators-for-taluk', 'AdminDashboard::assignCoordinatorsfortaluk');
$routes->get('assignCoordinatorsfortaluk', 'AdminDashboard::assignCoordinator'); // Redirect or show form on GET
$routes->post('assignCoordinatorsfortaluk', 'AdminDashboard::assignCoordinatorsfortaluk');
$routes->post('approvemember', 'AdminDashboard::approveMember');
$routes->post('rejectmember', 'AdminDashboard::rejectMember');
$routes->get('assigncoordinator', 'AdminDashboard::assignCoordinator');
$routes->match(['get', 'post'], 'get-overall-status', 'AdminDashboard::getOverallstatus');
$routes->match(['get', 'post'], 'register_manager', 'AdminDashboard::register_manager');
$routes->match(['get', 'post'], 'change_password', 'AdminDashboard::change_password');
$routes->get('view-manager-data', 'AdminDashboard::viewManagerdata');

// AdminDashboard AJAX & Form Routes
$routes->post('AdminDashboard/check-exist-village', 'AdminDashboard::checkExistvillage');
$routes->post('AdminDashboard/checkExistvillage', 'AdminDashboard::checkExistvillage');
$routes->post('AdminDashboard/get-overall-status', 'AdminDashboard::getOverallstatus'); 
$routes->post('AdminDashboard/getOverallstatus', 'AdminDashboard::getOverallstatus'); 
$routes->get('AdminDashboard/get-districts-for-dropdown', 'AdminDashboard::getDistrictsfordropdown');
$routes->get('AdminDashboard/getDistrictsfordropdown', 'AdminDashboard::getDistrictsfordropdown');
$routes->post('AdminDashboard/get-taluks-for-dropdown', 'AdminDashboard::getTaluksfordropdown');
$routes->post('AdminDashboard/getTaluksfordropdown', 'AdminDashboard::getTaluksfordropdown');
$routes->post('AdminDashboard/get-panchayats-for-dropdown', 'AdminDashboard::getPanchayatsfordropdown');
$routes->post('AdminDashboard/getPanchayatsfordropdown', 'AdminDashboard::getPanchayatsfordropdown');
$routes->post('AdminDashboard/get-villages-for-dropdown', 'AdminDashboard::getVillagesfordropdown');
$routes->post('AdminDashboard/getVillagesfordropdown', 'AdminDashboard::getVillagesfordropdown');
$routes->post('AdminDashboard/check-exist-phoneno', 'Members::checkExistphoneno');
$routes->post('AdminDashboard/check-exist-aadharno', 'Members::checkExistaadharno');
$routes->get('AdminDashboard/get-members-for-assign', 'AdminDashboard::getMembersforassign');
$routes->get('AdminDashboard/getMembersforassign', 'AdminDashboard::getMembersforassign');
$routes->post('AdminDashboard/reassign-coordinator', 'AdminDashboard::reassignCoordinator');
$routes->post('AdminDashboard/reassignCoordinator', 'AdminDashboard::reassignCoordinator');
$routes->post('AdminDashboard/add-village', 'AdminDashboard::addVillage');
$routes->post('AdminDashboard/addVillage', 'AdminDashboard::addVillage');
$routes->post('AdminDashboard/remove-village', 'AdminDashboard::removeVillage');
$routes->post('AdminDashboard/removeVillage', 'AdminDashboard::removeVillage');

// Member Update Requests (Admin)
$routes->get('view-member-update-requests', 'AdminDashboard::viewMemberUpdateRequests');
$routes->post('approve-member-update', 'AdminDashboard::approveMemberUpdate');
$routes->post('reject-member-update', 'AdminDashboard::rejectMemberUpdate');

// Coordinators Routes
$routes->get('coordinators', 'Coordinators::index');
$routes->post('coordinators/getpendingamount', 'Coordinators::getpendingamount'); // Explicit for AJAX
$routes->post('update-coordinator', 'Coordinators::updateCoordinator');
$routes->get('coordinators/getcoordinator', 'Coordinators::getcoordinator'); 
$routes->post('coordinators/view-member-data', 'Coordinators::viewMemberdata');
$routes->get('view-coordinator-data', 'Coordinators::viewCoordinatordata');
$routes->match(['get', 'post'], 'event-participation', 'Coordinators::eventParticipation');
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
$routes->get('coordinators/getVillagesfordropdown', 'Members::getVillagesfordropdown');
$routes->post('coordinators/checkExistphoneno', 'Members::checkExistphoneno');
$routes->post('coordinators/checkExistaadharno', 'Members::checkExistaadharno');


// Members Routes
$routes->get('members', 'Members::index');
$routes->get('add_family_member', 'Members::add_family_member');
$routes->post('add-family-member', 'Members::addFamilyMember'); 
$routes->post('update-member', 'Members::updateMember');
$routes->post('members/addFamilyMember', 'Members::addFamilyMember');
$routes->post('members/updateMember', 'Members::updateMember');
$routes->post('admindashboard/updateManager', 'AdminDashboard::updateManager');
$routes->get('view-manager-data', 'AdminDashboard::viewManagerdata');
$routes->get('view-member-data', 'Members::viewMemberdata');
$routes->get('changememberspagesetup', 'Members::changememberspagesetup');
$routes->get('registrationform', 'Members::Registrationform');
$routes->get('members/registrationform', 'Members::Registrationform');
$routes->post('registerMember', 'Members::registerMember'); 
$routes->match(['get', 'post'], 'members/trash/(:any)', 'Members::movetotrash/$1');
$routes->get('members/get-events-by-year', 'Members::getEventsByYear');
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
$routes->get('members/searchmembers', 'Members::searchmembers');

$routes->get('members/searchmembers', 'Members::searchmembers');
$routes->post('members/send-registration-otp', 'Members::send_registration_otp');
$routes->post('members/verify-registration-otp', 'Members::verify_registration_otp');

// Events Routes
$routes->get('events', 'Events::index');
$routes->get('changeEventspagesetup', 'Events::changeEventspagesetup');
$routes->post('events/addevent', 'Events::addevent'); // Fix for 404 on Add Event
$routes->get('events/getevent', 'Events::getevent'); // For AJAX modal content
$routes->post('events/updateevent', 'Events::updateevent');
$routes->get('events/showupdateeventbanner', 'Events::showupdateeventbanner');
$routes->post('events/updateeventbanner', 'Events::updateeventbanner');
$routes->match(['get', 'post'], 'events/trash/(:any)', 'Events::movetotrash/$1');
$routes->get('events/movetotrash', 'Events::movetotrash'); // For AJAX trash call
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
$routes->get('payment-receipt-list', 'Payments::paymentReceiptlist');
$routes->get('downloadpdf', 'Payments::downloadPdf');
$routes->get('downloadpdf', 'Payments::downloadPdf');
$routes->post('saveTaxreceiptforfiltereduserform', 'Payments::saveTaxreceipt'); 
$routes->post('payments/save-tax-receipt', 'Payments::saveTaxreceipt');
$routes->get('changepaymentpagepagesetup', 'Payments::changepaymentpagepagesetup');
$routes->get('payments/display-payers', 'Payments::displayPayers');
$routes->get('payments/search-members', 'Payments::searchMembers');
$routes->post('payments/upload-bulk-payments', 'Payments::uploadBulkPayments');
$routes->get('payments/get-districts', 'Payments::getDistricts');
$routes->get('payments/get-taluks', 'Payments::getTaluks');
$routes->get('payments/get-panchayats', 'Payments::getPanchayats');
$routes->get('payments/get-villages-new', 'Payments::getVillagesNew');
$routes->get('payments/get-villages', 'Payments::getVillages');
$routes->get('payments/get-all-events', 'Payments::getAllevents');
$routes->get('payments/get-events-list', 'Payments::getEventslist');
$routes->get('payments/search-events', 'Payments::searchEvents');
$routes->get('payments/get-tax-amount', 'Payments::getTaxamount');

// Payments Filter Routes
$routes->get('filteredusers', 'PaymentsFilter::index');
$routes->match(['get', 'post'], 'get-filtered-users', 'PaymentsFilter::getFilteredusers');
$routes->get('filtered-user-payment-form', 'PaymentsFilter::filteredUserpaymentform');
$routes->get('change-filtered-users-page-setup', 'PaymentsFilter::changefiltereduserspagesetup');
$routes->post('payments-filter/display-filter-members', 'PaymentsFilter::displayFiltermembers');

// Export & Reporting Routes
$routes->get('excel', 'PaidUnpaidController::excel');
$routes->get('download_members_data', 'ReportingController::download_members_data');
$routes->get('download_members_excel', 'ReportingController::download_members_excel');
$routes->get('download_excel', 'ReportingController::download_excel');

// Reports Routes
$routes->get('reports', 'Reports::index');
$routes->get('reports/sidemenu', 'Reports::sidemenu');
$routes->get('reports/topmenu', 'Reports::topmenu');
$routes->get('reports/pslogo', 'Reports::pslogo');
$routes->get('reports/getEventsbyYear', 'Reports::getEventsbyYear');
$routes->get('reports/searchReports', 'Reports::searchReports');
$routes->get('reports/displayReports', 'Reports::displayReports');
$routes->get('reports/getSearchevents', 'Reports::getSearchevents');
$routes->get('changeReportspagesetup', 'Reports::changeReportspagesetup');
$routes->get('reportFilterPage', 'Reports::reportFilterlist');
$routes->get('changeFilteredreportspagesetup', 'Reports::changeFilteredreportspagesetup');
$routes->get('reports/displayFilteredeventsreports', 'Reports::displayFilteredeventsreports');

// Bulk Upload
$routes->get('bulk_upload', 'Bulk_upload::index');
$routes->post('bulk_upload/upload_file', 'Bulk_upload::upload_file');

