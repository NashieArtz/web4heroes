<?php

// Détruire toutes les variables de session
$_SESSION = [];

// Détruire la session
session_destroy();

// Redirection vers l'accueil
header("Location: http://web4heroes.dvl.to/index");
exit();


