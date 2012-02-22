<?php
	
	function showArticle($site_title,$navigation_bar_content,$article_title,$article_pubdate,$article_author,$article_content) {
		$file = openFile("themes/twitter_bootstrap/article.html");
		$article_array = array("<site_title>","<navigation_bar_content>","<article_title>","<article_pubdate>","<article_author>","<article_content>");
		$content_array = array($site_title,stripslashes($navigation_bar_content),stripslashes($article_title),$article_pubdate,stripslashes($article_author),stripslashes($article_content));
		if ($file != false) {
			return html_entity_decode(str_replace($article_array, $content_array, $file));
		}
		else {
			return "Your theme seems to be corrupted. Please check it.";
		}
	}

	function showPage($site_title,$navigation_bar_content,$page_content) {
		$file = openFile("themes/twitter_bootstrap/page.html");
		$page_array = array("<site_title>","<navigation_bar_content>","<page_content>");
		$content_array = array($site_title,stripslashes($navigation_bar_content),stripslashes($page_content));
		if ($file != false) {
			return html_entity_decode(str_replace($page_array, $content_array, $file));
		}
		else {
			return "Your theme seems to be corrupted. Please check it.";
		}
	}

?>