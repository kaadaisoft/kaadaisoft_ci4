<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
    /* Fixed Premium Layout */
    html, body { height: 100%; margin: 0; overflow: hidden; }
    .layout-container { display: flex; flex-direction: column; height: 100vh; width: 100%; }
    .top-navbar-row { height: 75px; flex-shrink: 0; z-index: 1050; background: #0f172a; display: flex; align-items: center; margin: 0 !important; border-bottom: 1px solid #1e293b; }
    .main-body-row { flex: 1; display: flex; overflow: hidden; margin: 0 !important; }
    #menu-bar { width: 260px; height: 100%; overflow-y: auto; flex-shrink: 0; background-color: #0f172a !important; border-right: 1px solid #1e293b; padding: 0; }
    .main-content-area { flex: 1; overflow-y: auto; background-color: #f8fafc; padding-bottom: 50px; }

    @media screen and (max-width: 768px) {
      .top-navbar-row { 
        height: auto; 
        flex-wrap: wrap; 
        padding: 5px 0 !important;
        /* Remove fixed position to match viewmanagerdata */
        /* position: fixed; */
        /* top: 0; */
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
        /* Remove large margin-top since fixed position is removed */
        /* margin-top: 200px !important; */
        flex-direction: column; 
        overflow: auto; 
      }
      #menu-bar { display: none; }
      .main-content-area { width: 100%; overflow: visible; }
      html, body { overflow: auto; height: auto; }
      .layout-container { height: auto; }
    }

    .ps-logo{
        display:flex;
        align-items:center;
        justify-content:flex-start;
        padding-left: 20px;
      }
    .ps-gray{
        background-color: rgb(248, 245, 245);
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
    display:flex;
    flex-wrap:wrap;
    justify-content: center;
    gap:20px;
    }

    .letter-spacing-1 {
      letter-spacing: 1px;
    }
    .z-1 {
      z-index: 1;
    }

    .card-round{
      width: 250px;
      border-radius:20px;
      padding: 25px !important;
      position: relative;
      overflow: hidden;
      display: flex;
      align-items: center;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card-icon-bg {
      position: absolute;
      right: -15px;
      bottom: -15px;
      font-size: 5.5rem;
      opacity: 0.2;
      transform: rotate(-15deg);
      transition: all 0.4s ease;
    }

    .card-round:hover .card-icon-bg {
      transform: rotate(0deg) scale(1.1);
      opacity: 0.3;
    }

     .card1{
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    border: none;
    box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
    text-decoration: none !important;
    }

    .card2{
      background: linear-gradient(135deg, #0ea5e9, #0284c7);
      border: none;
      box-shadow: 0 10px 20px rgba(14, 165, 233, 0.2);
      text-decoration: none !important;
    }

    .card3{
      background: linear-gradient(135deg, #f43f5e, #e11d48);
      border: none;
      box-shadow: 0 10px 20px rgba(244, 63, 94, 0.2);
      text-decoration: none !important;
     }

     .card1:hover, .card2:hover, .card3:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
     }

     .card-round:active {
        transform: scale(0.95);
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
        /* width: 100%; */
        /* height: calc(100% - 40px); */
        /* background: rgba(54, 162, 235, 0.2); */
       /*  display: flex;
        align-items: center;
        justify-content: center; */
        display:grid;
        grid-template-columns: repeat(auto-fit,minmax(250px,700px)) ;
        grid-template-rows: repeat(auto-fit,minmax(200px,auto)) ;
        align-items: center;
      }

      .chartBox {
        /* height:fit-content; */
        padding: 10px;
        border-radius: 20px;
        /* border: solid 3px rgba(54, 162, 235, 1); */
        background: white;
      }

      #search-bar{
            display:flex;
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

      #manager-form div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 0;
      }

      #manager-form div > button{
        border-radius:50px;
      }

      #add-manager-form{
        width:42%;
        border-radius:25px;
        box-sizing:border-box;
        padding:3%;
        position: relative;
      }

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
      }

      #manager-modal-hide{
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .manager-modal{
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

      .active-dash{
        background-color:rgb(230, 230, 230);
        font-weight:600;
      }      

      .ps-btn{
        border:none;
        outline:none;
        background-color:rgb(23, 23, 184) !important;
        font-weight:500;
        /* border-radius:25px; */
      }

       .statusfilter{
        /* border:5px solid rgb(23, 23, 184); */
        row-gap:20px;
      } 

      .statusfilter input,select{
        height:40px;
        
      }
      .statusfilter input:focus,select:focus{
        outline-style:none;
      }

      label{
        font-size:18px;
        font-weight:500;
      }

      #show-villages li:hover{
          background-color:#ddd;
      }

        #update-manager-form div > input,select{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:0px 10px;
      }

      #update-manager-section{
        width:95%;
        border-radius:25px;
        box-sizing:border-box;
        position: relative;
      }

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
      }

      #updatemanager-modal-hide{
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .updatemanager-modal{
        padding:10px 0;
        background-color:rgba(128, 128, 128, 0.4);
        overflow:hidden;
      }
      
      .updatecoord{
        position: relative;
      }

      .trashcoord{
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

     .updatecoord:hover .updatetooltip{
        visibility:visible;
     }

      /* Mobile Menu CSS */
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
        padding: 20px;
        transition: 0.3s;
      }
      
      #custom-mobile-menu .close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 24px;
        cursor: pointer;
        padding: 10px;
      }
      
      #mobile-menu-content {
        margin-top: 60px;
      }

      /* Desktop adjustments */
    @media screen and (max-width:768px) {
      #search-bar{
            background-color:rgb(248, 245, 245);
            flex:none;
            background-color:white !important;
            /* padding: 5px 0; */
           }
           #menu-bar{
            display:none;
           }
           #commonsearch{
            width:100% !important;
            margin: 0 !important;
            /* padding:5px; */
           }
           .dashboardpadd:nth-child(2){
            padding:0% !important;
           }
           .dashboardpadd:nth-child(1){
            padding:2% 0 !important;
           }
           #hidename{
            display:none;
           } 
           .ps-logo{
            justify-content:space-between;
          }
          #ps-name-line{
            display:none;
          }
          .fa-bell-icon{
            padding-right:10px;
          }
      }
      
      #registration-form label{
            width:100%;
            font-size:18px;
            font-weight:500;
        }

        #registration-form input[type="text"],input[type="number"],input[type="file"],select{
            width:100%;
            padding-left:6px;
        }

        #registration-form input[type="text"]:focus,input[type="number"]:focus,select:focus{
            outline:none;
        }

        #registration-form input[type="file"]{
            border:none;
            outline:none;
        }

      form button[type=submit]{
        color:white; 
        font-weight:500;
        border:none;
        background-color:#295CF5;
      }

      .ps-img-btn{
        color:white; 
        font-weight:500;
        border:none;
        background-color:#295CF5;
      }

      /* Chrome, Safari, Edge, Opera */
     input::-webkit-outer-spin-button,
     input::-webkit-inner-spin-button {
     -webkit-appearance: none;
     margin: 0;
     }

    @media screen and (min-width:768px) {
          .ham-menu{
            display:none;
          }
      }

    @media screen and (max-width:768px) {
        
          #add-manager-form div > input{
            padding: 5px;
          }
          #add-manager-form{
            width:90%;
            padding:8%;
          }
    }
      
    #custom-mobile-menu {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: #0f172a;
        z-index: 9999;
        overflow: auto;
    }
    .close-btn { position: absolute; top: 20px; right: 20px; font-size: 30px; cursor: pointer; color: #cbd5e1; }
    #mobile-menu-content { padding-top: 60px; }

    @media screen and (max-width:768px) {
  #ps-logo {
    /* Remove light background override to keep header dark consistent with topmenu/pslogo */
    /* background: rgb(248, 245, 245) !important; */
    padding: 12px 20px !important;
  }
  
  #ps-name-line {
    /* Remove large font size to match standard header */
    /* font-size: 1.3rem !important; */
    line-height: 1.2;
  }
  
  .ham-menu {
    margin-left: auto !important;
  }
  
  .ham-menu:hover {
    background-color: rgba(0, 123, 255, 0.1) !important;
  }
}

