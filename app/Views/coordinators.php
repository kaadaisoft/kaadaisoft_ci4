<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinators</title>
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
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
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
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
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
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
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
    </style>
</head>
<body>
        
<div id="pageheight" class="container-fluid" style="overflow:hidden;position:absolute;">
<?= view('notification_toast') ?>

      <div id="side-bar" class="row"><!-----top-bar--------------->

      <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3">
               
               </div>
       
               <div id="search-bar" class="col-md-10 border-bottom">
       
              
               </div>
        </div><!-----------top-bar-end----------------------->


        <div id="pagecontrol" class="row"><!----------main-navbar----------->

        <div id="menu-bar" style="height:inherit;" class="col-md-2 ps-gray"><!----------side-bar-------------------->
       
              
        </div><!-----------side-bar-end-------------->
            
        <div style="overflow:auto;" class="col-md-10"><!-----------main-dashboard------------------------->
         
        <div class="container-fluid px-4 pt-4 d-flex justify-content-between coordpadd">
         <span class="h5">Coordinators</span>
         <div>
         <a href="<?=base_url("assigncoordinator")?>" class='text-decoration-none ps-add-btn text-white py-1 px-4'>+&nbsp;Assign</a>
      
         </div>
        </div>
         
        <div style="overflow:auto;" class="container-fluid pt-3 px-4 coordpadd"><!----------------table--------------->
        <table class="table table-bordered">
            <thead>
               <caption class="fw-bold" style="caption-side: top">Total Coordinators: <?php echo count($coordinators)?></caption>
            <tr style="font-size:18px;" class="ps-gray">
            <th>S.No</th><th>User ID</th><th>Name</th><th>Mobile</th><th>District</th><th>Taluk</th><th>Panchayat</th><th>Assigned Villages</th><th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody id="ps-coords">

            </tbody>
            </table>

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
let coordData = [];
<?php if (isset($coordinators) && !empty($coordinators)): ?>
    coordData = <?php echo json_encode($coordinators); ?> || []; 
<?php endif; ?>

function renderCoordinators(data, sNo) {
    let html = "";
    let i = sNo + 1;

    data.forEach(value => {
        html += `
            <tr>
               <td style='font-weight:500;'>${i}</td>
                    <td class='text-primary fw-bold'>${value.Familymembershipid}</td>
                    <td style='font-weight:500;'>${value.Name}</td>
                    <td style='font-weight:500;'>${value.Phonenumber}</td>
                    <td style='font-weight:500;'>${value.District}</td>
                    <td style='font-weight:500;'>${value.Taluk}</td>
                    <td style='font-weight:500;'>${value.Panchayat}</td>
                    <td style='font-weight:500;' class='${value.VillageNames ? '' : 'text-center'}'>${value.VillageNames ? value.VillageNames : '-'}</td>
                    <td class='d-flex justify-content-evenly'>
                    <button onclick="showupdatecoordsmodal('${value.Familymembershipid}')" style='width:30px;height:30px;outline:none;border:none;' class='updatecoord shadow-sm text-dark table-btn rounded-circle'><i class='fa-regular fa-pen-to-square'></i><span class='updatetooltip'>Update Details</span></button>
                    <button onclick ="viewCoordinatordata('view-coordinator-data?coord_id=${value.Familymembershipid}')" data-bs-toggle='tooltip' title='View Details' style='width:30px;height:30px;outline:none;border:none;' class='table-btn text-dark shadow-sm rounded-circle'><i class='fa-sharp fa-solid fa-eye'></i></button>
                    </td>
            </tr>`
         i++;
         });
            

    document.getElementById("ps-coords").innerHTML = html;
}

