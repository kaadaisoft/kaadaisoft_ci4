<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Members</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- <link rel="stylesheet" href="./kaadaisoft.css"> -->
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
         color: rgb(0, 123, 255);
         font-weight: 800;
         font-family: sans-serif;
      }

      .ps-letter {
         background-color: rgb(0, 123, 255);
      }

      .ps-user {
         background-color: rgb(254, 213, 163);
         ;
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

      .ps-table-grid {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(300px, 700px));
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
         align-items: center;
         justify-content: space-between;
         padding: 10px 20px;
      }

      .ham-menu {
         /* position:absolute; */
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

      #members-form div>input,
      select {
         border-radius: 50px;
         border: 1px solid rgb(208, 205, 205);
         outline: none;
         padding: 13px 10px;
      }

      #add-members-form {
         width: 95%;
         border-radius: 25px;
         box-sizing: border-box;
         position: relative;
      }

      .form-grid {
         grid-template-rows: repeat(auto-fit, minmax(50px, auto));
      }

      #members-modal-hide {
         position: absolute;
         width: 100%;
         height: 100%;
         top: 0;
         left: -100%;
         transition: 0.4s;
         transition-timing-function: ease;
      }

      .members-modal {
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

      #membertoast {
         border: 4px solid rgb(132, 250, 132);
         border-radius: 10px;
         position: absolute;
         top: 10%;
         right: -380px;
         transition: 0.5s;
         background-color: rgb(18, 155, 18);
      }

      #update-member-form div>input,
      select {
         border-radius: 50px;
         border: 1px solid rgb(208, 205, 205);
         outline: none;
         padding: 0 10px;
      }

      #update-member-form div>button {
         border-radius: 50px;
      }

      #update-member-section {
         width: 95%;
         border-radius: 25px;
         box-sizing: border-box;
         /* padding:3%; */
         position: relative;
      }


      #updatemember-modal-hide {
         position: absolute;
         width: 100%;
         height: 100%;
         top: 0;
         left: -100%;
         transition: 0.4s;
         transition-timing-function: ease;
      }

      .updatemember-modal {
         padding: 10px 0;
         background-color: rgba(128, 128, 128, 0.4);
         overflow: hidden;
      }

      /* .active-members {
         background-color: rgb(230, 230, 230);
         font-weight: 600;
      } */
      .custom-table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: none !important;
        margin-top: 20px;
        background: white;
      }
      
      .custom-table thead th {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 1px;
        padding: 18px !important;
        border: none !important;
        text-align: center;
        vertical-align: middle;
      }
      
      .custom-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #eee;
      }
      
      .custom-table tbody tr:hover {
        background-color: rgba(37, 117, 252, 0.04);
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      }
      
      .custom-table td {
        padding: 15px !important;
        vertical-align: middle;
        border: none !important;
        color: #555;
        text-align: center;
        font-size: 0.95rem;
      }

      .custom-table tbody tr:last-child td {
        border-bottom: none !important;
      }

      .table-btn {
         background-color: rgb(239, 236, 236);
      }

      .member-text {
         color: rgb(0, 123, 255);
      }

      .updatemember {
         position: relative;
      }

      .trashmember {
         position: relative;
      }

      .updatetooltip {
         visibility: hidden;
         width: max-content;
         background-color: rgb(0, 123, 255);
         color: white;
         border-radius: 6px;
         padding: 5px 10px;
         position: absolute;
         top: 100%;
         left: -50%;
         z-index: 1;
      }

      .updatetooltip::after {
         content: "";
         position: absolute;
         bottom: 100%;
         right: 50%;
         border: 7px;
         border-style: solid;
         border-color: transparent transparent rgb(0, 123, 255) transparent;
      }

      .updatemember:hover .updatetooltip {
         visibility: visible;
      }

      .trashtooltip {
         visibility: hidden;
         width: max-content;
         background-color: rgb(0, 123, 255);
         ;
         color: white;
         border-radius: 6px;
         padding: 5px 10px;
         position: absolute;
         top: 100%;
         left: -20%;
         z-index: 1;
      }

      .trashtooltip::after {
         content: "";
         position: absolute;
         bottom: 100%;
         right: 50%;
         border: 7px;
         border-style: solid;
         border-color: transparent transparent rgb(0, 123, 255);
         transparent;
      }

      .trashmember:hover .trashtooltip {
         visibility: visible;
      }

      #registration-form label {
         width: 100%;
         font-size: 18px;
         font-weight: 500;
      }

      #registration-form input[type="text"],
      input[type="number"],
      input[type="file"],
      select {
         width: 100%;
         padding-left: 6px;
      }

      #registration-form input[type="text"]:focus,
      input[type="number"]:focus,
      select:focus {
         outline: none;
      }

      #registration-form input[type="file"] {
         border: none;
         outline: none;
      }

      form button[type=submit] {
         color: white;
         font-weight: 500;
         border: none;
         background-color: #295CF5;
      }

      .ps-img-btn {
         color: white;
         font-weight: 500;
         border: none;
         background-color: #295CF5;
      }

      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
         -webkit-appearance: none;
         margin: 0;
      }

      /* Firefox */
      input[type=number] {
         -moz-appearance: textfield;
      }


      @media screen and (max-width:768px) {
         #search-bar {
            /* background-color:rgb(248, 245, 245); */
         }

         #menu-bar {
            display: none;
         }

         #commonsearch {
            width: 100% !important;
            margin: 0 !important;
         }

         .memberpadd {
            padding: 2% !important;
         }

         #btn-header .d-flex {
            flex-wrap: wrap;
            justify-content: center !important;
            gap: 10px;
         }

         #btn-header button, #btn-header a {
            flex: 0 0 auto;
            margin: 2px !important;
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

         #memberssubmenu {
            display: flex !important;
         }
      }

      @media screen and (max-width:768px) {

         #add-members-form div>input {
            padding: 5px;
         }

         #add-members-form {
            width: 90%;
            padding: 8%;
         }

         #update-member-section div>input {
            padding: 5px;
         }

         #update-member-section {
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
          #pageheight {
            position: relative !important;
            height: auto !important;
            overflow: visible !important;
          }
          #pagecontrol {
            max-height: none !important;
            overflow: visible !important;
          }
          div[style*="height: 75vh"] {
            height: auto !important;
            max-height: none !important;
            overflow: visible !important;
          }
      }
    </style>
</head>

