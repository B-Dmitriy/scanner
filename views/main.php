<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screenw-full">
<?php include_once 'views/layout/header.php'?>
<main class="container xl mx-auto flex w-full">
    <section class="w-8/12">
        <section style="border: red 1px solid;">
            Hello
        </section>

        <section style="border: red 1px solid;">
            Search
        </section>

        <section style="border: red 1px solid;">
            Filters
        </section>

        <section style="border: red 1px solid;">
            List
        </section>
    </section>

    <aside class="w-4/12" style="border: red 1px solid;">
        AD
    </aside>
    <script src="/app/js/main.js"></script>
</main>
<?php include_once 'views/layout/footer.php'?>
</body>
</html>