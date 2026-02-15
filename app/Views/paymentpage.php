<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paymentforevent</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <style>
    .ps-logo {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .ps-gray {
      background-color: rgb(248, 245, 245);
    }

    .active-bg {
      background-color: rgb(230, 230, 230);
    }

    .heading-kaadaisoft {
      color: rgb(120, 50, 186);
      font-weight: 800;
      font-family: sans-serif;
    }

    .ps-letter {
      background-color: rgb(120, 50, 186);
    }

    .ps-user {
      background-color: rgb(254, 213, 163);
    }

    .align {
      align-self: self-end;
    }

    .fa-magnifying-glass {
      color: gray;
    }

    .dashboard-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, auto));
      gap: 20px;
    }

    .card-round {
      border-radius: 20px;
    }

    ul>li {
      cursor: pointer;
    }

    .card1 {
      background-color: rgb(88, 194, 255);
    }

    .card2 {
      background-color: rgb(233, 153, 3);
    }

    .card3 {
      background-color: rgb(124, 9, 232);
    }

    .card4 {
      background-color: rgb(35, 154, 43);
    }

    .chartMenu {
      width: 100vw;
      height: 40px;
      background: #1A1A1A;
      color: rgba(54, 162, 235, 1);
    }

    .chartMenu p {
      padding: 10px;
      font-size: 20px;
    }

    .chartCard {
      /* width: 100%; */
      /* height: calc(100% - 40px); */
      /* background: rgba(54, 162, 235, 0.2); */
      /*  display: flex;
        align-items: center;
        justify-content: center; */
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 700px));
      grid-template-rows: repeat(auto-fit, minmax(200px, auto));
      align-items: center;
    }

    .chartBox {
      /* height:fit-content; */
      padding: 10px;
      border-radius: 20px;
      /* border: solid 3px rgba(54, 162, 235, 1); */
      background: white;
    }

    #search-bar {
      display: flex;
    }

    .ham-line {
      width: 30px;
      height: 6px;
      background-color: rgb(70, 70, 70);
      margin-top: 5px;
    }

    .ps-add-btn {
      border: none;
      outline: none;
      background-color: rgb(23, 23, 184);
      border-radius: 25px;

    }

    .active-page {
      background-color: #6495ED;
      font-weight: 500;
      color: white;
    }

    .active {
      border: none;
      outline: none;
      font-weight: 500;
      font-size: 15px;
    }

    .ps-page-count {
      border: none;
      outline: none;
      font-weight: 500;
      color: white;
      background-color: #6495ED;
    }

    #coords-form div>input {
      border-radius: 50px;
      border: 1px solid rgb(208, 205, 205);
      outline: none;
      padding: 13px 0;
    }

    #coords-form div>button {
      border-radius: 50px;
    }

    #add-coords-form {
      width: 42%;
      border-radius: 25px;
      box-sizing: border-box;
      padding: 3%;
      position: relative;
    }

    .form-grid {
      grid-template-rows: repeat(auto-fit, minmax(50px, auto));
    }

    #coords-modal-hide {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: -100%;
      transition: 0.4s;
      transition-timing-function: ease;
    }

    .coords-modal {
      padding: 10px 0;
      background-color: rgba(128, 128, 128, 0.4);
      overflow: hidden;
    }

    a {
      color: black;
    }

    a:hover {
      color: black;
    }

    .active-payments {
      background-color: rgb(230, 230, 230);
      font-weight: 600;
    }

    .eventslist {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, auto));
      gap: 20px;
    }

    /* .member-color{
        color: rgb(95, 73, 30);
      } */
    label {
      /* color: rgb(120, 50, 186); */
      font-size: 18px;
      font-weight: 700;
    }

    input:focus,
    select:focus {
      outline: 2px solid transparent;
    }

    @media screen and (max-width:768px) {

      /*  #search-bar{
            background-color:rgb(248, 245, 245);
            flex:none;
            background-color:white !important;
            padding: 5px 0; 
           } */
      #menu-bar {
        display: none;
      }

      #commonsearch {
        width: 100% !important;
        margin: 0 !important;
        /* padding:5px; */
      }

      .dashboardpadd:nth-child(2) {
        padding: 0% !important;
      }

      .dashboardpadd:nth-child(1) {
        padding: 2% 0 !important;
      }

      #hidename {
        display: none;
      }

      .ps-logo {
        justify-content: space-between;
      }

      .fa-bell-icon {
        padding-right: 10px;
      }

      #ps-name-line {
        display: none;
      }

      #filter-form {
        margin: 0 3% 0 0 !important;
      }

      .rounded-circle {
        margin: 5px;

      }

      #arrow {
        margin: 5px;

      }
    }

    @media screen and (min-width:768px) {
      .ham-menu {
        display: none;
      }
    }

    @media screen and (max-width:768px) {

      #add-coords-form div>input {
        padding: 5px;
      }

      #add-coords-form {
        width: 90%;
        padding: 8%;
      }
    }

      /* Custom Mobile Menu Styles */
      #custom-mobile-menu {
          display: none;
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100vh;
          background-color: white;
          z-index: 9999;
          overflow-y: auto;
          animation: slideIn 0.3s ease-out;
      }

      @keyframes slideIn {
          from { transform: translateX(-100%); }
          to { transform: translateX(0); }
      }

      .close-btn {
          position: absolute;
          top: 20px;
          right: 20px;
          font-size: 30px;
          cursor: pointer;
          color: #333;
      }

      #mobile-menu-content {
          padding-top: 60px; /* Space for close button */
      }
      
      /* Hide default menu bar on mobile */
      @media screen and (max-width: 768px) {
          #menu-bar {
              display: none;
          }
      }
  </style>
