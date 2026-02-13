<?php
namespace App\Controllers;

use App\Models\PaymentsModel;

class PaymentsFilter extends BaseController {

    protected $paymentsModel;
    protected $session;
    protected $db;

    public function __construct() {
        $this->paymentsModel = new PaymentsModel();
        $this->session = session();
        $this->db = \Config\Database::connect();
    }

    public function index() {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }

        $filterlist = $this->session->get('filterdata');

        if (!$filterlist) {
            return redirect()->to('payments'); 
        }

        // Extract filters
        $stateid      = $filterlist['stateid'] ?? null;
        $districtname = $filterlist['districtname'] ?? null;
        $talukname    = $filterlist['talukname'] ?? null;
        $eventid      = $filterlist['eventid'] ?? null;
        $paymentstatus = $filterlist['paymentstatus'] ?? 'Pending';

        $geteventdata = $this->paymentsModel->getEventdata($eventid);
        $eventname = $geteventdata ? $geteventdata->EventName : '';

        $count = 0;

        $totalfilteredusers = $this->paymentsModel->getPaidorunpaidusers(
            $stateid, $districtname, $talukname, $eventid, $paymentstatus
        );

        $filteredusers = $this->paymentsModel->getPaidunpaidusers(
            $stateid, $districtname, $talukname, $eventid, $paymentstatus, $count
        );

        $counts = count($totalfilteredusers);
        $title = $paymentstatus == 'Paid' ? "Paid users: $counts" : "Unpaid users: $counts";

