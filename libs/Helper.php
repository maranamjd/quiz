<?php
  /**
   *
   */
  class Helper
  {


    public function validity_status($date, $period){
      $expiration = strtotime("$date + $period week");
      $today = strtotime(date('Y-m-d'));
      return $expiration - $today == 0 ? 1 : 'will expire on '.date('F d, Y', $expiration);
    }


    public function count($data){
      return is_array($data) ? count($data) : 0;
    }

    public function get_week($birthday){
      return floor((strtotime(date('Y-m-d')) - strtotime($birthday)) / 604800);
    }

    public function get_next_vaccine($level){
      $date = date("Y-m-d");
      switch ($level) {
        case 1:
        return date("F d, Y", strtotime("$date + 6 week"));
          break;

        case 2:
        case 3:
        return date("F d, Y", strtotime("$date + 4 week"));
          break;

        case 4:
        return date("F d, Y", strtotime("$date + 22 week"));
          break;

        case 5:
        return date("F d, Y", strtotime("$date + 12 week"));
          break;

        case 6:
        return "Child Immunization Complete";
          break;

      }
    }

    public function get_vaccination($level){
      switch ($level) {
        case 1:
        return "1, 2";
          break;

        case 2:
        case 3:
        return "3, 4, 6";
          break;

        case 4:
        return "3, 4, 5, 6";
          break;

        case 5:
        case 6:
        return "7";
          break;
      }
    }

    public function status($status){
      switch ($status) {
        case 0:
          return "<button class='btn btn-warning btn-sm btn-flat'>Pending</button>";
          break;
        case 1:
          return "<button class='btn btn-success btn-sm btn-flat'>Fulfilled</button>";
          break;
        case 2:
          return "<button class='btn btn-secondary btn-sm btn-flat'>Cancelled</button>";
          break;
      }
    }

    public function name_format($firstname, $lastname, $middlename = null, $middleinitial = false){
      $name = ucwords(strtolower($firstname)).' '.ucwords(strtolower($middlename)).' '.ucwords(strtolower($lastname));
      if ($middleinitial) {
        $name = ucwords(strtolower($firstname)).' '.strtoupper($middlename[0]).'. '.ucwords(strtolower($lastname));
        if ($middlename === null) {
          $name = ucwords(strtolower($firstname)).' '.ucwords(strtolower($lastname));
        }
      }
      return $name;
    }

    public function get_age($birthday){
      return floor((time() - strtotime($birthday)) / 31556926);
    }

    public function get_sex($sex){
      return ($sex == 1) ? 'Male' : 'Female';
    }

    public function get_id(){
      $letters = '';
    	$numbers = '';
    	foreach (range('A', 'Z') as $char) {
    	    $letters .= $char;
    	}
    	for($i = 0; $i < 10; $i++){
    		$numbers .= $i;
    	}
    	return substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
    }

    public function exists($array, $return_base = false){
      if ($return_base) {
        return $this->count($array) > 0 ? $array : $this->error();
      }else {
        return $this->count($array) > 0 ? $array[0] : $this->error();
      }
    }

    function error(){
      $error = new Excptn();
      $error->show('404', 'Page not Found!');
      exit;
    }

  }
