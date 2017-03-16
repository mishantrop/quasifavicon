# quasiFavicon
A MODX extra for generating favicons and their associated files.
# Usage #
## Example ##
	[[quasiFavicon?
		&image=`logo.png`
		&background=`ffffff`
		&ico=`0`
		&snippet=`pthumb`
		&tabColor=`0d8ed5`
	]]
## Result ##
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/logo.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/logo.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/logo.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/logo.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/logo.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/logo.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/logo.png"/>
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/logo.png"/>
	<link rel="icon" type="image/png" sizes="32x32" href="/logo.png"/>
	<link rel="icon" type="image/png" sizes="16x16" href="/logo.png"/>
	<link rel="icon" type="image/png" sizes="96x96" href="/logo.png"/>
	<link rel="icon" type="image/png" sizes="128x128" href="/logo.png"/>
	<link rel="icon" type="image/png" sizes="196x196" href="/logo.png"/>
	<meta name="msapplication-TileColor" content="#FFFFFF"/>
	<meta name="msapplication-TileImage" content="/logo.png"/>
	<meta name="msapplication-square70x70logo" content="/logo.png"/>
	<meta name="msapplication-square150x150logo" content="/logo.png"/>
	<meta name="msapplication-square310x310logo" content="/logo.png"/>
	<meta name="theme-color" content="#0d8ed5"/>
	<meta name="msapplication-navbutton-color" content="#0d8ed5"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="#0d8ed5"/>