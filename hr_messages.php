<div class="card">
    <h2>Messages</h2>
    <?php
    $query = "SELECT * FROM messages WHERE hr_id = :hr_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['hr_id' => $hr_id]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($messages as $message) {
        echo '<p>' . $message['message'] . '</p>';
        echo '<form action="respond_message.php" method="post">';
        echo '<textarea name="response" placeholder="Type your response here..."></textarea>';
        echo '<input type="hidden" name="message_id" value="' . $message['id'] . '">';
        echo '<button type="submit">Respond</button>';
        echo '</form>';
    }
    ?>
</div>