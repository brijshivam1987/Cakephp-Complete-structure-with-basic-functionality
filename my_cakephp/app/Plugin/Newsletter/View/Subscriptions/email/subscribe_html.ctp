<? 
$message = Configure::read('Newsletter.subscribe_message_html');
if($message) {
  if(!$url) {
    $url = BASE_URL."/newsletter/subscriptions/confirm_subscription/".$confirmation_code;
  } else {
    $url = BASE_URL.$url.$confirmation_code;
  }
  $message = str_replace('@@link@@', $url, $message);
  echo $message;
} else {
?>
  <p>This is a message to confirm your solicitation to subscribe into our email list.</p>
  <p>To confirm the solicitation, please
  <a href="<?php echo BASE_URL; ?>/newsletter/subscriptions/confirm_subscription/<?php echo $confirmation_code ?>">click here</a>.</p>
<?  
} 
?>
