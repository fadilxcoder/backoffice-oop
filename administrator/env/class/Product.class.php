<?php

class Product extends AbstractTask
{
    private $_db;
    private $_tableName = 'products';

    public $_id;
    public $_category_id;
    public $_name;
    public $_description;
    public $_main_image;
    public $_price;

    CONST UPLOAD_PATH = '../images';

    public function __construct($db)
    {
        $this->_db = $db;
    }
    public function getLatestProduct()
    {
        $sql = "SELECT * FROM ".$this->_tableName." ORDER BY id DESC LIMIT 10";
        $query = $this->_db->query($sql);
        $result = $this->convertToArray($query);
        return $result;
    }

    public function read()
    {
        $sql = "SELECT * FROM ".$this->_tableName." ORDER BY id DESC";
        $query = $this->_db->query($sql);
        $result = $this->convertToArray($query);
        return $result;
    }

    public function readOne()
    {
        $sql = "SELECT * FROM ".$this->_tableName." WHERE id = :id";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':id', $this->_id);
        $query->execute() or die(print_r($query->errorInfo(), true));
        $result = $this->convertToArray($query);
        return $result;
    }

    public function readByCategory()
    {
        $sql = "SELECT * FROM ".$this->_tableName." WHERE category_id = :cid";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':cid', $this->_category_id);
        $query->execute() or die(print_r($query->errorInfo(), true));
        $result = $this->convertToArray($query);
        return $result;
    }

    public function create()
    {
        $this->_category_id = htmlspecialchars(strip_tags($this->_category_id));
        $this->_name        = htmlspecialchars(strip_tags($this->_name));
        $this->_description = htmlspecialchars(strip_tags($this->_description));
        $this->_price       = htmlspecialchars(strip_tags($this->_price));

        if(isset($this->_main_image['name']) && $this->_main_image['name']!="" ):
            $file_name      = $this->_main_image['name'];
            $file_size      = $this->_main_image['size'];
            $file_tmp       = $this->_main_image['tmp_name'];
            $file_type      = $this->_main_image['type'];
            $temp = explode(".", $this->_main_image["name"]);
            $newfile = 'pro-main-'.round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($file_tmp, self::UPLOAD_PATH."/".$newfile);
            $this->_main_image = $newfile;
        else:
            $this->_main_image = 'placeholder.jpg';
        endif;

        $sql = "INSERT INTO ".$this->_tableName." (category_id, name, description, main_image, price) VALUES (:category_id, :name, :description, :main_image, :price)";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':category_id', $this->_category_id);
        $query->bindParam(':name', $this->_name);
        $query->bindParam(':description', $this->_description);
        $query->bindParam(':main_image', $this->_main_image);
        $query->bindParam(':price', $this->_price);
        $query->execute() or die(print_r($query->errorInfo(), true));
        $iid = $this->_db->lastInsertId();
        header('Location: products.php?iid='.$iid);
        exit();
    }

    public function edit()
    {
        $this->_category_id = htmlspecialchars(strip_tags($this->_category_id));
        $this->_name        = htmlspecialchars(strip_tags($this->_name));
        $this->_description = htmlspecialchars(strip_tags($this->_description));
        $this->_price       = htmlspecialchars(strip_tags($this->_price));
        $this->_id          = htmlspecialchars(strip_tags($this->_id));

        if(isset($this->_main_image['name']) && $this->_main_image['name']!="" ):
            $file_name      = $this->_main_image['name'];
            $file_size      = $this->_main_image['size'];
            $file_tmp       = $this->_main_image['tmp_name'];
            $file_type      = $this->_main_image['type'];
            $temp = explode(".", $this->_main_image["name"]);
            $newfile = 'pro-main-'.round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($file_tmp, self::UPLOAD_PATH."/".$newfile);
            $this->_main_image = $newfile;
            $sql = "UPDATE ".$this->_tableName." SET main_image = :main_image WHERE id = :id";
            $query = $this->_db->prepare($sql);
            $query->bindParam(':main_image', $this->_main_image);
            $query->BindParam(':id', $this->_id);
            $query->execute() or die(print_r($query->errorInfo(), true));
        endif;

        $sql = "UPDATE ".$this->_tableName." SET category_id = :category_id, name = :name, description = :description, price = :price WHERE id = :id";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':category_id', $this->_category_id);
        $query->bindParam(':name', $this->_name);
        $query->bindParam(':description', $this->_description);
        $query->bindParam(':price', $this->_price);
        $query->bindParam(':id', $this->_id);
        $query->execute() or die(print_r($query->errorInfo(), true));
        header('Location: products.php?iid='.$this->_id);
        exit();
    }

    public function delete()
    {
        $sql = "DELETE FROM ".$this->_tableName." WHERE id = :id";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':id', $this->_id);
        $query->execute() or die(print_r($query->errorInfo(), true));
        header('Location: products.php');
        exit();
    }
}