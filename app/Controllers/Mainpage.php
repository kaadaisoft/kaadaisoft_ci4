<?php 
namespace App\Controllers;

    class Mainpage extends BaseController {
    
    protected $session;
    protected $db;

    public function __construct(){
        $this->session = session();
        $this->db = \Config\Database::connect();
    } 

    public function index(){
        if($this->session->has('Kaadaisoft_userId')){
            $name = $this->session->get('name');
            return view('mainpage',array('name'=>$name));
        }
        else{
            return redirect()->to('Loginpage');
        }
    }
    
    public function logout(){
        $this->session->destroy();
        return redirect()->to('Loginpage');
    }
    
  }
?>