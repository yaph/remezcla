<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
<title><?= $site['TITLE'] ?></title>
</head>
<link rel="stylesheet" type="text/css" href="<?= $site['PATH_CSS'] ?>style.css"
<body>
<div id="site-mission"><?= $site['MISSION'] ?></div>
<div id="site-content"><?= $site['CONTENT'] ?></div>
<a id="self-req" href="/remezcla">Load data via AJAX</a>

<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?= $site['PATH_JS'] ?>script.js">

</script>
</body>
</html>