renderCoordinators(coordData.slice(0 ,10), 0);
// <button data-bs-toggle='modal' data-bs-target='#deletemodal' onclick="deletecoord('${value.Familymembershipid}','${value.Name}','${value.Taluk}')" style='width:30px;height:30px;outline:none;border:none;color:red;' class='trashcoord table-btn shadow-sm rounded-circle'><i class='fa-solid fa-trash-can'></i><span class='trashtooltip'>Trash</span></button>
<?php 
          if(isset($coordinators) ): ?> 
            <?php if(count($coordinators) > 0): ?>
            let coordCount = <?php echo json_encode(count($coordinators)); ?>;
            let countsperpage = 10;
            let noofpages = Math.ceil(coordCount / countsperpage);
            let totalpagesarr = Array.from({length: noofpages}, (_, i) => i);
            let totalpages = totalpagesarr.length;
            let initialindex = 0;
            let lastindex = 5; 
            let pages = totalpagesarr.slice(initialindex, lastindex);
            let paginationHtml = `<button disabled onclick='changeMembersPagesetup(0)' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id = 'arrow' class='fa-solid fa-arrow-left-long'></i></button>`;
            
            for(let i = 0;pages.length > i; i++) {
              let count = countsperpage * pages[i];
              let pageno = pages[i] + 1;
              if(pageno == 5){
                paginationHtml += `<button style='width:35px;height:35px;border: none;' onclick='changeMembersPagesetup(${pages[i]})' class='${i==0 ? 'active-page' : ''} active text-decoration-none bg-white d-flex align-items-center justify-content-center ps-gray rounded-circle'>${pageno}</button>`;}
              else{
                paginationHtml += `<button style='width:35px;height:35px;' onclick='displayCoordinators(${count},${i})' class='${i==0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>`;
              }
            }

            paginationHtml += "<span>...</span>";
            let totalcount = (totalpages - lastindex);
            let newindex = initialindex+lastindex;
            let validNext = totalpages - initialindex; 
            paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeMembersPagesetup(${totalcount})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${totalpages}</button>`;
            
            paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeMembersPagesetup(${newindex})' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></button>`;
            <?php else: ?>
              let paginationHtml = "";
              paginationHtml += "<span>No pages available</span>";
            <?php endif; ?>
          
        <?php endif; ?>
    function setUpPagination(html) {
      document.getElementById("coordsPagination").innerHTML = html;
    }  

    setUpPagination(paginationHtml);

    function changeMembersPagesetup(nextStagedNo) {
            let countsperpage = 10;
            let prevlist = "";
            let noofpages = Math.ceil(membersCount / countsperpage);
            let totalpagesarr = Array.from({length: noofpages}, (_, i) => i);
            let totalpages = totalpagesarr.length;
            let start = nextStagedNo > noofpages ? 0 : nextStagedNo;
            let lastindex = nextStagedNo + 5;
            let pages = totalpagesarr.slice(nextStagedNo, lastindex);
            prevlist = start < 5 ? 0 : nextStagedNo - 5;
            let validPrev = totalpages - nextStagedNo;
            let paginationHtml =  `<button ${validPrev <= 0 ? 'disabled' : ''} onclick='changeMembersPagesetup(${prevlist})' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-left-long'> </i></button>`;

            for(let j = 0;pages.length > j; j++) {
              let count = countsperpage * pages[j];
              let pageno = pages[j] + 1;
  
              if(pageno == 5 || pageno - start == 5){
                paginationHtml += pageno == totalpages ? `<button style='width:35px;height:35px;border: none;' onclick='displayCoordinators(${count},${j})' class='${j==0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>` : `<button onclick='changeMembersPagesetup(${pageno - 1})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='${j==0 ? 'active-page' : ''} active text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${pageno}</button>`; }
              else{
                paginationHtml += `<button style='width:35px;height:35px;' onclick='displayCoordinators(${count},${j})' class='${j==0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>`;
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
            renderCoordinators(coordData.slice(itemStart, itemEnd), itemStart);
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
  
       document.getElementById("menu-bar").style.height = (window.innerHeight - document.getElementById("search-bar").getBoundingClientRect().height) + "px";

        function commonSearch(coords){
             
            let searchfields = coords.value;
    
            $.ajax({
              type:"get",
              url:"coordinators/searchcoordinators",
              data:{"searchfields":searchfields},
              success:(result)=>{
                document.getElementById('ps-coords').innerHTML = result;
              },
              error:(error)=>{
                document.getElementById('ps-coords').innerHTML = "Error fetching data";
              }
           })};                                

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

     function changecoordinatorsPagesetup(initialIndex){
      
      $.ajax({
        type:"get",
        url:"coordinators/changecoordinatorspagesetup",
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
