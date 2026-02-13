<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinators</title>
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

     .table-btn{
        background-color: rgb(239, 236, 236);
        position: relative;
     }

     .active-bg{
      background-color:rgb(230, 230, 230);
     }

     .heading-kaadaisoft{
        color: rgb(120, 50, 186);
        font-weight:800;
        font-family:sans-serif;
     }

     .ps-letter{
        background-color: rgb(120, 50, 186);
     }

     .ps-user{
    background-color: rgb(254, 213, 163);;
     }

     .align{
        align-self:self-end;
     }

     .fa-magnifying-glass{
      color: gray;
     }

     .dashboard-cards{
    display:grid;
    grid-template-columns: repeat(auto-fit,minmax(150px,auto));
    gap:20px;
    }

    .card-round{
      border-radius:20px;
    }

    ul > li{
      cursor:pointer;
    }

    .card1{
    background-color: rgb(88, 194, 255);
     }

     .card2{
      background-color: rgb(233, 153, 3);
     }

     .card3{
      background-color: rgb(124, 9, 232);
     }

     .card4{
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
        display:grid;
        grid-template-columns: repeat(auto-fit,minmax(250px,700px)) ;
        grid-template-rows: repeat(auto-fit,minmax(200px,auto)) ;
        align-items: center;
      }

      .ps-table-grid{
        display:grid;
        grid-template-columns: repeat(auto-fit,minmax(300px,700px)) ;
      }

      .chartBox {
        /* height:fit-content; */
        padding: 10px;
        border-radius: 20px;
        /* border: solid 3px rgba(54, 162, 235, 1); */
        background: white;
      }

      #search-bar{
            display:flex;
            align-items:center;
            justify-content:space-between;
      }

      .ham-line{
        width:30px;
        height:6px;
        background-color: rgb(70, 70, 70);
        margin-top:5px;
      }

      .ps-add-btn{
        border:none;
        outline:none;
        background-color:rgb(23, 23, 184);
        border-radius:25px;

      }

      .active-page{
        background-color:#6495ED;
        font-weight:500;
        color:white;
      }

      .active{
        border:none;
        outline:none;
        font-weight:500;
        font-size:15px;
      }

      .ps-page-count{
        border:none;
        outline:none;
        font-weight:500;
        color:white;
        background-color:#6495ED;
      }

      #coords-form div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 10px;
      }

      #coords-form div > button{
        border-radius:50px;
      }

      #add-coords-form{
        width:42%;
        border-radius:25px;
        box-sizing:border-box;
        padding:3%;
        position: relative;
      }

      #coords-modal-hide{
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        transition:0.4s;
        transition-timing-function:ease;
      }

      #assigncoords-form div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 10px;
      }

      #assigncoords-form div > button{
        border-radius:50px;
      }

      #assign-coords-form{
        width:42%;
        border-radius:25px;
        box-sizing:border-box;
        padding:3%;
        position: relative;
      }

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
      }

      #assigncoords-modal-hide{
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .coords-modal{
        padding:10px 0;
        background-color:rgba(128, 128, 128, 0.4);
        overflow:hidden;
      }

      a{
        color:black;
      }

      a:hover{
        color:black;
      }

      #update-coords-form div > input,select{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:0 10px;
      }

      #update-coords-form div > button{
        border-radius:50px;
      }

      #update-coords-section{
        width:95%;
        border-radius:25px;
        box-sizing:border-box;
        /* padding:3%; */
        position: relative;
      }

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
      }

      #updatecoords-modal-hide{
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .updatecoords-modal{
        padding:10px 0;
        background-color:rgba(128, 128, 128, 0.4);
        overflow:hidden;
      }

      .active-coords{
        background-color:rgb(230, 230, 230);
        font-weight:600;
      }
      
      .updatecoord{
        position: relative;
      }

      .trashcoord{
        position: relative;
      }

     #coord_data th{
        font-size:18px;
     }

     #coord_data td{
        font-size:18px;
        font-weight:500;
     }

     #registration-form label{
            width:100%;
            font-size:18px;
            font-weight:500;
        }

        #registration-form input[type="text"],input[type="number"],input[type="file"],select{
            width:100%;
            padding-left:6px;
        }

        #registration-form input[type="text"]:focus,input[type="number"]:focus,select:focus{
            outline:none;
        }

        #registration-form input[type="file"]{
            border:none;
            outline:none;
        }

     form button[type=submit]{
        color:white; 
        font-weight:500;
        border:none;
        background-color:#295CF5;
      }

     .updatetooltip{
      visibility:hidden;
      width:max-content;
      background-color: rgb(120, 50, 186);;
      color:white;
      border-radius:6px;
      padding:5px 10px;
      position: absolute;
      top:100%;
      left:-50%;
      z-index: 1;
     }
     .updatetooltip::after{
          content:"";
          position: absolute;
          bottom:100%;
          right:50%;
          border:7px;
          border-style:solid;
          border-color:transparent transparent rgb(120, 50, 186) transparent;
     }
     .updatecoord:hover .updatetooltip{
        visibility:visible;
     }
     .trashtooltip{
      visibility:hidden;
      width:max-content;
      background-color: rgb(120, 50, 186);;
      color:white;
      border-radius:6px;
      padding:5px 10px;
      position: absolute;
      top:100%;
      left:-20%;
      z-index: 1;
     }
     .trashtooltip::after{
          content:"";
          position: absolute;
          bottom: 100%;
          right:50%;
          border:7px;
          border-style:solid;
          border-color:transparent transparent rgb(120, 50, 186); transparent;
     }
     .trashcoord:hover .trashtooltip{
        visibility:visible;
     }
      @media screen and (max-width:768px) {
          #search-bar{
            background-color:rgb(248, 245, 245);
            flex:none;
            background-color:white !important;
            /* padding: 5px 0; */
           }
           #menu-bar{
            display:none;
           }
           #commonsearch{
            width:100% !important;
            margin: 0 !important;
            /* padding:5px; */
           }
           .coordpadd:nth-child(2){
            padding:0% !important;
           }
           .coordpadd:nth-child(1){
            padding:2% 0 !important;
           }
           #hidename{
            display:none;
           } 
           .ps-logo{
            justify-content:space-between;
          }
          #ps-name-line{
            display:none;
          }
          .fa-bell-icon{
            padding-right:10px;
          }
          .rounded-circle{
            margin: 5px;

           }
           #arrow{
            margin:5px;

           }
      }

      @media screen and (min-width:768px) {
          .ham-menu{
            display:none;
          } 
      }

      @media screen and (max-width:768px) {
        
          #add-coords-form div > input{
            padding: 5px;
          }
          #add-coords-form{
            width:90%;
            padding:8%;
          }
          #update-coords-section div > input{
            padding: 5px;
          }
          #update-coords-section{
            width:90%;
            /* padding:8%; */
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
          padding-top: 60px; /* Space for close button */
      }
      
      /* Hide default menu bar on mobile */
      @media screen and (max-width: 768px) {
          #menu-bar {
              display: none;
          }
      }
      .dead-member-row, .dead-member-row td, .dead-member-row th {
        background-color: #f5f5f5 !important;
        color: #999 !important;
        opacity: 0.7;
        pointer-events: none;
      }
      .dead-member-row .btn[disabled] {
        pointer-events: auto; /* allow the cursor to show it's disabled but the button itself is inert */
      }
    </style>
