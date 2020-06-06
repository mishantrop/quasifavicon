# quasiFavicon
Plugin for MODX Revolution that generates favicons from specified image.

# Usage #

## Example 0 ##

```
[[quasiFavicon?
  &image=`logo.png`
  &background=`ffffff`
  &ico=`0`
  &snippet=`pthumb`
  &tabColor=`0d8ed5`
 ]]
 ```

## Result ##

```html
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/logo1.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/logo2.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/logo3.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/logo4.png">
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/logo5.png">
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/logo.png">
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/logo6.png">
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/logo7.png">
<link rel="icon" type="image/png" sizes="32x32" href="/logo8.png">
<link rel="icon" type="image/png" sizes="16x16" href="/logo9.png">
<link rel="icon" type="image/png" sizes="96x96" href="/logo10.png">
<link rel="icon" type="image/png" sizes="128x128" href="/logo11.png">
<link rel="icon" type="image/png" sizes="196x196" href="/logo12.png">
<meta name="msapplication-TileColor" content="#FFFFFF">
<meta name="msapplication-TileImage" content="/logo13.png">
<meta name="msapplication-square70x70logo" content="/logo14.png">
<meta name="msapplication-square150x150logo" content="/logo15.png">
<meta name="msapplication-square310x310logo" content="/logo16.png">
<meta name="theme-color" content="#0d8ed5">
<meta name="msapplication-navbutton-color" content="#0d8ed5">
<meta name="apple-mobile-web-app-status-bar-style" content="#0d8ed5">
```
	
## Example 1 - Transparent ##

```
[[quasiFavicon?
  &image=`logo.png`
  &background=``
  &ico=`0`
  &snippet=`pthumb`
  &tabColor=`0d8ed5`
]]
```
