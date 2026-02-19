<style>
        .section-title {
            border-left: 5px solid #283593;
            padding-left: .75rem;
            font-weight: 800;
            color: #1a237e !important;
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
        #updatesubmitbutton {
            color: white !important;
            font-weight: 700;
            border: none;
            background: linear-gradient(135deg, #3f51b5 0%, #1a237e 100%);
            padding: 8px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        #updatesubmitbutton:disabled {
            background: #ccc;
            cursor: not-allowed;
            box-shadow: none;
        }

        #education_wrapper {
            min-height: 38px;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 5px;
        }

        #education_tags-update .badge {
            margin-right: 4px;
            margin-bottom: 4px;
            background-color: #1a237e !important;
            color: #ffffff;
        }

        .education-option:hover {
            background-color: #e8eaf6;
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

    <?php if (isset($manager)) : ?>
        <div class="bg-custom-header py-3 px-4 border-bottom shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-dark font-weight-bold">
                    <i class="fa-solid fa-user-tie me-2"></i>Update Manager Details: <small class="text-primary"><?= $manager->Familymembershipid ?></small>
                </h4>
                <button onclick="hideupdatemanagerform()" class="btn btn-close"></button>
            </div>
        </div>

        <form name="managerregistration-update" id="registration-form" class="p-4" onsubmit="return validateUpdateManagerform()" action="<?= base_url("admindashboard/updateManager"); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">

            <input hidden value="<?= $manager->Familymembershipid ?>" id="membershipid-update" type="text" name="membershipid-update">
            <input hidden value="manager" type="text" name="path">
            <input hidden value="updatemanager" type="text" name="reason">


            <!-- Basic Details Section -->
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h5 class="mb-4 section-title">
                        <i class="fa-solid fa-user text-primary me-2"></i>Basic Details
                    </h5>

                    <div class="row g-3">
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
                            <input id="phoneno-update" class="form-control" type="number" name="phoneno-update" value="<?= $manager->Phonenumber ?>" onkeyup="validateUpdateInput(this)" required>
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
                            <input id="email-update" onkeyup="validateUpdateInput(this)" class="form-control" type="email" name="email-update" value="<?= $manager->Email ?>">
                            <small id="emailerror-update" class="text-danger"></small>
                        </div>

                        <!-- WhatsApp Number -->
                        <div class="col-md-4">
                            <label for="whatsappno-update">WhatsApp Number</label>
                            <div class="input-group">
                                <input id="whatsappno-update" class="form-control" type="number" name="whatsappno-update" value="<?= $manager->Whatsappnumber ?>" onkeyup="validateUpdateInput(this)">
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

            <!-- Occupation Details -->
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h5 class="mb-4 section-title">
                        <i class="fa-solid fa-briefcase text-primary me-2"></i>Education & Career Details
                    </h5>
                    <div class="row g-3">
                        <!-- Education -->
                        <div class="col-md-12">
                            <label for="education_input-update">Education</label>
                            <div class="border rounded p-2" id="education_wrapper">
                                <div id="education_tags-update" class="mb-1"></div>
                                <input type="text" id="education_input-update"
                                    class="form-control border-0 p-0"
                                    placeholder="Type and select education"
                                    onfocus="filterEducationOptionsUpdate(this)"
                                    oninput="filterEducationOptionsUpdate(this)">

                            </div>
                            <small id="educationerror-update" class="text-danger"></small>
                            <div id="education_hidden_container-update"></div>
                            <div class="border rounded mt-1 bg-white" id="education_dropdown-update" style="max-height:200px; overflow:auto; display:none; position:absolute; width: calc(100% - 3rem); z-index: 1000;">
                                <?php 
                                    $edu_map = [
                                        "10th (SSLC)" => "10th (SSLC)",
                                        "12th (HSC – Science)" => "12th (HSC – Science)",
                                        "12th (HSC – Commerce)" => "12th (HSC – Commerce)",
                                        "12th (HSC – Arts)" => "12th (HSC – Arts)",
                                        "Diploma in Mechanical Engineering" => "Diploma in Mechanical Engineering",
                                        "Diploma in Civil Engineering" => "Diploma in Civil Engineering",
                                        "Diploma in Electrical Engineering" => "Diploma in Electrical Engineering",
                                        "Diploma in Electronics and Communication Engineering" => "Diploma in Electronics and Communication Engineering",
                                        "Diploma in Computer Engineering" => "Diploma in Computer Engineering",
                                        "Diploma in Information Technology" => "Diploma in Information Technology",
                                        "Diploma in Automobile Engineering" => "Diploma in Automobile Engineering",
                                        "Diploma in Mechatronics" => "Diploma in Mechatronics",
                                        "Diploma in Marine Engineering" => "Diploma in Marine Engineering",
                                        "Diploma in Agriculture" => "Diploma in Agriculture",
                                        "Diploma in Nursing" => "Diploma in Nursing",
                                        "Diploma in Pharmacy" => "Diploma in Pharmacy",
                                        "Diploma in Hotel Management" => "Diploma in Hotel Management",
                                        "Diploma in Fashion Designing" => "Diploma in Fashion Designing",
                                        "Diploma in Interior Designing" => "Diploma in Interior Designing",
                                        "Diploma in Multimedia" => "Diploma in Multimedia",
                                        "ITI Fitter" => "ITI Fitter",
                                        "ITI Electrician" => "ITI Electrician",
                                        "ITI Turner" => "ITI Turner",
                                        "ITI Mechanic" => "ITI Mechanic",
                                        "ITI Welder" => "ITI Welder",
                                        "ITI Plumber" => "ITI Plumber",
                                        "ITI Draughtsman Civil" => "ITI Draughtsman Civil",
                                        "ITI Draughtsman Mechanical" => "ITI Draughtsman Mechanical",
                                        "ITI COPA" => "ITI COPA",
                                        "ITI Refrigeration and Air Conditioning" => "ITI Refrigeration and Air Conditioning",
                                        "B.E Computer Science and Engineering" => "B.E Computer Science and Engineering",
                                        "B.E Mechanical Engineering" => "B.E Mechanical Engineering",
                                        "B.E Civil Engineering" => "B.E Civil Engineering",
                                        "B.E Electrical and Electronics Engineering" => "B.E Electrical and Electronics Engineering",
                                        "B.E Electronics and Communication Engineering" => "B.E Electronics and Communication Engineering",
                                        "B.E Automobile Engineering" => "B.E Automobile Engineering",
                                        "B.E Mechatronics Engineering" => "B.E Mechatronics Engineering",
                                        "B.Tech Information Technology" => "B.Tech Information Technology",
                                        "B.Tech Artificial Intelligence" => "B.Tech Artificial Intelligence",
                                        "B.Tech Data Science" => "B.Tech Data Science",
                                        "B.Tech Biotechnology" => "B.Tech Biotechnology",
                                        "B.Tech Chemical Engineering" => "B.Tech Chemical Engineering",
                                        "B.Tech Aeronautical Engineering" => "B.Tech Aeronautical Engineering",
                                        "B.Tech Aerospace Engineering" => "B.Tech Aerospace Engineering",
                                        "B.Tech Marine Engineering" => "B.Tech Marine Engineering",
                                        "B.A Tamil" => "B.A Tamil",
                                        "B.A English" => "B.A English",
                                        "B.A History" => "B.A History",
                                        "B.A Economics" => "B.A Economics",
                                        "B.A Political Science" => "B.A Political Science",
                                        "B.Sc Mathematics" => "B.Sc Mathematics",
                                        "B.Sc Physics" => "B.Sc Physics",
                                        "B.Sc Chemistry" => "B.Sc Chemistry",
                                        "B.Sc Computer Science" => "B.Sc Computer Science",
                                        "B.Sc Information Technology" => "B.Sc Information Technology",
                                        "B.Sc Biotechnology" => "B.Sc Biotechnology",
                                        "B.Sc Microbiology" => "B.Sc Microbiology",
                                        "B.Sc Zoology" => "B.Sc Zoology",
                                        "B.Sc Botany" => "B.Sc Botany",
                                        "B.Sc Visual Communication" => "B.Sc Visual Communication",
                                        "BCA" => "BCA",
                                        "BBA" => "BBA",
                                        "B.Com General" => "B.Com General",
                                        "B.Com Computer Applications" => "B.Com Computer Applications",
                                        "B.Com Accounting and Finance" => "B.Com Accounting and Finance",
                                        "MBBS" => "MBBS",
                                        "BDS" => "BDS",
                                        "BAMS" => "BAMS",
                                        "BHMS" => "BHMS",
                                        "BUMS" => "BUMS",
                                        "B.Pharm" => "B.Pharm",
                                        "B.Sc Nursing" => "B.Sc Nursing",
                                        "LLB" => "LLB",
                                        "B.Ed" => "B.Ed",
                                        "B.Sc Agriculture" => "B.Sc Agriculture",
                                        "B.Arch" => "B.Arch",
                                        "BPT (Physiotherapy)" => "BPT (Physiotherapy)",
                                        "BHM (Hotel Management)" => "BHM (Hotel Management)",
                                        "M.E Computer Science and Engineering" => "M.E Computer Science and Engineering",
                                        "M.E Structural Engineering" => "M.E Structural Engineering",
                                        "M.Tech Information Technology" => "M.Tech Information Technology",
                                        "M.Tech Artificial Intelligence" => "M.Tech Artificial Intelligence",
                                        "M.Tech Data Science" => "M.Tech Data Science",
                                        "M.Tech Biotechnology" => "M.Tech Biotechnology",
                                        "M.A Tamil" => "M.A Tamil",
                                        "M.A English" => "M.A English",
                                        "M.A Economics" => "M.A Economics",
                                        "M.Sc Mathematics" => "M.Sc Mathematics",
                                        "M.Sc Physics" => "M.Sc Physics",
                                        "M.Sc Chemistry" => "M.Sc Chemistry",
                                        "M.Sc Computer Science" => "M.Sc Computer Science",
                                        "M.Sc Information Technology" => "M.Sc Information Technology",
                                        "M.Sc Biotechnology" => "M.Sc Biotechnology",
                                        "MCA" => "MCA",
                                        "MBA" => "MBA",
                                        "M.Com" => "M.Com",
                                        "M.Pharm" => "M.Pharm",
                                        "M.Sc Nursing" => "M.Sc Nursing",
                                        "LLM" => "LLM",
                                        "M.Ed" => "M.Ed",
                                        "M.Sc Agriculture" => "M.Sc Agriculture",
                                        "Ph.D Computer Science" => "Ph.D Computer Science",
                                        "Ph.D Mathematics" => "Ph.D Mathematics",
                                        "Ph.D Commerce" => "Ph.D Commerce",
                                        "Ph.D Engineering" => "Ph.D Engineering",
                                        "Ph.D Biotechnology" => "Ph.D Biotechnology",
                                        "Ph.D Physics" => "Ph.D Physics",
                                        "Ph.D Chemistry" => "Ph.D Chemistry",
                                        "Ph.D Tamil" => "Ph.D Tamil",
                                        "Ph.D English" => "Ph.D English",
                                        "Others" => "Others"
                                    ];

                                    foreach($edu_map as $val => $text) {
                                        echo "<div class='education-option p-2 border-bottom' data-value='$val'>$text</div>";
                                    }
                                ?>
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
                                    "Retail / Sales Staff" => "Retail Shop / Sales Staff", 
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
                            <label for="profession_input-update">Profession <span class="text-danger">*</span></label>
                            <div class="border rounded p-1 bg-white" id="profession_wrapper-update" style="cursor: pointer;">
                                <input type="text" id="profession_input-update" 
                                    class="form-control border-0 bg-transparent" 
                                    placeholder="Type or click to select profession"
                                    onfocus="filterProfessionOptionsUpdate(this)"
                                    oninput="filterProfessionOptionsUpdate(this)"
                                    readonly 
                                    style="cursor: pointer;"
                                    value="<?= esc($display_prof) ?>">
                                <input type="hidden" id="profession-update" name="profession-update" value="<?= esc($manager->Profession) ?>">
                            </div>
                            <div class="border rounded mt-1 bg-white" id="profession_dropdown-update" 
                                style="max-height:250px; overflow:auto; display:none; position:absolute; z-index:1001; width: calc(33.33% - 20px);">
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

            <!-- Native Address -->
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h5 class="mb-4 section-title">
                        <i class="fa-solid fa-location-dot text-primary me-2"></i>Native Address
                    </h5>
                    <div class="row g-3">
                        <div class="col-md-3">
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
                            <select id="taluks-dropdown-update" onchange="setDropdownpanchayatUpdate(this); validateUpdateInput(this)" class="form-select" name="taluk-update">
                                <option value="">Select Taluk</option>
                                <?php if (isset($taluks)): foreach ($taluks as $t): ?>
                                    <option value="<?= $t->taluk_name ?>" <?= ($manager->Taluk == $t->taluk_name) ? 'selected' : '' ?>><?= $t->taluk_name ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <small id="talukerror-update" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="panchayat-dropdown-update">Panchayat</label>
                            <select id="panchayat-dropdown-update" onchange="setDropdownVillageUpdate(this); validateUpdateInput(this)" class="form-select" name="panchayat-update">
                                <option value="">Select Panchayat</option>
                                <?php if (isset($panchayats)): foreach ($panchayats as $p): ?>
                                    <option value="<?= $p->panchayat_name ?>" <?= ($manager->Panchayat == $p->panchayat_name) ? 'selected' : '' ?>><?= $p->panchayat_name ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <small id="panchayaterror-update" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="village-update">Village</label>
                            <select id="village-update" onchange="toggleVillageOthersUpdate(this); validateUpdateInput(this)" class="form-select" name="village-update">
                                <option value="<?= $manager->Village ?>"><?= $manager->Village ?: 'Select Village' ?></option>
                            </select>
                           <input type="text" id="village_others_input_update" name="village_others_update" 
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
                            <input id="pincode-update" onkeyup="validateUpdateInput(this)" class="form-control" type="number" name="pincode-update" value="<?= $manager->Pincode ?>">
                            <small id="pincodeerror-update" class="text-danger"></small>
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
                        <button type="button" id="btn_same_as_native-update" class="btn btn-outline-success btn-sm" onclick="copyNativeAddressUpdate()" style="display: <?= ($manager->Curaddresstype == 'India') ? 'inline-block' : 'none' ?>;">
                            Same as Native Address
                        </button>
                    </div>

                    <div class="mb-3">
                        <label class="d-block">Current Address Type</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-update" id="cur_address_india-update" value="India" <?= ($manager->Curaddresstype == 'India') ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeUpdate()">
                            <label class="form-check-label" for="cur_address_india-update">India</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-update" id="cur_address_nri-update" value="NRI" <?= ($manager->Curaddresstype == 'NRI') ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeUpdate()">
                            <label class="form-check-label" for="cur_address_nri-update">NRI</label>
                        </div>
                        <small id="cur_address_type_error-update" class="text-danger"></small>
                    </div>

                    <!-- INDIA CURRENT ADDRESS BLOCK -->
                    <div id="cur_india_block-update" style="display:<?= ($manager->Curaddresstype == 'India') ? 'block' : 'none' ?>;">
                        <div class="row g-3">
                            <div class="col-md-3">
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
                                 <select id="cur_taluk-update" style="border: 1px solid #ced4da;" onchange="setDropdownpanchayatCurrentUpdate(this); validateUpdateInput(this)" class="form-select" name="cur_taluk-update">
                                    <option value="<?= $manager->Curtaluk ?>"><?= $manager->Curtaluk ?: 'Select Taluk' ?></option>
                                </select>
                                <small id="cur_talukerror-update" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_panchayat-update">Panchayat</label>
                                 <select id="cur_panchayat-update" style="border: 1px solid #ced4da;" onchange="setDropdownVillageCurrentUpdate(this); validateUpdateInput(this)" class="form-select" name="cur_panchayat-update">
                                    <option value="<?= $manager->Curpanchayat ?>"><?= $manager->Curpanchayat ?: 'Select Panchayat' ?></option>
                                </select>
                                <small id="cur_panchayaterror-update" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_village-update">Village</label>
                                <select id="cur_village-update" onchange="toggleVillageOthersCurrentUpdate(this); validateUpdateInput(this)" class="form-select" name="cur_village-update">
                                    <option value="<?= $manager->Curvillage ?>"><?= $manager->Curvillage ?: 'Select Village' ?></option>
                                </select>
                                <input type="text" id="cur_village_others_input_update" name="cur_village_others_update" 
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
                                <input id="cur_pincode-update" onkeyup="validateUpdateInput(this)" class="form-control" type="number" name="cur_pincode-update" value="<?= $manager->Curpincode ?>">
                                <small id="cur_pincodeerror-update" class="text-danger"></small>
                            </div>
                        </div>
                    </div>

                    <!-- NRI CURRENT ADDRESS BLOCK -->
                    <div id="cur_nri_block-update" style="display:<?= ($manager->Curaddresstype == 'NRI') ? 'block' : 'none' ?>;">
                        <div class="row g-3">
                            <div class="col-md-3">
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
                                <input id="cur_nri_zip-update" name="cur_nri_zip-update" class="form-control" type="text" value="<?= $manager->Curnrizip ?>" onkeyup="validateUpdateInput(this)">
                            </div>
                            <div class="col-md-12">
                                <label for="cur_nri_fulladdress-update">Full Address</label>
                                <textarea id="cur_nri_fulladdress-update" name="cur_nri_fulladdress-update" class="form-control" rows="3" onkeyup="validateUpdateInput(this)"><?= $manager->Curnrifulladdress ?></textarea>
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
                                <label for="mgr_memberimage" class="ps-file-upload-btn" id="mgr_memberimage_btn">
                                    <i class="bi bi-upload ps-file-icon"></i>
                                    <span class="ps-file-label">Choose file...</span>
                                </label>
                                <input onchange="uploadFileStyledUpdate(this, 'mgr_memberimage_btn')" id="mgr_memberimage" type="file" name="Memberimage" accept="image/*">
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
                                <input onchange="uploadFileStyledUpdate(this, 'mgr_aadharfront_btn')" id="mgr_aadharfront" type="file" name="Aadharfrontimage" accept="image/*">
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
                                <input onchange="uploadFileStyledUpdate(this, 'mgr_aadharback_btn')" id="mgr_aadharback" type="file" name="Aadharbackimage" accept="image/*">
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
                                <input onchange="uploadFileStyledUpdate(this, 'mgr_communitycert_btn')" id="mgr_communitycert" type="file" name="Communitycertificate" accept="image/*">
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
                    <input onchange="activateUpdateButton(this)" type="checkbox" class="form-check-input" id="correctdetails-update">
                    <label for="correctdetails-update" class="form-check-label ms-2 font-weight-bold">I confirm that the above details are correct.</label>
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

        function setDropdowndistrictsUpdate(state) {
            let state_id = state.value;
            
            // Clear dependent dropdowns
            document.getElementById("taluks-dropdown-update").innerHTML = '<option value="">Select Taluk</option>';
            document.getElementById("panchayat-dropdown-update").innerHTML = '<option value="">Select Panchayat</option>';
            document.getElementById("village-update").innerHTML = '<option value="">Select Village</option>';
            document.getElementById("village_others_input_update").style.display = 'none';
            document.getElementById("village_others_input_update").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { "state_id": state_id },
                success: (result) => {
                    document.getElementById("districts-dropdown-update").innerHTML = result;
                }
            });
        }

        function setDropdowntaluksUpdate(district) {
            let district_name = district.value;

            // Clear dependent dropdowns
            document.getElementById("panchayat-dropdown-update").innerHTML = '<option value="">Select Panchayat</option>';
            document.getElementById("village-update").innerHTML = '<option value="">Select Village</option>';
            document.getElementById("village_others_input_update").style.display = 'none';
            document.getElementById("village_others_input_update").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { "district_name": district_name },
                success: (result) => {
                    document.getElementById("taluks-dropdown-update").innerHTML = result;
                }
            });
        }

        function setDropdownpanchayatUpdate(taluk, selectPanchayat = null, selectVillage = null) {
            let taluk_name = taluk.value;
            
            // Clear dependent dropdowns if we are just changing taluk (not pre-filling)
            if (!selectPanchayat) {
                document.getElementById("village-update").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("village_others_input_update").style.display = 'none';
                document.getElementById("village_others_input_update").value = '';
            }

            if (!taluk_name) return;
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { taluk_name: taluk_name },
                success: function (result) {
                    let panchayatDropdown = document.getElementById("panchayat-dropdown-update");
                    panchayatDropdown.innerHTML = result;
                    if (selectPanchayat) {
                        panchayatDropdown.value = selectPanchayat;
                        setDropdownVillageUpdate(panchayatDropdown, selectVillage);
                    }
                }
            });
        }

        function setDropdownVillageUpdate(panchayatEl, selectedVillage = null) {
            let panchayat_name = panchayatEl.value;
            let villageSelect = document.getElementById('village-update');
            
            // Clear manual input if just changing panchayat
            if (!selectedVillage) {
                document.getElementById("village_others_input_update").style.display = 'none';
                document.getElementById("village_others_input_update").value = '';
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
                         // If value didn't stick, it means it's not in the list -> set to Others
                         if (villageSelect.value !== selectedVillage) {
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
            const othersInput = document.getElementById('village_others_input_update');
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

        function toggleCurrentAddressTypeUpdate() {
            const selected = document.querySelector('input[name="cur_address_type-update"]:checked');
            const indiaBlock = document.getElementById('cur_india_block-update');
            const nriBlock = document.getElementById('cur_nri_block-update');
            const sameBtn = document.getElementById('btn_same_as_native-update');
            if(!selected) return;

            if (selected.value === 'India') {
                indiaBlock.style.display = 'block';
                nriBlock.style.display = 'none';
                if (sameBtn) sameBtn.style.display = 'inline-block';
                // Clear NRI fields
                if(document.getElementById('cur_nri_country-update')) document.getElementById('cur_nri_country-update').value = "";
                if(document.getElementById('cur_nri_state-update')) document.getElementById('cur_nri_state-update').value = "";
                if(document.getElementById('cur_nri_city-update')) document.getElementById('cur_nri_city-update').value = "";
                if(document.getElementById('cur_nri_zip-update')) document.getElementById('cur_nri_zip-update').value = "";
                if(document.getElementById('cur_nri_fulladdress-update')) document.getElementById('cur_nri_fulladdress-update').value = "";
            } else {
                indiaBlock.style.display = 'none';
                nriBlock.style.display = 'block';
                if (sameBtn) sameBtn.style.display = 'none';
                // Clear India fields
                if(document.getElementById('cur_state-update')) document.getElementById('cur_state-update').value = "";
                if(document.getElementById('cur_district-update')) document.getElementById('cur_district-update').innerHTML = '<option value="">Select District</option>';
                if(document.getElementById('cur_taluk-update')) document.getElementById('cur_taluk-update').innerHTML = '<option value="">Select Taluk</option>';
                if(document.getElementById('cur_panchayat-update')) document.getElementById('cur_panchayat-update').innerHTML = '<option value="">Select Panchayat</option>';
                if(document.getElementById('cur_village-update')) document.getElementById('cur_village-update').value = "";
                if(document.getElementById('cur_street-update')) document.getElementById('cur_street-update').value = "";
                if(document.getElementById('cur_doorno-update')) document.getElementById('cur_doorno-update').value = "";
                if(document.getElementById('cur_pincode-update')) document.getElementById('cur_pincode-update').value = "";
                
                loadCountriesDataUpdate();
            }
        }

        function copyNativeAddressUpdate() {
            var indiaRadio = document.getElementById('cur_address_india-update');
            if (indiaRadio) {
                indiaRadio.checked = true;
                toggleCurrentAddressTypeUpdate();
            }

            var fields = {
                'street-update': 'cur_street-update',
                'doorno-update': 'cur_doorno-update',
                'pincode-update': 'cur_pincode-update'
            };

            for (var sourceId in fields) {
                var source = document.getElementById(sourceId);
                var target = document.getElementById(fields[sourceId]);
                if (source && target) target.value = source.value;
            }
            
            var n_state = document.getElementById('states-dropdown-update').value;
            var n_district = document.getElementById('districts-dropdown-update').value;
            var n_taluk = document.getElementById('taluks-dropdown-update').value;
            var n_panchayat = document.getElementById('panchayat-dropdown-update').value;
            
            var n_village_select = document.getElementById('village-update');
            var n_village = n_village_select.value;
            if (n_village === 'Others') {
                n_village = document.getElementById('village_others_input_update').value;
            }
            
            var c_state = document.getElementById('cur_state-update');
            if (c_state && n_state) {
                c_state.value = n_state;
                setDropdowndistrictsCurrentUpdate(c_state, n_district, n_taluk, n_panchayat, n_village);
            }
        }

        function activateUpdateButton(checkbox) {
            document.getElementById("updatesubmitbutton").disabled = !checkbox.checked;
        }

        function validateUpdateInput(field) {
            if (field.value === "" && field.hasAttribute('required')) {
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        }

        function validateUpdateManagerform() {
            let isValid = true;
            const requiredFields = [
                { id: "name-update", errorId: "nameerror-update", msg: "Name is required" },
                { id: "phoneno-update", errorId: "phonenoerror-update", msg: "Phone number is required" },
                { id: "aadharno-update", errorId: "aadharnoerror-update", msg: "Aadhar number is required" },
                { id: "states-dropdown-update", errorId: "stateerror-update", msg: "State is required" },
                { id: "districts-dropdown-update", errorId: "districterror-update", msg: "District is required" },
                { id: "taluk-dropdown-update", errorId: "talukerror-update", msg: "Taluk is required" }
            ];

            // Clear errors
            document.querySelectorAll(".text-danger").forEach(el => el.innerHTML = "");

            requiredFields.forEach(field => {
                const el = document.getElementById(field.id);
                if (el && !el.value.trim()) {
                    document.getElementById(field.errorId).innerHTML = field.msg;
                    isValid = false;
                }
            });

            // Length checks
            const phoneno = document.getElementById("phoneno-update").value;
            if (phoneno && phoneno.length < 10) {
                document.getElementById("phonenoerror-update").innerHTML = "Phone number must be at least 10 digits";
                isValid = false;
            }

            const aadharno = document.getElementById("aadharno-update").value;
            if (aadharno && aadharno.length !== 12) {
                document.getElementById("aadharnoerror-update").innerHTML = "Aadhar number must be 12 digits";
                isValid = false;
            }

            // Relationship Transfer Check
            let relationshipSelect = document.getElementById("relationship-update");
            let aliveStatusDead = document.getElementById("alive_no-update");
            let upcomingHeadSelect = document.getElementById("upcoming_head-update");

            if (relationshipSelect.value === "Head" && aliveStatusDead.checked && !upcomingHeadSelect.value) {
                document.getElementById("upcomingheaderror-update").innerHTML = "Please select an upcoming head to transfer the role.";
                isValid = false;
            }

            if (!isValid) {
                const firstError = document.querySelector(".text-danger:not(:empty)");
                if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }

            return isValid;
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
                }
            }
        }

        function copyPhoneToWhatsappUpdate() {
            document.getElementById('whatsappno-update').value = document.getElementById('phoneno-update').value;
        }

        var selectedEducationsUpdate = '<?= (isset($manager->Education)) ? $manager->Education : "" ?>'.split(', ').filter(x => x);
        var educationMapUpdate = {
            "10th (SSLC)": "10th (SSLC)",
            "12th (HSC – Science)": "12th (HSC – Science)",
            "12th (HSC – Commerce)": "12th (HSC – Commerce)",
            "12th (HSC – Arts)": "12th (HSC – Arts)",
            "Diploma in Mechanical Engineering": "Diploma in Mechanical Engineering",
            "Diploma in Civil Engineering": "Diploma in Civil Engineering",
            "Diploma in Electrical Engineering": "Diploma in Electrical Engineering",
            "Diploma in Electronics and Communication Engineering": "Diploma in Electronics and Communication Engineering",
            "Diploma in Computer Engineering": "Diploma in Computer Engineering",
            "Diploma in Information Technology": "Diploma in Information Technology",
            "Diploma in Automobile Engineering": "Diploma in Automobile Engineering",
            "Diploma in Mechatronics": "Diploma in Mechatronics",
            "Diploma in Marine Engineering": "Diploma in Marine Engineering",
            "Diploma in Agriculture": "Diploma in Agriculture",
            "Diploma in Nursing": "Diploma in Nursing",
            "Diploma in Pharmacy": "Diploma in Pharmacy",
            "Diploma in Hotel Management": "Diploma in Hotel Management",
            "Diploma in Fashion Designing": "Diploma in Fashion Designing",
            "Diploma in Interior Designing": "Diploma in Interior Designing",
            "Diploma in Multimedia": "Diploma in Multimedia",
            "ITI Fitter": "ITI Fitter",
            "ITI Electrician": "ITI Electrician",
            "ITI Turner": "ITI Turner",
            "ITI Mechanic": "ITI Mechanic",
            "ITI Welder": "ITI Welder",
            "ITI Plumber": "ITI Plumber",
            "ITI Draughtsman Civil": "ITI Draughtsman Civil",
            "ITI Draughtsman Mechanical": "ITI Draughtsman Mechanical",
            "ITI COPA": "ITI COPA",
            "ITI Refrigeration and Air Conditioning": "ITI Refrigeration and Air Conditioning",
            "B.E Computer Science and Engineering": "B.E Computer Science and Engineering",
            "B.E Mechanical Engineering": "B.E Mechanical Engineering",
            "B.E Civil Engineering": "B.E Civil Engineering",
            "B.E Electrical and Electronics Engineering": "B.E Electrical and Electronics Engineering",
            "B.E Electronics and Communication Engineering": "B.E Electronics and Communication Engineering",
            "B.E Automobile Engineering": "B.E Automobile Engineering",
            "B.E Mechatronics Engineering": "B.E Mechatronics Engineering",
            "B.Tech Information Technology": "B.Tech Information Technology",
            "B.Tech Artificial Intelligence": "B.Tech Artificial Intelligence",
            "B.Tech Data Science": "B.Tech Data Science",
            "B.Tech Biotechnology": "B.Tech Biotechnology",
            "B.Tech Chemical Engineering": "B.Tech Chemical Engineering",
            "B.Tech Aeronautical Engineering": "B.Tech Aeronautical Engineering",
            "B.Tech Aerospace Engineering": "B.Tech Aerospace Engineering",
            "B.Tech Marine Engineering": "B.Tech Marine Engineering",
            "B.A Tamil": "B.A Tamil",
            "B.A English": "B.A English",
            "B.A History": "B.A History",
            "B.A Economics": "B.A Economics",
            "B.A Political Science": "B.A Political Science",
            "B.Sc Mathematics": "B.Sc Mathematics",
            "B.Sc Physics": "B.Sc Physics",
            "B.Sc Chemistry": "B.Sc Chemistry",
            "B.Sc Computer Science": "B.Sc Computer Science",
            "B.Sc Information Technology": "B.Sc Information Technology",
            "B.Sc Biotechnology": "B.Sc Biotechnology",
            "B.Sc Microbiology": "B.Sc Microbiology",
            "B.Sc Zoology": "B.Sc Zoology",
            "B.Sc Botany": "B.Sc Botany",
            "B.Sc Visual Communication": "B.Sc Visual Communication",
            "BCA": "BCA",
            "BBA": "BBA",
            "B.Com General": "B.Com General",
            "B.Com Computer Applications": "B.Com Computer Applications",
            "B.Com Accounting and Finance": "B.Com Accounting and Finance",
            "MBBS": "MBBS",
            "BDS": "BDS",
            "BAMS": "BAMS",
            "BHMS": "BHMS",
            "BUMS": "BUMS",
            "B.Pharm": "B.Pharm",
            "B.Sc Nursing": "B.Sc Nursing",
            "LLB": "LLB",
            "B.Ed": "B.Ed",
            "B.Sc Agriculture": "B.Sc Agriculture",
            "B.Arch": "B.Arch",
            "BPT (Physiotherapy)": "BPT (Physiotherapy)",
            "BHM (Hotel Management)": "BHM (Hotel Management)",
            "M.E Computer Science and Engineering": "M.E Computer Science and Engineering",
            "M.E Structural Engineering": "M.E Structural Engineering",
            "M.Tech Information Technology": "M.Tech Information Technology",
            "M.Tech Artificial Intelligence": "M.Tech Artificial Intelligence",
            "M.Tech Data Science": "M.Tech Data Science",
            "M.Tech Biotechnology": "M.Tech Biotechnology",
            "M.A Tamil": "M.A Tamil",
            "M.A English": "M.A English",
            "M.A Economics": "M.A Economics",
            "M.Sc Mathematics": "M.Sc Mathematics",
            "M.Sc Physics": "M.Sc Physics",
            "M.Sc Chemistry": "M.Sc Chemistry",
            "M.Sc Computer Science": "M.Sc Computer Science",
            "M.Sc Information Technology": "M.Sc Information Technology",
            "M.Sc Biotechnology": "M.Sc Biotechnology",
            "MCA": "MCA",
            "MBA": "MBA",
            "M.Com": "M.Com",
            "M.Pharm": "M.Pharm",
            "M.Sc Nursing": "M.Sc Nursing",
            "LLM": "LLM",
            "M.Ed": "M.Ed",
            "M.Sc Agriculture": "M.Sc Agriculture",
            "Ph.D Computer Science": "Ph.D Computer Science",
            "Ph.D Mathematics": "Ph.D Mathematics",
            "Ph.D Commerce": "Ph.D Commerce",
            "Ph.D Engineering": "Ph.D Engineering",
            "Ph.D Biotechnology": "Ph.D Biotechnology",
            "Ph.D Physics": "Ph.D Physics",
            "Ph.D Chemistry": "Ph.D Chemistry",
            "Ph.D Tamil": "Ph.D Tamil",
            "Ph.D English": "Ph.D English",
            "Others": "Others"
        };


        function renderEducationTagsUpdate() {
            const container = document.getElementById("education_tags-update");
            const hiddenContainer = document.getElementById("education_hidden_container-update");
            if (!container || !hiddenContainer) return;
            container.innerHTML = "";
            hiddenContainer.innerHTML = "";
            selectedEducationsUpdate.forEach(val => {
                const displayText = educationMapUpdate[val] || val;
                const badge = document.createElement("span");
                badge.className = "badge bg-primary me-1 mb-1";
                badge.innerHTML = displayText + ' <i class="fa-solid fa-circle-xmark ms-1 cursor-pointer" onclick="removeEducationUpdate(\'' + val.replace(/'/g, "\\'") + '\')"></i>';
                container.appendChild(badge);
                const hidden = document.createElement("input");
                hidden.type = "hidden";
                hidden.name = "education-update[]";
                hidden.value = val;
                hiddenContainer.appendChild(hidden);
            });
        }

        function removeEducationUpdate(val) {
            selectedEducationsUpdate = selectedEducationsUpdate.filter(v => v !== val);
            renderEducationTagsUpdate();
        }

        function filterEducationOptionsUpdate(input) {
            var filter = input.value.toLowerCase().trim();
            var options = document.querySelectorAll('#education_dropdown-update .education-option');
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
            document.getElementById("education_dropdown-update").style.display = (count > 0) ? "block" : "none";
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

        $(document).on("click", "#profession_dropdown-update .profession-option", function() {
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

        // Toggle readonly to allow typing when focused
        $("#profession_input-update").on("focus", function() {
            $(this).prop("readonly", false);
        }).on("blur", function() {
            $(this).prop("readonly", true);
        });

        // Handle wrapper click
        $(document).on("click", "#profession_wrapper-update", function() {
            $("#profession_input-update").focus();
            filterProfessionOptionsUpdate(document.getElementById("profession_input-update"));
        });

        // Close when clicking outside
        $(document).on("click", function(e) {
            if (!$(e.target).closest("#profession_wrapper-update").length && !$(e.target).closest("#profession_dropdown-update").length) {
                $("#profession_dropdown-update").hide();
            }
            if (!$(e.target).closest("#education_wrapper").length && !$(e.target).closest("#education_dropdown-update").length) {
                $("#education_dropdown-update").hide();
            }
        });

        // Existing Education Open logic
        document.getElementById("education_wrapper").addEventListener("click", function() {
            document.getElementById("education_input-update").focus();
            filterEducationOptionsUpdate(document.getElementById("education_input-update"));
        });



        $(document).off('click', '.education-option').on('click', '.education-option', function() {
            var val = $(this).data('value');
            if (!selectedEducationsUpdate.includes(val)) {
                selectedEducationsUpdate.push(val);
                renderEducationTagsUpdate();
            }
            $('#education_input-update').val('');
            $('#education_dropdown-update').hide();
        });

        var countriesDataUpdate = null;
        function loadCountriesDataUpdate() {
            if (countriesDataUpdate) { populateCountriesUpdate(); return; }
            $.getJSON('<?= base_url('assets/countries_states_cities.json') ?>', function(data) {
                countriesDataUpdate = data;
                populateCountriesUpdate();
            });
        }

        function populateCountriesUpdate() {
            var select = document.getElementById('cur_nri_country-update');
            var currentVal = select.value || '<?= $manager->Curnricountry ?>';
            select.innerHTML = '<option value="">Select Country</option>';
            Object.values(countriesDataUpdate).forEach(function(c) {
                var opt = document.createElement('option');
                opt.value = c.name;
                opt.textContent = c.name;
                if (c.name === currentVal) opt.selected = true;
                select.appendChild(opt);
            });
            if (currentVal) {
                loadNRIStatesUpdate(currentVal, '<?= $manager->Curnristate ?>', '<?= $manager->Curnricity ?>');
            }
        }

        function loadNRIStatesUpdate(countryName, selectState, selectCity) {
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
                document.getElementById("cur_village_others_input_update").style.display = 'none';
                document.getElementById("cur_village_others_input_update").value = '';
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
                document.getElementById("cur_village_others_input_update").style.display = 'none';
                document.getElementById("cur_village_others_input_update").value = '';
            }

            if (!district_name) return;
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { district_name: district_name },
                success: function (result) {
                    let talukDropdown = document.getElementById("cur_taluk-update");
                    talukDropdown.innerHTML = result;
                    if (selectTaluk) {
                        talukDropdown.value = selectTaluk;
                        setDropdownpanchayatCurrentUpdate(talukDropdown, selectPanchayat, selectVillage);
                    }
                }
            });
        }

        function setDropdownpanchayatCurrentUpdate(taluk, selectPanchayat = null, selectVillage = null) {
            let taluk_name = taluk.value;

            // Clear dependent dropdowns
            if (!selectPanchayat) {
                document.getElementById("cur_panchayat-update").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_village-update").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_update").style.display = 'none';
                document.getElementById("cur_village_others_input_update").value = '';
            }

            if (!taluk_name) return;
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { taluk_name: taluk_name },
                success: function (result) {
                    let panchayatDropdown = document.getElementById("cur_panchayat-update");
                    panchayatDropdown.innerHTML = result;
                    if (selectPanchayat) {
                        panchayatDropdown.value = selectPanchayat;
                        setDropdownVillageCurrentUpdate(panchayatDropdown, selectVillage);
                    }
                }
            });
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
                         if (villageSelect.value !== selectedVillage) {
                             villageSelect.value = 'Others';
                             toggleVillageOthersCurrentUpdate(villageSelect, selectedVillage);
                         } else {
                             toggleVillageOthersCurrentUpdate(villageSelect);
                         }
                     }
                }
            });
        }

        function toggleVillageOthersCurrentUpdate(selectEl, manualValue = '') {
            const othersInput = document.getElementById('cur_village_others_input_update');
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
            // loadPanchayatVillageData(); // Removed
            
            // Initial Village Load (Native)
            let p1 = document.getElementById('panchayat-dropdown-update');
            if(p1 && p1.value) setDropdownVillageUpdate(p1, '<?= isset($manager)?$manager->Village:'' ?>');
            
            // Initial Village Load (Current)
            let p2 = document.getElementById('cur_panchayat-update');
            if(p2 && p2.value) setDropdownVillageCurrentUpdate(p2, '<?= isset($manager)?$manager->Curvillage:'' ?>');

            renderEducationTagsUpdate();
            if (document.getElementById('cur_address_india-update') && document.getElementById('cur_address_india-update').checked) {
                var stateId = document.getElementById('cur_state-update').value;
                if (stateId) {
                    setDropdowndistrictsCurrentUpdate(document.getElementById('cur_state-update'), '<?= $manager->Curdistrict ?>', '<?= $manager->Curtaluk ?>', '<?= $manager->Curpanchayat ?>', '<?= $manager->Curvillage ?>');
                }
            } else if (document.getElementById('cur_address_nri-update') && document.getElementById('cur_address_nri-update').checked) {
                loadCountriesDataUpdate();
            }
        });

        function handleProfessionChangeUpdate(select) {
            let wrapper = document.getElementById('business-extra-wrapper-update');
            if (select.value === 'Others') {
                wrapper.style.display = 'block';
            } else {
                wrapper.style.display = 'none';
            }
        }
    </script>
<?php endif; ?>
