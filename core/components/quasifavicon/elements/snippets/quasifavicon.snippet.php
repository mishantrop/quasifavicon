<?php
/*
[[quasiFavicon? 
    &image=`cat.png`
    &backgroundColor=`f00`
    &tabColor=`f00`
    &ico=`1`
    &snippet=`pthumb`
 ]]
*/
if (version_compare(PHP_VERSION, '5.4.0') < 0) {
  return '<!-- Your version of PHP is very ancient -->';
}

$tags = [];
// Цвет фона. Если не указан, то не применяется.
$backgroundColor = $modx->getOption('backgroundColor', $scriptProperties, '');
// Путь до изображения
$image = $modx->getOption('image', $scriptProperties, '');
// Нужно ли генерировать favicon.ico
$ico = (int)$modx->getOption('ico', $scriptProperties, 0);
// Сниппет, создающий миниатюры (phpthumbof, pthumb, phpthumbon)
$snippet = $modx->getOption('snippet', $scriptProperties, 'phpthumbof');
// Цвет вкладки для мобильных браузеров
$tabColor = $modx->getOption('tabColor', $scriptProperties, '');

// Apple
$sizesApple = [ '57x57', '144x144', '72x72', '144x144', '60x60', '120x120', '76x76', '152x152' ];
foreach ($sizesApple as $size) {
	$as = explode('x', $size);
	$options = 'w='.$as[0].'&h='.$as[1].'&zc=1&f=png';
	if (!empty($backgroundColor)) {
	    $options .= '&bg='.$backgroundColor;
	}
  $thumbPath = $modx->runSnippet($snippet, ['input' => $image, 'options' => $options]);
	$tags[] = '<link rel="apple-touch-icon-precomposed" sizes="'.$size.'" href="'.$thumbPath.'">';
}

// Classic
$sizesClassic = [ '32x32', '16x16', '96x96', '128x128', '196x196' ];
foreach ($sizesClassic as $size) {
	$as = explode('x', $size);
	$options = 'w='.$as[0].'&h='.$as[1].'&zc=1&f=png';
	if (!empty($backgroundColor)) {
		$options .= '&bg='.$backgroundColor;
	}
  $thumbPath = $modx->runSnippet($snippet, ['input' => $image, 'options' => $options]);
	$tags[] = '<link rel="icon" type="image/png" sizes="'.$size.'" href="'.$thumbPath.'">';
}

// Microsoft
$tags[] = '<meta name="msapplication-TileColor" content="#FFFFFF" />';
$tags[] = '<meta name="msapplication-TileImage" content="'.$modx->runSnippet($snippet, ['input' => $image, 'options'=>'w=144&h=144&zc=1&f=png&bg='.$backgroundColor]).'">';
$sizesMicrosoft = ['70x70', '150x150', '310x310'];
foreach ($sizesMicrosoft as $size) {
	$as = explode('x', $size);
	$options = 'w='.$as[0].'&h='.$as[1].'&zc=1&f=png';
	if (!empty($backgroundColor)) {
		$options .= '&bg='.$backgroundColor;
	}
  $thumbPath = $modx->runSnippet($snippet, ['input' => $image, 'options' => $options]);
	$tags[] = '<meta name="msapplication-square'.$size.'logo" content="'.$thumbPath.'">';
}

// favicon.ico
if ($ico === 1) {
	$options = 'w=16&h=16&zc=1&f=ico';
	if (!empty($backgroundColor)) {
		$options .= '&bg='.$backgroundColor;
	}
  $thumbPath = $modx->runSnippet($snippet, ['input' => $image, 'options' => $options]);
	$tags[] = '<link rel="shortcut icon" href="'.$thumbPath.'" type="image/x-icon">';
	$tags[] = '<link rel="icon" href="'.$thumbPath.'" type="image/x-icon">';
}

if (!empty($tabColor)) {
	$tags[] = '<meta name="theme-color" content="#'.$tabColor.'">';
	$tags[] = '<meta name="msapplication-navbutton-color" content="#'.$tabColor.'">';
	$tags[] = '<meta name="apple-mobile-web-app-status-bar-style" content="#'.$tabColor.'">';
}

return implode(PHP_EOL, $tags);
