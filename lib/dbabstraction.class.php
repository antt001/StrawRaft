<?php
/**
 *
 * @Lite weight Database abstraction layer
 *
 * @copyright
 *
 * @license Creative Commons Attribution 3.0 Unported CC http://creativecommons.org/licenses/by/3.0/
 * @filesource
 * @package Database
 * @Based on Kevin Waterson PHPRO.ORG
 *
 */
if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
    die ('<h2>Direct File Access Prohibited</h2>');


class dbAbstraction {

    /*
	 * @the errors array
    */
    public $errors = array();

    /*
	 * @The sql query
    */
    private $sql;

    /**
     * @The name=>value pairs
     */
    private $values = array();

    /**
     *
     * @add a value to the values array
     *
     * @access public
     *
     * @param string $key the array key
     *
     * @param string $value The value
     *
     */
    public function addValue($key, $value) {
        $this->values[$key] = $value;
    }


    /**
     *
     * @set the values
     *
     * @access public
     *
     * @param array
     *
     */
    public function setValues($array) {
        $this->values = $array;
    }

    /**
     *
     * @delete a recored from a table
     *
     * @access public
     *
     * @param string $table The table name
     *
     * @param int ID
     *
     */
    public function delete($table, $pk, $id) {
        try {
            // get the primary key name
            //$pk = $this->getPrimaryKey($table);
            $sql = "DELETE FROM $table WHERE $pk=:$pk";
            $db = db::getInstance();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":$pk", $id);
            $stmt->execute();
        }
        catch(Exception $e) {
            $this->errors[] = $e->getMessage();
        }
    }


    /**
     *
     * @insert a record into a table
     *
     * @access public
     *
     * @param string $table The table name
     *
     * @param array $values An array of fieldnames and values
     *
     * @return int The last insert ID
     *
     */
    public function insert($table, $values=null) {
        $values = is_null($values) ? $this->values : $values;
        $sql = "INSERT INTO $table SET ";

        $obj = new CachingIterator(new ArrayIterator($values));

        try {
            $db = db::getInstance();
            foreach( $obj as $field=>$val) {
                $sql .= "$field = :$field";
                $sql .=  $obj->hasNext() ? ',' : '';
                $sql .= "\n";
            }
            $stmt = $db->prepare($sql);

            // bind the params
            foreach($values as $k=>$v) {
                $stmt->bindParam(':'.$k, $v);
            }
            $stmt->execute($values);
            // return the last insert id
            return $db->lastInsertId();
        }
        catch(Exception $e) {
            $this->errors[] = $e->getMessage();
        }
    }


    /**
     * @update a table
     *
     * @access public
     *
     * @param string $table The table name
     *
     * @param int $id
     *
     */
    public function update($table, $pk, $id, $values=null) {
        $values = is_null($values) ? $this->values : $values;
        try {
            // get the primary key/
            //$pk = $this->getPrimaryKey($table);

            // set the primary key in the values array
            $values[$pk] = $id;

            $obj = new CachingIterator(new ArrayIterator($values));

            $db = db::getInstance();
            $sql = "UPDATE $table SET \n";
            foreach( $obj as $field=>$val) {
                $sql .= "$field = :$field";
                $sql .= $obj->hasNext() ? ',' : '';
                $sql .= "\n";
            }
            $sql .= " WHERE $pk=$id";
            $stmt = $db->prepare($sql);

            // bind the params
            foreach($values as $k=>$v) {
                $stmt->bindParam(':'.$k, $v);
            }
            // bind the primary key and the id
            $stmt->bindParam($pk, $id);
            $stmt->execute($values);

            // return the affected rows
            return $stmt->rowCount();
        }
        catch(Exception $e) {
            $this->errors[] = $e->getMessage();
        }
    }


    /**
     *
     * Fetch all records from table
     *
     * @access public
     *
     * @param $table The table name
     *
     * @return array
     *
     */
    public function query() {
        try {
            $res = db::getInstance()->query($this->sql);
            return $res;
        }
        catch(Exception $e) {
            $this->errors[] = $e->getMessage();
            print_r($this->errors);
            print_r($this->sql);
            die;
        }
    }

    /**
     *
     * Fetch all records from table
     *
     * @access public
     *
     * @param $res The query result
     *
     * @return array
     *
     */
    public function fetch($res) {
        $result = $res->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     *
     * Returns the number of rows affected by the last SQL statement
     *
     * @access public
     *
     * @param $res The query result
     *
     * @return array
     *
     */
    public function fetchAll($res) {
        $result = $res->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     *
     * @select statement
     *
     * @access public
     *
     * @param string $vars
     *
     */
    public function select($vars) {
        $this->sql = "SELECT $vars";
    }

    /**
     *
     * @select statement
     *
     * @access public
     *
     * @param string $table
     *
     */
    public function from($table) {
        $this->sql .= " FROM $table";
    }

    /**
     * @where clause
     *
     * @access public
     *
     * @param string $field
     *
     * @param string $value
     *
     */
    public function where($field, $value) {
        $this->sql .= " WHERE $field=$value";
    }

    /**
     *
     * @set limit
     *
     * @access public
     *
     * @param int $offset
     *
     * @param int $limit
     *
     * @return string
     *
     */
    public function limit($offset, $limit) {
        $this->sql .= " LIMIT $offset, $limit";
    }

    /**
     *
     * @add an AND clause
     *
     * @access public
     *
     * @param string $field
     *
     * @param string $value
     *
     */
    public function andClause($field, $value) {
        $this->sql .= " AND $field=$value";
    }


    /**
     *
     * Add and order by
     *
     * @param string $fieldname
     *
     * @param string $order
     *
     */
    public function orderBy($fieldname, $order='ASC') {
        $this->sql .= " ORDER BY $fieldname $order";
    }
} // end of class

?>
