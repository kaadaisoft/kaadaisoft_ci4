<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (session()->get('role') == 1) ? 'My Details' : 'Manager Details' ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>  
    <style>
      .grayscale-filter {
        filter: grayscale(100%);
      }

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

    /* Modern Premium Table Styling */
    .table-container-premium {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      border: 1px solid #e2e8f0;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      margin-bottom: 2rem;
    }
    .custom-table-premium {
      width: 100%;
      min-width: 1000px;
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
      background: #f8fafc;
      transform: scale(1.002);
      box-shadow: inset 4px 0 0 #3b82f6;
    }

      /* Premium Pagination Styles */
      .pagination-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        margin: 0 4px;
        border-radius: 50%;
        background-color: #fff;
        border: 1px solid #e2e8f0;
        color: #475569;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
      }
      .pagination-btn:hover:not(.disabled):not(.active) {
        background-color: #f8fafc;
        border-color: #cbd5e1;
        color: #0f172a;
        transform: translateY(-1px);
      }
      .pagination-btn.active {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        border-color: transparent;
        box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
      }
      .pagination-btn.disabled {
        opacity: 0.5;
        cursor: not-allowed;
        background-color: #f1f5f9;
      }
      .pagination-ellipsis {
        color: #94a3b8;
        font-weight: 600;
        padding: 0 4px;
      }

    @media (max-width: 576px) {
        .card-header.d-flex {
            flex-direction: column !important;
            gap: 15px;
            align-items: center !important;
            text-align: center;
        }
        .btn-group {
            width: 100%;
        }
        .btn-group .btn {
            flex: 1;
            padding: 8px 5px;
            font-size: 13px;
        }
        .family-tree-container {
            padding: 40px 10px;
        }
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
    .btn-edit-premium:hover { background: #2563eb; color: #fff; }
    </style>
</head>
<body>
        
<div id="pageheight" class="container-fluid" style="overflow:hidden;position:absolute;">

      <div id="side-bar" class="row"><!-----top-bar--------------->
      <div id="ps-logo" class="col-md-2 border-bottom ps-gray py-3 d-flex align-items-center justify-content-start ps-2"></div>
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
                    <h4 style="font-weight:600; color: #2c3e50; margin:0;"><i class="fa-solid fa-user-tie text-primary me-2"></i><?= (session()->get('role') == 1) ? 'My Details' : 'Manager Details' ?></h4> 
                </div>
                <div class="card-body px-4 py-4">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <?php 
                                $default_profile = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23cbd5e1'%3E%3Cpath d='M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z'/%3E%3C/svg%3E";
                                $safe_default_profile = str_replace("'", "%27", $default_profile);
                                $p_img = (!empty($manager->Memberimage) && file_exists(WRITEPATH . 'uploads/membersdocuments/'.$manager->Memberimage)) ? base_url('documents/view/'.$manager->Memberimage) : $default_profile;
                            ?>
                            <img class="shadow-sm" style="width:180px;height:180px;object-fit:cover;border-radius:50%;border: 4px solid #f8f9fa; cursor:pointer;" src="<?= $p_img ?>" alt="Manager Image" onclick="viewFullImage('<?= $manager->Memberimage ?>', 'Manager Photo')" onerror="this.onerror=null; this.src='<?= $safe_default_profile ?>'">
                            
                            <div class="d-flex justify-content-center gap-3 mt-4 px-xl-5 px-lg-4 px-md-2 w-100">
                                <button class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                        style="width: 48px; height: 48px;" 
                                        title="Aadhar Front" 
                                        onclick="viewFullImage('<?=$manager->Aadharfrontimage?>', 'Aadhar Front')">
                                    <i class="fa-solid fa-id-card fs-5"></i>
                                </button>
                                <button class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                        style="width: 48px; height: 48px;" 
                                        title="Aadhar Back" 
                                        onclick="viewFullImage('<?=$manager->Aadharbackimage?>', 'Aadhar Back')">
                                    <i class="fa-solid fa-id-card-clip fs-5"></i>
                                </button>
                                <button class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                        style="width: 48px; height: 48px;" 
                                        title="Community Certificate" 
                                        onclick="viewFullImage('<?=$manager->Communitycertificate?>', 'Community Certificate')">
                                    <i class="fa-solid fa-certificate fs-5"></i>
                                </button>
                            </div>

                            <div class="d-flex flex-column align-items-center gap-2 mt-3 px-xl-5 px-lg-4 px-md-2 w-100">
                                <button style="width: 100%; border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#eventparticipation" class="btn btn-outline-success fw-bold py-2" onclick="viewMembereventparticipation('<?=$manager->Familymembershipid?>')"><i class="fa-solid fa-calendar-check me-2"></i>Event Participation</button>
                                <button style="width: 100%; border-radius: 8px;" onclick="showupdatemanagermodal('<?=trim($manager->Familymembershipid)?>')" class='btn btn-outline-warning fw-bold text-dark py-2'><i class="fa-solid fa-user-pen me-2"></i>Update Details</button>
                                <button type="button" style="width: 100%; border-radius: 8px;" onclick="showAddFamilyMemberModal()" class="btn btn-primary fw-bold shadow-sm py-2 mt-1"><i class="fa-solid fa-user-plus me-2"></i>Add Family Member</button>
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
                                        <tr class="border-bottom border-light">
                                            <th class="text-secondary py-3 fs-6">Phone Number:</th>
                                            <td class="text-dark fw-medium fs-5 py-3"><?=$manager->Phonenumber?></td>
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
                        <div class="card-header bg-white border-bottom pt-4 pb-3 px-4 d-flex justify-content-between align-items-center">
                            <h4 style="font-weight:600; color: #2c3e50; margin:0;"><i class="fa-solid fa-users text-primary me-2"></i><?= (session()->get('role') == 1) ? 'My Family Members' : 'Family Members' ?></h4>
                            <div class="btn-group" role="group">
                                <button type="button" id="tableViewBtn" class="btn btn-primary active" onclick="switchView('table')"><i class="fa-solid fa-table me-1"></i> Table View</button>
                                <button type="button" id="treeViewBtn" class="btn btn-outline-primary" onclick="switchView('tree')"><i class="fa-solid fa-tree me-1"></i> Tree View</button>
                            </div>
                        </div>
                        <div class="card-body p-4" id="tableView">
                            <div class="table-container-premium">
                                <table class="custom-table-premium">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Relationship</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="family_members_body">
                                        <!-- Rendered via JS -->
                                    </tbody>
                                </table>
                            </div>
                            <div class='d-flex justify-content-center container-fluid mt-3'>
                                <div id="familyPagination" class="col-md-6 py-2 d-flex justify-content-around align-items-center"></div>
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
                                                        <div class="member-card <?= (isset($gm->is_dead) && $gm->is_dead == 1) ? 'dead-member' : '' ?>" <?= (isset($gm->is_dead) && $gm->is_dead == 1) ? '' : "onclick=\"showupdatemanagermodal('".trim($gm->Familymembershipid)."')\" style=\"cursor:pointer;\"" ?>>
                                                            <?php if(isset($gm->is_dead) && $gm->is_dead == 1): ?><span class="tree-dead-badge">Late</span><?php endif; ?>
                                                            <img src="<?= (!empty($gm->Memberimage) && file_exists(WRITEPATH . 'uploads/membersdocuments/'.$gm->Memberimage)) ? base_url('documents/view/'.$gm->Memberimage) : $default_img ?>" class="member-img" onerror="this.src='<?= $default_img ?>'">
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
                                                                <div class="member-card <?= (isset($gp->is_dead) && $gp->is_dead == 1) ? 'dead-member' : '' ?>" <?= (isset($gp->is_dead) && $gp->is_dead == 1) ? '' : "onclick=\"showupdatemanagermodal('".trim($gp->Familymembershipid)."')\" style=\"cursor:pointer;\"" ?>>
                                                                    <?php if(isset($gp->is_dead) && $gp->is_dead == 1): ?><span class="tree-dead-badge">Late</span><?php endif; ?>
                                                                    <img src="<?= (!empty($gp->Memberimage) && file_exists(WRITEPATH . 'uploads/membersdocuments/'.$gp->Memberimage)) ? base_url('documents/view/'.$gp->Memberimage) : $default_img ?>" class="member-img" onerror="this.src='<?= $default_img ?>'">
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
                                                                    <div class="member-card <?= (isset($g2_manager->is_dead) && $g2_manager->is_dead == 1) ? 'dead-member' : '' ?>" <?= (isset($g2_manager->is_dead) && $g2_manager->is_dead == 1) ? '' : "onclick=\"showupdatemanagermodal('".trim($g2_manager->Familymembershipid)."')\" style=\"cursor:pointer;\"" ?>>
                                                                        <?php if(isset($g2_manager->is_dead) && $g2_manager->is_dead == 1): ?><span class="tree-dead-badge">Late</span><?php endif; ?>
                                                                        <img src="<?= (!empty($g2_manager->Memberimage) && file_exists(WRITEPATH . 'uploads/membersdocuments/'.$g2_manager->Memberimage)) ? base_url('documents/view/'.$g2_manager->Memberimage) : $default_img ?>" class="member-img" onerror="this.src='<?= $default_img ?>'">
                                                                        <span class="member-name"><?= $g2_manager->Name ?></span>
                                                                        <span class="member-role role-head"><?= $g2_manager->MemberRole ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($g2_spouse): ?>
                                                                    <div class="member-card <?= (isset($g2_spouse->is_dead) && $g2_spouse->is_dead == 1) ? 'dead-member' : '' ?>" <?= (isset($g2_spouse->is_dead) && $g2_spouse->is_dead == 1) ? '' : "onclick=\"showupdatemanagermodal('".trim($g2_spouse->Familymembershipid)."')\" style=\"cursor:pointer;\"" ?>>
                                                                        <?php if(isset($g2_spouse->is_dead) && $g2_spouse->is_dead == 1): ?><span class="tree-dead-badge">Late</span><?php endif; ?>
                                                                        <img src="<?= (!empty($g2_spouse->Memberimage) && file_exists(WRITEPATH . 'uploads/membersdocuments/'.$g2_spouse->Memberimage)) ? base_url('documents/view/'.$g2_spouse->Memberimage) : $default_img ?>" class="member-img" onerror="this.src='<?= $default_img ?>'">
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
                                                                            <div class="member-card <?= (isset($child->is_dead) && $child->is_dead == 1) ? 'dead-member' : '' ?>" <?= (isset($child->is_dead) && $child->is_dead == 1) ? '' : "onclick=\"showupdatemanagermodal('".trim($child->Familymembershipid)."')\" style=\"cursor:pointer;\"" ?>>
                                                                                <?php if(isset($child->is_dead) && $child->is_dead == 1): ?><span class="tree-dead-badge">Late</span><?php endif; ?>
                                                                                <img src="<?= (!empty($child->Memberimage) && file_exists(WRITEPATH . 'uploads/membersdocuments/'.$child->Memberimage)) ? base_url('documents/view/'.$child->Memberimage) : $default_img ?>" class="member-img" onerror="this.src='<?= $default_img ?>'">
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
                                                                <div class="member-card <?= (isset($sib->is_dead) && $sib->is_dead == 1) ? 'dead-member' : '' ?>" <?= (isset($sib->is_dead) && $sib->is_dead == 1) ? '' : "onclick=\"showupdatemanagermodal('".trim($sib->Familymembershipid)."')\" style=\"cursor:pointer;\"" ?>>
                                                                    <?php if(isset($sib->is_dead) && $sib->is_dead == 1): ?><span class="tree-dead-badge">Late</span><?php endif; ?>
                                                                    <img src="<?= (!empty($sib->Memberimage) && file_exists(WRITEPATH . 'uploads/membersdocuments/'.$sib->Memberimage)) ? base_url('documents/view/'.$sib->Memberimage) : $default_img ?>" class="member-img" onerror="this.src='<?= $default_img ?>'">
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

<div id="addfamilymember-modal-hide" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 10000; overflow-y: auto;">
    <div id="add-family-member-section" style="width: 90%; margin: 2% auto; background: #fff; border-radius: 20px; padding: 20px; position: relative;">
        <div id="add-family-member-form"></div>
        <button class="btn btn-danger mt-3" onclick="hideAddFamilyMemberModal()">Close</button>
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
      let familyMembersData = [];
      <?php 
          if (isset($family_members) && !empty($family_members)):
              $fm_array = [];
              $role_counts = [];
              foreach($family_members as $fm) {
                  $role = $fm->MemberRole;
                  $role_counts[$role] = ($role_counts[$role] ?? 0) + 1;
              }
              $role_counters = [];
              foreach($family_members as $fm) {
                  $dob = new DateTime($fm->Dob);
                  $now = new DateTime();
                  $age = $now->diff($dob)->y;
                  
                  $role = $fm->MemberRole;
                  $display_role = $role;
                  if (isset($role_counts[$role]) && $role_counts[$role] > 1) {
                      $role_counters[$role] = ($role_counters[$role] ?? 0) + 1;
                      $display_role .= '_' . $role_counters[$role];
                  }
                  
                  $fm_array[] = [
                      'id' => trim($fm->Familymembershipid),
                      'name' => $fm->Name,
                      'role' => $display_role,
                      'gender' => $fm->Gender,
                      'age' => $age,
                      'is_dead' => (isset($fm->is_dead) && $fm->is_dead == 1) ? 1 : 0
                  ];
              }
      ?>
          familyMembersData = <?= json_encode($fm_array) ?> || [];
      <?php endif; ?>

      const ITEMS_PER_PAGE = 10;
      let currentFamilyActivePage = 1;

      function renderFamilyMembers(data, sNo) {
          let html = "";
          let i = sNo + 1;

          data.forEach(value => {
              let deadClass = value.is_dead == 1 ? 'dead-member-row bg-light' : '';
              let clickAttr = (value.is_dead != 1) ? `onclick="showupdatemanagermodal('${value.id}')" style="cursor:pointer;"` : '';
              let genderIcon = value.gender.toLowerCase() === 'male' ? '<i class="fa-solid fa-mars text-primary me-1"></i>' : 
                               (value.gender.toLowerCase() === 'female' ? '<i class="fa-solid fa-venus text-danger me-1"></i>' : '');
              
              let actionBtn = value.is_dead != 1 ? 
                  `<button onclick="showupdatemanagermodal('${value.id}')" class='btn btn-sm btn-outline-primary rounded-circle updatecoord' style='width:32px;height:32px;padding:0;'><i class='fa-regular fa-pen-to-square'></i></button>` : 
                  `<button class='btn btn-sm btn-outline-secondary rounded-circle' disabled style='width:32px;height:32px;padding:0;'><i class='fa-regular fa-pen-to-square'></i></button>`;

              html += `
                  <tr class="${deadClass}" ${clickAttr}>
                      <td class="fw-bold text-muted">${i}</td>
                      <td class="fw-bold text-dark">${value.name}</td>
                      <td><span class="badge bg-light text-dark border px-2 py-1 rounded">${value.role}</span></td>
                      <td>${genderIcon} ${value.gender}</td>
                      <td class="fw-medium">${value.age}</td>
                      <td onclick="event.stopPropagation();">
                          <div class="d-flex justify-content-center align-items-center gap-2">
                              ${actionBtn}
                          </div>
                      </td>
                  </tr>
              `;
              i++;
          });

          const bodyEl = document.getElementById("family_members_body");
          if (bodyEl) bodyEl.innerHTML = html;
      }

      function renderFamilyPagination(totalItems, currentPage, fullData) {
        if (!totalItems || totalItems <= 0) {
          const el = document.getElementById("familyPagination");
          if(el) el.innerHTML = "";
          return;
        }
        const totalPages = Math.ceil(totalItems / ITEMS_PER_PAGE);

        let html = `<div class="d-flex flex-column align-items-center"><div class="d-flex justify-content-center align-items-center gap-2 mt-2">`;

        html += `<button class="pagination-btn ${currentPage === 1 ? 'disabled' : ''}" 
                    onclick="goToFamilyPage(${currentPage - 1})" 
                    ${currentPage === 1 ? 'disabled' : ''}>
                    <i class="fa-solid fa-chevron-left"></i>
                 </button>`;

        for (let i = 1; i <= totalPages; i++) {
          if (totalPages <= 7 || i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
            html += `<button class="pagination-btn ${i === currentPage ? 'active' : ''}" 
                        onclick="goToFamilyPage(${i})">${i}</button>`;
          } else if (i === currentPage - 2 || i === currentPage + 2) {
            html += `<span class="pagination-ellipsis">...</span>`;
          }
        }

        html += `<button class="pagination-btn ${currentPage === totalPages ? 'disabled' : ''}" 
                    onclick="goToFamilyPage(${currentPage + 1})"
                    ${currentPage === totalPages ? 'disabled' : ''}>
                    <i class="fa-solid fa-chevron-right"></i>
                 </button>`;

        html += `</div>`;
        html += `<div class="text-center mt-2 text-muted small">Showing page ${currentPage} of ${totalPages}</div></div>`;
        
        const pgEl = document.getElementById("familyPagination");
        if(pgEl) pgEl.innerHTML = html;
      }

      function goToFamilyPage(page) {
          if (!familyMembersData || familyMembersData.length === 0) return;
          
          let searchTerm = "";
          let searchInput = document.querySelector("#commonsearch input");
          if(searchInput) searchTerm = searchInput.value.toLowerCase().trim();
          
          let displayData = familyMembersData;
          if (searchTerm !== "") {
              displayData = familyMembersData.filter(item => {
                  return item.name.toLowerCase().includes(searchTerm) || 
                         item.role.toLowerCase().includes(searchTerm) ||
                         item.id.toLowerCase().includes(searchTerm);
              });
          }

          const totalPages = Math.ceil(displayData.length / ITEMS_PER_PAGE);
          if (totalPages === 0) {
              renderFamilyMembers([], 0);
              renderFamilyPagination(0, 1, displayData);
              return;
          }
          
          if (page < 1) page = 1;
          if (page > totalPages) page = totalPages;
          currentFamilyActivePage = page;
          
          let offset = (page - 1) * ITEMS_PER_PAGE;
          renderFamilyMembers(displayData.slice(offset, offset + ITEMS_PER_PAGE), offset);
          renderFamilyPagination(displayData.length, currentFamilyActivePage, displayData);
      }

      document.addEventListener("DOMContentLoaded", function() {
          goToFamilyPage(1);
      });

      function viewMemberdocuments(aadharfrontimage,aadharbackimage,communitycertificate) {
          document.getElementById("showdocuments").innerHTML = `
          <div class="col-md-4 text-center">
              <p class="fw-bold">Aadhar Front Image:</p>
              <img class="img-fluid border rounded" style="max-height:300px;" src="<?= base_url('documents/view/') ?>/${aadharfrontimage}">
          </div>
          <div class="col-md-4 text-center">
              <p class="fw-bold">Aadhar Back Image:</p>
              <img class="img-fluid border rounded" style="max-height:300px;" src="<?= base_url('documents/view/') ?>/${aadharbackimage}">
          </div>
          <div class="col-md-4 text-center">
              <p class="fw-bold">Community Certificate:</p>
              <img class="img-fluid border rounded" style="max-height:300px;cursor:pointer;" 
                   onclick="viewCommunitycertificate('${communitycertificate}')" 
                   src="<?= base_url('documents/view/') ?>/${communitycertificate}">
          </div>`;
      }

      function viewCommunitycertificate(communitycertificate) {
        let viewcert_modal = new bootstrap.Modal(document.getElementById("show_commun_cert"),{
          backdrop:"static",
          keyboard:false
        });
        viewcert_modal.show();
        document.getElementById("dis_commun_cert").innerHTML = `<img style="width:100%;height:auto;" class="img-fluid" src='<?= base_url('documents/view/') ?>/${communitycertificate}'>`;
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

      function showAddFamilyMemberModal() {
          $.ajax({
              type: "get",
              url: "<?= base_url('add_family_member') ?>",
              success: (result) => {
                  $("#add-family-member-form").html(result);
                  document.getElementById("addfamilymember-modal-hide").style.display = 'block';
              }
          });
      }

      function hideAddFamilyMemberModal() {
          document.getElementById("addfamilymember-modal-hide").style.display = 'none';
      }

      // Highlight active sidebar menu item after AJAX load
      function highlightActiveMenu() {
        const pathSegments = window.location.pathname.split('/').filter(s => s !== '');
        document.querySelectorAll('#menu-bar [data-page], #mobile-menu-content [data-page]').forEach(function(link) {
          link.classList.remove('active-menu-item');
          const linkPage = link.getAttribute('data-page');
          if (pathSegments.some(seg => seg === linkPage) ||
              (pathSegments.length === 0 && linkPage === 'admindashboard')) {
            link.classList.add('active-menu-item');
          }
        });
      }

      $.ajax({
          type: "get",
          url: "<?= base_url('dashboard/sidemenu') ?>",
          success: (result) => {
              document.getElementById("menu-bar").innerHTML = result;
              document.getElementById("mobile-menu-content").innerHTML = result;
              updateHeights();
              highlightActiveMenu();
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
          if(familyMembersData && familyMembersData.length > 0) {
             currentFamilyActivePage = 1;
             goToFamilyPage(1);
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
    function viewFullImage(imageName, title) {
        let viewImageModal = new bootstrap.Modal(document.getElementById("imageFullViewModal"), {
            backdrop: "static",
            keyboard: false
        });
        document.getElementById("imageFullViewTitle").innerText = title;
        document.getElementById("imageFullViewContent").innerHTML = `<img style="max-width:100%; max-height:80vh; object-fit:contain;" class="img-fluid shadow-lg rounded" src='<?= base_url("documents/view/") ?>/${imageName}'>`;
        viewImageModal.show();
    }
</script>

        <!-- Full Image View Modal -->
        <div id="imageFullViewModal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class='modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered'>
                <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                    <div class="modal-header bg-light border-0 py-3">
                        <h5 class="modal-title fw-bold text-primary" id="imageFullViewTitle">Image View</h5>
                        <button type="button" class="btn-close" data-bs-dismiss='modal' aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0 text-center bg-dark d-flex align-items-center justify-content-center" style="min-height: 400px; max-height: 85vh; overflow: hidden;">
                        <div id="imageFullViewContent" class="w-100 h-100">
                            <!-- Image will be injected here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Image View Modal End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
