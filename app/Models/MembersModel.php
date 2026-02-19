<?php
namespace App\Models;

use CodeIgniter\Model;

class MembersModel extends Model
{
    protected $db;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getTotalMembers()
    {
        $session = session();
        if ($session->get('role') == 2) {
            $coord_id = $session->get("Kaadaisoft_userId");
            $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Role = 3 AND (Coordinator_id = '$coord_id' OR Coordinator_Two_id = '$coord_id') AND isShow = 1 AND Approvedstatus = 'Verified' AND MemberRole = 'Head'");
            return count($query->getResultArray());
        }
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Role = 3 AND isShow = 1 AND Approvedstatus = 'Verified' AND MemberRole = 'Head'");
        return count($query->getResultArray());
    }

    public function getMembers($counts)
    {
        $session = session();
        if ($session->get('role') == 2) {
            $coord_id = $session->get("Kaadaisoft_userId");
            $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Role = 3 AND (Coordinator_id = '$coord_id' OR Coordinator_Two_id = '$coord_id') AND isShow = 1 AND Approvedstatus = 'Verified' AND MemberRole = 'Head' ORDER BY updated_at DESC");
            return $query->getResult();
        }
        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE Role = 3 AND isShow = 1 AND Approvedstatus = 'Verified' AND MemberRole = 'Head' ORDER BY updated_at DESC");
        return $query->getResult();
    }

