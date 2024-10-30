<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onix Packaging</title>
    <link rel="icon" type="image/x-icon" href="{{ URL('images/logo.png') }}">
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Main container for the blog content */
        .blog-container {
            max-width: 1200px; /* Adjust as needed */
            margin: 0 auto;
            padding: 80px; /* Minimal spacing on the sides */
        }

        .blog-content {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<div class="blog-container">
    <div class="blog-content">
        <!-- Dynamic content from the database goes here -->
        {!! $blog->content !!}
    </div>
</div>

</body>
</html>
