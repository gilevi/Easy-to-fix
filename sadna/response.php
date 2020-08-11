<?php


require 'src/medoo.php';
 
// Using Medoo namespace
use Medoo\Medoo;
 
// Initialize
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'id9097527_easytofix',
    'server' => 'localhost',
    'username' => 'id9097527_easytofix',
    'password' => '123456789'
]);






$fullname= $_GET['fullname']; 
$timetoget= $_GET['timetoget']; 
$price= $_GET['price']; 

 
// Enjoy
$database->insert("users", [
    'fullname' => $fullname,
    'timetoget' => $timetoget, 
    'price' => $price
]);
 
 $data = $database->select('account', [
     'user_name',
     'email'
 ], [
     'user_id' => 50
 ]);
 
echo json_encode($data);
 
[
    {
        "user_name" : "foo",
        "email" : "foo@bar.com"
    }
]








// require_once('database.php');


        public static function fetch_users(){
            
            global $database;
            $result_set=$database->query("select * from response_chatbot");
            $response=null;
            if (isset($result_set)){
                $i=0;
                if ($result_set->num_rows>0){ 
                    while($row=$result_set->fetch_assoc()){ 
                        $res=new response();
                        $res->instantation($row);
                        $res[$i]=$cont;
                        $i+=1;
                    }
                }
            }
            return $res;
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

    public static function response($fullname, $timetoget, $price){
            global $database;
            $error=null;
            $sql = "INSERT INTO response_chatbot (fullname, timetoget, price)
            VALUES ('$fullname','$timetoget','$price')";
            $result=$database->query($sql);
            if (!$result)
                $error='Can not add supplier.  Error is:'.$database->get_connection()->error;
                
            else{
                $error=' add response.';
                echo "<script>  alert('פרטייך נשמרו בהצלחה במאגר, נציג שירות יחזור אליך בהקדם'); </script>";
                
            }
            return $error;

        }
        public function get_fullname(){
            return $this->fullname;
        }

            public function get_timetoget(){
            return $this->timetoget;
        }
            public function get_price(){
            return $this->price;
        }
          
        
?>