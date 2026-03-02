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
  <style>
    .active-reports {
      background-color: rgb(230, 230, 230);
      font-weight: 600;
    }

    .ps-user {
      background-color: rgb(254, 213, 163);
    }

    .heading-kaadaisoft{
        color: rgb(0, 123, 255);
        font-weight:800;
        font-family:sans-serif;
     }

    .ps-logo {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    input:focus {
      outline: none;
      /* Removes the default focus outline */
      box-shadow: none;
      /* Removes any shadow effect */
      border-color: inherit;
      /* Ensures the border doesn't change on focus */
    }

    .ps-gray {
      background-color: rgb(248, 245, 245);
    }

    #search-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    @media screen and (max-width:768px) {
      #search-bar {
        background-color: rgb(248, 245, 245);
        display: none;
      }

      #menu-bar {
        display: none;
      }

      #hidename {
        display: hide;
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

    .ps-logo {
      justify-content: space-between;
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
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
      border: 1px solid #e2e8f0;
      overflow: hidden;
      margin-bottom: 2rem;
    }
    .custom-table-modern {
      margin-bottom: 0;
      width: 100%;
    }
    .custom-table-modern caption {
      padding: 1rem;
      font-weight: 600;
      color: #1e293b;
    }
    .custom-table-modern thead th {
      background: linear-gradient(135deg, #0f172a, #1e293b);
      color: #f8fafc;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.85rem;
      letter-spacing: 0.05em;
      padding: 1rem;
      border-bottom: 2px solid #334155;
    }
    .custom-table-modern tbody tr {
      transition: all 0.2s ease;
    }
    .custom-table-modern tbody tr:hover {
      background-color: #f1f5f9;
    }
    .custom-table-modern td {
      padding: 1rem;
      vertical-align: middle;
      color: #1e293b;
      border-bottom: 1px solid #f1f5f9;
    }
  </style>
</head>

<body>

  <div class="container-fluid layout-container p-0">

    <div class="top-navbar-row"><!-----top-bar--------------->

      <div id="ps-logo" class="col-md-2 border-bottom py-3 d-flex align-items-center justify-content-center" style="background: #0f172a;">
      </div>

      <div id="search-bar" class="col-md-10 d-flex align-items-center justify-content-between border-bottom px-3" style="background: #0f172a;">
      </div>
    </div><!-----------top-bar-end----------------------->


    <div class="main-body-row"><!----------main-navbar----------->

      <div id="menu-bar" class="col-md-2"><!----------side-bar-------------------->
      </div><!-----------side-bar-end-------------->

      <div id="reportsFilteredpageHeight" class="col-md-10 main-content-area px-4 pt-3">
        <!-----------main-dashboard------------------------->
        <div class="container-fluid">
          <br>
          <span class="text-secondary h3"> Report Status Filter:
            <!--<div id="alertContainer" class="h6 fw-normal text-danger "></div>-->
          </span>
          <form action="<?= base_url("reportFilterPage") ?>" method="get" autocomplete="off">
            <div class="row filter-card-premium"><!----------filter-start------------>

              <div id="showyear" class="col-md-3 mb-3"><!-----year-search--------->
                <label class="form-label" for="eventyear"><i class="fas fa-calendar-alt me-2 text-primary"></i>Choose event year</label>
                  <select onchange="getEventsbyYear(this)" class="form-select" name="eventyear" id="eventyear">
                    <option value="">Choose Year</option>
                    <option value="search">Search Event</option>
                    <?php if (isset($eventyears) && isset($year))
                      foreach ($eventyears as $key => $value) {
                        echo "<option " . ($year == $value['Year'] ? 'selected' : '') . " value='$value[Year]'>$value[Year]</option>";
                      }
                    ?>
                  </select>
              </div><!-----year-search--------->

              <div id="showevents" class="col-md-3 mb-3"><!----------event-search------------>
                <label id="eventnamelabel" class="form-label" for="eventid"><i class="fas fa-calendar-check me-2 text-warning"></i>Choose Events</label>
                  <select class="form-select" name="eventid" id="eventid">
                    <option value="">Choose Event</option>
                    <?php if (isset($events) && isset($eventid))
                      foreach ($events as $key => $value) {
                        echo "<option " . ($eventid == $value['Id'] ? 'selected' : '') . " value='$value[Id]'>$value[EventName]</option>";
                      }
                    ?>
                  </select>
                  <div id="searchresults" class="dropdown-menu w-100 shadow-sm mt-1" style="display:none; max-height: 200px; overflow-y: auto; z-index: 1000;"></div>
              </div><!--------event-search-end--------------------------->

              <div class="col-md-6 mb-3">
                <!------------paid-filter------------>
                <label class="form-label"><i class="fas fa-money-bill-wave me-2 text-success"></i>Payment Status</label>
                <div class="border rounded px-3 py-2 bg-light d-flex justify-content-between align-items-center">
                  <input id="sentstatus" hidden type="text" value="<?php echo "$status"; ?>">
                  <label class="custom-radio">
                    <input onchange="setStatus(this)" <?php if ($status == "Paid") {
                    echo 'checked';
                  } ?> type="radio" value="Paid" name="paymentstatus" id="paid" required> Paid Users
                  </label>
                  <label class="custom-radio">
                    <input onchange="setStatus(this)" <?php if ($status == "Pending") {
                    echo 'checked';
                  } ?> type="radio" value="Pending" name="paymentstatus" id="pending" required> Unpaid Users
                  </label>
                  <label class="custom-radio">
                    <input onchange="setStatus(this)" <?php if ($status == "All") {
                    echo 'checked';
                  } ?> type="radio" value="All" name="paymentstatus" id="all" required> All Users
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
          <button id="downloadBtn" class="btn btn-sm btn-warning fw-bold float-end">Download</button>
          <script>
            $(document).on('click', '#downloadBtn', function () {
              var year = $('#eventyear').val();
              var event = $('#eventid').val();
              var status = $('input[name="paymentstatus"]:checked').val();

              window.location.href = "<?= base_url('download_excel') ?>"
                + "?year=" + encodeURIComponent(year)
                + "&event=" + encodeURIComponent(event)
                + "&status=" + encodeURIComponent(status);
            });
          </script>
          <!--report-->
          <div class="d-flex justify-content-between">
            <?php

            if (isset($status) && isset($filteredcounts)) {

              if ($status == 'Paid') {
                echo "<h6 class = 'py-2 text-secondary'>Total Paid Members: $filteredcounts </h6>";
              } elseif ($status == 'Pending') {
                echo "<h6 class = 'py-2 text-secondary'>Total Unpaid Members: $filteredcounts </h6>";
              } else {
                echo "<h6 class = 'py-2 text-secondary'>Total Members: $filteredcounts </h6>";
              }
            }

            //  if(isset($eventname) && isset($status)){  
            //  echo "<a href='excel?eventname=$eventname&status=$status' style='height:fit-content;' class='btn btn-sm fw-bold float-end btn-warning' id = 'download' role='button'>Download</a>";
            //  }      
            ?>
          </div>

          <div id="main-reports" class="table-container mt-4"><!----------------table-------->
            <table class="table custom-table-modern text-center">
              <?php
              if (!empty($reports)) {
                echo "
            <thead>
            <tr>
            <th>S.No</th><th>Familymembershipid</th><th>Name</th><th>Role</th><th>Phone No</th><th>EventMoney</th><th>PaidCash</th><th>Pending</th><th>lastPaid</th>
            </tr>
            </thead>";
              }
              ?>
              <tbody id="filter-event-reports">
                <?php

                if (isset($reports) && isset($sno)) {
                  $i = $sno;
                  foreach ($reports as $key => $value) {
                    $j = $i + 1;
                    $rowBg = ($i % 2 == 0) ? "style='background-color:#f8fafc;'" : "";
                    echo "
                   <tr $rowBg>
                       <td class='fw-medium text-muted'>$j</td>
                       <td class='fw-bold' style='color: #2563eb;'>$value[Familymembershipid]</td>
                       <td class='fw-medium'>$value[Name]</td>
                       <td class='text-muted'>$value[Role]</td>
                       <td class='text-muted'>$value[Mobile]</td>
                       <td class='text-muted'>" . ($value['Taxamount'] ?? '_') . "</td>
                       <td class='text-muted'>" . ($value['paidamount'] ?? '_') . "</td>
                       <td class='text-muted'>" . ($value['balancemount'] ?? '_') . "</td>
                       <td class='text-muted'>" . ($value['paymentdate'] ?? '_') . "</td>           
                   </tr>";
                    ++$i;
                  }
                } else {
                  echo "<tr>
                      <td colspan='9' class='text-center'>No search results</td>
                    </tr>";
                }
                ?>
                <!-- <td>
                           <a href='#' class='btn btn-sm btn-primary text-white ' role='button'>View</a>
                  
                            </td> -->
              </tbody>
            </table>
          </div> <!----------------table-end------->

          <div id='data-container' class='d-flex justify-content-center container-fluid page position-relative'>
            <!-----------------pagination---------------------->

            <div class="col-md-6 py-2 d-flex justify-content-around align-items-center">

              <?php

              if (isset($filteredcounts)) {
                if ($filteredcounts > 0) {
                  $countsperpage = 8;
                  $noofpages = ceil($filteredcounts / $countsperpage) - 1;
                  $totalpagesarr = createarr($noofpages);
                  $totalpages = count($totalpagesarr);
                  $initialindex = 0;
                  $lastindex = 5;
                  $pages = array_slice($totalpagesarr, $initialindex, $lastindex);
                  echo "<a href='changeFilteredreportspagesetup?initialindex=0' style='cursor:pointer;'  class='text-dark text-decoration-none text-dark'><i  id = 'arrow' class='fa-solid fa-arrow-left-long'></i></a>";
                  $j = 0;
                  // foreach ($pages as $key => $value) {
                  //   $count = $countsperpage * $value;
                  //   $pageno = $value + 1;
              
                  //   echo "<button onclick='displayEvents($count,$j)' class='".($j==0 ? 'active-page' : '')." active text-decoration-none p-2 px-3 rounded-circle'>$pageno</button>";
                  //   ++$j;
                  // }
                  foreach ($pages as $key => $value) {
                    $count = $countsperpage * $value;
                    $pageno = $value + 1;

                    if ($pageno == 5) {
                      echo "<a href='changeFilteredreportspagesetup?initialindex=" . ($pageno - 1) . "' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;' class='" . ($j == 0 ? 'active-page' : '') . " active text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$pageno</a>";
                    } else {
                      echo "<button style='width:35px;height:35px;'onclick='displayFilteredreports($count,$j)' class='" . ($j == 0 ? 'active-page' : '') . " active rounded-circle'>$pageno</button>";
                    }
                    ++$j;
                  }
                  echo "<span>...</span>";
                  $totalcount = ($totalpages - $lastindex);
                  echo "<a href='changeFilteredreportspagesetup?initialindex=$totalcount' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$totalpages</a>";

                  $newindex = $initialindex + $lastindex;
                  echo "<a href='changeFilteredreportspagesetup?initialindex=$newindex' style='cursor:pointer;'  class='text-dark text-decoration-none text-dark'><i  id = 'arrow' class='fa-solid fa-arrow-right-long'></i></a>";
                } else {
                  echo "<script>
      
             document.getElementById('data-container').style.padding='100px';

            </script>";
                  echo "<div class='mt-5'>No Record Found</div>";
                }
              }


              if (isset($initialindex) && isset($newcounts)) {
                // echo $lastindex;l
                $countsperpage = 8;
                $noofpages = ceil($newcounts / $countsperpage) - 1;
                $totalpagesarr = createarr($noofpages);
                $totalpages = count($totalpagesarr);
                $lastindex = 5;
                // echo $totalpages;
                $start = $initialindex;
                $pages = array_slice($totalpagesarr, $start, $lastindex);
                // echo var_dump($pages);
                // $start == 0 ? $prevlist = 0 : $prevlist = $start - $lastindex;
                $start == 0 ? $prevlist = 0 : (($start - $lastindex) < 0 ? $prevlist = 0 : $prevlist = $start - $lastindex);
                echo "<a href='changeFilteredreportspagesetup?initialindex=$prevlist' style='cursor:pointer;' class='text-dark text-decoration-none'><i id = 'arrow' class='fa-solid fa-arrow-left-long'></i></a>";
                $j = 0;

                foreach ($pages as $key => $value) {
                  $count = $countsperpage * $value;
                  $pageno = $value + 1;

                  if ($pageno == 5 || $pageno - $start == 5) {
                    echo $pageno == $totalpages ? "<button style='width:35px;height:35px;'onclick='displayFilteredreports($count,$j)' class='" . ($j == 0 ? 'active-page' : '') . " active rounded-circle'>$pageno</button>" : "<a href='changeFilteredreportspagesetup?initialindex=" . ($pageno - 1) . "' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;' class='" . ($j == 0 ? 'active-page' : '') . " active text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$pageno</a>";
                  } else {
                    echo "<button style='width:35px;height:35px;'onclick='displayFilteredreports($count,$j)' class='" . ($j == 0 ? 'active-page' : '') . " active rounded-circle'>$pageno</button>";
                  }
                  ++$j;
                }

                echo "<span>...</span>";
                $totalcount = ($totalpages - $lastindex);
                echo "<a href='changeFilteredreportspagesetup?initialindex=$totalcount' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$totalpages</a>";

                $newindex = $start + $lastindex;
                echo "<a href='changeFilteredreportspagesetup?initialindex=" . ($totalpages - $start <= $lastindex ? $totalcount : $newindex) . "'  style='cursor:pointer;' class='text-decoration-none text-dark'><i class='fa-solid id = 'arrow' fa-arrow-right-long'></i></a>";
              }

              function createarr($noofpages)
              {
                return range(0, $noofpages);
              }


              ?>

            </div>
          </div><!--------------pagination-end--------------------->
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


  <script>
  function updateHeights() {
      let c = window.innerHeight;
      let topBarElement = document.getElementById("search-bar");
      let d = topBarElement ? topBarElement.getBoundingClientRect().height : 0;
      let menuBarElement = document.getElementById("menu-bar");
      
      if (menuBarElement) menuBarElement.style.height = (c - d) + "px";
  }

  window.addEventListener("load", updateHeights);
  window.addEventListener("resize", updateHeights);
  
  // Also run it immediately if possible
  updateHeights();

  // Mobile Menu Functions
  function openMobileMenu() {
    document.getElementById('custom-mobile-menu').style.display = 'block';
  }

  function closeMobileMenu() {
    document.getElementById('custom-mobile-menu').style.display = 'none';
  }

  // Load menu components
  $.ajax({
    type: "get",
    url: "<?= base_url('dashboard/sidemenu'); ?>",
    success: (result) => {
      document.getElementById("menu-bar").innerHTML = result;
      document.getElementById("mobile-menu-content").innerHTML = result;
    },
    error: (error) => {
      console.error('Error loading sidemenu:', error);
      document.getElementById("menu-bar").innerHTML = "<p class='text-danger'>Error loading menu</p>";
    }
  });

  $.ajax({
    type: "get",
    url: "<?= base_url('dashboard/topmenu'); ?>",
    success: (result) => {
      document.getElementById("search-bar").innerHTML = result;
    },
    error: (error) => {
      console.error('Error loading topmenu:', error);
      document.getElementById("search-bar").innerHTML = "<p class='text-danger'>Error loading top menu</p>";
    }
  });

  $.ajax({
    type: "get",
    url: "<?= base_url('dashboard/pslogo'); ?>",
    success: (result) => {
      document.getElementById("ps-logo").innerHTML = result;
    },
    error: (error) => {
      console.error('Error loading logo:', error);
      document.getElementById("ps-logo").innerHTML = "<p class='text-danger'>Error loading logo</p>";
    }
  });

  // Pagination function
  function displayFilteredreports(count, index) {
    $.ajax({
      type: "get",
      url: "<?= base_url('reports/displayFilteredeventsreports'); ?>",
      data: { "count": count },
      success: (result) => {
        document.getElementById("filter-event-reports").innerHTML = result;
        let buttons = document.querySelectorAll("#data-container .active");
        buttons.forEach((button) => {
          button.classList.remove("active-page");
        });
        if(buttons[index]) {
          buttons[index].classList.add("active-page");
        }
      },
      error: (error) => {
        console.log(error);
      }
    });
  }

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
    } else if (year == "") {
      document.getElementById("showevents").innerHTML = `
        <label id="eventnamelabel" class="form-label" for="eventid"><i class="fas fa-calendar-check me-2 text-warning"></i>Choose Events</label>                                       
        <select class="form-select" name="eventid" id="eventid" required>
        <option value="">Choose Event</option>
        </select>`;
    } else {
      $.ajax({
        type: "get",
        url: "<?= base_url('reports/getEventsbyYear'); ?>",
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

  function searchEvent(events) {
    let event = events.value;
    const resultsDiv = document.getElementById("searchresults");
    
    if (event == "") {
      resultsDiv.style.display = "none";
      resultsDiv.innerHTML = "";
    } else {
      resultsDiv.style.display = "block";
      $.ajax({
        type: "get",
        url: "<?= base_url('reports/getSearchevents'); ?>",
        data: { "event": event },
        success: function (result) {
          resultsDiv.innerHTML = result;
        },
        error: function (err) {
          resultsDiv.innerHTML = "Error fetching results";
        }
      });
    }
  }

  function setEventname(year, eventname, id) {
    document.getElementById("eventyear").value = year;
    document.getElementById("eventname").value = eventname;
    if (document.getElementById("eventid_hidden")) {
      document.getElementById("eventid_hidden").value = id;
    }
    const results = document.getElementById("searchresults");
    if(results) results.style.display = "none";
  }

  function setStatus(status) {
    document.getElementById("sentstatus").value = status.value;
  }

  window.onclick = (event) => {
    if (event.target !== document.getElementById("searchresults")) {
      const results = document.getElementById("searchresults");
      if(results) results.style.display = "none";
    }
  }
</script>

  <!---------------------offcanvas-end-------------------------------->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
