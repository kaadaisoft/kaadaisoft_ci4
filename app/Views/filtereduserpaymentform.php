<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paymentform</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

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
      td{
        font-size:18px;
        font-weight:500;
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
        <form method="POST" autocomplete="off" action="<?=base_url("payments/save-tax-receipt")?>" id="paymentform" name="paymentform" class="bg-white container-fluid border-0 shadow py-4 px-4 rounded-3 d-flex flex-column">

            <div class="text-center mb-4 pb-3 border-bottom">
                <h3 class='ps-logo-text fw-bold'><i class="fas fa-file-invoice-dollar me-2"></i> Payment Details</h3>
            </div>
            
            <input id="path" name="path" hidden type="text" readonly value="filtereduserform">
            <input id="memberid" name="memberid" hidden type="text" readonly value="<?=$memberdetail->Familymembershipid?>">
            <input id="membername" name="membername" hidden type="text" readonly value="<?=$memberdetail->Name?>">
            <input name="membertaluk" hidden type="text" readonly value="<?=$memberdetail->Taluk?>">
            <input name="membermobile" hidden type="text" readonly value="<?=$memberdetail->Phonenumber?>">

        <div class="row g-4 mb-4"><!--------------row-start--------------->
        <div class="col-md-4"><!--------------col-1------------------------>
            <div class="card h-100 border-0 shadow-sm bg-light">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3 border-bottom pb-2"><i class="fas fa-user-circle me-2"></i>Member Info</h5>
                    <table class="table table-borderless table-sm mb-0">
                     <tr>
                        <th class="text-muted w-25"><label>Name:</label></th>
                        <td class="fw-bold text-dark"><?=$memberdetail->Name?></td>
                     </tr>
                     <tr>
                        <th class="text-muted"><label>ID:</label></th>
                        <td class="fw-bold text-primary"><?=$memberdetail->Familymembershipid?></td>
                     </tr>
                     <tr>
                        <th class="text-muted align-top"><label>Address:</label></th>
                        <td class="text-secondary small">
                            <address class="mb-0 lh-sm">
                             <i class="fas fa-phone-alt me-1 text-muted"></i> <?=$memberdetail->Phonenumber?><br>
                             <i class="fas fa-map-marker-alt me-1 text-muted"></i> <?=$memberdetail->Doornumber?>, <?=$memberdetail->Street?>,<br>
                             <?=$memberdetail->Village?>, <?=$memberdetail->Panchayat?>,<br>
                             <?=$memberdetail->Taluk?>, <?=$memberdetail->District?>,<br>
                             <?=$memberdetail->State?> - <?=$memberdetail->Pincode?>
                            </address>   
                        </td>
                     </tr>
                    </table>
                </div>
            </div>
        </div><!-------------col-1-end-------------------->

        <div class="col-md-4"><!----------------col-2-start--------------->
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                     <h5 class="card-title text-primary mb-3 border-bottom pb-2"><i class="fas fa-calendar-check me-2"></i>Event Info</h5>
                     
                     <div class="mb-3">
                         <label class="form-label fw-bold small text-muted">Event Year</label>
                         <input value="<?=$eventyear?>" readonly class='form-control form-control-sm bg-light shadow-sm' name='eventyear' id='eventnames'>
                     </div>

                     <div id="showevents" class="mb-3">
                         <input value="<?=$eventid?>" hidden name="eventid" id='eventid' required>
                         <label id="eventnamelabel" class="form-label fw-bold small text-muted w-100">Event
                            <input readonly value="<?=$eventname?>" class='form-control form-control-sm bg-light shadow-sm' id='eventname' required>
                            <div id="eventsearchresult" style="visibility:hidden; max-height: 200px; overflow-y: auto; z-index: 1000;" class="position-absolute w-100 mt-1 rounded-3 border shadow bg-white">
                            </div>
                         </label>
                     </div>

                     <div class="mb-3">
                         <label class="form-label fw-bold small text-muted w-100">Pay Amount <span class="text-danger">*</span>
                             <div class="input-group input-group-sm shadow-sm">
                                 <span class="input-group-text bg-white text-muted">₹</span>
                                 <input class="form-control" type="text" id="pay" name="paidamount" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.length > 0 && this.value[0] === '0') this.value = this.value.replace(/^0+/, ''); if(this.value.length > 10) this.value = this.value.substring(0, 10);" onkeyup="calculateBalance(this,'balance')" required>
                             </div>
                             <small id="payalert" class="fw-normal text-danger d-block mt-1"></small>
                         </label>
                     </div>

                     <div class="d-flex align-items-center bg-light p-2 rounded-3 border">
                         <i class="far fa-calendar-alt text-primary me-2"></i>
                         <span class="text-muted small me-2">Date:</span>
                         <input name="paymentdate" hidden type="text" readonly value="<?php echo date("Y-m-d");?>">
                         <span class="fw-bold text-dark"><?php echo date("d M Y");?></span>
                     </div>
                </div>
            </div>
        </div><!-----------------col-2-end------------------->

        <div id="taxdetails" class="col-md-4"><!-----------------col-3-start------------------->
            <div class="card h-100 border-0 shadow-sm bg-light">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3 border-bottom pb-2"><i class="fas fa-rupee-sign me-2"></i>Summary</h5>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Tax Amount</label>
                        <div class="input-group input-group-sm shadow-sm">
                            <span class="input-group-text bg-white text-muted">₹</span>
                            <input value="<?=$taxamount?>" id="taxamount" readonly class="form-control bg-white">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Already Paid</label>
                        <div class="input-group input-group-sm shadow-sm">
                            <span class="input-group-text bg-white text-success">₹</span>
                            <input value="<?=$paidamount?>" id="prevpaid" name="prevpaid" readonly class="form-control bg-white text-success fw-bold" type="text">
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label fw-bold small text-muted">Balance Amount</label>
                        <div class="input-group input-group-sm shadow-sm">
                            <span class="input-group-text bg-white text-danger">₹</span>
                            <input value="<?=$balanceamount?>" id="balance" name="balanceamount" readonly class="form-control bg-white text-danger fw-bold" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-----------------col-3-end------------------->

        </div><!-------------row-end---------------------->
       
        <div class="card border-0 shadow-sm mb-4"><!------------payment-type------------>
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                <h5 class="text-primary fw-bold mb-0"><i class="fas fa-wallet me-2"></i>Payment Method</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="d-flex flex-wrap gap-3 p-3 bg-light rounded-3 border">
                            <div class="form-check form-check-inline me-4">
                                <input class="form-check-input" type="radio" name="paymenttype" id="payBank" value="bank" onclick="getPaymentmethod(this)" required>
                                <label class="form-check-label fw-bold" style="cursor:pointer;" for="payBank"><i class="fas fa-university text-primary me-1"></i> Bank</label>
                            </div>
                            <div class="form-check form-check-inline me-4">
                                <input class="form-check-input" type="radio" name="paymenttype" id="payCheque" value="checkque" onclick="getPaymentmethod(this)" required>
                                <label class="form-check-label fw-bold" style="cursor:pointer;" for="payCheque"><i class="fas fa-money-check text-info me-1"></i> Cheque</label>
                            </div>
                            <div class="form-check form-check-inline me-4">
                                <input class="form-check-input" type="radio" name="paymenttype" id="payUpi" value="upi" onclick="getPaymentmethod(this)" required>
                                <label class="form-check-label fw-bold" style="cursor:pointer;" for="payUpi"><i class="fas fa-qrcode text-success me-1"></i> UPI</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="paymenttype" id="payCash" value="cash" onclick="getPaymentmethod(this)" required>
                                <label class="form-check-label fw-bold" style="cursor:pointer;" for="payCash"><i class="fas fa-money-bill-wave text-success me-1"></i> Cash</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="getpaymentdetail" class="mt-3">
                    <!-- Payment method specific details will load here -->
                </div>
                
            </div>
        </div><!------------payment-type------------>  

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-7 mb-3 mb-md-0">
                        <label class="form-label fw-bold text-dark" for="receivedby"><i class="fas fa-user-check me-2 text-primary"></i><span id="receivedby_label">Person Received the Money</span> <span class="text-danger">*</span></label>
                        <input type="text" name="receivedby" id="receivedby" class="form-control form-control-lg border rounded-3 shadow-sm bg-light" placeholder="Enter name of receiver" required>
                    </div>
                    <div class="col-md-5 d-flex align-items-center justify-content-md-end">
                        <div class="form-check mt-md-4">
                            <input class="form-check-input shadow-sm" style="width: 1.5rem; height: 1.5rem;" type="checkbox" id="checkpaymentdetails" onchange="enablesubmitbutton(this)">
                            <label class="form-check-label ms-2 pt-1 fw-bold text-success" style="cursor:pointer;" for="checkpaymentdetails">
                                Confirm Details
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <button id="savereceipt" name="savereceipt" type="submit" disabled class="btn btn-primary btn-lg px-5 py-2 rounded-pill shadow fw-bold w-100" style="opacity:0.6; max-width: 300px; transition: opacity 0.3s;"><i class="fas fa-check-circle me-2"></i> Save Receipt</button>
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
    "IDFC First Bank",
    "Equitas Small Finance Bank",
    "AU Small Finance Bank",
    "Ujjivan Small Finance Bank",
    "Bandhan Bank",
    "Other Bank"
];

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

     let eventsearchbarwidth = document.getElementById("eventnamelabel").getBoundingClientRect().width;
     let eventsearchresult = document.getElementById("eventsearchresult");
     eventsearchresult.style.width = eventsearchbarwidth+"px";
     console.log(eventsearchbarwidth);

     $(document).ready(function() {
        let balanceInput = document.getElementById("balance");
        if (balanceInput) {
            let balanceValue = balanceInput.value;
            if (Number(balanceValue) <= 0) {
                document.getElementById("pay").setAttribute("readonly", true);
                document.getElementById("payalert").innerHTML = "You already paid";
                document.getElementById("payalert").style.color = "red";
            }
        }
     });

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
        document.getElementById("menu-bar").innerHTML = "Error fetching data";
      }
    }); 


    $.ajax({
      type:"get",
      url:"dashboard/topmenu",
      success:(result)=>{
           document.getElementById("search-bar").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("search-bar").innerHTML = "Error fetching data";
      }
    }); 

    $.ajax({
      type:"get",
      url:"dashboard/pslogo",
      success:(result)=>{
           document.getElementById("ps-logo").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("ps-logo").innerHTML = "Error fetching data";
      }
    });

    let choosebank =  BankList.map((v)=>{
          return `<option value="${v}">${v}</option>`
         })

  function getPaymentmethod(data){
      let paymenttype = data.value;
      let receivedLabel = document.getElementById("receivedby_label");

      if(paymenttype == "bank"){
         if(receivedLabel) receivedLabel.innerText = "Person recorded the payment";
         document.getElementById("getpaymentdetail").innerHTML = `<div class="mb-3"><label class="form-label fw-bold small text-muted">
         Choose bank: <span class="text-danger">*</span></label>
         <select onchange="checkOtherBank(this)" class='form-select shadow-sm' name="bankname" id="banklist" required>  
         <option value="">Choose bank</option>
         ${choosebank} 
         </select>
         </div>
         <div id="other_bank_div" style="display:none;" class='mb-3'>
         <label class="form-label fw-bold small text-muted">
         Other Bank Name: <span class="text-danger">*</span></label>
         <input name='other_bank_name' id="other_bank_name" class="form-control shadow-sm" type="text">
         </div>
         <div class='mb-3'>
         <label class="form-label fw-bold small text-muted">
         Transaction Id: <span class="text-danger">*</span></label>
         <input name='transactionid' class="form-control shadow-sm" type="text" pattern="[a-zA-Z0-9]+" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')" title="Only alphanumeric characters are allowed" placeholder="Enter Transaction ID" required>
         </div>
         `;
      }
      else if(paymenttype == "checkque"){
        if(receivedLabel) receivedLabel.innerText = "Person received the cheque";
        document.getElementById("getpaymentdetail").innerHTML = `<div class="mb-3"><label class="form-label fw-bold small text-muted">
         Choose bank: <span class="text-danger">*</span></label>
         <select onchange="checkOtherBank(this)" class='form-select shadow-sm' name="banknameforcheckque" id="banklist" required>  
         <option value="">Choose bank</option>
         ${choosebank} 
         </select>
         </div>
         <div id="other_bank_div" style="display:none;" class='mb-3'>
         <label class="form-label fw-bold small text-muted">
         Other Bank Name: <span class="text-danger">*</span></label>
         <input name='other_bank_name' id="other_bank_name" class="form-control shadow-sm" type="text">
         </div>
         <div class='mb-3'>
         <label class="form-label fw-bold small text-muted"> 
         Cheque No: <span class="text-danger">*</span></label>
         <input name='checkqueno' class="form-control shadow-sm" type="text" pattern="[a-zA-Z0-9]+" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')" title="Only alphanumeric characters are allowed" placeholder="Enter Cheque Number" required>
         </div>`;
      }
      else if(paymenttype == "upi") {
        if(receivedLabel) receivedLabel.innerText = "Person recorded the transaction after payment is confirmed";
        document.getElementById("getpaymentdetail").innerHTML = `
        <div class="d-flex flex-column align-items-center mb-3">
         <div class="qr-poster-container text-center mb-4">
             <img class="img-fluid p-2 border rounded shadow-sm bg-white" style="max-width:320px; height:auto; transition: transform 0.3s ease-in-out;" src="<?= base_url('assets/otherdocuments/qrscan.jpeg') ?>" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
             <div class="mt-3">
                 <small class="text-muted d-block mb-1">UPI ID:</small>
                 <strong class="text-primary fs-5">KADAIKULANARPANIMANDRAM@iob</strong>
             </div>
         </div>
         <label class="w-100 text-center">
             <span class="d-block mb-2 fw-bold text-dark">Enter Transaction Id:</span>
             <input name='upitransactionid' class="form-control border rounded-pill py-2 px-4 shadow-sm mx-auto" style="max-width:300px;" type="text" placeholder="TXN12345678" pattern="[a-zA-Z0-9]+" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')" title="Only alphanumeric characters are allowed" required>
         </label>
        </div>`;
      }
      else if(paymenttype == "cash"){
        if(receivedLabel) receivedLabel.innerText = "Person Received the Money";
        document.getElementById("getpaymentdetail").innerHTML = `
        <div class="mb-3">
         <label class="form-label fw-bold small text-muted">
         Where to pay: <span class="text-danger">*</span></label>
         <select name='where' class="form-select shadow-sm" required>
            <option value=''>Choose Where</option>
            <option value='InHome'>InHome</option>
            <option value='InTemple'>InTemple</option>
            <option value='coordinator'>Coordinator</option>
            <option value='manager'>Manager</option>
         </select>
         </div>`;
      }
      }

    window.onclick = (event)=>{
      if(event.target !== document.getElementById("eventname")){
        document.getElementById("eventsearchresult").style.visibility = "hidden";
      }
    }

    function checkOtherBank(select) {
        let otherBankDiv = document.getElementById("other_bank_div");
        let otherBankInput = document.getElementById("other_bank_name");
        if(select.value == "Other Bank") {
            otherBankDiv.style.display = "block";
            otherBankInput.setAttribute("required", "required");
        } else {
            if(otherBankDiv) otherBankDiv.style.display = "none";
            if(otherBankInput) {
                otherBankInput.removeAttribute("required");
                otherBankInput.value = "";
            }
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

    function getEvents(years,userid){
      let year = years.value;
      if(year == ""){
        document.getElementById("showevents").innerHTML = `<label id='eventnamelabel' class='container-fluid' for='eventsr'>Choose events: <br><input onkeyup='searchEvents(this)' onblur='hideSearchresults()' class='container-fluid border rounded' name='eventid' id='eventname' required><div id='eventsearchresult' style='visibility:hidden;overflow-x:auto;position:absolute;width:${eventsearchbarwidth}px;box-sizing:border-box;' class='d-flex flex-column ps-3 py-1 mt-2 rounded-3 border-2 shadow-sm bg-white'></div></label>`;
      }
      else{
      $.ajax({
      type:"get",
      url:"payments/get-events-list",
      data:{"year":year,"userid":userid},
      success:(result)=>{
           document.getElementById("showevents").innerHTML = result;
           console.log(result)
      },
      error:(error)=>{
           document.getElementById("showevents").innerHTML = error;
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
          //  console.log(error)
        }
        });

    }

    function assignEvent(eventid,eventname){
         console.log(eventid)
         let searchbar = document.getElementById("eventname");
         let setid = document.getElementById("eventid");
         let memberid = document.getElementById("memberid").value;
         searchbar.value = eventname;
         setid.value = eventid;
         getTaxamountbysearch(eventid,memberid)
    }

    function getTaxamount(event,memberid){
       let SNo = event.value;
       console.log(event.value,memberid);
       // Clear previous pay value and alerts
       document.getElementById("pay").value = "";
       document.getElementById("payalert").innerHTML = "";

      $.ajax({
      type:"get",
      url:"payments/getTaxamount",
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
           document.getElementById("taxdetails").innerHTML = "Error fetching data";
      }
    }); 
    }
    
    function getTaxamountbysearch(event,memberid){
       let SNo = event;
       console.log(event.value,memberid);
       // Clear previous pay value and alerts
       document.getElementById("pay").value = "";
       document.getElementById("payalert").innerHTML = "";

      $.ajax({
      type:"get",
      url:"payments/getTaxamount",
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
           document.getElementById("taxdetails").innerHTML = "Error fetching data";
      }
    }); 
    }

    function calculateBalance(amount,id){
       let currentpay = amount.value;
       
       if(currentpay.length === 0){
           document.getElementById("payalert").innerHTML = "";
           let taxAmountField = document.getElementById("taxamount");
           let prevPaidField = document.getElementById("prevpaid");
           if(taxAmountField && prevPaidField) {
               document.getElementById(id).value = Number(taxAmountField.value) - Number(prevPaidField.value);
           }
           return;
       }
       
       document.getElementById("payalert").innerHTML = "";
       let taxamount_el = document.getElementById("taxamount");
       let prevpaid_el = document.getElementById("prevpaid");
       
       if(!taxamount_el || !prevpaid_el) return;
       
       let tax = taxamount_el.value;
       let prevpaid = prevpaid_el.value;
       
       if(Number(tax) < (Number(prevpaid) + Number(currentpay)) ) {
          amount.value = '';
          document.getElementById("payalert").innerHTML = "Total paid amount cannot exceed Tax amount. ";
          document.getElementById(id).value = tax - prevpaid;
          return;
       }
       
       let balance = tax - prevpaid - currentpay;
       document.getElementById(id).value = balance;
    }  
  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>




