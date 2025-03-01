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
    .number-circle {
        width: 50px;
        height: 50px;
        background-color: #f2b695;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
        color: white;
        margin: 0 auto 15px;
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
                        
                        <!-- Name -->
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm required mt-3 @error('name') is-invalid @enderror" 
                                   id="name" required placeholder="Name" name="name" value="{{ old('name') }}">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    
                        <!-- Phone -->
                        <div class="form-group input-placeholder">
                            <input type="text" class="form-control form-control-sm required mt-3 @error('phone') is-invalid @enderror" 
                                   id="phone" required placeholder="Phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    
                        <!-- Email -->
                        <div class="form-group input-placeholder">
                            <input type="email" class="form-control form-control-sm required mt-3 @error('email') is-invalid @enderror" 
                                   id="email" required placeholder="Email" name="email" value="{{ old('email') }}">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    
                        <!-- Product Info -->
                        <div class="d-flex flex-row align-items-start mt-3">
                            <div class="form-group input-placeholder me-2" style="flex-grow: 1;">
                                <input type="text" class="form-control form-control-sm required mt-2 @error('product_name') is-invalid @enderror" 
                                       id="product_name" placeholder="Product Name" name="product_name" value="{{ old('product_name') }}">
                                @error('product_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group input-placeholder me-2" style="flex-grow: 1;">
                                <input type="number" class="form-control form-control-sm required mt-2 @error('quantity') is-invalid @enderror" 
                                       id="quantity" required placeholder="Quantity" name="quantity" value="{{ old('quantity') }}">
                                @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group input-placeholder" style="flex-grow: 1;">
                                <select class="form-control form-control-sm mt-2 @error('color') is-invalid @enderror" id="color" name="color">
                                    <option value="" disabled {{ !old('color') ? 'selected' : '' }}>Select Color</option>
                                    @foreach(['1 color', '2 color', '3 color', '4 color', '4/1 color', '4/2 color', '4/3 color', '4/4 color'] as $option)
                                        <option value="{{ $option }}" {{ old('color') == $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('color')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    
                        <!-- Dimensions -->
                        <div class="d-flex">
                            <div class="flex-fill me-2">
                                <div class="input-group input-placeholder">
                                    <input type="text" class="form-control form-control-sm required mt-3 @error('length') is-invalid @enderror" 
                                           id="length" required placeholder=" L" name="length" value="{{ old('length') }}">
                                    @error('length')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="flex-fill me-2">
                                <div class="input-group input-placeholder">
                                    <input type="text" class="form-control form-control-sm required mt-3 @error('width') is-invalid @enderror" 
                                           id="width" required placeholder=" W" name="width" value="{{ old('width') }}">
                                    @error('width')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="flex-fill me-2">
                                <div class="input-group input-placeholder">
                                    <input type="text" class="form-control form-control-sm required mt-3 @error('depth') is-invalid @enderror" 
                                           id="depth" required placeholder=" D" name="depth" value="{{ old('depth') }}">
                                    @error('depth')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="flex-fill me-2 mt-3">
                                <select class="custom-select @error('measurement_unit') is-invalid @enderror" 
                                        aria-label="Measurement unit" name="measurement_unit">
                                    @foreach(['cm', 'inch', 'mm'] as $unit)
                                        <option value="{{ $unit }}" {{ old('measurement_unit') == $unit ? 'selected' : '' }}>
                                            {{ $unit }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('measurement_unit')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    
                        <!-- Description -->
                        <div class="form-group input-placeholder">
                            <textarea class="form-control mt-3 @error('description') is-invalid @enderror" rows="3" 
                                      id="description" placeholder="Describe here..." 
                                      name="description">{{ old('description') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    
                        <!-- CAPTCHA -->
                        @php
                            // Preserve CAPTCHA numbers on validation errors
                            $num1 = old('num1', rand(1, 10));
                            $num2 = old('num2', rand(1, 10));
                        @endphp
                        <div class="form-row" style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                            <input type="hidden" name="num1" value="{{ $num1 }}">
                            <input type="hidden" name="num2" value="{{ $num2 }}">
                            
                            <label style="margin: 0; white-space: nowrap;">
                                <span style="font-size: 0.9em; margin-right: 8px;">{{ $num1 }} + {{ $num2 }} =</span>
                            </label>
                            <input type="number" 
                                   style="height: 35px; width: auto; padding: 5px 8px; font-size: 0.9em; box-sizing: border-box; margin-left: auto;"
                                   class="form-control @error('captcha_answer') is-invalid @enderror" 
                                   placeholder="Enter sum" 
                                   required 
                                   name="captcha_answer"
                                   value="{{ old('captcha_answer') }}">
                            @error('captcha_answer')
                                <div class="invalid-feedback" style="color: #dc3545; font-size: 0.8em; margin-top: 5px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    
                        <button type="submit" class="btn mt-3 col-5" style="background-color: #fdad82;color:white;font-weight:bold;">Submit</button>
                    </form>
                </div>
            </div>
            

        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-8">
            {{-- <h4 class="display-6 fw-bold">{{ $products->heading2 }}</h4>
            <p class="lead">
                {{ $products->description2 ?? 'Kraft boxes with windows are the perfect modern packaging for any item. You can advertise your bakery, cosmetics, and grocery products via Kraft window boxes, and they will surely increase sales. Order Now!' }}
            </p> --}}
            <div class="d-flex flex-wrap my-3">
                <!-- Client logos -->
                {{-- <img src="{{ asset('images/client-logo-1.png') }}" alt="Client 1" class="img-fluid me-3" style="width: 50px;">
                <img src="{{ asset('images/client-logo-2.png') }}" alt="Client 2" class="img-fluid me-3" style="width: 50px;">
                <img src="{{ asset('images/client-logo-3.png') }}" alt="Client 3" class="img-fluid me-3" style="width: 50px;">
                <img src="{{ asset('images/client-logo-4.png') }}" alt="Client 4" class="img-fluid me-3" style="width: 50px;">
                <img src="{{ asset('images/client-logo-5.png') }}" alt="Client 5" class="img-fluid me-3" style="width: 50px;"> --}}
            </div>
            <div class="row my-5 text-center">
                <div class="col-md-4">
                    <div class="step">
                        <div class="number-circle">1</div>
                        <h3 class="fw-bold">Design</h3>
                        <p>Get your custom boxes made in the required size, shape, and style.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step">
                        <div class="number-circle">2</div>
                        <h3 class="fw-bold">Print</h3>
                        <p>Upload your artwork and get it superbly printed the way you want.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step">
                        <div class="number-circle">3</div>
                        <h3 class="fw-bold">Get it done</h3>
                        <p>Order any quantity, enjoy a wholesale price, pay no extra for die plates.</p>
                    </div>
                </div>
            </div>
            <p class="text-muted">More Than +5000 Satisfied Clients Worldwide</p>

        </div>

        <div class="col-md-4">
            {{-- <img src="{{ asset('images/' . $image ?? 'placeholder.png') }}" alt="Custom Box with Windows" class="img-fluid"> --}}
            <img src="{{ $products->image_5}}" alt="Custom Box with Windows" class="img-fluid">

        </div>
        
    </div>


</div>

<div class="blog-container">
    <div class="blog-content">
        <!-- Dynamic content from the database goes here -->
        {!! $products->content !!}
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
