<?php

function database_connection()
{
    try {
        $pdo = new PDO('mysql:dbname=stadiumstreamdb;host=127.0.0.1', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('Database connection failed: ' . $e->getMessage());
    }
}

function latest()
{
    try {
        $pdo = database_connection();
        $stmt = $pdo->query('SELECT * FROM team ORDER BY id_team DESC');
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }
}

function create()
{
    extract($_POST);
    $pdo = database_connection();
    

    $sqlState = $pdo->prepare('INSERT INTO team (name, discription) VALUES (?, ?)');
    return $sqlState->execute([$name, $discription]);
}


function edit($id_team, $name, $discription)
{
    $pdo = database_connection();
    
    $sqlState = $pdo->prepare("UPDATE team SET name= ?,discription=? WHERE id_team = ?");
    return $sqlState->execute([$name, $discription, $id_team]);
}

function destroy($id_team)
{
    $pdo = database_connection();
    $sqlState = $pdo->prepare('DELETE FROM team WHERE id_team = ?');
    return $sqlState->execute([$id_team]);
}

function view($id_team)
{
    $pdo = database_connection();
    $sqlState = $pdo->prepare('SELECT * FROM team WHERE id_team = ?');
    $sqlState->execute([$id_team]);
    return $sqlState->fetch(PDO::FETCH_OBJ);
}
