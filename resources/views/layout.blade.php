<!DOCTYPE html>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Album test</title>
</head>
<body>
@yield('content')
</body>
</html>