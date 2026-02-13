<?php 
namespace App\Controllers;

class Dashboard extends BaseController {

    protected $session;
    protected $db;

    public function __construct(){
        $this->session = session();
        $this->db = \Config\Database::connect();
    } 

    public function index(){
        if($this->session->has('Kaadaisoft_userId')){
            $name = $this->session->get('name');
            return view('dashboard',array('name'=>$name));
        }
        else{
            return redirect()->to('Loginpage');
        }
    }

    public function displaydashboard(){
        if($this->request->isAJAX()){
           return view('dashboard');
        }
    }

    public function sidemenu(){
        return view("sidemenu");
    }

    public function topmenu(){
        return view("topmenu");
    }

    public function pslogo(){
        return view("pslogo");
    }


    public function logout(){
        $this->session->destroy();
        return redirect()->to('Loginpage');
    }
    
}
?>