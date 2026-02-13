<div id="commonsearch" style="width:58.33%;display:flex;align-items:baseline;justify-content:space-between;" class="ms-4 ps-gray rounded-2 py-1">
    <input onkeyup="commonSearch(this)" type="text" style="outline-style:none;" class="w-75 ps-3 border-0 ps-gray" placeholder="search">
    <span style="cursor:pointer;" class="pe-3">
        <i class="fa-solid fa-magnifying-glass"></i>
    </span>
</div>

<div id="dashboardsubmenu" style="display:flex;align-items:baseline;justify-content:space-evenly;" class="col-md-3">
    <div class="dropdown">
        <button style="outline-style:none;" class="drop-down-toggle border-0 d-flex align-items-center bg-white" data-bs-toggle="dropdown">
            <span class="p-1 px-2 ps-user rounded-circle"><i class="fa-solid fa-user"></i></span>&nbsp;&nbsp;
            <span id="ps-name-line" style="font-weight:500;">
                <?php
                $name = session()->get('Kaadaisoft_userName');
                if ($name) {
                    echo $name;
                } else {
                    echo "Manager Name";
                } ?></span>&nbsp;&nbsp;
            <i class="fa-solid fa-angle-down"></i>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal"><i class="fa-solid fa-key"></i>&nbsp;&nbsp;Change Password</a></li>
            <li><a class="dropdown-item fw-bold" href="<?= base_url('logout') ?>"><i class="fa-solid fa-power-off"></i>&nbsp;&nbsp;Logout</a></li>
        </ul>
    </div>

    <span class="d-flex fa-bell-icon">
        <span><i class="fa-solid fa-bell"></i></span>
        <?php if ((session()->get("role") == 1) || (session()->get("role") == 2)) {
            $pendingcounts = session()->get("pendingcounts");
            if ($pendingcounts > 0) {
                echo "<sup style='background-color:red;color:white;width:30px;height:30px;' class='rounded-circle d-flex align-items-center justify-content-center fw-bold' id='pendingnotifications'>$pendingcounts</sup>";
            }
        } ?>
    </span>
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


 
