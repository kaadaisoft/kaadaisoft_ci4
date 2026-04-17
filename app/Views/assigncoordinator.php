<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assign coordinators</title>
  <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

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

    .ham-menu {
      /* position:absolute; */
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
      background-color: rgb(23, 23, 184) !important;
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

    .active-coords {
      background-color: rgb(230, 230, 230);
      font-weight: 600;
    }

    .assigncoordfilter {
      row-gap: 20px;
    }

    .assign-card {
      border-radius: 12px;
      border: 1px solid #e3e6f0;
      border-top: 4px solid rgb(0, 123, 255);
      background-color: #fff;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .assign-card-header {
      background-color: #f8f9fc;
      border-bottom: 1px solid #e3e6f0;
      padding: 15px 20px;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
      display: flex;
      align-items: center;
    }

    .assign-card-header h4 {
      margin: 0;
      font-weight: 600;
      color: #007bff;
      font-size: 1.2rem;
    }

    .assign-card-body {
      padding: 20px;
    }

    .assigncoordfilter input,
    select {
      height: 40px;

    }

    .assigncoordfilter input:focus,
    select:focus {
      outline-style: none;
    }

    label {
      font-size: 18px;
      font-weight: 500;
    }

    #show-villages li:hover,
    #talukslist li:hover,
    #talukslistforremove li:hover {
      background-color: #6495ED;
      color: white;
    }

    #talukslist li,
    #talukslistforremove li {
      padding: 8px 12px;
      cursor: pointer;
      border-bottom: 1px solid #eee;
      font-size: 15px;
    }

    #searchmemberdata li {
      padding: 8px 12px;
      cursor: pointer;
      border-bottom: 1px solid #eee;
    }

    #searchmemberdata li:hover {
      background-color: #6495ED;
      color: white;
    }

    .assignmember:hover {
      background-color: #ddd;
    }

    .ps-btn {
      border: none;
      outline: none;
      background-color: rgb(23, 23, 184) !important;
      font-weight: 500;
      /* border-radius:25px; */
    }

    /*   #membertoast{
        border-radius:10px;
        position:absolute;
        top:10%;
        right:-380px;
        transition:0.5s;
      } */

    @media screen and (max-width:768px) {
      #search-bar {
        background-color: rgb(248, 245, 245);
        flex: none;
        background-color: white !important;
        padding: 5px 0;
      }

      #menu-bar {
        display: none;
      }

      #dashboardsearch {
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

    /* Custom Scrollbar Styles */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    /* FireFox Support */
    * {
      scrollbar-width: thin;
      scrollbar-color: #888 #f1f1f1;
    }

    /* Fixed Premium Layout */
    html,
    body {
      height: 100%;
      margin: 0;
      overflow: hidden;
    }

    .layout-container {
      display: flex;
      flex-direction: column;
      height: 100vh;
      width: 100%;
    }

    .top-navbar-row {
      height: auto;
      min-height: 75px;
      flex-shrink: 0;
      z-index: 1050;
      background: #0f172a;
      display: flex;
      flex-wrap: wrap;
      align-items: stretch;
      margin: 0;
      border-bottom: 1px solid #1e293b;
    }

    .main-body-row {
      flex: 1;
      display: flex;
      overflow: hidden;
      margin: 0 !important;
      width: 100%;
    }

    #menu-bar {
      height: 100%;
      overflow-y: auto;
      flex-shrink: 0;
      padding: 0;
    }

    .main-content-area {
      flex: 1;
      overflow-y: auto;
      background-color: #f8fafc;
      padding-bottom: 50px;
    }

    @media screen and (max-width: 768px) {
      #menu-bar {
        display: none;
      }

      .main-body-row {
        flex-direction: column;
        overflow: auto;
      }

      .main-content-area {
        width: 100%;
        overflow: visible;
      }

      html,
      body {
        overflow: auto;
        height: auto;
      }

      .layout-container {
        height: auto;
      }

      #ps-logo,
      #search-bar {
        width: 100% !important;
      }
    }

    .removetaluk {
      display: inline-flex;
      align-items: center;
      background-color: #f1f3f9;
      color: #334155;
      font-weight: 500;
      font-size: 14px;
      white-space: nowrap;
      margin: 2px;
      padding: 4px 12px !important;
      border: 1px solid #e2e8f0 !important;
      border-radius: 20px !important;
      transition: all 0.2s;
    }

    .removetaluk:hover {
      background-color: #e2e8f0;
    }

    .remove-btn {
      width: 0.6em !important;
      height: 0.6em !important;
      margin-left: 8px;
      padding: 0 !important;
    }

    #choosetaluks,
    #choosetaluksforremove {
      border-radius: 8px !important;
      min-height: 42px !important;
      background-color: #fbfcfe;
      border-color: #d1d5db !important;
    }
  </style>
</head>