</head>
<body>
        
<div id="pageheight" class="container-fluid" style="overflow:hidden;position:absolute;">
<!---------------------add-toast---------------------->
 
  <div id='coordtoast' style='border:4px solid rgb(132, 250, 132);border-radius:10px;position:absolute;top:10%;right:-380px;transition:0.5s;background-color:rgb(18, 155, 18);' class=' toast hide'>
  <div style="border-radius:10px;background-color:rgb(18, 155, 18);" class='toast-header'>
    <strong class='me-auto text-white fs-6'>Success</strong>
    <button type='button' class='btn-close float-end' data-bs-dismiss='toast'></button>
  </div>
  <div id="coordinatorstatus" class='toast-body text-white fs-6 py-2'>
    
  </div>
  </div>

<?php  if(isset($_SESSION["coordsuccessstatus"])){
     $status = $_SESSION['coordsuccessstatus'];
echo "<script>
       document.getElementById('coordinatorstatus').innerHTML = '$status';
       const vcdToast = document.getElementById('coordtoast');
       vcdToast.classList.remove('hide');
       vcdToast.classList.add('show');
       vcdToast.style.right = '50px';
       setTimeout(()=>{
       vcdToast.style.right = '-380px';
       },3000);
       
      </script>"; 

unset($_SESSION["coordsuccessstatus"]);

} 

?>
<!---------------------add-toast-end------------------>

<!---------------------coord-error-toast---------------------->

<div id='coorderrortoast' style='border:4px solid rgb(254, 91, 91);border-radius:10px;position:absolute;top:10%;right:-380px;transition:0.5s;background-color:rgb(250,51,51);' class='toast hide'>
  <div style="background-color:rgb(250,51,51);" class='toast-header'>
    <strong class='me-auto text-white fs-6'>Error</strong>
    <button type='button' class='btn-close float-end' data-bs-dismiss='toast'></button>
  </div>
  <div class='toast-body text-white fs-6 py-2'>
    
  </div>
  </div>

<?php 

if(isset($_SESSION["coorderrorstatus"])){
  $status = $_SESSION['coorderrorstatus'];
echo "<script>
       document.getElementById('coorderrortoast').querySelector('.toast-body').innerHTML = '$status';
       const vcdeToast = document.getElementById('coorderrortoast');
       vcdeToast.classList.remove('hide');
       vcdeToast.classList.add('show');
       vcdeToast.style.right = '50px';
       setTimeout(()=>{
       vcdeToast.style.right = '-380px';
       },3000)
       
      </script>"; 

unset($_SESSION["coorderrorstatus"]);

}

?>
<!---------------------coord-error-toast-end------------------>

      <div id="side-bar" class="row"><!-----top-bar--------------->

      <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3">
               
               </div>
       
               <div id="search-bar" class="col-md-10 border-bottom">
       
              
               </div>
        </div><!-----------top-bar-end----------------------->

        <div id="pagecontrol" class="row"><!----------main-navbar----------->

        <div id="menu-bar" style="height:inherit;" class="col-md-2 ps-gray"><!----------side-bar-------------------->
       
        </div><!-----------side-bar-end-------------->
            
        <div style="height:inherit;overflow:auto;" class="col-md-10"><!-----------main-dashboard------------------------->

         <!------------------------------coordinator-data--------------------------->
         <?php if(isset($coordinator)):?>
            <div class="container-fluid px-4 py-2">   
            <h3 style="font-weight:500;"><?=$coordinator->Role == 2 ? "Coordinator Details:" : "Member Details"?></h3> 
            <div class="row">
              <div class="col-md-4">
                  <img style="width:200px;height:200px;object-fit:cover;border-radius:10px;" src="<?= base_url('assets/membersdocuments/' . $coordinator->Memberimage) ?>" alt="Member Image">
                 
                  <div style="gap:10px;" class="row mt-4 pb-3">
                    <button style="width:fit-content;" data-bs-toggle="modal" data-bs-target="#coord_documents" class="btn btn-primary fw-bold" onclick="viewCoorddocuments('<?=$coordinator->Aadharfrontimage?>','<?=$coordinator->Aadharbackimage?>','<?=$coordinator->Communitycertificate?>')">View Documents</button>

                    <button style="width:fit-content;" data-bs-toggle="modal" data-bs-target="#eventparticipation" class="btn btn-primary fw-bold" onclick="viewMembereventparticipation('<?=$coordinator->Familymembershipid?>')">Event Partcipation</button>

                     <button <?php if(session()->get('role') == 3){echo 'hidden';} ?> style="width:fit-content;" onclick="showupdatecoordsmodal('<?=trim($coordinator->Familymembershipid)?>')" class='updatecoord btn btn-primary fw-bold'>Update</button>
                     <?php if(session()->get('role') == 2 || session()->get('role') == 3): ?>
                        <a href="<?= base_url('add_family_member'); ?>" style="width:fit-content;" class="btn btn-primary fw-bold">Add Family Member</a>
                     <?php endif; ?>
                  </div>
              </div>  
              <div class="col-md-8">
            <table id="coord_data" class="table table-bordered border-dark">
                <thead>
                    <tr><th>Name:</th><td class="text-primary fw-bold"><?=$coordinator->Name?></td></tr>
                    <tr><th>Familymembershipid:</th><td class="text-primary fw-bold"><?=$coordinator->Familymembershipid?></td></tr>
                    <tr><th style="vertical-align:middle;">Address:</th>
                        <td>
                        <ul class="list-unstyled">
                        <li><?=$coordinator->Doornumber?></li></li>
                        <li><?=$coordinator->Street?></li>
                        <li><?=$coordinator->Village?></li>
                        <li><?=$coordinator->Taluk?></li>
                        <li><?=$coordinator->District?> - <?=$coordinator->Pincode?></li>
                        <li><?=$coordinator->State?></li>
                        </ul>
                        </td>
                    </tr>
                    <tr><th>Assigned Villages</th><td><?=$coordinator->VillageNames?></td></tr>
                </thead>
            </table>
            </div>  
            </div> 
            
            <?php if(isset($family_members) && !empty($family_members) && count($family_members) > 0): ?>
            <div class="row mt-4">
                <div class="col-12">
                    <h4 style="font-weight:500;">Family Members</h4>
                    <table class="table table-bordered border-dark">
                        <thead>
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
                                            <button style="width:fit-content;" onclick="showupdatecoordsmodal('<?=trim($fm->Familymembershipid)?>')" class='updatecoord btn btn-sm btn-primary fw-bold'>Edit</button>
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
        <!------------------------------coordinator-data-end----------------------->
         
        <div <?php if(session()->get('role') == 2){echo "hidden";}?>>
        <div class="container-fluid px-4 pt-4 d-flex justify-content-between coordpadd">
          <span  class="fs-5 fw-bold">Total Members: <?=count($members)?></span>
        </div>
        
        <div style="overflow:auto;" class="container-fluid pt-3 px-4 coordpadd"><!----------------table--------------->
        <table class="table table-responsive table-bordered">
            <thead>
            <tr style="font-size:18px;" class="ps-gray">
            <th>S.No</th><th>Member ID</th><th>Name</th><th>Mobile</th><th>District</th><th>Taluk</th><th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody id="ps-members">
              
              
            </tbody>
            </table>

        </div> <!----------------table-end------->

        <div class='d-flex justify-content-center container-fluid'> <!-----------------pagination---------------------->
        
        <div id="membersPagination" class="col-md-6 py-2 d-flex justify-content-around align-items-center">
          
        </div>

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

