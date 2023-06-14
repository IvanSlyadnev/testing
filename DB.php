<?php

class DB {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=test', 'root', 'password');       
    }

    public function get(string $table, ?array $conditions = []) {
        $rows = [];
        $sql = "select * from " . $table;
        foreach($conditions as $key => $condition) {
            $sql .= (($key > 0) ? ' and ' : ' where ') .$condition[0]. $condition[1]. $condition[2]. ' ';
        }
        $sql .= ';';
        $result = $this->db->query($sql);

        if ($result) {
            while ($row = $result->fetch()) {
                $rows []= $row;
            }
            return $rows;
        }

        return json_encode(['error' => 'db error']);

    }
}