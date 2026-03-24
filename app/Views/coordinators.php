<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinators</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <!-- <link rel="stylesheet" href="./kaadaisoft.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        position: relative;
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

      .ps-add-btn {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.2);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
      }
      .ps-add-btn:hover {
        background: linear-gradient(135deg, #1e293b, #334155);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(15, 23, 42, 0.3);
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

    /* Modern Premium Table Styling */
    .table-container-premium {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      border: 1px solid #e2e8f0;
      overflow-x: auto;
      margin-bottom: 2rem;
    }
    .custom-table-premium {
      width: 100%;
      min-width: 1000px;
      margin-bottom: 0;
      border-collapse: separate;
      border-spacing: 0;
    }
    .custom-table-premium thead th {
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
    .custom-table-premium tbody tr {
      transition: all 0.2s ease;
    }
    .custom-table-premium tbody tr:hover {
      background-color: #f8fafc;
      transform: scale(1.002);
      box-shadow: inset 4px 0 0 #3b82f6;
    }
    .custom-table-premium td {
      padding: 16px;
      vertical-align: middle;
      color: #334155;
      font-size: 0.95rem;
      border-bottom: 1px solid #f1f5f9;
      text-align: center;
    }
    .btn-action-premium {
      width: 32px;
      height: 32px;
      border: none;
      background: #f1f5f9;
      color: #475569;
      border-radius: 8px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s;
      margin: 0 2px;
    }
    .btn-action-premium:hover {
      background: #0f172a;
      color: #fff;
      transform: translateY(-2px);
    }
    .btn-view-premium { color: #2563eb; background: #eff6ff; }
    .btn-edit-premium { color: #0891b2; background: #ecfeff; }
    .btn-trash-premium { color: #dc2626; background: #fef2f2; }
    
    .btn-view-premium:hover { background: #2563eb; color: #fff; }
    .btn-edit-premium:hover { background: #0891b2; color: #fff; }
    .btn-trash-premium:hover { background: #dc2626; color: #fff; }

    .table-container-premium::-webkit-scrollbar {
      height: 8px;
    }
    .table-container-premium::-webkit-scrollbar-track {
      background: #f1f5f9;
    }
    .table-container-premium::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 4px;
    }

      #coords-form div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 10px;
      }

      #coords-form div > button{
        border-radius:50px;
      }

      #add-coords-form{
        width:95%;
        border-radius:25px;
        box-sizing:border-box;
        position: relative;
      }

      #coords-modal-hide{
        position: fixed;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        z-index: 2000;
        transition:0.4s;
        transition-timing-function:ease;
      }

      #assigncoords-form div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 10px;
      }

      #assigncoords-form div > button{
        border-radius:50px;
      }

      #assign-coords-form{
        width:95%;
        border-radius:25px;
        box-sizing:border-box;
        padding:3%;
        position: relative;
      }

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
      }

      #assigncoords-modal-hide{
        position: fixed;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        z-index: 2000;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .coords-modal{
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

      #update-coords-form div > input,select{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:0px 10px;
      }

      #update-coords-section{
        width:95%;
        border-radius:25px;
        box-sizing:border-box;
        position: relative;
      }

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
      }

      #updatecoords-modal-hide{
        position: fixed;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        z-index: 2000;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .updatecoords-modal{
        padding:10px 0;
        background-color:rgba(128, 128, 128, 0.4);
        overflow:hidden;
      }

      .active-coords{
        background-color:rgb(230, 230, 230);
        font-weight:600;
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
      background-color: rgb(0, 123, 255);;
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

     .trashcoord:hover .trashtooltip{
        visibility:visible;
     }
     
     .assignmember:hover{
      background-color:#ddd;
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

      /* Firefox */
     input[type=number] {
     -moz-appearance: textfield;
     }

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
           .coordpadd:nth-child(2){
            padding:0% !important;
           }
           .coordpadd:nth-child(1){
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
      }

      @media screen and (max-width:768px) {
        
          #add-coords-form div > input{
            padding: 5px;
          }
          #add-coords-form{
            width:90%;
            padding:8%;
          }
          #update-coords-section div > input{
            /* padding: 5px; */
          }
          #update-coords-section{
            width:90%;
            /* padding:8%; */
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
      }

      /* ✅ Premium Table Design */
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
      
      /* Premium Pagination UI */
      .pagination-btn {
        min-width: 36px;
        height: 36px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        background: #fff;
        border: 1px solid #e2e8f0;
        color: #475569;
        transition: all 0.2s ease;
        padding: 0 12px;
      }
      .pagination-btn:hover:not(:disabled) {
        background: #f1f5f9;
        color: #0f172a;
        transform: translateY(-1px);
      }
      .pagination-btn.active {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        color: white;
        border: none;
        box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.2);
      }
      .pagination-btn.disabled {
        opacity: 0.5;
        cursor: not-allowed;
      }
      .pagination-ellipsis {
        padding: 0 8px;
        color: #94a3b8;
        font-weight: 500;
      }
    </style>
