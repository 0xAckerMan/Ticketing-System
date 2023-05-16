<?php
/**
 * @package TicketingPlugin
 */

namespace Inc\Pages;


use \Inc\Api\Callbacks\AdminCallbacks;

class CreateTicket extends AdminCallbacks {
    public function register() {
        $this->create_table_to_db();
        $this->add_member_to_db();
        $this->soft_delete_ticket();
        $this->mark_ticket_as_done();
        $this->update_ticket();
    }

    function update_ticket() {
        if (isset($_GET['action']) && $_GET['action'] === 'update' && isset($_GET['id'])) {
            $ticket_id = $_GET['id'];

            // Redirect to the update page with the ticket ID as a parameter
            wp_redirect(admin_url('admin.php?page=ticketing-plugin&update_id=' . $ticket_id));
            exit();
        }
    }

    function create_table_to_db() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'tickets';

        $ticket_details = "CREATE TABLE IF NOT EXISTS " . $table_name . "(
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            message TEXT NOT NULL,
            due_date DATE NOT NULL,
            assignee VARCHAR(255) NOT NULL,
            status ENUM('Active', 'Done') DEFAULT 'Active',
            soft_delete TINYINT(1) DEFAULT 0
        );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($ticket_details);
    }

    function soft_delete_ticket() {
        if (isset($_GET['action']) && $_GET['action'] === 'soft_delete' && isset($_GET['id'])) {
            $ticket_id = $_GET['id'];

            global $wpdb;
            $table_name = $wpdb->prefix . 'tickets';

            $result = $wpdb->update($table_name, array('soft_delete' => 1), array('id' => $ticket_id));

            if ($result !== false) {
                echo "<script> alert('Ticket soft deleted successfully'); </script>";
                wp_redirect(admin_url('admin.php?page=ticketing-plugin')); // Redirect back to the current page
                exit();
            } else {
                echo "<script> alert('Unable to soft delete the ticket'); </script>";
            }
        }
    }

    function mark_ticket_as_done() {
        if (isset($_GET['action']) && $_GET['action'] === 'mark_done' && isset($_GET['id'])) {
            $ticket_id = $_GET['id'];

            global $wpdb;
            $table_name = $wpdb->prefix . 'tickets';

            $result = $wpdb->update($table_name, ['status' => 'Done'], ['id' => $ticket_id]);

            if ($result !== false) {
                echo "<script> alert('Ticket marked as done successfully'); </script>";
            } else {
                echo "<script> alert('Unable to mark the ticket as done'); </script>";
            }

            echo "<script> window.location.href = '" . $_SERVER['HTTP_REFERER'] . "'; </script>";
            exit;
        }
    }

    function add_member_to_db() {
        if (isset($_POST['submit'])) {
            $data = [
                'title' => $_POST['title'],
                'message' => $_POST['message'],
                'due_date' => $_POST['due_date'],
                'assignee' => $_POST['assignee'],
                'status' => 'Active',
                'soft_delete' => 0,
            ];

            global $wpdb;
            global $successmessage;
            global $errormessage;

            $successmessage = false;
            $errormessage = false;
    
            $table_name = $wpdb->prefix . 'tickets';
    
            // Check if the assigned employee has an active task
            $existingTask = $wpdb->get_row("SELECT * FROM $table_name WHERE assignee = '{$_POST['assignee']}' AND status = 'Active'");
            if ($existingTask) {
                $errormessage = true;
                echo "<script> alert('Employee already has an active task. Cannot assign another task.'); </script>";
            } else {
                $result = $wpdb->insert($table_name, $data);
    
                if ($result == true) {
                    $successmessage = true;
                    echo "<script> alert('Ticket created successfully'); </script>";
                } else {
                    $errormessage = true;
                    echo "<script> alert('Unable to create a ticket'); </script>";
                }
            }
        }
    }
}    