<!---------------------offcanvas-end-------------------------------->

<!------------------------Coordinators-modal-------------------------------------------->
        
<div data-bs-backdrop="static" data-bs-keyboard="false" id="coord_documents" class="modal fade">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        Documents:
        <button data-bs-dismiss="modal" class="btn btn-close"></button>
        </div>
        <div id="showdocuments" class="modal-body row justify-content-evenly">
           
        </div>
    </div>
    </div>
</div>

<!------------------------------coordinators-modal-end-------------------------------->

<!------------------------show-member-data------------------------->
<div id="showmembers" class="modal fade">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
   <div class="modal-content">
     <div class="modal-header">
     <h4>Coordinator details:</h4>
     <button class="btn btn-close" data-bs-dismiss="modal"></button>
     </div>

     <div id="memberdata" class="modal-body">
     
     </div>

   </div>
  </div>

</div>
<!--------------------------show-member-data-end---------------------->

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
            <thead id="nocoordinatorresult">
              <tr><th>SNo</th><th>Event Name</th><th>Tax Amount</th><th>Paid Amount</th><th>Balance Amount</th><th>Payment Date</th></tr>
            </thead>
            <tbody id="showparticipation">

            </tbody>
          </table>
     </div>

   </div>
  </div>

</div>
<!--------------------------show-event-participation-end---------------------->

<!--------------------view-members------------------------->
<div id="viewCoordinatordata" class="modal fade">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
   <div class="modal-content">
     <div class="modal-header">
     <h4>Members list:</h4>
     <button id="closeassignmodal" class="btn btn-close" data-bs-dismiss="modal"></button>
     </div>

     <div id="viewmemberslist" class="modal-body">
     
     </div>

   </div>
  </div>

</div>
<!--------------------view-members-end---------------------->

<!------------------------Coordinators-modal-------------------------------------------->
        
<div data-bs-backdrop="static" data-bs-keyboard="false" id="member_documents" class="modal fade">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        Documents:
        <button data-bs-dismiss="modal" class="btn btn-close"></button>
        </div>
        <div id="showmemberdocuments" class="modal-body d-flex justify-content-evenly">
           
        </div>
    </div>
    </div>
</div>

<!------------------------------coordinators-modal-end-------------------------------->

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

<!--------------------view-community-certificate-end-------->


<!-----------------------Update-Coordinators-modal-------------------------------------------->
        
<div id="updatecoords-modal-hide" class="updatecoords-modal">

        <div id="update-coords-section" style="overflow-y:auto;border-radius:25px;" class="bg-white">
              
        <div id="update-coords-form" class="bg-white container">
           
        </div>
        </div>
        </div>
<!-----------------------------Update-coordinators-end-------------------------------->

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
<!--------------------------show-event-participation-end---------------------->

<!-----------------set-index--------------------->
<?php
 
if(isset($_SESSION["altercoordsindex"]) && isset($counts)){
  $index = $_SESSION["altercoordsindex"];
  if($counts > 50){
    $index = $index + 1;
    echo "<script>
       activepage = document.querySelectorAll('.active');
         let l = activepage.length;
         for(let i=0; i < l ; i++){
          if(activepage[i].innerText == $index ){
               activepage[i].classList.add('active-page');
          }
          else{
            if(activepage[i].classList.contains('active-page')){
               activepage[i].classList.remove('active-page')
            }
          }   
         } 
     </script>";
  }
  else{
    echo "<script>
       activepage = document.querySelectorAll('.active');
         let l = activepage.length;
         for(let i=0; i < l ; i++){
          if(i == $index ){
               activepage[i].classList.add('active-page');
          }
          else{
            if(activepage[i].classList.contains('active-page')){
               activepage[i].classList.remove('active-page')
            }
          }   
         } 
     </script>";
  }
}

unset($_SESSION["altercoordsindex"]);
?>
<!-----------------set-index-end----------------->

<script>

let unselectedmembers = [];
let resultbox = document.getElementById("searchmemberdata");
let membersData = [];
<?php if (isset($members) && !empty($members)): ?>
    membersData = <?php echo json_encode($members); ?> || [];
<?php endif; ?>