@media screen and (min-width:769px) {
  .ham-menu {
    display: none !important;
  }
}



      /* ✅ Premium Table Design */
      .table-container-premium {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin-bottom: 2rem;
      }
      .custom-table-premium {
        width: 100%;
        min-width: 900px; /* Force scroll on mobile */
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0;
      }
      .custom-table-premium thead th {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 1px;
        padding: 16px !important;
        border: none !important;
        text-align: center;
        vertical-align: middle;
      }
      .custom-table-premium tbody tr {
        transition: all 0.2s ease;
        border-bottom: 1px solid #f1f5f9;
      }
      .custom-table-premium tbody tr:hover {
        background-color: #f8fafc;
        transform: scale(1.001);
        box-shadow: inset 4px 0 0 #3b82f6;
      }
      .custom-table-premium td {
        padding: 16px !important;
        vertical-align: middle;
        border: none !important;
        color: #334155;
        text-align: center;
        font-size: 0.95rem;
      }
      .custom-table-premium tfoot td {
        background-color: #fcfcfc;
        border-top: 2px solid #f1f5f9 !important;
        padding: 20px !important;
      }
      
      .total-label {
        color: #64748b;
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
      }
      
      .total-amount {
        color: #0f172a;
        font-size: 1.25rem;
        font-weight: 800;
      }

      /* ✅ Added to enable full page scroll on mobile */
      @media screen and (max-width: 768px) {
        #pageheight {
          position: relative !important;
          height: auto !important;
          overflow: visible !important;
        }
        #changepage {
          max-height: none !important;
          overflow: visible !important;
        }
      }

      /* Premium Pagination Styles */
      .pagination-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        margin: 0 4px;
        border-radius: 50%;
        background-color: #fff;
        border: 1px solid #e2e8f0;
        color: #475569;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
      }
      .pagination-btn:hover:not(.disabled):not(.active) {
        background-color: #f8fafc;
        border-color: #cbd5e1;
        color: #0f172a;
        transform: translateY(-1px);
      }
      .pagination-btn.active {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        border-color: transparent;
        box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
      }
      .pagination-btn.disabled {
        opacity: 0.5;
        cursor: not-allowed;
        background-color: #f1f5f9;
      }
      .pagination-ellipsis {
        color: #94a3b8;
        font-weight: 600;
        padding: 0 4px;
      }

    </style>
