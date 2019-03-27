<?php

    require_once "classes/DBConn.php";

    class FetchData extends DBConn {

        public function SelectInfo() {
            $query = "SELECT * FROM sample ORDER BY id";
            $statement = $this->connect()->prepare($query);
            if($statement->execute()) {
                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $data[] = $row;
                }
                echo  json_encode($data);
            }
        }

        public function InsertInfo($form_data) {

            $data = [];
            $error = [];
            $message = "";
            $validation_error = "";
            $firstname = "";
            $lastname = "";

            $form_single = json_decode($form_data, true); 

            if ($form_single['action'] == "GET_DATA") {

                $query = "SELECT * FROM sample WHERE id = ".$form_single['id']."";
                $statement = $this->connect()->prepare($query);
                if($statement->execute()) {
                    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $dataArray[] = $row;
                    }
                }

                $output = array(
                    'data' => $dataArray
                );

            } else {

                if(empty($form_single['firstname'])) {
                    $error[] = 'First name is required';
                } else {
                    $firstname = $form_single['firstname'];
                }

                if(empty($form_single['lastname'])) {
                    $error[] = 'Last name is required';
                } else {
                    $lastname = $form_single['lastname'];
                }

                if(empty($error)) {
                    if($form_single['action'] == 'INSERT') {

                        $data = array(
                            ':first_name' => $firstname,
                            ':last_name' => $lastname
                        );

                        $query = "INSERT INTO sample(firstname, lastname) VALUES(:first_name, :last_name)";
                        $statement = $this->connect()->prepare($query);
                        if($statement->execute($data)) {
                            $message = 'Data Inserted';
                        }

                    } else if ($form_single['action'] == 'UPDATE') {

                        $data = array(
                            ':id' => $form_single['id'],
                            ':first_name' => $form_single['firstname'],
                            ':last_name' => $form_single['lastname']
                        );

                        $query = "UPDATE sample SET firstname = :first_name, lastname = :last_name WHERE id = :id";
                        $statement = $this->connect()->prepare($query);
                        if($statement->execute($data)) {
                            $message = "Data Updated";
                        }

                    }
                } else {
                $validation_error = implode(", ", $error);
                }

                $output = array(
                    'error' => $validation_error,
                    'message' => $message
                );

            }

            echo json_encode($output);

        }

        public function DeleteInfo($id) {

            $data = array(
                'id' => $id
            );

            $query = "DELETE FROM sample WHERE id = :id";
            $statement = $this->connect()->prepare($query);
            if($statement->execute($data)) {
                $output = array(
                    'message' => 'Data Deleted'
                );
            } else {
                $output = array(
                    'message' => 'ERROR!!'
                );
            }

            echo json_encode($output);

        }

    }
