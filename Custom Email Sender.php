<?php
/*
Plugin Name: Custom Email Sender
Description: Non-Latin Support Mail Plugin
Version: 1.0
Author: Your Name
*/

// Enqueue necessary scripts and styles
function custom_email_sender_enqueue_scripts() {
    wp_enqueue_script('jquery');
    
    wp_enqueue_style('custom-email-sender-css', plugins_url('custom-email-sender.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'custom_email_sender_enqueue_scripts');

// Create a shortcode to display the email form in English
function custom_email_sender_form_shortcode() {
    ob_start(); // Start output buffering

    if (isset($_POST['custom-email-submit'])) {
        $sender_name = sanitize_text_field($_POST['sender-name']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        $to = 'theekshana.tharushi99@gmail.com';
        // Replace with your desired non-Latin recipient email address
        
        // Convert the recipient email address to UTF-8 and format it properly
       //$to_encoded = '=?UTF-8?B?' . base64_encode($to) . '?=';

        //$to_encoded = mb_encode_mimeheader($sender_email, 'UTF-8', 'B');
        
       // Use quoted-printable encoding for sender's name and email address
       // $sender_name_encoded = quoted_printable_encode($sender_name);
        //$sender_email_encoded = quoted_printable_encode($sender_email);

        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $sender_name_encoded . ' <' . $sender_email_encoded . '>',
        );

       // Create the email content
       $email_content = "Email of sender: $sender_name\n\n";
        //$email_content .= "Sender Email Address: $message\n";
        $email_content .= "Name:$sender-namea\n\n";
        $email_content .= "Message:\n$message";
        // Send the email
        // $sent = wp_mail($to_encoded, $subject, $message, $headers);
        
        
        


        $sent = wp_mail($to, $subject, $email_content, $message, $headers);

        if ($sent) {
            echo '<div class="email-success">Email sent successfully!</div>';
        } else {
            echo '<div class="email-error">Email sending failed. Please try again.</div>';
        }
    }

    // Display the email form
    ?>
    <div class="email-form">
        <h2>CONTACT US</h2>
        <form method="post" accept-charset="UTF-8">

            <label for="sender-namea">Name:</label>
            <input type="text" name="sender-namea" required><br>
            
            <label for="sender-name">Email:</label>
            <input type="text" name="sender-name" required><br>
            

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




// Create a shortcode to display the email form in Sinhala
function custom_email_sender_form_shortcode_s() {
    ob_start(); // Start output buffering

    if (isset($_POST['custom-email-submit'])) {
        $sender_name = sanitize_text_field($_POST['sender-name']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        $to = 'theekshana.tharushi99@gmail.com';
        // Replace with your desired non-Latin recipient email address
        
        // Convert the recipient email address to UTF-8 and format it properly
       //$to_encoded = '=?UTF-8?B?' . base64_encode($to) . '?=';

        //$to_encoded = mb_encode_mimeheader($sender_email, 'UTF-8', 'B');
        
       // Use quoted-printable encoding for sender's name and email address
       // $sender_name_encoded = quoted_printable_encode($sender_name);
        //$sender_email_encoded = quoted_printable_encode($sender_email);

        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $sender_name_encoded . ' <' . $sender_email_encoded . '>',
        );

       // Create the email content
       $email_content = "Email of sender: $sender_name\n\n";
        //$email_content .= "Sender Email Address: $message\n";
        $email_content .= "Name:sender-namea\n\n";
        $email_content .= "Message:\n$message";
        // Send the email
        // $sent = wp_mail($to_encoded, $subject, $message, $headers);
        
        
        


        $sent = wp_mail($to, $subject, $email_content, $message, $headers);

        if ($sent) {
            echo '<div class="email-success">Email sent successfully!</div>';
        } else {
            echo '<div class="email-error">Email sending failed. Please try again.</div>';
        }
    }

    // Display the email form
    ?>
    <div class="email-form">
        <h4>ඔබගේ සිංහල යුනිකේත සම්බන්ධ ගැටළු අප වෙත යොමු කරන්න</h4>
        <form method="post" accept-charset="UTF-8">
            <label for="sender-namea">ඔබගේ නම:</label>
            <input type="text" name="sender-namea" required><br>
            
            <label for="sender-name">විද්‍යුත් තැපැල් ලිපිනය:</label>
            <input type="text" name="sender-name" required><br>
            

            <label for="subject">අදාල පණිවිඩයෙහි විෂය:</label>
            <input type="text" name="subject" required><br>

            <label for="message">පණිවිඩය:</label>
            <textarea name="message" rows="4" required></textarea><br>

            <input type="submit" name="custom-email-submit" value="විද්‍යුත් තැපැලය යොමු කරන්න">
        </form>
    </div>
    <?php

    return ob_get_clean(); // Return the buffered content
}
add_shortcode('custom_email_sender_form_s', 'custom_email_sender_form_shortcode_s');
?>
