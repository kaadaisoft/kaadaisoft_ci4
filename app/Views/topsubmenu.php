<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>top-sub-menu</title>
</head>
<body>

<ul class="d-flex flex-column list-unstyled">

<li class="nav-item py-3">

<div style="display:flex;align-items:baseline;justify-content:self-start;" class="col-md-3">

<button style="outline-style:none;" class="drop-down-toggle border-0 d-flex align-items-center bg-white" data-bs-toggle="dropdown">
<span class="p-1 px-2 ps-user rounded-circle"><i class="fa-solid fa-user"></i></span>&nbsp;&nbsp;
<span style="font-weight:500;">
<?php $name = $_SESSION['name'];
if($name){echo $name ;}else{echo "Manager Name";}?></span>&nbsp;&nbsp;
<i class="fa-solid fa-angle-down"></i>

</button>

<span><i class="fa-solid fa-bell"></i> </span>
</div>
</li>

<li id="hidename" class="nav-item py-3 fs-6"><a href="#" style="font-weight:400;color:grey;" class="d-flex p-2 text-decoration-none">MENU</a></li>

<li class="nav-item py-2">
<a href="<?=base_url('dashboard')?>" style="outline:none;border:none;color:black;" name="dashboard" class="active-dash w-100 rounded-3 p-2 text-decoration-none d-flex align-items-center">
<i class="fa-solid fa-chart-simple"></i>&nbsp;&nbsp;Dashboard</a></li>

<li class="nav-item py-2">
  <a href="<?=base_url('coordinators')?>" style="outline:none;border:none;color:black;" class="active-coords p-2 text-decoration-none d-flex align-items-center"><i class="fa-sharp fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Coordinators</a></li>

<li class="nav-item py-2"><a href="<?=base_url('members')?>" style="color:black;" class="active-members p-2 text-decoration-none d-flex align-items-center"><i class="fa-solid fa-user-group"></i>&nbsp;&nbsp;Members</a></li>

<li class="nav-item py-2"><a href="<?=base_url("events")?>" style="color:black;" class="active-events p-2 text-decoration-none d-flex align-items-center"><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Events</a></li>

<li class="nav-item py-2">
  <a href="#" style="color:black;" class="payments p-2 text-decoration-none d-flex align-items-center"><i class="fa-regular fa-credit-card"></i>&nbsp;&nbsp;Payments</a></li>

<!-- <li class="nav-item py-2"><a href="#" style="color:black;" class="p-2 text-decoration-none d-flex align-items-center"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Donation</a></li> -->

<li class="nav-item py-2"><a href="<?=base_url("reports")?>" style="color:black;" class="active-reports p-2 text-decoration-none d-flex align-items-center"><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Reports</a></li>

<li class="nav-item py-2">
  <a href="<?=base_url('dashboard/logout')?>" style="color:black;" class="p-2 text-decoration-none d-flex align-items-center"><i class="fa-solid fa-power-off"></i>&nbsp;&nbsp;Logout</a></li>

</ul>
</body>
</html>
