
<?php
        require_once 'views/header.php';
        require 'app/form.php';
    ?>
   <h2 id="form-title">Форма обратной связи</h2>
    <form action="app/form.php" method="post">
    <div class="form">
        <input type="text" id="username" name ="username" placeholder="Имя пользователя" maxlength="15" required><br>
        <input type="email" id= "email" name ="email" placeholder="Электронная почта" required><br>
        <input type="range" id= "rating" name ="rating" placeholder="Оценка страницы" min="0" max="5" required><br>
        <textarea id="comment" name ="comment" placeholder="Комментарий" maxlength="200" required></textarea><br>
        <input type="submit" value="Отправить">
    </div>
    </form>

    <div class="container">
        <h2>Комментарии</h2>
        <ul id="comments-list">
            <?php
                $stmt = $pdo->query("SELECT username, email, rating, comment from feedback ORDER BY id DESC");
                $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($comments as $comment){
                    echo "<li>";
                    echo "<storng>" . htmlspecialchars($comment['username']) . "</strong> (Оценка: " . htmlentities($comment['rating']) . ")<br>";
                    echo "<em>" . htmlspecialchars($comment['comment']) . "</em>";
                    echo "</li>";
                }
            ?>
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/form-handler.js"></script>

    <?php
        require_once 'views/footer.php';