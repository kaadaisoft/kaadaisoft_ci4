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
            <h3 style="font-weight:500;">Manager Details:</h3> 
            <div class="row mt-4">
              <div class="col-md-4">
                  <img style="width:200px;height:200px;object-fit:cover;border-radius:10px;" src="<?= base_url('assets/membersdocuments/' . $manager->Memberimage) ?>" alt="Manager Image">
                  
                  <div style="gap:10px;" class="row mt-4 pb-3 ps-3">
                      <button style="width:fit-content;" data-bs-toggle="modal" data-bs-target="#member_documents" class="btn btn-primary fw-bold" onclick="viewMemberdocuments('<?=$manager->Aadharfrontimage?>','<?=$manager->Aadharbackimage?>','<?=$manager->Communitycertificate?>')">View Documents</button>
                      <button style="width:fit-content;" data-bs-toggle="modal" data-bs-target="#eventparticipation" class="btn btn-primary fw-bold" onclick="viewMembereventparticipation('<?=$manager->Familymembershipid?>')">Event Participation</button>
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
                        <tbody id="family_members_body">
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
