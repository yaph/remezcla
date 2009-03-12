<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?= $site['title'] ?></title>
<link rel="stylesheet" type="text/css" href="<?= $site['PATH_CSS'] ?>style.css" />
</head>
<body>
<div id="mission"><?= $site['mission'] ?></div>
<div id="content"><?= $site['content'] ?></div>
<p><a id="self-req" href="/remezcla">Load data via AJAX</a></p>
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?= $site['PATH_JS'] ?>script.js"></script>
</body>
</html>
