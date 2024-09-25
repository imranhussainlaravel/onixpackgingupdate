<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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

        .form-group textarea {
            height: 100px;
        }

        .form-group input[type="file"] {
            border: none;
            background-color: #1e1e1e;
        }

        .img-preview {
            display: block;
            margin-top: 10px;
            border-radius: 8px;
        }

        /* Image ratio styles */
        #main_img_preview {
            width: 300px;
            height: 300px;
            /* 1:1 aspect ratio */
            object-fit: cover;
        }

        #header_img_preview {
            width: 300px;
            /* Example width */
            height: 450px;
            /* 2:3 aspect ratio */
            object-fit: cover;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.15/cropper.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.15/cropper.min.js"></script>

</head>

<body>

    <div class="form-container">
        <h2>Save Prodcut</h2>
        <form action="{{ route('save.product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Title -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter category title" required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter category description" required></textarea>
            </div>

            <!-- Nav ID (Dropdown) -->
            <div class="form-group">
                <label for="nav_id">category</label>
                <select id="nav_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="main_img">Image 1 (1:1 Ratio)</label>
                <input type="file" id="main_img" name="image_1" accept="image/*" required>
                {{-- <div>
                    <img id="main_img_preview" class="img-preview" src="#" alt="Main Image Preview" style="display:none;">
                    <canvas id="main_img_canvas" style="display:none;"></canvas>
                </div> --}}
            </div>
            <div class="form-group">
                <label for="main_img">Image 2 (1:1 Ratio)</label>
                <input type="file" id="main_img" name="image_2" accept="image/*" required>
                {{-- <div>
                    <img id="main_img_preview" class="img-preview" src="#" alt="Main Image Preview" style="display:none;">
                    <canvas id="main_img_canvas" style="display:none;"></canvas>
                </div> --}}
            </div>
            <div class="form-group">
                <label for="main_img">Image 3 (1:1 Ratio)</label>
                <input type="file" id="main_img" name="image_3" accept="image/*" required>
                {{-- <div>
                    <img id="main_img_preview" class="img-preview" src="#" alt="Main Image Preview" style="display:none;">
                    <canvas id="main_img_canvas" style="display:none;"></canvas>
                </div> --}}
            </div>
            <div class="form-group">
                <label for="main_img">Image 4 (1:1 Ratio)</label>
                <input type="file" id="main_img" name="image_4" accept="image/*" required>
                {{-- <div>
                    <img id="main_img_preview" class="img-preview" src="#" alt="Main Image Preview" style="display:none;">
                    <canvas id="main_img_canvas" style="display:none;"></canvas>
                </div> --}}
            </div>



            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit">Save Product</button>
            </div>
        </form>
    </div>

    <script>
        let headerCropper;
        let mainCropper;
        // Handle header image upload and initialize Cropper.js
        // document.getElementById('header_img').addEventListener('change', function(event) {
        //     const [file] = event.target.files;
        //     if (file) {
        //         const headerImgPreview = document.getElementById('header_img_preview');
        //         headerImgPreview.src = URL.createObjectURL(file);
        //         headerImgPreview.style.display = 'block';

        //         headerImgPreview.onload = function () {
        //             if (headerCropper) {
        //                 headerCropper.destroy();  // Destroy old cropper
        //             }

        //             // Initialize new cropper with correct aspect ratio
        //             headerCropper = new Cropper(headerImgPreview, {
        //                 aspectRatio: 2 / 3,  // 2:3 ratio
        //                 viewMode: 1,
        //                 autoCropArea: 1,
        //                 cropBoxResizable: false  // Prevent resizing the crop box
        //             });
        //         };
        //     }
        // });



        // document.getElementById('main_img').addEventListener('change', function(event) {
        //     const [file] = event.target.files;
        //     if (file) {
        //         const mainImgPreview = document.getElementById('main_img_preview');
        //         mainImgPreview.src = URL.createObjectURL(file);
        //         mainImgPreview.style.display = 'block';

        //         if (mainCropper) {
        //             mainCropper.destroy();
        //         }

        //         mainCropper = new Cropper(mainImgPreview, {
        //             aspectRatio: 1 / 1, // Keep this as 1:1 ratio
        //             viewMode: 1,
        //             autoCropArea: 1,
        //         });
        //     }
        // });

        // On form submit, retrieve the cropped image data
        // document.querySelector('form').addEventListener('submit', function(event) {
        // event.preventDefault(); // Prevent default form submission

        // const headerDataUrl = headerCropper.getCroppedCanvas().toDataURL();

        // // Log the cropped image data URL
        // console.log(headerDataUrl);

        // // Add your AJAX code here to submit the form
        // });
    </script>

</body>

</html>
