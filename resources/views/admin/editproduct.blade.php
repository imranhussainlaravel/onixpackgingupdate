<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="{{ URL('images/logo.png') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            padding: 20px;
        }

        .form-container {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            width: 500px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .form-group input[type="text"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            background-color: #2a2a2a;
            border: 1px solid #444;
            color: #e0e0e0;
            border-radius: 5px;
        }

        .form-group button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Edit Product</h2>
        <form action="{{ route('update.product', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- This is important for PUT requests -->

            <!-- Title -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ $product->title }}" required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required>{{ $product->description }}</textarea>
            </div>

            <!-- Nav ID (Dropdown) -->
            <div class="form-group">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Image Uploads -->
            @for ($i = 1; $i <= 4; $i++)
            <div class="form-group">
                <label for="image_{{ $i }}">Image {{ $i }} (1:1 Ratio) "use in case of image update"</label>
                <input type="file" id="image_{{ $i }}" name="image_{{ $i }}" accept="image/*">
            </div>
            @endfor

            <!-- Heading Description -->
            <div class="form-group">
                <label for="heading2">Heading Description</label>
                <input type="text" id="heading2" name="heading2" value="{{ $product->heading2 }}" required>
            </div>

            <!-- Second Description -->
            <div class="form-group">
                <label for="description2">2nd Description</label>
                <textarea id="description2" name="description2" required>{{ $product->description2 }}</textarea>
            </div>

            <!-- Image 5 -->
            <div class="form-group">
                <label for="image_5">Image 5 (1:1 Ratio) png(desc) "use in case of image update"</label>
                <input type="file" id="image_5" name="image_5" accept="image/*">
                
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit">Update Product</button>
            </div>
        </form>
    </div>

</body>

</html>
