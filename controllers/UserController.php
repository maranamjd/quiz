<?php
  
   require 'models/User.php';

  class UserController extends Controller
  {

    function __construct()
    {
      parent::__construct();
      //create instance of a model
      $this->user = new User();
    }

    public function index(){
      $this->view->render('home/user');
    }

    public function create(){
      $this->user->columns = [
        'username' => $_POST['uname']
      ];
      $this->user->save();
    }


  }
