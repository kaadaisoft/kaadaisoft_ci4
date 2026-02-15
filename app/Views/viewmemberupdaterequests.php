<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Update Requests</title>
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

     .ps-add-btn{
        border:none;
        outline:none;
        background-color:rgb(23, 23, 184);
        border-radius:25px;
      }

      @media screen and (max-width:768px) {
           #menu-bar{
            display:none;
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

    .ham-menu{
        background-color:transparent;
     }

     .green-underline {
        text-decoration: underline;
        text-decoration-color: #198754; /* Success green */
        text-decoration-thickness: 3px;
        color: #198754;
        font-weight: bold;
     }

     .old-value {
        color: #6c757d;
        text-decoration: line-through;
        font-size: 0.9em;
     }
    </style>
</head>
<body>
        
<div id="pageheight" class="container-fluid" style="overflow:hidden;position:absolute;">
<!---------------------status-toasts---------------------->
 <div id='success_toast' style='z-index: 1000; border:4px solid #84fa84; border-radius:10px; position:absolute; top:10%; right:-380px; transition:0.5s; background-color:#129b12;' class='toast hide'>
  <div style="border-radius:10px; background-color:#129b12;" class='toast-header'>
    <strong class='me-auto text-white fs-6'>Success</strong>
    <button type='button' class='btn-close float-end' data-bs-dismiss='toast'></button>
  </div>
  <div id="success_msg" class='toast-body text-white fs-6 py-2'></div>
 </div>

 <div id='error_toast' style='z-index: 1000; border:4px solid #fe5b5b; border-radius:10px; position:absolute; top:10%; right:-380px; transition:0.5s; background-color:#fa3333;' class='toast hide'>
  <div style="background-color:#fa3333;" class='toast-header'>
    <strong class='me-auto text-white fs-6'>Error</strong>
    <button type='button' class='btn-close float-end' data-bs-dismiss='toast'></button>
  </div>
  <div id="error_msg" class='toast-body text-white fs-6 py-2'></div>
 </div>

<?php 
if(session()->get("approvedsuccess")){
    $msg = session()->get("approvedsuccess");
    echo "<script>
        $(document).ready(function() {
            $('#success_msg').text('$msg');
            $('#success_toast').removeClass('hide').addClass('show');
            $('#success_toast').css('right', '50px');
            setTimeout(() => { $('#success_toast').css('right', '-380px'); }, 3000);
        });
    </script>";
    session()->remove("approvedsuccess");
}
if(session()->get("approvederror")){
    $msg = session()->get("approvederror");
    echo "<script>
        $(document).ready(function() {
            $('#error_msg').text('$msg');
            $('#error_toast').removeClass('hide').addClass('show');
            $('#error_toast').css('right', '50px');
            setTimeout(() => { $('#error_toast').css('right', '-380px'); }, 3000);
        });
    </script>";
    session()->remove("approvederror");
}
if(session()->get("rejectedsuccess")){
    $msg = session()->get("rejectedsuccess");
    echo "<script>
        $(document).ready(function() {
            $('#success_msg').text('$msg');
            $('#success_toast').removeClass('hide').addClass('show');
            $('#success_toast').css('right', '50px');
            setTimeout(() => { $('#success_toast').css('right', '-380px'); }, 3000);
        });
    </script>";
    session()->remove("rejectedsuccess");
}
?>

<script>
    // Global Mobile Menu Functions (defined early to avoid ReferenceError)
    function openMobileMenu() {
        var menu = document.getElementById('custom-mobile-menu');
        if (menu) menu.style.display = 'block';
    }

    function closeMobileMenu() {
        var menu = document.getElementById('custom-mobile-menu');
        if (menu) menu.style.display = 'none';
    }

    $(document).ready(function() {
        // Initial height set
        function updateMenuBarHeight() {
            var menuBar = document.getElementById("menu-bar");
            var searchBar = document.getElementById("search-bar");
            if (menuBar && searchBar) {
                menuBar.style.height = (window.innerHeight - searchBar.getBoundingClientRect().height) + "px";
            }
        }

        updateMenuBarHeight();

        window.addEventListener("resize", () => {
            updateMenuBarHeight();
        });

        // Load Sidebar content into mobile menu
        $.ajax({
            type: "get",
            url: "<?= base_url('dashboard/sidemenu') ?>",
            success: (result) => {
                var mobileContent = document.getElementById("mobile-menu-content");
                if (mobileContent) mobileContent.innerHTML = result;
            },
            error: (error) => {
                console.error("Error loading mobile menu:", error);
            }
        });
    });
</script>

      <div class="row">
         <div class="col-md-2 border-bottom ps-gray py-3 ps-logo">
             <?= view('pslogo'); ?>
         </div>
         <div id="search-bar" class="col-md-10 border-bottom d-flex align-items-center justify-content-between px-4">
             <span class="h4 mb-0">Member Update Requests</span>
             <?= view('topmenu'); ?>
         </div>
      </div>

      <div class="row" style="height: calc(100vh - 72px);">
        <div id="menu-bar" style="height:inherit;" class="col-md-2 ps-gray border-end">
            <?= view('sidemenu'); ?>
        </div>
            
        <div class="col-md-10 py-4 px-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?=base_url('admindashboard')?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Requests</li>
                  </ol>
                </nav>
            </div>
         
            <div style="overflow:auto; height: 75vh;" class="bg-white rounded shadow-sm">
                <table class="table table-hover mb-0">
                    <thead class="ps-gray sticky-top">
                        <tr>
                            <th>S.No</th>
                            <th>Member Name</th>
                            <th>Member ID</th>
                            <th>Request Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($requests)): ?>
                            <?php foreach($requests as $index => $req): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td class="fw-bold"><?= $req->MemberName ?></td>
                                    <td><?= $req->Familymembershipid ?></td>
                                    <td><?= date('d-M-Y H:i', strtotime($req->created_at)) ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm table-btn rounded-circle" 
                                                onclick='viewRequest(<?= json_encode($req) ?>)' 
                                                title="View Diff">
                                            <i class="fa-solid fa-eye text-primary"></i>
                                        </button>
                                        <form action="<?= base_url('approveMemberUpdate') ?>" method="POST" class="d-inline">
                                            <input type="hidden" name="request_id" value="<?= $req->id ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-success border-0 rounded-circle ms-2" title="Approve">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </form>
                                        <form action="<?= base_url('rejectMemberUpdate') ?>" method="POST" class="d-inline">
                                            <input type="hidden" name="request_id" value="<?= $req->id ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-danger border-0 rounded-circle ms-2" title="Reject">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">No pending update requests found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