function renderMembers(data, sNo) {
    let html = "";
    let i = sNo + 1;

    data.forEach(value => {
        html += `
            <tr>
                <td style="font-weight:500;">${i}</td>
                <td style="font-weight:500;">${value.Familymembershipid}</td>
                <td style="font-weight:500;">${value.Name}</td>
                <td style="font-weight:500;">${value.Phonenumber}</td>
                <td style="font-weight:500;">${value.District}</td>
                <td style="font-weight:500;">${value.Taluk}</td>
                <td class="d-flex justify-content-evenly">
                    <button data-bs-toggle="modal" 
                            data-bs-target="#viewCoordinator" 
                            backdrop="false" static="true"
                            onclick="viewMemberdata('${value.Familymembershipid}')" 
                            data-bs-toggle="tooltip" 
                            title="viewCoordinator" 
                            style="width:30px;height:30px;outline:none;border:none;" 
                            class="table-btn text-dark shadow-sm rounded-circle">
                        <i class="fa-sharp fa-solid fa-eye"></i>
                    </button>
                </td>
            </tr>
        `;
        i++;
    });

    document.getElementById("ps-members").innerHTML = html;
}

renderMembers(membersData.slice(0 ,10), 0);

<?php 
          if(isset($members) ): ?> 
            <?php if(count($members) > 0): ?>
            let membersCount = <?php echo json_encode(count($members)); ?>;
            console.log(membersCount)
            let countsperpage = 10;
            let noofpages = Math.ceil(membersCount / countsperpage);
            let totalpagesarr = Array.from({length: noofpages}, (_, i) => i);
            let totalpages = totalpagesarr.length;
            let initialindex = 0;
            let lastindex = 5; 
            let pages = totalpagesarr.slice(initialindex, lastindex);
            let paginationHtml = `<button disabled onclick='changeMembersPagesetup(0)' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id = 'arrow' class='fa-solid fa-arrow-left-long'></i></button>`;
            
            for(let i = 0;pages.length > i; i++) {
              let count = countsperpage * pages[i];
              let pageno = pages[i] + 1;
              console.log(pageno)
              if(pageno == 5){
                paginationHtml += `<button style='width:35px;height:35px;border: none;' onclick='changeMembersPagesetup(${pages[i]})' class='${i==0 ? 'active-page' : ''} active text-decoration-none bg-white d-flex align-items-center justify-content-center ps-gray rounded-circle'>${pageno}</button>`;}
              else{
                paginationHtml += `<button style='width:35px;height:35px;' onclick='displayMembers(${count},${i})' class='${i==0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>`;
              }
            }

            paginationHtml += "<span>...</span>";
            let totalcount = (totalpages - lastindex);
            let newindex = initialindex+lastindex;
            let validNext = totalpages - initialindex; 
            paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeMembersPagesetup(${totalcount})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${totalpages}</button>`;
            
            paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeMembersPagesetup(${newindex})' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></button>`;
            <?php else: ?>
              let paginationHtml = "";
              paginationHtml += "<span>No pages available</span>";
            <?php endif; ?>
          
        <?php endif; ?>
    function setUpPagination(html) {
      document.getElementById("membersPagination").innerHTML = html;
    }  

    setUpPagination(paginationHtml);

    function changeMembersPagesetup(nextStagedNo) {
            let countsperpage = 10;
            let prevlist = "";
            let noofpages = Math.ceil(membersCount / countsperpage);
            let totalpagesarr = Array.from({length: noofpages}, (_, i) => i);
            let totalpages = totalpagesarr.length;
            let start = nextStagedNo > noofpages ? 0 : nextStagedNo;
            let lastindex = nextStagedNo + 5;
            let pages = totalpagesarr.slice(nextStagedNo, lastindex);
            prevlist = start < 5 ? 0 : nextStagedNo - 5;
            let validPrev = totalpages - nextStagedNo;
            let paginationHtml =  `<button ${validPrev <= 0 ? 'disabled' : ''} onclick='changeMembersPagesetup(${prevlist})' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-left-long'> </i></button>`;

            for(let j = 0;pages.length > j; j++) {
              let count = countsperpage * pages[j];
              let pageno = pages[j] + 1;
  
              if(pageno == 5 || pageno - start == 5){
                paginationHtml += pageno == totalpages ? `<button style='width:35px;height:35px;border: none;' onclick='displayMembers(${count},${j})' class='${j==0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>` : `<button onclick='changeMembersPagesetup(${pageno - 1})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='${j==0 ? 'active-page' : ''} active text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${pageno}</button>`; }
              else{
                paginationHtml += `<button style='width:35px;height:35px;' onclick='displayMembers(${count},${j})' class='${j==0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>`;
              }
            }

            paginationHtml += "<span>...</span>";
            let totalcount = totalpages - lastindex;
            let newindex = start + lastindex; 
            let validNext = totalpages - start;
            paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeMembersPagesetup(${totalcount})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${totalpages}</button>`;
            paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeMembersPagesetup(${totalpages - start <= lastindex ? totalcount : newindex})'  style='cursor:pointer;border: none;' class='text-decoration-none text-dark bg-white'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></button>`; 
            setUpPagination(paginationHtml);
            let itemsPerPage = 10;
            let itemStart = nextStagedNo * itemsPerPage;
            let itemEnd = itemStart + itemsPerPage;
            renderMembers(membersData.slice(itemStart, itemEnd), itemStart);
          }

// Mobile Menu Functions
function openMobileMenu() {
  document.getElementById('custom-mobile-menu').style.display = 'block';
}

function closeMobileMenu() {
  document.getElementById('custom-mobile-menu').style.display = 'none';
}

