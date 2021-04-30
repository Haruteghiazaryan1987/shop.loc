<?php

include_once "iDatabase.php";
class Database implements iDatabase {
    private $conn;
    private $table = null;
    // var_dump($conn);
    public function __construct($table) {
        $this->setTable($table);
        $this->connect();
    }

    public function setTable($table) {
        $this->table = $table;
    }

    public function insert($data) {

        $fieldsArr = [];
        $valuesArr = [];
        foreach ($data as $field => $value) {
            $fieldsArr[] = "`$field`";
            $valuesArr[] = "'$value'";
        }
        echo "<pre>";
        $fieldsStr = implode(',', $fieldsArr);
        $valuesStr = implode(',', $valuesArr);

        var_dump($fieldsArr);
        var_dump($valuesArr);

        $query = "INSERT INTO `$this->table`($fieldsStr) VALUES ($valuesStr)";
        $this->query($query);
        var_dump($query);
    }

    private function query($query) {
        return mysqli_query($this->conn, $query);
    }

    public function update($data) {
        $fieldsArr = [];
        $id = null;
        foreach ($data as $field => $value) {
            if ($field == 'id') {
                $id = $value;
            } else {
                $fieldsArr[] = "`$field`" . " = " . "'$value'";
            }
        }
        echo "<pre>";
        $fieldsStr = implode(', ', $fieldsArr);

        var_dump($fieldsArr);

        $query = "UPDATE `$this->table` SET $fieldsStr WHERE `id`= $id";
        $this->query($query);
    }

    public function select($what = null) {
        $array=array();
        if ($what) {
            $fieldsArr = [];

            foreach ($what as $field => $value) {
                $fieldsArr[] = "AND `$field`" . " = " . "'$value'";
            }

            echo "<pre>";
            $fieldsStr = implode(' ', $fieldsArr);
            $fieldsStr = substr($fieldsStr, 4);
            var_dump($fieldsStr);

            $query = "SELECT `id`, `firstname`, `lastname`, `age` FROM `$this->table` WHERE $fieldsStr";
        } else {
            $query = "SELECT `id`, `firstname`, `lastname`, `age` FROM `$this->table`";
        }
        $result = $this->query($query);

        return mysqli_fetch_all($result,1);
    }

    public function delete($what = null) {
        if ($what) {
            $fieldsArr = [];

            foreach ($what as $field => $value) {
                $fieldsArr[] = "AND `$field`" . " = " . "'$value'";
            }

            $fieldsStr = implode(' ', $fieldsArr);
            $fieldsStr = substr($fieldsStr, 4);

            $query = "DELETE FROM `$this->table` WHERE $fieldsStr";
        } else {
            $query = "DELETE FROM `users` `$this->table`";
        }

        $result = $this->query($query);
    }
    private function connect() {
        $config = parse_ini_file("config/db.ini");
        $this->conn = new mysqli($config['host'], $config['user'], $config['password'], $config['db_name']);
    }
}
