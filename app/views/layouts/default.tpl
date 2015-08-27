<?
/**
 * @var string $pageTitle
 * @var string $metaDescription
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title><?=$pageTitle?></title>
    <meta name="description" content="<?=$metaDescription?>">
    <link type="text/css" rel="stylesheet" href="/css/normalize.min.css">
    <link type="text/css" rel="stylesheet" href="/css/style.css">
    <script type="text/javascript" src="/js/short_url.js"></script>
</head>
<body>
    <div class="page">
        <?=$this->fetchContent()?>
    </div>
</body>
</html>