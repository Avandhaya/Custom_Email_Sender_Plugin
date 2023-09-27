<?php
/*
Plugin Name: Custom Email Sender
Description: A simple plugin to send emails to the admin.
Version: 1.0
Author: Your Name
*/

// Enqueue necessary scripts and styles
function custom_email_sender_enqueue_scripts() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'custom_email_sender_enqueue_scripts');

// Create a shortcode to display the email form
function custom_email_sender_form_shortcode() {
    ob_start(); // Start output buffering

    if (isset($_POST['custom-email-submit'])) {
        $sender_email = sanitize_email($_POST['sender-email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        $to = 'උදව්@ඉතැපැල්.ලංකා';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        

        //$admin_email = get_option('admin_email');

        // Send the email
        // $sent = wp_mail($admin_email, $subject, $message, "From: $sender_email");
        $sent = wp_mail($to, $subject, $message, $headers, "From: $sender_email");

        if ($sent) {
            echo '<div class="email-success">Email sent successfully!</div>';
        } else {
            echo '<div class="email-error">Email sending failed. Please try again.</div>';
        }
    }

    // Display the email form
    ?>
    <div class="email-form">
        <h2>Send an Email</h2>
        <form method="post">
            <label for="sender-email">Your Email:</label>
            <input type="email" name="sender-email" required><br>

            <label for="subject">Subject:</label>
            <input type="text" name="subject" required><br>

            <label for="message">Message:</label>
            <textarea name="message" rows="4" required></textarea><br>

            <input type="submit" name="custom-email-submit" value="Send Email">
        </form>
    </div>
    <?php

    return ob_get_clean(); // Return the buffered content
}
add_shortcode('custom_email_sender_form', 'custom_email_sender_form_shortcode');
