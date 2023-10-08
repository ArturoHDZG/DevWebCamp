<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="UpTask: Organizador de Proyectos y Tareas.">
  <meta name="author" content="Arturo Hernández">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@arturo_hdzg">
  <meta name="twitter:creator" content="@arturo_hdzg">
  <meta name="twitter:title" content="DevWebCamp">
  <meta name="twitter:description" content="DevWebCamp: Talleres y Conferencias">
  <meta name="twitter:image" content="https://devwebcamp.ticocasas.domcloud.io/devwebcamp-preview.jpg">
  <meta property="og:title" content="DevWebCamp">
  <meta property="og:description" content="DevWebCamp: Talleres y Conferencias">
  <meta property="og:image" content="https://devwebcamp.ticocasas.domcloud.io/devwebcamp-preview.jpg">
  <meta property="og:url" content="https://devwebcamp.ticocasas.domcloud.io">
  <meta property="og:type" content="website">
  <meta name="keywords" content="Talleres, Conferencias, BootCamp, IT">
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="msapplication-TileImage" content="/favicon/mstile-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/favicon/android-chrome-192x192.png">
  <link rel="manifest" href="/favicon/site.webmanifest">
  <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <title>DevWebCamp - <?php echo $titulo; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"
  />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="/build/css/app.css">
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin="" defer>
  </script>
</head>
<body>

  <?php
    include_once __DIR__ .'/templates/header.php';
    echo $contenido;
    include_once __DIR__ .'/templates/footer.php';
  ?>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true
    });
  </script>
  <script src="/build/js/main.min.js" defer></script>
</body>
</html>
