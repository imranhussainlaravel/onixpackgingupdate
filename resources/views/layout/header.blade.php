<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onix Packaging</title>
    <link rel="icon" type="image/x-icon" href="{{ URL('images/logo.png') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Your additional custom CSS -->
    {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/custom.css') }}?v={{ time() }}" rel="stylesheet">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Add Bootstrap CSS in the head section -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<!-- Include Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet"> 

    <style>
        /* Sticky Phone Icon Style */
.sticky-phone {
    position: fixed;
    bottom: 20px; /* Distance from the bottom */
    left: 20px;   /* Distance from the left */
    background-color: #175a5a; /* Green background */
    color: white;
    padding: 10px 15px;
    border-radius: 50%;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
    font-size: 24px; /* Adjust font size */
    z-index: 1000; /* Ensure it's on top */
    display: flex;
    align-items: center;
    justify-content: center;
}

.sticky-phone a {
    color: white;
    text-decoration: none;
}
.sticky-phone i {
    transform: scaleX(-1);
}



    </style>
</head>
<body>

    <!-- Header -->
    <header class="bg-light py-2">
        <div class="container d-flex justify-content-center align-items-center">
            
            <div class="d-flex align-items-center">
                <a href="tel:(321) 310-0141" id="phone-link">
                    <i id="phone-icon" class="fas fa-phone-alt"></i> (321) 310-0141
                </a>
                <span id="divider">|</span>
                <a href="mailto:sales@onixpackaging.com" id="email-link">
                    <i id="email-icon" class="fas fa-envelope"></i> sales@onixpackaging.com
                </a>                
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#3c6fb1;">
        <div class="container">
            {{-- <a class="navbar-brand" href="#">Packaging</a> --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex align-items-center">
                <a href="{{ route('index.home') }}">
                <img src="{{ URL('images/paclogo.png') }}" alt="Logo" class="img-fluid" style="max-width: 230px;">
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
               
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.home') }}" style="color: white; font-weight:bold;">Home</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white; font-weight:bold;">Boxes by Industry</a>
                    </li> --}}
                    
                    <li class="nav-item dropdown" id="dropdownMenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-expanded="false" style="color: white; font-weight: bold;">
                            Boxes by Industry
                        </a>
                        <ul class="dropdown-menu wider-dropdown" aria-labelledby="navbarDropdown">
                            @foreach($nav1 as $item1)
                                <li>
                                    <a class="dropdown-item" href="{{ route('product.show', ['id' => $item1->id]) }}">
                                        {{ $item1->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    
                    
                    
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#"  style="color: white; font-weight:bold;">Boxes by Material</a>
                    </li> --}}
                    <li class="nav-item dropdown" id="dropdownMenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-expanded="false" style="color: white; font-weight: bold;">
                            Boxes by Material
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($nav2 as $item2)
                                <li><a class="dropdown-item" href="{{ route('product.show', ['id' => $item2->id]) }}" >{{ $item2->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white; font-weight:bold;">Boxes by Style</a>
                    </li> --}}
                    <li class="nav-item dropdown" id="dropdownMenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-expanded="false" style="color: white; font-weight: bold;">
                            Boxes by Style
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($nav3 as $item3)
                                <li><a class="dropdown-item" href="{{ route('product.show', ['id' => $item3->id]) }}" >{{ $item3->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.blog') }}" style="color: white; font-weight:bold;">Blog</a>
                    </li>
                </ul>
               

            </div>
            <div class="d-flex justify-content-end">
                <a class="btn"  style="background-color: #175a5a; color: #ffffff;" onclick="document.getElementById('custom-quote-form').scrollIntoView({behavior: 'smooth'});">Get Quote</a>
                {{-- <button onclick="document.getElementById('myForm').scrollIntoView({behavior: 'smooth'});">Go to Form</button> --}}
            </div>
        </div>
    </nav>