<body>

  <div id="assigncoordpage" class="container-fluid layout-container p-0">
    <?= view('notification_toast') ?>


    <div class="top-navbar-row"><!-----top-bar--------------->

      <div id="ps-logo"
        class="col-12 col-md-2 border-bottom border-md-0 py-2 py-md-3 d-flex align-items-center justify-content-start ps-2"
        style="background: #0f172a;">
      </div>

      <div id="search-bar"
        class="col-12 col-md-10 d-flex align-items-center justify-content-between border-bottom border-md-0 px-3"
        style="background: #0f172a;">
      </div>
    </div><!-----------top-bar-end----------------------->

    <div class="main-body-row"><!----------main-navbar----------->

      <div id="menu-bar" class="col-md-2"><!----------side-bar-------------------->


      </div><!-----------side-bar-end-------------->

      <div id="changepage" class="col-md-10 main-content-area px-5">
        <!-----------main-dashboard------------------------->
        <?php
        $tn_id = "";
        if (isset($states)) {
          foreach ($states as $state) {
            if ($state->state_title == "Tamil Nadu") {
              $tn_id = $state->state_id;
              break;
            }
          }
        }
        ?>
        <div class="pb-4">
          <div id="assigncoordalert">

          </div>

          <div class="py-3">
            <span class='fs-5'>Coordinators / Assigncoordinators</span>
          </div>

          <div><!-------------assign-coord-start------------->
            <div class="assign-card mb-4">
              <div class="assign-card-header">
                <h4><i class="fa-solid fa-user-plus me-2"></i>Assign Coordinator</h4>
              </div>
              <div class="assign-card-body">
                <form class="row assigncoordfilter" Autocomplete="off" onsubmit="return validateAssigncoordinator()"
                  method="POST" action="<?= base_url("assignCoordinatorsfortaluk") ?>">

                  <div id="searchmember" class="col-md-3 position-relative"><!----------member-search-start------->
                    <label class="container-fluid pb-1" for="membername">Search Member
                      <input onfocus="getMemberdata(this)" onkeyup="getMemberdata(this)" type="text" name="membername"
                        class="border w-100" id="membername" required>
                      <input hidden type="text" name="memberid" class="border w-100" id="memberid" required>
                      <input hidden type="text" name="taluks" class="border w-100" id="taluksarray">
                      <input hidden type="text" name="assignerid" value="<?= session()->get("Kaadaisoft_userId") ?>"
                        class="border w-100" id="assignerid" required>
                      <input hidden type="text" name="assignername" value="<?= session()->get("Kaadaisoft_userName") ?>"
                        class="border w-100" id="assignername" required>
                    </label>
                    <div id="limitcoorderror" style="color:red;" class="d-flex"></div>
                    <ul style="display:none;position:absolute;max-height:350px;overflow:auto;z-index:9999;"
                      id="searchmemberdata" class="bg-white border list-unstyled rounded-3 px-1 py-2">
                    </ul>
                  </div><!---------------member-search-end---------------->

                  <div class="col-md-3" style="display: none;"><!------------state-choose------------>
                    <label class="container-fluid" for="stateid">State:<br>
                      <select onchange="getDistricts(this)" class="container-fluid border rounded" name="stateid"
                        id="stateid" required>
                        <option value=''>Choose State</option>
                        <?php if (isset($states))
                          foreach ($states as $key => $value) {
                            $selected = ($value->state_title == "Tamil Nadu") ? "selected" : "";
                            echo
                              "<option value='$value->state_id' $selected>$value->state_title</option>";
                          }
                        ?>
                      </select>

                    </label>
                  </div><!------------state-choose-end----------->

                  <div id="districtstitle" class="col-md-3"><!------------district-choose------------>
                    <label class="container-fluid" for="districtid">Districts:<br>
                      <select onchange="getTaluks(this)" class="container-fluid border rounded" name="districtid"
                        id="districtid" required>
                        <option value=''>Choose District</option>
                      </select>
                    </label>
                  </div><!------------district-choose-end----------->

                  <div id="talukstitle" class="col-md-3"><!------------taluk-choose------------>
                    <label class="container-fluid" for="talukid">Taluks:<br>
                      <select onchange="getPanchayats(this)" class="container-fluid border rounded" name="talukid"
                        id="talukid" required>
                        <option value=''>Choose Taluk</option>
                      </select>
                    </label>
                  </div><!------------taluk-choose-end----------->

                  <div id="panchayatstitle" class="col-md-3"><!------------panchayat-choose------------>
                    <label class="container-fluid" for="panchayatid">Panchayats:<br>
                      <select onchange="getVillages(this)" class="container-fluid border rounded" name="panchayatid"
                        id="panchayatid" required>
                        <option value=''>Choose Panchayat</option>
                      </select>
                    </label>
                  </div><!------------panchayat-choose-end----------->

                  <div id="localareas" class="col-md-9"><!------------select-villages----------->
                    <label class="container-fluid position-relative" for="aadhar">Villages:<br>
                      <div id="choosetaluks" style="min-height:40px;max-height:100px;overflow:auto;gap:5px;"
                        class="border d-flex flex-wrap justify-content-start p-2">

                      </div>

                      <div id="displaytaluks"
                        style="display:none;z-index:1000;max-height:200px;overflow-y:auto;min-width:250px;"
                        class="bg-white container-fluid border rounded position-absolute" name="taluks">
                        <ul id='talukslist' class='list-unstyled'></ul>
                      </div>
                    </label>
                  </div><!------------select-villages-end----------->

                  <div class="col-md-3 mb-3 d-flex align-items-end"><button type="submit"
                      class="btn ps-btn text-white w-100">Assign</button></div>
                </form>
              </div>
            </div>
          </div><!-------------------assign-coord-filter-end----------------->

          <div class="mt-4"><!-------------status-filter-start------------->
            <div class="assign-card mb-4" style="border-top-color: #dc3545;">
              <div class="assign-card-header">
                <h4 style="color: #dc3545;"><i class="fa-solid fa-user-gear me-2"></i>Reassign Coordinator</h4>
              </div>
              <div class="assign-card-body">
                <form id="statusfilter" class="row assigncoordfilter" Autocomplete="off"
                  action="<?= base_url("reassignCoordinatorProcess") ?>" method="POST">

                  <div id="searchcoord" class="col-md-3 position-relative"><!----------coordinator-search-start------->
                    <label class="container-fluid pb-1" for="coordinatorname">Search Coordinator
                      <input onfocus="getCoordinatordata(this)" onkeyup="getCoordinatordata(this)" type="text"
                        name="coordinatorname" class="border w-100" id="coordinatorname" required>
                      <input hidden type="text" name="coordinatorid" class="border w-100" id="coordinatorid" required>
                    </label>
                    <ul style="display:none;position:absolute;max-height:350px;overflow:auto;z-index:9999;"
                      id="searchcoordinatordata" class="bg-white border list-unstyled rounded-3 px-1 py-2">
                    </ul>
                  </div><!---------------coordinator-search-end---------------->

                  <div class="col-md-3" style="display: none;"><!------------state-choose------------>
                    <label class="container-fluid" for="stateidremove">State:<br>
                      <select onchange="getDistrictsforremove(this)" class="container-fluid border rounded"
                        name="stateid" id="stateidremove" required>
                        <option value=''>State</option>
                        <?php if (isset($states))
                          foreach ($states as $key => $value) {
                            $selected = ($value->state_title == "Tamil Nadu") ? "selected" : "";
                            echo
                              "<option value='$value->state_id' $selected>$value->state_title</option>";
                          }
                        ?>
                      </select>

                    </label>
                  </div><!------------state-choose-end----------->
                  <div id="districtstitleremove" class="col-md-3"><!------------district-choose------------>
                    <label class="container-fluid" for="districtnames">Districts:<br>
                      <select onchange="getTaluksforremove(this)" class="container-fluid border rounded"
                        name="districtid" id="districtnames" required>
                        <option value=''>Choose District</option>
                      </select>
                    </label>
                  </div><!------------district-choose-end----------->

                  <div id="talukstitleremove" class="col-md-3"><!------------taluk-choose------------>
                    <label class="container-fluid" for="talukidremove">Taluks:<br>
                      <select onchange="getPanchayatsforremove(this)" class="container-fluid border rounded"
                        name="talukid" id="talukidremove" required>
                        <option value=''>Choose Taluk</option>
                      </select>
                    </label>
                  </div><!------------taluk-choose-end----------->

                  <div id="panchayatstitleremove" class="col-md-3"><!------------panchayat-choose------------>
                    <label class="container-fluid" for="panchayatidremove">Panchayats:<br>
                      <select onchange="getVillagesforremove(this)" class="container-fluid border rounded"
                        name="panchayatid" id="panchayatidremove" required>
                        <option value=''>Choose Panchayat</option>
                      </select>
                    </label>
                  </div><!------------panchayat-choose-end----------->

                  <div id="localareasremove" class="col-md-9"><!------------select-villages----------->
                    <label class="container-fluid position-relative" for="villagesforremove">Villages:<br>
                      <input hidden type="text" name="taluksforremove" class="border w-100" id="taluksarrayforremove">
                      <div id="choosetaluksforremove" style="min-height:40px;max-height:100px;overflow:auto;gap:5px;"
                        class="border d-flex flex-wrap justify-content-start p-2">

                      </div>

                      <div id="displaytaluksforremove"
                        style="display:none;z-index:1000;max-height:200px;overflow-y:auto;min-width:250px;"
                        class="bg-white container-fluid border rounded position-absolute" name="taluks">
                        <ul id='talukslistforremove' class='list-unstyled'></ul>
                      </div>
                    </label>
                  </div> <!------------select-villages-end----------->
                  <div class="col-md-3 mb-3 d-flex align-items-end"><button type="submit"
                      class="btn btn-success text-white w-100">Reassign</button></div>
                </form>
              </div>
            </div>
          </div><!-------------------status-filter-end----------------->

          <div class="mt-4"><!-------------remove-coordinator-section-start------------->
            <div class="assign-card mb-4" style="border-top-color: #6c757d;">
              <div class="assign-card-header">
                <h4 style="color: #6c757d;"><i class="fa-solid fa-user-slash me-2"></i>Remove Coordinator</h4>
              </div>
              <div class="assign-card-body">
                <div class="row assigncoordfilter">

                  <div id="searchcoordremoval" class="col-md-4 position-relative">
                    <!----------coordinator-search-start------->
                    <label class="container-fluid pb-1" for="coordinatornameremoval">Search Coordinator
                      <input onfocus="getCoordinatordataForRemoval(this)" onkeyup="getCoordinatordataForRemoval(this)"
                        type="text" name="coordinatornameremoval" class="border w-100" id="coordinatornameremoval"
                        required>
                      <input hidden type="text" name="coordinatoridremoval" class="border w-100"
                        id="coordinatoridremoval" required>
                    </label>
                    <ul style="display:none;position:absolute;max-height:350px;overflow:auto;z-index:9999;"
                      id="searchcoordinatordataporemoval" class="bg-white border list-unstyled rounded-3 px-1 py-2">
                    </ul>
                  </div><!---------------coordinator-search-end---------------->

                  <div class="col-md-2 d-flex align-items-end mb-3">
                    <button type="button" onclick="getCoordinatorStatus()"
                      class="btn btn-secondary text-white w-100">Status</button>
                  </div>
                </div>

                <div id="coordinatorstatusdisplay" class="mt-3" style="display:none;">
                  <h5 class="border-bottom pb-2">Current Assignments</h5>
                  <div id="assignmentlist" class="table-responsive">
                    <!-- Data will be populated here via JS -->
                  </div>
                </div>

              </div>
            </div>
          </div><!-------------------remove-coordinator-section-end----------------->

          <div class="mt-4"><!-------------add-village-filter-start------------->
            <div class="assign-card mb-4" style="border-top-color: #17a2b8;">
              <div class="assign-card-header">
                <h4 style="color: #17a2b8;"><i class="fa-solid fa-plus-square me-2"></i>Add Village</h4>
              </div>
              <div class="assign-card-body">
                <form id="addvillageform" action="<?= base_url("AdminDashboard/addVillage") ?>" method="post"
                  class="row assigncoordfilter" Autocomplete="off">

                  <div class="col-md-3" style="display: none;"><!------------state-choose------------>
                    <label class="container-fluid" for="stateidadd">State:<br>
                      <select onchange="getDistrictsforadd(this)" class="container-fluid border rounded" name="state"
                        id="stateidadd" required>
                        <option value=''>State</option>
                        <?php if (isset($states))
                          foreach ($states as $key => $value) {
                            $selected = ($value->state_title == "Tamil Nadu") ? "selected" : "";
                            echo
                              "<option value='$value->state_id' $selected>$value->state_title</option>";
                          }
                        ?>
                      </select>

                    </label>
                  </div><!------------state-choose-end----------->
                  <div id="districtstitleadd" class="col-md-3"><!------------district-choose------------>
                    <label class="container-fluid" for="districtnamesadd">Districts:<br>
                      <select onchange="getTaluksforadd(this)" class="container-fluid border rounded" name="district"
                        id="districtnamesadd" required>
                        <option value=''>Choose District</option>
                      </select>
                    </label>
                  </div><!------------district-choose-end----------->

                  <div id="talukstitleadd" class="col-md-3"><!------------taluk-choose------------>
                    <label class="container-fluid" for="talukidadd">Taluks:<br>
                      <select onchange="checkTalukSelect(this)" class="container-fluid border rounded"
                        name="taluk_select" id="talukidadd" required>
                        <option value=''>Choose Taluk</option>
                      </select>
                      <input type="text" name="taluk_manual" id="talukmanual"
                        class="container-fluid border rounded mt-1" style="display:none;"
                        placeholder="Enter Taluk Name">
                    </label>
                  </div><!------------taluk-choose-end----------->

                  <div id="panchayatstitleadd" class="col-md-3"><!------------panchayat-choose------------>
                    <label class="container-fluid" for="panchayatidadd">Panchayats:<br>
                      <select onchange="checkPanchayatSelect(this)" class="container-fluid border rounded"
                        name="panchayat_select" id="panchayatidadd" required>
                        <option value=''>Choose Panchayat</option>
                      </select>
                      <input type="text" name="panchayat_manual" id="panchayatmanual"
                        class="container-fluid border rounded mt-1" style="display:none;"
                        placeholder="Enter Panchayat Name">
                    </label>
                  </div><!------------panchayat-choose-end----------->

                  <div id="villageinputadd" class="col-md-3"><!------------village-input----------->
                    <label class="container-fluid position-relative" for="villagenameadd">New Village Name:<br>
                      <input type="text" name="village" class="container-fluid border rounded" id="villagenameadd"
                        required placeholder="Enter new village">
                    </label>
                  </div> <!------------village-input-end----------->
                  <div class="col-md-3 mb-3 d-flex align-items-end"><button type="submit"
                      class="btn btn-info text-white w-100">Add Village</button></div>
                </form>
              </div>
            </div>
          </div><!-------------------add-village-filter-end----------------->

          <div class="mt-4"><!-------------remove-village-filter-start------------->
            <div class="assign-card mb-4" style="border-top-color: #dc3545;">
              <div class="assign-card-header">
                <h4 style="color: #dc3545;"><i class="fa-solid fa-trash-alt me-2"></i>Remove Village</h4>
              </div>
              <div class="assign-card-body">
                <form id="removevillageform" action="<?= base_url("AdminDashboard/removeVillage") ?>" method="post"
                  class="row assigncoordfilter" Autocomplete="off">

                  <div class="col-md-3" style="display: none;"><!------------state-choose------------>
                    <label class="container-fluid" for="stateiddelete">State:<br>
                      <select onchange="getDistrictsfordelete(this)" class="container-fluid border rounded" name="state"
                        id="stateiddelete" required>
                        <option value=''>State</option>
                        <?php if (isset($states))
                          foreach ($states as $key => $value) {
                            $selected = ($value->state_title == "Tamil Nadu") ? "selected" : "";
                            echo
                              "<option value='$value->state_id' $selected>$value->state_title</option>";
                          }
                        ?>
                      </select>
                    </label>
                  </div><!------------state-choose-end----------->

                  <div id="districtstitledelete" class="col-md-3"><!------------district-choose------------>
                    <label class="container-fluid" for="districtnamesdelete">Districts:<br>
                      <select onchange="getTaluksfordelete(this)" class="container-fluid border rounded" name="district"
                        id="districtnamesdelete" required>
                        <option value=''>Choose District</option>
                      </select>
                    </label>
                  </div><!------------district-choose-end----------->

                  <div id="talukstitledelete" class="col-md-3"><!------------taluk-choose------------>
                    <label class="container-fluid" for="talukiddelete">Taluks:<br>
                      <select onchange="getPanchayatsfordelete(this)" class="container-fluid border rounded"
                        name="taluk" id="talukiddelete" required>
                        <option value=''>Choose Taluk</option>
                      </select>
                    </label>
                  </div><!------------taluk-choose-end----------->

                  <div id="panchayatstitledelete" class="col-md-3"><!------------panchayat-choose------------>
                    <label class="container-fluid" for="panchayatiddelete">Panchayats:<br>
                      <select onchange="getVillagesfordelete(this)" class="container-fluid border rounded"
                        name="panchayat" id="panchayatiddelete" required>
                        <option value=''>Choose Panchayat</option>
                      </select>
                    </label>
                  </div><!------------panchayat-choose-end----------->

                  <div id="villagetitledelete" class="col-md-3"><!------------village-choose----------->
                    <label class="container-fluid position-relative" for="villageiddelete">Village:<br>
                      <select class="container-fluid border rounded" name="village" id="villageiddelete" required>
                        <option value=''>Choose Village</option>
                      </select>
                    </label>
                  </div> <!------------village-choose-end----------->
                  <div class="col-md-3 mb-3 d-flex align-items-end">
                    <button type="button" class="btn btn-danger text-white w-100"
                      onclick="handleRemoveVillageSubmit()">Remove Village</button>
                  </div>
                </form>
              </div>
            </div>
          </div><!-------------------remove-village-filter-end----------------->

          <div style="height: 100px;"></div><!-----------spacer----------->

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

    <!-------------------taluk-exist-alert------------------------------->
    <div id="talukexistalert" class="modal fade">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <span id="assign-header" class="h4">Below Village is assigned.</span>
            <button data-bs-dismiss="modal" class="btn btn-close"></button>
          </div>
          <div id="existtaluk" class="modal-body">

          </div>
        </div>
      </div>
    </div>
    <!-------------------taluk-exist-alert-end------------------------------>

    <!-------------------reassign-modal-------------------------------->
    <div id="reassignmodal" data-bs-backdrop="static" data-bs-keyboard="false" class="modal fade">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <span id="reassign-header-list" class="h4">Selected villages data.</span>
            <button data-bs-dismiss="modal" class="btn btn-close" onclick="pageRefresh()"></button>
          </div>
          <div id="reassignlist" class="modal-body">

          </div>
        </div>
      </div>
    </div>
    <!-------------------reassign-modal-end------------------------------>
    <!-------------------reassign-alert-------------------------------->
    <div id="reassign-alert" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <span id="reassign-header-confirm" class="h4 text-danger">Confirm</span>
            <button data-bs-dismiss="modal" class="btn btn-close"></button>
          </div>
          <div id="reassign-confirm-alert" class="modal-body">

          </div>
        </div>
      </div>
    </div>
    <!-------------------reassign-alert-end------------------------------>
    <script>

      let selectedmembers = [];
      let resultbox = document.getElementById("searchmemberdata");
      let villagenames = [];
      let taluks = [];
      let taluksarray = [];
      let showselectedtaluks = document.getElementById("choosetaluks");
      let showselectedtaluksforremove = document.getElementById("choosetaluksforremove");
      let selectedtaluks = [];
      let selectedtaluksforremove = [];
      let receivedtaluks = [];
      let coordinatordata = [];
      let talukdata = [];
      let currentCoordinatorAssignedCount = 0;

      // Mobile Menu Functions
      function openMobileMenu() {
        document.getElementById('custom-mobile-menu').style.display = 'block';
      }

      function closeMobileMenu() {
        document.getElementById('custom-mobile-menu').style.display = 'none';
      }

      // Highlight active sidebar menu item after AJAX load
      function highlightActiveMenu() {
        const pathSegments = window.location.pathname.split('/').filter(s => s !== '');
        document.querySelectorAll('#menu-bar [data-page], #mobile-menu-content [data-page]').forEach(function (link) {
          link.classList.remove('active-menu-item');
          const linkPage = link.getAttribute('data-page');

          let isMatch = pathSegments.some(seg => seg === linkPage);
          // Explicitly match "coordinators" menu when on "assigncoordinator" page
          if (linkPage === 'coordinators' && pathSegments.includes('assigncoordinator')) {
            isMatch = true;
          }

          if (isMatch || (pathSegments.length === 0 && linkPage === 'admindashboard')) {
            link.classList.add('active-menu-item');
          }
        });
      }

      $.ajax({
        type: "get",
        url: "<?= base_url('members/sidemenu') ?>",
        success: (result) => {
          document.getElementById("menu-bar").innerHTML = result;
          // Populate custom mobile menu content
          document.getElementById("mobile-menu-content").innerHTML = result;
          highlightActiveMenu();
        },
        error: (error) => {
          document.getElementById("menu-bar").innerHTML = error;
        }
      });

      $.ajax({
        type: "get",
        url: "members/topmenu",
        success: (result) => {
          document.getElementById("search-bar").innerHTML = result;
        },
        error: (error) => {
          document.getElementById("search-bar").innerHTML = error;
        }
      });

      $.ajax({
        type: "get",
        url: "members/pslogo",
        success: (result) => {
          document.getElementById("ps-logo").innerHTML = result;
        },
        error: (error) => {
          document.getElementById("ps-logo").innerHTML = error;
        }
      });

      let displaytaluksEl = document.getElementById("choosetaluks");
      displaytaluksEl.addEventListener("click", () => {
        let isDisplaytaluk = document.getElementById("talukslist").childNodes;
        let taluk_count = isDisplaytaluk.length;
        if (taluk_count > 0) {
          document.getElementById("displaytaluks").style.display = "block";
        }
      })

      let displaytaluksforremoveEl = document.getElementById("choosetaluksforremove");
      displaytaluksforremoveEl.addEventListener("click", () => {
        let isDisplaytaluk = document.getElementById("talukslistforremove").childNodes;
        let taluk_count = isDisplaytaluk.length;
        if (taluk_count > 0) {
          document.getElementById("displaytaluksforremove").style.display = "block";
        }
      })

      function getDistricts(state) {
        let stateid = state.value;

        $.ajax({
          type: "get",
          url: "<?= base_url('AdminDashboard/getDistrictsfordropdown') ?>",
          data: { "state_id": stateid },
          success: (result) => {
            document.getElementById("districtid").innerHTML = result;
          },
          error: (error) => {
            document.getElementById("districtid").innerHTML = "<option>Error fetching districts</option>"
          }
        });
      }

      function getTaluks(district) {
        let districtname = district.value;
        $.ajax({
          type: "post",
          dataType: 'JSON',
          cache: false,
          url: "<?= base_url('AdminDashboard/getTaluksfordropdown') ?>",
          data: { "district_name": districtname },
          success: (result) => {
            let dropdown = document.getElementById("talukid");
            dropdown.innerHTML = "<option value=''>Choose Taluk</option>";
            result.forEach(taluk => {
              dropdown.innerHTML += `<option value='${taluk.taluk_name}'>${taluk.taluk_name}</option>`;
            });
          }
        });
      }

      function getPanchayats(taluk) {
        let talukname = taluk.value;
        $.ajax({
          type: "post",
          dataType: 'JSON',
          cache: false,
          url: "<?= base_url('AdminDashboard/getPanchayatsfordropdown') ?>",
          data: { "taluk_name": talukname },
          success: (result) => {
            let dropdown = document.getElementById("panchayatid");
            dropdown.innerHTML = "<option value=''>Choose Panchayat</option>";
            result.forEach(panchayat => {
              dropdown.innerHTML += `<option value='${panchayat.panchayat_name}'>${panchayat.panchayat_name}</option>`;
            });
          }
        });
      }

      function getVillages(panchayat) {
        let panchayatname = panchayat.value;
        $.ajax({
          type: "post",
          dataType: 'JSON',
          cache: false,
          url: "<?= base_url('AdminDashboard/getVillagesfordropdown') ?>",
          data: { "panchayat_name": panchayatname },
          success: (result) => {
            displayVillage(result);
          },
          error: (error) => {
            document.getElementById("displaytaluks").innerHTML = "Error fetching villages.";
          }
        });
      }

      function displayVillage(result) {
        document.getElementById("displaytaluks").style.display = "block";
        document.getElementById("talukslist").innerHTML = result.map((village, index) => {
          let villageData = JSON.stringify({ village: village.village_name, panchayat: village.panchayat_name, taluk: village.taluk_name, district: village.district_name });
          let ticks = "";
          if (village.assigned_count == 1) {
            ticks = "<span class='float-end text-success'><i class='fa-duotone fa-solid fa-check'></i></span>";
          } else if (village.assigned_count == 2) {
            ticks = "<span class='float-end text-success'><i class='fa-duotone fa-solid fa-check'></i><i class='fa-duotone fa-solid fa-check'></i></span>";
          }
          return `<li class='target' onclick='addVillage(${villageData})' style='outline:none;border:none;'>${village.village_name} ${ticks}</li>`
        }).join("");
      }

      function addVillage(villageData) {
        $.ajax({
          type: "post",
          url: "<?= base_url('AdminDashboard/checkExistvillage') ?>",
          data: {
            "village": villageData.village,
            "panchayat": villageData.panchayat,
            "taluk": villageData.taluk,
            "district": villageData.district,
            "memberid": document.getElementById("memberid").value
          },
          success: (result) => {
            let isExist = result.trim();
            if (isExist === "exist") {
              let talukexistmodal = document.getElementById("talukexistalert");
              let talukexistalertmodal = new bootstrap.Modal(talukexistmodal);
              talukexistalertmodal.show();
              document.getElementById("assign-header").innerHTML = "Below Village is assigned.";
              document.getElementById("existtaluk").innerHTML = `<span class="text-primary fs-4">${villageData.village}</span> is already assigned to maximum coordinators.`;
            }
            else if (isExist === "already_assigned") {
              let talukexistmodal = document.getElementById("talukexistalert");
              let talukexistalertmodal = new bootstrap.Modal(talukexistmodal);
              talukexistalertmodal.show();
              document.getElementById("assign-header").innerHTML = "Already Assigned.";
              document.getElementById("existtaluk").innerHTML = `This coordinator is already assigned to <span class="text-primary fs-4">${villageData.village}</span>.`;
            }
            else {
              if ((currentCoordinatorAssignedCount + selectedtaluks.length) < 4) {
                selectedtaluks.push(villageData);
                let target = document.querySelectorAll(".target");
                let taluks_array = document.getElementById("taluksarray");
                taluks_array.value = JSON.stringify(selectedtaluks);
                let l = target.length;
                for (let i = 0; i < l; i++) {
                  if (target[i].innerText.includes(villageData.village)) {
                    target[i].style.display = "none";
                  }
                }
                // document.getElementById("selectedtalukerror").innerHTML = ""; // Removed as element does not exist
                showTaluks(selectedtaluks);
              }
              else {
                let talukexistmodal = document.getElementById("talukexistalert");
                let talukexistalertmodal = new bootstrap.Modal(talukexistmodal);
                talukexistalertmodal.show();
                document.getElementById("assign-header").innerHTML = "Don't exceed the limit.";
                document.getElementById("existtaluk").innerHTML = "Only four villages are allowed to be assigned.";
              }
            }
          },
          error: function (error) {
            console.error("Error checkExistvillage", error);
          }
        });
      }

      function showTaluks(selectedtaluks) {
        showselectedtaluks.innerHTML = selectedtaluks.map((villageObj, index) => {
          let villageStr = typeof villageObj === 'string' ? villageObj : villageObj.village;
          return `<span class="removetaluk border rounded-pill px-1">${villageStr}&nbsp;<button type="button" onclick='removeTaluk(${index})' style='outline:none;' class='btn rounded-circle btn-close rounded remove-btn'></button></span>`
        }).join("");
      }

      function removeTaluk(index) {
        let villageToRemove = selectedtaluks[index];
        let villageName = typeof villageToRemove === 'string' ? villageToRemove : villageToRemove.village;

        let filteredtaluks = selectedtaluks.filter((value, idx) => { return idx !== index });
        selectedtaluks = filteredtaluks;

        let taluks_array = document.getElementById("taluksarray");
        taluks_array.value = JSON.stringify(selectedtaluks);

        let removetaluk = document.querySelectorAll(".target");
        let l = removetaluk.length;
        for (let i = 0; i < l; i++) {
          if (removetaluk[i].innerText.includes(villageName.trim())) {
            removetaluk[i].style.display = "block";
          }
        }
        showTaluks(selectedtaluks);
      }

      function getMemberdata(data) {
        let memberdata = data.value;
        $.ajax({
          type: "get",
          url: "<?= base_url('AdminDashboard/getMembersforassign') ?>",
          data: { "searchfields": memberdata },
          success: function (result) {
            resultbox.style.display = "block";
            document.getElementById("searchmemberdata").innerHTML = result;
          },
          error: function (error) {
            document.getElementById("searchmemberdata").innerHTML = "Error fetching members";
          }
        });
      }

      function getCoordinatordata(data) {
        let coordBox = document.getElementById("searchcoordinatordata");
        let memberdata = data.value;
        $.ajax({
          type: "get",
          url: "<?= base_url('AdminDashboard/getCoordinatorsforassign') ?>",
          data: { "searchfields": memberdata },
          success: function (result) {
            coordBox.style.display = "block";
            coordBox.innerHTML = result;
          },
          error: function (error) {
            coordBox.innerHTML = "Error fetching coordinators";
          }
        });
      }

      function reassignForcoordinator(member) {
        document.getElementById("coordinatorname").value = member.Name;
        document.getElementById("coordinatorid").value = member.Familymembershipid;
        document.getElementById("searchcoordinatordata").style.display = "none";
      }

      function getCoordinatordataForRemoval(data) {
        let coordBox = document.getElementById("searchcoordinatordataporemoval");
        let memberdata = data.value;
        $.ajax({
          type: "get",
          url: "<?= base_url('AdminDashboard/getCoordinatorsforassign') ?>",
          data: { "searchfields": memberdata },
          success: function (result) {
            // Modifyonclick attribute in the result HTML to call reassignForcoordinatorRemoval
            let customResult = result.replaceAll('reassignForcoordinator(', 'reassignForcoordinatorRemoval(');
            coordBox.style.display = "block";
            coordBox.innerHTML = customResult;
          },
          error: function (error) {
            coordBox.innerHTML = "Error fetching coordinators";
          }
        });
      }

      function reassignForcoordinatorRemoval(member) {
        document.getElementById("coordinatornameremoval").value = member.Name;
        document.getElementById("coordinatoridremoval").value = member.Familymembershipid;
        document.getElementById("searchcoordinatordataporemoval").style.display = "none";
      }

      function getCoordinatorStatus() {
        let coordid = document.getElementById("coordinatoridremoval").value;
        if (!coordid) {
          psShowToast("warning", "Please select a coordinator first.");
          return;
        }

        $.ajax({
          type: "POST",
          url: "<?= base_url('AdminDashboard/getCoordinatorAssignments') ?>",
          data: { "memberid": coordid },
          dataType: 'JSON',
          success: function (response) {
            document.getElementById("coordinatorstatusdisplay").style.display = "block";
            let listArea = document.getElementById("assignmentlist");
            if (response.length === 0) {
              listArea.innerHTML = "<p class='text-muted'>No current assignments found for this coordinator.</p>";
            } else {
              let html = `<table class="table table-sm align-middle">
                        <thead><tr><th>District</th><th>Taluk</th><th>Panchayat</th><th>Village</th><th>Action</th></tr></thead>
                        <tbody>`;
              response.forEach((item, index) => {
                let villageObj = JSON.stringify(item);
                html += `<tr>
                            <td>${item.district_name}</td>
                            <td>${item.taluk_name}</td>
                            <td>${item.panchayat_name}</td>
                            <td>${item.village_name}</td>
                            <td><button type="button" class="btn btn-sm btn-danger" onclick='removeAssignment(${villageObj}, this)'>Remove</button></td>
                        </tr>`;
              });
              html += `</tbody></table>`;
              listArea.innerHTML = html;
            }
          },
          error: function () {
            psShowToast("error", "Error fetching coordinator assignments.");
          }
        });
      }

      function removeAssignment(villageData, btn) {
        document.getElementById("reassign-confirm-alert").innerHTML = `<p>Are you sure you want to remove this coordinator from <span class="text-danger">${villageData.village_name}</span>? <br><b>Note:</b> This will unassign them from this specific village immediately.</p>
        <div class="mt-3"><button class='btn btn-danger' data-bs-dismiss="modal" onclick='confirmRemoveAssignment(${JSON.stringify(villageData)}, this)'>Confirm Remove</button>&nbsp;&nbsp;<button class='btn btn-secondary' data-bs-dismiss="modal">Cancel</button></div>`;

        // Find the button reference in the prompt, this is tricky with string injection. 
        // Let's modify confirmRemoveAssignment to find the row by data or something, 
        // OR just pass the village name and let it refresh/re-fetch.
        // Actually, easiest is to just pass a class or ID to the row.

        let reassign_alert_modal = new bootstrap.Modal(document.getElementById("reassign-alert"));
        reassign_alert_modal.show();
      }

      function confirmRemoveAssignment(villageData, placeholderBtn) {
        let coordid = document.getElementById("coordinatoridremoval").value;
        $.ajax({
          type: "POST",
          url: "<?= base_url('AdminDashboard/reassignCoordinator') ?>",
          data: {
            "memberid": coordid,
            "village": villageData.village_name,
            "panchayat": villageData.panchayat_name,
            "taluk": villageData.taluk_name,
            "district": villageData.district_name
          },
          success: function (result) {
            if (result.trim() === "success") {
              psShowToast("success", `Removed from ${villageData.village_name} successfully.`);
              getCoordinatorStatus(); // Refresh the list
            } else {
              psShowToast("error", "Unexpected error please try again.");
            }
          },
          error: function () {
            psShowToast("error", "Error removing assignment.");
          }
        });
      }

      function assignForcoordinator(member) {
        let membername = document.getElementById("membername");
        let memberid = document.getElementById("memberid");
        let assigned_area_count = member.Assigned_areas_count;
        if (assigned_area_count >= 4) {
          let talukexistmodal = document.getElementById("talukexistalert");
          let talukexistalertmodal = new bootstrap.Modal(talukexistmodal);
          talukexistalertmodal.show();
          document.getElementById("assign-header").innerHTML = "Already assigned 4 Areas.";
          document.getElementById("existtaluk").innerHTML = `Coordinator <span class="text-success">${member.Name}</span> has already been assigned to four areas.`;
        }
        membername.value = member.Name;
        memberid.value = member.Familymembershipid;
        currentCoordinatorAssignedCount = parseInt(member.Assigned_areas_count) || 0;
        document.getElementById("searchmemberdata").style.display = "none";
      }

      function validateAssigncoordinator() {
        let taluk_count = selectedtaluks.length;
        if (taluk_count == 0) {
          psShowAlert("warning", "Selection Required", "Please select at least one village.");
          return false;
        }
        return true;
      }


      function getDistrictsforremove(state) {
        let stateid = state.value;
        $.ajax({
          type: "get",
          url: "<?= base_url('AdminDashboard/getDistrictsfordropdown') ?>",
          data: { "state_id": stateid },
          success: (result) => {
            document.getElementById("districtnames").innerHTML = result;
          },
          error: (error) => {
            document.getElementById("districtnames").innerHTML = "<option>Error fetching districts</option>"
          }
        });
      }

      function getTaluksforremove(district) {
        let districtname = district.value;
        $.ajax({
          type: "post",
          dataType: 'JSON',
          cache: false,
          url: "<?= base_url('AdminDashboard/getTaluksfordropdown') ?>",
          data: { "district_name": districtname },
          success: (result) => {
            let dropdown = document.getElementById("talukidremove");
            dropdown.innerHTML = "<option value=''>Choose Taluk</option>";
            result.forEach(taluk => {
              dropdown.innerHTML += `<option value='${taluk.taluk_name}'>${taluk.taluk_name}</option>`;
            });
          }
        });
      }

      function getPanchayatsforremove(taluk) {
        let talukname = taluk.value;
        $.ajax({
          type: "post",
          dataType: 'JSON',
          cache: false,
          url: "<?= base_url('AdminDashboard/getPanchayatsfordropdown') ?>",
          data: { "taluk_name": talukname },
          success: (result) => {
            let dropdown = document.getElementById("panchayatidremove");
            dropdown.innerHTML = "<option value=''>Choose Panchayat</option>";
            result.forEach(panchayat => {
              dropdown.innerHTML += `<option value='${panchayat.panchayat_name}'>${panchayat.panchayat_name}</option>`;
            });
          }
        });
      }

      function getVillagesforremove(panchayat) {
        let panchayatname = panchayat.value;
        $.ajax({
          type: "post",
          dataType: 'JSON',
          cache: false,
          url: "<?= base_url('AdminDashboard/getVillagesfordropdown') ?>",
          data: { "panchayat_name": panchayatname },
          success: (result) => {
            displayVillageforremove(result);
          },
          error: (error) => {
            document.getElementById("displaytaluksforremove").innerHTML = "Error fetching villages.";
          }
        });
      }

      function displayVillageforremove(result) {
        document.getElementById("displaytaluksforremove").style.display = "block";
        document.getElementById("talukslistforremove").innerHTML = result.map((village, index) => {
          let villageData = JSON.stringify({ village: village.village_name, panchayat: village.panchayat_name, taluk: village.taluk_name, district: village.district_name });
          let ticks = "";
          if (village.assigned_count == 1) {
            ticks = "<span class='float-end text-success'><i class='fa-duotone fa-solid fa-check'></i></span>";
          } else if (village.assigned_count == 2) {
            ticks = "<span class='float-end text-success'><i class='fa-duotone fa-solid fa-check'></i><i class='fa-duotone fa-solid fa-check'></i></span>";
          }
          return `<li class='removetarget' onclick='addVillageforremove(${villageData})' style='outline:none;border:none;'>${village.village_name} ${ticks}</li>`
        }).join("");
      }

      function addVillageforremove(villageData) {
        if (selectedtaluksforremove.length >= 4) {
          let talukexistmodal = document.getElementById("talukexistalert");
          let talukexistalertmodal = new bootstrap.Modal(talukexistmodal);
          talukexistalertmodal.show();
          document.getElementById("assign-header").innerHTML = "Don't exceed the limit.";
          document.getElementById("existtaluk").innerHTML = "Maximum four villages are allowed for reassignment.";
          return;
        }
        selectedtaluksforremove.push(villageData);
        let target = document.querySelectorAll(".removetarget");
        let taluks_array = document.getElementById("taluksarrayforremove");
        taluks_array.value = JSON.stringify(selectedtaluksforremove);
        let l = target.length;
        for (let i = 0; i < l; i++) {
          if (target[i].innerText.includes(villageData.village)) {
            target[i].style.display = "none";
          }
        }
        showTaluksforremove(selectedtaluksforremove);
      }

      function showTaluksforremove(selectedtaluksforremove) {
        showselectedtaluksforremove.innerHTML = selectedtaluksforremove.map((villageObj, index) => {
          let villageStr = typeof villageObj === 'string' ? villageObj : villageObj.village;
          return `<span class="removetaluk border rounded-pill px-1">${villageStr}&nbsp;<button type="button" onclick='removeTalukforremove(${index})' style='outline:none;' class='btn rounded-circle btn-close rounded remove-btn'></button></span>`
        }).join("");
      }

      function removeTalukforremove(index) {
        let villageToRemove = selectedtaluksforremove[index];
        let villageStr = typeof villageToRemove === 'string' ? villageToRemove : villageToRemove.village;

        let filteredtaluks = selectedtaluksforremove.filter((value, idx) => { return idx !== index });
        selectedtaluksforremove = filteredtaluks;

        let taluks_array = document.getElementById("taluksarrayforremove");
        taluks_array.value = JSON.stringify(selectedtaluksforremove);

        let removetaluk = document.querySelectorAll(".removetarget");
        let l = removetaluk.length;
        for (let i = 0; i < l; i++) {
          if (removetaluk[i].innerText.includes(villageStr.trim())) {
            removetaluk[i].style.display = "block";
          }
        }
        showTaluksforremove(selectedtaluksforremove);
      }

      document.getElementById("statusfilter").addEventListener("submit", (event) => {
        event.preventDefault();
        let coordid = document.getElementById("coordinatorid").value;
        let coordname = document.getElementById("coordinatorname").value;
        let villages = JSON.stringify(selectedtaluksforremove);

        if (!coordid || selectedtaluksforremove.length === 0) {
          psShowAlert("warning", "Selection Required", "Please select a coordinator and at least one village.");
          return;
        }


        document.getElementById("reassign-confirm-alert").innerHTML = `<p>Are you sure you want to reassign <span class="text-success">${coordname}</span> as coordinator for the selected village(s)? <br><b>Note:</b> They will be removed from all their current assignments.</p>
             <div><button class='btn btn-success' data-bs-dismiss="modal" onclick='processFullReassignment("${coordid}")'>Confirm Reassign</button>&nbsp;&nbsp;<button class='btn btn-danger' data-bs-dismiss="modal">Cancel</button></div>`;

        let reassign_alert_modal = new bootstrap.Modal(document.getElementById("reassign-alert"));
        reassign_alert_modal.show();
      })

      function processFullReassignment(memberid) {
        let villages = JSON.stringify(selectedtaluksforremove);
        $.ajax({
          type: "POST",
          url: "<?= base_url('AdminDashboard/reassignCoordinatorProcess') ?>",
          data: {
            "memberid": memberid,
            "villages": villages
          },
          success: function (result) {
            if (result.trim() === "success") {
              psShowToast("success", "Coordinator reassigned successfully.");
              setTimeout(() => window.location.reload(), 1500);
            } else {
              psShowToast("error", "Error during reassignment: " + result);
            }
          },
          error: function (err) {
            psShowToast("error", "Server error during reassignment.");
          }
        });
      }

      function setreassignConfirmalert(coordname, memeberid, villageData, id) {
        document.getElementById("reassign-confirm-alert").innerHTML = `<p>Are you sure remove <span class="text-success">${coordname}</span> from coordinator role for <span class="text-danger">${villageData.village}</span> village.</p>
      <div><button class='btn btn-success' data-bs-dismiss="modal" onclick='reassignCoordinator("${coordname}","${memeberid}",${JSON.stringify(villageData)},"${id}")'>Confirm</button>&nbsp;&nbsp;<button class='btn btn-danger' data-bs-dismiss="modal">Cancel</button></div>`;
      }

      function reassignCoordinator(coordname, memberid, villageData, id) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('AdminDashboard/reassignCoordinator') ?>",
          data: {
            "memberid": memberid,
            "village": villageData.village,
            "panchayat": villageData.panchayat,
            "taluk": villageData.taluk,
            "district": villageData.district
          },
          success: function (result) {
            let reassign_table = document.getElementById(id);
            if (result.trim() === "success") {
              reassign_table.innerHTML += `&nbsp;<span class='text-success fw-bold rounded'>Successfully removed.</span>`;
            }
            else {
              reassign_table.innerHTML += `&nbsp;<span class='text-danger rounded'>Unexpected error please try again.</span>`;
            }
            // setTimeout(function(){
            //     window.location.reload(); 
            // }, 1500);
          },
          error: function (error) {
            console.error("Error reassignCoordinator:", error);
          }
        });
      }

      function pageRefresh() {
        window.location.reload();
      }

      function handleRemoveVillageSubmit() {
        const village = document.getElementById('villageiddelete').value;
        if (!village) {
          psShowToast("warning", "Please select a village to remove.");
          return;
        }
        psConfirm(
          'Are you sure you want to delete this village? This action cannot be undone.',
          () => document.getElementById('removevillageform').submit(),
          'Delete Village',
          'danger'
        );
      }

      // Handle outside clicks to close lists
      window.onclick = (event) => {
        let displaytaluks = document.getElementById("displaytaluks");
        let choosetaluks = document.getElementById("choosetaluks");
        if (displaytaluks && !displaytaluks.contains(event.target) && !choosetaluks.contains(event.target)) {
          displaytaluks.style.display = "none";
        }

        let displaytaluksforremove = document.getElementById("displaytaluksforremove");
        let choosetaluksforremove = document.getElementById("choosetaluksforremove");
        if (displaytaluksforremove && !displaytaluksforremove.contains(event.target) && !choosetaluksforremove.contains(event.target)) {
          displaytaluksforremove.style.display = "none";
        }

        // Member search result box
        if (event.target !== resultbox && event.target !== document.getElementById("membername")) {
          if (resultbox) resultbox.style.display = "none";
        }

        // Reassign Coordinator search result box
        let coordBoxReassign = document.getElementById("searchcoordinatordata");
        if (event.target !== coordBoxReassign && event.target !== document.getElementById("coordinatorname")) {
          if (coordBoxReassign) coordBoxReassign.style.display = "none";
        }

        // Remove Coordinator search result box
        let coordBoxRemoval = document.getElementById("searchcoordinatordataporemoval");
        if (event.target !== coordBoxRemoval && event.target !== document.getElementById("coordinatornameremoval")) {
          if (coordBoxRemoval) coordBoxRemoval.style.display = "none";
        }
      }

      $(document).ready(function () {
        if (document.getElementById('stateid')) getDistricts(document.getElementById('stateid'));
        if (document.getElementById('stateidremove')) getDistrictsforremove(document.getElementById('stateidremove'));
        if (document.getElementById('stateidadd')) getDistrictsforadd(document.getElementById('stateidadd'));
        if (document.getElementById('stateiddelete')) getDistrictsfordelete(document.getElementById('stateiddelete'));
      });

      function getDistrictsforadd(state) {
        let stateid = state.value;
        $.ajax({
          type: "get",
          url: "<?= base_url('AdminDashboard/getDistrictsfordropdown') ?>",
          data: { "state_id": stateid },
          success: (result) => {
            document.getElementById("districtnamesadd").innerHTML = result;
          },
          error: (error) => {
            document.getElementById("districtnamesadd").innerHTML = "<option>Error fetching districts</option>"
          }
        });
      }

      function getTaluksforadd(district) {
        let districtname = district.value;
        $.ajax({
          type: "post",
          dataType: 'JSON',
          cache: false,
          url: "<?= base_url('AdminDashboard/getTaluksfordropdown') ?>",
          data: { "district_name": districtname },
          success: (result) => {
            let dropdown = document.getElementById("talukidadd");
            dropdown.innerHTML = "<option value=''>Choose Taluk</option>";
            result.forEach(taluk => {
              dropdown.innerHTML += `<option value='${taluk.taluk_name}'>${taluk.taluk_name}</option>`;
            });
            dropdown.innerHTML += "<option value='add_new_taluk' class='fw-bold text-primary'>+ Add New Taluk</option>";

            // Reset manual inputs
            document.getElementById('talukmanual').style.display = 'none';
            document.getElementById('talukmanual').required = false;

            // Reset panchayat
            document.getElementById("panchayatidadd").innerHTML = "<option value=''>Choose Panchayat</option>";
            document.getElementById('panchayatmanual').style.display = 'none';
          }
        });
      }

      function checkTalukSelect(selectObj) {
        if (selectObj.value === 'add_new_taluk') {
          document.getElementById('talukmanual').style.display = 'block';
          document.getElementById('talukmanual').required = true;

          // If Manual Taluk, Panchayat must also be manual or new
          let panchayatDropdown = document.getElementById("panchayatidadd");
          panchayatDropdown.innerHTML = "<option value='add_new_panchayat'>+ Add New Panchayat</option>";
          panchayatDropdown.value = 'add_new_panchayat'; // Auto select
          checkPanchayatSelect(panchayatDropdown); // Trigger logic
        } else {
          document.getElementById('talukmanual').style.display = 'none';
          document.getElementById('talukmanual').required = false;
          getPanchayatsforadd(selectObj);
        }
      }

      function getPanchayatsforadd(taluk) {
        let talukname = taluk.value;
        $.ajax({
          type: "post",
          dataType: 'JSON',
          cache: false,
          url: "<?= base_url('AdminDashboard/getPanchayatsfordropdown') ?>",
          data: { "taluk_name": talukname },
          success: (result) => {
            let dropdown = document.getElementById("panchayatidadd");
            dropdown.innerHTML = "<option value=''>Choose Panchayat</option>";
            result.forEach(panchayat => {
              dropdown.innerHTML += `<option value='${panchayat.panchayat_name}'>${panchayat.panchayat_name}</option>`;
            });
            dropdown.innerHTML += "<option value='add_new_panchayat' class='fw-bold text-primary'>+ Add New Panchayat</option>";

            // Reset manual input
            document.getElementById('panchayatmanual').style.display = 'none';
            document.getElementById('panchayatmanual').required = false;
          }
        });
      }

      function checkPanchayatSelect(selectObj) {
        if (selectObj.value === 'add_new_panchayat') {
          document.getElementById('panchayatmanual').style.display = 'block';
          document.getElementById('panchayatmanual').required = true;
        } else {
          document.getElementById('panchayatmanual').style.display = 'none';
          document.getElementById('panchayatmanual').required = false;
        }
      }

      function getDistrictsfordelete(state) {
        let stateid = state.value;
        $.ajax({
          type: "get",
          url: "<?= base_url('AdminDashboard/getDistrictsfordropdown') ?>",
          data: { "state_id": stateid },
          success: (result) => {
            document.getElementById("districtnamesdelete").innerHTML = result;
          },
          error: (error) => {
            document.getElementById("districtnamesdelete").innerHTML = "<option>Error fetching districts</option>"
          }
        });
      }

      function getTaluksfordelete(district) {
        let districtname = district.value;
        $.ajax({
          type: "post",
          dataType: 'JSON',
          cache: false,
          url: "<?= base_url('AdminDashboard/getTaluksfordropdown') ?>",
          data: { "district_name": districtname },
          success: (result) => {
            let dropdown = document.getElementById("talukiddelete");
            dropdown.innerHTML = "<option value=''>Choose Taluk</option>";
            result.forEach(taluk => {
              dropdown.innerHTML += `<option value='${taluk.taluk_name}'>${taluk.taluk_name}</option>`;
            });
          }
        });
      }

      function getPanchayatsfordelete(taluk) {
        let talukname = taluk.value;
        $.ajax({
          type: "post",
          dataType: 'JSON',
          cache: false,
          url: "<?= base_url('AdminDashboard/getPanchayatsfordropdown') ?>",
          data: { "taluk_name": talukname },
          success: (result) => {
            let dropdown = document.getElementById("panchayatiddelete");
            dropdown.innerHTML = "<option value=''>Choose Panchayat</option>";
            result.forEach(panchayat => {
              dropdown.innerHTML += `<option value='${panchayat.panchayat_name}'>${panchayat.panchayat_name}</option>`;
            });
          }
        });
      }

      function getVillagesfordelete(panchayat) {
        let panchayatname = panchayat.value;
        $.ajax({
          type: "post",
          dataType: 'JSON',
          cache: false,
          url: "<?= base_url('AdminDashboard/getVillagesfordropdown') ?>",
          data: { "panchayat_name": panchayatname },
          success: (result) => {
            let dropdown = document.getElementById("villageiddelete");
            dropdown.innerHTML = "<option value=''>Choose Village</option>";
            result.forEach(village => {
              dropdown.innerHTML += `<option value='${village.village_name}'>${village.village_name}</option>`;
            });
          }
        });
      }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>

</body>

</html>