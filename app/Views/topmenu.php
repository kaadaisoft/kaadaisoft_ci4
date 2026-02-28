<style>
    #search-bar { padding: 0 !important; background-color: rgb(248, 245, 245) !important; }
    .top-icon-color { color: rgb(0, 123, 255) !important; }

    @media (max-width: 768px) {
        .topmenu-wrapper {
            flex-wrap: wrap !important;
            padding: 10px 15px !important;
            justify-content: center !important;
        }
        #commonsearch {
            width: 100% !important;
            order: 2 !important;
            margin-top: 15px !important;
        }
        .topmenu-right {
            width: 100% !important;
            justify-content: center !important;
            order: 1 !important;
            margin-bottom: 5px !important;
        }
        #dashboardsubmenu {
            gap: 25px !important;
            width: auto !important;
            justify-content: center !important;
        }
        .top-menu-dropdown {
            border-left: none !important;
            padding-left: 0 !important;
            margin-left: 0 !important;
        }
        .mobile-ms-0 { margin-left: 0 !important; }
    }
</style>
<div style="width: 100%; display: flex; align-items: center; justify-content: space-between;" class="topmenu-wrapper ps-gray m-0 py-3 px-4">
    <div class="flex-grow-1 d-none d-md-block"></div>
    <div id="commonsearch" style="width:30%;display:flex;align-items:center;justify-content:space-between;" class="bg-white rounded-3 py-2 px-2 shadow-sm">
        <input onkeyup="commonSearch(this)" type="text" style="outline-style:none;" class="w-100 ps-3 border-0 bg-white" placeholder="search">
        <span style="cursor:pointer;" class="pe-3">
            <i class="fa-solid fa-magnifying-glass top-icon-color"></i>
        </span>
    </div>
    <div class="topmenu-right flex-grow-1 d-flex justify-content-end align-items-center">
        <div id="dashboardsubmenu" style="display:flex;align-items:center;justify-content:flex-end; gap: 20px;" class="col-md-9 pe-2">
            
            <?php if ((session()->get("role") == 1) || (session()->get("role") == 2)): ?>
                <!-- Tasks: Update Requests -->
                <a href="<?= base_url('view-member-update-requests') ?>" class="text-decoration-none d-flex fa-bell-icon position-relative" title="Update Requests">
                    <span><i class="fa-solid fa-user-pen fs-5 top-icon-color"></i></span>
                    <?php
                    $updaterequestcounts = session()->get("updaterequestcounts");
                    if ($updaterequestcounts > 0) {
                        echo "<sup style='background-color:orange;color:white;width:18px;height:18px;font-size:10px;top: -5px;right: -10px;' class='rounded-circle position-absolute d-flex align-items-center justify-content-center fw-bold'>$updaterequestcounts</sup>";
                    }
                    ?>
                </a>
                
                <!-- Tasks: Approvals -->
                <a href="<?= base_url('viewreceivedapplications') ?>" class="text-decoration-none d-flex fa-bell-icon position-relative ms-4 mobile-ms-0" title="Approvals">
                    <span><i class="fa-solid fa-bell fs-5 top-icon-color"></i></span>
                    <?php
                    $pendingcounts = session()->get("pendingcounts");
                    if ($pendingcounts > 0) {
                        echo "<sup style='background-color:red;color:white;width:18px;height:18px;font-size:10px;top: -5px;right: -10px;' class='rounded-circle position-absolute d-flex align-items-center justify-content-center fw-bold' id='pendingnotifications'>$pendingcounts</sup>";
                    }
                    ?>
                </a>
            <?php endif; ?>

            <div class="dropdown ms-4 pl-3 border-start top-menu-dropdown">
                <button style="outline-style:none;" class="drop-down-toggle border-0 d-flex align-items-center bg-transparent shadow-none ms-2" data-bs-toggle="dropdown">
                    <span class="p-1 px-2 ps-user rounded-circle"><i class="fa-solid fa-user top-icon-color"></i></span>&nbsp;&nbsp;
                    <span id="ps-name-line" style="font-weight:500;" class="top-icon-color">
                        <?php
                        $name = session()->get('Kaadaisoft_userName');
                        if ($name) {
                            echo $name;
                        } else {
                            echo "Manager Name";
                        } ?></span>&nbsp;&nbsp;
                    <i class="fa-solid fa-angle-down top-icon-color"></i>
                </button>
                <ul class="dropdown-menu border-0 shadow-sm rounded-3 mt-2">
                    <li><a class="dropdown-item py-2" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal"><i class="fa-solid fa-key me-2"></i>Change Password</a></li>
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


 
