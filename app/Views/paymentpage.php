<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paymentforevent</title>
  <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

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
      justify-content: flex-start;
      padding-left: 20px;
    }

    .ps-gray {
      background-color: rgb(248, 245, 245);
    }

    .active-bg {
      background-color: rgb(230, 230, 230);
    }

    .heading-kaadaisoft {
      color: rgb(0, 123, 255);
      font-weight: 800;
      font-family: sans-serif;
    }

    .ps-letter {
      background-color: rgb(0, 123, 255);
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
      /* color: rgb(0, 123, 255); */
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
          background-color: #0f172a;
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
          color: #cbd5e1;
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

      /* Fixed Layout Adjustments */
    /* Fixed Premium Layout */
    html, body { height: 100%; margin: 0; overflow: hidden; }
    .layout-container { display: flex; flex-direction: column; height: 100vh; width: 100%; }
    .top-navbar-row { height: 70px; flex-shrink: 0; z-index: 1050; background: #0f172a; display: flex; align-items: center; margin: 0 !important; border-bottom: 1px solid #1e293b; }
    .main-body-row { flex: 1; display: flex; overflow: hidden; margin: 0 !important; }
    #menu-bar { width: 260px; height: 100%; overflow-y: auto; flex-shrink: 0; background-color: #0f172a !important; border-right: 1px solid #1e293b; padding: 0; }
    .main-content-area { flex: 1; overflow-y: auto; background-color: #f8fafc; padding-bottom: 50px; }

    @media screen and (max-width: 768px) {
      .top-navbar-row { 
        height: auto; 
        flex-wrap: wrap; 
        padding: 5px 0 !important;
        width: 100%;
        z-index: 1050;
      }
      #ps-logo {
        padding-top: 5px !important;
        padding-bottom: 5px !important;
        width: 100% !important;
      }
      #search-bar {
        padding-left: 5px !important;
        padding-right: 5px !important;
        width: 100% !important;
      }
      .main-body-row {
        flex-direction: column; 
        overflow: auto; 
      }
      #menu-bar { display: none; }
      .main-content-area { width: 100%; overflow: visible; padding-left: 10px !important; padding-right: 10px !important; }
      #filter-form { margin-left: 0 !important; }
      html, body { overflow: auto; height: auto; }
      .layout-container { height: auto; }
    }

      /* Modern Table Styling */
      .table-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin-bottom: 2rem;
      }

      .custom-table-modern {
        margin-bottom: 0;
        width: 100%;
        min-width: 800px;
      }
      .custom-table-modern thead th {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        color: #f8fafc;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.05em;
        padding: 1rem;
        border-bottom: 2px solid #334155;
      }
      .custom-table-modern tbody tr {
        transition: all 0.2s ease;
      }
      .custom-table-modern tbody tr:hover {
        background-color: #f1f5f9;
      }
      .custom-table-modern td {
        padding: 1rem;
        vertical-align: middle;
        color: #1e293b;
        border-bottom: 1px solid #f1f5f9;
      }

      .btn-pay-modern {
        background-color: #10b981;
        color: white;
        border: none;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        transition: 0.2s;
        text-decoration: none;
      }
      .btn-pay-modern:hover {
        background-color: #059669;
        color: white;
        transform: translateY(-2px);
      }
      
      .btn-view-modern {
        background-color: #3b82f6;
        color: white;
        border: none;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        transition: 0.2s;
        text-decoration: none;
      }
      .btn-view-modern:hover {
        background-color: #2563eb;
        color: white;
        transform: translateY(-2px);
      }

      /* Premium Filter Card Styling */
      .filter-card-premium {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
        padding: 24px;
        margin-top: 15px;
      }
      .filter-card-premium .form-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #475569;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      .filter-card-premium .form-select,
      .filter-card-premium .form-control {
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        padding: 10px 14px;
        box-shadow: none;
        transition: all 0.2s;
        font-size: 0.95rem;
        color: #1e293b;
      }
      .filter-card-premium .form-select:focus,
      .filter-card-premium .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
      }
      .custom-radio {
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
        color: #334155;
        cursor: pointer;
        margin: 0;
      }
      .btn-apply-filter {
        background: linear-gradient(135deg, #0ea5e9, #2563eb);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        padding: 10px 30px;
        box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
        transition: all 0.2s;
      }
      .btn-apply-filter:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
        color: #fff;
      }

      /* Premium Pagination Styling */
      .pagination-wrapper {
        margin-top: 2rem;
        padding-bottom: 2rem;
      }
      .pagination-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
      }
      .pagination-btn {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #64748b;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        text-decoration: none;
      }
      .pagination-btn:hover:not(.disabled):not(.active) {
        background-color: #f8fafc;
        border-color: #cbd5e1;
        color: #3b82f6;
        transform: translateY(-1px);
      }
      .pagination-btn.active {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: #fff;
        border: none;
        box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3);
      }
      .pagination-btn.disabled {
        opacity: 0.5;
        cursor: not-allowed;
        background: #f1f5f9;
      }
      .pagination-ellipsis {
        color: #94a3b8;
        padding: 0 4px;
      }
      .pagination-info {
        font-size: 0.9rem;
        color: #64748b;
        margin-top: 1rem;
        text-align: center;
      }
  </style>
