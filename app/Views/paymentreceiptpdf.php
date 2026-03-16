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
    /* Fixed Premium Layout */
    html, body { height: 100%; margin: 0; overflow: hidden; }
    .layout-container { display: flex; flex-direction: column; height: 100vh; width: 100%; }
    .top-navbar-row { height: 75px; flex-shrink: 0; z-index: 1050; background: #0f172a; display: flex; align-items: center; margin: 0 !important; border-bottom: 1px solid #1e293b; }
    .main-body-row { flex: 1; display: flex; overflow: hidden; margin: 0 !important; }
    #menu-bar { width: 260px; height: 100%; overflow-y: auto; flex-shrink: 0; background-color: #0f172a !important; border-right: 1px solid #1e293b; padding: 0; }
    .main-content-area { flex: 1; overflow-y: auto; background-color: #f8fafc; padding-bottom: 50px; }

    @media screen and (max-width: 768px) {
      .top-navbar-row { 
        height: auto; 
        flex-wrap: wrap; 
        padding: 5px 0 !important;
        position: fixed;
        top: 0;
        width: 100%;
      }
      #ps-logo {
        padding-top: 5px !important;
        padding-bottom: 5px !important;
        width: 100% !important;
        background: #0f172a !important;
      }
      #search-bar {
        padding-left: 5px !important;
        padding-right: 5px !important;
        width: 100% !important;
        background: #0f172a !important;
      }
      .main-body-row { 
        margin-top: 200px !important; /* Adjust for stacked logo and search bar on mobile */
        flex-direction: column; 
        overflow: auto; 
      }
      #menu-bar { display: none; }
      .main-content-area { width: 100%; overflow: visible; }
      html, body { overflow: auto; height: auto; }
      .layout-container { height: auto; }
    }

    .ps-logo {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      padding-left: 20px;
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
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 700px));
      grid-template-rows: repeat(auto-fit, minmax(200px, auto));
      align-items: center;
    }

    .chartBox {
      padding: 10px;
      border-radius: 20px;
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


    /* Custom Mobile Menu Styles */
    #custom-mobile-menu {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      background-color: #0f172a;
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
      color: #cbd5e1;
    }

    #mobile-menu-content {
      padding-top: 60px;
    }
  </style>
</head>

