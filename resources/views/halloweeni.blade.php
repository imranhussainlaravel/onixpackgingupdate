
@include('layout.header')
    <!-- Hero Section -->
    <style>
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

     <!-- //! halloween only --------------------------------------------------------------->
    <div id="halloween-splash">
        <span id="H">H</span>
        <span id="A">A</span>
        <span id="L">L</span>
        <span id="A">L</span>
        <span id="O">🎃</span>
        <span id="W">W</span>
        <span id="E">E</span>
        <span id="N">E</span>
        <span id="E">N</span>
        </div>

      <!-- Floating Ghosts -->
      
      {{-- <div class="ghost-container right-to-left">
        <div class="ghost ghost1"><img src="{{ URL('images/ghost.png') }}" alt="Ghost"></div>
    </div>
    <div class="ghost-container left-to-right">
        <div class="ghost ghost1"><img src="{{ URL('images/ghost.png') }}" alt="Ghost"></div>
    </div> --}}
    <!-- Ghost with Smooth Movement -->
<div class="ghost-container">
    <div class="ghost">
        <img src="{{ URL('images/ghost.png') }}" alt="Ghost">
    </div>
</div>

<!-- Ghost with Random Movement -->
<div class="ghost-container">
    <div class="ghost ghost-random">
        <img src="{{ URL('images/ghost1.png') }}" alt="Ghost">
    </div>
</div>


    <div id="main-content" style="display: none;">
        <!-- //! halloween only --------------------------------------------------------------->
        <div class="container-fluid text-white py-5 overflow-hidden" 
        style="border-bottom-right-radius: 90px;
       background: linear-gradient(90deg, #f76e1d 0%,#f97416 15%, #fd8612 25%, #ff8c11 75%, #ff8b10 100%);
        background-image: url('{{ URL('images/pumpkin2.png') }}'), linear-gradient(90deg, #f76e1d 0%,#f97416 15%, #fd8612 25%, #ff8c11 75%, #ff8b10 100%);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;">
 
 
    <div class="container overflow-hidden">
        <div class="row align-items-center">
            <!-- Text Section -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h1 class="display-4 font-weight-bold" style="font-family: 'Raleway', sans-serif;">
                    Custom boxes made easy <span class="font-weight-bold" style="color: #175a5a;">for retail</span>
                </h1>                              
                <p class="lead">
                    Supercharge your brand through the power of custom boxes and custom packaging that's big on wow-factor. With low minimums, free design expertise, super-fast delivery, and unlimited customization.
                </p>
                <a class="btn btn-lg" 
                    style="background-color: #175a5a; color: #ffffff;"
                    onmouseover="this.style.backgroundColor='#0d3c3c'; this.style.color='#f9a171';" 
                    onmouseout="this.style.backgroundColor='#175a5a'; this.style.color='#ffffff';"
                    onclick="document.getElementById('custom-quote-form').scrollIntoView({behavior: 'smooth'});">
                        Get Free Quote
                </a>
            </div>
            <!-- Image Section -->
            <div class="col-md-6 text-center">
                <img src="{{ URL('images/frontslider.png')}}" alt="Custom Boxes" class="img-fluid">
            </div>
        </div>
    </div>
</div>

        

        <!-- Custom Rigid Boxes Section -->
            <section class="custom-rigid-boxes py-5">
                <div class="container">
                    <h2 class="text-center mb-4" style="font-size: 40px;font-weight:bold;margin-top:25px">Your Custom Packaging Partner</h2>
                    <div class="row">
                        @if($categories->isEmpty())
                            <p></p>
                        @else
                            @foreach($categories as $category)
                                <!-- Box 1 -->
                                <div class="col-6 col-md-6 col-lg-3 mb-4">
                                    <!-- Wrap the whole card in an anchor tag -->
                                    <a href="{{ route('product.show', ['id' => $category->id]) }}" class="text-decoration-none">
                                        <div class="card shadow-sm p-3 rounded-3 border-0 text-center" style="background-color: #f8fafc; cursor: pointer;">
                                            <img src="{{ $category->main_img }}" class="card-img-top mb-3" alt="Magnetic Closure Boxes" style="max-height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <h5 class="card-title text-dark fw-bold mb-3">{{ $category->title }}</h5>
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
        <!-- //! halloween only --------------------------------------------------------------->
    </div>
    <script>
        // Hide splash screen after 3 seconds
        setTimeout(function() {
            document.getElementById('halloween-splash').classList.add('fade-out');
            document.getElementById('main-content').style.display = 'block';
        }, 3000); // Change to desired duration (3000ms = 3 seconds)
    </script>
    <script>
        // Hide splash screen after 3 seconds
        setTimeout(function() {
            document.getElementById('halloween-splash').classList.add('fade-out');
            document.getElementById('main-content').style.display = 'block';
        }, 3000); // Change to desired duration (3000ms = 3 seconds)

        // JavaScript for Random Movement
        const randomGhost = document.querySelector('.random-ghost');

        function getRandomPosition() {
            const x = Math.random() * 100; // Get random position from 0% to 100%
            const y = Math.random() * 100; // Get random position from 0% to 100%
            return { x, y };
        }

        function moveGhost() {
            const { x, y } = getRandomPosition();
            randomGhost.style.left = `${x}%`;
            randomGhost.style.top = `${y}%`;
        }

        // Move ghost at random intervals
        setInterval(moveGhost, 2000); // Change position every 2 seconds
    </script>

        <!-- //! halloween only --------------------------------------------------------------->
    
    
    
 

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @include('layout.footer')
