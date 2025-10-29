<?php
require_once "Book.php";

class EBook extends Book
{
    private $fileSize;
    private $format;

    public function __construct($title, $author, $year, $fileSize, $format)
    {
        parent::__construct($title, $author, $year); // Gọi constructor lớp cha
        $this->fileSize = $fileSize;
        $this->format = $format;
    }
    
    public function save()
    {
        $db = new Database();
        $conn = $db->connect();

        if ($conn) {
            $stmt = $conn->prepare("
                INSERT INTO ebooks (title, author, year, file_size, format)
                VALUES (:title, :author, :year, :fileSize, :format)
            ");
            $title = $this->getTitle();
            $author = $this->getAuthor();
            $year = $this->getYear();
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":author", $author);
            $stmt->bindParam(":year", $year);
            $stmt->bindParam(":fileSize", $this->fileSize);
            $stmt->bindParam(":format", $this->format);
            $stmt->execute();
        }
    }
    public function getBookInfo()
    {
        parent::getBookInfo(); 
        echo "<b>File size:</b> {$this->fileSize} MB<br>";
        echo "<b>Format:</b> {$this->format}<br><hr>";
    }
}
