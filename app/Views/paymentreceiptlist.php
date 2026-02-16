<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PaymentReceiptList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url("../js/dss.js");?>"></script>

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
     /*  #paymentlistaddress  table,tr,th,td{
        border:4px solid rgb(120, 50, 186);
        border-collapse:collapse;
        border-radius:10px;
      }
      #paymentlistaddress > th{
        background-color:rgb(248, 245, 245);
      }
 */

     .member-color{
      color:red;
     }
     .table-btn{
        background-color: rgb(239, 236, 236);
        position:relative;
     }
     .viewtooltip{
      visibility:hidden;
      width:max-content;
      background-color: rgb(120, 50, 186);;
      color:white;
      border-radius:6px;
      padding:5px 10px;
      position: absolute;
      top:100%;
      z-index: 1;
     }
     .viewtooltip::after{
          content:"";
          position: absolute;
          bottom: 100%;
          right:50%;
          border:7px;
          border-style:solid;
          border-color:transparent transparent rgb(120, 50, 186) transparent;
     }
     .table-btn:hover .viewtooltip{
        visibility:visible;
     }
     .downloadreceipt{
      visibility:hidden;
      width:max-content;
      background-color: rgb(120, 50, 186);;
      color:white;
      border-radius:6px;
      padding:5px 10px;
      position: absolute;
      top:100%;
      z-index: 1;
     }
     .downloadreceipt::after{
          content:"";
          position: absolute;
          bottom: 100%;
          right:50%;
          border:7px;
          border-style:solid;
          border-color:transparent transparent rgb(120, 50, 186); transparent;
     }
     .table-btn:hover .downloadreceipt{
        visibility:visible;
     }
    @media screen and (max-width:768px) {
/*       #search-bar{
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

         <div id="menu-bar" class="col-md-2 ps-gray"><!----------side-bar-------------------->
              
         </div><!-----------side-bar-end-------------->
             
         <div id="pagecontrol" class="col-md-10 "><!-----------main-dashboard------------------------->
         <div class="ps-4 mt-2">
         <?php 
         echo " <table class='table-bordered border-secondary col-md-4'>";
         if(isset($member)){
         echo "<h4 class='text-secondary'>".($member->Role == 'member' ? 'Member Details:' : 'Coordinator Details:')."</h4>
         <thead>
         <tr><th class='py-1 ps-2'>Name</th><td class='py-1 ps-2 heading-kaadaisoft'>".$member->Name."</td></tr>
         <tr><th class='py-1 ps-2'>Userid</th><td class='fw-bold ".($member->Role == 'coordinator' ? 'text-primary' : 'member-color')." py-1 ps-2'>".$member->Familymembershipid."</td></tr>
         <tr><th class='py-1 ps-2'>Taluk</th><td class='py-1 ps-2'>".$member->Taluk."</td></tr>
         <tr><th class='py-1 ps-2'>District</th><td class='py-1 ps-2'>".$member->District."</td></tr>
         <tr><th class='py-1 ps-2'>Pincode</th><td class='py-1 ps-2'>".$member->Pincode."</td></tr>
         <tr><th class='py-1 ps-2'>Phone Number</th><td class='py-1 ps-2 text-success fw-bold'>".$member->Phonenumber."</td></tr></thead>
         <tbody><td colspan='2'class='text-end'><a href='gopaymentpage?memberid=".$member->Familymembershipid."' class='btn btn-primary' style='height:fit-content;'>Pay Now</a></td></tbody>
         </table>";
         }
         else{
          echo "<tr><td class='text-center fw-bold text-secondary' colspan='2'>No Member details found.</td></tr></thead></table>";
        }
        echo "</div>";
           
         if(isset($receipts)){
          echo "<div class='px-4'>";       
          echo "<table class='mt-2 table table-bordered'>
          <tbody>";
               if(count($receipts) > 0){        
                 $i = 0;
                 foreach ($receipts as $key => $value) {
                   $status = $value["status"];

                   if($value['dues'] == 1){
                    $i = $i+1;
                    echo "<tr class='table-transparent'><td style='font-size:20px;' class='fw-bold text-center' colspan='10'>$value[eventname]</td></tr>
                    <tr>
                    <tr style='font-size:18px;' class='ps-gray fw-bold'>
                    <th>Sno</th><th>EventName</th><th>Total Amount</th><th>Paid Amount</th><th>Pending Amount</th><th>Payment Date</th><th>Year</th><th>Dues</th><th>status</th><th class='text-center'>Actions</th>
                    </tr>
                    <td>$i</td>
                    <td style='font-size:18px;' class='fw-bold text-primary'>$value[eventname]</td>
                    <td style='font-weight:500;'>$value[Taxamount] Rs</td>
                    <td style='font-weight:500;'>".($value['Collectedamount'] ? $value['Collectedamount']." ".'Rs' : '-')."</td>
                    <td style='font-weight:500;'>".($value['balanceamount'] ? $value['balanceamount']." ".'Rs' : '-')."</td>
                    <td style='font-weight:500;'>$value[paymentdate]</td>
                    <td style='font-weight:500;'>$value[year]</td>
                    <td style='font-weight:500;'>$value[dues]</td>
                    <td><span class ='rounded-pill ".($status == NULL || $status == 'Pending' ? 'bg-danger text-white py-2 px-3 btn rounded-3' : 'bg-success text-white py-2 px-3 btn rounded-3')."'>".($status == NULL || $status == 'Pending' ? 'Pending' : $value['status'])."</span></td>
                    <td>
                    <div class='d-flex justify-content-evenly'><button onclick='viewReceipt(\"paymentreceiptpdf?memberid=$value[Familymembershipid]&dues=$value[dues]&eventid=$value[eventid]\")' style='width:40px;height:40px;outline:none;border:none;' class='table-btn btn text-dark shadow-sm rounded-circle d-flex justify-content-center align-items-center text-decoration-none'><i class='fa-sharp fa-solid fa-eye'></i><span class='viewtooltip'>View</span></button>
                    <button onclick='downloadReceipt(\"downloadpdf?memberid=$value[Familymembershipid]&dues=$value[dues]&eventid=$value[eventid]\")' style='width:40px;height:40px;outline:none;border:none;' class='table-btn btn text-dark shadow-sm rounded-circle d-flex justify-content-center align-items-center text-decoration-none'><i class='fa-solid fa-download'></i><span class='downloadreceipt'>Download</span></button></div></td>
                    </tr>";
                   }
                   else{
                   echo "<tr>
                    <td>".($i+1)."</td>
                    <td style='font-size:18px;' class='fw-bold text-primary'>$value[eventname]</td>
                    <td style='font-weight:500;'>$value[Taxamount] Rs</td>
                    <td style='font-weight:500;'>".($value['Collectedamount'] ? $value['Collectedamount']." ".'Rs' : '-')."</td>
                    <td style='font-weight:500;'>".($value['balanceamount'] ? $value['balanceamount']." ".'Rs' : '-')."</td>
                    <td style='font-weight:500;'>$value[paymentdate]</td>
                    <td style='font-weight:500;'>$value[year]</td>
                    <td style='font-weight:500;'>$value[dues]</td>
                    <td><span class ='rounded-pill ".($status == NULL || $status == 'Pending'  ? 'bg-danger text-white py-2 px-3 btn rounded-3' : 'bg-success text-white py-2 px-3 btn rounded-3')."'>".($status == NULL || $status == 'Pending' ? 'Pending' : $value['status'])."</span></td>
                    <td>
                    <div class='d-flex justify-content-evenly'><button onclick='viewReceipt(\"paymentreceiptpdf?memberid=$value[Familymembershipid]&dues=$value[dues]&eventid=$value[eventid]\")' style='width:40px;height:40px;outline:none;border:none;' class='table-btn btn text-dark shadow-sm rounded-circle d-flex justify-content-center align-items-center text-decoration-none'><i class='fa-sharp fa-solid fa-eye'></i><span class='viewtooltip'>View</span></button><button onclick='downloadReceipt(\"downloadpdf?memberid=$value[Familymembershipid]&dues=$value[dues]&eventid=$value[eventid]\")' style='width:40px;height:40px;outline:none;border:none;' class='table-btn btn text-dark shadow-sm rounded-circle d-flex justify-content-center align-items-center text-decoration-none'><i class='fa-solid fa-download'></i><span class='downloadreceipt'>Download</span></button></div></td>
                    </tr>";
                    $i++;  
                   }
                 } 
                }
                else{
                  echo "<tr><td class='text-center text-secondary fw-bold' colspan='7'>No Receipts found.</td></tr>";
                }
                }
                echo "</tbody>
                </table>";

            ?>
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

// Mobile Menu Functions
    function openMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'block';
    }

    function closeMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'none';
    }

    $.ajax({
      type: "get",
      url: "dashboard/sidemenu",
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
      url:"dashboard/topmenu",
      success:(result)=>{
           document.getElementById("search-bar").innerHTML = result;
          //  document.getElementById("dashboardsearch").style.display = "flex";
          //  document.getElementById("dashboardsubmenu").style.display = "flex";
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

     /* let setheight = document.getElementById("pagecontrol");
     let pageheight = window.innerHeight;
     let b = document.getElementById("search-bar").getBoundingClientRect().height;
     setheight.style.height = pageheight - b+"px";
     document.getElementById("menu-bar").style.height = (pageheight - b) + "px";

     window.addEventListener("resize", () => {
         let currentHeight = window.innerHeight;
         let currentTopbarHeight = document.getElementById("search-bar").getBoundingClientRect().height;
         document.getElementById("menu-bar").style.height = (currentHeight - currentTopbarHeight) + "px";
         setheight.style.height = (currentHeight - currentTopbarHeight) + "px";
     }); */

     function viewReceipt(url){
      var link = document.createElement('a');
      link.href = url;
      link.dispatchEvent(new MouseEvent('click'));
     }

     function downloadReceipt(url){
      var link = document.createElement('a');
      link.href = url;
      link.dispatchEvent(new MouseEvent('click'));
     }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.2/html2pdf.bundle.min.js" integrity="sha512-MpDFIChbcXl2QgipQrt1VcPHMldRILetapBl5MPCA9Y8r7qvlwx1/Mc9hNTzY+kS5kX6PdoDq41ws1HiVNLdZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>