<body>

   <div id="pageheight" class="container-fluid" style="overflow:hidden;position:absolute;height:100vh;width:100%;">

      <?= view('notification_toast') ?>



      <div class="row"><!-----top-bar--------------->

         <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3">

         </div>

         <div id="search-bar" class="col-md-10 align-items-center justify-content-between border-bottom">

         </div>

      </div><!-----------top-bar-end----------------------->


      <div class="row"><!----------main-navbar----------->

         <div id="menu-bar" style="overflow-y:auto;height:calc(100vh - 80px);" class="col-md-2 ps-gray"><!----------side-bar-------------------->


         </div><!-----------side-bar-end-------------->

         <div id="main-dashboard-content" style="overflow-y:auto; height:calc(100vh - 80px); padding-bottom:50px;" class="col-md-10">
            <!-----------main-dashboard------------------------->

            <div id="btn-header" class="container-fluid px-4 pt-4 d-flex justify-content-md-end justify-content-center memberpadd">
               <div class="d-flex align-items-center flex-wrap justify-content-center gap-2">
                   <?php if (session()->get('role') == 1 || session()->get('role') == 2): ?>
                   <button onclick="toggleBulkUploadSection()" class="btn btn-sm btn-outline-info fw-bold me-2 px-3 rounded-pill shadow-sm">
                       <i class="fas fa-file-upload me-1"></i>Upload Bulk Data
                   </button>
                   <?php endif; ?>
                   <button onclick="toggleFilterSection()" class="btn btn-sm btn-outline-primary fw-bold me-2 px-3 rounded-pill shadow-sm transition-all">
                       <i class="fas fa-filter me-1"></i>Filter
                   </button>
                   <button onclick="downloadMembersExcel()" style="height:fit-content;" 
                      class="btn btn-sm btn-success fw-bold float-end btn-warning" id="download"
                      >Download</button>&nbsp;&nbsp;
                   <a <?php if (session()->get('role') == 2) {
                      echo "hidden";
                    } ?> href="
                      <?= base_url("assigncoordinator") ?>" class='text-decoration-none ps-add-btn text-white py-1
                      px-4'>+&nbsp;Assign
                   </a>&nbsp;
                   <a href="<?= base_url('registrationform') ?>"
                      class='ps-add-btn float-end text-white py-1 px-4 text-decoration-none'>+&nbsp;Add</a>
                </div>
             </div>

            <?php if (session()->get('role') == 1 || session()->get('role') == 2): ?>
             <div id="bulk-upload-segment" class="container-fluid px-4 pt-3" style="display: none;">
                <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                   <div class="card-header bg-info text-white border-0 py-3">
                      <h5 class="mb-0 fw-bold"><i class="fas fa-file-upload me-2 border p-1 rounded bg-white text-info" style="font-size: 0.8rem;"></i>Upload Members Bulk Data</h5>
                   </div>
                   <div class="card-body bg-white p-4">
                      <form action="<?php echo base_url('bulk_upload/upload_file'); ?>" method="post" enctype="multipart/form-data" class="row g-3 align-items-end">
                          <div class="col-md-9">
                              <label class="form-label fw-bold text-muted small">Select Excel File (.xlsx, .xls)</label>
                              <input type="file" class="form-control" name="file" id="file" required accept=".xlsx, .xls">
                          </div>
                          <div class="col-md-3">
                              <button class="btn btn-primary w-100 fw-bold shadow-sm" type="submit"><i class="fas fa-cloud-upload-alt me-2"></i>Upload Data</button>
                          </div>
                      </form>
                      <div class="mt-3 small text-muted">
                        <i class="fas fa-info-circle me-1 text-info"></i> Please ensure your Excel file matches the required template format before uploading.
                      </div>
                   </div>
                </div>
             </div>
             <?php endif; ?>

            <?php if (session()->get('role') != 3): ?>
             <!-- Members Filter -->
                <div id="filter-segment" class="container-fluid px-4 pt-3 memberpadd" style="display: none;">
                   <div class="border rounded p-4 bg-light shadow-sm" style="border-left: 5px solid #ffc107 !important; border-radius: 15px !important;">
                      <h6 class="mb-3 fw-bold text-dark"><i class="fas fa-search-plus me-2"></i>Advanced Search Filters</h6>
                      <div class="row mb-3" <?php if (session()->get('role') == 2) echo 'style="display:none;"'; ?>>
                         <!-- State -->
                         <div class="col-md-3">
                            <label class="small fw-bold mb-1 text-muted" for="states-dropdown">State:</label>
                            <select id="states-dropdown" onchange="setDropdowndistricts(this)"
                               class="form-select form-select-sm border-0 shadow-sm">
                               <option value="">Choose State</option>
                               <?php if (isset($states)): ?>
                                  <?php foreach ($states as $state): ?>
                                     <option value="<?= $state->state_id ?>"><?= $state->state_title ?></option>
                                  <?php endforeach; ?>
                               <?php endif ?>
                            </select>
                         </div>

                         <!-- District -->
                         <div class="col-md-3">
                            <label class="small fw-bold mb-1 text-muted" for="districts-dropdown">Districts:</label>
                            <select id="districts-dropdown" onchange="setDropdowntaluks(this)"
                               class="form-select form-select-sm border-0 shadow-sm">
                               <option value="">Choose District</option>
                            </select>
                         </div>

                         <!-- Taluk -->
                         <div class="col-md-3">
                            <label class="small fw-bold mb-1 text-muted" for="taluks-dropdown">Taluks:</label>
                            <select id="taluks-dropdown" onchange="setDropdownpanchayat(this)"
                               class="form-select form-select-sm border-0 shadow-sm">
                               <option value="">Choose Taluk</option>
                            </select>
                         </div>

                         <!-- Panchayat -->
                         <div class="col-md-3">
                            <label class="small fw-bold mb-1 text-muted" for="panchayat-dropdown">Panchayat:</label>
                            <select id="panchayat-dropdown" onchange="commonSearch()" class="form-select form-select-sm border-0 shadow-sm">
                               <option value="">Choose Panchayat</option>
                            </select>
                         </div>
                      </div>

                      <div class="row mb-3">
                         <!-- Blood Group -->
                         <div class="col-md-4">
                            <label class="small fw-bold mb-1 text-muted" for="bloodgroup-dropdown">Blood Group:</label>
                            <select id="bloodgroup-dropdown" onchange="commonSearch()" class="form-select form-select-sm border-0 shadow-sm">
                               <option value="">Choose Blood Group</option>
                               <option value="A+">A+</option>
                               <option value="A-">A-</option>
                               <option value="B+">B+</option>
                               <option value="B-">B-</option>
                               <option value="O+">O+</option>
                               <option value="O-">O-</option>
                               <option value="AB+">AB+</option>
                               <option value="AB-">AB-</option>
                            </select>
                         </div>

                         <!-- Gender -->
                         <div class="col-md-4">
                            <label class="small fw-bold mb-1 text-muted" for="gender-dropdown">Gender:</label>
                            <select id="gender-dropdown" onchange="commonSearch()" class="form-select form-select-sm border-0 shadow-sm">
                               <option value="">All</option>
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                               <option value="Other">Other</option>
                            </select>
                         </div>

                         <!-- Occupation -->
                         <div class="col-md-4">
                            <label class="small fw-bold mb-1 text-muted" for="occupation-dropdown">Occupation:</label>
                            <select id="occupation-dropdown" onchange="commonSearch()" class="form-select form-select-sm border-0 shadow-sm">
                               <option value="">All</option>
                               <!-- Existing core professions -->
                               <option value="Doctor">Doctor</option>
                               <option value="Lawyer">Lawyer</option>
                               <option value="Police">Police</option>
                               <option value="Teacher / Lecturer">Teacher / Lecturer</option>
                               <option value="Engineer">Engineer</option>
                               <option value="Government Employee">Government Employee</option>
                               <option value="Private Employee">Private Employee</option>
                               <option value="Student">Student</option>
                               <option value="Farmer">Farmer – Agriculture</option>

                               <!-- Textiles & Apparel -->
                               <option value="Textile Mill Worker">Textile Mill Worker (Spinning /
                                  Weaving)
                               </option>
                               <option value="Garment Factory Worker">Garment Factory Worker</option>
                               <option value="Tailor">Tailor / Apparel Stitching</option>
                               <option value="Pattern Master">Garment Pattern Master / Designer
                               </option>
                               <option value="Textile Machinery Technician">Textile Machinery
                                  Technician /
                                  Mechanic</option>
                               <option value="Textile Machinery Service">Textile Machinery Sales &
                                  Service
                               </option>
                               <option value="Loom Operator">Powerloom / Auto‑Loom Operator</option>
                               <option value="Knitting Machine Operator">Knitting Machine Operator
                               </option>

                               <!-- Transport -->
                               <option value="Truck Driver">Truck / Lorry Driver</option>
                               <option value="Truck Owner Driver">Truck / Lorry Owner‑cum‑Driver
                               </option>
                               <option value="Logistics Staff">Logistics / Transport Staff</option>
                               <option value="Fleet Manager">Fleet Manager</option>

                               <!-- Dairy / Poultry / Allied -->
                               <option value="Dairy Farmer">Dairy Farmer</option>
                               <option value="Poultry Farmer">Poultry Farmer</option>
                               <option value="Animal Husbandry">Goat / Sheep Rearing</option>

                               <!-- Engineering / Manufacturing -->
                               <option value="Pump Technician">Pump / Motor Technician</option>
                               <option value="Pump Factory Worker">Pump / Motor Manufacturing Worker
                               </option>
                               <option value="Motor Rewinding Technician">Motor Rewinding Technician
                               </option>
                               <option value="Machinist / Turner">Machinist / Turner</option>
                               <option value="Welder / Fabricator">Welder / Fabricator</option>
                               <option value="Foundry Worker">Steel / Aluminium Foundry Worker</option>
                               <option value="Mixer Grinder Technician">Mixer‑Grinder Assembly /
                                  Service
                                  Technician</option>
                               <option value="Plastic / Net Unit Worker">Plastic / Net / Packaging Unit
                                  Worker</option>

                               <!-- Energy -->
                               <option value="Windmill Technician">Windmill Maintenance Technician
                               </option>
                               <option value="Electrical Technician">Electrical Line / Maintenance
                                  Technician</option>

                               <!-- Retail & Services -->
                               <option value="Grocery Shop Staff">Grocery Shop Staff</option>
                               <option value="Medical Shop Staff">Medical Shop / Pharmacy Staff
                               </option>
                               <option value="Retail / Sales Staff">Retail Shop / Sales Staff</option>
                               <option value="Office Admin / Computer Operator">Office Admin / Computer
                                  Operator</option>

                               <!-- Finance / Health / IT -->
                               <option value="Accountant / Finance Staff">Accountant / Finance Staff
                               </option>
                               <option value="Bank / NBFC Staff">Bank / NBFC Staff</option>
                               <option value="Hospital Staff">Hospital Nurse / Lab Tech / Pharmacist
                               </option>
                               <option value="Medical Representative">Medical Representative</option>
                               <option value="IT / Software Employee">IT / Software Employee</option>

                               <!-- Others -->
                               <option value="Home Maker">Home Maker</option>
                               <option value="Retired">Retired</option>
                               <option value="Others">Others</option>
                            </select>
                         </div>
                      </div>

                      <div class="d-flex justify-content-end gap-2 border-top pt-3">
                         <button type="button" class="btn btn-sm btn-outline-warning fw-bold px-3" onclick="resetMemberFilters()">
                            Clear Filters
                         </button>
                         <button type="button" class="btn btn-sm btn-secondary fw-bold px-3" onclick="toggleFilterSection()">
                            Close
                         </button>
                      </div>
                   </div>
                </div>
             <?php endif; ?>


            <div class="container-fluid pt-3 px-0 px-md-4 memberpadd"><!----------------table-------->
               <div class="mb-2 fw-bold" style="color: #444; font-size: 1.1rem;" id="memberTotalCountHolder">Total Members: <span class="badge bg-primary rounded-pill"><?php echo count($members) ?></span></div>
               <div class="table-responsive">
                  <table class="table custom-table">
                     <thead <?php if (count($members) == 0) {
                        echo "hidden";
                     } ?>>
                        <tr>
                           <th>S.No</th>
                           <th>User ID</th>
                           <th>Name</th>
                           <th>Mobile</th>
                           <th>District</th>
                           <th>Taluk</th>
                           <th>Panchayat</th>
                           <th class="text-center">Actions</th>
                        </tr>
                     </thead>
                     <tbody id="ps-members">

                     </tbody>
                  </table>
               </div>

            </div> <!----------------table-end------->

            <div class='d-flex justify-content-center container-fluid'>
               <!-----------------pagination---------------------->

               <div id="membersPagination" class="col-md-6 py-2 d-flex justify-content-around align-items-center">


               </div>
            </div><!--------------pagination-end--------------------->

         </div><!-----------main-dashboard-end------------------------>


      </div><!--------------main-navbar-end------------------->

   </div>



   <!---------------------offcanvas-------------------------->

   <div class="offcanvas offcanvas-start" id="ps-menu">

      <div class="offcanvas-header">
         <h1 class="text-secondary text-center">MENU</h1>
         <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
      </div>

      <div id="offcanvasmenu" class="offcanvas-body">

      </div>

   </div>

   <!---------------------offcanvas-end-------------------------------->



   <!-----------------------Add-member-modal-------------------------------------------->

   <div id="members-modal-hide" class="members-modal">

      <div id="add-members-form" style="overflow-y:auto;border-radius:25px;" class="bg-white pb-2">
         <div id="formforregistration" style="overflow-y:auto;border-radius:25px;" class="container">
            <!---------------form-start----------------->
            <div style="position:relative;top:0;" class="pt-4">
               <h3 class="text-center">Kaadaikulam Registration Form<button onclick="hidemembersform()"
                     class="float-end btn btn-close me-auto"></button></h3>

            </div>

            <form name="memberregistration" id="registration-form" onsubmit="return validateMemberaddform()"
               action="<?= base_url("registerMember"); ?>" method="post" enctype="multipart/form-data"
               autocomplete="off">


               <div><span style="color:#295CF5;">Note: <span style="color:red;font-weight:500;">*</span> Indicates
                     Mandatory.</span></div>
               <div class="row"><!---------------row-start-------------------->
                  <div class="col-md-4"><!--------------col-one------------------->

                     <div class="d-flex mt-2 py-2">
                        <label for="name">Name:&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                           <input onkeyup="validateInputfield(this)" id="namefield" class="rounded border" type="text"
                              name="name">
                           <small id="nameerror" style="color:red;"></small></label>
                     </div>

                     <div class="d-flex mt-2 py-2">
                        <label for="state">State:&nbsp;<span style="color:red;">*</span><br>
                           <select id="states-dropdown" onchange="setDropdowndistricts(this)"
                              class="rounded border pb-1" type="text" name="state">
                              <option value=''>Select State</option>
                              <?php if (isset($states)): ?>
                              <?php foreach ($states as $key => $state): ?>
                              <option value='<?= $state->state_id ?>'><?= $state->state_title ?></option>
                              <?php endforeach; ?>
                              <?php endif ?>
                           </select>
                           <small id="stateerror" style="color:red;"></small>
                        </label>
                     </div>

                     <div class="d-flex mt-2 py-2">
                        <label for="district">District:&nbsp;<span style="color:red;">*</span><br>
                           <select id="districts-dropdown" onchange="setDropdowntaluks(this)"
                              class="rounded border pb-1" type="text" name="district">
                              <option value="">Select District</option>
                           </select>
                           <small id="districterror" style="color:red;"></small></label>
                     </div>

                     <div class="d-flex mt-2 py-2">
                        <label for="taluk">Taluk:&nbsp;<span style="color:red;">*</span><br>
                           <select id="taluks-dropdown" onchange="setDropdownpanchayat(this)"
                              class="rounded border pb-1" type="text" name="taluk">
                              <option value="">Select Taluk</option>
                           </select>
                           <small id="talukerror" style="color:red;"></small>
                        </label>
                     </div>

                     <div class="d-flex mt-2 py-2">
                        <label for="panchayat">Panchayat:&nbsp;<span style="color:red;">*</span><br>
                           <select id="panchayat-dropdown" class="rounded border pb-1" type="text" name="panchayat">
                              <option value="">Select Panchayat</option>
                           </select>
                           <small id="panchayaterror" style="color:red;"></small></label>
                     </div>

                  </div><!--------------col-one-end------------------->

                  <div class="col-md-4"><!--------------col-second------------------->

                     <div class="d-flex mt-2 py-2">
                        <label for="villagename">Village Name:&nbsp;<span style="color:red;">*</span><br><input
                              id="villagefield" onkeyup="validateInputfield(this)" class="rounded border" type="text"
                              name="village">
                           <small id="villageerror" style="color:red;"></small></label>
                     </div>

                     <div class="d-flex mt-2 py-2">
                        <label for="streetname">Street Name:&nbsp;<span style="color:red;">*</span><br><input
                              id="streetfield" onkeyup="validateInputfield(this)" class="rounded border" type="text"
                              name="street">
                           <small id="streeterror" style="color:red;"></small></label>
                     </div>

                     <div class="d-flex mt-2 py-2">
                        <label for="doorno">Door Number:&nbsp;<span style="color:red;">*</span><br>
                           <input id="doornofield" onkeyup="validateInputfield(this)" class="rounded border" type="text"
                              name="doorno">
                           <small id="doornoerror" style="color:red;"></small></label>
                     </div>

                     <div class="d-flex mt-2 py-2">
                        <label for="pincode">Pin Code:&nbsp;<span style="color:red;">*</span><br>
                           <input id="pincodefield" onkeyup="validateInputfield(this)" class="rounded border"
                              onkeypress="if(this.value.length == 6) return false" type="number" name="pincode">
                           <small id="pincodeerror" style="color:red;"></small>
                        </label>
                     </div>

                     <div class="d-flex mt-2 py-2">
                        <label for="existfamilyid">Existing Family Id:&nbsp;<small class="text-muted">Your father family
                              id. if exist.</small><br>
                           <input id="familyidfield" onkeyup="validateInputfield(this)" class="rounded border"
                              type="text" name="existfamilyid">
                           <small id="familyiderror" style="color:red;"></small>
                        </label>
                     </div>

                  </div><!--------------col-second-end------------------>

                  <div class="col-md-4"><!--------------col-third------------------->

                     <div class="d-flex mt-2 py-2">
                        <label for="phoneno">Phone Number:&nbsp;<span style="color:red;">*</span><br>
                           <input id="phonenofield" class="rounded border" type="number"
                              onkeyup="validateInputfield(this)" name="phoneno">
                           <small id="phonenoerror" style="color:red;"></small></label>
                     </div>


                     <div class="d-flex mt-2 py-2">
                        <label for="aadharno">Aadhar Number:&nbsp;<span style="color:red;">*</span><br><input
                              id="aadharnofield" onkeyup="validateInputfield(this)"
                              onkeypress="if(this.value.length == 12) return false" class="rounded border" type="number"
                              name="aadharno">
                           <small id="aadharnoerror" style="color:red;"></small></label>
                     </div>

                  </div><!--------------col-third-end------------------>

                  <div class="row"><!----------------file-row-------------->
                     <div class="col-md-3">
                        <div class="mt-2 py-2">
                           <label for="passportphoto" class="custom-file-input" style="min-height: 40px; display: block; font-size: 14px; font-weight: 500;">Upload Your Passport size photo:&nbsp;<span style="color: #ff0000 !important; font-weight: bold;">*</span></label>
                           <input onchange="uploadFileaddmemberform(this)" id="passportphoto" class="rounded container-fluid border"
                                 type="file" name="selfimage" accept="image/jpg,image/jpeg,image/png">
                           <small style="color:red;" class="selfimage"></small>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="mt-2 py-2">
                           <label for="aadharfrontimage" style="min-height: 40px; display: block; font-size: 14px; font-weight: 500;">Upload Aadhar Front image:&nbsp;<span style="color: #ff0000 !important; font-weight: bold;">*</span></label>
                           <input onchange="uploadFileaddmemberform(this)"
                                 class="rounded container-fluid border" type="file" name="aadharfrontimage"
                                 accept="image/jpg,image/jpeg,image/png">
                           <small style="color:red;" class="aadharfrontimage"></small>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="mt-2 py-2">
                           <label for="aadharbackimage" style="min-height: 40px; display: block; font-size: 14px; font-weight: 500;">Upload Aadhar Back image:&nbsp;<span style="color: #ff0000 !important; font-weight: bold;">*</span></label>
                           <input onchange="uploadFileaddmemberform(this)"
                                 class="rounded container-fluid border" type="file" name="aadharbackimage"
                                 accept="image/jpg,image/jpeg,image/png">
                           <small style="color:red;" class="aadharbackimage"></small>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="mt-2 py-2">
                           <label for="communitycertificate" style="min-height: 40px; display: block; font-size: 14px; font-weight: 500;">Upload Community Certificate:&nbsp;<span style="color: #ff0000 !important; font-weight: bold;">*</span></label>
                           <input onchange="uploadFileaddmemberform(this)"
                                 class="rounded container-fluid border" type="file" name="communitycertificate"
                                 accept="image/jpg,image/jpeg,image/png">
                           <small style="color:red;" class="communitycertificate"></small>
                        </div>
                     </div>
                  </div><!----------------file-row-end------------->
                  <div class="mt-2 text-center">
                      <span style="color:#295CF5;">Note: File Size should be below 2MB.</span>
                  </div>

               </div><!---------------row-end-------------------->

               <div class="d-flex justify-content-center">
                  <div>
                     <div class="d-flex justify-content-center"><input onchange="activateButton(this)"
                           type="checkbox">&nbsp;&nbsp;<label for="correctdetails">Above details are correct</label>
                     </div>
                     <div class="d-flex justify-content-center">
                        <button id="submitbutton" disabled type="submit" class="btn fw-bold">Register</button>
                     </div>
                  </div>
               </div>
            </form>
         </div><!---------------form-end----------------->
      </div>
   </div>
   <!-----------------------------Add-member-end-------------------------------->


   <!-----------------------Update-member-modal-------------------------------------------->

   <div id="updatemember-modal-hide" class="updatemember-modal">
      <div id="update-member-section" style="overflow-y:auto;border-radius:25px;" class="bg-white">

         <div id="update-member-form" class="container bg-white">


         </div>
      </div>
   </div>
   <!-----------------------------Update-member-end-------------------------------->

   <!--------------------------delete-modal---------------------->

   <div class="modal fade" id="deletemodal">

      <div class="modal-dialog">
         <div class="modal-content">

            <div class="modal-header">
               <h4 style="color:red;">Reject Member</h4>
               <button class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div id="deletebox" class="modal-body">

            </div>

         </div>
      </div>

   </div>

   <!--------------------------delete-modal-end------------------>


   <!------------------------show-list------------------------->
   <div id="showmembers" class="modal fade">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
         <div class="modal-content">
            <div class="modal-header">
               <h4>Assign coordinators for members:</h4>
               <button class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div id="memberslistforassign" class="modal-body">

            </div>

         </div>
      </div>

   </div>
   <!--------------------------show-list-end---------------------->

   <!-----------------set-index--------------------->
   <?php
   if (isset($_SESSION["altermembersindex"]) && isset($counts)) {
      $index = $_SESSION["altermembersindex"];
      if ($counts > 50) {
         $index = $index + 1;
         echo "<script>
       activepage = document.querySelectorAll('.active');
         let l = activepage.length;
         for(let i=0; i < l ; i++){
          if(activepage[i].innerText == $index ){
               activepage[i].classList.add('active-page');
          }
          else{
            if(activepage[i].classList.contains('active-page')){
               activepage[i].classList.remove('active-page')
            }
          }   
         } 
     </script>";
      } else {
         echo "<script>
       activepage = document.querySelectorAll('.active');
         let l = activepage.length;
         for(let i=0; i < l ; i++){
          if(i == $index ){
               activepage[i].classList.add('active-page');
          }
          else{
            if(activepage[i].classList.contains('active-page')){
               activepage[i].classList.remove('active-page')
            }
          }   
         } 
     </script>";
      }
   }

   unset($_SESSION["altermembersindex"]);
   ?>
   <!-----------------set-index-end-------------------->



   <script>

      let pageheight = window.innerHeight;
      // document.getElementById("pageheight").style.height = pageheight+"px";

      let win_height = window.innerHeight;
      // let form_container = document.getElementById("form-container");
      // form_container.style.height = `${win_height}px`;
      let reg_form_height = win_height * (95 / 100);
      let reg_form_section = document.getElementById("add-members-form");
      reg_form_section.style.height = `${reg_form_height}px`;
      let showaddmember = document.getElementById("members-modal-hide");
      let showupdatemember = document.getElementById("updatemember-modal-hide");
      let membersData = [];
      <?php if (isset($members) && !empty($members)): ?>
         membersData = <?php echo json_encode($members); ?> || [];
      <?php endif; ?>

      function renderMembers(data, sNo) {
         let html = "";
         let i = sNo + 1;

         data.forEach(value => {
            html += `
            <tr style="cursor: pointer;" onclick="viewMemberdata('view-member-data?member_id=${value.Familymembershipid}')">
                    <td class='ps-4'>${i}</td>
                    <td class='text-primary fw-bold'>${value.Familymembershipid}</td>
                    <td class='fw-bold text-dark'>${value.Name}</td>
                    <td>${value.Phonenumber}</td>
                    <td>${value.District}</td>
                    <td>${value.Taluk}</td>
                    <td>${value.Panchayat}</td>
                    <td onclick="event.stopPropagation();">
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <button ${value.MemberRole != 'Head' ? 'hidden' : ''} onclick="showupdatemembermodal('${value.Familymembershipid}')" class='btn btn-sm btn-outline-primary rounded-circle updatecoord' style='width:32px;height:32px;padding:0;'><i class='fa-regular fa-pen-to-square'></i><span class='updatetooltip'>Update Details</span></button>
                            <button data-bs-toggle='modal' data-bs-target='#deletemodal' onclick="showRejectMemberModal('${value.Id}','${value.Name}','${value.Taluk}')" class='btn btn-sm btn-outline-danger shadow-sm rounded-circle trashcoord' style='width:32px;height:32px;padding:0;'><i class='fa-solid fa-user-xmark'></i><span class='trashtooltip'>Reject</span></button>
                            <button onclick ="viewMemberdata('view-member-data?member_id=${value.Familymembershipid}')" class='btn btn-sm btn-outline-secondary shadow-sm rounded-circle' style='width:32px;height:32px;padding:0;' data-bs-toggle='tooltip' title='View Details'><i class='fa-sharp fa-solid fa-eye'></i></button>
                        </div>
                    </td>
            </tr>
        `;
            i++;
         });

         document.getElementById("ps-members").innerHTML = html;
      }

      renderMembers(membersData.slice(0, 10), 0);

      function initPagination() {
          let membersCount = membersData.length;
          let countsperpage = 10;
          let noofpages = Math.ceil(membersCount / countsperpage);
          let totalpagesarr = Array.from({ length: noofpages }, (_, i) => i);
          let totalpages = totalpagesarr.length;
          let initialindex = 0;
          let lastindex = 5;
          let pages = totalpagesarr.slice(initialindex, lastindex);
          let paginationHtml = "";

          if (membersCount > 0) {
              paginationHtml = `<button disabled onclick='changeMembersPagesetup(0)' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id = 'arrow' class='fa-solid fa-arrow-left-long'></i></button>`;

              for (let i = 0; pages.length > i; i++) {
                  let count = countsperpage * pages[i];
                  let pageno = pages[i] + 1;
                  if (pageno == 5) {
                      paginationHtml += `<button style='width:35px;height:35px;border: none;' onclick='changeMembersPagesetup(${pages[i]})' class='${i == 0 ? 'active-page' : ''} active text-decoration-none bg-white d-flex align-items-center justify-content-center ps-gray rounded-circle'>${pageno}</button>`;
                  }
                  else {
                      paginationHtml += `<button style='width:35px;height:35px;' onclick='displayMembers(${count},${i})' class='${i == 0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>`;
                  }
              }

              paginationHtml += "<span>...</span>";
              let totalcount = (totalpages - lastindex);
              let newindex = initialindex + lastindex;
              let validNext = totalpages - initialindex;
              paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeMembersPagesetup(${totalcount})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${totalpages}</button>`;

              paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeMembersPagesetup(${newindex})' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></button>`;
          } else {
              paginationHtml = "<span>No pages available</span>";
          }
          setUpPagination(paginationHtml);
          renderMembers(membersData.slice(0, 10), 0);
          document.getElementById('memberTotalCountHolder').innerHTML = `Total Members: <span class="badge bg-primary rounded-pill">${membersCount}</span>`;
      }

      function setUpPagination(html) {
         document.getElementById("membersPagination").innerHTML = html;
      }

      initPagination();

      function changeMembersPagesetup(nextStagedNo) {
         let membersCount = membersData.length;
         let countsperpage = 10;
         let prevlist = "";
         let noofpages = Math.ceil(membersCount / countsperpage);
         let totalpagesarr = Array.from({ length: noofpages }, (_, i) => i);
         let totalpages = totalpagesarr.length;
         let start = nextStagedNo > noofpages ? 0 : nextStagedNo;
         let lastindex = nextStagedNo + 5;
         let pages = totalpagesarr.slice(nextStagedNo, lastindex);
         prevlist = start < 5 ? 0 : nextStagedNo - 5;
         let validPrev = totalpages - nextStagedNo;
         let paginationHtml = `<button ${validPrev <= 0 ? 'disabled' : ''} onclick='changeMembersPagesetup(${prevlist})' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-left-long'> </i></button>`;

         for (let j = 0; pages.length > j; j++) {
            let count = countsperpage * pages[j];
            let pageno = pages[j] + 1;

            if (pageno == 5 || pageno - start == 5) {
               paginationHtml += pageno == totalpages ? `<button style='width:35px;height:35px;border: none;' onclick='displayMembers(${count},${j})' class='${j == 0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>` : `<button onclick='changeMembersPagesetup(${pageno - 1})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='${j == 0 ? 'active-page' : ''} active text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${pageno}</button>`;
            }
            else {
               paginationHtml += `<button style='width:35px;height:35px;' onclick='displayMembers(${count},${j})' class='${j == 0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>`;
            }
         }

         paginationHtml += "<span>...</span>";
         let totalcount = totalpages - lastindex;
         let newindex = start + lastindex;
         let validNext = totalpages - start;
         paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeMembersPagesetup(${totalcount})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${totalpages}</button>`;
         paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeMembersPagesetup(${totalpages - start <= lastindex ? totalcount : newindex})'  style='cursor:pointer;border: none;' class='text-decoration-none text-dark bg-white'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></button>`;
         setUpPagination(paginationHtml);
         let itemsPerPage = 10;
         let itemStart = nextStagedNo * itemsPerPage;
         let itemEnd = itemStart + itemsPerPage;
         renderMembers(membersData.slice(itemStart, itemEnd), itemStart);
      }



      $.ajax({
         type: "get",
         url: "<?= base_url('members/sidemenu'); ?>",
         success: (result) => {
            document.getElementById("menu-bar").innerHTML = result;
            document.getElementById("offcanvasmenu").innerHTML = result;
         },
         error: (error) => {
            document.getElementById("menu-bar").innerHTML = error;
         }
      });

      $.ajax({
         type: "get",
         url: "<?= base_url('members/topmenu'); ?>",
         success: (result) => {
            document.getElementById("search-bar").innerHTML = result;
            //  document.getElementById("searchmembers").style.display = "flex";
            //  document.getElementById("memberssubmenu").style.display = "flex"; 
         },
         error: (error) => {
            document.getElementById("search-bar").innerHTML = error;
         }
      });


      // Mobile Menu Functions
      function openMobileMenu() {
        document.getElementById('custom-mobile-menu').style.display = 'block';
      }

      function closeMobileMenu() {
        document.getElementById('custom-mobile-menu').style.display = 'none';
      }

      $.ajax({
      type:"get",
      url:"members/sidemenu",
      success:(result)=>{
           document.getElementById("menu-bar").innerHTML = result;
           // Populate custom mobile menu content
           document.getElementById("mobile-menu-content").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("menu-bar").innerHTML = "Error fetching menu";
      }
      });

      $.ajax({
         type: "get",
         url: "<?= base_url('members/pslogo'); ?>",
         success: (result) => {
            document.getElementById("ps-logo").innerHTML = result;
         },
         error: (error) => {
            document.getElementById("ps-logo").innerHTML = error;
         }
      });

      function setDropdowndistricts(state) {
         document.getElementById("districts-dropdown").innerHTML = "<option value=''>Select District</option>";
         document.getElementById("taluks-dropdown").innerHTML = "<option value=''>Select Taluk</option>";
         document.getElementById("panchayat-dropdown").innerHTML = "<option value=''>Select Panchayat</option>";
         commonSearch();
         let state_id = state.value;
         $.ajax({
            type: "get",
            url: "<?= base_url('members/getDistrictsfordropdown') ?>",
            data: { "state_id": state_id },
            success: (result) => {
               document.getElementById("districts-dropdown").innerHTML = result;
            },
            error: () => {
               document.getElementById("districts-dropdown").innerHTML = "";
            }
         });
      }

      function setDropdowntaluks(district) {
         document.getElementById("taluks-dropdown").innerHTML = "<option value=''>Select Taluk</option>";
         document.getElementById("panchayat-dropdown").innerHTML = "<option value=''>Select Panchayat</option>";
         commonSearch();
         let district_name = district.value;
         $.ajax({
            type: "get",
            url: "<?= base_url('members/getTaluksfordropdown') ?>",
            data: { "district_name": district_name },
            success: (result) => {
               document.getElementById("taluks-dropdown").innerHTML = result;
            },
            error: () => {
               document.getElementById("taluks-dropdown").innerHTML = "";
            }
         });
      }

      function setDropdownpanchayat(taluk) {
         document.getElementById("panchayat-dropdown").innerHTML = "<option value=''>Select Panchayat</option>";
         commonSearch();
         let taluk_name = taluk.value;
         $.ajax({
            type: "get",
            url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
            data: { "taluk_name": taluk_name },
            success: (result) => {
               document.getElementById("panchayat-dropdown").innerHTML = result;
            },
            error: () => {
               document.getElementById("panchayat-dropdown").innerHTML = "";
            }
         });
      }

      let windowheight = window.innerHeight;
      let form_height = windowheight * (95 / 100);
      let form_section = document.getElementById("update-member-section");
      form_section.style.height = `${form_height}px`;

      /* height calculations removed for single full scroll */
   /*  function showmemberslist(){
      $.ajax({
      type:"get",
      url:"members/getmemberslist",
      success:(result)=>{
           document.getElementById("memberslistforassign").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("memberslistforassign").innerHTML = error;
      }
      });
      } */
     /*--------multiple slect option---------------->*/

      // document.getElementById("menu-bar").style.height = window.innerHeight+"px";

      function commonSearch(searchInput) {
         let search = "";
         if (searchInput) {
             search = searchInput.value;
         } else {
             let inputEl = document.querySelector("#commonsearch input");
             if (inputEl) {
                 search = inputEl.value;
             }
         }

         let state = document.getElementById("states-dropdown").value;
         let district = document.getElementById("districts-dropdown").value;
         let taluk = document.getElementById("taluks-dropdown").value;
         let panchayat = document.getElementById("panchayat-dropdown").value;
         let bloodgroup = document.getElementById("bloodgroup-dropdown").value;
         let gender = document.getElementById("gender-dropdown").value;
         let occupation = document.getElementById("occupation-dropdown").value;

         let searchfields = {
            "search": search,
            "state_id": state,
            "district": district,
            "taluk": taluk,
            "panchayat": panchayat,
            "bloodgroup": bloodgroup,
            "gender": gender,
            "occupation": occupation
         };

         $.ajax({
            type: "get",
            url: "<?= base_url('members/searchmembers') ?>",
            data: { "searchfields": searchfields },
            dataType: "json",
            success: (result) => {
               membersData = result.members || [];
               initPagination();
            },
            error: (error) => {
               document.getElementById('ps-members').innerHTML = "<tr><td colspan='8'>Error fetching data</td></tr>";
            }
         })
      }

      function displayMembers(counts, index) {
         const itemsPerPage = 10;
         const start = counts;
         const end = counts + itemsPerPage;
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
         renderMembers(membersData.slice(start, end), start);
      }

      /*     function changemembersPagesetup(initialIndex,lastindex){
            console.log(initialIndex);
            $.ajax({
              type:"get",
              url:"displaymembers",
              data:{"initialindex":initialIndex,"lastindex":lastindex},
              success:function(result){
                  document.getElementById('ps-members').innerHTML = result;
              },
              error:function(err){
                document.getElementById('ps-members').innerHTML = err;
              }
            })
          } */

      /* menu-bar height removed for single scroll */

      window.addEventListener("resize", () => {
         /* menu-bar height removed for single scroll */
         
         let addMembersForm = document.getElementById("add-members-form");
         let updateMemberSection = document.getElementById("update-member-section");
         let b = window.innerWidth;
         
         if (b > 768) {
            if (addMembersForm) addMembersForm.style.left = "2.5%";
            if (updateMemberSection) updateMemberSection.style.left = "2.5%";
         }
         else {
            if (addMembersForm) addMembersForm.style.left = "5%";
            if (updateMemberSection) updateMemberSection.style.left = "2.5%";
         }
      });

      showaddmember.style.height = 100 + window.innerHeight + "px";
      showupdatemember.style.height = 100 + window.innerHeight + "px";

      function showmembersmodal() {
         // let showaddmember = document.getElementById("members-modal-hide");
         // showaddmember.style.display = "block";
         let formmodal = document.getElementById("add-members-form");
         let b = window.innerWidth;
         if (b > 768) {
            showaddmember.style.left = "0%";
            formmodal.style.left = "2.5%";
         }
         else {
            showaddmember.style.left = "0%";
            formmodal.style.left = "2.5%";
         }
      }


      function showupdatemembermodal(id) {
         let formmodal = document.getElementById("update-member-section");
         let b = window.innerWidth;
         $.ajax({
            type: "get",
            url: "<?= base_url('members/getmember') ?>",
            data: { "id": id },
            success: (result) => {
               $("#update-member-form").html(result);
            },
            error: function (error) {
               $("#update-member-form").html("Error fetching member details");
            }
         });

         if (b > 768) {
            showupdatemember.style.left = "0%";
            formmodal.style.left = "2.5%";

         }
         else {
            showupdatemember.style.left = "0%";
            formmodal.style.left = "2.5%";
         }
      }

      function setDropdowndistrictsForUpdate(state) {
         let state_id = state.value;
         $.ajax({
            type: "get",
            url: "members/getDistrictsfordropdown",
            data: { "state_id": state_id },
            success: (result) => {
               document.getElementById("districts-dropdown-update").innerHTML = result;
            },
            error: () => {
               document.getElementById("districts-dropdown-update").innerHTML = "<option>Error fetching Districts</option>";
            }
         });
      }

      function setDropdowntaluksForUpdate(district) {
         let district_name = district.value;
         $.ajax({
            type: "get",
            url: "members/getTaluksfordropdown",
            data: { "district_name": district_name },
            success: (result) => {
               document.getElementById("taluks-dropdown-update").innerHTML = result;
            },
            error: () => {
               document.getElementById("taluks-dropdown-update").innerHTML = "";
            }
         });
      }

      function setDropdownpanchayatForUpdate(taluk) {
         let taluk_name = taluk.value;
         $.ajax({
            type: "get",
            url: "members/getPanchayatsfordropdown",
            data: { "taluk_name": taluk_name },
            success: (result) => {
               document.getElementById("panchayat-dropdown-update").innerHTML = result;
            },
            error: () => {
               document.getElementById("panchayat-dropdown-update").innerHTML = "";
            }
         });
      }

      function validateInputfield(field) {
         let field_name = field.name;
         let field_value = field.value;
         let textregex = /^[A-Za-z\s]+$/;
         let alphanumericregex = /^[a-zA-Z0-9/()\s]+$/;
         let normalregex = /^[A-Za-z0-9]+$/;
         let panvalidate = /^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]+$/;

         if (field_name == "name") {
            if (field_value.length < 3) {
               field.nextElementSibling.innerHTML = "Min 3 characters required.";
            }
            else if (field_value !== "" && !field_value.match(textregex)) {
               field.nextElementSibling.innerHTML = "Only letters and spaces allowed for name field.";
            }
            else {
               field.nextElementSibling.innerHTML = "";
            }
         }

         if (field_name == "village" || field_name == "street") {
            if (field_value !== "" && !field_value.match(alphanumericregex)) {
               field.nextElementSibling.innerHTML = "Only letters,numbers,spaces are allowed.";
            }
            else {
               field.nextElementSibling.innerHTML = "";
            }
         }

         if (field_name == "doorno") {
            if (field_value !== "" && !field_value.match(alphanumericregex)) {
               field.nextElementSibling.innerHTML = "Don\'t use special characters.";
            }
            else {
               field.nextElementSibling.innerHTML = "";
            }
         }

         if (field_name == "pincode") {
            if (field_value.length == 6 || field_value.length == 0) {
               document.getElementById("pincodeerror").innerHTML = "";
            }
            else if (field_value.length < 6) {
               document.getElementById("pincodeerror").innerHTML = "Pincode number should contain 6 digits.";
            }
         }

         if (field_name == "phoneno") {
            if (field_value.length >= 10 || field_value.length == 0) {
               $.ajax({
                  type: "post",
                  url: "members/checkExistphoneno",
                  data: { "phoneno": field_value },
                  success: (result) => {

                     if (result.trim() == "true") {
                        document.getElementById("phonenoerror").innerHTML = "Phone number already exist.";
                     }
                     else {
                        document.getElementById("phonenoerror").innerHTML = "";
                     }
                  },
                  error: (error) => {
                     document.getElementById("phonenoerror").innerHTML = "Error fetching Phone Number";
                  }
               });

            }
            else if (field_value.length < 10) {
               document.getElementById("phonenoerror").innerHTML = "Phone number should contain 10 digits.";
            }
         }

         if (field_name == "existfamilyid") {
            if (field_value !== "" && !field_value.match(alphanumericregex)) {
               field.nextElementSibling.innerHTML = "Only letters,numbers are allowed.";
            }
            else {
               field.nextElementSibling.innerHTML = "";
            }
         }


         if (field_name == "aadharno") {
            if (field_value.length == 12 || field_value.length == 0) {
               $.ajax({
                  type: "post",
                  url: "members/checkExistaadharno",
                  data: { "aadharno": field_value },
                  success: (result) => {
                     if (result.trim() == "true") {
                        document.getElementById("aadharnoerror").innerHTML = "Aadhar Number number already exist.";
                     }
                     else {
                        document.getElementById("aadharnoerror").innerHTML = "";
                     }

                  },
                  error: (error) => {
                     document.getElementById("aadharnoerror").innerHTML = "Error fetching Aadhar Number";
                  }
               });

            }
            else if (field_value.length < 12) {
               document.getElementById("aadharnoerror").innerHTML = "Aadhar number should contain 12 digits.";
            }
         }
      }

      function validateUpdateInputfield(field) {
         let field_name = field.name;
         let field_value = field.value;
         let textregex = /^[A-Za-z\s]+$/;
         let alphanumericregex = /^[a-zA-Z0-9/()\s]+$/;
         let normalregex = /^[A-Za-z0-9]+$/;

         if (field_name == "name-update") {
            if (field_value.length < 3) {
               field.nextElementSibling.innerHTML = "Min 3 characters required.";
            }
            else if (field_value !== "" && !field_value.match(textregex)) {
               field.nextElementSibling.innerHTML = "Only letters and spaces allowed for name field.";
            }
            else {
               field.nextElementSibling.innerHTML = "";
            }
         }

         if (field_name == "village-update" || field_name == "street") {
            if (field_value !== "" && !field_value.match(alphanumericregex)) {
               field.nextElementSibling.innerHTML = "Only letters,numbers,spaces are allowed.";
            }
            else {
               field.nextElementSibling.innerHTML = "";
            }
         }

         if (field_name == "doorno-update") {
            if (field_value !== "" && !field_value.match(alphanumericregex)) {
               field.nextElementSibling.innerHTML = "Don\'t use special characters.";
            }
            else {
               field.nextElementSibling.innerHTML = "";
            }
         }

         if (field_name == "pincode-update") {
            if (field_value.length == 6 || field_value.length == 0) {
               document.getElementById("pincodeerror-update").innerHTML = "";
            }
            else if (field_value.length < 6) {
               document.getElementById("pincodeerror-update").innerHTML = "Pincode number should contain 6 digits.";
            }
         }

         if (field_name == "phoneno-update") {
            console.log(field_value.length)
            if (field_value.length < 10) {
               document.getElementById("phonenoerror-update").innerHTML = "Phone number should contain 10 digits.";
            }
            else if (field_value.length >= 10 || field_value.length == 0) {
               document.getElementById("phonenoerror-update").innerHTML = "";
            }

         }

         if (field_name == "existfamilyid-update") {
            if (field_value !== "" && !field_value.match(alphanumericregex)) {
               field.nextElementSibling.innerHTML = "Only letters,numbers are allowed.";
            }
            else {
               field.nextElementSibling.innerHTML = "";
            }
         }

         if (field_name == "aadharno-update") {
            if (field_value.length == 12 || field_value.length == 0) {
               document.getElementById("aadharnoerror-update").innerHTML = "";
            }
            else if (field_value.length < 12) {
               document.getElementById("aadharnoerror-update").innerHTML = "Aadhar number should contain 12 digits.";
            }
         }
      }

      function validateMemberform() {
         let memberregistrationform = document.forms["memberregistration-update"];
         let name = memberregistrationform["name-update"].value.trim();
         let state = memberregistrationform["state-update"].value.trim();
         let district = memberregistrationform["district-update"].value.trim();
         let taluk = memberregistrationform["taluk-update"].value.trim();
         let panchayat = memberregistrationform["panchayat-update"].value.trim();
         let village = memberregistrationform["village-update"].value.trim();
         let street = memberregistrationform["street-update"].value.trim();
         let doorno = memberregistrationform["doorno-update"].value.trim();
         let pincode = memberregistrationform["pincode-update"].value.trim();
         let existfamilyid = memberregistrationform["existfamilyid-update"].value.trim();
         let phoneno = memberregistrationform["phoneno-update"].value.trim();
         let aadharno = memberregistrationform["aadharno-update"].value.trim();
         let selfimage = memberregistrationform["Memberimage"].value.trim();
         let aadharfrontimage = memberregistrationform["Aadharfrontimage"].value.trim();
         let aadharbackimage = memberregistrationform["Aadharbackimage"].value.trim();
         let communitycertificate = memberregistrationform["Communitycertificate"].value.trim();
         let textregex = /^([A-Za-z\s]{3,})+$/;
         let alphanumericregex = /^[a-zA-Z0-9/()\s]+$/;
         let normalregex = /^[A-Za-z0-9]+$/;
         let panvalidate = /^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]+$/;
         // let phonenoregex = /^[6-9]\d{9}+$/;

         if (name == "") {
            document.getElementById("nameerror-update").innerHTML = "Please fill this filed.";

            return false;
         }

         else {
            if (!name.match(textregex)) {
               document.getElementById("nameerror-update").innerHTML = "Min 3 letters required.Only letters and spaces allowed for name field.";
               return false;
            }
         }

         if (state == "") {
            document.getElementById("stateerror-update").innerHTML = "Please choose state";
            return false;
         }

         if (district == "") {
            document.getElementById("districterror-update").innerHTML = "Please choose district.";
            return false;
         }

         if (taluk == "") {
            document.getElementById("talukerror-update").innerHTML = "Please choose taluk.";
            return false;
         }

         if (panchayat == "") {
            document.getElementById("panchayaterror-update").innerHTML = "Please choose panchayat.";
            return false;
         }

         if (village == "") {
            document.getElementById("villageerror-update").innerHTML = "Please fill village field";
            return false;
         }
         else {
            if (!village.match(alphanumericregex)) {
               document.getElementById("villageerror-update").innerHTML = "Only letters,numbers,spaces are allowed.";
               return false;
            }
         }

         if (street == "") {
            document.getElementById("streeterror-update").innerHTML = "Please fill street field";

            return false;
         }
         else {
            if (!street.match(alphanumericregex)) {
               document.getElementById("streeterror-update").innerHTML = "Only letters,numbers,spaces are allowed.";

               return false;
            }
         }

         if (doorno == "") {
            document.getElementById("doornoerror-update").innerHTML = "Please fill door no/apartment no field.";

            return false;
         }
         else {
            if (!doorno.match(alphanumericregex)) {
               document.getElementById("doornoerror-update").innerHTML = "Don\'t use special characters.";
               return false;
            }
         }

         if (pincode == "") {
            document.getElementById("pincodeerror-update").innerHTML = "Please fill phoneno field.";

            return false;
         }
         else if (pincode.length < 6) {
            document.getElementById("pincodeerror-update").innerHTML = "Pincode should contain 6 digits.";

            return false;
         }

         if (existfamilyid !== "") {
            if (!existfamilyid.match(normalregex)) {
               document.getElementById("familyiderror-update").innerHTML = "Only letters and numbers are allowed.";
               return false;
            }
         }

         if (phoneno == "") {
            document.getElementById("phonenoerror-update").innerHTML = "Please fill phoneno field.";
            return false;
         }


         if (aadharno == "") {
            document.getElementById("aadharnoerror-update").innerHTML = "Please fill aadharno field.";
            return false;
         }
         else if (aadharno.length < 12) {
            document.getElementById("aadharnoerror-update").innerHTML = "Aadhar number should contain 12 digits.";
            return false;
         }

         return true;
      }

      function uploadFile(file) {
         let errorbox = document.querySelector(`.${file.name}`);
         let imagesize = 2000000;
         let uploadedimagesize = file.files[0] ? file.files[0].size : 0;

         if (uploadedimagesize > imagesize) {
            errorbox.textContent = "File Size should be below 2MB";
            file.value = "";
            return false;
         }
         else {
            errorbox.textContent = "";
         }
      }

      function removeImage(button, file) {
         let imageid = file.name;
         document.getElementById(imageid).style.display = "none";
         button.style.display = "none";
         file.value = "";
      }

      function activateButton(checkbox) {
         let checked = checkbox.checked;
         let submitbutton = document.getElementById("submitbutton");
         if (checked) {
            submitbutton.removeAttribute("disabled");
         }
         else {
            submitbutton.setAttribute("disabled", "disabled");
         }
      }

      window.onclick = function (event) {

         if (event.target == showaddmember) {
            let formmodal = document.getElementById("add-members-form");
            let b = window.innerWidth;
            if (b > 768) {
               showaddmember.style.left = "-100%";
               formmodal.style.left = "-95%";
            }
            else {
               showaddmember.style.left = "-100%";
               formmodal.style.left = "-95%";
            }
         }

         else if (event.target == showupdatemember) {
            let formmodal = document.getElementById("update-member-section");
            let b = window.innerWidth;
            if (b > 768) {
               showupdatemember.style.left = "-100%";
               formmodal.style.left = "-95%";
            }
            else {
               showupdatemember.style.left = "-100%";
               formmodal.style.left = "-90%";
            }
         }
      }

      function hidemembersform() {
         let formmodal = document.getElementById("add-members-form");
         let b = window.innerWidth;
         if (b > 768) {
            showaddmember.style.left = "-100%";
            formmodal.style.left = "-95%";
         }
         else {
            showaddmember.style.left = "-100%";
            formmodal.style.left = "-90%";
         }

      }

      function hideupdatememberform() {
         let formmodal = document.getElementById("update-member-section");
         let b = window.innerWidth;
         if (b > 768) {
            showupdatemember.style.left = "-100%";
            formmodal.style.left = "-42%";
         }
         else {
            showupdatemember.style.left = "-100%";
            formmodal.style.left = "-90%";
         }
      }

      function uploadFileaddmemberform(file) {
         let errorbox = document.querySelector(`.${file.name}`);
         let imagesize = 2000000;
         let uploadedimagesize = file.files[0] ? file.files[0].size : 0;

         if (uploadedimagesize > imagesize) {
            errorbox.textContent = "File Size should be below 2MB";
            file.value = "";
            return false;
         }
         else {
            errorbox.textContent = "";
         }
      }

      function removeImageaddmemberform(button, file) {
         let imageid = file.name;
         document.getElementById(imageid).style.display = "none";
         button.style.display = "none";
         file.value = "";
      }


      function activateUpdateformbutton(checkbox) {
         let checked = checkbox.checked;
         let submitbutton = document.getElementById("updatesubmitbutton");
         if (checked) {
            submitbutton.removeAttribute("disabled");
         }
         else {
            submitbutton.setAttribute("disabled", "disabled");
         }
      }

      function validateMemberaddform() {
         let memberregistrationform = document.forms["memberregistration"];
         let name = memberregistrationform["name"].value.trim();
         let state = memberregistrationform["state"].value.trim();
         let district = memberregistrationform["district"].value.trim();
         let taluk = memberregistrationform["taluk"].value.trim();
         let panchayat = memberregistrationform["panchayat"].value.trim();
         let village = memberregistrationform["village"].value.trim();
         let street = memberregistrationform["street"].value.trim();
         let doorno = memberregistrationform["doorno"].value.trim();
         let pincode = memberregistrationform["pincode"].value.trim();
         let existfamilyid = memberregistrationform["existfamilyid"].value.trim();
         let phoneno = memberregistrationform["phoneno"].value.trim();
         let aadharno = memberregistrationform["aadharno"].value.trim();
         let selfimage = memberregistrationform["selfimage"].value.trim();
         let aadharfrontimage = memberregistrationform["aadharfrontimage"].value.trim();
         let aadharbackimage = memberregistrationform["aadharbackimage"].value.trim();
         let communitycertificate = memberregistrationform["communitycertificate"].value.trim();

         let textregex = /^([A-Za-z\s]{3,})+$/;
         let alphanumericregex = /^[a-zA-Z0-9/()\s]+$/;
         let normalregex = /^[A-Za-z0-9]+$/;
         let panvalidate = /^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]+$/;
         // let phonenoregex = /^[6-9]\d{9}+$/;

         if (name == "") {
            document.getElementById("nameerror").innerHTML = "Please fill this filed.";

            return false;
         }

         else {
            if (!name.match(textregex)) {
               document.getElementById("nameerror").innerHTML = "Min 3 letters required.Only letters and spaces allowed for name field.";
               return false;
            }
         }

         if (state == "") {
            document.getElementById("stateerror").innerHTML = "Please choose state";
            return false;
         }

         if (district == "") {
            document.getElementById("districterror").innerHTML = "Please choose district.";
            return false;
         }

         if (taluk == "") {
            document.getElementById("talukerror").innerHTML = "Please choose taluk.";
            return false;
         }

         if (panchayat == "") {
            document.getElementById("panchayaterror").innerHTML = "Please choose panchayat.";
            return false;
         }

         if (village == "") {
            document.getElementById("villageerror").innerHTML = "Please fill village field";
            return false;
         }
         else {
            if (!village.match(alphanumericregex)) {
               document.getElementById("villageerror").innerHTML = "Only letters,numbers,spaces are allowed.";
               return false;
            }
         }

         if (street == "") {
            document.getElementById("streeterror").innerHTML = "Please fill street field";

            return false;
         }
         else {
            if (!street.match(alphanumericregex)) {
               document.getElementById("streeterror").innerHTML = "Only letters,numbers,spaces are allowed.";

               return false;
            }
         }

         if (doorno == "") {
            document.getElementById("doornoerror").innerHTML = "Please fill door no/apartment no field.";

            return false;
         }
         else {
            if (!doorno.match(alphanumericregex)) {
               document.getElementById("doornoerror").innerHTML = "Don\'t use special characters.";
               return false;
            }
         }

         if (pincode == "") {
            document.getElementById("pincodeerror").innerHTML = "Please fill phoneno field.";

            return false;
         }
         else if (pincode.length < 6) {
            document.getElementById("pincodeerror").innerHTML = "Pincode should contain 6 digits.";

            return false;
         }

         if (existfamilyid !== "") {
            if (!existfamilyid.match(normalregex)) {
               document.getElementById("familyiderror").innerHTML = "Only letters and numbers are allowed.";
               d
               return false;
            }
         }

         if (phoneno == "") {
            document.getElementById("phonenoerror").innerHTML = "Please fill phoneno field.";

            return false;
         }


         if (aadharno == "") {
            document.getElementById("aadharnoerror").innerHTML = "Please fill aadharno field.";

            return false;
         }
         else if (aadharno.length < 12) {
            document.getElementById("aadharnoerror").innerHTML = "Aadhar number should contain 12 digits.";

            return false;
         }

         if (selfimage == "") {
            document.querySelector(".selfimage").textContent = "Please upload Passport size photo.";
            return false;
         }

         if (aadharfrontimage == "") {
            document.querySelector(".aadharfrontimage").textContent = "Please upload front aadhar card photo.";
            return false;
         }

         if (aadharbackimage == "") {
            document.querySelector(".aadharbackimage").textContent = "Please upload back aadhar card photo.";
            return false;
         }

         if (communitycertificate == "") {
            document.querySelector(".communitycertificate").textContent = "Please upload community certificate.";
            return false;
         }
         return true;
      }


      function showRejectMemberModal(id, name, area) {
         document.getElementById("deletebox").innerHTML = `
        <form id="memberRejectForm" method="POST" action="<?= base_url('rejectmember') ?>">
            <input type="hidden" name="applicationid" value="${id}">
            <div class="d-flex justify-content-center ">
                <span style="font-size:66px;color:red;"><i class="fa-solid fa-user-xmark"></i></span>
            </div>
            <p class="text-center fs-4">
                Reject Member <br><span style="color:green;" class="fs-5">${name} (${area})</span>
            </p> 
            <div class="mb-3">
                <label for="rejectreason" class="form-label fw-bold">Reject Reason:</label>
                <textarea name="rejectreason" id="member_reject_reason" class="form-control" rows="3" required placeholder="Enter reason for rejection..."></textarea>
            </div>
            <div class="d-flex justify-content-center gap-3">
                <button type="button" onclick="submitMemberRejection()" class="btn btn-danger rounded-3 px-4">Confirm Reject</button>
                <button type="button" class="btn btn-secondary rounded-3 px-4" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    `;
      }

      function submitMemberRejection() {
          let reason = document.getElementById("member_reject_reason").value;
          if(reason.trim() == "") {
              alert("Please enter a reason for rejection.");
              return;
          }
          document.getElementById("memberRejectForm").submit();
      }


      function movetotrash(id) {
         $.ajax({
            type: "get",
            url: "members/movetotrash",
            data: { "id": id },
            success: function (result) {
               document.getElementById('ps-members').innerHTML = result;
               psShowToast('success', 'Moved successfully!');
            },
            error: function (error) {
               psShowToast('error', 'An error occurred. Please try again.');
            }
         })
      }

      function viewMemberdata(url) {
         let a = document.createElement("a");
         a.href = url;
         a.dispatchEvent(new MouseEvent("click"));
      }


      /* let memberform = document.getElementById("members-form")
     
      memberform.addEventListener("submit",(e)=>{
        if(!membersubmit()){
          e.preventDefault();
        }
      })
     
      
      // console.log(coordsform["coordname"].value)
    
      function membersubmit(){
           let name = memberform["membername"].value;
           let aadhar = memberform["memberaadhar"].value;
           let phone = memberform["memberphone"].value;
           let area = memberform["memberarea"].value;
           console.log(name);
           $.ajax({
                  type:"post",
                  url:"members/addmember",
                  data:{"membername":name,"memberaadhar":aadhar,"memberphone":phone,"memberarea":area},
                  success:(result)=>{
                    document.getElementById("coo").innerHTML = "success";
                    hidemembersform();
                  },
                  error:(error)=>{
                  
                  }
               })
          
      }       */

      <?php if (session()->get('role') != 3): ?>
         function applyMemberFilters() {
            const stateId = $("#states-dropdown").val();
            const district = $("#districts-dropdown").val();
            const taluk = $("#taluks-dropdown").val();
            const panchayat = $("#panchayat-dropdown").val();
            const bloodgroup = $("#bloodgroup-dropdown").val();
            const gender = $("#gender-dropdown").val();
            const occupation = $("#occupation-dropdown").val();

            const searchfields = {
               state_id: stateId,
               district: district,
               taluk: taluk,
               panchayat: panchayat,
               bloodgroup: bloodgroup,
               gender: gender,
               occupation: occupation
            };

            $.ajax({
               type: "GET",
               url: "<?= base_url('members/searchmembers'); ?>",
               dataType: "json",
               data: { searchfields: searchfields },
               success: function (result) {
                  membersData = result.members || [];
                  initPagination();
               },
               error: function (xhr, status, err) {
                  console.log("searchmembers error:", xhr.status, status, err, xhr.responseText);
                  $("#ps-members").html(
                     "<tr><td colspan='8' class='text-center text-danger'>Error loading data</td></tr>"
                  );
               }
            });
         }
      <?php endif; ?>

      let payStatus = "";

