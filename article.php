<?php
class Article{
    private $conn;
    private $table = "article";
    private $table2 = "users";

    public $article_id;
    public $user_id;
    public $title;
    public $content;

    public function __construct($db){
        $this->conn = $db;
    }

    public function getDataArticle(){
        $query = "SELECT * FROM $this->table ORDER BY `article_id` DESC";
        return $this->conn->query($query);
    }
    
    public function getArticleDetail() {
        $query = "SELECT * FROM $this->table INNER JOIN $this->table2 ON $this->table.user_id=$this->table2.user_id  WHERE article_id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("i", $this->article_id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            return $result->fetch_assoc();
        }else{
            return false;
        }
    }

    // Seacrh Data Basis KOLOM yg disebut
    public function searchDataArticle(){
        $query = "SELECT * FROM $this->table WHERE title LIKE ? OR content LIKE ?";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bind_param("ss", $this->title, $this->content);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }
    }

    public function addArticle(){
        $query = "INSERT INTO $this->table (user_id, title, content) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("iss", $this->user_id,$this->title,$this->content);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function updateArticle(){
        $query = "UPDATE $this->table SET user_id=?, title=?, content=? WHERE article_id=?";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("issi", $this->user_id,$this->title,$this->content, $this->article_id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteArticle(){
        $query = "DELETE FROM $this->table WHERE article_id=?";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("i", $this->article_id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>