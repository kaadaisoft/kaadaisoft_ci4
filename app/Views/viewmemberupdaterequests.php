<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Update Requests</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

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
      flex-wrap: wrap;
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
      cursor: pointer;
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
      width: 36px;
      height: 36px;
      border: none;
      background: #f1f5f9;
      color: #475569;
      border-radius: 10px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
      margin: 0 4px;
    }
    .btn-action-premium:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      color: #fff;
    }
    .btn-view-premium { background: #eff6ff; color: #2563eb; }
    .btn-view-premium:hover { background: #2563eb; }
    .btn-approve-premium { background: #f0fdf4; color: #16a34a; }
    .btn-approve-premium:hover { background: #16a34a; }
    .btn-reject-premium { background: #fef2f2; color: #dc2626; }
    .btn-reject-premium:hover { background: #dc2626; }

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
    </style>
</head>

<body>

    <div id="pageheight" class="container-fluid layout-container p-0">
        <?= view('notification_toast') ?>

        <div class="top-navbar-row" style="flex-wrap: wrap;"><!-----top-bar--------------->

            <div id="ps-logo" class="col-12 col-md-2 border-bottom border-md-0 py-2 py-md-3 d-flex align-items-center justify-content-start ps-2" style="background: #0f172a;">
            </div>

            <div id="search-bar" class="col-12 col-md-10 d-flex align-items-center justify-content-between border-bottom border-md-0 px-4" style="background: #0f172a;">
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

                <div class="table-container-premium">
                    <table class="custom-table-premium">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Member Name</th>
                                <th>Member ID</th>
                                <th>District</th>
                                <th>Taluk</th>
                                <th>Panchayat</th>
                                <th>Village</th>
                                <th>Request Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="requests_body">
                            <!-- JS Rendered -->
                        </tbody>
                    </table>
                </div>
                <div class='d-flex justify-content-center container-fluid mt-3'>
                    <div id="requestsPagination" class="col-md-6 py-2 d-flex justify-content-around align-items-center"></div>
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
                        highlightActiveMenu();
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
                    <form id="approveUpdateForm" action="<?= base_url('approve-member-update') ?>" method="POST" class="me-2">
                        <input type="hidden" name="request_id" id="approve_request_id">
                        <button type="button" class="btn btn-success" onclick="psConfirm('Are you sure you want to approve this member update?', () => document.getElementById('approveUpdateForm').submit(), 'Approve', 'success')">Approve Update</button>
                    </form>
                    <form id="rejectUpdateForm" action="<?= base_url('reject-member-update') ?>" method="POST">
                        <input type="hidden" name="request_id" id="reject_request_id">
                        <button type="button" class="btn btn-danger" onclick="psConfirm('Are you sure you want to reject this member update?', () => document.getElementById('rejectUpdateForm').submit(), 'Reject', 'danger')">Reject</button>
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
        let requestsData = [];
        <?php if (!empty($requests)): ?>
            requestsData = <?= json_encode($requests) ?> || [];
        <?php endif; ?>

        const reqItemsPerPage = 10;
        let currentReqPage = 1;

        function formatDate(dateStr) {
            let options = { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit', hour12: false };
            let d = new Date(dateStr);
            if (isNaN(d)) return dateStr;
            return d.toLocaleDateString('en-GB', options).replace(',', '');
        }

        function renderRequests(data, startIndex) {
            let html = "";
            let i = startIndex + 1;

            if (data.length === 0) {
                document.getElementById("requests_body").innerHTML = `<tr><td colspan="9" class="text-center py-5 text-muted">No pending update requests found.</td></tr>`;
                return;
            }

            data.forEach(req => {
                let encodedReq = JSON.stringify(req).replace(/'/g, "&#39;");
                let dateDisplay = formatDate(req.created_at);
                
                html += `
                    <tr onclick='viewRequest(${encodedReq})'>
                        <td class="fw-bold text-muted">${i}</td>
                        <td class="fw-semibold text-primary">${req.MemberName}</td>
                        <td><span class="badge bg-light text-dark border">${req.Familymembershipid}</span></td>
                        <td class="text-secondary">${req.old_District || '-'}</td>
                        <td class="text-secondary">${req.old_Taluk || '-'}</td>
                        <td class="text-secondary">${req.old_Panchayat || '-'}</td>
                        <td class="text-secondary">${req.old_Village || '-'}</td>
                        <td class="text-secondary">${dateDisplay}</td>
                        <td class="text-center" onclick="event.stopPropagation();">
                            <button class="btn-action-premium btn-view-premium"
                                onclick='viewRequest(${encodedReq})' title="View Diff">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <form action="<?= base_url('approve-member-update') ?>" method="POST"
                                class="d-inline" id="approveForm_${req.id}">
                                <input type="hidden" name="request_id" value="${req.id}">
                                <button type="button" class="btn-action-premium btn-approve-premium" title="Approve"
                                    onclick="psConfirm('Approve update for ${req.MemberName}?', () => this.closest(\'form\').submit(), \'Approve\', \'success\')">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </form>
                            <form action="<?= base_url('reject-member-update') ?>" method="POST"
                                class="d-inline">
                                <input type="hidden" name="request_id" value="${req.id}">
                                <button type="button" class="btn-action-premium btn-reject-premium" title="Reject"
                                    onclick="psConfirm('Reject update for ${req.MemberName}?', () => this.closest(\'form\').submit(), \'Reject\', \'danger\')">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                `;
                i++;
            });

            document.getElementById("requests_body").innerHTML = html;
        }

        function renderReqPagination(totalItems, currentPage) {
            let html = "";
            let pgCon = document.getElementById("requestsPagination");
            if (!totalItems || totalItems <= 0) {
                if (pgCon) pgCon.innerHTML = "";
                return;
            }
            
            const totalPages = Math.ceil(totalItems / reqItemsPerPage);
            
            html += `<div class="d-flex flex-column align-items-center"><div class="d-flex justify-content-center align-items-center gap-2 mt-2">`;

            html += `<button class="pagination-btn ${currentPage === 1 ? 'disabled' : ''}" 
                        onclick="goToReqPage(${currentPage - 1})" 
                        ${currentPage === 1 ? 'disabled' : ''}>
                        <i class="fa-solid fa-chevron-left"></i>
                     </button>`;

            for (let i = 1; i <= totalPages; i++) {
                if (totalPages <= 7 || i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                    html += `<button class="pagination-btn ${i === currentPage ? 'active' : ''}" 
                                onclick="goToReqPage(${i})">${i}</button>`;
                } else if (i === currentPage - 2 || i === currentPage + 2) {
                    html += `<span class="pagination-ellipsis">...</span>`;
                }
            }

            html += `<button class="pagination-btn ${currentPage === totalPages ? 'disabled' : ''}" 
                        onclick="goToReqPage(${currentPage + 1})"
                        ${currentPage === totalPages ? 'disabled' : ''}>
                        <i class="fa-solid fa-chevron-right"></i>
                     </button>`;

            html += `</div>`;
            html += `<div class="text-center mt-2 text-muted small">Showing page ${currentPage} of ${totalPages}</div></div>`;
            
            if (pgCon) pgCon.innerHTML = html;
        }

        function goToReqPage(page) {
            if (!requestsData || requestsData.length === 0) return;
            
            const totalPages = Math.ceil(requestsData.length / reqItemsPerPage);
            if (page < 1) page = 1;
            if (page > totalPages) page = totalPages;
            currentReqPage = page;
            
            let offset = (page - 1) * reqItemsPerPage;
            renderRequests(requestsData.slice(offset, offset + reqItemsPerPage), offset);
            renderReqPagination(requestsData.length, currentReqPage);
        }

        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                goToReqPage(1);
            }, 100);
        });

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

                let hasChanged = (String(newVal || "").trim() !== String(oldVal || "").trim());
                let displayNew = newVal;
                let displayOld = "";

                // Format Image/File fields
                if (key.toLowerCase().includes('image') || key.toLowerCase().includes('certificate')) {
                    if (newVal) {
                        let cssClass = hasChanged ? "green-underline" : "";
                        displayNew = `<a href="<?= base_url('documents/view/') ?>${newVal}" target="_blank" class="${cssClass}">View ${hasChanged ? 'New' : ''} File</a>`;
                    } else {
                        displayNew = "Empty";
                    }

                    if (hasChanged) {
                        if (oldVal && oldVal !== 'N/A') {
                            displayOld = `<div class="mb-1"><a href="<?= base_url('documents/view/') ?>${oldVal}" target="_blank" class="old-value">View Old File</a></div>`;
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
