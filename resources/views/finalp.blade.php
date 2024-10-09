@include('layout.header')

<style>
    /* Custom CSS to adjust form and image sizes */
    .form-container {
        max-width: 80%; /* Reduce the form container width */
        /* margin: 0 auto;*/
    }
    .input-group-text {
        background-color: #e9ecef; /* Light grey background for unit labels */
    }
    .main-image img {
        width: 100%;
        height: auto;
        align-content: center;
    }
    .main-image {
        margin-bottom: 15px;
    }
    .thumbnail-images img {
        cursor: pointer;
    }
    .form-control{
        border : 1.5px solid #585a5ca8;
    }
    .form-control-sm{
        min-height: calc(1.5em +(.5rem + 2px));
        padding: .35rem .5rem;
        font-size: .910rem;
        border-radius: .3rem;
    }
    .input, input::placeholder {
        font: 13px / 3 "Poppins Light";
    }
    .custom-select {
    font-size: 12px; /* Adjust the font size to make it smaller */
    padding: 2px 8px; /* Adjust padding for a smaller dropdown */
    height: 34px; /* Adjust height as needed */
    width: auto; /* Width can be adjusted or set to a fixed value */
    min-height: calc(1.5em +(.5rem + 2px));
        padding: .35rem .5rem;
        font-size: .910rem;
        border-radius: .3rem;
    }
    .custom-id {
        font-size: 0.8rem; /* Adjust the size as needed */
    }
    #row54 {
        display: flex;
    }
    #col54{
        display: flex;
        align-items: center; /* Aligns items to the bottom */
    }
    .custom-id {
        font-size: 0.8rem; /* Adjust size if needed */
    }

</style>

<div class="container mt-4">
    <div class="row">
        <!-- Left Side with Images -->
        <div class="col-md-5">
            <!-- Main Image -->
            <div class="main-image mb-3">
                <img id="mainImage" src="{{ $products->image_1}}" class="img-fluid" alt="Main Box">
            </div>
            
            <!-- Thumbnail Images -->
            <div class="row thumbnail-images">
                <div class="col-3">
                    <img src="{{ $products->image_1}}" class="img-fluid" alt="Box Thumbnail" onclick="changeMainImage(this);">
                </div>
                <div class="col-3">
                    <img src="{{ $products->image_2}}" class="img-fluid" alt="Box Thumbnail" onclick="changeMainImage(this);">
                </div>
                <div class="col-3">
                    <img src="{{ $products->image_3}}" class="img-fluid" alt="Box Thumbnail" onclick="changeMainImage(this);">
                </div>
                <div class="col-3">
                    <img src="{{ $products->image_4}}" class="img-fluid" alt="Box Thumbnail" onclick="changeMainImage(this);">
                </div>
            </div>
        </div>

        @php
            use Illuminate\Support\Facades\Crypt;

        // Encrypt the product ID directly inside the Blade template
        $lastFourDigits = substr($products->id, -4);
        $encryptedId = Crypt::encryptString($lastFourDigits);
        // $encryptedId = Crypt::encryptString($products->id); 
        @endphp

        <!-- Right Side with Form -->
        <div class="col-md-7 mt-auto p-2">
            <!-- Product Name and Description -->
            <div class="product-info mb-3">
                <h2 class="text" style="font-weight: bold;">{{ $products->title}}</h2>
                <p>{{ $products->description}}</p>
            </div>

            <div class="row">
                <!-- Form Container -->
                <div class="col-8 ms-auto form-container rounded">
                   
                    
                    <form class="px-3" action="{{ route('send.email') }}" method="POST">
                        @csrf
                        <div class="row" id="row54">
                            <div class="col-md-8" id="col54">
                                <h5 class="text" style="font-weight: bold;color:#f9b28c;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">GET CUSTOM QUOTE</h5>
                            </div>
                            <div class="col-md-4" id="col54">
                                <h5 class="custom-id">ID {{$products->id}}</h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm required mt-3" id="name" required placeholder="Name" name="name">
                        </div>
                        <div class="form-group input-placeholder">
                            <input type="text" class="form-control form-control-sm required mt-3" id="phone" required placeholder="Phone" name="phone">
                        </div>
                        <div class="form-group input-placeholder">
                            <input type="email" class="form-control form-control-sm required mt-3" id="email" required placeholder="Email" name="email">
                        </div>
            
                        <div class="d-flex flex-row align-items-start mt-3">
                            <div class="form-group input-placeholder me-2" style="flex-grow: 1;">
                                <input type="text" class="form-control form-control-sm required mt-2" id="product_name" placeholder="Product Name" name="product_name">
                            </div>
                            <div class="form-group input-placeholder me-2" style="flex-grow: 1;">
                                <input type="number" class="form-control form-control-sm required mt-2" id="quantity" required placeholder="Quantity" name="quantity">
                            </div>
                            <div class="form-group input-placeholder" style="flex-grow: 1;">
                                <select class="form-control form-control-sm mt-2" id="color" name="color">
                                    <option value="" disabled selected>Select Color</option>
                                    <option value="1 color">1 color</option>
                                    <option value="2 color">2 color</option>
                                    <option value="3 color">3 color</option>
                                    <option value="4 color">4 color</option>
                                    <option value="4/1 color">4/1 color</option>
                                    <option value="4/2 color">4/2 color</option>
                                    <option value="4/3 color">4/3 color</option>
                                    <option value="4/4 color">4/4 color</option>
                                </select>
                            </div>
                        </div>
                        
                        
            
                        <div class="d-flex">
                            <div class="flex-fill me-2">
                                <div class="input-group input-placeholder">
                                    <input type="text" class="form-control form-control-sm required mt-3" id="length" required placeholder=" L" name="length">
                                </div>
                            </div>
                            <div class="flex-fill me-2">
                                <div class="input-group input-placeholder">
                                    <input type="text" class="form-control form-control-sm required mt-3" id="width" required placeholder=" W" name="width">
                                </div>
                            </div>
                            <div class="flex-fill me-2">
                                <div class="input-group input-placeholder">
                                    <input type="text" class="form-control form-control-sm required mt-3" id="depth" required placeholder=" D" name="depth">
                                </div>
                            </div>
                            <div class="flex-fill me-2 mt-3">
                                <select class="custom-select" aria-label="Measurement unit" name="measurement_unit">
                                    <option value="cm">cm</option>
                                    <option value="inch">inch</option>
                                    <option value="mm">mm</option>

                                </select>                            
                            </div>
                        </div>
            
                        <div class="form-group input-placeholder">
                            <textarea class="form-control mt-3" rows="3" id="description" placeholder="Describe here..." name="description"></textarea>
                        </div>
                        {{-- <div class="form-group">
                            {{-- {!! Captcha::img() !!} <!-- Display the captcha image -->
                            <input type="text" name="_answer" class="form-control" placeholder="Enter Captcha" required>
                        </div> --}}
                        <button type="submit" class="btn mt-3 col-5" style="background-color: #fdad82;color:white;font-weight:bold;">Submit</button>
                    </form>
                </div>
            </div>
            

        </div>
    </div>
</div>

<script>
    // JavaScript function to change the main image when a thumbnail is clicked
    function changeMainImage(thumbnail) {
        var mainImage = document.getElementById('mainImage');
        mainImage.src = thumbnail.src;
    }
</script>

@include('layout.footer')
