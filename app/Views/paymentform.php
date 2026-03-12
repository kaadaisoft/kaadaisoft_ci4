<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paymentform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
    /* Fixed Premium Layout */
    html, body { height: 100%; margin: 0; overflow: hidden; }
    .layout-container { display: flex; flex-direction: column; height: 100vh; width: 100%; }
    .top-navbar-row { height: 70px; flex-shrink: 0; z-index: 1050; background: #0f172a; display: flex; align-items: center; margin: 0 !important; border-bottom: 1px solid #1e293b; }
    .main-body-row { flex: 1; display: flex; overflow: hidden; margin: 0 !important; }
    #menu-bar { width: 260px; height: 100%; overflow-y: auto; flex-shrink: 0; background-color: #0f172a !important; border-right: 1px solid #1e293b; padding: 0; }
    .main-content-area { flex: 1; overflow-y: auto; background-color: #f8fafc; padding-bottom: 50px; }

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


      #search-bar{
            display:flex;
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

      .active-payments{
        background-color:rgb(230, 230, 230);
        font-weight:600;
      }

      form label{
        font-size:18px;
        color: black;
        font-weight:700;
      }

      form input:focus,select:focus{
        outline:2px solid rgb(0, 123, 255);
      }
      input[type=checkbox]:focus,input[type=radio]:focus{
        outline:none;
      }
      form button[type=submit]{
        color:white; 
        font-weight:500;
        border:none;
        background-color:rgb(0, 123, 255);
      }
    
      .ps-logo-text{
        color: rgb(0, 123, 255);
      }

      .member-color{
        color:red;
      }

      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
      }

      /* Firefox */
     input[type=number] {
     -moz-appearance: textfield;
    }
    td{
      font-size:18px;
      font-weight:500;
    }

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
          #mobile-paymentform{
            padding:0 3% 0 0 !important;
          }
      }

    @media screen and (min-width:768px) {
          .ham-menu{
            display:none;
          }
      }

    @media screen and (max-width: 768px) {
      .top-navbar-row { height: auto; flex-wrap: wrap; }
      .main-body-row { flex-direction: column; overflow: auto; }
      #menu-bar { display: none; }
      .main-content-area { width: 100%; overflow: visible; }
      html, body { overflow: auto; height: auto; }
      .layout-container { height: auto; }
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
    </style>
</head>
<body>
        
    <div class="layout-container">
      
      <div class="top-navbar-row"><!-----top-bar--------------->

        <div id="ps-logo" class="col-md-2 py-3 d-flex align-items-center justify-content-start ps-2">
        </div>

        <div id="search-bar" class="col-md-10 d-flex align-items-center justify-content-between px-3">
        </div>
      </div><!-----------top-bar-end----------------------->


      <div class="main-body-row"><!----------main-navbar----------->

         <div id="menu-bar"><!----------side-bar-------------------->
         </div><!-----------side-bar-end-------------->
            
         <div id="paymentdetail" class="main-content-area ps-gray border-start pt-2 pb-5"><!-----------main-dashboard------------------------->
         
         <div id="mobile-paymentform" class='container-fluid mt-3 px-4' style='max-width: 1200px; margin: 0 auto;'> <!--------------payment-form-start------->
            <?php if(isset($memberdetail)):?>
            <form method="POST" autocomplete="off" action="<?=base_url("payments/save-tax-receipt")?>" id="paymentform" name="paymentform" class="bg-white container-fluid border py-4 rounded-3 d-flex flex-column">

                <h3 class='text-center ps-logo-text'>Payment Details</h3>
                <input id="path" name="path" hidden class="container-fluid border rounded" type="text" readonly value="paymentform">
                <input id="memberid" name="memberid" hidden class="container-fluid border rounded" type="text" readonly value="<?=$memberdetail->Familymembershipid?>">
                <input id="membername" name="membername" hidden class="container-fluid border rounded" type="text" readonly value="<?=$memberdetail->Name?>">
                <input name="membertaluk" hidden class="container-fluid border rounded" type="text" readonly value="<?=$memberdetail->Taluk?>">
                <input name="membermobile" hidden class="container-fluid border rounded" type="text" readonly value="<?=$memberdetail->Phonenumber?>">

              <div class="row"><!--------------row-start--------------->
              <div class="col-md-4"><!--------------col-1------------------------>
              <div class='col-md-12 d-flex py-2'>
              
              <table class="table table-borderless">
                  <tr>
                  <th><label for="name">Name:</label></th><td style="font-weight:500;"><?=$memberdetail->Name?></td>
                  </tr>
                  <tr>
                    <th><label for="userid">Familymembership Id:</label></th><td class="fw-bold text-primary"><span><?=$memberdetail->Familymembershipid?></span> </td>
                  </tr>
                  <tr>
                    <th> <label for="address">Address:</label></th>
                    <td><?php 
                        echo 
                        "<address>
                         Ph: $memberdetail->Phonenumber, 
                         D/No: $memberdetail->Doornumber,
                         $memberdetail->Street,
                         $memberdetail->Village,
                         $memberdetail->Panchayat,
                         $memberdetail->Taluk,
                         $memberdetail->District,
                         $memberdetail->State - $memberdetail->Pincode
                         </address>";
                         ?></td>
                  </tr>
                
              </table>
              </div><!-----------------1---------------->

              </div><!-------------col-1-end-------------------->

            <div class="col-md-4 py-2"><!----------------col-2-start--------------->
            <div class="col-md-12 py-2">
            <label class="container-fluid" for="aadhar">Choose Event Year:<br>
            <select onchange="getEvents(this,'<?=$memberdetail->Familymembershipid?>')" class='container-fluid border rounded' name='eventyear' id='eventnames'>
            <option value="">Choose Year</option>
            <option value="">Search Event</option>
            <?php if(isset($eventyears))
            foreach ($eventyears as $key => $value) {
                $selected = (isset($preselected_year) && $preselected_year == $value['Year']) ? 'selected' : '';
                echo "<option value='$value[Year]' $selected>$value[Year]</option>";
            }
            ?>
            </select>
            </label>
            </div><!-----------------1---------------->
            <div id ="showevents" class="col-md-12 py-2">
            <input hidden class='container-fluid border rounded' name="eventid" id='eventid' required>
            <label id="eventnamelabel" class="container-fluid" for="aadhar">Choose events: <br>
            <input onkeyup="searchEvents(this)" class='container-fluid border rounded' id='eventname' required>
            <div id="eventsearchresult" style="visibility:hidden;overflow-x:auto;position:absolute;box-sizing:border-box;" class="d-flex flex-column py-2 ps-3 mt-2 rounded-3 border shadow-sm bg-white">
            </div>
            </label>
            </div><!-----------------2------------------>

            <div class="col-md-12 py-2">
            <label class="container-fluid d-flex flex-column" for="payamount">Pay: <br>
            <input readonly class="container-fluid border rounded" type="number" id="pay" name="paidamount" onkeyup="calculateBalance(this,'balance')" required>
            <small id="payalert" class="fw-normal" style="color:red;"></small>
            </label>
            </div><!-----------------3---------------->

            <div class="d-flex py-2 container-fluid"><!-----------------3------------------>
            <label for="paymentdate">Payment Date:&nbsp;&nbsp;</label>
            <input name="paymentdate" hidden class="container-fluid border rounded" type="text" readonly value="<?php echo date("Y-m-d");?>">
            <span class="fw-bold"><?php echo date("Y/m/d");?></span>
            
             </div><!------------------3-end------------------------->
             

              </div><!-----------------col-2-end------------------->

              <div id="taxdetails" class="col-md-4 py-2"><!-----------------col-3-start------------------->

              <div class="col-md-12 py-2">
              <label class="container-fluid" for="taxamount">Total Amount: <br>
              <input readonly class="border rounded container-fluid">
              </label>
               </div><!-----------------1---------------->


              <div class="col-md-12 py-2">
              <label class="container-fluid" for="balanceamount">Paid Amount:
              <input id="prevpaid" name="paidamount" readonly class="container-fluid border rounded" type="number">
              </label>
              </div><!-----------------2---------------->

              <div class="col-md-12 py-2">
              <label class="container-fluid" for="balanceamount">Balance Amount:
              <input id="balance" name="balanceamount" readonly class="container-fluid border rounded" type="text">
              </label>
              </div><!-----------------3---------------->
             

              </div><!-----------------col-3-end------------------->

              </div><!-------------row-end---------------------->
             
              <div class="row"><!------------payment-type------------>
              <div class="container-fluid">
              <label class="container-fluid" for="payment">Payment Type:</label>
              <div class="d-flex justify-content-around">

              <div>
              <label for="bank">Bank:</label>&nbsp;<input onclick="getPaymentmethod(this)"  name="paymenttype" type="radio" value="bank" required>
              </div><!-----------------1---------------->

              <div>
              <label for="checkque">Checkque:</label>&nbsp;<input onclick="getPaymentmethod(this)" name="paymenttype" type="radio" value="checkque" required>
             </div><!-----------------2---------------->

             <div>
             <label for="upi">UPI:</label>&nbsp;<input onclick="getPaymentmethod(this)" name="paymenttype" type="radio" value="upi" required>
             </div><!-----------------3---------------->

             <div>
             <label for="cash">Cash:</label>&nbsp;<input onclick="getPaymentmethod(this)" name="paymenttype" type="radio" value="cash" required>
             </div><!-----------------4---------------->

      </div>

      <div id="getpaymentdetail" class="container-fluid py-2">

      </div>

      <div class="row pt-2 px-3">
        <div class="col-md-6 mb-3">
            <label class="form-label" for="receivedby"><i class="fas fa-user-check me-2 text-primary"></i>Person Received the Money</label>
            <input type="text" name="receivedby" id="receivedby" class="form-control border rounded-pill py-3 px-4" placeholder="Enter name of receiver" required>
        </div>
      </div>

      <div class="container-fluid">
      <div class="d-flex mt-3">
      <input type="checkbox" onchange="enablesubmitbutton(this)">&nbsp;&nbsp;<label for="checkpaymentdetails">Above details are correct.</label> 
      </div>
      </div>
      </div>
      </div><!------------payment-type------------>  

      <div class="text-center mt-3 pb-5">
      <button id="savereceipt" name="savereceipt" style="opacity:0.4;" type="submit" disabled class="rounded-3 px-3 py-1">Save Receipt</button>
      </div>
      
      <div style="height: 100px;"></div> <!-- Bottom Spacer -->

            </form>
            
          <?php endif; ?>  
         </div><!------------payment-form-end----------------------------->
                 
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

const BankList = [
    "ABHYUDAYA CO-OP BANK LTD",
    "ABU DHABI COMMERCIAL BANK",
    "AKOLA DISTRICT CENTRAL CO-OPERATIVE BANK",
    "AKOLA JANATA COMMERCIAL COOPERATIVE BANK",
    "ALLAHABAD BANK",
    "ALMORA URBAN CO-OPERATIVE BANK LTD.",
    "ANDHRA BANK",
    "ANDHRA PRAGATHI GRAMEENA BANK",
    "APNA SAHAKARI BANK LTD",
    "AUSTRALIA AND NEW ZEALAND BANKING GROUP LIMITED.",
    "AXIS BANK",
    "BANK INTERNASIONAL INDONESIA",
    "BANK OF AMERICA",
    "BANK OF BAHRAIN AND KUWAIT",
    "BANK OF BARODA",
    "BANK OF CEYLON",
    "BANK OF INDIA",
    "BANK OF MAHARASHTRA",
    "BANK OF TOKYO-MITSUBISHI UFJ LTD.",
    "BARCLAYS BANK PLC",
    "BASSEIN CATHOLIC CO-OP BANK LTD",
    "BHARATIYA MAHILA BANK LIMITED",
    "BNP PARIBAS",
    "CALYON BANK",
    "CANARA BANK",
    "CAPITAL LOCAL AREA BANK LTD.",
    "CATHOLIC SYRIAN BANK LTD.",
    "CENTRAL BANK OF INDIA",
    "CHINATRUST COMMERCIAL BANK",
    "CITIBANK NA",
    "CITIZENCREDIT CO-OPERATIVE BANK LTD",
    "CITY UNION BANK LTD",
    "COMMONWEALTH BANK OF AUSTRALIA",
    "CORPORATION BANK",
    "CREDIT SUISSE AG",
    "DBS BANK LTD",
    "DENA BANK",
    "DEUTSCHE BANK",
    "DEUTSCHE SECURITIES INDIA PRIVATE LIMITED",
    "DEVELOPMENT CREDIT BANK LIMITED",
    "DHANLAXMI BANK LTD",
    "DICGC",
    "DOMBIVLI NAGARI SAHAKARI BANK LIMITED",
    "FIRSTRAND BANK LIMITED",
    "GOPINATH PATIL PARSIK JANATA SAHAKARI BANK LTD",
    "GURGAON GRAMIN BANK",
    "HDFC BANK LTD",
    "HSBC",
    "ICICI BANK LTD",
    "IDBI BANK LTD",
    "IDRBT",
    "INDIAN BANK",
    "INDIAN OVERSEAS BANK",
    "INDUSIND BANK LTD",
    "INDUSTRIAL AND COMMERCIAL BANK OF CHINA LIMITED",
    "ING VYSYA BANK LTD",
    "JALGAON JANATA SAHKARI BANK LTD",
    "JANAKALYAN SAHAKARI BANK LTD",
    "JANASEVA SAHAKARI BANK (BORIVLI) LTD",
    "JANASEVA SAHAKARI BANK LTD. PUNE",
    "JANATA SAHAKARI BANK LTD (PUNE)",
    "JPMORGAN CHASE BANK N.A",
    "KALLAPPANNA AWADE ICH JANATA S BANK",
    "KAPOL CO OP BANK",
    "KARNATAKA BANK LTD",
    "KARNATAKA VIKAS GRAMEENA BANK",
    "KARUR VYSYA BANK",
    "KOTAK MAHINDRA BANK",
    "KURMANCHAL NAGAR SAHKARI BANK LTD",
    "MAHANAGAR CO-OP BANK LTD",
    "MAHARASHTRA STATE CO OPERATIVE BANK",
    "MASHREQBANK PSC",
    "MIZUHO CORPORATE BANK LTD",
    "MUMBAI DISTRICT CENTRAL CO-OP. BANK LTD.",
    "NAGPUR NAGRIK SAHAKARI BANK LTD",
    "NATIONAL AUSTRALIA BANK",
    "NEW INDIA CO-OPERATIVE BANK LTD.",
    "NKGSB CO-OP BANK LTD",
    "NORTH MALABAR GRAMIN BANK",
    "NUTAN NAGARIK SAHAKARI BANK LTD",
    "OMAN INTERNATIONAL BANK SAOG",
    "ORIENTAL BANK OF COMMERCE",
    "PARSIK JANATA SAHAKARI BANK LTD",
    "PRATHAMA BANK",
    "PRIME CO OPERATIVE BANK LTD",
    "PUNJAB AND MAHARASHTRA CO-OP BANK LTD.",
    "PUNJAB AND SIND BANK",
    "PUNJAB NATIONAL BANK",
    "RABOBANK INTERNATIONAL (CCRB)",
    "RAJGURUNAGAR SAHAKARI BANK LTD.",
    "RAJKOT NAGARIK SAHAKARI BANK LTD",
    "RESERVE BANK OF INDIA",
    "SBERBANK",
    "SHINHAN BANK",
    "SHRI CHHATRAPATI RAJARSHI SHAHU URBAN CO-OP BANK LTD",
    "SOCIETE GENERALE",
    "SOLAPUR JANATA SAHKARI BANK LTD.SOLAPUR",
    "SOUTH INDIAN BANK",
    "STANDARD CHARTERED BANK",
    "STATE BANK OF BIKANER AND JAIPUR",
    "STATE BANK OF HYDERABAD",
    "STATE BANK OF INDIA",
    "STATE BANK OF MAURITIUS LTD",
    "STATE BANK OF MYSORE",
    "STATE BANK OF PATIALA",
    "STATE BANK OF TRAVANCORE",
    "SUMITOMO MITSUI BANKING CORPORATION",
    "SYNDICATE BANK",
    "TAMILNAD MERCANTILE BANK LTD",
    "THANE BHARAT SAHAKARI BANK LTD",
    "THE A.P. MAHESH CO-OP URBAN BANK LTD.",
    "THE AHMEDABAD MERCANTILE CO-OPERATIVE BANK LTD.",
    "THE ANDHRA PRADESH STATE COOP BANK LTD",
    "THE BANK OF NOVA SCOTIA",
    "THE BANK OF RAJASTHAN LTD",
    "THE BHARAT CO-OPERATIVE BANK (MUMBAI) LTD",
    "THE COSMOS CO-OPERATIVE BANK LTD.",
    "THE DELHI STATE COOPERATIVE BANK LTD.",
    "THE FEDERAL BANK LTD",
    "THE GADCHIROLI DISTRICT CENTRAL COOPERATIVE BANK LTD",
    "THE GREATER BOMBAY CO-OP. BANK LTD",
    "THE GUJARAT STATE CO-OPERATIVE BANK LTD",
    "THE JALGAON PEOPLES CO-OP BANK",
    "THE JAMMU AND KASHMIR BANK LTD",
    "THE KALUPUR COMMERCIAL CO. OP. BANK LTD.",
    "THE KALYAN JANATA SAHAKARI BANK LTD.",
    "THE KANGRA CENTRAL CO-OPERATIVE BANK LTD",
    "THE KANGRA COOPERATIVE BANK LTD",
    "THE KARAD URBAN CO-OP BANK LTD",
    "THE KARNATAKA STATE APEX COOP. BANK LTD.",
    "THE LAKSHMI VILAS BANK LTD",
    "THE MEHSANA URBAN COOPERATIVE BANK LTD",
    "THE MUNICIPAL CO OPERATIVE BANK LTD MUMBAI",
    "THE NAINITAL BANK LIMITED",
    "THE NASIK MERCHANTS CO-OP BANK LTD. NASHIK",
    "THE RAJASTHAN STATE COOPERATIVE BANK LTD.",
    "THE RATNAKAR BANK LTD",
    "THE ROYAL BANK OF SCOTLAND N.V",
    "THE SAHEBRAO DESHMUKH CO-OP. BANK LTD.",
    "THE SARASWAT CO-OPERATIVE BANK LTD",
    "THE SEVA VIKAS CO-OPERATIVE BANK LTD (SVB)",
    "THE SHAMRAO VITHAL CO-OPERATIVE BANK LTD",
    "THE SURAT DISTRICT CO OPERATIVE BANK LTD.",
    "THE SURAT PEOPLES CO-OP BANK LTD",
    "THE SUTEX CO.OP. BANK LTD.",
    "THE TAMILNADU STATE APEX COOPERATIVE BANK LIMITED",
    "THE THANE DISTRICT CENTRAL CO-OP BANK LTD",
    "THE THANE JANATA SAHAKARI BANK LTD",
    "THE VARACHHA CO-OP. BANK LTD.",
    "THE VISHWESHWAR SAHAKARI BANK LTD. PUNE",
    "THE WEST BENGAL STATE COOPERATIVE BANK LTD",
    "TJSB SAHAKARI BANK LTD.",
    "TUMKUR GRAIN MERCHANTS COOPERATIVE BANK LTD.",
    "UBS AG",
    "UCO BANK",
    "UNION BANK OF INDIA",
    "UNITED BANK OF INDIA",
    "UNITED OVERSEAS BANK",
    "VASAI VIKAS SAHAKARI BANK LTD.",
    "VIJAYA BANK",
    "WEST BENGAL STATE COOPERATIVE BANK",
    "WESTPAC BANKING CORPORATION",
    "WOORI BANK",
    "YES BANK LTD",
    "ZILA SAHKARI BANK LTD GHAZIABAD",
    "IDFC First Bank"
];

     /* Single Scroll Logic - Using CSS Flex */
     /* Removed JS minHeight settings to prevent clipping */
     
     /*
     let setheight = document.getElementById("paymentdetail");
     let menubarheight = document.getElementById("menu-bar");
     let a = window.innerHeight;
     let b = document.getElementById("search-bar").getBoundingClientRect().height;
     setheight.style.height = a - b+"px";
     document.getElementById("menu-bar").style.height = (a - b) + "px";

     window.addEventListener("resize", () => {
         let currentHeight = window.innerHeight;
         let currentTopbarHeight = document.getElementById("search-bar").getBoundingClientRect().height;
         document.getElementById("menu-bar").style.height = (currentHeight - currentTopbarHeight) + "px";
         setheight.style.height = (currentHeight - currentTopbarHeight) + "px";
     });
     console.log(a);
     */

     let eventsearchbarwidth = document.getElementById("eventnamelabel").getBoundingClientRect().width;
     let eventsearchresult = document.getElementById("eventsearchresult");
     eventsearchresult.style.width = eventsearchbarwidth+"px";
     console.log(eventsearchbarwidth);


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

    let choosebank =  BankList.map((v)=>{
          return `<option value="${v}">${v}</option>`
         })

  function getPaymentmethod(data){
      let paymenttype = data.value;

      if(paymenttype == "bank"){
         
         document.getElementById("getpaymentdetail").innerHTML = `<div><label>
         Choose bank: <br>
         <select class='container-fluid border rounded' name="bankname" id="banklist" required>  
         <option value="">Choose bank</option>
         ${choosebank} 
         </select>
         </label></div>
         <div class='pt-2'>
         <label>
         Transaction Id:
         <input name='transactionid' class="border rounded" type="text" required>
         </label>
         </div>
         `;
      }
      else if(paymenttype == "checkque"){
        document.getElementById("getpaymentdetail").innerHTML = `<div><label>
         Choose bank: <br>
         <select class='container-fluid border rounded' name="banknameforcheckque" id="banklist" required>  
         <option value="">Choose bank</option>
         ${choosebank} 
         </select>
         </label></div>
         <div class='pt-2'>
         <label> 
         Checkque No: 
         <input name='checkqueno' class="border rounded" type="text" required>
         </label>
         </div>`;
      }
      else if(paymenttype == "upi") {
        document.getElementById("getpaymentdetail").innerHTML = `
        <div class="d-flex flex-column align-items-center">
         <img class="p-2 border rounded" style="width:250px;height:250px;" src="assets/otherdocuments/qrscan.png"> <br/>
         <label>
         Enter Transaction Id: 
         <input name='upitransactionid' class="border rounded" type="text" required>
         </label>
         </div>`;
      }
      else if(paymenttype == "cash"){
        document.getElementById("getpaymentdetail").innerHTML = `
        <div>
         <label>
         Where to pay: <br>
         <select name='where' class="container-fluid border rounded" type="text" required>
           <option value=''>Choose Where</option>
           <option value='InHome'>InHome</option>
           <option value='InTemple'>InTemple</option>
           <option value='coordinator'>Coordinator</option>
           <option value='manager'>Manager</option>
         </select>
         </label>
         </div>`;
      }
      }

    window.onclick = (event)=>{
      if(event.target !== document.getElementById("eventname")){
        document.getElementById("eventsearchresult").style.visibility = "hidden";
      }
    }

    function enablesubmitbutton(checked){
        let check = checked.checked;
        let pay = document.getElementById("pay").value;
        console.log(check)
        if(check && Number(pay) > 0){
           document.getElementById("savereceipt").removeAttribute("disabled");
           document.getElementById("savereceipt").style.opacity = "1";
        }
        else{
          if (check && Number(pay) <= 0) {
             document.getElementById("payalert").innerHTML = "Please enter an amount greater than 0.";
             checked.checked = false;
          }
          document.getElementById("savereceipt").setAttribute("disabled",true);
          document.getElementById("savereceipt").style.opacity = "0.4";
        }
    }  

    function getEvents(years,memberid){
      let year = years.value;
      if(year == ""){
        document.getElementById("showevents").innerHTML = `<input hidden class='container-fluid border rounded' name="eventid" id='eventid' required>
            <label id="eventnamelabel" class="container-fluid" for="aadhar">Choose events: <br>
            <input onkeyup="searchEvents(this)" class='container-fluid border rounded' id='eventname' required>
            <div id="eventsearchresult" style="width:${eventsearchbarwidth}px;visibility:hidden;overflow-x:auto;position:absolute;box-sizing:border-box;" class="d-flex flex-column py-2 ps-3 mt-2 rounded-3 border shadow-sm bg-white">
            </div>
            </label>`;
      }
      else{
      $.ajax({
      type:"get",
      url:"payments/get-events-list",
      data:{"year":year,"memberid":memberid},
      success:(result)=>{
           document.getElementById("showevents").innerHTML = result;
           console.log(result)
      },
      error:(error)=>{
           document.getElementById("showevents").innerHTML = "Error fetching member data.";
          //  console.log(error)
      }
    });
    }
    }  

    function searchEvents(events){
        let event = events.value;
        console.log(event)
        $.ajax({
        type:"get",
        url:"payments/search-events",
        data:{"event":event},
        success:(result)=>{
           document.getElementById("eventsearchresult").style.visibility = "visible";
           document.getElementById("eventsearchresult").innerHTML = result;
           console.log(result)
        },
        error:(error)=>{
           document.getElementById("eventsearchresult").innerHTML = error;
           console.log(error)
        }
        });

    }

    function assignEvent(eventid,eventname){
         console.log(eventid,eventname)
         let searchbar = document.getElementById("eventname");
         let setid = document.getElementById("eventid");
         let memberid = document.getElementById("memberid").value;
         searchbar.value = eventname;
         setid.value = eventid;
         getTaxamountbysearch(eventid,memberid);
    }

    function getTaxamount(event,memberid) {
       let eventid = event.value;
       console.log(event.value,memberid);
       // Clear previous pay value and alerts
       document.getElementById("pay").value = "";
       document.getElementById("payalert").innerHTML = "";
       
      $.ajax({
      type:"get",
      url:"payments/get-tax-amount",
      data:{"eventid":eventid,"memberid":memberid},
      success:(result)=>{
           document.getElementById("taxdetails").innerHTML = result;
           let balanceValue = document.getElementById("balance").value;
           if (Number(balanceValue) <= 0) {
               document.getElementById("pay").setAttribute("readonly", true);
               document.getElementById("payalert").innerHTML = "You already paid";
               document.getElementById("payalert").style.color = "red";
           } else {
               document.getElementById("pay").removeAttribute("readonly");
           }
           console.log(result);
      },
      error:(error)=>{
           document.getElementById("taxdetails").innerHTML = error;
          //  console.log(error)
      }
    }); 
    }
    
    function getTaxamountbysearch(event,memberid){
       let SNo = event;
       console.log(event,memberid);
       // Clear previous pay value and alerts
       document.getElementById("pay").value = "";
       document.getElementById("payalert").innerHTML = "";

      $.ajax({
      type:"get",
      url:"payments/get-tax-amount",
      data:{"eventid":SNo,"memberid":memberid},
      success:(result)=>{
           document.getElementById("taxdetails").innerHTML = result;
           let balanceValue = document.getElementById("balance").value;
           if (Number(balanceValue) <= 0) {
               document.getElementById("pay").setAttribute("readonly", true);
               document.getElementById("payalert").innerHTML = "You already paid";
               document.getElementById("payalert").style.color = "red";
           } else {
               document.getElementById("pay").removeAttribute("readonly");
           }
           console.log(result)
      },
      error:(error)=>{
           document.getElementById("taxdetails").innerHTML = error;
          //  console.log(error)
      }
    }); 
    }

    function calculateBalance(amount,id){

       let validreg = /^([0-9])+$/;
       let currentpay = amount.value;
       let validate;
       console.log(currentpay.length)
       if(currentpay.length > 0){
       validate = currentpay.match(validreg);
       }
       if(!validate){
         document.getElementById("payalert").innerHTML = "Only use Numbers.don't use special characters. ";
       }       
       else{
       document.getElementById("payalert").innerHTML = "";
       let tax = document.getElementById("taxamount").value;
       let prevpaid = document.getElementById("prevpaid").value;
       let max = tax.length;
       let pay = document.getElementById("pay");
       pay.setAttribute("maxlength",max);
       console.log(prevpaid)
       if(Number(currentpay) <= 0){
           document.getElementById("payalert").innerHTML = "Please enter an amount greater than 0. ";
           document.getElementById("savereceipt").setAttribute("disabled",true);
           document.getElementById("savereceipt").style.opacity = "0.4";
           // Also uncheck the confirmation if it was checked
           let confirmCheck = document.querySelector('input[type="checkbox"][onchange="enablesubmitbutton(this)"]');
           if(confirmCheck) confirmCheck.checked = false;
       }
       else if(Number(tax) < (Number(prevpaid) + Number(currentpay)) ) {
          amount.value = '';
          document.getElementById("payalert").innerHTML = "Total paid amount cannot exceed Tax amount. ";
          document.getElementById(id).value = tax - prevpaid;
          return;
       }
       
       let balance = tax - prevpaid - currentpay;
       document.getElementById(id).value = balance;
       }
    }  

/*     let paymentform = document.forms["paymentform"];
    let paymentdetail = document.getElementById("paymentform");

    paymentdetail.addEventListener("submit",(e)=>{
        if(!saveBill()){
        e.preventDefault();
        }
    });

    function saveBill(){
     let memberid = paymentform['memberid'] ? paymentform['memberid'].value : '';
     let name = paymentform['membername'] ? paymentform['membername'].value : '';
     let paymenttype = paymentform['paymenttype'] ? paymentform['paymenttype'].value : '';
     let bankname = paymentform['bankname'] ?  paymentform['bankname'].value : '';
     let transactionid = paymentform['transactionid'] ? paymentform['transactionid'].value : '';
     let banknameforcheckque = paymentform['banknameforcheckque'] ? paymentform['banknameforcheckque'].value : '';
     let checkqueno = paymentform['checkqueno'] ? paymentform['checkqueno'].value : '';
     let utrno = paymentform['utrno'] ? paymentform['utrno'].value : '';
     let cashtype = paymentform['cashtype'] ? paymentform['cashtype'].value : '';
     let balanceamount = paymentform['balanceamount'] ? paymentform['balanceamount'].value : '';
     let paymentdate = paymentform['paymentdate'] ? paymentform['paymentdate'].value : '';
     let wheretopay = paymentform['where'] ? paymentform['where'].value : '';

     let paymentdata = {memberid,name,paymenttype,bankname,transactionid,banknameforcheckque,checkqueno,utrno,cashtype,balanceamount,paymentdate,wheretopay}
     console.log(paymentdata)
     $.ajax({
      type:"post",
      url:"payments/save-tax-receipt",
      data:paymentdata,
      success:(result)=>{
           document.getElementById("taxamount").innerHTML = result;
           console.log(result)
      },
      error:(error)=>{
           document.getElementById("taxamount").innerHTML = error;
      }})
    }
   */

    $(document).ready(function() {
        <?php if(isset($preselected_eventid) && isset($preselected_year)): ?>
            let yearSelect = document.getElementById('eventnames');
            let memberid = "<?= $memberdetail->Familymembershipid ?>";
            let preselectedEventId = "<?= $preselected_eventid ?>";
            
            // Trigger getEvents manually
            if(yearSelect.value != "") {
                $.ajax({
                    type:"get",
                    url:"payments/get-events-list",
                    data:{"year":yearSelect.value, "memberid":memberid},
                    success:(result)=>{
                        document.getElementById("showevents").innerHTML = result;
                        
                        // Now select the event in the newly loaded dropdown
                        let eventSelect = document.querySelector('select[name="eventid"]');
                        if(eventSelect) {
                            eventSelect.value = preselectedEventId;
                            // Trigger getTaxamount
                            getTaxamount(eventSelect, memberid);
                        }
                    }
                });
            }
        <?php endif; ?>
    });

  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>




