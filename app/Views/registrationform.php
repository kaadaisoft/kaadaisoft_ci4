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
        .btn-copy-address {
            background: linear-gradient(135deg, #1A237E 0%, #3949AB 100%);
            color: white !important;
            border: none;
            border-radius: 50px;
            padding: 8px 18px;
            font-weight: 700;
            font-size: 0.85rem;
            box-shadow: 0 4px 12px rgba(26, 35, 126, 0.2);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .btn-copy-address:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 6px 15px rgba(26, 35, 126, 0.3);
            filter: brightness(1.1);
        }
        .btn-copy-address:active {
            transform: translateY(0) scale(0.98);
        }
        .btn-copy-address:disabled {
            background: #cbd5e1;
            color: #94a3b8 !important;
            box-shadow: none;
            cursor: not-allowed;
            transform: none !important;
        }
        .btn-copy-address i {
            font-size: 1rem;
        }
    </style>

</head>

<body>

    <div class="login-image">
        <img src="<?= base_url('assets/ewaran kovil 1.jpg') ?>" alt="Kaadaisoft Temple">
    </div>

    <div class="container py-4">
        <!---------------------register-status-modal---------------------->
        <style>
            .status-modal-content {
                border-radius: 24px;
                border: none;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            }
            .success-gradient { background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%); }
            .error-gradient { background: linear-gradient(135deg, #ef5350 0%, #e53935 100%); }
            .success-text { color: #2e7d32; }
            .error-text { color: #c62828; }
            .success-btn { background: linear-gradient(135deg, #43a047 0%, #388e3c 100%); }
            .error-btn { background: linear-gradient(135deg, #e53935 0%, #d32f2f 100%); }
            .status-icon-wrapper {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 2rem;
                transition: transform 0.3s ease;
            }
            .status-icon-wrapper:hover { transform: scale(1.1); }
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-up { animation: fadeInUp 0.5s ease-out forwards; }
        </style>

        <style>
            /* Flowbite-style file input */
            .ps-file-upload-wrapper {
                position: relative;
            }
            .ps-file-upload-wrapper input[type="file"] {
                display: none;
            }
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
            .ps-file-upload-btn:hover {
                background-color: #e9ecef;
                border-color: #86b7fe;
            }
            .ps-file-upload-btn .ps-file-icon {
                flex-shrink: 0;
                font-size: 15px;
                color: #495057;
            }
            .ps-file-upload-btn .ps-file-label {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                flex: 1;
            }
            .ps-file-upload-btn.file-selected {
                border-color: #0d6efd;
                background-color: #e7f1ff;
                color: #0a3d91;
                font-weight: 500;
            }
        </style>

        <div id="registerstatusmodal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content status-modal-content">
                    <div class="modal-body p-5 text-center">
                        <div id="status-icon-bg" class="status-icon-wrapper shadow-lg">
                            <i id="status-icon" class="bi" style="font-size: 3.5rem; color: white;"></i>
                        </div>
                        <h2 id="status-title" class="fw-bold mb-3 animate-up" style="animation-delay: 0.1s;"></h2>
                        <div id="memberregisterstatus" class="fs-5 text-muted mb-4 animate-up" style="animation-delay: 0.2s; font-weight: 500; line-height: 1.6;"></div>
                        <button type="button" id="status-btn" class="btn btn-lg px-5 py-3 rounded-pill fw-bold text-white shadow transition-all animate-up" 
                                style="animation-delay: 0.3s; min-width: 200px; border: none;" data-bs-dismiss="modal">
                            Continue
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($_SESSION["registerprocesssuccess"])):
            $status = $_SESSION['registerprocesssuccess']; ?>
            <script>
                window.onload = function () {
                    const iconBg = document.getElementById('status-icon-bg');
                    const icon = document.getElementById('status-icon');
                    const title = document.getElementById('status-title');
                    const btn = document.getElementById('status-btn');
                    const msg = document.getElementById('memberregisterstatus');

                    iconBg.classList.add('success-gradient');
                    icon.className = 'bi bi-check-lg';
                    title.innerText = 'Application Submitted!';
                    title.classList.add('success-text');
                    btn.classList.add('success-btn');
                    btn.innerText = 'Great, Thank you!';
                    msg.innerHTML = "<?php echo $status; ?>";

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
                window.onload = function () {
                    const iconBg = document.getElementById('status-icon-bg');
                    const icon = document.getElementById('status-icon');
                    const title = document.getElementById('status-title');
                    const btn = document.getElementById('status-btn');
                    const msg = document.getElementById('memberregisterstatus');

                    iconBg.classList.add('error-gradient');
                    icon.className = 'bi bi-exclamation-circle';
                    title.innerText = 'Oops! Something went wrong';
                    title.classList.add('error-text');
                    btn.classList.add('error-btn');
                    btn.innerText = 'Try Again';
                    msg.innerHTML = "<?php echo $status; ?>";

                    var myModal = new bootstrap.Modal(document.getElementById('registerstatusmodal'), {
                        backdrop: 'static',
                        keyboard: false
                    });
                    myModal.show();
                };
            </script>
            <?php unset($_SESSION["registerprocesserror"]); endif; ?>
        <!---------------------register-status-modal-end------------------>

        <div class="mx-auto" style="max-width: 1150px;">
            <div class="card shadow-lg border-0 rounded-3">

                <!-- Sticky header -->
                <div class="card-header bg-white border-0 py-3" style="z-index:10;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-secondary">
                            Kaadaikulam.org / Registration Form
                        </h4>
                        <button type="button" class="btn btn-light p-2 rounded-circle" aria-label="Exit form"
                            onclick="window.history.back();" style="box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                            <i class="bi bi-x-lg fs-5"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body bg-light">
                    <form name="memberregistration" id="registration-form" class="p-2"
                        onsubmit="return validateMemberform()" action="<?= base_url("registerMember"); ?>"
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
                                    <div class="col-md-4">
                                        <label for="namefield">Name <span class="text-danger">*</span></label>
                                        <input onkeyup="validateInputfield(this)" id="namefield"
                                            class="form-control form-control-sm" type="text" name="name">
                                        <small id="nameerror" class="text-danger"></small>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="phonenofield">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input id="phonenofield" class="form-control form-control-sm" type="number"
                                            name="phoneno" onkeyup="validateInputfield(this)"
                                            onkeypress="if (this.value.length >= 10) return false;">

                                        <small id="phonenoerror" class="text-danger"></small>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="aadharnofield">Aadhar Number <span
                                                class="text-danger">*</span></label>
                                        <input id="aadharnofield" onkeyup="validateInputfield(this)"
                                            onkeypress="if(this.value.length == 12) return false"
                                            class="form-control form-control-sm" type="number" name="aadharno">
                                        <small id="aadharnoerror" class="text-danger"></small>
                                    </div>
                                    <div class="col-md-4"> 
                                        <label for="familyidfield">
                                            Existing Family Id
                                            <small class="text-muted">Your father family id. if exist.</small>
                                        </label>
                                        <input id="familyidfield" onkeyup="validateInputfield(this)"
                                            class="form-control form-control-sm" type="text" name="existfamilyid">
                                        <small id="familyiderror" class="text-danger"></small>
                                    </div>

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
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="gender_other" name="gender" value="Other"
                                                onchange="validateInputfield(this)">
                                            <label class="form-check-label" for="gender_other">Other</label>
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
                                        <small id="bloodgrouperror" class="text-danger"></small>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-4">
                                        <label for="emailfield">Email <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-sm">
                                            <input id="emailfield" onkeyup="validateInputfield(this)"
                                                class="form-control form-control-sm" type="email" name="email">
                                            <button class="btn btn-outline-primary" type="button" id="verify_email_btn" onclick="sendEmailOTP()">Verify</button>
                                        </div>
                                        <small id="emailerror" class="text-danger"></small>
                                        
                                        <!-- OTP Verification Section -->
                                        <div id="otp_section" class="mt-2" style="display:none;">
                                            <div class="input-group input-group-sm">
                                                <input type="text" id="email_otp" class="form-control" placeholder="Enter OTP">
                                                <button class="btn btn-success" type="button" onclick="verifyEmailOTP()">Confirm OTP</button>
                                            </div>
                                            <small class="text-muted">OTP sent to your email. Valid for 10 mins.</small>
                                            <small id="otperror" class="text-danger d-block"></small>
                                        </div>
                                        
                                        <div id="email_verified_badge" class="mt-1 text-success fw-bold" style="display:none;">
                                            <i class="bi bi-check-circle-fill"></i> Verified
                                        </div>
                                    </div>

                                    <input type="hidden" id="is_email_verified" name="is_email_verified" value="0">


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
                                                onchange="validateInputfield(this)">
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
                                        <input id="kulamfield" class="form-control form-control-sm" type="text"
                                            name="kulam" value="Poondurai Kaadai" readonly>
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

                                    <!-- Education -->
                                    <div class="col-md-4">
                                        <label for="education_input">Education <span class="text-danger">*</span></label>
                                        
                                        <div class="border rounded p-1 bg-white d-flex flex-wrap align-items-center gap-1" id="education_wrapper" style="cursor: text; min-height: 38px;">
                                            <!-- Tags Container -->
                                            <div id="education_tags" class="d-flex flex-wrap gap-1"></div>

                                            <input type="text" id="education_input" 
                                                class="form-control form-control-sm border-0 bg-transparent shadow-none" 
                                                placeholder="Type or select education"
                                                onfocus="filterEducationOptions(this)"
                                                oninput="filterEducationOptions(this)"
                                                name="education_display"
                                                autocomplete="off"
                                                style="flex: 1; min-width: 120px;">
                                            <input type="hidden" id="educationfield" name="education">
                                        </div>

                                        <div class="border rounded mt-1 bg-white" id="education_dropdown"
                                            style="max-height:250px; overflow:auto; display:none; position:absolute; z-index:1001; width: calc(33.33% - 20px);">
                                            
                                            <div class="education-option" data-value="SSLC">SSLC</div>
                                            <div class="education-option" data-value="HSC">HSC</div>
                                            <div class="education-option" data-value="Diploma">Diploma</div>
                                            <div class="education-option" data-value="ITI">ITI</div>
                                            
                                            <!-- Bachelors -->
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

                                            <!-- Masters / Higher -->
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
                                        <div id="education_others_wrapper" style="display:none;" class="mt-2">
                                            <div class="input-group input-group-sm">
                                                <input type="text" id="education_others_input" 
                                                    class="form-control" 
                                                    placeholder="Enter education manually">
                                                <button class="btn btn-primary" type="button" onclick="addManualEducation()">Add</button>
                                            </div>
                                        </div>

                                        <small id="educationerror" class="text-danger"></small>
                                    </div>
                                    <!-- End Education -->

                                    <script>
                                        let selectedEducations = [];

                                        function renderEducationTags() {
                                            const container = document.getElementById('education_tags');
                                            container.innerHTML = '';
                                            selectedEducations.forEach(edu => {
                                                const tag = document.createElement('span');
                                                tag.className = 'badge bg-primary d-flex align-items-center ps-2 pe-2 py-1 gap-2';
                                                tag.style.fontSize = '0.85rem';
                                                tag.innerHTML = `<span>${edu}</span> <span style="cursor:pointer; font-weight:bold; font-size: 1rem; line-height: 1;" onclick="removeEducation('${edu}', event)">&times;</span>`;
                                                container.appendChild(tag);
                                             });
                                             document.getElementById('educationfield').value = selectedEducations.join(',');
                                             
                                             // Reset placeholder visibility
                                             const input = document.getElementById("education_input");
                                             if (selectedEducations.length > 0) {
                                                 input.placeholder = "";
                                             } else {
                                                 input.placeholder = "Type or select education";
                                             }

                                             // Validate
                                             const errorField = document.getElementById("educationerror");
                                            if (selectedEducations.length > 0) {
                                                errorField.innerHTML = "";
                                            }
                                        }

                                        function addEducation(edu) {
                                            if (!edu) return;
                                            if (!selectedEducations.includes(edu)) {
                                                selectedEducations.push(edu);
                                                renderEducationTags();
                                            }
                                            // Reset inputs
                                            document.getElementById('education_input').value = '';
                                            document.getElementById('education_dropdown').style.display = 'none';
                                            document.getElementById('education_others_wrapper').style.display = 'none';
                                            document.getElementById('education_others_input').value = '';
                                            document.getElementById('education_input').focus();
                                        }

                                        function removeEducation(edu, event) {
                                            if(event) event.stopPropagation();
                                            selectedEducations = selectedEducations.filter(e => e !== edu);
                                            renderEducationTags();
                                        }

                                        function addManualEducation() {
                                            const val = document.getElementById('education_others_input').value.trim();
                                            if (val) {
                                                addEducation(val);
                                            } else {
                                                alert("Please enter a value");
                                            }
                                        }

                                        // Education Dropdown Logic
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

                                        // Click handler for Education Options
                                        $(document).on("click", ".education-option", function() {
                                            const value = this.getAttribute("data-value");
                                            const text = this.textContent;
                                            
                                            if(value === 'Others') {
                                                document.getElementById('education_others_wrapper').style.display = 'block';
                                                document.getElementById('education_others_input').focus();
                                                document.getElementById("education_dropdown").style.display = "none";
                                                document.getElementById('education_input').value = ''; 
                                            } else {
                                                addEducation(text);
                                            }
                                        });

                                        // Show dropdown on focus
                                        $("#education_input").on("focus", function() {
                                            filterEducationOptions(this);
                                        });
                                        
                                        // Wrapper click focuses input
                                        document.getElementById("education_wrapper").addEventListener("click", function(e) {
                                           if(e.target.id === 'education_wrapper' || e.target.id === 'education_input' || e.target.id === 'education_tags') {
                                                document.getElementById("education_input").focus();
                                           }
                                        });

                                        // Close dropdowns when clicking outside
                                        $(document).on("click", function(e) {
                                            if (!$(e.target).closest("#education_wrapper").length && !$(e.target).closest("#education_dropdown").length) {
                                                $("#education_dropdown").hide();
                                            }
                                        });
                                    </script>

                                        <!-- Profession (mandatory) -->
                                        <div class="col-md-4">
                                            <label for="profession_input">Profession <span class="text-danger">*</span></label>
                                            <div class="border rounded p-1 bg-white d-flex align-items-center" id="profession_wrapper" style="cursor: pointer; min-height: 38px;">
                                                <input type="text" id="profession_input" 
                                                    class="form-control form-control-sm border-0 bg-transparent shadow-none" 
                                                    placeholder="Type or click to select profession"
                                                    onfocus="filterProfessionOptions(this)"
                                                    oninput="filterProfessionOptions(this)"
                                                    readonly 
                                                    style="cursor: pointer; flex: 1;">
                                                <input type="hidden" id="professionfield" name="profession">
                                            </div>
                                            <div class="border rounded mt-1 bg-white" id="profession_dropdown" 
                                                style="max-height:250px; overflow:auto; display:none; position:absolute; z-index:1001; width: calc(33.33% - 20px);">
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
                                                    foreach($profession_map as $val => $text) {
                                                        echo "<div class='profession-option p-2 border-bottom' data-value='$val'>$text</div>";
                                                    }
                                                ?>
                                            </div>

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
                                        <div class="col-md-3" style="display: none;">
                                            <label for="states-dropdown">State <span
                                                    class="text-danger">*</span></label>
                                            <select id="states-dropdown"
                                                onchange="setDropdowndistricts(this); validateInputfield(this)"
                                                class="form-select form-select-sm" name="state">
                                                <option value=''>Select State</option>
                                                <?php if (isset($states)): ?>
                                                    <?php foreach ($states as $key => $state): ?>
                                                        <option value='<?= $state->state_id ?>' <?= (isset($state->state_title) && $state->state_title == "Tamil Nadu") ? 'selected' : '' ?>><?= $state->state_title ?>
                                                        </option>
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
                                            </select>
                                            <small id="districterror" class="text-danger"></small>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="taluks-dropdown">Taluk <span
                                                    class="text-danger">*</span></label>
                                            <select id="taluks-dropdown"
                                                onchange="toggleTalukOthers(this); setDropdownpanchayat(this); validateInputfield(this)"
                                                class="form-select form-select-sm" name="taluk">
                                                <option value="">Select Taluk</option>
                                            </select>
                                            <input type="text" id="taluk_others_input" name="taluk_others" 
                                                class="form-control form-control-sm mt-2" 
                                                placeholder="Enter taluk name" 
                                                style="display:none;" 
                                                onkeyup="validateInputfield(this)">
                                            <small id="talukerror" class="text-danger"></small>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="panchayat-dropdown">Panchayat <span
                                                    class="text-danger">*</span></label>
                                            <select id="panchayat-dropdown" onchange="togglePanchayatOthers(this); setDropdownVillage(this); validateInputfield(this)"
                                                class="form-select form-select-sm" name="panchayat">
                                                <option value="">Select Panchayat</option>
                                            </select>
                                            <input type="text" id="panchayat_others_input" name="panchayat_others" 
                                                class="form-control form-control-sm mt-2" 
                                                placeholder="Enter panchayat name" 
                                                style="display:none;" 
                                                onkeyup="validateInputfield(this)">
                                            <small id="panchayaterror" class="text-danger"></small>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="villagefield">Village Name <span
                                                    class="text-danger">*</span></label>
                                            <select id="villagefield" onchange="toggleVillageOthers(this); validateInputfield(this)"
                                                class="form-select form-select-sm" name="village">
                                                <option value="">Select Village</option>
                                            </select>
                                            <input type="text" id="village_others_input" name="village_others" 
                                                class="form-control form-control-sm mt-2" 
                                                placeholder="Enter village name" 
                                                style="display:none;" 
                                                onkeyup="validateInputfield(this)">
                                            <small id="villageerror" class="text-danger"></small>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="streetfield">Street Name <span
                                                    class="text-danger">*</span></label>
                                            <input id="streetfield" onkeyup="validateInputfield(this)"
                                                class="form-control form-control-sm" type="text" name="street">
                                            <small id="streeterror" class="text-danger"></small>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="doornofield">Door Number <span
                                                    class="text-danger">*</span></label>
                                            <input id="doornofield" onkeyup="validateInputfield(this)"
                                                class="form-control form-control-sm" type="text" name="doorno">
                                            <small id="doornoerror" class="text-danger"></small>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="pincodefield">Pin Code <span
                                                    class="text-danger">*</span></label>
                                            <input id="pincodefield" onkeyup="validateInputfield(this)"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)"
                                                class="form-control form-control-sm" type="text" inputmode="numeric" name="pincode" maxlength="6">
                                            <small id="pincodeerror" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Current Address -->
                            <div class="card mb-3 border-0">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h5 class="mb-0 section-title">
                                            <i class="bi bi-geo-alt text-success me-2"></i>Current Address
                                            <span class="text-danger">*</span>
                                        </h5>
                                    </div>

                                    <!-- India / NRI toggle -->
                                    <div class="mb-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
                                        <div>
                                            <label class="d-block mb-2">Current Address Type <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="cur_address_type"
                                                    id="cur_address_tn" value="TamilNadu"
                                                    onchange="toggleCurrentAddressType()">
                                                <label class="form-check-label" for="cur_address_tn">Tamil Nadu</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="cur_address_type"
                                                    id="cur_address_other_state" value="OtherState"
                                                    onchange="toggleCurrentAddressType()">
                                                <label class="form-check-label" for="cur_address_other_state">Other State</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="cur_address_type"
                                                    id="cur_address_nri" value="NRI" onchange="toggleCurrentAddressType()">
                                                <label class="form-check-label" for="cur_address_nri">NRI</label>
                                            </div>
                                            <small id="cur_address_type_error" class="text-danger d-block"></small>
                                        </div>

                                        <div id="same_as_native_container" style="display: none;">
                                            <button type="button" id="btn_same_as_native"
                                                class="btn-copy-address disabled" disabled
                                                onclick="copyNativeAddress()">
                                                <i class="bi bi-arrow-repeat"></i> Same as Native Address
                                            </button>
                                        </div>
                                    </div>

                                    <!-- INDIA CURRENT ADDRESS BLOCK -->
                                    <div id="cur_india_block" style="display:none;">
                                        <div class="row g-3">
                                            <!-- use your existing India current address fields -->
                                            <div class="col-md-3" id="cur_state_container" style="display: none;">
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
                                                    onchange="toggleTalukOthersCurrent(this); setDropdownpanchayatCurrent(this); validateInputfield(this)"
                                                    class="form-select form-select-sm" name="cur_taluk">
                                                    <option value="">Select Taluk</option>
                                                </select>
                                                <input type="text" id="cur_taluk_others_input" name="cur_taluk_others" 
                                                    class="form-control form-control-sm mt-2" 
                                                    placeholder="Enter taluk name" 
                                                    style="display:none;" 
                                                    onkeyup="validateInputfield(this)">
                                                <small id="cur_talukerror" class="text-danger"></small>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="cur_panchayat_dropdown">Panchayat <span
                                                        class="text-danger">*</span></label>
                                                <select id="cur_panchayat_dropdown" onchange="togglePanchayatOthersCurrent(this); setDropdownVillageCurrent(this); validateInputfield(this)"
                                                    class="form-select form-select-sm" name="cur_panchayat">
                                                    <option value="">Select Panchayat</option>
                                                </select>
                                                <input type="text" id="cur_panchayat_others_input" name="cur_panchayat_others" 
                                                    class="form-control form-control-sm mt-2" 
                                                    placeholder="Enter panchayat name" 
                                                    style="display:none;" 
                                                    onkeyup="validateInputfield(this)">
                                                <small id="cur_panchayaterror" class="text-danger"></small>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="cur_villagefield">Village Name <span
                                                        class="text-danger">*</span></label>
                                                <select id="cur_villagefield" onchange="toggleVillageOthersCurrent(this); validateInputfield(this)"
                                                    class="form-select form-select-sm" name="cur_village">
                                                    <option value="">Select Village</option>
                                                </select>
                                                <input type="text" id="cur_village_others_input" name="cur_village_others" 
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
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6)"
                                                    class="form-control form-control-sm" type="text" inputmode="numeric"
                                                    name="cur_pincode" maxlength="6">
                                                <small id="cur_pincodeerror" class="text-danger"></small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- NRI CURRENT ADDRESS BLOCK -->
                                    <div id="cur_nri_block" style="display:none;">
                                        <div class="row g-3" id="cur_nri_row">
                                            <div class="col-md-3" id="cur_nri_country_container">
                                                <label for="cur_nri_country">Country <span
                                                        class="text-danger">*</span></label>
                                                <select id="cur_nri_country" name="cur_nri_country"
                                                    class="form-select form-select-sm"
                                                    onchange="loadNRIStates(this.value); validateInputfield(this)">
                                                    <option value="">Select Country</option>
                                                </select>
                                                <small id="cur_nri_countryerror" class="text-danger"></small>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="cur_nri_state">State / Province / Region <span
                                                        class="text-danger">*</span></label>
                                                <select id="cur_nri_state" name="cur_nri_state"
                                                    class="form-select form-control-sm"
                                                    onchange="loadNRICities(this.value); validateInputfield(this)">
                                                    <option value="">Select State</option>
                                                </select>
                                                <small id="cur_nri_stateerror" class="text-danger"></small>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="cur_nri_city">City / Town <span
                                                        class="text-danger">*</span></label>
                                                <select id="cur_nri_city" name="cur_nri_city"
                                                    class="form-select form-control-sm"
                                                    onchange="validateInputfield(this)">
                                                    <option value="">Select City</option>
                                                </select>
                                                <small id="cur_nri_cityerror" class="text-danger"></small>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="cur_nri_zip">Zip / Postal Code <span
                                                        class="text-danger">*</span></label>
                                                <input id="cur_nri_zip" name="cur_nri_zip"
                                                    class="form-control form-control-sm" type="text"
                                                    oninput="this.value = this.value.replace(/[^a-zA-Z0-9 -]/g, '').slice(0, 12)"
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




                                    <!-- Documents -->
                                    <div class="mt-3">
                                        <h5 class="mb-3 section-title">
                                            <i class="bi bi-images text-primary me-2"></i>Documents
                                        </h5>
                                        <div class="row g-3 align-items-end">
                                            <div class="col-md-3 d-flex flex-column">
                                                <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">
                                                    Upload Your Passport size photo <span style="color: #ff0000 !important; font-weight: bold;">*</span>
                                                </label>
                                                <div class="ps-file-upload-wrapper">
                                                    <label for="passportphoto" class="ps-file-upload-btn" id="passportphoto_btn">
                                                        <i class="bi bi-upload ps-file-icon"></i>
                                                        <span class="ps-file-label">Choose file...</span>
                                                    </label>
                                                    <input onchange="uploadFileStyled(this, 'passportphoto_btn')" id="passportphoto"
                                                        type="file" name="selfimage" accept="image/jpg,image/jpeg,image/png">
                                                </div>
                                                <small class="text-danger selfimage"></small>
                                            </div>

                                            <div class="col-md-3 d-flex flex-column">
                                                <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">
                                                    Upload Aadhar Front image <span style="color: #ff0000 !important; font-weight: bold;">*</span>
                                                </label>
                                                <div class="ps-file-upload-wrapper">
                                                    <label for="aadharfrontimage" class="ps-file-upload-btn" id="aadharfrontimage_btn">
                                                        <i class="bi bi-upload ps-file-icon"></i>
                                                        <span class="ps-file-label">Choose file...</span>
                                                    </label>
                                                    <input onchange="uploadFileStyled(this, 'aadharfrontimage_btn')"
                                                        id="aadharfrontimage" type="file"
                                                        name="aadharfrontimage" accept="image/jpg,image/jpeg,image/png">
                                                </div>
                                                <small class="text-danger aadharfrontimage"></small>
                                            </div>

                                            <div class="col-md-3 d-flex flex-column">
                                                <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">
                                                    Upload Aadhar Back image <span style="color: #ff0000 !important; font-weight: bold;">*</span>
                                                </label>
                                                <div class="ps-file-upload-wrapper">
                                                    <label for="aadharbackimage" class="ps-file-upload-btn" id="aadharbackimage_btn">
                                                        <i class="bi bi-upload ps-file-icon"></i>
                                                        <span class="ps-file-label">Choose file...</span>
                                                    </label>
                                                    <input onchange="uploadFileStyled(this, 'aadharbackimage_btn')"
                                                        id="aadharbackimage" type="file"
                                                        name="aadharbackimage" accept="image/jpg,image/jpeg,image/png">
                                                </div>
                                                <small class="text-danger aadharbackimage"></small>
                                            </div>

                                            <div class="col-md-3 d-flex flex-column">
                                                <label class="form-label mb-2" style="font-size: 14px; font-weight: 500; flex-grow: 1;">
                                                    Upload Community Certificate <span style="color: #ff0000 !important; font-weight: bold;">*</span>
                                                </label>
                                                <div class="ps-file-upload-wrapper">
                                                    <label for="communitycertificate" class="ps-file-upload-btn" id="communitycertificate_btn">
                                                        <i class="bi bi-upload ps-file-icon"></i>
                                                        <span class="ps-file-label">Choose file...</span>
                                                    </label>
                                                    <input onchange="uploadFileStyled(this, 'communitycertificate_btn')"
                                                        id="communitycertificate" type="file"
                                                        name="communitycertificate"
                                                        accept="image/jpg,image/jpeg,image/png">
                                                </div>
                                                <small class="text-danger communitycertificate"></small>
                                            </div>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <span style="color:#295CF5; font-size: 13px;">Note: File Size should be below 2MB. (JPG, JPEG, PNG only)</span>
                                        </div>
                                    </div>

                                    <!-- Declaration + submit -->
                                    <div class="text-center mt-3">
                                        <div class="form-check d-inline-flex align-items-center mb-2">
                                            <input onchange="activateButton(this)" type="checkbox"
                                                class="form-check-input" id="correctdetails">
                                            <label for="correctdetails" class="form-check-label ms-2">
                                                I agree to the <a href="<?= base_url('terms-and-conditions') ?>"
                                                    target="_blank">Terms and Conditions</a> and <a
                                                    href="<?= base_url('privacy-policy') ?>" target="_blank">Privacy
                                                    Policy</a>
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
        function setDropdowndistricts(state) {
            let state_id = state.value;
            $.ajax({
                type: "get",
                url: "<?= base_url('coordinators/getDistrictsfordropdown') ?>",
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
            $.ajax({
                type: "get",
                url: "<?= base_url('coordinators/getTaluksfordropdown') ?>",
                data: { "district_name": district_name },
                success: (result) => {
                    let dropdown = document.getElementById("taluks-dropdown");
                    dropdown.innerHTML = result;
                    dropdown.innerHTML += '<option value="Others">Others</option>';
                    toggleTalukOthers(dropdown);
                },
                error: () => {
                    document.getElementById("taluks-dropdown").innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                }
            });
        }

        function toggleTalukOthers(selectEl) {
            const othersInput = document.getElementById('taluk_others_input');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'taluk');
            } else {
                othersInput.style.display = 'none';
                othersInput.value = '';
                othersInput.setAttribute('name', 'taluk_others');
                selectEl.setAttribute('name', 'taluk'); 
            }
        }

        function setDropdownpanchayat(taluk) {
            let taluk_name = taluk.value;
            $.ajax({
                type: "get",
                url: "<?= base_url('coordinators/getPanchayatsfordropdown') ?>",
                data: { "taluk_name": taluk_name },
                success: (result) => {
                    let dropdown = document.getElementById("panchayat-dropdown");
                    dropdown.innerHTML = result;
                    dropdown.innerHTML += '<option value="Others">Others</option>';
                    togglePanchayatOthers(dropdown);
                },
                error: () => {
                    document.getElementById("panchayat-dropdown").innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                }
            });
        }

        function togglePanchayatOthers(selectEl) {
            const othersInput = document.getElementById('panchayat_others_input');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'panchayat');
            } else {
                othersInput.style.display = 'none';
                othersInput.value = '';
                othersInput.setAttribute('name', 'panchayat_others');
                selectEl.setAttribute('name', 'panchayat'); 
            }
        }
        function setDropdowndistrictsCurrent(state) {
            let state_id = state.value;
            $.ajax({
                type: "get",
                url: "<?= base_url('coordinators/getDistrictsfordropdown') ?>",
                data: { state_id: state_id },
                success: function (result) {
                    document.getElementById("cur_districts_dropdown").innerHTML = result;
                },
                error: function () {
                    document.getElementById("cur_districts_dropdown").innerHTML = "";
                }
            });
        }

        function setDropdowntaluksCurrent(district) {
            let district_name = district.value;
            if (!district_name) return;
            if (district_name === 'Others') {
                let dropdown = document.getElementById("cur_taluks_dropdown");
                dropdown.innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                toggleTalukOthersCurrent(dropdown);
                return;
            }
            $.ajax({
                type: "get",
                url: "<?= base_url('coordinators/getTaluksfordropdown') ?>",
                data: { district_name: district_name },
                success: function (result) {
                    let dropdown = document.getElementById("cur_taluks_dropdown");
                    dropdown.innerHTML = result;
                    dropdown.innerHTML += '<option value="Others">Others</option>';
                    toggleTalukOthersCurrent(dropdown);
                },
                error: function () {
                    document.getElementById("cur_taluks_dropdown").innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                }
            });
        }

        function toggleTalukOthersCurrent(selectEl) {
            const othersInput = document.getElementById('cur_taluk_others_input');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'cur_taluk');
            } else {
                othersInput.style.display = 'none';
                othersInput.value = '';
                othersInput.setAttribute('name', 'cur_taluk_others');
                selectEl.setAttribute('name', 'cur_taluk'); 
            }
        }

        function setDropdownpanchayatCurrent(taluk) {
            let taluk_name = taluk.value;
            if (!taluk_name) return;
            if (taluk_name === 'Others') {
                let dropdown = document.getElementById("cur_panchayat_dropdown");
                dropdown.innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                togglePanchayatOthersCurrent(dropdown);
                return;
            }
            $.ajax({
                type: "get",
                url: "<?= base_url('coordinators/getPanchayatsfordropdown') ?>",
                data: { taluk_name: taluk_name },
                success: function (result) {
                    let dropdown = document.getElementById("cur_panchayat_dropdown");
                    dropdown.innerHTML = result;
                    dropdown.innerHTML += '<option value="Others">Others</option>';
                    togglePanchayatOthersCurrent(dropdown);
                },
                error: function () {
                    document.getElementById("cur_panchayat_dropdown").innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                }
            });
        }

        function togglePanchayatOthersCurrent(selectEl) {
            const othersInput = document.getElementById('cur_panchayat_others_input');
            if (selectEl.value === 'Others') {
                othersInput.style.display = 'block';
                selectEl.removeAttribute('name'); 
                othersInput.setAttribute('name', 'cur_panchayat');
            } else {
                othersInput.style.display = 'none';
                othersInput.value = '';
                othersInput.setAttribute('name', 'cur_panchayat_others');
                selectEl.setAttribute('name', 'cur_panchayat'); 
            }
        }

        function validateInputfield(field) {
            let field_name = field.name;
            let field_value = field.value;
            let textregex = /^[A-Za-z\s]+$/;
            let alphanumericregex = /^[a-zA-Z0-9/()\s]+$/;
            let normalregex = /^[A-Za-z0-9]+$/;

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
                     // Clear length error immediately
                     document.getElementById("phonenoerror").innerHTML = "";
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('coordinators/checkExistphoneno') ?>",
                        data: { 
                            "phoneno": field_value,
                            "existfamilyid": document.getElementsByName("existfamilyid")[0] ? document.getElementsByName("existfamilyid")[0].value : ""
                        },
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
                            console.error("Error checking phone number", error);
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


            if (field_name == "aadharno") {
                if (field_value.length == 12 || field_value.length == 0) {
                    // Clear length error immediately
                    document.getElementById("aadharnoerror").innerHTML = "";
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('coordinators/checkExistaadharno') ?>",
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
                            console.error("Error checking aadhar number", error);
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
                field_name === "cur_street" ||
                field_name === "taluk" ||
                field_name === "panchayat" ||
                field_name === "cur_taluk" ||
                field_name === "cur_panchayat"
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
                    if (field_value === "") {
                        document.getElementById("cur_nri_ziperror").innerHTML = "Please fill zip / postal code.";
                    } else if (field_value.length < 10) {
                        document.getElementById("cur_nri_ziperror").innerHTML = "Recommended 10-12 characters.";
                    } else if (!/^[a-zA-Z0-9 -]+$/.test(field_value)) {
                        document.getElementById("cur_nri_ziperror").innerHTML = "Only alphanumeric, space and hyphen allowed.";
                    } else {
                        document.getElementById("cur_nri_ziperror").innerHTML = "";
                    }
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
            const isVerified = document.getElementById('is_email_verified').value;
            // const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!email) {
                setErr('emailerror', 'Email is mandatory.', document.getElementById('emailfield'));
            } else if (isVerified !== '1') {
                setErr('emailerror', 'Please verify your email address.', document.getElementById('emailfield'));
            }


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
            else if (pincode.length !== 6 || isNaN(pincode))
                setErr('pincodeerror', 'Pincode should contain 6 digits and only numeric values.', document.getElementById('pincodefield'));

            // ===== CURRENT ADDRESS =====
            // ===== CURRENT ADDRESS (SUBMIT) =====
            const curType = getCurrentAddressType();
            if (!curType) {
                setErr('cur_address_type_error', 'Please select current address type.', document.getElementById('cur_address_tn'));
            }

            // Tamil Nadu mandatory logic
            if (curType === 'TamilNadu') {
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
                else if (cur_pincode.length !== 6 || isNaN(cur_pincode))
                    setErr('cur_pincodeerror', 'Pincode should contain 6 digits and only numeric values.', document.getElementById('cur_pincodefield'));
            }

            // Other State / NRI mandatory logic
            if (curType === 'OtherState' || curType === 'NRI') {
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
                if (!cur_nri_zip) {
                    setErr('cur_nri_ziperror', 'Please fill zip / postal code.', document.getElementById('cur_nri_zip'));
                } else if (cur_nri_zip.length < 10) {
                    setErr('cur_nri_ziperror', 'Recommended 10-12 characters.', document.getElementById('cur_nri_zip'));
                } else if (!/^[a-zA-Z0-9 -]+$/.test(cur_nri_zip)) {
                    setErr('cur_nri_ziperror', 'Only alphanumeric, space and hyphen allowed.', document.getElementById('cur_nri_zip'));
                }

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

            // Mandatory: Aadhar front, Aadhar back, Community certificate
            const aadharfront = f.aadharfrontimage.value.trim();
            if (!aadharfront) {
                document.querySelector('.aadharfrontimage').textContent = 'Please upload Aadhar front image.';
                if (!firstInvalid) firstInvalid = document.getElementById('aadharfrontimage');
            }
            const aadharback = f.aadharbackimage.value.trim();
            if (!aadharback) {
                document.querySelector('.aadharbackimage').textContent = 'Please upload Aadhar back image.';
                if (!firstInvalid) firstInvalid = document.getElementById('aadharbackimage');
            }
            const communitycert = f.communitycertificate.value.trim();
            if (!communitycert) {
                document.querySelector('.communitycertificate').textContent = 'Please upload Community certificate.';
                if (!firstInvalid) firstInvalid = document.getElementById('communitycertificate');
            }


            // Education * (mandatory)
            const education = f.educationfield ? f.educationfield.value.trim() : "";
            if (!education) {
                 setErr('educationerror', 'Please select education.', document.getElementById('education_input'));
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
            let errorbox = document.querySelector(`.${file.name}`);
            let imagesize = 2000000;
            let uploadedimagesize = file.files[0] ? file.files[0].size : 0;

            if (uploadedimagesize > imagesize) {
                errorbox.textContent = "File Size should be below 2MB";
                file.value = "";
                return false;
            }
            else {
                errorbox.textContent = "";
            }
        }

        function uploadFileStyled(file, btnId) {
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

            // Validate: native address must be filled before copying
            if (!n_state.value || !n_district.value || !n_taluk.value || !n_panchayat.value ||
                !n_village.value || !n_street.value || !n_doorno.value || !n_pincode.value) {
                alert("Please fill in all Native Address fields before copying.");
                return;
            }

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

            // 1. Check if NRI
            const curType = getCurrentAddressType();
            if (curType === 'NRI') {
                alert("Same as Native Address is primarily for India addresses. Please fill NRI address manually.");
                return;
            }

            // 1. State
            c_state.value = n_state.value;
            validateInputfield(c_state);  // clear state error

            // 2. District (needs AJAX fill for current dropdown)
            $.ajax({
                type: "get",
                url: "<?= base_url('coordinators/getDistrictsfordropdown') ?>",
                data: { state_id: n_state.value },
                success: function (result) {
                    c_district.innerHTML = result;
                    c_district.value = n_district.value;
                    validateInputfield(c_district); // clear district error

                    // 3. Taluk
                    if (n_taluk.value === 'Others') {
                        c_taluk.innerHTML = '<option value="">Select Taluk</option><option value="Others">Others</option>';
                        c_taluk.value = 'Others';
                        toggleTalukOthersCurrent(c_taluk);
                        document.getElementById('cur_taluk_others_input').value = document.getElementById('taluk_others_input').value;
                        validateInputfield(c_taluk);

                        // 4. Panchayat (Must be Others too if Taluk is Others)
                        c_panchayat.innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                        c_panchayat.value = n_panchayat.value; // Likely 'Others'
                        togglePanchayatOthersCurrent(c_panchayat);
                        if (n_panchayat.value === 'Others') {
                            document.getElementById('cur_panchayat_others_input').value = document.getElementById('panchayat_others_input').value;
                        }
                        validateInputfield(c_panchayat);

                        // 5. Village
                        let vName = n_village.value;
                        let vManual = '';
                        if (vName === 'Others') {
                            vManual = document.getElementById('village_others_input').value;
                        }
                        setDropdownVillageCurrent(c_panchayat, vName);
                        setTimeout(() => {
                            if (vName === 'Others') {
                                document.getElementById('cur_village_others_input').value = vManual;
                            }
                            validateInputfield(c_village);
                        }, 500);
                    } else {
                        $.ajax({
                            type: "get",
                            url: "<?= base_url('coordinators/getTaluksfordropdown') ?>",
                            data: { district_name: n_district.value },
                            success: function (resultTaluk) {
                                c_taluk.innerHTML = resultTaluk;
                                c_taluk.innerHTML += '<option value="Others">Others</option>';
                                c_taluk.value = n_taluk.value;
                                toggleTalukOthersCurrent(c_taluk);
                                if (n_taluk.value === 'Others') {
                                    document.getElementById('cur_taluk_others_input').value = document.getElementById('taluk_others_input').value;
                                }
                                validateInputfield(c_taluk);

                                // 4. Panchayat
                                if (n_panchayat.value === 'Others') {
                                    c_panchayat.innerHTML = '<option value="">Select Panchayat</option><option value="Others">Others</option>';
                                    c_panchayat.value = 'Others';
                                    togglePanchayatOthersCurrent(c_panchayat);
                                    document.getElementById('cur_panchayat_others_input').value = document.getElementById('panchayat_others_input').value;
                                    validateInputfield(c_panchayat);
                                    
                                    // 5. Village
                                    let vName = n_village.value;
                                    let vManual = '';
                                    if (vName === 'Others') {
                                        vManual = document.getElementById('village_others_input').value;
                                    }
                                    setDropdownVillageCurrent(c_panchayat, vName);
                                    setTimeout(() => {
                                        if (vName === 'Others') {
                                            document.getElementById('cur_village_others_input').value = vManual;
                                        }
                                        validateInputfield(c_village);
                                    }, 500);
                                } else {
                                    $.ajax({
                                        type: "get",
                                        url: "<?= base_url('coordinators/getPanchayatsfordropdown') ?>",
                                        data: { taluk_name: n_taluk.value },
                                        success: function (resultPanchayat) {
                                            c_panchayat.innerHTML = resultPanchayat;
                                            c_panchayat.innerHTML += '<option value="Others">Others</option>';
                                            c_panchayat.value = n_panchayat.value;
                                            togglePanchayatOthersCurrent(c_panchayat);
                                            if (n_panchayat.value === 'Others') {
                                                document.getElementById('cur_panchayat_others_input').value = document.getElementById('panchayat_others_input').value;
                                            }
                                            validateInputfield(c_panchayat);

                                            // 5. Village
                                            let vName = n_village.value;
                                            let vManual = '';
                                            if (vName === 'Others') {
                                                vManual = document.getElementById('village_others_input').value;
                                            }
                                            setDropdownVillageCurrent(c_panchayat, vName);
                                            setTimeout(() => {
                                                if (vName === 'Others') {
                                                    document.getElementById('cur_village_others_input').value = vManual;
                                                }
                                                validateInputfield(c_village);
                                            }, 500);
                                        }
                                    });
                                }
                            }
                        });
                    }
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





        // Profession searchable dropdown logic
        function filterProfessionOptions(input) {
            const query = input.value.toLowerCase().trim();
            const dropdown = document.getElementById("profession_dropdown");
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

        $(document).on("click", ".profession-option", function() {
            const value = this.getAttribute("data-value");
            const input = document.getElementById("profession_input");
            const hidden = document.getElementById("professionfield");
            
            input.value = this.textContent;
            hidden.value = value;
            document.getElementById("profession_dropdown").style.display = "none";
            
            // Trigger profession change logic
            handleProfessionChange({value: value});
            validateInputfield(hidden);
        });

        // Toggle readonly to allow typing when focused
        $("#profession_input").on("focus", function() {
            $(this).prop("readonly", false);
        }).on("blur", function() {
            $(this).prop("readonly", true);
        });

        // Handle wrapper click
        $(document).on("click", "#profession_wrapper", function() {
            $("#profession_input").focus();
            filterProfessionOptions(document.getElementById("profession_input"));
        });

        // Close when clicking outside
        $(document).on("click", function(e) {
            if (!$(e.target).closest("#profession_wrapper").length && !$(e.target).closest("#profession_dropdown").length) {
                $("#profession_dropdown").hide();
            }
            if (!$(e.target).closest("#education_wrapper").length && !$(e.target).closest("#education_dropdown").length) {
                $("#education_dropdown").hide();
            }
        });












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
            $('#cur_nri_state').val('').html('<option value="">Select State</option>');
            $('#cur_nri_city').val('').html('<option value="">Select City</option>');
            $('#cur_nri_zip').val('');
            $('#cur_nri_fulladdress').val('');

            $('#cur_nri_countryerror, #cur_nri_stateerror, #cur_nri_cityerror,' +
                '#cur_nri_ziperror, #cur_nri_fulladdresserror').html('');
        }

        function toggleCurrentAddressType() {
            const tnBlock = document.getElementById('cur_india_block');
            const otherBlock = document.getElementById('cur_nri_block');
            const sameBtn = document.getElementById('btn_same_as_native');
            const sameContainer = document.getElementById('same_as_native_container');
            const curStateContainer = document.getElementById('cur_state_container');
            const curNriCountryContainer = document.getElementById('cur_nri_country_container');

            const selected = document.querySelector('input[name="cur_address_type"]:checked');

            if (!selected) {
                if (tnBlock) tnBlock.style.display = 'none';
                if (otherBlock) otherBlock.style.display = 'none';
                if (sameContainer) sameContainer.style.display = 'none';
                return;
            }

            if (selected.value === 'TamilNadu') {
                if (tnBlock) tnBlock.style.display = 'block';
                if (otherBlock) otherBlock.style.display = 'none';
                if (sameContainer) sameContainer.style.display = 'block';
                if (curStateContainer) curStateContainer.style.display = 'none';

                if (sameBtn) {
                    sameBtn.disabled = false;
                    sameBtn.classList.remove('disabled');
                }
                
                // Set and Load Tamil Nadu Districts
                let stateSelect = document.getElementById("cur_states_dropdown");
                if (stateSelect) {
                    for (let i = 0; i < stateSelect.options.length; i++) {
                        if (stateSelect.options[i].text === "Tamil Nadu") {
                            stateSelect.selectedIndex = i;
                            setDropdowndistrictsCurrent(stateSelect);
                            break;
                        }
                    }
                }
                clearCurrentNriAddress();

            } else if (selected.value === 'OtherState') {
                if (tnBlock) tnBlock.style.display = 'none';
                if (otherBlock) otherBlock.style.display = 'block';
                if (sameContainer) sameContainer.style.display = 'none';
                if (curNriCountryContainer) curNriCountryContainer.style.display = 'none';

                if (sameBtn) {
                    sameBtn.disabled = true;
                    sameBtn.classList.add('disabled');
                }

                // Clear any existing NRI data before setting India defaults
                clearCurrentNriAddress();

                // Set Country to India and Load States
                let countrySelect = document.getElementById("cur_nri_country");
                if (countrySelect) {
                    countrySelect.value = "India";
                    loadNRIStates("India");
                }
                clearCurrentIndiaAddress();

            } else if (selected.value === 'NRI') {
                if (tnBlock) tnBlock.style.display = 'none';
                if (otherBlock) otherBlock.style.display = 'block';
                if (sameContainer) sameContainer.style.display = 'none';
                if (curNriCountryContainer) curNriCountryContainer.style.display = 'block';

                if (sameBtn) {
                    sameBtn.disabled = true;
                    sameBtn.classList.add('disabled');
                }

                // Clear NRI data for a fresh NRI form
                clearCurrentNriAddress();
                
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

            // Default Native State to Tamil Nadu and Load Districts
            let stateSelect = document.getElementById("states-dropdown");
            if (stateSelect) {
                for (let i = 0; i < stateSelect.options.length; i++) {
                    if (stateSelect.options[i].text === "Tamil Nadu") {
                        stateSelect.selectedIndex = i;
                        setDropdowndistricts(stateSelect);
                        break;
                    }
                }
            }
        });



        function setDropdownVillage(panchayatEl, selectedVillage = null) {
            const panchayat_name = panchayatEl.value;
            const villageSelect = document.getElementById('villagefield');

            $.ajax({
                type: "get",
                url: "<?= base_url('coordinators/getVillagesfordropdown') ?>",
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
                    toggleVillageOthers(villageSelect, selectedVillage);
                },
                error: function() {
                    villageSelect.innerHTML = '<option value="">Select Village</option><option value="Others">Others</option>';
                    toggleVillageOthers(villageSelect);
                }
            });
        }

        function toggleVillageOthers(selectEl, manualValue = '') {
            const othersInput = document.getElementById('village_others_input');
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
                url: "<?= base_url('coordinators/getVillagesfordropdown') ?>",
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
                    toggleVillageOthersCurrent(villageSelect, selectedVillage);
                },
                error: function() {
                    villageSelect.innerHTML = '<option value="">Select Village</option><option value="Others">Others</option>';
                    toggleVillageOthersCurrent(villageSelect);
                }
            });
        }

        function toggleVillageOthersCurrent(selectEl, manualValue = '') {
            const othersInput = document.getElementById('cur_village_others_input');
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

            if (!countriesData || !countrySelect) return;

            countrySelect.innerHTML = '<option value="">Select Country</option>';

            Object.values(countriesData).forEach(country => {
                const option = document.createElement('option');
                option.value = country.name;
                option.textContent = country.name;
                countrySelect.appendChild(option);
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








        function sendEmailOTP() {
            const email = document.getElementById('emailfield').value.trim();
            const btn = document.getElementById('verify_email_btn');
            const err = document.getElementById('emailerror');
            
            if (!email) {
                err.innerHTML = "Please enter email to verify.";
                return;
            }
            
            // Basic regex
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
                        document.getElementById('otp_section').style.display = 'block';
                        btn.style.display = 'none'; // Hide verify button
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

        function verifyEmailOTP() {
            const otp = document.getElementById('email_otp').value.trim();
            const email = document.getElementById('emailfield').value.trim();
            const err = document.getElementById('otperror');

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
                        document.getElementById('otp_section').style.display = 'none';
                        document.getElementById('email_verified_badge').style.display = 'block';
                        document.getElementById('is_email_verified').value = "1";
                        document.getElementById('emailfield').readOnly = true;
                        document.getElementById('emailerror').innerHTML = "";
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

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
