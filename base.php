<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Остров мастеров / <? echo $title ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Description" content="<? echo $description ?>" />
<link rel='shortcut icon' href='favicon.ico' />
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]><link rel="stylesheet" type="text/css" media="screen" href="/css/ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="/css/ie6.css" /><![endif]-->
<link rel="stylesheet" type="text/css" href="/css/lightbox.css" media="screen" />
</head>

<body class="<? echo $class ?>">

    	<div id="body">
			<div class="top-bg"></div>
            <div class="bwidth">
				<div id="header">
					<a href="/" id="logo" title="Остров мастеров / Главная"></a>
					<? include('menu.php') ?>
				</div>
            </div>
			<?
            if (empty($path[0])) {
                echo '<div class="greybg">';
            }
            
            echo sprintf('<div class="bwidth">%s</div>', $content);
				
			if (empty($path[0])) {
                echo '</div>';
            }
            
            echo isset($service) ? $service : '';
			?>
		</div>
		<div id="footer">
			<div class="bwidth">
				<? 
                include('menu.php');
                printf('© %s %s', date('Y'), 'Остров Мастеров');
                echo isset($seo) ? $seo : '';
                ?>
			</div>
		</div>
        
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/js/lightbox.min.js"></script>
        
        <!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39709720 = new Ya.Metrika({ id:39709720, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39709720" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

</body>
</html>
