
<?php
try{


$pdo = new PDO('mysql:host=localhost;dbname=colle2024', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
}catch(PDOException $e){
    die('Connection failed: ' . $e->getMessage());
}

function getCn() {
    static $cn = null;
    if (!$cn) {
        $dsn = 'mysql:host=localhost;dbname=colle2024;charset=utf8';
        $username = 'root';
        $password = '';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            $cn = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            error_log('Connection failed: ' . $e->getMessage());
            throw new Exception("Cannot connect to database.");
        }
    }
    return $cn;
}


function findAll($table){
    return getCn()->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
}

function findOne($table, $id){
    $stmt = getCn()->prepare("SELECT * FROM $table WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function del($table, $id){
    $stmt = getCn()->prepare("DELETE FROM $table WHERE id = ?");
    return $stmt->execute([$id]);
}

function describe($table){
    return getCn()->query("DESCRIBE $table")->fetchAll(PDO::FETCH_COLUMN);
}

function save($table, $element){
    $id =  $element["id"] ;
    unset($element["id"]);
    
    $champs = array_keys($element);
    $values = array_values($element);
    
    if ($id != NULL) {
        $champsUpdate = join(" = ?, ", $champs) . " = ?";
        $values[] = $id;
        $rq = "UPDATE $table SET $champsUpdate WHERE id = ?";
    } else {
        $champsInsert = join(", ", $champs);
        $placeholders = join(", ", array_fill(0, count($champs), '?'));
        $rq = "INSERT INTO $table ($champsInsert) VALUES ($placeholders)";
    }
    
    try {
        $stmt = getCn()->prepare($rq);
        $result = $stmt->execute($values);
    } catch (Exception $e) {
        $result = false;
    }
    
    return $result;
}

function login($username, $password) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}


