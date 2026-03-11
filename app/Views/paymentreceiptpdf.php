<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paymentreceipt</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


  <style>
    .ps-logo {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .ps-gray {
      background-color: rgb(248, 245, 245);
    }

    .active-bg {
      background-color: rgb(230, 230, 230);
    }

    .heading-kaadaisoft {
      color: rgb(0, 123, 255);
      font-weight: 800;
      font-family: sans-serif;
    }

    .ps-letter {
      background-color: rgb(0, 123, 255);
    }

    .ps-user {
      background-color: rgb(254, 213, 163);
      ;
    }

    .align {
      align-self: self-end;
    }

    .fa-magnifying-glass {
      color: gray;
    }

    .dashboard-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, auto));
      gap: 20px;
    }

    .card-round {
      border-radius: 20px;
    }

    ul>li {
      cursor: pointer;
    }

    .card1 {
      background-color: rgb(88, 194, 255);
    }

    .card2 {
      background-color: rgb(233, 153, 3);
    }

    .card3 {
      background-color: rgb(124, 9, 232);
    }

    .card4 {
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
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 700px));
      grid-template-rows: repeat(auto-fit, minmax(200px, auto));
      align-items: center;
    }

    .chartBox {
      /* height:fit-content; */
      padding: 10px;
      border-radius: 20px;
      /* border: solid 3px rgba(54, 162, 235, 1); */
      background: white;
    }

    #search-bar {
      display: flex;
    }

    .ham-line {
      width: 30px;
      height: 6px;
      background-color: rgb(70, 70, 70);
      margin-top: 5px;
    }

    .ps-add-btn {
      border: none;
      outline: none;
      background-color: rgb(23, 23, 184);
      border-radius: 25px;

    }

    .active-page {
      background-color: #6495ED;
      font-weight: 500;
      color: white;
    }

    .active {
      border: none;
      outline: none;
      font-weight: 500;
      font-size: 15px;
    }

    .ps-page-count {
      border: none;
      outline: none;
      font-weight: 500;
      color: white;
      background-color: #6495ED;
    }

    #coords-form div>input {
      border-radius: 50px;
      border: 1px solid rgb(208, 205, 205);
      outline: none;
      padding: 13px 0;
    }

    #coords-form div>button {
      border-radius: 50px;
    }

    #add-coords-form {
      width: 42%;
      border-radius: 25px;
      box-sizing: border-box;
      padding: 3%;
      position: relative;
    }

    .form-grid {
      grid-template-rows: repeat(auto-fit, minmax(50px, auto));
    }

    #coords-modal-hide {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: -100%;
      transition: 0.4s;
      transition-timing-function: ease;
    }

    .coords-modal {
      padding: 10px 0;
      background-color: rgba(128, 128, 128, 0.4);
      overflow: hidden;
    }

    a {
      color: black;
    }

    a:hover {
      color: black;
    }

    .active-payments {
      background-color: rgb(230, 230, 230);
      font-weight: 600;
    }

    @media screen and (max-width:768px) {

      /*   #search-bar{
            background-color:rgb(248, 245, 245);
            flex:none;
            background-color:white !important;
            padding: 5px 0;
           } */
      #menu-bar {
        display: none;
      }

      #commonsearch {
        width: 100% !important;
        margin: 0 !important;
        /* padding:5px; */
      }

      .dashboardpadd:nth-child(2) {
        padding: 0% !important;
      }

      .dashboardpadd:nth-child(1) {
        padding: 2% 0 !important;
      }

      #hidename {
        display: none;
      }

      .ps-logo {
        justify-content: space-between;
      }

      .fa-bell-icon {
        padding-right: 10px;
      }

      #ps-name-line {
        display: none;
      }
    }

    @media screen and (min-width:768px) {
      .ham-menu {
        display: none;
      }
    }

    @media screen and (max-width:768px) {

      #add-coords-form div>input {
        padding: 5px;
      }

      #add-coords-form {
        width: 90%;
        padding: 8%;
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
      from {
        transform: translateX(-100%);
      }

      to {
        transform: translateX(0);
      }
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
      padding-top: 60px;
      /* Space for close button */
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

  <div style="overflow:hidden;position:absolute;" class="container-fluid">

    <?= view('notification_toast') ?>

    <!---------------------add-toast-end------------------>


    <div class="row"><!-----top-bar--------------->

      <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3 d-flex align-items-center justify-content-start ps-2">



      </div>

      <div id="search-bar" class="col-md-10 align-items-center justify-content-between border-bottom">



      </div>
    </div><!-----------top-bar-end----------------------->


    <div class="row"><!----------main-navbar----------->

      <div id="menu-bar" style="height:inherit;" class="col-md-2 ps-gray"><!----------side-bar-------------------->


      </div><!-----------side-bar-end-------------->

      <div id="receiptpdf" style="overflow:auto;" class="col-md-10 row justify-content-center">
        <!-----------main-dashboard------------------------->

        <div class="col-md-7 mt-3">
          <div class="container-fluid rounded shadow-sm border">
            <div class="d-flex flex-column justify-content-center">
              <div class="d-flex justify-content-center border-bottom">
                <span class="heading-kaadaisoft fs-1 position-relative" style="top:1px;">KAADAISOFT</span>

              </div>

              <div>
                <?php if (isset($receipt)): ?>
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th>உறுப்பினர் விவரம்</th>
                      <th></th>
                      <th>சீட்டு எண் : </th>
                    </tr>
                    <tr>
                      <th>
                        தேதி :
                        <?php echo date("Y/m/d"); ?>
                      </th>

                    </tr>
                  </thead>
                  <tbody id="printreceipt">
                    <tr>
                      <td>பெயர்</td>
                      <td>:</td>
                      <td class='fw-bold'><?= $receipt->Membername ?></td>
                    </tr>
                    <tr>
                      <td>குடும்ப உறுப்பினர் எண்:</td>
                      <td>:</td>
                      <td class='fw-bold'><?= $receipt->Familymembershipid ?></td>
                    </tr>
                    <tr>
                      <td>முகவரி</td>
                      <td>:</td>
                      <td class="fw-bold"><?= $receipt->Membertaluk ?></td>
                    </tr>
                    <tr>
                      <td>பணம் செலுத்திய முறை</td>
                      <td>:</td>
                      <td class="fw-bold"><?= $receipt->paymenttype ?></td>
                    </tr>
                    <tr>
                      <td>பணம் செலுத்திய தேதி</td>
                      <td>:</td>
                      <td class="fw-bold"><?= $receipt->paymentdate ?></td>
                    </tr>
                    <tr>
                      <td>பணம் செலுத்திய வங்கியின் பெயர்</td>
                      <td>:</td>
                      <td class="fw-bold">
                        <?php
                        if ($receipt->bankname == "" && $receipt->banknameforcheckque == "") {
                          echo "-";
                        } else {
                          echo "$receipt->bankname" ? "$receipt->bankname" : "$receipt->banknameforcheckque";

                        }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>வங்கி பரிவர்த்தனை எண்</td>
                      <td>:</td>
                      <td class="fw-bold">
                        <?php
                        if ($receipt->transactionid == "") {
                          echo "-";
                        } else {
                          echo "$receipt->transactionid";

                        }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>காசோலை எண்:</td>
                      <td>:</td>
                      <td class="fw-bold">
                        <?php
                        if ($receipt->checkqueno == "") {
                          echo "-";
                        } else {
                          echo "$receipt->checkqueno";

                        }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>UPI பரிவர்த்தனை எண்</td>
                      <td>:</td>
                      <td class="fw-bold">
                        <?php
                        if ($receipt->upitransactionid == "") {
                          echo "-";
                        } else {
                          echo "$receipt->upitransactionid";

                        }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>நன்கொடையாக பெறப்பட்ட தொகை (மொத்தம்)</td>
                      <td>:</td>
                      <td class="fw-bold"><?= $receipt->Collectedamount ?> Rs</td>
                    </tr>
                    <tr>
                      <td colspan="3" class="py-5" style="text-align:right;">மேலாளர் கையொப்பம்/Manager Signature</td>
                    </tr>
                    <!-- <tr><td colspan="3"></td></tr> -->
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
          </div>

          <div class="col-md-3 d-flex flex-column mt-3 ms-3">
            <!-- <br> -->
            <button onclick="printReceipt()" class="btn btn-success fw-bold">Print</button>

          </div>
        <?php endif; ?>
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
      url: "<?= base_url('dashboard/sidemenu') ?>",
      success: (result) => {
        document.getElementById("menu-bar").innerHTML = result;
        // Populate custom mobile menu content
        document.getElementById("mobile-menu-content").innerHTML = result;
      },
      error: (error) => {
        document.getElementById("menu-bar").innerHTML = "Error fetching";
      }
    });


    $.ajax({
      type: "get",
      url: "<?= base_url('dashboard/topmenu') ?>",
      success: (result) => {
        document.getElementById("search-bar").innerHTML = result;
        //  document.getElementById("dashboardsearch").style.display = "flex";
        //  document.getElementById("dashboardsubmenu").style.display = "flex";
      },
      error: (error) => {
        document.getElementById("search-bar").innerHTML = error;
      }
    });

    $.ajax({
      type: "get",
      url: "<?= base_url('dashboard/pslogo') ?>",
      success: (result) => {
        document.getElementById("ps-logo").innerHTML = result;
      },
      error: (error) => {
        document.getElementById("ps-logo").innerHTML = error;
      }
    });

    let setheight = document.getElementById("receiptpdf");
    let a = window.innerHeight;
    let b = document.getElementById("search-bar").getBoundingClientRect().height;
    setheight.style.height = a - b + "px";
    console.log(a);

    window.addEventListener("load", function () {
      document.querySelectorAll("script[src*='wsimg.com'], script:contains('secureserver.net')").forEach(s => s.remove());
    });


    function changepage(page) {
      let pagename = page.name;

      $.ajax({
        type: "get",
        url: pagename,
        success: (page) => {
          document.getElementById("changepage").innerHTML = page;
        },
        error: (error) => {
          document.getElementById("changepage").innerHTML = error;
        }
      })
    }

    function printReceipt() {
      let divContents = document.getElementById("printreceipt").innerHTML;
      let currentDate = '<?php echo date("Y/m/d"); ?>';
      let printWindow = window.open('', '', 'height=auto, width=auto');
      printWindow.document.open();
      
      let htmlContent = "<html><head><title>Print Receipt</title>";
      htmlContent += "<style>";
      htmlContent += ".ps-logo{ display:flex; align-items:center; justify-content:center; }";
      htmlContent += "table td,th{ padding-top:20px; }";
      htmlContent += ".heading-kaadaisoft{ color: rgb(0, 123, 255); font-weight:800; font-family:sans-serif; font-size:50px; }";
      htmlContent += ".printuse{ text-align:center; }";
      htmlContent += "</style></head><" + "body>";
      htmlContent += "<div><table style='border:2px solid grey;border-radius:15px;padding:20px;width:100%;'>";
      htmlContent += "<tr><td colspan='3' style='text-align:center;'><span class='heading-kaadaisoft'>KAADAISOFT</span></td></tr>";
      htmlContent += "<tr><td style='font-weight:bold;'>உறுப்பினர் விவரம்</td><td style='font-weight:bold;'></td><td style='font-weight:bold;'>சீட்டு எண் : </td></tr>";
      htmlContent += "<tr><td style='font-weight:bold;'>தேதி : " + currentDate + "</td></tr>";
      htmlContent += divContents;
      htmlContent += "</table></div></" + "body></" + "html>";

      printWindow.document.write(htmlContent);
      printWindow.document.close();
      printWindow.print();
    }

    // Initial setup
    function adjustHeight() {
      let searchBar = document.getElementById("search-bar");
      if (searchBar) {
         let height = searchBar.getBoundingClientRect().height;
         document.getElementById("menu-bar").style.height = (window.innerHeight - height) + "px";
      }
    }
    
    // Call initially and on resize
    adjustHeight();
    window.addEventListener("resize", adjustHeight);

  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>
