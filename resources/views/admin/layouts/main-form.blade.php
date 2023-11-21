<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#isi',
            toolbar_mode: 'floating',
            plugins: 'lists link',
            toolbar: 'undo redo | blocks | fontsize | bold italic underline | alignleft aligncenter alignright | indent outdent | bullist numlist | link',
            menubar : false,
        });
    </script>
    <title>SIPMA | Admin</title>
</head>

<body>
    @yield('content')
    @vite(['resources/js/upload.js', 'resources/js/slug.js'])
</body>

</html>