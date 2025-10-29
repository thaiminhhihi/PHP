<?php
require_once "Database.php";
class Book
{
    private $title;
    private $author;
    private $year;
    public function __construct($title, $author, $year)
    {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getYear()
    {
        return $this->year;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    public function setYear($year)
    {
        $this->year = $year;
    }
    public function save()
    {
        $db = new Database();


        try {
            $conn = $db->connect();


            $stmt = $conn->prepare("insert into books (title, author, year) values (:title, :author, :year)");
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":author", $this->author);
            $stmt->bindParam(":year", $this->year);
            $stmt->execute();

        } catch (PDOException $e) {

            error_log("DB Error in Book::save(): " . $e->getMessage());
            echo "Có lỗi xảy ra khi lưu sách. Vui lòng thử lại sau.";
        } 
        $conn = null;          
        
    }
    public function getBookInfo()
    {
        echo "Title: " . $this->title . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
}
