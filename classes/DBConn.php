<?php

    class DBConn {

        public $host = 'localhost';
        public $username = 'root';
        public $password = '';
        public $dbname = 'angularphp';

        public function connect() {
            $connection = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
            $connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
            return $connection;
        }

        public function query($query, $params = array()) {

            $statement = $this->connect()->prepare($query);

            if($statement->execute($params)) {

                if( explode(" ", strtoupper($query))[0] == "SELECT" ) {
                    $data = array( 
                        "data" => $statement->fetchAll()
                    );
                } else if( explode(" ", strtoupper($query))[0] == "UPDATE" ) {
                    $data = array( 
                        "data" => "Data has been updated"
                    );
                } else if( explode(" ", strtoupper($query))[0] == "INSERT" ) {
                    $data = array( 
                        "data" => "Data has been inserted"
                    );
                } else if( explode(" ", strtoupper($query))[0] == "DELETE" ) {
                    $data = array( 
                        "data" => "Data has been deleted"
                    );
                }

                echo json_encode($data);

            }

            
        }

    }



