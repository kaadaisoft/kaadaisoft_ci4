<style>
      .icon{
        color:grey;
      }
      #menu-bar {
        /* overflow-y: auto !important; */
        scrollbar-width: thin;
      }
      #menu-bar::-webkit-scrollbar {
        width: 5px;
      }
      #menu-bar::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
      }
</style>

<ul id="icons" style="font-size:18px; padding-bottom: 80px;" class="d-flex flex-column list-unstyled">

<!-- <li id="hidename" class="nav-item py-3 fs-6"><a href="#" style="font-weight:400;color:grey;" class="d-flex p-2 text-decoration-none">MENU</a></li> -->

<li class="nav-item py-2">
<a href="<?=base_url('admindashboard')?>" style="outline:none;border:none;color:black;" name="dashboard" class="active-dash w-100 rounded-3 p-2 text-decoration-none d-flex align-items-center">
<span class="icon"><i class="fa-solid fa-chart-simple"></i></span>&nbsp;&nbsp;Dashboard</a></li>

<li <?php if(session()->get('role') != 1){ echo "hidden";}?> class="nav-item py-2">
  <a href="<?=base_url('view-manager-data')?>" style="outline:none;border:none;color:black;" class="active-managers p-2 text-decoration-none d-flex align-items-center"><span class="icon"><i class="fa-solid fa-user-tie"></i></span>&nbsp;&nbsp;Managers</a></li>

<li <?php if(session()->get('role') == 3){ echo "hidden";}?> class="nav-item py-2">
  <a href="<?php if(session()->get('role') == 2) {echo base_url('view-coordinator-data');} else{echo base_url('coordinators');}?>" style="outline:none;border:none;color:black;" class="active-coords p-2 text-decoration-none d-flex align-items-center"><span class="icon"><i class="fa-sharp fa-solid fa-cart-shopping"></i></span>&nbsp;&nbsp;Coordinators</a></li>

<li class="nav-item py-2"><a href="<?php if(session()->get('role') == 3) {echo base_url('view-member-data');} else{echo base_url('members');}?>" style="color:black;" class="active-members p-2 text-decoration-none d-flex align-items-center"><span class="icon"><i class="fa-solid fa-user-group"></i></span>&nbsp;&nbsp;Members</a></li>

<li class="nav-item py-2"><a href="<?=base_url("events")?>" style="color:black;" class="active-events p-2 text-decoration-none d-flex align-items-center"><span class="icon"><i class="fa-solid fa-list"></i></span>&nbsp;&nbsp;Events</a></li>

<li class="nav-item py-2">
  <a href="<?php if(session()->get('role') == 3) {echo base_url('payment-receipt-list');} else{echo base_url('paymentpage');}?>" style="color:black;" class="active-payments p-2 text-decoration-none d-flex align-items-center"><span class="icon"><i class="fa-regular fa-credit-card"></i></span>&nbsp;&nbsp;Payments</a></li>

<li <?php if(session()->get('role') != 1){ echo "hidden";}?> class="nav-item py-2"><a href="<?=base_url("reports")?>" style="color:black;" class="active-reports p-2 text-decoration-none d-flex align-items-center"><span class="icon"><i class="fa-solid fa-list"></i></span>&nbsp;&nbsp;Reports</a></li>

<li <?php if(session()->get('role') == 3){ echo "hidden";}?> class="nav-item py-2"><a href="<?=base_url("view-member-update-requests")?>" style="color:black;" class="active-updaterequests p-2 text-decoration-none d-flex align-items-center"><span class="icon"><i class="fa-solid fa-user-pen"></i></span>&nbsp;&nbsp;Update Requests</a></li>


<li class="nav-item py-2">
  <a href="<?=base_url('logout')?>" style="color:black;" class="p-2 text-decoration-none d-flex align-items-center"><span class="icon"><i class="fa-solid fa-power-off"></i></span>&nbsp;&nbsp;Logout</a></li>

</ul>
