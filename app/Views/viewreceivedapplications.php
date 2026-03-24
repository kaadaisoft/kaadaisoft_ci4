<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Received Applications</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <!-- <link rel="stylesheet" href="./kaadaisoft.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>  
    <style>
      .ps-logo{
        display:flex;
        align-items:center;
        justify-content:center;
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
        width:42%;
        border-radius:25px;
        box-sizing:border-box;
        padding:3%;
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
        width:42%;
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
         padding:13px 10px;
      }

      #update-coords-form div > button{
        border-radius:50px;
      }

      #update-coords-section{
        width:42%;
        border-radius:25px;
        box-sizing:border-box;
        padding:3%;
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

      .active-dash{
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
            padding: 5px;
          }
          #update-coords-section{
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
      flex-wrap: wrap;
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

    /* Modern Premium Table Styling */
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
      min-width: 1000px; /* Force scroll for premium look */
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
      cursor: pointer;
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
    .btn-view-premium {
      width: 36px;
      height: 36px;
      border: none;
      background: #eff6ff;
      color: #2563eb;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
    }
    .btn-view-premium:hover {
      background: #2563eb;
      color: #fff;
      transform: translateY(-2px);
      box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
    }
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
    .table-container-premium::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
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

    @media screen and (max-width: 768px) {
      .top-navbar-row { height: auto; flex-direction: column; }
      .main-body-row { flex-direction: column; }
      #menu-bar { display: none; }
      .main-content-area { width: 100% !important; }
    }
    </style>
</head>
<body>
        
