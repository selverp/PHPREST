<?php
    class Post{
        //db stuff
        private $conn;
        private $table = 'phprest';

        //post properties
        public $phprest_id;
        public $category_id;
        public $category_name;
        public $title;
        public $body;
        public $author;
        public $create_at;

        //constructor with db connection
        public function __construct($db){
            $this->conn = $db;
        }
        //getting posts from our database
        public function read(){
            //create query
            $query = 'SELECT 
                c.name as category_name,
                p.phprest_id,
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
                FROM
                ' . $this->table . ' p
                LEFT JOIN
                    category c ON p.category_id = c.category_id
                    ORDER BY p.created_at  DESC;
            ';
            //prepare statement
            $stmt = $this->conn->prepare($query);
            //execute query
            $stmt->execute();
            return $stmt;
        }
            
        public function readSingle(){
            //create query
            $query = 'SELECT 
                c.name as category_name,
                p.phprest_id,
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
                FROM
                ' . $this->table . ' p
                LEFT JOIN
                    category c ON p.category_id = c.category_id
                    WHERE p.phprest_id = ? LIMIT 1';
            //prepare statement
            $stmt = $this->conn->prepare($query);
            //binding param
            $stmt->bindParam(1, $this->id);
            //execute the query
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->title = $row['title'];
            $this->body = $row['body'];
            $this->author = $row['author'];
            $this->category_id = $row['category_id'];
            $this->category_name = $row['category_name'];
        }

        public function create(){
            //create query
            //$query = 'INSERT INTO ' . $this->table . '(title, body, author, category_id) VALUES (:title, :body, :author, :category_id;';
            $query = 'INSERT INTO ' . $this->table . ' SET category_id = :category_id, title = :title, body = :body, author = :author';
            //prepere statemant
            $stmt = $this->conn->prepare($query);
            //clin data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->body = htmlspecialchars(strip_tags($this->body));
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));
            //binding of parameters
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':body', $this->body);
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':category_id', $this->category_id);
            //execute the query
            if($stmt->execute()){
                return true;
            }
            //print error if something goes wrong
            returnf("Error %s .\n", $stms->error);
        }

        public function update(){
            //create query
            //$query = 'INSERT INTO ' . $this->table . '(title, body, author, category_id) VALUES (:title, :body, :author, :category_id;';
            $query = 'UPDATE ' . $this->table . ' SET category_id = :category_id, title = :title, body = :body, author = :author
                      WHERE phprest_id = :phprest_id';
            //prepere statemant
            $stmt = $this->conn->prepare($query);
            //clin data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->body = htmlspecialchars(strip_tags($this->body));
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));
            $this->phprest_id = htmlspecialchars(strip_tags($this->phprest_id));
            //binding of parameters
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':body', $this->body);
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':category_id', $this->category_id);
            $stmt->bindParam(':phprest_id', $this->phprest_id);
            //execute the query
            if($stmt->execute()){
                return true;
            }
            //print error if something goes wrong
            printf("Error %s .\n", $stms->error);
            return false;
        }
        public function delete(){
            //create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE phprest_id = :phprest_id';
            //prepare statemant
            $stmt = $this->conn->prepare($query);
            //clean the data
            $this->phprest_id = htmlspecialchars(strip_tags($this->phprest_id));
            $stmt->bindParam(':phprest_id',$this->phprest_id);
            //execute the query
            if($stmt->execute()){
                return true;
            }
            //print error if something goes wrong
            printf("Error %s .\n", $stms->error);
            return false;
        }
    }