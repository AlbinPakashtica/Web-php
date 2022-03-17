<?php
  class Cart {
    // we define 5 attributes
    // they are public so that we can access them using $Carts->stock directly
    public $UserId;
    public $ItemId;

    public function __construct($UserId, $ItemId) {
        $this->UserId        = $UserId;
        $this->ItemId        = $ItemId;
    }

    public static function all($UserId) {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM carts');
  
        // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $cart) {
          $list[] = new Cart($cart['id'], $cart['name'], $cart['stock'], $cart['category'], $cart['description'], $cart['price']);
        }
  
        return $list;
      }
  
      public static function find($id) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = (int) $id;
        $req = $db->prepare('SELECT * FROM carts WHERE id = :id');

        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $cart = $req->fetch();

        return new Cart($cart['id'], $cart['name'], $cart['stock'], $cart['category'], $cart['description'], $cart['price']);
      }

      public static function insert(Cart $cart) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $req = $db->prepare('INSERT INTO `carts` (`name`, `stock`, `price`, `decription`, `category`) VALUES (:name, :stock, :price, :decription, :category)');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(['name' => $cart['name'], 'stock' => $cart['stock'], 'price' => $cart['price'], 'decription' => $cart['decription'], 'category' => $cart['category']]);
        $cart = $req->fetch();

        return new Cart($cart['id'], $cart['name'], $cart['stock'], $cart['category'], $cart['description'], $cart['price']);
      }

      public static function delete($id) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = (int) $id;
        $req = $db->prepare('DELETE FROM carts WHERE id = :id');

        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(['id' => $id]);
        $cart = $req->fetch();

        return new Cart($cart['id'], $cart['name'], $cart['stock'], $cart['category'], $cart['description'], $cart['price']);
      }
}