    public function processRegisteration(
        $name,
        $stateid,
        $district,
        $taluk,
        $panchayat,
        $village,
        $street,
        $doorno,
        $pincode,
        $existfamilyid,
        $phoneno,
        $aadharno,
        $hashed_password,
        $documents,
        $dob,
        $gender,
        $bloodgroup,
        $email,
        $whatsappno,
        $married,
        $valuvu,
        $thottam,
        $kulam,
        $profession,
        $business,
        $businesswebsite,
        $education,   
        $curstate,
        $curdistrict,
        $curtaluk,
        $curpanchayat,
        $curvillage,
        $curstreet,
        $curdoorno,
        $curpincode,
        $curnricountry,
        $curnristate,
        $curnricity,
        $curnrizip,
        $curnrifulladdress,
        $curaddresstype,
        $memberRole,
        $is_dead = 0
    ) {
        // ---------- EXISTING CODE (kept) ----------

        $checkexistphoneno = $this->db->query("SELECT * FROM kaadaimembers WHERE Phonenumber = '$phoneno'");
        $existphoneno = $checkexistphoneno->getNumRows();

        $checkexistaadharno = $this->db->query("SELECT * FROM kaadaimembers WHERE Aadharnumber = '$aadharno'");
        $existaadharno = $checkexistaadharno->getNumRows();

        // Validate Phone Number Logic
        $phone_allowed = true;
        $session = session();
        if ($existphoneno > 0) {
             $phone_allowed = false;
             $session = session();
             //$current_user_id = $session->get('Kaadaisoft_userId'); // Removed generic logged-in check
             
             // If adding a member to an existing family, check if the phone belongs to that family
             if (!empty($existfamilyid)) {
                 $familyCheck = $this->db->query("SELECT * FROM kaadaimembers WHERE Phonenumber = '$phoneno' AND (Familymembershipid = '$existfamilyid' OR Existfamilyid = '$existfamilyid')");
                 if ($familyCheck->getNumRows() > 0) {
                     $phone_allowed = true;
                 }
             }
        }

        if ($existaadharno > 0 || !$phone_allowed) {
            $msg = ($existaadharno > 0) ? "Aadharnumber already registered" : "Mobile number already registered";
            $session->setFlashdata("registerprocesssuccess", $msg);
            
            // In CI4 model, we return false to indicate failure. Controller handles redirect.
            return false;
        }

        $getstate = $this->db->query("SELECT state_title FROM states WHERE state_id = $stateid");
        $getstatename = $getstate->getRow();
        $state = $getstatename->state_title;

        // documents array
        $memberimage = isset($documents[0]) ? $documents[0] : '';
        $aadharfrontimage = isset($documents[1]) ? $documents[1] : '';
        $aadharbackimage = isset($documents[2]) ? $documents[2] : '';
        $communitycertificate = isset($documents[3]) ? $documents[3] : '';

        // education array -> JSON or CSV (choose one)
        // $education = is_array($education_array) ? json_encode($education_array) : $education_array;
        // $education = is_array($education_array) ? json_encode($education_array) : $education_array;
        
        
        // Fix: Fetch correct coordinators from village_table with robust lookup
        $coordinator_id = null;
        $coordinator_two_id = null;
        
        $village_trimmed = trim($village);
        $panchayat_trimmed = trim($panchayat);
        $taluk_trimmed = trim($taluk);
        $district_trimmed = trim($district);

        $coord_row = $this->db->query("SELECT Coordinator_id, Coordinator_Two_id FROM village_table 
                                         WHERE LOWER(TRIM(village_name)) = LOWER(TRIM(" . $this->db->escape($village_trimmed) . ")) 
                                         AND LOWER(TRIM(panchayat_name)) = LOWER(TRIM(" . $this->db->escape($panchayat_trimmed) . ")) 
                                         AND LOWER(TRIM(taluk_name)) = LOWER(TRIM(" . $this->db->escape($taluk_trimmed) . ")) 
                                         AND LOWER(TRIM(district_name)) = LOWER(TRIM(" . $this->db->escape($district_trimmed) . "))")->getRow();
        
        if ($coord_row) {
            $coordinator_id = $coord_row->Coordinator_id;
            $coordinator_two_id = $coord_row->Coordinator_Two_id;
        }

        // Fallback: If coordinator (Role 2) is adding a family member and village lookup fails, 
        // they should still be the coordinator for this record so they can approve it.
        $session = session();
        if (empty($coordinator_id) && $session->get('role') == 2) {
            $coordinator_id = trim($session->get('Kaadaisoft_userId'));
        }

        // Generate Familymembershipid Logic
        $district_code = strtoupper(substr($district, 0, 3)); // Default fallback
        
        // 1. Get District Code from DB
        $code_query = $this->db->query("SELECT district_code FROM panchayat_table WHERE district_name = ?", [$district]);
        $code_row = $code_query->getRow();
        
        if ($code_row && !empty($code_row->district_code)) {
            $district_code = $code_row->district_code;
        }

        // 2. Generate Next Numeric ID (Global Sequence)
        // Extract numeric part from existing IDs (assuming format XXX00000)
        $max_query = $this->db->query("SELECT MAX(CAST(SUBSTRING(Familymembershipid, 4) AS UNSIGNED)) as max_num FROM kaadaimembers WHERE Familymembershipid REGEXP '^[A-Z]{3}[0-9]+$'");
        $max_row = $max_query->getRow();
        $next_num = ($max_row && $max_row->max_num) ? ($max_row->max_num + 1) : 1;
        
        // 3. Construct ID
        $new_membership_id = $district_code . sprintf('%05d', $next_num);

        $data = [
            'Name' => $name,
            'Coordinator_id' => $coordinator_id,
            'Coordinator_Two_id' => $coordinator_two_id,
            'Approvedstatus' => (session()->get('role') == 1) ? 'Verified' : 'Pending',
            'Dob' => $dob,
            'Gender' => $gender,
            'Bloodgroup' => $bloodgroup,
            'Email' => $email,
            'Whatsappnumber' => $whatsappno,
            'Married' => $married,
            'Valuvu' => $valuvu,
            'Thottam' => $thottam,
            'Kulam' => $kulam,
            'Profession' => $profession,
            'Business' => $business,
            'BusinessWebsite' =>$businesswebsite,
            'Education' => $education,   // plain string save pannuthu

            'State' => $state,
            'District' => $district,
            'Taluk' => $taluk,
            'Panchayat' => $panchayat,
            'Village' => $village,
            'Street' => $street,
            'Doornumber' => $doorno,
            'Pincode' => $pincode,

            'Curstate' => $curstate,
            'Curdistrict' => $curdistrict,
            'Curtaluk' => $curtaluk,
            'Curpanchayat' => $curpanchayat,
            'Curvillage' => $curvillage,
            'Curstreet' => $curstreet,
            'Curdoorno' => $curdoorno,
            'Curpincode' => $curpincode,

            'Curaddresstype' =>$curaddresstype,

            'Curnricountry' => $curnricountry,
            'Curnristate' => $curnristate,
            'Curnricity' => $curnricity,
            'Curnrizip' => $curnrizip,
            'Curnrifulladdress' => $curnrifulladdress,

            'Existfamilyid' => $existfamilyid,
            'Phonenumber' => $phoneno,
            'Aadharnumber' => $aadharno,
            'Password' => $hashed_password,
            'Memberimage' => $memberimage,
            'Aadharfrontimage' => $aadharfrontimage,
            'Aadharbackimage' => $aadharbackimage,
            'Communitycertificate' => $communitycertificate,
            'MemberRole' => $memberRole,
            'is_dead' => $is_dead,
            'Familymembershipid' => $new_membership_id,
            'Id_who_assign_coord' => session()->get('Kaadaisoft_userId'),
        ];

        $insert = $this->db->table('kaadaimembers')->insert($data);

        // Fix ID if it was generated with suffix (e.g. _01)
        if ($insert && !empty($existfamilyid)) {
            $new_pk = $this->db->insertID();
            if ($new_pk) {
                // Fetch the generated Familymembershipid
                $query = $this->db->query("SELECT Familymembershipid FROM kaadaimembers WHERE id = $new_pk");
                $row = $query->getRow();

                if ($row && strpos($row->Familymembershipid, '_') !== false) {
                    $generated_id = $row->Familymembershipid;
                    $prefix = substr($generated_id, 0, 3); // Assume 3 char prefix like NMK, ERD
                    
                    // Get Max Global ID Number
                    // We look for any ID that matches strictly 3 letters + digits (e.g. NMK00004, ERD00064)
                    // We ignore those with underscores or other formats
                    $max_query = $this->db->query("SELECT MAX(CAST(SUBSTRING(Familymembershipid, 4) AS UNSIGNED)) as max_num 
                                                   FROM kaadaimembers 
                                                   WHERE Familymembershipid REGEXP '^[A-Z]{3}[0-9]+$'");
                    
                    $max_row = $max_query->getRow();
                    $next_num = ($max_row && $max_row->max_num) ? ($max_row->max_num + 1) : 1;
                    
                    // Generate new ID with prefix + 5 digit number
                    $new_id = $prefix . sprintf('%05d', $next_num);
                    
                    // Update
                    $this->db->query("UPDATE kaadaimembers SET Familymembershipid = '$new_id' WHERE id = $new_pk");
                }
            }
        }

        return $insert ? true : false;
    }


    public function getMemberslist()
    {
        $query = $this->db->query("SELECT * FROM kaadai WHERE Role = 3 AND Cordinator_id = '' HAVING(isShow = 1)");
        return $query->getResultArray();
    }

    public function getStates()
    {
        $query = $this->db->query("SELECT * FROM states ORDER BY state_title ASC");
        return $query->getResult();
    }

    public function getDistricts($state_id)
    {
        $query = $this->db->query("SELECT distinct(district_name) AS district_name FROM village_table WHERE State_id = $state_id ORDER BY district_name ASC");
        return $query->getResult();
    }

    public function getTaluks($district_name)
    {
        $query = $this->db->query("SELECT distinct(taluk_name) AS taluk_name FROM village_table WHERE district_name = '$district_name' ORDER BY taluk_name ASC");
        return $query->getResult();
    }

    public function getPanchayats($taluk_name)
    {
        $query = $this->db->query("SELECT distinct(panchayat_name) AS panchayat_name FROM village_table WHERE taluk_name = '$taluk_name' ORDER BY panchayat_name ASC");
        return $query->getResult();
    }

    public function getVillages($panchayat_name)
    {
        $query = $this->db->query("SELECT distinct(village_name) AS village_name FROM village_table WHERE panchayat_name = '$panchayat_name' ORDER BY village_name ASC");
        return $query->getResult();
    }




    public function getMembersSearchfields($searchfields)
    {
        $builder = $this->db->table('kaadaimembers');
        $builder->where('Role', 3);
        $builder->where('isShow', 1);
        $builder->where('MemberRole', 'Head');

        if (is_array($searchfields)) {
            // Address filters
            if (!empty($searchfields['state_id'])) {
                $builder->where('state_id', $searchfields['state_id']);
            }
            if (!empty($searchfields['district'])) {
                $builder->where('District', $searchfields['district']);
            }
            if (!empty($searchfields['taluk'])) {
                $builder->where('Taluk', $searchfields['taluk']);
            }
            if (!empty($searchfields['panchayat'])) {
                $builder->where('Panchayat', $searchfields['panchayat']);
            }

            // Extra filters
            if (!empty($searchfields['bloodgroup'])) {
                $builder->where('Bloodgroup', $searchfields['bloodgroup']);
            }
            if (!empty($searchfields['gender'])) {
                $builder->where('Gender', $searchfields['gender']);
            }
            if (!empty($searchfields['occupation'])) {
                $builder->where('Profession', $searchfields['occupation']);
            }
            if (!empty($searchfields['search'])) {
                $term = $searchfields['search'];
                $builder->groupStart();
                $builder->like('Name', $term);
                $builder->orLike('Familymembershipid', $term);
                $builder->orLike('Phonenumber', $term);
                $builder->orLike('Aadharnumber', $term);
                $builder->orLike('District', $term);
                $builder->groupEnd();
            }
        } else {
            // Simple string search
            $builder->groupStart();
            $builder->like('Name', $searchfields);
            $builder->orLike('Familymembershipid', $searchfields);
            $builder->orLike('Phonenumber', $searchfields);
            $builder->orLike('Aadharnumber', $searchfields);
            $builder->orLike('District', $searchfields);
            $builder->groupEnd();
        }

        if (session()->get('role') == 2) {
            $coord_id = session()->get("Kaadaisoft_userId");
            $builder->groupStart()
                    ->where('Coordinator_id', $coord_id)
                    ->orWhere('Coordinator_Two_id', $coord_id)
                    ->groupEnd();
        }

        return $builder->get()->getResult();
    }



    public function getnotassignedMembers($searchfields)
    {
        $query = $this->db->query("SELECT * FROM kaadai WHERE Name LIKE '%$searchfields%' OR Mobile LIKE '%$searchfields%' OR Area LIKE '%$searchfields%' HAVING(SELECT Role = 3 AND isShow = 1 HAVING(Cordinator_id = 0))");
        return $query->getResultArray();
    }

    public function addMember($name, $aadhar, $phoneno, $village, $email, $role)
    {
        $lastid = $this->db->query("SELECT COUNT(id) AS lastid  FROM kaadai WHERE Role = 3");
        $getnewid = $lastid->getRow();
        $fetchnewid = $getnewid->lastid;
        $newid = $fetchnewid + 1;
        $newmemberid = str_pad($newid, 4, "0", STR_PAD_LEFT);
        $userid = "KAADAIMEM" . $newmemberid;
        $addmember = $this->db->query("INSERT INTO kaadai(Name,Userid,Aadhar,Mobile,Villageid,Email,Role,password) VALUES('$name','$userid','$aadhar','$phoneno',$village,'$email','$role',123456)");
        $geteventname = $this->db->query("SELECT EventName FROM eventtaxes WHERE SNo = (SELECT MAX(SNo) FROM eventtaxes);");
        $lasteventname = $geteventname->getRow();
        $eventname = $lasteventname->EventName;
        $addmembertoevent = $this->db->query("INSERT INTO $eventname(Name,Mobile,Aadhar,Role,Userid,Villageid,isShow) VALUES('$name','$phoneno','$aadhar','$role','$userid',$village,1)");
        if ($addmember) {
            return true;
        } else {
            return false;
        }
    }

    public function getAreas()
    {
        $query = $this->db->query("SELECT * FROM areas ");
        return $query->getResultArray();
    }


    public function getAreamembers($area)
    {
        $query = $this->db->query("SELECT * FROM kaadai WHERE Role = 3 AND Cordinator_id = '' HAVING(isShow = 1 AND Area = '$area')");
        return $query->getResultArray();
    }

    public function updateMember($id, $name, $aadhar, $phoneno, $area, $role)
    {
        $addmember = $this->db->query("UPDATE kaadai SET Name = '$name',Aadhar = '$aadhar',Mobile = '$phoneno',Assigned_area = '$area' WHERE id = $id AND Role = 3");
        if ($addmember) {
            return true;
        } else {
            return false;
        }
    }

    public function membermovetotrash($id)
    {
        $movetotrashaction = $this->db->query("UPDATE kaadaimembers SET isShow = 0 WHERE Familymembershipid = '$id'");
        if (!$movetotrashaction) {
            return false;
        } else {
            return true;
        }
    }

    public function getMemberdata($member_id)
    {
        $member_data = $this->db->query("SELECT * FROM kaadaimembers WHERE Familymembershipid = '$member_id'");
        return $member_data->getRow();
    }

    public function checkExistphoneno($phoneno)
    {
        $checkexistphoneno = $this->db->query("SELECT * FROM kaadaimembers WHERE Phonenumber LIKE '%$phoneno%'");
        return $checkexistphoneno;
    }

    public function checkExistaadharno($aadharno)
    {
        $checkexistaadharno = $this->db->query("SELECT * FROM kaadaimembers WHERE Aadharnumber = $aadharno");
        return $checkexistaadharno;
    }

    public function saveUpdateMemberRequest($Familymembershipid, $data)
    {
        $member_row = $this->db->table('kaadaimembers')->where('Familymembershipid', $Familymembershipid)->get()->getRowArray();
        if (!$member_row) return false;

        // Check if anything actually changed
        $changed = false;
        foreach ($data as $key => $value) {
             if ($key === 'updated_at') continue;
             $dbVal = $member_row[$key] ?? '';
             $newVal = $value ?? '';
             if (trim((string)$dbVal) !== trim((string)$newVal)) {
                 $changed = true;
                 break;
             }
        }
        if (!$changed) {
             return 'no_changes';
        }

        $Coordinator_id = $member_row['Coordinator_id'];
        
        $insert_data = array(
            'Familymembershipid' => $Familymembershipid,
            'Coordinator_id' => $Coordinator_id,
            'updated_data' => json_encode($data),
            'status' => 'Pending',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        return $this->db->table('member_edit_requests')->insert($insert_data);
    }

    public function processMemberupdate($Familymembershipid, $data, $path, $reason)
    {
        $session = session();
        
        // Determine flashdata key based on path
        $errorKey = 'membererrorstatus';
        if ($path === 'manager') $errorKey = 'managererrorstatus';
        if ($path === 'coordinator' || $session->get('role') == 2) $errorKey = 'coorderrorstatus';

        // Check uniqueness for Phone (Allow same phone for same family)
        if (!empty($data['Phonenumber'])) {
            // Get current member's family ID to allow sharing within family
            $currentMember = $this->db->table('kaadaimembers')->select('Familymembershipid, Existfamilyid')->where('Familymembershipid', $Familymembershipid)->get()->getRow();
            $myFamilyId = $currentMember ? ($currentMember->Existfamilyid ?: $currentMember->Familymembershipid) : $Familymembershipid;

            $checkPhoneBuilder = $this->db->table('kaadaimembers')
                ->where('Phonenumber', $data['Phonenumber'])
                ->where('Familymembershipid !=', $Familymembershipid); // Don't match self

            // If we have a family ID, exclude members of the same family from the conflict check
            if (!empty($myFamilyId)) {
                $checkPhoneBuilder->groupStart()
                    ->where('Existfamilyid !=', $myFamilyId)
                    ->where('Familymembershipid !=', $myFamilyId)
                    ->groupEnd();
            }

            $checkPhoneCount = $checkPhoneBuilder->countAllResults();

            if ($checkPhoneCount > 0) {
                $session->setFlashdata($errorKey, "Phone number already exists for another family.");
                return false;
            }
        }

        // Check uniqueness for Aadhaar
        if (!empty($data['Aadharnumber'])) {
            $checkAadhaar = $this->db->table('kaadaimembers')
                ->where('Aadharnumber', $data['Aadharnumber'])
                ->where('Familymembershipid !=', $Familymembershipid)
                ->countAllResults();

            if ($checkAadhaar > 0) {
                $session->setFlashdata($errorKey, "Aadhaar number already exists for another member.");
                return false;
            }
        }

        // Composite Check to prevent DB crash on unique key 'phoneno_aadharno'
        $checkPhone = !empty($data['Phonenumber']) ? $data['Phonenumber'] : null;
        $checkAadhar = !empty($data['Aadharnumber']) ? $data['Aadharnumber'] : null;
        
        if ($checkPhone === null || $checkAadhar === null) {
             $current = $this->db->table('kaadaimembers')->select('Phonenumber, Aadharnumber')->where('Familymembershipid', $Familymembershipid)->get()->getRow();
             if ($current) {
                 if ($checkPhone === null) $checkPhone = $current->Phonenumber;
                 if ($checkAadhar === null) $checkAadhar = $current->Aadharnumber;
             }
        }
        
        if ($checkPhone && $checkAadhar) {
             $compositeCheck = $this->db->table('kaadaimembers')
                 ->where('Phonenumber', $checkPhone)
                 ->where('Aadharnumber', $checkAadhar)
                 ->where('Familymembershipid !=', $Familymembershipid)
                 ->countAllResults();
                 
             if ($compositeCheck > 0) {
                 $session->setFlashdata($errorKey, "Update failed: Phone and Aadhaar combination already exists.");
                 return false;
             }
        }

        // Check if anything actually changed (ignoring updated_at)
        $currentRecord = $this->db->table('kaadaimembers')->where('Familymembershipid', $Familymembershipid)->get()->getRowArray();
        if ($currentRecord) {
            $changed = false;
            foreach ($data as $key => $value) {
                if ($key === 'updated_at') continue;
                $dbVal = $currentRecord[$key] ?? '';
                $newVal = $value ?? '';
                if (trim((string)$dbVal) !== trim((string)$newVal)) {
                    $changed = true;
                    break;
                }
            }
            if (!$changed) {
                return 'no_changes';
            }
        }

        return $this->db->table('kaadaimembers')->where('Familymembershipid', $Familymembershipid)->update($data);
    }

    public function getMembersdetails()
    {
        $session = session();
        if ($session->get('role') == 1) {
            $query = $this->db->query("SELECT Name,State,District,Taluk,Panchayat,Village,Street,Doornumber,Pincode,Existfamilyid,Phonenumber,Aadharnumber FROM kaadaimembers WHERE isShow = 1 AND Approvedstatus = 'Verified'");
            return $query->getResultArray();
        } elseif ($session->get('role') == 2) {
            $coord_id = $session->get("Kaadaisoft_userId");
            $query = $this->db->query("SELECT Name,State,District,Taluk,Panchayat,Village,Street,Doornumber,Pincode,Existfamilyid,Phonenumber,Aadharnumber FROM kaadaimembers WHERE Role = 3 AND (Coordinator_id = '$coord_id' OR Coordinator_Two_id = '$coord_id') AND isShow = 1 AND Approvedstatus = 'Verified'");
            return $query->getResultArray();
        }
    }

    public function getCoordinatorId($taluk)
    {
        $coordId = $this->db->query("SELECT Coordinator_id FROM taluks_table WHERE taluk_name = '$taluk'");
        $getdata = $coordId->getRow();
        return $getdata ? $getdata->Coordinator_id : NULL;
    }

    public function getCoordinatorByLocation($village, $panchayat, $taluk, $district)
    {
        // Trim location parameters before use
        $village = trim($village);
        $panchayat = trim($panchayat);
        $taluk = trim($taluk);
        $district = trim($district);

        $coord_query = $this->db->query("SELECT Coordinator_id, Coordinator_Two_id FROM village_table 
                                         WHERE village_name = " . $this->db->escape($village) . " 
                                         AND panchayat_name = " . $this->db->escape($panchayat) . " 
                                         AND taluk_name = " . $this->db->escape($taluk) . " 
                                         AND district_name = " . $this->db->escape($district));
        return $coord_query->getRow();
    }

    public function getFamilyMembers($member_id)
    {
        $member = $this->getMemberdata($member_id);
        if (!$member) {
            return [];
        }

        $familyId = $member->Existfamilyid;
        if (empty($familyId)) {
            $familyId = $member->Familymembershipid;
        }

        $query = $this->db->query("SELECT * FROM kaadaimembers WHERE (Existfamilyid = '$familyId' OR Familymembershipid = '$familyId') AND isShow = 1 AND Approvedstatus = 'Verified' ORDER BY Dob ASC");
        return $query->getResult();
    }

    public function getPendingUpdateRequest($Familymembershipid)
    {
        $query = $this->db->query("SELECT * FROM member_edit_requests WHERE Familymembershipid = '$Familymembershipid' AND status = 'Pending' LIMIT 1");
        return $query->getRow();
    }
}