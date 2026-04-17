<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <!-- <link rel="stylesheet" href="./kaadaisoft.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   
    <style>
      .ps-logo{
        display:flex;
        align-items:center;
        justify-content:flex-start;
        padding-left: 20px;
      }
     .ps-gray{
        background-color: rgb(248, 245, 245);
     }
     .table-btn{
        background-color: rgb(239, 236, 236);
     }
     .active-bg{
      background-color:rgb(230, 230, 230);
     }
     .heading-kaadaisoft{
        color: rgb(0, 123, 255);
        font-weight:800;
        font-family:sans-serif;
     }
     .ps-letter{
        background-color: rgb(0, 123, 255);
     }
     .ps-user{
    background-color: rgb(254, 213, 163);;
     }
     .align{
        align-self:self-end;
     }
     .fa-magnifying-glass{
      color: gray;
     }
     .dashboard-cards{
    display:grid;
    grid-template-columns: repeat(auto-fit,minmax(150px,auto));
    gap:20px;
    }
    .card-round{
      border-radius:20px;
    }
    ul > li{
      cursor:pointer;
    }
    .card1{
    background-color: rgb(88, 194, 255);
     }
     .card2{
      background-color: rgb(233, 153, 3);
     }
     .card3{
      background-color: rgb(124, 9, 232);
     }
     .card4{
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
       
        display:grid;
        grid-template-columns: repeat(auto-fit,minmax(250px,700px)) ;
        grid-template-rows: repeat(auto-fit,minmax(200px,auto)) ;
        align-items: center;
      }
      .ps-table-grid{
        display:grid;
        grid-template-columns: repeat(auto-fit,minmax(300px,700px)) ;
      }
      .chartBox {
        /* height:fit-content; */
        padding: 10px;
        border-radius: 20px;
        /* border: solid 3px rgba(54, 162, 235, 1); */
        background: white;
      }

      #search-bar { padding: 0 !important; }
      
      .ps-add-btn {
        border: none;
        outline: none;
        background: linear-gradient(135deg, #0f172a, #1e293b);
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      }
      .ps-add-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        filter: brightness(1.2);
      }

      /* Modern Table Styling */
      .table-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }

      .custom-table-modern {
        margin-bottom: 0;
        min-width: 600px;
      }
      .custom-table-modern thead th {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
        padding: 16px;
        border: none;
        text-align: center;
      }
      .custom-table-modern tbody tr {
        transition: all 0.2s ease;
      }
      .custom-table-modern tbody tr:hover {
        background-color: #f8fafc;
        transform: scale(1.002);
        box-shadow: inset 4px 0 0 #3b82f6;
      }
      .custom-table-modern td {
        padding: 16px;
        vertical-align: middle;
        color: #334155;
        font-size: 0.95rem;
        border-bottom: 1px solid #f1f5f9;
        text-align: center;
      }

      .event-banner-wrapper {
        position: relative;
        width: 80px;
        height: 50px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        background-color: #f1f5f9;
        cursor: pointer;
      }
      .event-banner-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
      }
      .banner-change-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: rgba(15, 23, 42, 0.85);
        color: #fff;
        font-size: 10px;
        font-weight: 600;
        text-align: center;
        padding: 5px 0;
        opacity: 0;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
        z-index: 5;
      }
      .event-banner-wrapper:hover .banner-change-overlay {
        opacity: 1;
      }

      .action-btn {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        border: none;
        transition: all 0.2s;
        margin: 0 4px;
      }
      .btn-edit-modern {
        background-color: #eff6ff;
        color: #2563eb;
      }
      .btn-edit-modern:hover {
        background-color: #2563eb;
        color: #fff;
      }
      .btn-delete-modern {
        background-color: #fef2f2;
        color: #dc2626;
      }
      .btn-delete-modern:hover {
        background-color: #dc2626;
        color: #fff;
      }

      #search-bar{
            display:flex;
            align-items:center;
            justify-content:space-between;
      }
      
      .ham-line{
        width:30px;
        height:6px;
        background-color: rgb(70, 70, 70);
        margin-top:5px;
      }      
      .ps-add-btn{
        border:none;
        outline:none;
        background-color:rgb(23, 23, 184);
        border-radius:25px;

      }
      .active-page{
        background-color:#6495ED;
        font-weight:500;
        color:white;
      }
      .active{
        border:none;
        outline:none;
        font-weight:500;
        font-size:15px;
        
      }
      .ps-page-count{
        border:none;
        outline:none;
        font-weight:500;
        color:white;
        background-color:#6495ED;
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

      #events-form div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 0;
      }

      #events-form div > button{
        border-radius:50px;
      }

      #add-events-form{
        width:42%;
        border-radius:16px;
        box-sizing:border-box;
        /* padding:20px 40px; */
        position: relative;
      }

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
      }

      #events-modal-hide{
        position: absolute;
        width: 100%;
        /* height:100%; */
        top:0;
        left:-100%;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .events-modal{
        padding:10px 0;
        background-color:rgba(128, 128, 128, 0.4);
        overflow:hidden;
      }

      a{
        color:black;
      }

      a:hover{
        color:black;
      }

      #events-form div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 0;
      }

      #events-form div > button{
        border-radius:50px;
      }

      #add-events-form{
        width:42%;
        border-radius:16px;
        box-sizing:border-box;
        /* padding:20px 40px; */
        position: relative;
        z-index: 10;
      }

      /* Fixed Layout Adjustments */
      .layout-container {
        display: flex;
        flex-direction: column;
        height: 100vh;
        overflow: hidden;
      }
      .top-navbar-row {
        height: auto;
        min-height: 70px;
        flex-shrink: 0;
        z-index: 1050;
        background: #0f172a;
        display: flex;
        align-items: stretch;
        margin: 0;
      }
      .main-body-row {
        flex-grow: 1;
        display: flex;
        overflow: hidden;
        margin: 0;
      }
      #menu-bar {
        height: 100%;
        overflow-y: auto;
        flex-shrink: 0;
        background-color: rgb(248, 245, 245);
        border-right: 1px solid #e2e8f0;
        padding: 0;
      }
      .main-content-area {
        flex-grow: 1;
        overflow-y: auto;
        height: 100%;
        background-color: #f8fafc;
        padding-bottom: 50px;
      }

      @media screen and (max-width: 768px) {
        .top-navbar-row { height: auto; flex-direction: column; }
        .main-body-row { flex-direction: column; }
        #menu-bar { display: none; }
        .main-content-area { width: 100% !important; }
      }

      /* Premium Modal Styling */
      .events-modal {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: -100%;
        background-color: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(4px);
        z-index: 2000;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        overflow-y: auto;
        padding: 30px 0;
        transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      }

      .modal-box-premium {
        background: #fff;
        width: 95%;
        max-width: 500px;
        border-radius: 20px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        position: relative;
        padding: 0 !important;
        margin: auto;
        overflow: hidden;
        animation: modalScale 0.3s ease-out;
      }

      @keyframes modalScale {
        from { transform: scale(0.95); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
      }

      .modal-header-premium {
        padding: 20px 30px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      .modal-body-premium {
        padding: 30px;
      }

      .input-style {
        border-radius: 12px !important;
        border: 1px solid #e2e8f0 !important;
        padding: 12px 16px !important;
        transition: all 0.3s ease;
      }

      .input-style:focus {
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1) !important;
      }

      .btn-save-premium {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: #fff;
        border: none;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s;
        width: 100%;
        margin-top: 10px;
      }

      .btn-save-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
        filter: brightness(1.1);
      }

      .active-events{
        background-color:rgb(230, 230, 230);
        font-weight:600;
      }

      .updateevent {
        position: relative;
      }

      .trashevent{
        position: relative;
      }

      .updatetooltip{
      visibility:hidden;
      width:max-content;
      background-color: rgb(0, 123, 255);
      color:white;
      border-radius:6px;
      padding:5px 10px;
      position: absolute;
      top:100%;
      left:-50%;
      z-index: 1;
     }
     .updatetooltip::after{
          content:"";
          position: absolute;
          bottom:100%;
          right:50%;
          border:7px;
          border-style:solid;
          border-color:transparent transparent rgb(0, 123, 255) transparent;
     }
     .updateevent:hover .updatetooltip{
        visibility:visible;
     }
     .trashtooltip{
      visibility:hidden;
      width:max-content;
      background-color: rgb(0, 123, 255);;
      color:white;
      border-radius:6px;
      padding:5px 10px;
      position: absolute;
      top:100%;
      left:-20%;
      z-index: 1;
     }
     .trashtooltip::after{
          content:"";
          position: absolute;
          bottom: 100%;
          right:50%;
          border:7px;
          border-style:solid;
          border-color:transparent transparent rgb(0, 123, 255); transparent;
     }
     .trashevent:hover .trashtooltip{
        visibility:visible;
     }


      /* .page{
        position: relative;
        top:80px;
      }
        

      
        /* Smaller modal on mobile screens */
        @media (max-width: 576px) {
            .modal-dialog {
                max-width: 90%; /* Limits modal width on mobile */
                margin: 10px auto; /* Adds padding from the screen edges */
            }
            .modal-content {
                padding: 15px; /* Adds padding inside the modal */
            }
            .form-control {
                padding: 12px;
                font-size: 14px;
            }
            .btn-primary {
                font-size: 14px;
                padding: 10px;
                width: 100%;
            }
        }

      @media screen and (max-width:768px) {
           #menu-bar{
            display:none;
           }
           #commonsearch{
            width:100% !important;
            margin: 0 !important;
           }
           .eventpadd{
            padding:5% 0 0 0 !important;
           }
           #hidename{
            display:none;
           } 
           .ps-logo{
            justify-content:space-between;
          }
          .fa-bell-icon{
            padding-right:10px;
          } 
          #ps-name-line{
            display:none;
          }
          .rounded-circle{
            margin: 5px;

           }
           #arrow{
            margin:5px;

           }
      }

      @media screen and (min-width:768px) {
          .ham-menu{
            display:none;
          }
          #eventssubmenu{
            display:flex !important;
           }
      }

      @media screen and (max-width:768px) {

          #add-events-form div > input{
            padding: 5px;
          }
          #add-events-form{
            width:90%;
            padding:8%;
          }
          #update-event-section div > input{
            padding: 5px;
          }
          #update-event-section{
            width:90%;
            padding:8%;
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
          .container-fluid[style*="position:absolute;overflow:hidden;"] {
            position: relative !important;
            height: auto !important;
            overflow: visible !important;
          }
      }
      /* Image Viewer Modal Styling */
      #image-viewer-modal {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(15, 23, 42, 0.95);
          backdrop-filter: blur(8px);
          z-index: 9999;
          display: none;
          align-items: center;
          justify-content: center;
          cursor: zoom-out;
          opacity: 0;
          transition: opacity 0.3s ease;
      }
      #image-viewer-modal.show {
          display: flex;
          opacity: 1;
      }
      #full-size-image {
          max-width: 90%;
          max-height: 85%;
          object-fit: contain;
          border-radius: 12px;
          box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
          transform: scale(0.9);
          transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
          border: 4px solid rgba(255, 255, 255, 0.1);
      }
      #image-viewer-modal.show #full-size-image {
          transform: scale(1);
      }
      .close-viewer {
          position: absolute;
          top: 30px;
          right: 40px;
          width: 45px;
          height: 45px;
          background: rgba(255, 255, 255, 0.1);
          color: #fff;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 24px;
          cursor: pointer;
          transition: all 0.2s;
          border: 1px solid rgba(255, 255, 255, 0.2);
          z-index: 10000;
      }
      .close-viewer:hover {
          background: rgba(255, 255, 255, 0.2);
          transform: rotate(90deg);
      }
    </style>
