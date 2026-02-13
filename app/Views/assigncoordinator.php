<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign coordinators</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
     .active-bg{
      background-color:rgb(230, 230, 230);
    }
     .heading-kaadaisoft{
        color: rgb(120, 50, 186);
        font-weight:800;
        font-family:sans-serif;
    }
    .ps-letter{
        background-color: rgb(120, 50, 186);
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
           .ham-menu{
        /* position:absolute; */
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
        background-color:rgb(23, 23, 184) !important;
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
         padding:13px 0;
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

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
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

      .active-coords{
        background-color:rgb(230, 230, 230);
        font-weight:600;
      }    
      
      .assigncoordfilter{
        border:5px solid rgb(23, 23, 184);
        row-gap:20px;
        border-radius:15px;
      }

      .assigncoordfilter input,select{
        height:40px;
        
      }
      .assigncoordfilter input:focus,select:focus{
        outline-style:none;
      }

      label{
        font-size:18px;
        font-weight:500;
      }

      #show-villages li:hover, #talukslist li:hover, #talukslistforremove li:hover{
          background-color:#6495ED;
          color: white;
      }
      #talukslist li, #talukslistforremove li {
          padding: 8px 12px;
          cursor: pointer;
          border-bottom: 1px solid #eee;
          font-size: 15px;
      }
      #searchmemberdata li {
          padding: 8px 12px;
          cursor: pointer;
          border-bottom: 1px solid #eee;
      }
      #searchmemberdata li:hover {
          background-color: #6495ED;
          color: white;
      }

      .assignmember:hover{
      background-color:#ddd;
     }

     .ps-btn{
        border:none;
        outline:none;
        background-color:rgb(23, 23, 184) !important;
        font-weight:500;
        /* border-radius:25px; */
      }

    /*   #membertoast{
        border-radius:10px;
        position:absolute;
        top:10%;
        right:-380px;
        transition:0.5s;
      } */

    @media screen and (max-width:768px) {
      #search-bar{
            background-color:rgb(248, 245, 245);
            flex:none;
            background-color:white !important;
            padding: 5px 0;
           }
           #menu-bar{
            display:none;
           }
           #dashboardsearch{
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
      
      /* Custom Scrollbar Styles */
      ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
      }
      ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
      }
      ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
      }
      ::-webkit-scrollbar-thumb:hover {
        background: #555;
      }

      /* FireFox Support */
      * {
        scrollbar-width: thin;
        scrollbar-color: #888 #f1f1f1;
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
        
<div id="assigncoordpage" class="container-fluid" style="overflow:hidden;position:absolute;height:100vh;width:100%;">
  <!---------------------assign-success-toast---------------------->

<div id='assigncoordtoast' style='border:4px solid rgb(132, 250, 132);border-radius:10px;position:absolute;top:10%;right:-380px;transition:0.5s;background-color:rgb(18, 155, 18);z-index:1;' class='toast hide'>
  <div style="background-color:rgb(18, 155, 18);" class='toast-header'>
    <strong class='me-auto text-white fs-5'>Message</strong>
    <button type='button' class='btn-close float-end' data-bs-dismiss='toast'></button>
  </div>
  <div id="assignsuccessstatus" class='toast-body text-white fs-5 py-2'>
  </div>
  </div>

<?php 
if(isset($_SESSION["assigncoordsuccessstatus"])){
      $status = $_SESSION["assigncoordsuccessstatus"];
echo "<script>
       document.getElementById('assignsuccessstatus').innerHTML = '$status';
       const succToast = document.getElementById('assigncoordtoast');
       succToast.classList.remove('hide');
       succToast.classList.add('show');
       succToast.style.right = '5%';
       setTimeout(()=>{
       succToast.style.right = '-380px';
       },3000)
       
      </script>"; 

unset($_SESSION["assigncoordsuccessstatus"]);

}

?>
<!---------------------assign-success-toast-end------------------>

 <!---------------------assign-error-toast---------------------->

 <div id='assigncoorderrortoast' style='border:4px solid rgb(254, 91, 91);border-radius:10px;position:absolute;top:10%;right:-380px;transition:0.5s;background-color:rgb(250,51,51);' class='bg-white toast hide'>
  <div class='toast-header'>
    <strong class='me-auto fs-5'>Message</strong>
    <button type='button' class='btn-close float-end' data-bs-dismiss='toast'></button>
  </div>
  <div id="assignerrorstatus" class='toast-body text-success fs-5 py-2'>
  </div>
  </div>

<?php 
if(isset($_SESSION["assigncoorderrorstatus"])){
      $status = $_SESSION["assigncoorderrorstatus"];
echo "<script>
       document.getElementById('assignerrorstatus').innerHTML = '$status';
       const errToast = document.getElementById('assigncoorderrortoast');
       errToast.classList.remove('hide');
       errToast.classList.add('show');
       errToast.style.right = '5%';
       setTimeout(()=>{
       errToast.style.right = '-380px';
       },3000)
       
      </script>"; 

unset($_SESSION["assigncoorderrorstatus"]);

}

?>
<!---------------------assign-error-toast-end------------------>


      <div class="row"><!-----top-bar--------------->

        <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3">
               
        

        </div>

        <div id="search-bar" class="col-md-10 align-items-center justify-content-between border-bottom">

       
       
        </div>
        </div><!-----------top-bar-end----------------------->

        <div class="row"><!----------main-navbar----------->

         <div id="menu-bar" style="overflow-y:auto;height:calc(100vh - 80px);" class="col-md-2 ps-gray"><!----------side-bar-------------------->
         
              
         </div><!-----------side-bar-end-------------->
            
         <div id="changepage" style="overflow-y:auto;height:calc(100vh - 80px);overflow-x:hidden;" class="col-md-10 px-5 pb-5"><!-----------main-dashboard------------------------->

         <div class="pb-4">
         <div id="assigncoordalert">

         </div>

         <div class="py-3">
         <span class='fs-5'>Coordinators / Assigncoordinators</span>
         </div>

         <div><!-------------assign-coord-start------------->      
         
         <form class="row assigncoordfilter py-3" Autocomplete="off" onsubmit="return validateAssigncoordinator()" method="POST" action="<?=base_url("assignCoordinatorsfortaluk")?>">
         <span class="h3 ms-4">Assign Coordinator:</span>

         <div id="searchmember" class="col-md-3 position-relative"><!----------member-search-start------->
            <label class="container-fluid pb-1" for="membername">Search Member
            <input onkeyup="getMemberdata(this)" type="text" name="membername" class="border w-100" id="membername" required>
            <input hidden type="text" name="memberid" class="border w-100" id="memberid" required>
            <input hidden type="text" name="taluks" class="border w-100" id="taluksarray">
            <input hidden type="text" name="assignerid" value="<?=session()->get("Kaadaisoft_userId")?>" class="border w-100" id="assignerid" required>
            <input hidden type="text" name="assignername" value="<?=session()->get("Kaadaisoft_userName")?>" class="border w-100" id="assignername" required>
            </label>
            <div id="limitcoorderror" style="color:red;" class="d-flex"></div>
            <ul style="display:none;position:absolute;max-height:350px;overflow:auto;z-index:2;" id="searchmemberdata" class="bg-white border list-unstyled rounded-3 px-1 py-2">
            </ul>
          </div><!---------------member-search-end---------------->

         <div class="col-md-3"><!------------state-choose------------>
           <label class="container-fluid" for="stateid">State:<br>
           <select onchange = "getDistricts(this)" class="container-fluid border rounded" name="stateid" id="stateid" required>
           <option value=''>Choose State</option>
           <?php if(isset($states))
           foreach ($states as $key => $value){
           echo 
           "<option value='$value->state_id'>$value->state_title</option>";
           }
           ?>
           </select>

           </label>
           </div><!------------state-choose-end----------->

         <div id="districtstitle" class="col-md-3"><!------------district-choose------------>
           <label class="container-fluid" for="districtid">Districts:<br>
           <select onchange="getTaluks(this)" class="container-fluid border rounded" name="districtid" id="districtid" required>
           <option value=''>Choose District</option>
           </select>
           </label>
           </div><!------------district-choose-end----------->
           
          <div id="talukstitle" class="col-md-3"><!------------taluk-choose------------>
            <label class="container-fluid" for="talukid">Taluks:<br>
            <select onchange="getPanchayats(this)" class="container-fluid border rounded" name="talukid" id="talukid" required>
            <option value=''>Choose Taluk</option>
            </select>
            </label>
            </div><!------------taluk-choose-end----------->

            <div id="panchayatstitle" class="col-md-3"><!------------panchayat-choose------------>
            <label class="container-fluid" for="panchayatid">Panchayats:<br>
            <select onchange="getVillages(this)" class="container-fluid border rounded" name="panchayatid" id="panchayatid" required>
            <option value=''>Choose Panchayat</option>
            </select>
            </label>
            </div><!------------panchayat-choose-end----------->

           <div id="localareas" class="col-md-3"><!------------select-villages----------->
            <label class="container-fluid position-relative" for="aadhar">Villages:<br>
            <div id="choosetaluks" style="min-height:40px;max-height:100px;overflow:auto;gap:5px;" class="border d-flex flex-wrap justify-content-start p-2">

            </div>
            <div id="selectedtalukerror" style="color:red;"></div>
             <div id="displaytaluks" style="display:none;z-index:1000;max-height:200px;overflow-y:auto;min-width:250px;" class="bg-white container-fluid border rounded position-absolute" name="taluks">
            <ul id='talukslist' class='list-unstyled'></ul>
            </div>
            </label>
            </div><!------------select-villages-end----------->

            <div class="col-md-3 mb-3"><button type="submit" class="btn ps-btn text-white">Assign</button></div>
           </form>
         </div><!-------------------assign-coord-filter-end----------------->

         <div class="mt-4"><!-------------status-filter-start------------->      
         
         <form id="statusfilter" class="row assigncoordfilter py-3" Autocomplete="off">
         <span class="h3 ms-4">Reassign Coordinator:</span>
         <div class="col-md-3"><!------------state-choose------------>
           <label class="container-fluid" for="stateidremove">State:<br>
           <select onchange = "getDistrictsforremove(this)" class="container-fluid border rounded" name="stateid" id="stateidremove" required>
           <option value=''>State</option>
           <?php if(isset($states))
           foreach ($states as $key => $value){
           echo 
           "<option value='$value->state_id'>$value->state_title</option>";
           }
           ?>
           </select>

           </label>
           </div><!------------state-choose-end----------->
         <div id="districtstitleremove" class="col-md-3"><!------------district-choose------------>
           <label class="container-fluid" for="districtnames">Districts:<br>
           <select onchange="getTaluksforremove(this)" class="container-fluid border rounded" name="districtid" id="districtnames" required>
           <option value=''>Choose District</option>
           </select>
           </label>
           </div><!------------district-choose-end----------->

          <div id="talukstitleremove" class="col-md-3"><!------------taluk-choose------------>
            <label class="container-fluid" for="talukidremove">Taluks:<br>
            <select onchange="getPanchayatsforremove(this)" class="container-fluid border rounded" name="talukid" id="talukidremove" required>
            <option value=''>Choose Taluk</option>
            </select>
            </label>
            </div><!------------taluk-choose-end----------->

            <div id="panchayatstitleremove" class="col-md-3"><!------------panchayat-choose------------>
            <label class="container-fluid" for="panchayatidremove">Panchayats:<br>
            <select onchange="getVillagesforremove(this)" class="container-fluid border rounded" name="panchayatid" id="panchayatidremove" required>
            <option value=''>Choose Panchayat</option>
            </select>
            </label>
            </div><!------------panchayat-choose-end----------->

           <div id="localareasremove" class="col-md-3"><!------------select-villages----------->
           <label class="container-fluid position-relative" for="villagesforremove">Villages:<br>
           <input hidden type="text" name="taluksforremove" class="border w-100" id="taluksarrayforremove">
            <div id="choosetaluksforremove" style="min-height:40px;max-height:100px;overflow:auto;gap:5px;" class="border d-flex flex-wrap justify-content-start p-2">

            </div>
            <div id="selectedvillageerrorremove" style="color:red;"></div>
             <div id="displaytaluksforremove" style="display:none;z-index:1000;max-height:200px;overflow-y:auto;min-width:250px;" class="bg-white container-fluid border rounded position-absolute" name="taluks">
            <ul id='talukslistforremove' class='list-unstyled'></ul>
            </div>
            </label>
            </div>     <!------------select-villages-end----------->
            <div class="col-md-3 mb-3"><button type="submit" class="btn ps-btn text-white">Status</button></div>
           </form>
         </div><!-------------------status-filter-end----------------->

         <div class="mt-4"><!-------------add-village-filter-start------------->      
         
         <form id="addvillageform" action="<?=base_url("AdminDashboard/addVillage")?>" method="post" class="row assigncoordfilter py-3" Autocomplete="off">
         <span class="h3 ms-4">Add Village:</span>
         <div class="col-md-3"><!------------state-choose------------>
           <label class="container-fluid" for="stateidadd">State:<br>
           <select onchange="getDistrictsforadd(this)" class="container-fluid border rounded" name="state" id="stateidadd" required>
           <option value=''>State</option>
           <?php if(isset($states))
           foreach ($states as $key => $value){
           echo 
           "<option value='$value->state_id'>$value->state_title</option>";
           }
           ?>
           </select>

           </label>
           </div><!------------state-choose-end----------->
         <div id="districtstitleadd" class="col-md-3"><!------------district-choose------------>
           <label class="container-fluid" for="districtnamesadd">Districts:<br>
           <select onchange="getTaluksforadd(this)" class="container-fluid border rounded" name="district" id="districtnamesadd" required>
           <option value=''>Choose District</option>
           </select>
           </label>
           </div><!------------district-choose-end----------->

          <div id="talukstitleadd" class="col-md-3"><!------------taluk-choose------------>
            <label class="container-fluid" for="talukidadd">Taluks:<br>
            <select onchange="checkTalukSelect(this)" class="container-fluid border rounded" name="taluk_select" id="talukidadd" required>
            <option value=''>Choose Taluk</option>
            </select>
            <input type="text" name="taluk_manual" id="talukmanual" class="container-fluid border rounded mt-1" style="display:none;" placeholder="Enter Taluk Name">
            </label>
            </div><!------------taluk-choose-end----------->

            <div id="panchayatstitleadd" class="col-md-3"><!------------panchayat-choose------------>
            <label class="container-fluid" for="panchayatidadd">Panchayats:<br>
            <select onchange="checkPanchayatSelect(this)" class="container-fluid border rounded" name="panchayat_select" id="panchayatidadd" required>
            <option value=''>Choose Panchayat</option>
            </select>
            <input type="text" name="panchayat_manual" id="panchayatmanual" class="container-fluid border rounded mt-1" style="display:none;" placeholder="Enter Panchayat Name">
            </label>
            </div><!------------panchayat-choose-end----------->

           <div id="villageinputadd" class="col-md-3"><!------------village-input----------->
           <label class="container-fluid position-relative" for="villagenameadd">New Village Name:<br>
           <input type="text" name="village" class="container-fluid border rounded" id="villagenameadd" required placeholder="Enter new village">
            </label>
            </div>     <!------------village-input-end----------->
            <div class="col-md-3 mb-3"><button type="submit" class="btn ps-btn text-white">Add Village</button></div>
           </form>
         </div><!-------------------add-village-filter-end----------------->

         <div class="mt-4"><!-------------remove-village-filter-start------------->
         <form id="removevillageform" action="<?=base_url("AdminDashboard/removeVillage")?>" method="post" class="row assigncoordfilter py-3" Autocomplete="off" onsubmit="return confirm('Are you sure you want to delete this village? This action cannot be undone.');">
         <span class="h3 ms-4">Remove Village:</span>
         <div class="col-md-3"><!------------state-choose------------>
           <label class="container-fluid" for="stateiddelete">State:<br>
           <select onchange="getDistrictsfordelete(this)" class="container-fluid border rounded" name="state" id="stateiddelete" required>
           <option value=''>State</option>
           <?php if(isset($states))
           foreach ($states as $key => $value){
           echo 
           "<option value='$value->state_id'>$value->state_title</option>";
           }
           ?>
           </select>
           </label>
           </div><!------------state-choose-end----------->
         
         <div id="districtstitledelete" class="col-md-3"><!------------district-choose------------>
           <label class="container-fluid" for="districtnamesdelete">Districts:<br>
           <select onchange="getTaluksfordelete(this)" class="container-fluid border rounded" name="district" id="districtnamesdelete" required>
           <option value=''>Choose District</option>
           </select>
           </label>
           </div><!------------district-choose-end----------->

          <div id="talukstitledelete" class="col-md-3"><!------------taluk-choose------------>
            <label class="container-fluid" for="talukiddelete">Taluks:<br>
            <select onchange="getPanchayatsfordelete(this)" class="container-fluid border rounded" name="taluk" id="talukiddelete" required>
            <option value=''>Choose Taluk</option>
            </select>
            </label>
            </div><!------------taluk-choose-end----------->

            <div id="panchayatstitledelete" class="col-md-3"><!------------panchayat-choose------------>
            <label class="container-fluid" for="panchayatiddelete">Panchayats:<br>
            <select onchange="getVillagesfordelete(this)" class="container-fluid border rounded" name="panchayat" id="panchayatiddelete" required>
            <option value=''>Choose Panchayat</option>
            </select>
            </label>
            </div><!------------panchayat-choose-end----------->

           <div id="villagetitledelete" class="col-md-3"><!------------village-choose----------->
           <label class="container-fluid position-relative" for="villageiddelete">Village:<br>
           <select class="container-fluid border rounded" name="village" id="villageiddelete" required>
            <option value=''>Choose Village</option>
           </select>
            </label>
            </div>     <!------------village-choose-end----------->
            <div class="col-md-3 mb-3"><button type="submit" class="btn btn-danger text-white">Remove Village</button></div>
           </form>
         </div><!-------------------remove-village-filter-end----------------->
         
         <div style="height: 100px;"></div><!-----------spacer----------->

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

<!-------------------taluk-exist-alert------------------------------->
  <div id="talukexistalert" class="modal fade">
      <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-header">
            <span id="assign-header" class="h4">Below Village is assigned.</span> 
            <button data-bs-dismiss="modal" class="btn btn-close"></button>
         </div>
         <div id="existtaluk" class="modal-body">
            
         </div>
       </div>
      </div>
  </div>
<!-------------------taluk-exist-alert-end------------------------------>

<!-------------------reassign-modal-------------------------------->
<div id="reassignmodal" data-bs-backdrop="static" data-bs-keyboard="false" class="modal fade">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
       <div class="modal-content">
         <div class="modal-header">
            <span id="reassign-header-list" class="h4">Selected villages data.</span> 
            <button data-bs-dismiss="modal" class="btn btn-close" onclick="pageRefresh()"></button>
         </div>
         <div id="reassignlist" class="modal-body">
            
         </div>
       </div>
      </div>
  </div>
<!-------------------reassign-modal-end------------------------------>
<!-------------------reassign-alert-------------------------------->
<div id="reassign-alert" class="modal fade">
      <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
            <span id="reassign-header-confirm" class="h4 text-danger">Confirm</span> 
            <button data-bs-dismiss="modal" class="btn btn-close"></button>
         </div>
         <div id="reassign-confirm-alert" class="modal-body">
            
         </div>
       </div>
      </div>
  </div>
<!-------------------reassign-alert-end------------------------------>
  <script>

let selectedmembers = [];
let resultbox = document.getElementById("searchmemberdata");
let villagenames = [];
let taluks = [];
let taluksarray = [];
let showselectedtaluks = document.getElementById("choosetaluks");
let showselectedtaluksforremove = document.getElementById("choosetaluksforremove");
let selectedtaluks = [];
let selectedtaluksforremove = [];
let receivedtaluks = [];
let coordinatordata = [];
let talukdata = [];

// Mobile Menu Functions
function openMobileMenu() {
  document.getElementById('custom-mobile-menu').style.display = 'block';
}

function closeMobileMenu() {
  document.getElementById('custom-mobile-menu').style.display = 'none';
}

      $.ajax({
      type:"get",
      url:"<?= base_url('members/sidemenu') ?>",
      success:(result)=>{
           document.getElementById("menu-bar").innerHTML = result;
           // Populate custom mobile menu content
           document.getElementById("mobile-menu-content").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("menu-bar").innerHTML = error;
      }
    }); 

    $.ajax({
      type:"get",
      url:"members/topmenu",
      success:(result)=>{
           document.getElementById("search-bar").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("search-bar").innerHTML = error;
      }
    }); 

    $.ajax({
      type:"get",
      url:"members/pslogo",
      success:(result)=>{
           document.getElementById("ps-logo").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("ps-logo").innerHTML = error;
      }
    });

    let displaytaluksEl = document.getElementById("choosetaluks");
    displaytaluksEl.addEventListener("click",()=>{
      let isDisplaytaluk = document.getElementById("talukslist").childNodes;
      let taluk_count = isDisplaytaluk.length;
      if(taluk_count > 0){
        document.getElementById("displaytaluks").style.display = "block";
      }
    }) 

    let displaytaluksforremoveEl = document.getElementById("choosetaluksforremove");
    displaytaluksforremoveEl.addEventListener("click",()=>{
      let isDisplaytaluk = document.getElementById("talukslistforremove").childNodes;
      let taluk_count = isDisplaytaluk.length;
      if(taluk_count > 0){
        document.getElementById("displaytaluksforremove").style.display = "block";
      }
    }) 

    function getDistricts(state){
      let stateid = state.value;

      $.ajax({
      type:"get",
      url:"AdminDashboard/getDistrictsfordropdown",
      data:{"state_id":stateid},
      success:(result)=>{
           document.getElementById("districtid").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("districtid").innerHTML = "<option>Error fetching districts</option>"
      }
    });    
    }

    function getTaluks(district){
    let districtname = district.value;
    $.ajax({
    type:"post",
    dataType: 'JSON',
    cache: false,
    url:"AdminDashboard/getTaluksfordropdown",
    data:{"district_name":districtname},
    success:(result)=>{
       let dropdown = document.getElementById("talukid");
       dropdown.innerHTML = "<option value=''>Choose Taluk</option>";
       result.forEach(taluk => {
           dropdown.innerHTML += `<option value='${taluk.taluk_name}'>${taluk.taluk_name}</option>`;
       });
    }
    });
    }

    function getPanchayats(taluk){
    let talukname = taluk.value;
    $.ajax({
    type:"post",
    dataType: 'JSON',
    cache: false,
    url:"AdminDashboard/getPanchayatsfordropdown",
    data:{"taluk_name":talukname},
    success:(result)=>{
       let dropdown = document.getElementById("panchayatid");
       dropdown.innerHTML = "<option value=''>Choose Panchayat</option>";
       result.forEach(panchayat => {
           dropdown.innerHTML += `<option value='${panchayat.panchayat_name}'>${panchayat.panchayat_name}</option>`;
       });
    }
    });
    }

    function getVillages(panchayat){
    let panchayatname = panchayat.value;
    $.ajax({
    type:"post",
    dataType: 'JSON',
    cache: false,
    url:"AdminDashboard/getVillagesfordropdown",
    data:{"panchayat_name":panchayatname},
    success:(result)=>{
       displayVillage(result);       
    },
    error:(error)=>{
    document.getElementById("displaytaluks").innerHTML = "Error fetching villages.";
    }
    });
    }

    function displayVillage(result){
        document.getElementById("displaytaluks").style.display = "block";
        document.getElementById("talukslist").innerHTML = result.map((village,index)=>{
        let villageData = JSON.stringify({village: village.village_name, panchayat: village.panchayat_name, taluk: village.taluk_name, district: village.district_name});
        let ticks = "";
        if (village.assigned_count == 1) {
            ticks = "<span class='float-end text-success'><i class='fa-duotone fa-solid fa-check'></i></span>";
        } else if (village.assigned_count == 2) {
            ticks = "<span class='float-end text-success'><i class='fa-duotone fa-solid fa-check'></i><i class='fa-duotone fa-solid fa-check'></i></span>";
        }
        return `<li class='target' onclick='addVillage(${villageData})' style='outline:none;border:none;'>${village.village_name} ${ticks}</li>`}).join("");
    }

    function addVillage(villageData){
      $.ajax({
        type:"post",
        url:"<?= base_url('AdminDashboard/checkExistvillage') ?>",
        data:{
            "village": villageData.village,
            "panchayat": villageData.panchayat,
            "taluk": villageData.taluk,
            "district": villageData.district
        },
        success:(result)=>{
               let isExist = result.trim();
               if(isExist === "exist") {
               let talukexistmodal = document.getElementById("talukexistalert");
               let talukexistalertmodal = new bootstrap.Modal(talukexistmodal);
               talukexistalertmodal.show();
               document.getElementById("assign-header").innerHTML = "Below Village is assigned.";
               document.getElementById("existtaluk").innerHTML = `<span class="text-primary fs-4">${villageData.village}</span>`;
               }
               else{
               if(selectedtaluks.length < 4) { 
               selectedtaluks.push(villageData);
               let target = document.querySelectorAll(".target");
               let taluks_array = document.getElementById("taluksarray");
               taluks_array.value = JSON.stringify(selectedtaluks);
               let l = target.length;
               for(let i = 0; i < l ; i++){
                    if(target[i].innerText.includes(villageData.village)){
                    target[i].style.display = "none";
                  }
                }
               document.getElementById("selectedtalukerror").innerHTML = "";
               showTaluks(selectedtaluks);
               }
               else{
               let talukexistmodal = document.getElementById("talukexistalert");
               let talukexistalertmodal = new bootstrap.Modal(talukexistmodal);
               talukexistalertmodal.show();
                document.getElementById("assign-header").innerHTML = "Don't exceed the limit.";
                document.getElementById("existtaluk").innerHTML = "Only four villages are allowed to be assigned.";
               }
               } 
        },
        error:function(error){
            console.error("Error checkExistvillage", error);
        }
      });
    }

    function showTaluks(selectedtaluks) {
      showselectedtaluks.innerHTML = selectedtaluks.map((villageObj,index)=>{ 
        let villageStr = typeof villageObj === 'string' ? villageObj : villageObj.village;
        return `<span class="removetaluk border rounded-pill px-1">${villageStr}&nbsp;<button type="button" onclick='removeTaluk(${index})' style='outline:none;' class='btn rounded-circle btn-close rounded remove-btn'></button></span>`
      }).join("");
    }

    function removeTaluk(index){
     let villageToRemove = selectedtaluks[index];
     let villageName = typeof villageToRemove === 'string' ? villageToRemove : villageToRemove.village;
     
     let filteredtaluks = selectedtaluks.filter((value, idx)=> {return idx !== index});
     selectedtaluks = filteredtaluks; 
     
     let taluks_array = document.getElementById("taluksarray");
     taluks_array.value = JSON.stringify(selectedtaluks);

     let removetaluk = document.querySelectorAll(".target");
     let l = removetaluk.length;
     for(let i = 0; i < l ; i++){
          if(removetaluk[i].innerText.includes(villageName.trim())){
              removetaluk[i].style.display = "block";
          }
      }
     showTaluks(selectedtaluks);
    }

    function getMemberdata(data) {
      let memberdata = data.value;
      $.ajax({
        type:"get",
        url:"<?= base_url('AdminDashboard/getMembersforassign') ?>",
        data:{"searchfields":memberdata},
        success:function(result) {
            resultbox.style.display = "block";
            document.getElementById("searchmemberdata").innerHTML = result;
        },
        error:function(error){
            document.getElementById("searchmemberdata").innerHTML = "Error fetching members";
        }
      });
    }

    function assignForcoordinator(member) {
    let membername = document.getElementById("membername");
    let memberid = document.getElementById("memberid");
    let assigned_area_count = member.Assigned_areas_count;
    if(assigned_area_count >= 4){
      let talukexistmodal = document.getElementById("talukexistalert");
      let talukexistalertmodal = new bootstrap.Modal(talukexistmodal);
      talukexistalertmodal.show();
      document.getElementById("assign-header").innerHTML = "Already assigned 4 Areas."; 
      document.getElementById("existtaluk").innerHTML = `Coordinator <span class="text-success">${member.Name}</span> has already been assigned to four areas.`;
    }
    membername.value = member.Name;
    memberid.value = member.Familymembershipid;
    document.getElementById("searchmemberdata").style.display = "none";
    }

    function validateAssigncoordinator() {
      let taluk_count = selectedtaluks.length;
      if(taluk_count == 0){
        document.getElementById("selectedtalukerror").innerHTML = "Choose atleast one village.";
        return false;
      }
      return true;
    }

    function getDistrictsforremove(state){
      let stateid = state.value;
      $.ajax({
      type:"get",
      url:"<?= base_url('AdminDashboard/getDistrictsfordropdown') ?>",
      data:{"state_id":stateid},
      success:(result)=>{
           document.getElementById("districtnames").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("districtnames").innerHTML = "<option>Error fetching districts</option>"
      }
    });    
    }

    function getTaluksforremove(district){
    let districtname = district.value;
    $.ajax({
    type:"post",
    dataType: 'JSON',
    cache: false,
    url:"<?= base_url('AdminDashboard/getTaluksfordropdown') ?>",
    data:{"district_name":districtname},
    success:(result)=>{
       let dropdown = document.getElementById("talukidremove");
       dropdown.innerHTML = "<option value=''>Choose Taluk</option>";
       result.forEach(taluk => {
           dropdown.innerHTML += `<option value='${taluk.taluk_name}'>${taluk.taluk_name}</option>`;
       });
    }
    });
    }

    function getPanchayatsforremove(taluk){
    let talukname = taluk.value;
    $.ajax({
    type:"post",
    dataType: 'JSON',
    cache: false,
    url:"<?= base_url('AdminDashboard/getPanchayatsfordropdown') ?>",
    data:{"taluk_name":talukname},
    success:(result)=>{
       let dropdown = document.getElementById("panchayatidremove");
       dropdown.innerHTML = "<option value=''>Choose Panchayat</option>";
       result.forEach(panchayat => {
           dropdown.innerHTML += `<option value='${panchayat.panchayat_name}'>${panchayat.panchayat_name}</option>`;
       });
    }
    });
    }

    function getVillagesforremove(panchayat){
    let panchayatname = panchayat.value;
    $.ajax({
    type:"post",
    dataType: 'JSON',
    cache: false,
    url:"<?= base_url('AdminDashboard/getVillagesfordropdown') ?>",
    data:{"panchayat_name":panchayatname},
    success:(result)=>{
       displayVillageforremove(result);
    },
    error:(error)=>{
    document.getElementById("displaytaluksforremove").innerHTML = "Error fetching villages.";
    }
    });
    }

    function displayVillageforremove(result){
        document.getElementById("displaytaluksforremove").style.display = "block";
        document.getElementById("talukslistforremove").innerHTML = result.map((village,index)=>{
        let villageData = JSON.stringify({village: village.village_name, panchayat: village.panchayat_name, taluk: village.taluk_name, district: village.district_name});
        let ticks = "";
        if (village.assigned_count == 1) {
            ticks = "<span class='float-end text-success'><i class='fa-duotone fa-solid fa-check'></i></span>";
        } else if (village.assigned_count == 2) {
            ticks = "<span class='float-end text-success'><i class='fa-duotone fa-solid fa-check'></i><i class='fa-duotone fa-solid fa-check'></i></span>";
        }
        return `<li class='removetarget' onclick='addVillageforremove(${villageData})' style='outline:none;border:none;'>${village.village_name} ${ticks}</li>`}).join("");
    }

    function addVillageforremove(villageData){
       selectedtaluksforremove.push(villageData);
       let target = document.querySelectorAll(".removetarget");
       let taluks_array = document.getElementById("taluksarrayforremove");
       taluks_array.value = JSON.stringify(selectedtaluksforremove);
       let l = target.length;
       for(let i = 0; i < l ; i++){
            if(target[i].innerText.includes(villageData.village)){
            target[i].style.display = "none";
          }
        }
       showTaluksforremove(selectedtaluksforremove);
    }

    function showTaluksforremove(selectedtaluksforremove) {
      showselectedtaluksforremove.innerHTML = selectedtaluksforremove.map((villageObj,index)=>{ 
        let villageStr = typeof villageObj === 'string' ? villageObj : villageObj.village;
        return `<span class="removetaluk border rounded-pill px-1">${villageStr}&nbsp;<button type="button" onclick='removeTalukforremove(${index})' style='outline:none;' class='btn rounded-circle btn-close rounded remove-btn'></button></span>`
      }).join("");
    }

    function removeTalukforremove(index) {
     let villageToRemove = selectedtaluksforremove[index];
     let villageStr = typeof villageToRemove === 'string' ? villageToRemove : villageToRemove.village;
     
     let filteredtaluks = selectedtaluksforremove.filter((value,idx)=> {return idx !== index});
     selectedtaluksforremove = filteredtaluks; 
     
     let taluks_array = document.getElementById("taluksarrayforremove");
     taluks_array.value = JSON.stringify(selectedtaluksforremove);

     let removetaluk = document.querySelectorAll(".removetarget");
     let l = removetaluk.length;
     for(let i = 0; i < l ; i++){
          if(removetaluk[i].innerText.includes(villageStr.trim())){
              removetaluk[i].style.display = "block";
          }
      }
     showTaluksforremove(selectedtaluksforremove);
    }

     document.getElementById("statusfilter").addEventListener("submit",(event)=>{
            event.preventDefault();
      $.ajax({
      type:"post",
      url:"<?= base_url('AdminDashboard/getOverallstatus') ?>",
      data:{"taluksforremove":JSON.stringify(selectedtaluksforremove)},
      dataType: 'json',
      success:(result)=>{
        coordinatordata = [result]; // Result is now parsed by jQuery due to dataType: 'json'
        let finaldata = coordinatordata[0]["coordinatordata"];
        let reassignmodal = document.getElementById("reassignmodal");
               let reassignmodalshow = new bootstrap.Modal(reassignmodal);
               reassignmodalshow.show();
               document.getElementById("reassignlist").innerHTML = finaldata.map((data,index)=>{
                if(!data) return `<p class="text-danger">Village data not found or not assigned.</p>`;
                let villageHierarchy = JSON.stringify({village: data.village_name, panchayat: data.panchayat_name, taluk: data.taluk_name, district: data.district_name});
                return `<table class="table table-borderless mt-2">
               <tr><th>Village Name:</th><td>${data.village_name}</td></tr>
               <tr><th>Current coordinator:</th><td><address>${data.Name}, D/No:${data.Doornumber}, ${data.Street}, ${data.Village}, ${data.Panchayat}, ${data.Taluk}, ${data.District} - ${data.Pincode}, ${data.State}</address></td></tr>
               <tr><td><button type="button" data-bs-toggle='modal' data-bs-target='#reassign-alert' onclick='setreassignConfirmalert("${data.Name}","${data.Familymembershipid}",${villageHierarchy},"reassign-btn${index}")' class="btn btn-danger">Reassign</button></td><td id="reassign-btn${index}"></td></tr>
               </table>`;}).join("");
      },
      error:(error)=>{
           console.error("Error getOverallstatus", error);
      }
    }); 
    }) 

  function setreassignConfirmalert(coordname,memeberid,villageData,id) {
      document.getElementById("reassign-confirm-alert").innerHTML = `<p>Are you sure remove <span class="text-success">${coordname}</span> from coordinator role for <span class="text-danger">${villageData.village}</span> village.</p>
      <div><button class='btn btn-success' data-bs-dismiss="modal" onclick='reassignCoordinator("${coordname}","${memeberid}",${JSON.stringify(villageData)},"${id}")'>Confirm</button>&nbsp;&nbsp;<button class='btn btn-danger' data-bs-dismiss="modal">Cancel</button></div>`;
  }

  function reassignCoordinator(coordname, memberid, villageData, id) {
    $.ajax({
      type: "POST",  
      url: "<?= base_url('AdminDashboard/reassignCoordinator') ?>",
      data: {
        "memberid": memberid,  
        "village": villageData.village,
        "panchayat": villageData.panchayat,
        "taluk": villageData.taluk,
        "district": villageData.district
      },
      success: function(result) {
        let reassign_table = document.getElementById(id);
        if(result) {
          reassign_table.innerHTML += `&nbsp;<span class='text-success fw-bold rounded'>Successfully reassigned.</span>`; 
        }
        else{
          reassign_table.innerHTML += `&nbsp;<span class='text-danger rounded'>Unexpected error please try again.</span>`; 
        }
        // setTimeout(function(){
        //     window.location.reload(); 
        // }, 1500);
      },
      error: function(error) {
        console.error("Error reassignCoordinator:", error);  
      }
    });
  }

  function pageRefresh() {
    window.location.reload();
  }

  // Handle outside clicks to close lists
  window.onclick = (event)=>{
    let displaytaluks = document.getElementById("displaytaluks");
    let choosetaluks = document.getElementById("choosetaluks");
    if (displaytaluks && !displaytaluks.contains(event.target) && !choosetaluks.contains(event.target)) {
      displaytaluks.style.display = "none";
    }

    let displaytaluksforremove = document.getElementById("displaytaluksforremove");
    let choosetaluksforremove = document.getElementById("choosetaluksforremove");
    if (displaytaluksforremove && !displaytaluksforremove.contains(event.target) && !choosetaluksforremove.contains(event.target)) {
      displaytaluksforremove.style.display = "none";
    }
    
    // Member search result box
    if(event.target !== resultbox){
        resultbox.style.display = "none";
    }
  } 

  function getDistrictsforadd(state){
    let stateid = state.value;
    $.ajax({
    type:"get",
    url:"<?= base_url('AdminDashboard/getDistrictsfordropdown') ?>",
    data:{"state_id":stateid},
    success:(result)=>{
         document.getElementById("districtnamesadd").innerHTML = result;
    },
    error:(error)=>{
         document.getElementById("districtnamesadd").innerHTML = "<option>Error fetching districts</option>"
    }
  });    
  }

  function getTaluksforadd(district){
  let districtname = district.value;
  $.ajax({
  type:"post",
  dataType: 'JSON',
  cache: false,
  url:"<?= base_url('AdminDashboard/getTaluksfordropdown') ?>",
  data:{"district_name":districtname},
  success:(result)=>{
     let dropdown = document.getElementById("talukidadd");
     dropdown.innerHTML = "<option value=''>Choose Taluk</option>";
     result.forEach(taluk => {
         dropdown.innerHTML += `<option value='${taluk.taluk_name}'>${taluk.taluk_name}</option>`;
     });
     dropdown.innerHTML += "<option value='add_new_taluk' class='fw-bold text-primary'>+ Add New Taluk</option>";
     
     // Reset manual inputs
     document.getElementById('talukmanual').style.display = 'none';
     document.getElementById('talukmanual').required = false;
     
     // Reset panchayat
     document.getElementById("panchayatidadd").innerHTML = "<option value=''>Choose Panchayat</option>";
     document.getElementById('panchayatmanual').style.display = 'none';
  }
  });
  }

  function checkTalukSelect(selectObj) {
      if(selectObj.value === 'add_new_taluk') {
          document.getElementById('talukmanual').style.display = 'block';
          document.getElementById('talukmanual').required = true;
          
          // If Manual Taluk, Panchayat must also be manual or new
          let panchayatDropdown = document.getElementById("panchayatidadd");
          panchayatDropdown.innerHTML = "<option value='add_new_panchayat'>+ Add New Panchayat</option>";
          panchayatDropdown.value = 'add_new_panchayat'; // Auto select
          checkPanchayatSelect(panchayatDropdown); // Trigger logic
      } else {
          document.getElementById('talukmanual').style.display = 'none';
          document.getElementById('talukmanual').required = false;
          getPanchayatsforadd(selectObj); 
      }
  }

  function getPanchayatsforadd(taluk){
  let talukname = taluk.value;
  $.ajax({
  type:"post",
  dataType: 'JSON',
  cache: false,
  url:"<?= base_url('AdminDashboard/getPanchayatsfordropdown') ?>",
  data:{"taluk_name":talukname},
  success:(result)=>{
     let dropdown = document.getElementById("panchayatidadd");
     dropdown.innerHTML = "<option value=''>Choose Panchayat</option>";
     result.forEach(panchayat => {
         dropdown.innerHTML += `<option value='${panchayat.panchayat_name}'>${panchayat.panchayat_name}</option>`;
     });
     dropdown.innerHTML += "<option value='add_new_panchayat' class='fw-bold text-primary'>+ Add New Panchayat</option>";
     
      // Reset manual input
     document.getElementById('panchayatmanual').style.display = 'none';
     document.getElementById('panchayatmanual').required = false;
  }
  });
  }
  
  function checkPanchayatSelect(selectObj) {
      if(selectObj.value === 'add_new_panchayat') {
          document.getElementById('panchayatmanual').style.display = 'block';
          document.getElementById('panchayatmanual').required = true;
      } else {
          document.getElementById('panchayatmanual').style.display = 'none';
          document.getElementById('panchayatmanual').required = false;
      }
  }

  function getDistrictsfordelete(state){
    let stateid = state.value;
    $.ajax({
    type:"get",
    url:"<?= base_url('AdminDashboard/getDistrictsfordropdown') ?>",
    data:{"state_id":stateid},
    success:(result)=>{
         document.getElementById("districtnamesdelete").innerHTML = result;
    },
    error:(error)=>{
         document.getElementById("districtnamesdelete").innerHTML = "<option>Error fetching districts</option>"
    }
  });    
  }

  function getTaluksfordelete(district){
  let districtname = district.value;
  $.ajax({
  type:"post",
  dataType: 'JSON',
  cache: false,
  url:"<?= base_url('AdminDashboard/getTaluksfordropdown') ?>",
  data:{"district_name":districtname},
  success:(result)=>{
     let dropdown = document.getElementById("talukiddelete");
     dropdown.innerHTML = "<option value=''>Choose Taluk</option>";
     result.forEach(taluk => {
         dropdown.innerHTML += `<option value='${taluk.taluk_name}'>${taluk.taluk_name}</option>`;
     });
  }
  });
  }

  function getPanchayatsfordelete(taluk){
  let talukname = taluk.value;
  $.ajax({
  type:"post",
  dataType: 'JSON',
  cache: false,
  url:"<?= base_url('AdminDashboard/getPanchayatsfordropdown') ?>",
  data:{"taluk_name":talukname},
  success:(result)=>{
     let dropdown = document.getElementById("panchayatiddelete");
     dropdown.innerHTML = "<option value=''>Choose Panchayat</option>";
     result.forEach(panchayat => {
         dropdown.innerHTML += `<option value='${panchayat.panchayat_name}'>${panchayat.panchayat_name}</option>`;
     });
  }
  });
  }

  function getVillagesfordelete(panchayat){
  let panchayatname = panchayat.value;
  $.ajax({
  type:"post",
  dataType: 'JSON',
  cache: false,
  url:"<?= base_url('AdminDashboard/getVillagesfordropdown') ?>",
  data:{"panchayat_name":panchayatname},
  success:(result)=>{
     let dropdown = document.getElementById("villageiddelete");
     dropdown.innerHTML = "<option value=''>Choose Village</option>";
     result.forEach(village => {
         dropdown.innerHTML += `<option value='${village.village_name}'>${village.village_name}</option>`;
     });
  }
  });
  }

  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>