        // View might need array instead of model properties if CI3 view was different, but here keys match view vars
        return view('filteredusers', [
            "filteredusers" => $filteredusers,
            "filterlist"    => $filterlist,
            "eventyears"    => $filterlist["eventyears"],
            "states"        => $filterlist["states"],
            "districts"     => $filterlist["districts"],
            "taluks"        => $filterlist["taluks"],
            "eventid"       => $eventid,
            "talukname"     => $talukname,
            "events"        => $filterlist["events"],
            "title"         => $title,
            "counts"        => $counts,
            "sno"           => $count
        ]);
    }

    public function getFilteredusers() {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        
        // Use request->getPost()
        $stateid      = $this->request->getPost('stateid');
        $districtname = $this->request->getPost('districtname');
        $talukname    = $this->request->getPost('talukname');
        $eventid      = $this->request->getPost('eventid');
        $eventyear    = $this->request->getPost('eventyear');
        $paymentstatus = $this->request->getPost('paymentstatus');

        $geteventdata = $this->paymentsModel->getEventdata($eventid);
        $eventname = $geteventdata ? $geteventdata->EventName : '';

        $count = 0;

        $totalfilteredusers = $this->paymentsModel->getPaidorunpaidusers(
            $stateid, $districtname, $talukname, $eventid, $paymentstatus
        );

        $filteredusers = $this->paymentsModel->getPaidunpaidusers(
            $stateid, $districtname, $talukname, $eventid, $paymentstatus, $count
        );

        $eventyears = $this->paymentsModel->getEventsyear();
        $states = $this->paymentsModel->getStates();
        $districts = $stateid ? $this->paymentsModel->getDistrictslist($stateid) : [];
        $taluks = $districtname ? $this->paymentsModel->getTaluklist($districtname) : [];
        $events = $this->paymentsModel->getEventslist();
        $eventsbyyear = $eventyear ? $this->paymentsModel->getEventsByYear($eventyear) : [];

        $filterdata = [
            "stateid"       => $stateid,
            "districtname"  => $districtname,
            "talukname"     => $talukname,
            "eventid"       => $eventid,
            "eventname"     => $eventname,
            "eventyear"     => $eventyear,
            "paymentstatus" => $paymentstatus,
            "states"        => $states,
            "districts"     => $districts,
            "taluks"        => $taluks,
            "events"        => $events,
            "filteredusers" => $filteredusers,
            "eventyears"    => $eventyears,
            "eventsbyyear"  => $eventsbyyear
        ];

        $this->session->set("filterdata", $filterdata);
        
        // Pass $filterdata to view, not pull from session again if we just set it
        // Or pull it to be safe
        $filterlist = $this->session->get("filterdata");

        $counts = count($totalfilteredusers);
        $count = 0;

        $viewData = [
            "filteredusers" => $filteredusers,
            "filterlist"    => $filterdata,
            "eventyears"    => $eventyears,
            "states"        => $states,
            "districts"     => $districts,
            "taluks"        => $taluks,
            "eventid"       => $eventid,
            "talukname"     => $talukname,
            "eventname"     => $eventname,
            "events"        => $events,
            "title"         => ($paymentstatus == 'Paid' ? "Paid users: $counts" : "Unpaid users: $counts"),
            "counts"        => $counts,
            "sno"           => $count
        ];

        if ($this->session->get('role') == 2 || $this->session->get('role') == 3) {
            $member_id = $this->session->get('Kaadaisoft_userId');
            $member_data = $this->paymentsModel->getCoordinatordata($member_id);
            $coordTaluks = $this->paymentsModel->getCoordinatorTaluks($member_id);
            // Override taluks with coordinator's taluks
            // Actually, in original code line 125: $taluks = $this->PaymentsModel->getCoordinatorTaluks($member_id);
            // line 127: $filterdata["taluks"] = $taluks;
            // line 128: $this->session->set_userdata("filterdata", $filterdata);
            
            $filterdata["taluks"] = $coordTaluks;
            $this->session->set("filterdata", $filterdata);
            
            $viewData["taluks"] = $coordTaluks; // Update view data as well
            $viewData["memberdata"] = $member_data;
        }

        return view('filteredusers', $viewData);
    }

    public function changefiltereduserspagesetup() {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }

        $initialindex = $this->request->getGet('initialindex');
        $filterlist = $this->session->get('filterdata'); 

        if (!$filterlist) {
            echo "Session expired. Please apply filter again."; // CI3 had show_error. echo or view is better.
            return;
        }

        $stateid      = $filterlist['stateid'] ?? null;
        $districtname = $filterlist['districtname'] ?? null;
        $talukname    = $filterlist['talukname'] ?? null;
        $eventid      = $filterlist['eventid'] ?? null;
        $status       = $filterlist['paymentstatus'] ?? 'Pending';

        if ($initialindex < 0) $initialindex = 0;

        $counts = $initialindex * 5;
        $this->session->set('filteruserscounts', $counts);

        $totalmembers = $this->paymentsModel->getPaidorunpaidusers(
            $stateid, $districtname, $talukname, $eventid, $status
        );

        $totalcount = count($totalmembers);
        
        if ($counts >= $totalcount && $totalcount > 0) {
            $counts = 0;
            $this->session->set('filteruserscounts', $counts);
        }

        $filteredusers = $this->paymentsModel->getPaidunpaidusers(
            $stateid, $districtname, $talukname, $eventid, $status, $counts
        );
        
        $title = $status == 'Paid' ? "Paid users: $totalcount" : "Unpaid users: $totalcount";

        return view('filteredusers', [
            "filteredusers" => $filteredusers,
            "filterlist"    => $filterlist,
            "eventyears"    => $filterlist["eventyears"],
            "states"        => $filterlist["states"],
            "districts"     => $filterlist["districts"],
            "taluks"        => $filterlist["taluks"],
            "eventid"       => $eventid,
            "talukname"     => $talukname,
            "events"        => $filterlist["events"],
            "title"         => $title,
            "initialindex"  => $initialindex,
            "newcounts"     => $totalcount,
            "sno"           => $counts
        ]);
    }
    
    public function displayFiltermembers() {
        $counts = $this->request->getPost('count');
        $filterlist = $this->session->get("filterdata");

        if (!$filterlist) {
            echo "Session expired.";
            return;
        }
        
        $stateid = $filterlist['stateid'] ?? null;
        $districtname = $filterlist['districtname'] ?? null;
        $talukname = $filterlist['talukname'] ?? null;
        $eventid = $filterlist['eventid'];
        $status = $filterlist['paymentstatus'];
        
        $this->session->set('filteruserscounts', $counts);
        
        if($this->request->isAJAX()) {
            $members = $this->paymentsModel->getPaidunpaidusers(
                $stateid, $districtname, $talukname, $eventid, $status, $counts
            );
            
            echo view('filtereduserslist', [
                "filteredusers" => $members,
                "sno" => $counts,
                "eventid" => $eventid
            ]);
        }
    }
    
    public function filteredUserpaymentform() {
        if (!$this->session->has('Kaadaisoft_userId')) {
            return redirect()->to('/');
        }
        
        $memberid = $this->request->getGet('memberid');
        $eventid = $this->request->getGet('eventid');
        
        $memberdetail = $this->paymentsModel->getMemberforPayment($memberid);
        $eventdata = $this->paymentsModel->getEventdata($eventid); // Object
        
        if (!$memberdetail || !$eventdata) {
             echo "Error: Member or Event not found.";
             return;
        }
        
        $paydetails = $this->paymentsModel->getPaydetails($memberid, $eventid);
        $paidamount = $paydetails ? $paydetails->paidamount : 0;
        $balanceamount = $eventdata->TaxAmount - $paidamount;
        
        return view("filtereduserpaymentform", [
             "memberdetail" => $memberdetail,
             "eventyear" => $eventdata->Year,
             "eventid" => $eventid,
             "eventname" => $eventdata->EventName,
             "taxamount" => $eventdata->TaxAmount,
             "paidamount" => $paidamount,
             "balanceamount" => $balanceamount
        ]);
    }
    
    public function searchFilteredmembers() {
         if (!$this->session->has('Kaadaisoft_userId')) return redirect()->to('/');

         $searchfields = $this->request->getGet('searchfields');
         $villageid = $this->request->getGet('villageid');
         $eventid = $this->request->getGet('eventid');
         $status = $this->request->getGet('status');

         if($this->request->isAJAX()) {
             if(empty($searchfields)) {
                 $members = $this->paymentsModel->getFilteredmembers($villageid, $eventid, $status);
             } else {
                 $members = $this->paymentsModel->getFilteredmembersdetails($searchfields, $villageid, $eventid, $status);
             }
             
             if(empty($members)) {
                 echo "<tr><td class='fw-bold text-center' colspan='7'>No search results found.</td></tr>";
                 return;
             }
             
             $i = 1;
             foreach ($members as $value) {
                // Assuming result array keys match usage
                echo "<tr>
                    <td>$i</td>
                    <td class='fw-bold text-primary'>{$value['Userid']}</td>
                    <td style='font-weight:500;'>{$value['Name']}</td>
                    <td style='font-weight:500;'>{$value['Aadhar']}</td>
                    <td style='font-weight:500;'>{$value['Mobile']}</td>
                    <td style='font-weight:500;'>{$value['Area']}</td>
                    <td class='d-flex justify-content-evenly'>
                        <a href='filteredUserpaymentform?userid={$value['Userid']}&eventid={$value['Eventid']}&eventname={$value['Eventname']}' class='btn btn-success fw-bold' style='height:fit-content;'>Pay Now</a>&nbsp;&nbsp;
                        <a href='paymentReceiptlist?userid={$value['Userid']}' class='btn btn-primary fw-bold' style='height:fit-content;'>View Receipts</a>
                    </td>
                </tr>";
                $i++;
             }
         }
    }
}
?>