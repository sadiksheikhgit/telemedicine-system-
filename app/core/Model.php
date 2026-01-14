<?php

trait Model
{
    use Database;

    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = "desc";
    protected $order_column = "id";
    public $errors = [];

    public function distinct($column)
    {
//        $query = "SELECT DISTINCT $column FROM $this->table ORDER BY $this->order_column $this->order_type limit $this->limit offset $this->offset";
//        return $this->query($query);
        // mysqli procedural query
        $conn = $this->connect();
        $query = "SELECT DISTINCT $column FROM $this->table ORDER BY $this->order_column $this->order_type limit $this->limit offset $this->offset";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        mysqli_close($conn);
    }

    public function find_all($limit = 10)
    {
//        $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type limit $this->limit offset $this->offset";
////        var_dump($query);
//        return $this->query($query);
        // mysqli procedural query
        $conn = $this->connect();
        $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type limit $limit offset $this->offset";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        mysqli_close($conn);
    }

    public function get_paginated($limit, $offset)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        return $this->find_all(3);
    }

//    public function where($data, $data_not = [])
//    {
//        // we get the values separately to avoid confusion in the query
//        // lastly we merge them before executing the query
//
//        $keys = array_keys($data); // get the keys of the data array
//        $keys_not = array_keys($data_not);
//        $query = "SELECT * FROM $this->table WHERE ";
//
//        foreach ($keys as $key) {
//            $query .= $key . " = :" . $key . " && ";
//        }
//        foreach ($keys_not as $key) {
//            $query .= $key . " != :" . $key . " && ";
//        }
//        $query = trim($query, " && ");
//        $query .= " ORDER BY $this->order_column $this->order_type limit $this->limit offset $this->offset";
//        echo $query;
//        $data = array_merge($data, $data_not);
//
//        return $this->query($query, $data);
//    }
    public function where($data, $data_not = [])
    {
        $conn = $this->connect();
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= $key . " = ? AND ";
        }
        foreach ($keys_not as $key) {
            $query .= $key . " != ? AND ";
        }
        $query = rtrim($query, " AND ");
        $query .= " ORDER BY $this->order_column $this->order_type limit $this->limit offset $this->offset";

        $stmt = $conn->prepare($query);
        if ($stmt) {
            $types = str_repeat('s', count($data) + count($data_not));
            $values = array_merge(array_values($data), array_values($data_not));
            $stmt->bind_param($types, ...$values);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                return $result->fetch_array(MYSQLI_ASSOC);
            }
        }
        $stmt->close();
        $conn->close();
    }

//    public function first($data, $data_not = [])
//    {
//        $keys = array_keys($data);
//        $keys_not = array_keys($data_not);
//        $query = "SELECT * FROM $this->table WHERE ";
//
//        foreach ($keys as $key) {
//            $query .= $key . " = :" . $key . " && ";
//        }
//        foreach ($keys_not as $key) {
//            $query .= $key . " != :" . $key . " && ";
//        }
//        $query = trim($query, " && ");
//        $query .= " limit $this->limit offset $this->offset";
////        echo $query;
//        $data = array_merge($data, $data_not);
//
//        $result = $this->query($query, $data);
//        if ($result) {
//            return $result[0];
//        }
//        return false;
//    }
    public function first($data, $data_not = [])
    {
        $conn = $this->connect();
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= $key . " = ? AND ";
        }
        foreach ($keys_not as $key) {
            $query .= $key . " != ? AND ";
        }
        $query = rtrim($query, " AND ");
        $query .= " ORDER BY $this->order_column $this->order_type limit $this->limit offset $this->offset";

        $stmt = $conn->prepare($query);
        if ($stmt) {
            $types = str_repeat('s', count($data) + count($data_not));
            $values = array_merge(array_values($data), array_values($data_not));
            $stmt->bind_param($types, ...$values);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                return $result->fetch_array(MYSQLI_ASSOC);
            }
        }
        $stmt->close();
        $conn->close();
    }

//    public function insert($data)
//    {
//        $keys = array_keys($data); // get the keys of the data array
//        $query = "INSERT INTO $this->table (" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";
//        $this->query($query, $data);
//
//        return false;
//    }
public function insert($data) // mysqli procedural insert
{
    $keys = array_keys($data);
    $columns = implode(",", $keys);
    $placeholders = rtrim(str_repeat("?,", count($keys)), ",");
    $query = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
    
    $conn = $this->connect();
    $stmt = $conn->prepare($query);
    if ($stmt){
        $types = '';
        $values = [];
        foreach ($data as $value){
            if(is_int($value)){
                $types .= 'i';
            } elseif (is_float($value)){
                $types .= 'd';
            } elseif(is_string($value)){
                $types .= 's';
            } else {
                $types .= 'b'; 
            }
            $values[] = $value;
        }
        $stmt->bind_param($types, ...$values);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }
    
}

//    public function update($id, $data, $id_column = 'id')
//    {
//        // filter the data to only allowed columns
//        if (!empty($this->allowedColumns)) {
//            foreach ($data as $key => $value) {
//                if (!in_array($key, $this->allowedColumns)) {
//                    unset($data[$key]);
//                }
//            }
//        }
//        $keys = array_keys($data); // get the keys of the data array
//        $query = "UPDATE $this->table SET  ";
//
//        foreach ($keys as $key) {
//            $query .= $key . " = :" . $key . ", ";
//        }
//
//        $query = trim($query, ", ");
//        $query .= " WHERE $id_column = :$id_column ";
//        $data[$id_column] = $id;
//
//        echo $query;
//        $this->query($query, $data);
//        return false;
//    }
    public function update($id, $data, $id_column = 'id')
    {
        $setParts = [];

        foreach ($data as $column => $value) {
            $setParts[] = "$column = ?";
        }

        $setClause = implode(", ", $setParts);

        $query = "UPDATE {$this->table} SET {$setClause} WHERE {$id_column} = ?";

        $conn = $this->connect();
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            return false;
        }

        $types = '';
        $values = [];

        foreach ($data as $value) {
            if (is_int($value)) {
                $types .= 'i';
            } elseif (is_float($value)) {
                $types .= 'd';
            } elseif (is_string($value)) {
                $types .= 's';
            } else {
                $types .= 'b';
            }
            $values[] = $value;
        }

        // bind ID (usually integer)
        $types .= 'i';
        $values[] = $id;

        $stmt->bind_param($types, ...$values);

        $result = $stmt->execute();

        $stmt->close();
        $conn->close();

        return $result;
    }


//    public function delete($id, $id_column = 'id')
//    {
//        $data[$id_column] = $id;
//        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column ";
//
//        echo $query;
//        $this->query($query, $data);
//        return false;
//    }
// mysqli procedural delete
    public function delete($id, $id_column = 'id')
    {
        $conn = $this->connect();
        $query = "DELETE FROM $this->table WHERE $id_column = ? ";
        var_dump($query);
        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param('i', $id);
            $result = $stmt->execute();
            $stmt->close();
            $conn->close();
            return $result;
        }
    }

}