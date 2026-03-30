<?php
namespace App\Controllers;

use App\Models\KaadailoginModel;

class Loginpage extends BaseController {

    protected $kaadailoginModel;
    protected $session;
    protected $db;

    public function __construct() {
        $this->kaadailoginModel = new KaadailoginModel();
        $this->session = session();
        $this->db = \Config\Database::connect();
    }

    public function index(){
        return view('loginPage');
    }

    public function login()
    {
        $rules = [
            'username' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Please enter your username.',
                    'numeric' => 'Username must contain only numbers.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter your password.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            // Validation failed; reload the login page with errors
            return view('loginPage', [
                'usererror' => $this->validator->getError('username'),
                'passworderror' => $this->validator->getError('password')
            ]);
        } else {
            // Get input data
            $username = $this->request->getPost('username');
            $password = trim($this->request->getPost('password'));

            // Determine if input is Mobile or Aadhar
            if (strlen($username) == 10 || strlen($username) == 9) {
                $identifier = 'Phonenumber';
            } elseif (strlen($username) == 12) {
                $identifier = 'Aadharnumber';
            } else {
                return view('loginPage', [
                    'usererror' => 'Invalid length for Mobile or Aadhar.',
                    'username' => $username,
                    'password' => $password
                ]);
            }

            // Verify user details
            $userdetails = $this->kaadailoginModel->getDetails($identifier, $username);
            $stored_hash = "";
            if (!$userdetails) {
                return view('loginPage', [
                    'usererror' => "Invalid Mobile/Aadhar Number or Password.",
                    'username' => $username,
                    'password' => $password
                ]);
            } else {
                // Check if the user is marked as dead
                if (isset($userdetails->is_dead) && $userdetails->is_dead == 1) {
                    return view('loginPage', [
                        'usererror' => "This account has been deactivated.", 
                        'username' => $username,
                        'password' => $password
                    ]);
                }

                $stored_hash = $userdetails->Password;
                if (password_verify($password, $stored_hash)) {
                    // Check if the user is rejected
                    if ($userdetails->Approvedstatus == 'Reject') {
                        $data = [
                            'rejectreason' => $userdetails->RejectReason,
                            'username' => $username,
                            'password' => $password
                        ];
                        return view('loginPage', $data);
                    }
                    
                    // Also check for Pending status if needed
                    if ($userdetails->Approvedstatus == 'Pending') {
                         return view('loginPage', [
                            'usererror' => 'Your application is still pending approval.',
                            'username' => $username,
                            'password' => $password
                        ]);
                    }

                    // Only allow 'Head' to login if the user is a normal member (Role 3)
                    if ($userdetails->Role == 3 && $userdetails->MemberRole != 'Head') {
                         return view('loginPage', [
                            'usererror' => 'Only the Family Head can log in.',
                            'username' => $username,
                            'password' => $password
                        ]);
                    }

                    // Regenerate session ID to prevent Session Fixation
                    $this->session->regenerate();

                    // Set session based on role
                    $this->session->set('Kaadaisoft_userId', $userdetails->Familymembershipid);
                    $this->session->set('Kaadaisoft_userName', $userdetails->Name);
                    $this->session->set('name', $userdetails->Name); // Dashboard check uses 'name'
                    $this->session->set('role', $userdetails->Role);
                    $this->session->set('taluk', $userdetails->Taluk);
                    return redirect()->to('admindashboard');
                } else {
                    return view('loginPage', [
                        'usererror' => 'Invalid Mobile/Aadhar Number or Password.',
                        'username' => $username,
                        'password' => $password
                    ]);
                }
            }
        }
    }

    public function terms_and_conditions(){
        return view('terms_and_conditions');
    }

    public function privacy_policy(){
        return view('privacy_policy');
    }

    public function forgot_password() {
        return view('forgotPassword');
    }

    public function send_otp() {
        $username = $this->request->getPost('identifier');
        
        // Determine if input is Mobile or Aadhar
        if (strlen($username) == 10 || strlen($username) == 9) {
            $identifier = 'Phonenumber';
        } elseif (strlen($username) == 12) {
            $identifier = 'Aadharnumber';
        } else {
             return redirect()->back()->with('error', 'Invalid length for Mobile or Aadhar.');
        }

        $user = $this->kaadailoginModel->getDetails($identifier, $username);

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid Mobile/Aadhar.');
        }

