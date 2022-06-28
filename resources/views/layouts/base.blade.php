<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACME Store - @yield('title') </title>

    <link rel="stylesheet" href="/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" ></script>

</head>
<body data-page-id="@yield('data-page-id')">
  


    @yield('body')

    <script async src="/js/all.js"></script>

</body>
</html>