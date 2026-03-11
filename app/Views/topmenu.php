<style>
    #search-bar { padding: 0 !important; background-color: #0f172a !important; border-bottom: none !important; }
    #ps-logo { background-color: #0f172a !important; border-bottom: none !important; }
    .topmenu-wrapper { background-color: #0f172a !important; }

    /* Perfect Dark Theme Support */
    #commonsearch { background-color: #1e293b !important; border-color: #334155 !important; }
    #commonsearch input { background-color: transparent !important; color: #f8fafc !important; }
    #commonsearch input::placeholder { color: #94a3b8 !important; }
    
    .search-icon-color { color: #94a3b8 !important; }
    
    /* Top Icons aligned with Side Menu Colors */
    .update-req-icon { color: #fb923c !important; transition: 0.3s; } /* Light Orange */
    .approval-icon { color: #f87171 !important; transition: 0.3s; } /* Light Red */
    .icon-hover:hover { transform: scale(1.1); }
    
    .profile-circle { background-color: rgba(56, 189, 248, 0.1) !important; color: #38bdf8 !important; width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; }
    .profile-text { color: #cbd5e1 !important; font-weight: 600 !important; font-size: 0.95rem; }
    .dropdown-arrow { color: #cbd5e1 !important; font-size: 0.8rem; transition: 0.3s; }
    .drop-down-toggle:hover .dropdown-arrow { color: #ffffff !important; transform: translateY(2px); }

    @media (max-width: 768px) {
        .topmenu-wrapper {
            flex-wrap: wrap !important;
            padding: 5px 10px !important;
            justify-content: space-between !important;
            background-color: #0f172a !important; /* Ensure background consistency */
        }
        #commonsearch {
            width: 100% !important;
            order: 2 !important;
            margin-top: 8px !important;
            height: 40px;
        }
        .topmenu-right {
            width: 100% !important;
            justify-content: flex-end !important;
            order: 1 !important;
            margin-bottom: 2px !important;
        }
        #dashboardsubmenu {
            gap: 15px !important; 
            width: 100% !important;
            justify-content: flex-end !important;
            padding-right: 2px !important;
        }
        .top-menu-dropdown {
            border-left: none !important;
            padding-left: 0 !important;
            margin-left: 5px !important;
        }
        .profile-circle { width: 30px; height: 30px; }
        .mobile-ms-0 { margin-left: 0 !important; }
        #ps-name-line { font-size: 0.8rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px; }
        .dropdown-arrow { font-size: 0.7rem !important; }
    }
</style>
<div style="width: 100%; display: flex; align-items: center; justify-content: space-between;" class="topmenu-wrapper m-0 py-3 px-4 shadow-sm">
    <div class="flex-grow-1 d-none d-md-block"></div>
    <div id="commonsearch" style="width:30%;display:flex;align-items:center;justify-content:space-between;" class="rounded-3 py-2 px-2 shadow-sm border border-secondary">
        <input onkeyup="commonSearch(this)" type="text" style="outline-style:none;" class="w-100 ps-3 border-0" placeholder="Search...">
        <span style="cursor:pointer;" class="pe-3">
            <i class="fa-solid fa-magnifying-glass search-icon-color"></i>
        </span>
    </div>
    <div class="topmenu-right flex-grow-1 d-flex justify-content-end align-items-center">
        <div id="dashboardsubmenu" style="display:flex;align-items:center;justify-content:flex-end; gap: 20px;" class="col-md-9 pe-2">
            
            <?php if ((session()->get("role") == 1) || (session()->get("role") == 2)): ?>
                <!-- Tasks: Update Requests -->
                <a href="<?= base_url('view-member-update-requests') ?>" class="text-decoration-none d-flex position-relative icon-hover" title="Update Requests">
                    <span><i class="fa-solid fa-user-pen fs-5 update-req-icon"></i></span>
                    <?php
                    $updaterequestcounts = session()->get("updaterequestcounts");
                    if ($updaterequestcounts > 0) {
                        echo "<sup style='background-color:#fd7e14;color:white;width:18px;height:18px;font-size:10px;top: -5px;right: -10px; border: 2px solid white;' class='rounded-circle position-absolute d-flex align-items-center justify-content-center fw-bold'>$updaterequestcounts</sup>";
                    }
                    ?>
                </a>
                
                <!-- Tasks: Approvals -->
                <a href="<?= base_url('viewreceivedapplications') ?>" class="text-decoration-none d-flex position-relative ms-3 mobile-ms-0 icon-hover" title="Approvals">
                    <span><i class="fa-solid fa-bell fs-5 approval-icon"></i></span>
                    <?php
                    $pendingcounts = session()->get("pendingcounts");
                    if ($pendingcounts > 0) {
                        echo "<sup style='background-color:#dc3545;color:white;width:18px;height:18px;font-size:10px;top: -5px;right: -10px; border: 2px solid white;' class='rounded-circle position-absolute d-flex align-items-center justify-content-center fw-bold' id='pendingnotifications'>$pendingcounts</sup>";
                    }
                    ?>
                </a>
            <?php endif; ?>

            <div class="dropdown ms-4 pl-3 border-start border-secondary top-menu-dropdown">
                <button style="outline-style:none;" class="drop-down-toggle border-0 d-flex align-items-center bg-transparent shadow-none ms-2" data-bs-toggle="dropdown">
                    <span class="profile-circle rounded-circle"><i class="fa-solid fa-user"></i></span>&nbsp;&nbsp;
                    <span id="ps-name-line" class="profile-text">
                        <?php
                        $name = session()->get('Kaadaisoft_userName');
                        if ($name) {
                            echo htmlspecialchars($name);
                        } else {
                            echo "Manager";
                        } ?></span>&nbsp;&nbsp;
                    <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-3 mt-2">
                    <li><a class="dropdown-item py-2 fw-bold text-secondary" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal"><i class="fa-solid fa-key me-2 text-primary"></i>Change Password</a></li>
                    <li class="border-top mb-1"></li>
                    <li><a class="dropdown-item fw-bold text-danger py-2" href="<?= base_url('logout') ?>"><i class="fa-solid fa-power-off me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="changePasswordForm" method="post" action="<?= base_url('change_password') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="userId" name="userId" hidden value="<?= session()->get('Kaadaisoft_userId') ?>">
                    <div class="mb-3">
                        <div>
                            <label for="current_password" style="width:fit-content;" class="form-label">Current Password</label>
                            <span style="width:fit-content;cursor: pointer;" onclick="togglePasswordIcon()" class="float-end" id="togglePassword">
                                <i class="bi bi-eye-slash" id="togglePasswordIcon"></i>
                            </span>
                        </div>
                        <input type="password" id="current_password" class="form-control" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="new_password" minlength="8" maxlength="12" pattern=".{8,,12}" title="Password must be minimum 8 characters" required>
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" minlength="8" maxlength="12" pattern=".{8,12}" title="Password must be minimum 8 characters" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </div>
        </form>
    </div>
</div>


 
