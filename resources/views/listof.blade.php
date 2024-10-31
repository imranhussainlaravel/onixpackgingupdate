@include('layout.header')

<div class="custom-packaging" style="border-bottom-right-radius: 90px; background-color:#3c6fb1;">
    <div class="container">
        <div class="row align-items-center justify-content-center masked-container" style="height: 100%;" id=rowofp>
            <!-- Left Column for Image -->
            <div class="col-md-5 d-flex justify-content-center">
                <div class="image-container d-flex justify-content-center align-items-center">
                    <img src="{{ $category->header_img }}" alt="Custom Boxes" class="img-fluid">
                </div>
            </div>
            <!-- Right Column for Text -->
            <div class="col-md-7 text-container d-flex flex-column justify-content-center no-mask" style="height: 400px;">
                <h2>Custom {{ $category->title }}</h2>
                <p>{{ $category->description}}</p>
                <div>
                    <button class="btn-custom" onclick="document.getElementById('custom-quote-form').scrollIntoView({behavior: 'smooth'});">Get Free Quote</button>
                    <button class="btn text-decoration-underline" style="color: #175a5a;" onclick="document.getElementById('custom-rigid-boxes').scrollIntoView({behavior: 'smooth'});">View All Products</button>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="custom-rigid-boxes py-5" id="custom-rigid-boxes">
    <div class="container">
        <h2 class="text-center mb-4">{{ $category->title }}</h2>
        <div class="row">
            @if(empty($products))
            <p></p>
            @else
                @foreach($products as $product)
                <!-- Box 1 -->
                    <div class="col-6 col-md-6 col-lg-3 mb-4">
                        <!-- Wrap the whole card in an anchor tag -->
                        <a href="{{ route('product.final', ['id' => $product['id']]) }}" class="text-decoration-none">
                            <div class="card shadow-sm p-3 rounded-3 border-0 text-center" style="background-color: #f8fafc; cursor: pointer;">
                                <img src="{{ $product['image_1'] }}" class="card-img-top mb-3" alt="Magnetic Closure Boxes" style="max-height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-dark fw-bold mb-3">{{ $product['title'] }}</h5>
                                    {{-- <p class="text-primary fw-bold">Learn More <span>&#8250;</span></p> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

@include('layout.footer')