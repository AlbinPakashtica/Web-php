<<<<<<< HEAD
<?php
  class Product {
    // we define 5 attributes
    // they are public so that we can access them using $Products->stock directly
    public $id;
    public $name;
    public $stock;
    public $category;
    public $description;
    public $price;

    public function __construct($id, $name, $stock, $category, $description, $price) {
        $this->id            = $id;
        $this->name          = $name;
        $this->stock         = $stock;
        $this->category      = $category;
        $this->description   = $description;
        $this->price         = $price;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM products');
  
        // we create a list of Product objects from the database results
        foreach($req->fetchAll() as $product) {
          $list[] = new Product($product['id'], $product['name'], $product['stock'], $product['category'], $product['description'], $product['price']);
        }
  
        return $list;
      }
  
      public static function find($id) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = (int) $id;
        $req = $db->prepare('SELECT * FROM products WHERE id = :id');

        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $product = $req->fetch();

        return new Product($product['id'], $product['name'], $product['stock'], $product['category'], $product['description'], $product['price']);
      }

      public static function insert(Product $product) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $req = $db->prepare('INSERT INTO `products` (`name`, `stock`, `price`, `decription`, `category`) VALUES (:name, :stock, :price, :decription, :category)');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(['name' => $product['name'], 'stock' => $product['stock'], 'price' => $product['price'], 'decription' => $product['decription'], 'category' => $product['category']]);
        $product = $req->fetch();

        return new Product($product['id'], $product['name'], $product['stock'], $product['category'], $product['description'], $product['price']);
      }

      public static function delete($id) {
        $db = Db::getInstance();
        
        $id = (int) $id;
        $req = $db->prepare('DELETE FROM products WHERE id = :id');

        
        $req->execute(['id' => $id]);
        $product = $req->fetch();

        return new Product($product['id'], $product['name'], $product['stock'], $product['category'], $product['description'], $product['price']);
      }
=======
<?php
  class Product {
    // we define 5 attributes
    // they are public so that we can access them using $Products->stock directly
    public $id;
    public $name;
    public $stock;
    public $category;
    public $description;
    public $price;

    public function __construct($id, $name, $stock, $category, $description, $price) {
        $this->id            = $id;
        $this->name          = $name;
        $this->stock         = $stock;
        $this->category      = $category;
        $this->description   = $description;
        $this->price         = $price;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM products');
  
        // we create a list of Product objects from the database results
        foreach($req->fetchAll() as $product) {
          $list[] = new Product($product['id'], $product['name'], $product['stock'], $product['category'], $product['description'], $product['price']);
        }
  
        return $list;
      }
  
      public static function find($id) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = (int) $id;
        $req = $db->prepare('SELECT * FROM products WHERE id = :id');

        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $product = $req->fetch();

        return new Product($product['id'], $product['name'], $product['stock'], $product['category'], $product['description'], $product['price']);
      }

      public static function insert(Product $product) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $req = $db->prepare('INSERT INTO `products` (`name`, `stock`, `price`, `decription`, `category`) VALUES (:name, :stock, :price, :decription, :category)');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(['name' => $product['name'], 'stock' => $product['stock'], 'price' => $product['price'], 'decription' => $product['decription'], 'category' => $product['category']]);
        $product = $req->fetch();

        return new Product($product['id'], $product['name'], $product['stock'], $product['category'], $product['description'], $product['price']);
      }

      public static function delete($id) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = (int) $id;
        $req = $db->prepare('DELETE FROM products WHERE id = :id');

        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(['id' => $id]);
        $product = $req->fetch();

        return new Product($product['id'], $product['name'], $product['stock'], $product['category'], $product['description'], $product['price']);
      }
>>>>>>> main
}