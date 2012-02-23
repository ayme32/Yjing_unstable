<?php

function getArticle($key,$database) {

	$xml = new simpleXMLElement(file_get_contents($database));

	$state = "nil";

	foreach ($xml->article as $output) {
		if ($output->key == $key) {
			$state = array(0 => $output->title, 1 => $output->content, 2 => $output->pubdate, 3 => $output->author);
		}
	}
	
	return $state;
}

function getPage($key,$database) {

	$xml = new simpleXMLElement(file_get_contents($database));

	$state = true;

	foreach ($xml->page as $output) {
		if ($output->key == $key) {
			$state = array(0 => $output->content);
		}
	}

	return $state;
}

function getSiteInfos($database) {

	$xml = new simpleXMLElement(file_get_contents($database));

	return array(0 => $xml->config->title[0], 1 => $xml->config->sidebar[0], 2 => $xml->config->theme[0], 3 => $xml->config->error404[0], 4 => $xml->config->error403[0], 5 => $xml->config->tent[0], 6 => $xml->config->install[0], 7 => $xml->config->list_article[0], 8 => $xml->config->lang[0]);
}

function getListArticles($database) {
	$xml = new simpleXMLElement(file_get_contents($database));
	$page = "<table class=\"table\"><thead><tr><th>Name of the article</th><th>Date of publication</th><th>Author</th></tr></thead><tbody>";

	foreach ($xml->article as $output) {
		$page .= "<tr>";
		$page .= "<td><a href=\"index.php?article=". $output->key ."\">". $output->title ."</a></td>";
		$page .= "<td>".$output->pubdate."</td>";
		$page .= "<td>".$output->author."</td>";
		$page .= "</tr>";
	}

	$page .= "</tbody></table>";

	return $page;
}

function openFile($url) {
	if (file_exists($url)) {
		$file = fopen($url,"r");
		$output = "";
		while (!feof ($file))
			{
				$buffer1 = fgets($file, 4096);
				$buffer2 = $output . $buffer1;
				$output = $buffer2;
  			}
  		fclose($file);
  	}
  	else {
  		$output = false;
  	}
	return $output;
}

function scanDirectory($directory,$actual_theme){
	$result = "";
	$buffer_directory = opendir($directory) or die('Erreur');
	while($file = readdir($buffer_directory)) {
		if ($file != "." AND $file != ".." AND $file != ".DS_Store") {
			if ($file == $actual_theme) {
				$result .= "<option selected=\"selected\" value=\"" . $file . "\">" . $file . "</option>";
			}
			else {
				$result .= "<option value=\"" . $file . "\">" . $file . "</option>";
			}
		}
	}
	closedir($buffer_directory);
	return $result;
}

function sizeOfFile($path) {
	$buffer = filesize($path);
	if($buffer >= pow(1024, 3) )
    {
        $buffer = round( $buffer / pow(1024, 3), 2);
        return $buffer . ' Go';
    }
    elseif($buffer >=  pow(1024, 2) )
    {
        $buffer = round( $buffer / pow(1024, 2), 2);
        return $buffer . ' Mo';
    }
    else
    {
        $buffer = round($buffer / 1024, 2);
        return $buffer . ' Ko';
    }
}

function isEmpty($src) { 
	$handler = opendir($src);
	$c = 0;
	while (($file = readdir($handler)) !== FALSE) { 
		if ($file != '.' AND $file != '..' AND $file != ".DS_Store") { 
			$c++; 
		} 
	} 
	closedir($handler); 
	if($c==0) 
		return true; 
	else 
		return false; 
} 


?>