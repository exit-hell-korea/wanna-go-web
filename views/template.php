<!doctype html>
<html lang="ko" id="hax0r" dir="ltr" itemscope="" xml:lang="ko" itemtype="http://schema.org/Article">
<head>
    <?php require_once('default/head.php')?>
</head>
    <body class="face<?=' '.$ua['platform'].' '?>" data-filter="%.@.]" data-ua-info="<?=$ua['userAgent']?>" data-ua-name="<?=$ua['name']?>" data-ua-version="<?=$ua['version']?>" data-ua-ip="<?=$ua['ip']?>" data-ua-pattern="<?=$ua['pattern']?>" data-ua-platform="<?=$ua['platform']?>" style="cursor: auto">
        <noscript>
            <iframe src="//www.googletagmanager.com/ns.html?id=GTM-MRXCQL" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <?=$this->template->content?>
        <?php require_once('default/footer.php')?>
    </body>
</html>
