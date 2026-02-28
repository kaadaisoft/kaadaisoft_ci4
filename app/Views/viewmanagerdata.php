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
        color: rgb(0, 123, 255);
        font-weight:800;
        font-family:sans-serif;
     }

     .icon{
        color:grey;
     }

     .ps-letter{
        background-color: rgb(0, 123, 255);
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
           #pageheight {
             position: relative !important;
             height: auto !important;
             overflow: visible !important;
           }
           #pagecontrol {
             max-height: none !important;
             overflow: visible !important;
           }
           #changepage {
             height: auto !important;
             max-height: none !important;
             overflow: visible !important;
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

<?= view('notification_toast') ?>

          <?php if(isset($manager)):?>
            <div class="container-fluid px-4 py-4">   
            
            <div class="card shadow-sm rounded border-0 mb-5">
                <div class="card-header bg-white border-bottom pt-4 pb-3 px-4">
                    <h4 style="font-weight:600; color: #2c3e50; margin:0;"><i class="fa-solid fa-user-tie text-primary me-2"></i>Manager Details</h4> 
                </div>
                <div class="card-body px-4 py-4">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img class="shadow-sm" style="width:180px;height:180px;object-fit:cover;border-radius:50%;border: 4px solid #f8f9fa;" src="<?= base_url('assets/membersdocuments/' . $manager->Memberimage) ?>" alt="Manager Image">
                            
                            <div class="d-flex flex-column align-items-center gap-2 mt-4 px-xl-5 px-lg-4 px-md-2">
                                <button style="width: 100%; border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#member_documents" class="btn btn-outline-primary fw-bold py-2" onclick="viewMemberdocuments('<?=$manager->Aadharfrontimage?>','<?=$manager->Aadharbackimage?>','<?=$manager->Communitycertificate?>')"><i class="fa-solid fa-file-lines me-2"></i>View Documents</button>
                                <button style="width: 100%; border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#eventparticipation" class="btn btn-outline-success fw-bold py-2" onclick="viewMembereventparticipation('<?=$manager->Familymembershipid?>')"><i class="fa-solid fa-calendar-check me-2"></i>Event Participation</button>
                                <button style="width: 100%; border-radius: 8px;" onclick="showupdatemanagermodal('<?=trim($manager->Familymembershipid)?>')" class='btn btn-outline-warning fw-bold text-dark py-2'><i class="fa-solid fa-user-pen me-2"></i>Update Details</button>
                                <a style="width: 100%; border-radius: 8px;" href="<?= base_url('add_family_member'); ?>" class="btn btn-primary fw-bold shadow-sm py-2"><i class="fa-solid fa-user-plus me-2"></i>Add Family Member</a>
                            </div>
                        </div>  
                        <div class="col-md-8 mt-4 mt-md-0">
                            <div class="table-responsive h-100 p-4 bg-light rounded shadow-sm">
                                <table id="manager_data" class="table table-borderless align-middle mb-0">
                                    <tbody>
                                        <tr class="border-bottom border-light">
                                            <th width="35%" class="text-secondary py-3 fs-6">Name:</th>
                                            <td class="text-primary fw-bold fs-5 py-3"><?=$manager->Name?></td>
                                        </tr>
                                        <tr class="border-bottom border-light">
                                            <th class="text-secondary py-3 fs-6">Family Membership ID:</th>
                                            <td class="py-3"><span class="badge bg-primary px-3 py-2 fs-6 rounded-pill shadow-sm"><?=$manager->Familymembershipid?></span></td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary py-3 fs-6" style="vertical-align:top;">Address:</th>
                                            <td class="py-3 fw-medium text-dark">
                                                <ul class="list-unstyled mb-0" style="line-height: 1.8;">
                                                    <li><i class="fa-solid fa-house fa-fw text-primary me-2"></i> <?=$manager->Doornumber?>, <?=$manager->Street?></li>
                                                    <li><i class="fa-solid fa-location-dot fa-fw text-primary me-2"></i> <?=$manager->Village?>, <?=$manager->Taluk?></li>
                                                    <li><i class="fa-solid fa-map-pin fa-fw text-primary me-2"></i> <?=$manager->District?> - <?=$manager->Pincode?></li>
                                                    <li><i class="fa-solid fa-map fa-fw text-primary me-2"></i> <?=$manager->State?></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            
            <?php if(isset($family_members) && !empty($family_members)): ?>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm border-0 rounded mb-4">
                        <div class="card-header bg-white border-bottom pt-4 pb-3 px-4">
                            <h4 style="font-weight:600; color: #2c3e50; margin:0;"><i class="fa-solid fa-users text-primary me-2"></i>Family Members</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th class="ps-4 py-3 border-bottom-0 text-white">S.No</th>
                                            <th class="py-3 border-bottom-0 text-white">Name</th>
                                            <th class="py-3 border-bottom-0 text-white">Relationship</th>
                                            <th class="py-3 border-bottom-0 text-white">Gender</th>
                                            <th class="py-3 border-bottom-0 text-center text-white">Age</th>
                                            <th class="pe-4 py-3 border-bottom-0 text-center text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="family_members_body" class="border-top-0">
                                        <?php 
                                            $sno = 1;
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
                                            <tr class="<?= (isset($fm->is_dead) && $fm->is_dead == 1) ? 'dead-member-row bg-light' : '' ?>" <?= !(isset($fm->is_dead) && $fm->is_dead == 1) ? "onclick=\"showupdatemanagermodal('".trim($fm->Familymembershipid)."')\" style=\"cursor:pointer;\"" : "" ?>>
                                                <td class="ps-4 py-3 text-dark"><?= $sno++ ?></td>
                                                <td class="py-3 fw-bold text-dark"><?= $fm->Name ?></td>
                                                <td class="py-3"><span class="badge bg-light text-dark border px-2 py-1 rounded"><?= $display_role ?></span></td>
                                                <td class="py-3">
                                                    <?php if(strtolower($fm->Gender) == 'male'): ?>
                                                        <i class="fa-solid fa-mars text-primary me-1"></i>
                                                    <?php elseif(strtolower($fm->Gender) == 'female'): ?>
                                                        <i class="fa-solid fa-venus text-danger me-1"></i>
                                                    <?php endif; ?>
                                                    <?= $fm->Gender ?>
                                                </td>
                                                <td class="py-3 text-center"><?= $age ?></td>
                                                <td class="pe-4 py-3 text-center">
                                                    <?php if(!(isset($fm->is_dead) && $fm->is_dead == 1)): ?>
                                                        <button style="border-radius: 6px;" onclick="showupdatemanagermodal('<?=trim($fm->Familymembershipid)?>')" class='btn btn-sm btn-outline-primary fw-bold px-3 py-1'><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
                                                    <?php else: ?>
                                                        <button style="border-radius: 6px;" class='btn btn-sm btn-secondary fw-bold px-3 py-1' disabled><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

