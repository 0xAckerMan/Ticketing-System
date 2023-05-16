<div class="container-one">
    <?php
    global $wpdb;

    // Check if the update_id parameter is provided in the URL
    if (isset($_GET['update_id'])) {
        $update_id = $_GET['update_id'];

        // Fetch the ticket details from the database
        $table_name = $wpdb->prefix . 'tickets';
        $ticket = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $update_id");

        // Proceed with rendering the form if the ticket exists
        if ($ticket) {
            ?>
            <form action="" method="post">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo $ticket->title; ?>" required>
                <label for="message">Message:</label>
                <input type="text" id="message" name="message" value="<?php echo $ticket->message; ?>" required>
                <label for="due-date">Due Date:</label>
                <input type="date" id="due-date" name="due_date" value="<?php echo $ticket->due_date; ?>" required><br>
                <label for="assignee">Assign To:</label>
                <select id="assignee" name="assignee" required>
                    <?php
                    // Fetch the list of users from the database
                    $users_table = $wpdb->prefix . 'users';
                    $users = $wpdb->get_results("SELECT * FROM $users_table");

                    foreach ($users as $user) {
                        $selected = ($ticket->assignee === $user->user_login) ? 'selected' : '';
                        echo '<option value="' . $user->user_login . '" ' . $selected . '>' . $user->user_login . '</option>';
                    }
                    ?>
                </select>
                <?php
                // Check if the current user is an admin
                if (current_user_can('administrator')) {
                    $soft_delete_checked = ($ticket->soft_delete == 1) ? 'checked' : '';
                    echo '<label for="soft-delete">Soft Delete:</label>';
                    echo '<input type="checkbox" id="soft-delete" name="soft_delete" ' . $soft_delete_checked . '>';
                }
                ?>
                <input type="submit" value="Submit" name="submit">
            </form>
            <?php
        } else {
            echo 'Ticket not found.';
        }
    } else {
        echo 'Update ID not provided.';
    }
    ?>
</div>
