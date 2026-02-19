<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paymentforevent</title>
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

      .pagination-link{
        border: 1px solid #dee2e6;
        background-color: white;
        color: #495057;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .pagination-link:hover:not(.active-page){
        background-color: #e9ecef;
        border-color: #adb5bd;
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

      .active-payments{
        background-color:rgb(230, 230, 230);
        font-weight:600;
      }      

      .eventslist{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(250px,auto));
        gap:20px;
      }
      .member-color{
        color:red;
      }
      label{
        /* color: rgb(120, 50, 186); */
        font-size:18px;
        font-weight:700;
      }
      input:focus,select:focus{
        outline:2px solid rgb(120, 50, 186);
      }

    @media screen and (max-width:768px) {
     /*  #search-bar{
            background-color:rgb(248, 245, 245);
            flex:none;
            background-color:white !important;
            padding: 5px 0;
           } */
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
          .fa-bell-icon{
            padding-right:10px;
          } 
          #ps-name-line{
            display:none;
          }
          #filter-form{
            padding:0 3% 0 0 !important;
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
      
      <div class="row"><!-----top-bar--------------->

        <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3">
               
        </div>

        <div id="search-bar" class="col-md-10 align-items-center justify-content-between border-bottom">

        </div>
        </div><!-----------top-bar-end----------------------->

        <div class="row"><!----------main-navbar----------->

         <div id="menu-bar" style="height:inherit;" class="col-md-2 ps-gray"><!----------side-bar-------------------->
              
         </div><!-----------side-bar-end-------------->
            
         <div id="changepage" style='height:inherit;overflow:auto;' class="col-md-10 pt-3"><!-----------main-dashboard------------------------->
          
         <div id="filter-form" class="ps-4">
         <?= view('notification_toast') ?>
         <div><!------------------------------------>     
         <div class="pt-2 px-3 pb-4"><!----------filter-start------------>
         <div class="d-flex justify-content-between">
         <span class="text-secondary h4">Payment Status Filter:</span>
         <a href='download_excel?stateid=<?=$filterlist['stateid']?>&districtname=<?=$filterlist['districtname']?>&talukname=<?=$filterlist['talukname']?>&panchayatname=<?=$filterlist['panchayatname']?>&villagename=<?=$filterlist['villagename']?>&eventid=<?=$filterlist['eventid']?>&status=<?=$filterlist['paymentstatus']?>' style='height:fit-content;' class='btn btn-sm btn-success fw-bold float-end btn-warning' id ='download' role='button'>Download</a>
         </div> 
         <form id="filter-form-height" class="row border py-4 border-4 border-success" method="post" action="<?=base_url('get-filtered-users')?>">
         <div class="col-md-3"><!------------state-choose------------>
           <label class="container-fluid" for="aadhar">Choose State: <br>
           <select onchange = "getDistricts(this)" class="container-fluid border rounded" name="stateid" id="stateid">
           <option value=''>Choose State</option>
           <?php if(isset($states) && session()->get("role") == 1) {
           foreach ($states as $key => $value){
           echo 
           "<option ".($filterlist['stateid'] == $value['state_id'] ? "selected" : '')." value='$value[state_id]'>$value[state_title]</option>";
           }} elseif(isset($states) && session()->get("role") == 2) {
            foreach ($states as $value) {
                if ($filterlist['stateid'] == $value['state_id']) {
                    echo "<option selected value='{$value['state_id']}'>{$value['state_title']}</option>";
                    break;
                }
            }
           }
           ?>
           </select>
           </label>
           </div><!------------state-choose-end----------->
          <div class="col-md-3"><!------------district-choose------------>
            <label class="container-fluid" for="aadhar">District:<br>
            <select id="districtstitle" onchange="getTaluks(this)" class="container-fluid border rounded" name="districtname">
            <option value=''>Choose District</option>
            <?php if(isset($districts)) {
            foreach ($districts as $key => $value){
            echo 
            "<option ".($filterlist['districtname'] == $value['district_name'] ? "selected" : '')." value='$value[district_name]'>$value[district_name]</option>";
            }} 
            ?>
            </select>
            </label>
            </div><!------------district-choose-end----------->
           <div id="localareas" class="col-md-3"><!------------local-area-search------------>
            <label class="container-fluid" for="aadhar">Taluks:<br>
            <select onchange="getPanchayatsFiltered(this)" class="container-fluid border rounded" name="talukname" id="talukslist">
            <option value=''>Choose Taluks</option>
            <?php if(isset($taluks) && session()->get("role") == 1) {
            foreach ($taluks as $key => $value){
            $val = is_object($value) ? $value->taluk_name : $value['taluk_name'];
            echo 
            "<option ".($filterlist['talukname'] == $val ? "selected" : '')." value='$val'>$val</option>";
            }} 
            elseif(isset($taluks) && session()->get("role") == 2) {
             foreach ($taluks as $row){
               $val = is_object($row) ? $row->taluk_name : $row['taluk_name'];
               echo 
               "<option ".($filterlist['talukname'] == $val ? "selected" : '')." value='$val'>$val</option>";
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
                  <?php if (isset($panchayats)): 
                      foreach($panchayats as $row):
                        $val = is_object($row) ? $row->panchayat_name : $row['panchayat_name'];
                  ?>
                      <option <?= (isset($filterlist['panchayatname']) && $filterlist['panchayatname'] == $val) ? "selected" : "" ?> value="<?= $val ?>"><?= $val ?></option>
                  <?php endforeach; endif; ?>
                </select>
              </label>
            </div><!------------panchayat-choose-end----------->

            <div class="col-md-3"><!------------village-choose------------>
              <label class="container-fluid" for="village">Villages:<br>
                <select class="container-fluid border rounded" name="villagename" id="villagelist">
                  <option value=''>Choose Village</option>
                  <?php if (isset($villages)): 
                      foreach($villages as $row):
                        $val = is_object($row) ? $row->village_name : $row['village_name'];
                  ?>
                      <option <?= (isset($filterlist['villagename']) && $filterlist['villagename'] == $val) ? "selected" : "" ?> value="<?= $val ?>"><?= $val ?></option>
                  <?php endforeach; endif; ?>
                </select>
              </label>
            </div><!------------village-choose-end----------->

           <div class="col-md-3"><!------------choose-years---------------------->
             <label class="container-fluid" for="aadhar">Event year:<br>
             <select onchange="getEventsbyyear(this)" class='container-fluid border rounded' name='eventyear' id='eventyear'>
             <option value="">Choose Year</option>
             <?php if(isset($eventyears))
             foreach ($eventyears as $key => $value) {
             echo 
             "<option ".($filterlist['eventyear'] == $value['Year'] ? "selected" : '')." value='$value[Year]'>$value[Year]</option>";
             }
            ?>
            </select>
            </label>
            </div><!-----------------choose-years-end---------------->

           <div id ="showevents" class="col-md-3"><!----------event-search------------>
           <label id="eventnamelabel" class="container-fluid" for="aadhar">Events: <br>
           <select onchange="" class="container-fluid border rounded" name="eventid" id="eventid">
           <option value=''>Choose Event</option>
           <?php if(isset($events))
           foreach ($events as $key => $value){
           echo 
           "<option ".($filterlist['eventid'] == $value['Id'] ? "selected" : '')." value='$value[Id]'>$value[EventName]</option>";
           }
           ?>
           </select>
          </label>
          </div><!--------event-search-end--------------------------->

          <div class="col-md-3 d-flex justify-content-between align-items-center"><!------------paid-filter------------>
          <div class="mt-3"><label for="paid">Paid Users:</label>&nbsp;<input onchange="setStatus(this)" type="radio" <?=$filterlist['paymentstatus'] == 'Paid' ? 'checked' : ''?> value="Paid" name="paymentstatus"></div>
          <div class="mt-3"><label for="paid">Un Paid Users:</label>&nbsp;<input onchange="setStatus(this)" type="radio" <?=$filterlist['paymentstatus'] == 'Pending' ? 'checked' : ''?> value="Pending" name="paymentstatus">
          <input hidden id="currentstatus" type="radio" value="<?=$filterlist['paymentstatus']?>" name="paymentstatus"></div>
          </div><!------------paid-filter-end----------->   
          <div id="filterbutton" class="col-md-3 pt-3 d-flex align-items-center justify-content-center"><!------------filter-button-start------------>
             <button class="btn btn-success fw-bold">Apply Filter</button>
          </div><!------------filter-button-end----------->
          </form>
         </div><!---------filter-end-------------->
        </div><!---------------------------------->   

          <div style="overflow:auto;" id="paymentdetails">  
                <?php
                if(isset($filteredusers) && count($filteredusers) > 0){ ?>
                <table class='table table-bordered'>
                <caption style='caption-side:top;' class='h4'>
                  Location: <?= $filterlist['talukname'] . (!empty($filterlist['panchayatname']) ? ' -> ' . $filterlist['panchayatname'] : '') . (!empty($filterlist['villagename']) ? ' -> ' . $filterlist['villagename'] : '') ?>
                  <span class='float-end'><?= $title ?></span>
                </caption>
                <thead>
                <tr style='font-size:18px;' class='ps-gray'>
                <th>Sno</th>
                <th>Familymembership id</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th class='text-center'>Actions</th>
                </tr>
                </thead>
                <tbody id='filteredmembers'>
                <?php
                if(isset($filteredusers) && isset($title)){
                    
                   if(count($filteredusers) == 0){
                    echo "<tr>
                    <td class='fw-bold text-center' colspan='6'>No results found</td>
                    </tr>";
                    }
                    elseif(count($filteredusers) > 0){
                    $i = $sno + 1;
                    foreach ($filteredusers as $key => $value) {
                    echo 
                    "<tr>
                    <td>$i</td><td class='fw-bold text-primary'>$value[Familymembershipid]</td><td style='font-weight:500;'>$value[Name]</td>
                    <td style='font-weight:500;'>$value[Mobile]</td>
                    <td style='font-weight:500;'>$value[MemberTaluk]</td>
                    <td>
                      <div class='d-flex justify-content-evenly'>
                        " . (($filterlist['paymentstatus'] != 'Paid') ? "<a href='filtered-user-payment-form?memberid=$value[Familymembershipid]&eventid=$eventid' class='btn btn-success fw-bold' style='height:fit-content;'>Pay Now</a> &nbsp;&nbsp;" : "") . "
                        <a target='_blank' href='payment-receipt-list?memberid=$value[Familymembershipid]' class='btn btn-primary fw-bold' style='height:fit-content;'>View Receipts</a>
                      </div>
                    </td>
                    </tr>";
                    $i++;
                    }
                   }
                  } ?>
                </tbody>
                </table>
              <?php }
              else{
                echo "<div class='h-100 fw-bold text-muted text-center d-flex justify-content-center align-items-center'>No records found</div>";
              }
                ?>
          </div> 

          <div class='d-flex justify-content-center container-fluid'> <!-----------------pagination---------------------->
            <div class="col-md-6 d-flex justify-content-around align-items-center">
              <?php 
              $displayCounts = $newcounts ?? $counts ?? 0;
              $currentIndex = $initialindex ?? 0;
              $countsperpage = 5;

              if ($displayCounts > 0) {
                  $totalpages = ceil($displayCounts / $countsperpage);
                  $lastindex = 5;
                  
                  // Calculate range of pages to show
                  $startPage = floor($currentIndex / $lastindex) * $lastindex;
                  $endPage = min($startPage + $lastindex, $totalpages);

                  // Back Arrow
                  $prevIndex = max(0, $startPage - $lastindex);
                  echo "<a href='".base_url('change-filtered-users-page-setup')."?initialindex=$prevIndex&stateid=".$filterlist['stateid']."&districtname=".$filterlist['districtname']."&talukname=". $filterlist['talukname'] . "&panchayatname=". ($filterlist['panchayatname'] ?? '') . "&villagename=". ($filterlist['villagename'] ?? '') . "&eventid=" . $filterlist['eventid'] . "&status=" . $filterlist['paymentstatus'] . "' style='cursor:pointer;' class='text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-left-long'></i></a>";

                  // Page Buttons
                  for ($p = $startPage; $p < $endPage; $p++) {
                      $pageno = $p + 1;
                      $count_offset = $p * $countsperpage;
                      $activeClass = ($p == $currentIndex) ? 'active-page' : '';
                      
                      $js_index = $p - $startPage;
                       echo "<button style='width:35px;height:35px;' onclick='displayFiltermembers($count_offset, $js_index, \"" . $filterlist['talukname'] . "\", \"" . $filterlist['eventid'] . "\", \"" . $filterlist['paymentstatus'] . "\", \"" . ($filterlist['panchayatname'] ?? '') . "\", \"" . ($filterlist['villagename'] ?? '') . "\")' class='$activeClass pagination-link rounded-circle'>$pageno</button>";
                  }

                  // Last Page Skip
                  if ($totalpages > $endPage) {
                      echo "<span>...</span>";
                      $lastPageIndex = $totalpages - 1;
                      echo "<a href='".base_url('change-filtered-users-page-setup')."?initialindex=$lastPageIndex&stateid=".$filterlist['stateid']."&districtname=".$filterlist['districtname']."&talukname=". $filterlist['talukname'] . "&panchayatname=". ($filterlist['panchayatname'] ?? '') . "&villagename=". ($filterlist['villagename'] ?? '') . "&eventid=" . $filterlist['eventid'] . "&status=" . $filterlist['paymentstatus'] . "' style='cursor:pointer;width:35px;height:35px;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$totalpages</a>";
                  }

                  // Forward Arrow
                  $nextIndex = $endPage;
                  if ($nextIndex < $totalpages) {
                      echo "<a href='".base_url('change-filtered-users-page-setup')."?initialindex=$nextIndex&stateid=".$filterlist['stateid']."&districtname=".$filterlist['districtname']."&talukname=". $filterlist['talukname'] . "&panchayatname=". ($filterlist['panchayatname'] ?? '') . "&villagename=". ($filterlist['villagename'] ?? '') . "&eventid=" . $filterlist['eventid'] . "&status=" . $filterlist['paymentstatus'] . "'  style='cursor:pointer;' class='text-decoration-none text-dark'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></a>"; 
                  }
              }

              function createarr($noofpages){
                return range(0,$noofpages);
              }
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
      url: "payments/sidemenu",
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
      url:"payments/topmenu",
      success:(result)=>{
           document.getElementById("search-bar").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("search-bar").innerHTML = "Error fetching data";
      }
    }); 

    $.ajax({
      type:"get",
      url:"payments/pslogo",
      success:(result)=>{
           document.getElementById("ps-logo").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("ps-logo").innerHTML = error;
      }
    });
    

    let searchbar_height = document.getElementById("search-bar").getBoundingClientRect().height;
    let filterform_height = document.getElementById("filter-form-height").getBoundingClientRect().height;
    // let paymentdetails_height = document.getElementById("paymentdetails").style.height = `${window.innerHeight - (searchbar_height + filterform_height)}px`;

    // console.log(window.innerHeight - (searchbar_height + filterform_height));

    function getDistricts(state){
      let stateid = state.value;

      $.ajax({
      type:"get",
      url:"payments/get-districts",
      data:{"stateid":stateid},
      success:(result)=>{
          let districts = JSON.parse(result);
          let district_options = "<option value=''>Choose District</option>";
          district_options += districts.map((district,index)=>{
              return `<option value='${district.district_name}'>${district.district_name}</option>`
          }).join("");
          document.getElementById("districtstitle").innerHTML = district_options;
      },
      error:(error)=>{
           document.getElementById("districtstitle").innerHTML = "<option value=''>Error fetching districts</option>";
      }
    });    
    }

    function getTaluks(district){
    let districtname = district.value;
    $.ajax({
    type:"get",
    url:"payments/get-taluks",
    data:{"districtname":districtname},
    success:(result)=>{
      let taluks = JSON.parse(result);
      let taluks_result = "<option value=''>Choose Taluks</option>";
      taluks_result += taluks.map((taluk)=>{
          return `<option value='${taluk.taluk_name}'>${taluk.taluk_name}</option>`
      }).join("");
      document.getElementById("talukslist").innerHTML = taluks_result;
    },
    error:(error)=>{
    document.getElementById("talukslist").innerHTML = "<option value=''>Error fetching districts</option>";
    }
    });
    }

    function getPanchayatsFiltered(taluk) {
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
          document.getElementById("panchayatlist").innerHTML = panchayat_options;
          document.getElementById("villagelist").innerHTML = "<option value=''>Choose Village</option>";
        }
      });
    }

    function getVillagesFiltered(panchayat) {
      let panchayatname = panchayat.value;
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
          document.getElementById("villagelist").innerHTML = village_options;
        }
      });
    }

    function setStatus(status){
        statusforpaid = status.value;
    } 

    function displayFiltermembers(counts,index,talukname,eventid,status,panchayatname='',villagename=''){
         let activepage = document.querySelectorAll(".pagination-link");
         let l = activepage.length;
         for(let i=0; i < l ; i++){
          if( i == index ){
              activepage[i].classList.add("active-page")
          }
          else{
            if(activepage[i].classList.contains("active-page")){
               activepage[i].classList.remove("active-page")
            }
          }   
         } 
      $.ajax({
        type:"post",
        url:"<?= base_url('payments-filter/display-filter-members') ?>",
        data:{"count":counts,"talukname":talukname,"eventid":eventid,"status":status,"panchayatname":panchayatname,"villagename":villagename},
        success:function(result){
            document.getElementById('filteredmembers').innerHTML = result;
        },
        error:function(err){
          console.log(err)
          // document.getElementById('ps-members').innerHTML = err;
        }
      })
    }

    function applyFilter(){
        let villageid = document.getElementById("villageid").value;
        let eventid = document.getElementById("eventid").value;
        $.ajax({
        type:"get",
        data:{"villageid":villageid,"eventid":eventid,"status":statusforpaid},
        url:"payments/getFilteredusers",
        success:(result)=>{
        document.getElementById("paymentdetails").innerHTML = result;
        },
        error:(error)=>{
        document.getElementById("paymentdetails").innerHTML = error;
        }
        });
    }

    function getEvents(yeardata){
        let year = yeardata.value;
      $.ajax({
        type:"get",
        url:"payments/get-all-events",
        data:{"year":year},
        success:(result)=>{
        document.getElementById("showevents").innerHTML = result;
        },
        error:(error)=>{
        document.getElementById("showevents").innerHTML = error;
        }
        });
    }


    function getCities(district){
      let districtid = district.value;
      $.ajax({
      type:"get",
      url:"payments/getCities",
      data:{"districtid":districtid},
      success:(result)=>{
      document.getElementById("citiestitle").innerHTML = result;
      },
      error:(error)=>{
      document.getElementById("citiestitle").innerHTML = error;
      }
      });
    }

    
    function commonSearch(members){
             
             let searchfields = members.value;
             let villageid = document.getElementById("villageid").value;
             let eventid = document.getElementById("eventid").value;
             let status = document.getElementById("currentstatus").value;

             $.ajax({
               type:"get",
               url:"paymentsfilter/searchFilteredmembers",
               data:{"searchfields":searchfields,"villageid":villageid,"eventid":eventid,"status":status},
               success:(result)=>{
                 document.getElementById('filteredmembers').innerHTML = result;
               },
               error:(error)=>{
                 document.getElementById('filteredmembers').innerHTML = error;
               }
    })};     
 
     let setheight = document.getElementById("changepage");
     let menubarheight = document.getElementById("menu-bar");
     let a = window.innerHeight;
     let b = document.getElementById("search-bar").getBoundingClientRect().height;
     document.getElementById("menu-bar").style.height = a - b+"px";
     setheight.style.height = a - b+"px";

     window.addEventListener("resize", () => {
         let currentHeight = window.innerHeight;
         let currentTopbarHeight = document.getElementById("search-bar").getBoundingClientRect().height;
         document.getElementById("menu-bar").style.height = (currentHeight - currentTopbarHeight) + "px";
         setheight.style.height = (currentHeight - currentTopbarHeight) + "px";
     });
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



  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>
