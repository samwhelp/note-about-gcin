#!/usr/bin/env php
<?php

	// http://php.net/manual/en/function.error-reporting.php
	error_reporting(E_ALL & ~(E_WARNING|E_NOTICE));

	$base_url = 'https://hyperrate.com/gcin-source';

	$doc = new DOMDocument; // http://php.net/manual/en/class.domdocument.php

	$doc->preserveWhiteSpace = false; // http://php.net/manual/en/class.domdocument.php#domdocument.props.preservewhitespace

	$doc->loadHTMLFile($base_url); // http://php.net/manual/en/domdocument.loadhtmlfile.php

	$xpath = new DOMXPath($doc); // http://php.net/manual/en/class.domxpath.php

	$query = '//a/@href';

	$nodes = $xpath->query($query); // http://php.net/manual/en/domxpath.query.php

	if (is_null($nodes)) {
		return;
	}


	$list = '';
	// http://php.net/manual/en/class.domnodelist.php
	// http://php.net/manual/en/class.domnode.php
	foreach ($nodes as $node) {

		$source_file_name = $node->nodeValue;

		if (!strstr($source_file_name, 'gcin')) {
			continue;
		}

		$source_url = $base_url . '/' . $source_file_name;

		#echo $source_url . PHP_EOL;

		$list .= $source_url . PHP_EOL;
	}

	$list_file_path = __DIR__ . '/gcin-source.txt';

	file_put_contents($list_file_path, $list); // http://php.net/manual/en/function.file-put-contents.php

	system('wget -c -i ' . $list_file_path); // http://php.net/manual/en/function.system.php
