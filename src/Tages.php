<?php
require_once __DIR__."/loger.php";
require_once __DIR__."/Database.php";


class tag
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

    public function addtag()
    {
        try {
            $db = Database::getConnection();
            $query = "INSERT INTO tags (name) VALUES (:name)";
            $stmt = $db->prepare($query);
            $stmt->execute(['name' => $this->name]);

            $this->id = $db->lastInsertId();
            global $log;
            $log->info('New tag added');
            return "tag successfully added.";

        } catch (PDOException $e) {
            global $log;
            $log->error("Error adding tag: " . $e->getMessage());
        }
    }

    public function deletetag()
    {
        try {
            $db = Database::getConnection();
            $query = "DELETE FROM tags WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute(['id' => $this->id]);
            global $log;
            $log->info('tag with id "'.$this->id.'" deleted');
            return "tag successfully deleted.";
        } catch (PDOException $e) {
            global $log;
            $log->error("Error deleting tag: " . $e->getMessage());
        }
    }
    public function updatetag()
    {
        try {
            $db = Database::getConnection();
            $query = "UPDATE tags SET name = :name WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'name' => $this->name,
                'id' => $this->id,
            ]);

            return "tag successfully updated.";
        } catch (PDOException $e) {
            return "Error updating tag: " . $e->getMessage();
        }
    }
    public function gettagDetails($tagId)
    {
        try {
            $db = Database::getConnection();
            $query = "SELECT * FROM tags WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute(['id' => $tagId]);

            return $stmt->fetch(PDO::FETCH_ASSOC) ?? "tag not found.";
        } catch (PDOException $e) {
            return "Error fetching tag details: " . $e->getMessage();
        }
    }

    public static function getAlltags()
    {
        try {
            $db = Database::getConnection();
            $query = "SELECT * FROM tags";
            $stmt = $db->query($query);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            global $log;
            $log->error("Error fetching tags: " . $e->getMessage());
        }
    }
}