$.ajax({
      type:"get",
      url:"coordinators/sidemenu",
      success:(result)=>{
           document.getElementById("menu-bar").innerHTML = result;
           // Populate custom mobile menu content
           document.getElementById("mobile-menu-content").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("menu-bar").innerHTML = error;
      }
    });

    $.ajax({
      type:"get",
      url:"coordinators/topsubmenu",
      success:(result)=>{
          //  document.getElementById("offcanvasmenu").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("offcanvasmenu").innerHTML = error;
      }
    });

    $.ajax({
      type:"get",
      url:"coordinators/topmenu",
      success:(result)=>{
           document.getElementById("search-bar").innerHTML = result;
          //  document.getElementById("searchcoords").style.display = "flex";
          //  document.getElementById("dashboardsubmenu").style.display = "flex";
           },
           error:(error)=>{
           document.getElementById("search-bar").innerHTML = error;
      }
    });

    $.ajax({
      type:"get",
      url:"coordinators/pslogo",
      success:(result)=>{
           document.getElementById("ps-logo").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("ps-logo").innerHTML = error;
      }
    });

    let showupdatecoords = document.getElementById("updatecoords-modal-hide");
    showupdatecoords.style.height = 100+window.innerHeight+"px";

    function viewMemberundercoord(url) {
        let a = document.createElement("a");
        a.href = url;
        a.dispatchEvent(new MouseEvent("click"))

    }

     let setheight = document.getElementById("pagecontrol");
     let pageheight = window.innerHeight;
     let b = document.getElementById("search-bar").getBoundingClientRect().height;
     setheight.style.height = pageheight - b+"px";

     function getmemberdata(areas){
        let area = areas.value;

      $.ajax({
      type:"get",
      url:"coordinators/getareamembers",
      data:{"area":area},
      success:(result)=>{
           document.getElementById("areamembersname").innerHTML = result;
      },
      error:(error)=>{
          //  document.getElementById("ps-logo").innerHTML = error;
      }
      });

    }

    function generatecoordaddress(aadharno){
      let aadhar = aadharno.value;
      $.ajax({
      type:"get",
      url:"coordinators/getcoordaddress",
      data:{"aadhar":aadhar},
      success:(result)=>{
           document.getElementById("coordaddress").innerHTML = result;
      },
      error:(error)=>{
          //  document.getElementById("ps-logo").innerHTML = error;
      }
      });
    }
  
    document.getElementById("menu-bar").style.height = (window.innerHeight - document.getElementById("search-bar").getBoundingClientRect().height)+"px";                        

    window.addEventListener("resize", () => {
        let currentHeight = window.innerHeight;
        let currentTopbarHeight = document.getElementById("search-bar").getBoundingClientRect().height;
        document.getElementById("menu-bar").style.height = (currentHeight - currentTopbarHeight) + "px";
    });

        function commonSearch(coords){
             
            let searchfields = coords.value;
    
            $.ajax({
              type:"get",
              url:"coordinators/searchcoordinators",
              data:{"searchfields":searchfields},
              success:(result)=>{
                document.getElementById('ps-members').innerHTML = result;
              },
              error:(error)=>{
                document.getElementById('ps-members').innerHTML = error;
              }
           })}; 
           
    function displayMembers(counts,index){
        const itemsPerPage = 10;
        const start = counts;
        const end = counts + itemsPerPage;
         activepage = document.querySelectorAll(".active");
         let l = activepage.length;
         for(let i=0; i < l ; i++){
          if(i == index ){
               activepage[i].classList.add("active-page");
          }
          else{
            if(activepage[i].classList.contains("active-page")){
               activepage[i].classList.remove("active-page")
            }
          }   
         } 
      renderMembers(membersData.slice(start, end), start);
    }

    function changeMembersPagesetup(nextStagedNo) {
            let countsperpage = 10;
            let prevlist = "";
            let noofpages = Math.ceil(pendingApplicationsCount / countsperpage);
            let totalpagesarr = Array.from({length: noofpages}, (_, i) => i);
            let totalpages = totalpagesarr.length;
            let start = nextStagedNo > noofpages ? 0 : nextStagedNo;
            let lastindex = nextStagedNo + 5;
            let pages = totalpagesarr.slice(nextStagedNo, lastindex);
            prevlist = start == 0 ? 0 : nextStagedNo - 5;
            let validPrev = totalpages - nextStagedNo;
            let paginationHtml =  `<button ${validPrev <= 0 ? 'disabled' : ''} onclick='changeMembersPagesetup(${prevlist})' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-left-long'> </i></button>`;

            for(let j = 0;pages.length > j; j++) {
              let count = countsperpage * pages[j];
              let pageno = pages[j] + 1;
  
              if(pageno == 5 || pageno - start == 5){
                paginationHtml += pageno == totalpages ? `<button style='width:35px;height:35px;border: none;' onclick='displayMembers(${count},${j})' class='${j==0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>` : `<button onclick='changeMembersPagesetup(${pageno - 1})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='${j==0 ? 'active-page' : ''} active text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${pageno}</button>`; }
              else{
                paginationHtml += `<button style='width:35px;height:35px;' onclick='displayMembers(${count},${j})' class='${j==0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>`;
              }
            }

            paginationHtml += "<span>...</span>";
            let totalcount = totalpages - lastindex;
            let newindex = start + lastindex; 
            let validNext = totalpages - start;
            paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeMembersPagesetup(${totalcount})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${totalpages}</button>`;
            paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeMembersPagesetup(${totalpages - start <= lastindex ? totalcount : newindex})'  style='cursor:pointer;border: none;' class='text-decoration-none text-dark bg-white'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></button>`; 
            setUpPagination(paginationHtml);
            let itemsPerPage = 10;
            let itemStart = nextStagedNo * itemsPerPage;
            let itemEnd = itemStart + itemsPerPage;
            renderApplications(applicationsData.slice(itemStart, itemEnd), itemStart);
          }

    function getMemberdata(data){
      let memberdata = data.value;
      console.log(memberdata)
      $.ajax({
        type:"get",
        url:"coordinators/getMembersforassign",
        data:{"searchfields":memberdata},
        success:function(result){
            resultbox.style.display = "block";
            document.getElementById("searchmemberdata").innerHTML = result;
        },
        error:function(error){
            document.getElementById("searchmemberdata").innerHTML = error;
        }
      });
    }

    let windowheight = window.innerHeight;
    // let form_container = document.getElementById("form-container");
    // form_container.style.height = `${windowheight}px`;
    let form_height = windowheight*(95/100);
    let form_section = document.getElementById("update-coords-section");
    form_section.style.height = `${form_height}px`;

    function viewCoordinatordata(url){
     let a = document.createElement("a");
     a.href = url;
     a.dispatchEvent(new MouseEvent("click"));  
    }

      function reassignSelect(member){
        let checkmember = member.checked;
        let l = unselectedmembers.length;
        let newarray = [];
        if(checkmember){
           unselectedmembers.push(member.value);
        }
        else{
          
          for(let i = 0;i < l;i++){
          if(unselectedmembers[i] !== member.value){
             newarray = [...newarray,unselectedmembers[i]];
          }  
          }
          document.getElementById("selectunselect").checked = false;
          unselectedmembers = newarray;
        }
        console.log(unselectedmembers);
      }
      

      function selectunselect(select){
       let selectmember = document.querySelectorAll(".unselectmembers")
       let l = selectmember.length;
       let selected = select.checked;
       if(selected == true){
              unselectedmembers = [];
       for(let i=0;i < l;i++){
              selectmember[i].checked = true;
              unselectedmembers.push(selectmember[i].value);
       }    
       }
       else{
        for(let i=0;i < l;i++){
              selectmember[i].checked = false;
              unselectedmembers = []
              unselectedmembers = unselectedmembers.filter((v,i)=>{ v !== selectmember[i].value });
            } 
       }
       console.log(unselectedmembers)     
      }
      
     function membersReassign(){
          if(unselectedmembers == ""){
          document.getElementById("reassignalert").innerHTML = 
          "<div class='alert alert-success alert-dismissible' role='alert'>Please select Members</div>"
          }
          else{       
          $.ajax({
          type:"post",
          url:"members/multiplereassign",
          data:{"membersaadhar":unselectedmembers},
          success:(result)=>{  
            /* let unselectmember = document.querySelectorAll(".unselectmembers")
            let unselect = document.getElementById("selectunselect")
            let l = unselectmember.length;
              for(let i = 0;i<l ; i++ ){
                unselectmember[i].checked = false;
              }
              unselect.checked = false; */
              window.location.reload();
             /*  document.getElementById('coordinatorstatus').innerHTML = "Members are Reassigned to coordinators";
              document.getElementById('coordtoast').style.right = '5%';
              setTimeout(()=>{
              document.getElementById('coordtoast').style.right = '-380px';
              },3000) */
             
    	      
          },
          error:(error)=>{
            document.getElementById('coordinatorstatus').innerHTML = "Something went wrong";
            document.getElementById('coordtoast').style.right = '5%';
            setTimeout(()=>{
            document.getElementById('coordtoast').style.right = '-380px';
            },3000)
          }
          });  
          } 
     }

     function setDropdowndistricts(state){
   let state_id = state.value;

    $.ajax({
      type:"get",
      url:"members/getDistrictsfordropdown",
      data:{"state_id":state_id},
      success:(result)=>{
           document.getElementById("districts-dropdown").innerHTML = result;
      },
      error:()=>{
           document.getElementById("districts-dropdown").innerHTML = "<option>Error fetching Districts</option>";
      }
    });
    }

    function setDropdowntaluks(district){
   let district_name = district.value;
   $.ajax({
      type:"get",
      url:"members/getTaluksfordropdown",
      data:{"district_name":district_name},
      success:(result)=>{
           document.getElementById("taluks-dropdown").innerHTML = result;
      },
      error:()=>{
           document.getElementById("taluks-dropdown").innerHTML = "";
      }
    });
}

