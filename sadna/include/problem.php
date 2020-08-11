<?php
set_include_path('..');
require_once('database.php');

class problem{
public $id;
public $nameOfAuthority;
public $city;
public $phoneOfCitizen; 
public $emailOfCitizen;
public $fullNameCitizen;
public $pdate; 
public $evenType;
public $isopen;
public $img; 
public $price; 
public $avail; 
public $code; 
public $sid; 
public $address; 

public static function update_code($pid, $code){
    global $database;
    $database->query('update `problems` set `code` = "'.$code.'" where `id`="'.$pid.'"');
}
public static function update_sid($pid, $sid){
    global $database;
    $database->query('update `problems` set `sid` = "'.$sid.'" where `id`="'.$pid.'"');
}
public static function update_price($pid, $price){
    global $database;
    $database->query('update `problems` set `price` = "'.$price.'" where `id`="'.$pid.'"');
}
public static function update_avail($pid, $avail){
    global $database;
    $database->query('update `problems` set `avail` = "'.$avail.'" where `id`="'.$pid.'"');
}

        public static function update_isopen($pid, $isopen){
                    global $database;
                    $database->query('update `problems` set `isopen`='.$isopen.' where `id`="'.$pid.'"');
        }

        public static function fetch_all(){
            
            global $database;
            $result_set=$database->query("select * from problems");
            $all=array();
            if (isset($result_set)){
                $i=0;
                if ($result_set->num_rows>0){ 
                    while($row=$result_set->fetch_assoc()){ 
                        $supp=new problem();
                        $supp->instantation($row);
                        $all[$i]=$supp;
                        $i+=1;
                    }
                }
            }
            return $all;
        }

        public static function get_by_id($pid){
            
            global $database;
            $result_set=$database->query('select * from problems where `id`="'.$pid.'"');
            if (isset($result_set)){
                if ($result_set->num_rows>0){ 
                    while($row=$result_set->fetch_assoc()){ 
                        $supp=new problem();
                        $supp->instantation($row);
                        return $supp;
                    }
                }
            }
            return null;
        }

        public static function is_exist($pid){
            
            global $database;
            $result_set=$database->query('select * from problems where `id`="'.$pid.'"');
            if (isset($result_set)){
                if ($result_set->num_rows>0){ 
                    while($row=$result_set->fetch_assoc()){ 
                        
                        return true;
                    }
                }
            }
            return false;
        }
            
        private function has_attribute($attribute){
            
            $object_properties=get_object_vars($this);
            return array_key_exists($attribute,$object_properties);
        }
        
        private function  instantation($user_array){
            foreach ($user_array as $attribute=>$value){
                if ($result=$this->has_attribute($attribute))
                    $this->$attribute=$value;
        }
        }

    public static function add_problem($id, $nameOfAuthority, $city,$phoneOfCitizen, $emailOfCitizen, $fullNameCitizen, $date, $evenType, $img,$address){
            global $database;
            $error=null;
            $sql = "INSERT INTO problems (id, nameOfAuthority, city, phoneOfCitizen ,emailOfCitizen, fullNameCitizen, pdate, evenType, img,isopen, code,price,avail,sid,address)
            VALUES ('$id','$nameOfAuthority','$city',$phoneOfCitizen,'$emailOfCitizen','$fullNameCitizen','$date','$evenType', '$img', 1, '', '', '', '', '$address')";
            $result=$database->query($sql);
            if (!$result)
                $error='Can not add your problem.  Error is:'.$database->get_connection()->error;
                
            else{
                $error=' add problem.';
                echo "<script>  alert('פרטייך נשמרו בהצלחה במאגר, נציג שירות יחזור אליך בהקדם'); </script>";
                
            }
            return $error;

        }
        public function get_id(){
            return $this->id;
        }

            public function get_nameOfAuthority(){
            return $this->nameOfAuthority;
        }
            public function get_city(){
            return $this->city;
        }
        public function get_phoneOfCitizen(){
            return $this->emailOfCitizen;
        }
            public function get_emailOfCitizen(){
                return $this->emailOfCitizen;
            }
            public function get_fullNameCitizen(){
                return $this->fullNameCitizen;
            }
            public function get_date(){
                return $this->date;
            }
            public function get_evenType(){
                return $this->evenType;
            }
            public function get_image(){
                return $this->img;
            }
        }
?>