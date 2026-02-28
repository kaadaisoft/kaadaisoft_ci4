<style>
      #menu-bar {
        background-color: #0f172a !important; /* Premium Dark Blue */
        scrollbar-width: thin;
        box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
      }
      #menu-bar::-webkit-scrollbar {
        width: 5px;
      }
      #menu-bar::-webkit-scrollbar-thumb {
        background: #334155;
        border-radius: 10px;
      }

      /* Global Mobile Menu Overrides */
      #custom-mobile-menu {
        background-color: #0f172a !important; /* Match dark theme */
      }
      #custom-mobile-menu .close-btn {
        color: #cbd5e1 !important;
        transition: 0.3s;
      }
      #custom-mobile-menu .close-btn:hover {
        color: #ffffff !important;
        transform: scale(1.1);
      }

      .nav-item a {
        color: #cbd5e1 !important; /* Light Gray/Blue Text */
        transition: all 0.3s ease;
        padding: 10px 15px !important;
        margin: 4px 10px;
        border-radius: 8px;
      }

      .nav-item a:hover {
        background-color: rgba(255, 255, 255, 0.08) !important;
        color: #ffffff !important;
        transform: translateX(4px);
      }

      .icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        transition: transform 0.3s ease;
      }
      .nav-item a:hover .icon {
        transform: scale(1.15);
      }
      
      /* Active state overrides */
      .active-dash, .active-managers, .active-coords, .active-members, .active-events, .active-payments, .active-reports, .active-updaterequests {
        background-color: rgba(56, 189, 248, 0.15) !important;
        color: #ffffff !important;
        border-left: 3px solid #38bdf8 !important;
      }

      /* Premium Icon Context Colors tailored for Dark Background */
      .icon-dash { color: #38bdf8; }        /* Light Blue */
      .icon-managers { color: #c084fc; }    /* Light Purple */
      .icon-coords { color: #34d399; }      /* Light Mint */
      .icon-members { color: #bae6fd; }     /* Soft Sky Blue */
      .icon-events { color: #fde047; }      /* Light Yellow */
      .icon-payments { color: #2dd4bf; }    /* Light Teal */
      .icon-reports { color: #a78bfa; }     /* Light Indigo */
      .icon-updates { color: #fb923c; }     /* Light Orange */
      .icon-logout { color: #f87171; }      /* Light Red */

</style>

<ul id="icons" style="font-size:16px; padding-bottom: 80px;" class="d-flex flex-column list-unstyled mt-3">

<li class="nav-item">
<a href="<?=base_url('admindashboard')?>" style="outline:none;border:none;" name="dashboard" class="active-dash text-decoration-none d-flex align-items-center">
<span class="icon icon-dash"><i class="fa-solid fa-chart-simple"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Dashboard</span></a></li>

<li <?php if(session()->get('role') != 1){ echo "hidden";}?> class="nav-item">
  <a href="<?=base_url('view-manager-data')?>" style="outline:none;border:none;" class="active-managers text-decoration-none d-flex align-items-center"><span class="icon icon-managers"><i class="fa-solid fa-user-tie"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Managers</span></a></li>

<li <?php if(session()->get('role') == 3){ echo "hidden";}?> class="nav-item">
  <a href="<?php if(session()->get('role') == 2) {echo base_url('view-coordinator-data');} else{echo base_url('coordinators');}?>" style="outline:none;border:none;" class="active-coords text-decoration-none d-flex align-items-center"><span class="icon icon-coords"><i class="fa-sharp fa-solid fa-cart-shopping"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Coordinators</span></a></li>

<li class="nav-item"><a href="<?php if(session()->get('role') == 3) {echo base_url('view-member-data');} else{echo base_url('members');}?>" class="active-members text-decoration-none d-flex align-items-center"><span class="icon icon-members"><i class="fa-solid fa-user-group"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Members</span></a></li>

<li class="nav-item"><a href="<?=base_url("events")?>" class="active-events text-decoration-none d-flex align-items-center"><span class="icon icon-events"><i class="fa-solid fa-list"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Events</span></a></li>

<li class="nav-item">
  <a href="<?php if(session()->get('role') == 3) {echo base_url('payment-receipt-list');} else{echo base_url('paymentpage');}?>" class="active-payments text-decoration-none d-flex align-items-center"><span class="icon icon-payments"><i class="fa-regular fa-credit-card"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Payments</span></a></li>

<li <?php if(session()->get('role') != 1){ echo "hidden";}?> class="nav-item"><a href="<?=base_url("reports")?>" class="active-reports text-decoration-none d-flex align-items-center"><span class="icon icon-reports"><i class="fa-solid fa-file-invoice"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Reports</span></a></li>

<li <?php if(session()->get('role') == 3){ echo "hidden";}?> class="nav-item"><a href="<?=base_url("view-member-update-requests")?>" class="active-updaterequests text-decoration-none d-flex align-items-center"><span class="icon icon-updates"><i class="fa-solid fa-user-pen"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Update Requests</span></a></li>

<li class="nav-item border-top border-secondary mt-3 pt-3">
  <a href="<?=base_url('logout')?>" class="text-decoration-none d-flex align-items-center"><span class="icon icon-logout"><i class="fa-solid fa-power-off"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Logout</span></a></li>

</ul>
