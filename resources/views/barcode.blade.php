<html>
    <head>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/210158a457.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    </head>

    <body style="font-family: figtree" class="p-0 m-0">
        <div style="width: 100%; text-align: center;">
            <p style="line-height: 4px; font-weight: bold;">{{ $documents->client->name }}</p>
            <p style="line-height: 0px; font-size: 10pt">{{ $documents->created_at }}</p>
            <img id="barcode" />
        </div>
    </body>

    <script>
        var barcode = "{{ $documents->barcode }}";
        JsBarcode("#barcode", barcode, {height: 10, width: 1, margin: 0, fontSize: 12});
    </script>
</html>