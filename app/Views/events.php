<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <!-- <link rel="stylesheet" href="./kaadaisoft.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>      
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

      #events-form div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 0;
      }

      #events-form div > button{
        border-radius:50px;
      }

      #add-events-form{
        width:42%;
        border-radius:16px;
        box-sizing:border-box;
        /* padding:20px 40px; */
        position: relative;
      }

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
      }

      #events-modal-hide{
        position: absolute;
        width: 100%;
        /* height:100%; */
        top:0;
        left:-100%;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .events-modal{
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

      #events-form div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 0;
      }

      #events-form div > button{
        border-radius:50px;
      }

      #add-events-form{
        width:42%;
        border-radius:16px;
        box-sizing:border-box;
        /* padding:20px 40px; */
        position: relative;
        z-index: 10;
      }

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
      }

      #events-modal-hide{
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .events-modal{
        padding:10px 0;
        background-color:rgba(128, 128, 128, 0.4);
        overflow:hidden;
      }
      #eventtoast{
        position:absolute;
        top:10%;
        right:-380px;
        transition:0.5s;
      }

      #update-event-form div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 10px;
      }

      #update-event-form div > button{
        border-radius:50px;
      }

      #update-event-section{
        width:42%;
        border-radius:25px;
        box-sizing:border-box;
        padding:3%;
        position: relative;
      }

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
      }

      #updateevent-modal-hide{
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        transition:0.4s;
        transition-timing-function:ease;
      }

      .updateevent-modal{
        padding:10px 0;
        background-color:rgba(128, 128, 128, 0.4);
        overflow:hidden;
      }

      .active-events{
        background-color:rgb(230, 230, 230);
        font-weight:600;
      }
      #updateeventbanner-modal-hide{
        position: absolute;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        transition:0.4s;
        transition-timing-function:ease;
      } 
      #update-event-banner div > input{
         border-radius:50px;
         border:1px solid rgb(208, 205, 205);
         outline:none;
         padding:13px 10px;
      }

      #update-event-banner div > button{
        border-radius:50px;
      }

      #update-eventbanner-section{
        width:42%;
        border-radius:25px;
        box-sizing:border-box;
        padding:3%;
        position: relative;
      }
   
      .updateevent{
        position: relative;
      }

      .trashevent{
        position: relative;
      }

      .updatetooltip{
      visibility:hidden;
      width:max-content;
      background-color: rgb(120, 50, 186);
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
     .updateevent:hover .updatetooltip{
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
     .trashevent:hover .trashtooltip{
        visibility:visible;
     }


      /* .page{
        position: relative;
        top:80px;
      }
        

      
        /* Smaller modal on mobile screens */
        @media (max-width: 576px) {
            .modal-dialog {
                max-width: 90%; /* Limits modal width on mobile */
                margin: 10px auto; /* Adds padding from the screen edges */
            }
            .modal-content {
                padding: 15px; /* Adds padding inside the modal */
            }
            .form-control {
                padding: 12px;
                font-size: 14px;
            }
            .btn-primary {
                font-size: 14px;
                padding: 10px;
                width: 100%;
            }
        }

      @media screen and (max-width:768px) {
           #menu-bar{
            display:none;
           }
           #commonsearch{
            width:100% !important;
            margin: 0 !important;
           }
           .eventpadd{
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
          #eventssubmenu{
            display:flex !important;
           }
      }

      @media screen and (max-width:768px) {

          #add-events-form div > input{
            padding: 5px;
          }
          #add-events-form{
            width:90%;
            padding:8%;
          }
          #update-event-section div > input{
            padding: 5px;
          }
          #update-event-section{
            width:90%;
            padding:8%;
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
    </style>
</head>
<body>
        
<div class="container-fluid" style="position:absolute;overflow:hidden;">