</head>
<body>
       
    <div class="layout-container">
        <!---------------------admindashboard-status-notifications---------------------->
        <?= view('notification_toast') ?>
        
        <div class="top-navbar-row"><!-----top-bar--------------->
            <div id="ps-logo" class="col-md-3 py-3 d-flex align-items-center justify-content-start ps-2"></div>
            <div id="search-bar" class="col-md-9 d-flex align-items-center justify-content-between px-3"></div>
        </div><!-----------top-bar-end----------------------->


        <div class="main-body-row"><!----------main-navbar----------->
            <div id="menu-bar"></div><!-----------side-bar-end-------------->
            <div id="changepage" class="main-content-area"><!-----------main-dashboard------------------------->
         
         <div class="container-fluid px-4 pt-4">
          <div class="d-flex justify-content-between">
          <div class="col-md-10" <?php if (session()->get('role') == 3) {
             echo "hidden";
           } ?> >

          </div>
          </div>
          <div <?php if (session()->get('role') == 3) {
            echo "hidden";
          } ?>  class="dashboard-cards mt-4 border-bottom pb-5">

            <a href="<?= base_url('coordinators') ?>" class="card-round card1 text-white shadow-sm <?php if (session()->get('role') == 3 || session()->get('role') == 2) {
              echo "d-none";
            } else {
              echo "d-flex";
            } ?> align-items-center">
              <i class="fa-solid fa-cart-shopping card-icon-bg"></i>
              <div class="position-relative z-1">
                <div class="text-uppercase fw-bold small opacity-75 letter-spacing-1">Coordinators</div>
                <div class="fs-1 fw-bold mt-1"><?= $coordscount ?></div>
              </div>
            </a>

            <a href="<?= base_url('members') ?>" class="card-round card2 text-white shadow-sm d-flex align-items-center">
              <i class="fa-solid fa-user-group card-icon-bg"></i>
              <div class="position-relative z-1">
                <div class="text-uppercase fw-bold small opacity-75 letter-spacing-1">Total Members</div>
                <div class="fs-1 fw-bold mt-1"><?= $memberscount ?></div>
              </div>
            </a>

            <a href="<?= base_url('viewreceivedapplications') ?>" class="card-round card3 text-white shadow-sm d-flex align-items-center">
              <i class="fa-solid fa-bell card-icon-bg"></i>
              <div class="position-relative z-1">
                <div class="text-uppercase fw-bold small opacity-75 letter-spacing-1">Approvals</div>
                <div class="fs-1 fw-bold mt-1">
                  <?php if (!empty($pendingcounts)) {
                    echo "$pendingcounts";
                  } else {
                    echo "0";
                  }
                  ?>
                </div>
              </div>
            </a>

          </div>

        

      <!-------------------------------total-pendings-------------------------------->
<h3 class="mt-5 mb-4 fw-bold text-center" style="color: #1e293b;">Payment Pending Details</h3>
<div class="row px-2">
    <div class="col-12">
        <div class="table-container-premium">
            <table class="custom-table-premium">
                <thead id="nomemberresult">
                    <tr>
                        <th>SNo</th>
                        <th>Event Name</th>
                        <th>Tax Amount</th>
                        <th>Balance Amount</th>
                    </tr>
                </thead>
                <tbody id="showparticipation"></tbody>
                <tfoot>
                    <tr>
                        <td class="text-end" colspan="3">
                            <span class="total-label">Total Pending Amount</span>
                        </td>
                        <td>
                            <span id="total_pending" class="total-amount"></span>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="pendingPagination" class="d-flex justify-content-center mt-3 mb-4"></div>
    </div>
</div>


      <!-------------------------------total-pendings-end------------------------------->

<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 bg-light" style="border-radius: 20px 20px 0 0;">
                <h5 class="modal-title heading-kaadaisoft" id="receiptModalLabel">Payment Receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0" id="receiptModalBody">
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                <button type="button" id="modalDownloadBtn" class="btn btn-success rounded-pill px-4" disabled>Download PDF</button>
                <button type="button" id="modalPrintBtn" class="btn btn-primary rounded-pill px-4" onclick="printReceiptFromModal()">Print Receipt</button>
            </div>

        </div>
    </div>
