<?php

if ( isset($_POST['url'], $_POST['key']) ) {
	header('Content-type: text/plain');

	$ch = curl_init($_POST['url']);
	curl_setopt_array($ch, [
		CURLOPT_HEADER => true,
		CURLOPT_POST => true,
		CURLOPT_RETURNTRANSFER => true,

		CURLOPT_HTTPHEADER => array_filter([
			'TTL: 100',
			$_POST['key'] ? 'Authorization: key=' . urlencode($_POST['key']) : '',
		]),
		CURLOPT_POSTFIELDS => '',
	]);

	echo curl_exec($ch);

	exit;
}

?>
<meta charset="utf-8" />
<title>SW test</title>

<form method="post" action>
	<p>Endpoint URL: <input name="url" /></p>
	<p>Auth key: <input name="key" /></p>
	<button>Send</button>
</form>
