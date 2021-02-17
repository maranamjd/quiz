<?php 

require 'models/User.php';

class UserController extends Controller {
  public $user;
    function __contruct(){
        parent:: __construct();
        $this->user = new User();
    }

        public function index(){
       
            $this->view->render('home/user');
        }

        public function create(){
          $this->user->columns = [
            'username' => $_POST['']
          ];
          
          $this->user->save();
        }

} 