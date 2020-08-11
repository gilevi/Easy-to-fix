<?php
set_include_path('..');
require_once('database.php');

class supplier{
    public $id;
public $fullname;
public $city;
public $phone;
public $specialization;
public $email;
public $date; 
public $comments;

        public static function fetch_all_from($city){
            
            global $database;
            $result_set=$database->query('select * from supplier where `city`="'.$city.'"');
            $all=array();
            if (isset($result_set)){
                $i=0;
                if ($result_set->num_rows>0){ 
                    while($row=$result_set->fetch_assoc()){ 
                        $supp=new supplier();
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
            $result_set=$database->query('select * from supplier where `id`="'.$pid.'"');
            if (isset($result_set)){
                if ($result_set->num_rows>0){ 
                    while($row=$result_set->fetch_assoc()){ 
                        $supp=new supplier();
                        $supp->instantation($row);
                        return $supp;
                    }
                }
            }
            return null;
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

    public static function add_supplier($fullname, $city, $phone, $specialization, $email, $date,$comments){
            global $database;
            $error=null;
            $sql = "INSERT INTO supplier (fullname, city, phone, specialization, email, Sdate, comments)
            VALUES ('$fullname','$city','$phone','$specialization','$email','$date','$comments')";
            $result=$database->query($sql);
            if (!$result)
                $error='Can not add supplier.  Error is:'.$database->get_connection()->error;
                
            else{
                $error=' add supplier.';
                echo "<script>  alert('פרטייך נשמרו בהצלחה במאגר, נציג שירות יחזור אליך בהקדם'); </script>";
                
            }
            return $error;

        }
        public function get_fullName(){
            return $this->fullname;
        }

            public function get_city(){
            return $this->city;
        }
            public function get_phoneNumber(){
            return $this->phone;
        }
            public function get_specialization(){
                return $this->specialization;
            }
            public function get_email(){
                return $this->email;
            }
            public function get_date(){
                return $this->date;
            }
            public function get_comments(){
                return $this->comments;
            }
        }
?>