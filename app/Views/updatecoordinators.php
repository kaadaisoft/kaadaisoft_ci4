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
        #coordsubmitbutton {
            color: white !important;
            font-weight: 700;
            border: none;
            background: linear-gradient(135deg, #795548 0%, #3E2723 100%);
            padding: 8px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        #coordsubmitbutton:disabled {
            background: #ccc;
            cursor: not-allowed;
            box-shadow: none;
        }

        #education_wrapper-update, #education_wrapper-coord {
            min-height: 38px;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 5px;
        }

        #education_tags-update .badge, #education_tags-coord .badge {
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
            display: flex; align-items: center; gap: 8px; width: 100%;
            padding: 7px 12px; font-size: 13px; border: 1.5px solid #ced4da;
            border-radius: 6px; background-color: #f8f9fa; cursor: pointer;
            color: #6c757d; transition: border-color 0.2s, background-color 0.2s;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .ps-file-upload-btn:hover { background-color: #e9ecef; border-color: #86b7fe; }
        .ps-file-upload-btn .ps-file-icon { flex-shrink: 0; font-size: 15px; color: #495057; }
        .ps-file-upload-btn .ps-file-label { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; flex: 1; }
        .ps-file-upload-btn.file-selected { border-color: #0d6efd; background-color: #e7f1ff; color: #0a3d91; font-weight: 500; }
    </style>

    <?php if (isset($coordinator)) : ?>
        <div class="bg-custom-header py-3 px-4 border-bottom shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-dark font-weight-bold">
                    <?php 
                        $is_self = ($coordinator->Familymembershipid == session()->get('Kaadaisoft_userId'));
                        $is_head = ($coordinator->MemberRole == 'Head');
                        if ($is_self) {
                            $icon = 'fa-user-gear';
                            $title = 'Update My Details';
                        } else {
                            $icon = $is_head ? 'fa-user-gear' : 'fa-users';
                            $title = $is_head ? 'Update Coordinator Details' : 'Update Family Member Details';
                        }
                    ?>
                    <i class="fa-solid <?= $icon ?> me-2"></i><?= $title ?>: <small class="text-primary"><?= $coordinator->Familymembershipid ?></small>
                </h4>
                <button onclick="hideupdatecoordsform()" class="btn btn-close"></button>
            </div>
        </div>

        <form name="coordinatorregistration-coord" id="registration-form" class="p-4" onsubmit="return validateCoordForm()" action="<?= base_url("members/updateMember"); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">

            <input hidden value="<?= $coordinator->Familymembershipid ?>" id="membershipid-coord" type="text" name="membershipid-coord">
            <input hidden value="coordinator" type="text" name="path">
            <input hidden value="updatecoordinator" type="text" name="reason">
            
            <!-- Verification Tracking -->
            <input type="hidden" id="is_email_verified-coord" name="is_email_verified-coord" value="1">
            <input type="hidden" id="is_phone_verified-coord" name="is_phone_verified-coord" value="1">
            <input type="hidden" id="original_email-coord" value="<?= esc($coordinator->Email) ?>">
            <input type="hidden" id="original_phone-coord" value="<?= esc($coordinator->Phonenumber) ?>">


            <!-- Basic Details Section -->
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h5 class="mb-4 section-title">
                        <i class="fa-solid fa-user text-primary me-2"></i>Basic Details
                    </h5>

                    <div class="row g-3">
                        <!-- Relationship - For Coordinator, usually Head or specific role, but we follow member fields -->
                        <div class="col-md-4">
                            <label for="relationship-coord">Relationship</label>
                            <select id="relationship-coord" class="form-select" name="relationship-coord" onchange="validateCoordInput(this); toggleCustomRelationshipCoord(this)">
                                <option value="">Select Relationship</option>
                                <option value="Head" <?= ($coordinator->MemberRole == 'Head') ? 'selected' : '' ?>>Head</option>
                                <option value="Grand Father" <?= ($coordinator->MemberRole == 'Grand Father') ? 'selected' : '' ?>>Grand Father</option>
                                <option value="Grand Mother" <?= ($coordinator->MemberRole == 'Grand Mother') ? 'selected' : '' ?>>Grand Mother</option>
                                <option value="Father" <?= ($coordinator->MemberRole == 'Father') ? 'selected' : '' ?>>Father</option>
                                <option value="Mother" <?= ($coordinator->MemberRole == 'Mother') ? 'selected' : '' ?>>Mother</option>
                                <option value="Husband" <?= ($coordinator->MemberRole == 'Husband') ? 'selected' : '' ?>>Husband</option>
                                <option value="Wife" <?= ($coordinator->MemberRole == 'Wife') ? 'selected' : '' ?>>Wife</option>
                                <option value="Son" <?= ($coordinator->MemberRole == 'Son') ? 'selected' : '' ?>>Son</option>
                                <option value="Daughter" <?= ($coordinator->MemberRole == 'Daughter') ? 'selected' : '' ?>>Daughter</option>
                                <option value="Son-in-law" <?= ($coordinator->MemberRole == 'Son-in-law') ? 'selected' : '' ?>>Son-in-law</option>
                                <option value="Daughter-in-law" <?= ($coordinator->MemberRole == 'Daughter-in-law') ? 'selected' : '' ?>>Daughter-in-law</option>
                                <option value="Brother" <?= ($coordinator->MemberRole == 'Brother') ? 'selected' : '' ?>>Brother</option>
                                <option value="Sister" <?= ($coordinator->MemberRole == 'Sister') ? 'selected' : '' ?>>Sister</option>
                                <?php 
                                    $standard_roles = ["Head", "Grand Father", "Grand Mother", "Father", "Mother", "Husband", "Wife", "Son", "Daughter", "Son-in-law", "Daughter-in-law", "Brother", "Sister"];
                                    $is_custom = !in_array($coordinator->MemberRole, $standard_roles) && !empty($coordinator->MemberRole);
                                ?>
                                <option value="Other" <?= $is_custom ? 'selected' : '' ?>>Other</option>
                            </select>
                            <div id="custom_rel_div-coord" class="mt-2" style="display:<?= $is_custom ? 'block' : 'none' ?>;">
                                <label for="custom_relationship-coord">Specify Relationship</label>
                                <input type="text" id="custom_relationship-coord" name="custom_relationship-coord" class="form-control" value="<?= $is_custom ? $coordinator->MemberRole : '' ?>" onkeyup="validateCoordInput(this)">
                                <small id="custom_relationshiperror-coord" class="text-danger"></small>
                            </div>
                            <small id="relationshiperror-coord" class="text-danger"></small>
                        </div>

                        <!-- Name -->
                        <div class="col-md-4">
                            <label for="name-coord">Name</label>
                            <input onkeyup="validateCoordInput(this)" id="name-coord" class="form-control" type="text" name="name-coord" value="<?= $coordinator->Name ?>">
                            <small id="nameerror-coord" class="text-danger"></small>
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-4">
                            <label for="phoneno-coord">Phone Number</label>
                            <div class="input-group">
                                <input id="phoneno-coord" class="form-control" type="number" name="phoneno-coord" value="<?= $coordinator->Phonenumber ?>" onkeyup="validateCoordInput(this)">
                                <button type="button" id="verify-phone-btn-coord" class="btn btn-outline-primary" style="display:none;" onclick="checkPhoneVerificationCoord()">Verify</button>
                                <span id="phone-verified-badge-coord" class="input-group-text text-success" title="Verified"><i class="fa-solid fa-circle-check"></i></span>
                            </div>
                            <small id="phonenoerror-coord" class="text-danger"></small>
                        </div>

                        <!-- Aadhar Number -->
                        <div class="col-md-4">
                            <label for="aadharno-coord">Aadhar Number</label>
                            <input id="aadharno-coord" onkeyup="validateCoordInput(this)" onkeypress="if(this.value.length == 12) return false" class="form-control" type="number" name="aadharno-coord" value="<?= $coordinator->Aadharnumber ?>">
                            <small id="aadharnoerror-coord" class="text-danger"></small>
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-md-4">
                            <label for="dob-coord">Date Of Birth</label>
                            <input id="dob-coord" class="form-control" type="date" name="dob-coord" value="<?= $coordinator->Dob ?>" onchange="validateCoordInput(this)">
                            <small id="doberror-coord" class="text-danger"></small>
                        </div>

                        <!-- Gender -->
                        <div class="col-md-4">
                            <label class="d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="gender_male-coord" name="gender-coord" value="Male" <?= ($coordinator->Gender == 'Male') ? 'checked' : '' ?> onchange="validateCoordInput(this)">
                                <label class="form-check-label" for="gender_male-coord">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="gender_female-coord" name="gender-coord" value="Female" <?= ($coordinator->Gender == 'Female') ? 'checked' : '' ?> onchange="validateCoordInput(this)">
                                <label class="form-check-label" for="gender_female-coord">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="gender_other-coord" name="gender-coord" value="Other" <?= ($coordinator->Gender == 'Other') ? 'checked' : '' ?> onchange="validateCoordInput(this)">
                                <label class="form-check-label" for="gender_other-coord">Other</label>
                            </div>
                            <div><small id="gendererror-coord" class="text-danger"></small></div>
                        </div>

                        <!-- Blood Group -->
                        <div class="col-md-4">
                            <label for="bloodgroup-coord">Blood Group</label>
                            <select id="bloodgroup-coord" class="form-select" name="bloodgroup-coord" onchange="validateCoordInput(this)">
                                <option value="">Select Blood Group</option>
                                <?php $bgroups = ["A+", "A-", "B+", "B-", "O+", "O-", "AB+", "AB-"]; ?>
                                <?php foreach ($bgroups as $bg): ?>
                                    <option value="<?= $bg ?>" <?= ($coordinator->Bloodgroup == $bg) ? 'selected' : '' ?>><?= $bg ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small id="bloodgrouperror-coord" class="text-danger"></small>
                        </div>

                        <!-- Email -->
                        <div class="col-md-4">
                            <label for="email-coord">Email</label>
                            <div class="input-group">
                                <input id="email-coord" onkeyup="validateCoordInput(this)" class="form-control" type="email" name="email-coord" value="<?= $coordinator->Email ?>">
                                <button type="button" id="verify-email-btn-coord" class="btn btn-outline-primary" style="display:none;" onclick="sendUpdateEmailOTPCoord()">Verify</button>
                                <span id="email-verified-badge-coord" class="input-group-text text-success" title="Verified"><i class="fa-solid fa-circle-check"></i></span>
                            </div>
                            <small id="emailerror-coord" class="text-danger"></small>
                        </div>

                        <!-- Email OTP Section (Coordinator) -->
                        <div class="col-md-4" id="email-otp-section-coord" style="display:none;">
                            <label for="email-otp-coord">Enter OTP Sent to Email <span class="mandatory-star">*</span></label>
                            <div class="input-group">
                                <input type="text" id="email-otp-coord" class="form-control" placeholder="6-digit OTP" maxlength="6">
                                <button type="button" class="btn btn-success" onclick="verifyUpdateEmailOTPCoord()">Verify OTP</button>
                            </div>
                            <small id="email-otp-error-coord" class="text-danger"></small>
                        </div>

                        <!-- WhatsApp Number -->
                        <div class="col-md-4">
                            <label for="whatsappno-coord">WhatsApp Number</label>
                            <div class="input-group">
                                <input id="whatsappno-coord" class="form-control" type="number" name="whatsappno-coord" value="<?= $coordinator->Whatsappnumber ?>" onkeyup="validateCoordInput(this)">
                                <button class="btn btn-outline-secondary" type="button" onclick="copyPhoneToWhatsappCoord()">Same as Phone</button>
                            </div>
                            <small id="whatsappnoerror-coord" class="text-danger"></small>
                        </div>

                        <!-- Married status -->
                        <div class="col-md-4">
                            <label class="d-block">Married</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="married_yes-coord" name="married-coord" value="Yes" <?= ($coordinator->Married == 'Yes') ? 'checked' : '' ?> onchange="validateCoordInput(this)">
                                <label class="form-check-label" for="married_yes-coord">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="married_no-coord" name="married-coord" value="No" <?= ($coordinator->Married == 'No') ? 'checked' : '' ?> onchange="validateCoordInput(this)">
                                <label class="form-check-label" for="married_no-coord">No</label>
                            </div>
                            <div><small id="marriederror-coord" class="text-danger"></small></div>
                        </div>

                        <!-- Alive Status -->
                        <div class="col-md-4">
                            <label class="d-block">Alive Status</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="alive_yes-coord" name="is_dead-coord" value="0" <?= (!isset($coordinator->is_dead) || $coordinator->is_dead == 0) ? 'checked' : '' ?> onchange="validateCoordInput(this); toggleUpcomingHeadCoord()">
                                <label class="form-check-label" for="alive_yes-coord">Alive</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="alive_no-coord" name="is_dead-coord" value="1" <?= (isset($coordinator->is_dead) && $coordinator->is_dead == 1) ? 'checked' : '' ?> onchange="validateCoordInput(this); toggleUpcomingHeadCoord()">
                                <label class="form-check-label" for="alive_no-coord">Dead</label>
                            </div>
                            <div><small id="alivedeaderror-coord" class="text-danger"></small></div>
                        </div>

                        <!-- Upcoming Head -->
                        <div class="col-md-4" id="upcoming_head_div-coord" style="display:<?= ($coordinator->MemberRole == 'Head' && isset($coordinator->is_dead) && $coordinator->is_dead == 1) ? 'block' : 'none' ?>;">
                            <label for="upcoming_head-coord">Upcoming Head (Select to Transfer) <span class="mandatory-star">*</span></label>
                            <select id="upcoming_head-coord" class="form-select" name="upcoming_head-coord" onchange="validateCoordInput(this)">
                                <option value="">Select New Head</option>
                                <?php if(isset($family_members)): ?>
                                    <?php foreach($family_members as $fm): ?>
                                        <?php if($fm->Familymembershipid != $coordinator->Familymembershipid && (!isset($fm->is_dead) || $fm->is_dead == 0)): ?>
                                            <option value="<?= $fm->Familymembershipid ?>"><?= $fm->Name ?> (<?= $fm->MemberRole ?>)</option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small id="upcomingheaderror-coord" class="text-danger"></small>
                            <small class="text-muted d-block">Selecting a member here will make them the new Family Head.</small>
                        </div>

                        <!-- Valuvu -->
                        <div class="col-md-4">
                            <label for="valuvu-coord">Valuvu</label>
                            <input id="valuvu-coord" onkeyup="validateCoordInput(this)" class="form-control" type="text" name="valuvu-coord" value="<?= $coordinator->Valuvu ?>">
                            <small id="valuvuerror-coord" class="text-danger"></small>
                        </div>

                        <!-- Thottam -->
                        <div class="col-md-4">
                            <label for="thottam-coord">Thottam</label>
                            <input id="thottam-coord" onkeyup="validateCoordInput(this)" class="form-control" type="text" name="thottam-coord" value="<?= $coordinator->Thottam ?>">
                            <small id="thottamerror-coord" class="text-danger"></small>
                        </div>

                        <!-- Kulam -->
                        <div class="col-md-4">
                            <label for="kulam-coord">Kulam</label>
                            <select id="kulam-coord" class="form-select" name="kulam-coord">
                                <option value="Poondurai Kaadai" <?= ($coordinator->Kulam == 'Poondurai Kaadai') ? 'selected' : '' ?>>Poondurai Kaadai</option>
                                <?php 
                                    $kulams = ["Aanthuvan Kulam", "Azhagu Kulam", "Aathe Kulam", "Aanthai Kulam", "Aadar Kulam", "Aavan Kulam", "Eenjan Kulam", "Ozukkar Kulam", "Oothaalar Kulam", "Kannakkan Kulam", "Kannan Kulam", "Kannaanthai Kulam", "Kaadai Kulam", "Kaari Kulam", "Keeran Kulam", "Kuzhlaayan Kulam", "Koorai Kulam", "Koovendhar Kulam", "Saathanthai Kulam", "Sellan Kulam", "Semban Kulam", "Sengkannan Kulam", "Sembuthan Kulam", "Senkunnier Kulam", "Sevvaayar Kulam", "Cheran Kulam", "Chedan Kulam", "Dananjayan Kulam", "Thazhinji Kulam", "Thooran Kulam", "Devendran Kulam", "Thoodar Kulam", "Neerunniyar Kulam", "Pavazhalar Kulam", "Panayan Kulam", "Pathuman Kulam", "Payiran Kulam", "Panagkaadar Kulam", "Pathariar Kulam", "Pandiyan Kulam", "Pillar Kulam", "Poosan Kulam", "Poochanthai Kulam", "Periyan Kulam", "Perunkudiyaan Kulam", "Porulaanthai Kulam", "Ponnar Kulam", "Maniyan Kulam", "Mayilar Kulam", "Maadar Kulam", "Mutthan Kulam", "Muzhukathan Kulam", "Medhi Kulam", "Vannakkan Kulam", "Villiyar Kulam", "Vilayan Kulam", "Vizhiyar Kulam", "Venduvan Kulam", "Vennag Kulam", "Vellampar Kulam"];
                                    foreach($kulams as $k) {
                                        echo "<option value='$k' ".($coordinator->Kulam == $k ? 'selected' : '').">$k</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <!-- Exist Family ID -->
                         <div class="col-md-4">
                            <label for="existfamilyid-coord">Exist Family ID</label>
                            <input id="existfamilyid-coord" onkeyup="validateCoordInput(this)" class="form-control" type="text" name="existfamilyid-coord" value="<?= $coordinator->Existfamilyid ?>">
                            <small id="familyiderror-coord" class="text-danger"></small>
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
                            <label for="education_input-coord">Education</label>
                            <div class="border rounded p-1 bg-white d-flex align-items-center flex-wrap gap-1" id="education_wrapper-coord" style="cursor: text; min-height: 38px;">
                                <div id="education_tags-coord" class="d-flex flex-wrap gap-1"></div>
                                <input type="text" id="education_input-coord"
                                    class="form-control form-control-sm border-0 bg-transparent shadow-none"
                                    placeholder="Type and select education"
                                    onfocus="filterEducationOptionsCoord(this)"
                                    oninput="filterEducationOptionsCoord(this)"
                                    onclick="filterEducationOptionsCoord(this)"
                                    autocomplete="off"
                                    style="flex: 1; min-width: 120px;">
                            </div>
                            <small id="educationerror-coord" class="text-danger"></small>
                            <div id="education_hidden_container-coord"></div>
                            <input type="hidden" id="educationfield-coord" name="education-coord">
                            <div class="border rounded mt-1 bg-white shadow-sm" id="education_dropdown-coord" style="max-height:250px; overflow:auto; display:none; position:absolute; width: calc(100% - 1.5rem); left: 0.75rem; z-index: 1001;">
                                <div class="education-option p-2 border-bottom" data-value="SSLC">SSLC</div>
                                <div class="education-option p-2 border-bottom" data-value="HSC">HSC</div>
                                <div class="education-option p-2 border-bottom" data-value="Diploma">Diploma</div>
                                <div class="education-option p-2 border-bottom" data-value="ITI">ITI</div>
                                
                                <div class="education-option p-2 border-bottom" data-value="B.A">B.A</div>
                                <div class="education-option p-2 border-bottom" data-value="B.Sc">B.Sc</div>
                                <div class="education-option p-2 border-bottom" data-value="B.Com">B.Com</div>
                                <div class="education-option p-2 border-bottom" data-value="BBA">BBA</div>
                                <div class="education-option p-2 border-bottom" data-value="BCA">BCA</div>
                                <div class="education-option p-2 border-bottom" data-value="B.E">B.E</div>
                                <div class="education-option p-2 border-bottom" data-value="B.Tech">B.Tech</div>
                                <div class="education-option p-2 border-bottom" data-value="MBBS">MBBS</div>
                                <div class="education-option p-2 border-bottom" data-value="BDS">BDS</div>
                                <div class="education-option p-2 border-bottom" data-value="B.Pharm">B.Pharm</div>
                                <div class="education-option p-2 border-bottom" data-value="B.Ed">B.Ed</div>
                                <div class="education-option p-2 border-bottom" data-value="LLB">LLB</div>
                                <div class="education-option p-2 border-bottom" data-value="B.Arch">B.Arch</div>

                                <div class="education-option p-2 border-bottom" data-value="M.A">M.A</div>
                                <div class="education-option p-2 border-bottom" data-value="M.Sc">M.Sc</div>
                                <div class="education-option p-2 border-bottom" data-value="M.Com">M.Com</div>
                                <div class="education-option p-2 border-bottom" data-value="MBA">MBA</div>
                                <div class="education-option p-2 border-bottom" data-value="MCA">MCA</div>
                                <div class="education-option p-2 border-bottom" data-value="M.E">M.E</div>
                                <div class="education-option p-2 border-bottom" data-value="M.Tech">M.Tech</div>
                                <div class="education-option p-2 border-bottom" data-value="MD">MD</div>
                                <div class="education-option p-2 border-bottom" data-value="MS">MS</div>
                                <div class="education-option p-2 border-bottom" data-value="MDS">MDS</div>
                                <div class="education-option p-2 border-bottom" data-value="M.Pharm">M.Pharm</div>
                                <div class="education-option p-2 border-bottom" data-value="M.Ed">M.Ed</div>
                                <div class="education-option p-2 border-bottom" data-value="LLM">LLM</div>
                                
                                <div class="education-option p-2 border-bottom" data-value="M.Phil">M.Phil</div>
                                <div class="education-option p-2 border-bottom" data-value="Ph.D">Ph.D</div>
                                <div class="education-option p-2 border-bottom" data-value="Others">Others</div>
                            </div>
                        </div>

                        <!-- Manual Education Input (Hidden initially) -->
                        <div id="education_others_wrapper-coord" style="display:none;" class="col-md-4">
                            <label for="education_others_input-coord">Other Education</label>
                            <div class="input-group input-group-sm">
                                <input type="text" id="education_others_input-coord" 
                                    class="form-control" 
                                    placeholder="Enter education manually">
                                <button class="btn btn-primary" type="button" onclick="addManualEducationCoord()">Add</button>
                            </div>
                        </div>

                        <!-- Profession -->
                        <div class="col-md-4">
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
                                $display_prof = $coordinator->Profession;
                                if (isset($profession_map[$coordinator->Profession])) {
                                    $display_prof = $profession_map[$coordinator->Profession];
                                }
                            ?>
                            <label for="profession_input-coord">Profession</label>
                            <div class="border rounded p-1 bg-white" id="profession_wrapper-coord" style="cursor: pointer;">
                                <input type="text" id="profession_input-coord" 
                                    class="form-control border-0 bg-transparent" 
                                    placeholder="Type or click to select profession"
                                    onfocus="filterProfessionOptionsCoord(this)"
                                    oninput="filterProfessionOptionsCoord(this)"
                                    readonly 
                                    style="cursor: pointer;"
                                    value="<?= esc($display_prof) ?>">
                                <input type="hidden" id="profession-coord" name="profession-coord" value="<?= esc($coordinator->Profession) ?>">
                            </div>
                            <div class="border rounded mt-1 bg-white" id="profession_dropdown-coord" 
                                style="max-height:250px; overflow:auto; display:none; position:absolute; z-index:1001; width: calc(33.33% - 20px);">
                                <?php 
                                    foreach($profession_map as $val => $text) {
                                        echo "<div class='profession-option p-2 border-bottom' data-value='$val'>$text</div>";
                                    }
                                ?>
                            </div>
                            <small id="professionerror-coord" class="text-danger"></small>
                        </div>


                        <!-- Business -->
                        <div class="col-md-4" id="business-extra-wrapper-coord" style="display:<?= ($coordinator->Profession == 'Others') ? 'block' : 'none' ?>;">
                            <label for="business-coord">Business Name</label>
                            <input type="text" id="business-coord" name="business-coord" class="form-control" value="<?= $coordinator->Business ?>">
                            <label for="business_website-coord" class="mt-2">Business Website</label>
                            <input type="text" id="business_website-coord" name="business_website-coord" class="form-control" value="<?= $coordinator->BusinessWebsite ?>">
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
                            <label for="states-dropdown-coord">State</label>
                            <select id="states-dropdown-coord" onchange="setDropdowndistrictsCoord(this); validateCoordInput(this)" class="form-select" name="state-coord">
                                <option value=''>Select State</option>
                                <?php if (isset($states)): ?>
                                    <?php foreach ($states as $state): ?>
                                        <option value='<?= $state->state_id ?>' <?= ($coordinator->state_id == $state->state_id) ? 'selected' : '' ?>><?= $state->state_title ?></option>
                                    <?php endforeach; ?>
                                <?php endif ?>
                            </select>
                            <small id="stateerror-coord" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="districts-dropdown-coord">District</label>
                            <select id="districts-dropdown-coord" onchange="setDropdowntaluksCoord(this); validateCoordInput(this)" class="form-select" name="district-coord">
                                <option value="">Select District</option>
                                <?php if (isset($districts)): foreach ($districts as $d): ?>
                                    <option value="<?= $d->district_name ?>" <?= ($coordinator->District == $d->district_name) ? 'selected' : '' ?>><?= $d->district_name ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <small id="districterror-coord" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="taluks-dropdown-coord">Taluk</label>
                            <select id="taluks-dropdown-coord" onchange="toggleTalukOthersCoord(this); setDropdownpanchayatCoord(this); validateCoordInput(this)" class="form-select" name="taluk-coord">
                                <option value="">Select Taluk</option>
                                <?php if (isset($taluks)): foreach ($taluks as $t): ?>
                                    <option value="<?= $t->taluk_name ?>" <?= ($coordinator->Taluk == $t->taluk_name) ? 'selected' : '' ?>><?= $t->taluk_name ?></option>
                                <?php endforeach; endif; ?>
                                <option value="Others" <?= (isset($coordinator->Taluk) && !empty($coordinator->Taluk) && !in_array($coordinator->Taluk, array_column($taluks ?? [], 'taluk_name')) && $coordinator->Taluk !== '') ? 'selected' : '' ?>>Others</option>
                            </select>
                            <input type="text" id="taluk_others_input_coord" name="taluk_others_coord" 
                                class="form-control mt-2" 
                                placeholder="Enter taluk name" 
                                style="display:none;" 
                                onkeyup="validateCoordInput(this)">
                            <small id="talukerror-coord" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="panchayat-dropdown-coord">Panchayat</label>
                            <select id="panchayat-dropdown-coord" onchange="togglePanchayatOthersCoord(this); setDropdownVillageCoord(this); validateCoordInput(this)" class="form-select" name="panchayat-coord">
                                <option value="">Select Panchayat</option>
                                <?php if (isset($panchayats)): foreach ($panchayats as $p): ?>
                                    <option value="<?= $p->panchayat_name ?>" <?= ($coordinator->Panchayat == $p->panchayat_name) ? 'selected' : '' ?>><?= $p->panchayat_name ?></option>
                                <?php endforeach; endif; ?>
                                <option value="Others" <?= (isset($coordinator->Panchayat) && !empty($coordinator->Panchayat) && !in_array($coordinator->Panchayat, array_column($panchayats ?? [], 'panchayat_name')) && $coordinator->Panchayat !== '') ? 'selected' : '' ?>>Others</option>
                            </select>
                            <input type="text" id="panchayat_others_input_coord" name="panchayat_others_coord" 
                                class="form-control mt-2" 
                                placeholder="Enter panchayat name" 
                                style="display:none;" 
                                onkeyup="validateCoordInput(this)">
                            <small id="panchayaterror-coord" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="village-coord">Village</label>
                            <select id="village-coord" onchange="toggleVillageOthersCoord(this); validateCoordInput(this)" class="form-select" name="village-coord">
                                <option value="<?= $coordinator->Village ?>"><?= $coordinator->Village ?: 'Select Village' ?></option>
                                <option value="Others">Others</option>
                            </select>
                           <input type="text" id="village_others_input_coord" name="village_others_coord" 
                                class="form-control mt-2" 
                                placeholder="Enter village name" 
                                style="display:none;" 
                                onkeyup="validateCoordInput(this)">
                            <small id="villageerror-coord" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="street-coord">Street</label>
                            <input id="street-coord" onkeyup="validateCoordInput(this)" class="form-control" type="text" name="street-coord" value="<?= $coordinator->Street ?>">
                            <small id="streeterror-coord" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="doorno-coord">Door No</label>
                            <input id="doorno-coord" onkeyup="validateCoordInput(this)" class="form-control" type="text" name="doorno-coord" value="<?= $coordinator->Doornumber ?>">
                            <small id="doornoerror-coord" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="pincode-coord">Pin Code</label>
                            <input id="pincode-coord" onkeyup="validateCoordInput(this)" 
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)"
                                class="form-control" type="text" inputmode="numeric" name="pincode-coord" maxlength="6" value="<?= $coordinator->Pincode ?>">
                            <small id="pincodeerror-coord" class="text-danger"></small>
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
                        <button type="button" id="btn_same_as_native-coord" class="btn btn-outline-success btn-sm" onclick="copyNativeAddressCoord()" style="display: <?= ($coordinator->Curaddresstype == 'India') ? 'inline-block' : 'none' ?>;">
                            Same as Native Address
                        </button>
                    </div>

                    <div class="mb-3">
                        <label class="d-block">Current Address Type <span class="text-danger">*</span></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-coord" id="cur_address_tn-coord" value="TamilNadu" <?= ($coordinator->Curaddresstype == 'TamilNadu' || ($coordinator->Curaddresstype == 'India' && $coordinator->Curstate == 35)) ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeCoord()">
                            <label class="form-check-label" for="cur_address_tn-coord">Tamil Nadu</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-coord" id="cur_address_others-coord" value="OtherState" <?= ($coordinator->Curaddresstype == 'OtherState' || ($coordinator->Curaddresstype == 'India' && $coordinator->Curstate != 35 && $coordinator->Curstate != '')) ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeCoord()">
                            <label class="form-check-label" for="cur_address_others-coord">Other State</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-coord" id="cur_address_nri-coord" value="NRI" <?= ($coordinator->Curaddresstype == 'NRI') ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeCoord()">
                            <label class="form-check-label" for="cur_address_nri-coord">NRI</label>
                        </div>
                        <small id="cur_address_type_error-coord" class="text-danger"></small>
                    </div>

                    <!-- INDIA CURRENT ADDRESS BLOCK -->
                    <div id="cur_india_block-coord" style="display:<?= ($coordinator->Curaddresstype == 'TamilNadu' || ($coordinator->Curaddresstype == 'India' && $coordinator->Curstate == 35)) ? 'block' : 'none' ?>;">
                        <div class="row g-3">
                            <div class="col-md-3" id="cur_state_container-coord" style="display: <?= ($coordinator->Curaddresstype == 'OtherState' || ($coordinator->Curaddresstype == 'India' && $coordinator->Curstate != 35)) ? 'block' : 'none' ?>;">
                                <label for="cur_state-coord">State</label>
                                <select id="cur_state-coord" onchange="setDropdowndistrictsCurrentCoord(this); validateCoordInput(this)" class="form-select" name="cur_state-coord">
                                    <option value="">Select State</option>
                                    <?php if (isset($states)): ?>
                                        <?php foreach ($states as $state): ?>
                                            <option value="<?= $state->state_id ?>" <?= ($coordinator->Curstate == $state->state_id) ? 'selected' : '' ?>><?= $state->state_title ?></option>
                                        <?php endforeach; ?>
                                    <?php endif ?>
                                </select>
                                <small id="cur_stateerror-coord" class="text-danger"></small>
                            </div>
                             <div class="col-md-3">
                                <label for="cur_district-coord">District</label>
                                 <select id="cur_district-coord" style="border: 1px solid #ced4da;" onchange="setDropdowntaluksCurrentCoord(this); validateCoordInput(this)" class="form-select" name="cur_district-coord">
                                    <option value="<?= $coordinator->Curdistrict ?>"><?= $coordinator->Curdistrict ?: 'Select District' ?></option>
                                </select>
                                <small id="cur_districterror-coord" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_taluk-coord">Taluk</label>
                                 <select id="cur_taluk-coord" style="border: 1px solid #ced4da;" onchange="toggleTalukOthersCurrentCoord(this); setDropdownpanchayatCurrentCoord(this); validateCoordInput(this)" class="form-select" name="cur_taluk-coord">
                                    <option value="<?= $coordinator->Curtaluk ?>"><?= $coordinator->Curtaluk ?: 'Select Taluk' ?></option>
                                </select>
                                <input type="text" id="cur_taluk_others_input_coord" name="cur_taluk_others_coord" 
                                    class="form-control mt-2" 
                                    placeholder="Enter taluk name" 
                                    style="display:none;" 
                                    onkeyup="validateCoordInput(this)">
                                <small id="cur_talukerror-coord" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_panchayat-coord">Panchayat</label>
                                 <select id="cur_panchayat-coord" style="border: 1px solid #ced4da;" onchange="togglePanchayatOthersCurrentCoord(this); setDropdownVillageCurrentCoord(this); validateCoordInput(this)" class="form-select" name="cur_panchayat-coord">
                                    <option value="<?= $coordinator->Curpanchayat ?>"><?= $coordinator->Curpanchayat ?: 'Select Panchayat' ?></option>
                                </select>
                                <input type="text" id="cur_panchayat_others_input_coord" name="cur_panchayat_others_coord" 
                                    class="form-control mt-2" 
                                    placeholder="Enter panchayat name" 
                                    style="display:none;" 
                                    onkeyup="validateCoordInput(this)">
                                <small id="cur_panchayaterror-coord" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_village-coord">Village</label>
                                <select id="cur_village-coord" onchange="toggleVillageOthersCurrentCoord(this); validateCoordInput(this)" class="form-select" name="cur_village-coord">
                                    <option value="<?= $coordinator->Curvillage ?>"><?= $coordinator->Curvillage ?: 'Select Village' ?></option>
                                </select>
                                <input type="text" id="cur_village_others_input_coord" name="cur_village_others_coord" 
                                    class="form-control mt-2" 
                                    placeholder="Enter village name" 
                                    style="display:none;" 
                                    onkeyup="validateCoordInput(this)">
                                <small id="cur_villageerror-coord" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_street-coord">Street</label>
                                <input id="cur_street-coord" onkeyup="validateCoordInput(this)" class="form-control" type="text" name="cur_street-coord" value="<?= $coordinator->Curstreet ?>">
                                <small id="cur_streeterror-coord" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_doorno-coord">Door No</label>
                                <input id="cur_doorno-coord" onkeyup="validateCoordInput(this)" class="form-control" type="text" name="cur_doorno-coord" value="<?= $coordinator->Curdoorno ?>">
                                <small id="cur_doornoerror-coord" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_pincode-coord">Pin Code</label>
                                <input id="cur_pincode-coord" onkeyup="validateCoordInput(this)" 
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)"
                                    class="form-control" type="text" inputmode="numeric" name="cur_pincode-coord" maxlength="6" value="<?= $coordinator->Curpincode ?>">
                                <small id="cur_pincodeerror-coord" class="text-danger"></small>
                            </div>
                        </div>
                    </div>

                    <!-- NRI CURRENT ADDRESS BLOCK -->
                    <div id="cur_nri_block-coord" style="display:<?= ($coordinator->Curaddresstype == 'NRI' || $coordinator->Curaddresstype == 'OtherState' || ($coordinator->Curaddresstype == 'India' && $coordinator->Curstate != 35 && $coordinator->Curstate != '')) ? 'block' : 'none' ?>;">
                        <div class="row g-3">
                            <div class="col-md-3" id="cur_nri_country_container-coord" style="display: <?= ($coordinator->Curaddresstype == 'NRI') ? 'block' : 'none' ?>;">
                                <label for="cur_nri_country-coord">Country</label>
                                <select id="cur_nri_country-coord" name="cur_nri_country-coord" class="form-select" onchange="loadNRIStatesCoord(this.value); validateCoordInput(this)">
                                    <option value="<?= $coordinator->Curnricountry ?>"><?= $coordinator->Curnricountry ?: 'Select Country' ?></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_nri_state-coord">State / Region</label>
                                <select id="cur_nri_state-coord" name="cur_nri_state-coord" class="form-select" onchange="loadNRICitiesCoord(this.value); validateCoordInput(this)">
                                    <option value="<?= $coordinator->Curnristate ?>"><?= $coordinator->Curnristate ?: 'Select State' ?></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_nri_city-coord">City</label>
                                <select id="cur_nri_city-coord" name="cur_nri_city-coord" class="form-select" onchange="validateCoordInput(this)">
                                    <option value="<?= $coordinator->Curnricity ?>"><?= $coordinator->Curnricity ?: 'Select City' ?></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_nri_zip-coord">Zip Code</label>
                                <input id="cur_nri_zip-coord" name="cur_nri_zip-coord" class="form-control" type="text" value="<?= $coordinator->Curnrizip ?>" 
                                    oninput="this.value = this.value.replace(/[^a-zA-Z0-9 -]/g, '').slice(0, 12)"
                                    onkeyup="validateCoordInput(this)">
                            </div>
                            <div class="col-md-12">
                                <label for="cur_nri_fulladdress-coord">Full Address</label>
                                <textarea id="cur_nri_fulladdress-coord" name="cur_nri_fulladdress-coord" class="form-control" rows="3" onkeyup="validateCoordInput(this)"><?= $coordinator->Curnrifulladdress ?></textarea>
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
                                <label for="coord_memberimage" class="ps-file-upload-btn" id="coord_memberimage_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledCoord(this, 'coord_memberimage_btn'); activateCoordButton(document.getElementById('correctdetails-coord'))" id="coord_memberimage" type="file" name="Memberimage" accept="image/*">
                            </div>
                            <small class="text-danger Memberimage"></small>
                        </div>
                        <div class="col-md-3 d-flex flex-column">
                            <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">Aadhar Front</label>
                            <div class="ps-file-upload-wrapper">
                                <label for="coord_aadharfront" class="ps-file-upload-btn" id="coord_aadharfront_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledCoord(this, 'coord_aadharfront_btn'); activateCoordButton(document.getElementById('correctdetails-coord'))" id="coord_aadharfront" type="file" name="Aadharfrontimage" accept="image/*">
                            </div>
                            <small class="text-danger Aadharfrontimage"></small>
                        </div>
                        <div class="col-md-3 d-flex flex-column">
                            <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">Aadhar Back</label>
                            <div class="ps-file-upload-wrapper">
                                <label for="coord_aadharback" class="ps-file-upload-btn" id="coord_aadharback_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledCoord(this, 'coord_aadharback_btn'); activateCoordButton(document.getElementById('correctdetails-coord'))" id="coord_aadharback" type="file" name="Aadharbackimage" accept="image/*">
                            </div>
                            <small class="text-danger Aadharbackimage"></small>
                        </div>
                        <div class="col-md-3 d-flex flex-column">
                            <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">Community Certificate</label>
                            <div class="ps-file-upload-wrapper">
                                <label for="coord_communitycert" class="ps-file-upload-btn" id="coord_communitycert_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledCoord(this, 'coord_communitycert_btn'); activateCoordButton(document.getElementById('correctdetails-coord'))" id="coord_communitycert" type="file" name="Communitycertificate" accept="image/*">
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
                    <input onchange="activateCoordButton(this)" type="checkbox" class="form-check-input" id="correctdetails-coord">
                    <label for="correctdetails-coord" class="form-check-label ms-2 font-weight-bold">I confirm that the above details are correct.</label>
                </div>
                <div>
                    <button id="coordsubmitbutton" disabled type="submit" class="btn btn-lg rounded-pill px-5">Update Details</button>
                </div>
            </div>
        </form>
    <?php endif; ?>

    <script>
        function clearCurrentIndiaAddressCoord() {
            $('#cur_state-coord').val('');
            $('#cur_district-coord').html('<option value="">Select District</option>');
            $('#cur_taluk-coord').html('<option value="">Select Taluk</option>');
            $('#cur_panchayat-coord').html('<option value="">Select Panchayat</option>');
            $('#cur_village-coord').val('');
            $('#cur_street-coord').val('');
            $('#cur_doorno-coord').val('');
            $('#cur_pincode-coord').val('');
            $('#cur_taluk_others_input_coord').val('').hide().removeAttr('name').attr('name', 'cur_taluk_others_coord');
            $('#cur_panchayat_others_input_coord').val('').hide().removeAttr('name').attr('name', 'cur_panchayat_others_coord');
            $('#cur_village_others_input_coord').val('').hide().removeAttr('name').attr('name', 'cur_village_others_coord');
        }

        function clearCurrentNriAddressCoord() {
            $('#cur_nri_country-coord').val('');
            $('#cur_nri_state-coord').html('<option value="">Select State</option>');
            $('#cur_nri_city-coord').html('<option value="">Select City</option>');
            $('#cur_nri_zip-coord').val('');
            $('#cur_nri_fulladdress-coord').val('');
        }

        function toggleCurrentAddressTypeCoord(isInitial = false) {
            const tnBlock = document.getElementById('cur_india_block-coord');
            const nriBlock = document.getElementById('cur_nri_block-coord');
            const sameBtn = document.getElementById('btn_same_as_native-coord');
            const curStateContainer = document.getElementById('cur_state_container-coord');
            const curNriCountryContainer = document.getElementById('cur_nri_country_container-coord');

            const selected = document.querySelector('input[name="cur_address_type-coord"]:checked');

            // Hide all by default
            if (tnBlock) tnBlock.style.display = 'none';
            if (nriBlock) nriBlock.style.display = 'none';
            if (sameBtn) sameBtn.style.display = 'none';
            if (curStateContainer) curStateContainer.style.display = 'block';
            if (curNriCountryContainer) curNriCountryContainer.style.display = 'block';

            if (!selected) {
                if (!isInitial) {
                    clearCurrentIndiaAddressCoord();
                    clearCurrentNriAddressCoord();
                }
                return;
            }

            if (selected.value === 'TamilNadu') {
                if (tnBlock) tnBlock.style.display = 'block';
                if (nriBlock) nriBlock.style.display = 'none';
                if (curStateContainer) curStateContainer.style.display = 'none';
                if (sameBtn) sameBtn.style.display = 'inline-block';
                if (!isInitial) clearCurrentNriAddressCoord(); 
                
                let stateSelect = document.getElementById("cur_state-coord");
                if (stateSelect) {
                    for (let i = 0; i < stateSelect.options.length; i++) {
                        if (stateSelect.options[i].text === "Tamil Nadu") {
                            stateSelect.selectedIndex = i;
                            if (!isInitial) setDropdowndistrictsCurrentCoord(stateSelect);
                            break;
                        }
                    }
                }
            } else if (selected.value === 'OtherState') {
                if (tnBlock) tnBlock.style.display = 'none';
                if (nriBlock) nriBlock.style.display = 'block';
                if (curNriCountryContainer) curNriCountryContainer.style.display = 'none';
                if (sameBtn) {
                    sameBtn.disabled = true;
                    sameBtn.classList.add('disabled');
                    sameBtn.style.display = 'none';
                }

                if (!isInitial) {
                    clearCurrentIndiaAddressCoord();
                    clearCurrentNriAddressCoord();
                }
                // Set Country to India and Load States via callback
                loadCountriesDataCoord(isInitial); 

            } else if (selected.value === 'NRI') {
                if (tnBlock) tnBlock.style.display = 'none';
                if (nriBlock) nriBlock.style.display = 'block';
                if (curNriCountryContainer) curNriCountryContainer.style.display = 'block';
                if (sameBtn) {
                    sameBtn.disabled = true;
                    sameBtn.classList.add('disabled');
                    sameBtn.style.display = 'none';
                }

                if (!isInitial) {
                    clearCurrentIndiaAddressCoord();
                    clearCurrentNriAddressCoord();
                }
                loadCountriesDataCoord(isInitial);
            }
        }

        function toggleUpcomingHeadCoord() {
            let relationshipSelect = document.getElementById("relationship-coord");
            let aliveStatusDead = document.getElementById("alive_no-coord");
            let upcomingHeadDiv = document.getElementById("upcoming_head_div-coord");

            if (!relationshipSelect || !aliveStatusDead || !upcomingHeadDiv) return;

            // Check if Role is Head AND Dead is checked
            if (relationshipSelect.value === "Head" && aliveStatusDead.checked) {
                upcomingHeadDiv.style.display = "block";
            } else {
                upcomingHeadDiv.style.display = "none";
                document.getElementById("upcoming_head-coord").value = "";
            }
        }

        function toggleCustomRelationshipCoord(select) {
            let customDiv = document.getElementById("custom_rel_div-coord");
            if (select.value === "Other") {
                customDiv.style.display = "block";
            } else {
                customDiv.style.display = "none";
                document.getElementById("custom_relationship-coord").value = "";
            }
            toggleUpcomingHeadCoord();
        }

        function setDropdowndistrictsCoord(state, selectDistrict = null, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let state_id = state.value;

            // Clear dependent dropdowns
            if (!selectDistrict) {
                document.getElementById("taluks-dropdown-coord").innerHTML = '<option value="">Select Taluk</option>';
                document.getElementById("panchayat-dropdown-coord").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("village-coord").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("village_others_input_coord").style.display = 'none';
                document.getElementById("village_others_input_coord").value = '';
            }

            if (!state_id) return;

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { "state_id": state_id },
                success: (result) => {
                    let dropdown = document.getElementById("districts-dropdown-coord");
                    dropdown.innerHTML = result;
                    if (selectDistrict) {
                        dropdown.value = selectDistrict;
                        setDropdowntaluksCoord(dropdown, selectTaluk, selectPanchayat, selectVillage);
                    }
                }
            });
        }

        function setDropdowntaluksCoord(district, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let district_name = district.value;

            // Clear dependent dropdowns
            if (!selectTaluk) {
                document.getElementById("panchayat-dropdown-coord").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("village-coord").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("village_others_input_coord").style.display = 'none';
                document.getElementById("village_others_input_coord").value = '';
            }

            if (!district_name) return;

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { "district_name": district_name },
                success: (result) => {
                    let dropdown = document.getElementById("taluks-dropdown-coord");
                    dropdown.innerHTML = result;
                    dropdown.innerHTML += '<option value="Others">Others</option>';
                    if (selectTaluk) {
                        dropdown.value = selectTaluk;
                        if (dropdown.value !== selectTaluk && selectTaluk !== "") {
                            dropdown.value = 'Others';
                            toggleTalukOthersCoord(dropdown, selectTaluk);
                        } else {
                            toggleTalukOthersCoord(dropdown);
                        }
                        setDropdownpanchayatCoord(dropdown, selectPanchayat, selectVillage);
                    } else {
                        toggleTalukOthersCoord(dropdown);
                    }
                },
                error: (err) => {
                    document.getElementById("taluks-dropdown-coord").innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                    toggleTalukOthersCoord(document.getElementById("taluks-dropdown-coord"));
                }
            });
        }

        function toggleTalukOthersCoord(selectEl, manualValue = '') {
            const othersInput = document.getElementById('taluk_others_input_coord');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'taluk-coord');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.value = '';
                othersInput.setAttribute('name', 'taluk_others_coord');
                selectEl.setAttribute('name', 'taluk-coord'); 
            }
        }

        function setDropdownpanchayatCoord(taluk, selectPanchayat = null, selectVillage = null) {
            let taluk_name = taluk.value;

            // Clear dependent dropdowns
            if (!selectPanchayat) {
                document.getElementById("village-coord").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("village_others_input_coord").style.display = 'none';
                document.getElementById("village_others_input_coord").value = '';
            }

            if (!taluk_name) return;
            if (taluk_name === 'Others') {
                let dropdown = document.getElementById("panchayat-dropdown-coord");
                dropdown.innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                if (selectPanchayat) {
                    dropdown.value = selectPanchayat;
                    if (dropdown.value !== selectPanchayat && selectPanchayat !== "") {
                        dropdown.value = 'Others';
                        togglePanchayatOthersCoord(dropdown, selectPanchayat);
                    } else {
                        togglePanchayatOthersCoord(dropdown);
                    }
                    setDropdownVillageCoord(dropdown, selectVillage);
                } else {
                    togglePanchayatOthersCoord(dropdown);
                }
                return;
            }

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { "taluk_name": taluk_name },
                success: (result) => {
                    let dropdown = document.getElementById("panchayat-dropdown-coord");
                    dropdown.innerHTML = result;
                    dropdown.innerHTML += '<option value="Others">Others</option>';
                    if (selectPanchayat) {
                        dropdown.value = selectPanchayat;
                        if (dropdown.value !== selectPanchayat && selectPanchayat !== "") {
                            dropdown.value = 'Others';
                            togglePanchayatOthersCoord(dropdown, selectPanchayat);
                        } else {
                            togglePanchayatOthersCoord(dropdown);
                        }
                        setDropdownVillageCoord(dropdown, selectVillage);
                    } else {
                        togglePanchayatOthersCoord(dropdown);
                    }
                },
                error: (err) => {
                    document.getElementById("panchayat-dropdown-coord").innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                    togglePanchayatOthersCoord(document.getElementById("panchayat-dropdown-coord"));
                }
            });
        }

        function togglePanchayatOthersCoord(selectEl, manualValue = '') {
            const othersInput = document.getElementById('panchayat_others_input_coord');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'panchayat-coord');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.value = '';
                othersInput.setAttribute('name', 'panchayat_others_coord');
                selectEl.setAttribute('name', 'panchayat-coord'); 
            }
        }

        function setDropdownVillageCoord(panchayatEl, selectedVillage = null) {
            const panchayat_name = panchayatEl.value;
            const villageSelect = document.getElementById('village-coord');

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
                    toggleVillageOthersCoord(villageSelect, selectedVillage);
                },
                error: function() {
                    villageSelect.innerHTML = '<option value="">Select Village</option><option value="Others">Others</option>';
                    toggleVillageOthersCoord(villageSelect);
                }
            });
        }

        function toggleVillageOthersCoord(selectEl, manualValue = '') {
            const othersInput = document.getElementById('village_others_input_coord');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                othersInput.setAttribute('required', 'required');
                selectEl.removeAttribute('name');
                othersInput.setAttribute('name', 'village-coord');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.removeAttribute('required');
                othersInput.value = '';
                othersInput.setAttribute('name', 'village_others_coord');
                selectEl.setAttribute('name', 'village-coord');
            }
        }

        function copyNativeAddressCoord() {
            // Target elements
            const c_state = document.getElementById('cur_state-coord');
            const c_district = document.getElementById('cur_district-coord');
            const c_taluk = document.getElementById('cur_taluk-coord');
            const c_panchayat = document.getElementById('cur_panchayat-coord');
            const c_village = document.getElementById('cur_village-coord');
            const c_street = document.getElementById('cur_street-coord');
            const c_doorno = document.getElementById('cur_doorno-coord');
            const c_pincode = document.getElementById('cur_pincode-coord');

            // Source data
            const n_state = document.getElementById('states-dropdown-coord');
            const n_district = document.getElementById('districts-dropdown-coord');
            const n_taluk = document.getElementById('taluks-dropdown-coord');
            const n_panchayat = document.getElementById('panchayat-dropdown-coord');
            const n_village_sel = document.getElementById('village-coord');
            const n_street = document.getElementById('street-coord');
            const n_doorno = document.getElementById('doorno-coord');
            const n_pincode = document.getElementById('pincode-coord');

            // Source 'Others' inputs
            const n_taluk_others_input = document.getElementById('taluk_others_input_coord');
            const n_panchayat_others_input = document.getElementById('panchayat_others_input_coord');
            const n_village_others_input = document.getElementById('village_others_input_coord');

            // Target 'Others' inputs
            const c_taluk_others_input = document.getElementById('cur_taluk_others_input_coord');
            const c_panchayat_others_input = document.getElementById('cur_panchayat_others_input_coord');
            const c_village_others_input = document.getElementById('cur_village_others_input_coord');

            // 1. Set Address Type to Tamil Nadu
            // Ensure Tamil Nadu is selected for current address type
            var tnRadio = document.getElementById('cur_address_tn-coord');
            if (tnRadio) {
                tnRadio.checked = true;
                toggleCurrentAddressTypeCoord();
            }

            // Copy simple fields
            c_street.value = n_street.value;
            c_doorno.value = n_doorno.value;
            c_pincode.value = n_pincode.value;

            // 2. Set State
            // c_state.value = n_state.value; // Already handled for TN

            // 3. Chain AJAX
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { state_id: n_state.value },
                success: function (resultDist) {
                    c_district.innerHTML = resultDist;
                    c_district.value = n_district.value;

                    $.ajax({
                        type: "get",
                        url: "<?= base_url('members/getTaluksfordropdown') ?>",
                        data: { district_name: n_district.value },
                        success: function (resultTaluk) {
                            c_taluk.innerHTML = resultTaluk;
                            c_taluk.innerHTML += '<option value="Others">Others</option>';
                            c_taluk.value = n_taluk.value;
                            toggleTalukOthersCurrentCoord(c_taluk);
                            if (n_taluk.value === 'Others') {
                                c_taluk_others_input.value = n_taluk_others_input.value;
                            }

                            if (n_taluk.value === 'Others') {
                                c_panchayat.innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                                c_panchayat.value = n_panchayat.value;
                                togglePanchayatOthersCurrentCoord(c_panchayat);
                                if (n_panchayat.value === 'Others') {
                                    c_panchayat_others_input.value = n_panchayat_others_input.value;
                                }
                                setDropdownVillageCurrentCoord(c_panchayat, n_village_sel.value);
                                setTimeout(() => { if (n_village_sel.value === 'Others') c_village_others_input.value = n_village_others_input.value; }, 100);
                            } else {
                                $.ajax({
                                    type: "get",
                                    url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                                    data: { taluk_name: n_taluk.value },
                                    success: function (resultPanch) {
                                        c_panchayat.innerHTML = resultPanch;
                                        c_panchayat.innerHTML += '<option value="Others">Others</option>';
                                        c_panchayat.value = n_panchayat.value;
                                        togglePanchayatOthersCurrentCoord(c_panchayat);
                                        if (n_panchayat.value === 'Others') {
                                            c_panchayat_others_input.value = n_panchayat_others_input.value;
                                        }
                                        setDropdownVillageCurrentCoord(c_panchayat, n_village_sel.value);
                                        setTimeout(() => { if (n_village_sel.value === 'Others') c_village_others_input.value = n_village_others_input.value; }, 100);
                                    }
                                });
                            }
                        }
                    });
                }
            });
        }

        let originalFormDataUpdateCoord = "";
        setTimeout(function() {
            const form = document.forms['coordinatorregistration-coord'];
            if(form) {
                originalFormDataUpdateCoord = new URLSearchParams(new FormData(form)).toString();
                const checkbox = document.getElementById("correctdetails-coord");
                
                form.addEventListener('change', function() {
                    if(checkbox) activateCoordButton(checkbox);
                });
                form.addEventListener('input', function() {
                    if(checkbox) activateCoordButton(checkbox);
                });
            }
        }, 500);

        function checkFormChangedCoord() {
            const form = document.forms['coordinatorregistration-coord'];
            if(!form) return false;
            
            // Check text-based data
            const currentFormData = new URLSearchParams(new FormData(form)).toString();
            if (currentFormData !== originalFormDataUpdateCoord) return true;

            // Check file inputs
            const fileInputs = form.querySelectorAll('input[type="file"]');
            for (let input of fileInputs) {
                if (input.files.length > 0) return true;
            }

            return false;
        }

        function activateCoordButton(checkbox) {
            const isChanged = checkFormChangedCoord();
            // Button is enabled ONLY if checkbox is checked AND form has changed
            document.getElementById("coordsubmitbutton").disabled = !(checkbox.checked && isChanged);
        }

        function validateCoordInput(field) {
            if (field.value === "" && field.hasAttribute('required')) {
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }

            // Real-time Email Change Check
            if (field.id === 'email-coord') {
                const originalEmail = document.getElementById('original_email-coord').value;
                const verifyBtn = document.getElementById('verify-email-btn-coord');
                const badge = document.getElementById('email-verified-badge-coord');
                const statusInput = document.getElementById('is_email_verified-coord');

                if (field.value !== originalEmail && field.value !== "") {
                    verifyBtn.style.display = 'block';
                    badge.style.display = 'none';
                    statusInput.value = "0";
                    document.getElementById('email-otp-section-coord').style.display = 'none';
                } else if (field.value === originalEmail) {
                    verifyBtn.style.display = 'none';
                    badge.style.display = 'block';
                    statusInput.value = "1";
                    document.getElementById('email-otp-section-coord').style.display = 'none';
                } else {
                    verifyBtn.style.display = 'none';
                    badge.style.display = 'none';
                    statusInput.value = "0";
                }
            }

            // Real-time Phone Change Check
            if (field.id === 'phoneno-coord') {
                const originalPhone = document.getElementById('original_phone-coord').value;
                const verifyBtn = document.getElementById('verify-phone-btn-coord');
                const badge = document.getElementById('phone-verified-badge-coord');
                const statusInput = document.getElementById('is_phone_verified-coord');

                if (field.value !== originalPhone && field.value.length === 10) {
                    verifyBtn.style.display = 'block';
                    badge.style.display = 'none';
                    statusInput.value = "0";
                } else if (field.value === originalPhone) {
                    verifyBtn.style.display = 'none';
                    badge.style.display = 'block';
                    statusInput.value = "1";
                } else {
                    verifyBtn.style.display = 'none';
                    badge.style.display = 'none';
                    statusInput.value = "0";
                }
            }
        }

        function validateCoordForm() {
            let isValid = true;
            let firstInvalid = null;
            const f = document.forms['coordinatorregistration-coord'];

            const setErr = (id, msg, el) => {
                const errBox = document.getElementById(id);
                if (errBox) errBox.innerHTML = msg;
                if (!firstInvalid && el) firstInvalid = el;
                isValid = false;
            };

            // Clear errors
            document.querySelectorAll(".text-danger").forEach(el => el.innerHTML = "");

            // Verification checks
            const isEmailVerified = document.getElementById('is_email_verified-coord').value;
            const isPhoneVerified = document.getElementById('is_phone_verified-coord').value;
            if (f['email-coord'].value !== "" && isEmailVerified === "0") {
                alert("Please verify your new email address.");
                f['email-coord'].focus();
                return false;
            }
            if (f['phoneno-coord'].value !== "" && isPhoneVerified === "0") {
                alert("Please verify your new phone number.");
                f['phoneno-coord'].focus();
                return false;
            }

            // Basic Details
            if (!f['name-coord'].value.trim()) setErr('nameerror-coord', 'Name is required.', f['name-coord']);
            if (!f['phoneno-coord'].value.trim()) setErr('phonenoerror-coord', 'Phone is required.', f['phoneno-coord']);
            else if (f['phoneno-coord'].value.trim().length < 10) setErr('phonenoerror-coord', 'Min 10 digits.', f['phoneno-coord']);
            if (!f['aadharno-coord'].value.trim()) setErr('aadharnoerror-coord', 'Aadhar is required.', f['aadharno-coord']);
            else if (f['aadharno-coord'].value.trim().length !== 12) setErr('aadharnoerror-coord', 'Aadhar must be 12 digits.', f['aadharno-coord']);

            if (!isValid && firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                if (firstInvalid.focus) firstInvalid.focus();
            }

            if (!isValid && firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                if (firstInvalid.focus) firstInvalid.focus();
            }

            return isValid;
        }

        function sendUpdateEmailOTPCoord() {
            const email = document.getElementById('email-coord').value;
            const errorElem = document.getElementById('emailerror-coord');
            const otpSection = document.getElementById('email-otp-section-coord');
            const btn = document.getElementById('verify-email-btn-coord');

            if (!email || !email.includes('@')) {
                errorElem.textContent = "Please enter a valid email address.";
                return;
            }

            btn.disabled = true;
            btn.innerText = "Sending...";

            $.ajax({
                type: "POST",
                url: "<?= base_url('members/send-registration-otp') ?>",
                data: { email: email },
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        otpSection.style.display = 'block';
                        errorElem.textContent = "";
                        btn.style.display = 'none';
                    } else {
                        btn.disabled = false;
                        btn.innerText = "Verify";
                        errorElem.textContent = response.message || "Failed to send OTP. Try again.";
                    }
                },
                error: function() {
                    btn.disabled = false;
                    btn.innerText = "Verify";
                    errorElem.textContent = "Server error occurred. Please try again.";
                }
            });
        }

        function verifyUpdateEmailOTPCoord() {
            const email = document.getElementById('email-coord').value;
            const otp = document.getElementById('email-otp-coord').value;
            const errorElem = document.getElementById('email-otp-error-coord');
            const statusInput = document.getElementById('is_email_verified-coord');
            const verifyBtn = document.getElementById('verify-email-btn-coord');
            const badge = document.getElementById('email-verified-badge-coord');
            const otpSection = document.getElementById('email-otp-section-coord');

            if (otp.length !== 6) {
                errorElem.textContent = "Enter a valid 6-digit OTP.";
                return;
            }

            $.ajax({
                type: "POST",
                url: "<?= base_url('members/verify-registration-otp') ?>",
                data: { email: email, otp: otp },
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        statusInput.value = "1";
                        verifyBtn.style.display = 'none';
                        badge.style.display = 'block';
                        otpSection.style.display = 'none';
                        errorElem.textContent = "";
                    } else {
                        errorElem.textContent = response.message || "Invalid or expired OTP.";
                    }
                },
                error: function() {
                    errorElem.textContent = "Verification failed. Try again.";
                }
            });
        }

        function checkPhoneVerificationCoord() {
            const phoneno = document.getElementById('phoneno-coord').value;
            const errorElem = document.getElementById('phonenoerror-coord');
            const statusInput = document.getElementById('is_phone_verified-coord');
            const verifyBtn = document.getElementById('verify-phone-btn-coord');
            const badge = document.getElementById('phone-verified-badge-coord');

            if (phoneno.length !== 10) {
                errorElem.textContent = "Enter a valid 10-digit phone number.";
                return;
            }

            verifyBtn.disabled = true;
            verifyBtn.innerText = "Checking...";

            $.ajax({
                type: "POST",
                url: "<?= base_url('members/checkExistphoneno') ?>",
                data: { 
                    phoneno: phoneno,
                    member_id: "<?= $coordinator->Familymembershipid ?>"
                },
                success: function(response) {
                    if (response.trim() === "false") {
                        alert("Phone number is unique and verified.");
                        statusInput.value = "1";
                        verifyBtn.style.display = 'none';
                        badge.style.display = 'block';
                        errorElem.textContent = "";
                    } else {
                        errorElem.textContent = "This phone number is already registered.";
                        statusInput.value = "0";
                        badge.style.display = 'none';
                        verifyBtn.disabled = false;
                        verifyBtn.innerText = "Verify";
                    }
                },
                error: function() {
                    verifyBtn.disabled = false;
                    verifyBtn.innerText = "Verify";
                    errorElem.textContent = "Error checking phone number. Try again.";
                }
            });
        }

        function uploadFileCoord(file) {
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

        function uploadFileStyledCoord(file, btnId) {
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
                    
                    // Force button check since files don't trigger 'change' on the form in some browsers
                    const checkbox = document.getElementById("correctdetails-coord");
                    if(checkbox) activateCoordButton(checkbox);
                }
            }
        }

        function copyPhoneToWhatsappCoord() {
            document.getElementById('whatsappno-coord').value = document.getElementById('phoneno-coord').value;
        }

        var selectedEducationsCoord = [];

        function renderEducationTagsCoord() {
            const container = document.getElementById('education_tags-coord');
            if(!container) return;
            container.innerHTML = '';
            selectedEducationsCoord.forEach(edu => {
                const tag = document.createElement('span');
                tag.className = 'badge bg-primary d-flex align-items-center ps-2 pe-2 py-1 gap-2';
                tag.style.fontSize = '0.85rem';
                tag.innerHTML = `<span>${edu}</span> <span style="cursor:pointer; font-weight:bold; font-size: 1rem; line-height: 1;" onclick="removeEducationCoord('${edu.replace(/'/g, "\\'")}', event)">&times;</span>`;
                container.appendChild(tag);
            });
            document.getElementById('educationfield-coord').value = selectedEducationsCoord.join(',');
            
            // Reset placeholder visibility
            const input = document.getElementById("education_input-coord");
            if (input) {
                if (selectedEducationsCoord.length > 0) {
                    input.placeholder = "";
                } else {
                    input.placeholder = "Type and select education";
                }
            }

            // Error clear if valid
            const errorField = document.getElementById("educationerror-coord");
            if (errorField && selectedEducationsCoord.length > 0) {
                errorField.innerHTML = "";
            }
        }

        function removeEducationCoord(edu, event) {
            if(event) event.stopPropagation();
            selectedEducationsCoord = selectedEducationsCoord.filter(e => e !== edu);
            renderEducationTagsCoord();
        }

        // Initialize with existing data
        $(document).ready(function() {
            const existingEdu = "<?= esc($coordinator->Education ?? '') ?>";
            if(existingEdu) {
                const edus = existingEdu.split(',');
                edus.forEach(e => {
                    const trimmed = e.trim();
                    if(trimmed && !selectedEducationsCoord.includes(trimmed)) {
                        selectedEducationsCoord.push(trimmed);
                    }
                });
                renderEducationTagsCoord();
            }

            // Handle wrapper click
            $(document).on("click", "#education_wrapper-coord", function(e) {
                if (e.target.id === 'education_wrapper-coord' || e.target.id === 'education_tags-coord') {
                    $("#education_input-coord").focus();
                }
                filterEducationOptionsCoord(document.getElementById("education_input-coord"));
            });

            // Click listener for education options
            $(document).off('click', '#education_dropdown-coord .education-option').on('click', '#education_dropdown-coord .education-option', function() {
                const val = $(this).data('value');
                if (val === 'Others') {
                    document.getElementById('education_others_wrapper-coord').style.display = 'block';
                    document.getElementById('education_dropdown-coord').style.display = 'none';
                    document.getElementById('education_others_input-coord').focus();
                } else {
                    if (!selectedEducationsCoord.includes(val)) {
                        selectedEducationsCoord.push(val);
                        renderEducationTagsCoord();
                    }
                    document.getElementById('education_input-coord').value = '';
                    document.getElementById('education_dropdown-coord').style.display = 'none';
                }
            });
        });

        function addManualEducationCoord() {
            const val = document.getElementById('education_others_input-coord').value.trim();
            if (val) {
                if (!selectedEducationsCoord.includes(val)) {
                    selectedEducationsCoord.push(val);
                    renderEducationTagsCoord();
                }
                document.getElementById('education_others_input-coord').value = '';
                document.getElementById('education_others_wrapper-coord').style.display = 'none';
                document.getElementById('education_input-coord').value = '';
                document.getElementById('education_input-coord').focus();
            }
        }

        function filterEducationOptionsCoord(input) {
            var filter = input.value.toLowerCase().trim();
            var options = document.querySelectorAll('#education_dropdown-coord .education-option');
            var count = 0;
            options.forEach(function(opt) {
                var text = opt.textContent.toLowerCase();
                if (!filter || text.includes(filter)) {
                    opt.style.display = "block";
                    count++;
                } else {
                    opt.style.display = "none";
                }
            });
            document.getElementById("education_dropdown-coord").style.display = (count > 0) ? "block" : "none";
        }

        // Profession searchable dropdown logic
        function filterProfessionOptionsCoord(input) {
            const query = input.value.toLowerCase().trim();
            const dropdown = document.getElementById("profession_dropdown-coord");
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


        var countriesDataCoord = null;
        function loadCountriesDataCoord(isInitial = false) {
            if (countriesDataCoord) { populateCountriesCoord(isInitial); return; }
            $.getJSON('<?= base_url('assets/countries_states_cities.json') ?>', function(data) {
                countriesDataCoord = data;
                populateCountriesCoord(isInitial);
            });
        }

        function populateCountriesCoord(isInitial = false) {
            var select = document.getElementById('cur_nri_country-coord');
            var selectedType = document.querySelector('input[name="cur_address_type-coord"]:checked')?.value;
            var currentVal = select.value;

            if (selectedType === 'OtherState') {
                currentVal = "India";
            } else if (isInitial && !currentVal) {
                currentVal = '<?= $coordinator->Curnricountry ?>';
            }

            select.innerHTML = '<option value="">Select Country</option>';
            Object.values(countriesDataCoord).forEach(function(c) {
                var opt = document.createElement('option');
                opt.value = c.name;
                opt.textContent = c.name;
                if (c.name === currentVal) opt.selected = true;
                select.appendChild(opt);
            });
            if (currentVal) {
                var sVal = (isInitial) ? '<?= $coordinator->Curnristate ?>' : '';
                var cityVal = (isInitial) ? '<?= $coordinator->Curnricity ?>' : '';
                loadNRIStatesCoord(currentVal, sVal, cityVal);
            }
        }

        function loadNRIStatesCoord(countryName, selectState, selectCity) {
            if (!countriesDataCoord) return;
            var select = document.getElementById('cur_nri_state-coord');
            select.innerHTML = '<option value="">Select State</option>';
            var country = Object.values(countriesDataCoord).find(function(c) { return c.name === countryName; });
            if (country && country.states) {
                country.states.forEach(function(s) {
                    var opt = document.createElement('option');
                    opt.value = s.name;
                    opt.textContent = s.name;
                    if (s.name === selectState) opt.selected = true;
                    select.appendChild(opt);
                });
            }
            if (selectState) loadNRICitiesCoord(selectState, selectCity);
        }

        function loadNRICitiesCoord(stateName, selectCity) {
            var countryName = document.getElementById('cur_nri_country-coord').value || '<?= $coordinator->Curnricountry ?>';
            var select = document.getElementById('cur_nri_city-coord');
            select.innerHTML = '<option value="">Select City</option>';
            var country = Object.values(countriesDataCoord).find(function(c) { return c.name === countryName; });
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

        function setDropdowndistrictsCurrentCoord(state, selectDistrict = null, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let state_id = state.value;

            // Clear dependent dropdowns
            if (!selectDistrict) {
                document.getElementById("cur_district-coord").innerHTML = '<option value="">Select District</option>';
                document.getElementById("cur_taluk-coord").innerHTML = '<option value="">Select Taluk</option>';
                document.getElementById("cur_panchayat-coord").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_village-coord").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_coord").style.display = 'none';
                document.getElementById("cur_village_others_input_coord").value = '';
            }

            if (!state_id) return;
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { state_id: state_id },
                success: function (result) {
                    let districtDropdown = document.getElementById("cur_district-coord");
                    districtDropdown.innerHTML = result;
                    if (selectDistrict) {
                        districtDropdown.value = selectDistrict;
                        setDropdowntaluksCurrentCoord(districtDropdown, selectTaluk, selectPanchayat, selectVillage);
                    }
                }
            });
        }

        function setDropdowntaluksCurrentCoord(district, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let district_name = district.value;

            // Clear dependent dropdowns
            if (!selectTaluk) {
                document.getElementById("cur_taluk-coord").innerHTML = '<option value="">Select Taluk</option>';
                document.getElementById("cur_panchayat-coord").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_village-coord").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_coord").style.display = 'none';
                document.getElementById("cur_village_others_input_coord").value = '';
            }

            if (!district_name) return;
            if (district_name === 'Others') {
                let talukDropdown = document.getElementById("cur_taluk-coord");
                talukDropdown.innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                if (selectTaluk) {
                    talukDropdown.value = selectTaluk;
                    setDropdownpanchayatCurrentCoord(talukDropdown, selectPanchayat, selectVillage);
                }
                toggleTalukOthersCurrentCoord(talukDropdown);
                return;
            }
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { district_name: district_name },
                success: function (result) {
                    let talukDropdown = document.getElementById("cur_taluk-coord");
                    talukDropdown.innerHTML = result;
                    talukDropdown.innerHTML += '<option value="Others">Others</option>';
                    if (selectTaluk) {
                        talukDropdown.value = selectTaluk;
                        setDropdownpanchayatCurrentCoord(talukDropdown, selectPanchayat, selectVillage);
                    }
                    toggleTalukOthersCurrentCoord(talukDropdown);
                },
                error: (err) => {
                    document.getElementById("cur_taluk-coord").innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                }
            });
        }

        function toggleTalukOthersCurrentCoord(selectEl, manualValue = '') {
            const othersInput = document.getElementById('cur_taluk_others_input_coord');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                othersInput.setAttribute('required', 'required');
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'cur_taluk-coord');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.removeAttribute('required');
                othersInput.value = '';
                othersInput.setAttribute('name', 'cur_taluk_others_coord');
                selectEl.setAttribute('name', 'cur_taluk-coord'); 
            }
        }

        function setDropdownpanchayatCurrentCoord(taluk, selectPanchayat = null, selectVillage = null) {
            let taluk_name = taluk.value;

            // Clear dependent dropdowns
            if (!selectPanchayat) {
                document.getElementById("cur_panchayat-coord").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_village-coord").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_coord").style.display = 'none';
                document.getElementById("cur_village_others_input_coord").value = '';
            }

            if (!taluk_name) return;
            if (taluk_name === 'Others') {
                let panchayatDropdown = document.getElementById("cur_panchayat-coord");
                panchayatDropdown.innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                if (selectPanchayat) {
                    panchayatDropdown.value = selectPanchayat;
                    setDropdownVillageCurrentCoord(panchayatDropdown, selectVillage);
                }
                togglePanchayatOthersCurrentCoord(panchayatDropdown);
                return;
            }
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { taluk_name: taluk_name },
                success: function (result) {
                    let panchayatDropdown = document.getElementById("cur_panchayat-coord");
                    panchayatDropdown.innerHTML = result;
                    panchayatDropdown.innerHTML += '<option value="Others">Others</option>';
                    if (selectPanchayat) {
                        panchayatDropdown.value = selectPanchayat;
                        setDropdownVillageCurrentCoord(panchayatDropdown, selectVillage);
                    }
                    togglePanchayatOthersCurrentCoord(panchayatDropdown);
                },
                error: (err) => {
                    document.getElementById("cur_panchayat-coord").innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                }
            });
        }

        function togglePanchayatOthersCurrentCoord(selectEl, manualValue = '') {
            const othersInput = document.getElementById('cur_panchayat_others_input_coord');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                othersInput.setAttribute('required', 'required');
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'cur_panchayat-coord');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.removeAttribute('required');
                othersInput.value = '';
                othersInput.setAttribute('name', 'cur_panchayat_others_coord');
                selectEl.setAttribute('name', 'cur_panchayat-coord'); 
            }
        }

        function setDropdownVillageCurrentCoord(panchayatEl, selectedVillage = null) {
            const panchayat_name = panchayatEl.value;
            const villageSelect = document.getElementById('cur_village-coord');

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
                    toggleVillageOthersCurrentCoord(villageSelect, selectedVillage);
                },
                error: function() {
                    villageSelect.innerHTML = '<option value="">Select Village</option><option value="Others">Others</option>';
                    toggleVillageOthersCurrentCoord(villageSelect); 
                }
            });
        }

        function toggleVillageOthersCurrentCoord(selectEl, manualValue = '') {
            const othersInput = document.getElementById('cur_village_others_input_coord');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                othersInput.setAttribute('required', 'required');
                selectEl.removeAttribute('name');
                othersInput.setAttribute('name', 'cur_village-coord');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.removeAttribute('required');
                othersInput.value = '';
                othersInput.setAttribute('name', 'cur_village_others_coord');
                selectEl.setAttribute('name', 'cur_village-coord');
            }
        }

        $(document).ready(function() {
            // Initial Cascading Load (Native)
            const s1 = document.getElementById('states-dropdown-coord');
            if (s1 && s1.value) {
                setDropdowndistrictsCoord(
                    s1, 
                    '<?= $coordinator->District ?>', 
                    '<?= $coordinator->Taluk ?>', 
                    '<?= $coordinator->Panchayat ?>', 
                    '<?= $coordinator->Village ?>'
                );
            }
            
            // Toggle blocks (without clearing dropdowns on initial load)
            toggleCurrentAddressTypeCoord(true);

            // Cascade load for Current Address
            const curType = document.querySelector('input[name="cur_address_type-coord"]:checked')?.value;
            if (curType === 'TamilNadu') {
                const curState = document.getElementById('cur_state-coord');
                if (curState && curState.value) {
                    setDropdowndistrictsCurrentCoord(
                        curState, 
                        '<?= $coordinator->Curdistrict ?>', 
                        '<?= $coordinator->Curtaluk ?>', 
                        '<?= $coordinator->Curpanchayat ?>', 
                        '<?= $coordinator->Curvillage ?>'
                    );
                }
            } else if (curType === 'OtherState' || curType === 'NRI') {
                if ('<?= $coordinator->Curnricountry ?>') {
                    loadNRIStatesCoord('<?= $coordinator->Curnricountry ?>', '<?= $coordinator->Curnristate ?>', '<?= $coordinator->Curnricity ?>');
                }
            }

            renderEducationTagsCoord();
        });

        function handleProfessionChangeCoord(select) {
            let wrapper = document.getElementById('business-extra-wrapper-coord');
            if (select.value === 'Others') {
                wrapper.style.display = 'block';
            } else {
                wrapper.style.display = 'none';
            }
        }

        $(document).on("click", "#profession_dropdown-coord .profession-option", function() {
            const value = this.getAttribute("data-value");
            const input = document.getElementById("profession_input-coord");
            const hidden = document.getElementById("profession-coord");
            
            input.value = this.textContent;
            hidden.value = value;
            document.getElementById("profession_dropdown-coord").style.display = "none";
            
            // Trigger profession change logic
            handleProfessionChangeCoord({value: value});
            // validateCoordInput(hidden); 
        });

        // Toggle readonly to allow typing when focused
        $("#profession_input-coord").on("focus", function() {
            $(this).prop("readonly", false);
        }).on("blur", function() {
            $(this).prop("readonly", true);
        });

        // Handle wrapper click
        $(document).on("click", "#profession_wrapper-coord", function() {
            $("#profession_input-coord").focus();
            filterProfessionOptionsCoord(document.getElementById("profession_input-coord"));
        });

        // Close when clicking outside
        $(document).on("click", function(e) {
            if (!$(e.target).closest("#profession_wrapper-coord").length && !$(e.target).closest("#profession_dropdown-coord").length) {
                $("#profession_dropdown-coord").hide();
            }
            if (!$(e.target).closest("#education_wrapper-coord").length && !$(e.target).closest("#education_dropdown-coord").length) {
                $("#education_dropdown-coord").hide();
            }
        });
    </script>







