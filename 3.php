<!-- Bài tập hương đối tượng OOP trong PHP 
﻿Tạo class object sau

- Đối tượng danh mục gồm các thuộc tính id, name. Hàm hiển thị thông tin

- Đối tượng sản phẩm gồm các thuộc tính id, cat_id, title, thumbnail, price. Hàm hiển thị thông tin



<?php
class Category {
    public $id;
    public $name;
    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    
}
    function showCategory() {
        echo "Category ID: " . $this->id . "<br>";
        echo "Category Name: " . $this->name . "<br>";
    }
}
class Product {
    public $id;
    public $cat_id;
    public $title;
    public $thumbnail;
    public $price;
    function __construct($id, $cat_id, $title, $thumbnail, $price) {
        $this->id = $id;
        $this->cat_id = $cat_id;
        $this->title = $title;
        $this->thumbnail = $thumbnail;
        $this->price = $price;
    }
    function showProduct() {
        echo "Product ID: " . $this->id . "<br>";
        echo "Category ID: " . $this->cat_id . "<br>";
        echo "Title: " . $this->title . "<br>";
        echo "Thumbnail: " . $this->thumbnail . "<br>";
        echo "Price: " . $this->price . "<br>";
    }
}
$cat1 = new Category(1, "Điện thoại");
$cat2 = new Category(2, "Laptop");

$prod1 = new Product(1, 1, "iPhone 15", "https://via.placeholder.com/100", 999);
$prod2 = new Product(2, 2, "MacBook Air M3", "https://via.placeholder.com/100", 1499);

// Hiển thị

?>
Yêu cầu:

Tạo 2 đối tượng danh mục và 2 đối tượng sản phẩm -> Hiển thị thông tin

Tạo 1 form danh mục -> Nhập thông tin danh mục -> Click submit tạo đối tượng danh mục tương ứng vs thông tin vừa nhập. Hiển thị

Tạo 1 form sản phẩm -> Nhập thông tin sản phẩm từ form. Và hiển thị. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh muc va san pham</title>
</head>
<body>
    <?php
    $cat1->showCategory();
$cat2->showCategory();
$prod1->showProduct();
$prod2->showProduct();
?>
    <form method="post" action="">
        <h1>them danh muc</h1>
        ID: <input type ="Text" name="cat_id"/><br/>
        Name: <input type ="Text" name="cat_name"/><br/>
        <input type="submit" name="createCategory" value="Submit"/>

    </form>
    <form method ="post" action="">
        <h2> them san pham </h2>
        Product ID: <input type="text" name="product_id"/><br/>
         Category ID: <input type="text" name="category_id"/><br/>
        Title: <input type="text" name="title"/><br/>
        Thumbnail: <input type="text" name="thumbnail"/><br/>
        Price: <input type="text" name="price"/><br/>
        <input type="submit" name="createProduct" value="Submit"/>
    </form> 
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    if (isset($_POST['createCategory'])){
      
        $Category1 = new Category($_POST['cat_id'], $_POST['cat_name']);
        echo "<h3>Thong tin danh muc vua tao:</h3>";
        $Category1->showCategory();
    }
    if (isset($_POST['createProduct'])){
        $Product1= new Product ($_POST["product_id"], $_POST["category_id"], $_POST["title"], $_POST["thumbnail"], $_POST["price"]);
        echo "<h3>Thong tin san pham vua tao:</h3>";
        $Product1->showProduct();
    }
}