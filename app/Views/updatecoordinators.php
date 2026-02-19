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
                    <i class="fa-solid fa-user-gear me-2"></i>Update Coordinator Details: <small class="text-primary"><?= $coordinator->Familymembershipid ?></small>
                </h4>
                <button onclick="hideupdatecoordsform()" class="btn btn-close"></button>
            </div>
        </div>

        <form name="coordinatorregistration-coord" id="registration-form" class="p-4" onsubmit="return validateCoordForm()" action="<?= base_url("members/updateMember"); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">

            <input hidden value="<?= $coordinator->Familymembershipid ?>" id="membershipid-coord" type="text" name="membershipid-coord">
            <input hidden value="coordinator" type="text" name="path">
            <input hidden value="updatecoordinator" type="text" name="reason">


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
                            <input id="phoneno-coord" class="form-control" type="number" name="phoneno-coord" value="<?= $coordinator->Phonenumber ?>" onkeyup="validateCoordInput(this)">
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
                            <input id="email-coord" onkeyup="validateCoordInput(this)" class="form-control" type="email" name="email-coord" value="<?= $coordinator->Email ?>">
                            <small id="emailerror-coord" class="text-danger"></small>
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
                        <div class="col-md-12">
                            <label for="education_input-coord">Education</label>
                            <div class="border rounded p-2" id="education_wrapper">
                                <div id="education_tags-coord" class="mb-1"></div>
                                <input type="text" id="education_input-coord"
                                    class="form-control border-0 p-0"
                                    placeholder="Type and select education"
                                    onfocus="filterEducationOptionsCoord(this)"
                                    oninput="filterEducationOptionsCoord(this)">

                            </div>
                            <small id="educationerror-coord" class="text-danger"></small>
                            <div id="education_hidden_container-coord"></div>
                            <div class="border rounded mt-1 bg-white" id="education_dropdown-coord" style="max-height:200px; overflow:auto; display:none; position:absolute; width: calc(100% - 3rem); z-index: 1000;">
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
                            <label for="profession_input-coord">Profession <span class="text-danger">*</span></label>
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
                        <div class="col-md-3">
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
                            <select id="taluks-dropdown-coord" onchange="setDropdownpanchayatCoord(this); validateCoordInput(this)" class="form-select" name="taluk-coord">
                                <option value="">Select Taluk</option>
                                <?php if (isset($taluks)): foreach ($taluks as $t): ?>
                                    <option value="<?= $t->taluk_name ?>" <?= ($coordinator->Taluk == $t->taluk_name) ? 'selected' : '' ?>><?= $t->taluk_name ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <small id="talukerror-coord" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="panchayat-dropdown-coord">Panchayat</label>
                            <select id="panchayat-dropdown-coord" onchange="setDropdownVillageCoord(this); validateCoordInput(this)" class="form-select" name="panchayat-coord">
                                <option value="">Select Panchayat</option>
                                <?php if (isset($panchayats)): foreach ($panchayats as $p): ?>
                                    <option value="<?= $p->panchayat_name ?>" <?= ($coordinator->Panchayat == $p->panchayat_name) ? 'selected' : '' ?>><?= $p->panchayat_name ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <small id="panchayaterror-coord" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="village-coord">Village</label>
                            <select id="village-coord" onchange="toggleVillageOthersCoord(this); validateCoordInput(this)" class="form-select" name="village-coord">
                                <option value="<?= $coordinator->Village ?>"><?= $coordinator->Village ?: 'Select Village' ?></option>
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
                            <input id="pincode-coord" onkeyup="validateCoordInput(this)" class="form-control" type="number" name="pincode-coord" value="<?= $coordinator->Pincode ?>">
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
                        <label class="d-block">Current Address Type</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-coord" id="cur_address_india-coord" value="India" <?= ($coordinator->Curaddresstype == 'India') ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeCoord()">
                            <label class="form-check-label" for="cur_address_india-coord">India</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-coord" id="cur_address_nri-coord" value="NRI" <?= ($coordinator->Curaddresstype == 'NRI') ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeCoord()">
                            <label class="form-check-label" for="cur_address_nri-coord">NRI</label>
                        </div>
                        <small id="cur_address_type_error-coord" class="text-danger"></small>
                    </div>

                    <!-- INDIA CURRENT ADDRESS BLOCK -->
                    <div id="cur_india_block-coord" style="display:<?= ($coordinator->Curaddresstype == 'India') ? 'block' : 'none' ?>;">
                        <div class="row g-3">
                            <div class="col-md-3">
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
                                 <select id="cur_taluk-coord" style="border: 1px solid #ced4da;" onchange="setDropdownpanchayatCurrentCoord(this); validateCoordInput(this)" class="form-select" name="cur_taluk-coord">
                                    <option value="<?= $coordinator->Curtaluk ?>"><?= $coordinator->Curtaluk ?: 'Select Taluk' ?></option>
                                </select>
                                <small id="cur_talukerror-coord" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_panchayat-coord">Panchayat</label>
                                 <select id="cur_panchayat-coord" style="border: 1px solid #ced4da;" onchange="setDropdownVillageCurrentCoord(this); validateCoordInput(this)" class="form-select" name="cur_panchayat-coord">
                                    <option value="<?= $coordinator->Curpanchayat ?>"><?= $coordinator->Curpanchayat ?: 'Select Panchayat' ?></option>
                                </select>
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
                                <input id="cur_pincode-coord" onkeyup="validateCoordInput(this)" class="form-control" type="number" name="cur_pincode-coord" value="<?= $coordinator->Curpincode ?>">
                                <small id="cur_pincodeerror-coord" class="text-danger"></small>
                            </div>
                        </div>
                    </div>

                    <!-- NRI CURRENT ADDRESS BLOCK -->
                    <div id="cur_nri_block-coord" style="display:<?= ($coordinator->Curaddresstype == 'NRI') ? 'block' : 'none' ?>;">
                        <div class="row g-3">
                            <div class="col-md-3">
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
                                <input id="cur_nri_zip-coord" name="cur_nri_zip-coord" class="form-control" type="text" value="<?= $coordinator->Curnrizip ?>" onkeyup="validateCoordInput(this)">
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
                                <input onchange="uploadFileStyledCoord(this, 'coord_memberimage_btn')" id="coord_memberimage" type="file" name="Memberimage" accept="image/*">
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
                                <input onchange="uploadFileStyledCoord(this, 'coord_aadharfront_btn')" id="coord_aadharfront" type="file" name="Aadharfrontimage" accept="image/*">
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
                                <input onchange="uploadFileStyledCoord(this, 'coord_aadharback_btn')" id="coord_aadharback" type="file" name="Aadharbackimage" accept="image/*">
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
                                <input onchange="uploadFileStyledCoord(this, 'coord_communitycert_btn')" id="coord_communitycert" type="file" name="Communitycertificate" accept="image/*">
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

        function setDropdowndistrictsCoord(state) {
            let state_id = state.value;

            // Clear dependent dropdowns
            document.getElementById("taluks-dropdown-coord").innerHTML = '<option value="">Select Taluk</option>';
            document.getElementById("panchayat-dropdown-coord").innerHTML = '<option value="">Select Panchayat</option>';
            document.getElementById("village-coord").innerHTML = '<option value="">Select Village</option>';
            document.getElementById("village_others_input_coord").style.display = 'none';
            document.getElementById("village_others_input_coord").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { "state_id": state_id },
                success: (result) => {
                    document.getElementById("districts-dropdown-coord").innerHTML = result;
                }
            });
        }

        function setDropdowntaluksCoord(district) {
            let district_name = district.value;

            // Clear dependent dropdowns
            document.getElementById("panchayat-dropdown-coord").innerHTML = '<option value="">Select Panchayat</option>';
            document.getElementById("village-coord").innerHTML = '<option value="">Select Village</option>';
            document.getElementById("village_others_input_coord").style.display = 'none';
            document.getElementById("village_others_input_coord").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { "district_name": district_name },
                success: (result) => {
                    document.getElementById("taluks-dropdown-coord").innerHTML = result;
                }
            });
        }

        function setDropdownpanchayatCoord(taluk) {
            let taluk_name = taluk.value;

            // Clear dependent dropdowns
            document.getElementById("village-coord").innerHTML = '<option value="">Select Village</option>';
            document.getElementById("village_others_input_coord").style.display = 'none';
            document.getElementById("village_others_input_coord").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { "taluk_name": taluk_name },
                success: (result) => {
                    document.getElementById("panchayat-dropdown-coord").innerHTML = result;
                }
            });
        }

        function setDropdownVillageCoord(panchayatEl, selectedVillage = null) {
            const panchayat_name = panchayatEl.value;
            const villageSelect = document.getElementById('village-coord');

            // Clear manual input if just changing panchayat
            if (!selectedVillage) {
                document.getElementById("village_others_input_coord").style.display = 'none';
                document.getElementById("village_others_input_coord").value = '';
            }

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

        function toggleCurrentAddressTypeCoord() {
            const selected = document.querySelector('input[name="cur_address_type-coord"]:checked');
            const indiaBlock = document.getElementById('cur_india_block-coord');
            const nriBlock = document.getElementById('cur_nri_block-coord');
            const sameBtn = document.getElementById('btn_same_as_native-coord');
            if(!selected) return;

            if (selected.value === 'India') {
                indiaBlock.style.display = 'block';
                nriBlock.style.display = 'none';
                if (sameBtn) sameBtn.style.display = 'inline-block';
                // Clear NRI fields
                if(document.getElementById('cur_nri_country-coord')) document.getElementById('cur_nri_country-coord').value = "";
                if(document.getElementById('cur_nri_state-coord')) document.getElementById('cur_nri_state-coord').value = "";
                if(document.getElementById('cur_nri_city-coord')) document.getElementById('cur_nri_city-coord').value = "";
                if(document.getElementById('cur_nri_zip-coord')) document.getElementById('cur_nri_zip-coord').value = "";
                if(document.getElementById('cur_nri_fulladdress-coord')) document.getElementById('cur_nri_fulladdress-coord').value = "";
            } else {
                indiaBlock.style.display = 'none';
                nriBlock.style.display = 'block';
                if (sameBtn) sameBtn.style.display = 'none';
                // Clear India fields
                if(document.getElementById('cur_state-coord')) document.getElementById('cur_state-coord').value = "";
                if(document.getElementById('cur_district-coord')) document.getElementById('cur_district-coord').innerHTML = '<option value="">Select District</option>';
                if(document.getElementById('cur_taluk-coord')) document.getElementById('cur_taluk-coord').innerHTML = '<option value="">Select Taluk</option>';
                if(document.getElementById('cur_panchayat-coord')) document.getElementById('cur_panchayat-coord').innerHTML = '<option value="">Select Panchayat</option>';
                if(document.getElementById('cur_village-coord')) document.getElementById('cur_village-coord').value = "";
                if(document.getElementById('cur_street-coord')) document.getElementById('cur_street-coord').value = "";
                if(document.getElementById('cur_doorno-coord')) document.getElementById('cur_doorno-coord').value = "";
                if(document.getElementById('cur_pincode-coord')) document.getElementById('cur_pincode-coord').value = "";
                
                loadCountriesDataCoord();
            }
        }

        function copyNativeAddressCoord() {
            var indiaRadio = document.getElementById('cur_address_india-coord');
            if (indiaRadio) {
                indiaRadio.checked = true;
                toggleCurrentAddressTypeCoord();
            }

            var fields = {
                'street-coord': 'cur_street-coord',
                'doorno-coord': 'cur_doorno-coord',
                'pincode-coord': 'cur_pincode-coord'
            };

            for (var sourceId in fields) {
                var source = document.getElementById(sourceId);
                var target = document.getElementById(fields[sourceId]);
                if (source && target) target.value = source.value;
            }
            
            var n_state = document.getElementById('states-dropdown-coord').value;
            var n_district = document.getElementById('districts-dropdown-coord').value;
            var n_taluk = document.getElementById('taluks-dropdown-coord').value;
            var n_panchayat = document.getElementById('panchayat-dropdown-coord').value;
            
            var n_village_select = document.getElementById('village-coord');
            var n_village = n_village_select.value;
            if (n_village === 'Others') {
                n_village = document.getElementById('village_others_input_coord').value;
            }
            
            var c_state = document.getElementById('cur_state-coord');
            if (c_state && n_state) {
                c_state.value = n_state;
                setDropdowndistrictsCurrentCoord(c_state, n_district, n_taluk, n_panchayat, n_village);
            }
        }

        function activateCoordButton(checkbox) {
            document.getElementById("coordsubmitbutton").disabled = !checkbox.checked;
        }

        function validateCoordInput(field) {
            if (field.value === "" && field.hasAttribute('required')) {
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        }

        function validateCoordForm() {
            return true;
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
                }
            }
        }

        function copyPhoneToWhatsappCoord() {
            document.getElementById('whatsappno-coord').value = document.getElementById('phoneno-coord').value;
        }

        var selectedEducationsCoord = '<?= (isset($coordinator->Education)) ? $coordinator->Education : "" ?>'.split(', ').filter(x => x);
        var educationMapCoord = {
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


        function renderEducationTagsCoord() {
            const container = document.getElementById("education_tags-coord");
            const hiddenContainer = document.getElementById("education_hidden_container-coord");
            if (!container || !hiddenContainer) return;
            container.innerHTML = "";
            hiddenContainer.innerHTML = "";
            selectedEducationsCoord.forEach(val => {
                const displayText = educationMapCoord[val] || val;
                const badge = document.createElement("span");
                badge.className = "badge bg-primary me-1 mb-1";
                badge.innerHTML = displayText + ' <i class="fa-solid fa-circle-xmark ms-1 cursor-pointer" onclick="removeEducationCoord(\'' + val.replace(/'/g, "\\'") + '\')"></i>';
                container.appendChild(badge);
                const hidden = document.createElement("input");
                hidden.type = "hidden";
                hidden.name = "education-update[]";
                hidden.value = val;
                hiddenContainer.appendChild(hidden);
            });
        }

        function removeEducationCoord(val) {
            selectedEducationsCoord = selectedEducationsCoord.filter(v => v !== val);
            renderEducationTagsCoord();
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

        $(document).on("click", "#profession_dropdown-coord .profession-option", function() {
            const value = this.getAttribute("data-value");
            const input = document.getElementById("profession_input-coord");
            const hidden = document.getElementById("profession-coord");
            
            input.value = this.textContent;
            hidden.value = value;
            document.getElementById("profession_dropdown-coord").style.display = "none";
            
            // Trigger profession change logic
            handleProfessionChangeCoord({value: value});
            validateCoordInput(hidden);
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
            if (!$(e.target).closest("#education_wrapper").length && !$(e.target).closest("#education_dropdown-coord").length) {
                $("#education_dropdown-coord").hide();
            }
        });

        // Existing Education Open logic
        document.getElementById("education_wrapper").addEventListener("click", function() {
            document.getElementById("education_input-coord").focus();
            filterEducationOptionsCoord(document.getElementById("education_input-coord"));
        });



        $(document).off('click', '.education-option').on('click', '.education-option', function() {
            var val = $(this).data('value');
            if (!selectedEducationsCoord.includes(val)) {
                selectedEducationsCoord.push(val);
                renderEducationTagsCoord();
            }
            $('#education_input-coord').val('');
            $('#education_dropdown-coord').hide();
        });

        var countriesDataCoord = null;
        function loadCountriesDataCoord() {
            if (countriesDataCoord) { populateCountriesCoord(); return; }
            $.getJSON('<?= base_url('assets/countries_states_cities.json') ?>', function(data) {
                countriesDataCoord = data;
                populateCountriesCoord();
            });
        }

        function populateCountriesCoord() {
            var select = document.getElementById('cur_nri_country-coord');
            var currentVal = select.value || '<?= $coordinator->Curnricountry ?>';
            select.innerHTML = '<option value="">Select Country</option>';
            Object.values(countriesDataCoord).forEach(function(c) {
                var opt = document.createElement('option');
                opt.value = c.name;
                opt.textContent = c.name;
                if (c.name === currentVal) opt.selected = true;
                select.appendChild(opt);
            });
            if (currentVal) {
                loadNRIStatesCoord(currentVal, '<?= $coordinator->Curnristate ?>', '<?= $coordinator->Curnricity ?>');
            }
        }

        function loadNRIStatesCoord(countryName, selectState, selectCity) {
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
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { district_name: district_name },
                success: function (result) {
                    let talukDropdown = document.getElementById("cur_taluk-coord");
                    talukDropdown.innerHTML = result;
                    if (selectTaluk) {
                        talukDropdown.value = selectTaluk;
                        setDropdownpanchayatCurrentCoord(talukDropdown, selectPanchayat, selectVillage);
                    }
                }
            });
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
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { taluk_name: taluk_name },
                success: function (result) {
                    let panchayatDropdown = document.getElementById("cur_panchayat-coord");
                    panchayatDropdown.innerHTML = result;
                    if (selectPanchayat) {
                        panchayatDropdown.value = selectPanchayat;
                        setDropdownVillageCurrentCoord(panchayatDropdown, selectVillage);
                    }
                }
            });
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
            // Probably already populated via setDropdowndistrictsCurrentCoord logic below if address is India,
            // but we need to trigger the initial native village load which was done in loadPanchayatVillageData.
            
            // Initially populate if already selected
            const p1 = document.getElementById('panchayat-dropdown-coord');
            if(p1 && p1.value) setDropdownVillageCoord(p1, '<?= isset($coordinator)?$coordinator->Village:'' ?>');
            
            const p2 = document.getElementById('cur_panchayat-coord');
            if(p2 && p2.value) setDropdownVillageCurrentCoord(p2, '<?= isset($coordinator)?$coordinator->Curvillage:'' ?>');


            renderEducationTagsCoord();
            if (document.getElementById('cur_address_india-coord') && document.getElementById('cur_address_india-coord').checked) {
                var stateId = document.getElementById('cur_state-coord').value;
                if (stateId) {
                    setDropdowndistrictsCurrentCoord(document.getElementById('cur_state-coord'), '<?= $coordinator->Curdistrict ?>', '<?= $coordinator->Curtaluk ?>', '<?= $coordinator->Curpanchayat ?>', '<?= $coordinator->Curvillage ?>');
                }
            } else if (document.getElementById('cur_address_nri-coord') && document.getElementById('cur_address_nri-coord').checked) {
                loadCountriesDataCoord();
            }
        });

        function handleProfessionChangeCoord(select) {
            let wrapper = document.getElementById('business-extra-wrapper-coord');
            if (select.value === 'Others') {
                wrapper.style.display = 'block';
            } else {
                wrapper.style.display = 'none';
            }
        }
    </script>







