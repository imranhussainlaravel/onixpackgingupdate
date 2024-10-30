@include('layout.header')

    <div class="container my-5">
        <div class="row">
            <div class="col-1 text-center mb-4"></div>
            <div class="col-10 text-center mb-4">
                <h1 style="font-weight: bold;">Read inspiring stories about</h1>
                <p class="text-muted" style="font-size:20px;font-weight:bold;">Find a variety of informative and engaging blogs, articles, and other resources to help you stay up-to-date on the latest industry trends and insights.</p>
            </div>
            <div class="col-1 text-center mb-4"></div>
            @if($blog->isEmpty())
                <p></p>
            @else
                @foreach($blog as $blogitem)
                    <!-- Blog Box -->
                    <div class="col-6 col-md-6 col-lg-3 mb-4">
                        <a href="{{ route('blog.details', ['id' => $blogitem->id]) }}" class="text-decoration-none">
                            <div class="card shadow-sm p-3 rounded-3 border-0 text-center" style="background-color: #f8fafc; cursor: pointer;">
                                <img src="{{ $blogitem->main_img }}" class="card-img-top mb-3" alt="{{ $blogitem->title }}" style="max-height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-dark fw-bold mb-3">{{ $blogitem->title }}</h5>
                                    <p class="text-primary fw-bold">Learn More <span>&#8250;</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif    
        </div>
    </div>

@include('layout.footer')
