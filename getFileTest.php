<?php

require_once('GetMyFile.class.php');

$filePath = '/home/slawson/Hellas_lunch_menu.pdf';

$fileGetter = new GetMyFile($filePath);

$fileGetter->serveFile();