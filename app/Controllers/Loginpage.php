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
                    'usererror' => "No user found with the given $identifier.",
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

                    // Set session based on role
                    $this->session->set('Kaadaisoft_userId', $userdetails->Familymembershipid);
                    $this->session->set('Kaadaisoft_userName', $userdetails->Name);
                    $this->session->set('name', $userdetails->Name); // Dashboard check uses 'name'
                    $this->session->set('role', $userdetails->Role);
                    $this->session->set('taluk', $userdetails->Taluk);
                    return redirect()->to('admindashboard');
                } else {
                    return view('loginPage', [
                        'passworderror' => 'Your password is wrong.',
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
}
?>