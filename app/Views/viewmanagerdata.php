<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Details</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>  
    <style>
      .ps-logo{
        display:flex;
        align-items:center;
        justify-content:center;
      }

     .ps-gray{
        background-color: rgb(248, 245, 245);
     }

     .heading-kaadaisoft{
        color: rgb(120, 50, 186);
        font-weight:800;
        font-family:sans-serif;
     }

     .icon{
        color:grey;
     }

     .ps-letter{
        background-color: rgb(120, 50, 186);
     }

     .ps-user{
        background-color: rgb(254, 213, 163);
     }

     .active-managers {
        background-color: rgb(230, 230, 230);
        font-weight: 600;
     }

     #search-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
     }

     .ham-menu {
        border: none;
        outline: none;
        background: none;
     }

     @media screen and (max-width:768px) {
           #search-bar {
            background-color: white !important;
            flex: none;
           }
           #menu-bar {
            display: none;
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
          padding-top: 60px;
      }
      
      #menu-bar {
        overflow-y: auto !important;
        scrollbar-width: thin;
      }
      #menu-bar::-webkit-scrollbar {
        width: 5px;
      }
      #menu-bar::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
      }

      .dead-member-row, .dead-member-row td, .dead-member-row th {
        background-color: #f5f5f5 !important;
        color: #999 !important;
        opacity: 0.7;
      }
    </style>
</head>
<body>
        
<div id="pageheight" class="container-fluid" style="overflow:hidden;position:absolute;">

      <div id="side-bar" class="row"><!-----top-bar--------------->
      <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3"></div>
      <div id="search-bar" class="col-md-10 border-bottom"></div>
      </div><!-----------top-bar-end----------------------->

        <div id="pagecontrol" class="row"><!----------main-navbar----------->
        <div id="menu-bar" style="height:inherit;" class="col-md-2 ps-gray"></div>
            
        <div id="changepage" style="height:inherit;overflow:auto;" class="col-md-10"><!-----------main-dashboard------------------------->