<div class="container-fluid layout-container p-0">
<?= view('notification_toast') ?>

    <div class="top-navbar-row"><!-----top-bar--------------->

      <div id="ps-logo" class="col-12 col-md-3 border-bottom border-md-0 py-2 py-md-3 d-flex align-items-center justify-content-start ps-2" style="background: #0f172a;">
               
               </div>
       
               <div id="search-bar" class="col-12 col-md-9 d-flex align-items-center justify-content-between border-bottom border-md-0 px-3" style="background: #0f172a;">
       
              
               </div>
        </div><!-----------top-bar-end----------------------->


        <div class="main-body-row"><!----------main-navbar----------->

        <div id="menu-bar" class="col-md-3"><!----------side-bar-------------------->
       
              
        </div><!-----------side-bar-end-------------->
            
        <div id="changepage" class="col-md-9 main-content-area px-4 pt-3"><!-----------main-dashboard------------------------->
         
        <div class="container-fluid px-4 pt-4 d-flex justify-content-between coordpadd">
         <span class="h5">Dashboard / Received Applications</span>

         <div <?=session()->get('role') !== 1 ? "hidden" : ""?>>
         <button onclick="showcoordsmodal()" class='ps-add-btn text-white py-1 px-4'>+&nbsp;Add</button>&nbsp;
         <a href="<?=base_url("assigncoordinator")?>" class='text-decoration-none ps-add-btn text-white py-1 px-4'>+&nbsp;Assign</a>
         <!-- <button onclick="showassigncoordsmodal('assign')" class='ps-add-btn text-white py-1 px-4'>+&nbsp;Assign</button> -->
         </div>
        </div>
         
        <div class="container-fluid mt-3 px-4 coordpadd"><!----------------table--------------->
        <div class="table-container-premium">
          <table class="custom-table-premium">
              <thead>
              <tr>
              <th>S.No</th><th>Name</th><th>Phone</th><th>Aadhar</th><th>District</th><th>State</th><th>Actions</th>
              </tr>
              </thead>
              <tbody id="applications">

            <!-- <?php if(isset($applications) && isset($sno)) : $i=$sno + 1;?>
                
               <?php foreach ($applications as $key => $value) : ?> 
                    <tr >
                    <td style='font-weight:500;'><?=$i?></td>
                    <td style='font-weight:500;'><?=$value->Name?></td>
                    <td style='font-weight:500;'><?=$value->Phonenumber?></td>
                    <td style='font-weight:500;'><?=$value->Aadharnumber?></td>
                    <td style='font-weight:500;'><?=$value->District?></td>
                    <td style='font-weight:500;'><?=$value->State?></td>
                    <td class='d-flex justify-content-evenly'>
                    <button data-bs-toggle = 'modal' data-bs-target='#viewapplication' backdrop="false" static="true" onclick ='viewApplications(<?=json_encode($value)?>)' data-bs-toggle='tooltip' title='viewapplication' backdrop="false" static="true" style='width:30px;height:30px;outline:none;border:none;' class='table-btn text-dark shadow-sm rounded-circle'><i class='fa-sharp fa-solid fa-eye'></i></button>
                    </td>
                    </tr>
                    <?php ++$i; endforeach ;?>
                    <?php endif;?> -->
            </tbody>
            </table>
          </div>
        </div> <!----------------table-end------->

        <div class='d-flex justify-content-center container-fluid'> <!-----------------pagination---------------------->
        
        <div id="applicationPagination" class="col-md-6 py-2 d-flex justify-content-around align-items-center">
          
        </div>
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
<div id="viewapplication" data-bs-backdrop="static" data-bs-keyboard="false" class="modal fade">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
   <div class="modal-content">
     <div class="modal-header">
     <h4>Received application:</h4>
     <button id="closeassignmodal" class="btn btn-close" data-bs-dismiss="modal"></button>
     </div>

     <div class="modal-body">
       <form method="POST" action="<?=base_url("approvemember");?>">
        <input id="applicationid" name="applicationid" hidden type="text">
        <input id="userid" hidden name="userid" type="text">
        <input id="username" hidden name="username" type="text">
        <input id="userdistrict" hidden name="userdistrict" type="text">
        <input id="talukname" hidden name="talukname" type="text">
        <input id="villagename" hidden name="villagename" type="text">
       <table class="table table-bordered">
            <tr><th>Name:</th><td style="font-weight:500;" id="name"></td></tr>
            <tr><th>Mobile No:</th><td style="font-weight:500;" id="mobile"></td></tr>
            <tr><th>Aadhar No:</th><td style="font-weight:500;" id="aadharno"></td></tr>
            <tr><th style="vertical-align:middle;">Address:</th><td id="address"></td></tr>
            <tr><th>Family Membership Id:</th><td style="font-weight:500;" id="familyid"></td></tr>
            <tr><th style="vertical-align:middle;">Photo:</th><td id="photo"></td></tr>
            <tr><th style="vertical-align:middle;">Aadhar front:</th><td id="aadharfront"></td></tr>
            <tr><th style="vertical-align:middle;">Aadhar back:</th><td id="aadharback"></td></tr>
            <tr><th style="vertical-align:middle;">Community Certificate:</th><td id="communitycertificate"></td></tr>
       </table>
       
       <div id="approve_section">
            <div class="d-flex"><input onchange="enableApprovebutton(this)" type="checkbox">&nbsp;&nbsp; <span class="fs-5">I hereby certify that the above registration details are accurate.</span></div>
            <div class="mt-2 d-flex gap-2">
                <button id="approvebtn" disabled class="btn btn-success">Approve</button>
                <button type="button" onclick="showRejectSection()" class="btn btn-danger">Reject</button>
            </div>
       </div>

       <div id="reject_section" style="display:none;" class="mt-3">
            <div class="form-group">
                <label for="rejectreason" class="fw-bold">Reject Reason:</label>
                <textarea name="rejectreason" id="rejectreason" class="form-control" rows="3" placeholder="Enter reason for rejection..."></textarea>
            </div>
            <div class="mt-2 d-flex gap-2">
                <button type="button" onclick="confirmReject()" class="btn btn-danger">Confirm Reject</button>
                <button type="button" onclick="hideRejectSection()" class="btn btn-secondary">Cancel</button>
            </div>
       </div>
       </form>
     </div>

   </div>
  </div>

</div>

<!--------------------view-members-end---------------------->

<!--------------------view-community-certificate------------>

<div id="show_commun_cert" class="modal fade">
   <div class='modal-dialog modal-dialog-scrollable modal-lg'>
       <div class="modal-content">
        <div class="modal-header">
          <h4>Community certificate</h4>
          <button class="btn btn-close" data-bs-dismiss='modal'></button>
        </div>
         <div style="height:700px;" id="dis_commun_cert" class="modal-body">
             
         </div>
       </div>
   </div>
