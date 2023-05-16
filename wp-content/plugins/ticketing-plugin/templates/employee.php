    
<?php

// global $wpdb;
// $table = $wpdb->prefix . 'products';

// $books = $wpdb->get_results("SELECT * FROM $table");
// $men = $wpdb->get_results("SELECT * FROM $table WHERE product_category = 'men'");
// $kids = $wpdb->get_results("SELECT * FROM $table WHERE product_category = 'kids'");
// $women = $wpdb->get_results("SELECT * FROM $table WHERE product_category = 'women'");

// echo '<pre>';
// var_dump($books);
// echo '</pre>'


?>


<?php

        global $wpdb;
        $table = $wpdb->prefix.'users';

        $rawdata = $wpdb->get_results("SELECT * FROM $table");

        // print_r($rawdata);
        ?>

        <div class="display">
        <?php
    global $wpdb;
    $table = $wpdb->prefix.'users';
    $rawdata = $wpdb->get_results("SELECT * FROM $table");
?>

<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rawdata as $user) : ?>
            <tr>
                <td><?php echo $user->ID; ?></td>
                <td><?php echo $user->user_login; ?></td>
                <td><?php echo $user->user_email; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