<!---------------------view-manager-status-notifications---------------------->
<style>
    .custom-toast {
        position: fixed;
        top: 20px;
        right: -400px;
        min-width: 320px;
        padding: 16px 24px;
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
        gap: 16px;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        z-index: 9999;
        border-left: 6px solid #43a047;
    }
    .custom-toast.error { border-left-color: #e53935; }
    .toast-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-shrink: 0;
    }
    .toast-icon.success { background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%); }
    .toast-icon.error { background: linear-gradient(135deg, #e53935 0%, #c62828 100%); }
    .toast-content { flex-grow: 1; }
    .toast-title { font-weight: 700; margin-bottom: 2px; }
    .toast-msg { font-size: 0.9rem; color: #666; font-weight: 500; }
    .toast-close { cursor: pointer; color: #ccc; transition: color 0.2s; }
    .toast-close:hover { color: #333; }
</style>

<div id="managernotify" class="custom-toast">
    <div id="notify-icon-bg" class="toast-icon success">
        <i id="notify-icon" class="bi bi-check-lg" style="font-size: 1.2rem;"></i>
    </div>
    <div class="toast-content">
        <div id="notify-title" class="toast-title text-success">Success</div>
        <div id="notify-msg" class="toast-msg"></div>
    </div>
    <i class="bi bi-x-lg toast-close" onclick="hideNotification()"></i>
</div>

<script>
    function showNotification(type, message) {
        const toast = document.getElementById('managernotify');
        const iconBg = document.getElementById('notify-icon-bg');
        const icon = document.getElementById('notify-icon');
        const title = document.getElementById('notify-title');
        const msg = document.getElementById('notify-msg');

        if (type === 'success') {
            toast.classList.remove('error');
            iconBg.className = 'toast-icon success';
            icon.className = 'bi bi-check-lg';
            title.innerText = 'Success';
            title.className = 'toast-title text-success';
            toast.style.borderLeftColor = '#43a047';
        } else {
            toast.classList.add('error');
            iconBg.className = 'toast-icon error';
            icon.className = 'bi bi-exclamation-circle';
            title.innerText = 'Error';
            title.className = 'toast-title text-danger';
            toast.style.borderLeftColor = '#e53935';
        }

        msg.innerHTML = message;
        toast.style.right = '20px';

        setTimeout(hideNotification, 5000);
    }

    function hideNotification() {
        document.getElementById('managernotify').style.right = '-400px';
    }

    $(document).ready(function() {
        <?php if(isset($_SESSION["managersuccessstatus"])): ?>
            showNotification('success', '<?= $_SESSION["managersuccessstatus"] ?>');
            <?php unset($_SESSION["managersuccessstatus"]); ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["managererrorstatus"])): ?>
            showNotification('error', '<?= $_SESSION["managererrorstatus"] ?>');
            <?php unset($_SESSION["managererrorstatus"]); ?>
        <?php endif; ?>
    });
</script>
<!---------------------view-manager-status-end---------------------->

          <?php if(isset($manager)):?>
            <div class="container-fluid px-4 py-4">   
            <h3 style="font-weight:500;">Manager Details:</h3> 
            <div class="row mt-4">
              <div class="col-md-4">
                  <img style="width:200px;height:200px;object-fit:cover;border-radius:10px;" src="<?= base_url('assets/membersdocuments/' . $manager->Memberimage) ?>" alt="Manager Image">
                  
                  <div style="gap:10px;" class="row mt-4 pb-3">
                     <button style="width:fit-content;" onclick="showupdatemanagermodal('<?=trim($manager->Familymembershipid)?>')" class='btn btn-primary fw-bold'>Update Details</button>
                      <a href="<?= base_url('add_family_member'); ?>" style="width:fit-content;" class="btn btn-primary fw-bold">Add Family Member</a>
                  </div>
              </div>  
              <div class="col-md-8">
            <table id="manager_data" class="table table-bordered border-dark">
                <thead>
                    <tr><th width="30%">Name:</th><td class="text-primary fw-bold"><?=$manager->Name?></td></tr>
                    <tr><th>Familymembershipid:</th><td class="text-primary fw-bold"><?=$manager->Familymembershipid?></td></tr>
                    <tr><th style="vertical-align:middle;">Address:</th>
                        <td>
                        <ul class="list-unstyled mb-0">
                        <li><?=$manager->Doornumber?></li>
                        <li><?=$manager->Street?></li>
                        <li><?=$manager->Village?></li>
                        <li><?=$manager->Taluk?></li>
                        <li><?=$manager->District?> - <?=$manager->Pincode?></li>
                        <li><?=$manager->State?></li>
                        </ul>
                        </td>
                    </tr>
                </thead>
            </table>
            </div>  
            </div> 
            
            
            <?php if(isset($family_members) && !empty($family_members)): ?>
            <div class="row mt-5">
                <div class="col-12">
                    <h4 style="font-weight:500;">Family Members</h4>
                    <table class="table table-bordered border-dark mt-3">
                        <thead class="ps-gray">
                            <tr>
                                <th>Name</th>
                                <th>Relationship</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $role_counts = [];
                                foreach($family_members as $fm) {
                                    $role = $fm->MemberRole;
                                    $role_counts[$role] = ($role_counts[$role] ?? 0) + 1;
                                }
                                $role_counters = [];
                                
                                foreach($family_members as $fm): 
                                    $dob = new DateTime($fm->Dob);
                                    $now = new DateTime();
                                    $age = $now->diff($dob)->y;
                                    
                                    $role = $fm->MemberRole;
                                    $display_role = $role;
                                    if (isset($role_counts[$role]) && $role_counts[$role] > 1) {
                                        $role_counters[$role] = ($role_counters[$role] ?? 0) + 1;
                                        $display_role .= '_' . $role_counters[$role];
                                    }
                            ?>
                                <tr class="<?= (isset($fm->is_dead) && $fm->is_dead == 1) ? 'dead-member-row' : '' ?>">
                                    <td><?= $fm->Name ?></td>
                                    <td><?= $display_role ?></td>
                                    <td><?= $fm->Gender ?></td>
                                    <td><?= $age ?></td>
                                    <td>
                                        <?php if(!(isset($fm->is_dead) && $fm->is_dead == 1)): ?>
                                            <button style="width:fit-content;" onclick="showupdatemanagermodal('<?=trim($fm->Familymembershipid)?>')" class='btn btn-sm btn-primary fw-bold'>Edit</button>
                                        <?php else: ?>
                                            <button style="width:fit-content;" class='btn btn-sm btn-secondary fw-bold' disabled>Edit</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
            </div> 
          <?php endif;?>       
        </div>
        </div>
  </div>

<!---------------------Custom Mobile Menu-------------------------->
<div id="custom-mobile-menu">
    <div class="close-btn" onclick="closeMobileMenu()">&times;</div>
    <div id="mobile-menu-content"></div>
</div>

<!------------------------Update-Manager-modal-------------------------------------------->
<div id="updatemanager-modal-hide" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 10000; overflow-y: auto;">
    <div id="update-manager-section" style="width: 90%; margin: 2% auto; background: #fff; border-radius: 20px; padding: 20px; position: relative;">
        <div id="update-manager-form"></div>
        <button class="btn btn-danger mt-3" onclick="hideupdatemanagermodal()">Close</button>
    </div>
</div>

<script>
      let pageheight = window.innerHeight;
      document.getElementById("pageheight").style.height = pageheight+"px";
      
      function updateHeights() {
          let currentHeight = window.innerHeight;
          let topBarHeight = document.getElementById("side-bar").getBoundingClientRect().height;
          let viewHeight = currentHeight - topBarHeight;
          document.getElementById("menu-bar").style.height = viewHeight + "px";
          document.getElementById("changepage").style.height = viewHeight + "px";
      }

      window.addEventListener('resize', updateHeights);

      function openMobileMenu() {
        document.getElementById('custom-mobile-menu').style.display = 'block';
      }
      
      function closeMobileMenu() {
        document.getElementById('custom-mobile-menu').style.display = 'none';
      }

      function showupdatemanagermodal(id) {
          $.ajax({
              type: "get",
              url: "admindashboard/getmanager",
              data: { "id": id },
              success: (result) => {
                  $("#update-manager-form").html(result);
                  document.getElementById("updatemanager-modal-hide").style.display = 'block';
              }
          });
      }

      function hideupdatemanagermodal() {
          document.getElementById("updatemanager-modal-hide").style.display = 'none';
      }

      function hideupdatemanagerform() {
          hideupdatemanagermodal();
      }

      $.ajax({
          type: "get",
          url: "<?= base_url('dashboard/sidemenu') ?>",
          success: (result) => {
              document.getElementById("menu-bar").innerHTML = result;
              document.getElementById("mobile-menu-content").innerHTML = result;
              updateHeights();
          }
      });

      $.ajax({
          type: "get",
          url: "<?= base_url('dashboard/topmenu') ?>",
          success: (result) => {
              document.getElementById("search-bar").innerHTML = result;
              updateHeights();
          }
      });

      $.ajax({
          type: "get",
          url: "<?= base_url('dashboard/pslogo') ?>",
          success: (result) => {
              document.getElementById("ps-logo").innerHTML = result;
              updateHeights();
          }
      });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