</head>

<body>

  <div class="container-fluid layout-container p-0">

    <?php if (session()->getFlashdata('paymentsuccessstatus')): ?>
      <div class="alert alert-success alert-dismissible fade show mt-3 mx-3" style="position:absolute; top:70px; right:20px; z-index:9999;" role="alert">
        <?= session()->getFlashdata('paymentsuccessstatus'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show mt-3 mx-3" style="position:absolute; top:70px; right:20px; z-index:9999;" role="alert">
        <?= session()->getFlashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Bulk Upload Modal (same output) -->
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
              action="<?= base_url('payments/upload-bulk-payments') ?>">
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
                </div>

              </div>
              <div class="mb-4">
                <label class="form-label fw-bold fs-6 mb-3">
                  <i class="fas fa-file-csv me-2 text-success"></i>Upload CSV:
                </label>
                <div class="border border-dashed border-success rounded-3 p-4 text-center" style="background:#f8fff8;">
                  <i class="fas fa-cloud-upload-alt fa-3x text-success mb-3"></i>
                  <input type="file" class="form-control border-0 bg-transparent" name="csvfile" id="csvFile"
                    accept=".csv, .xlsx, .xls" required>
                  <div class="mt-2 small text-muted">
                    <strong>CSV Priority:</strong> Familymembershipid,EventName,EventId,paymentdate,paidamount,...<br>
                    <span style="color:#295CF5;">Note: File Size should be below 2MB.</span>
                    <div class="mt-2">
                        <a href="<?= base_url('payments/download-payment-sample') ?>" class="text-primary fw-bold text-decoration-none">
                            <i class="fas fa-file-excel me-1"></i>Download Sample Excel Format
                        </a>
                    </div>
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


    <div class="layout-container">
      <div class="top-navbar-row"><!-----top-bar--------------->
        <div id="ps-logo" class="col-md-2 py-3 d-flex align-items-center justify-content-start ps-2"></div>
        <div id="search-bar" class="col-md-10 d-flex align-items-center justify-content-between px-3"></div>
      </div><!-----------top-bar-end----------------------->

      <div class="main-body-row"><!----------main-navbar----------->
        <div id="menu-bar"></div><!-----------side-bar-end-------------->
        <div id="changepage" class="main-content-area px-4"><!-----------main-dashboard------------------------->
        <div id="filter-form" class="ms-4">

          <div class="pt-3 pb-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
              <span class="text-secondary fs-4 fw-bold">📊 Bulk Payment Upload</span>
              <div class="d-flex align-items-center gap-2">
                <button onclick="toggleFilterSection()" class="btn btn-outline-primary fw-bold px-4 py-2 shadow-sm rounded-pill transition-300">
                    <i class="fas fa-filter me-1"></i>Filter
                </button>
                <button type="button" class="btn btn-success fw-bold px-4 py-2 shadow-sm rounded-pill transition-300" data-bs-toggle="modal"
                    data-bs-target="#bulkUploadModal">
                    <i class="fas fa-upload me-2 text-white"></i>Upload CSV
                </button>
              </div>
            </div>
          </div>


          <div id="filter-segment" style="display: none;">
          <div <?php if (session()->get('role') == 3 || session()->get('role') == 2) {
            echo "hidden";
          } ?>
            ><!------------------------------->
            <div class="d-flex justify-content-between">
              <span class="text-secondary fs-4 fw-bold">Payment Status Filter</span>
              <a href='download_members_data' style='height:fit-content;' class='btn btn-warning text-dark fw-bold btn-sm rounded shadow-sm' id='download' role='button'><i class="fas fa-file-download me-2"></i>Download Data</a>
            </div>
            <div class="pt-2 pb-4 px-3"><!----------filter-start------------>
              <form class="row filter-card-premium" method="POST" action="<?= base_url("get-filtered-users") ?>">
                <div class="col-md-3 mb-3"><!------------state-choose------------>
                  <label class="form-label"><i class="fas fa-map-marker-alt me-2 text-primary"></i>State</label>
                  <select onchange="getDistricts(this)" class="form-select" name="stateid" id="stateid">
                      <option value=''>Choose State</option>
                      <?php if (isset($states) || session()->get('filterdata')):
                        $statesData = isset($states) ? $states : session()->get('filterdata')['states'];
                        foreach ($statesData as $key => $value): ?>
                          <option value='<?= $value['state_id'] ?>'><?= $value['state_title'] ?></option>
                        <?php endforeach; 
                      endif; ?>
                    </select>
                </div><!------------state-choose-end----------->

                <div class="col-md-3 mb-3"><!------------district-choose------------>
                  <label class="form-label"><i class="fas fa-map me-2 text-primary"></i>District</label>
                  <select onchange="getTaluks(this)" class="form-select" name="districtname" id="districtstitle">
                      <option value=''>Choose District</option>
                      <?php if (session()->get('filterdata')):
                        $districtsData = session()->get('filterdata')['districts'];
                        foreach ($districtsData as $key => $value): ?>
                          <option value='<?= $value['district_name'] ?>'><?= $value['district_name'] ?></option>
                        <?php endforeach;
                      endif; ?>
                    </select>
                </div><!------------district-choose-end----------->

                <div class="col-md-3 mb-3"><!------------local-area-search------------>
                  <label class="form-label"><i class="fas fa-city me-2 text-primary"></i>Taluk</label>
                  <select class="form-select" name="talukname" id="talukslist">
                      <option value=''>Taluks</option>
                      <?php if (session()->get("role") == 1 && session()->get('filterdata')) {
                        $taluksData = session()->get('filterdata')['taluks'];
                        foreach ($taluksData as $value) {
                          $val = is_object($value) ? $value->taluk_name : $value['taluk_name'];
                          echo "<option value='$val'>$val</option>";
                        }
                      } elseif (session()->get("role") == 2) {
                        $taluksData = session()->get('filterdata')['taluks'] ?? ($taluks ?? []);
                        foreach ($taluksData as $key => $row) {
                          $val = is_object($row) ? $row->taluk_name : $row['taluk_name'];
                          echo "<option value='$val'>$val</option>";
                        }
                      }
                      ?>
                    </select>
                </div><!------------local-area-search-end----------->

                <div class="col-md-3 mb-3"><!------------panchayat-choose------------>
                  <label class="form-label"><i class="fas fa-building me-2 text-primary"></i>Panchayat</label>
                  <select onchange="getVillagesFiltered(this)" class="form-select" name="panchayatname" id="panchayatlist">
                      <option value=''>Choose Panchayat</option>
                      <?php if (session()->get('filterdata')):
                        $panchayatsData = session()->get('filterdata')['panchayats'] ?? [];
                        foreach ($panchayatsData as $value): ?>
                          <?php $val = is_object($value) ? $value->panchayat_name : $value['panchayat_name']; ?>
                          <option value='<?= $val ?>'><?= $val ?></option>
                        <?php endforeach; 
                      endif; ?>
                    </select>
                </div><!------------panchayat-choose-end----------->

                <div class="col-md-3 mb-3"><!------------village-choose------------>
                  <label class="form-label"><i class="fas fa-home me-2 text-primary"></i>Village</label>
                  <select class="form-select" name="villagename" id="villagelist">
                      <option value=''>Choose Village</option>
                      <?php if (session()->get('filterdata')):
                        $villagesData = session()->get('filterdata')['villages'] ?? [];
                        foreach ($villagesData as $value): ?>
                          <?php $val = is_object($value) ? $value->village_name : $value['village_name']; ?>
                          <option value='<?= $val ?>'><?= $val ?></option>
                        <?php endforeach; 
                      endif; ?>
                    </select>
                </div><!------------village-choose-end----------->

                <div class="col-md-3 mb-3"><!------------choose-years---------------------->
                  <label class="form-label"><i class="fas fa-calendar-alt me-2 text-warning"></i>Event Year</label>
                  <select onchange="getEventsbyyear(this)" class='form-select' name='eventyear' id='eventyear' required>
                      <option value="">Choose Year</option>
                      <?php if (isset($eventyears)):
                        foreach ($eventyears as $key => $value): ?>
                          <option value='<?= $value['Year'] ?>'><?= $value['Year'] ?></option>
                      <?php endforeach; endif; ?>
                    </select>
                </div><!-----------------choose-years-end---------------->

                <div id="showevents" class="col-md-3 mb-3"><!----------event-search------------>
                  <label id="eventnamelabel" class="form-label"><i class="fas fa-calendar-check me-2 text-warning"></i>Event</label>
                  <select class="form-select" name="eventid" id="eventid" required>
                      <option value=''>Choose Event</option>
                      <?php if (session()->get('filterdata')):
                        $eventsData = session()->get('filterdata')['eventsbyyear'] ?? [];
                        foreach ($eventsData as $key => $value): ?>
                          <option value='<?= $value['Id'] ?>'><?= $value['EventName'] ?></option>
                      <?php endforeach; endif; ?>
                    </select>
                </div><!--------event-search-end--------------------------->

                <div class="col-md-3 mb-3">
                  <!------------paid-filter------------>
                  <label class="form-label"><i class="fas fa-money-bill-wave me-2 text-success"></i>Payment Status</label>
                  <div class="border rounded px-3 py-2 bg-light d-flex justify-content-around">
                    <label class="custom-radio">
                      <input onchange="setStatus(this)" type="radio" value="Paid" name="paymentstatus" required> Paid
                    </label>
                    <label class="custom-radio">
                      <input onchange="setStatus(this)" type="radio" value="Pending" name="paymentstatus" required> Unpaid
                    </label>
                  </div>
                </div><!------------paid-filter-end----------->

                <div id="filterbutton" class="col-12 mt-2 d-flex justify-content-end">
                  <!------------filter-button-start------------>
                  <button type="submit" class="btn btn-apply-filter px-5"><i class="fas fa-filter me-2"></i>Apply Filter</button>
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
                  <a href='payment-receipt-list?memberid=<?= session()->get('Kaadaisoft_userId') ?>'
                    class='btn btn-primary fw-bold' style='height:fit-content;'>View Receipts</a>
                </div>
              </div>
              <form class="row filter-card-premium" method="POST" action="<?= base_url("get-filtered-users") ?>">
                <div class="col-md-3 mb-3"><!------------state-choose------------>
                  <label class="form-label"><i class="fas fa-map-marker-alt me-2 text-primary"></i>State</label>
                  <input class="form-control bg-light" name="statename" id="statename" readonly value="<?= isset($memberdata) ? $memberdata->State : "" ?>" required>
                </div><!------------state-choose-end----------->

                <div class="d-none col-md-3"><!------------state-choose------------>
                  <label class="form-label">State</label>
                  <input onchange="getDistricts(this)" class="form-control bg-light" name="stateid" id="stateid" readonly value="<?= isset($memberdata) ? $memberdata->State_id : '' ?>" required>
                </div><!------------state-choose-end----------->

                <div class="col-md-3 mb-3"><!------------district-choose------------>
                  <label class="form-label"><i class="fas fa-map me-2 text-primary"></i>District</label>
                  <input onchange="getTaluks(this)" readonly class="form-control bg-light" name="districtname" id="districtstitle" value="<?= isset($memberdata) ? $memberdata->district_name : ""; ?>" required>
                </div><!------------district-choose-end----------->

                <div class="col-md-3 mb-3"><!------------local-area-search------------>
                  <label class="form-label"><i class="fas fa-city me-2 text-primary"></i>Taluk</label>
                  <select onchange="getPanchayatsFiltered(this, 'panchayatlist_coord')" class="form-select" name="talukname" id="taluk_list" required>
                      <option value="">Choose Taluks</option>
                      <?php if(isset($taluks)) { foreach ($taluks as $key => $taluk) {
                        echo "<option value='$taluk[taluk_name]' " . (isset($memberdata) && $memberdata->district_name == $taluk['taluk_name'] ? "selected" : "") . ">$taluk[taluk_name]</option>";
                      } } ?>
                    </select>
                </div><!------------local-area-search-end----------->

                <div class="col-md-3 mb-3"><!------------panchayat-choose------------>
                  <label class="form-label"><i class="fas fa-building me-2 text-primary"></i>Panchayat</label>
                  <select onchange="getVillagesFiltered(this, 'villagelist_coord')" class="form-select" name="panchayatname" id="panchayatlist_coord">
                      <option value=''>Choose Panchayat</option>
                      <?php if (session()->get('filterdata')):
                        $panchayatsData = session()->get('filterdata')['panchayats'] ?? [];
                        foreach ($panchayatsData as $value): ?>
                          <?php $val = is_object($value) ? $value->panchayat_name : $value['panchayat_name']; ?>
                          <option value='<?= $val ?>'><?= $val ?></option>
                        <?php endforeach; 
                      endif; ?>
                    </select>
                </div><!------------panchayat-choose-end----------->

                <div class="col-md-3 mb-3"><!------------village-choose------------>
                  <label class="form-label"><i class="fas fa-home me-2 text-primary"></i>Village</label>
                  <select class="form-select" name="villagename" id="villagelist_coord">
                      <option value=''>Choose Village</option>
                      <?php if (session()->get('filterdata')):
                        $villagesData = session()->get('filterdata')['villages'] ?? [];
                        foreach ($villagesData as $value): ?>
                          <?php $val = is_object($value) ? $value->village_name : $value['village_name']; ?>
                          <option value='<?= $val ?>'><?= $val ?></option>
                        <?php endforeach; 
                      endif; ?>
                    </select>
                </div><!------------village-choose-end----------->

                <div class="col-md-3 mb-3"><!------------choose-years---------------------->
                  <label class="form-label"><i class="fas fa-calendar-alt me-2 text-warning"></i>Event Year</label>
                  <select onchange="getEventsbyyearFilter(this)" class='form-select' name='eventyear' id='eventyear' required>
                      <option value="">Choose Year</option>
                      <?php if (isset($eventyears))
                        foreach ($eventyears as $key => $value) {
                          echo "<option value='$value[Year]'>$value[Year]</option>";
                        }
                      ?>
                    </select>
                </div><!-----------------choose-years-end---------------->

                <div id="showeventsforcoordinatorfilter" class="col-md-3 mb-3"><!----------event-search------------>
                  <label id="eventnamelabel" class="form-label"><i class="fas fa-calendar-check me-2 text-warning"></i>Event</label>
                  <select class="form-select" name="eventid" id="eventid" required>
                      <option value=''>Choose Event</option>
                    </select>
                </div><!--------event-search-end--------------------------->

                <div class="col-md-3 mb-3">
                  <!------------paid-filter------------>
                  <label class="form-label"><i class="fas fa-money-bill-wave me-2 text-success"></i>Payment Status</label>
                  <div class="border rounded px-3 py-2 bg-light d-flex justify-content-around">
                    <label class="custom-radio">
                      <input onchange="setStatus(this)" type="radio" value="Paid" name="paymentstatus" required> Paid
                    </label>
                    <label class="custom-radio">
                      <input onchange="setStatus(this)" type="radio" value="Pending" name="paymentstatus" required> Unpaid
                    </label>
                  </div>
                </div><!------------paid-filter-end----------->

                <div id="filterbutton" class="col-12 mt-2 d-flex justify-content-end">
                  <!------------filter-button-start------------>
                  <button type="submit" class="btn btn-apply-filter px-5"><i class="fas fa-filter me-2"></i>Apply Filter</button>
                </div><!------------filter-button-end----------->
              </form>
            </div><!---------filter-end-------------->
          </div><!------------coordinator-filter-end------------------>
          </div> <!-- Filter Segment End -->

          <div id="paymentdetails">
            <?php if(isset($counts) && $counts > 0): ?>
            <div class="alert alert-info mb-3 d-inline-block px-4 py-2 fw-semibold" role="alert" style="background-color: #e0f2fe; color: #0284c7; border: none;">
              Total Members: <?= $counts ?>
            </div>
            <?php endif; ?>
            <div class="table-container">
            <table class='table custom-table-modern table-hover'>
              <thead <?php if (count($members) == 0) {  echo "hidden"; } ?>>
                <tr>
                  <th>S.No</th>
                  <th>Family ID</th>
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
                    $roleText = ($value['MemberRole'] == 'Head') ? 'Head' : (($value['Role'] == 1) ? 'Manager' : (($value['Role'] == 2) ? 'Coordinator' : 'Member'));
                    $rowBg = ($i % 2 == 0) ? "style='background-color:#f8fafc;'" : "";
                    echo
                      "<tr $rowBg>
                    <td class='fw-medium text-muted'>$i</td>
                    <td class='fw-bold' style='color: #2563eb;'>$value[Familymembershipid]</td>
                    <td class='fw-medium'>$value[Name]</td>
                    <td><span class='badge bg-light text-dark border'>$roleText</span></td>
                    <td class='text-muted'>$value[Aadharnumber]</td>
                    <td class='text-muted'>$value[Phonenumber]</td>
                    <td class='text-muted'>$value[Taluk]</td>
                    <td>
                      <div class='d-flex justify-content-center align-items-center gap-2'>
                        <a href='gopaymentpage?memberid=$value[Familymembershipid]' class='btn-pay-modern'>Pay Now</a>
                        <a href='payment-receipt-list?memberid=$value[Familymembershipid]' class='btn-view-modern'>View Receipts</a>
                      </div>
                    </td>
                    </tr>";
                    $i++;
                  }
                }
                ?>
              </tbody>
            </table>
            </div>
          </div>

          <div class="pagination-wrapper">
            <div id="pagination-container" class="pagination-container">
              <!-- Pagination buttons rendered by JS -->
            </div>
            <div id="pagination-info" class="pagination-info">
              <!-- Showing X to Y of Z entries -->
            </div>
          </div>
        <div style="height: 100px;"></div> <!-- Bottom Spacer -->
        </div>
      </div><!-----------main-dashboard-end------------------------>


    </div><!--------------main-navbar-end------------------->
    </div> <!-- layout-container -->
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

    function openMobileMenu() {
        document.getElementById('custom-mobile-menu').style.display = 'block';
    }

    function closeMobileMenu() {
        document.getElementById('custom-mobile-menu').style.display = 'none';
    }

    // Highlight active sidebar menu item after AJAX load
    function highlightActiveMenu() {
      const pathSegments = window.location.pathname.split('/').filter(s => s !== '');
      document.querySelectorAll('#menu-bar [data-page], #mobile-menu-content [data-page]').forEach(function(link) {
        link.classList.remove('active-menu-item');
        const linkPage = link.getAttribute('data-page');
        if (pathSegments.some(seg => seg === linkPage) ||
            (pathSegments.length === 0 && linkPage === 'admindashboard')) {
          link.classList.add('active-menu-item');
        }
      });
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
        highlightActiveMenu();
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

    const ITEMS_PER_PAGE = 10;
    let currentTotalCount = <?= $newcounts ?? $counts ?? 0 ?>;
    let currentActivePage = <?= ($initialindex ?? 0) + 1 ?>;

    $(document).ready(function() {
      renderPagination(currentTotalCount, currentActivePage);
    });

    function renderPagination(totalCount, activePage) {
      const container = document.getElementById('pagination-container');
      const info = document.getElementById('pagination-info');
      if (!container || totalCount <= 0) {
        if (container) container.innerHTML = '';
        if (info) info.innerHTML = totalCount === 0 ? '<div class="mt-5 text-muted">No Record Found</div>' : '';
        return;
      }

      const totalPages = Math.ceil(totalCount / ITEMS_PER_PAGE);
      let html = '';

      html += `<button onclick="goToPage(${activePage - 1})" class="pagination-btn ${activePage === 1 ? 'disabled' : ''}" ${activePage === 1 ? 'disabled' : ''}>
                <i class="fas fa-chevron-left"></i>
               </button>`;

      let startPage = Math.max(1, activePage - 2);
      let endPage = Math.min(totalPages, startPage + 4);
      
      if (endPage - startPage < 4) {
        startPage = Math.max(1, endPage - 4);
      }

      if (startPage > 1) {
        html += `<button onclick="goToPage(1)" class="pagination-btn">1</button>`;
        if (startPage > 2) html += `<span class="pagination-ellipsis">...</span>`;
      }

      for (let i = startPage; i <= endPage; i++) {
        html += `<button onclick="goToPage(${i})" class="pagination-btn ${i === activePage ? 'active' : ''}">${i}</button>`;
      }

      if (endPage < totalPages) {
        if (endPage < totalPages - 1) html += `<span class="pagination-ellipsis">...</span>`;
        html += `<button onclick="goToPage(${totalPages})" class="pagination-btn">${totalPages}</button>`;
      }

      html += `<button onclick="goToPage(${activePage + 1})" class="pagination-btn ${activePage === totalPages ? 'disabled' : ''}" ${activePage === totalPages ? 'disabled' : ''}>
                <i class="fas fa-chevron-right"></i>
               </button>`;

      container.innerHTML = html;

      const start = (activePage - 1) * ITEMS_PER_PAGE + 1;
      const end = Math.min(activePage * ITEMS_PER_PAGE, totalCount);
      info.innerHTML = `Showing <span class="fw-bold text-dark">${start}</span> to <span class="fw-bold text-dark">${end}</span> of <span class="fw-bold text-dark">${totalCount}</span> entries`;
    }

    function goToPage(page) {
      if (page < 1) return;
      const offset = (page - 1) * ITEMS_PER_PAGE;
      
      $.ajax({
        type: "get",
        url: "payments/display-payers",
        data: { "count": offset },
        success: function (result) {
          document.getElementById('filteredmembers').innerHTML = result;
          currentActivePage = page;
          renderPagination(currentTotalCount, currentActivePage);
          document.getElementById('paymentdetails').scrollIntoView({ behavior: 'smooth', block: 'start' });
        },
        error: function (error) {
          console.error(error);
          document.getElementById('filteredmembers').innerHTML = "<tr><td colspan='8' class='text-center text-danger'>Error loading data.</td></tr>";
        }
      });
    }

    // let setheight = document.getElementById("changepage");
    // let menubarheight = document.getElementById("menu-bar");
    // let a = window.innerHeight;
    // let b = document.getElementById("search-bar").getBoundingClientRect().height;
    //  menubarheight.style.height = a - b+"px";
    // setheight.style.height = a - b + "px";

    function getDistricts(state) {
      let stateid = state.value;

      $.ajax({
        type: "get",
        url: "payments/get-districts",
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
        url: "payments/get-taluks",
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
        url: "payments/get-villages",
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
        url: "payments/get-panchayats",
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
        url: "payments/get-villages-new",
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
        url: "payments/get-all-events",
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
        url: "payments/get-cities",
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
        url: "payments/search-members",
        data: { "searchfields": searchfields },
        success: (result) => {
          document.getElementById('filteredmembers').innerHTML = result;
          let rowCount = $('#filteredmembers tr').length;
          currentActivePage = 1;
          currentTotalCount = rowCount; 
          renderPagination(currentTotalCount, currentActivePage);
        },
        error: (error) => {
          document.getElementById('filteredmembers').innerHTML = "<tr><td colspan='8' class='text-center text-danger'>No results found.</td></tr>";
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
        url: "payments/get-all-events",
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
        url: "<?= base_url('payments/get-all-events'); ?>",
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




    function toggleFilterSection() {
        $("#filter-segment").slideToggle(400);
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>
