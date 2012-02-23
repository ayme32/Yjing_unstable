<?php
$lang_file = getSiteInfos("../" . $datafile_url);
$lang = html_entity_decode($lang_file[8]);

// General
$save_changes = array(0 => "Save changes", 1 => "Sauvegarder les changements");
$save = array(0 => "Save", 1 => "Sauvegarder");
$your_changes_has_been_done = array(0 => "Your changes has been done", 1 => "Changements effectu&eacute;s avec succ&egrave;s");
$return_to_index = array(0 => "Return to index", 1 => "Retourner &agrave; l'accueil");

$welcome = array(0 => "Welcome to Yjing", 1 => "Bienvenue sur Yjing");
$ready = array(0 => "Your administration panel is ready", 1 => "Votre panneau d'administration est pr&ecirc;t");
$help = array(0 => "You need some help", 1 => "Vous avez besoin d'aide");
$twitter = array(0 => "You can read the manual <a href='http://tibounise.github.com/Yjing/manual.html' target='_blank'>here</a>. There's also my Twitter account : @tibounise", 1 => "Vous pouvez lire le manuel <a href='http://tibounise.github.com/Yjing/manual.html' target='_blank'>ici</a>. Ou alors mon compte Twitter : @tibounise");

// Admin
$administration = array(0 => "Administration", 1 => "Administration");
$log_out = array(0 => "Log out", 1 => "Se d&eacute;connecter");
$article = array(0 => "Article", 1 => "Article");
$new_article = array(0 => "New article", 1 => "Nouvel article");
$edit_article = array(0 => "Edit article", 1 => "&Eacute;diter un article");
$delete_article = array(0 => "Delete article", 1 => "Supprimer un article");
$page_lang = array(0 => "Page", 1 => "Page");
$new_page = array(0 => "New page", 1 => "Nouvelle page");
$edit_page = array(0 => "Edit page", 1 => "&Eacute;diter une page");
$delete_page = array(0 => "Delete page", 1 => "Supprimer une page");
$site = array(0 => "Site", 1 => "Site");
$configuration = array(0 => "Configuration", 1 => "Configuration");
$media_lang = array(0 => "Media", 1 => "M&eacute;dia");
$manage_medias = array(0 => "Manage medias", 1 => "G&eacute;rer les m&eacute;dias");
$add_a_new_media = array(0 => "Add a new media", 1 => "Ajouter un m&eacute;dia");

// config.php
$edit_config = array(0 => "Edit config", 1 => "Configuration");
$name_of_the_site = array(0 => "Name of the site", 1 => "Nom du site");
$content_of_the_sidebar = array(0 => "Content of the sidebar", 1 => "Contenu de la sidebar");
$error_404_message = array(0 => "Error 404 message", 1 => "Erreur 404");
$error_403_message = array(0 => "Error 403 message", 1 => "Erreur 403");
$list_available = array(0 => "List available", 1 => "Liste des articles");
$theme_options = array(0 => "Theme options", 1 => "Th&egrave;me");
$number_of_attemps = array(0 => "Number of attemps", 1 => "Nombre d'atteintes");
$language = array(0 => "Language", 1 => "Langue");
$yes_lang = array(0 => "Yes", 1 => "Oui");
$no_lang = array(0 => "No", 1 => "Non");
$french_lang =array(0 => "French", "Fran&ccedil;ais");
$english_lang = array(0 => "English", 1 => "Anglais");

// edit.php
$choose_an_article_to_edit = array(0 => "Choose an article to edit", 1 => "Choisissez un article pour le modifier");
$title = array(0 => "Title", 1 => "Titre");
$pubdate = array(0 => "Pubdate", 1 => "Date");
$author = array(0 => "Author", 1 => "Auteur");
$edit_an_article = array(0 => "Edit an article", 1 => "&Eacute;diter un article");
$name_of_the_article = array(0 => "Name of the article", 1 => "Nom de l'article");
$content = array(0 => "Content", 1 => "Contenu");
$your_article_is_available_at = array(0 => "Your article is available at", 1 => "Votre article est disponible ici");
$choose_an_article_to_delete_it = array(0 => "Choose an article to delete it", 1 => "Choisissez un article pour le supprimer");
$are_you_sure_that_you_want_to_delete_it = array(0 => "Are you sure that you want to delete it", 1 => "&Ecirc;tes-vous s&ucirc;r de vouloir supprimer &ccedil;a");
$continue = array(0 => "Continue", 1 => "Continuer");
$cancel = array(0 => "Cancel", 1 => "Quitter");
$article_deleted = array(0 => "Article deleted", 1 => "Article supprim&eacute;");
$add_an_article = array(0 => "Add an article", 1 => "Ajouter un article");
$type_something_here = array(0 => "Type something here", 1 => "Tapez quelque chose ici");
$the_article_has_been_published = array(0 => "The article has been published", "L'article a bien &eacute;t&eacute; publier");
$you_havnt_filled_some_fields = array(0 => "You havn't filled some fields", "Vous n'avez pas rempli certains champs");