<div id="updatemanager-modal-hide" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 10000; overflow-y: auto;">
    <div id="update-manager-section" style="width: 90%; margin: 2% auto; background: #fff; border-radius: 20px; padding: 20px; position: relative;">
        <div id="update-manager-form"></div>
        <button class="btn btn-danger mt-3" onclick="hideupdatemanagermodal()">Close</button>
    </div>
</div>

<!------------------documents-modal--------------------->
<div data-bs-backdrop="static" data-bs-keyboard="false" id="member_documents" class="modal fade">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Documents:</h4>
        <button data-bs-dismiss="modal" class="btn btn-close"></button>
        </div>
        <div id="showdocuments" class="modal-body row justify-content-evenly">
           
        </div>
    </div>
    </div>
</div>

<!--------------------view-community-certificate------------>
<div id="show_commun_cert" class="modal fade">
   <div class='modal-dialog modal-dialog-scrollable modal-lg'>
       <div class="modal-content">
        <div class="modal-header">
          <h4>Community certificate</h4>
          <button class="btn btn-close" data-bs-dismiss='modal'></button>
        </div>
         <div style="height:700px;" id="dis_commun_cert" class="modal-body">
             
         </div>
       </div>
   </div>
</div>

<!------------------------show-event-participation------------------------->
<div id="eventparticipation" class="modal fade">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
   <div class="modal-content">
     <div class="modal-header">
     <h4>Event Participation:</h4>
     <button class="btn btn-close" data-bs-dismiss="modal"></button>
     </div>
     <div class="modal-body d-flex justify-content-evenly">
          <table class="table table-bordered">
            <thead>
              <tr><th>SNo</th><th>Event Name</th><th>Tax Amount</th><th>Paid Amount</th><th>Balance Amount</th><th>Payment Date</th></tr>
            </thead>
            <tbody id="showparticipation">
            </tbody>
          </table>
     </div>
   </div>
  </div>
