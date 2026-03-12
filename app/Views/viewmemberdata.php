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
        position: fixed;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        z-index: 2000;
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
        position: fixed;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        z-index: 2000;
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
        position: fixed;
        width: 100%;
        height:100%;
        top:0;
        left:-100%;
        z-index: 2000;
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

      .active-members{
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
        background-color: #f1f5f9 !important;
        color: #94a3b8 !important;
        opacity: 0.65;
        pointer-events: none;
        transition: none !important;
      }
      .dead-member-row:hover {
        transform: none !important;
        box-shadow: none !important;
        background-color: #f1f5f9 !important;
      }
      .dead-badge {
        display: none;
      }
      /* Family Tree CSS - Premium Design with Arrows */
      .family-tree-container {
        padding: 60px 20px;
        background-color: #f8fafc;
        background-image: 
            radial-gradient(#e2e8f0 1.5px, transparent 1.5px);
        background-size: 30px 30px; /* Clean dot grid background */
        overflow-x: auto;
        min-height: 600px;
        border-radius: 0 0 20px 20px;
        position: relative;
        box-shadow: inset 0 0 60px rgba(0,0,0,0.02);
        display: block;
        width: 100%;
        text-align: center; /* Center the fit-content tree */
      }
      .tree {
        display: inline-block;
        min-width: 100%;
        padding-bottom: 50px;
      }
      .tree ul {
        padding-top: 40px;
        position: relative;
        transition: all 0.5s;
        display: flex;
        justify-content: center;
        padding-left: 0;
        width: fit-content;
        margin: 0 auto; /* Center when smaller than container */
      }
      .tree li {
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 40px 15px 0 15px;
        transition: all 0.5s;
      }
      
      /* Horizontal Lines */
      .tree li::before, .tree li::after {
        content: '';
        position: absolute;
        top: 0;
        right: 50%;
        border-top: 3px solid #475569; /* Darker and thicker */
        width: 50%;
        height: 40px;
        z-index: 1;
      }
      .tree li::after {
        right: auto;
        left: 50%;
        border-left: 3px solid #475569; /* Darker and thicker */
      }
      
      /* Vertical Connector with Arrow */
      .tree ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 3px solid #475569; /* Darker and thicker */
        width: 0;
        height: 40px;
      }

      /* Distinct Downward Arrow Marker */
      .tree ul ul::after {
          content: '';
          position: absolute;
          top: 20px;
          left: 50%;
          transform: translateX(-50%);
          border-left: 7px solid transparent;
          border-right: 7px solid transparent;
          border-top: 10px solid #3b82f6;
          display: block;
          z-index: 2;
          filter: drop-shadow(0 2px 2px rgba(59, 130, 246, 0.4));
      }

      .tree li:only-child::after, .tree li:only-child::before {
        display: none;
      }
      .tree li:only-child {
        padding-top: 0;
      }
      .tree li:first-child::before, .tree li:last-child::after {
        border: 0 none;
      }
      .tree li:last-child::before {
        border-right: 3px solid #475569;
        border-top-right-radius: 12px;
      }
      .tree li:first-child::after {
        border-top-left-radius: 12px;
      }

      .member-card {
        border: none;
        padding: 12px;
        text-decoration: none;
        color: #1e293b;
        font-family: 'Outfit', sans-serif;
        display: inline-block;
        border-radius: 18px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        background: #ffffff;
        min-width: 140px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        position: relative;
        z-index: 10;
        border: 1px solid rgba(226, 232, 240, 1);
        overflow: hidden;
      }

      /* Colored Top Accent Bar */
      .member-card::after {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          height: 4px;
          background: #cbd5e1;
      }

      /* Card Entry Arrow */
      .tree li > .member-card::before {
          content: '';
          position: absolute;
          top: -10px;
          left: 50%;
          transform: translateX(-50%);
          border-left: 6px solid transparent;
          border-right: 6px solid transparent;
          border-top: 8px solid #475569; /* Darker arrow */
          display: block;
      }

      .tree li:only-child > .member-card::before {
          display: none;
      }

      .member-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
        border-color: #3b82f6;
      }
      
      .member-card:hover + ul li::after, 
      .member-card:hover + ul li::before, 
      .member-card:hover + ul::before, 
      .member-card:hover + ul ul::before {
        border-color: #3b82f6 !important;
      }

      .member-card:hover + ul ul::after {
          color: #3b82f6;
      }
      
      .member-name {
        display: block;
        font-weight: 700;
        color: #0f172a;
        font-size: 14px;
        margin: 5px 0;
        letter-spacing: -0.3px;
      }
      .member-role {
        display: inline-block;
        font-size: 10px;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      
      /* Vibrant Role Colors & Card Accents */
      .member-card:has(.role-head)::after { background: #3b82f6; }
      .member-card:has(.role-spouse)::after { background: #f43f5e; }
      .member-card:has(.role-child)::after { background: #22c55e; }
      .member-card:has(.role-parent)::after { background: #64748b; }
      .member-card:has(.role-sibling)::after { background: #f97316; }
      .member-card:has(.role-inlaw)::after { background: #a855f7; }
      .member-card:has(.role-grand)::after { background: #ea580c; }

      .role-head { 
        background: #eff6ff; color: #1d4ed8; 
        border: 1px solid #3b82f6 !important;
      }
      .role-spouse { 
        background: #fff1f2; color: #be123c; 
        border: 1px solid #f43f5e !important;
      }
      .role-child { 
        background: #f0fdf4; color: #15803d; 
        border: 1px solid #22c55e !important;
      }
      .role-parent { 
        background: #f8fafc; color: #475569; 
        border: 1px solid #94a3b8 !important;
      }
      .role-sibling { 
        background: #fff7ed; color: #c2410c; 
        border: 1px solid #f97316 !important;
      }
      .role-inlaw { 
        background: #faf5ff; color: #7e22ce; 
        border: 1px solid #a855f7 !important;
      }
      .role-grand { 
        background: #fdfaf9; color: #7c2d12; 
        border: 1px solid #ea580c !important;
      }

      .member-img {
        width: 50px !important;
        height: 50px !important;
        border-radius: 50%;
        margin-bottom: 5px;
        border: 3px solid #fff;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        object-fit: cover;
        background: #f1f5f9;
        transition: transform 0.3s;
      }
      .member-card:hover .member-img {
          transform: scale(1.1);
      }
      .spouse-container {
        display: flex;
        gap: 40px;
        justify-content: center;
        position: relative;
        padding: 0 20px;
      }
      
      /* Marriage Line Connector */
      .spouse-container::before {
          content: '';
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          width: 40px;
          height: 3px;
          background: #475569; /* Darker marriage line */
          z-index: 1;
      }
      .dead-member { 
        filter: grayscale(1); 
        opacity: 0.6; 
        background: #f8fafc !important; 
        pointer-events: none;
        border: 1px dashed #cbd5e1 !important;
        box-shadow: none !important;
      }
      .member-card.dead-member::after {
        background: #94a3b8 !important;
      }
      .tree-dead-badge { 
        position: absolute; 
        top: -5px; 
        right: -5px; 
        background: #94a3b8; 
        color: white; 
        font-size: 8px; 
        font-weight: 800; 
        padding: 2px 8px; 
        border-radius: 12px; 
        z-index: 20; 
        text-transform: uppercase;
      }
      .dead-badge { display: none; }
      
      /* Fixed Layout Adjustments */
      .layout-container {
        display: flex;
        flex-direction: column;
        height: 100vh;
        overflow: hidden;
      }
      .top-navbar-row {
        height: auto;
        min-height: 70px;
        flex-shrink: 0;
        z-index: 1050;
        background: #0f172a;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        margin: 0;
        width: 100%;
      }
      .main-body-row {
        flex-grow: 1;
        display: flex;
        overflow: hidden;
        margin: 0;
        width: 100%;
      }
      #menu-bar {
        height: 100%;
        overflow-y: auto;
        flex-shrink: 0;
        background-color: rgb(248, 245, 245);
        border-right: 1px solid #e2e8f0;
        padding: 0;
      }
      .main-content-area {
        flex-grow: 1;
        overflow-y: auto;
        height: 100%;
        background-color: #f8fafc;
        padding-bottom: 50px;
      }

    /* Modern Premium Table Styling */
    .table-container-premium {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      border: 1px solid #e2e8f0;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      margin: 1rem;
    }
    .custom-table-premium {
      width: 100%;
      min-width: 1100px;
      margin-bottom: 0;
      border-collapse: separate;
      border-spacing: 0;
    }
    .custom-table-premium thead th {
      background: linear-gradient(135deg, #0f172a, #1e293b);
      color: #fff;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.85rem;
      letter-spacing: 1px;
      padding: 16px;
      border: none;
      text-align: center;
    }
    .custom-table-premium tbody tr {
      transition: all 0.2s ease;
    }
    .custom-table-premium tbody tr:hover {
      background-color: #f8fafc;
      transform: scale(1.002);
      box-shadow: inset 4px 0 0 #3b82f6;
    }
    .custom-table-premium td {
      padding: 16px;
      vertical-align: middle;
      color: #334155;
      font-size: 0.95rem;
      border-bottom: 1px solid #f1f5f9;
      text-align: center;
    }
    .btn-action-premium {
      border: none;
      background: #f1f5f9;
      color: #475569;
      border-radius: 8px;
      padding: 6px 16px;
      font-weight: 600;
      font-size: 0.85rem;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s;
    }
    .btn-action-premium:hover {
      background: #0f172a;
      color: #fff;
      transform: translateY(-2px);
    }
    .btn-edit-premium { color: #2563eb; background: #eff6ff; }
    .btn-edit-premium { color: #2563eb; background: #eff6ff; }
    .btn-edit-premium:hover { background: #2563eb; color: #fff; }

    .badge-membership {
      background: #eff6ff;
      color: #1e4ed8;
      border: 1px solid #dbeafe;
      padding: 5px 12px;
      border-radius: 6px;
      font-weight: 700;
      font-size: 0.8rem;
    }
    .badge-mobile {
      background: #f0fdf4;
      color: #15803d;
      border: 1px solid #dcfce7;
      padding: 4px 10px;
      border-radius: 6px;
      font-weight: 600;
      font-size: 0.85rem;
    }

    @media (max-width: 768px) {
      .top-navbar-row { min-height: 60px; }
      .main-content-area { padding: 10px !important; }
      .card-header { padding: 15px !important; }
      .card-body { padding: 15px !important; }
      #ps-logo { padding-top: 10px !important; padding-bottom: 10px !important; }
    }
    </style>
</head>
<body>
        
<div class="container-fluid layout-container p-0">
<?= view('notification_toast') ?>

    <div class="top-navbar-row"><!-----top-bar--------------->
        <div id="ps-logo" class="col-12 col-md-3 border-bottom border-md-0 py-2 py-md-3 d-flex align-items-center justify-content-start ps-2">
        </div>

        <div id="search-bar" class="col-12 col-md-9 d-flex align-items-center justify-content-between border-bottom border-md-0 px-3">
        </div>
    </div><!-----------top-bar-end----------------------->

    <div class="main-body-row"><!----------main-navbar----------->
        <div id="menu-bar" class="col-md-3"><!----------side-bar-------------------->
        </div><!-----------side-bar-end-------------->
            
        <div id="changepage" class="main-content-area col-md-9"><!-----------main-dashboard------------------------->

         <!------------------------------coordinator-data--------------------------->
         <?php if(isset($member)):?>
            <div class="container-fluid px-4 py-4 bg-white">   
            
            <div class="card shadow-sm rounded border-0 mb-5">
                <div class="card-header bg-white border-bottom pt-4 pb-3 px-4 d-flex align-items-center">
                    <h4 style="font-weight:600; color: #2c3e50; margin:0;"><i class="fa-solid fa-user text-primary me-2"></i>Member Details</h4> 
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
                    <span class="badge bg-warning text-dark fs-6 ms-3 px-3 py-2" style="border-radius:50px; font-weight:500; font-size: 0.8em !important;">
                        <i class="fa-solid fa-clock-rotate-left"></i> In Review
                    </span>
                    <?php endif; ?>
                </div>
                <div class="card-body px-4 py-4">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img class="shadow-sm" style="width:180px;height:180px;object-fit:cover;border-radius:50%;border: 4px solid #f8f9fa;" src="<?= base_url('assets/membersdocuments/' . $member->Memberimage) ?>" alt="Member Image">
                            
                            <div class="d-flex flex-column align-items-center gap-2 mt-4 px-xl-5 px-lg-4 px-md-2">
                                <button style="width: 100%; border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#member_documents" class="btn btn-outline-primary fw-bold py-2" onclick="viewMemberdocuments('<?=$member->Aadharfrontimage?>','<?=$member->Aadharbackimage?>','<?=$member->Communitycertificate?>')"><i class="fa-solid fa-file-lines me-2"></i>View Documents</button>

                                <button style="width: 100%; border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#eventparticipation" class="btn btn-outline-success fw-bold py-2" onclick="viewMembereventparticipation('<?=$member->Familymembershipid?>')"><i class="fa-solid fa-calendar-check me-2"></i>Event Participation</button>

                                <?php if($member->MemberRole == 'Head'): ?>
                                    <?php if(!(isset($member->is_dead) && $member->is_dead == 1)): ?>
                                        <button style="width: 100%; border-radius: 8px;" onclick="showupdatemembermodal('<?=trim($member->Familymembershipid)?>')" class='updatecoord btn btn-outline-warning fw-bold text-dark py-2'><i class="fa-solid fa-user-pen me-2"></i>Update Details</button>
                                    <?php else: ?>
                                        <button style="width: 100%; border-radius: 8px;" class='btn btn-secondary fw-bold py-2' disabled><i class="fa-solid fa-user-pen me-2"></i>Update Details</button>
                                    <?php endif; ?>
                                    
                                    <?php if(session()->get('role') == 3): ?>
                                        <a style="width: 100%; border-radius: 8px;" href="<?= base_url('add_family_member'); ?>" class="btn btn-primary fw-bold shadow-sm py-2"><i class="fa-solid fa-user-plus me-2"></i>Add Family Member</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>  
                        <div class="col-md-8 mt-4 mt-md-0">
                            <?php
                                function getDisplayVal($field, $member, $updated_data) {
                                    $original = $member->$field ?? '';
                                    if (isset($updated_data[$field]) && $updated_data[$field] != $original) {
                                        return htmlspecialchars($updated_data[$field] ?? '');
                                    }
                                    return htmlspecialchars($original ?? '');
                                }
                            ?>
                            <div class="table-responsive h-100 p-4 bg-light rounded shadow-sm <?= (isset($member->is_dead) && $member->is_dead == 1) ? 'dead-member-row' : '' ?>">
                                <table id="coord_data" class="table table-borderless align-middle mb-0">
                                    <tbody>
                                        <tr class="border-bottom border-light <?= (isset($member->is_dead) && $member->is_dead == 1) ? 'dead-member-row' : '' ?>">
                                            <th width="35%" class="text-secondary py-3 fs-6">Name:</th>
                                            <td class="text-primary fw-bold fs-5 py-3"><?= (isset($updated_data) ? getDisplayVal('Name', $member, $updated_data) : ($member->Name ?? '')) ?></td>
                                        </tr>
                                        <tr class="border-bottom border-light">
                                            <th class="text-secondary py-3 fs-6">Family Membership ID:</th>
                                            <td class="py-3"><span class="badge bg-primary px-3 py-2 fs-6 rounded-pill shadow-sm"><?=$member->Familymembershipid?></span></td>
                                        </tr>
                                        <tr>
                                            <th class="text-secondary py-3 fs-6" style="vertical-align:top;">Address:</th>
                                            <td class="py-3 fw-medium text-dark">
                                                <ul class="list-unstyled mb-0" style="line-height: 1.8;">
                                                    <li><i class="fa-solid fa-house fa-fw text-primary me-2"></i> <?= isset($updated_data) ? getDisplayVal('Doornumber', $member, $updated_data) : ($member->Doornumber ?? '') ?>, <?= isset($updated_data) ? getDisplayVal('Street', $member, $updated_data) : ($member->Street ?? '') ?></li>
                                                    <li><i class="fa-solid fa-location-dot fa-fw text-primary me-2"></i> <?= isset($updated_data) ? getDisplayVal('Village', $member, $updated_data) : ($member->Village ?? '') ?>, <?= isset($updated_data) ? getDisplayVal('Taluk', $member, $updated_data) : ($member->Taluk ?? '') ?></li>
                                                    <li><i class="fa-solid fa-map-pin fa-fw text-primary me-2"></i> <?= isset($updated_data) ? getDisplayVal('District', $member, $updated_data) : ($member->District ?? '') ?> - <?= isset($updated_data) ? getDisplayVal('Pincode', $member, $updated_data) : ($member->Pincode ?? '') ?></li>
                                                    <li><i class="fa-solid fa-map fa-fw text-primary me-2"></i> <?= isset($updated_data) ? getDisplayVal('State', $member, $updated_data) : ($member->State ?? '') ?></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php if(isset($member->Phonenumber)): ?>
                                        <tr class="border-top border-light">
                                            <th class="text-secondary py-3 fs-6">Phone:</th>
                                            <td class="py-3 fw-medium text-dark"><?= isset($updated_data) ? getDisplayVal('Phonenumber', $member, $updated_data) : $member->Phonenumber ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if(isset($member->Aadharnumber)): ?>
                                        <tr class="border-top border-light">
                                            <th class="text-secondary py-3 fs-6">Aadhar:</th>
                                            <td class="py-3 fw-medium text-dark"><?= isset($updated_data) ? getDisplayVal('Aadharnumber', $member, $updated_data) : $member->Aadharnumber ?></td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>

            <?php if(isset($family_members) && !empty($family_members) && count($family_members) > 0): ?>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm border-0 rounded mb-4">
                        <div class="card-header bg-white border-bottom pt-4 pb-3 px-4 d-flex justify-content-between align-items-center">
                            <h4 style="font-weight:600; color: #2c3e50; margin:0;"><i class="fa-solid fa-users text-primary me-2"></i>Family Members</h4>
                            <div class="btn-group" role="group">
                                <button type="button" id="tableViewBtn" class="btn btn-primary active" onclick="switchView('table')"><i class="fa-solid fa-table me-1"></i> Table View</button>
                                <button type="button" id="treeViewBtn" class="btn btn-outline-primary" onclick="switchView('tree')"><i class="fa-solid fa-tree me-1"></i> Tree View</button>
                            </div>
                        </div>
                        <div class="card-body p-0" id="tableView">
                            <div class="table-container-premium">
                                <table class="custom-table-premium">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Relationship</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <?php if($member->MemberRole == 'Head'): ?>
                                                <th>Action</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody id="family_members_body">
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
                                            <tr class="<?= (isset($fm->is_dead) && $fm->is_dead == 1) ? 'dead-member-row bg-light' : '' ?>" <?= (!(isset($fm->is_dead) && $fm->is_dead == 1) && $member->MemberRole == 'Head') ? "onclick=\"showupdatemembermodal('".trim($fm->Familymembershipid)."')\" style=\"cursor:pointer;\"" : "" ?>>
                                                <td class="fw-bold text-muted"><?= $sno++ ?></td>
                                                <td>
                                                    <div class="fw-bold text-dark"><?= $fm->Name ?></div>
                                                    <div class="badge-membership mt-1 d-inline-block"><?= $fm->Familymembershipid ?></div>
                                                    <?php if(isset($fm->pending_status) && $fm->pending_status == 'Pending'): ?>
                                                        <span class="badge bg-warning text-dark ms-2 px-2 py-1" style="font-size: 0.75em; border-radius: 4px;">In Review</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><span class="badge bg-light text-dark border px-2 py-1 rounded"><?= $display_role ?></span></td>
                                                <td>
                                                    <?php if(strtolower($fm->Gender) == 'male'): ?>
                                                        <i class="fa-solid fa-mars text-primary me-1"></i>
                                                    <?php elseif(strtolower($fm->Gender) == 'female'): ?>
                                                        <i class="fa-solid fa-venus text-danger me-1"></i>
                                                    <?php endif; ?>
                                                    <?= $fm->Gender ?>
                                                </td>
                                                <td class="fw-medium"><?= $age ?></td>
                                                <?php if($member->MemberRole == 'Head'): ?>
                                                    <td onclick="event.stopPropagation();">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <?php if(!(isset($fm->is_dead) && $fm->is_dead == 1)): ?>
                                                                <button onclick="showupdatemembermodal('<?=trim($fm->Familymembershipid)?>')" class='btn-action-premium btn-edit-premium'>
                                                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                                                </button>
                                                            <?php else: ?>
                                                                <button class='btn-action-premium' disabled>
                                                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                                                </button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Family Tree View Container -->
                        <div class="card-body p-0 d-none" id="treeView">
                            <div class="family-tree-container">
                                <div class="tree">
                                    <?php 
                                        $default_img = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23bdbdbd'%3E%3Cpath d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z'/%3E%3C/svg%3E";
                                        
                                        $g0 = []; // Grand Father / Grand Mother
                                        $g1 = []; // Father / Mother
                                        $g2_manager = null; // Head / Husband
                                        $g2_spouse = null; // Wife
                                        $g2_siblings = []; // Brother / Sister
                                        $g3_children = []; // Son / Daughter / In-laws
                                        
                                        foreach($family_members as $fm) {
                                            $role = strtolower(trim($fm->MemberRole));
                                            if (strpos($role, 'grand') !== false) {
                                                $g0[] = $fm;
                                            } else if ($role == 'father' || $role == 'mother' || strpos($role, 'old head') !== false) {
                                                $g1[] = $fm;
                                            } else if ($role == 'head') {
                                                $g2_manager = $fm;
                                            } else if ($role == 'husband' || $role == 'wife') {
                                                $g2_spouse = $fm;
                                            } else if (strpos($role, 'brother') !== false || strpos($role, 'sister') !== false || $role == 'other') {
                                                $g2_siblings[] = $fm;
                                            } else if (strpos($role, 'son') !== false || strpos($role, 'daughter') !== false || strpos($role, 'law') !== false) {
                                                $g3_children[] = $fm;
                                            }
                                        }

                                        // Start rendering tree
                                        if (!empty($g0) || !empty($g1) || $g2_manager || $g2_spouse || !empty($g2_siblings) || !empty($g3_children)):
                                    ?>
                                    <ul>
                                        <li>
                                            <!-- G0: Oldest Generation -->
                                            <?php if (!empty($g0)): ?>
                                                <div class="spouse-container mb-3">
                                                    <?php foreach($g0 as $gm): ?>
                                                        <div class="member-card <?= (isset($gm->is_dead) && $gm->is_dead == 1) ? 'dead-member' : '' ?>" <?= (!(isset($gm->is_dead) && $gm->is_dead == 1) && $member->MemberRole == 'Head') ? "onclick=\"showupdatemembermodal('".trim($gm->Familymembershipid)."')\" style=\"cursor:pointer;\"" : "" ?>>
                                                            <?php if(isset($gm->is_dead) && $gm->is_dead == 1): ?><span class="tree-dead-badge">Late</span><?php endif; ?>
                                                            <img src="<?= (!empty($gm->Memberimage) && file_exists('assets/membersdocuments/'.$gm->Memberimage)) ? base_url('assets/membersdocuments/'.$gm->Memberimage) : $default_img ?>" class="member-img" onerror="this.src='<?= $default_img ?>'">
                                                            <span class="member-name"><?= $gm->Name ?></span>
                                                            <span class="member-role role-grand"><?= $gm->MemberRole ?></span>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>

                                            <ul>
                                                <li>
                                                    <!-- G1: Parents Container -->
                                                    <?php if (!empty($g1)): ?>
                                                        <div class="spouse-container mb-3">
                                                            <?php foreach($g1 as $gp): ?>
                                                                <div class="member-card <?= (isset($gp->is_dead) && $gp->is_dead == 1) ? 'dead-member' : '' ?>" <?= (!(isset($gp->is_dead) && $gp->is_dead == 1) && $member->MemberRole == 'Head') ? "onclick=\"showupdatemembermodal('".trim($gp->Familymembershipid)."')\" style=\"cursor:pointer;\"" : "" ?>>
                                                                    <?php if(isset($gp->is_dead) && $gp->is_dead == 1): ?><span class="tree-dead-badge">Late</span><?php endif; ?>
                                                                    <img src="<?= (!empty($gp->Memberimage) && file_exists('assets/membersdocuments/'.$gp->Memberimage)) ? base_url('assets/membersdocuments/'.$gp->Memberimage) : $default_img ?>" class="member-img" onerror="this.src='<?= $default_img ?>'">
                                                                    <span class="member-name"><?= $gp->Name ?></span>
                                                                    <span class="member-role role-parent"><?= $gp->MemberRole ?></span>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <!-- G2: Manager & Spouse & Siblings -->
                                                    <ul>
                                                        <?php if($g2_manager || $g2_spouse || !empty($g3_children)): ?>
                                                        <li>
                                                            <div class="spouse-container">
                                                                <?php if($g2_manager): ?>
                                                                    <div class="member-card <?= (isset($g2_manager->is_dead) && $g2_manager->is_dead == 1) ? 'dead-member' : '' ?>" <?= (!(isset($g2_manager->is_dead) && $g2_manager->is_dead == 1) && $member->MemberRole == 'Head') ? "onclick=\"showupdatemembermodal('".trim($g2_manager->Familymembershipid)."')\" style=\"cursor:pointer;\"" : "" ?>>
                                                                        <?php if(isset($g2_manager->is_dead) && $g2_manager->is_dead == 1): ?><span class="tree-dead-badge">Late</span><?php endif; ?>
                                                                        <img src="<?= (!empty($g2_manager->Memberimage) && file_exists('assets/membersdocuments/'.$g2_manager->Memberimage)) ? base_url('assets/membersdocuments/'.$g2_manager->Memberimage) : $default_img ?>" class="member-img" onerror="this.src='<?= $default_img ?>'">
                                                                        <span class="member-name"><?= $g2_manager->Name ?></span>
                                                                        <span class="member-role role-head"><?= $g2_manager->MemberRole ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($g2_spouse): ?>
                                                                    <div class="member-card <?= (isset($g2_spouse->is_dead) && $g2_spouse->is_dead == 1) ? 'dead-member' : '' ?>" <?= (!(isset($g2_spouse->is_dead) && $g2_spouse->is_dead == 1) && $member->MemberRole == 'Head') ? "onclick=\"showupdatemembermodal('".trim($g2_spouse->Familymembershipid)."')\" style=\"cursor:pointer;\"" : "" ?>>
                                                                        <?php if(isset($g2_spouse->is_dead) && $g2_spouse->is_dead == 1): ?><span class="tree-dead-badge">Late</span><?php endif; ?>
                                                                        <img src="<?= (!empty($g2_spouse->Memberimage) && file_exists('assets/membersdocuments/'.$g2_spouse->Memberimage)) ? base_url('assets/membersdocuments/'.$g2_spouse->Memberimage) : $default_img ?>" class="member-img" onerror="this.src='<?= $default_img ?>'">
                                                                        <span class="member-name"><?= $g2_spouse->Name ?></span>
                                                                        <span class="member-role role-spouse"><?= $g2_spouse->MemberRole ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>

                                                            <!-- G3: Children & In-laws -->
                                                            <?php if (!empty($g3_children)): ?>
                                                                <ul>
                                                                    <?php foreach($g3_children as $child): 
                                                                        $c_role = strtolower(trim($child->MemberRole));
                                                                        $role_class = (strpos($c_role, 'law') !== false) ? 'role-inlaw' : 'role-child';
                                                                    ?>
                                                                        <li>
                                                                            <div class="member-card <?= (isset($child->is_dead) && $child->is_dead == 1) ? 'dead-member' : '' ?>" <?= (!(isset($child->is_dead) && $child->is_dead == 1) && $member->MemberRole == 'Head') ? "onclick=\"showupdatemembermodal('".trim($child->Familymembershipid)."')\" style=\"cursor:pointer;\"" : "" ?>>
                                                                                <?php if(isset($child->is_dead) && $child->is_dead == 1): ?><span class="tree-dead-badge">Late</span><?php endif; ?>
                                                                                <img src="<?= (!empty($child->Memberimage) && file_exists('assets/membersdocuments/'.$child->Memberimage)) ? base_url('assets/membersdocuments/'.$child->Memberimage) : $default_img ?>" class="member-img" onerror="this.src='<?= $default_img ?>'">
                                                                                <span class="member-name"><?= $child->Name ?></span>
                                                                                <span class="member-role <?= $role_class ?>"><?= $child->MemberRole ?></span>
                                                                            </div>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </li>
                                                        <?php endif; ?>

                                                        <?php foreach($g2_siblings as $sib): ?>
                                                            <li>
                                                                <div class="member-card <?= (isset($sib->is_dead) && $sib->is_dead == 1) ? 'dead-member' : '' ?>" <?= (!(isset($sib->is_dead) && $sib->is_dead == 1) && $member->MemberRole == 'Head') ? "onclick=\"showupdatemembermodal('".trim($sib->Familymembershipid)."')\" style=\"cursor:pointer;\"" : "" ?>>
                                                                    <?php if(isset($sib->is_dead) && $sib->is_dead == 1): ?><span class="tree-dead-badge">Late</span><?php endif; ?>
                                                                    <img src="<?= (!empty($sib->Memberimage) && file_exists('assets/membersdocuments/'.$sib->Memberimage)) ? base_url('assets/membersdocuments/'.$sib->Memberimage) : $default_img ?>" class="member-img" onerror="this.src='<?= $default_img ?>'">
                                                                    <span class="member-name"><?= $sib->Name ?></span>
                                                                    <span class="member-role role-sibling"><?= $sib->MemberRole ?></span>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
            <div class="table-container-premium container-fluid mx-0">
                <table class="custom-table-premium">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>User Details</th>
                            <th>Mobile</th>
                            <th>Location/Areas</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="ps-coords">

                    <?php if(isset($coordinators) && isset($sno)):?>
                        <?php $i=$sno + 1; foreach ($coordinators as $key => $value): ?> 
                            
                            <tr>
                                <td class="fw-bold text-muted"><?=$i?></td>
                                <td>
                                    <div class="fw-bold text-dark"><?=$value->Name?></div>
                                    <div class="badge-membership mt-1 d-inline-block"><?=$value->Familymembershipid?></div>
                                </td>
                                <td>
                                    <div class="badge-mobile"><i class="bi bi-phone me-1"></i><?=$value->Phonenumber?></div>
                                </td>
                                <td>
                                    <div class="fw-medium text-dark"><?=$value->District?></div>
                                    <div class="small text-muted">
                                        <?=!empty($value->Area_one) ? "$value->Area_one" : ""?>
                                        <?=!empty($value->Area_two) ? ", $value->Area_two" : ""?>
                                        <?=!empty($value->Area_three) ? ", $value->Area_three" : ""?>
                                        <?=!empty($value->Area_four) ? ", $value->Area_four" : ""?>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button onclick='showupdatecoordsmodal(<?=trim($value->Familymembershipid)?>)' 
                                                class='btn-action-premium' title="Update Details">
                                            <i class='fa-regular fa-pen-to-square'></i>
                                        </button>
                                        <button data-bs-toggle='modal' data-bs-target='#deletemodal' 
                                                onclick="deletecoord('<?=trim($value->Familymembershipid)?>','<?=trim($value->Name)?>')" 
                                                class='btn-action-premium text-danger' title="Trash">
                                            <i class='fa-solid fa-trash-can'></i>
                                        </button>
                                        <button onclick ="viewCoordinatordata('view-coordinator-data?coord_id=<?=$value->Familymembershipid?>')" 
                                                class='btn-action-premium' title="View Details">
                                            <i class='fa-sharp fa-solid fa-eye'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php ++$i; endforeach;?>
                            <?php endif;?>
                    </tbody>
                </table>
            </div>
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

// Menu height set by CSS

$.ajax({
      type:"get",
      url:"<?= base_url('members/sidemenu') ?>",
      success:(result)=>{
           document.getElementById("menu-bar").innerHTML = result;
           // Populate custom mobile menu content
           document.getElementById("mobile-menu-content").innerHTML = result;
           updateHeights();
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
           updateHeights();
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
     if(form_section) form_section.style.height = `${form_height}px`;

     window.addEventListener("resize",()=>{
       let formmodal = document.getElementById("update-member-section");
       let b = window.innerWidth;
       if(formmodal){
         if( b > 768) {
          formmodal.style.left = "2.5%";
         }
         else {
          formmodal.style.left = "2.5%";
         }
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

    function commonSearch(input) {
        let filter = input.value.toLowerCase();
        
        // Filter Family Members Table (Client-side)
        let familyTableBody = document.getElementById("family_members_body");
        if (familyTableBody) {
            let tr = familyTableBody.getElementsByTagName("tr");
            for (let i = 0; i < tr.length; i++) {
                let tdName = tr[i].getElementsByTagName("td")[1];
                if (tdName) {
                    let txtValue = tdName.textContent || tdName.innerText;
                    tr[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? "" : "none";
                }
            }
        }

        // Filter Master Coordinators list at bottom (AJAX)
        let psCoords = document.getElementById('ps-coords');
        if (psCoords) {
            $.ajax({
                type: "get",
                url: "coordinators/searchcoordinators",
                data: { "searchfields": input.value },
                success: (result) => {
                    psCoords.innerHTML = result;
                },
                error: (error) => {
                    psCoords.innerHTML = error;
                }
            });
        }
    }
                               

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
   function switchView(view) {
        if (view === 'table') {
            document.getElementById('tableView').classList.remove('d-none');
            document.getElementById('treeView').classList.add('d-none');
            document.getElementById('tableViewBtn').classList.add('btn-primary', 'active');
            document.getElementById('tableViewBtn').classList.remove('btn-outline-primary');
            document.getElementById('treeViewBtn').classList.add('btn-outline-primary');
            document.getElementById('treeViewBtn').classList.remove('btn-primary', 'active');
        } else {
            document.getElementById('tableView').classList.add('d-none');
            document.getElementById('treeView').classList.remove('d-none');
            document.getElementById('treeViewBtn').classList.add('btn-primary', 'active');
            document.getElementById('treeViewBtn').classList.remove('btn-outline-primary');
            document.getElementById('tableViewBtn').classList.add('btn-outline-primary');
            document.getElementById('tableViewBtn').classList.remove('btn-primary', 'active');
        }
    }
   </script>
  

 <!-------------------------------chart-end------------------------------------>  


 



      
    
</body>
</html>