<?= view('notification_toast') ?>
      

      <div class="row"><!-----top-bar--------------->

        <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3">
               
        </div>

        <div id="search-bar" class="col-md-10 align-items-center justify-content-between border-bottom">

       
        </div>
        </div><!-----------top-bar-end----------------------->


        <div class="row"><!----------main-navbar----------->

        <div id="menu-bar" class="col-md-2 ps-gray"><!----------side-bar-------------------->  
       
              
         </div><!-----------side-bar-end-------------->
            
         <div style="overflow:auto;" class="col-md-10 h-100"><!-----------main-dashboard------------------------->
         
         <div class="container-fluid px-4 pt-4 d-flex justify-content-between eventpadd">
         <span class="h5">Events</span>    
         <div>
         <button <?=session()->get('role') == 2 ? 'hidden' : (session()->get('role') == 3 ? 'hidden' : '')?> onclick = "showeventsmodal()" class='ps-add-btn float-end text-white py-1 px-4'>+&nbsp;Add</button>
         </div>
         </div>
         
        <div style="overflow:auto" class="container-fluid pt-3 px-4 eventpadd"><!----------------table-------->
        <table class="table table-responsive table-bordered">
            <thead>
              <caption class="fw-bold" style="caption-side: top">Total Events: <?php echo count($events)?></caption>
            <tr style="font-size:18px;" class="ps-gray">
            <th>S.No</th><th>EventName</th><th>Banner</th><th>From</th><th>To</th><th>TaxAmount</th><th class='text-center' <?=session()->get('role') == 2 ? 'hidden' : (session()->get('role') == 3 ? 'hidden' : '')?>>Actions</th>
            </tr>
            </thead>
            <tbody id="ps-events">
              
            </tbody>
            </table>

        </div> <!----------------table-end------->

        <div class='d-flex justify-content-center container-fluid page'> <!-----------------pagination---------------------->
        
        <div id="eventsPagination" class="col-md-6 py-2 d-flex justify-content-around align-items-center">

        </div>
        </div><!--------------pagination-end--------------------->

        </div><!-----------main-dashboard-end------------------------>


        </div><!--------------main-navbar-end------------------->

      </div>
<!-----------------------Add-Events-modal-------------------------------------------->
<div id="events-modal-hide" class="events-modal">
    <div id="add-events-form" class="bg-white py-4 px-5">
        <div class="pb-4">  
            <span class="fs-5" style="color: #2c3e50;">Add Events</span>
            <button onclick="hideEventsform()" class="float-end btn btn-close"></button>
        </div>

        <form id="events-form" name="eventform" method="POST" action="<?=base_url("events/addevent");?>" onsubmit="return eventValidate()" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="eventname" class="form-label">Event Name</label>
                <input type="text" onkeyup="validateEvent(this)" class="form-control input-style p-3" id="eventname" placeholder="Enter the Event" name="eventname" required>
                <small id="eventnameerror" style="color:red;"></small>
            </div>

            <div class="mb-3">
                <label for="eventimage" class="form-label">Image</label>
                <input type="file" onchange="uploadFile(this)" accept="image/jpg,image/jpeg,image/png" class="form-control input-style file-input p-3" id="eventimage" name="eventimage" required>
                <small id="eventimageerror" style="color:red;" class="mt-1 eventimage"></small>
                <div class="mt-1">
                    <span style="color:#295CF5; font-size: 0.85rem;">Note: File Size should be below 2MB.</span>
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Due Date</label>
                <div class="row">
                    <div class="col">
                        <label for="date_from">From</label>
                        <input type="date" class="form-control input-style p-3" id="date_from" name="event_date_from" required>
                    </div>

                    <div class="col">
                        <label for="date_to">To</label>
                        <input type="date" class="form-control input-style p-3" id="date_to" name="event_date_to" required>
                    </div>
                </div>

            </div>

            <div class="mb-3">
                <label for="eventtaxamount" class="form-label">Tax Amount</label>
                <input type="number" name="eventtaxamount" class="form-control input-style p-3" id="taxamount" placeholder="Enter Tax amount" required>
                <small id="eventamounterror" style="color:red;" class="mt-1 taxamount"></small>
            </div>

            <button type="submit" id="eventaddbtn" name="addeventsubmit" class="btn btn-primary rounded-pill px-2">Save</button>
        </form>
     </div>
     </div>   
<!-----------------------------Add-Eventsmodal-end-------------------------------->


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

<!-----------------------update-Events-modal-------------------------------------------->
<div id="updateevent-modal-hide" class="events-modal">
    <div id="update-event-section" class="bg-white py-4 px-5">
        <div class="pb-4">  
            <span id="updatebanner" class="fs-5" style="color: #2c3e50;">Update Event</span>
            <button onclick="hideupdateEventform()" class="float-end btn btn-close"></button>
        </div>
        
        <form id="update-event-form" method="post" onsubmit="eventUpdatevalidate()" action="<?=base_url("events/updateevent")?>"  name="updateeventform" >
            
        </form>
     </div>
     </div>   
