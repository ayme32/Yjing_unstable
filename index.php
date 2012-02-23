<?php

include "params.php";
include "functions.php";

$site_infos = getSiteInfos($datafile_url);

if ($site_infos[6] == "0") {
	header('Location: /install/');
}

include "themes/" . $site_infos[2] . "/theme.php";

if (isset($_GET['article']) AND $_GET['article'] == "list" AND $site_infos[7] == "1") {
$page = getListArticles($datafile_url);
echo showPage($site_infos[0],$site_infos[1],stripslashes($page));
}

elseif (isset($_GET['article']) AND preg_match("#^[0-9]+$#", $_GET["article"])) {

	$article = getArticle($_GET["article"], $datafile_url);

	if ($article == "nil") {
		echo showPage($site_infos[0],$site_infos[1],stripslashes($site_infos[3]));
	}
	else {
		echo showArticle($site_infos[0],$site_infos[1],$article[0],$article[2],$article[3],$article[1]);
	}


}

elseif (isset($_GET["page"]) AND preg_match("#^[0-9]+$#", $_GET["page"])) {

	$page = getPage($_GET["page"], $datafile_url);

	if ($page == "nil") {
		echo showPage($site_infos[0],$site_infos[1],stripslashes($site_infos[3]));
	}
	else {
		echo showPage($site_infos[0],$site_infos[1],stripslashes($page[0]));
	}
}

else {

	$page = getPage("1", $datafile_url);

	echo showPage($site_infos[0],$site_infos[1],$page[0]);

}

?> 