</head>
<body>
        
<div id="pageheight" class="container-fluid" style="overflow:hidden;position:absolute;height:100vh;width:100%;">
<?= view('notification_toast') ?>

      <div id="side-bar" class="row" style="flex-wrap: wrap;"><!-----top-bar--------------->

      <div id="ps-logo" class="col-12 col-md-2 border-bottom border-md-0 py-2 py-md-3 d-flex align-items-center justify-content-start ps-2" style="background: #0f172a;">
               
               </div>
       
               <div id="search-bar" class="col-12 col-md-10 border-bottom border-md-0" style="background: #0f172a;">
       
              
               </div>
        </div><!-----------top-bar-end----------------------->


        <div id="pagecontrol" class="row"><!----------main-navbar----------->

        <div id="menu-bar" style="overflow-y:auto; overflow-x:hidden;" class="col-md-2 ps-gray"><!----------side-bar-------------------->
       
              
        </div><!-----------side-bar-end-------------->
            
        <div id="main-dashboard-content" style="overflow-y:auto; padding-bottom:50px; overflow-x:auto;" class="col-md-10"><!-----------main-dashboard------------------------->
         
        <div class="container-fluid px-4 pt-4 d-flex justify-content-between coordpadd">
         <span class="h5">Coordinators</span>
         <div>
         <a href="<?=base_url("assigncoordinator")?>" class='text-decoration-none ps-add-btn text-white py-1 px-4'>+&nbsp;Assign</a>
      
         </div>
        </div>
         
        <div style="overflow:auto;" class="container-fluid pt-3 px-4 coordpadd"><!----------------table--------------->
        <div class="mb-2 fw-bold" style="color: #444; font-size: 1.1rem;">Total Coordinators: <span id="total-coords-count" class="badge bg-primary rounded-pill"><?= $newcounts ?? $counts ?? 0 ?></span></div>
        <div class="table-container-premium">
            <table class="custom-table-premium">
                <thead>
                <tr>
                <th>S.No</th><th>User ID</th><th>Name</th><th>Mobile</th><th>District</th><th>Taluk</th><th>Panchayat</th><th>Assigned Villages</th><th>Actions</th>
                </tr>
                </thead>
                <tbody id="ps-coords">
                   <?php if(isset($coordinators) && count($coordinators) > 0): ?>
                       <?= view('coordinatorslist', ['coordinators' => $coordinators, 'sno' => $sno ?? 0]) ?>
                   <?php else: ?>
                       <tr><td colspan='9' class='text-center'>No results found</td></tr>
                   <?php endif; ?>
                </tbody>
            </table>
        </div>
        </div> <!----------------table-end------->

        <div class='d-flex justify-content-center container-fluid'> <!-----------------pagination---------------------->
        
        <div id="coordsPagination" class="col-md-6 py-2 d-flex justify-content-around align-items-center">

        
        </div><!--------------pagination-end--------------------->

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

<!-----------------------Update-Coordinators-modal-------------------------------------------->
        
<div id="updatecoords-modal-hide" class="updatecoords-modal">

        <div id="update-coords-section" style="overflow-y:auto;border-radius:25px;" class="bg-white">
              
        <div id="update-coords-form" class="bg-white container">
   
        </div>
        </div>
        </div>
<!-----------------------------Update-coordinators-end-------------------------------->

<!--------------------------delete-modal---------------------->

<div class="modal fade" id="deletemodal">

<div class="modal-dialog">
   <div class="modal-content">
      
       <div class="modal-header">
          <h4 style="color:red;">Alert</h4>
          <button class="btn btn-close" data-bs-dismiss="modal"></button>
       </div>

       <div id="deletebox" class="modal-body">
        
       </div>

   </div>
