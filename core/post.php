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
            
        public function read_single(){
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
    }