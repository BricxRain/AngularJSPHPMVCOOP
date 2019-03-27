<?php

require_once "classes/DBConn.php";

class InlineTable extends DBConn {

    public function InlineTableGetData() {

        $query = "SELECT * FROM sample ORDER BY id";
        $result = $this->query($query);
        
        return $result;
            
    }

    public function InlineTableInsertData($form_data) {

        $form_single = json_decode($form_data, true); 

        $paramArray = array(
            ':firstname' => $form_single['first_name'],
            ':lastname' => $form_single['last_name']
        );

        $query = "INSERT INTO sample(firstname, lastname) VALUES(:firstname, :lastname)";
        $result = $this->query($query, $paramArray);

        return $result;

    }

    public function InlineTableUpdateData($form_data) {

        $form_single = json_decode($form_data, true); 

        $paramArray = array(
            ':firstname' => $form_single['firstname'],
            ':lastname' => $form_single['lastname'],
            ':id' => $form_single['id']
        );

        $query = "UPDATE sample SET firstname = :firstname, lastname = :lastname WHERE id = :id";
        $result = $this->query($query, $paramArray);

        return $result;

    }

    public function InlineTableDeleteData($id) {

        $paramArray = array(
            ":id" => $id
        );

        $query = "DELETE FROM sample WHERE id = :id";
        $result = $this->query($query, $paramArray);

        return $result;

    }

}