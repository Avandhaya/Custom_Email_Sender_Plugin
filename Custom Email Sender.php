<?php
/*
Plugin Name: Custom Email Sender
Description: Non-Latin Support Mail Plugin
Version: 1.0
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
        $sender_namea = sanitize_text_field($_POST['sender-namea']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        // Replace with your desired recipient email address
        $to = 'vihanga20.theekshana@gmail.com';
       
        
        
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $sender_name_encoded . ' <' . $sender_email_encoded . '>',
        );

       // Create the email content
        $email_content = "Email of sender: $sender_name\n\n";
        //$email_content .= "Sender Email Address: $message\n";
        $email_content .= "Name:$sender_namea\n\n";
        $email_content .= "Message:\n$message";
        
         function is_valid_internationalized_email($email) {
            list($local_part, $domain_part) = explode('@', $email);

     // Validate the local part
            if (!preg_match('/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~\x80-\xFFFF.-]+$/', $local_part)) {
                return false;
                }

    // Convert the domain part to Punycode
            $domain_part_punycode = idn_to_ascii($domain_part);

    // Check for RFC 5322 compliance
            if (!preg_match('/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~.-]+$/', $domain_part_punycode)) {
            return false;
            }

    return true;
    }


if (is_valid_internationalized_email($sender_name)) {
     $sent = wp_mail($to, $subject, $email_content, $message, $headers);

        if ($sent) {
            // Clear form fields
            $sender_namea = '';
            $subject = '';
            $message = '';
            echo '<div class="email-success">Email sent successfully!</div>';
        } else {
            echo '<div class="email-error">Email sending failed. Please try again.</div>';
        }
    
} 
else {
    echo '<div class="email-error">Email is not a valid email address.</div>';
}
        

    is_valid_internationalized_email("$sender_name");
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
        $sender_namea = sanitize_text_field($_POST['sender-namea']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        $to = 'vihanga20.theekshana@gmail.com';
        

        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $sender_name_encoded . ' <' . $sender_email_encoded . '>',
        );

       // Create the email content
       $email_content = "Email of sender: $sender_name\n\n";
        //$email_content .= "Sender Email Address: $message\n";
        $email_content .= "Name:$sender_namea\n\n";
        $email_content .= "Message:\n$message";
        // Send the email
        // $sent = wp_mail($to_encoded, $subject, $message, $headers);
        
        
        
        function is_valid_internationalized_email($email) {
            list($local_part, $domain_part) = explode('@', $email);

     // Validate the local part
            if (!preg_match('/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~\x80-\xFFFF.-]+$/', $local_part)) {
                return false;
                }

    // Convert the domain part to Punycode
            $domain_part_punycode = idn_to_ascii($domain_part);

    // Check for RFC 5322 compliance
            if (!preg_match('/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~.-]+$/', $domain_part_punycode)) {
            return false;
            }

    return true;
    }




if (is_valid_internationalized_email($sender_name)) {
     $sent = wp_mail($to, $subject, $email_content, $message, $headers);

        if ($sent) {
            // Clear form fields
            $sender_namea = '';
            $subject = '';
            $message = '';
            echo '<div class="email-success">Email sent successfully!</div>';
        } else {
            echo '<div class="email-error">Email sending failed. Please try again.</div>';
        }
    
} 
else {
    echo '<div class="email-error">Email is not a valid email address.</div>';
}
        

    is_valid_internationalized_email("$sender_name");
    }
     

    // Display the email form
    ?>
    <div class="email-form">
        <h4>ඔබගේ විමසීම් අප වෙත යොමු කරන්න </h4>
        <form method="post" accept-charset="UTF-8">
            <label for="sender-namea">ඔබගේ නම:</label>
            <input type="text" name="sender-namea" value="<?php echo $sender_namea ; ?>" required><br>
            
            <label for="sender-name">විද්‍යුත් තැපැල් ලිපිනය:</label>
            <input type="text" name="sender-name"  required><br>
            

            <label for="subject">අදාල පණිවිඩයෙහි විෂය:</label>
            <input type="text" name="subject" value="<?php echo $subject ; ?>" required><br>

            <label for="message">පණිවිඩය:</label>
            <textarea name="message" rows="4"  required><?php echo $message ; ?></textarea><br>

            <input type="submit" name="custom-email-submit" value="විද්‍යුත් තැපැලය යොමු කරන්න">
        </form>
    </div>
    <?php

    return ob_get_clean(); // Return the buffered content
}
add_shortcode('custom_email_sender_form_s', 'custom_email_sender_form_shortcode_s');

//Tamil

// Create a shortcode to display the email form in Tamil
function custom_email_sender_form_shortcode_t() {
    ob_start(); // Start output buffering

    if (isset($_POST['custom-email-submit'])) {
        $sender_name = sanitize_text_field($_POST['sender-name']);
        $sender_namea = sanitize_text_field($_POST['sender-namea']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        $to = 'vihanga20.theekshana@gmail.com';
        

        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $sender_name_encoded . ' <' . $sender_email_encoded . '>',
        );

       // Create the email content
        $email_content = "Email of sender: $sender_name\n\n";
        //$email_content .= "Sender Email Address: $message\n";
        $email_content .= "Name:$sender_namea\n\n";
        $email_content .= "Message:\n$message";
        // Send the email
        // $sent = wp_mail($to_encoded, $subject, $message, $headers);
        
        
        
        function is_valid_internationalized_email($email) {
            list($local_part, $domain_part) = explode('@', $email);

     // Validate the local part
            if (!preg_match('/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~\x80-\xFFFF.-]+$/', $local_part)) {
                return false;
                }

    // Convert the domain part to Punycode
            $domain_part_punycode = idn_to_ascii($domain_part);

    // Check for RFC 5322 compliance
            if (!preg_match('/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~.-]+$/', $domain_part_punycode)) {
            return false;
            }

    return true;
    }




if (is_valid_internationalized_email($sender_name)) {
     $sent = wp_mail($to, $subject, $email_content, $message, $headers);

        if ($sent) {
            // Clear form fields
            $sender_namea = '';
            $subject = '';
            $message = '';
            echo '<div class="email-success">மின்னஞ்சல் வெற்றிகரமாக அனுப்பப்பட்டது!</div>';
        } else {
            echo '<div class="email-error">மின்னஞ்சல் அனுப்புவதில் தோல்வி. தயவு செய்து மீண்டும் முயற்சிக்கவும்.</div>';
        }
    
} 
else {
    echo '<div class="email-error">மின்னஞ்சல் சரியான மின்னஞ்சல் முகவரி அல்ல.</div>';
}
        

    is_valid_internationalized_email("$sender_name");
    }
     

    // Display the email form
    ?>
    <div class="email-form">
        <h4>ஏங்களைத் தொடர்பு கொள்ள</h4>
        <form method="post" accept-charset="UTF-8">
            <label for="sender-namea">பெயர்:</label>
            <input type="text" name="sender-namea" value="<?php echo $sender_namea ; ?>" required><br>
            
            <label for="sender-name">மின்னஞ்சல்:</label>
            <input type="text" name="sender-name"  required><br>
            

            <label for="subject">விடயம்:</label>
            <input type="text" name="subject" value="<?php echo $subject ; ?>" required><br>

            <label for="message">தகவல்:</label>
            <textarea name="message" rows="4"  required><?php echo $message ; ?></textarea><br>

            <input type="submit" name="custom-email-submit" value="மின்னஞசலை  அனுப்பவும்">
        </form>
    </div>
    <?php

    return ob_get_clean(); // Return the buffered content
}
add_shortcode('custom_email_sender_form_t', 'custom_email_sender_form_shortcode_t');
?>
