<?php

	session_start();

	include("../params.php");
	include("../functions.php");
	include("../langs.php");

	if (isset($_SESSION['connected']) AND !empty($_GET['action']) AND $_SESSION['connected'] == true) {
		$action = $_GET['action'];
		if ($action == "add_media") {
			$page = "<h1>" . $upload_an_media[$lang] . "</h1><br /><form class=\"form-horizontal\" action=\"media.php?action=add_media_processing\" method=\"POST\" enctype=\"multipart/form-data\"><fieldset>";
			$page .= "<div class=\"control-group\"><label class=\"control-label\">" . $file_lang[$lang] . " : </label><div class=\"controls\"><input type=\"file\" class=\"span6\" id=\"media\" name=\"media\"><p class=\"help-block\">" . $for_your_security[$lang] . ".</p></div></div>";
			$page .= "<div class=\"control-group\"><div class=\"controls\"><button type=\"submit\" class=\"btn btn-success\">" . $upload[$lang] . "</button></div></div>";
			$page .= "</fieldset></form>";
		}
		elseif ($action == "add_media_processing" AND !empty($_FILES)) {
			$media = $_FILES['media'];
			$ext = strtolower(pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION));
			if (preg_match("#jpg|jpeg|png|mp3|mp4|mpeg|avi|webm|ogg|swf|pdf|tiff|img|dmg|zip|hex|bin#",$ext)) {
				move_uploaded_file($media['tmp_name'],"../media/".$media['name']);
				$page = "<p>" . $your_media_has_been_uploaded[$lang] . " !</p>";
				$page .= "<p>" . $your_media_is_available_at[$lang] . " : <strong><i>media/" . $media['name'] . "</i></strong>.</p>";
				$page .= "<p><a href=\"media.php?action=manage_media\" class=\"btn btn-warning\">" . $go_to_the_media_manager[$lang] . "</a></p>";
			} else {
				$page = "<p>" . $your_media_has_not_been_uploaded[$lang] . ".</p><p><a href=\"index.php\" class=\"btn btn-warning\">" . $return_to_index[$lang] . "</a></p>";
			}
		}
		elseif ($action == "manage_media") {
			if (!isEmpty("../media")) {
				$page = "<h1>" . $your_medias_on_yjing[$lang] . "</h1><br /><table class=\"table\"><thead><tr><th class=\"span1\"></th><th>" . $filename[$lang] . "</th><th>" . $filesize[$lang] . "</th></tr></thead><tbody>";
				$directory = "../media";
				$buffer_directory = opendir($directory) or die('Erreur');
				while($file = readdir($buffer_directory)) {
					if ($file != "." AND $file != ".." AND $file != ".DS_Store") {
						$page .= "<tr>";
						$page .= "<td><a style=\"margin-top: -3px;\" class=\"close\" href=\"media.php?action=delete_media&media=". $file ."&token=". $_SESSION['token'] ."\">&times;</a></td>";
						$page .= "<td><a href=\"../media/" . $file . "\">" . $file . "</a></td>";
						$page .= "<td>" . sizeOfFile("../media/" . $file) . "</td>";
						$page .= "</tr>";
					}
				}
				closedir($buffer_directory);
				$page .= "</tbody></table>";
			}
			else {
				$page = "<p>" . $you_havnt_uploaded[$lang] . " !</p>";
				$page .= "<p><a href=\"media.php?action=add_media\" class=\"btn btn-info\">" . $click_here_to_add_some[$lang] . " ...</a></p>";
			}
		}
		elseif ($action == "delete_media" AND !empty($_GET['media'])) {
			$page = "<p>" . $are_you_sure_that_you_want_to_delete[$lang] . " <i><strong>" . $_GET['media'] . "</strong></i> ?</p>";
			$page .= "<a href=\"media.php?action=delete_media_processing&media=". $_GET['media'] ."&token=". $_GET['token'] ."\" class=\"btn btn-warning\">" . $delete_it[$lang] . "</a>&nbsp;<a href=\"media.php?action=manage_media\" class=\"btn btn-success\">" . $cancel[$lang] . "</a>";
		}
		elseif ($action == "delete_media_processing" AND !empty($_GET['media']) AND $_GET['token'] == $_SESSION['token']) {
			unlink("../media/".$_GET['media']);
			$page = "<p><i><strong>" . $_GET['media'] . "</strong></i> " . $has_been_deleted[$lang] . ".</p>";
			$page .= "<p><a href=\"media.php?action=manage_media\" class=\"btn btn-warning\">" . $return_to_the_media_manager[$lang] . "</a></p>";
		}
		else {
			header("Location: index.php");
		}

		include("design.html");
	}

	else {
		header("Location: login.php");
	}

?>