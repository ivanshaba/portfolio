<?php

class PHP_Email_Form {
  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $message;
  public $ajax;

  public function send() {
    // Construct the email headers
    $headers = "From: $this->from_name <$this->from_email>" . "\r\n";
    $headers .= "Reply-To: $this->from_email" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";

    // Send the email
    $success = mail($this->to, $this->subject, $this->message, $headers);

    // Return the result
    return $success;
  }

  public function add_message($value, $label, $maxLength = null) {
    if ($maxLength && strlen($value) > $maxLength) {
      $value = substr($value, 0, $maxLength);
    }
    $this->message .= "$label: $value\r\n";
  }
}

?>
