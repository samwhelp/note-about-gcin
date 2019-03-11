#!/usr/bin/env php
<?php

	// http://php.net/manual/en/function.error-reporting.php
	error_reporting(E_ALL & ~(E_WARNING|E_NOTICE));

	$base_url = 'http://hyperrate.com/gcin-ubuntu1804/dists/eliu/release/binary-amd64';

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

		if (!strstr($source_file_name, '.deb')) { // http://php.net/manual/en/function.strstr.php
			continue;
		}

		$source_url = $base_url . '/' . $source_file_name;

		echo 'Download: ' . $source_url . PHP_EOL;

		$file_contents = file_get_contents($source_url); // http://php.net/manual/en/function.file-get-contents.php

		$save_file_path = __DIR__ . '/' . $source_file_name;

		file_put_contents($save_file_path, $file_contents); // http://php.net/manual/en/function.file-put-contents.php
	}
