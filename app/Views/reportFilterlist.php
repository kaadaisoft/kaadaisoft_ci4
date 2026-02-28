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

    li:hover {
      background-color: rgb(230, 230, 230);
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
  </style>
</head>

<body>

  <div class="container-fluid" style="position:absolute;overflow:hidden;">

    <div class="row"><!-----top-bar--------------->

      <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3">

      </div>

      <div id="search-bar" class="col-md-10 d-flex align-items-center justify-content-between border-bottom">

      </div>
    </div><!-----------top-bar-end----------------------->


    <div class="row "><!----------main-navbar----------->

      <div id="menu-bar" class="col-md-2 ps-gray"><!----------side-bar-------------------->


      </div><!-----------side-bar-end-------------->

      <div id="reportsFilteredpageHeight" style="overflow:auto;" class="col-md-10">
        <!-----------main-dashboard------------------------->
        <div class="container-fluid">
          <br>
          <span class="text-secondary h3"> Report Status Filter:
            <!--<div id="alertContainer" class="h6 fw-normal text-danger "></div>-->
          </span>
          <form action="<?= base_url("reportFilterPage") ?>" method="get" autocomplete="off">
            <div class="pt-2 row pb-4"><!----------filter-start------------>


              <div id="showyear" class="col-md-3"><!-----year-search--------->
                <label class="container-fluid" for="aadhar">Choose event year:<br>
                  <select onchange="getEventsbyYear(this)" class="container-fluid border rounded" name="eventyear"
                    id="eventyear">
                    <option value="">Choose Year</option>
                    <option value="search">Search Event</option>
                    <?php if (isset($eventyears) && isset($year))
                      foreach ($eventyears as $key => $value) {
                        echo "<option " . ($year == $value['Year'] ? 'selected' : '') . " value='$value[Year]'>$value[Year]</option>";
                      }
                    ?>
                  </select>
                </label>

              </div><!-----year-search--------->
              <div id="showevents" class="col-md-3"><!----------event-search------------>
                <label id="eventnamelabel" class="container-fluid" for="aadhar">Choose Events: <br>
                  <select class="container-fluid border rounded" name="eventid" id="eventid">
                    <option value="">Choose Event</option>
                    <?php if (isset($events) && isset($eventid))
                      foreach ($events as $key => $value) {
                        echo "<option " . ($eventid == $value['Id'] ? 'selected' : '') . " value='$value[Id]'>$value[EventName]</option>";
                      }
                    ?>
                  </select>
                  <div id='searchresults' hidden style='display:none;'
                    class='rounded border position-absolute bg-white px-2'></div>
                </label>


              </div><!--------event-search-end--------------------------->

              <div class="col-md-4 d-flex justify-content-between align-items-center">
                <!------------paid-filter------------>
                <div class="mt-3">
                  <input id="sentstatus" hidden type="text" value="<?php echo "$status"; ?>">
                  <label for="paid">Paid Users:</label>
                  <input onchange="setStatus(this)" <?php if ($status == "Paid") {
                    echo 'checked';
                  } ?> type="radio"
                    value="Paid" name="paymentstatus" id="paid" required>
                </div>
                <div class="mt-3">
                  <label for="unpaid">Unpaid Users:</label>
                  <input onchange="setStatus(this)" <?php if ($status == "Pending") {
                    echo 'checked';
                  } ?> type="radio"
                    value="Pending" name="paymentstatus" id="pending" required>
                </div>
                <div class="mt-3">
                  <label for="unpaid">All Users:</label>
                  <input onchange="setStatus(this)" <?php if ($status == "All") {
                    echo 'checked';
                  } ?> type="radio"
                    value="All" name="paymentstatus" id="all" required>
                </div>

              </div><!------------paid-filter-end----------->

              <div id="filterbutton" class="col-md-2 pt-3 d-flex align-items-center justify-content-center">
                <!------------filter-button-start------------>
                <button type="submit" class="btn btn-success fw-bold">Apply Filter</button>
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

          <div id="main-reports" style="overflow:auto" class="mt-3 "><!----------------table-------->
            <table class="table table-responsive table-bordered text-center">
              <?php
              if (!empty($reports)) {
                echo "
            <thead>
            <tr class='ps-gray text-center'>
            <th>S.No</th><th >Familymembershipid</th><th>Name</th><th>Role</th><th>Phone No</th><th >EventMoney</th><th>PaidCash</th><th>Pending</th><th>lastPaid</th><!--<th> Actions&nbsp;&nbsp;</th>-->
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
                    echo "
                   <tr>
                       <td>$j</td>
                       <td class='fw-bold text-primary'>$value[Familymembershipid]</td>
                       <td >$value[Name]</td>
                       <td >$value[Role]</td>
                       <td>$value[Mobile]</td>
                       <td>" . ($value['Taxamount'] ?? '_') . "</td>
                       <td>" . ($value['paidamount'] ?? '_') . "</td>
                       <td>" . ($value['balancemount'] ?? '_') . "</td>
                       <td>" . ($value['paymentdate'] ?? '_') . "</td>           
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
      let height = document.getElementById("eventnamelabel").getBoundingClientRect().width;
      document.getElementById("eventnamelabel").innerHTML = `Search Event:<br><input id='eventname' name="eventname" onkeyup='searchEvent(this)' class='container-fluid border rounded' type='text'><div id='searchresults' style='width:${height}px;display:none;' class='rounded border position-absolute bg-white px-2'></div>`;
    } else if (year == "") {
      document.getElementById("showevents").innerHTML = ` <label id="eventnamelabel" class="container-fluid" for="aadhar">Choose Events: <br>                                       
        <select class="container-fluid border rounded" name="eventid" id="eventid" required>
        <option value="">Choose Event</option>
        </select>
        </label>`;
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
    document.getElementById("searchresults").style.display = "block";
    if (event == "") {
      document.getElementById("searchresults").innerHTML = "No Events Available";
    } else {
      $.ajax({
        type: "get",
        url: "<?= base_url('reports/getSearchevents'); ?>",
        data: { "event": event },
        success: function (result) {
          document.getElementById('searchresults').innerHTML = result;
        },
        error: function (err) {
          document.getElementById('searchresults').innerHTML = "Error";
        }
      });
    }
  }

  function setEventname(year, eventname) {
    document.getElementById("eventyear").value = year;
    document.getElementById("eventid").value = eventname;
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
