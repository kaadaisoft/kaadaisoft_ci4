<style>
      #menu-bar {
        background-color: #0f172a !important; /* Premium Dark Blue */
        scrollbar-width: thin;
        box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        padding: 0 !important;
      }

      @media screen and (min-width: 769px) {
        #menu-bar, #ps-logo {
          width: 260px !important;
          min-width: 260px !important;
          flex: 0 0 260px !important;
        }
        /* Target the main content area that follows the menu bar */
        #menu-bar + div, #search-bar {
          flex: 1 !important;
          width: auto !important;
        }
      }
      #menu-bar::-webkit-scrollbar {
        display: none;
        width: 0px;
      }
      #menu-bar {
        -ms-overflow-style: none;
        scrollbar-width: none;
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
        white-space: nowrap;
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
      
      /* Old Design 'Box' style for all menu items */
      .nav-item a {
        color: #cbd5e1 !important; /* Light Gray/Blue Text */
        transition: all 0.3s ease;
        padding: 10px 15px !important;
        margin: 4px 10px;
        border-radius: 8px;
        white-space: nowrap;
        background-color: rgba(255, 255, 255, 0.1) !important; /* Visible box look */
        display: flex;
        align-items: center;
        border: 1px solid rgba(255, 255, 255, 0.05);
      }

      .nav-item a:hover {
        background-color: rgba(255, 255, 255, 0.15) !important;
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
      
      /* Active state - Old Design Black Box */
      .active-menu-item {
        background-color: #000000 !important; 
        color: #ffffff !important;
        box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        border-radius: 8px;
      }

      /* Premium Icon Context Colors */
      .icon-dash { color: #38bdf8; }
      .icon-managers { color: #c084fc; }
      .icon-coords { color: #34d399; }
      .icon-members { color: #bae6fd; }
      .icon-events { color: #fde047; }
      .icon-payments { color: #2dd4bf; }
      .icon-reports { color: #a78bfa; }
      .icon-updates { color: #fb923c; }
      .icon-logout { color: #f87171; }

</style>

<ul id="sidemenu-nav" style="font-size:16px; padding-bottom: 80px;" class="d-flex flex-column list-unstyled mt-3">

<li class="nav-item">
<a href="<?=base_url('admindashboard')?>" style="outline:none;border:none;" name="dashboard" class="text-decoration-none">
<span class="icon icon-dash"><i class="fa-solid fa-chart-simple"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Dashboard</span></a></li>

<li <?php if(session()->get('role') != 1){ echo "hidden";}?> class="nav-item">
  <a href="<?=base_url('view-manager-data')?>" style="outline:none;border:none;" class="text-decoration-none"><span class="icon icon-managers"><i class="fa-solid fa-user-tie"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Managers</span></a></li>

<li <?php if(session()->get('role') == 3){ echo "hidden";}?> class="nav-item">
  <a href="<?php if(session()->get('role') == 2) {echo base_url('view-coordinator-data');} else{echo base_url('coordinators');}?>" style="outline:none;border:none;" class="text-decoration-none"><span class="icon icon-coords"><i class="fa-sharp fa-solid fa-cart-shopping"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Coordinators</span></a></li>

<li class="nav-item"><a href="<?php if(session()->get('role') == 3) {echo base_url('view-member-data');} else{echo base_url('members');}?>" class="text-decoration-none"><span class="icon icon-members"><i class="fa-solid fa-user-group"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Members</span></a></li>

<li class="nav-item"><a href="<?=base_url("events")?>" class="text-decoration-none"><span class="icon icon-events"><i class="fa-solid fa-list"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Events</span></a></li>

<li class="nav-item">
  <a href="<?php if(session()->get('role') == 3) {echo base_url('payment-receipt-list');} else{echo base_url('paymentpage');}?>" class="text-decoration-none"><span class="icon icon-payments"><i class="fa-regular fa-credit-card"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Payments</span></a></li>

<li <?php if(session()->get('role') != 1){ echo "hidden";}?> class="nav-item"><a href="<?=base_url("reports")?>" class="text-decoration-none"><span class="icon icon-reports"><i class="fa-solid fa-file-invoice"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Reports</span></a></li>

<li <?php if(session()->get('role') == 3){ echo "hidden";}?> class="nav-item"><a href="<?=base_url("view-member-update-requests")?>" class="text-decoration-none"><span class="icon icon-updates"><i class="fa-solid fa-user-pen"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Update Requests</span></a></li>

<li class="nav-item border-top border-secondary mt-3 pt-3">
  <a href="<?=base_url('logout')?>" class="text-decoration-none"><span class="icon icon-logout"><i class="fa-solid fa-power-off"></i></span>&nbsp;&nbsp;<span class="fw-semibold">Logout</span></a></li>

</ul>

<script>
// Logic to highlight current page
(function() {
    function highlight() {
        // Use full URL or pathname for more accurate matching
        const currentUrl = window.location.href;
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('#sidemenu-nav .nav-item a');
        
        let found = false;

        // Try exact match first
        navLinks.forEach(link => {
            if (link.href === currentUrl || link.href === window.location.origin + currentPath) {
                link.classList.add('active-menu-item');
                found = true;
            }
        });

        // Try partial match if no exact match
        if (!found) {
            navLinks.forEach(link => {
                const linkUrl = new URL(link.href);
                if (linkUrl.pathname.length > 1 && currentPath.includes(linkUrl.pathname)) {
                    link.classList.add('active-menu-item');
                    found = true;
                }
            });
        }
    }
    highlight();
    setTimeout(highlight, 100);
})();
</script>