</div>

<script>
      function viewMemberdocuments(aadharfrontimage,aadharbackimage,communitycertificate) {
          document.getElementById("showdocuments").innerHTML = `
          <div class="col-md-4 text-center">
              <p class="fw-bold">Aadhar Front Image:</p>
              <img class="img-fluid border rounded" style="max-height:300px;" src="<?= base_url('assets/membersdocuments/') ?>${aadharfrontimage}">
          </div>
          <div class="col-md-4 text-center">
              <p class="fw-bold">Aadhar Back Image:</p>
              <img class="img-fluid border rounded" style="max-height:300px;" src="<?= base_url('assets/membersdocuments/') ?>${aadharbackimage}">
          </div>
          <div class="col-md-4 text-center">
              <p class="fw-bold">Community Certificate:</p>
              <img class="img-fluid border rounded" style="max-height:300px;cursor:pointer;" 
                   onclick="viewCommunitycertificate('${communitycertificate}')" 
                   src="<?= base_url('assets/membersdocuments/') ?>${communitycertificate}">
          </div>`;
      }

      function viewCommunitycertificate(communitycertificate) {
        let viewcert_modal = new bootstrap.Modal(document.getElementById("show_commun_cert"),{
          backdrop:"static",
          keyboard:false
        });
        viewcert_modal.show();
        document.getElementById("dis_commun_cert").innerHTML = `<img style="width:100%;height:auto;" class="img-fluid" src='<?= base_url('assets/membersdocuments/') ?>${communitycertificate}'>`;
      }

      function viewMembereventparticipation(id) {
          $.ajax({
              type:"post",
              url:"<?= base_url('event-participation') ?>",
              data:{"id":id},
              success:function(result){
                  let eventparticipation = JSON.parse(result);
                  if(eventparticipation.length < 1){
                      document.getElementById("showparticipation").innerHTML = `<tr><td class="text-center" colspan="6">No records found</td></tr>`;
                  }
                  else{
                      document.getElementById("showparticipation").innerHTML = eventparticipation.map((participation,index)=> {
                          return `<tr><td>${index+1}</td><td>${participation.eventname}</td><td>${participation.Taxamount}</td><td>${participation.Collectedamount}</td><td>${participation.balanceamount}</td><td>${participation.paymentdate}</td></tr>`;
                      }).join("");
                  }
              },
              error:function(error){
                  console.error("Error fetching event participation:", error);
              }
          });
      }

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
      function commonSearch(input) {
          let filter = input.value.toLowerCase();
          let tableBody = document.getElementById("family_members_body");
          let tr = tableBody.getElementsByTagName("tr");

          for (let i = 0; i < tr.length; i++) {
              let tdName = tr[i].getElementsByTagName("td")[0];
              if (tdName) {
                  let txtValue = tdName.textContent || tdName.innerText;
                  if (txtValue.toLowerCase().indexOf(filter) > -1) {
                      tr[i].style.display = "";
                  } else {
                      tr[i].style.display = "none";
                  }
              }
          }
      }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
