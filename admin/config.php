<?php

	session_start();

	include("../params.php");
	include("../functions.php");
	include("../langs.php");

	if (isset($_SESSION['connected']) AND $_SESSION['connected'] == true) {
		if (!isset($_GET['action'])) {
			$config_get = getSiteInfos("../".$datafile_url);
			$page = "<h1>" . $edit_config[$lang] . "</h1><br /><form class=\"form-horizontal\" action=\"config.php?action=edit_config_processing\" method=\"POST\"><fieldset>";
			$page .= "<div class=\"control-group\"><label class=\"control-label\">" . $name_of_the_site[$lang] . " : </label><div class=\"controls\"><input type=\"text\" class=\"span6\" id=\"name\" value=\"" . html_entity_decode($config_get[0]) . "\" name=\"name\"></div></div>";
			$page .= "<div class=\"control-group\"><label class=\"control-label\">" . $content_of_the_sidebar[$lang] . " : </label><div class=\"controls\"><textarea rows=\"4\" class=\"span6\" id=\"sidebar\" name=\"sidebar\">" . stripslashes(html_entity_decode($config_get[1])) . "</textarea></div></div>";
			$page .= "<div class=\"control-group\"><label class=\"control-label\">" . $error_404_message[$lang] . " : </label><div class=\"controls\"><textarea rows=\"6\" class=\"span6\" id=\"404\" name=\"404\">" . stripslashes(html_entity_decode($config_get[3])) . "</textarea></div></div>";
			$page .= "<div class=\"control-group\"><label class=\"control-label\">" . $error_403_message[$lang] . " : </label><div class=\"controls\"><textarea rows=\"6\" class=\"span6\" id=\"403\" name=\"403\">" . stripslashes(html_entity_decode($config_get[4])) . "</textarea></div></div>";
			
			$page .= "<div class=\"control-group\"><label class=\"control-label\">" . $list_available[$lang] . " : </label><div class=\"controls\"><select name=\"list_article\" class=\"span6\">";
			if ($config_get[7] == "1") {
				$page .= "<option selected=\"selected\" value=\"1\">" . $yes_lang[$lang] . "</option>";
				$page .= "<option value=\"0\">" . $no_lang[$lang] . "</option>";
			}
			elseif ($config_get[7] == "0") {
				$page .= "<option value=\"1\">" . $yes_lang[$lang] . "</option>";
				$page .= "<option selected=\"selected\" value=\"0\">" . $no_lang[$lang] . "</option>";
			}
			else {
				$page .= "<option value=\"1\">" . $yes_lang[$lang] . "</option>";
				$page .= "<option value=\"0\">" . $no_lang[$lang] . "</option>";
			}
			$page .= "</select></div></div>";
			
			$page .= "<div class=\"control-group\"><label class=\"control-label\">" . $theme_options[$lang] . " : </label><div class=\"controls\"><select class=\"span6\" name=\"theme\">";

			$page .= scanDirectory("../themes",$config_get[2]);

			$page .= "</select></div></div>";
			
			$page .= "<div class=\"control-group\"><label class=\"control-label\">" . $number_of_attemps[$lang] . " : </label><div class=\"controls\"><input type=\"text\" class=\"span6\" id=\"tent\" value=\"" . html_entity_decode($config_get[5]) . "\" name=\"tent\"></div></div>";
			
			$page .= "<div class=\"control-group\"><label class=\"control-label\">" . $language[$lang] . " : </label><div class=\"controls\"><select name=\"lang\" class=\"span6\">";
			if ($config_get[8] == "1") {
				$page .= "<option selected=\"selected\" value=\"1\">" . $french_lang[$lang] . "</option>";
				$page .= "<option value=\"0\">" . $english_lang[$lang] . "</option>";
			}
			elseif ($config_get[8] == "0") {
				$page .= "<option value=\"1\">" . $french_lang[$lang] . "</option>";
				$page .= "<option selected=\"selected\" value=\"0\">" . $english_lang[$lang] . "</option>";
			}
			else {
				$page .= "<option value=\"0\">" . $english_lang[$lang] . "</option>";
				$page .= "<option value=\"1\">" . $french_lang[$lang] . "</option>";
			}
			$page .= "</select></div></div>";

			$page .= "<div class=\"control-group\"><div class=\"controls\"><button type=\"submit\" class=\"btn btn-info\">" . $save_changes[$lang] . "</button></div></div>";
			
			$page .= "</fieldset></form>";
		}
		elseif ($_GET['action'] == "edit_config_processing" AND isset($_POST['name'])) {
			$xml = new simpleXMLElement(file_get_contents("../" . $datafile_url));

			$xml->config->title = htmlentities($_POST['name']);
			$xml->config->error404 = htmlentities($_POST['404']);
			$xml->config->error403 = htmlentities($_POST['403']);
			$xml->config->sidebar = htmlentities($_POST['sidebar']);
			$xml->config->tent = $_POST['tent'];
			$xml->config->theme = $_POST['theme'];
			$xml->config->lang = $_POST['lang'];
			$xml->config->list_article = $_POST['list_article'];
			
			$buffer = $xml->asXML();
			unlink("../" . $datafile_url);
			$file = fopen("../" . $datafile_url,"w");
			fputs($file,$buffer);
			fclose($file);
			$page = "<p>" . $your_changes_has_been_done[$lang] . " !</p><p><a href=\"index.php\" class=\"btn btn-warning\">" . $return_to_index[$lang] . "</a></p>";
		}

		include("design.html");
	}

	else {
		header("Location: login.php");
	}

?>