</div>

<!-- View Comparison Modal -->
<div class="modal fade" id="compareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Review Member Update Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <strong>Member:</strong> <span id="modal_member_name"></span> (<span id="modal_member_id"></span>)
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead class="ps-gray">
                                <tr>
                                    <th>Field</th>
                                    <th>New Value</th>
                                </tr>
                            </thead>
                            <tbody id="comparison_body">
                                <!-- Populated via JS -->
                            </tbody>
                        </table>
                        <div class="alert alert-info py-2">
                             <small><i class="fa-solid fa-circle-info"></i> Values with <span class="green-underline">green underline</span> are the requested changes.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form action="<?= base_url('rejectMemberUpdate') ?>" method="POST">
                    <input type="hidden" name="request_id" id="reject_request_id">
                    <button type="submit" class="btn btn-danger">Reject</button>
                </form>
                <form action="<?= base_url('approveMemberUpdate') ?>" method="POST">
                    <input type="hidden" name="request_id" id="approve_request_id">
                    <button type="submit" class="btn btn-success">Approve Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!---------------------Custom Mobile Menu-------------------------->
<div id="custom-mobile-menu">
    <div class="close-btn" onclick="closeMobileMenu()">&times;</div>
    <div id="mobile-menu-content">
        <!-- Content loaded via JS -->
    </div>
</div>
<!---------------------Custom Mobile Menu End-------------------------------->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


<script>
function viewRequest(req) {
    $('#modal_member_name').text(req.MemberName);
    $('#modal_member_id').text(req.Familymembershipid);
    $('#approve_request_id').val(req.id);
    $('#reject_request_id').val(req.id);
    
    let updatedData = JSON.parse(req.updated_data);
    let html = "";
    
    // Sort keys for better readability
    let keys = Object.keys(updatedData).sort();
    
    for (let key of keys) {
        let newVal = updatedData[key];
        let oldVal = req['old_' + key] || 'N/A';
        
        // Skip utility fields
        if (['updated_at', 'Id', 'Approvedstatus', 'Coordinator_id', 'state_id', 'Id_forwhoapproved', 'Id_who_assign_coord', 'Approved_by', 'RejectReason', 'isShow', 'Role'].includes(key)) continue;

        let hasChanged = (newVal != oldVal);
        let displayNew = newVal;
        let displayOld = "";

        // Format Image/File fields
        if (key.toLowerCase().includes('image') || key.toLowerCase().includes('certificate')) {
             if(newVal) {
                 let cssClass = hasChanged ? "green-underline" : "";
                 displayNew = `<a href="<?=base_url('assets/membersdocuments/')?>${newVal}" target="_blank" class="${cssClass}">View ${hasChanged ? 'New' : ''} File</a>`;
             } else {
                 displayNew = "Empty";
             }
             
             if(hasChanged) {
                 if(oldVal && oldVal !== 'N/A') {
                     displayOld = `<div class="mb-1"><a href="<?=base_url('assets/membersdocuments/')?>${oldVal}" target="_blank" class="old-value">View Old File</a></div>`;
                 } else {
                     displayOld = `<div class="mb-1 text-muted small">Previously: Empty</div>`;
                 }
             }
        } else {
            // Text fields
            if (hasChanged) {
                displayNew = `<span class="green-underline">${newVal}</span>`;
                displayOld = `<div class="mb-1"><span class="old-value">${oldVal}</span></div>`;
            } else {
                displayNew = `<span>${newVal}</span>`;
            }
        }

        html += `<tr>
            <td class="fw-bold ps-gray" style="width: 30%;">${key}</td>
            <td>
                <div class="d-flex flex-column">
                    ${displayOld}
                    <div>${displayNew}</div>
                </div>
            </td>
        </tr>`;
    }
    
    if(html == "") {
        html = "<tr><td colspan='2' class='text-center'>No significant changes found in data.</td></tr>";
    }
    
    $('#comparison_body').html(html);
    var myModal = new bootstrap.Modal(document.getElementById('compareModal'));
    myModal.show();
}
</script>
</body>
</html>

