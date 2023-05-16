<div class="container-one">
    <form action="" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="message">Message:</label>
        <input type="text" id="message" name="message" required>
        <label for="due-date">Due Date:</label>
        <input type="date" id="due-date" name="due_date" required><br>
        <label for="assignee">Assign To:</label>
        <select id="assignee" name="assignee" required>
            <?php
            // Assuming you have established a connection to the database
            global $wpdb;
            $query = "SELECT * FROM wp_users";
            $results = $wpdb->get_results($query);
            foreach ($results as $row) {
                echo '<option value="' . $row->user_login . '">' . $row->user_login . '</option>';
            }
            ?>
        </select>
        <?php
        // Check if the current user is an admin
        if (current_user_can('administrator')) {
            echo '<label for="soft-delete">Soft Delete:</label>';
            echo '<input type="checkbox" id="soft-delete" name="soft_delete">';
        }
        ?>
        <input type="submit" value="Submit" name="submit">
    </form>
</div>
