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
      $this->view->users = $this->user->all();
      $this->view->render('home/user');
    }

    public function create(){
      $this->user->columns = [
        'username' => $_POST['uname']
      ];
      $this->user->save();
      $this->redirect('user');
    }

    //edit function mag aacept ng id para gamitin hanapin yung selected user
    public function edit($id){
      //gamit ka find na method tas yung parameter is condition then ibigay mo yung value sa user variable ng view para pede mo ma access sa html
      $this->view->user = $this->user->find("id = $id");

      //dito yung view na html
      $this->view->render('home/view_user');
    }

    public function update(){
      //update naman is from viewing ng user, post method din yun kaya accessible yung mga input thru $_POST

      //ayan set ka dito ng iuupdate mo na column sa db
      $columns = [
        'username' => $_POST['uname']
      ];
      //tas gamit ka update na function first param is yung columns, then yung condition kung sinong user yun
      $this->user->update($columns, "id = ".$_POST['id']);
      //tas redirect ka sa main page
      $this->redirect('user');
    }

    public function delete($id){
      //same concept ng edit, mag papasa ng id then gamit ka delete na method
      $this->user->delete("id = $id");
      //tas redirect ka sa main page
      $this->redirect('user');
    }

  }
