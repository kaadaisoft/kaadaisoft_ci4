<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paymentforevent</title>
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
     .active-bg{
      background-color:rgb(230, 230, 230);
    }
     .heading-Kaadaisoft{
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
        /* width: 100%; */
        /* height: calc(100% - 40px); */
        /* background: rgba(54, 162, 235, 0.2); */
       /*  display: flex;
        align-items: center;
        justify-content: center; */
        display:grid;
        grid-template-columns: repeat(auto-fit,minmax(250px,700px)) ;
        grid-template-rows: repeat(auto-fit,minmax(200px,auto)) ;
        align-items: center;
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
         padding:13px 0;
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

      .form-grid{
        grid-template-rows:repeat(auto-fit,minmax(50px,auto));
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

      .active-payments{
        background-color:rgb(230, 230, 230);
        font-weight:600;
      }      

      .eventslist{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(250px,auto));
        gap:20px;
      }

    @media screen and (max-width:768px) {
      #search-bar{
            background-color:rgb(248, 245, 245);
            flex:none;
            background-color:white !important;
            padding: 5px 0;
           }
           #menu-bar{
            display:none;
           }
           #dashboardsearch{
            width:100% !important;
            margin: 0 !important;
            /* padding:5px; */
           }
           .dashboardpadd:nth-child(2){
            padding:0% !important;
           }
           .dashboardpadd:nth-child(1){
            padding:2% 0 !important;
           }
           #hidename{
            display:block;
           } 
           .ps-logo{
            justify-content:space-between;
          }
          #changepage {
            height: auto !important;
            max-height: none !important;
            overflow: visible !important;
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
        
    <div class="container-fluid">
      
      <div class="row"><!-----top-bar--------------->

        <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3">
               
        

        </div>

        <div id="search-bar" class="col-md-10 align-items-center justify-content-between border-bottom">

       
       
        </div>
        </div><!-----------top-bar-end----------------------->


        <div class="row"><!----------main-navbar----------->

         <div id="menu-bar" style="height:inherit;" class="col-md-2 ps-gray"><!----------side-bar-------------------->
              
         </div><!-----------side-bar-end-------------->
            
         <div id="changepage" style='height:inherit;overflow:auto;' class="col-md-10 ps-4 pt-3"><!-----------main-dashboard------------------------->
          
         <div>
             
          <table class='table table-borderless'>
            <thead>
            <tr>
                <th>Sno</th>
                <th>Name</th>
                <th>Aadhar</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="filteredmembers">
                <?php 
                if(isset($members)){
                    $i = 1;
                    foreach ($members as $key => $value) {
                    echo 
                    "<tr>
                    <td>$i</td><td>$value[Name]</td><td>$value[Aadhar]</td><td>$value[Mobile]</td><td>$value[Area]</td><td><a href='paymentpage?id=$value[id]' class='btn btn-primary' style='height:fit-content;'>Pay tax</a></td>
                    </tr>";
                    $i++;
                    }
                }
                ?>
            </tbody>
          </table>

         </div>

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


  <script>



    // Mobile Menu Functions
    function openMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'block';
    }

    function closeMobileMenu() {
      document.getElementById('custom-mobile-menu').style.display = 'none';
    }

    $.ajax({
      type: "get",
      url: "dashboard/sidemenu",
      success: (result) => {
        document.getElementById("menu-bar").innerHTML = result;
        // Populate custom mobile menu content
        document.getElementById("mobile-menu-content").innerHTML = result;
      },
      error: (error) => {
        document.getElementById("menu-bar").innerHTML = error;
      }
    }); 


    $.ajax({
      type:"get",
      url:"dashboard/topmenu",
      success:(result)=>{
           document.getElementById("search-bar").innerHTML = result;
           document.getElementById("searchmembers").style.display = "flex";
           document.getElementById("memberssubmenu").style.display = "flex";
      },
      error:(error)=>{
           document.getElementById("search-bar").innerHTML = error;
      }
    }); 

    $.ajax({
      type:"get",
      url:"dashboard/pslogo",
      success:(result)=>{
           document.getElementById("ps-logo").innerHTML = result;
      },
      error:(error)=>{
           document.getElementById("ps-logo").innerHTML = error;
      }
    });

    function searchmembers(members){
             
             let searchfields = members.value;
     
             $.ajax({
               type:"get",
               url:"payments/searchmembers",
               data:{"searchfields":searchfields},
               success:(result)=>{
                 document.getElementById('filteredmembers').innerHTML = result;
               },
               error:(error)=>{
                 document.getElementById('filteredmembers').innerHTML = error;
               }
    })};     

      let setheight = document.getElementById("changepage");
      let menubarheight = document.getElementById("menu-bar");

      function updateHeights() {
          let a = window.innerHeight;
          let topBarElement = document.getElementById("search-bar");
          let b = topBarElement ? topBarElement.getBoundingClientRect().height : 0;
          if (menubarheight) menubarheight.style.height = (a - b) + "px";
          if (setheight) setheight.style.height = (a - b) + "px";
      }

      window.addEventListener("resize", updateHeights);
      updateHeights();
    function changepage(page){
       let pagename = page.name;
       
       $.ajax({
           type:"get",
           url:pagename,
           success:(page)=>{
              document.getElementById("changepage").innerHTML = page;     
           },
           error:(error)=>{
            document.getElementById("changepage").innerHTML = error;
           }
       })
    }
    
    

    window.addEventListener("resize",()=>{
       document.getElementById("menu-bar").style.height = (window.innerHeight - document.getElementById("search-bar").getBoundingClientRect().height) + "px"; 
       let formmodal = document.getElementById("add-coords-form");
       let b = window.innerWidth;
       if( b > 768){
        formmodal.style.left = "29%";
       }
       else{
        formmodal.style.left = "5%";
       }
    })

    let show = document.getElementById("coords-modal-hide");

    function showcoordsmodal(){
      let show = document.getElementById("coords-modal-hide");
      show.style.display = "block";
      let formmodal = document.getElementById("add-coords-form");
       let b = window.innerWidth;
       if( b > 768){
        show.style.left = "0%";
        formmodal.style.left = "29%";
       }
       else{
        show.style.left = "0%";
        formmodal.style.left = "5%";
       }
    }

    window.onclick = function(event) {

    if (event.target == show) {
    let formmodal = document.getElementById("add-coords-form");
        let b = window.innerWidth;
    if( b > 768){
        show.style.left = "-100%";
        formmodal.style.left = "-42%";
       }
       else{
        show.style.left = "-100%";
        formmodal.style.left = "-90%";
       }
  }
  }

  function hidecoordsform(){
    let formmodal = document.getElementById("add-coords-form");
        let b = window.innerWidth;
    if( b > 768){
        show.style.left = "-100%";
        formmodal.style.left = "-42%";
       }
       else{
        show.style.left = "-100%";
        formmodal.style.left = "-90%";
       }
  }


  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>
