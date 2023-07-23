<?php

  define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
  define("UROOT", "http://localhost/bot/index.php");

  $parameters = json_decode(file_get_contents(ROOT."/bot/params.json"));
  /* Bot Token */
  define("BOT_TOKENT", $parameters->token);
  /* Database constant function */ 
  define("DBHOST", $parameters->host);
  define("DBNAME", $parameters->name);
  define("DBUSER", $parameters->user);
  define("DBPASS", $parameters->pass);