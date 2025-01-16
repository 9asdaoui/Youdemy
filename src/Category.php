<?php
require_once __DIR__."/loger.php";
require_once __DIR__."/Database.php";


class Category
{
    private $id;
    private $name;

    public function __construct($id = null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(){return $this->id;}

    public function setId($id){$this->id = $id;}

    public function getName(){return $this->name;}

    public function setName($name){$this->name = $name;}

    public function addCategory()
    {
        try {
            $db = Database::getConnection();
            $query = "INSERT INTO Categories (name) VALUES (:name)";
            $stmt = $db->prepare($query);
            $stmt->execute(['name' => $this->name]);

            $this->id = $db->lastInsertId();
            global $log;
            $log->info('New Category added');
            return "Category successfully added.";

        } catch (PDOException $e) {
            global $log;
            $log->error("Error adding category: " . $e->getMessage());
        }
    }

    public function deleteCategory()
    {
        try {
            $db = Database::getConnection();
            $query = "DELETE FROM Categories WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute(['id' => $this->id]);
            global $log;
            $log->info('Category with id "'.$this->id.'" deleted');
            return "Category successfully deleted.";
        } catch (PDOException $e) {
            global $log;
            $log->error("Error deleting category: " . $e->getMessage());
        }
    }
    public function updateCategory()
    {
        try {
            $db = Database::getConnection();
            $query = "UPDATE Categories SET name = :name WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'name' => $this->name,
                'id' => $this->id,
            ]);

            return "Category successfully updated.";
        } catch (PDOException $e) {
            return "Error updating category: " . $e->getMessage();
        }
    }
    public function getCategoryDetails($categoryId)
    {
        try {
            $db = Database::getConnection();
            $query = "SELECT * FROM Categories WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute(['id' => $categoryId]);

            return $stmt->fetch(PDO::FETCH_ASSOC) ?? "Category not found.";
        } catch (PDOException $e) {
            return "Error fetching category details: " . $e->getMessage();
        }
    }

    public static function getAllCategories()
    {
        try {
            $db = Database::getConnection();
            $query = "SELECT * FROM Categories";
            $stmt = $db->query($query);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            global $log;
            $log->error("Error fetching categories: " . $e->getMessage());
        }
    }
}