function setDropdownpanchayat(taluk){
   let taluk_name = taluk.value; 
   $.ajax({
      type:"get",
      url:"members/getPanchayatsfordropdown",
      data:{"taluk_name":taluk_name},
      success:(result)=>{
           document.getElementById("panchayat-dropdown").innerHTML = result;
      },
      error:()=>{
           document.getElementById("panchayat-dropdown").innerHTML = "";
      }
    });
}

     function changecoordinatorsPagesetup(initialIndex){
      
      $.ajax({
        type:"get",
        url:"coordinators/changeviewcoordinatorspagesetup",
        data:{"initialindex":initialIndex},
        success:function(result){
            document.getElementById('ps-members').innerHTML = result;
        },
        error:function(err){
            document.getElementById('ps-members').innerHTML = err;
        }
      });
    }

    function viewCoorddocuments(aadharfrontimage,aadharbackimage,communitycertificate) {
         document.getElementById("showdocuments").innerHTML = `<div style="width:fit-content;"><p>Aadhar Front Image:</p>
         <img style="width:300px;height:200px;" src="assets/membersdocuments/${aadharfrontimage}"></div>
         <div style="width:fit-content;">
         <p>Aadhar Back Image:</p>
         <img style="width:300px;height:200px;" src="assets/membersdocuments/${aadharbackimage}"></div>
         <div style="width:fit-content;">
         <p>Communitycertificate:</p>
         <img style="width:200px;height:300px;cursor:pointer;" onclick="viewCommunitycertificate('${communitycertificate}')" src="assets/membersdocuments/${communitycertificate}"></div>`;
    }

    function viewMemberdata(id) {
    $.ajax({
        type:"post",
        url:"<?= base_url('coordinators/viewMemberdata') ?>",
        data:{"id":id},
        success:function(result){
        let member_data = JSON.parse(result);
        document.getElementById("memberdata").innerHTML = `<div class="container-fluid px-4 py-2">   
            <h3 style="font-weight:500;">${member_data.Role == 2 ? "Coordinator Details:" : "Member Details"}</h3> 
            <div class="row">
              <div class="col-md-4">
                  <img style="width:200px;height:200px;" src="assets/membersdocuments/${member_data.Memberimage} alt="assets/membersdocuments/${member_data.Memberimage}">
                  <div class="mt-4">
                    <button data-bs-toggle="modal" data-bs-target="#member_documents" class="btn btn-primary fw-bold" onclick="viewMemberdocuments('${member_data.Aadharfrontimage}','${member_data.Aadharbackimage}','${member_data.Communitycertificate}')">View Documents</button>

                    <button data-bs-toggle="modal" data-bs-target="#eventparticipation" class="btn btn-primary fw-bold" onclick="viewMembereventparticipation('${member_data.Familymembershipid}')">Event Partcipation</button>
                  </div>
              </div>  
              <div class="col-md-8">
            <table id="coord_data" class="table table-bordered border-dark">
                <thead>
                    <tr><th>Name:</th><td>${member_data.Name}</td></tr>
                    <tr><th>Familymembershipid:</th><td class="text-primary fw-bold">${member_data.Familymembershipid}</td></tr>
                    <tr><th style="vertical-align:middle;">Address:</th><td>
                        <ul class="list-unstyled">
                        <li>${member_data.Doornumber}</li></li>
                        <li>${member_data.Street}</li>
                        <li>${member_data.Village}</li>
                        <li>${member_data.Taluk}</li>
                        <li>${member_data.District} - ${member_data.Pincode}</li>
                        <li>${member_data.State}</li></td>
                        </ul>
                    </tr>
                </thead>
            </table>
            </div>  
            </div>
            </div> `;
        let membermodal = new bootstrap.Modal(document.getElementById("showmembers"),{backdrop:"static",keyboard:false});
        membermodal.show();
        },
        error:function(error){
            document.getElementById('deletetoast').innerHTML = error;
        }
      })
    }

    function showupdatecoordsmodal(id){
      // let show = document.getElementById("updatecoords-modal-hide");
      let formmodal = document.getElementById("update-coords-section");
       let b = window.innerWidth;

        $.ajax({
        type:"get",
        url:"<?= base_url('coordinators/getcoordinator'); ?>",
        data:{"id":id},
        success:(result)=>{
           $("#update-coords-form").html(result);
        },
        error:(error)=>{
            console.log(error);
           $("#update-coords-form").html("Error fetching data");
        }
      });

       if( b > 768){
        showupdatecoords.style.left = "0%";
        formmodal.style.left = "2.5%";

       }
       else{
        showupdatecoords.style.left = "0%";
        formmodal.style.left = "2.5%";
       }
    }

   function validateUpdateInputfield(field){
   let field_name = field.name;
   let field_value = field.value;
   let textregex = /^[A-Za-z\s]+$/;
   let alphanumericregex = /^[a-zA-Z0-9/()\s]+$/;
   let normalregex = /^[A-Za-z0-9]+$/;

   if(field_name == "name-update"){
      if(field_value.length <3){
         field.nextElementSibling.innerHTML = "Min 3 characters required.";
      }
      else if(field_value !== "" && !field_value.match(textregex)){
         field.nextElementSibling.innerHTML = "Only letters and spaces allowed for name field.";
      }
      else{
         field.nextElementSibling.innerHTML = "";
      }
   }

   if(field_name == "village-update" || field_name == "street"){
      if(field_value !== "" && !field_value.match(alphanumericregex)){
         field.nextElementSibling.innerHTML = "Only letters,numbers,spaces are allowed.";
      }
      else{
         field.nextElementSibling.innerHTML = "";
      }
   }

   if(field_name == "doorno-update"){
      if(field_value !== "" && !field_value.match(alphanumericregex)){
         field.nextElementSibling.innerHTML = "Don\'t use special characters.";
      }
      else{
         field.nextElementSibling.innerHTML = "";
      }
   }

   if(field_name == "pincode-update"){
      if(field_value.length == 6 || field_value.length == 0){
         document.getElementById("pincodeerror-update").innerHTML = "";
      }
      else if(field_value.length < 6){
         document.getElementById("pincodeerror-update").innerHTML = "Pincode number should contain 6 digits.";
      }
   }

   if(field_name == "phoneno-update"){
      console.log(field_value.length)
      if(field_value.length < 10){
         document.getElementById("phonenoerror-update").innerHTML = "Phone number should contain 10 digits.";
      }
      else if(field_value.length >= 10 || field_value.length == 0){
         document.getElementById("phonenoerror-update").innerHTML = "";
      }
      
   }

   if(field_name == "existfamilyid-update" || field_name == "panno-update"){
      if(field_value !== "" && !field_value.match(alphanumericregex)){
         field.nextElementSibling.innerHTML = "Only letters,numbers are allowed.";
      }
      else{
         field.nextElementSibling.innerHTML = "";
      }
   }

   if(field_name == "aadharno-update"){
      if(field_value.length == 12 || field_value.length == 0){
         document.getElementById("aadharnoerror-update").innerHTML = "";
      }
      else if(field_value.length < 12){
         document.getElementById("aadharnoerror-update").innerHTML = "Aadhar number should contain 12 digits.";
      }
   }
}