function setPayStatus(r) {
  payStatus = r.value; // Paid / Unpaid
}

// eventyear -> event dropdown
function getEventsByYear(sel) {
  const year = sel.value;

  $("#eventid-dropdown").html('<option value="">Choose Event</option>');
  if (!year) return;

  $.ajax({
    type: "GET",
    url: "<?= base_url('members/get-events-by-year'); ?>",
    data: { year: year },
    success: function (html) {
      $("#eventid-dropdown").html(html);
    },
    error: function () {
      $("#eventid-dropdown").html('<option value="">Error loading events</option>');
    }
  });
}



function resetMemberFilters() {
  $("#states-dropdown").val("");
  $("#districts-dropdown").html('<option value="">Choose District</option>');
  $("#taluks-dropdown").html('<option value="">Choose Taluk</option>');
  $("#panchayat-dropdown").html('<option value="">Choose Panchayat</option>');

  $("#bloodgroup-dropdown").val("");
  $("#gender-dropdown").val("");
  $("#occupation-dropdown").val("");

  commonSearch();
}

function toggleFilterSection() {
    $("#filter-segment").slideToggle(400);
}

function toggleBulkUploadSection() {
    $("#bulk-upload-segment").slideToggle(400);
}


function downloadMembersExcel() {
    let search = "";
    let inputEl = document.querySelector("#commonsearch input");
    if (inputEl) {
        search = inputEl.value;
    }

    let state = document.getElementById("states-dropdown").value;
    let district = document.getElementById("districts-dropdown").value;
    let taluk = document.getElementById("taluks-dropdown").value;
    let panchayat = document.getElementById("panchayat-dropdown").value;
    let bloodgroup = document.getElementById("bloodgroup-dropdown").value;
    let gender = document.getElementById("gender-dropdown").value;
    let occupation = document.getElementById("occupation-dropdown").value;

    let baseUrl = "<?= base_url('download_members_excel'); ?>";
    let params = new URLSearchParams({
        "search": search,
        "state_id": state,
        "district": district,
        "taluk": taluk,
        "panchayat": panchayat,
        "bloodgroup": bloodgroup,
        "gender": gender,
        "occupation": occupation
    });

    window.location.href = baseUrl + "?" + params.toString();
}

   </script>

   <!-------------------------------chart-end------------------------------------>



   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>



<!---------------------Custom Mobile Menu-------------------------->
<div id="custom-mobile-menu">
    <div class="close-btn" onclick="closeMobileMenu()">&times;</div>
    <div id="mobile-menu-content">
        <!-- Content loaded via JS -->
    </div>
</div>
<!---------------------Custom Mobile Menu End-------------------------------->
</body>

</html>
