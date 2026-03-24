<style>
        .section-title {
            border-left: 5px solid #3E2723;
            padding-left: .75rem;
            font-weight: 800;
            color: #1a0f0d !important;
        }

        .mandatory-star {
            color: red;
            font-weight: 500;
        }

        #registration-form label {
            font-size: 0.95rem;
            font-weight: 700;
            color: #000000 !important;
        }

        #registration-form .form-control,
        #registration-form .form-select {
            font-size: 0.9rem;
            background-color: #fff;
            border: 1px solid #ced4da;
            color: #000;
            border-radius: 4px;
        }

        .bg-custom-header {
            background-color: #fff;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .ps-img-btn,
        #membersubmitbutton {
            color: white !important;
            font-weight: 700;
            border: none;
            background: linear-gradient(135deg, #795548 0%, #3E2723 100%);
            padding: 8px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        #membersubmitbutton:disabled {
            background: #ccc;
            cursor: not-allowed;
            box-shadow: none;
        }

        #education_wrapper-update, #education_wrapper-coord, #education_wrapper-member {
            min-height: 38px;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 5px;
        }

        #education_tags-update .badge, #education_tags-coord .badge, #education_tags-member .badge {
            margin-right: 4px;
            margin-bottom: 4px;
            background-color: #3E2723 !important;
            color: #ffffff;
        }

        .education-option:hover {
            background-color: #efebe9;
            cursor: pointer;
        }

        .cursor-pointer {
            cursor: pointer;
        }
    </style>

    <style>
        /* Flowbite-style file input */
        .ps-file-upload-wrapper { position: relative; }
        .ps-file-upload-wrapper input[type="file"] { display: none; }
        .ps-file-upload-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            width: 100%;
            padding: 7px 12px;
            font-size: 13px;
            border: 1.5px solid #ced4da;
            border-radius: 6px;
            background-color: #f8f9fa;
            cursor: pointer;
            color: #6c757d;
            transition: border-color 0.2s, background-color 0.2s;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .ps-file-upload-btn:hover { background-color: #e9ecef; border-color: #86b7fe; }
        .ps-file-upload-btn .ps-file-icon { flex-shrink: 0; font-size: 15px; color: #495057; }
        .ps-file-upload-btn .ps-file-label { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; flex: 1; }
        .ps-file-upload-btn.file-selected { border-color: #0d6efd; background-color: #e7f1ff; color: #0a3d91; font-weight: 500; }
    </style>

    <?php if (isset($member)) : ?>
        <div class="bg-custom-header py-3 px-4 border-bottom shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-dark font-weight-bold">
                    <?php 
                        $is_self = ($member->Familymembershipid == session()->get('Kaadaisoft_userId'));
                        $is_head = ($member->MemberRole == 'Head');
                        if ($is_self) {
                            $icon = 'fa-user-gear';
                            $title = 'Update My Details';
                        } else {
                            $icon = $is_head ? 'fa-user-gear' : 'fa-users';
                            $title = $is_head ? 'Update Member Details' : 'Update Family Member Details';
                        }
                    ?>
                    <i class="fa-solid <?= $icon ?> me-2"></i><?= $title ?>: <small class="text-primary"><?= $member->Familymembershipid ?></small>
                    <?php if(isset($pending_update) && !empty($pending_update)): ?>
                        <span class="badge bg-warning text-dark fs-6 ms-2 px-3 py-1" style="border-radius:50px; font-weight:500;">
                            <i class="fa-solid fa-clock-rotate-left"></i> In Review
                        </span>
                    <?php endif; ?>
                </h4>
                <button onclick="hideupdatememberform()" class="btn btn-close"></button>
            </div>
        </div>

        <form name="memberregistration-update" id="registration-form" class="p-4" onsubmit="return validateMemberForm()" action="<?= base_url("members/updateMember"); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">

            <input hidden value="<?= $member->Familymembershipid ?>" id="membershipid-member" type="text" name="membershipid-update">
            <input hidden value="member" type="text" name="path">
            <input hidden value="updatemember" type="text" name="reason">
            <input hidden value="<?= $member->Existfamilyid ?>" id="existfamilyid-member" type="text" name="existfamilyid-update">


            <!-- Basic Details Section -->
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h5 class="mb-4 section-title">
                        <i class="fa-solid fa-user text-primary me-2"></i>Basic Details
                    </h5>

                    <div class="row g-3">
                        <!-- Relationship -->
                        <div class="col-md-4">
                            <label for="relationship-member">Relationship</label>
                            <select id="relationship-member" class="form-select" name="relationship-update" onchange="validateMemberInput(this); toggleCustomRelationshipMember(this)">
                                <option value="">Select Relationship</option>
                                <option value="Head" <?= ($member->MemberRole == 'Head') ? 'selected' : '' ?>>Head</option>
                                <option value="Grand Father" <?= ($member->MemberRole == 'Grand Father') ? 'selected' : '' ?>>Grand Father</option>
                                <option value="Grand Mother" <?= ($member->MemberRole == 'Grand Mother') ? 'selected' : '' ?>>Grand Mother</option>
                                <option value="Father" <?= ($member->MemberRole == 'Father') ? 'selected' : '' ?>>Father</option>
                                <option value="Mother" <?= ($member->MemberRole == 'Mother') ? 'selected' : '' ?>>Mother</option>
                                <option value="Husband" <?= ($member->MemberRole == 'Husband') ? 'selected' : '' ?>>Husband</option>
                                <option value="Wife" <?= ($member->MemberRole == 'Wife') ? 'selected' : '' ?>>Wife</option>
                                <option value="Son" <?= ($member->MemberRole == 'Son') ? 'selected' : '' ?>>Son</option>
                                <option value="Daughter" <?= ($member->MemberRole == 'Daughter') ? 'selected' : '' ?>>Daughter</option>
                                <option value="Son-in-law" <?= ($member->MemberRole == 'Son-in-law') ? 'selected' : '' ?>>Son-in-law</option>
                                <option value="Daughter-in-law" <?= ($member->MemberRole == 'Daughter-in-law') ? 'selected' : '' ?>>Daughter-in-law</option>
                                <option value="Brother" <?= ($member->MemberRole == 'Brother') ? 'selected' : '' ?>>Brother</option>
                                <option value="Sister" <?= ($member->MemberRole == 'Sister') ? 'selected' : '' ?>>Sister</option>
                                <?php 
                                    $standard_roles = ["Head", "Grand Father", "Grand Mother", "Father", "Mother", "Husband", "Wife", "Son", "Daughter", "Son-in-law", "Daughter-in-law", "Brother", "Sister"];
                                    $is_custom = !in_array($member->MemberRole, $standard_roles) && !empty($member->MemberRole);
                                ?>
                                <option value="Other" <?= $is_custom ? 'selected' : '' ?>>Other</option>
                            </select>
                            <div id="custom_rel_div-member" class="mt-2" style="display:<?= $is_custom ? 'block' : 'none' ?>;">
                                <label for="custom_relationship-member">Specify Relationship</label>
                                <input type="text" id="custom_relationship-member" name="custom_relationship-update" class="form-control" value="<?= $is_custom ? $member->MemberRole : '' ?>" onkeyup="validateMemberInput(this)">
                                <small id="custom_relationshiperror-member" class="text-danger"></small>
                            </div>
                            <small id="relationshiperror-member" class="text-danger"></small>
                        </div>

                        <!-- Upcoming Head -->


                        <!-- Name -->
                        <div class="col-md-4">
                            <label for="name-member">Name</label>
                            <input onkeyup="validateMemberInput(this)" id="name-member" class="form-control" type="text" name="name-update" value="<?= $member->Name ?>">
                            <small id="nameerror-member" class="text-danger"></small>
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-4">
                            <label for="phoneno-member">Phone Number</label>
                            <div class="input-group">
                                <input id="phoneno-member" class="form-control" type="number" name="phoneno-update" value="<?= $member->Phonenumber ?>" onkeyup="validateMemberInput(this)">
                                <button class="btn btn-outline-primary" type="button" id="verify_phone_btn-member" onclick="checkPhoneVerificationMember()" style="display: none;">Verify</button>
                            </div>
                            <small id="phonenoerror-member" class="text-danger"></small>
                            <div id="phone_verified_badge-member" class="mt-1 text-success fw-bold" style="display:<?= (!empty($member->Phonenumber)) ? 'block' : 'none' ?>;">
                                <i class="fa-solid fa-circle-check"></i> Verified
                            </div>
                            <input type="hidden" id="is_phone_verified-member" name="is_phone_verified-update" value="<?= (!empty($member->Phonenumber)) ? '1' : '0' ?>">
                        </div>

                        <!-- Aadhar Number -->
                        <div class="col-md-4">
                            <label for="aadharno-member">Aadhar Number</label>
                            <input id="aadharno-member" onkeyup="validateMemberInput(this)" onkeypress="if(this.value.length == 12) return false" class="form-control" type="number" name="aadharno-update" value="<?= $member->Aadharnumber ?>">
                            <small id="aadharnoerror-member" class="text-danger"></small>
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-md-4">
                            <label for="dob-member">Date Of Birth</label>
                            <input id="dob-member" class="form-control" type="date" name="dob-update" value="<?= $member->Dob ?>" onchange="validateMemberInput(this)">
                            <small id="doberror-member" class="text-danger"></small>
                        </div>

                        <!-- Gender -->
                        <div class="col-md-4">
                            <label class="d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="gender_male-member" name="gender-update" value="Male" <?= ($member->Gender == 'Male') ? 'checked' : '' ?> onchange="validateMemberInput(this)">
                                <label class="form-check-label" for="gender_male-member">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="gender_female-member" name="gender-update" value="Female" <?= ($member->Gender == 'Female') ? 'checked' : '' ?> onchange="validateMemberInput(this)">
                                <label class="form-check-label" for="gender_female-member">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="gender_other-member" name="gender-update" value="Other" <?= ($member->Gender == 'Other') ? 'checked' : '' ?> onchange="validateMemberInput(this)">
                                <label class="form-check-label" for="gender_other-member">Other</label>
                            </div>
                            <div><small id="gendererror-member" class="text-danger"></small></div>
                        </div>

                        <!-- Blood Group -->
                        <div class="col-md-4">
                            <label for="bloodgroup-member">Blood Group</label>
                            <select id="bloodgroup-member" class="form-select" name="bloodgroup-update" onchange="validateMemberInput(this)">
                                <option value="">Select Blood Group</option>
                                <?php $bgroups = ["A+", "A-", "B+", "B-", "O+", "O-", "AB+", "AB-"]; ?>
                                <?php foreach ($bgroups as $bg): ?>
                                    <option value="<?= $bg ?>" <?= ($member->Bloodgroup == $bg) ? 'selected' : '' ?>><?= $bg ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small id="bloodgrouperror-member" class="text-danger"></small>
                        </div>

                        <!-- Email -->
                        <div class="col-md-4">
                            <label for="email-member">Email</label>
                            <div class="input-group">
                                <input id="email-member" onkeyup="validateMemberInput(this)" class="form-control" type="email" name="email-update" value="<?= $member->Email ?>">
                                <button class="btn btn-outline-primary" type="button" id="verify_email_btn-member" onclick="sendUpdateEmailOTP()">Verify</button>
                            </div>
                            <small id="emailerror-member" class="text-danger"></small>
                            
                            <!-- OTP Verification Section -->
                            <div id="otp_section-member" class="mt-2" style="display:none;">
                                <div class="input-group">
                                    <input type="text" id="email_otp-member" class="form-control" placeholder="Enter OTP">
                                    <button class="btn btn-success" type="button" onclick="verifyUpdateEmailOTP()">Confirm</button>
                                </div>
                                <small class="text-muted">OTP sent to your email. Valid for 10 mins.</small>
                                <small id="otperror-member" class="text-danger d-block"></small>
                            </div>
                            
                            <div id="email_verified_badge-member" class="mt-1 text-success fw-bold" style="display:<?= (!empty($member->Email)) ? 'block' : 'none' ?>;">
                                <i class="fa-solid fa-circle-check"></i> Verified
                            </div>
                            <input type="hidden" id="is_email_verified-member" name="is_email_verified-update" value="<?= (!empty($member->Email)) ? '1' : '0' ?>">
                        </div>

                        <!-- WhatsApp Number -->
                        <div class="col-md-4">
                            <label for="whatsappno-member">WhatsApp Number</label>
                            <div class="input-group">
                                <input id="whatsappno-member" class="form-control" type="number" name="whatsappno-update" value="<?= $member->Whatsappnumber ?>" onkeyup="validateMemberInput(this)">
                                <button class="btn btn-outline-secondary" type="button" onclick="copyPhoneToWhatsappMember()">Same as Phone</button>
                            </div>
                            <small id="whatsappnoerror-member" class="text-danger"></small>
                        </div>

                        <!-- Married status -->
                        <div class="col-md-4">
                            <label class="d-block">Married</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="married_yes-member" name="married-update" value="Yes" <?= ($member->Married == 'Yes') ? 'checked' : '' ?> onchange="validateMemberInput(this)">
                                <label class="form-check-label" for="married_yes-member">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="married_no-member" name="married-update" value="No" <?= ($member->Married == 'No') ? 'checked' : '' ?> onchange="validateMemberInput(this)">
                                <label class="form-check-label" for="married_no-member">No</label>
                            </div>
                            <div><small id="marriederror-member" class="text-danger"></small></div>
                        </div>

                        <!-- Alive Status -->
                        <div class="col-md-4">
                            <label class="d-block">Alive Status</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="alive_yes-member" name="is_dead-update" value="0" <?= (!isset($member->is_dead) || $member->is_dead == 0) ? 'checked' : '' ?> onchange="validateMemberInput(this); toggleUpcomingHeadMember()">
                                <label class="form-check-label" for="alive_yes-member">Alive</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="alive_no-member" name="is_dead-update" value="1" <?= (isset($member->is_dead) && $member->is_dead == 1) ? 'checked' : '' ?> onchange="validateMemberInput(this); toggleUpcomingHeadMember()">
                                <label class="form-check-label" for="alive_no-member">Dead</label>
                            </div>
                            <div><small id="alivedeaderror-member" class="text-danger"></small></div>
                        </div>

                        <!-- Upcoming Head (Moved here) -->
                        <div class="col-md-4" id="upcoming_head_div-member" style="display:<?= ($member->MemberRole == 'Head' && isset($member->is_dead) && $member->is_dead == 1) ? 'block' : 'none' ?>;">
                            <label for="upcoming_head-member">Upcoming Head (Select to Transfer) <span class="mandatory-star">*</span></label>
                            <select id="upcoming_head-member" class="form-select" name="upcoming_head-update" onchange="validateMemberInput(this)">
                                <option value="">Select New Head</option>
                                <?php if(isset($family_members)): ?>
                                    <?php foreach($family_members as $fm): ?>
                                        <?php if($fm->Familymembershipid != $member->Familymembershipid && (!isset($fm->is_dead) || $fm->is_dead == 0)): ?>
                                            <option value="<?= $fm->Familymembershipid ?>"><?= $fm->Name ?> (<?= $fm->MemberRole ?>)</option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small id="upcomingheaderror-member" class="text-danger"></small>
                            <small class="text-muted d-block">Selecting a member here will make them the new Family Head.</small>
                        </div>

                        <!-- Valuvu -->
                        <div class="col-md-4">
                            <label for="valuvu-member">Valuvu</label>
                            <input id="valuvu-member" onkeyup="validateMemberInput(this)" class="form-control" type="text" name="valuvu-update" value="<?= $member->Valuvu ?>">
                            <small id="valuvuerror-member" class="text-danger"></small>
                        </div>

                        <!-- Thottam -->
                        <div class="col-md-4">
                            <label for="thottam-member">Thottam</label>
                            <input id="thottam-member" onkeyup="validateMemberInput(this)" class="form-control" type="text" name="thottam-update" value="<?= $member->Thottam ?>">
                            <small id="thottamerror-member" class="text-danger"></small>
                        </div>

                        <!-- Kulam -->
                        <div class="col-md-4">
                            <label for="kulam-member">Kulam</label>
                            <select id="kulam-member" class="form-select" name="kulam-update">
                                <option value="Poondurai Kaadai" <?= ($member->Kulam == 'Poondurai Kaadai') ? 'selected' : '' ?>>Poondurai Kaadai</option>
                                <?php 
                                    $kulams = ["Aanthuvan Kulam", "Azhagu Kulam", "Aathe Kulam", "Aanthai Kulam", "Aadar Kulam", "Aavan Kulam", "Eenjan Kulam", "Ozukkar Kulam", "Oothaalar Kulam", "Kannakkan Kulam", "Kannan Kulam", "Kannaanthai Kulam", "Kaadai Kulam", "Kaari Kulam", "Keeran Kulam", "Kuzhlaayan Kulam", "Koorai Kulam", "Koovendhar Kulam", "Saathanthai Kulam", "Sellan Kulam", "Semban Kulam", "Sengkannan Kulam", "Sembuthan Kulam", "Senkunnier Kulam", "Sevvaayar Kulam", "Cheran Kulam", "Chedan Kulam", "Dananjayan Kulam", "Thazhinji Kulam", "Thooran Kulam", "Devendran Kulam", "Thoodar Kulam", "Neerunniyar Kulam", "Pavazhalar Kulam", "Panayan Kulam", "Pathuman Kulam", "Payiran Kulam", "Panagkaadar Kulam", "Pathariar Kulam", "Pandiyan Kulam", "Pillar Kulam", "Poosan Kulam", "Poochanthai Kulam", "Periyan Kulam", "Perunkudiyaan Kulam", "Porulaanthai Kulam", "Ponnar Kulam", "Maniyan Kulam", "Mayilar Kulam", "Maadar Kulam", "Mutthan Kulam", "Muzhukathan Kulam", "Medhi Kulam", "Vannakkan Kulam", "Villiyar Kulam", "Vilayan Kulam", "Vizhiyar Kulam", "Venduvan Kulam", "Vennag Kulam", "Vellampar Kulam"];
                                    foreach($kulams as $k) {
                                        echo "<option value='$k' ".($member->Kulam == $k ? 'selected' : '').">$k</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Occupation Details -->
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h5 class="mb-4 section-title">
                        <i class="fa-solid fa-briefcase text-primary me-2"></i>Education & Career Details
                    </h5>
                    <div class="row g-3">
                        <!-- Education -->
                        <div class="col-md-4" style="position: relative;">
                            <label for="education_input-member">Education <span class="text-danger">*</span></label>
                            
                            <div class="border rounded p-1 bg-white d-flex align-items-center flex-wrap gap-1" id="education_wrapper-member" style="cursor: text; min-height: 38px;">
                                <!-- Tags Container -->
                                <div id="education_tags-member" class="d-flex flex-wrap gap-1"></div>

                                <input type="text" id="education_input-member" 
                                    class="form-control form-control-sm border-0 bg-transparent shadow-none" 
                                    placeholder="Type or select education"
                                    onfocus="filterEducationOptionsMember(this)"
                                    oninput="filterEducationOptionsMember(this)"
                                    onclick="filterEducationOptionsMember(this)"
                                    name="education_display"
                                    autocomplete="off"
                                    style="flex: 1; min-width: 120px;">
                                <input type="hidden" id="educationfield-member" name="education-update" value="<?= esc($member->Education) ?>">
                            </div>

                            <div class="border rounded mt-1 bg-white shadow-sm" id="education_dropdown-member"
                                style="max-height:250px; overflow:auto; display:none; position:absolute; z-index:1001; width: calc(100% - 1.5rem); left: 0.75rem;">
                                
                                <div class="education-option" data-value="SSLC">SSLC</div>
                                <div class="education-option" data-value="HSC">HSC</div>
                                <div class="education-option" data-value="Diploma">Diploma</div>
                                <div class="education-option" data-value="ITI">ITI</div>
                                
                                <div class="education-option" data-value="B.A">B.A</div>
                                <div class="education-option" data-value="B.Sc">B.Sc</div>
                                <div class="education-option" data-value="B.Com">B.Com</div>
                                <div class="education-option" data-value="BBA">BBA</div>
                                <div class="education-option" data-value="BCA">BCA</div>
                                <div class="education-option" data-value="B.E">B.E</div>
                                <div class="education-option" data-value="B.Tech">B.Tech</div>
                                <div class="education-option" data-value="MBBS">MBBS</div>
                                <div class="education-option" data-value="BDS">BDS</div>
                                <div class="education-option" data-value="B.Pharm">B.Pharm</div>
                                <div class="education-option" data-value="B.Ed">B.Ed</div>
                                <div class="education-option" data-value="LLB">LLB</div>
                                <div class="education-option" data-value="B.Arch">B.Arch</div>

                                <div class="education-option" data-value="M.A">M.A</div>
                                <div class="education-option" data-value="M.Sc">M.Sc</div>
                                <div class="education-option" data-value="M.Com">M.Com</div>
                                <div class="education-option" data-value="MBA">MBA</div>
                                <div class="education-option" data-value="MCA">MCA</div>
                                <div class="education-option" data-value="M.E">M.E</div>
                                <div class="education-option" data-value="M.Tech">M.Tech</div>
                                <div class="education-option" data-value="MD">MD</div>
                                <div class="education-option" data-value="MS">MS</div>
                                <div class="education-option" data-value="MDS">MDS</div>
                                <div class="education-option" data-value="M.Pharm">M.Pharm</div>
                                <div class="education-option" data-value="M.Ed">M.Ed</div>
                                <div class="education-option" data-value="LLM">LLM</div>
                                
                                <div class="education-option" data-value="M.Phil">M.Phil</div>
                                <div class="education-option" data-value="Ph.D">Ph.D</div>
                                <div class="education-option" data-value="Others">Others</div>

                            </div>
                            
                            <!-- Manual Education Input (Hidden initially) -->
                             <div id="education_others_wrapper-member" style="display:none;" class="mt-2">
                                <div class="input-group input-group-sm">
                                    <input type="text" id="education_others_input-member" 
                                        class="form-control" 
                                        placeholder="Enter education manually">
                                    <button class="btn btn-primary" type="button" onclick="addManualEducationMember()">Add</button>
                                </div>
                            </div>

                            <small id="educationerror-member" class="text-danger"></small>
                        </div>
                        <!-- End Education -->

                        <script>
                            var selectedEducationsMember = [];

                            function renderEducationTagsMember() {
                                const container = document.getElementById('education_tags-member');
                                if(!container) return;
                                container.innerHTML = '';
                                selectedEducationsMember.forEach(edu => {
                                    const tag = document.createElement('span');
                                    tag.className = 'badge bg-primary d-flex align-items-center ps-2 pe-2 py-1 gap-2';
                                    tag.style.fontSize = '0.85rem';
                                    tag.innerHTML = `<span>${edu}</span> <span style="cursor:pointer; font-weight:bold; font-size: 1rem; line-height: 1;" onclick="removeEducationMember('${edu.replace(/'/g, "\\'")}', event)">&times;</span>`;
                                    container.appendChild(tag);
                                });
                                document.getElementById('educationfield-member').value = selectedEducationsMember.join(',');
                                
                                // Reset placeholder visibility
                                const input = document.getElementById("education_input-member");
                                if (input) {
                                    if (selectedEducationsMember.length > 0) {
                                        input.placeholder = "";
                                    } else {
                                        input.placeholder = "Type or select education";
                                    }
                                }

                                // Education valid aana error clear
                                const errorField = document.getElementById("educationerror-member");
                                if (errorField && selectedEducationsMember.length > 0) {
                                    errorField.innerHTML = "";
                                }
                            }

                            function addManualEducationMember() {
                                const val = document.getElementById('education_others_input-member').value.trim();
                                if (val) {
                                    if (!selectedEducationsMember.includes(val)) {
                                        selectedEducationsMember.push(val);
                                        renderEducationTagsMember();
                                    }
                                    document.getElementById('education_others_input-member').value = '';
                                    document.getElementById('education_others_wrapper-member').style.display = 'none';
                                    document.getElementById('education_input-member').value = '';
                                    document.getElementById('education_input-member').focus();
                                }
                            }

                            function removeEducationMember(edu, event) {
                                if(event) event.stopPropagation();
                                selectedEducationsMember = selectedEducationsMember.filter(e => e !== edu);
                                renderEducationTagsMember();
                            }

                            // Initialize with existing data
                            $(document).ready(function() {
                                const existingEdu = "<?= esc($member->Education) ?>";
                                if(existingEdu) {
                                    const edus = existingEdu.split(',');
                                    edus.forEach(e => {
                                        const trimmed = e.trim();
                                        if(trimmed && !selectedEducationsMember.includes(trimmed)) {
                                            selectedEducationsMember.push(trimmed);
                                        }
                                    });
                                    renderEducationTagsMember();
                                }

                                // Handle wrapper click
                                $(document).on("click", "#education_wrapper-member", function(e) {
                                    if (e.target.id === 'education_wrapper-member' || e.target.id === 'education_tags-member') {
                                        $("#education_input-member").focus();
                                    }
                                    filterEducationOptionsMember(document.getElementById("education_input-member"));
                                });

                                // Click listener for education options
                                $(document).off('click', '#education_dropdown-member .education-option').on('click', '#education_dropdown-member .education-option', function() {
                                    const val = $(this).data('value');
                                    if (val === 'Others') {
                                        document.getElementById('education_others_wrapper-member').style.display = 'block';
                                        document.getElementById('education_dropdown-member').style.display = 'none';
                                        document.getElementById('education_others_input-member').focus();
                                    } else {
                                        if (!selectedEducationsMember.includes(val)) {
                                            selectedEducationsMember.push(val);
                                            renderEducationTagsMember();
                                        }
                                        document.getElementById('education_input-member').value = '';
                                        document.getElementById('education_dropdown-member').style.display = 'none';
                                    }
                                });
                            });

                            function filterEducationOptionsMember(input) {
                                const query = input.value.toLowerCase().trim();
                                const dropdown = document.getElementById("education_dropdown-member");
                                const options = dropdown.querySelectorAll(".education-option");
                                let hasVisible = false;

                                options.forEach(opt => {
                                    const text = opt.textContent.toLowerCase();
                                    if (!query || text.includes(query)) {
                                        opt.style.display = "";
                                        hasVisible = true;
                                    } else {
                                        opt.style.display = "none";
                                    }
                                });
                                dropdown.style.display = hasVisible ? "block" : "none";
                            }
                        </script>

                        <!-- Profession -->
                        <div class="col-md-4" style="position: relative;">
                            <?php 
                                $profession_map = [
                                    "Doctor" => "Doctor", "Lawyer" => "Lawyer", "Police" => "Police", 
                                    "Teacher / Lecturer" => "Teacher / Lecturer", "Engineer" => "Engineer", 
                                    "Government Employee" => "Government Employee", "Private Employee" => "Private Employee", 
                                    "Student" => "Student", "Farmer" => "Farmer – Agriculture", 
                                    "Textile Mill Worker" => "Textile Mill Worker (Spinning / Weaving)", 
                                    "Garment Factory Worker" => "Garment Factory Worker", 
                                    "Tailor" => "Tailor / Apparel Stitching", 
                                    "Pattern Master" => "Garment Pattern Master / Designer", 
                                    "Textile Machinery Technician" => "Textile Machinery Technician / Mechanic", 
                                    "Textile Machinery Service" => "Textile Machinery Sales & Service", 
                                    "Loom Operator" => "Powerloom / Auto‑Loom Operator", 
                                    "Knitting Machine Operator" => "Knitting Machine Operator", 
                                    "Truck Driver" => "Truck / Lorry Driver", 
                                    "Truck Owner Driver" => "Truck / Lorry Owner‑cum‑Driver", 
                                    "Logistics Staff" => "Logistics / Transport Staff", "Fleet Manager" => "Fleet Manager", 
                                    "Dairy Farmer" => "Dairy Farmer", "Poultry Farmer" => "Poultry Farmer", 
                                    "Animal Husbandry" => "Goat / Sheep Rearing", "Pump Technician" => "Pump / Motor Technician", 
                                    "Pump Factory Worker" => "Pump / Motor Manufacturing Worker", 
                                    "Motor Rewinding Technician" => "Motor Rewinding Technician", 
                                    "Machinist / Turner" => "Machinist / Turner", "Welder / Fabricator" => "Welder / Fabricator", 
                                    "Foundry Worker" => "Steel / Aluminium Foundry Worker", 
                                    "Mixer Grinder Technician" => "Mixer‑Grinder Assembly / Service Technician", 
                                    "Plastic / Net Unit Worker" => "Plastic / Net / Packaging Unit Worker", 
                                    "Windmill Technician" => "Windmill Maintenance Technician", 
                                    "Electrical Technician" => "Electrical Line / Maintenance Technician", 
                                    "Grocery Shop Staff" => "Grocery Shop Staff", "Medical Shop Staff" => "Medical Shop / Pharmacy Staff", 
                                    "Retail Shop / Sales Staff" => "Retail Shop / Sales Staff", 
                                    "Office Admin / Computer Operator" => "Office Admin / Computer Operator", 
                                    "Accountant / Finance Staff" => "Accountant / Finance Staff", "Bank / NBFC Staff" => "Bank / NBFC Staff", 
                                    "Hospital Staff" => "Hospital Nurse / Lab Tech / Pharmacist", 
                                    "Medical Representative" => "Medical Representative", "IT / Software Employee" => "IT / Software Employee", 
                                    "Home Maker" => "Home Maker", "Retired" => "Retired", "Others" => "Others"
                                ];
                                $display_prof = $member->Profession;
                                if (isset($profession_map[$member->Profession])) {
                                    $display_prof = $profession_map[$member->Profession];
                                }
                            ?>
                            <label for="profession-member">Profession <span class="text-danger">*</span></label>
                            <div class="border rounded p-1 bg-white d-flex align-items-center" id="profession_wrapper-member" style="cursor: pointer; min-height: 38px;">
                                <input type="text" id="profession_input-member" 
                                    class="form-control form-control-sm border-0 bg-transparent shadow-none" 
                                    placeholder="Type or click to select profession"
                                    onfocus="filterProfessionOptionsMember(this)"
                                    oninput="filterProfessionOptionsMember(this)"
                                    onclick="filterProfessionOptionsMember(this)"
                                    readonly 
                                    style="cursor: pointer; flex: 1;"
                                    value="<?= esc($display_prof) ?>">
                                <input type="hidden" id="profession-member" name="profession-update" value="<?= esc($member->Profession) ?>">
                            </div>
                            <div class="border rounded mt-1 bg-white shadow-sm" id="profession_dropdown-member" 
                                style="max-height:250px; overflow:auto; display:none; position:absolute; z-index:1001; width: calc(100% - 1.5rem); left: 0.75rem;">
                                <?php 
                                    foreach($profession_map as $val => $text) {
                                        echo "<div class='profession-option p-2 border-bottom' data-value='$val'>$text</div>";
                                    }
                                ?>
                            </div>
                            <small id="professionerror-member" class="text-danger"></small>
                        </div>


                        <!-- Business -->
                        <div class="col-md-4" id="business-extra-wrapper-member" style="display:<?= ($member->Profession == 'Others') ? 'block' : 'none' ?>;">
                            <label for="business-member">Business Name</label>
                            <input type="text" id="business-member" name="business-update" class="form-control" value="<?= $member->Business ?>">
                            <label for="business_website-member" class="mt-2">Business Website</label>
                            <input type="text" id="business_website-member" name="business_website-update" class="form-control" value="<?= $member->BusinessWebsite ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Native Address -->
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h5 class="mb-4 section-title">
                        <i class="fa-solid fa-location-dot text-primary me-2"></i>Native Address
                    </h5>
                    <div class="row g-3">
                        <div class="col-md-3" style="display: none;">
                            <label for="states-dropdown-member">State</label>
                            <select id="states-dropdown-member" onchange="setDropdowndistrictsMember(this); validateMemberInput(this)" class="form-select" name="state-update">
                                <option value=''>Select State</option>
                                <?php if (isset($states)): ?>
                                    <?php foreach ($states as $state): ?>
                                        <option value='<?= $state->state_id ?>' <?= ($member->state_id == $state->state_id) ? 'selected' : '' ?>><?= $state->state_title ?></option>
                                    <?php endforeach; ?>
                                <?php endif ?>
                            </select>
                            <small id="stateerror-member" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="districts-dropdown-member">District</label>
                            <select id="districts-dropdown-member" onchange="setDropdowntaluksMember(this); validateMemberInput(this)" class="form-select" name="district-update">
                                <option value="">Select District</option>
                                <?php if (isset($districts)): foreach ($districts as $d): ?>
                                    <option value="<?= $d->district_name ?>" <?= ($member->District == $d->district_name) ? 'selected' : '' ?>><?= $d->district_name ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <small id="districterror-member" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="taluks-dropdown-member">Taluk</label>
                            <select id="taluks-dropdown-member" onchange="toggleTalukOthersMember(this); setDropdownpanchayatMember(this); validateMemberInput(this)" class="form-select" name="taluk-update">
                                <option value="">Select Taluk</option>
                                <?php if (isset($taluks)): foreach ($taluks as $t): ?>
                                    <option value="<?= $t->taluk_name ?>" <?= ($member->Taluk == $t->taluk_name) ? 'selected' : '' ?>><?= $t->taluk_name ?></option>
                                <?php endforeach; endif; ?>
                                <option value="Others" <?= (isset($member->Taluk) && !empty($member->Taluk) && !in_array($member->Taluk, array_column($taluks ?? [], 'taluk_name')) && $member->Taluk !== '') ? 'selected' : '' ?>>Others</option>
                            </select>
                            <input type="text" id="taluk_others_input_member" name="taluk_others_update" 
                                class="form-control mt-2" 
                                placeholder="Enter taluk name" 
                                style="display:none;" 
                                onkeyup="validateMemberInput(this)">
                            <small id="talukerror-member" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="panchayat-dropdown-member">Panchayat</label>
                            <select id="panchayat-dropdown-member" onchange="togglePanchayatOthersMember(this); setDropdownVillageMember(this); validateMemberInput(this)" class="form-select" name="panchayat-update">
                                <option value="">Select Panchayat</option>
                                <?php if (isset($panchayats)): foreach ($panchayats as $p): ?>
                                    <option value="<?= $p->panchayat_name ?>" <?= ($member->Panchayat == $p->panchayat_name) ? 'selected' : '' ?>><?= $p->panchayat_name ?></option>
                                <?php endforeach; endif; ?>
                                <option value="Others" <?= (isset($member->Panchayat) && !empty($member->Panchayat) && !in_array($member->Panchayat, array_column($panchayats ?? [], 'panchayat_name')) && $member->Panchayat !== '') ? 'selected' : '' ?>>Others</option>
                            </select>
                            <input type="text" id="panchayat_others_input_member" name="panchayat_others_update" 
                                class="form-control mt-2" 
                                placeholder="Enter panchayat name" 
                                style="display:none;" 
                                onkeyup="validateMemberInput(this)">
                            <small id="panchayaterror-member" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="village-member">Village</label>
                            <select id="village-member" onchange="toggleVillageOthersMember(this); validateMemberInput(this)" class="form-select" name="village-update">
                                <option value="<?= $member->Village ?>"><?= $member->Village ?: 'Select Village' ?></option>
                                <option value="Others">Others</option>
                            </select>
                            <input type="text" id="village_others_input_member" name="village_others_update" 
                                class="form-control mt-2" 
                                placeholder="Enter village name" 
                                style="display:none;" 
                                onkeyup="validateMemberInput(this)">
                            <small id="villageerror-member" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="street-member">Street</label>
                            <input id="street-member" onkeyup="validateMemberInput(this)" class="form-control" type="text" name="street-update" value="<?= $member->Street ?>">
                            <small id="streeterror-member" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="doorno-member">Door No</label>
                            <input id="doorno-member" onkeyup="validateMemberInput(this)" class="form-control" type="text" name="doorno-update" value="<?= $member->Doornumber ?>">
                            <small id="doornoerror-member" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="pincode-member">Pin Code</label>
                            <input id="pincode-member" onkeyup="validateMemberInput(this)" 
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)"
                                class="form-control" type="text" inputmode="numeric" name="pincode-update" maxlength="6" value="<?= $member->Pincode ?>">
                            <small id="pincodeerror-member" class="text-danger"></small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Address -->
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0 section-title">
                            <i class="fa-solid fa-location-dot text-success me-2"></i>Current Address
                        </h5>
                        <button type="button" id="btn_same_as_native-member" class="btn btn-outline-success btn-sm" onclick="copyNativeAddressMember()" style="display: <?= ($member->Curaddresstype == 'India') ? 'inline-block' : 'none' ?>;">
                            Same as Native Address
                        </button>
                    </div>

                    <div class="mb-3">
                        <label class="d-block">Current Address Type <span class="mandatory-star">*</span></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-update" id="cur_address_tn-member" value="TamilNadu" <?= ($member->Curaddresstype == 'TamilNadu' || ($member->Curaddresstype == 'India' && $member->Curstate == 35)) ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeMember()">
                            <label class="form-check-label" for="cur_address_tn-member">Tamil Nadu</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-update" id="cur_address_others-member" value="OtherState" <?= ($member->Curaddresstype == 'OtherState' || ($member->Curaddresstype == 'India' && $member->Curstate != 35 && $member->Curstate != '')) ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeMember()">
                            <label class="form-check-label" for="cur_address_others-member">Other State</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-update" id="cur_address_nri-member" value="NRI" <?= ($member->Curaddresstype == 'NRI') ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeMember()">
                            <label class="form-check-label" for="cur_address_nri-member">NRI</label>
                        </div>
                        <small id="cur_address_type_error-member" class="text-danger d-block"></small>
                    </div>

                    <!-- INDIA CURRENT ADDRESS BLOCK -->
                    <div id="cur_india_block-member" style="display:<?= ($member->Curaddresstype == 'TamilNadu' || ($member->Curaddresstype == 'India' && $member->Curstate == 35)) ? 'block' : 'none' ?>;">
                        <div class="row g-3">
                            <div class="col-md-3" id="cur_state_container-member" style="display: <?= ($member->Curaddresstype == 'OtherState' || ($member->Curaddresstype == 'India' && $member->Curstate != 35)) ? 'block' : 'none' ?>;">
                                <label for="cur_state-member">State</label>
                                <select id="cur_state-member" onchange="setDropdowndistrictsCurrentMember(this); validateMemberInput(this)" class="form-select" name="cur_state-update">
                                    <option value="">Select State</option>
                                    <?php if (isset($states)): ?>
                                        <?php foreach ($states as $state): ?>
                                            <option value="<?= $state->state_id ?>" <?= ($member->Curstate == $state->state_id) ? 'selected' : '' ?>><?= $state->state_title ?></option>
                                        <?php endforeach; ?>
                                    <?php endif ?>
                                </select>
                                <small id="cur_stateerror-member" class="text-danger"></small>
                            </div>
                            <!-- Districts, Taluks, Panchayats for Current will be populated via AJAX -->
                             <div class="col-md-3">
                                <label for="cur_district-member">District</label>
                                 <select id="cur_district-member" style="border: 1px solid #ced4da;" onchange="setDropdowntaluksCurrentMember(this); validateMemberInput(this)" class="form-select" name="cur_district-update">
                                    <option value="<?= $member->Curdistrict ?>"><?= $member->Curdistrict ?: 'Select District' ?></option>
                                </select>
                                <small id="cur_districterror-member" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_taluk-member">Taluk</label>
                                 <select id="cur_taluk-member" style="border: 1px solid #ced4da;" onchange="toggleTalukOthersCurrentMember(this); setDropdownpanchayatCurrentMember(this); validateMemberInput(this)" class="form-select" name="cur_taluk-update">
                                    <option value="<?= $member->Curtaluk ?>"><?= $member->Curtaluk ?: 'Select Taluk' ?></option>
                                </select>
                                <input type="text" id="cur_taluk_others_input_member" name="cur_taluk_others_update" 
                                    class="form-control mt-2" 
                                    placeholder="Enter taluk name" 
                                    style="display:none;" 
                                    onkeyup="validateMemberInput(this)">
                                <small id="cur_talukerror-member" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_panchayat-member">Panchayat</label>
                                 <select id="cur_panchayat-member" style="border: 1px solid #ced4da;" onchange="togglePanchayatOthersCurrentMember(this); setDropdownVillageCurrentMember(this); validateMemberInput(this)" class="form-select" name="cur_panchayat-update">
                                    <option value="<?= $member->Curpanchayat ?>"><?= $member->Curpanchayat ?: 'Select Panchayat' ?></option>
                                </select>
                                <input type="text" id="cur_panchayat_others_input_member" name="cur_panchayat_others_update" 
                                    class="form-control mt-2" 
                                    placeholder="Enter panchayat name" 
                                    style="display:none;" 
                                    onkeyup="validateMemberInput(this)">
                                <small id="cur_panchayaterror-member" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_village-member">Village</label>
                                <select id="cur_village-member" onchange="toggleVillageOthersCurrentMember(this); validateMemberInput(this)" class="form-select" name="cur_village-update">
                                    <option value="<?= $member->Curvillage ?>"><?= $member->Curvillage ?: 'Select Village' ?></option>
                                </select>
                                <input type="text" id="cur_village_others_input_member" name="cur_village_others_update" 
                                    class="form-control mt-2" 
                                    placeholder="Enter village name" 
                                    style="display:none;" 
                                    onkeyup="validateMemberInput(this)">
                                <small id="cur_villageerror-member" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_street-member">Street</label>
                                <input id="cur_street-member" onkeyup="validateMemberInput(this)" class="form-control" type="text" name="cur_street-update" value="<?= $member->Curstreet ?>">
                                <small id="cur_streeterror-member" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_doorno-member">Door No</label>
                                <input id="cur_doorno-member" onkeyup="validateMemberInput(this)" class="form-control" type="text" name="cur_doorno-update" value="<?= $member->Curdoorno ?>">
                                <small id="cur_doornoerror-member" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_pincode-member">Pin Code</label>
                                <input id="cur_pincode-member" onkeyup="validateMemberInput(this)" 
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)"
                                    class="form-control" type="text" inputmode="numeric" name="cur_pincode-update" maxlength="6" value="<?= $member->Curpincode ?>">
                                <small id="cur_pincodeerror-member" class="text-danger"></small>
                            </div>
                        </div>
                    </div>

                    <!-- NRI CURRENT ADDRESS BLOCK -->
                    <div id="cur_nri_block-member" style="display:<?= ($member->Curaddresstype == 'NRI' || $member->Curaddresstype == 'OtherState' || ($member->Curaddresstype == 'India' && $member->Curstate != 35 && $member->Curstate != '')) ? 'block' : 'none' ?>;">
                        <div class="row g-3">
                            <div class="col-md-3" id="cur_nri_country_container-member" style="display: <?= ($member->Curaddresstype == 'NRI') ? 'block' : 'none' ?>;">
                                <label for="cur_nri_country-member">Country</label>
                                <select id="cur_nri_country-member" name="cur_nri_country-update" class="form-select" onchange="loadNRIStatesMember(this.value); validateMemberInput(this)">
                                    <option value="<?= $member->Curnricountry ?>"><?= $member->Curnricountry ?: 'Select Country' ?></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_nri_state-member">State / Region</label>
                                <select id="cur_nri_state-member" name="cur_nri_state-update" class="form-select" onchange="loadNRICitiesMember(this.value); validateMemberInput(this)">
                                    <option value="<?= $member->Curnristate ?>"><?= $member->Curnristate ?: 'Select State' ?></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_nri_city-member">City</label>
                                <select id="cur_nri_city-member" name="cur_nri_city-update" class="form-select" onchange="validateMemberInput(this)">
                                    <option value="<?= $member->Curnricity ?>"><?= $member->Curnricity ?: 'Select City' ?></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_nri_zip-member">Zip Code</label>
                                <input id="cur_nri_zip-member" name="cur_nri_zip-update" class="form-control" type="text" value="<?= $member->Curnrizip ?>" 
                                    oninput="this.value = this.value.replace(/[^a-zA-Z0-9 -]/g, '').slice(0, 12)"
                                    onkeyup="validateMemberInput(this)">
                            </div>
                            <div class="col-md-12">
                                <label for="cur_nri_fulladdress-member">Full Address</label>
                                <textarea id="cur_nri_fulladdress-member" name="cur_nri_fulladdress-update" class="form-control" rows="3" onkeyup="validateMemberInput(this)"><?= $member->Curnrifulladdress ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documents -->
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h5 class="mb-4 section-title">
                        <i class="fa-solid fa-image text-primary me-2"></i>Documents
                    </h5>
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3 d-flex flex-column">
                            <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">Passport Photo</label>
                            <div class="ps-file-upload-wrapper">
                                <label for="update_memberimage" class="ps-file-upload-btn" id="update_memberimage_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledMember(this, 'update_memberimage_btn')" id="update_memberimage" type="file" name="Memberimage" accept="image/*">
                            </div>
                            <small class="text-danger Memberimage"></small>
                        </div>
                        <div class="col-md-3 d-flex flex-column">
                            <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">Aadhar Front</label>
                            <div class="ps-file-upload-wrapper">
                                <label for="update_aadharfront" class="ps-file-upload-btn" id="update_aadharfront_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledMember(this, 'update_aadharfront_btn')" id="update_aadharfront" type="file" name="Aadharfrontimage" accept="image/*">
                            </div>
                            <small class="text-danger Aadharfrontimage"></small>
                        </div>
                        <div class="col-md-3 d-flex flex-column">
                            <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">Aadhar Back</label>
                            <div class="ps-file-upload-wrapper">
                                <label for="update_aadharback" class="ps-file-upload-btn" id="update_aadharback_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledMember(this, 'update_aadharback_btn')" id="update_aadharback" type="file" name="Aadharbackimage" accept="image/*">
                            </div>
                            <small class="text-danger Aadharbackimage"></small>
                        </div>
                        <div class="col-md-3 d-flex flex-column">
                            <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">Community Certificate</label>
                            <div class="ps-file-upload-wrapper">
                                <label for="update_communitycert" class="ps-file-upload-btn" id="update_communitycert_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledMember(this, 'update_communitycert_btn')" id="update_communitycert" type="file" name="Communitycertificate" accept="image/*">
                            </div>
                            <small class="text-danger Communitycertificate"></small>
                        </div>
                    </div>
                    <div class="mt-2 text-center">
                        <span style="color:#295CF5; font-size: 13px;">Note: File Size should be below 2MB. (JPG, JPEG, PNG only)</span>
                    </div>
                </div>
            </div>

            <!-- Submit Section -->
            <div class="text-center pb-5">
                <div class="form-check d-inline-flex align-items-center mb-3">
                    <input onchange="activateMemberButton(this)" type="checkbox" class="form-check-input" id="correctdetails-member">
                    <label for="correctdetails-member" class="form-check-label ms-2 font-weight-bold">I confirm that the above details are correct.</label>
                </div>
                <div>
                    <button id="membersubmitbutton" disabled type="submit" class="btn btn-lg rounded-pill px-5">Update Details</button>
                </div>
            </div>
        </form>
    <?php endif; ?>

    <script>
        function toggleUpcomingHeadMember() {
            let relationshipSelect = document.getElementById("relationship-member");
            let aliveStatusDead = document.getElementById("alive_no-member");
            let upcomingHeadDiv = document.getElementById("upcoming_head_div-member");

            if (!relationshipSelect || !aliveStatusDead || !upcomingHeadDiv) return;

            // Check if Role is Head AND Dead is checked
            if (relationshipSelect.value === "Head" && aliveStatusDead.checked) {
                upcomingHeadDiv.style.display = "block";
            } else {
                upcomingHeadDiv.style.display = "none";
                document.getElementById("upcoming_head-member").value = "";
            }
        }

        function toggleCustomRelationshipMember(select) {
            let customDiv = document.getElementById("custom_rel_div-member");

            if (select.value === "Other") {
                customDiv.style.display = "block";
            } else {
                customDiv.style.display = "none";
                document.getElementById("custom_relationship-member").value = "";
            }

            toggleUpcomingHeadMember();
        }

        function setDropdowndistrictsMember(state, selectDistrict = null, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let state_id = state.value;

            // Clear dependent dropdowns
            if (!selectDistrict) {
                document.getElementById("taluks-dropdown-member").innerHTML = '<option value="">Select Taluk</option>';
                document.getElementById("panchayat-dropdown-member").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("village-member").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("village_others_input_member").style.display = 'none';
                document.getElementById("village_others_input_member").value = '';
            }

            if (!state_id) return;

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { "state_id": state_id },
                success: (result) => {
                    let dropdown = document.getElementById("districts-dropdown-member");
                    dropdown.innerHTML = result;
                    if (selectDistrict) {
                        dropdown.value = selectDistrict;
                        setDropdowntaluksMember(dropdown, selectTaluk, selectPanchayat, selectVillage);
                    }
                }
            });
        }

        function setDropdowntaluksMember(district, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let district_name = district.value;

            // Clear dependent dropdowns
            if (!selectTaluk) {
                document.getElementById("panchayat-dropdown-member").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("village-member").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("village_others_input_member").style.display = 'none';
                document.getElementById("village_others_input_member").value = '';
            }

            if (!district_name) return;

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { "district_name": district_name },
                success: (result) => {
                    let dropdown = document.getElementById("taluks-dropdown-member");
                    dropdown.innerHTML = result;
                    dropdown.innerHTML += '<option value="Others">Others</option>';
                    if (selectTaluk) {
                        dropdown.value = selectTaluk;
                        if (dropdown.value !== selectTaluk && selectTaluk !== "") {
                            dropdown.value = 'Others';
                            toggleTalukOthersMember(dropdown, selectTaluk);
                        } else {
                            toggleTalukOthersMember(dropdown);
                        }
                        setDropdownpanchayatMember(dropdown, selectPanchayat, selectVillage);
                    } else {
                        toggleTalukOthersMember(dropdown);
                    }
                },
                error: (err) => {
                    document.getElementById("taluks-dropdown-member").innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                    toggleTalukOthersMember(document.getElementById("taluks-dropdown-member"));
                }
            });
        }

        function toggleTalukOthersMember(selectEl, manualValue = '') {
            const othersInput = document.getElementById('taluk_others_input_member');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'taluk-update');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.value = '';
                othersInput.setAttribute('name', 'taluk_others_update');
                selectEl.setAttribute('name', 'taluk-update'); 
            }
        }

        function setDropdownpanchayatMember(taluk, selectPanchayat = null, selectVillage = null) {
            let taluk_name = taluk.value;

            // Clear dependent dropdowns
            if (!selectPanchayat) {
                document.getElementById("village-member").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("village_others_input_member").style.display = 'none';
                document.getElementById("village_others_input_member").value = '';
            }

            if (!taluk_name) return;
            if (taluk_name === 'Others') {
                let dropdown = document.getElementById("panchayat-dropdown-member");
                dropdown.innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                if (selectPanchayat) {
                    dropdown.value = selectPanchayat;
                    if (dropdown.value !== selectPanchayat && selectPanchayat !== "") {
                        dropdown.value = 'Others';
                        togglePanchayatOthersMember(dropdown, selectPanchayat);
                    } else {
                        togglePanchayatOthersMember(dropdown);
                    }
                    setDropdownVillageMember(dropdown, selectVillage);
                } else {
                    togglePanchayatOthersMember(dropdown);
                }
                return;
            }

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { "taluk_name": taluk_name },
                success: (result) => {
                    let dropdown = document.getElementById("panchayat-dropdown-member");
                    dropdown.innerHTML = result;
                    dropdown.innerHTML += '<option value="Others">Others</option>';
                    if (selectPanchayat) {
                        dropdown.value = selectPanchayat;
                        if (dropdown.value !== selectPanchayat && selectPanchayat !== "") {
                            dropdown.value = 'Others';
                            togglePanchayatOthersMember(dropdown, selectPanchayat);
                        } else {
                            togglePanchayatOthersMember(dropdown);
                        }
                        setDropdownVillageMember(dropdown, selectVillage);
                    } else {
                        togglePanchayatOthersMember(dropdown);
                    }
                },
                error: (err) => {
                    document.getElementById("panchayat-dropdown-member").innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                    togglePanchayatOthersMember(document.getElementById("panchayat-dropdown-member"));
                }
            });
        }

        function togglePanchayatOthersMember(selectEl, manualValue = '') {
            const othersInput = document.getElementById('panchayat_others_input_member');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'panchayat-update');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.value = '';
                othersInput.setAttribute('name', 'panchayat_others_update');
                selectEl.setAttribute('name', 'panchayat-update'); 
            }
        }






        function setDropdownVillageMember(panchayatEl, selectedVillage = null) {
            const panchayat_name = panchayatEl.value;
            const villageSelect = document.getElementById('village-member');

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getVillagesfordropdown') ?>",
                data: { panchayat_name: panchayat_name },
                success: function(result) {
                    villageSelect.innerHTML = result;
                    
                    // Add Others option
                    const othersOption = document.createElement('option');
                    othersOption.value = 'Others';
                    othersOption.textContent = 'Others';
                    villageSelect.appendChild(othersOption);
                    
                    // Handle selection
                    if (selectedVillage) {
                        let exists = false;
                        for (let i = 0; i < villageSelect.options.length; i++) {
                            if (villageSelect.options[i].value.toLowerCase() === selectedVillage.toLowerCase()) {
                                villageSelect.selectedIndex = i;
                                exists = true;
                                break;
                            }
                        }
                        
                        if (!exists && selectedVillage !== "") {
                            villageSelect.value = 'Others';
                        }
                    }
                    
                    // Trigger toggle to show/hide the manual input correctly
                    toggleVillageOthersMember(villageSelect, selectedVillage);
                },
                error: function() {
                    villageSelect.innerHTML = '<option value="">Select Village</option><option value="Others">Others</option>';
                    toggleVillageOthersMember(villageSelect);
                }
            });
        }

        function toggleVillageOthersMember(selectEl, manualValue = '') {
            const othersInput = document.getElementById('village_others_input_member');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                othersInput.setAttribute('required', 'required');
                selectEl.removeAttribute('name');
                othersInput.setAttribute('name', 'village-update');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.removeAttribute('required');
                othersInput.value = '';
                othersInput.setAttribute('name', 'village_others_update');
                selectEl.setAttribute('name', 'village-update');
            }
        }

        function setDropdownVillageCurrentMember(panchayatEl, selectedVillage = null) {
            const panchayat_name = panchayatEl.value;
            const villageSelect = document.getElementById('cur_village-member');

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getVillagesfordropdown') ?>",
                data: { panchayat_name: panchayat_name },
                success: function(result) {
                    villageSelect.innerHTML = result;
                    
                    // Add Others option
                    const othersOption = document.createElement('option');
                    othersOption.value = 'Others';
                    othersOption.textContent = 'Others';
                    villageSelect.appendChild(othersOption);
                    
                    // Handle selection
                    if (selectedVillage) {
                        let exists = false;
                        for (let i = 0; i < villageSelect.options.length; i++) {
                            if (villageSelect.options[i].value.toLowerCase() === selectedVillage.toLowerCase()) {
                                villageSelect.selectedIndex = i;
                                exists = true;
                                break;
                            }
                        }
                        
                        if (!exists && selectedVillage !== "") {
                            villageSelect.value = 'Others';
                        }
                    }
                    
                    // Trigger toggle to show/hide the manual input correctly
                    toggleVillageOthersCurrentMember(villageSelect, selectedVillage);
                },
                error: function() {
                    villageSelect.innerHTML = '<option value="">Select Village</option><option value="Others">Others</option>';
                    toggleVillageOthersCurrentMember(villageSelect); 
                }
            });
        }

        function toggleVillageOthersCurrentMember(selectEl, manualValue = '') {
            const othersInput = document.getElementById('cur_village_others_input_member');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                othersInput.setAttribute('required', 'required');
                selectEl.removeAttribute('name');
                othersInput.setAttribute('name', 'cur_village-update');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.removeAttribute('required');
                othersInput.value = '';
                othersInput.setAttribute('name', 'cur_village_others_update');
                selectEl.setAttribute('name', 'cur_village-update');
            }
        }

        function clearCurrentIndiaAddressMember() {
            $('#cur_state-member').val('');
            $('#cur_district-member').html('<option value="">Select District</option>');
            $('#cur_taluk-member').html('<option value="">Select Taluk</option>');
            $('#cur_panchayat-member').html('<option value="">Select Panchayat</option>');
            $('#cur_village-member').val('');
            $('#cur_street-member').val('');
            $('#cur_doorno-member').val('');
            $('#cur_pincode-member').val('');
            $('#cur_taluk_others_input_member').val('').hide().removeAttr('name').attr('name', 'cur_taluk_others_update');
            $('#cur_panchayat_others_input_member').val('').hide().removeAttr('name').attr('name', 'cur_panchayat_others_update');
            $('#cur_village_others_input_member').val('').hide().removeAttr('name').attr('name', 'cur_village_others_update');
        }

        function clearCurrentNriAddressMember() {
            $('#cur_nri_country-member').val('');
            $('#cur_nri_state-member').html('<option value="">Select State</option>');
            $('#cur_nri_city-member').html('<option value="">Select City</option>');
            $('#cur_nri_zip-member').val('');
            $('#cur_nri_fulladdress-member').val('');
        }

        function toggleCurrentAddressTypeMember(isInitial = false) {
            const tnBlock = document.getElementById('cur_india_block-member');
            const nriBlock = document.getElementById('cur_nri_block-member');
            const sameBtn = document.getElementById('btn_same_as_native-member');
            const curStateContainer = document.getElementById('cur_state_container-member');
            const curNriCountryContainer = document.getElementById('cur_nri_country_container-member');

            const selected = document.querySelector('input[name="cur_address_type-update"]:checked');

            if (tnBlock) tnBlock.style.display = 'none';
            if (nriBlock) nriBlock.style.display = 'none';
            if (sameBtn) sameBtn.style.display = 'none';
            if (curStateContainer) curStateContainer.style.display = 'block';

            if (!selected) {
                if (!isInitial) {
                    clearCurrentIndiaAddressMember();
                    clearCurrentNriAddressMember();
                }
                return;
            }

            if (selected.value === 'TamilNadu') {
                if (tnBlock) tnBlock.style.display = 'block';
                if (nriBlock) nriBlock.style.display = 'none';
                if (curStateContainer) curStateContainer.style.display = 'none';
                if (sameBtn) sameBtn.style.display = 'inline-block';
                if (!isInitial) clearCurrentNriAddressMember(); 
                
                let stateSelect = document.getElementById("cur_state-member");
                if (stateSelect) {
                    for (let i = 0; i < stateSelect.options.length; i++) {
                        if (stateSelect.options[i].text === "Tamil Nadu") {
                            stateSelect.selectedIndex = i;
                            if (!isInitial) setDropdowndistrictsCurrentMember(stateSelect);
                            break;
                        }
                    }
                }

            } else if (selected.value === 'OtherState') {
                if (tnBlock) tnBlock.style.display = 'none';
                if (nriBlock) nriBlock.style.display = 'block';
                if (curNriCountryContainer) curNriCountryContainer.style.display = 'none'; // Hide country dropdown for OtherState
                if (sameBtn) sameBtn.style.display = 'none';

                if (!isInitial) {
                    clearCurrentIndiaAddressMember();
                    clearCurrentNriAddressMember();
                }
                // Set Country to India and Load States via callback
                loadCountriesDataMember(isInitial); 
            } else if (selected.value === 'NRI') {
                if (tnBlock) tnBlock.style.display = 'none';
                if (nriBlock) nriBlock.style.display = 'block';
                if (curNriCountryContainer) curNriCountryContainer.style.display = 'block'; // Show country dropdown for NRI
                if (sameBtn) sameBtn.style.display = 'none';

                if (!isInitial) {
                    clearCurrentIndiaAddressMember();
                    clearCurrentNriAddressMember();
                }
                loadCountriesDataMember(isInitial);
            }
        }

        function copyNativeAddressMember() {
            // Ensure Tamil Nadu is selected for current address type
            var tnRadio = document.getElementById('cur_address_tn-member');
            if (tnRadio) {
                tnRadio.checked = true;
                toggleCurrentAddressTypeMember();
            }

            var fields = {
                'street-member': 'cur_street-member',
                'doorno-member': 'cur_doorno-member',
                'pincode-member': 'cur_pincode-member'
            };

            for (var sourceId in fields) {
                var source = document.getElementById(sourceId);
                var target = document.getElementById(fields[sourceId]);
                if (source && target) target.value = source.value;
            }
            
            var n_state = document.getElementById('states-dropdown-member').value;
            var n_district = document.getElementById('districts-dropdown-member').value;
            var n_taluk = document.getElementById('taluks-dropdown-member').value;
            var n_panchayat = document.getElementById('panchayat-dropdown-member').value;
            var n_village_select = document.getElementById('village-member');
            var n_village = n_village_select.value;
            if (n_village === 'Others') {
                n_village = document.getElementById('village_others_input_member').value;
            }
            
            var c_state = document.getElementById('cur_state-member');
            if (c_state && n_state) {
                c_state.value = n_state;
                // Trigger chained AJAX for current address dropdowns with full path
                setDropdowndistrictsCurrentMember(c_state, n_district, n_taluk, n_panchayat, n_village);
                
                // Special handling for 'Others' in Taluk and Panchayat
                setTimeout(() => {
                    const c_taluk = document.getElementById('cur_taluk-member');
                    const c_panchayat = document.getElementById('cur_panchayat-member');
                    
                    if (n_taluk === 'Others') {
                        c_taluk.value = 'Others';
                        toggleTalukOthersCurrentMember(c_taluk);
                        document.getElementById('cur_taluk_others_input_member').value = document.getElementById('taluk_others_input_member').value;
                    }
                    if (n_panchayat === 'Others') {
                        c_panchayat.value = 'Others';
                        togglePanchayatOthersCurrentMember(c_panchayat);
                        document.getElementById('cur_panchayat_others_input_member').value = document.getElementById('panchayat_others_input_member').value;
                    }
                }, 1000); // Wait for AJAX cascade
            }
        }

        let originalFormDataUpdateMember = "";
        setTimeout(function() {
            const form = document.forms['memberregistration-update'];
            if(form) {
                originalFormDataUpdateMember = new URLSearchParams(new FormData(form)).toString();
                const checkbox = document.getElementById("correctdetails-member");
                
                form.addEventListener('change', function() {
                    if(checkbox) activateMemberButton(checkbox);
                });
                form.addEventListener('input', function() {
                    if(checkbox) activateMemberButton(checkbox);
                });
            }
        }, 800);

        function checkFormChangedMember() {
            const form = document.forms['memberregistration-update'];
            if(!form) return false;
            const currentFormData = new URLSearchParams(new FormData(form)).toString();
            return currentFormData !== originalFormDataUpdateMember;
        }

        function activateMemberButton(checkbox) {
            const isChanged = checkFormChangedMember();
            document.getElementById("membersubmitbutton").disabled = !(checkbox.checked && isChanged);
        }

        var originalEmailMember = "<?= $member->Email ?>";
        var originalPhoneMember = "<?= $member->Phonenumber ?>";

        function validateMemberInput(field) {
            // Live Email Change check
            if (field.id === 'email-member') {
                const currentEmail = field.value.trim();
                const verifyBtn = document.getElementById('verify_email_btn-member');
                const verifiedBadge = document.getElementById('email_verified_badge-member');
                const isVerifiedInput = document.getElementById('is_email_verified-member');
                const otpSection = document.getElementById('otp_section-member');
                const emailError = document.getElementById('emailerror-member');

                // Basic Format Validation
                const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (currentEmail !== "" && !emailRegex.test(currentEmail)) {
                    emailError.innerHTML = "Invalid email format.";
                    field.classList.add('is-invalid');
                } else {
                    emailError.innerHTML = "";
                    field.classList.remove('is-invalid');
                }

                if (currentEmail !== originalEmailMember) {
                    verifiedBadge.style.display = 'none';
                    isVerifiedInput.value = "0";
                    verifyBtn.style.display = 'inline-block';
                    verifyBtn.disabled = false;
                    verifyBtn.innerText = "Verify";
                } else if (currentEmail !== "" && currentEmail === originalEmailMember) {
                    verifiedBadge.style.display = 'block';
                    isVerifiedInput.value = "1";
                    verifyBtn.style.display = 'none';
                    otpSection.style.display = 'none';
                }
            }

            // Phone Uniqueness check
            if (field.id === 'phoneno-member') {
                const phone = field.value.trim();
                const err = document.getElementById('phonenoerror-member');
                const verifyPhoneBtn = document.getElementById('verify_phone_btn-member');
                const verifiedPhoneBadge = document.getElementById('phone_verified_badge-member');
                const isPhoneVerifiedInput = document.getElementById('is_phone_verified-member');

                if (phone !== originalPhoneMember) {
                    verifiedPhoneBadge.style.display = 'none';
                    isPhoneVerifiedInput.value = "0";
                    if (phone.length === 10) {
                        verifyPhoneBtn.style.display = 'inline-block';
                        verifyPhoneBtn.disabled = false;
                        verifyPhoneBtn.innerText = "Verify";
                        err.innerHTML = "";
                    } else {
                        verifyPhoneBtn.style.display = 'none';
                        if (phone.length > 0) {
                            err.innerHTML = "Phone number should be 10 digits.";
                            field.classList.add('is-invalid');
                        } else {
                            err.innerHTML = "";
                            field.classList.remove('is-invalid');
                        }
                    }
                } else {
                    verifiedPhoneBadge.style.display = 'block';
                    isPhoneVerifiedInput.value = "1";
                    verifyPhoneBtn.style.display = 'none';
                    err.innerHTML = "";
                    field.classList.remove('is-invalid');
                }
            }

            // Simplified validation for update
            if (field.value === "" && field.hasAttribute('required')) {
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }

            if (field.id === 'upcoming_head-member') {
               let upcomingHeadError = document.getElementById("upcomingheaderror-member");
               if(field.value !== "") {
                   if(upcomingHeadError) upcomingHeadError.innerText = "";
                   field.classList.remove('is-invalid');
               }
            }
        }

        function validateMemberForm() {
            let isValid = true;
            let firstInvalid = null;
            const f = document.forms['memberregistration-update'];

            const setErr = (id, msg, el) => {
                const errBox = document.getElementById(id);
                if (errBox) errBox.innerHTML = msg;
                if (!firstInvalid && el) firstInvalid = el;
                isValid = false;
            };

            // Clear errors
            document.querySelectorAll(".text-danger").forEach(el => el.innerHTML = "");

            // Verification checks
            const isEmailVerified = document.getElementById('is_email_verified-member').value;
            const isPhoneVerified = document.getElementById('is_phone_verified-member').value;
            if (f['email-update'].value !== "" && isEmailVerified === "0") {
                alert("Please verify your new email address.");
                f['email-update'].focus();
                return false;
            }
            if (f['phoneno-update'].value !== "" && isPhoneVerified === "0") {
                alert("Please verify your new phone number.");
                f['phoneno-update'].focus();
                return false;
            }

            // Basic Details
            if (!f['name-update'].value.trim()) setErr('nameerror-member', 'Name is required.', f['name-update']);
            if (!f['phoneno-update'].value.trim()) setErr('phonenoerror-member', 'Phone is required.', f['phoneno-update']);
            else if (f['phoneno-update'].value.trim().length < 10) setErr('phonenoerror-member', 'Min 10 digits.', f['phoneno-update']);
            if (!f['aadharno-update'].value.trim()) setErr('aadharnoerror-member', 'Aadhar is required.', f['aadharno-update']);
            else if (f['aadharno-update'].value.trim().length !== 12) setErr('aadharnoerror-member', 'Aadhar must be 12 digits.', f['aadharno-update']);
            
            // Education & Profession
            if (!document.getElementById('educationfield-member').value) setErr('educationerror-member', 'Education is required.', document.getElementById('education_input-member'));
            if (!f['profession-update'].value) setErr('professionerror-member', 'Profession is required.', document.getElementById('profession_input-member'));

            // Native Address
            if (!f['state-update'].value) setErr('stateerror-member', 'State is required.', f['state-update']);
            if (!f['district-update'].value) setErr('districterror-member', 'District is required.', f['district-update']);
            if (!f['taluk-update'].value) setErr('talukerror-member', 'Taluk is required.', f['taluk-update']);
            if (!f['panchayat-update'].value) setErr('panchayaterror-member', 'Panchayat is required.', f['panchayat-update']);
            if (!f['village-update'].value.trim()) setErr('villageerror-member', 'Village is required.', f['village-update']);
            if (!f['street-update'].value.trim()) setErr('streeterror-member', 'Street is required.', f['street-update']);
            if (!f['doorno-update'].value.trim()) setErr('doornoerror-member', 'Door number is required.', f['doorno-update']);
            if (!f['pincode-update'].value.trim()) setErr('pincodeerror-member', 'Pincode is required.', f['pincode-update']);

            // Current Address
            const curType = document.querySelector('input[name="cur_address_type-update"]:checked')?.value;
            if (!curType) {
                setErr('cur_address_type_error-member', 'Select address type.', document.getElementById('cur_address_tn-member'));
            } else if (curType === 'TamilNadu') {
                if (!f['cur_state-update'].value) setErr('cur_stateerror-member', 'State is required.', f['cur_state-update']);
                if (!f['cur_district-update'].value) setErr('cur_districterror-member', 'District is required.', f['cur_district-update']);
                if (!f['cur_taluk-update'].value) setErr('cur_talukerror-member', 'Taluk is required.', f['cur_taluk-update']);
                if (!f['cur_panchayat-update'].value) setErr('cur_panchayaterror-member', 'Panchayat is required.', f['cur_panchayat-update']);
                if (!f['cur_village-update'].value.trim()) setErr('cur_villageerror-member', 'Village is required.', f['cur_village-update']);
                if (!f['cur_street-update'].value.trim()) setErr('cur_streeterror-member', 'Street is required.', f['cur_street-update']);
                if (!f['cur_doorno-update'].value.trim()) setErr('cur_doornoerror-member', 'Door number is required.', f['cur_doorno-update']);
                if (!f['cur_pincode-update'].value.trim()) setErr('cur_pincodeerror-member', 'Pincode is required.', f['cur_pincode-update']);
                else if (f['cur_pincode-update'].value.trim().length !== 6) setErr('cur_pincodeerror-member', 'Must be 6 digits.', f['cur_pincode-update']);
            } else if (curType === 'OtherState' || curType === 'NRI') {
                if (curType === 'NRI' && !f['cur_nri_country-member'].value) setErr('cur_nri_countryerror-member', 'Country is required.', f['cur_nri_country-member']);
                if (!f['cur_nri_state-member'].value) setErr('cur_nri_stateerror-member', 'State is required.', f['cur_nri_state-member']);
                if (!f['cur_nri_city-member'].value) setErr('cur_nri_cityerror-member', 'City is required.', f['cur_nri_city-member']);
                if (!f['cur_nri_zip-member'].value.trim()) setErr('cur_nri_ziperror-member', 'Zip is required.', f['cur_nri_zip-member']);
                if (!f['cur_nri_fulladdress-member'].value.trim()) setErr('cur_nri_fulladdresserror-member', 'Full address is required.', f['cur_nri_fulladdress-member']);
            }

            if (!isValid && firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                if (firstInvalid.focus) firstInvalid.focus();
            }

            return isValid;
        }

        function uploadFileMember(file) {
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

        function uploadFileStyledMember(file, btnId) {
            let errorbox = document.querySelector(`.${file.name}`);
            let imagesize = 2000000;
            let uploadedimagesize = file.files[0] ? file.files[0].size : 0;
            let btn = document.getElementById(btnId);

            if (uploadedimagesize > imagesize) {
                if (errorbox) errorbox.textContent = "File Size should be below 2MB";
                file.value = "";
                if (btn) {
                    btn.classList.remove('file-selected');
                    btn.querySelector('.ps-file-label').textContent = "Choose file...";
                    btn.querySelector('.ps-file-icon').className = "bi bi-upload ps-file-icon";
                }
                return false;
            } else {
                if (errorbox) errorbox.textContent = "";
                if (btn && file.files[0]) {
                    btn.classList.add('file-selected');
                    btn.querySelector('.ps-file-label').textContent = file.files[0].name;
                    btn.querySelector('.ps-file-icon').className = "bi bi-check-circle-fill ps-file-icon";
                }
            }
        }






        // Profession searchable dropdown logic
        function filterProfessionOptionsMember(input) {
            const query = input.value.toLowerCase().trim();
            const dropdown = document.getElementById("profession_dropdown-member");
            const options = dropdown.querySelectorAll(".profession-option");
            let hasVisible = false;
            options.forEach(opt => {
                const text = opt.textContent.toLowerCase();
                if (!query || text.includes(query)) {
                    opt.style.display = "";
                    hasVisible = true;
                } else {
                    opt.style.display = "none";
                }
            });
            dropdown.style.display = hasVisible ? "block" : "none";
        }

        $(document).on("click", "#profession_dropdown-member .profession-option", function() {
            const value = this.getAttribute("data-value");
            const input = document.getElementById("profession_input-member");
            const hidden = document.getElementById("profession-member");
            
            input.value = this.textContent;
            hidden.value = value;
            document.getElementById("profession_dropdown-member").style.display = "none";
            
            // Trigger profession change logic
            handleProfessionChangeMember({value: value});
            validateMemberInput(hidden);
        });

        // Toggle readonly to allow typing when focused
        $("#profession_input-member").on("focus", function() {
            $(this).prop("readonly", false);
        }).on("blur", function() {
            $(this).prop("readonly", true);
        });

        // Handle profession wrapper click
        $(document).on("click", "#profession_wrapper-member", function() {
            $("#profession_input-member").focus();
            filterProfessionOptionsMember(document.getElementById("profession_input-member"));
        });

        // Close when clicking outside
        $(document).on("click", function(e) {
            if (!$(e.target).closest("#profession_wrapper-member").length && !$(e.target).closest("#profession_dropdown-member").length) {
                $("#profession_dropdown-member").hide();
            }
            if (!$(e.target).closest("#education_wrapper-member").length && !$(e.target).closest("#education_dropdown-member").length) {
                $("#education_dropdown-member").hide();
            }
        });

        // NRI Countries Logic
        var countriesDataMember = null;
        function loadCountriesDataMember() {
            if (countriesDataMember) return;
            $.getJSON('assets/countries_states_cities.json', function(data) {
                countriesDataMember = data;
                populateCountriesMember();
            });
        }

        function populateCountriesMember() {
            let select = document.getElementById('cur_nri_country-member');
            let currentVal = select.value;
            select.innerHTML = '<option value="">Select Country</option>';
            Object.values(countriesDataMember).forEach(c => {
                let opt = document.createElement('option');
                opt.value = c.name;
                opt.textContent = c.name;
                if (c.name === currentVal) opt.selected = true;
                select.appendChild(opt);
            });
        }

        function loadNRIStatesMember(countryName) {
            let select = document.getElementById('cur_nri_state-member');
            select.innerHTML = '<option value="">Select State</option>';
            let country = Object.values(countriesDataMember).find(c => c.name === countryName);
            if (country && country.states) {
                country.states.forEach(s => {
                    let opt = document.createElement('option');
                    opt.value = s.name;
                    opt.textContent = s.name;
                    select.appendChild(opt);
                });
            }
        }

        function loadNRICitiesMember(stateName) {
            let countryName = document.getElementById('cur_nri_country-member').value;
            let select = document.getElementById('cur_nri_city-member');
            select.innerHTML = '<option value="">Select City</option>';
            let country = Object.values(countriesDataMember).find(c => c.name === countryName);
            let state = country.states.find(s => s.name === stateName);
            if (state && state.cities) {
                state.cities.forEach(c => {
                    let opt = document.createElement('option');
                    opt.value = c.name;
                    opt.textContent = c.name;
                    select.appendChild(opt);
                });
            }
        }



        function copyPhoneToWhatsappMember() {
            document.getElementById('whatsappno-member').value = document.getElementById('phoneno-member').value;
        }

        $(document).ready(function() {
            // Try multiple paths
            loadCountriesDataMember();

            // Native Village Load
            const p1 = document.getElementById('panchayat-dropdown-member');
            if(p1 && p1.value) setDropdownVillageMember(p1, '<?= isset($member)?$member->Village:'' ?>');

            // Toggle blocks (without clearing dropdowns on initial load)
            toggleCurrentAddressTypeMember(true);

            // Cascade load for Current Address
            const curType = document.querySelector('input[name="cur_address_type-update"]:checked')?.value;
            if (curType === 'TamilNadu') {
                const curState = document.getElementById('cur_state-member');
                if (curState && curState.value) {
                    setDropdowndistrictsCurrentMember(
                        curState, 
                        '<?= $member->Curdistrict ?>', 
                        '<?= $member->Curtaluk ?>', 
                        '<?= $member->Curpanchayat ?>', 
                        '<?= $member->Curvillage ?>'
                    );
                }
            } else if (curType === 'OtherState' || curType === 'NRI') {
                if ('<?= $member->Curnricountry ?>') {
                    loadNRIStatesMember('<?= $member->Curnricountry ?>', '<?= $member->Curnristate ?>', '<?= $member->Curnricity ?>');
                }
            }

            renderEducationTagsMember();
        });

        // Extend districts current to handle full chain on load
        function setDropdowndistrictsCurrentMember(state, selectDistrict = null, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let state_id = state.value;

            // Clear dependent dropdowns
            if (!selectDistrict) {
                document.getElementById("cur_district-member").innerHTML = '<option value="">Select District</option>';
                document.getElementById("cur_taluk-member").innerHTML = '<option value="">Select Taluk</option>';
                document.getElementById("cur_panchayat-member").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_village-member").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_member").style.display = 'none';
                document.getElementById("cur_village_others_input_member").value = '';
            }

            if (!state_id) return;
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { state_id: state_id },
                success: function (result) {
                    let districtDropdown = document.getElementById("cur_district-member");
                    districtDropdown.innerHTML = result;
                    if (selectDistrict) {
                        districtDropdown.value = selectDistrict;
                        setDropdowntaluksCurrentMember(districtDropdown, selectTaluk, selectPanchayat, selectVillage);
                    }
                }
            });
        }

        function setDropdowntaluksCurrentMember(district, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let district_name = district.value;

             // Clear dependent dropdowns
            if (!selectTaluk) {
                document.getElementById("cur_taluk-member").innerHTML = '<option value="">Select Taluk</option>';
                document.getElementById("cur_panchayat-member").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_village-member").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_member").style.display = 'none';
                document.getElementById("cur_village_others_input_member").value = '';
            }

            if (!district_name) return;
            
            if (district_name === 'Others') {
                let talukDropdown = document.getElementById("cur_taluk-member");
                talukDropdown.innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                if (selectTaluk) {
                    talukDropdown.value = selectTaluk;
                    setDropdownpanchayatCurrentMember(talukDropdown, selectPanchayat, selectVillage);
                }
                toggleTalukOthersCurrentMember(talukDropdown);
                return;
            }

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { district_name: district_name },
                success: function (result) {
                    let talukDropdown = document.getElementById("cur_taluk-member");
                    talukDropdown.innerHTML = result;
                    talukDropdown.innerHTML += '<option value="Others">Others</option>';
                    if (selectTaluk) {
                        talukDropdown.value = selectTaluk;
                        setDropdownpanchayatCurrentMember(talukDropdown, selectPanchayat, selectVillage);
                    }
                    toggleTalukOthersCurrentMember(talukDropdown);
                },
                error: (err) => {
                    document.getElementById("cur_taluk-member").innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                }
            });
        }

        function toggleTalukOthersCurrentMember(selectEl) {
            const othersInput = document.getElementById('cur_taluk_others_input_member');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'cur_taluk-update');
            } else {
                othersInput.style.display = 'none';
                othersInput.value = '';
                othersInput.setAttribute('name', 'cur_taluk_others_update');
                selectEl.setAttribute('name', 'cur_taluk-update'); 
            }
        }

        function setDropdownpanchayatCurrentMember(taluk, selectPanchayat = null, selectVillage = null) {
            let taluk_name = taluk.value;

             // Clear dependent dropdowns
            if (!selectPanchayat) {
                document.getElementById("cur_panchayat-member").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_village-member").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_member").style.display = 'none';
                document.getElementById("cur_village_others_input_member").value = '';
            }

            if (!taluk_name) return;

            if (taluk_name === 'Others') {
                let panchayatDropdown = document.getElementById("cur_panchayat-member");
                panchayatDropdown.innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                if (selectPanchayat) {
                    panchayatDropdown.value = selectPanchayat;
                    setDropdownVillageCurrentMember(panchayatDropdown, selectVillage);
                }
                togglePanchayatOthersCurrentMember(panchayatDropdown);
                return;
            }

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { taluk_name: taluk_name },
                success: function (result) {
                    let panchayatDropdown = document.getElementById("cur_panchayat-member");
                    panchayatDropdown.innerHTML = result;
                    panchayatDropdown.innerHTML += '<option value="Others">Others</option>';
                    if (selectPanchayat) {
                        panchayatDropdown.value = selectPanchayat;
                        setDropdownVillageCurrentMember(panchayatDropdown, selectVillage);
                    }
                    togglePanchayatOthersCurrentMember(panchayatDropdown);
                },
                error: (err) => {
                    document.getElementById("cur_panchayat-member").innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                }
            });
        }

        function togglePanchayatOthersCurrentMember(selectEl) {
            const othersInput = document.getElementById('cur_panchayat_others_input_member');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'cur_panchayat-update');
            } else {
                othersInput.style.display = 'none';
                othersInput.value = '';
                othersInput.setAttribute('name', 'cur_panchayat_others_update');
                selectEl.setAttribute('name', 'cur_panchayat-update'); 
            }
        }

        function loadCountriesDataMember(isInitial = false) {
            if (countriesDataMember) {
                populateCountriesMember(isInitial);
                return;
            }
            $.getJSON('assets/countries_states_cities.json', function(data) {
                countriesDataMember = data;
                populateCountriesMember(isInitial);
            }).fail(function() {
                // Try parent path if needed or root
                $.getJSON('<?= base_url('assets/countries_states_cities.json') ?>', function(data) {
                    countriesDataMember = data;
                    populateCountriesMember(isInitial);
                });
            });
        }

        function populateCountriesMember(isInitial = false) {
            var select = document.getElementById('cur_nri_country-member');
            var selectedType = document.querySelector('input[name="cur_address_type-update"]:checked')?.value;
            var currentVal = select.value;

            if (selectedType === 'OtherState') {
                currentVal = "India";
            } else if (isInitial && !currentVal) {
                currentVal = '<?= $member->Curnricountry ?>';
            }

            select.innerHTML = '<option value="">Select Country</option>';
            Object.values(countriesDataMember).forEach(function(c) {
                var opt = document.createElement('option');
                opt.value = c.name;
                opt.textContent = c.name;
                if (c.name === currentVal) opt.selected = true;
                select.appendChild(opt);
            });
            if (currentVal) {
                var sVal = (isInitial) ? '<?= $member->Curnristate ?>' : '';
                var cityVal = (isInitial) ? '<?= $member->Curnricity ?>' : '';
                loadNRIStatesMember(currentVal, sVal, cityVal);
            }
        }

        function loadNRIStatesMember(countryName, selectState, selectCity) {
            if (!countriesDataMember) return;
            var select = document.getElementById('cur_nri_state-member');
            select.innerHTML = '<option value="">Select State</option>';
            var country = Object.values(countriesDataMember).find(function(c) { return c.name === countryName; });
            if (country && country.states) {
                country.states.forEach(function(s) {
                    var opt = document.createElement('option');
                    opt.value = s.name;
                    opt.textContent = s.name;
                    if (s.name === selectState) opt.selected = true;
                    select.appendChild(opt);
                });
            }
            if (selectState) {
                loadNRICitiesMember(selectState, selectCity);
            }
        }

        function loadNRICitiesMember(stateName, selectCity) {
            var countryName = document.getElementById('cur_nri_country-member').value || '<?= $member->Curnricountry ?>';
            var select = document.getElementById('cur_nri_city-member');
            select.innerHTML = '<option value="">Select City</option>';
            var country = Object.values(countriesDataMember).find(function(c) { return c.name === countryName; });
            if (!country) return;
            var state = country.states.find(function(s) { return s.name === stateName; });
            if (state && state.cities) {
                state.cities.forEach(function(c) {
                    var opt = document.createElement('option');
                    opt.value = c.name;
                    opt.textContent = c.name;
                    if (c.name === selectCity) opt.selected = true;
                    select.appendChild(opt);
                });
            }
        }
        function handleProfessionChangeMember(select) {
            let wrapper = document.getElementById('business-extra-wrapper-member');
            if (select && select.value === 'Others') {
                wrapper.style.display = 'block';
            } else {
                wrapper.style.display = 'none';
            }
        }
        function sendUpdateEmailOTP() {
            const email = document.getElementById('email-member').value.trim();
            const btn = document.getElementById('verify_email_btn-member');
            const err = document.getElementById('emailerror-member');
            
            if (!email) {
                err.innerHTML = "Please enter email to verify.";
                return;
            }
            
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailRegex.test(email)) {
                err.innerHTML = "Invalid email format.";
                return;
            }

            btn.disabled = true;
            btn.innerText = "Sending...";
            err.innerHTML = "";

            $.ajax({
                url: "<?= base_url('members/send-registration-otp') ?>",
                type: "POST",
                data: { email: email },
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        document.getElementById('otp_section-member').style.display = 'block';
                        btn.style.display = 'none';
                        alert(response.message);
                    } else {
                        btn.disabled = false;
                        btn.innerText = "Verify";
                        err.innerHTML = response.message;
                    }
                },
                error: function() {
                    btn.disabled = false;
                    btn.innerText = "Verify";
                    err.innerHTML = "Error sending OTP. Please try again.";
                }
            });
        }

        function verifyUpdateEmailOTP() {
            const otp = document.getElementById('email_otp-member').value.trim();
            const email = document.getElementById('email-member').value.trim();
            const err = document.getElementById('otperror-member');

            if (!otp) {
                err.innerHTML = "Please enter OTP.";
                return;
            }

            $.ajax({
                url: "<?= base_url('members/verify-registration-otp') ?>",
                type: "POST",
                data: { email: email, otp: otp },
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        document.getElementById('otp_section-member').style.display = 'none';
                        document.getElementById('email_verified_badge-member').style.display = 'block';
                        document.getElementById('is_email_verified-member').value = "1";
                        document.getElementById('email-member').readOnly = true;
                        document.getElementById('emailerror-member').innerHTML = "";
                        alert(response.message);
                    } else {
                        err.innerHTML = response.message;
                    }
                },
                error: function() {
                    err.innerHTML = "Error verifying OTP.";
                }
            });
        }

        function checkPhoneVerificationMember() {
            const phone = document.getElementById('phoneno-member').value.trim();
            const btn = document.getElementById('verify_phone_btn-member');
            const err = document.getElementById('phonenoerror-member');
            const verifiedBadge = document.getElementById('phone_verified_badge-member');
            const isVerifiedInput = document.getElementById('is_phone_verified-member');

            if (phone.length !== 10) {
                err.innerHTML = "Please enter a valid 10-digit mobile number.";
                return;
            }

            btn.disabled = true;
            btn.innerText = "Checking...";

            $.ajax({
                type: "post",
                url: "<?= base_url('members/checkExistphoneno') ?>",
                data: { 
                    "phoneno": phone,
                    "member_id": "<?= $member->Familymembershipid ?>"
                },
                success: (result) => {
                    if (result.trim() === "true") {
                        err.innerHTML = "Phone number already exists.";
                        btn.disabled = false;
                        btn.innerText = "Verify";
                        btn.style.display = 'inline-block';
                    } else {
                        // For now, since no SMS gateway is available, 
                        // we mark as verified if it is unique and valid format.
                        err.innerHTML = "";
                        btn.style.display = 'none';
                        verifiedBadge.style.display = 'block';
                        isVerifiedInput.value = "1";
                        alert("Mobile number verified successfully (Uniqueness check).");
                    }
                },
                error: () => {
                    btn.disabled = false;
                    btn.innerText = "Verify";
                    err.innerHTML = "Error verifying phone number.";
                }
            });
        }

        $(document).ready(function() {
            // Initial Cascading Load (Native)
            let s1 = document.getElementById('states-dropdown-member');
            if (s1 && s1.value) {
                setDropdowndistrictsMember(
                    s1, 
                    '<?= $member->District ?>', 
                    '<?= $member->Taluk ?>', 
                    '<?= $member->Panchayat ?>', 
                    '<?= $member->Village ?>'
                );
            }

            // Set Current Address Blocks
            toggleCurrentAddressTypeMember(true);

            // Cascade load for Current Address
            const curType = document.querySelector('input[name="cur_address_type-update"]:checked')?.value;
            if (curType === 'TamilNadu') {
                const curState = document.getElementById('cur_state-member');
                if (curState && curState.value) {
                    setDropdowndistrictsCurrentMember(
                        curState, 
                        '<?= $member->Curdistrict ?>', 
                        '<?= $member->Curtaluk ?>', 
                        '<?= $member->Curpanchayat ?>', 
                        '<?= $member->Curvillage ?>'
                    );
                }
            } else if (curType === 'OtherState' || curType === 'NRI') {
                if ('<?= $member->Curnricountry ?>' && typeof loadNRIStatesMember === 'function') {
                    loadNRIStatesMember('<?= $member->Curnricountry ?>', '<?= $member->Curnristate ?>', '<?= $member->Curnricity ?>');
                }
            }
        });
    </script>







