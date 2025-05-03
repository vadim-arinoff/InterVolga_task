<?php

require '/../config/database.php'; // лучше хранить конфиг подключения к БД за пределами проекта public в OSP, пока тут
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars(trim($_POST['email']));

        $response = array();

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $response ['status'] = 'error';
            $response ['message'] = 'Неверный формат почты';
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
    }
        $rating = htmlspecialchars($_POST['rating']);
        $comment = htmlspecialchars($_POST['comment']);

        try {
            $stmt = $pdo->prepare("INSERT INTO feedback (username, email, rating, comment) VALUES (?, ?, ?, ?)");
            $stmt->bindParam(1, $username, PDO::PARAM_STR);
            $stmt->bindParam(2, $email, PDO::PARAM_STR);
            $stmt->bindParam(3, $rating, PDO::PARAM_INT);
            $stmt->bindParam(4, $comment, PDO::PARAM_STR);
            $stmt->execute();

            $stmt = $pdo->query("SELECT username, email, rating, comment from feedback ORDER BY id DESC");
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $response ['status'] = 'success';
            $response ['message'] = 'Комментарий успешно добавлен!';
            $response ['comments'] = $comments;
        } catch (PDOException $e) {
            $response ['status'] = 'error';
            $response ['message'] = 'Ошибка при передаче данных в БД!';
        }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
    }