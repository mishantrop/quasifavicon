<?php
if (version_compare(PHP_VERSION, '5.4.0') < 0) {
    return '<!-- Your version of PHP is very ancient -->';
}

$output = '';
// Цвет фона. Если не указан, то не применяется.
$backgroundColor = (string)$modx->getOption('backgroundColor', $scriptProperties, '');
// Путь до изображения
$image = (string)$modx->getOption('image', $scriptProperties, '');
// Нужно ли генерировать favicon.ico
$ico = (int)$modx->getOption('ico', $scriptProperties, 0);
// Сниппет, создающий миниатюры (phpthumbof, pthumb, phpthumbon)
$snippet = (string)$modx->getOption('snippet', $scriptProperties, 'phpthumbof');
// Цвет вкладки для мобильных браузеров
$tabColor = (string)$modx->getOption('tabColor', $scriptProperties, '');

// Apple
$sizes = ['57x57', '144x144', '72x72', '144x144', '60x60', '120x120', '76x76', '152x152'];
foreach ($sizes as $size) {
	$as = explode('x', $size);
	$options = 'w='.$as[0].'&h='.$as[1].'&zc=1&f=png&bg='.$backgroundColor;
	$output .= '<link rel="apple-touch-icon-precomposed" sizes="'.$size.'" href="'.$modx->runSnippet($snippet, ['input' => $image, 'options' => $options]).'" />'.PHP_EOL;
}

// Classic
$sizes = ['32x32', '16x16', '96x96', '128x128', '196x196'];
foreach ($sizes as $size) {
	$as = explode('x', $size);
	$options = 'w='.$as[0].'&h='.$as[1].'&zc=1&f=png';
	if (!empty($backgroundColor)) {
		$options .= '&bg='.$backgroundColor;
	}
	$output .= '<link rel="icon" type="image/png" sizes="'.$size.'" href="'.$modx->runSnippet($snippet, ['input' => $image, 'options' => $options]).'" />'.PHP_EOL;
}

// Microsoft
$output .= '<meta name="msapplication-TileColor" content="#FFFFFF" />'.PHP_EOL;
$output .= '<meta name="msapplication-TileImage" content="'.$modx->runSnippet($snippet, ['input' => $image, 'options'=>'w=144&h=144&zc=1&f=png&bg='.$backgroundColor]).'" />'.PHP_EOL;
$sizes = ['70x70', '150x150', '310x310'];
foreach ($sizes as $size) {
	$as = explode('x',$size);
	$options = 'w='.$as[0].'&h='.$as[1].'&zc=1&f=png';
	if (!empty($backgroundColor)) {
		$options .= '&bg='.$backgroundColor;
	}
	$output.='<meta name="msapplication-square'.$size.'logo" content="'.$modx->runSnippet($snippet, ['input' => $image, 'options' => $options]).'" />'.PHP_EOL;
}

// favicon.ico
if ($ico == 1) {
	$options = 'w=16&h=16&zc=1&f=ico';
	if (!empty($backgroundColor)) {
		$options .= '&bg='.$backgroundColor;
	}
	$output .= '<link rel="shortcut icon" href="'.$modx->runSnippet($snippet, ['input' => $image, 'options' => $options]).'" type="image/x-icon" />'.PHP_EOL;
	$output .= '<link rel="icon" href="'.$modx->runSnippet($snippet, ['input' => $image, 'options'=>$options]).'" type="image/x-icon" />'.PHP_EOL;
}

if (!empty($tabColor)) {
	$output .= '<meta name="theme-color" content="#'.$tabColor.'" />'.PHP_EOL;
	$output .= '<meta name="msapplication-navbutton-color" content="#'.$tabColor.'" />'.PHP_EOL;
	$output .= '<meta name="apple-mobile-web-app-status-bar-style" content="#'.$tabColor.'" />'.PHP_EOL;
}

return $output;