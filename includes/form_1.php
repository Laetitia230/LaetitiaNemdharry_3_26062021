<?php	
	if(empty($_POST['name']) && strlen($_POST['name']) == 0 || empty($_POST['email']) && strlen($_POST['email']) == 0 || empty($_POST['input_504']) && strlen($_POST['input_504']) == 0 || empty($_POST['message']) && strlen($_POST['message']) == 0)
	{
		return false;
	}
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$input_504 = $_POST['input_504'];
	$message = $_POST['message'];
	
	$to = 'receiver@yoursite.com'; // Email submissions are sent to this email

	// Create email	
	$email_subject = "Message from your website";
	$email_body = "You have received a new message. \n\n".
				  "Name: $name \nEmail: $email \nInput_504: $input_504 \nMessage: $message \n";
	$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
	$headers .= "From: contact@yoursite.com\n";
	$headers .= "Reply-To: $input_504";	
	
	mail($to,$email_subject,$email_body,$headers); // Post message
	return true;	
	function remove_query_strings() {
		if(!is_admin()) {
			add_filter('script_loader_src', 'remove_query_strings_split', 15);
			add_filter('style_loader_src', 'remove_query_strings_split', 15);
		}
	 }
	 
	 function remove_query_strings_split($src){
		$output = preg_split("/(&ver|\?ver)/", $src);
		return $output[0];
	 }
	 add_action('init', 'remove_query_strings');		
?>
