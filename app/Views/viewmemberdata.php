<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinators</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <!-- <link rel="stylesheet" href="./kaadaisoft.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
      body {
        overflow-x: hidden;
      }

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
         padding:13px 10px;
      }

      #update-coords-form div > button{
        border-radius:50px;
      }

      #update-coords-section{
        width:42%;
        border-radius:25px;
        box-sizing:border-box;
        padding:3%;
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

      .active-members{
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

      #update-member-form div > input,select{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:0 10px;
      }

      #update-member-form div > button{
        border-radius:50px;
      }

      #update-member-section{
        width:95%;
        border-radius:25px;
        box-sizing:border-box;
        /* padding:3%; */
        position: relative;
      }


      #updatemember-modal-hide{
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .updatemember-modal{
        padding:10px 0;
        background-color:rgba(128, 128, 128, 0.4);
        overflow:hidden;
      }

      .active-members{
        background-color:rgb(230, 230, 230);
        font-weight:600;
      } 
      .table-btn{
        background-color: rgb(239, 236, 236);
     }
     .member-text{
      color: rgb(120, 50, 186);
     }

     .updatemember{
        position: relative;
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
           #pageheight {
            height: auto !important;
            min-height: 100vh !important;
            overflow: visible !important;
          }
          #pagecontrol {
            max-height: none !important;
            overflow: visible !important;
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
            padding:8%;
          }
      }
      
      /* Mobile Menu CSS */
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
        padding: 20px;
        transition: 0.3s;
      }
      
      #custom-mobile-menu .close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 24px;
        cursor: pointer;
        padding: 10px;
      }
      
      #mobile-menu-content {
        margin-top: 60px;
      }

      .green-underline {
        text-decoration: underline;
        text-decoration-color: #198754; /* Success green */
        text-decoration-thickness: 3px;
        color: #198754;
        font-weight: bold;
      }

      .update-info {
        font-size: 0.8em;
        color: #198754;
        display: block;
        margin-top: 2px;
        font-weight: normal;
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
      .dead-badge {
        display: none;
      }
    </style>
</head>
<body>
        
<div id="pageheight" class="container-fluid" style="min-height: 100vh; position: relative; overflow-x: hidden;">
<?= view('notification_toast') ?>

      <div id="side-bar" class="row"><!-----top-bar--------------->

      <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3">
               
               </div>
       
               <div id="search-bar" class="col-md-10 border-bottom">
       
              
               </div>
        </div><!-----------top-bar-end----------------------->


        <div id="pagecontrol" class="row"><!----------main-navbar----------->

        <div id="menu-bar" class="col-md-2 ps-gray"><!----------side-bar-------------------->
       
              
        </div><!-----------side-bar-end-------------->
            
        <div id="main-dashboard" class="col-md-10"><!-----------main-dashboard------------------------->

         <!------------------------------coordinator-data--------------------------->
         <?php if(isset($member)):?>
            <div class="container-fluid px-4 py-2 bg-white">   
            <h3 style="font-weight:500;" class="d-flex align-items-center">Member Details 
                <?php 
                    $any_family_pending = false;
                    if(isset($family_members)) {
                        foreach($family_members as $fm) {
                            if(isset($fm->pending_status) && $fm->pending_status == 'Pending') {
                                $any_family_pending = true;
                                break;
                            }
                        }
                    }
                    if((isset($pending_update) && !empty($pending_update)) || $any_family_pending): 
                        if(isset($pending_update) && !empty($pending_update)) {
                            $updated_data = json_decode($pending_update->updated_data, true);
                        }
                ?>
                <span class="badge bg-warning text-dark fs-6 ms-2 px-3 py-2" style="border-radius:50px; font-weight:500; font-size: 0.7em !important;">
                    <i class="fa-solid fa-clock-rotate-left"></i> In Review
                </span>
                <?php endif; ?>
            </h3> 
            <div class="row">
              <div class="col-md-4 bg-white">
                  <img style="width:200px;height:200px;object-fit:cover;border-radius:10px;" src="<?= base_url('assets/membersdocuments/' . $member->Memberimage) ?>" alt="Member Image">
                  <div style="gap:10px;" class="row mt-4">
                    <button style="width:fit-content;" data-bs-toggle="modal" data-bs-target="#member_documents" class="btn btn-primary fw-bold" onclick="viewMemberdocuments('<?=$member->Aadharfrontimage?>','<?=$member->Aadharbackimage?>','<?=$member->Communitycertificate?>')">View Documents</button>

                    <button style="width:fit-content;" data-bs-toggle="modal" data-bs-target="#eventparticipation" class="btn btn-primary fw-bold" onclick="viewMembereventparticipation('<?=$member->Familymembershipid?>')">Event Partcipation</button>

                    <?php if($member->MemberRole == 'Head'): ?>
                        <?php if(!(isset($member->is_dead) && $member->is_dead == 1)): ?>
                            <button style="width:fit-content;" onclick="showupdatemembermodal('<?=trim($member->Familymembershipid)?>')" class='updatecoord btn btn-primary fw-bold'>Update Details</button>
                        <?php else: ?>
                            <button style="width:fit-content;" class='btn btn-secondary fw-bold' disabled>Update Details</button>
                        <?php endif; ?>
                        
                        <?php if(session()->get('role') == 3): ?>
                            <a href="<?= base_url('add_family_member'); ?>" style="width:fit-content;" class="btn btn-primary fw-bold">Add Family Member</a>
                        <?php endif; ?>
                    <?php endif; ?>
                  </div>
              </div>  
              <div class="col-md-8 bg-white">
            <?php
                function getDisplayVal($field, $member, $updated_data) {
                    $original = $member->$field;
                    if (isset($updated_data[$field]) && $updated_data[$field] != $original) {
                        return htmlspecialchars($updated_data[$field]);
                    }
                    return htmlspecialchars($original);
                }
            ?>
            <table id="coord_data" class="table table-bordered border-dark bg-white">
                <tbody>
                    <tr class="<?= (isset($member->is_dead) && $member->is_dead == 1) ? 'dead-member-row' : 'bg-white' ?>"><th>Name:</th><td><?= (isset($updated_data) ? getDisplayVal('Name', $member, $updated_data) : $member->Name) ?></td></tr>
                    <tr><th>Familymembershipid:</th><td class="text-primary fw-bold"><?=$member->Familymembershipid?></td></tr>
                    <tr><th style="vertical-align:middle;">Address:</th><td>
                        <ul class="list-unstyled">
                        <li><?= isset($updated_data) ? getDisplayVal('Doornumber', $member, $updated_data) : $member->Doornumber ?></li>
                        <li><?= isset($updated_data) ? getDisplayVal('Street', $member, $updated_data) : $member->Street ?></li>
                        <li><?= isset($updated_data) ? getDisplayVal('Village', $member, $updated_data) : $member->Village ?></li>
                        <li><?= isset($updated_data) ? getDisplayVal('Taluk', $member, $updated_data) : $member->Taluk ?></li>
                        <li>
                            <?= isset($updated_data) ? getDisplayVal('District', $member, $updated_data) : $member->District ?> - 
                            <?= isset($updated_data) ? getDisplayVal('Pincode', $member, $updated_data) : $member->Pincode ?>
                        </li>
                        <li><?= isset($updated_data) ? getDisplayVal('State', $member, $updated_data) : $member->State ?></li>
                        </ul>
                    </td></tr>
                    <?php if(isset($member->Phonenumber)): ?>
                    <tr><th>Phone:</th><td><?= isset($updated_data) ? getDisplayVal('Phonenumber', $member, $updated_data) : $member->Phonenumber ?></td></tr>
                    <?php endif; ?>
                    <?php if(isset($member->Aadharnumber)): ?>
                    <tr><th>Aadhar:</th><td><?= isset($updated_data) ? getDisplayVal('Aadharnumber', $member, $updated_data) : $member->Aadharnumber ?></td></tr>
                    <?php endif; ?>
                </tbody>
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
                                <?php if($member->MemberRole == 'Head'): ?>
                                    <th>Action</th>
                                <?php endif; ?>
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
                                    <td>
                                        <?= $fm->Name ?>
                                        <?php if(isset($fm->pending_status) && $fm->pending_status == 'Pending'): ?>
                                            <span class="badge bg-warning text-dark ms-1" style="font-size: 0.65em;">In Review</span>
                                        <?php endif; ?>
                                    </td>
                                <td><?= $display_role ?></td>
                                <td><?= $fm->Gender ?></td>
                                <td><?= $age ?></td>
                                 <?php if($member->MemberRole == 'Head'): ?>
                                    <td class="d-flex align-items-center" style="gap: 5px;">
                                        <?php if(!(isset($fm->is_dead) && $fm->is_dead == 1)): ?>
                                            <button style="width:fit-content;" onclick="showupdatemembermodal('<?=trim($fm->Familymembershipid)?>')" class='updatecoord btn btn-sm btn-primary fw-bold'>Edit</button>
                                        <?php else: ?>
                                            <button style="width:fit-content;" class='btn btn-sm btn-secondary fw-bold' disabled>Edit</button>
                                        <?php endif; ?>
                                    </td>
                                <?php endif; ?>
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
         
        <?php if(isset($coordinators)): ?>
        <div class="container-fluid px-4 pt-4 d-flex justify-content-between coordpadd">

         </div>

        
         
        <div class="container-fluid pt-3 px-4 coordpadd"><!----------------table--------------->
       
        <table class="table table-bordered">
            <thead>
            <tr style="font-size:18px;" class="ps-gray">
            <th>S.No</th><th>User ID</th><th>Name</th><th>Mobile</th><th>District</th><th>Assigned areas</th><th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody id="ps-coords">

            <?php if(isset($coordinators) && isset($sno)):?>
                <?php $i=$sno + 1; foreach ($coordinators as $key => $value): ?> 
                    
                    <tr>
                    <td style='font-weight:500;'><?=$i?></td>
                    <td class='text-primary fw-bold'><?=$value->Familymembershipid?></td>
                    <td style='font-weight:500;'><?=$value->Name?></td>
                    <td style='font-weight:500;'><?=$value->Phonenumber?></td>
                    <td style='font-weight:500;'><?=$value->District?></td>
                    <td style='font-weight:500;'><?=!empty($value->Area_one) ? "$value->Area_one" : ""?><?=!empty($value->Area_two) ? ", $value->Area_two" : ""?><?=!empty($value->Area_three) ? ",  $value->Area_three" : ""?><?=!empty($value->Area_four) ?  ", $value->Area_four" : ""?></td>
                    <td class='d-flex justify-content-evenly'>
                    <button onclick='showupdatecoordsmodal(<?=trim($value->Familymembershipid)?>)' style='width:30px;height:30px;outline:none;border:none;' class='updatecoord shadow-sm text-dark table-btn rounded-circle'><i class='fa-regular fa-pen-to-square'></i><span class='updatetooltip'>Update Details</span></button>
                    <button data-bs-toggle='modal' data-bs-target='#deletemodal' onclick="deletecoord('<?=trim($value->Familymembershipid)?>','<?=trim($value->Name)?>')" style='width:30px;height:30px;outline:none;border:none;color:red;' class='trashcoord table-btn shadow-sm rounded-circle'><i class='fa-solid fa-trash-can'></i><span class='trashtooltip'>Trash</span></button>
                    <button data-bs-toggle = 'modal' data-bs-target='#viewCoordinatordata' onclick ="viewCoordinatordata('view-coordinator-data?coord_id=<?=$value->Familymembershipid?>')" data-bs-toggle='tooltip' title='View Details' style='width:30px;height:30px;outline:none;border:none;' class='table-btn text-dark shadow-sm rounded-circle'><i class='fa-sharp fa-solid fa-eye'></i></button>
                    </td>
                    </tr>
                    <?php ++$i; endforeach;?>
                    <?php endif;?>
            </tbody>
            </table>

        </div> <!----------------table-end------->

        <div class='d-flex justify-content-center container-fluid'> <!-----------------pagination---------------------->
        
        <div class="col-md-6 py-2 d-flex justify-content-around align-items-center">

          <?php 
          if(isset($counts) ){
            if($counts > 0){
            $countsperpage = 10;
            $noofpages = ceil($counts / $countsperpage) - 1;
            $totalpagesarr = createarr($noofpages);
            $totalpages = count($totalpagesarr) ;
            $initialindex = $_SESSION["altercoordsinitialindex"] ?? 0;
            $lastindex = 5; 
            $pages = array_slice($totalpagesarr,$initialindex,$lastindex);
            echo "<a href='changecoordinatorspagesetup?initialindex=0' style='cursor:pointer;' class='text-dark text-decoration-none'><i id = 'arrow' class='fa-solid fa-arrow-left-long'></i></a>";
            $j = 0;
            foreach ($pages as $key => $value) {
              $count = $countsperpage * $value;
              $pageno = $value + 1;
             
              if($pageno == 5){
                echo "<a style='width:35px;height:35px;' href='changecoordinatorspagesetup?initialindex=$value' class='".($j==0 ? 'active-page' : '')." active text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$pageno</a>";}
              else{
                echo "<button style='width:35px;height:35px;' onclick='displayCoordinators($count,$j)' class='".($j==0 ? 'active-page' : '')." active rounded-circle'>$pageno</button>";
              }
              ++$j;
            }

            echo "<span>...</span>";
            $totalcount = ($totalpages - $lastindex);
            echo "<a href='changecoordinatorspagesetup?initialindex=$totalcount' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$totalpages</a>";
            
            $newindex = $initialindex+$lastindex; 
            echo "<a href='changecoordinatorspagesetup?initialindex=$newindex' style='cursor:pointer;' class='text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></a>";
          }
          else{
            echo "<span>No pages available</span>";
          }
          }

          if(isset($initialindex) && isset($newcounts)){
            
            $newcounts = $newcounts;
            $initialindex = $initialindex;
            $countsperpage = 10;
            $noofpages = ceil($newcounts / $countsperpage) - 1;
            $totalpagesarr = createarr($noofpages);
            $totalpages = count($totalpagesarr);
            $lastindex = 5;
            $start = $initialindex > $noofpages ? 0 : $initialindex;
            $pages = array_slice($totalpagesarr,$start,$lastindex);
            $start == 0 ? $prevlist = 0 : (($start - $lastindex) < 0 ? $prevlist = 0 : $prevlist = $start - $lastindex) ;
            echo "<a href='changecoordinatorspagesetup?initialindex=$prevlist' style='cursor:pointer;' class='text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-left-long'> </i></a>";

            $j = 0;

            foreach ($pages as $key => $value) {
              $count = $countsperpage * $value;
              $pageno = $value + 1;
              
              if($pageno == 5 || $pageno - $start == 5){
                echo $pageno == $totalpages ? "<button style='width:35px;height:35px;'onclick='displayCoordinators($count,$j)' class='".($j==0 ? 'active-page' : '')." active rounded-circle'>$pageno</button>" : "<a href='changecoordinatorspagesetup?initialindex=".($pageno - 1)."' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;' class='".($j==0 ? 'active-page' : '')." active text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$pageno</a>"; }
              else{
                echo "<button style='width:35px;height:35px;'onclick='displayCoordinators($count,$j)' class='".($j==0 ? 'active-page' : '')." active rounded-circle'>$pageno</button>";
              }
              ++$j;
            }

            echo "<span>...</span>";
            $totalcount = ($totalpages - $lastindex);
            echo "<a href='changecoordinatorspagesetup?initialindex=$totalcount' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$totalpages</a>";
            
            $newindex = $start + $lastindex; 
            echo "<a href='changecoordinatorspagesetup?initialindex=".($totalpages - $start <= $lastindex ? $totalcount : $newindex)."'  style='cursor:pointer;' class='text-decoration-none text-dark'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></a>"; 
          }

          function createarr($noofpages){
            return range(0,$noofpages);
          }
          ?>
        </div>
        </div><!--------------pagination-end--------------------->
        <?php endif; ?>

        </div><!-----------main-dashboard-end------------------------>
        

        </div><!--------------main-navbar-end------------------->
            
  
  </div>
<!---------------------Custom Mobile Menu-------------------------->

<div id="custom-mobile-menu">
    <div class="close-btn" onclick="closeMobileMenu()">&times;</div>
    <div id="mobile-menu-content">
        <!-- Content loaded via JS -->
    </div>
</div>
    
 <!---------------------Custom Mobile Menu End-------------------------------->

<!------------------------Coordinators-modal-------------------------------------------->
        
<div data-bs-backdrop="static" data-bs-keyboard="false" id="member_documents" class="modal fade">
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

<!-----------------------Update-member-modal-------------------------------------------->
        
<div id="updatemember-modal-hide" class="updatemember-modal">
<div id="update-member-section" style="overflow-y:auto;border-radius:25px;" class="bg-white">
              
        <div id="update-member-form" class="container bg-white">
        
              
        </div>
        </div>
        </div>
<!-----------------------------Update-member-end-------------------------------->

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
            <thead id="nomemberresult">
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
<script>
                       
let unselectedmembers = [];
let resultbox = document.getElementById("searchmemberdata");

// Mobile Menu Functions
function openMobileMenu() {
  document.getElementById('custom-mobile-menu').style.display = 'block';
}

function closeMobileMenu() {
  document.getElementById('custom-mobile-menu').style.display = 'none';
}

$.ajax({
      type:"get",
      url:"<?= base_url('members/sidemenu') ?>",
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
      url:"<?= base_url('members/topsubmenu') ?>",
      success:(result)=>{
          //  document.getElementById("offcanvasmenu").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("offcanvasmenu").innerHTML = error;
      }
    });


    $.ajax({
      type:"get",
      url:"<?= base_url('members/topmenu') ?>",
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
      url:"<?= base_url('members/pslogo') ?>",
      success:(result)=>{
           document.getElementById("ps-logo").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("ps-logo").innerHTML = error;
      }
    });


     let windowheight = window.innerHeight;
     let form_height = windowheight*(95/100);
     let form_section = document.getElementById("update-member-section");
     form_section.style.height = `${form_height}px`;
     /* let setheight = document.getElementById("pagecontrol");
     let pageheight = window.innerHeight;
     let b = document.getElementById("search-bar").getBoundingClientRect().height;
     setheight.style.height = pageheight - b+"px"; */

     window.addEventListener("resize",()=>{
               document.getElementById("menu-bar").style.height = (window.innerHeight - document.getElementById("search-bar").getBoundingClientRect().height)+"px";
       let formmodal = document.getElementById("update-member-section");
       let b = window.innerWidth;
       if( b > 768) {
        formmodal.style.left = "2.5%";
       }
       else {
        formmodal.style.left = "2.5%";
       }
    });

    let showaddmember = document.getElementById("members-modal-hide");
    let showupdatemember = document.getElementById("updatemember-modal-hide");

    showaddmember.style.height =  100+window.innerHeight+"px";
    showupdatemember.style.height = 100+window.innerHeight+"px";

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
  
    // document.getElementById("menu-bar").style.height = (window.innerHeight - document.getElementById("search-bar").getBoundingClientRect().height)+"px";

        function commonSearch(coords){
             
            let searchfields = coords.value;
    
            $.ajax({
              type:"get",
              url:"coordinators/searchcoordinators",
              data:{"searchfields":searchfields},
              success:(result)=>{
                document.getElementById('ps-coords').innerHTML = result;
              },
              error:(error)=>{
                document.getElementById('ps-coords').innerHTML = error;
              }
           })};                                

    function displayCoordinators(counts,index){
      
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

      $.ajax({
        type:"get",
        url:"coordinators/displaycoordinators",
        data:{"count":counts},
        success:function(result){
            document.getElementById('ps-coords').innerHTML = result;
        },
        error:function(error){
            document.getElementById('ps-coords').innerHTML = error;
        }
      });
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
            psShowToast('error', 'Something went wrong. Please try again.');
          }
          });  
          } 
     }

     function changecoordinatorsPagesetup(initialIndex){
      
      $.ajax({
        type:"get",
        url:"coordinators/changecoordinatorspagesetup",
        data:{"initialindex":initialIndex},
        success:function(result){
            document.getElementById('ps-coords').innerHTML = result;
        },
        error:function(err){
            document.getElementById('ps-coords').innerHTML = err;
        }
      });
    }

    function viewMemberdocuments(aadharfrontimage,aadharbackimage,communitycertificate) {
         document.getElementById("showdocuments").innerHTML = `
    <div style="width:fit-content;">
        <p>Aadhar Front Image:</p>
        <img style="width:300px;height:200px;" src="<?= base_url('assets/membersdocuments/') ?>${aadharfrontimage}">
    </div>
    <div style="width:fit-content;">
        <p>Aadhar Back Image:</p>
        <img style="width:300px;height:200px;" src="<?= base_url('assets/membersdocuments/') ?>${aadharbackimage}">
    </div>
    <div style="width:fit-content;">
        <p>Communitycertificate:</p>
        <img style="width:200px;height:300px;cursor:pointer;" 
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
      document.getElementById("dis_commun_cert").innerHTML = `<img style="width:100%;height:750px;" class="img-fluid" src='assets/membersdocuments/${communitycertificate}'>`;
    }

    function viewMembereventparticipation(id) {
        $.ajax({
        type:"post",
        url:"<?= base_url('event-participation') ?>",
        data:{"id":id},
        success:function(result){
          
        let event = [JSON.parse(result)];
        let eventparticipation = event[0]
        console.log(eventparticipation)
        if(eventparticipation.length < 1){
          document.getElementById("nomemberresult").innerHTML = `<tr><td class="text-center" colspan="6">No records found</td></tr>`;
        }
        else{
           document.getElementById("showparticipation").innerHTML = eventparticipation.map((participation,index)=> {
           return `<tr><td>${index+1}</td><td>${participation.eventname}</td><td>${participation.Taxamount}</td><td>${participation.Collectedamount}</td><td>${participation.balanceamount}</td><td>${participation.paymentdate}</td></tr>`;
           }).join("");
          }
        },
        error:function(error){
            // document.getElementById('deletetoast').innerHTML = error;
        }
      })
    }

    function showupdatemembermodal(id){
      // let show = document.getElementById("updatemember-modal-hide");
      let formmodal = document.getElementById("update-member-section");
       let b = window.innerWidth;
       console.log(id)
       $.ajax({
        type:"get",
        url:"<?= base_url('members/getmember') ?>",
        data:{"id":id},
        success:(result)=>{
          console.log(id,result)
           $("#update-member-form").html(result);
        },
        error:(error)=>{
            $("#update-member-form").html(error);
        }
      });

       if( b > 768){
        showupdatemember.style.left = "0%";
        formmodal.style.left = "2.5%";

       }
       else{
        showupdatemember.style.left = "0%";
        formmodal.style.left = "2.5%";
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
         document.getElementById("pincodeerror").innerHTML = "";
      }
      else if(field_value.length < 6){
         document.getElementById("pincodeerror-update").innerHTML = "Pincode number should contain 6 digits.";
      }
   }

   if(field_name == "phoneno-update"){
      if(field_value.length >= 10 || field_value.length == 0){
         document.getElementById("phonenoerror-update").innerHTML = "";
      }
      else if(field_value.length < 10){
         document.getElementById("phonenoerror-update").innerHTML = "Phone number should contain 10 digits.";
      }
   }

   if(field_name == "existfamilyid-update"){
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

function validateMemberform() {
      let memberregistrationform = document.forms["memberregistration-update"];
      let name = memberregistrationform["name-update"].value.trim();
      let state = memberregistrationform["state-update"].value.trim();
      let district = memberregistrationform["district-update"].value.trim();
      let taluk = memberregistrationform["taluk-update"].value.trim();
      let panchayat = memberregistrationform["panchayat-update"].value.trim();
      let village = memberregistrationform["village-update"].value.trim();
      let street = memberregistrationform["street-update"].value.trim();
      let doorno = memberregistrationform["doorno-update"].value.trim();
      let pincode = memberregistrationform["pincode-update"].value.trim();
      let existfamilyid = memberregistrationform["existfamilyid-update"].value.trim();
      let phoneno = memberregistrationform["phoneno-update"].value.trim();
      let aadharno = memberregistrationform["aadharno-update"].value.trim();
      let selfimage = memberregistrationform["Memberimage"].value.trim();
      let aadharfrontimage = memberregistrationform["Aadharfrontimage"].value.trim();
      let aadharbackimage = memberregistrationform["Aadharbackimage"].value.trim();
      let communitycertificate = memberregistrationform["Communitycertificate"].value.trim();
      let textregex = /^([A-Za-z\s]{3,})+$/;
      let alphanumericregex = /^[a-zA-Z0-9/()\s]+$/;
      let normalregex = /^[A-Za-z0-9]+$/;
      // let phonenoregex = /^[6-9]\d{9}+$/;

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
            return false;
         }
      }

      if(phoneno == ""){
         document.getElementById("phonenoerror-update").innerHTML = "Please fill phoneno field.";
         return false;
      }


      if(aadharno == ""){
         document.getElementById("aadharnoerror-update").innerHTML = "Please fill aadharno field.";
         return false;
      }
      else if(aadharno.length < 12){
         document.getElementById("aadharnoerror-update").innerHTML = "Aadhar number should contain 12 digits.";
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
   document.getElementById(imageid).style.display = "none";
   button.style.display = "none";
     file.value = "";
}

function activateButton(checkbox){
let checked = checkbox.checked;
console.log(checked)
let submitbutton = document.getElementById("submitbutton");
if(checked){
   submitbutton.removeAttribute("disabled");
}
else{
   submitbutton.setAttribute("disabled","disabled");
}
}

    window.onclick = function(event) {

    if (event.target == showaddmember) {
    let formmodal = document.getElementById("add-members-form");
        let b = window.innerWidth;
    if( b > 768){
        showaddmember.style.left = "-100%";
        formmodal.style.left = "-95%";
       }
       else{
        showaddmember.style.left = "-100%";
        formmodal.style.left = "-95%";
       }       
    }

    else if (event.target == showupdatemember) {
    let formmodal = document.getElementById("update-member-section");
    let b = window.innerWidth;
    if( b > 768) {
    showupdatemember.style.left = "-100%";
    formmodal.style.left = "-95%";
    }
    else {
    showupdatemember.style.left = "-100%";
    formmodal.style.left = "-90%";
    }
    }
    }

  function hidemembersform(){
    let formmodal = document.getElementById("add-members-form");
        let b = window.innerWidth;
    if( b > 768){
        showaddmember.style.left = "-100%";
        formmodal.style.left = "-95%";
       }
       else{
        showaddmember.style.left = "-100%";
        formmodal.style.left = "-90%";
       }
       
  }

  function hideupdatememberform(){
    let formmodal = document.getElementById("update-member-section");
        let b = window.innerWidth;
    if( b > 768){
        showupdatemember.style.left = "-100%";
        formmodal.style.left = "-42%";
       }
       else{
        showupdatemember.style.left = "-100%";
        formmodal.style.left = "-90%";
       }
  }

  function uploadFileaddmemberform(file){
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
    image.nextElementSibling.innerHTML = `<button class='ps-img-btn mt-2 rounded' type='button' onclick='removeImageaddmemberform(this,${file.name})'>Remove</button>`; 
    
  }

  function removeImageaddmemberform(button,file){
   let imageid = file.name;
   document.getElementById(imageid).style.display = "none";
   button.style.display = "none";
   file.value = "";
  }

  function activateUpdateformbutton(checkbox){
  let checked = checkbox.checked;
  let submitbutton = document.getElementById("updatesubmitbutton");
  if(checked){
   submitbutton.removeAttribute("disabled");
  }
  else{
   submitbutton.setAttribute("disabled","disabled");
  }
  }
   </script>
  

 <!-------------------------------chart-end------------------------------------>  


 



      
    
</body>
</html>



