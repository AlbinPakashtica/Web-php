<?php
  class User {
  
    public $id;
    public $role;
    public $name;
    public $email;
    public $password;
    

    public function __construct($id, $role, $name, $email, $password=null) {
      $this->id       = $id;
      $this->role     = $role;
      $this->name     = $name;
      $this->email    = $email;
      $this->password = $password;
    }

    
    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM users');
  
        // we create a list of User objects from the database results
        foreach($req->fetchAll() as $user) {
          $list[] = new User($user['id'], $user['role'], $user['name'], $user['email'], $user['password']);
        }
  
        return $list;
      }
  
      public static function find(int $id): ?User {
        $db = Db::getInstance();
        
        $req = $db->prepare('SELECT * FROM users WHERE id = :id');
        
        $req->execute(['id' => $id]);
        $user = $req->fetch();
  
        return new User($user['id'], $user['role'], $user['name'], $user['email'], $user['password']);
      }

      public static function register(User $user) {
        $db = Db::getInstance();
       
        $req = $db->prepare('INSERT INTO users (`name`, `role`, `email`, `password`) VALUES (:name, 0, :email, :password)');
        
        $req->execute(['name' => $user['name'], 'email' => $user['email'],'password' => $user['password']]);
      }

      public static function login(String $email, String $password): ?User {
        $db = Db::getInstance();
        
        $req = $db->prepare('SELECT * FROM users WHERE lower(email) = lower(:email) and password = :password');
        
        $req->execute(['email' => $email, 'password' => $password ]);
        $user = $req->fetch();
  
        return new User($user['id'], $user['role'], $user['name'], $user['email'], $user['password']);
      }

      public static function update(User $user) {
        $db = Db::getInstance();

        $req = $db->prepare('UPDATE `users` SET `role`=:role,`name`=:name,`email`=:email,`password`=:password WHERE id =:id');

        $req->execute(['name'=>$user['name'], 'role'=>$user['role'], 'email'=>$user['email'], 'password'=>$user['password']]);
        $user = $req->fetch();

        return new User($user['id'], $user['role'], $user['name'], $user['email'], $user['password']);
      }
    
}

