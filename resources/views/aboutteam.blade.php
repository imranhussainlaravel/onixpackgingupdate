@include('layout.header')

<style media="screen">

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

@font-face {
    font-family: Exo;
    src: url(./fonts/Exo2.0-Medium.otf);
}

.main {
    width: 100%;
    height: 76.7vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(90deg, #e58b4d, #ffc1a0);
    flex-wrap: wrap; /* To make sure items wrap on smaller screens */
    padding: 20px;
}

/* Profile Card Styling */
.profile-card {
    position: relative;
    font-family: sans-serif;
    width: 220px;
    height: 220px;
    background: #fff;
    padding: 30px;
    border-radius: 50%;
    box-shadow: 0 0 22px #3336;
    transition: .6s;
    margin: 20px;
    text-align: center;
}

.profile-card:hover {
    border-radius: 10px;
    height: 260px;
}

.profile-card .img {
    position: relative;
    width: 100%;
    height: 100%;
    transition: .6s;
    z-index: 99;
}

.profile-card:hover .img {
    transform: translateY(-60px);
}

.img img {
    width: 100%;
    border-radius: 50%;
    box-shadow: 0 0 22px #3336;
    transition: .6s;
}

.profile-card:hover img {
    border-radius: 10px;
}

.caption {
    text-align: center;
    transform: translateY(-80px);
    opacity: 0;
    transition: .6s;
}

.profile-card:hover .caption {
    opacity: 1;
}

.caption h3 {
    font-size: 21px;
    font-family: sans-serif;
}

.caption p {
    font-size: 15px;
    color: #0c52a1;
    font-family: sans-serif;
    margin: 2px 0 5px 0;
}

.caption .social-links a {
    color: #333;
    margin-right: 15px;
    font-size: 16px;
    transition: .6s;
}

.social-links a:hover {
    color: #0c52a1;
}

#email-k {
    font-size: 15px;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .main {
        flex-direction: column; /* Stack profile cards vertically */
        height: auto; /* Allow flexible height on mobile */
    }

    .profile-card {
        width: 180px; /* Reduce card size for smaller screens */
        height: 180px;
        margin: 15px;
    }

    .profile-card:hover {
        height: 200px;
    }

    .profile-card .img img {
        width: 100%; /* Keep the image responsive */
    }

    .caption h3 {
        font-size: 18px; /* Slightly smaller heading for mobile */
    }

    .caption p {
        font-size: 13px; /* Smaller text for job title */
    }

    #email-k {
        font-size: 13px; /* Adjust email font size */
    }
}

@media (max-width: 480px) {
    .profile-card {
        width: 160px; /* Further reduce card size on smaller screens */
        height: 160px;
        padding: 15px;
    }

    .profile-card:hover {
        height: 180px;
    }

    .caption h3 {
        font-size: 16px;
    }

    .caption p {
        font-size: 12px;
    }

    #email-k {
        font-size: 12px;
    }
}

    </style>
 

    <div class="main">
        
        <div class="profile-card">
            <div class="img">
                <img src="{{ URL('images/cofounder.jpg')}}">
            </div>
            <div class="caption">
                <h3>Muhammad Hamza Abrar</h3>
                <p>Founder & CEO</p>
                <div class="social-links">
                    <a href="mailto:hamza.abrar104@gmail.com" id="email-k">
                        hamza.abrar104@gmail.com
                    </a>    
                    {{-- <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a> --}}
                </div>
            </div>
        </div>
        <div class="profile-card">
            <div class="img">
                <img src="{{ URL('images/profession.jpg')}}">
            </div>
            <div class="caption">
                <h3>Carla spencer</h3>
                <p>Marketing Head</p>
                <div class="social-links">
                    <a href="mailto:C.spencer@onixpackaging.com" id="email-k">
                        C.spencer@onixpackaging.com
                    </a>    
                    {{-- <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a> --}}
                </div>
            </div>
        </div>
        <div class="profile-card">
            <div class="img">
                <img src="{{ URL('images/operation.jpg')}}">
            </div>
            <div class="caption">
                <h3>Christopher hughes</h3>
                <p>Operations Head</p>
                <div class="social-links">
                    <a href="mailto:issachayes@onixpackaging.com" id="email-k">
                        chris@onixpackaging.com
                    </a>    
                    {{-- <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-1 bg-light" style="color:black;">
        <p class="mb-0">&copy; 2024, www.packingdesire.com .All rights reserved.</p>
    </div>

</body>

</html>
