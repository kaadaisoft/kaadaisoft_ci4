<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Members</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <!-- <link rel="stylesheet" href="./kaadaisoft.css"> -->
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
     .active-bg{
      background-color:rgb(230, 230, 230);
     }
     .heading-kaadaisoft{
        color: rgb(0, 123, 255);
        font-weight:800;
        font-family:sans-serif;
     }
     .ps-letter{
        background-color: rgb(0, 123, 255);
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
     
      .ps-table-grid{
        display:grid;
        grid-template-columns: repeat(auto-fit,minmax(300px,700px));
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
           .ham-menu{
        /* position:absolute; */
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

      #members-form div > input,select{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 10px;
      }

      #add-members-form{
        width:42%;
        border-radius:25px;
        box-sizing:border-box;
        padding:3%;
        position: relative;
      }

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
      }

      #members-modal-hide{
        position: fixed;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        z-index: 2000;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .members-modal{
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

      #membertoast{
        border:4px solid rgb(132, 250, 132);
        border-radius:10px;
        position:absolute;
        top:10%;
        right:-380px;
        transition:0.5s;
        background-color:rgb(18, 155, 18);
      }

      #update-member-form div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 10px;
      }

      #update-member-form div > button{
        border-radius:50px;
      }

      #update-member-section{
        width:95%;
        border-radius:25px;
        box-sizing:border-box;
        padding:3%;
        position: relative;
      }


      #updatemember-modal-hide{
        position: fixed;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        z-index: 2000;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .updatemember-modal{
        padding:10px 0;
        background-color:rgba(128, 128, 128, 0.4);
        overflow:hidden;
      }

      .active-coords{
        background-color:rgb(230, 230, 230);
        font-weight:600;
      } 
      .table-btn{
        background-color: rgb(239, 236, 236);
     }
     .member-text{
      color: rgb(0, 123, 255);
     }

     .updatemember{
        position: relative;
      }

      .trashmember{
        position: relative;
      }

      .updatetooltip{
      visibility:hidden;
      width:max-content;
      background-color: rgb(0, 123, 255);
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
          border-color:transparent transparent rgb(0, 123, 255) transparent;
     }
     .updatemember:hover .updatetooltip{
        visibility:visible;
     }
     .trashtooltip{
      visibility:hidden;
      width:max-content;
      background-color: rgb(0, 123, 255);;
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
          border-color:transparent transparent rgb(0, 123, 255); transparent;
     }
     .trashmember:hover .trashtooltip{
        visibility:visible;
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

      .ps-img-btn{
        color:white; 
        font-weight:500;
        border:none;
        background-color:#295CF5;
      }

      #formforregistration{
         box-shadow: 0px 1px 10px 10px rgba(0.1,0.1,0.1,0.1);
      }

      /* Chrome, Safari, Edge, Opera */
     input::-webkit-outer-spin-button,
     input::-webkit-inner-spin-button {
     -webkit-appearance: none;
     margin: 0;
     }

      /* Firefox */
     input[type=number] {
     -moz-appearance: textfield;
     }


      @media screen and (max-width:768px){
        #search-bar{
            /* background-color:rgb(248, 245, 245); */
           }
           #menu-bar{
            display:none;
           }
           #commonsearch{
            width:100% !important;
            margin: 0 !important;
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
           .memberpadd{
            padding:5% 0 0 0 !important;
           }
           #hidename{
            display:none;
           } 
           .ps-logo{
            justify-content:space-between;
          }
          .fa-bell-icon{
            padding-right:10px;
          } 
          #ps-name-line{
            display:none;
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
          #memberssubmenu{
            display:flex !important;
           }
      }

      @media screen and (max-width:768px) {

          #add-members-form div > input{
            padding: 5px;
          }
          #add-members-form{
            width:90%;
            padding:8%;
          }
          #update-member-section div > input{
            padding: 5px;
          }
          #update-member-section{
            width:90%;
            padding:8%;
          }
      }


    /* Fixed Premium Layout */
    html, body { height: 100%; margin: 0; overflow: hidden; }
    .layout-container { display: flex; flex-direction: column; height: 100vh; width: 100%; }
    .top-navbar-row { height: 75px; flex-shrink: 0; z-index: 1050; background: #0f172a; display: flex; align-items: center; margin: 0 !important; border-bottom: 1px solid #1e293b; }
    .main-body-row { flex: 1; display: flex; overflow: hidden; margin: 0 !important; }
    #menu-bar { width: 260px; height: 100%; overflow-y: auto; flex-shrink: 0; background-color: #0f172a !important; border-right: 1px solid #1e293b; padding: 0; }
    .main-content-area { flex: 1; overflow-y: auto; background-color: #f8fafc; padding-bottom: 50px; }

    @media screen and (max-width: 768px) {
      .top-navbar-row { 
          position: fixed;
          top: 0;
          width: 100%;
          z-index: 1050;
          height: auto; 
          flex-wrap: wrap; 
          padding: 5px 0 !important;
      }
      .main-body-row { 
          margin-top: 200px !important; /* Adjust for stacked top bar elements */
          flex-direction: column; 
          overflow: auto; 
      }
      #menu-bar { display: none; }
      .main-content-area { width: 100%; overflow: visible; }
      html, body { overflow: auto; height: auto; }
      .layout-container { height: auto; }
      #ps-logo, #search-bar { width: 100% !important; }
    }

    /* Custom Mobile Menu Styles */
    #custom-mobile-menu {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: #0f172a;
        z-index: 9999;
        overflow-y: auto;
    }
    .close-btn { position: absolute; top: 20px; right: 20px; font-size: 30px; cursor: pointer; color: #cbd5e1; }
    #mobile-menu-content { padding-top: 60px; }
  </style>
</head>
<body>
        
<div id="pageheight" class="layout-container container-fluid p-0">
      
<?= view('notification_toast') ?>



      <div class="top-navbar-row"><!-----top-bar--------------->

      <div id="ps-logo" class="col-md-3 d-flex align-items-center justify-content-start ps-2">
               
      

        </div>

        <div id="search-bar" class="col-md-9 d-flex align-items-center justify-content-between px-3">


       
        </div>
       
      </div><!-----------top-bar-end----------------------->


        <div class="main-body-row"><!----------main-navbar----------->

         <div id="menu-bar"><!----------side-bar-------------------->
       
              
         </div><!-----------side-bar-end-------------->
            
         <div id="pagecontrol" class="main-content-area"><!-----------main-dashboard------------------------->
         
         <div class="container-fluid px-4 pt-4 d-flex justify-content-between memberpadd">
           
         </div>
         
        <div style="overflow:auto" class="container-fluid pt-3 px-4 memberpadd"><!----------------table-------->
       


        <table class="table table-reskaadaisive table-bordered">
            <thead>
            <tr style="font-size:18px;" class="ps-gray">
            <th>S.No</th><th>User ID</th><th>Name</th><th>Mobile</th><th>District</th><th>Coordinator</th><th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody id="ps-members">
                
            <?php if(isset($members) && count($members) && isset($sno)): $i=$sno + 1;?>
                
                <?php foreach ($members as $key => $value): ?>
                    
                  <tr >
                    <td style='font-weight:500;'><?=$i?></td>
                    <td class='text-primary fw-bold'><?=$value->Familymembershipid?></td>
                    <td style='font-weight:500;'><?=$value->Name?></td>
                    <td style='font-weight:500;'><?=$value->Phonenumber?></td>
                    <td style='font-weight:500;'><?=$value->District?></td>
                    <td style='font-weight:500;'><?=!empty($value->Area_one) ? "$value->Area_one" : ""?><?=!empty($value->Area_two) ? ", $value->Area_two" : ""?><?=!empty($value->Area_three) ? ",  $value->Area_three" : ""?><?=!empty($value->Area_four) ?  ", $value->Area_four" : ""?></td>
                    <td class='d-flex justify-content-evenly'>
                    <button onclick="showupdatemembermodal('<?=trim($value->Familymembershipid)?>')" style='width:30px;height:30px;outline:none;border:none;' class='updatecoord shadow-sm text-dark table-btn rounded-circle'><i class='fa-regular fa-pen-to-square'></i><span class='updatetooltip'>Update Details</span></button>
                    <button data-bs-toggle='modal' data-bs-target='#deletemodal' onclick="trashmember('<?=trim($value->Familymembershipid)?>','<?=trim($value->Name)?>','<?=trim($value->Taluk)?>')" style='width:30px;height:30px;outline:none;border:none;color:red;' class='trashcoord table-btn shadow-sm rounded-circle'><i class='fa-solid fa-trash-can'></i><span class='trashtooltip'>Trash</span></button>
                    <button onclick ="viewMemberdata('<?=$value->Familymembershipid?>')" data-bs-toggle='tooltip' title='View Details' style='width:30px;height:30px;outline:none;border:none;' class='table-btn text-dark shadow-sm rounded-circle'><i class='fa-sharp fa-solid fa-eye'></i></button>
                    </td>
                    </tr>
                <?php ++$i; endforeach; ?>
                <?php else:?>
                <tr><td class="text-center" colspan="7">No pages available.</td></tr>
            <?php endif; ?>
            </tbody>
            </table>

        </div> <!----------------table-end------->

        <div class='d-flex justify-content-center container-fluid'> <!-----------------pagination---------------------->
        
        <div class="col-md-6 py-2 d-flex justify-content-around align-items-center">

          <?php 
        
          if(isset($counts)){
            if($counts > 0){
            $countsperpage = 10;
            $noofpages = ceil($counts / $countsperpage) - 1;
            $totalpagesarr = createarr($noofpages);
            $totalpages = count($totalpagesarr) ;
            $initialindex = $_SESSION["altermembersinitialindex"] ?? 0;
            $lastindex = 5;
            $pages = array_slice($totalpagesarr,$initialindex,$lastindex);
            echo "<a href='changememberspagesetup?initialindex=0' style='cursor:pointer;' class='text-dark text-decoration-none text-dark'><i id= 'arrow' class='fa-solid fa-arrow-left-long'></i></a>";
            $j = 0;
            foreach ($pages as $key => $value) {
              $count = $countsperpage * $value;
              $pageno = $value + 1;
             
              if($pageno == 5){
                echo "<a href='changememberspagesetup?initialindex=".($pageno - 1)."' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;' class='".($j==0 ? 'active-page' : '')." active text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$pageno</a>"; }
              else{
                echo "<button style='width:35px;height:35px;'onclick='displayMembers($count,$j)' class='".($j==0 ? 'active-page' : '')." active rounded-circle'>$pageno</button>";
              }
              ++$j;
            }

            echo "<span>...</span>";
            $totalcount = ($totalpages - $lastindex);
            echo "<a href='changememberspagesetup?initialindex=$totalcount' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$totalpages</a>";
     
            $newindex = $initialindex + $lastindex; 
            echo "<a href='changememberspagesetup?initialindex=$newindex'  style='cursor:pointer;' class='text-decoration-none text-dark'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></a>"; 
          }
          else{
            echo "<span>No pages available</span>";
          }
          }

          if(isset($initialindex) && isset($newcounts)){
             $countsperpage = 10;
            $noofpages = ceil($newcounts / $countsperpage) - 1;
            $totalpagesarr = createarr($noofpages);
            $totalpages = count($totalpagesarr);
            $lastindex = 5;
            $start = $initialindex > $noofpages ? 0 : $initialindex;
            $pages = array_slice($totalpagesarr,$start,$lastindex);
            $start == 0 ? $prevlist = 0 : (($start - $lastindex) < 0 ? $prevlist = 0 : $prevlist = $start - $lastindex) ;
            echo "<a href='changememberspagesetup?initialindex=$prevlist' style='cursor:pointer;' class='text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-left-long'></i></a>";

            $j = 0;

            foreach ($pages as $key => $value) {
              $count = $countsperpage * $value;
              $pageno = $value + 1;
              
              if($pageno == 5 || $pageno - $start == 5){
                echo $pageno == $totalpages ? "<button style='width:35px;height:35px;'onclick='displayMembers($count,$j)' class='".($j==0 ? 'active-page' : '')." active rounded-circle'>$pageno</button>" : "<a href='changememberspagesetup?initialindex=".($pageno - 1)."' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;' class='".($j==0 ? 'active-page' : '')." active text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$pageno</a>"; }
              else{
                echo "<button style='width:35px;height:35px;'onclick='displayMembers($count,$j)' class='".($j==0 ? 'active-page' : '')." active rounded-circle'>$pageno</button>";
              }
              ++$j;
            }

            echo "<span>...</span>";
            $totalcount = ($totalpages - $lastindex);
            echo "<a href='changememberspagesetup?initialindex=$totalcount' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>$totalpages</a>";
            
            $newindex = $start + $lastindex; 
            echo "<a href='changememberspagesetup?initialindex=".($totalpages - $start <= $lastindex ? $totalcount : $newindex)."'  style='cursor:pointer;' class='text-decoration-none text-dark'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></a>"; 
          }

          function createarr($noofpages){
            return range(0,$noofpages);
          }
      
          
          ?>
        </div>
        </div><!--------------pagination-end--------------------->

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
    

<!-----------------------Add-member-modal-------------------------------------------->
        
<div id="members-modal-hide" class="members-modal">

        <div id="add-members-form" class="bg-white">
        <div class="pb-4"> 
        <span class="fs-5" style="color: #2c3e50;">Add Members</span>
        <button onclick="hidemembersform()" class="float-end btn btn-close"></button>
        </div>

        <form id="members-form" method="post" action="<?=base_url("members/addmember")?>">
            <div class="form-grid ">
                <label class="pb-1" for="name">Name</label>
                <input name="membername" type="text" class="w-100" id="name" >
            </div>
            <div class="form-grid mt-3">
                <label class="pb-1" for="Aadhar">Aadhar Number</label>
                <input type="number" name="memberaadhar" class="w-100" id="Aadhar" >
            </div>
            <div class="form-grid mt-3">
                <label class="pb-1" for="phone">Phone Number</label>
                <input type="number" name="memberphone" class="w-100" id="phone" >
            </div>
            <div class="form-grid mt-3">
                <label class="pb-1" for="status">Email</label>
                <input type="text" name="memberemail" class="w-100" id="status" >
            </div>
            <div class="form-grid mt-3">
                <label class="pb-1" for="assignedArea">Village</label>
                <select type="text" name="membervillage" class="w-100" id="assignedArea" required>
                  <option value="">Select Village</option>
                    <?php if(isset($villages))
                    foreach ($villages as $key => $value) {
                      echo "<option value='$value[village_id]'>$value[village_name]</option>";
                    }
                    ?>
                </select>    
            </div>
            <br>
            <div class="text-center">
                <input type="submit" name="membersubmit" value="save" class="btn ps-add-btn text-white px-5 py-1">
            </div>
        </form>
        </div>
        </div>
<!-----------------------------Add-member-end-------------------------------->


<!-----------------------Update-member-modal-------------------------------------------->
        
<div id="updatemember-modal-hide" class="updatemember-modal">
<div id="update-member-section" style="overflow-y:auto;border-radius:25px;" class="bg-white">
              
        <div id="update-member-form" class="container">
        
              
        </div>
        </div>
        </div>
<!-----------------------------Update-member-end-------------------------------->

<!--------------------------delete-modal---------------------->

<div class="modal fade" id="deletemodal">

<div class="modal-dialog">
   <div class="modal-content">
      
       <div class="modal-header">
          <h4 style="color:red;">Alert</h4>
          <button class="btn btn-close" data-bs-dismiss="modal"></button>
       </div>

       <div id="deletebox" class="modal-body">
        
       </div>

   </div>
</div>

</div>

<!--------------------------delete-modal-end------------------>

<!------------------------show-member-data------------------------->
<div id="showmembers" class="modal fade">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
   <div class="modal-content border-0 shadow-lg">
     <div class="modal-header bg-white border-bottom pb-3">
        <h4 class="modal-title d-flex align-items-center m-0" style="font-weight: 600; color: #2c3e50;">
            <i class="fa-solid fa-user text-primary me-3"></i> Member Details
        </h4>
        <button class="btn btn-close" data-bs-dismiss="modal"></button>
     </div>

     <div id="memberdata" class="modal-body p-0">
     
     </div>

   </div>
  </div>

</div>
<!--------------------------show-member-data-end---------------------->

<!------------------------show-member-documents------------------------->
<div id="showmembersdocuments" data-bs-backdrop="static" data-bs-keyboard= "false" class="modal fade">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
   <div class="modal-content">
     <div class="modal-header">
     <h4>Member details:</h4>
     <button class="btn btn-close" data-bs-dismiss="modal"></button>
     </div>

     <div id="showdocuments" class="modal-body d-flex justify-content-evenly">
     
     </div>

   </div>
  </div>

</div>
<!--------------------------show-member-documents-end---------------------->

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
if(isset($_SESSION["altermembersindex"]) && isset($counts)){
  $index = $_SESSION["altermembersindex"];
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

unset($_SESSION["altermembersindex"]);
?>
<!-----------------set-index-end-------------------->
<script>

let pageheight = window.innerHeight;
// document.getElementById("pageheight").style.height = pageheight+"px";

// Mobile Menu Functions
    function openMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'block';
    }

    function closeMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'none';
    }

    $.ajax({
      type: "get",
      url: "members/sidemenu",
      success: (result) => {
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
      url:"members/topmenu",
      success:(result)=>{
           document.getElementById("search-bar").innerHTML = result;
          //  document.getElementById("searchmembers").style.display = "flex";
          //  document.getElementById("memberssubmenu").style.display = "flex"; 
      },
      error:(error)=>{
           document.getElementById("search-bar").innerHTML = error;
      }
    });

    $.ajax({
      type:"get",
      url:"members/pslogo",
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

     let setheight = document.getElementById("pagecontrol");
     let a = window.innerHeight;
     let b = document.getElementById("search-bar").getBoundingClientRect().height;
     setheight.style.height = a - b+"px";

   /*  function showmemberslist(){
      $.ajax({
      type:"get",
      url:"members/getmemberslist",
      success:(result)=>{
           document.getElementById("memberslistforassign").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("memberslistforassign").innerHTML = error;
      }
      });
      } */  
     /*--------multiple slect option---------------->*/
    
             document.getElementById("menu-bar").style.height = (window.innerHeight - document.getElementById("search-bar").getBoundingClientRect().height) + "px"; 

    function commonSearch(members){
             
             let searchfields = members.value;
     
             $.ajax({
               type:"get",
               url:"members/searchmembers",
               data:{"searchfields":searchfields},
               success:(result)=>{
                console.log(result)
                 document.getElementById('ps-members').innerHTML = result;
               },
               error:(error)=>{
                 document.getElementById('ps-members').innerHTML = "Error";
               }
    })}        

    function displayMembers(counts,index){
      console.log(counts,index);
         activepage = document.querySelectorAll(".active");
         let l = activepage.length;
         for(let i=0; i < l ; i++){
          if( i == index ){
              activepage[i].classList.add("active-page")
          }
          else{
            if(activepage[i].classList.contains("active-page")){
               activepage[i].classList.remove("active-page")
            }
          }   
         } 
      $.ajax({
        type:"get",
        url:"members/displaymembers",
        data:{"count":counts},
        success:function(result){
            document.getElementById('ps-members').innerHTML = result;
        },
        error:function(err){
          document.getElementById('ps-members').innerHTML = err;
        }
      })
    }


/*     function changemembersPagesetup(initialIndex,lastindex){
      console.log(initialIndex);
      $.ajax({
        type:"get",
        url:"displaymembers",
        data:{"initialindex":initialIndex,"lastindex":lastindex},
        success:function(result){
            document.getElementById('ps-members').innerHTML = result;
        },
        error:function(err){
          document.getElementById('ps-members').innerHTML = err;
        }
      })
    } */

    window.addEventListener("resize",()=>{
       document.getElementById("menu-bar").style.height = (window.innerHeight - document.getElementById("search-bar").getBoundingClientRect().height)+"px"; 
       let formmodal = document.getElementById("add-members-form");
       let b = window.innerWidth;
       if( b > 768){
        formmodal.style.left = "29%";
       }
       else{
        formmodal.style.left = "5%";
       }
    });

    window.addEventListener("resize",()=>{
       document.getElementById("menu-bar").style.height = window.innerHeight+"px"; 
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

    function showmembersmodal(){
      // let showaddmember = document.getElementById("members-modal-hide");
      // showaddmember.style.display = "block";
      let formmodal = document.getElementById("add-members-form");
       let b = window.innerWidth;
       if( b > 768){
        showaddmember.style.left = "0%";
        formmodal.style.left = "29%";
       }
       else{
        showaddmember.style.left = "0%";
        formmodal.style.left = "5%";
       }
    }


    function showupdatemembermodal(id){
      // let show = document.getElementById("updatemember-modal-hide");
      let formmodal = document.getElementById("update-member-section");
       let b = window.innerWidth;
       console.log(id)
       $.ajax({
        type:"get",
        url:"members/getmember",
        data:{"id":id},
        success:(result)=>{
          console.log(id,result)
           document.getElementById("update-member-form").innerHTML = result;
        },
        error:(error)=>{
           document.getElementById("update-member-form").innerHTML = error;
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

    window.onclick = function(event) {

    if (event.target == showaddmember) {
    let formmodal = document.getElementById("add-members-form");
        let b = window.innerWidth;
    if( b > 768){
        showaddmember.style.left = "-100%";
        formmodal.style.left = "-42%";
       }
       else{
        showaddmember.style.left = "-100%";
        formmodal.style.left = "-90%";
       }       
    }

    else if (event.target == showupdatemember) {
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
    }

  function hidemembersform(){
    let formmodal = document.getElementById("add-members-form");
        let b = window.innerWidth;
    if( b > 768){
        showaddmember.style.left = "-100%";
        formmodal.style.left = "-42%";
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

  function trashmember(id,name,area){
    document.getElementById("deletebox").innerHTML = `<div class="d-flex justify-content-center "><span style="font-size:66px;color:red;"><i class="fa-regular fa-trash-can"></i></span></div>
    <p class="text-center fs-4">Move to trash <span style="color:green;" class="fs-4">${name}-${id}-${area}</span> </p> 
    <div class="d-flex justify-content-center">
    <div class="col-md-6 d-flex justify-content-evenly"> 
    <button style="border:none;outline:none;" class="px-2 py-1 btn btn-success rounded-3" onclick="movetotrash('${id}')" data-bs-dismiss="modal">Confirm</button>&nbsp;&nbsp;<button style="border:none;outline:none;background-color:red;" class="px-2 py-1 btn text-white rounded-3" data-bs-dismiss="modal">Cancel</button>
    </div>
    </div>
    `; 
  }

  function movetotrash(id){
    $.ajax({
        type:"get",
        url:"members/movetotrash",
        data:{"id":id},
        success:function(result){
        document.getElementById('ps-members').innerHTML = result;
        psShowToast('success', 'Moved successfully!');
        },
        error:function(error){
            psShowToast('error', 'An error occurred. Please try again.');
        }
      })
  }

  function viewMemberdata(id) {
    $.ajax({
        type:"post",
        url:"coordinators/view-member-data",
        data:{"id":id},
        success:function(result){
        let member_data = JSON.parse(result);
        document.getElementById("memberdata").innerHTML = `
            <div class="p-4 bg-white rounded-bottom">
                
                <div class="row align-items-center bg-light rounded shadow-sm py-4 border">
                    <div class="col-md-4 text-center mb-4 mb-md-0 border-end">
                        <div class="position-relative d-inline-block">
                            <img class="img-fluid rounded-circle mb-2 shadow-sm bg-white p-1" style="width:160px;height:160px;object-fit:cover;" src="assets/membersdocuments/${member_data.Memberimage}" alt="Member Image" onerror="this.onerror=null; this.src=''; this.alt='Member Image';">
                        </div>
                        <div class="d-flex flex-column gap-3 mt-4 px-xl-4 pb-2">
                            <button data-bs-toggle="modal" data-bs-target="#showmembersdocuments" class="btn btn-outline-primary fw-bold py-2 rounded bg-white shadow-sm" onclick="viewMemberdocuments('${member_data.Aadharfrontimage}','${member_data.Aadharbackimage}','${member_data.Communitycertificate}')">
                                <i class="fa-solid fa-file-lines me-2"></i> View Documents
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#eventparticipation" class="btn btn-outline-success fw-bold py-2 rounded bg-white shadow-sm" onclick="viewMembereventparticipation('${member_data.Familymembershipid}')">
                                <i class="fa-solid fa-calendar-check me-2"></i> Event Participation
                            </button>
                            ${member_data.Role != 'coordinator' ? `
                            <button data-bs-dismiss="modal" class="btn btn-outline-warning fw-bold text-dark py-2 rounded bg-white shadow-sm" onclick="showupdatecoordsmodal('${member_data.Familymembershipid}')">
                                <i class="fa-solid fa-user-pen me-2"></i> Update Details
                            </button>
                            ` : ''}
                        </div>
                     </div>  
                    <div class="col-md-8">
                        <div class="card border-0 bg-transparent h-100">
                            <div class="card-body p-0 p-lg-4">
                                <table class="table table-borderless align-middle mb-0" style="font-size: 1.05rem;">
                                    <tbody>
                                        <tr>
                                            <th width="35%" class="text-secondary py-3 fw-bold">Name:</th>
                                            <td class="fw-bold text-primary fs-5 py-3">${member_data.Name}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary py-3 fw-bold">Family Membership ID:</th>
                                            <td class="py-3"><span class="badge bg-primary px-3 py-2 fs-6 rounded-pill shadow-sm">${member_data.Familymembershipid}</span></td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary py-3 fw-bold" style="vertical-align:top;">Address:</th>
                                            <td class="py-3 fw-medium text-dark">
                                                <ul class="list-unstyled mb-0" style="line-height: 2;">
                                                    <li><i class="fa-solid fa-house fa-fw text-primary me-2"></i> ${member_data.Doornumber}, ${member_data.Street}</li>
                                                    <li><i class="fa-solid fa-location-dot fa-fw text-primary me-2"></i> ${member_data.Village}, ${member_data.Taluk}</li>
                                                    <li><i class="fa-solid fa-map-pin fa-fw text-primary me-2"></i> ${member_data.District} - ${member_data.Pincode}</li>
                                                    <li><i class="fa-solid fa-map fa-fw text-primary me-2"></i> ${member_data.State}</li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary py-3 fw-bold">Phone:</th>
                                            <td class="py-3 fw-medium text-dark">${member_data.Phonenumber ? member_data.Phonenumber : ''}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary py-3 fw-bold">Aadhar:</th>
                                            <td class="py-3 fw-medium text-dark">${member_data.Aadharnumber ? member_data.Aadharnumber : ''}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>`;
        let membermodal = new bootstrap.Modal(document.getElementById("showmembers"),{backdrop:"static",keyboard:false});
        membermodal.show();
        },
        error:function(error){
            psShowToast('error', 'An error occurred. Please try again.');
        }
      })
  }

    function viewMemberdocuments(aadharfrontimage,aadharbackimage,communitycertificate) {
         document.getElementById("showdocuments").innerHTML = `
         <div class="d-flex flex-wrap justify-content-center gap-4 py-3">
             <div class="text-center">
                 <p class="fw-bold text-secondary mb-2">Aadhar Front Image:</p>
                 <a href="assets/membersdocuments/${aadharfrontimage}" target="_blank">
                     <img class="img-thumbnail shadow-sm border" style="width:300px; height:200px; object-fit:cover;" src="assets/membersdocuments/${aadharfrontimage}" onerror="this.src=''; this.alt='Image Not Found';">
                 </a>
             </div>
             
             <div class="text-center">
                 <p class="fw-bold text-secondary mb-2">Aadhar Back Image:</p>
                 <a href="assets/membersdocuments/${aadharbackimage}" target="_blank">
                     <img class="img-thumbnail shadow-sm border" style="width:300px; height:200px; object-fit:cover;" src="assets/membersdocuments/${aadharbackimage}" onerror="this.src=''; this.alt='Image Not Found';">
                 </a>
             </div>
             
             <div class="text-center">
                 <p class="fw-bold text-secondary mb-2">Community Certificate:</p>
                 <a href="assets/membersdocuments/${communitycertificate}" target="_blank">
                     <img class="img-thumbnail shadow-sm border" style="width:300px; height:200px; object-fit:cover;" src="assets/membersdocuments/${communitycertificate}" onerror="this.src=''; this.alt='Image Not Found';">
                 </a>
             </div>
         </div>`;
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
           document.getElementById("showparticipation").innerHTML = eventparticipation.map((participation,index)=> {
            return `<tr><td>${index+1}</td><td>${participation.eventname}</td><td>${participation.Taxamount}</td><td>${participation.paidamount}</td><td>${participation.balanceamount}</td><td>${participation.paymentdate}</td></tr>`;
           } ).join("");
        },
        error:function(error){
          document.getElementById("showparticipation").innerHTML = "";
        }
      })
    }

   </script>

 <!-------------------------------chart-end------------------------------------>  



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

     
</body>
</html>
