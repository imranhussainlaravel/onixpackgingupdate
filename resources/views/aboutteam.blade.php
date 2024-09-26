@include('layout.header')

<style media="screen">

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Exo;
    }
    @font-face {
      font-family: Exo;
      src: url(./fonts/Exo2.0-Medium.otf);
    }
    .main{
      width: 100%;
      height: 76.7vh;
      display: flex;
      justify-content: center;
      align-items: center;
      /* background-color: #0c5db9; */
     background: linear-gradient(90deg, #e58b4d, #ffc1a0);
 
    }
    .profile-card{
      position: relative;
      font-family: sans-serif;
      width: 220px;
      height: 220px;
      background: #fff;
      padding: 30px;
      border-radius: 50%;
      box-shadow: 0 0 22px #3336;
      transition: .6s;
      margin: 0 25px;
    }
    .profile-card:hover{
      border-radius: 10px;
      height: 260px;
    }
    .profile-card .img{
      position: relative;
      width: 100%;
      height: 100%;
      transition: .6s;
      z-index: 99;
    }
    .profile-card:hover .img{
      transform: translateY(-60px);
    }
    .img img{
      width: 100%;
      border-radius: 50%;
      box-shadow: 0 0 22px #3336;
      transition: .6s;
    }
    .profile-card:hover img{
      border-radius: 10px;
    }
    .caption{
      text-align: center;
      transform: translateY(-80px);
      opacity: 0;
      transition: .6s;
    }
    .profile-card:hover .caption{
      opacity: 1;
    }
    .caption h3{
      font-size: 21px;
      font-family: sans-serif;
    }
    .caption p{
      font-size: 15px;
      color: #0c52a1;
      font-family: sans-serif;
      margin: 2px 0 5px 0;
    }
    .caption .social-links a{
      color: #333;
      margin-right: 15px;
      font-size: 21px;
      transition: .6s;
    }
    .social-links a:hover{
      color: #0c52a1;
    }
    #email-k {
        font-size: 15px;
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
                <h3>Isabella Reed</h3>
                <p>Marketing Head</p>
                <div class="social-links">
                    <a href="mailto:hamza.abrar104@gmail.com" id="email-k">
                        isebellareed8971@gmail.com
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
                <h3>Imran Hussain</h3>
                <p>Operations Head</p>
                <div class="social-links">
                    <a href="mailto:hamza.abrar104@gmail.com" id="email-k">
                        dgeimran@gmail.com
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
