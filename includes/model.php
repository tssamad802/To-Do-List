<?php
class model
{
    public $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert(string $title, string $description)
    {
        $sql = "INSERT INTO `mylist` (title, description) VALUES (:title, :description)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->execute();
        header('Location: ../index.php?success');
        return true;
    }

    public function fetch_all()
    {
        $sql = "SELECT * FROM `mylist`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM `mylist` WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header('Location: ../index.php?deleted');
        return true;
    }

    public function pre_filled($id)
    {
        $sql = "SELECT * FROM `myList` WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($id, $title, $description, $status)
    {
        $sql = "UPDATE `mylist` SET title = :title, `description` = :description, `status`=:status WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        header('Location: ../index.php?updated');
        return true;
    }
}
?>