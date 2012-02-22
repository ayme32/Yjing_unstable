<?php

	session_start();

	include("../params.php");
	include("../functions.php");
	include("../langs.php");

	if (isset($_SESSION['connected']) AND !empty($_GET['action']) AND $_SESSION['connected'] == true) {
		$action = $_GET['action'];
		if ($action == "add_media") {
			$page = "<h1>Upload an image</h1><br /><form class=\"form-horizontal\" action=\"media.php?action=add_media_processing\" method=\"POST\" enctype=\"multipart/form-data\"><fieldset>";
			$page .= "<div class=\"control-group\"><label class=\"control-label\">Image : </label><div class=\"controls\"><input type=\"file\" class=\"span6\" id=\"media\" name=\"media\"><p class=\"help-block\">For your security, Yjing accepts only by default Jpeg, Gif, Png, Mp3, Mp4, Avi, WebM and Ogg files.</p></div></div>";
			$page .= "<div class=\"control-group\"><div class=\"controls\"><button type=\"submit\" class=\"btn btn-success\">Upload</button></div></div>";
			$page .= "</fieldset></form>";
		}
		elseif ($action == "add_media_processing" AND !empty($_FILES)) {
			$media = $_FILES['media'];
			$ext = strtolower(pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION));
			if (preg_match("#jpg|jpeg|png|mp3|mp4|mpeg|avi|webm|ogg|swf#",$ext)) {
				move_uploaded_file($media['tmp_name'],"../media/".$media['name']);
				$page = "<p>Your media has been uploaded !</p>";
				$page .= "<p>Your media is available at : <strong><i>media/" . $media['name'] . "</i></strong>.</p>";
				$page .= "<p><a href=\"media.php?action=manage_media\" class=\"btn btn-warning\">Go to the media manager</a></p>";
			} else {
				$page = "<p>Your media has not been uploaded. His extensions may not be in the list.</p><p><a href=\"index.php\" class=\"btn btn-warning\">Return to index</a></p>";
			}
		}
		elseif ($action == "manage_media") {
			if (!isEmpty("../media")) {
				$page = "<h1>Your medias on Yjing</h1><br /><table class=\"table\"><thead><tr><th class=\"span1\"></th><th>Filename</th><th>Filesize</th></tr></thead><tbody>";
				$directory = "../media";
				$buffer_directory = opendir($directory) or die('Erreur');
				while($file = readdir($buffer_directory)) {
					if ($file != "." AND $file != ".." AND $file != ".DS_Store") {
						$page .= "<tr>";
						$page .= "<td><a style=\"margin-top: -3px;\" class=\"close\" href=\"media.php?action=delete_media&media=". $file ."\">&times;</a></td>";
						$page .= "<td><a href=\"../media/" . $file . "\">" . $file . "</a></td>";
						$page .= "<td>" . sizeOfFile("../media/" . $file) . "</td>";
						$page .= "</tr>";
					}
				}
				closedir($buffer_directory);
				$page .= "</tbody></table>";
			}
			else {
				$page = "<p>You havn't uploaded any media on Yjing !</p>";
				$page .= "<p><a href=\"media.php?action=add_media\" class=\"btn btn-info\">Click here to add some ...</a></p>";
			}
		}
		elseif ($action == "delete_media" AND !empty($_GET['media'])) {
			$page = "<p>Are you sure that your want to delete <i><strong>" . $_GET['media'] . "</strong></i> ?</p>";
			$page .= "<a href=\"media.php?action=delete_media_processing&media=". $_GET['media'] ."\" class=\"btn btn-warning\">Delete it</a>&nbsp;<a href=\"media.php?action=manage_media\" class=\"btn btn-success\">Cancel</a>";
		}
		elseif ($action == "delete_media_processing" AND !empty($_GET['media'])) {
			unlink("../media/".$_GET['media']);
			$page = "<p><i><strong>" . $_GET['media'] . "</strong></i> has been deleted.</p>";
			$page .= "<p><a href=\"media.php?action=manage_media\" class=\"btn btn-warning\">Return to the media manager</a></p>";
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