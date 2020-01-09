<?php
class Database{
        public $hostbd = DB_HOST;
        public $userbd = DB_USER;
        public $passdb = DB_PASS;
        public $namedb = DB_NAME;


        public $link;
        public $error;


        public function __construct(){
            $this->dbConnection();
        }

        private function dbConnection(){
            $this->link = new mysqli($this->hostbd, $this->userbd, $this->passdb, $this->namedb);
            if (!$this->link) {
                $this->error = "Connection Error".$this->link->connect_error;
                return false;
            }
        }



        // select or read data
        public function select($query){
            $result = $this->link->query($query) or dia($this->link->error.__LINE__);
            if ($result->num_rows > 0) {
                return $result;
            }else{
                return false;
            }
        }

        public function insert($query){
            $result = $this->link->query($query) or dia($this->link->error.__LINE__);
            if ($result) {
                return $result;
            }else{
                return false;
            }
        }

//        update
        public function update($query){
            $result = $this->link->query($query) or dia($this->link->error.__LINE__);
            if ($result) {
                return $result;
            }else{
                return false;
            }
        }
        //        delete
        public function delete($query){
            $result = $this->link->query($query) or dia($this->link->error.__LINE__);
            if ($result) {
                return $result;
            }else{
                return false;
            }
        }

	}
?>