function validateCoordinatorform() { 
  
      let coordinatorregistrationform = document.forms["coordinatorregistration-update"];
      let name = coordinatorregistrationform["name-update"].value.trim();
      let state = coordinatorregistrationform["state-update"].value.trim();
      let district = coordinatorregistrationform["district-update"].value.trim();
      let taluk = coordinatorregistrationform["taluk-update"].value.trim();
      let panchayat = coordinatorregistrationform["panchayat-update"].value.trim();
      let village = coordinatorregistrationform["village-update"].value.trim();
      let street = coordinatorregistrationform["street-update"].value.trim();
      let doorno = coordinatorregistrationform["doorno-update"].value.trim();
      let pincode = coordinatorregistrationform["pincode-update"].value.trim();
      let existfamilyid = coordinatorregistrationform["existfamilyid-update"].value.trim();
      let phoneno = coordinatorregistrationform["phoneno-update"].value.trim();
      let panno = coordinatorregistrationform["panno-update"].value.trim();
      let aadharno = coordinatorregistrationform["aadharno-update"].value.trim();
      let selfimage = coordinatorregistrationform["Memberimage"].value.trim();
      let aadharfrontimage = coordinatorregistrationform["Aadharfrontimage"].value.trim();
      let aadharbackimage = coordinatorregistrationform["Aadharbackimage"].value.trim();
      let communitycertificate = coordinatorregistrationform["Communitycertificate"].value.trim();
   
      let textregex = /^([A-Za-z\s]{3,})+$/;
      let alphanumericregex = /^[a-zA-Z0-9/()\s]+$/;
      let normalregex = /^[A-Za-z0-9]+$/;

      if(name == ""){
        document.getElementById("nameerror-update").innerHTML = "Please fill this filed.";
  
        return false;
      }

      else{
        if(!name.match(textregex)){
         document.getElementById("nameerror-update").innerHTML = "Min 3 letters required.Only letters and spaces allowed for name field.";
         return false;
        }     
      }

      if(state == ""){
         document.getElementById("stateerror-update").innerHTML = "Please choose state";
         return false;
      }

      if(district == ""){
         document.getElementById("districterror-update").innerHTML = "Please choose district.";
         return false;
      }

      if(taluk == ""){
         document.getElementById("talukerror-update").innerHTML = "Please choose taluk.";
         return false;
      }

      if(panchayat == ""){
         document.getElementById("panchayaterror-update").innerHTML = "Please choose panchayat.";
         return false;
      }

      if(village == ""){
         document.getElementById("villageerror-update").innerHTML = "Please fill village field";
         return false;
      }
      else{
         if(!village.match(alphanumericregex)){
         document.getElementById("villageerror-update").innerHTML = "Only letters,numbers,spaces are allowed.";
         return false;
         }
      }

      if(street == ""){
         document.getElementById("streeterror-update").innerHTML = "Please fill street field";
        
         return false;
      }
      else{
         if(!street.match(alphanumericregex)){
         document.getElementById("streeterror-update").innerHTML = "Only letters,numbers,spaces are allowed.";
        
         return false;
         }
      }

      if(doorno == ""){
         document.getElementById("doornoerror-update").innerHTML = "Please fill door no/apartment no field.";
        
         return false;
      }
      else{
         if(!doorno.match(alphanumericregex)){
         document.getElementById("doornoerror-update").innerHTML = "Don\'t use special characters.";
         return false;
         }
      }

      if(pincode == ""){
         document.getElementById("pincodeerror-update").innerHTML = "Please fill phoneno field.";
         
         return false;
      }
      else if(pincode.length < 6){
         document.getElementById("pincodeerror-update").innerHTML = "Pincode should contain 6 digits.";
         
         return false;
      }

      if(existfamilyid !== ""){
         if(!existfamilyid.match(normalregex)){
            document.getElementById("familyiderror-update").innerHTML = "Only letters and numbers are allowed.";
            d
            return false;
         }
      }

      if(phoneno == ""){
         document.getElementById("phonenoerror-update").innerHTML = "Please fill phoneno field.";
         
         return false;
      }

      if(panno !== ""){
         if(!panno.match(normalregex)){
            document.getElementById("pannoerror-update").innerHTML = "Only letters and numbers are allowed.";
        
            return false;
         }
      }

      if(aadharno == ""){
         document.getElementById("aadharnoerror-update").innerHTML = "Please fill aadharno field.";
         d
         return false;
      }
      else if(aadharno.length < 12){
         document.getElementById("aadharnoerror-update").innerHTML = "Aadhar number should contain 12 digits.";
         d
         return false;
      }

      return true;
}