</head>
<body>
        
<div class="container-fluid layout-container p-0">

<?= view('notification_toast') ?>
      
      <!-- Top Bar -->
      <div class="row top-navbar-row">
          <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3 d-flex align-items-center justify-content-start ps-2">
              <!-- Content loaded via AJAX -->
          </div>
          <div id="search-bar" class="col-md-10 align-items-center justify-content-between border-bottom">
              <!-- Content loaded via AJAX -->
          </div>
      </div>

      <!-- Main Body -->
      <div class="row main-body-row">
          <div id="menu-bar" class="col-md-2 ps-gray">
              <!-- Content loaded via AJAX -->
          </div>
            
          <div class="main-content-area col-md-10">
              <div class="container-fluid px-4 pt-4 d-flex justify-content-between eventpadd">
                  <span class="h5 fw-bold">Events Management</span>    
                  <div>
                      <button <?=session()->get('role') == 2 ? 'hidden' : (session()->get('role') == 3 ? 'hidden' : '')?> onclick="showeventsmodal()" class='ps-add-btn float-end text-white py-2 px-4'>
                          <i class="fa-solid fa-plus me-2"></i>Add New Event
                      </button>
                  </div>
              </div>
         
              <div class="container-fluid pt-3 px-4 eventpadd"><!----------------table-------->
                  <div class="table-container mb-4">
                      <table class="table custom-table-modern">
                          <thead>
                              <tr>
                                  <th>S.No</th>
                                  <th>Event Name</th>
                                  <th>Banner</th>
                                  <th>Duration</th>
                                  <th>Tax Amount</th>
                                  <th class='text-center' <?=session()->get('role') == 2 ? 'hidden' : (session()->get('role') == 3 ? 'hidden' : '')?>>Actions</th>
                              </tr>
                          </thead>
                          <tbody id="ps-events">
                          </tbody>
                      </table>
                  </div>
                  <div class="small text-muted mb-4 px-2">Total Events: <strong><?php echo count($events)?></strong></div>
              </div> <!----------------table-end------->

              <div class="pagination-wrapper">
                  <div id="pagination-container" class="pagination-container">
                      <!-- Pagination buttons rendered by JS -->
                  </div>
                  <div id="pagination-info" class="pagination-info">
                      <!-- Showing X to Y of Z entries -->
                  </div>
              </div>
          </div><!-----------main-content-area-end------------------------>
      </div><!--------------main-body-row-end------------------->
