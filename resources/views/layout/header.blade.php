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
.call-section {
    font-family: Arial, sans-serif; /* Use a clean font */
}

.call-text {
    color: #333; /* Dark color for the text */
    font-size: 14px;
    margin: 0;
}

.call-number {
    color: #175a5a; /* Red color for the phone number */
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
}
.custom-dropdown .btn:active, .custom-dropdown .btn:focus { 
    box-shadow: none !important;
    outline: none;
}

.custom-dropdown .dropdown-link {
    color: white;
    font-weight: bold;
}

.custom-dropdown {
    position: relative; /* Ensure dropdown is positioned relative to this element */
}

.custom-dropdown .dropdown-menu {
    position: absolute;
    border: 1px solid transparent;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    transition: 0.3s all ease;
    margin-top: 2px !important;
    opacity: 0;
    visibility: hidden;
    min-width: 1000px;
    max-width: 100vw; /* Makes it responsive */
    left: 50% !important;
    transform: translateX(-14%) !important;
    overflow: hidden;
    padding: 5px; /* Adds padding around the grid items */
    z-index: 1000;
}

.custom-dropdown.show .dropdown-menu {
    opacity: 1;
    visibility: visible;
    margin-top: 50px !important;
}

.custom-dropdown .dropdown-item {
    padding: 10px;
    text-align: left;
    display: flex;
    /* align-items: center; */
    align-items: flex-start;
    text-decoration: none;
    color: #333;
    font-size: 14px;
    border: 1px; /* Removes borders for clean appearance */
    flex: 1 0 16.66%; /* Ensures items are placed in a 4-column grid */
    max-width: 16.66%; /* Adjusts the size of each item */
    box-sizing: border-box; /* Ensures padding is accounted for */
}

.custom-dropdown .dropdown-item:hover {
    background-color: #ddddde; 
    color: #007bff;
    text-decoration: none;
}

.custom-dropdown .wrap-icon {
    margin-right: 8px;
}

.custom-dropdown .wrap-icon img {
    width: 30px;
    height: 30px;
    object-fit: contain;
}

.custom-dropdown .dropdown-item h3 {
    font-size: 12px;
    margin: 5px 0;
    color: #000;
    line-height: 1.4; /* Allows more space between lines for long titles */
    word-wrap: break-word;  /* Ensures long titles break into multiple lines */
    white-space: normal; 
}

.custom-dropdown .dropdown-menu .half-col {
    width: 80%;
    padding: 20px;
}

.custom-dropdown .dropdown-menu .half-col a {
    display: block;
    border-bottom: 1px solid #efefef;
    margin-bottom: 10px;
    text-decoration: none;
}

.custom-dropdown .dropdown-menu .half-col a:last-child {
    margin-bottom: 0;
    border: none;
}

.custom-dropdown .dropdown-menu .half-col .wrap-icon {
    font-size: 30px;
    line-height: 0;
}

.custom-dropdown .dropdown-menu .half-col .wrap-icon span {
    color: #c3a1fa;
}

.custom-dropdown .dropdown-menu .half-col h3 {
    font-size: 16px;
    margin: 5px 0 10px 0;
    color: #000;
}

.custom-dropdown .dropdown-menu .half-col p {
    font-size: 14px;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .custom-dropdown .dropdown-menu {
        min-width: 100%; /* Full width on smaller screens */
    }

    .custom-dropdown .dropdown-item {
        flex: 1 0 50%; /* Two items per row on smaller screens */
        max-width: 50%;
    }
}

@media (min-width: 768px) {
    .custom-dropdown .dropdown-item {
        flex: 1 0 16.66%; /* Four items per row on larger screens */
        max-width: 16.66%;
    }
}



    </style>
</head>
<body>

    <!-- Header -->
    <header class="bg-light py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo on the left -->
            <div>
                <a href="{{ route('index.home') }}">
                    <img src="{{ URL('images/paclogo.png') }}" alt="Logo" class="img-fluid" style="max-width: 230px;">
                </a>
            </div>
        
            <!-- Contact information on the right -->
            <div class="d-flex align-items-center">
               
                <a href="mailto:sales@onixpackaging.com" id="email-link">
                    <i id="email-icon" class="fas fa-envelope"></i> sales@onixpackaging.com
                </a>
                <span id="divider" class="mx-1">|</span>

                <div class="call-section text-center">
                    <p class="call-text">Speak with a Packaging Expert</p>
                    <a href="tel:(321) 310-0141" class="call-number">(321) 310-0141</a>
                </div>
                 {{-- <a href="tel:(321) 310-0141" id="phone-link" class="me-1">
                    <i id="phone-icon" class="fas fa-phone-alt"></i> (321) 310-0141
                </a>
                <span id="divider" class="mx-1">|</span>
                <a href="mailto:sales@onixpackaging.com" id="email-link">
                    <i id="email-icon" class="fas fa-envelope"></i> sales@onixpackaging.com
                </a> --}}
            </div>
        </div>
        
    </header>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#3c6fb1;">
        <div class="container">
            {{-- Toggle button for smaller screens --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            {{-- Navbar items aligned to the left --}}
            <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.home') }}" style="color: white; font-weight:bold;">Home</a>
                    </li>
                    
                    <li class="nav-item dropdown custom-dropdown" id="dropdownMenu">
                        <a class="nav-link dropdown-toggle dropdown-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Boxes by Industry
                        </a>
                        <div class="dropdown-menu d-flex flex-wrap" aria-labelledby="navbarDropdown" style="width: 100%; max-width: 800px;">
                            
                            <!-- Grid Layout for Dropdown Items -->
                            @foreach($nav1 as $item1)
                                <a href="{{ route('product.show', ['id' => Str::slug($item1->title)]) }}" class="dropdown-item p-2 d-flex align-items-start">
                                    <div class="mr-3 wrap-icon">
                                        {{-- <img src="{{$item1->icon}}" alt="{{ $item1->title }}" style="width: 30px; height: 30px;"> --}}
                                        <img 
                                            src="{{ $item1->icon ? $item1->icon : URL('images/logo.png') }}" 
                                            alt="{{ $item1->title }}" 
                                            style="width: 30px; height: 30px;"
                                        >
                                    </div>
                                    <div>
                                        <h3>{{ $item1->title }}</h3>
                                    </div>
                                </a>
                            @endforeach
                    
                        </div>
                    </li>
                    
                    
                    
                    
    
                    <li class="nav-item dropdown" id="dropdownMenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-expanded="false" style="color: white; font-weight: bold;">
                            Boxes by Material
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($nav2 as $item2)
                                <li><a class="dropdown-item" href="{{ route('product.show', ['id' => Str::slug($item2->title)]) }}">{{ $item2->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
    
                    <li class="nav-item dropdown" id="dropdownMenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-expanded="false" style="color: white; font-weight: bold;">
                            Boxes by Style
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($nav3 as $item3)
                                <li><a class="dropdown-item" href="{{ route('product.show', ['id' => Str::slug($item3->title)]) }}">{{ $item3->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.blog') }}" style="color: white; font-weight:bold;">Blog</a>
                    </li>
                </ul>
            </div>
    
            {{-- Quote button aligned to the right --}}
            <div class="d-flex ms-auto">
                <a class="btn" style="background-color: #175a5a; color: #ffffff;" onclick="document.getElementById('custom-quote-form').scrollIntoView({behavior: 'smooth'});">Get Quote</a>
            </div>
        </div>
    </nav>
    