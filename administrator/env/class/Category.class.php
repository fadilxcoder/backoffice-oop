<?php

class Category extends AbstractTask
{
    private $_db;
    private $_tableName = 'category';

    public $_id;
    public $_cat_name;
    public $_ordering;

    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function getList()
    {
        $sql = "SELECT * FROM ".$this->_tableName." ORDER BY ordering ASC";
        $query = $this->_db->query($sql);
        $result = $this->convertToArray($query);
        return $result;
    }

    public function getOneCategory()
    {
        $sql = "SELECT * FROM ".$this->_tableName." WHERE id = :id";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':id', $this->_id);
        $query->execute() or die(print_r($query->errorInfo(), true));
        $result = $this->convertToArray($query);
        return $result;
    }

    public function create()
    {
        $this->_cat_name = htmlspecialchars(strip_tags($this->_cat_name));
        $this->_ordering = htmlspecialchars(strip_tags($this->_ordering));
        $sql = "INSERT INTO ".$this->_tableName." (cat_name, ordering) VALUES (:cat_name, :ordering)";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':cat_name', $this->_cat_name);
        $query->bindParam(':ordering', $this->_ordering);
        $query->execute() or die(print_r($query->errorInfo(), true));
        $cid = $this->_db->lastInsertId();
        header('Location: category.php?cid='.$cid);
        exit();
    }

    public function delete()
    {
        $sql = "DELETE FROM ".$this->_tableName." WHERE id = :id";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':id', $this->_id);
        $query->execute() or die(print_r($query->errorInfo(), true));
        header('Location: category.php');
        exit();
    }
}