</div><!--------------layout-container-end------------------->
<!-----------------------Add-Events-modal-------------------------------------------->
<div id="events-modal-hide" class="events-modal">
    <div id="add-events-form" class="modal-box-premium">
        <div class="modal-header-premium">
            <h5 class="m-0 fw-bold" style="color: #1e293b;">Add New Event</h5>
            <button onclick="hideEventsform()" class="btn-close" style="font-size: 0.8rem;"></button>
        </div>

        <div class="modal-body-premium">
          <form id="events-form" name="eventform" method="POST" action="<?=base_url("events/addevent");?>" onsubmit="return eventValidate()" enctype="multipart/form-data">
              <div class="mb-4">
                  <label for="eventname" class="form-label small fw-bold text-muted text-uppercase">Event Name</label>
                  <input type="text" onkeyup="validateEvent(this)" class="form-control input-style" id="eventname" placeholder="e.g. Event_2026" name="eventname" required>
                  <small class="text-primary d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i>Note: Year should be at the end of the event name (e.g. Event_2026).</small>
                  <small id="eventnameerror" class="text-danger mt-1 d-block"></small>
              </div>

              <div class="mb-4">
                  <label for="eventimage" class="form-label small fw-bold text-muted text-uppercase">Event Banner</label>
                  <input type="file" onchange="uploadFile(this)" accept="image/jpg,image/jpeg,image/png" class="form-control input-style" id="eventimage" name="eventimage" required>
                  <div class="mt-2">
                      <span class="text-primary small" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i>Note: Max file size 2MB (JPG, PNG).</span>
                  </div>
                  <small id="eventimageerror" class="text-danger mt-1 d-block"></small>
              </div>

              <div class="mb-4">
                  <label class="form-label small fw-bold text-muted text-uppercase d-block">Duration</label>
                  <div class="row g-3">
                      <div class="col-6">
                          <label for="date_from" class="small text-muted mb-1">From</label>
                          <input type="date" class="form-control input-style" id="date_from" name="event_date_from" required>
                      </div>
                      <div class="col-6">
                          <label for="date_to" class="small text-muted mb-1">To</label>
                          <input type="date" class="form-control input-style" id="date_to" name="event_date_to" required>
                      </div>
                  </div>
              </div>

              <div class="mb-4">
                  <label for="taxamount" class="form-label small fw-bold text-muted text-uppercase">Tax Amount (₹)</label>
                  <input type="number" name="eventtaxamount" class="form-control input-style" id="taxamount" placeholder="0.00" required>
                  <small id="eventamounterror" class="text-danger mt-1 d-block"></small>
              </div>

              <button type="submit" id="eventaddbtn" name="addeventsubmit" class="btn-save-premium">Create Event</button>
          </form>
        </div>
     </div>
