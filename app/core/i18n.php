<?php
    $localizations = ['en', 'fr_CA'];//set the localisation choices

    //to accept languages from the querystring as follows: mysite.com?lang=fr_CA
    if(isset($_GET['lang'])){ //if there is a language choice in the querystring
	    $lang = $_GET['lang'];//use this language
    }else if (isset($_SESSION["lang"])){
	    $lang=$_SESSION["lang"]; //from session
    }else
	    $lang = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);

    $lang = Locale::lookup($localizations, $lang, true, 'en');

    $_SESSION['lang'] = $lang; //set a session variable

    //extract the root language from the complete locale to use with strftime
    $rootlang = preg_split('/_/', $lang); $rootlang = (is_array($rootlang)?$rootlang[0]:$rootlang);

    bindtextdomain($lang, "locale"); //pointing to the locale folder for the language of choice
    textdomain($lang); //what is the file name to find translations