<!-----------------------------update-Eventsmodal-end-------------------------------->

<!-----------------------update-banner-modal-------------------------------------------->
<div id="updateeventbanner-modal-hide" class="events-modal">
    <div id="update-eventbanner-section" class="bg-white py-4 px-5">
        <div class="pb-4">  
            <span class="fs-5" style="color: #2c3e50;">Update Event</span>
            <button onclick="hideupdateEventbannerform()" class="float-end btn btn-close"></button>
        </div>
        
        <form id="update-event-banner" method="post" enctype="multipart/form-data" action="<?=base_url("events/updateeventbanner")?>">
            
        </form>
     </div>
     </div>   
<!-----------------------------update-banner-end-------------------------------->
    
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

<!-----------------set-index-end----------------->
<?php
if(isset($_SESSION["altereventsindex"]) && isset($counts)){
  $index = $_SESSION["altereventsindex"];
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

unset($_SESSION["altereventsindex"]);
?>
<!-----------------set-index-end----------------->
   <script>
    let eventsData = [];
    const baseUrl = "<?= base_url() ?>/";
    <?php if (isset($events) && !empty($events)): ?>
    eventsData = <?php echo json_encode($events); ?> || [];
    <?php endif; ?>

function formatDate(dateString) {
    if (!dateString) return '';
    const parts = dateString.split('-');
    if (parts.length === 3) {
        return `${parts[2]}-${parts[1]}-${parts[0]}`;
    }
    return dateString;
}

function renderEvents(data, sNo) {
    let html = "";
    let i = sNo + 1;

    data.forEach(value => {
        // Ensure image path is clean
        let imagePath = value.Image;
        if (imagePath && !imagePath.startsWith('http')) {
            imagePath = baseUrl + imagePath;
        }

        html += `
            <tr>
           <td style='font-weight:500;'>${i}</td>
                    <td style='font-weight:500;font-size:18px;' class='text-primary'>${value.EventName}</td>
                    <td>
                    <div class='rounded-top' style='width:100px;height:100px;'>
                    <a href='${imagePath}'>
                    <img class='rounded-top' style='width:100px;height:75px;' src='${imagePath}' alt='${value.EventName}'/>
                    </a>
                    <button <?=(session()->get('role') == 2) ? 'hidden' : (session()->get('role') == 3 ? 'hidden' : '')?> onclick='showupdateeventbannermodal(${value.Id},\"${value.EventName}\")' style='width:100px;height:25px;outline:none;border:none;' class = 'rounded-bottom text-center bg-dark text-white'>
                    change
                    </button>
                    </div>
                    </td>
                    <td style='font-weight:500;'>${formatDate(value.From_date)}</td>
                    <td style='font-weight:500;'>${formatDate(value.To_date)}</td>
                    <td style='font-weight:500;'>${value.TaxAmount}</td>
                    <td class='px-3' <?=session()->get('role') == 2 ? 'hidden' : (session()->get('role') == 3 ? 'hidden' : '')?>>
                    <div class='d-flex justify-content-evenly'>
                    <button onclick='showupdateeventmodal(${value.Id})' style='width:30px;height:30px;outline:none;border:none;' class='updateevent text-dark table-btn rounded-circle shadow-sm'><i class='fa-regular fa-pen-to-square'></i><span class='updatetooltip'>Update Details</span></button>
                    <button data-bs-toggle='modal' data-bs-target='#deletemodal' onclick='deleteevent(${value.Id},\"${value.EventName}\")' style='width:30px;height:30px;outline:none;border:none;color:red;' class='trashevent table-btn rounded-circle shadow-sm'><i class='fa-solid fa-trash-can'></i><span class='trashtooltip'>Trash</span></button></div></td>
            </tr>
        `;
        i++;
    });

    document.getElementById("ps-events").innerHTML = html;
}

renderEvents(eventsData.slice(0 ,3), 0);

<?php 
          if(isset($events) ): ?> 
            <?php if(count($events) > 0): ?>
            let eventsCount = <?php echo json_encode(count($events)); ?>;
            let countsperpage = 3;
            let noofpages = Math.ceil(eventsCount / countsperpage);
            let totalpagesarr = Array.from({length: noofpages}, (_, i) => i);
            let totalpages = totalpagesarr.length;
            let initialindex = 0;
            let lastindex = 5; 
            let pages = totalpagesarr.slice(initialindex, lastindex);
            let paginationHtml = `<button disabled onclick='changeEventsPagesetup(0)' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id = 'arrow' class='fa-solid fa-arrow-left-long'></i></button>`;
            
            for(let i = 0;pages.length > i; i++) {
              let count = countsperpage * pages[i];
              let pageno = pages[i] + 1;
              if(pageno == 5){
                paginationHtml += `<button style='width:35px;height:35px;border: none;' onclick='changeEventsPagesetup(${pages[i]})' class='${i==0 ? 'active-page' : ''} active text-decoration-none bg-white d-flex align-items-center justify-content-center ps-gray rounded-circle'>${pageno}</button>`;}
              else{
                paginationHtml += `<button style='width:35px;height:35px;' onclick='displayEvents(${count},${i})' class='${i==0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>`;
              }
            }

            paginationHtml += "<span>...</span>";
            let totalcount = (totalpages - lastindex);
            let newindex = initialindex+lastindex;
            let validNext = totalpages - initialindex; 
            paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeEventsPagesetup(${totalcount})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${totalpages}</button>`;
            
            paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeEventsPagesetup(${newindex})' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></button>`;
            <?php else: ?>
              let paginationHtml = "";
              paginationHtml += "<span>No pages available</span>";
            <?php endif; ?>
          
        <?php endif; ?>
    function setUpPagination(html) {
      document.getElementById("eventsPagination").innerHTML = html;
    }  

    setUpPagination(paginationHtml);

    function setPaginationEmpty(){
       if(eventsData.length == 0){
        let paginationHtml = "";
        paginationHtml += "<span>No pages available</span>";
        setUpPagination(paginationHtml);
       }
    }

    function changeEventsPagesetup(nextStagedNo) {
            let countsperpage = 3;
            let prevlist = "";
            let noofpages = Math.ceil(eventsCount / countsperpage);
            let totalpagesarr = Array.from({length: noofpages}, (_, i) => i);
            let totalpages = totalpagesarr.length;
            let start = nextStagedNo > noofpages ? 0 : nextStagedNo;
            let lastindex = nextStagedNo + 5;
            let pages = totalpagesarr.slice(nextStagedNo, lastindex);
            prevlist = start < 5 ? 0 : nextStagedNo - 5;
            let validPrev = totalpages - nextStagedNo;
            let paginationHtml =  `<button ${validPrev <= 0 ? 'disabled' : ''} onclick='changeEventsPagesetup(${prevlist})' style='cursor:pointer;border: none;' class='bg-white text-dark text-decoration-none'><i id= 'arrow' class='fa-solid fa-arrow-left-long'> </i></button>`;

            for(let j = 0;pages.length > j; j++) {
              let count = countsperpage * pages[j];
              let pageno = pages[j] + 1;
  
              if(pageno == 5 || pageno - start == 5){
                paginationHtml += pageno == totalpages ? `<button style='width:35px;height:35px;border: none;' onclick='displayEvents(${count},${j})' class='${j==0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>` : `<button onclick='changeEventsPagesetup(${pageno - 1})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='${j==0 ? 'active-page' : ''} active text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${pageno}</button>`; }
              else{
                paginationHtml += `<button style='width:35px;height:35px;' onclick='displayEvents(${count},${j})' class='${j==0 ? 'active-page' : ''} active rounded-circle'>${pageno}</button>`;
              }
            }

            paginationHtml += "<span>...</span>";
            let totalcount = totalpages - lastindex;
            let newindex = start + lastindex; 
            let validNext = totalpages - start;
            paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeEventsPagesetup(${totalcount})' style='cursor:pointer;width:35px;height:35px;box-sizing:border-box;border: none;' class='active-page text-white text-decoration-none d-flex align-items-center justify-content-center ps-gray rounded-circle'>${totalpages}</button>`;
            paginationHtml += `<button ${validNext < 5 ? 'disabled' : ''} onclick='changeEventsPagesetup(${totalpages - start <= lastindex ? totalcount : newindex})'  style='cursor:pointer;border: none;' class='text-decoration-none text-dark bg-white'><i id= 'arrow' class='fa-solid fa-arrow-right-long'></i></button>`; 
            setUpPagination(paginationHtml);
            let itemsPerPage = 3;
            let itemStart = nextStagedNo * itemsPerPage;
            let itemEnd = itemStart + itemsPerPage;
            renderEvents(eventsData.slice(itemStart, itemEnd), itemStart);
          }


       document.getElementById("menu-bar").style.height = (window.innerHeight - document.getElementById("search-bar").getBoundingClientRect().height) + "px"; 
// Mobile Menu Functions
function openMobileMenu() {
  document.getElementById('custom-mobile-menu').style.display = 'block';
}

function closeMobileMenu() {
  document.getElementById('custom-mobile-menu').style.display = 'none';
}

$.ajax({
      type:"get",
      url:"events/sidemenu",
      success:(result)=>{
           document.getElementById("menu-bar").innerHTML = result;
           // Populate custom mobile menu content
           document.getElementById("mobile-menu-content").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("menu-bar").innerHTML = "Error fetching menu";
      }
    });

    $.ajax({
      type:"get",
      url:"events/topmenu",
      success:(result)=>{
           document.getElementById("search-bar").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("search-bar").innerHTML = "Error fetching menu";
      }
    });

    $.ajax({
      type:"get",
      url:"events/pslogo",
      success:(result)=>{
           document.getElementById("ps-logo").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("ps-logo").innerHTML = "Error fetching menu";
      }
    });

    document.getElementById("date_from").addEventListener("change", (event)=>{
        let fromDate = event.target.value;
        let toDate = document.getElementById("date_to");
        toDate.min = fromDate;
        if(toDate.value < fromDate) {
          toDate.value = "";
        }
    });

     function validateDate() {
        let fromDate = document.getElementById("update_date_from");
        let toDate = document.getElementById("update_date_to");
        toDate.min = fromDate.value;
        if(toDate.value < fromDate.value) {
          toDate.value = "";
        }
    }

function commonSearch(events){
         
         let searchfields = events.value;
 
         $.ajax({
           type:"get",
           url:"events/searchEvents",
           data:{"searchfields":searchfields},
           success:(result)=>{
             document.getElementById('ps-events').innerHTML = result;
           },
           error:(error)=>{
             document.getElementById('ps-events').innerHTML = "Error fetching data";
           }
        })}; 

    function displayEvents(counts,index){
        const itemsPerPage = 3;
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
      renderEvents(eventsData.slice(start, end), start);
    }

    document.getElementById("menu-bar").style.height = (window.innerHeight - document.getElementById("search-bar").getBoundingClientRect().height) + "px";

    window.addEventListener("resize", () => {
       let topbarHeight = document.getElementById("search-bar").getBoundingClientRect().height;
       document.getElementById("menu-bar").style.height = (window.innerHeight - topbarHeight) + "px";
       
       let addEventsForm = document.getElementById("add-events-form");
       let updateEventSection = document.getElementById("update-event-section");
       let b = window.innerWidth;
       
       if (b > 768) {
          if (addEventsForm) addEventsForm.style.left = "29%";
          if (updateEventSection) updateEventSection.style.left = "29%";
       }
       else {
          if (addEventsForm) addEventsForm.style.left = "5%";
          if (updateEventSection) updateEventSection.style.left = "5%";
       }
    });

    let showaddevent = document.getElementById("events-modal-hide");
    let showupdateevent = document.getElementById("updateevent-modal-hide");
    let showupdateeventbanner = document.getElementById("updateeventbanner-modal-hide");
    showaddevent.style.height = 300+innerHeight+"px";
    showupdateevent.style.height = 100+window.innerHeight+"px";

    function showeventsmodal(){
      let showaddevent = document.getElementById("events-modal-hide");
      showaddevent.style.display = "block";
      let formmodal = document.getElementById("add-events-form");
       let b = window.innerWidth;
       if( b > 768){
        showaddevent.style.left = "0%";
        formmodal.style.left = "29%";
       }
       else{
        showaddevent.style.left = "0%";
        formmodal.style.left = "5%";
       }
    }

    function showupdateeventmodal(id) {
       let formmodal = document.getElementById("update-event-section");
       let b = window.innerWidth;

       $.ajax({
        type:"get",
        url: baseUrl + "events/getevent",
        data:{"id":id},
        success:(result)=>{
           document.getElementById("update-event-form").innerHTML = result;
        },
        error:(error)=>{
           document.getElementById("update-event-form").innerHTML = "Error fetching data";
        }
      });

       if( b > 768){

        showupdateevent.style.left = "0%";
        formmodal.style.left = "29%";

       }
       else{
        showupdateevent.style.left = "0%";
        formmodal.style.left = "5%";
       }
    }

    function showupdateeventbannermodal(id,eventname){
      let formmodal = document.getElementById("update-eventbanner-section");
      let b = window.innerWidth;
      $.ajax({
        type:"get",
        url: baseUrl + "events/showupdateeventbanner",
        data:{"id":id,"eventname":eventname},
        success:(result)=>{
           document.getElementById("update-event-banner").innerHTML = result;
        },
        error:(error)=>{
           document.getElementById("update-event-banner").innerHTML = error;
        }
      });
      if( b > 768){

      showupdateeventbanner.style.left = "0%";
      formmodal.style.left = "29%";

      }
      else{
      showupdateeventbanner.style.left = "0%";
      formmodal.style.left = "5%";
}

    }

    window.onclick = function(event) {

    if (event.target == showaddevent) {
    let formmodal = document.getElementById("add-events-form");
        let b = window.innerWidth;
    if( b > 768){
        showaddevent.style.left = "-100%";
        formmodal.style.left = "-42%";
       }
       else{
        showaddevent.style.left = "-100%";
        formmodal.style.left = "-90%";
       }
       
    }
    else if (event.target == showupdateevent) {
    let formmodal = document.getElementById("update-events-section");
    let b = window.innerWidth;
    if( b > 768){
    showupdateevent.style.left = "-100%";
    formmodal.style.left = "-42%";
    }
    else{
    showupdateevent.style.left = "-100%";
    formmodal.style.left = "-90%";
   }
   }
   else if (event.target == showupdateeventbanner) {
    let formmodal = document.getElementById("update-eventbanner-section");
    let b = window.innerWidth;
    if( b > 768){
    showupdateeventbanner.style.left = "-100%";
    formmodal.style.left = "-42%";
    }
    else{
    showupdateeventbanner.style.left = "-100%";
    formmodal.style.left = "-90%";
   }
   }
  }

  function hideEventsform(){
    let formmodal = document.getElementById("add-events-form");
        let b = window.innerWidth;
    if( b > 768){
        showaddevent.style.left = "-100%";
        formmodal.style.left = "-42%";
       }
       else{
        showaddevent.style.left = "-100%";
        formmodal.style.left = "-90%";
       }
       
    }

    function hideupdateEventform(){
    let formmodal = document.getElementById("update-event-section");
        let b = window.innerWidth;
    if( b > 768){
        showupdateevent.style.left = "-100%";
        formmodal.style.left = "-42%";
       }
       else{
        showupdateevent.style.left = "-100%";
        formmodal.style.left = "-90%";
       }
    }

    function hideupdateEventbannerform(){
    let formmodal = document.getElementById("update-eventbanner-section");
        let b = window.innerWidth;
    if( b > 768){
        showupdateeventbanner.style.left = "-100%";
        formmodal.style.left = "-42%";
       }
       else{
        showupdateeventbanner.style.left = "-100%";
        formmodal.style.left = "-90%";
       }
    }

    function deleteevent(id,name){
      let baseUrl = "<?= base_url('events/trash/') ?>"; 
    document.getElementById("deletebox").innerHTML = `<div class="d-flex justify-content-center "><span style="font-size:66px;color:red;"><i class="fa-regular fa-trash-can"></i></span></div>
    <p class="text-center fs-4">Move to trash <span style="color:green;" class="fs-4">${name}</span> </p> 
    <div class="d-flex justify-content-center">
    <div class="col-md-6 d-flex justify-content-evenly"> 
    <a style="border:none;outline:none;" class="px-2 py-1 btn btn-success rounded-3" href="${baseUrl}${id}">Confirm</a>&nbsp;&nbsp;<button style="border:none;outline:none;background-color:red;" class="px-2 py-1 btn text-white rounded-3" data-bs-dismiss="modal">Cancel</button>
    </div>
    </div>
    `; 
  }

    function movetotrash(id){
    $.ajax({
        type:"get",
        url: baseUrl + "events/movetotrash",
        data:{"id":id},
        success:function(result){
          alert("Moved to trash successfully");
          window.location.reload();
        },
        error:function(error){
          console.log(error);
          psShowToast('error', 'An error occurred. Please try again.');
        }
      })
  }

  function uploadFile(file) {
    let errorbox = document.querySelector(`.${file.name}`);
    let imagesize = 2000000;
    let uploadedimagesize = file.files[0] ? file.files[0].size : 0;

    if (uploadedimagesize > imagesize) {
        if (errorbox) errorbox.textContent = "File Size should be below 2MB";
        file.value = "";
        return false;
    } else {
        if (errorbox) errorbox.textContent = "";
    }
  }

  function validateEvent(event){
      let eventname = event.value;
      let validatereg = /^[A-Za-z_.]+[0-9]{4}$/;
      let validate = eventname.match(validatereg);
      if(!validate){
         document.getElementById("eventnameerror").innerHTML = "Only use ( _ ) insteadof space. Must include year";
      }
      else{
        document.getElementById("eventnameerror").innerHTML = "";
      }
    }

    function validateUpdateevent(event){
      let eventname = event.value;
      let validatereg = /^[A-Za-z_.]+[0-9]{4}$/;
      let validate = eventname.match(validatereg);
      if(!validate){
         document.getElementById("eventupdatenameerror").innerHTML = "Only use ( _ ) insteadof space. Must include year";
      }
      else{
        document.getElementById("eventupdatenameerror").innerHTML = "";
      }
    }

  function eventValidate() {
    let eventform =  document.forms["eventform"];
    let eventname = eventform["eventname"].value.trim();
    let eventimage = eventform["eventimage"].value.trim();
    let eventdatefrom = eventform["event_date_from"].value.trim();
    let eventdateto = eventform["event_date_to"].value.trim();
    let taxamount = eventform["eventtaxamount"].value.trim();
    let validatereg =  /^[A-Za-z_.]+[0-9]{4}$/;
    
    if(eventname == ""){
       document.getElementById("eventnameerror").innerHTML = "Please fill this field";
       return false;
    }
    else if(!eventname.match(validatereg)){
        document.getElementById("eventnameerror").innerHTML = "Only use ( _ ) insteadof space. Must include year";
        return false;
    }

    if(eventimage == ""){
       document.getElementById("eventimageerror").innerHTML = "Please upload event image";
       return false;
    }

    if(evenamount == ""){
       document.getElementById("eventamounterror").innerHTML = "Please enter amount";
       return false;
    }
    else{
      if(eventamount < 0) {
       document.getElementById("eventamounterror").innerHTML = "Please enter valid amount";
       return false;
      }
    }
   return true;
  }

  function eventUpdatevalidate() {
    let eventform =  document.forms["updateeventform"];
    let eventname = eventform["eventupdatename"].value.trim();
    let eventdatefrom = eventform["event_update_date_from"].value.trim();
    let eventdateto = eventform["event_update_date_to"].value.trim();
    let taxamount = eventform["eventupdatetaxamount"].value.trim();
    let validatereg =  /^[A-Za-z_.]+[0-9]{4}$/;
    
    if(eventname == ""){
       document.getElementById("eventupdatenameerror").innerHTML = "Please fill this field";
       return false;
    }
    else{
      if(!eventname.match(validatereg)){
        document.getElementById("eventupdatenameerror").innerHTML = "Only use ( _ ) insteadof space. Must include year";
        return false;
      }
    }

    if(evenamount == "") {
       document.getElementById("eventupdateamounterror").innerHTML = "Please enter amount";
       return false;
    }
    else{
      if(eventamount < 0) {
       document.getElementById("eventupdateamounterror").innerHTML = "Please enter valid amount";
       return false;
      }
    }
   return true;
  }

  // Load layout components
  $.ajax({
      type: "get",
      url: "<?= base_url('events/sidemenu'); ?>",
      success: (result) => {
          document.getElementById("menu-bar").innerHTML = result;
          // Populate custom mobile menu content
          if(document.getElementById("mobile-menu-content")) {
              document.getElementById("mobile-menu-content").innerHTML = result;
          }
      }
  });

  $.ajax({
      type: "get",
      url: "<?= base_url('events/topmenu'); ?>",
      success: (result) => {
          document.getElementById("search-bar").innerHTML = result;
      }
  });

  $.ajax({
      type: "get",
      url: "<?= base_url('events/pslogo'); ?>",
      success: (result) => {
          document.getElementById("ps-logo").innerHTML = result;
      }
  });

  // Mobile Menu Functions
  function openMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'block';
  }

  function closeMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'none';
  }
   </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    
</body>
</html>