</div>

<!-----------------------update-Events-modal-------------------------------------------->
<div id="updateevent-modal-hide" class="events-modal">
    <div id="update-event-section" class="modal-box-premium">
        <div class="modal-header-premium">
            <h5 class="m-0 fw-bold" style="color: #1e293b;">Update Event Details</h5>
            <button onclick="hideupdateEventform()" class="btn-close" style="font-size: 0.8rem;"></button>
        </div>
        
        <div class="modal-body-premium">
          <form id="update-event-form" method="post" onsubmit="eventUpdatevalidate()" action="<?=base_url("events/updateevent")?>" name="updateeventform">
              <!-- Content loaded via AJAX -->
          </form>
        </div>
     </div>
</div>

<!-----------------------update-banner-modal-------------------------------------------->
<div id="updateeventbanner-modal-hide" class="events-modal">
    <div id="update-eventbanner-section" class="modal-box-premium">
        <div class="modal-header-premium">
            <h5 class="m-0 fw-bold" style="color: #1e293b;">Update Event Banner</h5>
            <button onclick="hideupdateEventbannerform()" class="btn-close" style="font-size: 0.8rem;"></button>
        </div>
        
        <div class="modal-body-premium">
          <form id="update-event-banner" method="post" enctype="multipart/form-data" action="<?=base_url("events/updateeventbanner")?>">
              <!-- Content loaded via AJAX -->
          </form>
        </div>
     </div>
