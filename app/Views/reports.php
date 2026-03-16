<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reports</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="public\css.css">
  <style>
    .active-reports {
      background-color: rgb(230, 230, 230);
      font-weight: 600;
    }

    .ps-user {
      background-color: rgb(254, 213, 163);
    }

    .ps-logo {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      padding-left: 20px;
    }

    .heading-kaadaisoft {
      color: rgb(0, 123, 255);
      font-weight: 800;
      font-family: sans-serif;
    }

    .ps-letter {
      background-color: rgb(0, 123, 255);
    }

    .ps-gray {
      background-color: rgb(248, 245, 245);
    }

    input:focus {
      outline: none;
      /* Removes the default focus outline */
      box-shadow: none;
      /* Removes any shadow effect */
      border-color: inherit;
      /* Ensures the border doesn't change on focus */
    }

    #search-bar {
      display: flex;
      
    }

    @media screen and (max-width:768px) {
      #search-bar {
        background-color: rgb(248, 245, 245);
        display: none;
      }

      #hidename {
        display: hide;
      }

      #menu-bar {
        display: none;
      }

      .rounded-circle {
        margin: 5px;

      }

      #arrow {
        margin: 5px;

      }
    }

    #hidename {
      display: block;
    }

    /* .ps-logo CSS moved for consistency */

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

    /* Fixed Layout Adjustments */
    .layout-container {
      display: flex;
      flex-direction: column;
      height: 100vh;
      overflow: hidden;
    }
    .top-navbar-row {
      height: auto;
      min-height: 70px;
      flex-shrink: 0;
      z-index: 1050;
      background: #0f172a;
      display: flex;
      flex-wrap: wrap;
      align-items: stretch;
      margin: 0;
    }
    .main-body-row {
      flex-grow: 1;
      display: flex;
      overflow: hidden;
      margin: 0;
    }
    #menu-bar {
      height: 100%;
      overflow-y: auto;
      flex-shrink: 0;
      background-color: rgb(248, 245, 245);
      border-right: 1px solid #e2e8f0;
      padding: 0;
    }
    .main-content-area {
      flex-grow: 1;
      overflow-y: auto;
      height: 100%;
      background-color: #f8fafc;
      padding-bottom: 50px;
    }

    @media screen and (max-width: 768px) {
      .top-navbar-row { height: auto; flex-direction: column; }
      .main-body-row { flex-direction: column; }
      #menu-bar { display: none; }
      .main-content-area { width: 100% !important; }
    }

    /* Premium Filter Card Styling */
    .filter-card-premium {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
      border: 1px solid #e2e8f0;
      padding: 24px;
      margin-top: 15px;
    }
    .filter-card-premium .form-label {
      font-size: 0.85rem;
      font-weight: 600;
      color: #475569;
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .filter-card-premium .form-select,
    .filter-card-premium .form-control {
      border-radius: 8px;
      border: 1px solid #cbd5e1;
      padding: 10px 14px;
      box-shadow: none;
      transition: all 0.2s;
      font-size: 0.95rem;
      color: #1e293b;
    }
    .filter-card-premium .form-select:focus,
    .filter-card-premium .form-control:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    .custom-radio {
      display: flex;
      align-items: center;
      gap: 6px;
      font-weight: 500;
      color: #334155;
      cursor: pointer;
      margin: 0;
      white-space: nowrap;
    }
    .btn-apply-filter {
      background: linear-gradient(135deg, #0ea5e9, #2563eb);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      padding: 10px 30px;
      box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
      transition: all 0.2s;
    }
    .btn-apply-filter:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
      color: #fff;
    }

    /* Modern Table Styling */
    .table-container {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      border: 1px solid #e2e8f0;
      overflow-x: auto;
      margin-bottom: 2rem;
    }
    .custom-table-modern {
      margin-bottom: 0;
      width: 100%;
      min-width: 900px;
      border-collapse: separate;
      border-spacing: 0;
    }
    .custom-table-modern thead th {
      background: linear-gradient(135deg, #0f172a, #1e293b);
      color: #fff;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.85rem;
      letter-spacing: 1px;
      padding: 16px;
      border: none;
      text-align: center;
    }
    .custom-table-modern tbody tr {
      transition: all 0.2s ease;
    }
    .custom-table-modern tbody tr:hover {
      background-color: #f8fafc;
      transform: scale(1.002);
      box-shadow: inset 4px 0 0 #3b82f6;
    }
    .custom-table-modern td {
      padding: 16px;
      vertical-align: middle;
      color: #334155;
      font-size: 0.95rem;
      border-bottom: 1px solid #f1f5f9;
      text-align: center;
    }

    /* Premium Pagination Styling */
    .pagination-wrapper {
      margin-top: 2rem;
      padding-bottom: 2rem;
    }
    .pagination-container {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    .pagination-btn {
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 10px;
      border: 1px solid #e2e8f0;
      background: #fff;
      color: #64748b;
      font-weight: 600;
      font-size: 0.9rem;
      transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
      cursor: pointer;
      text-decoration: none;
    }
    .pagination-btn:hover:not(.disabled):not(.active) {
      background-color: #f8fafc;
      border-color: #cbd5e1;
      color: #3b82f6;
      transform: translateY(-1px);
    }
    .pagination-btn.active {
      background: linear-gradient(135deg, #3b82f6, #2563eb);
      color: #fff;
      border: none;
      box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3);
    }
    .pagination-btn.disabled {
      opacity: 0.5;
      cursor: not-allowed;
      background: #f1f5f9;
    }
    .pagination-ellipsis {
      color: #94a3b8;
      padding: 0 4px;
    }
    .pagination-info {
      font-size: 0.9rem;
      color: #64748b;
      margin-top: 1rem;
      text-align: center;
    }
  </style>
</head>

<body>

  <div class="container-fluid layout-container p-0">

    <div class="top-navbar-row" style="flex-wrap: wrap;"><!-----top-bar--------------->

      <div id="ps-logo" class="col-12 col-md-2 border-bottom border-md-0 py-2 py-md-3 d-flex align-items-center justify-content-start ps-2" style="background: #0f172a;">
      </div>

      <div id="search-bar" class="col-12 col-md-10 d-flex align-items-center justify-content-between border-bottom border-md-0 px-3" style="background: #0f172a;">
      </div>
    </div><!-----------top-bar-end----------------------->


    <div class="main-body-row"><!----------main-navbar----------->

      <div id="menu-bar" class="col-md-2"><!----------side-bar-------------------->
      </div><!-----------side-bar-end-------------->

      <div id="reportspage" class="col-md-10 main-content-area px-4 pt-3">
        <!-----------main-dashboard------------------------->
        <div class="container-fluid">
          <br>

          <span class="text-secondary h3">Report Status Filter:
            <?php if (session()->has('validationmessage')) {
              $validationmessage = session()->get('validationmessage');
              echo "<div id='alertContainer' class='alert alert-danger alert-dismissible fade show h6 fw-normal text-danger '>$validationmessage</div>";
              session()->remove('validationmessage');
            } ?>
          </span>
          <form action="<?= base_url("reportFilterPage") ?>" method="get" autocomplete="off" id="result-form">
            <div class="row filter-card-premium"><!----------filter-start------------>

              <div id="showyear" class="col-md-3 mb-3"><!-----year-search--------->
                <label class="form-label" for="eventyear"><i class="fas fa-calendar-alt me-2 text-primary"></i>Choose Event Year</label>
                  <select onchange="getEventsbyYear(this)" class="form-select" name="eventyear" id="eventyear">
                    <option value="">Choose Year</option>
                    <option value="search">Search Event</option>
                    <?php if (isset($eventyears)):
                      foreach ($eventyears as $key => $value): ?>
                        <option <?= ($year == $value['Year'] ? 'selected' : '') ?> value="<?= $value['Year'] ?>"><?= $value['Year'] ?></option>
                    <?php endforeach; endif; ?>
                  </select>
              </div><!-----year-search--------->

              <div id="showevents" class="col-md-3 mb-3"><!----------event-search------------>
                <label id="eventnamelabel" class="form-label" for="eventid"><i class="fas fa-calendar-check me-2 text-warning"></i>Choose Events</label>
                  <select class="form-select" name="eventid" id="eventid">
                    <option value="">Choose Event</option>
                    <?php if (isset($events)):
                      foreach ($events as $key => $value): ?>
                        <option <?= ($eventname == $value['EventName'] ? 'selected' : '') ?> value="<?= $value['EventName'] ?>"><?= $value['EventName'] ?></option>
                    <?php endforeach; endif; ?>
                  </select>
              </div><!--------event-search-end--------------------------->

              <div class="col-md-6 mb-3">
                <!------------paid-filter------------>
                <label class="form-label"><i class="fas fa-money-bill-wave me-2 text-success"></i>Payment Status</label>
                <div class="border rounded px-3 py-2 bg-light d-flex flex-wrap justify-content-between align-items-center gap-2">
                  <label class="custom-radio">
                    <input onchange="setStatus(this)" type="radio" value="Paid" name="paymentstatus"> Paid Users
                  </label>
                  <label class="custom-radio">
                    <input onchange="setStatus(this)" type="radio" value="Pending" name="paymentstatus"> Unpaid Users
                  </label>
                  <label class="custom-radio">
                    <input onchange="setStatus(this)" type="radio" value="All" name="paymentstatus" checked> All Users
                  </label>
                </div>
              </div><!------------paid-filter-end----------->

              <div id="filterbutton" class="col-12 mt-2 d-flex justify-content-end">
                <!------------filter-button-start------------>
                <button type="submit" class="btn btn-apply-filter px-5"><i class="fas fa-filter me-2"></i>Apply Filter</button>
              </div><!------------filter-button-end----------->

            </div><!---------filter-end-------------->
          </form>
          <!-- report -->
          <!-- <span class="h5">Reports : </span>  -->

          <!-- <button onclick = "showreportsmodal()" class='ps-add-btn float-end text-white py-1 px-4'>Download</button> -->


          <!--report-->

          <div class="d-flex justify-content-between">
            <?php
            if (isset($newreportcounts)) {
              echo "<h6 class = 'py-2 text-secondary'>Total Members:  $newreportcounts </h6>";
            } else {
              echo "<h6 class = 'py-2 text-secondary'>Total Members: $counts </h6>";
            }
            ?>
            <a href="<?= base_url('download_excel') . (!empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '') ?>" style='height:fit-content;'
              class='btn btn-sm btn-success fw-bold float-end btn-warning' id='download' role='button'>Download</a>
          </div>

          <div id="main-reports" class="table-container mt-4"><!----------------table-------->
            <table class="table custom-table-modern text-center">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Familymembership id</th>
                  <th>User Name</th>
                  <th>Role</th>
                  <th>Phone No</th>
                  <th>Aadhar Number</th>
                  <th>Taluk</th>
                </tr>
              </thead>
              <tbody id="ps-reports">
                <?php
                if (isset($reports) && isset($sno)) {
                  $i = $sno + 1;
                  foreach ($reports as $key => $value) {
                    echo "
                    <tr>
                        <td class='fw-bold text-muted'>$i</td>
                        <td class='fw-bold text-primary'>$value[Familymembershipid]</td>
                        <td class='fw-bold text-dark'>$value[Name]</td>
                        <td><span class='badge bg-light text-dark border px-2 py-1 rounded'>$value[Role]</span></td>
                        <td>$value[Phonenumber]</td>
                        <td>$value[Aadharnumber]</td>
                        <td>$value[Taluk]</td>             
                    </tr>";
                    ++$i;
                  }
                }
                ?>
              </tbody>
              <!-- <td>
                            <a href='#' class='btn btn-sm btn-primary text-white ' role='button'>View</a>
                            </td> -->
            </table>

          </div> <!----------------table-end------->

          <div class="pagination-wrapper">
            <div id="pagination-container" class="pagination-container">
              <!-- Pagination buttons will be rendered here by JavaScript -->
            </div>
            <div id="pagination-info" class="pagination-info">
              <!-- Showing X to Y of Z entries -->
            </div>
          </div>

        </div><!-----------main-dashboard-end------------------------>

      </div>
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


  <!-----------------------Add-Coordinators-modal-------------------------------------------->

  <!-- 
<div class="modal fade" id="memberDetailsModal" tabindex="-1" aria-labelledby="memberDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="memberDetailsModalLabel">Member Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="memberName"></span></p>
                <p><strong>Aadhar Number:</strong> <span id="memberAadhar"></span></p>
                <p><strong>Phone Number:</strong> <span id="memberPhone"></span></p>
                <p><strong>Email:</strong> <span id="memberEmail"></span></p>
                <p><strong>Village:</strong> <span id="memberVillage"></span></p>
            </div>
        </div>
    </div>
</div> -->
  <!-----------------------------Add-coordinators-end-------------------------------->


  <!-------------------------------chart-end------------------------------------>


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
      url: "<?= base_url('dashboard/sidemenu'); ?>",
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
      type: "get",
      url: "<?= base_url('dashboard/topmenu'); ?>",
      success: (result) => {
        document.getElementById("search-bar").innerHTML = result;
        //  document.getElementById("searchReports").style.display = "flex";
      },
      error: (error) => {
        document.getElementById("search-bar").innerHTML = error;
      }
    });

    $.ajax({
      type: "get",
      url: "<?= base_url('dashboard/pslogo'); ?>",
      success: (result) => {
        document.getElementById("ps-logo").innerHTML = result;
      },
      error: (error) => {
        document.getElementById("ps-logo").innerHTML = error;
      }
    });

    let setheight = document.getElementById("reportspage");

    let a = window.innerHeight;
    let b = document.getElementById("search-bar").getBoundingClientRect().height;
    //  menubarheight.style.height = a - b+"px";
    //  setheight.style.height = a - b+"px";


    const ITEMS_PER_PAGE = 10;
    let currentTotalCount = <?= $counts ?? 0 ?>;
    let currentActivePage = 1;

    // Initialize pagination on load
    $(document).ready(function() {
      renderPagination(currentTotalCount, currentActivePage);
    });

    function renderPagination(totalCount, activePage) {
      const container = document.getElementById('pagination-container');
      const info = document.getElementById('pagination-info');
      if (!container || totalCount <= 0) {
        if (container) container.innerHTML = '';
        if (info) info.innerHTML = totalCount === 0 ? '<div class="mt-5 text-muted">No Record Found</div>' : '';
        return;
      }

      const totalPages = Math.ceil(totalCount / ITEMS_PER_PAGE);
      let html = '';

      // Previous Button
      html += `<button onclick="goToPage(${activePage - 1})" class="pagination-btn ${activePage === 1 ? 'disabled' : ''}" ${activePage === 1 ? 'disabled' : ''}>
                <i class="fas fa-chevron-left"></i>
               </button>`;

      // Page Numbers logic
      let startPage = Math.max(1, activePage - 2);
      let endPage = Math.min(totalPages, startPage + 4);
      
      if (endPage - startPage < 4) {
        startPage = Math.max(1, endPage - 4);
      }

      if (startPage > 1) {
        html += `<button onclick="goToPage(1)" class="pagination-btn">1</button>`;
        if (startPage > 2) html += `<span class="pagination-ellipsis">...</span>`;
      }

      for (let i = startPage; i <= endPage; i++) {
        html += `<button onclick="goToPage(${i})" class="pagination-btn ${i === activePage ? 'active' : ''}">${i}</button>`;
      }

      if (endPage < totalPages) {
        if (endPage < totalPages - 1) html += `<span class="pagination-ellipsis">...</span>`;
        html += `<button onclick="goToPage(${totalPages})" class="pagination-btn">${totalPages}</button>`;
      }

      // Next Button
      html += `<button onclick="goToPage(${activePage + 1})" class="pagination-btn ${activePage === totalPages ? 'disabled' : ''}" ${activePage === totalPages ? 'disabled' : ''}>
                <i class="fas fa-chevron-right"></i>
               </button>`;

      container.innerHTML = html;

      // Info text
      const start = (activePage - 1) * ITEMS_PER_PAGE + 1;
      const end = Math.min(activePage * ITEMS_PER_PAGE, totalCount);
      info.innerHTML = `Showing <span class="fw-bold text-dark">${start}</span> to <span class="fw-bold text-dark">${end}</span> of <span class="fw-bold text-dark">${totalCount}</span> entries`;
    }

    function goToPage(page) {
      if (page < 1) return;
      const offset = (page - 1) * ITEMS_PER_PAGE;
      
      $.ajax({
        type: "get",
        url: "reports/displayReports",
        data: { "count": offset },
        success: function (result) {
          document.getElementById('ps-reports').innerHTML = result;
          currentActivePage = page;
          renderPagination(currentTotalCount, currentActivePage);
          // Smooth scroll to top of table
          document.getElementById('main-reports').scrollIntoView({ behavior: 'smooth', block: 'start' });
        },
        error: function (err) {
          console.error(err);
          document.getElementById('ps-reports').innerHTML = "<tr><td colspan='7'>Error fetching data</td></tr>";
        }
      });
    }

    // Update commonSearch to reset pagination
    const originalCommonSearch = commonSearch;
    commonSearch = function(reports) {
      let searchfields = reports.value;
      $.ajax({
        type: "get",
        url: "reports/searchReports",
        data: { "searchfields": searchfields },
        success: (result) => {
          document.getElementById('ps-reports').innerHTML = result;
          // Count rows to approximate total count for search (if backend doesn't return total)
          // Ideally backend should return total count.
          // Since it doesn't, we'll hide pagination for search results if they are limited,
          // or at least reset it to 1 page if we only have the result.
          // But looking at searchReports, it returns all matching results.
          let rowCount = $('#ps-reports tr').length;
          currentActivePage = 1;
          currentTotalCount = rowCount; 
          renderPagination(currentTotalCount, currentActivePage);
        },
        error: (error) => {
          document.getElementById('ps-reports').innerHTML = "Error searching";
        }
      })
    };

    function getEventsbyYear(yeardata) {

      let year = yeardata.value;

      if (year == "search") {
        document.getElementById("showevents").innerHTML = `
          <label id="eventnamelabel" class="form-label" for="eventname"><i class="fas fa-search me-2 text-info"></i>Search Event:</label>
          <div class="position-relative">
            <input id="eventname" name="eventname" autocomplete="off" onkeyup="searchEvent(this)" class="form-control" type="text" placeholder="Type event name...">
            <input type="hidden" name="eventid" id="eventid_hidden" value="">
            <div id="searchresults" class="dropdown-menu w-100 shadow-sm mt-1" style="display:none; max-height: 200px; overflow-y: auto; z-index: 1000;"></div>
          </div>
        `;
      }

      else if (year == "") {
        document.getElementById("showevents").innerHTML = ` <label id="eventnamelabel" class="form-label" for="eventname"><i class="fas fa-calendar-check me-2 text-warning"></i>Choose Events</label>                                       
    <select class="form-select" name="eventname" id="eventname" required>
    <option value="">Choose Event</option>
    </select>`;
      }
      else {
        $.ajax({
          type: "get",
          url: "reports/getEventsbyYear",
          data: { "year": year },
          success: (result) => {
            document.getElementById("showevents").innerHTML = result;
          },
          error: (error) => {

            document.getElementById("showevents").innerHTML = "error fetching";
          }
        });
      }
    }



    function validateForm() {
      // Get form elements
      let eventYear = document.getElementById("eventyear").value;
      let eventName = document.getElementById("eventname").value;
      let eventNames = document.getElementById("paid").value;
      let paymentStatus = document.querySelector('input[name="paymentstatus"]:checked');

      // Get alert container (you need to add this in the HTML)
      let alertContainer = document.getElementById("alertContainer");

      // Reset alert content
      alertContainer.innerHTML = "";

      // Check if all fields are filled
      if (!eventYear || !eventName || !paymentStatus || !eventNames) {
        // Add Bootstrap alert
        alertContainer.innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                All fields are required.
              
            </div>`;
        return false; // Prevent form submission
      }

      // If all fields are valid
      return true; // Allow form submission
    }

    function applyFilter() {

      // If all fields are valid, proceed with the AJAX call
      console.log("Submitting filter with:", { eventYear, statusforpaid });

      $.ajax({
        type: "get",
        data: { "eventname": eventName, "status": statusforpaid },
        url: "reports/getFilteredusers",
        success: (result) => {
          document.getElementById("main-reports").innerHTML = result;
        },
        error: (error) => {
          document.getElementById("main-reports").innerHTML = error.responseText || "Error fetching data.";
        }
      });
    }

    function displayFilteredreports(counts, index) {
      console.log(counts, index);
      activepage = document.querySelectorAll(".active");
      let l = activepage.length;
      for (let i = 0; i < l; i++) {
        if (i == index) {
          activepage[i].classList.add("active-page")
        }
        else {
          if (activepage[i].classList.contains("active-page")) {
            activepage[i].classList.remove("active-page")
          }
        }
      }
      $.ajax({
        type: "get",
        url: "reports/displayFilteredeventsreports",
        data: { "count": counts },
        success: function (result) {
          console.log(result);
          document.getElementById('filter-event-reports').innerHTML = result;

        },
        error: function (err) {
          document.getElementById('filter-event-reports').innerHTML = error;
        }
      });
    }

    window.onclick = (event) => {
      if (event.target !== document.getElementById("searchresults")) {
        document.getElementById("searchresults").style.display = "none";
      }
    }

    function searchEvent(events) {

      let event = events.value;
      const resultsDiv = document.getElementById("searchresults");
      
      if (event == "") {
        resultsDiv.style.display = "none";
        resultsDiv.innerHTML = "";
      }
      else {
        resultsDiv.style.display = "block";
        $.ajax({
          type: "get",
          url: "reports/getSearchevents",
          data: { "event": event },
          success: function (result) {
            console.log(result);
            resultsDiv.innerHTML = result;

          },
          error: function (err) {
            resultsDiv.innerHTML = "Error fetching results";
          }
        })
      }
    }

    function setEventname(year, eventname, id) {
      document.getElementById("eventyear").value = year;
      document.getElementById("eventname").value = eventname;
      if (document.getElementById("eventid_hidden")) {
        document.getElementById("eventid_hidden").value = id;
      }
      document.getElementById("searchresults").style.display = "none";
    }



  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> -->

</body>

</html>
