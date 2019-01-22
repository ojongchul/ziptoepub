<?php

require_once "./pclzip.lib.php";
$directory = $argv[1];
$epubfile = "./epub/".$directory.".epub";
$data = "./epub/".$directory;

if(file_exists($epubfile)) {
  unlink($epubfile);
}

$file = fopen("mimetype", w);
fwrite($file,"application/epub+zip");
fclose($file);

exec("zip -0 -D -X ".$epubfile." mimetype");
$zipfile = new PclZip($epubfile);
$zipfile->add($data, PCLZIP_OPT_REMOVE_PATH, $data);

?>
