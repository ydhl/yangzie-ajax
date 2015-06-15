<?php 
class YZE_DB_PDO extends YZE_DB{
    /**
     * @var PDO
     */
    private $db;
    
    public function __construct($db){
        $this->db = $db;
    }
    public function lookup($field, $table, $where) {
        $sql = "SELECT $field as f FROM $table";
        if ($where) $sql .= " WHERE $where";
        $stm = $this->db->query($sql);
        if ($stm == false) return null;
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return @$row['f'];
    }
    
    public function lookup_record($fields, $table, $where) {
        $sql = "SELECT $fields FROM $table";
        if ($where) $sql .= " WHERE $where";
        $stm = $this->db->query($sql);
        if ($stm == false) return array();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function lookup_records($fields, $table, $where) {
        $sql = "SELECT $fields FROM $table";
        if ($where) $sql .= " WHERE $where";
        $stm = $this->db->query($sql);
        if ($stm == false) return array();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update($table, $fields, $where, $values) {
        $sql = "UPDATE $table SET $fields";
        if ($where) $sql .= " WHERE $where";
    
        $stm = $this->db->prepare($sql);
        if ( ! $stm ) return false;
        return $stm->execute($values);
    }
    
    public function delete($table, $where) {
        $sql = "DELETE FROM $table";
        if ($where) $sql .= " WHERE $where";
    
        return $this->db->exec($sql) !== false ? true : false;
    }
    
    public function insert($table, $info) {
        if ( ! is_array($info) || empty($info) || empty($table))
            return false;
    
    
        $sql_fields     = "";
        $sql_values     = "";
        $values         = array();
        foreach ($info as $f => $v) {
            $sql_fields  .= "`" . $f . "`,";
            $sql_values  .= ":" . $f . ",";
    
            $values[":" . $f] = $v;
        }
        $sql_fields  = rtrim($sql_fields, ",");
        $sql_values  = rtrim($sql_values, ",");
    
        $sql = "INSERT INTO {$table} ({$sql_fields}) VALUES ({$sql_values})";
    
        $stm = $this->db->prepare($sql);
        if ( ! $stm->execute($values) ) {
            return false;
        }
        if ($info["id"]) return $info["id"];
    
        return $this->db->lastInsertId();
    }
    
    public function table_fields($table) {
        $sql="show columns from $table";
        $stm=$this->db->query($sql);
    
        $fileds = array();
        if($stm){
            while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
                $fileds[] = $row['Field'];
            }
        }
    
        return $fileds;
    }
    
}