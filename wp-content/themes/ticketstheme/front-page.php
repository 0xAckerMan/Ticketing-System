<?php
// Check if user is already logged in
if (is_user_logged_in()) {
    wp_redirect('http://localhost/Ticketing-System/wp-admin/');
    exit;
}

// Check if form was submitted
if (isset($_POST['submit'])) {
    // Verify user credentials
    $employee_number = $_POST['employee_number'];
    $user_password = $_POST['password'];

    // Get user ID based on employee number
    global $wpdb;
    $user_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM {$wpdb->prefix}users WHERE ID = %s", $employee_number));

    if (!$user_id) {
        // Display error message if employee number is not found
        echo "Invalid employee number.";
        exit;
    }

    // Get user data
    $user = get_user_by('ID', $user_id);

    // Check if the provided password is correct
    if (wp_check_password($user_password, $user->user_pass, $user_id)) {
        // Authenticate the user
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);
        do_action('wp_login', $user->user_login, $user);

        wp_redirect('/Ticketing-System/wp-admin/');
        exit;
    } else {
        // Display error message if password is incorrect
        echo "Invalid password.";
        exit;
    }
}
?>

<form style="border:2px solid black; background-color:aqua;" method="post" action="">
    <div class="custom-form">
        <?php get_header(); ?>
        <div class="form-con">

            <h1>Login</h1>

            <?php
            echo "<p class='form-error'>" . $error . "</p>";
            ?>

            <div class="input-con">
                <label for="employee_number">Employee Number</label>
                <div>
                    <ion-icon name="person-outline"></ion-icon>
                    <input class="" type="text" name="employee_number" placeholder="Enter your employee number" required />
                </div>
            </div>

            <div class="input-con">
                <label for="password">Password</label>
                <div>
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" placeholder="Enter your password" required />
                </div>
            </div>

            <button class="custom-btn" name="submit" type="submit">LOGIN</button>


        </div>

    </div>
</form>
