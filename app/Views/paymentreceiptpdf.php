<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paymentreceipt</title>
  <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


  <style>
    /* Fixed Premium Layout */
    html, body { height: 100%; margin: 0; font-family: 'Outfit', sans-serif; background-color: #f1f5f9; }
    .layout-container { display: flex; flex-direction: column; height: 100vh; width: 100%; }
    .top-navbar-row { height: 75px; flex-shrink: 0; z-index: 1050; background: #0f172a; display: flex; align-items: center; margin: 0 !important; border-bottom: 1px solid #1e293b; }
    .main-body-row { flex: 1; display: flex; overflow: hidden; margin: 0 !important; }
    #menu-bar { width: 260px; height: 100%; overflow-y: auto; flex-shrink: 0; background-color: #0f172a !important; border-right: 1px solid #1e293b; padding: 0; }
    .main-content-area { flex: 1; overflow-y: auto; background-color: #f1f5f9; padding-bottom: 80px; }

    /* Receipt Slip Styles */
    .receipt-slip {
      width: 420px;
      margin: 40px auto;
      background: #ffffff;
      padding: 30px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      border-radius: 12px;
      border: 1px solid #e2e8f0;
      position: relative;
    }

    .receipt-header {
      text-align: center;
      border-bottom: 2px dashed #e2e8f0;
      padding-bottom: 20px;
      margin-bottom: 20px;
    }

    .receipt-logo {
      width: 60px;
      height: 60px;
      margin-bottom: 10px;
    }

    .receipt-brand {
      font-size: 1.4rem;
      font-weight: 800;
      color: #2563eb;
      margin-bottom: 5px;
      display: block;
    }

    .receipt-title {
      font-size: 1rem;
      font-weight: 600;
      color: #64748b;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .receipt-meta {
      display: flex;
      justify-content: space-between;
      font-size: 0.85rem;
      color: #64748b;
      margin-bottom: 20px;
      font-weight: 500;
      background: #f8fafc;
      padding: 8px 12px;
      border-radius: 6px;
    }

    .receipt-table {
      width: 100%;
      border-collapse: collapse;
    }

    .receipt-table tr {
      border-bottom: 1px solid #f1f5f9;
    }

    .receipt-table tr:last-child {
      border-bottom: none;
    }

    .receipt-table td {
      padding: 12px 0;
      vertical-align: top;
      font-size: 0.95rem;
    }

    .receipt-label {
      color: #64748b;
      font-weight: 500;
      width: 45%;
      padding-right: 10px !important;
    }

    .receipt-value {
      color: #0f172a;
      font-weight: 700;
      text-align: right;
    }

    .receipt-total-row {
      border-top: 2px dashed #e2e8f0 !important;
      border-bottom: 2px dashed #e2e8f0 !important;
      margin-top: 10px;
      background: #f8fafc;
    }

    .receipt-total-label {
      font-size: 1rem;
      font-weight: 800;
      color: #2563eb;
    }

    .receipt-total-value {
      font-size: 1.1rem;
      font-weight: 800;
      color: #2563eb;
    }

    .receipt-footer {
      margin-top: 40px;
      text-align: right;
    }

    .signature-box {
      display: inline-block;
      text-align: center;
      min-width: 150px;
    }

    .signature-line {
      border-top: 1px solid #0f172a;
      margin-top: 40px;
      padding-top: 5px;
      font-size: 0.8rem;
      font-weight: 600;
      color: #64748b;
    }

    /* Print Styles moved to receipt_fragment.php */



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

      <div id="receiptpdf" class="main-content-area">
        <!-----------main-dashboard------------------------->

        <?php if (isset($receipt)): ?>
          <div class="receipt-slip shadow-sm">
            <?= view('receipt_fragment', ['receipt' => $receipt]) ?>
            
            <!-- Float Print Button -->
            <div class="text-center mt-3 no-print border-top pt-3">
              <button onclick="window.print()" class="btn btn-lg btn-success shadow-sm px-5 fw-bold" style="border-radius: 50px;">
                <i class="fas fa-print me-2"></i> Print Receipt
              </button>
            </div>
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

    // Highlight active sidebar menu item after AJAX load
    function highlightActiveMenu() {
      const pathSegments = window.location.pathname.split('/').filter(s => s !== '');
      document.querySelectorAll('#menu-bar [data-page], #mobile-menu-content [data-page]').forEach(function(link) {
        link.classList.remove('active-menu-item');
        const linkPage = link.getAttribute('data-page');
        
        let isMatch = pathSegments.some(seg => seg === linkPage);
        if ((linkPage === 'paymentpage' || linkPage === 'payment-receipt-list') && pathSegments.includes('paymentreceiptpdf')) {
            isMatch = true;
        }
        
        if (isMatch || (pathSegments.length === 0 && linkPage === 'admindashboard')) {
          link.classList.add('active-menu-item');
        }
      });
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
      url: "<?= base_url('dashboard/sidemenu') ?>",
      success: (result) => {
        document.getElementById("menu-bar").innerHTML = result;
        // Populate custom mobile menu content
        document.getElementById("mobile-menu-content").innerHTML = result;
        highlightActiveMenu();
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
      // Handled by window.print() via @media print CSS
      window.print();
    }


  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>
