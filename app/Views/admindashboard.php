<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
    /* ✅ Added to enable page scroll */
html, body {
  height: 100%;
  overflow-y: auto;
}

/* ✅ Added to make #changepage section scrollable if content is large */
#changepage {
  overflow-y: auto;
  max-height: 80vh; /* adjust if needed */
}

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
    display:flex;
    flex-wrap:wrap;
    justify-content: center;
    gap:20px;
    }

    .card-round{
      width: 220px;
      border-radius:15px;
      padding: 15px !important;
    }

    ul > li{
      cursor:pointer;
    }

     .card1{
    background: linear-gradient(135deg, #1fa2ff, #12d8fa, #a6ffcb);
    border: none;
    transition: all 0.3s ease;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(31, 162, 255, 0.3);
    text-decoration: none;
    }
    .card2{
      background: linear-gradient(135deg, #f7971e, #ffd200);
      border: none;
      transition: all 0.3s ease;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(247, 151, 30, 0.3);
      text-decoration: none;
    }
    .card3{
      background: linear-gradient(135deg, #8e2de2, #4a00e0);
      border: none;
      transition: all 0.3s ease;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(142, 45, 226, 0.3);
      text-decoration: none;
     }

     .card1:hover, .card2:hover, .card3:hover {
        transform: translateY(-8px) scale(1.02);
        filter: brightness(1.15);
        box-shadow: 0 12px 25px rgba(0,0,0,0.2);
     }

     .card-round:active {
        transform: scale(0.98);
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
      background-color: rgb(120, 50, 186);;
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
          border-color:transparent transparent rgb(120, 50, 186) transparent;
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

    @media screen and (max-width:768px) {
  #ps-logo {
    background: rgb(248, 245, 245) !important;
    padding: 12px 20px !important;
  }
  
  #ps-name-line {
    font-size: 1.3rem !important;
    line-height: 1.2;
  }
  
  .ham-menu {
    margin-left: auto !important;
  }
  
  .ham-menu:hover {
    background-color: rgba(120, 50, 186, 0.1) !important;
  }
}

@media screen and (min-width:769px) {
  .ham-menu {
    display: none !important;
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
      }
      
      .custom-table thead th {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 1px;
        padding: 18px !important;
        border: none !important;
        text-align: center;
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
      
      .custom-table tfoot td {
        background-color: #fcfcfc;
        border-top: 2px solid #eee !important;
        padding: 20px !important;
      }
      
      .total-label {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 1.1rem;
        font-weight: 800;
      }
      
      .total-amount {
        color: #2575fc;
        font-size: 1.25rem;
        font-weight: 800;
      }

    </style>
</head>
<body>
       
    <div id="pageheight" class="container-fluid" style="position:absolute;overflow:hidden;">
        <!---------------------admindashboard-status-notifications---------------------->
<?= view('notification_toast') ?>
      <div class="row"><!-----top-bar--------------->

        <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3">
               
        </div>

        <div id="search-bar" class="col-md-10 align-items-center justify-content-between border-bottom">

       
       
        </div>
        </div><!-----------top-bar-end----------------------->


        <div class="row"><!----------main-navbar----------->

         <div id="menu-bar" class="col-md-2 ps-gray"><!----------side-bar-------------------->
         
              
         </div><!-----------side-bar-end-------------->
            
         <div id="changepage" style="overflow:auto;" class="col-md-10"><!-----------main-dashboard------------------------->
         
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

            <a href="<?= base_url('coordinators') ?>" class="card-round card1 text-white <?php if (session()->get('role') == 3 || session()->get('role') == 2) {
              echo "d-none";
            } else {
              echo "d-flex";
            } ?> align-items-center justify-content-center">

            <ul class="nav flex-column align-items-center mb-0">
              <li class="text-center fw-bold small opacity-75">Coordinators</li>
              <li class="fs-4 text-center fw-bold"><?= $coordscount ?></li>
            </ul>
            </a>
            <a href="<?= base_url('members') ?>" class="card-round card2 text-white d-flex align-items-center justify-content-center">
            <ul class="nav flex-column align-items-center mb-0">
              <li class="text-center fw-bold small opacity-75">Total Members</li>
              <li class="fs-4 text-center fw-bold"><?= $memberscount ?></li>
            </ul>
            </a>

            <a href="<?= base_url('viewreceivedapplications') ?>" class="card-round card3 text-white d-flex align-items-center justify-content-center">
            <ul class="nav flex-column align-items-center mb-0">
              <li class="text-center fw-bold small opacity-75">Approvals</li>
              <li class="fs-4 text-center fw-bold">
                <?php if (!empty($pendingcounts)) {
                  echo "$pendingcounts";
                } else {
                  echo "0";
                }

                ?></li>
            </ul>
            </a>

          </div>

        

      <!-------------------------------total-pendings-------------------------------->
<h3 class="mt-5 mb-3 fw-bold text-center" style="color: #444;">Payment pending details</h3>
<div class="row px-2">
    <div class="col-12">
        <table class="table custom-table">
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
                        <span class="total-label text-uppercase">Total Pending Amount</span>
                    </td>
                    <td>
                        <span id="total_pending" class="total-amount"></span>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


      <!-------------------------------total-pendings-end------------------------------->

         </div>

         </div><!-----------main-dashboard-end------------------------>


        </div><!--------------main-navbar-end------------------->

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

      let pageheight = window.innerHeight;
      let showupdatemanager = document.getElementById("updatemanager-modal-hide");
      document.getElementById("pageheight").style.height = pageheight+"px";
      let topbar = document.getElementById("search-bar").getBoundingClientRect().height;
      document.getElementById("menu-bar").style.height = `${pageheight - topbar}px` 
      
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
      },
      error:(error)=>{
           document.getElementById("menu-bar").innerHTML = error;
      }
    }); 


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

    $.ajax({
    type: "post",
    url: "coordinators/getpendingamount",
    data: { "id": "<?= session()->get('Kaadaisoft_userId'); ?>" },
    success: function(result) {
        let eventparticipation = JSON.parse(result);
        let rows_html = '';
        let total_pending = 0;

        eventparticipation.forEach(function(participation, index) {
            let pending = parseFloat(participation.balanceamount);
            if (isNaN(pending)) pending = parseFloat(participation.Taxamount);
            let pending_display = (pending === 0) ? "0" : pending;
            rows_html += `<tr>
                <td>${index + 1}</td>
                <td>${participation.eventname}</td>
                <td>${participation.Taxamount}</td>
                <td>${pending_display}</td>
            </tr>`;
            if (pending > 0) total_pending += pending;
        });

        if (eventparticipation.length === 0) {
            document.getElementById("nomemberresult").innerHTML = `<tr><td class="text-center" colspan="4">No records found</td></tr>`;
            document.getElementById("showparticipation").innerHTML = '';
            document.getElementById("total_pending").innerText = "0.00";
        } else {
            document.getElementById("nomemberresult").innerHTML = `<tr><th>SNo</th><th>Event Name</th><th>Tax Amount</th><th>Balance Amount</th></tr>`;
            document.getElementById("showparticipation").innerHTML = rows_html;
            document.getElementById("total_pending").innerText = total_pending.toFixed(2);
        }
    },
    error: function(error) {
        // handle error here
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
  

  function togglePasswordIcon() {
    const toggleButton = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("current_password");
    const icon = document.getElementById("togglePasswordIcon");
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        icon.classList.toggle("bi-eye");
        icon.classList.toggle("bi-eye-slash");
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>