$choose_an_page_to_edit = array(0 => "Choose an page to edit", 1 => "Choisissez une page la modifier");
$edit_an_page = array(0 => "Edit an page", 1 => "&Eacute;ditez une page");
$your_page_is_available_at = array(0 => "Your page is available at", 1 => "Votre page est disponible ici");
$choose_an_page_to_delete_it = array(0 => "Choose an page to delete it", 1 => "Choisissez une page pour la supprimer");
$you_cant_delete_the_first_page = array(0 => "You can't delete the first page : it's your homepage", 1 => "Vous ne pouvez pas supprimer la premi&egrave;re page : c'est votre page d'accueil");
$page_deleted = array(0 => "Page deleted", 1 => "Page supprim&eacute;e");
$add_a_page = array(0 => "Add a page", 1 => "Ajouter une page");
$the_page_has_been_published = array(0 => "The page has been published", "La page a bien &eacute;t&eacute; publier");

// media.php
$upload_an_media = array(0 => "Upload an media", 1 => "Uploader un m&eacute;dia");
$file_lang = array(0 => "File", 1 => "Fichier");
$for_your_security = array(0 => "For your security, Yjing accepts only by default Jpeg, Gif, Png, Mp3, Mp4, Avi, WebM and Ogg files", 1 => "Pour votre s&eacute;curit&eacute;e, Yjing accepte uniquement par d&eacute;fault les fichiers Jpeg, Gif, Png, Mp3, Mp4, Avi, WebM and Ogg");
$upload = array(0 => "Upload", 1 => "Upload");
$your_media_has_been_uploaded = array(0 => "Your media has been uploaded", 1 => "Votre m&eacute;dia a bien &eacute;t&eacute; upload&eacute;");
$your_media_is_available_at = array(0 => "Your media is available at", 1 => "Votre m&eacute;dia est disponible ici");
$go_to_the_media_manager = array(0 => "Go to the media manager", 1 => "Aller au m&eacute;dia manager");
$your_media_has_not_been_uploaded = array(0 => "Your media has not been uploaded. His extensions may not be in the list", 1 => "Votre m&eacute;dia n'a pas &eacute;t&eacute; upload&eacute;. Son extension ne figure pas dans la liste");
$your_medias_on_yjing = array(0 => "Your medias on Yjing", 1 => "Vos m&eacute;dias sur Yjing");
$filename = array(0 => "Filename", 1 => "Nom");
$filesize = array(0 => "Filesize", 1 => "Taille");
$you_havnt_uploaded = array(0 => "You havn't uploaded any media on Yjing", 1 => "Vous n'avez upload&eacute; aucun m&eacute;dia sur Yjing");
$click_here_to_add_some = array(0 => "Click here to add some", 1 => "Clickez ici pour en ajouter");
$are_you_sure_that_you_want_to_delete = array(0 => "Are you sure that you want to delete", 1 => "&Ecirc;tes-vous s&ucirc;r de vouloir supprimer");
$has_been_deleted = array(0 => "has been deleted", 1 => "a bien &eacute;t&eacute; supprim&eacute;");
$return_to_the_media_manager = array(0 => "Return to the media manager", 1 => "Revenir au m&eacute;dia manager");
$delete_it = array(0 => "Delete it", 1 => "Supprimer");

// login.php
$login_lang = array(0 => "Login", 1 => "Connexion");
$username = array(0 => "Username", 1 => "Nom de compte");
$password = array(0 => "Password", 1 => "Mot de passe");
$log_in = array(0 => "Log in", 1 => "Se connecter");
$notenough = array(0 => "You didn't have filled enough fields", 1 => "Vous n'avez pas rempli tout les champs");
$badlogin = array(0 => "Your login is wrong", 1 => "Votre nom de compte/mot de passe est incorrect");
$error_lang = array(0 => "ERROR", 1 => "ERREUR");
$attemps = array(0 => "You've tried too much attemps", 1 => "Vous avez fait trop de tentatives de connexion");

?>