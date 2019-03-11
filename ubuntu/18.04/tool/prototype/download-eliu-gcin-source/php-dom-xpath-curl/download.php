#!/usr/bin/env php
<?php

	function do_downlod ($url, $save_file_path)
	{
		$ch = curl_init(); // http://php.net/manual/en/function.curl-init.php

		// http://php.net/manual/en/function.curl-setopt.php
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // for curl_exec return
		curl_setopt($ch, CURLOPT_HEADER, false);

		$contents = curl_exec($ch); // http://php.net/manual/en/function.curl-exec.php

		curl_close($ch); // http://php.net/manual/en/function.curl-close.php

		file_put_contents($save_file_path, $contents);

	}

	// http://php.net/manual/en/function.error-reporting.php
	error_reporting(E_ALL & ~(E_WARNING|E_NOTICE));

	$base_url = 'https://hyperrate.com/gcin-source';

	$doc = new DOMDocument; // http://php.net/manual/en/class.domdocument.php

	$doc->preserveWhiteSpace = false; // http://php.net/manual/en/class.domdocument.php#domdocument.props.preservewhitespace

	$doc->loadHTMLFile($base_url); // http://php.net/manual/en/domdocument.loadhtmlfile.php

	$xpath = new DOMXPath($doc); // http://php.net/manual/en/class.domxpath.php

	$query = '//a/@href';

	$nodes = $xpath->query($query); // http://php.net/manual/en/domxpath.query.php

	if (is_null($nodes)) { // http://php.net/manual/en/function.is-null.php
		return;
	}


	$list = '';
	// http://php.net/manual/en/class.domnodelist.php
	// http://php.net/manual/en/class.domnode.php
	foreach ($nodes as $node) {

		$source_file_name = $node->nodeValue;

		if (!strstr($source_file_name, 'gcin')) { // http://php.net/manual/en/function.strstr.php
			continue;
		}

		$source_url = $base_url . '/' . $source_file_name;

		echo 'Download: ' . $source_url . PHP_EOL;

		$save_file_path = __DIR__ . '/' . $source_file_name;

		do_downlod($source_url, $save_file_path);
	}
