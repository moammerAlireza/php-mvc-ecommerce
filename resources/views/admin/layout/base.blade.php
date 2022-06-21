<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel - @yield('title') </title>

    <link rel="stylesheet" href="/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" ></script>
</head>
<body data-page-id="@yield('data-page-id')">
  @include('includes.admin-sidebar')

<div class="off-canvas-content admin-title-bar" data-off-canvas-content>
<!-- Your page content lives here -->
<div class="title-bar">
  <div class="title-bar-left">
    <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
    <span class="title-bar-title"> {{$_ENV['APP_NAME']}}</span>
  </div>
</div>
    @yield('content')
</div>
    <script async src="/js/all.js"></script>

</body>
</html>