</head>

<body>

  <div class="container-fluid">

    <?php if (session()->getFlashdata('paymentsuccessstatus')): ?>
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <?= session()->getFlashdata('paymentsuccessstatus'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <?= session()->getFlashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>




    <!-- Bulk Upload Modal -->
    <div class="modal fade" id="bulkUploadModal" tabindex="-1" aria-labelledby="bulkUploadModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header border-0 bg-success text-white">
            <h5 class="modal-title fw-bold mb-0" id="bulkUploadModalLabel">
              <i class="fas fa-upload me-2"></i>Bulk Payment Upload
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body p-4">
            <form id="bulkUploadForm" enctype="multipart/form-data" method="POST"
              action="<?= base_url('payments/uploadBulkPayments') ?>">
              <div class="row">
                <div class="col-md-6 mb-4">
                  <label class="form-label fw-bold fs-6 mb-3">Event Year:</label>
                  <select class="form-select border rounded-pill py-3" name="eventyear" id="eventYearSelect"
                    onchange="getEventsbyyearModal(this)">
                    <option value="">Choose Year</option>
                    <?php if (isset($eventyears)):
                      foreach ($eventyears as $year): ?>
                        <option value="<?= $year['Year'] ?>"><?= $year['Year'] ?></option>
                      <?php endforeach; endif; ?>
                  </select>

                </div>
                <div class="col-md-6 mb-4">
                  <label class="form-label fw-bold fs-6 mb-3">
                    <i class="fas fa-calendar-check me-2 text-success"></i>Event (Backup):
                  </label>
                  <select class="form-select border rounded-pill py-3" name="eventid" id="eventSelect" required>
                    <option value="">Choose Event</option>
                  </select>
                  <!-- <div class="form-text small text-muted mt-2">
                    <i class="fas fa-info-circle me-1"></i>
                    <strong>CSV Priority:</strong> EventId from CSV takes precedence over this dropdown
                  </div> -->
                </div>

              </div>
              <div class="mb-4">
                <label class="form-label fw-bold fs-6 mb-3">
                  <i class="fas fa-file-csv me-2 text-success"></i>Upload CSV:
                </label>
                <div class="border border-dashed border-success rounded-3 p-4 text-center" style="background:#f8fff8;">
                  <i class="fas fa-cloud-upload-alt fa-3x text-success mb-3"></i>
                  <input type="file" class="form-control border-0 bg-transparent" name="csvfile" id="csvFile"
                    accept=".csv" required>
                  <div class="mt-2 small text-muted">
                    <strong>CSV Priority:</strong> Familymembershipid,EventName,EventId,paymentdate,paidamount,...<br>
                    <!-- <strong>CSV EventId wins over modal!</strong> -->
                  </div>
                </div>
              </div>
              <div class="d-flex gap-3 justify-content-end">
                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success px-5 fw-bold">Upload Payments</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="row"><!-----top-bar--------------->

      <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3">

      </div>

      <div id="search-bar" class="col-md-10 align-items-center justify-content-between border-bottom">

      </div>
    </div><!-----------top-bar-end----------------------->

    <div class="row min-vh-100"><!----------main-navbar----------->

      <div id="menu-bar" class="col-md-2 ps-gray min-vh-100"><!----------side-bar-------------------->

      </div><!-----------side-bar-end-------------->

      <div id="changepage" class="col-md-10 pt-3">
        <!-----------main-dashboard------------------------->
        <div id="filter-form" class="ms-4">

          <div class="pt-3 pb-4 px-3">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <span class="text-secondary fs-4 fw-bold">📊 Bulk Payment Upload</span>
              <button type="button" class="btn btn-success fw-bold px-4 py-2" data-bs-toggle="modal"
                data-bs-target="#bulkUploadModal">
                <i class="fas fa-upload me-2"></i>Upload CSV
              </button>
            </div>
          </div>


          <div <?php if (session()->get('role') == 3 || session()->get('role') == 2) {
            echo "hidden";
          } ?>
            ><!------------------------------->
            <div class="d-flex justify-content-between">
              <span class="text-secondary fs-4">Payment Status Filter:</span>
              <a href='download_members_data' style='height:fit-content;'
                class='btn btn-sm btn-success fw-bold float-end btn-warning' id='download' role='button'>Download</a>
            </div>
            <div class="pt-2 pb-4 px-3"><!----------filter-start------------>
              <form class="row border py-4 border-4 border-success" method="POST" style="row-gap:20px;"
                action="<?= base_url("getFilteredusers") ?>">
                <div class="col-md-3"><!------------state-choose------------>
                  <label class="container-fluid" for="aadhar">State:<br>
                    <select onchange="getDistricts(this)" class="container-fluid border rounded" name="stateid"
                      id="stateid">
                      <option value=''>Choose State</option>
                      <?php if (isset($states) || session()->get('filterdata')):
                        $statesData = isset($states) ? $states : session()->get('filterdata')['states'];
                        foreach ($statesData as $key => $value): ?>
                          <option value='<?= $value['state_id'] ?>'><?= $value['state_title'] ?></option>
                        <?php endforeach; 
                      endif; ?>
                    </select>

                  </label>
                </div><!------------state-choose-end----------->
                <div class="col-md-3"><!------------district-choose------------>
                  <label class="container-fluid" for="district">Districts:<br>
                    <select onchange="getTaluks(this)" class="container-fluid border rounded" name="districtname" id="districtstitle">
                      <option value=''>Choose District</option>
                      <?php if (session()->get('filterdata')):
                        $districtsData = session()->get('filterdata')['districts'];
                        foreach ($districtsData as $key => $value): ?>
                          <option value='<?= $value['district_name'] ?>'><?= $value['district_name'] ?></option>
                        <?php endforeach;
                      endif; ?>
                    </select>
                  </label>
                </div><!------------district-choose-end----------->

                <div class="col-md-3"><!------------local-area-search------------>
                  <label class="container-fluid" for="aadhar">Taluks:<br>
                    <select class="container-fluid border rounded" name="talukname" id="talukslist">
                      <option value=''>Taluks</option>
                      <?php if (session()->get("role") == 1 && session()->get('filterdata')) {
                        $taluksData = session()->get('filterdata')['taluks'];
                        foreach ($taluksData as $value) {
                          $val = is_object($value) ? $value->taluk_name : $value['taluk_name'];
                          echo
                            "<option value='$val'>$val</option>";
                        }
                      } elseif (session()->get("role") == 2) {
                        $taluksData = session()->get('filterdata')['taluks'] ?? ($taluks ?? []);
                        foreach ($taluksData as $key => $row) {
                          $val = is_object($row) ? $row->taluk_name : $row['taluk_name'];
                          echo
                            "<option value='$val'>$val</option>";
                        }
                      }
                      ?>
                    </select>
                  </label>
                </div><!------------local-area-search-end----------->

                <div class="col-md-3"><!------------panchayat-choose------------>
                  <label class="container-fluid" for="panchayat">Panchayats:<br>
                    <select onchange="getVillagesFiltered(this)" class="container-fluid border rounded" name="panchayatname" id="panchayatlist">
                      <option value=''>Choose Panchayat</option>
                      <?php if (session()->get('filterdata')):
                        $panchayatsData = session()->get('filterdata')['panchayats'] ?? [];
                        foreach ($panchayatsData as $value): ?>
                          <?php $val = is_object($value) ? $value->panchayat_name : $value['panchayat_name']; ?>
                          <option value='<?= $val ?>'><?= $val ?></option>
                        <?php endforeach; 
                      endif; ?>
                    </select>
                  </label>
                </div><!------------panchayat-choose-end----------->

                <div class="col-md-3"><!------------village-choose------------>
                  <label class="container-fluid" for="village">Villages:<br>
                    <select class="container-fluid border rounded" name="villagename" id="villagelist">
                      <option value=''>Choose Village</option>
                      <?php if (session()->get('filterdata')):
                        $villagesData = session()->get('filterdata')['villages'] ?? [];
                        foreach ($villagesData as $value): ?>
                          <?php $val = is_object($value) ? $value->village_name : $value['village_name']; ?>
                          <option value='<?= $val ?>'><?= $val ?></option>
                        <?php endforeach; 
                      endif; ?>
                    </select>
                  </label>
                </div><!------------village-choose-end----------->

                <div class="col-md-3"><!------------choose-years---------------------->
                  <label class="container-fluid" for="aadhar">Choose event year:<br>
                    <select onchange="getEventsbyyear(this)" class='container-fluid border rounded' name='eventyear'
                      id='eventyear' required>
                      <option value="">Choose Year</option>
                      <?php if (isset($eventyears)):
                        foreach ($eventyears as $key => $value): ?>
                          <option value='<?= $value['Year'] ?>'><?= $value['Year'] ?></option>
                      <?php endforeach; endif; ?>
                    </select>
                  </label>
                </div><!-----------------choose-years-end---------------->

                <div id="showevents" class="col-md-3"><!----------event-search------------>
                  <label id="eventnamelabel" class="container-fluid" for="aadhar">Choose Event: <br>
                    <select onchange="" class="container-fluid border rounded" name="eventid" id="eventid" required>
                      <option value=''>Choose Event</option>
                      <?php if (session()->get('filterdata')):
                        $eventsData = session()->get('filterdata')['eventsbyyear'] ?? [];
                        foreach ($eventsData as $key => $value): ?>
                          <option value='<?= $value['Id'] ?>'><?= $value['EventName'] ?></option>
                      <?php endforeach; endif; ?>
                    </select>
                    <!--  <div id="eventsearchresult" style="visibility:hidden;overflow-x:auto;position:absolute;box-sizing:border-box;" class="d-flex flex-column py-2 ps-3 mt-2 rounded-3 border shadow-sm bg-white">
          </div> -->
                  </label>
                </div><!--------event-search-end--------------------------->

                <div class="col-md-3 d-flex justify-content-between align-items-center">
                  <!------------paid-filter------------>
                  <div class="mt-3"><label for="paid">Paid Users:</label>&nbsp;<input onchange="setStatus(this)"
                      type="radio" value="Paid" name="paymentstatus" required></div>
                  <div class="mt-3"><label for="paid">Unpaid Users:</label>&nbsp;<input onchange="setStatus(this)"
                      type="radio" value="Pending" name="paymentstatus" required></div>
                </div><!------------paid-filter-end----------->

                <div id="filterbutton" class="col-md-3 pt-3 d-flex align-items-center justify-content-center">
                  <!------------filter-button-start------------>
                  <button type="submit" class="btn btn-success fw-bold">Apply Filter</button>
                </div><!------------filter-button-end----------->
              </form>
            </div><!---------filter-end-------------->
          </div><!----------------------------------->

          <div <?php if (session()->get('role') == 1) {
            echo "hidden";
          } ?>
            ><!------------coordinator-filter------------------->
            <div class="pt-2 pb-4 px-3"><!----------filter-start------------>
              <div class="d-flex justify-content-between">
                <span class="text-secondary h4">Payment Status Filter:</span>
                <div class="p-2">
                  <a href='gopaymentpage?memberid=<?= session()->get('Kaadaisoft_userId') ?>'
                    class='btn btn-primary fw-bold' style='height:fit-content;'>Pay Now</a>
                  <a href='paymentReceiptlist?memberid=<?= session()->get('Kaadaisoft_userId') ?>'
                    class='btn btn-primary fw-bold' style='height:fit-content;'>View Receipts</a>
                </div>
              </div>
              <form class="row border py-4 border-4 border-success" method="POST" style="row-gap:20px;"
                action="<?= base_url("getFilteredusers") ?>">
                <div class="col-md-3"><!------------state-choose------------>
                  <label class="container-fluid" for="aadhar">State:<br>
                    <input class="container-fluid border rounded" name="statename" id="statename" readonly
                      value="<?= isset($memberdata) ? $memberdata->State : "" ?>" required>
                  </label>
                </div><!------------state-choose-end----------->
                <div class="d-none col-md-3"><!------------state-choose------------>
                  <label class="container-fluid" for="aadhar">State:<br>
                    <input onchange="getDistricts(this)" class="container-fluid border rounded" name="stateid"
                      id="stateid" readonly value="<?= isset($memberdata) ? $memberdata->State_id : '' ?>" required>
                  </label>
                </div><!------------state-choose-end----------->
                <div class="col-md-3"><!------------district-choose------------>
                  <label class="container-fluid" for="aadhar">Districts:<br>
                    <input onchange="getTaluks(this)" readonly class="container-fluid border rounded"
                      name="districtname" id="districtstitle"
                      value="<?= isset($memberdata) ? $memberdata->district_name : ""; ?>" required>
                  </label>
                </div><!------------district-choose-end----------->

                <div class="col-md-3"><!------------local-area-search------------>
                  <label class="container-fluid" for="aadhar">Taluks:<br>
                    <select onchange="getPanchayatsFiltered(this, 'panchayatlist_coord')" class="container-fluid border rounded" name="talukname"
                      id="taluk_list" value="<?= isset($memberdata) ? $memberdata->district_name : ""; ?>" required>
                      <option value="">Choose Taluks</option>
                      <?php if(isset($taluks)) { foreach ($taluks as $key => $taluk) {
                        echo "<option value='$taluk[taluk_name]'>$taluk[taluk_name]</option>";
                      } } ?>
                    </select>
                  </label>
                </div><!------------local-area-search-end----------->

                <div class="col-md-3"><!------------panchayat-choose------------>
                  <label class="container-fluid" for="panchayat">Panchayats:<br>
                    <select onchange="getVillagesFiltered(this, 'villagelist_coord')" class="container-fluid border rounded" name="panchayatname" id="panchayatlist_coord">
                      <option value=''>Choose Panchayat</option>
                      <?php if (session()->get('filterdata')):
                        $panchayatsData = session()->get('filterdata')['panchayats'] ?? [];
                        foreach ($panchayatsData as $value): ?>
                          <?php $val = is_object($value) ? $value->panchayat_name : $value['panchayat_name']; ?>
                          <option value='<?= $val ?>'><?= $val ?></option>
                        <?php endforeach; 
                      endif; ?>
                    </select>
                  </label>
                </div><!------------panchayat-choose-end----------->

                <div class="col-md-3"><!------------village-choose------------>
                  <label class="container-fluid" for="village">Villages:<br>
                    <select class="container-fluid border rounded" name="villagename" id="villagelist_coord">
                      <option value=''>Choose Village</option>
                      <?php if (session()->get('filterdata')):
                        $villagesData = session()->get('filterdata')['villages'] ?? [];
                        foreach ($villagesData as $value): ?>
                          <?php $val = is_object($value) ? $value->village_name : $value['village_name']; ?>
                          <option value='<?= $val ?>'><?= $val ?></option>
                        <?php endforeach; 
                      endif; ?>
                    </select>
                  </label>
                </div><!------------village-choose-end----------->

                <div class="col-md-3"><!------------choose-years---------------------->
                  <label class="container-fluid" for="aadhar">Choose event year:<br>
                    <select onchange="getEventsbyyearFilter(this)" class='container-fluid border rounded'
                      name='eventyear' id='eventyear' required>
                      <option value="">Choose Year</option>
                      <?php if (isset($eventyears))
                        foreach ($eventyears as $key => $value) {
                          echo "<option value='$value[Year]'>$value[Year]</option>";
                        }
                      ?>
                    </select>

                  </label>
                </div><!-----------------choose-years-end---------------->

                <div id="showeventsforcoordinatorfilter" class="col-md-3"><!----------event-search------------>
                  <label id="eventnamelabel" class="container-fluid" for="aadhar">Choose Event: <br>
                    <select onchange="" class="container-fluid border rounded" name="eventid" id="eventid" required>
                      <option value=''>Choose Event</option>
                    </select>
                    <!--  <div id="eventsearchresult" style="visibility:hidden;overflow-x:auto;position:absolute;box-sizing:border-box;" class="d-flex flex-column py-2 ps-3 mt-2 rounded-3 border shadow-sm bg-white">
          </div> -->
                  </label>
                </div><!--------event-search-end--------------------------->

                <div class="col-md-3 d-flex justify-content-between align-items-center">
                  <!------------paid-filter------------>
                  <div class="mt-3"><label for="paid">Paid Users:</label>&nbsp;<input onchange="setStatus(this)"
                      type="radio" value="Paid" name="paymentstatus" required></div>
                  <div class="mt-3"><label for="paid">Unpaid Users:</label>&nbsp;<input onchange="setStatus(this)"
                      type="radio" value="Pending" name="paymentstatus" required></div>
                </div><!------------paid-filter-end----------->

                <div id="filterbutton" class="col-md-3 pt-3 d-flex align-items-center justify-content-center">
                  <!------------filter-button-start------------>
                  <button type="submit" class="btn btn-success fw-bold">Apply Filter</button>
                </div><!------------filter-button-end----------->
              </form>
            </div><!---------filter-end-------------->
          </div><!------------coordinator-filter-end------------------>

          <div id="paymentdetails">
            <?php if(isset($counts) && $counts > 0): ?>
            <div class="alert alert-info mb-3" role="alert">
              <strong>Total Members:</strong> <?= $counts ?>
            </div>
            <?php endif; ?>
            <table class='table table-bordered'>
              <thead <?php if (count($members) == 0) {
                echo "hidden";
              } ?>>
                <tr style='font-size:18px;' class="ps-gray">
                  <th>Sno</th>
                  <th>Familymembershipid</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Aadhar</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody id="filteredmembers">
                <?php
                if (isset($members) && isset($sno)) {
                  $i = $sno + 1;
                  foreach ($members as $key => $value) {
                    $roleText = ($value['Role'] == 1) ? 'Manager' : (($value['Role'] == 2) ? 'Coordinator' : (($value['Role'] == 3) ? 'Member' : ''));
                    echo
                      "<tr>
                    <td style='font-weight:500;'>$i</td><td class='fw-bold text-primary'>$value[Familymembershipid]</td><td style='font-weight:500;'>$value[Name]</td><td style='font-weight:500;'>$roleText</td><td style='font-weight:500;'>$value[Aadharnumber]</td><td style='font-weight:500;'>$value[Phonenumber]</td>
                    <td style='font-weight:500;'>$value[Taluk]</td>
                    <td>
                    <div class='d-flex justify-content-evenly'><a href='gopaymentpage?memberid=$value[Familymembershipid]' class='btn btn-success fw-bold' style='height:fit-content;'>Pay Now</a> &nbsp;&nbsp;
                    <a href='paymentReceiptlist?memberid=$value[Familymembershipid]' class='btn btn-primary fw-bold' style='height:fit-content;'>View Receipts</a></div></td>
                    </tr>";
                    $i++;
                  }
                }
                ?>
              </tbody>
            </table>
          </div>

          <div class='d-flex justify-content-center container-fluid'>
            <!-----------------pagination---------------------->

            <div class="col-md-6 py-2 d-flex justify-content-around align-items-center">

              <?php
              $total_records = isset($newcounts) ? $newcounts : (isset($counts) ? $counts : 0);
              $current_offset = isset($sno) ? $sno : 0;
              $current_page_index = isset($initialindex) ? $initialindex : floor($current_offset / 5);

              if ($total_records > 0) {
                $limit = 5;
                $total_pages = ceil($total_records / $limit);
                $total_pages_array = range(0, $total_pages - 1);
                
                $start_index = $current_page_index;
                $display_limit = 5;
                $pages_to_show = array_slice($total_pages_array, $start_index, $display_limit);

                // Back Arrow
                $prev_index = ($start_index - $display_limit) < 0 ? 0 : ($start_index - $display_limit);
                echo "<a href='changepaymentpagepagesetup?initialindex=$prev_index' style='cursor:pointer;' class='text-dark text-decoration-none'><i id='arrow' class='fa-solid fa-arrow-left-long'></i></a>";

                $j = 0;
                foreach ($pages_to_show as $value) {
                  $offset = $value * $limit;
                  $pageno = $value + 1;
                  $active_class = ($value == $current_page_index) ? 'active-page text-white' : '';

                  // Every 5th page or the last page of the slice can be a full reload link for better SEO/UX
                  if (($pageno % 5 == 0 && $pageno != $total_pages) || ($j == 4 && $pageno < $total_pages)) {
                     echo "<a style='width:35px;height:35px;' href='changepaymentpagepagesetup?initialindex=$value' class='$active_class active text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$pageno</a>";
                  } else {
                     echo "<button style='width:35px;height:35px;' onclick='displayPayers($offset,$j)' class='$active_class active rounded-circle'>$pageno</button>";
                  }
                  $j++;
                }

                if ($total_pages > ($start_index + $display_limit)) {
                  echo "<span>...</span>";
                  $last_page_val = $total_pages - 1;
                  echo "<a href='changepaymentpagepagesetup?initialindex=$last_page_val' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;' class='text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$total_pages</a>";
                }

                // Next Arrow
                $next_index = ($start_index + $display_limit) >= $total_pages ? $start_index : ($start_index + $display_limit);
                echo "<a href='changepaymentpagepagesetup?initialindex=$next_index' style='cursor:pointer;' class='text-dark text-decoration-none'><i id='arrow' class='fa-solid fa-arrow-right-long'></i></a>";
              }

              function createarr($noofpages) { return range(0, $noofpages); }
              ?>
            </div>
          </div><!--------------pagination-end--------------------->
        </div>
      </div><!-----------main-dashboard-end------------------------>


    </div><!--------------main-navbar-end------------------->

  </div>

  <!---------------------offcanvas-------------------------->

<!---------------------Custom Mobile Menu-------------------------->
<div id="custom-mobile-menu">
    <div class="close-btn" onclick="closeMobileMenu()">&times;</div>
    <div id="mobile-menu-content">
        <!-- Content loaded via JS -->
    </div>
</div>
<!---------------------Custom Mobile Menu End-------------------------------->

  <!---------------------offcanvas-end-------------------------------->


  <script>

    let statusforpaid;

// Mobile Menu Functions
    function openMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'block';
    }

    function closeMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'none';
    }

    $.ajax({
      type: "get",
      url: "<?= base_url('payments/sidemenu'); ?>",
      success: (result) => {
        document.getElementById("menu-bar").innerHTML = result;
        // Populate custom mobile menu content
        if(document.getElementById("mobile-menu-content")) {
            document.getElementById("mobile-menu-content").innerHTML = result;
        }
      },
      error: (error) => {
        document.getElementById("menu-bar").innerHTML = "Error loading menu";
      }
    });

    $.ajax({
      type: "get",
      url: "<?= base_url('payments/topmenu'); ?>",
      success: (result) => {
        document.getElementById("search-bar").innerHTML = result;
      },
      error: (error) => {
        document.getElementById("search-bar").innerHTML = "Error loading menu";
      }
    });

    $.ajax({
      type: "get",
      url: "<?= base_url('payments/pslogo'); ?>",
      success: (result) => {
        document.getElementById("ps-logo").innerHTML = result;
      },
      error: (error) => {
        document.getElementById("ps-logo").innerHTML = error;
      }
    });

    window.onhashchange = () => {
      window.location.reload();
    }

    function displayPayers(counts, index) {

      activepage = document.querySelectorAll(".active");
      let l = activepage.length;
      for (let i = 0; i < l; i++) {
        if (i == index) {
          activepage[i].classList.add("active-page");
        }
        else {
          if (activepage[i].classList.contains("active-page")) {
            activepage[i].classList.remove("active-page")
          }
        }
      }

      $.ajax({
        type: "get",
        url: "payments/displayPayers",
        data: { "count": counts },
        success: function (result) {
          document.getElementById('filteredmembers').innerHTML = result;
        },
        error: function (error) {
          document.getElementById('filteredmembers').innerHTML = "<tr><td colspan='8' class='text-center text-danger'>Error loading members data. Please try again.</td></tr>";
        }
      });
    }

    let setheight = document.getElementById("changepage");
    let menubarheight = document.getElementById("menu-bar");
    let a = window.innerHeight;
    let b = document.getElementById("search-bar").getBoundingClientRect().height;
    //  menubarheight.style.height = a - b+"px";
    setheight.style.height = a - b + "px";

    function getDistricts(state) {
      let stateid = state.value;

      $.ajax({
        type: "get",
        url: "payments/getDistricts",
        data: { "stateid": stateid },
      success: (result) => {
          let districts = JSON.parse(result);
          let district_options = "<option value=''>Choose District</option>";
          district_options += districts.map((district) => {
              return `<option value='${district.district_name}'>${district.district_name}</option>`
          }).join("");
          document.getElementById("districtstitle").innerHTML = district_options;
      },
      error: (error) => {
          document.getElementById("districtstitle").innerHTML = "<option value=''>Error fetching districts</option>";
      }
    });
  }

  function getTaluks(district) {
      let districtname = district.value;
      $.ajax({
        type: "get",
        url: "payments/getTaluks",
        data: { "districtname": districtname },
        success: (result) => {
          let taluks = JSON.parse(result);
          let taluk_options = "<option value=''>Choose Taluk</option>";
          taluk_options += taluks.map((taluk) => {
              return `<option value='${taluk.taluk_name}'>${taluk.taluk_name}</option>`
          }).join("");
          document.getElementById("talukslist").innerHTML = taluk_options;
          document.getElementById("talukslist").setAttribute("onchange", "getPanchayatsFiltered(this)");
        },
        error: (error) => {
          document.getElementById("talukslist").innerHTML = "<option value=''>Error fetching districts</option>";
        }
      });
  }

    function getPanchayats(area) {
      let localareaid = area.value;
      $.ajax({
        type: "get",
        url: "payments/getVillages",
        data: { "localareaid": localareaid },
        success: (result) => {
          document.getElementById("villages").innerHTML = result;
        },
        error: (error) => {
          document.getElementById("villages").innerHTML = error;
        }
      });
    }

    function getPanchayatsFiltered(taluk, targetId = 'panchayatlist') {
      let talukname = taluk.value;
      $.ajax({
        type: "get",
        url: "payments/getPanchayats",
        data: { "talukname": talukname },
        success: (result) => {
          let panchayats = JSON.parse(result);
          let panchayat_options = "<option value=''>Choose Panchayat</option>";
          panchayat_options += panchayats.map((panchayat) => {
              return `<option value='${panchayat.panchayat_name}'>${panchayat.panchayat_name}</option>`
          }).join("");
          document.getElementById(targetId).innerHTML = panchayat_options;
          
          // Reset villagelist if target is main
          if (targetId === 'panchayatlist') {
              document.getElementById("villagelist").innerHTML = "<option value=''>Choose Village</option>";
          } else {
              document.getElementById("villagelist_coord").innerHTML = "<option value=''>Choose Village</option>";
          }
        }
      });
    }

    function getVillagesFiltered(panchayat, targetId = 'villagelist') {
      let panchayatname = panchayat.value;
      
      // Handle the targetId from the onchange if passed
      if (panchayat.id === 'panchayatlist_coord') {
          targetId = 'villagelist_coord';
      }

      $.ajax({
        type: "get",
        url: "payments/getVillagesNew",
        data: { "panchayatname": panchayatname },
        success: (result) => {
          let villages = JSON.parse(result);
          let village_options = "<option value=''>Choose Village</option>";
          village_options += villages.map((village) => {
              return `<option value='${village.village_name}'>${village.village_name}</option>`
          }).join("");
          document.getElementById(targetId).innerHTML = village_options;
        }
      });
    }

    function setStatus(status) {
      statusforpaid = status.value;
    }

    // this is temporaryly no need
    // function applyFilter() {
    //   let stateid = document.getElementById("stateid").value;
    //   let districtname = document.getElementById("districtname").value;
    //   let villageid = document.getElementById("villageid").value;
    //   let eventid = document.getElementById("eventid").value;
    //   $.ajax({
    //     type: "get",
    //     data: { "stateid": stateid, "districtid": districtid, "villageid": villageid, "eventid": eventid, "status": statusforpaid },
    //     url: "payments/getFilteredusers",
    //     success: (result) => {
    //       document.getElementById("paymentdetails").innerHTML = result;
    //     },
    //     error: (error) => {
    //       document.getElementById("paymentdetails").innerHTML = error;
    //     }
    //   });
    // }

    function getEventsbyyear(yeardata) {
      let year = yeardata.value;
      $.ajax({
        type: "get",
        url: "payments/getAllevents",
        data: { "year": year },
        success: (result) => {
          document.getElementById("showevents").innerHTML = result;
          document.getElementById("showeventsforcoordinatorfilter").innerHTML = result;
        },
        error: (error) => {
          document.getElementById("showevents").innerHTML = error;
        }
      });
    }

    function getCities(district) {
      let districtid = district.value;
      $.ajax({
        type: "get",
        url: "payments/getCities",
        data: { "districtid": districtid },
        success: (result) => {
          document.getElementById("citiestitle").innerHTML = result;
        },
        error: (error) => {
          document.getElementById("citiestitle").innerHTML = error;
        }
      });
    }

    /* let eventsearchbarwidth = document.getElementById("eventnamelabel").getBoundingClientRect().width;
     let eventsearchresult = document.getElementById("eventsearchresult");
     eventsearchresult.style.width = eventsearchbarwidth+"px"; */

    /*  function getEvents(years,userid){
       let year = years.value;
       if(year == ""){
         document.getElementById("showevents").innerHTML = `<label id='eventnamelabel' class='container-fluid' for='eventsr'>Choose events: <br><input onkeyup='searchEvents(this)' onblur='hideSearchresults()' class='container-fluid border rounded' name='eventname' id='eventname' required><div id='eventsearchresult' style='visibility:hidden;overflow-x:auto;position:absolute;width:${eventsearchbarwidth}px;box-sizing:border-box;' class='d-flex flex-column ps-3 py-1 mt-2 rounded-3 border-2 shadow-sm bg-white'></div></label>`;
       }
       else{
       $.ajax({
       type:"get",
       url:"payments/getFilteredevents",
       data:{"year":year,"userid":userid},
       success:(result)=>{
            document.getElementById("showevents").innerHTML = result;
            console.log(result)
       },
       error:(error)=>{
            document.getElementById("showevents").innerHTML = error;
           //  console.log(error)
       }
     });
     }
     }   */

    function commonSearch(members) {

      let searchfields = members.value;

      $.ajax({
        type: "get",
        url: "payments/searchMembers",
        data: { "searchfields": searchfields },
        success: (result) => {
          document.getElementById('filteredmembers').innerHTML = result;
        },
        error: (error) => {
          document.getElementById('filteredmembers').innerHTML = "<tr><td colspan='8' class='text-center text-danger'>No results found or error occurred.</td></tr>";
        }
      })
    };

    function changepage(page) {
      let pagename = page.name;

      $.ajax({
        type: "get",
        url: pagename,
        success: (page) => {
          document.getElementById("changepage").innerHTML = page;
        },
        error: (error) => {
          document.getElementById("changepage").innerHTML = error;
        }
      })
    }

    window.addEventListener("resize", () => {
      /* menu-bar height removed for single scroll */
      let formmodal = document.getElementById("add-coords-form");
      let b = window.innerWidth;
      if (b > 768) {
        formmodal.style.left = "29%";
      }
      else {
        formmodal.style.left = "5%";
      }
    })

    let show = document.getElementById("coords-modal-hide");

    function showcoordsmodal() {
      let show = document.getElementById("coords-modal-hide");
      show.style.display = "block";
      let formmodal = document.getElementById("add-coords-form");
      let b = window.innerWidth;
      if (b > 768) {
        show.style.left = "0%";
        formmodal.style.left = "29%";
      }
      else {
        show.style.left = "0%";
        formmodal.style.left = "5%";
      }
    }

    window.onclick = function (event) {

      if (event.target == show) {
        let formmodal = document.getElementById("add-coords-form");
        let b = window.innerWidth;
        if (b > 768) {
          show.style.left = "-100%";
          formmodal.style.left = "-42%";
        }
        else {
          show.style.left = "-100%";
          formmodal.style.left = "-90%";
        }
      }
    }

    function hidecoordsform() {
      let formmodal = document.getElementById("add-coords-form");
      let b = window.innerWidth;
      if (b > 768) {
        show.style.left = "-100%";
        formmodal.style.left = "-42%";
      }
      else {
        show.style.left = "-100%";
        formmodal.style.left = "-90%";
      }
    }

    // 1. FOR PAYMENT STATUS FILTER (Main + Coordinator)
    function getEventsbyyearFilter(yeardata) {
      let year = yeardata.value;
      $.ajax({
        type: "get",
        url: "payments/getAllevents",
        data: { "year": year },
        success: (result) => {
          document.getElementById("showevents").innerHTML = result;
          if (document.getElementById("showeventsforcoordinatorfilter")) {
            document.getElementById("showeventsforcoordinatorfilter").innerHTML = result;
          }
        },
        error: (error) => {
          document.getElementById("showevents").innerHTML = "<option value=''>Error loading events</option>";
        }
      });
    }

    // 2. FOR BULK UPLOAD MODAL ONLY
    function getEventsbyyearModal(yeardata) {
      let year = yeardata.value;
      let eventSelect = document.getElementById('eventSelect');

      if (year === '') {
        eventSelect.innerHTML = "<option value=''>Choose Event</option>";
        return;
      }

      $.ajax({
        type: "get",
        url: "<?= base_url('payments/getAllevents'); ?>",
        data: { "year": year },
        success: (result) => {
          eventSelect.innerHTML = result;
        },
        error: (error) => {
          eventSelect.innerHTML = "<option value=''>Error loading events</option>";
        }
      });
    }


    // CSV Auto-preview (DOES NOT CHANGE EVENT SELECTION)
    document.addEventListener('DOMContentLoaded', function () {
      const csvFile = document.getElementById('csvFile');
      if (csvFile) {
        csvFile.addEventListener('change', function (e) {
          const file = e.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
              const lines = e.target.result.split('\n');
              if (lines.length > 1) {
                const firstRow = lines[1].split(',');
                if (firstRow.length >= 3) {
                  const eventId = parseInt(firstRow[2]);
                  const eventName = firstRow[1];
                  if (eventId > 0) {
                    // DO NOT change dropdown:
                    // document.getElementById('eventSelect').value = eventId;

                    // Show preview only
                    let preview = document.getElementById('csvPreview');
                    if (!preview) {
                      preview = document.createElement('div');
                      preview.id = 'csvPreview';
                      preview.className = 'alert alert-info mt-3';
                      document
                        .querySelector('#bulkUploadForm')
                        .insertBefore(
                          preview,
                          document.querySelector('#bulkUploadForm input[type="file"]').parentNode.nextSibling
                        );
                    }
                    preview.innerHTML =
                      `<i class="fas fa-magic me-2"></i><strong>Auto-detected from CSV:</strong> ${eventName} (ID: ${eventId}) | ${lines.length - 1} payments<br>` +
                      `<small>Note: System will use the event you selected in the dropdown.</small>`;
                  }
                }
              }
            };
            reader.readAsText(file);
          }
        });
      }
    });




  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>