</div>

         </div>
             <div style="height: 100px;"></div> <!-- Bottom Spacer -->
         </div><!-----------main-dashboard-end------------------------>


        </div><!--------------main-navbar-end------------------->
        </div> <!-- layout-container -->
      </div>

      <!-----------------------Update-Coordinators-modal-------------------------------------------->
        
<div id="updatemanager-modal-hide" class="updatemanager-modal">

        <div id="update-manager-section" style="overflow-y:auto;border-radius:25px;" class="bg-white">
              
        <div id="update-manager-form" class="bg-white container">
   
        </div>
        </div>
        </div>
<!-----------------------------Update-coordinators-end-------------------------------->


      <!---------------------Custom Mobile Menu-------------------------->

<div id="custom-mobile-menu">
    <div class="close-btn" onclick="closeMobileMenu()">&times;</div>
    <div id="mobile-menu-content">
        <!-- Content loaded via JS -->
    </div>
</div>
    
 <!---------------------Custom Mobile Menu End-------------------------------->   
  <script>

      /* Fixed Layout logic handled by CSS */
      let showupdatemanager = document.getElementById("updatemanager-modal-hide");
      // Mobile Menu Functions
      function openMobileMenu() {
        document.getElementById('custom-mobile-menu').style.display = 'block';
      }
      
      function closeMobileMenu() {
        document.getElementById('custom-mobile-menu').style.display = 'none';
      }

      $.ajax({
      type:"get",
      url:"dashboard/sidemenu",
      success:(result)=>{
           document.getElementById("menu-bar").innerHTML = result;
           // Populate custom mobile menu content
           document.getElementById("mobile-menu-content").innerHTML = result;
           // Highlight the active menu item after content is injected
           highlightActiveMenu();
      },
      error:(error)=>{
           document.getElementById("menu-bar").innerHTML = error;
      }
    }); 

    // Global highlight function - runs after AJAX injects sidemenu HTML
    function highlightActiveMenu() {
        const currentPath = window.location.pathname;
        const segments = currentPath.replace(/^\//, '').split('/');
        const navLinks = document.querySelectorAll('#sidemenu-nav .nav-item a[data-page]');

        let matched = false;

        navLinks.forEach(link => {
            const page = link.getAttribute('data-page');
            if (segments.includes(page)) {
                link.classList.add('active-menu-item');
                matched = true;
            }
        });

        if (!matched) {
            navLinks.forEach(link => {
                const page = link.getAttribute('data-page');
                if (segments.some(seg => seg.startsWith(page) || page.startsWith(seg))) {
                    link.classList.add('active-menu-item');
                }
            });
        }
    }


    $.ajax({
      type:"get",
      url:"dashboard/topmenu",
      success:(result)=>{
           document.getElementById("search-bar").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("search-bar").innerHTML = error;
      }
    }); 

    $.ajax({
      type:"get",
      url:"dashboard/pslogo",
      success:(result)=>{
           document.getElementById("ps-logo").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("ps-logo").innerHTML = error;
      }
    });

    let globalEventParticipation = [];
    let pendingItemsPerPage = 10;
    let currentPendingPage = 1;

    function renderPendingTable(data) {
        let rows_html = '';
        let total_pending = 0;

        data.forEach(function(participation) {
            let pending = parseFloat(participation.balanceamount);
            if (isNaN(pending)) pending = parseFloat(participation.Taxamount);
            if (pending > 0) total_pending += pending;
        });

        if (data.length === 0) {
            document.getElementById("nomemberresult").innerHTML = `<tr><td class="text-center" colspan="4">No records found</td></tr>`;
            document.getElementById("showparticipation").innerHTML = '';
            document.getElementById("total_pending").innerText = "0.00";
            document.getElementById("pendingPagination").innerHTML = "";
            return;
        }

        let totalPages = Math.ceil(data.length / pendingItemsPerPage);
        if (currentPendingPage > totalPages) currentPendingPage = totalPages;
        if (currentPendingPage < 1) currentPendingPage = 1;

        let startIndex = (currentPendingPage - 1) * pendingItemsPerPage;
        let endIndex = startIndex + pendingItemsPerPage;
        let paginatedItems = data.slice(startIndex, endIndex);

        paginatedItems.forEach(function(participation, index) {
            let originalIndex = data.indexOf(participation);
            let pending = parseFloat(participation.balanceamount);
            if (isNaN(pending)) pending = parseFloat(participation.Taxamount);
            let pending_display = (pending === 0) ? "0" : pending;
            rows_html += `<tr onclick="handleRowClick('${participation.Id}')" style="cursor: pointer;">
                <td>${startIndex + index + 1}</td>
                <td>${participation.eventname}</td>
                <td>${participation.Taxamount}</td>
                <td>${pending_display}</td>
            </tr>`;
        });

        document.getElementById("nomemberresult").innerHTML = `<tr><th>SNo</th><th>Event Name</th><th>Tax Amount</th><th>Balance Amount</th></tr>`;
        document.getElementById("showparticipation").innerHTML = rows_html;
        document.getElementById("total_pending").innerText = total_pending.toFixed(2);
        
        renderPendingPagination(data.length, currentPendingPage, data);
    }

    function renderPendingPagination(totalItems, currentPage, fullData) {
      if (!totalItems || totalItems <= 0) {
        document.getElementById("pendingPagination").innerHTML = "";
        return;
      }
      const totalPages = Math.ceil(totalItems / pendingItemsPerPage);

      let html = `<div class="d-flex flex-column align-items-center"><div class="d-flex justify-content-center align-items-center gap-2">`;

      html += `<button class="pagination-btn ${currentPage === 1 ? 'disabled' : ''}" 
                  onclick="goToPendingPage(${currentPage - 1})" 
                  ${currentPage === 1 ? 'disabled' : ''}>
                  <i class="fa-solid fa-chevron-left"></i>
               </button>`;

      for (let i = 1; i <= totalPages; i++) {
        if (totalPages <= 7 || i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
          html += `<button class="pagination-btn ${i === currentPage ? 'active' : ''}" 
                      onclick="goToPendingPage(${i})">${i}</button>`;
        } else if (i === currentPage - 2 || i === currentPage + 2) {
          html += `<span class="pagination-ellipsis">...</span>`;
        }
      }

      html += `<button class="pagination-btn ${currentPage === totalPages ? 'disabled' : ''}" 
                  onclick="goToPendingPage(${currentPage + 1})"
                  ${currentPage === totalPages ? 'disabled' : ''}>
                  <i class="fa-solid fa-chevron-right"></i>
               </button>`;

      html += `</div>`;
      html += `<div class="text-center mt-2 text-muted small">Showing page ${currentPage} of ${totalPages}</div></div>`;
      
      document.getElementById("pendingPagination").innerHTML = html;
    }

    function goToPendingPage(page) {
        currentPendingPage = page;
        let searchTerm = "";
        let searchInput = document.getElementById("commonsearch");
        if(searchInput) searchTerm = searchInput.value.toLowerCase().trim();
        
        let displayData = globalEventParticipation;
        if (searchTerm !== "") {
            displayData = globalEventParticipation.filter(item => {
                return item.eventname.toLowerCase().includes(searchTerm);
            });
        }
        renderPendingTable(displayData);
    }

    function commonSearch(input) {
        let searchTerm = input.value.toLowerCase().trim();
        currentPendingPage = 1;
        if (searchTerm === "") {
            renderPendingTable(globalEventParticipation);
            return;
        }

        let filteredData = globalEventParticipation.filter(item => {
            return item.eventname.toLowerCase().includes(searchTerm);
        });
        renderPendingTable(filteredData);
    }

    function handleRowClick(participationId) {
        let participation = globalEventParticipation.find(p => p.Id === participationId);
        if(!participation) return;
        
        let pending = parseFloat(participation.balanceamount);
        if (isNaN(pending)) pending = parseFloat(participation.Taxamount);

        if (pending === 0) {
            let memberid = "<?= session()->get('Kaadaisoft_userId'); ?>";
            let eventid = participation.Id;
            let dues = participation.dues;
            viewReceipt(`paymentreceiptpdf?memberid=${memberid}&dues=${dues}&eventid=${eventid}`);
        } else {
            window.location.href = `gopaymentpage?memberid=<?= session()->get('Kaadaisoft_userId'); ?>&eventid=${participation.Id}`;
        }
    }

    function viewReceipt(url) {
        // This modal logic is for viewing receipts on the dashboard
        $('#receiptModal').modal('show');
        $('#receiptModalBody').html('<div class="text-center py-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');
        $('#modalDownloadBtn, #modalPrintBtn').prop('disabled', true);

        // Try to extract receipt info for the filename
        const params = new URLSearchParams(url.split('?')[1]);
        const receiptId = params.get('dues') || 'receipt';
        const downloadUrl = url.replace('paymentreceiptpdf', 'downloadpdf');
        
        document.getElementById('modalDownloadBtn').setAttribute('onclick', `downloadReceipt('${downloadUrl}', '${receiptId}')`);
        
        $.ajax({
            type: "get",
            url: url + "&ajax=1",
            success: (result) => {
                $('#receiptModalBody').html(result);
                $('#modalDownloadBtn, #modalPrintBtn').prop('disabled', false);
            },
            error: (error) => {
                $('#receiptModalBody').html('<div class="alert alert-danger m-3">Error loading receipt. Please try again.</div>');
            }
        });
    }

    function downloadReceipt(url, receiptId) {
        const modalContent = document.getElementById('printable-receipt');
        const isModalOpen = $('#receiptModal').is(':visible');
        const isLoaded = $('#modalDownloadBtn').prop('disabled') === false;

        if (isModalOpen && modalContent && isLoaded) {
            captureAndSave(modalContent, receiptId);
        } else {
            const captureArea = document.getElementById('captureArea');
            captureArea.innerHTML = '<div style="text-align:center; padding:50px;">Generating PDF...</div>';
            
            $.ajax({
                type: "get",
                url: url.replace('downloadpdf', 'paymentreceiptpdf') + "&ajax=1",
                success: (result) => {
                    captureArea.innerHTML = result;
                    setTimeout(() => {
                        const element = captureArea.querySelector('#printable-receipt');
                        if (element) {
                            captureAndSave(element, receiptId, true);
                        }
                    }, 800);
                }
            });
        }
    }

    function captureAndSave(element, receiptId, isSilent = false) {
        const fileName = receiptId ? 'receipt_' + receiptId + '.pdf' : 'receipt.pdf';
        const opt = {
            margin: 0.3,
            filename: fileName,
            image: { type: 'jpeg', quality: 1.0 },
            html2canvas: { scale: 3, useCORS: true, letterRendering: true, scrollY: 0 },
            jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
        };

        html2pdf().set(opt).from(element).save().then(() => {
            if (isSilent) {
                document.getElementById('captureArea').innerHTML = '';
            }
        });
    }


    function printReceiptFromModal() {
        window.print();
    }


    $.ajax({
    type: "post",
    url: "coordinators/getpendingamount",
    data: { "id": "<?= session()->get('Kaadaisoft_userId'); ?>" },
    success: function(result) {
        globalEventParticipation = JSON.parse(result);
        renderPendingTable(globalEventParticipation);
    },
    error: function(error) {
        // handle error here
        console.error("Error fetching pending amount:", error);
    }
});




     let windowheight = window.innerHeight;
    let form_height = windowheight*(95/100);
    let form_section = document.getElementById("update-manager-section");
    form_section.style.height = `${form_height}px`;  
    function changepage(page){
       let pagename = page.name;
       
       $.ajax({
           type:"get",
           url:pagename,
           success:(page)=>{
              document.getElementById("changepage").innerHTML = page;     
           },
           error:(error)=>{
            document.getElementById("changepage").innerHTML = error;
           }
       })
    }

  function hideupdatemanagerform(){
    let formmodal = document.getElementById("update-manager-section");
        let b = window.innerWidth;
    if( b > 768){
        showupdatemanager.style.left = "-100%";
        formmodal.style.left = "-95%";
       }
    else{
        showupdatemanager.style.left = "-100%";
        formmodal.style.left = "-95%";
       }
  }
  

  

        function searchcoordinators(coords){
             
            let searchfields = coords.value;
    
            $.ajax({
              type:"get",
              url:"coordinators/searchcoordinators",
              data:{"searchfields":searchfields},
              success:(result)=>{
                document.getElementById('ps-coords').innerHTML = result;
              },
              error:(error)=>{
                document.getElementById('ps-coords').innerHTML = error;
              }
           })};                                


    window.addEventListener("resize",()=>{
       document.getElementById("menu-bar").style.height = (window.innerHeight - document.getElementById("search-bar").getBoundingClientRect().height)+"px"; 
       let formmodal = document.getElementById("update-manager-section");
       let b = window.innerWidth;
       if( b > 768){
        formmodal.style.left = "2.5%";
       }
       else{
        formmodal.style.left = "2.5%";
       }
    });

      function showupdatemanagermodal(id) {
      
      let formmodal = document.getElementById("update-manager-section");
       let b = window.innerWidth;

        $.ajax({
        type:"get",
        url:"admindashboard/getmanager",
        data:{"id":id},
        success:(result)=>{
          console.log(result)
           $("#update-manager-form").html(result);
        },
        error:(error)=>{
           document.getElementById("update-manager-form").innerHTML = "Error fetching data";
        }
      });

       if( b > 768){
        showupdatemanager.style.left = "0%";
        formmodal.style.left = "2.5%";

       }
       else{
        showupdatemanager.style.left = "0%";
        formmodal.style.left = "2.5%";
       }
    }

  function setDropdowndistricts(state){
   let state_id = state.value;

    $.ajax({
      type:"get",
      url:"members/getDistrictsfordropdown",
      data:{"state_id":state_id},
      success:(result)=>{
           document.getElementById("districts-dropdown").innerHTML = result;
      },
      error:()=>{
           document.getElementById("districts-dropdown").innerHTML = "<option>Error fetching Districts</option>";
      }
    });
    }

  function setDropdowntaluks(district){
   let district_name = district.value;
   $.ajax({
      type:"get",
      url:"members/getTaluksfordropdown",
      data:{"district_name":district_name},
      success:(result)=>{
           document.getElementById("taluks-dropdown").innerHTML = result;
      },
      error:()=>{
           document.getElementById("taluks-dropdown").innerHTML = "Error fetching data";
      }
    });
}

function activateUpdateformbutton(checkbox){
let checked = checkbox.checked;
let submitbutton = document.getElementById("updatesubmitbutton");
if(checked){
   submitbutton.removeAttribute("disabled");
}
else{
   submitbutton.setAttribute("disabled","disabled");
}
}

function setDropdownpanchayat(taluk){
   let taluk_name = taluk.value; 
   $.ajax({
      type:"get",
      url:"members/getPanchayatsfordropdown",
      data:{"taluk_name":taluk_name},
      success:(result)=>{
           document.getElementById("panchayat-dropdown").innerHTML = result;
      },
      error:()=>{
           document.getElementById("panchayat-dropdown").innerHTML = "Error fetching data";
      }
    });
}

function validateUpdateInputfield(field){
   let field_name = field.name;
   let field_value = field.value;
   let textregex = /^[A-Za-z\s]+$/;
   let alphanumericregex = /^[a-zA-Z0-9/()\s]+$/;
   let normalregex = /^[A-Za-z0-9]+$/;

   if(field_name == "name-update"){
      if(field_value.length <3){
         field.nextElementSibling.innerHTML = "Min 3 characters required.";
      }
      else if(field_value !== "" && !field_value.match(textregex)){
         field.nextElementSibling.innerHTML = "Only letters and spaces allowed for name field.";
      }
      else{
         field.nextElementSibling.innerHTML = "";
      }
   }

   if(field_name == "village-update" || field_name == "street"){
      if(field_value !== "" && !field_value.match(alphanumericregex)){
         field.nextElementSibling.innerHTML = "Only letters,numbers,spaces are allowed.";
      }
      else{
         field.nextElementSibling.innerHTML = "";
      }
   }

   if(field_name == "doorno-update"){
      if(field_value !== "" && !field_value.match(alphanumericregex)){
         field.nextElementSibling.innerHTML = "Don\'t use special characters.";
      }
      else{
         field.nextElementSibling.innerHTML = "";
      }
   }

   if(field_name == "pincode-update"){
      if(field_value.length == 6 || field_value.length == 0){
         document.getElementById("pincodeerror-update").innerHTML = "";
      }
      else if(field_value.length < 6){
         document.getElementById("pincodeerror-update").innerHTML = "Pincode number should contain 6 digits.";
      }
   }

   if(field_name == "phoneno-update"){
      console.log(field_value.length)
      if(field_value.length < 10){
         document.getElementById("phonenoerror-update").innerHTML = "Phone number should contain 10 digits.";
      }
      else if(field_value.length >= 10 || field_value.length == 0){
         document.getElementById("phonenoerror-update").innerHTML = "";
      }
      
   }

   if(field_name == "existfamilyid-update"){
      if(field_value !== "" && !field_value.match(alphanumericregex)){
         field.nextElementSibling.innerHTML = "Only letters,numbers are allowed.";
      }
      else{
         field.nextElementSibling.innerHTML = "";
      }
   }

   if(field_name == "aadharno-update"){
      if(field_value.length == 12 || field_value.length == 0){
         document.getElementById("aadharnoerror-update").innerHTML = "";
      }
      else if(field_value.length < 12){
         document.getElementById("aadharnoerror-update").innerHTML = "Aadhar number should contain 12 digits.";
      }
   }
}

function validateManagerform() { 
  
      let managerregistrationform = document.forms["managerregistration-update"];
      let name = managerregistrationform["name-update"].value.trim();
      let state = managerregistrationform["state-update"].value.trim();
      let district = managerregistrationform["district-update"].value.trim();
      let taluk = managerregistrationform["taluk-update"].value.trim();
      let panchayat = managerregistrationform["panchayat-update"].value.trim();
      let village = managerregistrationform["village-update"].value.trim();
      let street = managerregistrationform["street-update"].value.trim();
      let doorno = managerregistrationform["doorno-update"].value.trim();
      let pincode = managerregistrationform["pincode-update"].value.trim();
      let existfamilyid = managerregistrationform["existfamilyid-update"].value.trim();
      let phoneno = managerregistrationform["phoneno-update"].value.trim();
      let aadharno = managerregistrationform["aadharno-update"].value.trim();
      let selfimage = managerregistrationform["Memberimage"].value.trim();
      let aadharfrontimage = managerregistrationform["Aadharfrontimage"].value.trim();
      let aadharbackimage = managerregistrationform["Aadharbackimage"].value.trim();
      let communitycertificate = managerregistrationform["Communitycertificate"].value.trim();
   
      let textregex = /^([A-Za-z\s]{3,})+$/;
      let alphanumericregex = /^[a-zA-Z0-9/()\s]+$/;
      let normalregex = /^[A-Za-z0-9]+$/;

      if(name == ""){
        document.getElementById("nameerror-update").innerHTML = "Please fill this filed.";
  
        return false;
      }

      else{
        if(!name.match(textregex)){
         document.getElementById("nameerror-update").innerHTML = "Min 3 letters required.Only letters and spaces allowed for name field.";
         return false;
        }     
      }

      if(state == ""){
         document.getElementById("stateerror-update").innerHTML = "Please choose state";
         return false;
      }

      if(district == ""){
         document.getElementById("districterror-update").innerHTML = "Please choose district.";
         return false;
      }

      if(taluk == ""){
         document.getElementById("talukerror-update").innerHTML = "Please choose taluk.";
         return false;
      }

      if(panchayat == ""){
         document.getElementById("panchayaterror-update").innerHTML = "Please choose panchayat.";
         return false;
      }

      if(village == ""){
         document.getElementById("villageerror-update").innerHTML = "Please fill village field";
         return false;
      }
      else{
         if(!village.match(alphanumericregex)){
         document.getElementById("villageerror-update").innerHTML = "Only letters,numbers,spaces are allowed.";
         return false;
         }
      }

      if(street == ""){
         document.getElementById("streeterror-update").innerHTML = "Please fill street field";
        
         return false;
      }
      else{
         if(!street.match(alphanumericregex)){
         document.getElementById("streeterror-update").innerHTML = "Only letters,numbers,spaces are allowed.";
        
         return false;
         }
      }

      if(doorno == ""){
         document.getElementById("doornoerror-update").innerHTML = "Please fill door no/apartment no field.";
        
         return false;
      }
      else{
         if(!doorno.match(alphanumericregex)){
         document.getElementById("doornoerror-update").innerHTML = "Don\'t use special characters.";
         return false;
         }
      }

      if(pincode == ""){
         document.getElementById("pincodeerror-update").innerHTML = "Please fill phoneno field.";
         
         return false;
      }
      else if(pincode.length < 6){
         document.getElementById("pincodeerror-update").innerHTML = "Pincode should contain 6 digits.";
         
         return false;
      }

      if(existfamilyid !== ""){
         if(!existfamilyid.match(normalregex)){
            document.getElementById("familyiderror-update").innerHTML = "Only letters and numbers are allowed.";
            d
            return false;
         }
      }

      if(phoneno == ""){
         document.getElementById("phonenoerror-update").innerHTML = "Please fill phoneno field.";
         
         return false;
      }


      if(aadharno == ""){
         document.getElementById("aadharnoerror-update").innerHTML = "Please fill aadharno field.";
         d
         return false;
      }
      else if(aadharno.length < 12){
         document.getElementById("aadharnoerror-update").innerHTML = "Aadhar number should contain 12 digits.";
         d
         return false;
      }

      return true;
}

function uploadFile(file){

    let imageid = file.name;
    let imageclass = file.name;
    let errorbox = document.querySelector(`.${imageclass}`);
    let filereader = new FileReader();
    let imagesize = 2000000;
    let uploadedimagesize = file.files[0].size;

    if(uploadedimagesize > imagesize){
        errorbox.textContent = "Image size should below 2MB";
            file.value = "";
            return false;
    }
    else{
        errorbox.textContent = "";
    }

    let imgurl = URL.createObjectURL(file.files[0]);
    let image = document.getElementById(imageid);
    image.style.display = "block";
    image.src = imgurl;
    image.nextElementSibling.innerHTML = `<button class='ps-img-btn mt-2 rounded' type='button' onclick='removeImage(this,${file.name})'>Remove</button>`; 
}
    // document.getElementById("statusfilter").addEventListener("submit",(event)=>{
    //         event.preventDefault();
            
    //   $.ajax({
    //   type:"post",
    //   url:"admindashboard/getOverallstatus",
    //   data:{"parameter":parameter},
    //   success:(result)=>{
    //        document.getElementById("districtid").innerHTML = result;
    //   },
    //   error:(error)=>{
    //        document.getElementById("districtid").innerHTML = "<option>Error fetching districts</option>"
    //   }
    // }); 
    // })

    // Hamburger menu perfect working
document.addEventListener('DOMContentLoaded', function() {
  // Rebind hamburger menu after AJAX
  function bindHamburger() {
    const hamMenus = document.querySelectorAll('.ham-menu[data-bs-toggle="offcanvas"]');
    hamMenus.forEach(menu => {
      menu.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        const target = document.querySelector(this.getAttribute('data-bs-target'));
        const offcanvas = new bootstrap.Offcanvas(target);
        offcanvas.toggle();
      });
    });
  }
  
  // Bind after AJAX loads
  bindHamburger();
  
  // Rebind after pslogo AJAX
  $.ajax({
    type:"get",
    url:"dashboard/pslogo",
    success:(result)=>{
      document.getElementById("ps-logo").innerHTML = result;
      setTimeout(bindHamburger, 200);
    }
  });
});


  </script>

    <div id="captureArea" class="no-print" style="position: absolute; left: -9999px; width: 800px; padding: 20px; background: white;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>