</div>

<!--------------------view-community-certificate-end-------->

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
let applicationsData = [];
<?php if (isset($applications) && !empty($applications)): ?>
    applicationsData = <?php echo json_encode($applications); ?> || [];
<?php endif; ?>

const appItemsPerPage = 10;
let currentAppPage = 1;

function renderApplications(data, startIndex) {
    let html = "";
    let i = startIndex + 1;

    if (!data || data.length === 0) {
        document.getElementById("applications").innerHTML = `<tr><td colspan="7" class="text-center py-5 text-muted">No applications found.</td></tr>`;
        return;
    }

    data.forEach(value => {
        let encodedValue = JSON.stringify(value).replace(/'/g, "&#39;");
        html += `
            <tr onclick='viewApplications(${encodedValue})' data-bs-toggle="modal" data-bs-target="#viewapplication">
                <td class="fw-bold text-muted">${i}</td>
                <td class="fw-semibold text-primary">${value.Name}</td>
                <td class="text-secondary">${value.Phonenumber}</td>
                <td class="text-secondary">${value.Aadharnumber}</td>
                <td><span class="badge bg-light text-dark border">${value.District}</span></td>
                <td><span class="badge bg-info text-dark">${value.State}</span></td>
                <td>
                    <div class="d-flex justify-content-center">
                        <button class="btn-view-premium">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `;
        i++;
    });

    document.getElementById("applications").innerHTML = html;
}

function renderAppPagination(totalItems, currentPage) {
    let html = "";
    let pgCon = document.getElementById("applicationPagination");
    if (!totalItems || totalItems <= 0) {
        if (pgCon) pgCon.innerHTML = "";
        return;
    }
    
    const totalPages = Math.ceil(totalItems / appItemsPerPage);
    
    html += `<div class="d-flex flex-column align-items-center"><div class="d-flex justify-content-center align-items-center gap-2 mt-2">`;

    html += `<button class="pagination-btn ${currentPage === 1 ? 'disabled' : ''}" 
                onclick="goToAppPage(${currentPage - 1})" 
                ${currentPage === 1 ? 'disabled' : ''}>
                <i class="fa-solid fa-chevron-left"></i>
             </button>`;

    for (let i = 1; i <= totalPages; i++) {
        if (totalPages <= 7 || i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
            html += `<button class="pagination-btn ${i === currentPage ? 'active' : ''}" 
                        onclick="goToAppPage(${i})">${i}</button>`;
        } else if (i === currentPage - 2 || i === currentPage + 2) {
            html += `<span class="pagination-ellipsis">...</span>`;
        }
    }

    html += `<button class="pagination-btn ${currentPage === totalPages ? 'disabled' : ''}" 
                onclick="goToAppPage(${currentPage + 1})"
                ${currentPage === totalPages ? 'disabled' : ''}>
                <i class="fa-solid fa-chevron-right"></i>
             </button>`;

    html += `</div>`;
    html += `<div class="text-center mt-2 text-muted small">Showing page ${currentPage} of ${totalPages}</div></div>`;
    
    if (pgCon) pgCon.innerHTML = html;
}

function goToAppPage(page) {
    if (!applicationsData || applicationsData.length === 0) return;
    
    let searchTerm = "";
    let searchInput = document.getElementById("commonsearch");
    if (searchInput) searchTerm = searchInput.value.toLowerCase().trim();
    
    let displayData = applicationsData;
    if (searchTerm !== "") {
        displayData = applicationsData.filter(data => {
            return data.Name.toLowerCase().includes(searchTerm) || 
                   data.Phonenumber.toLowerCase().includes(searchTerm) || 
                   data.Aadharnumber.toLowerCase().includes(searchTerm) || 
                   data.District.toLowerCase().includes(searchTerm) || 
                   data.State.toLowerCase().includes(searchTerm);
        });
    }

    const totalPages = Math.ceil(displayData.length / appItemsPerPage);
    
    if (totalPages === 0) {
        renderApplications([], 0);
        renderAppPagination(0, 1);
        return;
    }
    
    if (page < 1) page = 1;
    if (page > totalPages) page = totalPages;
    currentAppPage = page;
    
    let offset = (page - 1) * appItemsPerPage;
    renderApplications(displayData.slice(offset, offset + appItemsPerPage), offset);
    renderAppPagination(displayData.length, currentAppPage);
}

document.addEventListener("DOMContentLoaded", function() {
    goToAppPage(1);
});

function commonSearch(searchField) {
    if(applicationsData && applicationsData.length > 0) {
        currentAppPage = 1;
        goToAppPage(1);
    }
}    

// Mobile Menu Functions
    function openMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'block';
    }

    function closeMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'none';
    }

    $.ajax({
      type: "get",
      url: "coordinators/sidemenu",
      success: (result) => {
        document.getElementById("menu-bar").innerHTML = result;
        // Populate custom mobile menu content
        document.getElementById("mobile-menu-content").innerHTML = result;
      },
      error: (error) => {
        document.getElementById("menu-bar").innerHTML = error;
      }
    });

    $.ajax({
      type:"get",
      url:"coordinators/topsubmenu",
      success:(result)=>{
          //  document.getElementById("offcanvasmenu").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("offcanvasmenu").innerHTML = error;
      }
    });


    $.ajax({
      type:"get",
      url:"coordinators/topmenu",
      success:(result)=>{
           document.getElementById("search-bar").innerHTML = result;
        //    document.getElementById("pendingnotifications").classList.remove("d-flex");
        //    document.getElementById("pendingnotifications").classList.add("d-none");
          //  document.getElementById("searchcoords").style.display = "flex";
          //  document.getElementById("dashboardsubmenu").style.display = "flex";
           },
           error:(error)=>{
           document.getElementById("search-bar").innerHTML = error;
      }
    });

    $.ajax({
      type:"get",
      url:"coordinators/pslogo",
      success:(result)=>{
           document.getElementById("ps-logo").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("ps-logo").innerHTML = error;
      }
    });

    function getmemberdata(areas){
        let area = areas.value;

      $.ajax({
      type:"get",
      url:"coordinators/getareamembers",
      data:{"area":area},
      success:(result)=>{
           document.getElementById("areamembersname").innerHTML = result;
      },
      error:(error)=>{
          //  document.getElementById("ps-logo").innerHTML = error;
      }
      });

    }

    function enableApprovebutton(check){
      let verify = check.checked;
      if(verify){
        document.getElementById("approvebtn").removeAttribute("disabled");
      }
      else{
        document.getElementById("approvebtn").setAttribute("disabled","disabled");
      }
    }

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
          //  document.getElementById("ps-logo").innerHTML = error;
      }
      });
    }
  

    function displayApplications(counts,index){
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
     
      renderApplications(applicationsData.slice(start, end), start);
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
            document.getElementById("searchmemberdata").innerHTML = error;
        }
      });
    }

    function viewApplications(application){
      document.getElementById("name").innerHTML = application.Name;
      document.getElementById("mobile").innerHTML = application.Phonenumber;
      document.getElementById("aadharno").innerHTML = application.Aadharnumber;
      document.getElementById("address").innerHTML = `<table class='table table-borderless'>
                                                      <tr><th>D/No</th><td>-</td><td class='fw-bold'>${application.Doornumber}</td></tr>
                                                      <tr><th>Street</th><td>-</td><td class='fw-bold'>${application.Street}</td></tr>
                                                      <tr><th>Village</th><td>-</td><td class='fw-bold'>${application.Village}</td></tr>
                                                      <tr><th>Panchayat</th><td>-</td><td class='fw-bold'>${application.Panchayat}</td></tr>
                                                      <tr><th>Taluk</th><td>-</td><td class='fw-bold'>${application.Taluk}</td></tr>
                                                      <tr><th>District</th><td>-</td><td class='fw-bold'>${application.District} - ${application.Pincode}</td></tr>
                                                      <tr><th>State</th><td>-</td><td class='fw-bold'>${application.State}</td></tr>
                                                      </table>`;
     document.getElementById("familyid").innerHTML = application.Existfamilyid  == "" ? "No" : application.Existfamilyid;   
     document.getElementById("photo").innerHTML = `<img style='width:150px;height:200px;' src='<?=base_url("assets/membersdocuments/")?>${application.Memberimage}'>`;
     document.getElementById("aadharfront").innerHTML = `<img style='width:300px;height:200px;' src='<?=base_url("assets/membersdocuments/")?>${application.Aadharfrontimage}'>`; 
     document.getElementById("aadharback").innerHTML = `<img style='width:300px;height:200px;' src='<?=base_url("assets/membersdocuments/")?>${application.Aadharbackimage}'>`;     
     document.getElementById("communitycertificate").innerHTML = `<img style='width:200px;height:300px;cursor:pointer;' onclick="viewCommunitycertificate('${application.Communitycertificate}')" src='<?=base_url("assets/membersdocuments/")?>${application.Communitycertificate}'>`;    
     document.getElementById("applicationid").value = `${application.Id}`;
     document.getElementById("userid").value = "<?=session()->get("userId")?>";
     document.getElementById("username").value = "<?=session()->get("userName")?>";
     document.getElementById("userdistrict").value = application.District;
     document.getElementById("talukname").value = application.Taluk;
     document.getElementById("villagename").value = application.Village;
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
             /*  document.getElementById('applicationsuccessstatus').innerHTML = "Members are Reassigned to coordinators";
              document.getElementById('applicationsuccesstoast').style.right = '5%';
              setTimeout(()=>{
              document.getElementById('applicationsuccesstoast').style.right = '-380px';
              },3000) */
             
    	      
          },
          error:(error)=>{
            psShowToast('error', 'Something went wrong. Please try again.');
          }
          });  
          } 
     }

     function changecoordinatorsPagesetup(initialIndex){
      
      $.ajax({
        type:"get",
        url:"coordinators/changeapplicationspagesetup",
        data:{"initialindex":initialIndex},
        success:function(result){
            document.getElementById('ps-coords').innerHTML = result;
        },
        error:function(err){
            document.getElementById('ps-coords').innerHTML = err;
        }
      });
    }

    window.addEventListener("resize",()=>{
       
       let assignForm = document.getElementById("assign-coords-form");
       let updateSection = document.getElementById("update-coords-section");
       let b = window.innerWidth;
       
       if( b > 768){
        if(assignForm) assignForm.style.left = "29%";
        if(updateSection) updateSection.style.left = "29%";
       }
       else{
        if(assignForm) assignForm.style.left = "5%";
        if(updateSection) updateSection.style.left = "5%";
       }
    });

    let showassigncoords = document.getElementById("assigncoords-modal-hide");
    let showcoords = document.getElementById("coords-modal-hide");
    let showupdatecoords = document.getElementById("updatecoords-modal-hide");
    let logoheight = document.getElementById("ps-logo");

    // showassigncoords.style.height =  100+window.innerHeight+"px";
    // showcoords.style.height =  100+window.innerHeight+"px";
    // showupdatecoords.style.height = 100+window.innerHeight+"px";

    function showassigncoordsmodal(){
      // let showassigncoords = document.getElementById("assigncoords-modal-hide");
      // show.style.display = "block";
      let formmodal = document.getElementById("assign-coords-form");
       let b = window.innerWidth;
       if( b > 768){
        showassigncoords.style.left = "0%";
        formmodal.style.left = "29%";
       }
       else{
        showassigncoords.style.left = "0%";
        formmodal.style.left = "5%";
       }
    }

    function showcoordsmodal(){
      // let showassigncoords = document.getElementById("assigncoords-modal-hide");
      // show.style.display = "block";
      let formmodal = document.getElementById("add-coords-form");
       let b = window.innerWidth;
       if( b > 768){
        showcoords.style.left = "0%";
        formmodal.style.left = "29%";
       }
       else{
        showcoords.style.left = "0%";
        formmodal.style.left = "5%";
       }
    }

    function showupdatecoordsmodal(id){
      // let show = document.getElementById("updatecoords-modal-hide");
      let formmodal = document.getElementById("update-coords-section");
       let b = window.innerWidth;

        $.ajax({
        type:"get",
        url:"coordinators/getcoordinator",
        data:{"id":id},
        success:(result)=>{
           document.getElementById("update-coords-form").innerHTML = result;
        },
        error:(error)=>{
           document.getElementById("update-coords-form").innerHTML = error;
        }
      });

       if( b > 768){
        showupdatecoords.style.left = "0%";
        formmodal.style.left = "29%";

       }
       else{
        showupdatecoords.style.left = "0%";
        formmodal.style.left = "5%";
       }
    }

    window.onclick = function(event) {

    if (event.target == showassigncoords) {
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

    else if (event.target == showcoords) {
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
        formmodal.style.left = "-42%";
       }
    else{
        showupdatecoords.style.left = "-100%";
        formmodal.style.left = "-90%";
       }
  }

  function deletecoord(id,name,area){
    document.getElementById("deletebox").innerHTML = `<div class="d-flex justify-content-center "><span style="font-size:66px;color:red;"><i class="fa-regular fa-trash-can"></i></span></div>
    <p class="text-center fs-4">Move to trash <span style="color:green;" class="fs-4">${name}-${area}</span> </p> 
    <div class="d-flex justify-content-center">
    <div class="col-md-6 d-flex justify-content-evenly"> 
    <button style="border:none;outline:none;" class="px-2 py-1 btn btn-success rounded-3" onclick="movetotrash(${id})" data-bs-dismiss="modal">Confirm</button>&nbsp;&nbsp;<button style="border:none;outline:none;background-color:red;" class="px-2 py-1 btn text-white rounded-3" data-bs-dismiss="modal">Cancel</button>
    </div>
    </div>
    `; 
  }

let active = -1;

// window.addEventListener("keydown",(e)=>{
//        let memberoptions = document.getElementById("searchmemberdata").children;
//        if(e.keyCode == 40){
//          ++active;
//             memberoptions[active].focus();     
//        }
//        else if(e.keyCode == 38){
//          --active;
//             memberoptions[active].focus();      
//        }
// });

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

  function viewCommunitycertificate(communitycertificate) {
      let viewcert_modal = new bootstrap.Modal(document.getElementById("show_commun_cert"),{
        backdrop:"static",
        keyboard:false
      });
      viewcert_modal.show();
      document.getElementById("dis_commun_cert").innerHTML = `<img style="width:100%;height:750px;" class="img-fluid" src='assets/membersdocuments/${communitycertificate}'>`;
  }

/*   let coordsform = document.getElementById("assigncoords-form")
 
  coordsform.addEventListener("submit",(e)=>{
    if(!coordsubmit()){
      e.preventDefault();
    }
  }) */
 
  
  // console.log(coordsform["coordname"].value)

  /* function coordsubmit(){
       let name = coordsform["coordname"].value;
       let aadhar = coordsform["coordaadhar"].value;
       let phone = coordsform["coordphone"].value;
       let area = coordsform["coordname"].value;
       console.log(name);
       $.ajax({
              type:"post",
              url:"coordinators/addcoordinator",
              data:{"coordname":name,"coordaadhar":aadhar,"coordphone":phone,"coordarea":area},
              success:(result)=>{
                document.getElementById("coo").innerHTML = "success";
                hidecoordsform();
              },
              error:(error)=>{
              
              }
           })
      
  } */

  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

function showRejectSection() {
    document.getElementById("approve_section").style.display = "none";
    document.getElementById("reject_section").style.display = "block";
}

function hideRejectSection() {
    document.getElementById("approve_section").style.display = "block";
    document.getElementById("reject_section").style.display = "none";
}

function confirmReject() {
    let reason = document.getElementById("rejectreason").value;
    if(reason.trim() == "") {
        alert("Please enter a reason for rejection.");
        return;
    }
    
    let form = document.querySelector("#viewapplication form");
    form.action = "<?=base_url('rejectmember');?>";
    form.submit();
}
   </script>
  

 <!-------------------------------chart-end------------------------------------>  


 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
    
</body>
</html>
