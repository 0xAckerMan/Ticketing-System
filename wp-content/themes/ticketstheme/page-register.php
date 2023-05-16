<?php
if (is_user_logged_in()) {
    wp_redirect(home_url());
}

$error = '';

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $user_id = wp_create_user($email, $password, $email);

    if (!is_wp_error($user_id)) {
        update_user_meta($user_id, 'fullname', $fullname);
        update_user_meta($user_id, 'phone', $phone);
        update_user_meta($user_id, 'address', '');

        $user = wp_signon([
            'user_login' => $email,
            'user_password' => $password
        ]);

        if (!is_wp_error($user)) {
            wp_set_current_user($user->ID);
            wp_set_auth_cookie($user->ID);
            do_action('wp_login', $user->user_login, $user);

            wp_redirect(home_url());
            exit;
        }
    } else {

        $error = "Invalid username or password";
    }
}
?>

<form method="post" action="">
    <div class="custom-form">
        <?php get_header(); ?>

        <div class="form-con">

            <h2>Register</h2>

            <?php
            echo "<p class='form-error'>" . $error . "</p>";
            ?>


            <div class="input-con">
                <label for="fullname">Fullname</label>
                <div>
                    <ion-icon name="person-outline"></ion-icon>
                    <input id="fullname" class="" type="text" name="fullname" placeholder="Enter your fullname" required />
                </div>
            </div>

            <div class="input-con">
                <label for="email">Email Address</label>
                <div>
                    <ion-icon name="mail-outline"></ion-icon>
                    <input id="email" type="email" name="email" placeholder="Enter your email address" required />
                </div>
            </div>
            <div class="input-con">
                <label for="phone">Phone Number</label>
                <div>
                    <ion-icon name="call-outline"></ion-icon>
                    <input id="phone" class="" type="tel" name="phone" placeholder="Enter your phone number" required />
                </div>
            </div>

            <div class="input-con">
                <label for="password">Password</label>
                <div>
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input id="password" type="password" name="password" placeholder="Enter your password" required />
                </div>
            </div>

            <button class="custom-btn" name="submit" type="submit">REGISTER</button>

            <p class="form-alt-text">
                Already have an account? <a href="/Ticketing-System/login">Login</a>
            </p>
        </div>

    </div>
</form>