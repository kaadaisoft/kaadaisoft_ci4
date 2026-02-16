<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: #f0f2f5;
        }

        .login-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .login-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.65);
        }

        .card.shadow-lg {
            background: rgba(255, 255, 255, 0.50) !important;
            backdrop-filter: blur(1px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 15px !important;
        }

        .card-header,
        .card-body,
        .card {
            background: transparent !important;
        }

        .card-header h4 {
            color: #000000 !important;
            font-weight: 800 !important;
        }

        #registration-form label {
            font-size: 0.95rem;
            font-weight: 700;
            color: #000000 !important;
        }

        #registration-form .form-control,
        #registration-form select {
            font-size: 0.9rem;
            background-color: rgba(255, 255, 255, 1);
            border: 1px solid #a1887f;
            color: #000000 !important;
            font-weight: 600;
        }

        .section-title {
            border-left: 5px solid #3E2723;
            padding-left: .75rem;
            font-weight: 800;
            color: #1a0f0d !important;
        }

        .ps-img-btn,
        form button[type=submit] {
            color: white !important;
            font-weight: 700;
            border: none;
            background: linear-gradient(135deg, #795548 0%, #3E2723 100%);
            padding: 8px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
        }

        form button[type=submit]:hover {
            transform: translateY(-1px);
            filter: brightness(1.2);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.5);
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        #education_wrapper {
            min-height: 38px;
            background-color: #ffffff;
            border: 1px solid #a1887f;
            border-radius: 4px;
        }

        #education_tags .badge {
            margin-right: 4px;
            margin-bottom: 4px;
            background-color: #3E2723 !important;
            color: #ffffff;
        }

        .education-option:hover {
            background-color: #efebe9;
        }

        .bi-person-circle,
        .bi-briefcase-fill {
            color: #3E2723 !important;
        }

        .mb-2 span {
            color: #000000 !important;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="login-image">
        <img src="<?= base_url('assets/img/temple-bg1.png') ?>" alt="Kaadaisoft Temple">
    </div>

    <div class="container py-4">
        <!---------------------register-toast---------------------->
        <div id="registerstatusmodal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header fw-bold fs-5">
                        Member registration status
                        <button data-bs-dismiss="modal" class="btn btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="memberregisterstatus" style="font-weight:500;" class="fs-5"></div>
                        <button data-bs-dismiss="modal" class="btn btn-danger mt-3">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($_SESSION["registerprocesssuccess"])):
            $status = $_SESSION['registerprocesssuccess']; ?>
            <script>
                document.getElementById('memberregisterstatus').innerHTML = "<?php echo $status; ?>";
                window.onload = function () {
                    var myModal = new bootstrap.Modal(document.getElementById('registerstatusmodal'), {
                        backdrop: 'static',
                        keyboard: false
                    });
                    myModal.show();
                };
            </script>
            <?php unset($_SESSION["registerprocesssuccess"]); endif; ?>

        <?php if (isset($_SESSION["registerprocesserror"])):
            $status = $_SESSION['registerprocesserror']; ?>
            <script>
                document.getElementById('memberregisterstatus').innerHTML = <?= $status ?>;
                window.onload = function () {
                    var myModal = new bootstrap.Modal(document.getElementById('registerstatusmodal'), {
                        backdrop: 'static',
                        keyboard: false
                    });
                    myModal.show();
                };
            </script>
            <?php unset($_SESSION["registerprocesserror"]); endif; ?>
        <!---------------------register-error-toast-end------------------>

        <div class="mx-auto" style="max-width: 1150px;">
            <div class="card shadow-lg border-0 rounded-3">

                <!-- Sticky header -->
                <div class="card-header bg-white border-0 py-3" style="z-index:10;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-secondary">
                            Kaadaikulam.org / Registration Form(For Family Members)
                        </h4>
                        <button type="button" class="btn btn-light p-2 rounded-circle" aria-label="Exit form"
                            onclick="window.history.back();" style="box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                            <i class="bi bi-x-lg fs-5"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body bg-light">
                    <form name="memberregistration" id="registration-form" class="p-2"
                        onsubmit="return validateMemberform()" action="<?= base_url("members/addFamilyMember"); ?>"
                        method="post" enctype="multipart/form-data" autocomplete="off">

                        <div class="mb-2">
                            <span style="color:#295CF5;">
                                Note: <span style="color:red;font-weight:500;">*</span> Indicates Mandatory.
                            </span>
                        </div>

                        <!-- Basic details section -->
                        <div class="card mb-3 border-0">
                            <div class="card-body">
                                <h5 class="mb-3 section-title">
                                    <i class="bi bi-person-circle text-primary me-2"></i>Basic Details
                                </h5>

                                <div class="row g-3">
                                    <!-- Relationship -->
                                    <div class="col-md-4">
                                        <label for="relationshipfield">Relationship <span
                                                class="text-danger">*</span></label>
                                        <select id="relationshipfield" class="form-select form-select-sm"
                                            name="relationship" onchange="validateInputfield(this); autoSelectGender(this); toggleCustomRelationship(this)">
                                            <option value="">Select Relationship</option>
                                            <option value="Grand Father">Grand Father</option>
                                            <option value="Grand Mother">Grand Mother</option>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Husband">Husband</option>
                                            <option value="Wife">Wife</option>
                                            <option value="Son">Son</option>
                                            <!-- <option value="First Son">First Son</option>
                                            <option value="Second Son">Second Son</option>
                                            <option value="Third Son">Third Son</option> -->
                                            <option value="Daughter">Daughter</option>
                                            <!-- <option value="First Daughter">First Daughter</option>
                                            <option value="Second Daughter">Second Daughter</option>
                                            <option value="Third Daughter">Third Daughter</option> -->
                                            <option value="Son-in-law">Son-in-law</option>
                                            <option value="Daughter-in-law">Daughter-in-law</option>
                                            <option value="Brother">Brother</option>
                                            <option value="Sister">Sister</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <!-- Custom Relationship Input (Hidden by default) -->
                                        <div id="custom_rel_div" class="mt-2" style="display:none;">
                                            <label for="custom_relationship">Specify Relationship <span class="text-danger">*</span></label>
                                            <input type="text" id="custom_relationship" name="custom_relationship" 
                                                class="form-control form-control-sm" onkeyup="validateInputfield(this)">
                                            <small id="custom_relationshiperror" class="text-danger"></small>
                                        </div>
                                        <small id="relationshiperror" class="text-danger"></small>
                                    </div>

                                    <!-- Name -->
                                    <div class="col-md-4">
                                        <label for="namefield">Name <span class="text-danger">*</span></label>
                                        <input onkeyup="validateInputfield(this)" id="namefield"
                                            class="form-control form-control-sm" type="text" name="name">
                                        <small id="nameerror" class="text-danger"></small>
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="col-md-4">
                                        <label for="phonenofield">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input id="phonenofield" class="form-control form-control-sm" type="number"
                                            name="phoneno" onkeyup="validateInputfield(this)"
                                            onkeypress="if (this.value.length >= 10) return false;">

                                        <small id="phonenoerror" class="text-danger"></small>
                                    </div>

                                    <!-- PAN Number -->
                                    <div class="col-md-4">
                                        <label for="pannofield">PAN Number</label>
                                        <input id="pannofield" onkeyup="validateInputfield(this)"
                                            class="form-control form-control-sm" type="text" name="panno">
                                        <small id="pannoerror" class="text-danger"></small>
                                    </div>

                                    <!-- Aadhar Number -->
                                    <div class="col-md-4">
                                        <label for="aadharnofield">Aadhar Number <span
                                                class="text-danger">*</span></label>
                                        <input id="aadharnofield" onkeyup="validateInputfield(this)"
                                            onkeypress="if(this.value.length == 12) return false"
                                            class="form-control form-control-sm" type="number" name="aadharno">
                                        <small id="aadharnoerror" class="text-danger"></small>
                                    </div>

                                    <!-- Existing Family Id -->
                                    <!-- Existing Family Id (Hidden) -->
                                    <input type="hidden" name="existfamilyid"
                                        value="<?= isset($member) ? $member->Familymembershipid : '' ?>">

                                    <!-- Date of Birth -->
                                    <div class="col-md-4">
                                        <label for="dobfield">Date Of Birth <span class="text-danger">*</span></label>
                                        <input id="dobfield" class="form-control form-control-sm" type="date" name="dob"
                                            onchange="validateInputfield(this)">
                                        <small id="doberror" class="text-danger"></small>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-md-4">
                                        <label class="d-block">Gender <span class="text-danger">*</span></label>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="gender_male" name="gender" value="Male"
                                                onchange="validateInputfield(this)">
                                            <label class="form-check-label" for="gender_male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="gender_female" name="gender" value="Female"
                                                onchange="validateInputfield(this)">
                                            <label class="form-check-label" for="gender_female">Female</label>
                                        </div>
                                        <div>
                                            <small id="gendererror" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <!-- Blood Group -->
                                    <div class="col-md-4">
                                        <label for="bloodgroupfield">Blood Group <span
                                                class="text-danger">*</span></label>
                                        <select id="bloodgroupfield" class="form-select form-select-sm"
                                            name="bloodgroup" onchange="validateInputfield(this)">
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                        <small id="bloodgrouperror" class="text-danger"></small>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-4">
                                        <label for="emailfield">Email <span class="text-danger">*</span></label>
                                        <input id="emailfield" onkeyup="validateInputfield(this)"
                                            class="form-control form-control-sm" type="email" name="email">
                                        <small id="emailerror" class="text-danger"></small>
                                    </div>

                                    <!-- WhatsApp Number + Same as Phone -->
                                    <div class="col-md-4">
                                        <label for="whatsappnofield">WhatsApp Number <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-sm">
                                            <input id="whatsappnofield" class="form-control form-control-sm"
                                                type="number" name="whatsappno" onkeyup="validateInputfield(this)"
                                                onkeypress="if (this.value.length >= 10) return false;">

                                            <button class="btn btn-outline-primary" type="button"
                                                onclick="copyPhoneToWhatsapp()">Same as Phone</button>
                                        </div>
                                        <small id="whatsappnoerror" class="text-danger"></small>
                                    </div>

                                    <!-- Married yes/no -->
                                    <div class="col-md-4">
                                        <label class="d-block">Married <span class="text-danger">*</span></label>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="married_yes" name="married" value="Yes"
                                                onchange="validateInputfield(this)" checked>
                                            <label class="form-check-label" for="married_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="married_no" name="married" value="No"
                                                onchange="validateInputfield(this)">
                                            <label class="form-check-label" for="married_no">No</label>
                                        </div>
                                        <div>
                                            <small id="marriederror" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <input type="hidden" name="is_dead" value="0">

                                    <!-- Valuvu -->
                                    <div class="col-md-4">
                                        <label for="valuvufield">Valuvu <span class="text-danger">*</span></label>
                                        <input id="valuvufield" onkeyup="validateInputfield(this)"
                                            class="form-control form-control-sm" type="text" name="valuvu">
                                        <small id="valuvuerror" class="text-danger"></small>
                                    </div>

                                    <!-- Thottam -->
                                    <div class="col-md-4">
                                        <label for="thottamfield">Thottam <span class="text-danger">*</span></label>
                                        <input id="thottamfield" onkeyup="validateInputfield(this)"
                                            class="form-control form-control-sm" type="text" name="thottam">
                                        <small id="thottamerror" class="text-danger"></small>
                                    </div>

                                    <!-- Kulam (default, readonly) -->
                                    <div class="col-md-4">
                                        <label for="kulamfield">Kulam <span class="text-danger">*</span></label>
                                        <select id="kulamfield" class="form-control form-control-sm" name="kulam"
                                            style="width: 100%;">
                                            <option value="Poondurai Kaadai" selected>Poondurai Kaadai</option>
                                            <option value="Aanthuvan Kulam">Aanthuvan Kulam</option>
                                            <option value="Azhagu Kulam">Azhagu Kulam</option>
                                            <option value="Aathe Kulam">Aathe Kulam</option>
                                            <option value="Aanthai Kulam">Aanthai Kulam</option>
                                            <option value="Aadar Kulam">Aadar Kulam</option>
                                            <option value="Aavan Kulam">Aavan Kulam</option>
                                            <option value="Eenjan Kulam">Eenjan Kulam</option>
                                            <option value="Ozukkar Kulam">Ozukkar Kulam</option>
                                            <option value="Oothaalar Kulam">Oothaalar Kulam</option>
                                            <option value="Kannakkan Kulam">Kannakkan Kulam</option>
                                            <option value="Kannan Kulam">Kannan Kulam</option>
                                            <option value="Kannaanthai Kulam">Kannaanthai Kulam</option>
                                            <option value="Kaadai Kulam">Kaadai Kulam</option>
                                            <option value="Kaari Kulam">Kaari Kulam</option>
                                            <option value="Keeran Kulam">Keeran Kulam</option>
                                            <option value="Kuzhlaayan Kulam">Kuzhlaayan Kulam</option>
                                            <option value="Koorai Kulam">Koorai Kulam</option>
                                            <option value="Koovendhar Kulam">Koovendhar Kulam</option>
                                            <option value="Saathanthai Kulam">Saathanthai Kulam</option>
                                            <option value="Sellan Kulam">Sellan Kulam</option>
                                            <option value="Semban Kulam">Semban Kulam</option>
                                            <option value="Sengkannan Kulam">Sengkannan Kulam</option>
                                            <option value="Sembuthan Kulam">Sembuthan Kulam</option>
                                            <option value="Senkunnier Kulam">Senkunnier Kulam</option>
                                            <option value="Sevvaayar Kulam">Sevvaayar Kulam</option>
                                            <option value="Cheran Kulam">Cheran Kulam</option>
                                            <option value="Chedan Kulam">Chedan Kulam</option>
                                            <option value="Dananjayan Kulam">Dananjayan Kulam</option>
                                            <option value="Thazhinji Kulam">Thazhinji Kulam</option>
                                            <option value="Thooran Kulam">Thooran Kulam</option>
                                            <option value="Devendran Kulam">Devendran Kulam</option>
                                            <option value="Thoodar Kulam">Thoodar Kulam</option>
                                            <option value="Neerunniyar Kulam">Neerunniyar Kulam</option>
                                            <option value="Pavazhalar Kulam">Pavazhalar Kulam</option>
                                            <option value="Panayan Kulam">Panayan Kulam</option>
                                            <option value="Pathuman Kulam">Pathuman Kulam</option>
                                            <option value="Payiran Kulam">Payiran Kulam</option>
                                            <option value="Panagkaadar Kulam">Panagkaadar Kulam</option>
                                            <option value="Pathariar Kulam">Pathariar Kulam</option>
                                            <option value="Pandiyan Kulam">Pandiyan Kulam</option>
                                            <option value="Pillar Kulam">Pillar Kulam</option>
                                            <option value="Poosan Kulam">Poosan Kulam</option>
                                            <option value="Poochanthai Kulam">Poochanthai Kulam</option>
                                            <option value="Periyan Kulam">Periyan Kulam</option>
                                            <option value="Perunkudiyaan Kulam">Perunkudiyaan Kulam</option>
                                            <option value="Porulaanthai Kulam">Porulaanthai Kulam</option>
                                            <option value="Ponnar Kulam">Ponnar Kulam</option>
                                            <option value="Maniyan Kulam">Maniyan Kulam</option>
                                            <option value="Mayilar Kulam">Mayilar Kulam</option>
                                            <option value="Maadar Kulam">Maadar Kulam</option>
                                            <option value="Mutthan Kulam">Mutthan Kulam</option>
                                            <option value="Muzhukathan Kulam">Muzhukathan Kulam</option>
                                            <option value="Medhi Kulam">Medhi Kulam</option>
                                            <option value="Vannakkan Kulam">Vannakkan Kulam</option>
                                            <option value="Villiyar Kulam">Villiyar Kulam</option>
                                            <option value="Vilayan Kulam">Vilayan Kulam</option>
                                            <option value="Vizhiyar Kulam">Vizhiyar Kulam</option>
                                            <option value="Venduvan Kulam">Venduvan Kulam</option>
                                            <option value="Vennag Kulam">Vennag Kulam</option>
                                            <option value="Vellampar Kulam">Vellampar Kulam</option>
                                        </select>
                                        <small id="kulamerror" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Occupation Details -->
                        <div class="card mb-3 border-0">
                            <div class="card-body">
                                <h5 class="mb-3 section-title">
                                    <i class="bi bi-briefcase-fill text-primary me-2"></i>Education & Career Details
                                </h5>
                                <div class="row g-3">

                                    <!-- Education (tag style like skills) -->
                                    <div class="col-md-12">
                                        <label for="education_input">Education</label>
                                        <div class="border rounded p-2" id="education_wrapper">
                                            <!-- selected tags will appear here -->
                                            <div id="education_tags" class="mb-1"></div>

                                            <!-- input for typing -->
                                            <input type="text" id="education_input"
                                                class="form-control form-control-sm border-0 p-0"
                                                placeholder="Type and select education (e.g., B.Sc, MBA)"
                                                onkeyup="filterEducationOptions(this)">
                                        </div>
                                        <small id="educationerror" class="text-danger"></small>

                                        <!-- hidden field array for submit -->
                                        <div id="education_hidden_container"></div>

                                        <!-- dropdown suggestions -->
                                        <div class="border rounded mt-1 bg-white" id="education_dropdown"
                                            style="max-height:200px; overflow:auto; display:none;">
                                            <!-- options -->
                                            <div class="education-option" data-value="UG - BA">Bachelor of Arts (B.A.)
                                            </div>
                                            <div class="education-option" data-value="UG - BSc">Bachelor of Science
                                                (B.Sc.)</div>
                                            <div class="education-option" data-value="UG - BCom">Bachelor of Commerce
                                                (B.Com.)</div>
                                            <div class="education-option" data-value="UG - BBA">BBA</div>
                                            <div class="education-option" data-value="UG - BCA">BCA</div>
                                            <div class="education-option" data-value="UG - BE/BTech">BE / B.Tech</div>
                                            <div class="education-option" data-value="UG - BArch">B.Arch (Architecture)
                                            </div>
                                            <div class="education-option" data-value="UG - MBBS">MBBS</div>
                                            <div class="education-option" data-value="UG - BDS">BDS (Dental)</div>
                                            <div class="education-option" data-value="UG - BPharm">B.Pharm</div>
                                            <div class="education-option" data-value="UG - BPT">B.P.T (Physiotherapy)
                                            </div>
                                            <div class="education-option" data-value="UG - BSc Agri">B.Sc. Agriculture
                                            </div>
                                            <div class="education-option" data-value="UG - BALLB">B.A. LL.B.</div>
                                            <div class="education-option" data-value="UG - B.Ed">B.Ed (Education)</div>

                                            <div class="education-option" data-value="PG - MA">M.A.</div>
                                            <div class="education-option" data-value="PG - MSc">M.Sc.</div>
                                            <div class="education-option" data-value="PG - MCom">M.Com.</div>
                                            <div class="education-option" data-value="PG - MBA">MBA</div>
                                            <div class="education-option" data-value="PG - MCA">MCA</div>
                                            <div class="education-option" data-value="PG - ME/MTech">M.E. / M.Tech.
                                            </div>
                                            <div class="education-option" data-value="PG - MD/MS">MD / MS</div>
                                            <div class="education-option" data-value="PG - LLM">LL.M.</div>
                                            <div class="education-option" data-value="PG - MSW">MSW (Social Work)</div>
                                            <div class="education-option" data-value="PG - M.Ed">M.Ed (Education)</div>

                                            <div class="education-option" data-value="DIP - Polytechnic">Diploma in
                                                Engineering</div>
                                            <div class="education-option" data-value="DIP - Nursing">Diploma in Nursing
                                            </div>
                                            <div class="education-option" data-value="DIP - ITI">ITI / Vocational</div>
                                            <div class="education-option" data-value="DIP - D.Pharm">D.Pharm</div>

                                            <div class="education-option" data-value="PROF - CA">Chartered Accountant
                                                (CA)</div>
                                            <div class="education-option" data-value="PROF - CMA">CMA (Cost Accounting)
                                            </div>
                                            <div class="education-option" data-value="PROF - CS">Company Secretary (CS)
                                            </div>

                                            <div class="education-option" data-value="MPhil">M.Phil.</div>
                                            <div class="education-option" data-value="PhD">Ph.D.</div>
                                            <div class="education-option" data-value="PostDoc">Post-Doctoral Fellowship
                                            </div>

                                            <div class="education-option" data-value="Others">Others</div>
                                        </div>
                                    </div>


                                    <!-- Profession (mandatory) -->
                                    <div class="col-md-4">
                                        <label for="professionfield">Profession <span
                                                class="text-danger">*</span></label>
                                        <select id="professionfield" name="profession"
                                            class="form-select form-select-sm"
                                            onchange="handleProfessionChange(this); validateInputfield(this)">
                                            <option value="">Select Profession</option>

                                            <!-- Existing core professions -->
                                            <option value="Doctor">Doctor</option>
                                            <option value="Lawyer">Lawyer</option>
                                            <option value="Police">Police</option>
                                            <option value="Teacher / Lecturer">Teacher / Lecturer</option>
                                            <option value="Engineer">Engineer</option>
                                            <option value="Government Employee">Government Employee</option>
                                            <option value="Private Employee">Private Employee</option>
                                            <option value="Student">Student</option>
                                            <option value="Farmer">Farmer – Agriculture</option>

                                            <!-- Textiles & Apparel -->
                                            <option value="Textile Mill Worker">Textile Mill Worker (Spinning / Weaving)
                                            </option>
                                            <option value="Garment Factory Worker">Garment Factory Worker</option>
                                            <option value="Tailor">Tailor / Apparel Stitching</option>
                                            <option value="Pattern Master">Garment Pattern Master / Designer</option>
                                            <option value="Textile Machinery Technician">Textile Machinery Technician /
                                                Mechanic</option>
                                            <option value="Textile Machinery Service">Textile Machinery Sales & Service
                                            </option>
                                            <option value="Loom Operator">Powerloom / Auto‑Loom Operator</option>
                                            <option value="Knitting Machine Operator">Knitting Machine Operator</option>

                                            <!-- Transport -->
                                            <option value="Truck Driver">Truck / Lorry Driver</option>
                                            <option value="Truck Owner Driver">Truck / Lorry Owner‑cum‑Driver</option>
                                            <option value="Logistics Staff">Logistics / Transport Staff</option>
                                            <option value="Fleet Manager">Fleet Manager</option>

                                            <!-- Dairy / Poultry / Allied -->
                                            <option value="Dairy Farmer">Dairy Farmer</option>
                                            <option value="Poultry Farmer">Poultry Farmer</option>
                                            <option value="Animal Husbandry">Goat / Sheep Rearing</option>

                                            <!-- Engineering / Manufacturing -->
                                            <option value="Pump Technician">Pump / Motor Technician</option>
                                            <option value="Pump Factory Worker">Pump / Motor Manufacturing Worker
                                            </option>
                                            <option value="Motor Rewinding Technician">Motor Rewinding Technician
                                            </option>
                                            <option value="Machinist / Turner">Machinist / Turner</option>
                                            <option value="Welder / Fabricator">Welder / Fabricator</option>
                                            <option value="Foundry Worker">Steel / Aluminium Foundry Worker</option>
                                            <option value="Mixer Grinder Technician">Mixer‑Grinder Assembly / Service
                                                Technician</option>
                                            <option value="Plastic / Net Unit Worker">Plastic / Net / Packaging Unit
                                                Worker</option>

                                            <!-- Energy -->
                                            <option value="Windmill Technician">Windmill Maintenance Technician</option>
                                            <option value="Electrical Technician">Electrical Line / Maintenance
                                                Technician</option>

                                            <!-- Retail & Services -->
                                            <option value="Grocery Shop Staff">Grocery Shop Staff</option>
                                            <option value="Medical Shop Staff">Medical Shop / Pharmacy Staff</option>
                                            <option value="Retail / Sales Staff">Retail Shop / Sales Staff</option>
                                            <option value="Office Admin / Computer Operator">Office Admin / Computer
                                                Operator</option>

                                            <!-- Finance / Health / IT -->
                                            <option value="Accountant / Finance Staff">Accountant / Finance Staff
                                            </option>
                                            <option value="Bank / NBFC Staff">Bank / NBFC Staff</option>
                                            <option value="Hospital Staff">Hospital Nurse / Lab Tech / Pharmacist
                                            </option>
                                            <option value="Medical Representative">Medical Representative</option>
                                            <option value="IT / Software Employee">IT / Software Employee</option>

                                            <!-- Others -->
                                            <option value="Home Maker">Home Maker</option>
                                            <option value="Retired">Retired</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        <small id="professionerror" class="text-danger"></small>
                                    </div>

                                    <!-- Business details (initially hidden) -->
                                    <div class="col-md-4" id="business-extra-wrapper" style="display:none;">
                                        <label for="business_name">Business Name</label>
                                        <input type="text" id="business_name" name="business"
                                            class="form-control form-control-sm" placeholder="Enter business name">
                                        <small id="business_name_error" class="text-danger"></small>

                                        <label for="business_website" class="mt-2">Business Website URL (if you
                                            have)</label>
                                        <input type="text" id="business_website" name="business_website"
                                            class="form-control form-control-sm" placeholder="https://example.com">
                                        <small id="business_website_error" class="text-danger"></small>
                                    </div>


                                    <!-- Business (optional) -->
                                    <!-- <div class="col-md-4">
                                        <label for="businessfield">Business Details</label>
                                        <select id="businessfield" name="business" class="form-select form-select-sm"
                                            onchange="validateInputfield(this)">

                                            <option value="">Select Business</option>
                                            <option value="">No Business / Not Applicable</option>

                                             Textiles & Apparel -->
                                    <!-- <option value="Textile Mill">Textile Spinning / Weaving Mill</option>
                                            <option value="Powerloom Unit">Powerloom / Handloom Unit</option>
                                            <option value="Garment Unit">Garment Export / Job Work Unit</option>
                                            <option value="Textile Trading">Textile / Yarn / Fabric Trading</option>
                                            <option value="Readymade Showroom">Readymade Garments Showroom</option> -->

                                    <!-- Transport & Logistics -->
                                    <!-- <option value="Truck Transport">Truck / Lorry Transport (Own Vehicles)
                                            </option>
                                            <option value="Parcel / Logistics Agency">Parcel / Logistics Agency</option>
                                            <option value="Travel Agency">Travel Agency / Tours & Travels</option> -->

                                    <!-- Agriculture & Allied -->
                                    <!-- <option value="Dairy Farm">Dairy Farm</option>
                                            <option value="Milk Agency">Milk Collection Centre / Milk Agency</option>
                                            <option value="Poultry Farm">Poultry Farm</option> -->

                                    <!-- Engineering & Manufacturing -->
                                    <!-- <option value="Pump & Motor Business">Pump & Motor Showroom / Service /
                                                Manufacturing</option>
                                            <option value="Engineering Workshop">Engineering Workshop / Fabrication
                                            </option>
                                            <option value="Auto Components Unit">Auto Components Manufacturing Unit
                                            </option>
                                            <option value="Foundry">Steel / Aluminium Foundry</option>
                                            <option value="Mixer Grinder Manufacturing">Mixer‑Grinder / Home Appliances
                                                Manufacturing</option>
                                            <option value="Net / Plastic Manufacturing">HDPE Net / Plastic / Packaging
                                                Manufacturing</option> -->

                                    <!-- Retail & Services -->
                                    <!-- <option value="Grocery Shop">Grocery Shop</option>
                                            <option value="Medical Shop">Medical Shop / Pharmacy</option>
                                            <option value="Retail Shop">Retail Shop (General / Hardware / Others)
                                            </option>
                                            <option value="Online Business">Online Business / E‑Commerce Seller</option> -->

                                    <!-- Finance, Health, Edu, IT -->
                                    <!-- <option value="Finance / Chit">Finance / Chit / Microfinance Business
                                            </option>
                                            <option value="Clinic / Lab / Hospital">Clinic / Lab / Health Centre
                                            </option>
                                            <option value="Educational Institution / Tuition">
                                                Educational Institution / Tuition Centre
                                            </option>
                                            <option value="IT Company / Startup">IT Company / Software / Service Startup
                                            </option> -->

                                    <!-- Other -->
                                    <!-- <option value="Other Business">Other Business</option>
                                        </select>
                                        <small id="businesserror" class="text-danger"></small>
                                    </div> -->

                                </div>
                            </div>
                        </div>


                        <!-- Native Address -->
                        <div class="card mb-3 border-0">
                            <div class="card-body">
                                <h5 class="mb-3 section-title">
                                    <i class="bi bi-geo-alt-fill text-primary me-2"></i>Native Address
                                    <span class="text-danger">*</span>
                                </h5>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="states-dropdown">State <span class="text-danger">*</span></label>
                                        <select id="states-dropdown"
                                            onchange="setDropdowndistricts(this); validateInputfield(this)"
                                            class="form-select form-select-sm" name="state">
                                            <option value=''>Select State</option>
                                            <?php if (isset($states)): ?>
                                                <?php foreach ($states as $key => $state): ?>
                                                    <option value='<?= $state->state_id ?>' <?= (isset($member) && $member->State == $state->state_title) ? 'selected' : '' ?>>
                                                        <?= $state->state_title ?></option>
                                                <?php endforeach; ?>
                                            <?php endif ?>
                                        </select>
                                        <small id="stateerror" class="text-danger"></small>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="districts-dropdown">District <span
                                                class="text-danger">*</span></label>
                                        <select id="districts-dropdown"
                                            onchange="setDropdowntaluks(this); validateInputfield(this)"
                                            class="form-select form-select-sm" name="district">
                                            <option value="">Select District</option>
                                            <?php if (isset($districts)):
                                                foreach ($districts as $d): ?>
                                                    <option value="<?= $d->district_name ?>" <?= (isset($member) && $member->District == $d->district_name) ? 'selected' : '' ?>>
                                                        <?= $d->district_name ?></option>
                                                <?php endforeach; endif; ?>
                                        </select>
                                        <small id="districterror" class="text-danger"></small>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="taluks-dropdown">Taluk <span class="text-danger">*</span></label>
                                        <select id="taluks-dropdown"
                                            onchange="setDropdownpanchayat(this); validateInputfield(this)"
                                            class="form-select form-select-sm" name="taluk">
                                            <option value="">Select Taluk</option>
                                            <?php if (isset($taluks)):
                                                foreach ($taluks as $t): ?>
                                                    <option value="<?= $t->taluk_name ?>" <?= (isset($member) && $member->Taluk == $t->taluk_name) ? 'selected' : '' ?>>
                                                        <?= $t->taluk_name ?></option>
                                                <?php endforeach; endif; ?>
                                        </select>
                                        <small id="talukerror" class="text-danger"></small>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="panchayat-dropdown">Panchayat <span
                                                class="text-danger">*</span></label>
                                        <select id="panchayat-dropdown" onchange="setDropdownVillage(this); validateInputfield(this)"
                                            class="form-select form-select-sm" name="panchayat">
                                            <option value="">Select Panchayat</option>
                                            <?php if (isset($panchayats)):
                                                foreach ($panchayats as $p): ?>
                                                    <option value="<?= $p->panchayat_name ?>" <?= (isset($member) && $member->Panchayat == $p->panchayat_name) ? 'selected' : '' ?>>
                                                        <?= $p->panchayat_name ?></option>
                                                <?php endforeach; endif; ?>
                                        </select>
                                        <small id="panchayaterror" class="text-danger"></small>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="villagefield">Village Name <span
                                                class="text-danger">*</span></label>
                                        <select id="villagefield" onchange="toggleVillageOthersFamily(this); validateInputfield(this)"
                                            class="form-select form-select-sm" name="village">
                                            <option value="<?= isset($member) ? $member->Village : '' ?>"><?= (isset($member) && $member->Village) ? $member->Village : 'Select Village' ?></option>
                                        </select>
                                        <input type="text" id="village_others_input_family" name="village_others" 
                                            class="form-control form-control-sm mt-2" 
                                            placeholder="Enter village name" 
                                            style="display:none;" 
                                            onkeyup="validateInputfield(this)">
                                        <small id="villageerror" class="text-danger"></small>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="streetfield">Street Name <span class="text-danger">*</span></label>
                                        <input id="streetfield" onkeyup="validateInputfield(this)"
                                            class="form-control form-control-sm" type="text" name="street"
                                            value="<?= isset($member) ? $member->Street : '' ?>">
                                        <small id="streeterror" class="text-danger"></small>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="doornofield">Door Number <span class="text-danger">*</span></label>
                                        <input id="doornofield" onkeyup="validateInputfield(this)"
                                            class="form-control form-control-sm" type="text" name="doorno"
                                            value="<?= isset($member) ? $member->Doornumber : '' ?>">
                                        <small id="doornoerror" class="text-danger"></small>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="pincodefield">Pin Code <span class="text-danger">*</span></label>
                                        <input id="pincodefield" onkeyup="validateInputfield(this)"
                                            onkeypress="if(this.value.length == 6) return false"
                                            class="form-control form-control-sm" type="number" name="pincode"
                                            value="<?= isset($member) ? $member->Pincode : '' ?>">
                                        <small id="pincodeerror" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Current Address -->
                        <div class="card mb-3 border-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0 section-title">
                                        <i class="bi bi-geo-alt text-success me-2"></i>Current Address
                                        <span class="text-danger">*</span>
                                    </h5>

                                    <button type="button" id="btn_same_as_native"
                                        class="btn btn-success btn-sm disabled" disabled onclick="copyNativeAddress()">
                                        Same as Native Address
                                    </button>
                                </div>

                                <!-- India / NRI toggle -->
                                <div class="mb-3">
                                    <label class="d-block">Current Address Type <span
                                            class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cur_address_type"
                                            id="cur_address_india" value="India" onchange="toggleCurrentAddressType()">
                                        <label class="form-check-label" for="cur_address_india">India</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cur_address_type"
                                            id="cur_address_nri" value="NRI" onchange="toggleCurrentAddressType()">
                                        <label class="form-check-label" for="cur_address_nri">NRI</label>
                                    </div>
                                    <small id="cur_address_type_error" class="text-danger"></small>
                                </div>

                                <!-- INDIA CURRENT ADDRESS BLOCK -->
                                <div id="cur_india_block" style="display:none;">
                                    <div class="row g-3">
                                        <!-- use your existing India current address fields -->
                                        <div class="col-md-3">
                                            <label for="cur_states_dropdown">State <span
                                                    class="text-danger">*</span></label>
                                            <select id="cur_states_dropdown"
                                                onchange="setDropdowndistrictsCurrent(this); validateInputfield(this)"
                                                class="form-select form-select-sm" name="cur_state">
                                                <option value="">Select State</option>
                                                <?php if (isset($states)): ?>
                                                    <?php foreach ($states as $state): ?>
                                                        <option value="<?= $state->state_id ?>"><?= $state->state_title ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php endif ?>
                                            </select>
                                            <small id="cur_stateerror" class="text-danger"></small>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="cur_districts_dropdown">District <span
                                                    class="text-danger">*</span></label>
                                            <select id="cur_districts_dropdown"
                                                onchange="setDropdowntaluksCurrent(this); validateInputfield(this)"
                                                class="form-select form-select-sm" name="cur_district">
                                                <option value="">Select District</option>
                                            </select>
                                            <small id="cur_districterror" class="text-danger"></small>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="cur_taluks_dropdown">Taluk <span
                                                    class="text-danger">*</span></label>
                                            <select id="cur_taluks_dropdown"
                                                onchange="setDropdownpanchayatCurrent(this); validateInputfield(this)"
                                                class="form-select form-select-sm" name="cur_taluk">
                                                <option value="">Select Taluk</option>
                                            </select>
                                            <small id="cur_talukerror" class="text-danger"></small>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="cur_panchayat_dropdown">Panchayat <span
                                                    class="text-danger">*</span></label>
                                            <select id="cur_panchayat_dropdown" onchange="setDropdownVillageCurrent(this); validateInputfield(this)"
                                                class="form-select form-select-sm" name="cur_panchayat">
                                                <option value="">Select Panchayat</option>
                                            </select>
                                            <small id="cur_panchayaterror" class="text-danger"></small>
                                        </div>

                                            <div class="col-md-3">
                                                <label for="cur_villagefield">Village Name <span
                                                        class="text-danger">*</span></label>
                                                <select id="cur_villagefield" onchange="toggleVillageOthersCurrentFamily(this); validateInputfield(this)"
                                                    class="form-select form-select-sm" name="cur_village">
                                                    <option value="">Select Village</option>
                                                </select>
                                                <input type="text" id="cur_village_others_input_family" name="cur_village_others" 
                                                    class="form-control form-control-sm mt-2" 
                                                    placeholder="Enter village name" 
                                                    style="display:none;" 
                                                    onkeyup="validateInputfield(this)">
                                                <small id="cur_villageerror" class="text-danger"></small>
                                            </div>

                                        <div class="col-md-3">
                                            <label for="cur_streetfield">Street Name <span
                                                    class="text-danger">*</span></label>
                                            <input id="cur_streetfield" onkeyup="validateInputfield(this)"
                                                class="form-control form-control-sm" type="text" name="cur_street">
                                            <small id="cur_streeterror" class="text-danger"></small>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="cur_doornofield">Door Number <span
                                                    class="text-danger">*</span></label>
                                            <input id="cur_doornofield" onkeyup="validateInputfield(this)"
                                                class="form-control form-control-sm" type="text" name="cur_doorno">
                                            <small id="cur_doornoerror" class="text-danger"></small>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="cur_pincodefield">Pin Code <span
                                                    class="text-danger">*</span></label>
                                            <input id="cur_pincodefield" onkeyup="validateInputfield(this)"
                                                onkeypress="if(this.value.length == 6) return false"
                                                class="form-control form-control-sm" type="number" name="cur_pincode">
                                            <small id="cur_pincodeerror" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                <!-- NRI CURRENT ADDRESS BLOCK -->
                                <div id="cur_nri_block" style="display:none;">
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <label for="cur_nri_country">Country <span
                                                    class="text-danger">*</span></label>
                                            <select id="cur_nri_country" name="cur_nri_country"
                                                class="form-select form-select-sm"
                                                onchange="loadNRIStates(this.value); syncNRICountryCode(this.value); validateInputfield(this)">
                                                <option value="">Select Country</option>
                                            </select>
                                            <small id="cur_nri_countryerror" class="text-danger"></small>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="cur_nri_countrycode">ISO Country Code <span
                                                    class="text-danger">*</span></label>
                                            <select id="cur_nri_countrycode" name="cur_nri_countrycode"
                                                class="form-select form-select-sm" onchange="validateInputfield(this)">
                                                <option value="">Select Code</option>
                                            </select>
                                            <small id="cur_nri_countrycodeerror" class="text-danger"></small>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="cur_nri_phonecode">Country(Phone) Code <span
                                                    class="text-danger">*</span></label>
                                            <input id="cur_nri_phonecode" name="cur_nri_phonecode"
                                                class="form-control form-control-sm" type="text" readonly>
                                            <small id="cur_nri_phonecodeerror" class="text-danger"></small>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="cur_nri_state">State / Province / Region <span
                                                    class="text-danger">*</span></label>
                                            <select id="cur_nri_state" name="cur_nri_state"
                                                class="form-select form-control-sm"
                                                onchange="loadNRICities(this.value); validateInputfield(this)">
                                                <option value="">Select State</option>
                                            </select>
                                            <small id="cur_nri_stateerror" class="text-danger"></small>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="cur_nri_city">City / Town <span
                                                    class="text-danger">*</span></label>
                                            <select id="cur_nri_city" name="cur_nri_city"
                                                class="form-select form-control-sm" onchange="validateInputfield(this)">
                                                <option value="">Select City</option>
                                            </select>
                                            <small id="cur_nri_cityerror" class="text-danger"></small>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="cur_nri_zip">Zip / Postal Code <span
                                                    class="text-danger">*</span></label>
                                            <input id="cur_nri_zip" name="cur_nri_zip"
                                                class="form-control form-control-sm" type="text"
                                                onkeyup="validateInputfield(this)">
                                            <small id="cur_nri_ziperror" class="text-danger"></small>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="cur_nri_fulladdress">Full Address (House no, street, area)
                                                <span class="text-danger">*</span></label>
                                            <textarea id="cur_nri_fulladdress" name="cur_nri_fulladdress"
                                                class="form-control form-control-sm" rows="3"
                                                onkeyup="validateInputfield(this)"></textarea>
                                            <small id="cur_nri_fulladdresserror" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="mb-2">
                            <span style="color:#295CF5;">Note: Image size should below 2MB.</span>
                        </div>

                        <!-- Documents -->
                        <div class="card mb-3 border-0">
                            <div class="card-body">
                                <h5 class="mb-3 section-title">
                                    <i class="bi bi-images text-primary me-2"></i>Documents
                                </h5>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="passportphoto" class="form-label">
                                            Upload Your Passport size photo <span class="text-danger">*</span>
                                        </label>
                                        <input onchange="uploadFile(this)" id="passportphoto"
                                            class="form-control form-control-sm" type="file" name="selfimage"
                                            accept="image/jpg,image/jpeg,image/png">
                                        <small class="text-danger selfimage"></small>
                                        <div class="mt-2">
                                            <img id="selfimage" style="width:150px;height:200px;display:none;" src=""
                                                alt="">
                                            <div></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="aadharfrontimage" class="form-label">
                                            Upload Aadhar Front image <span class="text-danger">*</span>
                                        </label>
                                        <input onchange="uploadFile(this)" class="form-control form-control-sm"
                                            type="file" name="aadharfrontimage" accept="image/jpg,image/jpeg,image/png">
                                        <small class="text-danger aadharfrontimage"></small>
                                        <div class="mt-2">
                                            <img id="aadharfrontimage" style="width:300px;height:200px;display:none;"
                                                src="" alt="">
                                            <div></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="aadharbackimage" class="form-label">
                                            Upload Aadhar Back image <span class="text-danger">*</span>
                                        </label>
                                        <input onchange="uploadFile(this)" class="form-control form-control-sm"
                                            type="file" name="aadharbackimage" accept="image/jpg,image/jpeg,image/png">
                                        <small class="text-danger aadharbackimage"></small>
                                        <div class="mt-2">
                                            <img id="aadharbackimage" style="width:300px;height:200px;display:none;"
                                                src="" alt="">
                                            <div></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="communitycertificate" class="form-label">
                                            Upload Community Certificate <span class="text-danger">*</span>
                                        </label>
                                        <input onchange="uploadFile(this)" class="form-control form-control-sm"
                                            type="file" name="communitycertificate"
                                            accept="image/jpg,image/jpeg,image/png">
                                        <small class="text-danger communitycertificate"></small>
                                        <div class="mt-2">
                                            <img id="communitycertificate"
                                                style="width:200px;height:300px;display:none;" src="" alt="">
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Declaration + submit -->
                        <div class="text-center mt-3">
                            <div class="form-check d-inline-flex align-items-center mb-2">
                                <input onchange="activateButton(this)" type="checkbox" class="form-check-input"
                                    id="correctdetails">
                                <label for="correctdetails" class="form-check-label ms-2">
                                    Above details are correct
                                </label>
                            </div>
                            <div>
                                <button id="submitbutton" disabled type="submit" class="btn px-4 fw-bold">
                                    Register
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function autoSelectGender(select) {
            let relationship = select.value;
            let gender = "";

            // Male relationships
            if (["Grand Father", "Father", "Husband", "Son", "First Son", "Second Son", "Third Son", "Son-in-law", "Brother"].includes(relationship)) {
                gender = "Male";
            }
            // Female relationships
            else if (["Grand Mother", "Mother", "Wife", "Daughter", "First Daughter", "Second Daughter", "Third Daughter", "Daughter-in-law", "Sister"].includes(relationship)) {
                gender = "Female";
            }

            if (gender) {
                if (gender === "Male") {
                    document.getElementById("gender_male").checked = true;
                } else if (gender === "Female") {
                    document.getElementById("gender_female").checked = true;
                }
                // Clear any existing gender error
                document.getElementById("gendererror").innerHTML = "";
            }
        }

        function toggleCustomRelationship(select) {
            let customDiv = document.getElementById("custom_rel_div");
            if (select.value === "Other") {
                customDiv.style.display = "block";
            } else {
                customDiv.style.display = "none";
                document.getElementById("custom_relationship").value = "";
            }
        }
        function setDropdowndistricts(state) {
            let state_id = state.value;

            // Clear dependent dropdowns
            document.getElementById("taluks-dropdown").innerHTML = '<option value="">Select Taluk</option>';
            document.getElementById("panchayat-dropdown").innerHTML = '<option value="">Select Panchayat</option>';
            document.getElementById("villagefield").innerHTML = '<option value="">Select Village</option>';
            document.getElementById("village_others_input_family").style.display = 'none';
            document.getElementById("village_others_input_family").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { "state_id": state_id },
                success: (result) => {
                    document.getElementById("districts-dropdown").innerHTML = result;
                },
                error: (error) => {
                    console.log(error.responseText)
                    document.getElementById("districts-dropdown").innerHTML = "";
                }
            });
        }

        function setDropdowntaluks(district) {
            let district_name = district.value;

            // Clear dependent dropdowns
            document.getElementById("panchayat-dropdown").innerHTML = '<option value="">Select Panchayat</option>';
            document.getElementById("villagefield").innerHTML = '<option value="">Select Village</option>';
            document.getElementById("village_others_input_family").style.display = 'none';
            document.getElementById("village_others_input_family").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { "district_name": district_name },
                success: (result) => {
                    document.getElementById("taluks-dropdown").innerHTML = result;
                },
                error: () => {
                    document.getElementById("taluks-dropdown").innerHTML = "";
                }
            });
        }

        function setDropdownpanchayat(taluk) {
            let taluk_name = taluk.value;

            // Clear dependent dropdowns
            document.getElementById("villagefield").innerHTML = '<option value="">Select Village</option>';
            document.getElementById("village_others_input_family").style.display = 'none';
            document.getElementById("village_others_input_family").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { "taluk_name": taluk_name },
                success: (result) => {
                    document.getElementById("panchayat-dropdown").innerHTML = result;
                },
                error: () => {
                    document.getElementById("panchayat-dropdown").innerHTML = "";
                }
            });
        }

        function setDropdownVillage(panchayat) {
            let panchayat_name = panchayat.value;

            document.getElementById("village_others_input_family").style.display = 'none';
            document.getElementById("village_others_input_family").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getVillagesfordropdown') ?>",
                data: { "panchayat_name": panchayat_name },
                success: (result) => {
                    document.getElementById("villagefield").innerHTML = result;
                },
                error: () => {
                    document.getElementById("villagefield").innerHTML = "";
                }
            });
        }

        function setDropdowndistrictsCurrent(state, selectDistrict = null, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let state_id = state.value;

            // Clear dependent dropdowns
            if (!selectDistrict) {
                document.getElementById("cur_districts_dropdown").innerHTML = '<option value="">Select District</option>';
                document.getElementById("cur_taluks_dropdown").innerHTML = '<option value="">Select Taluk</option>';
                document.getElementById("cur_panchayat_dropdown").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_villagefield").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_family").style.display = 'none';
                document.getElementById("cur_village_others_input_family").value = '';
            }

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { state_id: state_id },
                success: function (result) {
                    let districtDropdown = document.getElementById("cur_districts_dropdown");
                    districtDropdown.innerHTML = result;
                    if (selectDistrict) {
                         districtDropdown.value = selectDistrict;
                         setDropdowntaluksCurrent(districtDropdown, selectTaluk, selectPanchayat, selectVillage);
                    }
                },
                error: function () {
                    document.getElementById("cur_districts_dropdown").innerHTML = "";
                }
            });
        }

        function setDropdowntaluksCurrent(district, selectTaluk = null, selectPanchayat = null, selectVillage = null) {
            let district_name = district.value;

            // Clear dependent dropdowns
            if (!selectTaluk) {
                document.getElementById("cur_taluks_dropdown").innerHTML = '<option value="">Select Taluk</option>';
                document.getElementById("cur_panchayat_dropdown").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_villagefield").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_family").style.display = 'none';
                document.getElementById("cur_village_others_input_family").value = '';
            }

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getTaluksfordropdown') ?>",
                data: { district_name: district_name },
                success: function (result) {
                    let talukDropdown = document.getElementById("cur_taluks_dropdown");
                    talukDropdown.innerHTML = result;
                    if (selectTaluk) {
                        talukDropdown.value = selectTaluk;
                        setDropdownpanchayatCurrent(talukDropdown, selectPanchayat, selectVillage);
                    }
                },
                error: function () {
                    document.getElementById("cur_taluks_dropdown").innerHTML = "";
                }
            });
        }

        function setDropdownpanchayatCurrent(taluk, selectPanchayat = null, selectVillage = null) {
            let taluk_name = taluk.value;

            // Clear dependent dropdowns
            if (!selectPanchayat) {
                document.getElementById("cur_panchayat_dropdown").innerHTML = '<option value="">Select Panchayat</option>';
                document.getElementById("cur_villagefield").innerHTML = '<option value="">Select Village</option>';
                document.getElementById("cur_village_others_input_family").style.display = 'none';
                document.getElementById("cur_village_others_input_family").value = '';
            }

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                data: { taluk_name: taluk_name },
                success: function (result) {
                    let panchayatDropdown = document.getElementById("cur_panchayat_dropdown");
                    panchayatDropdown.innerHTML = result;
                    if (selectPanchayat) {
                        panchayatDropdown.value = selectPanchayat;
                        setDropdownVillageCurrent(panchayatDropdown, selectVillage);
                    }
                },
                error: function () {
                    document.getElementById("cur_panchayat_dropdown").innerHTML = "";
                }
            });
        }

        function setDropdownVillageCurrent(panchayat, selectVillage = null) {
            let panchayat_name = panchayat.value;

            document.getElementById("cur_village_others_input_family").style.display = 'none';
            document.getElementById("cur_village_others_input_family").value = '';

            $.ajax({
                type: "get",
                url: "<?= base_url('members/getVillagesfordropdown') ?>",
                data: { "panchayat_name": panchayat_name },
                success: (result) => {
                    document.getElementById("cur_villagefield").innerHTML = result;
                    if (selectVillage) {
                        document.getElementById("cur_villagefield").value = selectVillage;
                         // Handle 'Other' case if selectedVillage is not in list? 
                         // For now assuming it matches.
                         if (selectVillage === "Other") {
                             toggleVillageOthersCurrentFamily(document.getElementById("cur_villagefield"));
                         }
                    }
                },
                error: () => {
                    document.getElementById("cur_villagefield").innerHTML = "";
                }
            });
        }

        function validateInputfield(field) {
            let field_name = field.name;
            let field_value = field.value;
            let textregex = /^[A-Za-z\s]+$/;
            let alphanumericregex = /^[a-zA-Z0-9/()\s]+$/;
            let normalregex = /^[A-Za-z0-9]+$/;
            let panvalidate = /^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]+$/;

            if (field_name == "name") {
                if (field_value.length < 3) {
                    field.nextElementSibling.innerHTML = "Min 3 characters required.";
                }
                else if (field_value !== "" && !field_value.match(textregex)) {
                    field.nextElementSibling.innerHTML = "Only letters and spaces allowed for name field.";
                }
                else {
                    field.nextElementSibling.innerHTML = "";
                }
            }

            if (field_name == "village" || field_name == "street") {
                if (field_value !== "" && !field_value.match(alphanumericregex)) {
                    field.nextElementSibling.innerHTML = "Only letters,numbers,spaces are allowed.";
                }
                else {
                    field.nextElementSibling.innerHTML = "";
                }
            }

            if (field_name == "doorno") {
                if (field_value !== "" && !field_value.match(alphanumericregex)) {
                    field.nextElementSibling.innerHTML = "Don't use special characters.";
                }
                else {
                    field.nextElementSibling.innerHTML = "";
                }
            }

            if (field_name == "pincode") {
                if (field_value.length == 6 || field_value.length == 0) {
                    document.getElementById("pincodeerror").innerHTML = "";
                }
                else if (field_value.length < 6) {
                    document.getElementById("pincodeerror").innerHTML = "Pincode number should contain 6 digits.";
                }
            }

            if (field_name == "phoneno") {
                if (field_value.length >= 10 || field_value.length == 0) {
                    document.getElementById("phonenoerror").innerHTML = ""; // Clear immediately
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('members/checkExistphoneno') ?>",
                        data: { "phoneno": field_value },
                        success: (result) => {
                            console.log(result)
                            if (result.trim() == "true") {
                                document.getElementById("phonenoerror").innerHTML = "Phone number already exist.";
                            }
                            else {
                                document.getElementById("phonenoerror").innerHTML = "";
                            }
                        },
                        error: (error) => {
                            document.getElementById("menu-bar").innerHTML = "Error fetching Phone Number";
                        }
                    });
                }
                else if (field_value.length < 10) {
                    document.getElementById("phonenoerror").innerHTML = "Phone number should contain 10 digits.";
                }
            }

            if (field_name == "existfamilyid") {
                if (field_value !== "" && !field_value.match(normalregex)) {
                    field.nextElementSibling.innerHTML = "Only letters,numbers are allowed.";
                }
                else {
                    field.nextElementSibling.innerHTML = "";
                }
            }

            if (field_name == "panno") {
                if (field_value !== "" && !field_value.match(panvalidate)) {
                    field.nextElementSibling.innerHTML = "PAN number not valid";
                }
                else {
                    field.nextElementSibling.innerHTML = "";
                }
            }

            if (field_name == "aadharno") {
                if (field_value.length == 12 || field_value.length == 0) {
                    document.getElementById("aadharnoerror").innerHTML = ""; // Clear immediately
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('members/checkExistaadharno') ?>",
                        data: { "aadharno": field_value },
                        success: (result) => {
                            if (result.trim() == "true") {
                                document.getElementById("aadharnoerror").innerHTML = "Aadhar Number number already exist.";
                            }
                            else {
                                document.getElementById("aadharnoerror").innerHTML = "";
                            }
                        },
                        error: (error) => {
                            document.getElementById("menu-bar").innerHTML = "Error fetching Aadhar Number";
                        }
                    });
                }
                else if (field_value.length < 12) {
                    document.getElementById("aadharnoerror").innerHTML = "Aadhar number should contain 12 digits.";
                }
            }

            // Email live validation
            if (field_name === "email") {
                const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,}$/;
                if (field_value === "") {
                    document.getElementById("emailerror").innerHTML = "";
                } else if (!emailRegex.test(field_value)) {
                    document.getElementById("emailerror").innerHTML = "Enter a valid email like name@example.com";
                } else {
                    document.getElementById("emailerror").innerHTML = "";
                }
            }

            // Valuvu / Thottam basic cleanup (optional)
            if (field_name === "valuvu" || field_name === "thottam") {
                if (field_value.length < 3) {
                    field.nextElementSibling.innerHTML = "Min 3 characters required.";
                }
                else if (field_value !== "" && !field_value.match(alphanumericregex)) {
                    field.nextElementSibling.innerHTML = "Only letters,numbers,spaces are allowed.";
                } else {
                    field.nextElementSibling.innerHTML = "";
                }
            }
            // ---------- ADDRESS COMMON (native + current) ----------

            // Village / Street
            if (
                field_name === "village" ||
                field_name === "street" ||
                field_name === "cur_village" ||
                field_name === "cur_street"
            ) {
                if (field_value !== "" && !alphanumericregex.test(field_value)) {
                    field.nextElementSibling.innerHTML = "Only letters,numbers,spaces are allowed.";
                } else {
                    field.nextElementSibling.innerHTML = "";
                }
            }

            // Door no
            if (field_name === "doorno" || field_name === "cur_doorno") {
                if (field_value !== "" && !alphanumericregex.test(field_value)) {
                    field.nextElementSibling.innerHTML = "Don't use special characters.";
                } else {
                    field.nextElementSibling.innerHTML = "";
                }
            }

            // Pincode
            if (field_name === "pincode" || field_name === "cur_pincode") {
                const errId = field_name === "pincode" ? "pincodeerror" : "cur_pincodeerror";
                if (field_value.length === 0 || field_value.length === 6) {
                    document.getElementById(errId).innerHTML = "";
                } else if (field_value.length < 6) {
                    document.getElementById(errId).innerHTML = "Pincode number should contain 6 digits.";
                }
            }

            // Blood Group
            if (field_name === "bloodgroup") {
                if (field_value === "") {
                    document.getElementById("bloodgrouperror").innerHTML = "Please select blood group.";
                } else {
                    document.getElementById("bloodgrouperror").innerHTML = "";
                }
            }
            // ---------- RADIO & DROPDOWNS (MANDATORY) ----------

            // Gender (radio)
            if (field_name === "gender") {
                const selected = document.querySelector('input[name="gender"]:checked');
                document.getElementById("gendererror").innerHTML =
                    selected ? "" : "Please select gender.";
            }

            // Married (radio)
            if (field_name === "married") {
                const selected = document.querySelector('input[name="married"]:checked');
                document.getElementById("marriederror").innerHTML =
                    selected ? "" : "Please select Married status.";
            }

            // Native State / District / Taluk / Panchayat
            if (field_name === "state") {
                document.getElementById("stateerror").innerHTML =
                    field_value === "" ? "Please choose state." : "";
            }

            if (field_name === "district") {
                document.getElementById("districterror").innerHTML =
                    field_value === "" ? "Please choose district." : "";
            }

            if (field_name === "taluk") {
                document.getElementById("talukerror").innerHTML =
                    field_value === "" ? "Please choose taluk." : "";
            }

            if (field_name === "panchayat") {
                document.getElementById("panchayaterror").innerHTML =
                    field_value === "" ? "Please choose panchayat." : "";
            }

            // ===== CURRENT ADDRESS (LIVE) =====
            const curType = getCurrentAddressType();

            // India current fields only when type === 'India'
            if (curType === 'India') {
                if (field_name === "cur_state") {
                    document.getElementById("cur_stateerror").innerHTML =
                        field_value === "" ? "Please choose current state." : "";
                }

                if (field_name === "cur_district") {
                    document.getElementById("cur_districterror").innerHTML =
                        field_value === "" ? "Please choose current district." : "";
                }

                if (field_name === "cur_taluk") {
                    document.getElementById("cur_talukerror").innerHTML =
                        field_value === "" ? "Please choose current taluk." : "";
                }

                if (field_name === "cur_panchayat") {
                    document.getElementById("cur_panchayaterror").innerHTML =
                        field_value === "" ? "Please choose current panchayat." : "";
                }

                if (field_name === "cur_village" || field_name === "cur_street") {
                    if (field_value !== "" && !alphanumericregex.test(field_value)) {
                        field.nextElementSibling.innerHTML = "Only letters,numbers,spaces are allowed.";
                    } else if (field_value === "") {
                        field.nextElementSibling.innerHTML = "This field is required.";
                    } else {
                        field.nextElementSibling.innerHTML = "";
                    }
                }

                if (field_name === "cur_doorno") {
                    if (field_value === "") {
                        field.nextElementSibling.innerHTML = "Please fill current door no.";
                    } else if (!alphanumericregex.test(field_value)) {
                        field.nextElementSibling.innerHTML = "Don't use special characters.";
                    } else {
                        field.nextElementSibling.innerHTML = "";
                    }
                }

                if (field_name === "cur_pincode") {
                    if (field_value.length === 0 || field_value.length === 6) {
                        document.getElementById("cur_pincodeerror").innerHTML = "";
                    } else if (field_value.length < 6) {
                        document.getElementById("cur_pincodeerror").innerHTML =
                            "Pincode number should contain 6 digits.";
                    }
                }
            }

            // NRI current fields only when type === 'NRI'
            if (curType === 'NRI') {
                if (field_name === "cur_nri_country") {
                    document.getElementById("cur_nri_countryerror").innerHTML =
                        field_value === "" ? "Please select country." : "";
                }

                if (field_name === "cur_nri_state") {
                    document.getElementById("cur_nri_stateerror").innerHTML =
                        field_value === "" ? "Please fill state / province / region." : "";
                }
                if (field_name === "cur_nri_city") {
                    document.getElementById("cur_nri_cityerror").innerHTML =
                        field_value === "" ? "Please fill city / town." : "";
                }
                if (field_name === "cur_nri_zip") {
                    document.getElementById("cur_nri_ziperror").innerHTML =
                        field_value === "" ? "Please fill zip / postal code." : "";
                }
                if (field_name === "cur_nri_fulladdress") {
                    document.getElementById("cur_nri_fulladdresserror").innerHTML =
                        field_value === "" ? "Please fill full address." : "";
                }
            }


            // WhatsApp number
            if (field_name === "whatsappno") {
                if (field_value.length === 0 || field_value.length === 10) {
                    document.getElementById("whatsappnoerror").innerHTML = "";
                } else if (field_value.length < 10) {
                    document.getElementById("whatsappnoerror").innerHTML =
                        "WhatsApp number should contain 10 digits.";
                }
            }

            // Date Of Birth
            if (field_name === "dob") {
                if (field_value === "") {
                    document.getElementById("doberror").innerHTML = "Please choose date of birth.";
                } else {
                    document.getElementById("doberror").innerHTML = "";
                }
            }


            // Profession (mandatory, live validation)
            if (field_name === "profession") {
                document.getElementById("professionerror").innerHTML =
                    field_value === "" ? "Please select profession." : "";
            }

            // Relationship (mandatory, live validation)
            if (field_name === "relationship") {
                document.getElementById("relationshiperror").innerHTML =
                    field_value === "" ? "Please select relationship." : "";
            }




        }

        function validateMemberform() {
            const f = document.forms['memberregistration'];
            let firstInvalid = null;

            // clear only error messages
            document.querySelectorAll('small.text-danger').forEach(el => el.innerHTML = '');
            document.querySelectorAll('.selfimage, .aadharfrontimage, .aadharbackimage, .communitycertificate')
                .forEach(el => el.textContent = '');

            const setErr = (id, msg, el) => {
                document.getElementById(id).innerHTML = msg;
                if (!firstInvalid && el) firstInvalid = el;
            };

            // ===== BASIC DETAILS =====

            // Name *
            const relationship = f.relationship.value.trim();
            if (!relationship) setErr('relationshiperror', 'Please select relationship.', document.getElementById('relationshipfield'));

            // Name *
            const name = f.name.value.trim();
            const nameRegex = /^([A-Za-z\s]{3,})+$/;
            if (!name) setErr('nameerror', 'Please fill this field.', document.getElementById('namefield'));
            else if (!nameRegex.test(name))
                setErr('nameerror', 'Min 3 letters required. Only letters and spaces allowed.', document.getElementById('namefield'));

            // Phone Number *
            const phoneno = f.phoneno.value.trim();
            if (!phoneno)
                setErr('phonenoerror', 'Please fill phone no field.', document.getElementById('phonenofield'));
            else if (phoneno.length !== 10)
                setErr('phonenoerror', 'Phone number should contain 10 digits.', document.getElementById('phonenofield'));

            // Aadhar Number *
            const aadharno = f.aadharno.value.trim();
            if (!aadharno)
                setErr('aadharnoerror', 'Please fill aadhar no field.', document.getElementById('aadharnofield'));
            else if (aadharno.length !== 12)
                setErr('aadharnoerror', 'Aadhar number should contain 12 digits.', document.getElementById('aadharnofield'));

            // Date Of Birth *
            const dob = f.dob.value.trim();
            if (!dob)
                setErr('doberror', 'Please choose date of birth.', document.getElementById('dobfield'));

            // Gender *
            const gender = document.querySelector('input[name="gender"]:checked');
            if (!gender)
                setErr('gendererror', 'Please select gender.', document.getElementById('gender_male'));

            // Blood Group *
            const bloodgroup = f.bloodgroup.value;
            if (!bloodgroup)
                setErr('bloodgrouperror', 'Please select blood group.', document.getElementById('bloodgroupfield'));

            // WhatsApp Number *
            const whatsappno = f.whatsappno.value.trim();
            if (!whatsappno)
                setErr('whatsappnoerror', 'Please fill WhatsApp number.', document.getElementById('whatsappnofield'));
            else if (whatsappno.length !== 10)
                setErr('whatsappnoerror', 'WhatsApp number should contain 10 digits.', document.getElementById('whatsappnofield'));

            // Valuvu *
            const valu = f.valuvu.value.trim();
            if (!valu)
                setErr('valuvuerror', 'Please fill Valuvu field.', document.getElementById('valuvufield'));

            // Thottam *
            const thottam = f.thottam.value.trim();
            if (!thottam)
                setErr('thottamerror', 'Please fill Thottam field.', document.getElementById('thottamfield'));

            // Kulam * (readonly)
            const kulam = f.kulam.value.trim();
            if (!kulam)
                setErr('kulamerror', 'Kulam is required.', document.getElementById('kulamfield'));

            // Email *  ✅ NEW
            const email = f.email.value.trim();
            // const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!email)
                setErr('emailerror', 'Email is mandatory.', document.getElementById('emailfield'));


            // Married * ✅ NEW
            const married = document.querySelector('input[name="married"]:checked');
            if (!married)
                setErr('marriederror', 'Please select Married status.', document.getElementById('married_yes'));

            // ===== NATIVE ADDRESS =====
            const state = f.state.value.trim();
            if (!state)
                setErr('stateerror', 'Please choose state.', document.getElementById('states-dropdown'));

            const district = f.district.value.trim();
            if (!district)
                setErr('districterror', 'Please choose district.', document.getElementById('districts-dropdown'));

            const taluk = f.taluk.value.trim();
            if (!taluk)
                setErr('talukerror', 'Please choose taluk.', document.getElementById('taluks-dropdown'));

            const panchayat = f.panchayat.value.trim();
            if (!panchayat)
                setErr('panchayaterror', 'Please choose panchayat.', document.getElementById('panchayat-dropdown'));

            const village = f.village.value.trim();
            if (!village)
                setErr('villageerror', 'Please fill village field.', document.getElementById('villagefield'));

            const street = f.street.value.trim();
            if (!street)
                setErr('streeterror', 'Please fill street field.', document.getElementById('streetfield'));

            const doorno = f.doorno.value.trim();
            if (!doorno)
                setErr('doornoerror', 'Please fill door no/apartment no field.', document.getElementById('doornofield'));

            const pincode = f.pincode.value.trim();
            if (!pincode)
                setErr('pincodeerror', 'Please fill pincode field.', document.getElementById('pincodefield'));
            else if (pincode.length !== 6)
                setErr('pincodeerror', 'Pincode should contain 6 digits.', document.getElementById('pincodefield'));

            // ===== CURRENT ADDRESS =====
            // ===== CURRENT ADDRESS (SUBMIT) =====
            const curType = getCurrentAddressType();
            if (!curType) {
                setErr('cur_address_type_error', 'Please select current address type.', document.getElementById('cur_address_india'));
            }

            // India mandatory only if India selected
            if (curType === 'India') {
                const cur_state = f.cur_state.value.trim();
                if (!cur_state)
                    setErr('cur_stateerror', 'Please choose current state.', document.getElementById('cur_states_dropdown'));

                const cur_district = f.cur_district.value.trim();
                if (!cur_district)
                    setErr('cur_districterror', 'Please choose current district.', document.getElementById('cur_districts_dropdown'));

                const cur_taluk = f.cur_taluk.value.trim();
                if (!cur_taluk)
                    setErr('cur_talukerror', 'Please choose current taluk.', document.getElementById('cur_taluks_dropdown'));

                const cur_panchayat = f.cur_panchayat.value.trim();
                if (!cur_panchayat)
                    setErr('cur_panchayaterror', 'Please choose current panchayat.', document.getElementById('cur_panchayat_dropdown'));

                const cur_village = f.cur_village.value.trim();
                if (!cur_village)
                    setErr('cur_villageerror', 'Please fill current village.', document.getElementById('cur_villagefield'));

                const cur_street = f.cur_street.value.trim();
                if (!cur_street)
                    setErr('cur_streeterror', 'Please fill current street.', document.getElementById('cur_streetfield'));

                const cur_doorno = f.cur_doorno.value.trim();
                if (!cur_doorno)
                    setErr('cur_doornoerror', 'Please fill current door no.', document.getElementById('cur_doornofield'));

                const cur_pincode = f.cur_pincode.value.trim();
                if (!cur_pincode)
                    setErr('cur_pincodeerror', 'Please fill current pincode.', document.getElementById('cur_pincodefield'));
                else if (cur_pincode.length !== 6)
                    setErr('cur_pincodeerror', 'Pincode should contain 6 digits.', document.getElementById('cur_pincodefield'));
            }

            // NRI mandatory only if NRI selected
            if (curType === 'NRI') {
                const cur_nri_country = f.cur_nri_country.value.trim();
                if (!cur_nri_country)
                    setErr('cur_nri_countryerror', 'Please select country.', document.getElementById('cur_nri_country'));

                const cur_nri_state = f.cur_nri_state.value.trim();
                if (!cur_nri_state)
                    setErr('cur_nri_stateerror', 'Please fill state / province / region.', document.getElementById('cur_nri_state'));

                const cur_nri_city = f.cur_nri_city.value.trim();
                if (!cur_nri_city)
                    setErr('cur_nri_cityerror', 'Please fill city / town.', document.getElementById('cur_nri_city'));

                const cur_nri_zip = f.cur_nri_zip.value.trim();
                if (!cur_nri_zip)
                    setErr('cur_nri_ziperror', 'Please fill zip / postal code.', document.getElementById('cur_nri_zip'));

                const cur_nri_fulladdress = f.cur_nri_fulladdress.value.trim();
                if (!cur_nri_fulladdress)
                    setErr('cur_nri_fulladdresserror', 'Please fill full address.', document.getElementById('cur_nri_fulladdress'));
            }


            // ===== DOCUMENTS =====
            const selfimage = f.selfimage.value.trim();
            if (!selfimage) {
                document.querySelector('.selfimage').textContent = 'Please upload Passport size photo.';
                if (!firstInvalid) firstInvalid = document.getElementById('passportphoto');
            }

            const aadharfrontimage = f.aadharfrontimage.value.trim();
            if (!aadharfrontimage) {
                document.querySelector('.aadharfrontimage').textContent = 'Please upload front aadhar card photo.';
                if (!firstInvalid) firstInvalid = document.querySelector('input[name="aadharfrontimage"]');
            }

            const aadharbackimage = f.aadharbackimage.value.trim();
            if (!aadharbackimage) {
                document.querySelector('.aadharbackimage').textContent = 'Please upload back aadhar card photo.';
                if (!firstInvalid) firstInvalid = document.querySelector('input[name="aadharbackimage"]');
            }

            const communitycertificate = f.communitycertificate.value.trim();
            if (!communitycertificate) {
                document.querySelector('.communitycertificate').textContent = 'Please upload community certificate.';
                if (!firstInvalid) firstInvalid = document.querySelector('input[name="communitycertificate"]');
            }

            // Education (tag style) - mandatory
            const educationCount = selectedEducations.length;
            if (educationCount === 0) {
                setErr(
                    'educationerror',
                    'Please add at least one education.',
                    document.getElementById('education_input')
                );
            }

            // Profession * (mandatory)
            const profession = f.profession ? f.profession.value.trim() : "";
            if (!profession) {
                setErr(
                    'professionerror',
                    'Please select profession.',
                    document.getElementById('professionfield')
                );
            }



            // scroll to first invalid
            if (firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstInvalid.focus();
                return false;
            }
            return true;
        }


        function getCurrentAddressType() {
            const selected = document.querySelector('input[name="cur_address_type"]:checked');
            return selected ? selected.value : null;   // 'India' or 'NRI' or null
        }


        function uploadFile(file) {
            let imageid = file.name;
            let imageclass = file.name;
            let errorbox = document.querySelector(`.${imageclass}`);
            let imagesize = 2000000;
            let uploadedimagesize = file.files[0].size;

            if (uploadedimagesize > imagesize) {
                errorbox.textContent = "Image size should below 2MB";
                file.value = "";
                return false;
            }
            else {
                errorbox.textContent = "";
            }

            let imgurl = URL.createObjectURL(file.files[0]);
            let image = document.getElementById(imageid);
            image.style.display = "block";
            image.src = imgurl;
            image.nextElementSibling.innerHTML =
                `<button class='ps-img-btn mt-2 rounded' type='button' onclick='removeImage(this,${file.name})'>Remove</button>`;
        }

        function removeImage(button, file) {
            let imageid = file.name;
            console.log(file.name);
            document.getElementById(imageid).style.display = "none";
            button.style.display = "none";
            file.value = "";
        }

        function activateButton(checkbox) {
            let checked = checkbox.checked;
            let submitbutton = document.getElementById("submitbutton");
            if (checked) {
                submitbutton.removeAttribute("disabled");
            }
            else {
                submitbutton.setAttribute("disabled", "disabled");
            }
        }
        function copyPhoneToWhatsapp() {
            const phoneField = document.getElementById("phonenofield");
            const whatsappField = document.getElementById("whatsappnofield");

            whatsappField.value = phoneField.value;          // copy number
            validateInputfield(whatsappField);               // live validation run panna

            if (whatsappField.value.trim().length === 10) {  // safety clear
                document.getElementById("whatsappnoerror").innerHTML = "";
            }
        }


        function copyNativeAddress() {
            // Native fields
            const n_state = document.getElementById("states-dropdown");
            const n_district = document.getElementById("districts-dropdown");
            const n_taluk = document.getElementById("taluks-dropdown");
            const n_panchayat = document.getElementById("panchayat-dropdown");
            const n_village = document.getElementById("villagefield");
            const n_street = document.getElementById("streetfield");
            const n_doorno = document.getElementById("doornofield");
            const n_pincode = document.getElementById("pincodefield");

            // Current fields
            const c_state = document.getElementById("cur_states_dropdown");
            const c_district = document.getElementById("cur_districts_dropdown");
            const c_taluk = document.getElementById("cur_taluks_dropdown");
            const c_panchayat = document.getElementById("cur_panchayat_dropdown");
            const c_village = document.getElementById("cur_villagefield");
            const c_street = document.getElementById("cur_streetfield");
            const c_doorno = document.getElementById("cur_doornofield");
            const c_pincode = document.getElementById("cur_pincodefield");

            // Copy simple text fields
            c_street.value = n_street.value;
            c_doorno.value = n_doorno.value;
            c_pincode.value = n_pincode.value;

            // Copy state, then load and choose district/taluk/panchayat through AJAX

            // 1. State
            c_state.value = n_state.value;
            validateInputfield(c_state);  // clear state error

            // 2. District (needs AJAX fill for current dropdown)
            $.ajax({
                type: "get",
                url: "<?= base_url('members/getDistrictsfordropdown') ?>",
                data: { state_id: n_state.value },
                success: function (result) {
                    c_district.innerHTML = result;
                    c_district.value = n_district.value;
                    validateInputfield(c_district); // clear district error

                    // 3. Taluk
                    $.ajax({
                        type: "get",
                        url: "<?= base_url('members/getTaluksfordropdown') ?>",
                        data: { district_name: n_district.value },
                        success: function (resultTaluk) {
                            c_taluk.innerHTML = resultTaluk;
                            c_taluk.value = n_taluk.value;
                            validateInputfield(c_taluk); // clear taluk error

                            // 4. Panchayat
                            $.ajax({
                                type: "get",
                                url: "<?= base_url('members/getPanchayatsfordropdown') ?>",
                                data: { taluk_name: n_taluk.value },
                                success: function (resultPanchayat) {
                                    c_panchayat.innerHTML = resultPanchayat;
                                    c_panchayat.value = n_panchayat.value;
                                    validateInputfield(c_panchayat); // clear panchayat error
                                    
                                    // 5. Village
                                    let vName = n_village.value;
                                    if(vName === 'Others') {
                                        vName = document.getElementById('village_others_input_family').value;
                                    }
                                    setDropdownVillageCurrent(c_panchayat, vName);
                                    validateInputfield(c_village);
                                },
                                error: function () {
                                    // keep old options if error
                                }
                            });
                        },
                        error: function () {
                            // keep old options if error
                        }
                    });
                },
                error: function () {
                    // keep old options if error
                }
            });

            // Validate copied text fields also (to hide errors)
            validateInputfield(c_village);
            validateInputfield(c_street);
            validateInputfield(c_doorno);
            validateInputfield(c_pincode);
        }

        let selectedEducations = [];

        function filterEducationOptions(input) {
            const query = input.value.toLowerCase().trim();
            const dropdown = document.getElementById("education_dropdown");
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

        // click handlers for suggestion options
        document.querySelectorAll(".education-option").forEach(opt => {
            opt.addEventListener("click", function () {
                const value = this.getAttribute("data-value");

                // avoid duplicate
                if (!selectedEducations.includes(value)) {
                    selectedEducations.push(value);
                    renderEducationTags();
                    renderEducationHiddenInputs();

                    // education valid aana error clear
                    document.getElementById("educationerror").innerHTML = "";
                }

                // clear input & hide dropdown
                const input = document.getElementById("education_input");
                input.value = "";
                document.getElementById("education_dropdown").style.display = "none";
            });
        });

        function renderEducationTags() {
            const container = document.getElementById("education_tags");
            container.innerHTML = "";

            selectedEducations.forEach(val => {
                const badge = document.createElement("span");
                badge.className = "badge bg-primary d-inline-flex align-items-center";
                badge.style.fontSize = "0.8rem";
                badge.textContent = val + " ";

                const closeBtn = document.createElement("span");
                closeBtn.innerHTML = "×";
                closeBtn.style.cursor = "pointer";
                closeBtn.onclick = function () {
                    selectedEducations = selectedEducations.filter(v => v !== val);
                    renderEducationTags();
                    renderEducationHiddenInputs();
                    // if everything removed, error show only on submit
                };

                badge.appendChild(closeBtn);
                container.appendChild(badge);
            });
        }

        function renderEducationHiddenInputs() {
            const hiddenContainer = document.getElementById("education_hidden_container");
            hiddenContainer.innerHTML = "";
            selectedEducations.forEach(val => {
                const input = document.createElement("input");
                input.type = "hidden";
                input.name = "education[]";
                input.value = val;
                hiddenContainer.appendChild(input);
            });
        }

        function clearCurrentIndiaAddress() {
            $('#cur_states_dropdown').val('');
            $('#cur_districts_dropdown').html('<option value="">Select District</option>');
            $('#cur_taluks_dropdown').html('<option value="">Select Taluk</option>');
            $('#cur_panchayat_dropdown').html('<option value="">Select Panchayat</option>');

            $('#cur_villagefield').val('');
            $('#cur_streetfield').val('');
            $('#cur_doornofield').val('');
            $('#cur_pincodefield').val('');

            $('#cur_stateerror, #cur_districterror, #cur_talukerror, #cur_panchayaterror,' +
                '#cur_villageerror, #cur_streeterror, #cur_doornoerror, #cur_pincodeerror').html('');
        }

        function clearCurrentNriAddress() {
            $('#cur_nri_country').val('');
            $('#cur_nri_state').val('');
            $('#cur_nri_city').val('');
            $('#cur_nri_zip').val('');
            $('#cur_nri_fulladdress').val('');

            $('#cur_nri_countryerror, #cur_nri_stateerror, #cur_nri_cityerror,' +
                '#cur_nri_ziperror, #cur_nri_fulladdresserror').html('');
        }

        function toggleCurrentAddressType() {
            const indiaBlock = document.getElementById('cur_india_block');
            const nriBlock = document.getElementById('cur_nri_block');
            const sameBtn = document.getElementById('btn_same_as_native');

            const selected = document.querySelector('input[name="cur_address_type"]:checked');

            if (!selected) {
                if (indiaBlock) indiaBlock.style.display = 'none';
                if (nriBlock) nriBlock.style.display = 'none';
                if (sameBtn) {
                    sameBtn.disabled = true;
                    sameBtn.classList.add('disabled');
                }
                return;
            }

            // Clear error when selected
            document.getElementById('cur_address_type_error').innerHTML = '';

            if (selected.value === 'India') {
                if (indiaBlock) indiaBlock.style.display = 'block';
                if (nriBlock) nriBlock.style.display = 'none';

                if (sameBtn) {
                    sameBtn.disabled = false;
                    sameBtn.classList.remove('disabled');
                }

                // NRI la type panninadhellam clear
                clearCurrentNriAddress();

            } else if (selected.value === 'NRI') {
                if (indiaBlock) indiaBlock.style.display = 'none';
                if (nriBlock) nriBlock.style.display = 'block';

                if (sameBtn) {
                    sameBtn.disabled = true;
                    sameBtn.classList.add('disabled');
                }

                // India la type panninadhellam clear
                clearCurrentIndiaAddress();
            }
        }

        function handleProfessionChange(selectEl) {
            var extraDiv = document.getElementById('business-extra-wrapper');
            if (!extraDiv) return;

            if (selectEl.value === 'Others') {
                extraDiv.style.display = 'block';
            } else {
                extraDiv.style.display = 'none';
                // optional: clear values when hide
                document.getElementById('business_name').value = '';
                document.getElementById('business_website').value = '';
                document.getElementById('business_name_error').innerHTML = '';
                document.getElementById('business_website_error').innerHTML = '';
            }
        }




        let countriesData = null;



        $(document).ready(function () {
            // Try multiple paths
            loadCountriesData();

            // Initially populate if already selected
            const p1 = document.getElementById('panchayat-dropdown');
            if(p1 && p1.value) setDropdownVillage(p1, '<?= isset($member)?$member->Village:'' ?>');
        });



        function setDropdownVillage(panchayatEl, selectedVillage = null) {
            const panchayat_name = panchayatEl.value;
            const villageSelect = document.getElementById('villagefield');

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
                    toggleVillageOthersFamily(villageSelect, selectedVillage);
                },
                error: function() {
                    villageSelect.innerHTML = '<option value="">Select Village</option><option value="Others">Others</option>';
                    toggleVillageOthersFamily(villageSelect);
                }
            });
        }

        function toggleVillageOthersFamily(selectEl, manualValue = '') {
            const othersInput = document.getElementById('village_others_input_family');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                othersInput.setAttribute('required', 'required');
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'village');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.removeAttribute('required');
                othersInput.value = '';
                othersInput.setAttribute('name', 'village_others');
                selectEl.setAttribute('name', 'village'); 
            }
        }

        function setDropdownVillageCurrent(panchayatEl, selectedVillage = null) {
            const panchayat_name = panchayatEl.value;
            const villageSelect = document.getElementById('cur_villagefield');

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
                    toggleVillageOthersCurrentFamily(villageSelect, selectedVillage);
                },
                error: function() {
                    villageSelect.innerHTML = '<option value="">Select Village</option><option value="Others">Others</option>';
                    toggleVillageOthersCurrentFamily(villageSelect); 
                }
            });
        }

        function toggleVillageOthersCurrentFamily(selectEl, manualValue = '') {
            const othersInput = document.getElementById('cur_village_others_input_family');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                othersInput.setAttribute('required', 'required');
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'cur_village');
                if (manualValue && !othersInput.value) othersInput.value = manualValue;
            } else {
                othersInput.style.display = 'none';
                othersInput.removeAttribute('required');
                othersInput.value = '';
                othersInput.setAttribute('name', 'cur_village_others');
                selectEl.setAttribute('name', 'cur_village'); 
            }
        }

        function loadCountriesData() {
            const paths = [
                'assets/countries_states_cities.json',
                './assets/countries_states_cities.json',
                '../assets/countries_states_cities.json'
            ];

            function tryNextPath(index) {
                if (index >= paths.length) {
                    console.error('All paths failed');
                    return;
                }

                $.ajax({
                    url: paths[index],
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log('Loaded from:', paths[index]);
                        countriesData = data;
                        populateNRICountries();
                    },
                    error: function () {
                        console.log('Failed:', paths[index]);
                        tryNextPath(index + 1); // Try next path
                    }
                });
            }

            tryNextPath(0);
        }

        function populateNRICountries() {
            const countrySelect = document.getElementById('cur_nri_country');
            const countryCodeSelect = document.getElementById('cur_nri_countrycode');

            if (!countriesData || !countrySelect || !countryCodeSelect) return;

            countrySelect.innerHTML = '<option value="">Select Country</option>';
            countryCodeSelect.innerHTML = '<option value="">Select Code</option>';

            Object.values(countriesData).forEach(country => {
                const option = document.createElement('option');
                option.value = country.name;
                option.textContent = country.name;
                countrySelect.appendChild(option);

                if (country.iso2) {
                    const codeOption = document.createElement('option');
                    codeOption.value = country.iso2;
                    codeOption.textContent = `${country.iso2} - ${country.name}`;
                    countryCodeSelect.appendChild(codeOption);
                }
            });
        }

        function loadNRIStates(countryName) {
            const stateSelect = document.getElementById('cur_nri_state');
            const citySelect = document.getElementById('cur_nri_city');

            if (!stateSelect || !citySelect) return;

            stateSelect.innerHTML = '<option value="">Select State</option>';
            citySelect.innerHTML = '<option value="">Select City</option>';

            if (!countryName || !countriesData) return;

            const countryData = Object.values(countriesData).find(c => c.name === countryName);
            if (countryData && countryData.states) {
                countryData.states.forEach(state => {
                    const option = document.createElement('option');
                    option.value = state.name;
                    option.textContent = state.name;
                    stateSelect.appendChild(option);
                });
            }
        }

        function loadNRICities(stateName) {
            const citySelect = document.getElementById('cur_nri_city');
            const countrySelect = document.getElementById('cur_nri_country');

            if (!citySelect) return;

            citySelect.innerHTML = '<option value="">Select City</option>';

            if (!stateName || !countrySelect.value || !countriesData) return;

            const countryData = Object.values(countriesData).find(c => c.name === countrySelect.value);
            if (countryData && countryData.states) {
                const stateData = countryData.states.find(s => s.name === stateName);
                if (stateData && stateData.cities) {
                    stateData.cities.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.name;
                        option.textContent = city.name;
                        citySelect.appendChild(option);
                    });
                }
            }
        }

        function syncNRICountryCode(countryName) {
            if (!countryName || !countriesData) return;

            const countryData = Object.values(countriesData).find(c => c.name === countryName);
            if (countryData) {
                document.getElementById('cur_nri_phonecode').value = countryData.phonecode ? `+${countryData.phonecode}` : '';
                document.getElementById('cur_nri_countrycode').value = countryData.iso2 || '';
            }
        }

        $(document).ready(function () {
            $('#kulamfield').select2({
                placeholder: "Search and select Kulam...",
                allowClear: true,
                width: '100%'
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