</div>
<!-----------------------------update-banner-end-------------------------------->
    
<!--------------------------delete-modal---------------------->

<div class="modal fade" id="deletemodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 24px; overflow: hidden;">
            <div id="deletebox" class="modal-body p-0">
                <!-- Injected via JS -->
            </div>
        </div>
    </div>
</div>

<!--------------------------delete-modal-end------------------>

<!-----------------set-index-end----------------->
<?php
if(isset($_SESSION["altereventsindex"]) && isset($counts)){
  $index = $_SESSION["altereventsindex"];
  if($counts > 50){
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
  }
  else{
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

unset($_SESSION["altereventsindex"]);
?>
<!-----------------set-index-end----------------->
   <script>
    let eventsData = [];
    const baseUrl = "<?= base_url() ?>";
    <?php if (isset($events) && !empty($events)): ?>
    eventsData = <?php echo json_encode($events); ?> || [];
    <?php endif; ?>

function formatDate(dateString) {
    if (!dateString) return '';
    const parts = dateString.split('-');
    if (parts.length === 3) {
        return `${parts[2]}-${parts[1]}-${parts[0]}`;
    }
    return dateString;
}

function renderEvents(data, sNo) {
    let html = "";
    let i = sNo + 1;

    data.forEach(value => {
        let imagePath = value.Image;
        if (imagePath && !imagePath.startsWith('http')) {
            imagePath = baseUrl + imagePath;
        }

        html += `
            <tr>
                <td class="fw-bold text-muted">${i}</td>
                <td class="fw-bold text-dark">${value.EventName}</td>
                <td>
                    <div class="event-banner-wrapper" onclick="showImageFullSize('${imagePath}')">
                        <img class="event-banner-img" src="${imagePath}" alt="${value.EventName}"/>
                        <button class="banner-change-overlay" <?=(session()->get('role') == 2) ? 'hidden' : (session()->get('role') == 3 ? 'hidden' : '')?> 
                                onclick='event.stopPropagation(); showupdateeventbannermodal(${value.Id}, "${value.EventName}")'>
                            CHANGE
                        </button>
                    </div>
                </td>
                <td>
                    <div class="small fw-bold">From: <span class="text-secondary fw-normal">${formatDate(value.From_date)}</span></div>
                    <div class="small fw-bold">To: <span class="text-secondary fw-normal">${formatDate(value.To_date)}</span></div>
                </td>
                <td><span class="badge bg-light text-primary border px-2 py-1">₹ ${value.TaxAmount}</span></td>
                <td class='text-center' <?=session()->get('role') == 2 ? 'hidden' : (session()->get('role') == 3 ? 'hidden' : '')?>>
                    <button onclick='showupdateeventmodal(${value.Id})' class='action-btn btn-edit-modern shadow-sm' title="Update">
                        <i class='fa-regular fa-pen-to-square'></i>
                    </button>
                    <button data-bs-toggle='modal' data-bs-target='#deletemodal' onclick='deleteevent(${value.Id}, "${value.EventName}")' 
                            class='action-btn btn-delete-modern shadow-sm' title="Delete">
                        <i class='fa-solid fa-trash-can'></i>
                    </button>
                </td>
            </tr>
        `;
        i++;
    });

    document.getElementById("ps-events").innerHTML = html;
}

renderEvents(eventsData.slice(0 ,3), 0);

    const ITEMS_PER_PAGE = 3;
    let currentTotalCount = <?= count($events) ?>;
    let currentActivePage = 1;

    $(document).ready(function() {
      renderPagination(currentTotalCount, currentActivePage);
      // Load first page via AJAX for consistency, or keep the initial renderEvents call
      // renderEvents(eventsData.slice(0, 3), 0);
    });

    function renderPagination(totalCount, activePage) {
      const container = document.getElementById('pagination-container');
      const info = document.getElementById('pagination-info');
      if (!container) return;

      if (totalCount <= 0) {
        container.innerHTML = '';
        info.innerHTML = '<div class="mt-5 text-muted">No Record Found</div>';
        return;
      }

      const totalPages = Math.ceil(totalCount / ITEMS_PER_PAGE);
      let html = '';

      // Previous Button
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

      // Next Button
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
        url: "<?= base_url('events/displayEvents') ?>",
        data: { "count": offset },
        success: function (result) {
          document.getElementById('ps-events').innerHTML = result;
          currentActivePage = page;
          renderPagination(currentTotalCount, currentActivePage);
          // Smooth scroll to table
          document.querySelector('.table-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
        },
        error: function (error) {
          console.error(error);
          psShowToast('error', 'Error loading data. Please try again.');
        }
      });
    }


// Mobile Menu Functions
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
      type:"get",
      url:"events/sidemenu",
      success:(result)=>{
           document.getElementById("menu-bar").innerHTML = result;
           // Populate custom mobile menu content
           document.getElementById("mobile-menu-content").innerHTML = result;
           highlightActiveMenu();
      },
      error:(error)=>{
           document.getElementById("menu-bar").innerHTML = "Error fetching menu";
      }
    });

    $.ajax({
      type:"get",
      url:"events/topmenu",
      success:(result)=>{
           document.getElementById("search-bar").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("search-bar").innerHTML = "Error fetching menu";
      }
    });

    $.ajax({
      type:"get",
      url:"events/pslogo",
      success:(result)=>{
           document.getElementById("ps-logo").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("ps-logo").innerHTML = "Error fetching menu";
      }
    });

    const today = new Date().toISOString().split('T')[0];
    const dateFromElement = document.getElementById("date_from");
    if(dateFromElement) {
        dateFromElement.min = today;
        dateFromElement.addEventListener("change", (event)=>{
            let fromDate = event.target.value;
            let toDate = document.getElementById("date_to");
            toDate.min = fromDate || today;
            if(toDate.value && toDate.value < fromDate) {
              toDate.value = "";
            }
        });
    }

    const dateToElement = document.getElementById("date_to");
    if(dateToElement) dateToElement.min = today;

     function validateDate() {
        let fromDate = document.getElementById("update_date_from");
        let toDate = document.getElementById("update_date_to");
        const currDate = new Date().toISOString().split('T')[0];
        
        if(fromDate) fromDate.min = currDate;
        
        if(fromDate && toDate) {
            toDate.min = fromDate.value || currDate;
            if(toDate.value && toDate.value < fromDate.value) {
              toDate.value = "";
            }
        }
    }

    function commonSearch(events) {
        let searchfields = events.value;

        $.ajax({
            type: "get",
            url: baseUrl + "events/searchevents",
            data: { "searchfields": searchfields },
            success: (result) => {
                document.getElementById('ps-events').innerHTML = result;
                // If search is cleared, restore pagination. If search is active, pagination is tricky here 
                // because backend searchevents doesn't return count.
                // For now, let's just hide pagination during search or refresh count if possible.
                if (searchfields === "") {
                    renderPagination(currentTotalCount, 1);
                } else {
                    document.getElementById("pagination-container").innerHTML = "";
                    document.getElementById("pagination-info").innerHTML = "<span class='text-muted'>Search results displayed</span>";
                }
            },
            error: (error) => {
                document.getElementById('ps-events').innerHTML = "<tr><td colspan='6' class='text-center text-danger py-4'>Error fetching search results</td></tr>";
            }
        });
    }

    // Removed displayEvents as it's replaced by goToPage

    window.addEventListener("resize", () => {
       let addEventsForm = document.getElementById("add-events-form");
       let updateEventSection = document.getElementById("update-event-section");
       let b = window.innerWidth;
       
       if (b > 768) {
          if (addEventsForm) addEventsForm.style.left = "29%";
          if (updateEventSection) updateEventSection.style.left = "29%";
       }
       else {
          if (addEventsForm) addEventsForm.style.left = "5%";
          if (updateEventSection) updateEventSection.style.left = "5%";
       }
    });

    let showaddevent = document.getElementById("events-modal-hide");
    let showupdateevent = document.getElementById("updateevent-modal-hide");
    let showupdateeventbanner = document.getElementById("updateeventbanner-modal-hide");

    function showeventsmodal(){
      showaddevent.style.left = "0%";
    }

    function showupdateeventmodal(id) {
       $.ajax({
        type:"get",
        url: baseUrl + "events/getevent",
        data:{"id":id},
        success:(result)=>{
           document.getElementById("update-event-form").innerHTML = result;
           showupdateevent.style.left = "0%";
        },
        error:(error)=>{
           psShowToast('error', 'Error fetching data');
        }
      });
    }

    function showupdateeventbannermodal(id,eventname){
      $.ajax({
        type:"get",
        url: baseUrl + "events/showupdateeventbanner",
        data:{"id":id,"eventname":eventname},
        success:(result)=>{
           document.getElementById("update-event-banner").innerHTML = result;
           showupdateeventbanner.style.left = "0%";
        },
        error:(error)=>{
           psShowToast('error', 'Error fetching banner info');
        }
      });
    }

    window.onclick = function(event) {
      if (event.target == showaddevent) {
          showaddevent.style.left = "-100%";
      }
      else if (event.target == showupdateevent) {
          showupdateevent.style.left = "-100%";
      }
      else if (event.target == showupdateeventbanner) {
          showupdateeventbanner.style.left = "-100%";
      }
    }

    function hideEventsform(){
        showaddevent.style.left = "-100%";
    }

    function hideupdateEventform(){
        showupdateevent.style.left = "-100%";
    }

    function hideupdateEventbannerform(){
        showupdateeventbanner.style.left = "-100%";
    }

    function deleteevent(id,name){
      let baseUrl = "<?= base_url('events/trash/') ?>"; 
      document.getElementById("deletebox").innerHTML = `
        <div class="text-center p-4">
            <div class="mb-4">
                <div class="mx-auto d-flex align-items-center justify-content-center rounded-circle shadow-sm" style="width: 70px; height: 70px; background-color: #fff1f2; border: 4px solid #fff;">
                    <i class="fa-solid fa-trash-can fa-xl" style="color: #e11d48;"></i>
                </div>
            </div>
            <h3 class="fw-bold mb-2" style="color: #0f172a; font-size: 1.25rem;">Move to Trash?</h3>
            <p class="mb-4 text-muted small" style="line-height: 1.5;">Are you sure you want to move <strong>${name}</strong> to the trash?</p>
            <div class="d-grid gap-2 mt-2">
                <button type="button" class="btn btn-sm px-4 py-2 fw-bold text-secondary border-0" data-bs-dismiss="modal" style="border-radius: 10px; background-color: #f1f5f9;">Cancel</button>
                <a href="${baseUrl}${id}" class="btn btn-sm px-4 py-2 fw-bold text-white shadow-sm" style="border-radius: 10px; background: linear-gradient(135deg, #e11d48, #be123c); border: none;">Confirm Delete</a>
            </div>
        </div>
      `; 
    }

    function movetotrash(id){
    $.ajax({
        type:"get",
        url: baseUrl + "events/movetotrash",
        data:{"id":id},
        success:function(result){
                psShowToast('success', 'Moved to trash successfully!');
          window.location.reload();
        },
        error:function(error){
          console.log(error);
          psShowToast('error', 'An error occurred. Please try again.');
        }
      })
  }

  function uploadFile(file) {
    let errorbox = document.querySelector(`.${file.name}`);
    let imagesize = 2000000;
    let uploadedimagesize = file.files[0] ? file.files[0].size : 0;

    if (uploadedimagesize > imagesize) {
        if (errorbox) errorbox.textContent = "File Size should be below 2MB";
        file.value = "";
        return false;
    } else {
        if (errorbox) errorbox.textContent = "";
    }
  }

  function validateEvent(event){
      let eventname = event.value;
      let currentYear = new Date().getFullYear();
      let validatereg = /^[\w.]+[0-9]{4}$/; 
      let validate = eventname.match(validatereg);
      if(!validate){
         document.getElementById("eventnameerror").innerHTML = "Only use ( _ ) instead of space. Year must be at the end (e.g. Event_2026)";
      }
      else{
        let year = parseInt(eventname.substring(eventname.length - 4));
        if(year < currentYear) {
           document.getElementById("eventnameerror").innerHTML = "Year should be current year (" + currentYear + ") or a future year.";
        } else {
           document.getElementById("eventnameerror").innerHTML = "";
        }
      }
    }

    function validateUpdateevent(event){
      let eventname = event.value;
      let currentYear = new Date().getFullYear();
      let validatereg = /^[\w.]+[0-9]{4}$/; 
      let validate = eventname.match(validatereg);
      if(!validate){
         document.getElementById("eventupdatenameerror").innerHTML = "Only use ( _ ) instead of space. Year must be at the end (e.g. Event_2026)";
      }
      else{
        let year = parseInt(eventname.substring(eventname.length - 4));
        if(year < currentYear) {
           document.getElementById("eventupdatenameerror").innerHTML = "Year should be current year (" + currentYear + ") or a future year.";
        } else {
           document.getElementById("eventupdatenameerror").innerHTML = "";
        }
      }
    }

  function eventValidate() {
    let eventform =  document.forms["eventform"];
    let eventname = eventform["eventname"].value.trim();
    let eventimage = eventform["eventimage"].value.trim();
    let eventdatefrom = eventform["event_date_from"].value.trim();
    let eventdateto = eventform["event_date_to"].value.trim();
    let taxamount = eventform["eventtaxamount"].value.trim();
    let validatereg =  /^[A-Za-z_.]+[0-9]{4}$/;
    
    if(eventname == ""){
       document.getElementById("eventnameerror").innerHTML = "Please fill this field";
       return false;
    }
    else if(!eventname.match(validatereg)){
        document.getElementById("eventnameerror").innerHTML = "Only use ( _ ) instead of space. Year must be at the end (e.g. Event_2026)";
        return false;
    }
    else {
        let currentYear = new Date().getFullYear();
        let year = parseInt(eventname.substring(eventname.length - 4));
        if(year < currentYear) {
            document.getElementById("eventnameerror").innerHTML = "Year should be current year (" + currentYear + ") or a future year.";
            return false;
        }
    }

    if(eventimage == ""){
       document.getElementById("eventimageerror").innerHTML = "Please upload event image";
       return false;
    }

    if(taxamount == ""){
       document.getElementById("eventamounterror").innerHTML = "Please enter amount";
       return false;
    }
    else{
      if(taxamount < 0) {
       document.getElementById("eventamounterror").innerHTML = "Please enter valid amount";
       return false;
      }
    }
   return true;
  }

  function eventUpdatevalidate() {
    let eventform =  document.forms["updateeventform"];
    let eventname = eventform["eventupdatename"].value.trim();
    let eventdatefrom = eventform["event_update_date_from"].value.trim();
    let eventdateto = eventform["event_update_date_to"].value.trim();
    let taxamount = eventform["eventupdatetaxamount"].value.trim();
    let validatereg =  /^[A-Za-z_.]+[0-9]{4}$/;
    
    if(eventname == ""){
       document.getElementById("eventupdatenameerror").innerHTML = "Please fill this field";
       return false;
    }
    else{
      if(!eventname.match(validatereg)){
        document.getElementById("eventupdatenameerror").innerHTML = "Only use ( _ ) instead of space. Year must be at the end (e.g. Event_2026)";
        return false;
      }
      else {
        let currentYear = new Date().getFullYear();
        let year = parseInt(eventname.substring(eventname.length - 4));
        if(year < currentYear) {
            document.getElementById("eventupdatenameerror").innerHTML = "Year should be current year (" + currentYear + ") or a future year.";
            return false;
        }
      }
    }

    if(taxamount == "") {
       document.getElementById("eventupdateamounterror").innerHTML = "Please enter amount";
       return false;
    }
    else{
      if(taxamount < 0) {
       document.getElementById("eventupdateamounterror").innerHTML = "Please enter valid amount";
       return false;
      }
    }
   return true;
  }

  // Load layout components
  $.ajax({
      type: "get",
      url: "<?= base_url('events/sidemenu'); ?>",
      success: (result) => {
          document.getElementById("menu-bar").innerHTML = result;
          // Populate custom mobile menu content
          if(document.getElementById("mobile-menu-content")) {
              document.getElementById("mobile-menu-content").innerHTML = result;
          }
          highlightActiveMenu();
      }
  });

  $.ajax({
      type: "get",
      url: "<?= base_url('events/topmenu'); ?>",
      success: (result) => {
          document.getElementById("search-bar").innerHTML = result;
      }
  });

  $.ajax({
      type: "get",
      url: "<?= base_url('events/pslogo'); ?>",
      success: (result) => {
          document.getElementById("ps-logo").innerHTML = result;
      }
  });

  // Mobile Menu Functions
  function openMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'block';
  }

  function closeMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'none';
  }

  function showImageFullSize(src) {
      const modal = document.getElementById('image-viewer-modal');
      const fullImg = document.getElementById('full-size-image');
      if(modal && fullImg) {
          fullImg.src = src;
          modal.style.display = 'flex';
          setTimeout(() => {
              modal.classList.add('show');
          }, 10);
      }
  }

  function hideImageViewer() {
      const modal = document.getElementById('image-viewer-modal');
      if(modal) {
          modal.classList.remove('show');
          setTimeout(() => {
              modal.style.display = 'none';
          }, 300);
      }
  }
   </script>
    <!---------------------Custom Mobile Menu-------------------------->
    <div id="custom-mobile-menu">
        <div class="close-btn" onclick="closeMobileMenu()">&times;</div>
        <div id="mobile-menu-content">
            <!-- Content loaded via JS -->
        </div>
    </div>
    <!---------------------Custom Mobile Menu End-------------------------------->
    
    <div id="image-viewer-modal" onclick="hideImageViewer()">
        <span class="close-viewer" onclick="hideImageViewer()">&times;</span>
        <img id="full-size-image" src="" alt="Full Size Image">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    
</body>
</html>
