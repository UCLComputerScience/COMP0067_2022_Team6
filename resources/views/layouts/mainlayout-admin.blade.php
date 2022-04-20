<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N3FNXXEJL4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-N3FNXXEJL4');
</script>
@include('layouts.partials.nav-admin')
</head>
<body>

@include('layouts.partials.tryhead')
  

@yield('content')

@include('layouts.partials.footer')


 </body>
</html>