<body>

  <div class="layout-container">

    <?= view('notification_toast') ?>

    <div class="top-navbar-row"><!-----top-bar--------------->
      <div id="ps-logo" class="col-md-3 d-flex align-items-center justify-content-start ps-2"></div>
      <div id="search-bar" class="col-md-9 d-flex align-items-center justify-content-between px-3"></div>
    </div><!-----------top-bar-end----------------------->


    <div class="main-body-row"><!----------main-navbar----------->
      <div id="menu-bar"></div><!-----------side-bar-end-------------->

      <div id="receiptpdf" class="main-content-area row justify-content-center">
        <!-----------main-dashboard------------------------->

        <div class="col-md-7 mt-3">
          <div class="container-fluid rounded shadow-sm border">
            <div class="d-flex flex-column justify-content-center">
              <div class="d-flex flex-column align-items-center border-bottom pb-2">
                <span class="heading-kaadaisoft fs-2">Poondurai Kadai Kulam</span>
                <span class="text-secondary fw-bold fs-5">Receipt</span>
              </div>

              <div>
                <?php if (isset($receipt)): ?>
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th>உறுப்பினர் விவரம்</th>
                      <th></th>
                      <th>சீட்டு எண் : <?= $receipt->id ?></th>
                    </tr>
                    <tr>
                      <th>
                        தேதி : <?= $receipt->paymentdate ?>
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
                      <td>குடும்ப உறுப்பினர் எண்</td>
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
                        $display_bank = "";
                        if ($receipt->bankname != "") {
                            $display_bank = $receipt->bankname;
                        } elseif ($receipt->banknameforcheckque != "") {
                            $display_bank = $receipt->banknameforcheckque;
                        }

                        if ($display_bank == "") {
                          echo "-";
                        } else {
                          echo $display_bank;
                          if ($display_bank == "Other Bank" && !empty($receipt->other_bank_name)) {
                              echo " (" . $receipt->other_bank_name . ")";
                          }
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
                      <td>இந்த பற்றுச் சீட்டு எந்த நிகழ்ச்சிக்காக கட்டப்பட்டது</td>
                      <td>:</td>
                      <td class="fw-bold"><?= $receipt->eventname ?></td>
                    </tr>
                    <tr>
                      <td>செலுத்த வேண்டிய மொத்த தொகை</td>
                      <td>:</td>
                      <td class="fw-bold"><?= $receipt->Taxamount ?> Rs</td>
                    </tr>
                    <tr>
                      <td>தற்போது செலுத்திய தொகை</td>
                      <td>:</td>
                      <td class="fw-bold"><?= $receipt->paidamount ?> Rs</td>
                    </tr>
                    <tr>
                      <td>இதுவரை வசூலிக்கப்பட்ட தொகை</td>
                      <td>:</td>
                      <td class="fw-bold"><?= $receipt->Collectedamount ?> Rs</td>
                    </tr>
                    <tr>
                      <td>இருப்பு கட்ட வேண்டிய தொகை</td>
                      <td>:</td>
                      <td class="fw-bold"><?= $receipt->balanceamount ?> Rs</td>
                    </tr>
                    <tr>
                      <td>பணம் செலுத்தியதை உறுதி செய்தவர்</td>
                      <td>:</td>
                      <td class="fw-bold"><?= $receipt->receivedby ?></td>
                    </tr>
                     <tr>
                       <td colspan="3" class="py-5 text-muted italic" style="text-align: right;">
                         <div>மேலாளர் கையொப்பம்</div>
                         <div class="small">Manager Signature</div>
                       </td>
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

    window.addEventListener("load", function () {
      document.querySelectorAll("script[src*='wsimg.com'], script:contains('secureserver.net')").forEach(s => s.remove());
    });

    function printReceipt() {
      let divContents = document.getElementById("printreceipt").innerHTML;
      let currentDate = '<?php echo date("Y/m/d"); ?>';
      let printWindow = window.open('', '', 'height=auto, width=auto');
      printWindow.document.open();
      
      let htmlContent = "<html><head><title>Print Receipt</title>";
      htmlContent += "<style>";
      htmlContent += ".ps-logo{ display:flex; align-items:center; justify-content:center; }";
      htmlContent += "table td,th{ padding-top:10px; }";
      htmlContent += ".heading-kaadaisoft{ color: rgb(0, 123, 255); font-weight:800; font-family:sans-serif; font-size:32px; }";
      htmlContent += ".printuse{ text-align:center; }";
      htmlContent += "</style></head><" + "body>";
      htmlContent += "<div><table style='border:2px solid grey;border-radius:15px;padding:20px;width:100%;'>";
      htmlContent += "<tr><td colspan='3' style='text-align:center;'><div class='heading-kaadaisoft'>Poondurai Kadai Kulam</div><div style='font-weight:bold; font-size:18px;'>Receipt</div></td></tr>";
      htmlContent += "<tr><td style='font-weight:bold;'>உறுப்பினர் விவரம்</td><td style='font-weight:bold;'></td><td style='font-weight:bold;'>சீட்டு எண் : " + '<?= $receipt->id ?>' + "</td></tr>";
      htmlContent += "<tr><td style='font-weight:bold;'>தேதி : " + '<?= $receipt->paymentdate ?>' + "</td></tr>";
      htmlContent += divContents;
      htmlContent += "</table></div></" + "body></" + "html>";

      printWindow.document.write(htmlContent);
      printWindow.document.close();
      printWindow.print();
    }

  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>
