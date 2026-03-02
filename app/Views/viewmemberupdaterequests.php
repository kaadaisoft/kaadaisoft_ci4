<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Update Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .ps-logo {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ps-gray {
            background-color: rgb(248, 245, 245);
        }

        .table-btn {
            background-color: rgb(239, 236, 236);
            position: relative;
        }

        .active-bg {
            background-color: rgb(230, 230, 230);
        }

        .heading-kaadaisoft {
            color: rgb(0, 123, 255);
            font-weight: 800;
            font-family: sans-serif;
        }

        .ps-letter {
            background-color: rgb(0, 123, 255);
        }

        .ps-user {
            background-color: rgb(254, 213, 163);
            ;
        }

        .align {
            align-self: self-end;
        }

        .fa-magnifying-glass {
            color: gray;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, auto));
            gap: 20px;
        }

        .card-round {
            border-radius: 20px;
        }

        ul>li {
            cursor: pointer;
        }

        .card1 {
            background-color: rgb(88, 194, 255);
        }

        .card2 {
            background-color: rgb(233, 153, 3);
        }

        .card3 {
            background-color: rgb(124, 9, 232);
        }

        .card4 {
            background-color: rgb(35, 154, 43);
        }

        .ps-add-btn {
            border: none;
            outline: none;
            background-color: rgb(23, 23, 184);
            border-radius: 25px;
        }

    /* Hide default menu bar on mobile */
    @media screen and (max-width: 768px) {
        #menu-bar {
            display: none;
        }
    }

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
      align-items: stretch;
      margin: 0;
    }
    .main-body-row {
      flex-grow: 1;
      display: flex;
      overflow: hidden;
      margin: 0;
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

    @media screen and (max-width: 768px) {
      .top-navbar-row { height: auto; flex-direction: column; }
      .main-body-row { flex-direction: column; }
      #menu-bar { display: none; }
      .main-content-area { width: 100% !important; }
    }

    .active-updaterequests {
        background-color: rgba(56, 189, 248, 0.15);
        font-weight: 600;
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
    .close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 30px;
        cursor: pointer;
        color: #cbd5e1;
    }
    #mobile-menu-content {
        padding-top: 60px;
    }

    .green-underline {
        border-bottom: 2px solid #28a745;
        color: #28a745;
        font-weight: 600;
        display: inline-block;
    }

    .old-value {
        color: #dc3545;
        text-decoration: line-through;
        font-size: 0.85em;
        opacity: 0.8;
    }
    </style>
</head>

<body>

    <div id="pageheight" class="container-fluid layout-container p-0">
        <?= view('notification_toast') ?>

        <div class="top-navbar-row"><!-----top-bar--------------->

            <div id="ps-logo" class="col-md-2 border-bottom py-3 d-flex align-items-center justify-content-center" style="background: #0f172a;">
            </div>

            <div id="search-bar" class="col-md-10 d-flex align-items-center justify-content-between border-bottom px-4" style="background: #0f172a;">
            </div>

        </div><!-----------top-bar-end----------------------->


        <div class="main-body-row"><!----------main-navbar----------->

            <div id="menu-bar" class="col-md-2"><!----------side-bar-------------------->
            </div><!-----------side-bar-end-------------->

            <div id="main-content-area" class="col-md-10 main-content-area py-4 px-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('admindashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Member Update Requests</li>
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
                            <?php if (!empty($requests)): ?>
                                <?php foreach ($requests as $index => $req): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td class="fw-bold"><?= $req->MemberName ?></td>
                                        <td><?= $req->Familymembershipid ?></td>
                                        <td><?= date('d-M-Y H:i', strtotime($req->created_at)) ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm table-btn rounded-circle"
                                                onclick='viewRequest(<?= json_encode($req) ?>)' title="View Diff">
                                                <i class="fa-solid fa-eye text-primary"></i>
                                            </button>
                                            <form action="<?= base_url('approve-member-update') ?>" method="POST"
                                                class="d-inline" onsubmit="return confirm('Are you sure you want to approve this member update?')">
                                                <input type="hidden" name="request_id" value="<?= $req->id ?>">
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-success border-0 rounded-circle ms-2"
                                                    title="Approve">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            </form>
                                            <form action="<?= base_url('reject-member-update') ?>" method="POST"
                                                class="d-inline" onsubmit="return confirm('Are you sure you want to reject this member update?')">
                                                <input type="hidden" name="request_id" value="<?= $req->id ?>">
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger border-0 rounded-circle ms-2"
                                                    title="Reject">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">No pending update requests found.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Global Scripts added at appropriate place -->
        <script>
            // Global Mobile Menu Functions
            function openMobileMenu() {
                var menu = document.getElementById('custom-mobile-menu');
                if (menu) menu.style.display = 'block';
            }

            function closeMobileMenu() {
                var menu = document.getElementById('custom-mobile-menu');
                if (menu) menu.style.display = 'none';
            }

            $(document).ready(function () {
                // Load components via AJAX to ensure consistency
                $.ajax({
                    type: "get",
                    url: "<?= base_url('dashboard/pslogo') ?>",
                    success: (result) => {
                        var logoArea = document.getElementById("ps-logo");
                        if (logoArea) logoArea.innerHTML = result;
                    }
                });

                $.ajax({
                    type: "get",
                    url: "<?= base_url('dashboard/topmenu') ?>",
                    success: (result) => {
                        var searchBar = document.getElementById("search-bar");
                        if (searchBar) searchBar.innerHTML = result;
                    }
                });

                $.ajax({
                    type: "get",
                    url: "<?= base_url('dashboard/sidemenu') ?>",
                    success: (result) => {
                        var menuBar = document.getElementById("menu-bar");
                        var mobileContent = document.getElementById("mobile-menu-content");
                        if (menuBar) menuBar.innerHTML = result;
                        if (mobileContent) mobileContent.innerHTML = result;
                    },
                    error: (error) => {
                        console.error("Error loading menus:", error);
                    }
                });
            });
        </script>
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
                        <strong>Member:</strong> <span id="modal_member_name"></span> (<span
                            id="modal_member_id"></span>)
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
                                <small><i class="fa-solid fa-circle-info"></i> Values with <span
                                        class="green-underline">green underline</span> are the requested
                                    changes.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url('reject-member-update') ?>" method="POST" onsubmit="return confirm('Are you sure you want to reject this member update?')">
                        <input type="hidden" name="request_id" id="reject_request_id">
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                    <form action="<?= base_url('approve-member-update') ?>" method="POST" onsubmit="return confirm('Are you sure you want to approve this member update?')">
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
                    if (newVal) {
                        let cssClass = hasChanged ? "green-underline" : "";
                        displayNew = `<a href="<?= base_url('assets/membersdocuments/') ?>${newVal}" target="_blank" class="${cssClass}">View ${hasChanged ? 'New' : ''} File</a>`;
                    } else {
                        displayNew = "Empty";
                    }

                    if (hasChanged) {
                        if (oldVal && oldVal !== 'N/A') {
                            displayOld = `<div class="mb-1"><a href="<?= base_url('assets/membersdocuments/') ?>${oldVal}" target="_blank" class="old-value">View Old File</a></div>`;
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

            if (html == "") {
                html = "<tr><td colspan='2' class='text-center'>No significant changes found in data.</td></tr>";
            }

            $('#comparison_body').html(html);
            var myModal = new bootstrap.Modal(document.getElementById('compareModal'));
            myModal.show();
        }
    </script>
</body>

</html>
