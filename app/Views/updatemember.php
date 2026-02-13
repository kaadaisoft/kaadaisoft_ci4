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

    <?php if (isset($member)) : ?>
        <div class="bg-custom-header py-3 px-4 border-bottom shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-dark font-weight-bold">
                    <i class="fa-solid fa-user-gear me-2"></i>Update Member Details: <small class="text-primary"><?= $member->Familymembershipid ?></small>
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
                            <input id="phoneno-member" class="form-control" type="number" name="phoneno-update" value="<?= $member->Phonenumber ?>" onkeyup="validateMemberInput(this)">
                            <small id="phonenoerror-member" class="text-danger"></small>
                        </div>

                        <!-- PAN Number -->
                        <div class="col-md-4">
                            <label for="panno-member">PAN Number</label>
                            <input id="panno-member" onkeyup="validateMemberInput(this)" class="form-control" type="text" name="panno-update" value="<?= $member->Pannumber ?>">
                            <small id="pannoerror-member" class="text-danger"></small>
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
                            <input id="email-member" onkeyup="validateMemberInput(this)" class="form-control" type="email" name="email-update" value="<?= $member->Email ?>">
                            <small id="emailerror-member" class="text-danger"></small>
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
                        <i class="fa-solid fa-briefcase text-primary me-2"></i>Occupation Details
                    </h5>
                    <div class="row g-3">
                        <!-- Education -->
                        <div class="col-md-12">
                            <label for="education_input-member">Education</label>
                            <div class="border rounded p-2" id="education_wrapper">
                                <div id="education_tags-member" class="mb-1"></div>
                                <input type="text" id="education_input-member" class="form-control border-0 p-0" placeholder="Type and select education" onkeyup="filterEducationOptionsMember(this)">
                            </div>
                            <small id="educationerror-member" class="text-danger"></small>
                            <div id="education_hidden_container-member"></div>
                            <div class="border rounded mt-1 bg-white" id="education_dropdown-member" style="max-height:200px; overflow:auto; display:none; position:absolute; width: calc(100% - 3rem); z-index: 1000;">
                                <?php 
                                    $edu_map = [
                                        "UG - BA" => "Bachelor of Arts (B.A.)",
                                        "UG - BSc" => "Bachelor of Science (B.Sc.)",
                                        "UG - BCom" => "Bachelor of Commerce (B.Com.)",
                                        "UG - BBA" => "BBA",
                                        "UG - BCA" => "BCA",
                                        "UG - BE/BTech" => "BE/BTech",
                                        "UG - MBBS" => "MBBS",
                                        "UG - BALLB" => "B.A. LL.B.",
                                        "PG - MA" => "M.A.",
                                        "PG - MSc" => "M.Sc.",
                                        "PG - MCom" => "M.Com.",
                                        "PG - MBA" => "MBA",
                                        "PG - MCA" => "MCA",
                                        "PG - ME/MTech" => "M.E./M.Tech.",
                                        "DIP - Polytechnic" => "Diploma in Engineering",
                                        "DIP - Nursing" => "Diploma in Nursing",
                                        "DIP - ITI" => "ITI / Vocational",
                                        "MPhil" => "M.Phil.",
                                        "PhD" => "Ph.D."
                                    ];
                                    foreach($edu_map as $val => $text) {
                                        echo "<div class='education-option p-2 border-bottom' data-value='$val'>$text</div>";
                                    }
                                ?>
                            </div>
                        </div>

                        <!-- Profession -->
                        <div class="col-md-4">
                            <label for="profession-member">Profession</label>
                            <select id="profession-member" name="profession-update" class="form-select" onchange="handleProfessionChangeMember(this); validateMemberInput(this)">
                                <option value="">Select Profession</option>
                                <?php 
                                    $professions = [
                                        "Doctor" => "Doctor",
                                        "Lawyer" => "Lawyer",
                                        "Police" => "Police",
                                        "Teacher / Lecturer" => "Teacher / Lecturer",
                                        "Engineer" => "Engineer",
                                        "Government Employee" => "Government Employee",
                                        "Private Employee" => "Private Employee",
                                        "Student" => "Student",
                                        "Farmer" => "Farmer – Agriculture",
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
                                        "Logistics Staff" => "Logistics / Transport Staff",
                                        "Fleet Manager" => "Fleet Manager",
                                        "Dairy Farmer" => "Dairy Farmer",
                                        "Poultry Farmer" => "Poultry Farmer",
                                        "Animal Husbandry" => "Goat / Sheep Rearing",
                                        "Pump Technician" => "Pump / Motor Technician",
                                        "Pump Factory Worker" => "Pump / Motor Manufacturing Worker",
                                        "Motor Rewinding Technician" => "Motor Rewinding Technician",
                                        "Machinist / Turner" => "Machinist / Turner",
                                        "Welder / Fabricator" => "Welder / Fabricator",
                                        "Foundry Worker" => "Steel / Aluminium Foundry Worker",
                                        "Mixer Grinder Technician" => "Mixer‑Grinder Assembly / Service Technician",
                                        "Plastic / Net Unit Worker" => "Plastic / Net / Packaging Unit Worker",
                                        "Windmill Technician" => "Windmill Maintenance Technician",
                                        "Electrical Technician" => "Electrical Line / Maintenance Technician",
                                        "Grocery Shop Staff" => "Grocery Shop Staff",
                                        "Medical Shop Staff" => "Medical Shop / Pharmacy Staff",
                                        "Retail / Sales Staff" => "Retail Shop / Sales Staff",
                                        "Office Admin / Computer Operator" => "Office Admin / Computer Operator",
                                        "Accountant / Finance Staff" => "Accountant / Finance Staff",
                                        "Bank / NBFC Staff" => "Bank / NBFC Staff",
                                        "Hospital Staff" => "Hospital Nurse / Lab Tech / Pharmacist",
                                        "Medical Representative" => "Medical Representative",
                                        "IT / Software Employee" => "IT / Software Employee",
                                        "Home Maker" => "Home Maker",
                                        "Retired" => "Retired",
                                        "Others" => "Others"
                                    ];
                                    foreach($professions as $val => $text) {
                                        echo "<option value='$val' ".($member->Profession == $val ? 'selected' : '').">$text</option>";
                                    }
                                ?>
                            </select>
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
                        <div class="col-md-3">
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
                            <select id="taluks-dropdown-member" onchange="setDropdownpanchayatMember(this); validateMemberInput(this)" class="form-select" name="taluk-update">
                                <option value="">Select Taluk</option>
                                <?php if (isset($taluks)): foreach ($taluks as $t): ?>
                                    <option value="<?= $t->taluk_name ?>" <?= ($member->Taluk == $t->taluk_name) ? 'selected' : '' ?>><?= $t->taluk_name ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <small id="talukerror-member" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="panchayat-dropdown-member">Panchayat</label>
                            <select id="panchayat-dropdown-member" onchange="setDropdownVillageMember(this); validateMemberInput(this)" class="form-select" name="panchayat-update">
                                <option value="">Select Panchayat</option>
                                <?php if (isset($panchayats)): foreach ($panchayats as $p): ?>
                                    <option value="<?= $p->panchayat_name ?>" <?= ($member->Panchayat == $p->panchayat_name) ? 'selected' : '' ?>><?= $p->panchayat_name ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <small id="panchayaterror-member" class="text-danger"></small>
                        </div>

                        <div class="col-md-3">
                            <label for="village-member">Village</label>
                            <select id="village-member" onchange="toggleVillageOthersMember(this); validateMemberInput(this)" class="form-select" name="village-update">
                                <option value="<?= $member->Village ?>"><?= $member->Village ?: 'Select Village' ?></option>
                            </select>
                            <input type="text" id="village_others_input_member" name="village_others_member" 
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
                            <input id="pincode-member" onkeyup="validateMemberInput(this)" class="form-control" type="number" name="pincode-update" value="<?= $member->Pincode ?>">
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
                        <button type="button" id="btn_same_as_native-member" class="btn btn-outline-success btn-sm" onclick="copyNativeAddressMember()">
                            Same as Native Address
                        </button>
                    </div>

                    <div class="mb-3">
                        <label class="d-block">Current Address Type</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-update" id="cur_address_india-member" value="India" <?= ($member->Curaddresstype == 'India') ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeMember()">
                            <label class="form-check-label" for="cur_address_india-member">India</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cur_address_type-update" id="cur_address_nri-member" value="NRI" <?= ($member->Curaddresstype == 'NRI') ? 'checked' : '' ?> onchange="toggleCurrentAddressTypeMember()">
                            <label class="form-check-label" for="cur_address_nri-member">NRI</label>
                        </div>
                        <small id="cur_address_type_error-member" class="text-danger"></small>
                    </div>

                    <!-- INDIA CURRENT ADDRESS BLOCK -->
                    <div id="cur_india_block-member" style="display:<?= ($member->Curaddresstype == 'India') ? 'block' : 'none' ?>;">
                        <div class="row g-3">
                            <div class="col-md-3">
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
                                 <select id="cur_taluk-member" style="border: 1px solid #ced4da;" onchange="setDropdownpanchayatCurrentMember(this); validateMemberInput(this)" class="form-select" name="cur_taluk-update">
                                    <option value="<?= $member->Curtaluk ?>"><?= $member->Curtaluk ?: 'Select Taluk' ?></option>
                                </select>
                                <small id="cur_talukerror-member" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_panchayat-member">Panchayat</label>
                                 <select id="cur_panchayat-member" style="border: 1px solid #ced4da;" onchange="setDropdownVillageCurrentMember(this); validateMemberInput(this)" class="form-select" name="cur_panchayat-update">
                                    <option value="<?= $member->Curpanchayat ?>"><?= $member->Curpanchayat ?: 'Select Panchayat' ?></option>
                                </select>
                                <small id="cur_panchayaterror-member" class="text-danger"></small>
                            </div>
                            <div class="col-md-3">
                                <label for="cur_village-member">Village</label>
                                <select id="cur_village-member" onchange="toggleVillageOthersCurrentMember(this); validateMemberInput(this)" class="form-select" name="cur_village-update">
                                    <option value="<?= $member->Curvillage ?>"><?= $member->Curvillage ?: 'Select Village' ?></option>
                                </select>
                                <input type="text" id="cur_village_others_input_member" name="cur_village_others_member" 
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
                                <input id="cur_pincode-member" onkeyup="validateMemberInput(this)" class="form-control" type="number" name="cur_pincode-update" value="<?= $member->Curpincode ?>">
                                <small id="cur_pincodeerror-member" class="text-danger"></small>
                            </div>
                        </div>
                    </div>

                    <!-- NRI CURRENT ADDRESS BLOCK -->
                    <div id="cur_nri_block-member" style="display:<?= ($member->Curaddresstype == 'NRI') ? 'block' : 'none' ?>;">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="cur_nri_country-member">Country</label>
                                <select id="cur_nri_country-member" name="cur_nri_country-update" class="form-select" onchange="loadNRIStatesMember(this.value); syncNRICountryCodeMember(this.value); validateMemberInput(this)">
                                    <option value="<?= $member->Curnricountry ?>"><?= $member->Curnricountry ?: 'Select Country' ?></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="cur_nri_state-member">State / Region</label>
                                <select id="cur_nri_state-member" name="cur_nri_state-update" class="form-select" onchange="loadNRICitiesMember(this.value); validateMemberInput(this)">
                                    <option value="<?= $member->Curnristate ?>"><?= $member->Curnristate ?: 'Select State' ?></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="cur_nri_city-member">City</label>
                                <select id="cur_nri_city-member" name="cur_nri_city-update" class="form-select" onchange="validateMemberInput(this)">
                                    <option value="<?= $member->Curnricity ?>"><?= $member->Curnricity ?: 'Select City' ?></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="cur_nri_zip-member">Zip Code</label>
                                <input id="cur_nri_zip-member" name="cur_nri_zip-update" class="form-control" type="text" value="<?= $member->Curnrizip ?>" onkeyup="validateMemberInput(this)">
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
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Passport Photo</label>
                            <input onchange="uploadFileMember(this)" class="form-control" type="file" name="Memberimage" accept="image/*">
                            <div class="mt-2 text-center">
                                <?php if (!empty($member->Memberimage)): ?>
                                    <img id="Memberimage-preview" style="width:100px; height:120px; object-fit:cover; border: 1px solid #ddd;" src="<?= base_url('assets/membersdocuments/'.$member->Memberimage) ?>">
                                <?php else: ?>
                                    <img id="Memberimage-preview" style="width:100px; height:120px; object-fit:cover; border: 1px solid #ddd; display:none;" src="">
                                    <div class="small text-muted">No photo uploaded</div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Aadhar Front</label>
                            <input onchange="uploadFileMember(this)" class="form-control" type="file" name="Aadharfrontimage" accept="image/*">
                            <div class="mt-2 text-center">
                                <?php if (!empty($member->Aadharfrontimage)): ?>
                                    <img id="Aadharfrontimage-preview" style="width:150px; height:100px; object-fit:cover; border: 1px solid #ddd;" src="<?= base_url('assets/membersdocuments/'.$member->Aadharfrontimage) ?>">
                                <?php else: ?>
                                    <img id="Aadharfrontimage-preview" style="width:150px; height:100px; object-fit:cover; border: 1px solid #ddd; display:none;" src="">
                                    <div class="small text-muted">No Aadhar Front</div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Aadhar Back</label>
                            <input onchange="uploadFileMember(this)" class="form-control" type="file" name="Aadharbackimage" accept="image/*">
                            <div class="mt-2 text-center">
                                <?php if (!empty($member->Aadharbackimage)): ?>
                                    <img id="Aadharbackimage-preview" style="width:150px; height:100px; object-fit:cover; border: 1px solid #ddd;" src="<?= base_url('assets/membersdocuments/'.$member->Aadharbackimage) ?>">
                                <?php else: ?>
                                    <img id="Aadharbackimage-preview" style="width:150px; height:100px; object-fit:cover; border: 1px solid #ddd; display:none;" src="">
                                    <div class="small text-muted">No Aadhar Back</div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Community Certificate</label>
                            <input onchange="uploadFileMember(this)" class="form-control" type="file" name="Communitycertificate" accept="image/*">
                            <div class="mt-2 text-center">
                                <?php if (!empty($member->Communitycertificate)): ?>
                                    <img id="Communitycertificate-preview" style="width:100px; height:120px; object-fit:cover; border: 1px solid #ddd;" src="<?= base_url('assets/membersdocuments/'.$member->Communitycertificate) ?>">
                                <?php else: ?>
                                    <img id="Communitycertificate-preview" style="width:100px; height:120px; object-fit:cover; border: 1px solid #ddd; display:none;" src="">
                                    <div class="small text-muted">No Certificate</div>
                                <?php endif; ?>
                            </div>
                        </div>
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
                    <button id="membersubmitbutton" disabled type="submit" class="btn btn-lg rounded-pill px-5">Update Member</button>
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

        function setDropdowndistrictsMember(state) {
            let state_id = state.value;

            // Clear dependent dropdowns
            document.getElementById("taluks-dropdown-member").innerHTML = '<option value="">Select Taluk</option>';
            document.getElementById("panchayat-dropdown-member").innerHTML = '<option value="">Select Panchayat</option>';
            document.getElementById("village-member").innerHTML = '<option value="">Select Village</option>';
            document.getElementById("village_others_input_member").style.display = 'none';
            document.getElementById("village_others_input_member").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { "state_id": state_id },
                success: (result) => {
                    document.getElementById("districts-dropdown-member").innerHTML = result;
                }
            });
        }

        function setDropdowntaluksMember(district) {
            let district_name = district.value;

            // Clear dependent dropdowns
            document.getElementById("panchayat-dropdown-member").innerHTML = '<option value="">Select Panchayat</option>';
            document.getElementById("village-member").innerHTML = '<option value="">Select Village</option>';
            document.getElementById("village_others_input_member").style.display = 'none';
            document.getElementById("village_others_input_member").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { "district_name": district_name },
                success: (result) => {
                    document.getElementById("taluks-dropdown-member").innerHTML = result;
                }
            });
        }

        function setDropdownpanchayatMember(taluk) {
            let taluk_name = taluk.value;

            // Clear dependent dropdowns
            document.getElementById("village-member").innerHTML = '<option value="">Select Village</option>';
            document.getElementById("village_others_input_member").style.display = 'none';
            document.getElementById("village_others_input_member").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { "taluk_name": taluk_name },
                success: (result) => {
                    document.getElementById("panchayat-dropdown-member").innerHTML = result;
                }
            });
        }





        $(document).ready(function () {
            // Try multiple paths
            loadCountriesDataMember();
            
            // Initially populate if already selected
            const p1 = document.getElementById('panchayat-dropdown-member');
            if(p1 && p1.value) setDropdownVillageMember(p1, '<?= isset($member)?$member->Village:'' ?>');
            
            const p2 = document.getElementById('cur_panchayat-member');
            if(p2 && p2.value) setDropdownVillageCurrentMember(p2, '<?= isset($member)?$member->Curvillage:'' ?>');
        });

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
                othersInput.setAttribute('name', 'village-member');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.removeAttribute('required');
                othersInput.value = '';
                othersInput.setAttribute('name', 'village_others_member');
                selectEl.setAttribute('name', 'village-member');
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
                othersInput.setAttribute('name', 'cur_village-member');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.removeAttribute('required');
                othersInput.value = '';
                othersInput.setAttribute('name', 'cur_village_others_member');
                selectEl.setAttribute('name', 'cur_village-member');
            }
        }

        function toggleCurrentAddressTypeMember() {
            const selected = document.querySelector('input[name="cur_address_type-update"]:checked');
            const indiaBlock = document.getElementById('cur_india_block-member');
            const nriBlock = document.getElementById('cur_nri_block-member');

            if (selected.value === 'India') {
                indiaBlock.style.display = 'block';
                nriBlock.style.display = 'none';
                // Clear NRI fields
                document.getElementById('cur_nri_country-member').value = "";
                document.getElementById('cur_nri_state-member').value = "";
                document.getElementById('cur_nri_city-member').value = "";
                document.getElementById('cur_nri_zip-member').value = "";
                document.getElementById('cur_nri_fulladdress-member').value = "";
            } else {
                indiaBlock.style.display = 'none';
                nriBlock.style.display = 'block';
                // Clear India fields
                document.getElementById('cur_state-member').value = "";
                document.getElementById('cur_district-member').innerHTML = '<option value="">Select District</option>';
                document.getElementById('cur_taluk-member').innerHTML = '<option value="">Select Taluk</option>';
                document.getElementById('cur_panchayat-member').innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById('cur_village-member').innerHTML = '<option value="">Select Village</option>';
                document.getElementById('cur_street-member').value = "";
                document.getElementById('cur_doorno-member').value = "";
                document.getElementById('cur_pincode-member').value = "";
                
                loadCountriesDataMember();
            }
        }

        function copyNativeAddressMember() {
            // Ensure India is selected for current address type
            var indiaRadio = document.getElementById('cur_address_india-member');
            if (indiaRadio) {
                indiaRadio.checked = true;
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
            }
        }

        function activateMemberButton(checkbox) {
            document.getElementById("membersubmitbutton").disabled = !checkbox.checked;
        }

        function validateMemberInput(field) {
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
            // Basic check before submit
            var isValid = true;
            
            // Validate Upcoming Head if Head is Dead
            let relationshipSelect = document.getElementById("relationship-member");
            let aliveStatusDead = document.getElementById("alive_no-member");
            let upcomingHeadSelect = document.getElementById("upcoming_head-member");
            let upcomingHeadError = document.getElementById("upcomingheaderror-member");

            if (relationshipSelect && relationshipSelect.value === "Head" && 
                aliveStatusDead && aliveStatusDead.checked) {
                if (upcomingHeadSelect.value === "") {
                    upcomingHeadSelect.classList.add('is-invalid');
                    if(upcomingHeadError) upcomingHeadError.innerText = "Please select the Upcoming Head.";
                    isValid = false;
                    upcomingHeadSelect.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    upcomingHeadSelect.focus();
                } else {
                    upcomingHeadSelect.classList.remove('is-invalid');
                    if(upcomingHeadError) upcomingHeadError.innerText = "";
                }
            }
            
            return isValid;
        }

        function uploadFileMember(file) {
            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(file.name + '-preview').src = e.target.result;
                };
                reader.readAsDataURL(file.files[0]);
            }
        }

        // Education Tags Logic (Simplified)
        var selectedEducationsMember = '<?= (isset($member->Education)) ? $member->Education : "" ?>'.split(', ').filter(x => x);
        
        var educationMapMember = {
            "UG - BA": "Bachelor of Arts (B.A.)",
            "UG - BSc": "Bachelor of Science (B.Sc.)",
            "UG - BCom": "Bachelor of Commerce (B.Com.)",
            "UG - BBA": "BBA",
            "UG - BCA": "BCA",
            "UG - BE/BTech": "BE/BTech",
            "UG - MBBS": "MBBS",
            "UG - BALLB": "B.A. LL.B.",
            "PG - MA": "M.A.",
            "PG - MSc": "M.Sc.",
            "PG - MCom": "M.Com.",
            "PG - MBA": "MBA",
            "PG - MCA": "MCA",
            "PG - ME/MTech": "M.E./M.Tech.",
            "DIP - Polytechnic": "Diploma in Engineering",
            "DIP - Nursing": "Diploma in Nursing",
            "DIP - ITI": "ITI / Vocational",
            "MPhil": "M.Phil.",
            "PhD": "Ph.D."
        };

        function renderEducationTagsMember() {
            const container = document.getElementById("education_tags-member");
            const hiddenContainer = document.getElementById("education_hidden_container-member");
            if (!container || !hiddenContainer) return;

            container.innerHTML = "";
            hiddenContainer.innerHTML = "";

            selectedEducationsMember.forEach(val => {
                const displayText = educationMapMember[val] || val;
                const badge = document.createElement("span");
                badge.className = "badge bg-primary me-1 mb-1";
                badge.innerHTML = displayText + ' <i class="fa-solid fa-circle-xmark ms-1 cursor-pointer" onclick="removeEducationMember(\'' + val.replace(/'/g, "\\'") + '\')"></i>';
                container.appendChild(badge);

                const hidden = document.createElement("input");
                hidden.type = "hidden";
                hidden.name = "education-update[]";
                hidden.value = val;
                hiddenContainer.appendChild(hidden);
            });
        }

        function removeEducationMember(val) {
            selectedEducationsMember = selectedEducationsMember.filter(v => v !== val);
            renderEducationTagsMember();
        }

        function filterEducationOptionsMember(input) {
            var filter = input.value.toLowerCase();
            var options = document.querySelectorAll('#education_dropdown-update .education-option');
            var count = 0;
            options.forEach(function(opt) {
                var text = opt.textContent.toLowerCase();
                if (text.includes(filter)) {
                    opt.style.display = "block";
                    count++;
                } else {
                    opt.style.display = "none";
                }
            });
            document.getElementById("education_dropdown-member").style.display = (filter && count > 0) ? "block" : "none";
        }

        $(document).off('click', '.education-option').on('click', '.education-option', function() {
            var val = $(this).data('value');
            if (typeof selectedEducationsMember !== 'undefined' && !selectedEducationsMember.includes(val)) {
                selectedEducationsMember.push(val);
                renderEducationTagsMember();
            }
            $('#education_input-member').val('');
            $('#education_dropdown-member').hide();
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

        function syncNRICountryCodeMember(countryName) {
            let country = Object.values(countriesDataMember).find(c => c.name === countryName);
            // logic for phone code if needed
        }

        function copyPhoneToWhatsappMember() {
            document.getElementById('whatsappno-member').value = document.getElementById('phoneno-member').value;
        }

        $(document).ready(function() {
            renderEducationTagsMember();
            
            // Initialize dropdowns for current address if already India
            if (document.getElementById('cur_address_india-member') && document.getElementById('cur_address_india-member').checked) {
                var stateId = document.getElementById('cur_state-member').value;
                if (stateId) {
                    var curDistrict = '<?= $member->Curdistrict ?>';
                    var curTaluk = '<?= $member->Curtaluk ?>';
                    var curPanchayat = '<?= $member->Curpanchayat ?>';
                    
                    if (curDistrict) {
                         setDropdowndistrictsCurrentMember(document.getElementById('cur_state-member'), curDistrict, curTaluk, curPanchayat, '<?= $member->Curvillage ?>');
                    }
                }
            } else if (document.getElementById('cur_address_nri-member') && document.getElementById('cur_address_nri-member').checked) {
                loadCountriesDataMember();
            }
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
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { district_name: district_name },
                success: function (result) {
                    let talukDropdown = document.getElementById("cur_taluk-member");
                    talukDropdown.innerHTML = result;
                    if (selectTaluk) {
                        talukDropdown.value = selectTaluk;
                        setDropdownpanchayatCurrentMember(talukDropdown, selectPanchayat, selectVillage);
                    }
                }
            });
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
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { taluk_name: taluk_name },
                success: function (result) {
                    let panchayatDropdown = document.getElementById("cur_panchayat-member");
                    panchayatDropdown.innerHTML = result;
                    if (selectPanchayat) {
                        panchayatDropdown.value = selectPanchayat;
                        setDropdownVillageCurrentMember(panchayatDropdown, selectVillage);
                    }
                }
            });
        }

        function loadCountriesDataMember() {
            if (countriesDataMember) {
                populateCountriesMember();
                return;
            }
            $.getJSON('assets/countries_states_cities.json', function(data) {
                countriesDataMember = data;
                populateCountriesMember();
            }).fail(function() {
                // Try parent path if needed or root
                $.getJSON('<?= base_url('assets/countries_states_cities.json') ?>', function(data) {
                    countriesDataMember = data;
                    populateCountriesMember();
                });
            });
        }

        function populateCountriesMember() {
            var select = document.getElementById('cur_nri_country-member');
            var currentVal = select.value || '<?= $member->Curnricountry ?>';
            select.innerHTML = '<option value="">Select Country</option>';
            Object.values(countriesDataMember).forEach(function(c) {
                var opt = document.createElement('option');
                opt.value = c.name;
                opt.textContent = c.name;
                if (c.name === currentVal) opt.selected = true;
                select.appendChild(opt);
            });
            if (currentVal) {
                loadNRIStatesMember(currentVal, '<?= $member->Curnristate ?>', '<?= $member->Curnricity ?>');
            }
        }

        function loadNRIStatesMember(countryName, selectState, selectCity) {
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
    </script>







