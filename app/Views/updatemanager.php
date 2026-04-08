    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-brown: #2D1B18;
            --medium-brown: #3E2723;
            --accent-gold: #C5A028;
            --glass-white: rgba(255, 255, 255, 0.65);
            --border-white: rgba(255, 255, 255, 0.5);
            --soft-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.1);
        }

        #registration-form {
            font-family: 'Outfit', sans-serif;
            color: #333333;
        }

        .bg-custom-header {
            background: rgba(255, 255, 255, 0.3) !important;
            backdrop-filter: blur(5px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
            padding: 1.25rem 1.5rem !important;
            position: sticky;
            top: 0;
            z-index: 100;
            border-radius: 20px 20px 0 0 !important;
        }

        .card.shadow-lg {
            background: var(--glass-white) !important;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            border: 1px solid var(--border-white) !important;
            border-top: 1.5px solid rgba(255, 255, 255, 0.6) !important;
            border-radius: 20px !important;
            box-shadow: var(--soft-shadow) !important;
        }

        #registration-form label {
            font-size: 0.9rem;
            font-weight: 700;
            color: #333333 !important;
            margin-bottom: 0.4rem;
            display: inline-block;
            letter-spacing: 0.2px;
        }

        #registration-form .form-control,
        #registration-form .form-select {
            font-size: 0.92rem;
            background-color: rgba(255, 255, 255, 0.9);
            border: 1.5px solid #E0E0E0;
            color: #333333 !important;
            font-weight: 500;
            padding: 0.6rem 0.8rem;
            border-radius: 10px;
            transition: all 0.25s ease;
        }

        #registration-form .form-control:focus,
        #registration-form .form-select:focus {
            background-color: #fff;
            border-color: var(--medium-brown);
            box-shadow: 0 0 0 4px rgba(62, 39, 35, 0.1);
            transform: translateY(-1px);
        }

        .section-title {
            position: relative;
            padding-left: 1rem;
            font-weight: 700;
            color: var(--primary-brown) !important;
            font-size: 1.1rem;
            margin-bottom: 1.5rem !important;
            border-left: none !important;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 70%;
            background: var(--accent-gold);
            border-radius: 2px;
        }

        .ps-img-btn,
        #updatesubmitbutton {
            color: white !important;
            font-weight: 600;
            border: none;
            background: linear-gradient(135deg, var(--medium-brown) 0%, var(--primary-brown) 100%);
            padding: 10px 28px;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(62, 39, 35, 0.3);
            letter-spacing: 0.5px;
        }

        #updatesubmitbutton:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(62, 39, 35, 0.4);
            filter: brightness(1.1);
        }

        #updatesubmitbutton:disabled {
            background: #cbd5e1;
            color: #94a3b8 !important;
            box-shadow: none;
            cursor: not-allowed;
        }

        /* Integration buttons */
        #registration-form .btn-outline-primary, 
        #registration-form .btn-outline-secondary, 
        #registration-form .btn-outline-success {
            border-color: #D7CCC8 !important;
            color: var(--medium-brown) !important;
            background: #fff;
            border-radius: 0 10px 10px 0 !important;
            font-weight: 500;
        }

        #registration-form .btn-outline-primary:hover, 
        #registration-form .btn-outline-secondary:hover, 
        #registration-form .btn-outline-success:hover {
            background: var(--primary-brown) !important;
            color: #fff !important;
            border-color: var(--primary-brown) !important;
        }

        #education_wrapper-update {
            min-height: 44px;
            background-color: rgba(255, 255, 255, 0.9);
            border: 1.5px solid #E0E0E0;
            border-radius: 10px;
            padding: 4px 8px !important;
            transition: all 0.25s ease;
        }

        #education_wrapper-update:focus-within {
            border-color: var(--medium-brown);
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(62, 39, 35, 0.1);
        }

        #education_tags-update .badge {
            margin: 2px;
            background-color: var(--primary-brown) !important;
            color: #ffffff;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Flowbite-style file input */
        .ps-file-upload-wrapper { position: relative; }
        .ps-file-upload-wrapper input[type="file"] { display: none; }
        .ps-file-upload-btn {
            display: flex; align-items: center; gap: 8px; width: 100%;
            padding: 9px 12px; font-size: 13px; border: 1.5px solid #E0E0E0;
            border-radius: 10px; background-color: rgba(255, 255, 255, 0.9); cursor: pointer;
            color: #666; transition: all 0.2s;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .ps-file-upload-btn:hover { background-color: #fff; border-color: var(--medium-brown); }
        .ps-file-upload-btn.file-selected {
            border-color: var(--primary-brown);
            background-color: rgba(93, 64, 55, 0.1);
            color: var(--primary-brown);
            font-weight: 500;
        }

        .exit-form-btn {
            background: rgba(255, 255, 255, 0.4) !important;
            border: 1.5px solid var(--border-white) !important;
            color: var(--primary-brown) !important;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08) !important;
            backdrop-filter: blur(8px);
            border-radius: 50% !important;
        }

        .exit-form-btn:hover {
            background: var(--primary-brown) !important;
            color: #fff !important;
            transform: rotate(90deg) scale(1.1);
            box-shadow: 0 8px 25px rgba(62, 39, 35, 0.25) !important;
            border-color: var(--primary-brown) !important;
        }

        /* Inner cards transparent */
        .card-body .card {
            background: rgba(255, 255, 255, 0.2) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 15px !important;
            margin-bottom: 1.5rem !important;
            box-shadow: none !important;
        }

        /* Radio buttons */
        .form-check-input:checked {
            background-color: var(--primary-brown);
            border-color: var(--primary-brown);
        }

        .btn-copy-address {
            background-color: transparent !important;
            border: 1px solid var(--primary-brown) !important;
            color: var(--primary-brown) !important;
            padding: 6px 14px !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            font-size: 0.85rem !important;
            transition: all 0.3s ease !important;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-copy-address:hover {
            background-color: var(--primary-brown) !important;
            color: white !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(45, 27, 24, 0.15);
        }

        .card:focus-within {
            position: relative;
            z-index: 10 !important;
        }
        
        .cursor-pointer { cursor: pointer; }
    </style>


    <?php if (isset($manager)) : ?>
        <div class="bg-custom-header py-3 px-4 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <?php 
                        $is_self = ($manager->Familymembershipid == session()->get('Kaadaisoft_userId'));
                        $is_head = ($manager->MemberRole == 'Head');
                        if ($is_self) {
                            $icon = 'bi-person-circle';
                            $title = 'Update My Details';
                        } else {
                            $icon = $is_head ? 'bi-person-circle' : 'bi-people-fill';
                            $title = $is_head ? 'Update Manager Details' : 'Update Family Member Details';
                        }
                    ?>
                    <i class="bi <?= $icon ?> me-2"></i><?= $title ?>: <small style="color: var(--accent-gold);"><?= $manager->Familymembershipid ?></small>
                </h4>
                <button onclick="hideupdatemanagerform()" class="btn exit-form-btn">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
        </div>

        <form name="managerregistration-update" id="registration-form" class="p-4" onsubmit="return validateUpdateManagerform()" action="<?= base_url("admindashboard/updateManager"); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">

            <input hidden value="<?= $manager->Familymembershipid ?>" id="membershipid-update" type="text" name="membershipid-update">
            <input hidden value="manager" type="text" name="path">
            <input hidden value="updatemanager" type="text" name="reason">
            
            <!-- Verification Tracking -->
            <input type="hidden" id="is_email_verified-manager" name="is_email_verified-manager" value="1">
            <input type="hidden" id="is_phone_verified-manager" name="is_phone_verified-manager" value="1">
            <input type="hidden" id="original_email-manager" value="<?= esc($manager->Email) ?>">
            <input type="hidden" id="original_phone-manager" value="<?= esc($manager->Phonenumber) ?>">


            <div class="card mb-4 border-0">
                <div class="card-body">
                    <h5 class="mb-4 section-title">
                        <i class="bi bi-person-circle fs-5 me-2"></i>Basic Details
                    </h5>

                    <div class="row g-4">
                        <!-- Relationship -->
                        <div class="col-md-4">
                            <label for="relationship-update">Relationship</label>
                            <select id="relationship-update" class="form-select" name="relationship-update" onchange="validateUpdateInput(this); toggleCustomRelationshipUpdate(this)">
                                <option value="">Select Relationship</option>
                                <option value="Head" <?= ($manager->MemberRole == 'Head') ? 'selected' : '' ?>>Head</option>
                                <option value="Grand Father" <?= ($manager->MemberRole == 'Grand Father') ? 'selected' : '' ?>>Grand Father</option>
                                <option value="Grand Mother" <?= ($manager->MemberRole == 'Grand Mother') ? 'selected' : '' ?>>Grand Mother</option>
                                <option value="Father" <?= ($manager->MemberRole == 'Father') ? 'selected' : '' ?>>Father</option>
                                <option value="Mother" <?= ($manager->MemberRole == 'Mother') ? 'selected' : '' ?>>Mother</option>
                                <option value="Husband" <?= ($manager->MemberRole == 'Husband') ? 'selected' : '' ?>>Husband</option>
                                <option value="Wife" <?= ($manager->MemberRole == 'Wife') ? 'selected' : '' ?>>Wife</option>
                                <option value="Son" <?= ($manager->MemberRole == 'Son') ? 'selected' : '' ?>>Son</option>
                                <option value="Daughter" <?= ($manager->MemberRole == 'Daughter') ? 'selected' : '' ?>>Daughter</option>
                                <option value="Son-in-law" <?= ($manager->MemberRole == 'Son-in-law') ? 'selected' : '' ?>>Son-in-law</option>
                                <option value="Daughter-in-law" <?= ($manager->MemberRole == 'Daughter-in-law') ? 'selected' : '' ?>>Daughter-in-law</option>
                                <option value="Brother" <?= ($manager->MemberRole == 'Brother') ? 'selected' : '' ?>>Brother</option>
                                <option value="Sister" <?= ($manager->MemberRole == 'Sister') ? 'selected' : '' ?>>Sister</option>
                                <?php 
                                    $standard_roles = ["Head", "Grand Father", "Grand Mother", "Father", "Mother", "Husband", "Wife", "Son", "Daughter", "Son-in-law", "Daughter-in-law", "Brother", "Sister"];
                                    $is_custom = !in_array($manager->MemberRole, $standard_roles) && !empty($manager->MemberRole);
                                ?>
                                <option value="Other" <?= $is_custom ? 'selected' : '' ?>>Other</option>
                            </select>
                            <div id="custom_rel_div-update" class="mt-2" style="display:<?= $is_custom ? 'block' : 'none' ?>;">
                                <label for="custom_relationship-update">Specify Relationship</label>
                                <input type="text" id="custom_relationship-update" name="custom_relationship-update" class="form-control" value="<?= $is_custom ? $manager->MemberRole : '' ?>" onkeyup="validateUpdateInput(this)">
                                <small id="custom_relationshiperror-update" class="text-danger"></small>
                            </div>
                            <small id="relationshiperror-update" class="text-danger"></small>
                        </div>

                        <!-- Name -->
                        <div class="col-md-4">
                            <label for="name-update">Name <span class="mandatory-star">*</span></label>
                            <input onkeyup="validateUpdateInput(this)" id="name-update" class="form-control" type="text" name="name-update" value="<?= $manager->Name ?>" required>
                            <small id="nameerror-update" class="text-danger"></small>
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-4">
                            <label for="phoneno-update">Phone Number <span class="mandatory-star">*</span></label>
                            <div class="input-group">
                                <input id="phoneno-update" class="form-control" type="number" name="phoneno-update" value="<?= $manager->Phonenumber ?>" 
                                    oninput="if (this.value.length > 10) this.value = this.value.slice(0, 10)" 
                                    onkeyup="validateUpdateInput(this)" required>
                                <button type="button" id="verify-phone-btn-manager" class="btn btn-outline-primary" style="display:none;" onclick="checkPhoneVerificationManager()">Verify</button>
                                <span id="phone-verified-badge-manager" class="input-group-text text-success" title="Verified"><i class="fa-solid fa-circle-check"></i></span>
                            </div>
                            <small id="phonenoerror-update" class="text-danger"></small>
                        </div>

                        <!-- Aadhar Number -->
                        <div class="col-md-4">
                            <label for="aadharno-update">Aadhar Number <span class="mandatory-star">*</span></label>
                            <input id="aadharno-update" onkeyup="validateUpdateInput(this)" onkeypress="if(this.value.length == 12) return false" class="form-control" type="number" name="aadharno-update" value="<?= $manager->Aadharnumber ?>" required>
                            <small id="aadharnoerror-update" class="text-danger"></small>
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-md-4">
                            <label for="dob-update">Date Of Birth</label>
                            <input id="dob-update" class="form-control" type="date" name="dob-update" value="<?= $manager->Dob ?>" onchange="validateUpdateInput(this)">
                            <small id="doberror-update" class="text-danger"></small>
                        </div>

                        <!-- Gender -->
                        <div class="col-md-4">
                            <label class="d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="gender_male-update" name="gender-update" value="Male" <?= ($manager->Gender == 'Male') ? 'checked' : '' ?> onchange="validateUpdateInput(this)">
                                <label class="form-check-label" for="gender_male-update">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="gender_female-update" name="gender-update" value="Female" <?= ($manager->Gender == 'Female') ? 'checked' : '' ?> onchange="validateUpdateInput(this)">
                                <label class="form-check-label" for="gender_female-update">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="gender_other-update" name="gender-update" value="Other" <?= ($manager->Gender == 'Other') ? 'checked' : '' ?> onchange="validateUpdateInput(this)">
                                <label class="form-check-label" for="gender_other-update">Other</label>
                            </div>
                            <div><small id="gendererror-update" class="text-danger"></small></div>
                        </div>

                        <!-- Blood Group -->
                        <div class="col-md-4">
                            <label for="bloodgroup-update">Blood Group</label>
                            <select id="bloodgroup-update" class="form-select" name="bloodgroup-update" onchange="validateUpdateInput(this)">
                                <option value="">Select Blood Group</option>
                                <?php $bgroups = ["A+", "A-", "B+", "B-", "O+", "O-", "AB+", "AB-"]; ?>
                                <?php foreach ($bgroups as $bg): ?>
                                    <option value="<?= $bg ?>" <?= ($manager->Bloodgroup == $bg) ? 'selected' : '' ?>><?= $bg ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small id="bloodgrouperror-update" class="text-danger"></small>
                        </div>

                        <!-- Email -->
                        <div class="col-md-4">
                            <label for="email-update">Email</label>
                            <div class="input-group">
                                <input id="email-update" onkeyup="validateUpdateInput(this)" class="form-control" type="email" name="email-update" value="<?= $manager->Email ?>">
                                <button type="button" id="verify-email-btn-manager" class="btn btn-outline-primary" style="display:none;" onclick="sendUpdateEmailOTPManager()">Verify</button>
                                <span id="email-verified-badge-manager" class="input-group-text text-success" title="Verified"><i class="fa-solid fa-circle-check"></i></span>
                            </div>
                            <small id="emailerror-update" class="text-danger"></small>
                        </div>

                        <!-- Email OTP Section (Manager) -->
                        <div class="col-md-4" id="email-otp-section-manager" style="display:none;">
                            <label for="email-otp-manager">Enter OTP Sent to Email <span class="mandatory-star">*</span></label>
                            <div class="input-group">
                                <input type="text" id="email-otp-manager" class="form-control" placeholder="6-digit OTP" maxlength="6">
                                <button type="button" class="btn btn-success" onclick="verifyUpdateEmailOTPManager()">Verify OTP</button>
                            </div>
                            <small id="email-otp-error-manager" class="text-danger"></small>
                        </div>

                        <!-- WhatsApp Number -->
                        <div class="col-md-4">
                            <label for="whatsappno-update">WhatsApp Number</label>
                            <div class="input-group">
                                <input id="whatsappno-update" class="form-control" type="number" name="whatsappno-update" value="<?= $manager->Whatsappnumber ?>" 
                                    oninput="if (this.value.length > 10) this.value = this.value.slice(0, 10)" 
                                    onkeyup="validateUpdateInput(this)">
                                <button class="btn btn-outline-secondary" type="button" onclick="copyPhoneToWhatsappUpdate()">Same as Phone</button>
                            </div>
                            <small id="whatsappnoerror-update" class="text-danger"></small>
                        </div>

                        <!-- Married status -->
                        <div class="col-md-4">
                            <label class="d-block">Married</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="married_yes-update" name="married-update" value="Yes" <?= ($manager->Married == 'Yes') ? 'checked' : '' ?> onchange="validateUpdateInput(this)">
                                <label class="form-check-label" for="married_yes-update">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="married_no-update" name="married-update" value="No" <?= ($manager->Married == 'No') ? 'checked' : '' ?> onchange="validateUpdateInput(this)">
                                <label class="form-check-label" for="married_no-update">No</label>
                            </div>
                            <div><small id="marriederror-update" class="text-danger"></small></div>
                        </div>

                        <!-- Alive Status -->
                        <div class="col-md-4">
                            <label class="d-block">Alive Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="alive_yes-update" name="is_dead-update" value="0" <?= (!isset($manager->is_dead) || $manager->is_dead == 0) ? 'checked' : '' ?> onchange="validateUpdateInput(this); toggleUpcomingHeadUpdate()">
                                <label class="form-check-label" for="alive_yes-update">Alive</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="alive_no-update" name="is_dead-update" value="1" <?= (isset($manager->is_dead) && $manager->is_dead == 1) ? 'checked' : '' ?> onchange="validateUpdateInput(this); toggleUpcomingHeadUpdate()">
                                <label class="form-check-label" for="alive_no-update">Dead</label>
                            </div>
                            <div><small id="alivedeaderror-update" class="text-danger"></small></div>
                        </div>

                        <!-- Upcoming Head -->
                        <div class="col-md-4" id="upcoming_head_div-update" style="display:<?= ($manager->MemberRole == 'Head' && isset($manager->is_dead) && $manager->is_dead == 1) ? 'block' : 'none' ?>;">
                            <label for="upcoming_head-update">Upcoming Head (Select to Transfer) <span class="mandatory-star">*</span></label>
                            <select id="upcoming_head-update" class="form-select" name="upcoming_head-update" onchange="validateUpdateInput(this)">
                                <option value="">Select New Head</option>
                                <?php if(isset($family_members)): ?>
                                    <?php foreach($family_members as $fm): ?>
                                        <?php if($fm->Familymembershipid != $manager->Familymembershipid && (!isset($fm->is_dead) || $fm->is_dead == 0)): ?>
                                            <option value="<?= $fm->Familymembershipid ?>"><?= $fm->Name ?> (<?= $fm->MemberRole ?>)</option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <small id="upcomingheaderror-update" class="text-danger"></small>
                            <small class="text-muted d-block">Selecting a member here will make them the new Family Head.</small>
                        </div>

                        <!-- Valuvu -->
                        <div class="col-md-4">
                            <label for="valuvu-update">Valuvu</label>
                            <input id="valuvu-update" onkeyup="validateUpdateInput(this)" class="form-control" type="text" name="valuvu-update" value="<?= $manager->Valuvu ?>">
                            <small id="valuvuerror-update" class="text-danger"></small>
                        </div>

                        <!-- Thottam -->
                        <div class="col-md-4">
                            <label for="thottam-update">Thottam</label>
                            <input id="thottam-update" onkeyup="validateUpdateInput(this)" class="form-control" type="text" name="thottam-update" value="<?= $manager->Thottam ?>">
                            <small id="thottamerror-update" class="text-danger"></small>
                        </div>

                        <!-- Kulam -->
                        <div class="col-md-4">
                            <label for="kulam-update">Kulam</label>
                            <select id="kulam-update" class="form-select" name="kulam-update">
                                <option value="Poondurai Kaadai" <?= ($manager->Kulam == 'Poondurai Kaadai') ? 'selected' : '' ?>>Poondurai Kaadai</option>
                                <?php 
                                    $kulams = ["Aanthuvan Kulam", "Azhagu Kulam", "Aathe Kulam", "Aanthai Kulam", "Aadar Kulam", "Aavan Kulam", "Eenjan Kulam", "Ozukkar Kulam", "Oothaalar Kulam", "Kannakkan Kulam", "Kannan Kulam", "Kannaanthai Kulam", "Kaadai Kulam", "Kaari Kulam", "Keeran Kulam", "Kuzhlaayan Kulam", "Koorai Kulam", "Koovendhar Kulam", "Saathanthai Kulam", "Sellan Kulam", "Semban Kulam", "Sengkannan Kulam", "Sembuthan Kulam", "Senkunnier Kulam", "Sevvaayar Kulam", "Cheran Kulam", "Chedan Kulam", "Dananjayan Kulam", "Thazhinji Kulam", "Thooran Kulam", "Devendran Kulam", "Thoodar Kulam", "Neerunniyar Kulam", "Pavazhalar Kulam", "Panayan Kulam", "Pathuman Kulam", "Payiran Kulam", "Panagkaadar Kulam", "Pathariar Kulam", "Pandiyan Kulam", "Pillar Kulam", "Poosan Kulam", "Poochanthai Kulam", "Periyan Kulam", "Perunkudiyaan Kulam", "Porulaanthai Kulam", "Ponnar Kulam", "Maniyan Kulam", "Mayilar Kulam", "Maadar Kulam", "Mutthan Kulam", "Muzhukathan Kulam", "Medhi Kulam", "Vannakkan Kulam", "Villiyar Kulam", "Vilayan Kulam", "Vizhiyar Kulam", "Venduvan Kulam", "Vennag Kulam", "Vellampar Kulam"];
                                    foreach($kulams as $k) {
                                        echo "<option value='$k' ".($manager->Kulam == $k ? 'selected' : '').">$k</option>";
                                    }
                                ?>
                            </select>
                        </div>

                         <!-- Exist Family ID -->
                         <div class="col-md-4">
                            <label for="existfamilyid-update">Exist Family ID</label>
                            <input id="existfamilyid-update" onkeyup="validateUpdateInput(this)" class="form-control" type="text" name="existfamilyid-update" value="<?= $manager->Existfamilyid ?>">
                            <small id="familyiderror-update" class="text-danger"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 border-0">
                <div class="card-body">
                    <h5 class="mb-4 section-title">
                        <i class="bi bi-briefcase-fill fs-5 me-2"></i>Education & Career Details
                    </h5>
                    <div class="row g-4">
                        <!-- Education -->
                        <div class="col-md-4" style="position: relative;">
                            <label for="education_input-update">Education</label>
                            <div class="border rounded p-1 bg-white d-flex align-items-center flex-wrap gap-1" id="education_wrapper-update" style="cursor: text; min-height: 38px;">
                                <div id="education_tags-update" class="d-flex flex-wrap gap-1"></div>
                                <input type="text" id="education_input-update"
                                    class="form-control form-control-sm border-0 bg-transparent shadow-none"
                                    placeholder="Type or select education"
                                    onfocus="filterEducationOptionsUpdate(this)"
                                    oninput="filterEducationOptionsUpdate(this)"
                                    onclick="filterEducationOptionsUpdate(this)"
                                    autocomplete="off"
                                    style="flex: 1; min-width: 120px;">
                                <input type="hidden" id="educationfield-update" name="education-update">
                            </div>
                            <small id="educationerror-update" class="text-danger"></small>
                            <div id="education_hidden_container-update"></div>
                            <div class="border rounded mt-1 bg-white shadow-sm" id="education_dropdown-update" style="max-height:250px; overflow:auto; display:none; position:absolute; width: calc(100% - 1.5rem); left: 0.75rem; z-index: 1001;">
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
                        <div id="education_others_wrapper-update" style="display:none;" class="col-md-4">
                            <label for="education_others_input-update">Other Education</label>
                            <div class="input-group input-group-sm">
                                <input type="text" id="education_others_input-update" 
                                    class="form-control" 
                                    placeholder="Enter education manually">
                                <button class="btn btn-primary" type="button" onclick="addManualEducationUpdate()">Add</button>
                            </div>
                        </div>

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
                                $display_prof = $manager->Profession;
                                if (isset($profession_map[$manager->Profession])) {
                                    $display_prof = $profession_map[$manager->Profession];
                                }
                            ?>
                            <label for="profession-update">Profession</label>
                            <div class="border rounded p-1 bg-white d-flex align-items-center" id="profession_wrapper-update" style="cursor: pointer; min-height: 38px;">
                                <input type="text" id="profession_input-update" 
                                    class="form-control form-control-sm border-0 bg-transparent shadow-none" 
                                    placeholder="Type or click to select profession"
                                    onfocus="filterProfessionOptionsUpdate(this)"
                                    oninput="filterProfessionOptionsUpdate(this)"
                                    onclick="filterProfessionOptionsUpdate(this)"
                                    readonly 
                                    style="cursor: pointer; flex: 1;"
                                    value="<?= esc($display_prof) ?>">
                                <input type="hidden" id="profession-update" name="profession-update" value="<?= esc($manager->Profession) ?>">
                            </div>
                            <div class="border rounded mt-1 bg-white shadow-sm" id="profession_dropdown-update" 
                                style="max-height:250px; overflow:auto; display:none; position:absolute; z-index:1001; width: calc(100% - 1.5rem); left: 0.75rem;">
                                <?php 
                                    foreach($profession_map as $val => $text) {
                                        echo "<div class='profession-option p-2 border-bottom' data-value='$val'>$text</div>";
                                    }
                                ?>
                            </div>
                            <small id="professionerror-update" class="text-danger"></small>
                        </div>


                        <!-- Business -->
                        <div class="col-md-4" id="business-extra-wrapper-update" style="display:<?= ($manager->Profession == 'Others') ? 'block' : 'none' ?>;">
                            <label for="business-update">Business Name</label>
                            <input type="text" id="business-update" name="business-update" class="form-control" value="<?= $manager->Business ?>">
                            <label for="business_website-update" class="mt-2">Business Website</label>
                            <input type="text" id="business_website-update" name="business_website-update" class="form-control" value="<?= $manager->BusinessWebsite ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 border-0">
                <div class="card-body">
                    <h5 class="mb-4 section-title">
                        <i class="bi bi-geo-alt-fill fs-5 me-2"></i>Native Address
                    </h5>
                    <div class="row g-4">
                        <div class="col-md-3" style="display: none;">
                            <label for="states-dropdown-update">State</label>
                            <select id="states-dropdown-update" onchange="setDropdowndistrictsUpdate(this); validateUpdateInput(this)" class="form-select" name="state-update">
                                <option value=''>Select State</option>
                                <?php if (isset($states)): ?>
                                    <?php foreach ($states as $state): ?>
                                        <option value='<?= $state->state_id ?>' <?= ($manager->state_id == $state->state_id) ? 'selected' : '' ?>><?= $state->state_title ?></option>
                                    <?php endforeach; ?>
                                <?php endif ?>
                            </select>
                            <small id="stateerror-update" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="districts-dropdown-update">District</label>
                            <select id="districts-dropdown-update" onchange="setDropdowntaluksUpdate(this); validateUpdateInput(this)" class="form-select" name="district-update">
                                <option value="">Select District</option>
                                <?php if (isset($districts)): foreach ($districts as $d): ?>
                                    <option value="<?= $d->district_name ?>" <?= ($manager->District == $d->district_name) ? 'selected' : '' ?>><?= $d->district_name ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <small id="districterror-update" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="taluks-dropdown-update">Taluk</label>
                            <select id="taluks-dropdown-update" onchange="toggleTalukOthersUpdate(this); setDropdownpanchayatUpdate(this); validateUpdateInput(this)" class="form-select" name="taluk-update">
                                <option value="">Select Taluk</option>
                                <?php if (isset($taluks)): foreach ($taluks as $t): ?>
                                    <option value="<?= $t->taluk_name ?>" <?= ($manager->Taluk == $t->taluk_name) ? 'selected' : '' ?>><?= $t->taluk_name ?></option>
                                <?php endforeach; endif; ?>
                                <option value="Others" <?= (isset($manager->Taluk) && !empty($manager->Taluk) && !in_array($manager->Taluk, array_column($taluks ?? [], 'taluk_name')) && $manager->Taluk !== '') ? 'selected' : '' ?>>Others</option>
                            </select>
                            <input type="text" id="taluk_others_input_manager" name="taluk_others_update" 
                                class="form-control mt-2" 
                                placeholder="Enter taluk name" 
                                style="display:none;" 
                                onkeyup="validateUpdateInput(this)">
                            <small id="talukerror-update" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="panchayat-dropdown-update">Panchayat</label>
                            <select id="panchayat-dropdown-update" onchange="togglePanchayatOthersUpdate(this); setDropdownVillageUpdate(this); validateUpdateInput(this)" class="form-select" name="panchayat-update">
                                <option value="">Select Panchayat</option>
                                <?php if (isset($panchayats)): foreach ($panchayats as $p): ?>
                                    <option value="<?= $p->panchayat_name ?>" <?= ($manager->Panchayat == $p->panchayat_name) ? 'selected' : '' ?>><?= $p->panchayat_name ?></option>
                                <?php endforeach; endif; ?>
                                <option value="Others" <?= (isset($manager->Panchayat) && !empty($manager->Panchayat) && !in_array($manager->Panchayat, array_column($panchayats ?? [], 'panchayat_name')) && $manager->Panchayat !== '') ? 'selected' : '' ?>>Others</option>
                            </select>
                            <input type="text" id="panchayat_others_input_manager" name="panchayat_others_update" 
                                class="form-control mt-2" 
                                placeholder="Enter panchayat name" 
                                style="display:none;" 
                                onkeyup="validateUpdateInput(this)">
                            <small id="panchayaterror-update" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="village-update">Village</label>
                            <select id="village-update" onchange="toggleVillageOthersUpdate(this); validateUpdateInput(this)" class="form-select" name="village-update">
                                <option value="<?= $manager->Village ?>"><?= $manager->Village ?: 'Select Village' ?></option>
                                <option value="Others">Others</option>
                            </select>
                           <input type="text" id="village_others_input_manager" name="village_others_update" 
                                class="form-control mt-2" 
                                placeholder="Enter village name" 
                                style="display:none;" 
                                onkeyup="validateUpdateInput(this)">
                            <small id="villageerror-update" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="street-update">Street</label>
                            <input id="street-update" onkeyup="validateUpdateInput(this)" class="form-control" type="text" name="street-update" value="<?= $manager->Street ?>">
                            <small id="streeterror-update" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="doorno-update">Door No</label>
                            <input id="doorno-update" onkeyup="validateUpdateInput(this)" class="form-control" type="text" name="doorno-update" value="<?= $manager->Doornumber ?>">
                            <small id="doornoerror-update" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="pincode-update">Pin Code</label>
                            <input id="pincode-update" onkeyup="validateUpdateInput(this)" 
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)"
                                class="form-control" type="text" inputmode="numeric" name="pincode-update" maxlength="6" value="<?= $manager->Pincode ?>">
                            <small id="pincodeerror-update" class="text-danger"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0 section-title">
                            <i class="bi bi-geo-alt-fill fs-5 me-2" style="color: #2E7D32;"></i>Current Address
                        </h5>
                        <button type="button" id="btn_same_as_native-update" class="btn-copy-address" onclick="copyNativeAddressUpdate()" style="display: <?= ($manager->Curaddresstype == 'India' || $manager->Curaddresstype == 'TamilNadu' || $manager->Curaddresstype == 'OtherState') ? 'inline-block' : 'none' ?>;">
                            Same as Native Address
                        </button>
                    </div>

                    <div class="mb-3">
                        <label class="d-block">Current Address Type</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-update" id="cur_address_tn-update" value="TamilNadu" <?= ($manager->Curaddresstype == 'TamilNadu' || ($manager->Curaddresstype == 'India' && $manager->Curstate == 35)) ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeUpdate()">
                            <label class="form-check-label" for="cur_address_tn-update">Tamil Nadu</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-update" id="cur_address_others-update" value="OtherState" <?= ($manager->Curaddresstype == 'OtherState' || ($manager->Curaddresstype == 'India' && $manager->Curstate != 35 && $manager->Curstate != '')) ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeUpdate()">
                            <label class="form-check-label" for="cur_address_others-update">Other State</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-update" id="cur_address_nri-update" value="NRI" <?= ($manager->Curaddresstype == 'NRI') ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeUpdate()">
                            <label class="form-check-label" for="cur_address_nri-update">NRI</label>
                        </div>
                        <small id="cur_address_type_error-update" class="text-danger"></small>
                    </div>

                    <div id="cur_india_block-update" style="display:<?= ($manager->Curaddresstype == 'TamilNadu' || ($manager->Curaddresstype == 'India' && $manager->Curstate == 35)) ? 'block' : 'none' ?>;">
                        <div class="row g-3">
                            <div class="col-md-3" id="cur_state_container-update" style="display: <?= ($manager->Curaddresstype == 'OtherState' || ($manager->Curaddresstype == 'India' && $manager->Curstate != 35)) ? 'block' : 'none' ?>;">
                                <label for="cur_state-update">State</label>
                                <select id="cur_state-update" onchange="setDropdowndistrictsCurrentUpdate(this); validateUpdateInput(this)" class="form-select" name="cur_state-update">
                                    <option value="">Select State</option>
                                    <?php if (isset($states)): ?>
                                        <?php foreach ($states as $state): ?>
                                            <option value="<?= $state->state_id ?>" <?= ($manager->Curstate == $state->state_id) ? 'selected' : '' ?>><?= $state->state_title ?></option>
                                        <?php endforeach; ?>
                                    <?php endif ?>
                                </select>
                                <small id="cur_stateerror-update" class="text-danger"></small>
                            </div>
                             <div class="col-md-3">
                                <label for="cur_district-update">District</label>
                                 <select id="cur_district-update" style="border: 1px solid #ced4da;" onchange="setDropdowntaluksCurrentUpdate(this); validateUpdateInput(this)" class="form-select" name="cur_district-update">
                                    <option value="<?= $manager->Curdistrict ?>"><?= $manager->Curdistrict ?: 'Select District' ?></option>
                                </select>
                                <small id="cur_districterror-update" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_taluk-update">Taluk</label>
                                 <select id="cur_taluk-update" style="border: 1px solid #ced4da;" onchange="toggleTalukOthersCurrentManager(this); setDropdownpanchayatCurrentUpdate(this); validateUpdateInput(this)" class="form-select" name="cur_taluk-update">
                                    <option value="<?= $manager->Curtaluk ?>"><?= $manager->Curtaluk ?: 'Select Taluk' ?></option>
                                </select>
                                <input type="text" id="cur_taluk_others_input_manager" name="cur_taluk_others_update" 
                                    class="form-control mt-2" 
                                    placeholder="Enter taluk name" 
                                    style="display:none;" 
                                    onkeyup="validateUpdateInput(this)">
                                <small id="cur_talukerror-update" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_panchayat-update">Panchayat</label>
                                 <select id="cur_panchayat-update" style="border: 1px solid #ced4da;" onchange="togglePanchayatOthersCurrentManager(this); setDropdownVillageCurrentUpdate(this); validateUpdateInput(this)" class="form-select" name="cur_panchayat-update">
                                    <option value="<?= $manager->Curpanchayat ?>"><?= $manager->Curpanchayat ?: 'Select Panchayat' ?></option>
                                </select>
                                <input type="text" id="cur_panchayat_others_input_manager" name="cur_panchayat_others_update" 
                                    class="form-control mt-2" 
                                    placeholder="Enter panchayat name" 
                                    style="display:none;" 
                                    onkeyup="validateUpdateInput(this)">
                                <small id="cur_panchayaterror-update" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_village-update">Village</label>
                                <select id="cur_village-update" onchange="toggleVillageOthersCurrentManager(this); validateUpdateInput(this)" class="form-select" name="cur_village-update">
                                    <option value="<?= $manager->Curvillage ?>"><?= $manager->Curvillage ?: 'Select Village' ?></option>
                                </select>
                                <input type="text" id="cur_village_others_input_manager" name="cur_village_others_update" 
                                    class="form-control mt-2" 
                                    placeholder="Enter village name" 
                                    style="display:none;" 
                                    onkeyup="validateUpdateInput(this)">
                                <small id="cur_villageerror-update" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_street-update">Street</label>
                                <input id="cur_street-update" onkeyup="validateUpdateInput(this)" class="form-control" type="text" name="cur_street-update" value="<?= $manager->Curstreet ?>">
                                <small id="cur_streeterror-update" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_doorno-update">Door No</label>
                                <input id="cur_doorno-update" onkeyup="validateUpdateInput(this)" class="form-control" type="text" name="cur_doorno-update" value="<?= $manager->Curdoorno ?>">
                                <small id="cur_doornoerror-update" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_pincode-update">Pin Code</label>
                                <input id="cur_pincode-update" onkeyup="validateUpdateInput(this)" 
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)"
                                    class="form-control" type="text" inputmode="numeric" name="cur_pincode-update" maxlength="6" value="<?= $manager->Curpincode ?>">
                                <small id="cur_pincodeerror-update" class="text-danger"></small>
                            </div>
                        </div>
                    </div>

                    <!-- NRI CURRENT ADDRESS BLOCK -->
                    <div id="cur_nri_block-update" style="display:<?= ($manager->Curaddresstype == 'NRI' || $manager->Curaddresstype == 'OtherState' || ($manager->Curaddresstype == 'India' && $manager->Curstate != 35 && $manager->Curstate != '')) ? 'block' : 'none' ?>;">
                        <div class="row g-3">
                            <div class="col-md-3" id="cur_nri_country_container-update" style="display: <?= ($manager->Curaddresstype == 'NRI') ? 'block' : 'none' ?>;">
                                <label for="cur_nri_country-update">Country</label>
                                <select id="cur_nri_country-update" name="cur_nri_country-update" class="form-select" onchange="loadNRIStatesUpdate(this.value); validateUpdateInput(this)">
                                    <option value="<?= $manager->Curnricountry ?>"><?= $manager->Curnricountry ?: 'Select Country' ?></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_nri_state-update">State / Region</label>
                                <select id="cur_nri_state-update" name="cur_nri_state-update" class="form-select" onchange="loadNRICitiesUpdate(this.value); validateUpdateInput(this)">
                                    <option value="<?= $manager->Curnristate ?>"><?= $manager->Curnristate ?: 'Select State' ?></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_nri_city-update">City</label>
                                <select id="cur_nri_city-update" name="cur_nri_city-update" class="form-select" onchange="validateUpdateInput(this)">
                                    <option value="<?= $manager->Curnricity ?>"><?= $manager->Curnricity ?: 'Select City' ?></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_nri_zip-update">Zip Code</label>
                                <input id="cur_nri_zip-update" name="cur_nri_zip-update" class="form-control" type="text" value="<?= $manager->Curnrizip ?>" 
                                    oninput="this.value = this.value.replace(/[^a-zA-Z0-9 -]/g, '').slice(0, 12)"
                                    onkeyup="validateUpdateInput(this)">
                            </div>
                            <div class="col-md-12">
                                <label for="cur_nri_fulladdress-update">Full Address</label>
                                <textarea id="cur_nri_fulladdress-update" name="cur_nri_fulladdress-update" class="form-control" rows="3" onkeyup="validateUpdateInput(this)"><?= $manager->Curnrifulladdress ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 border-0">
                <div class="card-body">
                    <h5 class="mb-4 section-title">
                        <i class="bi bi-image fs-5 me-2"></i>Documents
                    </h5>
                    <div class="row g-4 align-items-end">
                        <div class="col-md-3 d-flex flex-column">
                            <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">Passport Photo</label>
                            <div class="ps-file-upload-wrapper">
                                <label for="mgr_memberimage" class="ps-file-upload-btn" id="mgr_memberimage_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledUpdate(this, 'mgr_memberimage_btn'); activateUpdateButton(document.getElementById('correctdetails-update'))" id="mgr_memberimage" type="file" name="Memberimage" accept="image/*">
                            </div>
                            <small class="text-danger Memberimage"></small>
                        </div>
                        <div class="col-md-3 d-flex flex-column">
                            <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">Aadhar Front</label>
                            <div class="ps-file-upload-wrapper">
                                <label for="mgr_aadharfront" class="ps-file-upload-btn" id="mgr_aadharfront_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledUpdate(this, 'mgr_aadharfront_btn'); activateUpdateButton(document.getElementById('correctdetails-update'))" id="mgr_aadharfront" type="file" name="Aadharfrontimage" accept="image/*">
                            </div>
                            <small class="text-danger Aadharfrontimage"></small>
                        </div>
                        <div class="col-md-3 d-flex flex-column">
                            <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">Aadhar Back</label>
                            <div class="ps-file-upload-wrapper">
                                <label for="mgr_aadharback" class="ps-file-upload-btn" id="mgr_aadharback_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledUpdate(this, 'mgr_aadharback_btn'); activateUpdateButton(document.getElementById('correctdetails-update'))" id="mgr_aadharback" type="file" name="Aadharbackimage" accept="image/*">
                            </div>
                            <small class="text-danger Aadharbackimage"></small>
                        </div>
                        <div class="col-md-3 d-flex flex-column">
                            <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">Community Certificate</label>
                            <div class="ps-file-upload-wrapper">
                                <label for="mgr_communitycert" class="ps-file-upload-btn" id="mgr_communitycert_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledUpdate(this, 'mgr_communitycert_btn'); activateUpdateButton(document.getElementById('correctdetails-update'))" id="mgr_communitycert" type="file" name="Communitycertificate" accept="image/*">
                            </div>
                            <small class="text-danger Communitycertificate"></small>
                        </div>
                    </div>
                    <div class="mt-2 text-center">
                        <span style="color:#295CF5; font-size: 13px;">Note: File Size should be below 2MB. (JPG, JPEG, PNG only)</span>
                    </div>
                </div>
            </div>

            <div class="text-center pb-5">
                <div class="d-inline-flex align-items-center justify-content-center mb-4" style="background: rgba(0,0,0,0.03); padding: 10px 20px; border-radius: 12px;">
                    <div class="form-check m-0 d-flex align-items-center">
                        <input onchange="activateUpdateButton(this)" type="checkbox" class="form-check-input m-0" id="correctdetails-update" style="width: 1.25rem; height: 1.25rem; cursor: pointer;">
                        <label for="correctdetails-update" class="form-check-label ms-2 font-weight-bold cursor-pointer" style="font-size: 0.95rem; line-height: 1.25rem;">I confirm that the above details are correct.</label>
                    </div>
                </div>
                <div>
                    <button id="updatesubmitbutton" disabled type="submit" class="btn btn-lg rounded-pill px-5">Update Details</button>
                </div>
            </div>
        </form>

    <script>
        function toggleUpcomingHeadUpdate() {
            let relationshipSelect = document.getElementById("relationship-update");
            let aliveStatusDead = document.getElementById("alive_no-update");
            let upcomingHeadDiv = document.getElementById("upcoming_head_div-update");

            if (!relationshipSelect || !aliveStatusDead || !upcomingHeadDiv) return;

            // Check if Role is Head AND Dead is checked
            if (relationshipSelect.value === "Head" && aliveStatusDead.checked) {
                upcomingHeadDiv.style.display = "block";
            } else {
                upcomingHeadDiv.style.display = "none";
                const upcomingHeadSelect = document.getElementById("upcoming_head-update");
                if (upcomingHeadSelect) upcomingHeadSelect.value = "";
            }
        }

        function toggleCustomRelationshipUpdate(select) {
            let customDiv = document.getElementById("custom_rel_div-update");
            if (select.value === "Other") {
                customDiv.style.display = "block";
            } else {
                customDiv.style.display = "none";
                document.getElementById("custom_relationship-update").value = "";
            }
            toggleUpcomingHeadUpdate();
        }

        function setDropdowndistrictsUpdate(state, selectDistrict = null, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let state_id = state.value;
            
            // Clear dependent dropdowns
            if (!selectDistrict) {
                document.getElementById("taluks-dropdown-update").innerHTML = '<option value="">Select Taluk</option>';
                document.getElementById("panchayat-dropdown-update").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("village-update").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("village_others_input_manager").style.display = 'none';
                document.getElementById("village_others_input_manager").value = '';
            }

            if (!state_id) return;

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { "state_id": state_id },
                success: (result) => {
                    let districtDropdown = document.getElementById("districts-dropdown-update");
                    districtDropdown.innerHTML = result;
                    if (selectDistrict) {
                        districtDropdown.value = selectDistrict;
                        setDropdowntaluksUpdate(districtDropdown, selectTaluk, selectPanchayat, selectVillage);
                    }
                }
            });
        }

        function setDropdowntaluksUpdate(district, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let district_name = district.value;

            // Clear dependent dropdowns
            if (!selectTaluk) {
                document.getElementById("panchayat-dropdown-update").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("village-update").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("village_others_input_manager").style.display = 'none';
                document.getElementById("village_others_input_manager").value = '';
            }

            if (!district_name) return;

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { "district_name": district_name },
                success: function (result) {
                    let dropdown = document.getElementById("taluks-dropdown-update");
                    dropdown.innerHTML = result;
                    dropdown.innerHTML += '<option value="Others">Others</option>';
                    
                    if (selectTaluk) {
                        dropdown.value = selectTaluk;
                        if (dropdown.value !== selectTaluk && selectTaluk !== "") {
                            dropdown.value = 'Others';
                            toggleTalukOthersUpdate(dropdown, selectTaluk);
                        } else {
                            toggleTalukOthersUpdate(dropdown);
                        }
                        setDropdownpanchayatUpdate(dropdown, selectPanchayat, selectVillage);
                    } else {
                        toggleTalukOthersUpdate(dropdown);
                    }
                },
                error: function () {
                    document.getElementById("taluks-dropdown-update").innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                    toggleTalukOthersUpdate(document.getElementById("taluks-dropdown-update"));
                }
            });
        }

        function toggleTalukOthersUpdate(selectEl, manualValue = '') {
            const othersInput = document.getElementById('taluk_others_input_manager');
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

        function setDropdownpanchayatUpdate(taluk, selectPanchayat = null, selectVillage = null) {
            let taluk_name = taluk.value;
            
            // Clear dependent dropdowns if we are just changing taluk (not pre-filling)
            if (!selectPanchayat) {
                document.getElementById("village-update").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("village_others_input_manager").style.display = 'none';
                document.getElementById("village_others_input_manager").value = '';
            }

            if (!taluk_name) return;
            if (taluk_name === 'Others') {
                let panchayatDropdown = document.getElementById("panchayat-dropdown-update");
                panchayatDropdown.innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                if (selectPanchayat) {
                    panchayatDropdown.value = selectPanchayat;
                    if (panchayatDropdown.value !== selectPanchayat && selectPanchayat !== "") {
                        panchayatDropdown.value = 'Others';
                        togglePanchayatOthersUpdate(panchayatDropdown, selectPanchayat);
                    } else {
                        togglePanchayatOthersUpdate(panchayatDropdown);
                    }
                    setDropdownVillageUpdate(panchayatDropdown, selectVillage);
                } else {
                    togglePanchayatOthersUpdate(panchayatDropdown);
                }
                return;
            }

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { taluk_name: taluk_name },
                success: function (result) {
                    let panchayatDropdown = document.getElementById("panchayat-dropdown-update");
                    panchayatDropdown.innerHTML = result;
                    panchayatDropdown.innerHTML += '<option value="Others">Others</option>';
                    if (selectPanchayat) {
                        panchayatDropdown.value = selectPanchayat;
                        if (panchayatDropdown.value !== selectPanchayat && selectPanchayat !== "") {
                            panchayatDropdown.value = 'Others';
                            togglePanchayatOthersUpdate(panchayatDropdown, selectPanchayat);
                        } else {
                            togglePanchayatOthersUpdate(panchayatDropdown);
                        }
                        setDropdownVillageUpdate(panchayatDropdown, selectVillage);
                    } else {
                        togglePanchayatOthersUpdate(panchayatDropdown);
                    }
                },
                error: function () {
                    document.getElementById("panchayat-dropdown-update").innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                    togglePanchayatOthersUpdate(document.getElementById("panchayat-dropdown-update"));
                }
            });
        }

        function togglePanchayatOthersUpdate(selectEl, manualValue = '') {
            const othersInput = document.getElementById('panchayat_others_input_manager');
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

        function setDropdownVillageUpdate(panchayatEl, selectedVillage = null) {
            let panchayat_name = panchayatEl.value;
            let villageSelect = document.getElementById('village-update');
            
            // Clear manual input if just changing panchayat
            if (!selectedVillage) {
                document.getElementById("village_others_input_manager").style.display = 'none';
                document.getElementById("village_others_input_manager").value = '';
            }

            if(!panchayat_name) {
                 villageSelect.innerHTML = '<option value="">Select Village</option>';
                 return;
            }

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getVillagesfordropdown') ?>",
                data: { "panchayat_name": panchayat_name },
                success: (result) => {
                     villageSelect.innerHTML = result;
                     
                     // Add "Others" option
                     let othersOption = document.createElement('option');
                     othersOption.value = 'Others';
                     othersOption.textContent = 'Others';
                     villageSelect.appendChild(othersOption);

                     if(selectedVillage) {
                         villageSelect.value = selectedVillage;
                         if (villageSelect.value !== selectedVillage && selectedVillage !== "") {
                             villageSelect.value = 'Others';
                             toggleVillageOthersUpdate(villageSelect, selectedVillage);
                         } else {
                             toggleVillageOthersUpdate(villageSelect);
                         }
                     }
                }
            });
        }

        function toggleVillageOthersUpdate(selectEl, manualValue = '') {
            const othersInput = document.getElementById('village_others_input_manager');
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

        function clearCurrentIndiaAddressUpdate() {
            $('#cur_state-update').val('');
            $('#cur_district-update').html('<option value="">Select District</option>');
            $('#cur_taluk-update').html('<option value="">Select Taluk</option>');
            $('#cur_panchayat-update').html('<option value="">Select Panchayat</option>');
            $('#cur_village-update').val('');
            $('#cur_street-update').val('');
            $('#cur_doorno-update').val('');
            $('#cur_pincode-update').val('');
            $('#cur_taluk_others_input_manager').val('').hide().removeAttr('name').attr('name', 'cur_taluk_others_update');
            $('#cur_panchayat_others_input_manager').val('').hide().removeAttr('name').attr('name', 'cur_panchayat_others_update');
            $('#cur_village_others_input_manager').val('').hide().removeAttr('name').attr('name', 'cur_village_others_update');
        }

        function clearCurrentOtherStateAddressUpdate() {
            $('#cur_state-update').val(''); // Clear state if it was set to TN
            $('#cur_district-update').html('<option value="">Select District</option>');
            $('#cur_taluk-update').html('<option value="">Select Taluk</option>');
            $('#cur_panchayat-update').html('<option value="">Select Panchayat</option>');
            $('#cur_village-update').val('');
            $('#cur_street-update').val('');
            $('#cur_doorno-update').val('');
            $('#cur_pincode-update').val('');
            $('#cur_taluk_others_input_manager').val('').hide().removeAttr('name').attr('name', 'cur_taluk_others_update');
            $('#cur_panchayat_others_input_manager').val('').hide().removeAttr('name').attr('name', 'cur_panchayat_others_update');
            $('#cur_village_others_input_manager').val('').hide().removeAttr('name').attr('name', 'cur_village_others_update');

            $('#cur_nri_country-update').val('');
            $('#cur_nri_state-update').html('<option value="">Select State</option>');
            $('#cur_nri_city-update').html('<option value="">Select City</option>');
            $('#cur_nri_zip-update').val('');
            $('#cur_nri_fulladdress-update').val('');
        }

        function clearCurrentNriAddressUpdate() {
            $('#cur_nri_country-update').val('');
            $('#cur_nri_state-update').html('<option value="">Select State</option>');
            $('#cur_nri_city-update').html('<option value="">Select City</option>');
            $('#cur_nri_zip-update').val('');
            $('#cur_nri_fulladdress-update').val('');
        }

        function toggleCurrentAddressTypeUpdate(isInitial = false) {
            const tnBlock = document.getElementById('cur_india_block-update');
            const nriBlock = document.getElementById('cur_nri_block-update');
            const sameBtn = document.getElementById('btn_same_as_native-update');
            const curStateContainer = document.getElementById('cur_state_container-update');
            const curNriCountryContainer = document.getElementById('cur_nri_country_container-update');

            const selected = document.querySelector('input[name="cur_address_type-update"]:checked');

            // Hide all by default
            if (tnBlock) tnBlock.style.display = 'none';
            if (nriBlock) nriBlock.style.display = 'none';
            if (sameBtn) sameBtn.style.display = 'none';
            if (curStateContainer) curStateContainer.style.display = 'block'; // Default for India block
            if (curNriCountryContainer) curNriCountryContainer.style.display = 'block'; // Default for NRI block

            if (!selected) {
                if (!isInitial) {
                    clearCurrentIndiaAddressUpdate();
                    clearCurrentNriAddressUpdate();
                }
                return;
            }

            if (selected.value === 'TamilNadu') {
                if (tnBlock) tnBlock.style.display = 'block';
                if (nriBlock) nriBlock.style.display = 'none';
                if (curStateContainer) curStateContainer.style.display = 'none';
                if (sameBtn) sameBtn.style.display = 'inline-block';
                if (!isInitial) clearCurrentNriAddressUpdate(); 
                
                let stateSelect = document.getElementById("cur_state-update");
                if (stateSelect) {
                    for (let i = 0; i < stateSelect.options.length; i++) {
                        if (stateSelect.options[i].text === "Tamil Nadu") {
                            stateSelect.selectedIndex = i;
                            if (!isInitial) setDropdowndistrictsCurrentUpdate(stateSelect);
                            break;
                        }
                    }
                }
                if (!isInitial) {
                    // Clear other state fields if any
                    $('#cur_nri_country-update').val('');
                    $('#cur_nri_state-update').html('<option value="">Select State</option>');
                    $('#cur_nri_city-update').html('<option value="">Select City</option>');
                }
            } else if (selected.value === 'OtherState') {
                if (tnBlock) tnBlock.style.display = 'none';
                if (nriBlock) nriBlock.style.display = 'block';
                if (curNriCountryContainer) curNriCountryContainer.style.display = 'none';
                if (sameBtn) sameBtn.style.display = 'none';

                if (!isInitial) {
                    clearCurrentIndiaAddressUpdate();
                    clearCurrentNriAddressUpdate();
                }

                // Set Country to India and Load States via callback
                loadCountriesDataUpdate(isInitial); 
            } else if (selected.value === 'NRI') {
                if (tnBlock) tnBlock.style.display = 'none';
                if (nriBlock) nriBlock.style.display = 'block';
                if (curNriCountryContainer) curNriCountryContainer.style.display = 'block';
                if (sameBtn) sameBtn.style.display = 'none';

                if (!isInitial) {
                    clearCurrentIndiaAddressUpdate(); // Clear India fields
                    clearCurrentNriAddressUpdate(); // Clear NRI fields
                }
                loadCountriesDataUpdate(isInitial);
            }
        }

        function copyNativeAddressUpdate() {
            // Target elements
            const c_state = document.getElementById('cur_state-update');
            const c_district = document.getElementById('cur_district-update');
            const c_taluk = document.getElementById('cur_taluk-update');
            const c_panchayat = document.getElementById('cur_panchayat-update');
            const c_village = document.getElementById('cur_village-update');
            const c_street = document.getElementById('cur_street-update');
            const c_doorno = document.getElementById('cur_doorno-update');
            const c_pincode = document.getElementById('cur_pincode-update');

            // Source data
            const n_state = document.getElementById('states-dropdown-update');
            const n_district = document.getElementById('districts-dropdown-update');
            const n_taluk = document.getElementById('taluks-dropdown-update');
            const n_panchayat = document.getElementById('panchayat-dropdown-update');
            const n_village_sel = document.getElementById('village-update');
            const n_street = document.getElementById('street-update');
            const n_doorno = document.getElementById('doorno-update');
            const n_pincode = document.getElementById('pincode-update');

            // Source 'Others' inputs
            const n_taluk_others_input = document.getElementById('taluk_others_input_manager');
            const n_panchayat_others_input = document.getElementById('panchayat_others_input_manager');
            const n_village_others_input = document.getElementById('village_others_input_manager');

            // Validation: Ensure all native fields have values
            if (!n_district.value || !n_taluk.value || !n_panchayat.value || !n_village_sel.value || 
                !n_street.value || !n_doorno.value || !n_pincode.value) {
                if (typeof psShowToast === 'function') {
                    psShowToast('error', 'Please fill all native address fields before copying.');
                } else {
                    alert('Please fill all native address fields before copying.');
                }
                return;
            }

            // Target 'Others' inputs
            const c_taluk_others_input = document.getElementById('cur_taluk_others_input_manager');
            const c_panchayat_others_input = document.getElementById('cur_panchayat_others_input_manager');
            const c_village_others_input = document.getElementById('cur_village_others_input_manager');

            // 1. Set Address Type to Tamil Nadu (since we are copying from there)
            let tnRadio = document.getElementById('cur_address_tn-update');
            if (tnRadio) {
                tnRadio.checked = true;
                // Pass true to avoid re-triggering AJAX from the toggle function itself
                toggleCurrentAddressTypeUpdate(true); 
            }

            // Copy simple fields
            c_street.value = n_street.value;
            c_doorno.value = n_doorno.value;
            c_pincode.value = n_pincode.value;

            // 2. Set State explicitly to ensure AJAX consistency
            if (c_state && n_state) {
                c_state.value = n_state.value;
            }

            // 3. Chain AJAX for District/Taluk/Panchayat/Village
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { state_id: n_state.value },
                success: function (resultDist) {
                    c_district.innerHTML = resultDist;
                    c_district.value = n_district.value;

                    // Now load Taluks based on the copied district
                    $.ajax({
                        type: "get",
                        url: "<?= base_url('members/getTaluksfordropdown') ?>",
                        data: { district_name: n_district.value },
                        success: function (resultTaluk) {
                            c_taluk.innerHTML = resultTaluk;
                            c_taluk.innerHTML += '<option value="Others">Others</option>';
                            c_taluk.value = n_taluk.value;
                            toggleTalukOthersCurrentManager(c_taluk);
                            if (n_taluk.value === 'Others') {
                                c_taluk_others_input.value = n_taluk_others_input.value;
                            }

                            // Now load Panchayats based on the copied taluk
                            if (n_taluk.value === 'Others') {
                                c_panchayat.innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                                c_panchayat.value = n_panchayat.value;
                                togglePanchayatOthersCurrentManager(c_panchayat);
                                if (n_panchayat.value === 'Others') {
                                    c_panchayat_others_input.value = n_panchayat_others_input.value;
                                }
                                // Load Village for 'Others' Taluk (which means no panchayat dropdown)
                                setDropdownVillageCurrentUpdate(c_panchayat, n_village_sel.value);
                                setTimeout(() => {
                                    if (n_village_sel.value === 'Others') {
                                        c_village_others_input.value = n_village_others_input.value;
                                    }
                                    if (typeof psShowToast === 'function') {
                                        psShowToast('success', 'Native address copied to current address.');
                                    }
                                    const checkbox = document.getElementById("correctdetails-update");
                                    if(checkbox) activateUpdateButton(checkbox);
                                }, 100); 
                            } else {
                                $.ajax({
                                    type: "get",
                                    url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                                    data: { taluk_name: n_taluk.value },
                                    success: function (resultPanch) {
                                        c_panchayat.innerHTML = resultPanch;
                                        c_panchayat.innerHTML += '<option value="Others">Others</option>';
                                        c_panchayat.value = n_panchayat.value;
                                        togglePanchayatOthersCurrentManager(c_panchayat);
                                        if (n_panchayat.value === 'Others') {
                                            c_panchayat_others_input.value = n_panchayat_others_input.value;
                                        }

                                        // Finally, load Villages based on the copied panchayat
                                        setDropdownVillageCurrentUpdate(c_panchayat, n_village_sel.value);
                                        setTimeout(() => {
                                            if (n_village_sel.value === 'Others') {
                                                c_village_others_input.value = n_village_others_input.value;
                                            }
                                            if (typeof psShowToast === 'function') {
                                                psShowToast('success', 'Native address copied to current address.');
                                            }
                                            const checkbox = document.getElementById("correctdetails-update");
                                            if(checkbox) activateUpdateButton(checkbox);
                                        }, 100); 
                                    }
                                });
                            }
                        },
                        error: function () {
                            c_taluk.innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                            c_taluk.value = n_taluk.value;
                            toggleTalukOthersCurrentManager(c_taluk);
                            if (n_taluk.value === 'Others') {
                                c_taluk_others_input.value = n_taluk_others_input.value;
                            }
                            // If taluk load fails, still try to set panchayat/village if they were 'Others'
                            c_panchayat.innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                            c_panchayat.value = n_panchayat.value;
                            togglePanchayatOthersCurrentManager(c_panchayat);
                            if (n_panchayat.value === 'Others') {
                                c_panchayat_others_input.value = n_panchayat_others_input.value;
                            }
                            setDropdownVillageCurrentUpdate(c_panchayat, n_village_sel.value);
                            setTimeout(() => {
                                if (n_village_sel.value === 'Others') {
                                    c_village_others_input.value = n_village_others_input.value;
                                }
                                if (typeof psShowToast === 'function') {
                                    psShowToast('success', 'Native address details partially copied.');
                                }
                                const checkbox = document.getElementById("correctdetails-update");
                                if(checkbox) activateUpdateButton(checkbox);
                            }, 100);
                        }
                    });
                },
                error: function () {
                    c_district.innerHTML = '<option value="">Select District</option>';
                    // If district load fails, clear subsequent dropdowns
                    c_taluk.innerHTML = '<option value="">Select Taluk</option>';
                    c_panchayat.innerHTML = '<option value="">Select Panchayat</option>';
                    c_village.innerHTML = '<option value="">Select Village</option>';
                    c_taluk_others_input.value = '';
                    c_panchayat_others_input.value = '';
                    c_village_others_input.value = '';
                }
            });
        }

        var originalFormDataUpdateManager = "";
        setTimeout(function() {
            const form = document.forms['managerregistration-update'];
            if(form) {
                originalFormDataUpdateManager = new URLSearchParams(new FormData(form)).toString();
                const checkbox = document.getElementById("correctdetails-update");
                
                // Initialize button state immediately
                if(checkbox) activateUpdateButton(checkbox);

                form.addEventListener('change', function() {
                    if(checkbox) activateUpdateButton(checkbox);
                });
                form.addEventListener('input', function() {
                    if(checkbox) activateUpdateButton(checkbox);
                });
            }
        }, 500);

        function checkFormChangedManager() {
            const form = document.forms['managerregistration-update'];
            if(!form) return false;
            
            // Check text-based data
            const currentFormData = new URLSearchParams(new FormData(form)).toString();
            if (currentFormData !== originalFormDataUpdateManager) return true;

            // Check file inputs
            const fileInputs = form.querySelectorAll('input[type="file"]');
            for (let input of fileInputs) {
                if (input.files.length > 0) return true;
            }

            return false;
        }

        function activateUpdateButton(checkbox) {
            const hasChanged = checkFormChangedManager();
            document.getElementById("updatesubmitbutton").disabled = !(checkbox.checked && hasChanged);
        }

        function validateUpdateInput(field) {
            if (field.value === "" && field.hasAttribute('required')) {
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }

            // Real-time Email Change Check
            if (field.id === 'email-update') {
                const originalEmail = document.getElementById('original_email-manager').value;
                const verifyBtn = document.getElementById('verify-email-btn-manager');
                const badge = document.getElementById('email-verified-badge-manager');
                const statusInput = document.getElementById('is_email_verified-manager');

                if (field.value !== originalEmail && field.value !== "") {
                    verifyBtn.style.display = 'block';
                    badge.style.display = 'none';
                    statusInput.value = "0";
                    document.getElementById('email-otp-section-manager').style.display = 'none';
                } else if (field.value === originalEmail) {
                    verifyBtn.style.display = 'none';
                    badge.style.display = 'block';
                    statusInput.value = "1";
                    document.getElementById('email-otp-section-manager').style.display = 'none';
                } else {
                    verifyBtn.style.display = 'none';
                    badge.style.display = 'none';
                    statusInput.value = "0";
                }
            }

            // Real-time Phone Change Check
            if (field.id === 'phoneno-update') {
                const originalPhone = document.getElementById('original_phone-manager').value;
                const verifyBtn = document.getElementById('verify-phone-btn-manager');
                const badge = document.getElementById('phone-verified-badge-manager');
                const statusInput = document.getElementById('is_phone_verified-manager');

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

        function validateUpdateManagerform() {
            const isEmailVerified = document.getElementById('is_email_verified-manager').value;
            const isPhoneVerified = document.getElementById('is_phone_verified-manager').value;
             const f = document.forms['managerregistration-update'];

            if (f['email-update'].value !== "" && isEmailVerified === "0") {
                psShowToast('warning', 'Please verify your new email address before updating.');
                f['email-update'].focus();
                return false;
            }

            if (f['phoneno-update'].value !== "" && isPhoneVerified === "0") {
                psShowToast('warning', 'Please verify your new phone number before updating.');
                f['phoneno-update'].focus();
                return false;
            }

            let isValid = true;
            let firstInvalid = null;

            const setErr = (id, msg, el) => {
                const errBox = document.getElementById(id);
                if (errBox) errBox.innerHTML = msg;
                if (!firstInvalid && el) firstInvalid = el;
                isValid = false;
            };

            // Clear errors
            document.querySelectorAll(".text-danger").forEach(el => el.innerHTML = "");

            // Basic Details
            if (!f['name-update'].value.trim()) setErr('nameerror-update', 'Name is required', f['name-update']);
            if (!f['phoneno-update'].value.trim()) setErr('phonenoerror-update', 'Phone number is required', f['phoneno-update']);
            else if (f['phoneno-update'].value.length < 10) setErr('phonenoerror-update', 'Min 10 digits required', f['phoneno-update']);

            if (!f['aadharno-update'].value.trim()) setErr('aadharnoerror-update', 'Aadhar number is required', f['aadharno-update']);
            else if (f['aadharno-update'].value.length !== 12) setErr('aadharnoerror-update', 'Aadhar must be 12 digits', f['aadharno-update']);

            // Relationship Transfer Check
            let aliveStatusDead = document.getElementById("alive_no-update");
            let upcomingHeadSelect = document.getElementById("upcoming_head-update");
            if (f['relationship-update'].value === "Head" && aliveStatusDead && aliveStatusDead.checked && !upcomingHeadSelect.value) {
                setErr('upcomingheaderror-update', 'Please select upcoming head', upcomingHeadSelect);
            }

            if (!isValid && firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                if (firstInvalid.focus) firstInvalid.focus();
            }

            return isValid;
        }

        function sendUpdateEmailOTPManager() {
            const email = document.getElementById('email-update').value;
            const errorElem = document.getElementById('emailerror-update');
            const otpSection = document.getElementById('email-otp-section-manager');
            const btn = document.getElementById('verify-email-btn-manager');

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
                        psShowToast('success', response.message);
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

        function verifyUpdateEmailOTPManager() {
            const email = document.getElementById('email-update').value;
            const otp = document.getElementById('email-otp-manager').value;
            const errorElem = document.getElementById('email-otp-error-manager');
            const statusInput = document.getElementById('is_email_verified-manager');
            const verifyBtn = document.getElementById('verify-email-btn-manager');
            const badge = document.getElementById('email-verified-badge-manager');
            const otpSection = document.getElementById('email-otp-section-manager');

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
                        psShowToast('success', response.message);
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

        function checkPhoneVerificationManager() {
            const phoneno = document.getElementById('phoneno-update').value;
            const errorElem = document.getElementById('phonenoerror-update');
            const statusInput = document.getElementById('is_phone_verified-manager');
            const verifyBtn = document.getElementById('verify-phone-btn-manager');
            const badge = document.getElementById('phone-verified-badge-manager');

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
                    member_id: "<?= $manager->Familymembershipid ?>"
                },
                success: function(response) {
                    if (response.trim() === "false") {
                        psShowToast('success', 'Phone number is unique and verified.');
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

        function uploadFileUpdate(file) {
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

        function uploadFileStyledUpdate(file, btnId) {
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
                    
                    // Force button check
                    const checkbox = document.getElementById("correctdetails-update");
                    if(checkbox) activateUpdateButton(checkbox);
                }
            }
        }

        function copyPhoneToWhatsappUpdate() {
            document.getElementById('whatsappno-update').value = document.getElementById('phoneno-update').value;
        }

        var selectedEducationsUpdate = [];

        function renderEducationTagsUpdate() {
            const container = document.getElementById('education_tags-update');
            if(!container) return;
            container.innerHTML = '';
            selectedEducationsUpdate.forEach(edu => {
                const tag = document.createElement('span');
                tag.className = 'badge bg-primary d-flex align-items-center ps-2 pe-2 py-1 gap-2';
                tag.style.fontSize = '0.85rem';
                tag.innerHTML = `<span>${edu}</span> <span style="cursor:pointer; font-weight:bold; font-size: 1rem; line-height: 1;" onclick="removeEducationUpdate('${edu.replace(/'/g, "\\'")}', event)">&times;</span>`;
                container.appendChild(tag);
            });
            document.getElementById('educationfield-update').value = selectedEducationsUpdate.join(',');
            
            // Reset placeholder visibility
            const input = document.getElementById("education_input-update");
            if (input) {
                if (selectedEducationsUpdate.length > 0) {
                    input.placeholder = "";
                } else {
                    input.placeholder = "Type or select education";
                }
            }

            // Error clear if valid
            const errorField = document.getElementById("educationerror-update");
            if (errorField && selectedEducationsUpdate.length > 0) {
                errorField.innerHTML = "";
            }
        }

        function removeEducationUpdate(edu, event) {
            if(event) event.stopPropagation();
            selectedEducationsUpdate = selectedEducationsUpdate.filter(e => e !== edu);
            renderEducationTagsUpdate();
        }

        // Initialize with existing data
        $(document).ready(function() {
            const existingEdu = "<?= esc($manager->Education ?? '') ?>";
            if(existingEdu) {
                const edus = existingEdu.split(',');
                edus.forEach(e => {
                    const trimmed = e.trim();
                    if(trimmed && !selectedEducationsUpdate.includes(trimmed)) {
                        selectedEducationsUpdate.push(trimmed);
                    }
                });
                renderEducationTagsUpdate();
            }

            // Handle wrapper click
            $(document).on("click", "#education_wrapper-update", function(e) {
                if (e.target.id === 'education_wrapper-update' || e.target.id === 'education_tags-update') {
                    $("#education_input-update").focus();
                }
                filterEducationOptionsUpdate(document.getElementById("education_input-update"));
            });

            // Click listener for education options
            $(document).off('click', '#education_dropdown-update .education-option').on('click', '#education_dropdown-update .education-option', function() {
                const val = this.getAttribute('data-value');
                if (val === 'Others') {
                    document.getElementById('education_others_wrapper-update').style.display = 'block';
                    document.getElementById('education_dropdown-update').style.display = 'none';
                    document.getElementById('education_others_input-update').focus();
                } else {
                    if (!selectedEducationsUpdate.includes(val)) {
                        selectedEducationsUpdate.push(val);
                        renderEducationTagsUpdate();
                    }
                    document.getElementById('education_input-update').value = '';
                    document.getElementById('education_dropdown-update').style.display = 'none';
                }
            });
        });

        function addManualEducationUpdate() {
            const val = document.getElementById('education_others_input-update').value.trim();
            if (val) {
                if (!selectedEducationsUpdate.includes(val)) {
                    selectedEducationsUpdate.push(val);
                    renderEducationTagsUpdate();
                }
                document.getElementById('education_others_input-update').value = '';
                document.getElementById('education_others_wrapper-update').style.display = 'none';
                document.getElementById('education_input-update').value = '';
                document.getElementById('education_input-update').focus();
            }
        }

        // Education searching logic
        function filterEducationOptionsUpdate(input) {
            const query = input.value.toLowerCase().trim();
            const dropdown = document.getElementById("education_dropdown-update");
            const options = dropdown.querySelectorAll(".education-option");
            let count = 0;
            options.forEach(opt => {
                const text = opt.textContent.toLowerCase();
                if (!query || text.includes(query)) {
                    opt.style.display = "";
                    count++;
                } else {
                    opt.style.display = "none";
                }
            });
            dropdown.style.display = (count > 0) ? "block" : "none";
        }

        // Profession searchable dropdown logic
        function filterProfessionOptionsUpdate(input) {
            const query = input.value.toLowerCase().trim();
            const dropdown = document.getElementById("profession_dropdown-update");
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

        $(document).off("click", "#profession_dropdown-update .profession-option").on("click", "#profession_dropdown-update .profession-option", function() {
            const value = this.getAttribute("data-value");
            const input = document.getElementById("profession_input-update");
            const hidden = document.getElementById("profession-update");
            
            input.value = this.textContent;
            hidden.value = value;
            document.getElementById("profession_dropdown-update").style.display = "none";
            
            // Trigger profession change logic
            handleProfessionChangeUpdate({value: value});
            validateUpdateInput(hidden);
        });


        var countriesDataUpdate = null;
        function loadCountriesDataUpdate(isInitial = false) {
            if (countriesDataUpdate) { populateCountriesUpdate(isInitial); return; }
            $.getJSON('<?= base_url('assets/countries_states_cities.json') ?>', function(data) {
                countriesDataUpdate = data;
                populateCountriesUpdate(isInitial);
            });
        }

        function populateCountriesUpdate(isInitial = false) {
            var select = document.getElementById('cur_nri_country-update');
            var selectedType = document.querySelector('input[name="cur_address_type-update"]:checked')?.value;
            var currentVal = select.value;
            
            if (selectedType === 'OtherState') {
                currentVal = "India";
            } else if (isInitial && !currentVal) {
                currentVal = '<?= $manager->Curnricountry ?>';
            }
            
            select.innerHTML = '<option value="">Select Country</option>';
            Object.values(countriesDataUpdate).forEach(function(c) {
                var opt = document.createElement('option');
                opt.value = c.name;
                opt.textContent = c.name;
                if (c.name === currentVal) opt.selected = true;
                select.appendChild(opt);
            });
            
            if (currentVal) {
                var sVal = (isInitial) ? '<?= $manager->Curnristate ?>' : '';
                var cityVal = (isInitial) ? '<?= $manager->Curnricity ?>' : '';
                loadNRIStatesUpdate(currentVal, sVal, cityVal);
            }
        }

        function loadNRIStatesUpdate(countryName, selectState, selectCity) {
            if (!countriesDataUpdate) return;
            var select = document.getElementById('cur_nri_state-update');
            select.innerHTML = '<option value="">Select State</option>';
            var country = Object.values(countriesDataUpdate).find(function(c) { return c.name === countryName; });
            if (country && country.states) {
                country.states.forEach(function(s) {
                    var opt = document.createElement('option');
                    opt.value = s.name;
                    opt.textContent = s.name;
                    if (s.name === selectState) opt.selected = true;
                    select.appendChild(opt);
                });
            }
            if (selectState) loadNRICitiesUpdate(selectState, selectCity);
        }

        function loadNRICitiesUpdate(stateName, selectCity) {
            var countryName = document.getElementById('cur_nri_country-update').value || '<?= $manager->Curnricountry ?>';
            var select = document.getElementById('cur_nri_city-update');
            select.innerHTML = '<option value="">Select City</option>';
            var country = Object.values(countriesDataUpdate).find(function(c) { return c.name === countryName; });
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

        function setDropdowndistrictsCurrentUpdate(state, selectDistrict = null, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let state_id = state.value;

            // Clear dependent dropdowns
            if (!selectDistrict) {
                document.getElementById("cur_district-update").innerHTML = '<option value="">Select District</option>';
                document.getElementById("cur_taluk-update").innerHTML = '<option value="">Select Taluk</option>';
                document.getElementById("cur_panchayat-update").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_village-update").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_manager").style.display = 'none';
                document.getElementById("cur_village_others_input_manager").value = '';
            }

            if (!state_id) return;
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { state_id: state_id },
                success: function (result) {
                    let districtDropdown = document.getElementById("cur_district-update");
                    districtDropdown.innerHTML = result;
                    if (selectDistrict) {
                        districtDropdown.value = selectDistrict;
                        setDropdowntaluksCurrentUpdate(districtDropdown, selectTaluk, selectPanchayat, selectVillage);
                    }
                }
            });
        }

        function setDropdowntaluksCurrentUpdate(district, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let district_name = district.value;

            // Clear dependent dropdowns
            if (!selectTaluk) {
                document.getElementById("cur_taluk-update").innerHTML = '<option value="">Select Taluk</option>';
                document.getElementById("cur_panchayat-update").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_village-update").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_manager").style.display = 'none';
                document.getElementById("cur_village_others_input_manager").value = '';
            }

            if (!district_name) return;
            if (district_name === 'Others') {
                let talukDropdown = document.getElementById("cur_taluk-update");
                talukDropdown.innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                if (selectTaluk) {
                    talukDropdown.value = selectTaluk;
                    setDropdownpanchayatCurrentUpdate(talukDropdown, selectPanchayat, selectVillage);
                }
                toggleTalukOthersCurrentManager(talukDropdown);
                return;
            }
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { district_name: district_name },
                success: function (result) {
                    let talukDropdown = document.getElementById("cur_taluk-update");
                    talukDropdown.innerHTML = result;
                    talukDropdown.innerHTML += '<option value="Others">Others</option>';
                    if (selectTaluk) {
                        talukDropdown.value = selectTaluk;
                        setDropdownpanchayatCurrentUpdate(talukDropdown, selectPanchayat, selectVillage);
                    }
                    toggleTalukOthersCurrentManager(talukDropdown);
                },
                error: function () {
                    document.getElementById("cur_taluk-update").innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                }
            });
        }

        function toggleTalukOthersCurrentManager(selectEl, manualValue = '') {
            const othersInput = document.getElementById('cur_taluk_others_input_manager');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                othersInput.setAttribute('required', 'required');
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'cur_taluk-update');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.removeAttribute('required');
                othersInput.value = '';
                othersInput.setAttribute('name', 'cur_taluk_others_update');
                selectEl.setAttribute('name', 'cur_taluk-update'); 
            }
        }

        function setDropdownpanchayatCurrentUpdate(taluk, selectPanchayat = null, selectVillage = null) {
            let taluk_name = taluk.value;

            // Clear dependent dropdowns
            if (!selectPanchayat) {
                document.getElementById("cur_panchayat-update").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_village-update").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_manager").style.display = 'none';
                document.getElementById("cur_village_others_input_manager").value = '';
            }

            if (!taluk_name) return;
            if (taluk_name === 'Others') {
                let panchayatDropdown = document.getElementById("cur_panchayat-update");
                panchayatDropdown.innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                if (selectPanchayat) {
                    panchayatDropdown.value = selectPanchayat;
                    setDropdownVillageCurrentUpdate(panchayatDropdown, selectVillage);
                }
                togglePanchayatOthersCurrentManager(panchayatDropdown);
                return;
            }
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { taluk_name: taluk_name },
                success: function (result) {
                    let panchayatDropdown = document.getElementById("cur_panchayat-update");
                    panchayatDropdown.innerHTML = result;
                    panchayatDropdown.innerHTML += '<option value="Others">Others</option>';
                    if (selectPanchayat) {
                        panchayatDropdown.value = selectPanchayat;
                        setDropdownVillageCurrentUpdate(panchayatDropdown, selectVillage);
                    }
                    togglePanchayatOthersCurrentManager(panchayatDropdown);
                },
                error: function () {
                    document.getElementById("cur_panchayat-update").innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                }
            });
        }

        function togglePanchayatOthersCurrentManager(selectEl, manualValue = '') {
            const othersInput = document.getElementById('cur_panchayat_others_input_manager');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                othersInput.setAttribute('required', 'required');
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'cur_panchayat-update');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.removeAttribute('required');
                othersInput.value = '';
                othersInput.setAttribute('name', 'cur_panchayat_others_update');
                selectEl.setAttribute('name', 'cur_panchayat-update'); 
            }
        }

        function setDropdownVillageCurrentUpdate(panchayatEl, selectedVillage = null) {
            let panchayat_name = panchayatEl.value;
            let villageSelect = document.getElementById('cur_village-update');
            
            if(!panchayat_name) {
                 villageSelect.innerHTML = '<option value="">Select Village</option>';
                 return;
            }

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getVillagesfordropdown') ?>",
                data: { "panchayat_name": panchayat_name },
                success: (result) => {
                     villageSelect.innerHTML = result;
                     
                     // Add "Others" option
                     let othersOption = document.createElement('option');
                     othersOption.value = 'Others';
                     othersOption.textContent = 'Others';
                     villageSelect.appendChild(othersOption);

                     if(selectedVillage) {
                         villageSelect.value = selectedVillage;
                         if (villageSelect.value !== selectedVillage && selectedVillage !== "") {
                             villageSelect.value = 'Others';
                             toggleVillageOthersCurrentManager(villageSelect, selectedVillage);
                         } else {
                             toggleVillageOthersCurrentManager(villageSelect);
                         }
                     }
                }
            });
        }

        function toggleVillageOthersCurrentManager(selectEl, manualValue = '') {
            const othersInput = document.getElementById('cur_village_others_input_manager');
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



        $(document).ready(function() {
            // Initial Cascading Load (Native)
            let s1 = document.getElementById('states-dropdown-update');
            if (s1 && s1.value) {
                setDropdowndistrictsUpdate(
                    s1, 
                    '<?= addslashes((string)($manager->District ?? "")) ?>', 
                    '<?= addslashes((string)($manager->Taluk ?? "")) ?>', 
                    '<?= addslashes((string)($manager->Panchayat ?? "")) ?>', 
                    '<?= addslashes((string)($manager->Village ?? "")) ?>'
                );
            }
            
            // Toggle blocks (without clearing dropdowns on initial load)
            toggleCurrentAddressTypeUpdate(true);

            // If it's Tamil Nadu, trigger the full cascading load for Current Address
            const curType = document.querySelector('input[name="cur_address_type-update"]:checked')?.value;
            if (curType === 'TamilNadu') {
                const curState = document.getElementById('cur_state-update');
                if (curState && curState.value) {
                    setDropdowndistrictsCurrentUpdate(
                        curState, 
                        '<?= addslashes((string)($manager->Curdistrict ?? "")) ?>', 
                        '<?= addslashes((string)($manager->Curtaluk ?? "")) ?>', 
                        '<?= addslashes((string)($manager->Curpanchayat ?? "")) ?>', 
                        '<?= addslashes((string)($manager->Curvillage ?? "")) ?>'
                    );
                }
            } else if (curType === 'OtherState' || curType === 'NRI') {
                if ('<?= addslashes((string)($manager->Curnricountry ?? "")) ?>') {
                    loadNRIStatesUpdate('<?= addslashes((string)($manager->Curnricountry ?? "")) ?>', '<?= addslashes((string)($manager->Curnristate ?? "")) ?>', '<?= addslashes((string)($manager->Curnricity ?? "")) ?>');
                }
            }

            renderEducationTagsUpdate();
        });

        function handleProfessionChangeUpdate(select) {
            let wrapper = document.getElementById('business-extra-wrapper-update');
            if (select.value === 'Others') {
                wrapper.style.display = 'block';
            } else {
                wrapper.style.display = 'none';
            }
        }


        // Toggle readonly to allow typing when focused
        $("#profession_input-update").on("focus", function() {
            $(this).prop("readonly", false);
        }).on("blur", function() {
            $(this).prop("readonly", true);
        });

        // Handle profession wrapper click
        $(document).on("click", "#profession_wrapper-update", function() {
            $("#profession_input-update").focus();
            filterProfessionOptionsUpdate(document.getElementById("profession_input-update"));
        });

        // Close when clicking outside
        $(document).on("click", function(e) {
            if (!$(e.target).closest("#profession_wrapper-update").length && !$(e.target).closest("#profession_dropdown-update").length) {
                $("#profession_dropdown-update").hide();
            }
            if (!$(e.target).closest("#education_wrapper-update").length && !$(e.target).closest("#education_dropdown-update").length) {
                $("#education_dropdown-update").hide();
            }
        });
    </script>
<?php endif; ?>