        if (empty($user->Email)) {
            return redirect()->back()->with('error', 'No email registered for this account. Please contact admin.');
        }

        $otp = rand(100000, 999999);
        $expiry = date('Y-m-d H:i:s', strtotime('+15 minutes'));

        $this->kaadailoginModel->updateOTP($identifier, $username, $otp, $expiry);

        // Send Email
        $email = \Config\Services::email();
        $email->setTo($user->Email);
        $email->setSubject('Password Reset OTP - Poondurai Kaadai Kulam');
        
        $email->setMailType('html');
        
        $imagePath = FCPATH . 'assets/logo_small.png';
        if (file_exists($imagePath)) {
            $email->attach($imagePath, 'inline');
            $cid = $email->setAttachmentCID($imagePath);
            $logoUrl = 'cid:' . $cid;
        } else {
            $logoUrl = base_url('assets/poondurai kaadaikulam image.png');
        }

        // Fetch the timestamp for the email (now respects global time settings)
        $antiClip = date('h:i A');

        $messageHtml = "
        <div style='font-family: Arial, sans-serif; text-align: center; padding: 20px; background-color: #f4f4f4;'>
            <div style='max-width: 500px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'>
                <img src='{$logoUrl}' alt='Poondurai Kaadai Kulam Logo' style='width: 80px; height: 80px; margin-bottom: 15px;'>
                <h2 style='color: #333; margin-top: 0;'>Password Reset OTP</h2>
                <p style='font-size: 16px; color: #555;'>Your OTP for password reset is:</p>
                <div style='font-size: 28px; font-weight: bold; letter-spacing: 4px; color: #38bdf8; margin: 20px 0;'>{$otp}</div>
                <p style='font-size: 15px; color: #444; font-weight: 500; margin-bottom: 0;'>
                    <strong>Notice:</strong> This OTP is valid for 15 minutes.
                </p>
                <div style='font-size: 10px; color: #ccc; margin-top: 15px;'>Generated at: {$antiClip}</div>
            </div>
        </div>";
        $email->setMessage($messageHtml);

        if ($email->send()) {
            return view('verifyOtp', ['identifier' => $username]);
        } else {
            $errData = $email->printDebugger(['headers']);
            log_message('error', 'Email failed to send: ' . $errData);
            return redirect()->back()->with('error', 'Failed to send OTP email. Please check SMTP settings.');
        }
    }

    public function verify_otp_view() {
         return view('verifyOtp');
    }

    public function verify_otp() {
        $username = $this->request->getPost('identifier');
        $otp = $this->request->getPost('otp');

        if (strlen($username) == 10 || strlen($username) == 9) {
            $identifier = 'Phonenumber';
        } elseif (strlen($username) == 12) {
            $identifier = 'Aadharnumber';
        } else {
            return redirect()->back()->with('error', 'Invalid identifier.');
        }

        $user = $this->kaadailoginModel->verifyOTP($identifier, $username, $otp);

        if ($user) {
            $token = md5(uniqid(rand(), true));
            $this->session->set('reset_token', $token);
            $this->session->set('reset_identifier', $username);
            return view('resetPassword', ['identifier' => $username, 'token' => $token]);
        } else {
            return view('verifyOtp', ['identifier' => $username])->with('error', 'Invalid or expired OTP.');
        }
    }

    public function reset_password_view() {
        return view('resetPassword');
    }

    public function update_password() {
        $username = $this->request->getPost('identifier');
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');

        if ($this->session->get('reset_token') !== $token || $this->session->get('reset_identifier') !== $username) {
            return redirect()->to('/')->with('error', 'Unauthorized password reset attempt.');
        }

        if (strlen($username) == 10 || strlen($username) == 9) {
            $identifier = 'Phonenumber';
        } elseif (strlen($username) == 12) {
            $identifier = 'Aadharnumber';
        } else {
            return redirect()->back()->with('error', 'Invalid identifier.');
        }

        $this->kaadailoginModel->updatePassword($identifier, $username, $password);
        
        $this->session->remove('reset_token');
        $this->session->remove('reset_identifier');

        return redirect()->to('/')->with('success', 'Password updated successfully. You can now login.');
    }
}
?>