</div>

</div>

<!--------------------------delete-modal-end------------------>

<!--------------------view-members------------------------->
<div id="viewCoordinatordata" class="modal fade">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
   <div class="modal-content">
     <div class="modal-header">
     <h4>Members list:</h4>
     <button id="closeassignmodal" class="btn btn-close" data-bs-dismiss="modal"></button>
     </div>

     <div id="viewmemberslist" class="modal-body">
     
     </div>

   </div>
  </div>

</div>
<!--------------------view-members-end---------------------->

<!-----------------set-index--------------------->
<?php
 
if(isset($_SESSION["altercoordsindex"]) && isset($counts)){
  $index = $_SESSION["altercoordsindex"];
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

unset($_SESSION["altercoordsindex"]);
?>
<!-----------------set-index-end----------------->

<script>

let unselectedmembers = [];
let resultbox = document.getElementById("searchmemberdata");

// Premium Pagination State
const ITEMS_PER_PAGE = 10;
let currentTotalCount = <?= isset($counts) ? $counts : 0 ?>;
let currentActivePage = <?= isset($initialindex) ? ($initialindex + 1) : 1 ?>;
let currentSearchQuery = "";

// Render initial pagination on load
document.addEventListener("DOMContentLoaded", function() {
    renderPagination(currentTotalCount, currentActivePage);
});

function renderPagination(totalItems, currentPage) {
  if (!totalItems || totalItems <= 0) {
    document.getElementById("coordsPagination").innerHTML = "";
    return;
  }
  const totalPages = Math.ceil(totalItems / ITEMS_PER_PAGE);

  let html = `<div class="d-flex flex-column align-items-center"><div class="d-flex justify-content-center align-items-center gap-2 mt-2">`;

  // Prev Button
  html += `<button class="pagination-btn ${currentPage === 1 ? 'disabled' : ''}" 
              onclick="goToPage(${currentPage - 1})" 
              ${currentPage === 1 ? 'disabled' : ''}>
              <i class="fa-solid fa-chevron-left"></i>
           </button>`;

  // Page Numbers
  for (let i = 1; i <= totalPages; i++) {
    if (totalPages <= 7 || i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
      html += `<button class="pagination-btn ${i === currentPage ? 'active' : ''}" 
                  onclick="goToPage(${i})">${i}</button>`;
    } else if (i === currentPage - 2 || i === currentPage + 2) {
      html += `<span class="pagination-ellipsis">...</span>`;
    }
  }

  // Next Button
  html += `<button class="pagination-btn ${currentPage === totalPages ? 'disabled' : ''}" 
              onclick="goToPage(${currentPage + 1})"
              ${currentPage === totalPages ? 'disabled' : ''}>
              <i class="fa-solid fa-chevron-right"></i>
           </button>`;

  html += `</div>`;
  html += `<div class="text-center mt-2 text-muted small">Showing page ${currentPage} of ${totalPages}</div></div>`;
  
  document.getElementById("coordsPagination").innerHTML = html;
}

function goToPage(page) {
   const totalPages = Math.ceil(currentTotalCount / ITEMS_PER_PAGE);
   if (page < 1 || page > totalPages) return;
   currentActivePage = page;
   
   let offset = (page - 1);
   
   if (currentSearchQuery !== "") {
       // Optional: implement paginated search if backend supports it. For now, backend search is list-all or list matching.
       // We'll just call search again if it doesn't support pagination
   }
   
   $.ajax({
      type: "get",
      url: "coordinators/changecoordinatorspagesetup",
      data: { "initialindex": offset },
      success: function(result) {
          document.getElementById('ps-coords').innerHTML = result;
          renderPagination(currentTotalCount, currentActivePage);
      },
      error: function(err) {
          console.error("Error loading data.");
      }
   });
}

function commonSearch(coords) {
   let searchfields = coords.value;
   currentSearchQuery = searchfields;
   currentActivePage = 1;

   $.ajax({
      type: "get",
      url: "coordinators/searchcoordinators",
      data: { "searchfields": searchfields },
      dataType: "json",
      success: (result) => {
          document.getElementById('ps-coords').innerHTML = result.html;
          currentTotalCount = result.total;
          const totalBadge = document.getElementById('total-coords-count');
          if (totalBadge) totalBadge.innerText = currentTotalCount;
          renderPagination(currentTotalCount, currentActivePage);
      },
      error: (error) => {
          document.getElementById('ps-coords').innerHTML = "<tr><td colspan='9' class='text-center'>Error fetching data</td></tr>";
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

$.ajax({
      type:"get",
      url:"coordinators/sidemenu",
      success:(result)=>{
           document.getElementById("menu-bar").innerHTML = result;
           // Populate custom mobile menu content
           document.getElementById("mobile-menu-content").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("menu-bar").innerHTML = "Error fetching data";
      }
    });

    $.ajax({
      type:"get",
      url:"coordinators/topsubmenu",
      success:(result)=>{
      },
      error:(error)=>{
           document.getElementById("offcanvasmenu").innerHTML = "Error fetching data";
      }
    });


    $.ajax({
      type:"get",
      url:"coordinators/topmenu",
      success:(result)=>{
           document.getElementById("search-bar").innerHTML = result;
           },
           error:(error)=>{
           document.getElementById("search-bar").innerHTML = "Error fetching data";
      }
    });

    $.ajax({
      type:"get",
      url:"coordinators/pslogo",
      success:(result)=>{
           document.getElementById("ps-logo").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("ps-logo").innerHTML = "Error fetching data";
      }
    });

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
           document.getElementById("districts-dropdown").innerHTML = "Error fetching data";
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


    let windowheight = window.innerHeight;
    let form_height = windowheight*(95/100);
    let form_section = document.getElementById("update-coords-section");
    form_section.style.height = `${form_height}px`;

     let setheight = document.getElementById("pagecontrol");
     let pageheight = window.innerHeight;
     let b = document.getElementById("search-bar").getBoundingClientRect().height;
     setheight.style.height = pageheight - b+"px";
    
    function generatecoordaddress(aadharno){
      let aadhar = aadharno.value;
      $.ajax({
      type:"get",
      url:"coordinators/getcoordaddress",
      data:{"aadhar":aadhar},
      success:(result)=>{
           document.getElementById("coordaddress").innerHTML = result;
      },
      error:(error)=>{
        document.getElementById("coordaddress").innerHTML = "Error fetching data";
      }
      });
    }
  
   
   


   function displayCoordinators(counts,index){
        const itemsPerPage = 10;
        const start = counts;
        const end = counts + itemsPerPage;
         activepage = document.querySelectorAll(".active");
         let l = activepage.length;
         for(let i=0; i < l ; i++){
          if(i == index ){
               activepage[i].classList.add("active-page");
          }
          else{
            if(activepage[i].classList.contains("active-page")){
               activepage[i].classList.remove("active-page")
            }
          }   
         } 
      renderCoordinators(coordData.slice(start, end), start);
    }
    function getMemberdata(data){
      let memberdata = data.value;
      $.ajax({
        type:"get",
        url:"coordinators/getMembersforassign",
        data:{"searchfields":memberdata},
        success:function(result){
            resultbox.style.display = "block";
            document.getElementById("searchmemberdata").innerHTML = result;
        },
        error:function(error){
            document.getElementById("searchmemberdata").innerHTML = "Error fetching data";
        }
      });
    }

    function viewCoordinatordata(url){
     let a = document.createElement("a");
     a.href = url;
     a.dispatchEvent(new MouseEvent("click"));  
    }

      function reassignSelect(member){
        let checkmember = member.checked;
        let l = unselectedmembers.length;
        let newarray = [];
        if(checkmember){
           unselectedmembers.push(member.value);
        }
        else{
          
          for(let i = 0;i < l;i++){
          if(unselectedmembers[i] !== member.value){
             newarray = [...newarray,unselectedmembers[i]];
          }  
          }
          document.getElementById("selectunselect").checked = false;
          unselectedmembers = newarray;
        }
      }
      

      function selectunselect(select){
       let selectmember = document.querySelectorAll(".unselectmembers")
       let l = selectmember.length;
       let selected = select.checked;
       if(selected == true){
              unselectedmembers = [];
       for(let i=0;i < l;i++){
              selectmember[i].checked = true;
              unselectedmembers.push(selectmember[i].value);
       }    
       }
       else{
        for(let i=0;i < l;i++){
              selectmember[i].checked = false;
              unselectedmembers = []
              unselectedmembers = unselectedmembers.filter((v,i)=>{ v !== selectmember[i].value });
            } 
       }
      }
      
     function membersReassign(){
          if(unselectedmembers == ""){
          document.getElementById("reassignalert").innerHTML = 
          "<div class='alert alert-success alert-dismissible' role='alert'>Please select Members</div>"
          }
          else{       
          $.ajax({
          type:"post",
          url:"members/multiplereassign",
          data:{"membersaadhar":unselectedmembers},
          success:(result)=>{  
            /* let unselectmember = document.querySelectorAll(".unselectmembers")
            let unselect = document.getElementById("selectunselect")
            let l = unselectmember.length;
              for(let i = 0;i<l ; i++ ){
                unselectmember[i].checked = false;
              }
              unselect.checked = false; */
              window.location.reload();
             /*  document.getElementById('coordinatorstatus').innerHTML = "Members are Reassigned to coordinators";
              document.getElementById('coordtoast').style.right = '5%';
              setTimeout(()=>{
              document.getElementById('coordtoast').style.right = '-380px';
              },3000) */
             
    	      
          },
          error:(error)=>{
            psShowToast('error', 'Something went wrong. Please try again.');
          }
          });  
          } 
     }



    window.addEventListener("resize",()=>{
       document.getElementById("menu-bar").style.height = window.innerHeight+"px"; 
       let formmodal = document.getElementById("assign-coords-form");
       let b = window.innerWidth;
       if( b > 768){
        formmodal.style.left = "29%";
       }
       else{
        formmodal.style.left = "5%"; 
       }
    });

    window.addEventListener("resize",()=>{
       document.getElementById("menu-bar").style.height = window.innerHeight+"px"; 
       let formmodal = document.getElementById("update-coords-section");
       let b = window.innerWidth;
       if( b > 768){
        formmodal.style.left = "2.5%";
       }
       else{
        formmodal.style.left = "2.5%";
       }
    });

    let showupdatecoords = document.getElementById("updatecoords-modal-hide");
    let logoheight = document.getElementById("ps-logo");

    function showupdatecoordsmodal(id) {
      
      let formmodal = document.getElementById("update-coords-section");
       let b = window.innerWidth;

        $.ajax({
        type:"get",
        url:"coordinators/getcoordinator",
        data:{"id":id},
        success:(result)=>{
           $("#update-coords-form").html(result);
        },
        error:(error)=>{
           document.getElementById("update-coords-form").innerHTML = "Error fetching data";
        }
      });

       if( b > 768){
        showupdatecoords.style.left = "0%";
        formmodal.style.left = "2.5%";

       }
       else{
        showupdatecoords.style.left = "0%";
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

function validateInputfield(field){
   let field_name = field.name;
   let field_value = field.value;
   let textregex = /^[A-Za-z\s]+$/;
   let alphanumericregex = /^[a-zA-Z0-9/()\s]+$/;
   let normalregex = /^[A-Za-z0-9]+$/;

   if(field_name == "name"){
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

   if(field_name == "village" || field_name == "street"){
      if(field_value !== "" && !field_value.match(alphanumericregex)){
         field.nextElementSibling.innerHTML = "Only letters,numbers,spaces are allowed.";
      }
      else{
         field.nextElementSibling.innerHTML = "";
      }
   }

   if(field_name == "doorno"){
      if(field_value !== "" && !field_value.match(alphanumericregex)){
         field.nextElementSibling.innerHTML = "Don\'t use special characters.";
      }
      else{
         field.nextElementSibling.innerHTML = "";
      }
   }

   if(field_name == "pincode"){
      if(field_value.length == 6 || field_value.length == 0){
         document.getElementById("pincodeerror").innerHTML = "";
      }
      else if(field_value.length < 6){
         document.getElementById("pincodeerror").innerHTML = "Pincode number should contain 6 digits.";
      }
   }

   if(field_name == "phoneno"){
      if(field_value.length >= 10 || field_value.length == 0){
         document.getElementById("phonenoerror").innerHTML = "";
      }
      else if(field_value.length < 10){
         document.getElementById("phonenoerror").innerHTML = "Phone number should contain 10 digits.";
      }
   }

   if(field_name == "existfamilyid"){
      if(field_value !== "" && !field_value.match(alphanumericregex)){
         field.nextElementSibling.innerHTML = "Only letters,numbers are allowed.";
      }
      else{
         field.nextElementSibling.innerHTML = "";
      }
   }

   if(field_name == "aadharno"){
      if(field_value.length == 12 || field_value.length == 0){
         document.getElementById("aadharnoerror").innerHTML = "";
      }
      else if(field_value.length < 12){
         document.getElementById("aadharnoerror").innerHTML = "Aadhar number should contain 12 digits.";
      }
   }
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

function validateCoordinatorform() { 
  
      let coordinatorregistrationform = document.forms["coordinatorregistration-update"];
      let name = coordinatorregistrationform["name-update"].value.trim();
      let state = coordinatorregistrationform["state-update"].value.trim();
      let district = coordinatorregistrationform["district-update"].value.trim();
      let taluk = coordinatorregistrationform["taluk-update"].value.trim();
      let panchayat = coordinatorregistrationform["panchayat-update"].value.trim();
      let village = coordinatorregistrationform["village-update"].value.trim();
      let street = coordinatorregistrationform["street-update"].value.trim();
      let doorno = coordinatorregistrationform["doorno-update"].value.trim();
      let pincode = coordinatorregistrationform["pincode-update"].value.trim();
      let existfamilyid = coordinatorregistrationform["existfamilyid-update"].value.trim();
      let phoneno = coordinatorregistrationform["phoneno-update"].value.trim();
      let aadharno = coordinatorregistrationform["aadharno-update"].value.trim();
      let selfimage = coordinatorregistrationform["Memberimage"].value.trim();
      let aadharfrontimage = coordinatorregistrationform["Aadharfrontimage"].value.trim();
      let aadharbackimage = coordinatorregistrationform["Aadharbackimage"].value.trim();
      let communitycertificate = coordinatorregistrationform["Communitycertificate"].value.trim();
   
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

function removeImage(button,file){
   let imageid = file.name;
   document.getElementById(imageid).style.display = "none";
   button.style.display = "none";
     file.value = "";
}

function activateButton(checkbox){
let checked = checkbox.checked;
let submitbutton = document.getElementById("submitbutton");
if(checked){
   submitbutton.removeAttribute("disabled");
}
else{
   submitbutton.setAttribute("disabled","disabled");
}
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


    window.onclick = function(event) {

    if (event.target == showassigncoords) {
    let formmodal = document.getElementById("assign-coords-form");
        let b = window.innerWidth;
    if( b > 768){
        showassigncoords.style.left = "-100%";
        formmodal.style.left = "-95%";
       }
       else{
        showassigncoords.style.left = "-100%";
        formmodal.style.left = "-95%";
       }
    }

    else if (event.target == showcoords) {
    let formmodal = document.getElementById("add-coords-form");
        let b = window.innerWidth;
    if( b > 768){
        showcoords.style.left = "-100%";
        formmodal.style.left = "-95%";
       }
       else{
        showcoords.style.left = "-100%";
        formmodal.style.left = "-95%";
       }
    }

    else if (event.target == showupdatecoords) {
    let formmodal = document.getElementById("update-coords-section");
    let b = window.innerWidth;
    if( b > 768){
    showupdatecoords.style.left = "-100%";
    formmodal.style.left = "-42%";
    }
    else{
    showupdatecoords.style.left = "-100%";
    formmodal.style.left = "-90%";
   }
  }
  }


  function hideassigncoordsform(){
    let formmodal = document.getElementById("assign-coords-form");
        let b = window.innerWidth;
    if( b > 768){
        showassigncoords.style.left = "-100%";
        formmodal.style.left = "-42%";
       }
    else{
        showassigncoords.style.left = "-100%";
        formmodal.style.left = "-90%";
       }
  }

  function hidecoordsform(){
    let formmodal = document.getElementById("add-coords-form");
        let b = window.innerWidth;
    if( b > 768){
        showcoords.style.left = "-100%";
        formmodal.style.left = "-42%";
       }
    else{
        showcoords.style.left = "-100%";
        formmodal.style.left = "-90%";
       }
  }

  function hideupdatecoordsform(){
    let formmodal = document.getElementById("update-coords-section");
        let b = window.innerWidth;
    if( b > 768){
        showupdatecoords.style.left = "-100%";
        formmodal.style.left = "-95%";
       }
    else{
        showupdatecoords.style.left = "-100%";
        formmodal.style.left = "-95%";
       }
  }

  function deletecoord(id,name,area) {
    let baseUrl = "<?= base_url('coordinators/trash/') ?>"; 
    document.getElementById("deletebox").innerHTML = `<div class="d-flex justify-content-center "><span style="font-size:66px;color:red;"><i class="fa-regular fa-trash-can"></i></span></div>
    <p class="text-center fs-4">Move to trash <span style="color:green;" class="fs-4">${name}-${id}-${area}</span> </p> 
    <div class="d-flex justify-content-center">
    <div class="col-md-6 d-flex justify-content-evenly"> 
    <a style="border:none;outline:none;" class="px-2 py-1 btn btn-success rounded-3" href="${baseUrl}${id}">Confirm</a>&nbsp;&nbsp;<button style="border:none;outline:none;background-color:red;" class="px-2 py-1 btn text-white rounded-3" data-bs-dismiss="modal">Cancel</button>
    </div>
    </div>
    `; 
  }

let active = -1;

window.addEventListener("keydown",(e)=>{
       let memberoptions = document.getElementById("searchmemberdata").children;
       if(e.keyCode == 40){
         ++active;
            memberoptions[active].focus();     
       }
       else if(e.keyCode == 38){
         --active;
            memberoptions[active].focus();      
       }
});

let searchmemberdata = document.getElementById("searchmemberdata")

/* window.onclick = (e)=>{
   if(e.target !== searchmemberdata);
   document.getElementById("searchmemberdata").style.display = "none";
} */

  function movetotrash(id){
    $.ajax({
        type:"get",
        url:"coordinators/movetotrash",
        data:{"id":id},
        success:function(result){
        document.getElementById('ps-coords').innerHTML = result;
        psShowToast('success', 'Moved to trash successfully!');
        },
        error:function(error){
            psShowToast('error', 'An error occurred. Please try again.');
        }
      })
  }

  function assignForcoordinator(id,name){
    let membername = document.getElementById("memberdata");
    membername.value = name;
    document.getElementById("searchmemberdata").style.display = "none";
  }

  function validateCoordinatoraddform() {
    let memberregistrationform = document.forms["coordinatorregistration"];
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
      // let phonenoregex = /^[6-9]\d{9}+$/;

      if(name == ""){
        document.getElementById("nameerror").innerHTML = "Please fill this filed.";
  
        return false;
      }

      else{
        if(!name.match(textregex)){
         document.getElementById("nameerror").innerHTML = "Min 3 letters required.Only letters and spaces allowed for name field.";
         return false;
        }     
      }

      if(state == ""){
         document.getElementById("stateerror").innerHTML = "Please choose state";
         return false;
      }

      if(district == ""){
         document.getElementById("districterror").innerHTML = "Please choose district.";
         return false;
      }

      if(taluk == ""){
         document.getElementById("talukerror").innerHTML = "Please choose taluk.";
         return false;
      }

      if(panchayat == ""){
         document.getElementById("panchayaterror").innerHTML = "Please choose panchayat.";
         return false;
      }

      if(village == ""){
         document.getElementById("villageerror").innerHTML = "Please fill village field";
         return false;
      }
      else{
         if(!village.match(alphanumericregex)){
         document.getElementById("villageerror").innerHTML = "Only letters,numbers,spaces are allowed.";
         return false;
         }
      }

      if(street == ""){
         document.getElementById("streeterror").innerHTML = "Please fill street field";
        
         return false;
      }
      else{
         if(!street.match(alphanumericregex)){
         document.getElementById("streeterror").innerHTML = "Only letters,numbers,spaces are allowed.";
        
         return false;
         }
      }

      if(doorno == ""){
         document.getElementById("doornoerror").innerHTML = "Please fill door no/apartment no field.";
        
         return false;
      }
      else{
         if(!doorno.match(alphanumericregex)){
         document.getElementById("doornoerror").innerHTML = "Don\'t use special characters.";
         return false;
         }
      }

      if(pincode == ""){
         document.getElementById("pincodeerror").innerHTML = "Please fill phoneno field.";
         
         return false;
      }
      else if(pincode.length < 6){
         document.getElementById("pincodeerror").innerHTML = "Pincode should contain 6 digits.";
         
         return false;
      }

      if(existfamilyid !== ""){
         if(!existfamilyid.match(normalregex)){
            document.getElementById("familyiderror").innerHTML = "Only letters and numbers are allowed.";
            return false;
         }
      }

      if(phoneno == ""){
         document.getElementById("phonenoerror").innerHTML = "Please fill phoneno field.";
         
         return false;
      }


      if(aadharno == ""){
         document.getElementById("aadharnoerror").innerHTML = "Please fill aadharno field.";
         
         return false;
      }
      else if(aadharno.length < 12){
         document.getElementById("aadharnoerror").innerHTML = "Aadhar number should contain 12 digits.";
         
         return false;
      }

      if(selfimage == ""){
         document.querySelector(".selfimage").textContent = "Please upload Passport size photo.";
         return false;
      }

      if(aadharfrontimage == ""){
         document.querySelector(".aadharfrontimage").textContent = "Please upload front aadhar card photo.";
         return false;
      }

      if(aadharbackimage == ""){
         document.querySelector(".aadharbackimage").textContent = "Please upload back aadhar card photo.";
         return false;
      }

      if(communitycertificate == ""){
         document.querySelector(".communitycertificate").textContent = "Please upload community certificate.";
         return false;
      }


      return true;
  }

  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  // Load layout components
  $.ajax({
      type: "get",
      url: "<?= base_url('coordinators/sidemenu'); ?>",
      success: (result) => {
          document.getElementById("menu-bar").innerHTML = result;
          // Populate custom mobile menu content
          if(document.getElementById("mobile-menu-content")) {
              document.getElementById("mobile-menu-content").innerHTML = result;
          }
      }
  });

  $.ajax({
      type: "get",
      url: "<?= base_url('coordinators/topmenu'); ?>",
      success: (result) => {
          document.getElementById("search-bar").innerHTML = result;
      }
  });

  $.ajax({
      type: "get",
      url: "<?= base_url('coordinators/pslogo'); ?>",
      success: (result) => {
          document.getElementById("ps-logo").innerHTML = result;
      }
  });

  // Perfect Sidebar Height Calculation
  function adjustSidebarHeight() {
      if(window.innerWidth > 768) {
          let topBarHeight = document.getElementById("side-bar").offsetHeight || 80;
          let availableHeight = window.innerHeight - topBarHeight;
          document.getElementById("menu-bar").style.height = availableHeight + "px";
          document.getElementById("main-dashboard-content").style.height = availableHeight + "px";
      } else {
          document.getElementById("menu-bar").style.height = "auto";
          document.getElementById("main-dashboard-content").style.height = "auto";
      }
  }

  window.addEventListener('load', adjustSidebarHeight);
  window.addEventListener('resize', adjustSidebarHeight);
  // Also call it now just in case
  adjustSidebarHeight();

  // Mobile Menu Functions
  function openMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'block';
  }

  function closeMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'none';
  }
   </script>
  

 <!-------------------------------chart-end------------------------------------>  



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
    
</body>
</html>



<!-- <form id="assigncoords-form" name="coorddata" method="post" action="<?=base_url("coordinators/addcoordinator")?>">
            <div class="form-grid mt-3">
                <label class="pb-1" for="assignedArea">Area</label>
                <input type="text" name="coordarea" class="w-100" id="assignedArea" >
            </div>
            <div class="form-grid ">
                <label class="pb-1" for="name">Name</label>
                <input type="text" name = "coordname" class="w-100" id="name" >
            </div>
            <div class="form-grid mt-3">
                <label class="pb-1" for="Aadhar">Aadhar Number</label>
                <input type="text" name="coordaadhar" class="w-100" id="Aadhar" >
            </div>
            <div class="form-grid mt-3">
                <label class="pb-1" for="phone">Phone Number</label>
                <input type="text" name="coordphone" class="w-100" id="phone" >
            </div>
            <div class="form-grid mt-3">
                <label class="pb-1" for="status">Status</label>
                <input type="text"  name="coordstatus" class="w-100" id="status" >
            </div>
            <br>
            <div class="text-center">
                <input type="submit" name="coordsubmit" value="save" class="btn ps-add-btn text-white px-5 py-1">
            </div>
        </form> -->
