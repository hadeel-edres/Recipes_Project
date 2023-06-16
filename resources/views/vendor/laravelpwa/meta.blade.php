<!-- Web Application Manifest -->
<link rel="manifest" href="{{ route('laravelpwa.manifest') }}">
<!-- Chrome for Android theme color -->
<meta name="theme-color" content="{{ $config['theme_color'] }}">

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="{{ $config['display'] == 'standalone' ? 'yes' : 'no' }}">
<meta name="application-name" content="{{ $config['short_name'] }}">
<link rel="icon" sizes="{{ data_get(end($config['icons']), 'sizes') }}" href="{{ data_get(end($config['icons']), 'src') }}">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="{{ $config['display'] == 'standalone' ? 'yes' : 'no' }}">
<meta name="apple-mobile-web-app-status-bar-style" content="{{  $config['status_bar'] }}">
<meta name="apple-mobile-web-app-title" content="{{ $config['short_name'] }}">
<link rel="apple-touch-icon" href="{{ data_get(end($config['icons']), 'src') }}">


<link href="{{ asset($config['splash']['200x320']) }}" media="(device-width: 200px) and (device-height: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ asset($config['splash']['828x1792']) }}" media="(device-width: 828px) and (device-height: 1792px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ asset($config['splash']['960x1600']) }}" media="(device-width: 960px) and (device-height: 1600px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ asset($config['splash']['1125x2436']) }}" media="(device-width: 1125px) and (device-height: 2436px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ asset($config['splash']['1242x2208']) }}" media="(device-width: 1242px) and (device-height: 2208px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ asset($config['splash']['1242x2688']) }}" media="(device-width: 1242px) and (device-height: 2688px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ asset($config['splash']['128x1920']) }}" media="(device-width: 128px) and (device-height: 1920px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ asset($config['splash']['1536x2008']) }}" media="(device-width: 1536px) and (device-height: 2008px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />


<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="{{ $config['background_color'] }}">
<meta name="msapplication-TileImage" content="{{ data_get(end($config['icons']), 'src') }}">

<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>