function uploadFile(file){

    let imageid = file.name;
    let imageclass = file.name;
    let errorbox = document.querySelector(`.${imageclass}`);
    let filereader = new FileReader();
    let imagesize = 2000000;
    let uploadedimagesize = file.files[0].size;

    if(uploadedimagesize > imagesize){
        errorbox.textContent = "Image size should below 2MB";
            file.value = "";
            return false;
    }
    else{
        errorbox.textContent = "";
    }



    let imgurl = URL.createObjectURL(file.files[0]);
    let image = document.getElementById(imageid);
    image.style.display = "block";
    image.src = imgurl;
    image.nextElementSibling.innerHTML = `<button class='ps-img-btn mt-2 rounded' type='button' onclick='removeImage(this,${file.name})'>Remove</button>`; 
    
}

function removeImage(button,file){
   let imageid = file.name;
   console.log(file.name);
   document.getElementById(imageid).style.display = "none";
   button.style.display = "none";
     file.value = "";
}

function activateUpdateformbutton(checkbox){
let checked = checkbox.checked;
console.log(checked)
let submitbutton = document.getElementById("updatesubmitbutton");
if(checked){
   submitbutton.removeAttribute("disabled");
}
else{
   submitbutton.setAttribute("disabled","disabled");
}
}


    window.onclick = function(event) {

    if (event.target == showupdatecoords) {
    let formmodal = document.getElementById("update-coords-section");
    let b = window.innerWidth;
    if( b > 768){
    showupdatecoords.style.left = "-100%";
    formmodal.style.left = "-90%";
    }
    else{
    showupdatecoords.style.left = "-100%";
    formmodal.style.left = "-90%";
   }
  }
  }

  function hideupdatecoordsform(){
    let formmodal = document.getElementById("update-coords-section");
        let b = window.innerWi95h;
    if( b > 768){
        showupdatecoords.style.left = "-100%";
        formmodal.style.left = "-95%";
       }
    else{
        showupdatecoords.style.left = "-100%";
        formmodal.style.left = "-95%";
       }
  }

  function viewMembereventparticipation(id) {
        $.ajax({
        type:"post",
        url:"<?= base_url('coordinators/eventparticipation') ?>",
        data:{"id":id},
        success:function(result){
          
        let event = [JSON.parse(result)];
        let eventparticipation = event[0]
        console.log(eventparticipation)
        if(eventparticipation.length < 1){
          document.getElementById("nocoordinatorresult").innerHTML = `<tr><td class="text-center" colspan="6">No records found</td></tr>`;
        }
        else{
           document.getElementById("showparticipation").innerHTML = eventparticipation.map((participation,index)=> { 
            return `<tr><td>${index+1}</td><td>${participation.eventname}</td><td>${participation.Taxamount}</td><td>${participation.Collectedamount}</td><td>${participation.balanceamount}</td><td>${participation.paymentdate}</td></tr>`;
           }).join("");
          }
        },
        error:function(error){
          document.getElementById("showparticipation").innerHTML = "Error fetching data";
        }
      })
    }

    function viewMemberdocuments(aadharfrontimage,aadharbackimage,communitycertificate) {
         document.getElementById("showmemberdocuments").innerHTML = `<div><p>Aadhar Front Image:</p>
         <img style="width:300px;height:200px;" src="assets/membersdocuments/${aadharfrontimage}"></div>
         <div>
         <p>Aadhar Back Image:</p>
         <img style="width:300px;height:200px;" src="assets/membersdocuments/${aadharbackimage}"></div>
         <div>
         <p>Communitycertificate:</p>
         <img onclick="viewCommunitycertificate('${communitycertificate}')" style="width:200px;height:300px;cursor:pointer;" src="assets/membersdocuments/${communitycertificate}"></div>`;
    }

    function viewCommunitycertificate(communitycertificate) {
      let viewcert_modal = new bootstrap.Modal(document.getElementById("show_commun_cert"),{
        backdrop:"static",
        keyboard:false
      });
      viewcert_modal.show();
      document.getElementById("dis_commun_cert").innerHTML = `<img style="width:100%;height:750px;" class="img-fluid" src='assets/membersdocuments/${communitycertificate}'>`;
    }

   </script>
  
 <!-------------------------------chart-end------------------------------------>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
    
</body>
</html>



