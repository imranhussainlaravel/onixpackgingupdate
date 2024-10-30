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
    /* Halloween Text Styling */
    #halloween-splash {
        font-size: 40px;
        color: white;
        letter-spacing: 0.7em;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        z-index: 9999;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: black;
    }

    div > span {
        opacity: 0.15;
    }

    #I {
        opacity: 1;
        animation: flickerI 1.5s linear reverse infinite;
    }

    #L, #G {
        animation: flickerLG 1.5s linear reverse infinite;
        position: relative;
    }

    #H, #T {
        animation: flickerH 1.5s linear reverse infinite;
    }
    #E {
        opacity: 1;
        animation: flickerE 1.5s linear reverse infinite;
    }
    #O {
        opacity: 1;
        animation: flickerO 1.5s linear reverse infinite;
    }


    @keyframes flickerI {
        0% { opacity: 0.4; }
        100% { opacity: 1; }
    }

    @keyframes flickerLG {
        0% { opacity: 0.19; }
        100% { opacity: 0.4; }
    }

    @keyframes flickerH {
        0% { opacity: 0.15; }
        100% { opacity: 0.3; }
    }

    @keyframes flickerE {
        0% { opacity: 0.15; }
        100% { opacity: 0.3; }
    }

    @keyframes flickerO {
        0% { opacity: 0.15; }
        100% { opacity: 0.3; }
    }

    /* Fade-out effect for the splash screen */
    .fade-out {
        animation: fadeOut 3s forwards;
    }

    @keyframes fadeOut {
        100% { opacity: 0; visibility: hidden; }
    }

    /* Halloween Splash */
/* Halloween Splash */
/* Floating Ghost */
/* Floating Ghost */
/* Floating Ghost */
/* Floating Ghost */

/* Floating Ghost */
.ghost-container {
    position: absolute;
    top: 20%; /* Adjust starting vertical position */
    left: -100px; /* Start off-screen to the left */
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 10; /* Ensures ghosts float above content */
}

.ghost {
    position: absolute;
    animation: float 15s infinite ease-in-out; /* Adjust duration for smooth movement */
}

.ghost-random {
    position: absolute;
    animation: random-float 15s infinite ease-in-out; /* Adjust duration for random movement */
}

.ghost img {
    width: 80px; /* Adjust size */
    opacity: 0.7; /* Transparency */
}

/* Keyframes for Smooth Floating Movement */
@keyframes float {
    0% {
        left: -100px; /* Start off-screen */
        top: 10%; /* Initial vertical position */
    }
    10% {
        left: 10%; /* Move slightly to the right */
        top: 5%; /* Move slightly up */
    }
    25% {
        left: 30%; /* Move further to the right */
        top: 15%; /* Move slightly up */
    }
    50% {
        left: 50%; /* Middle position */
        top: 10%; /* Centered vertically */
    }
    75% {
        left: 70%; /* Move further to the right */
        top: 20%; /* Move slightly up */
    }
    90% {
        left: 90%; /* Near the right edge */
        top: 5%; /* Move slightly down */
    }
    100% {
        left: 100%; /* End off-screen to the right */
        top: 30%; /* Return to original vertical position */
    }
}

/* Keyframes for Random Floating Movement */
@keyframes random-float {
    0% {
        right: -100px; /* Start off-screen */
        top: 30%; /* Initial vertical position */
    }
    10% {
        right: 10%; /* Move to the right */
        top: 35%; /* Move slightly up */
    }
    30% {
        right: 40%; /* Move further right */
        top: 45%; /* Move slightly down */
    }
    50% {
        right: 30%; /* Middle position */
        top: 10%; /* Move slightly up */
    }
    70% {
        right: 55%; /* Move further to the right */
        top: 15%; /* Move slightly down */
    }
    80% {
        right: 75%; /* Move further to the right */
        top: 25%; /* Move slightly down */
    }
    90% {
        right: 90%; /* End near the right edge */
        top: 35%; /* Move slightly up */
    }
    100% {
        right: 100%; /* Stay at the right edge */
        top: 30%; /* Return to original vertical position */
    }
}
.navbar{
    background: linear-gradient(90deg, #f76e1d 0%,#f97416 15%, #fd8612 25%, #ff8c11 75%, #ff8b10 100%);
}
.custom-packaging {
    /* background: linear-gradient(90deg, #083358, #0b446b); */
    /* background: linear-gradient(90deg, #e58b4d, #fcd2b4); */
    /* background: linear-gradient(90deg, #e58b4d, #ffc1a0); */
    background: linear-gradient(90deg, #f76e1d 0%,#f97416 15%, #fd8612 25%, #ff8c11 75%, #ff8b10 100%);
    padding: 40px 0;
    position: relative;
    overflow: hidden;
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