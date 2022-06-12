<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel - @yield('title') </title>

    <link rel="stylesheet" href="/css/all.css">
</head>
<body>
<div class="off-canvas position-left reveal-for-large" id="offCanvas" data-off-canvas>

<!-- side bar -->
<ul class="vertical menu">
  <li><a href="#">Foundation</a></li>
  <li><a href="#">Dot</a></li>
  <li><a href="#">ZURB</a></li>
  <li><a href="#">Com</a></li>
  <li><a href="#">Slash</a></li>
  <li><a href="#">Sites</a></li>
</ul>
<!-- end side bar -->
</div>

<div class="off-canvas-content" data-off-canvas-content>
<!-- Your page content lives here -->
<div class="title-bar">
  <div class="title-bar-left">
    <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
    <span class="title-bar-title"> {{$_ENV['APP_NAME']}};</span>
  </div>
</div>
    @yield('content')
</div>
    <script async src="/js/all.js"></script>

</body>
</html>