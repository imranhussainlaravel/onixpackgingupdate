<div class="container text-center my-5">
    <h2 id="heading-title">ONE PLACE TO GET YOUR CUSTOM PACKAGING</h2>
    <p>NexOn Packaging offers a variety of custom packaging solutions and project assistance with pricing and service
        you'll love.</p>

    <div class="row mt-5">
        <div class="col-md-2">
            <div id="benefit">
                <div id="icon-container">
                    <i id="benefit-icon" class="bi bi-bag-x"></i>
                </div>
                <h5>No Die & Plate Charges</h5>
            </div>
        </div>
        <div class="col-md-2">
            <div id="benefit">
                <div id="icon-container">
                    <i id="benefit-icon" class="bi bi-clock"></i>
                </div>
                <h5>Quick Turnaround Time</h5>
            </div>
        </div>
        <div class="col-md-2">
            <div id="benefit">
                <div id="icon-container">
                    <i id="benefit-icon" class="bi bi-truck"></i>
                </div>
                <h5>Free Shipping</h5>
            </div>
        </div>
        <div class="col-md-2">
            <div id="benefit">
                <div id="icon-container">
                    <i id="benefit-icon" class="bi bi-box-seam"></i>
                </div>
                <h5>Starting from 50 Boxes</h5>
            </div>
        </div>
        <div class="col-md-2">
            <div id="benefit">
                <div id="icon-container">
                    <i id="benefit-icon" class="bi bi-box"></i>
                </div>
                <h5>Customize Size & Style</h5>
            </div>
        </div>
        <div class="col-md-2">
            <div id="benefit">
                <div id="icon-container">
                    <i id="benefit-icon" class="bi bi-brush"></i>
                </div>
                <h5>Free Design Support</h5>
            </div>
        </div>
    </div>
</div>

<!-- HTML Form -->
<div id="custom-quote-form">
    <h2>GET CUSTOM QUOTE</h2>
    <div class="form-container">
        <form class="px-3" action="{{ route('send.email') }}" method="POST">
            @csrf
            <div class="form-row">
                <input type="text" placeholder="Name" class="form-control" required 
                       name="name" value="{{ old('name') }}">
                <input type="text" placeholder="Phone No" class="form-control" required 
                       name="phone" value="{{ old('phone') }}">
                <input type="email" placeholder="Email Address" class="form-control" required 
                       name="email" value="{{ old('email') }}">
            </div>

            <div class="form-row">
                <input type="number" placeholder="Quantity" class="form-control" required 
                       name="quantity" value="{{ old('quantity') }}">
                <input type="text" placeholder="Product Name" class="form-control" required 
                       name="product_name" value="{{ old('product_name') }}">
                <select class="form-select" required id="color" name="color">
                    <option disabled>Select Color</option>
                    @foreach(['1', '2', '3', '4', '4/1', '4/2', '4/3', '4/4'] as $color)
                        <option value="{{ $color }}" {{ old('color') == $color ? 'selected' : '' }}>
                            {{ $color }} color
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-row">
                <input type="text" placeholder="L" class="form-control" required 
                       name="length" value="{{ old('length') }}">
                <input type="text" placeholder="W" class="form-control" required 
                       name="width" value="{{ old('width') }}">
                <input type="text" placeholder="D" class="form-control" required 
                       name="depth" value="{{ old('depth') }}">
                <select class="form-select form-select-sm" required name="measurement_unit">
                    @foreach(['inch', 'cm', 'mm'] as $unit)
                        <option value="{{ $unit }}" {{ old('measurement_unit') == $unit ? 'selected' : '' }}>
                            {{ $unit }}
                        </option>
                    @endforeach
                </select>
            </div>

            <textarea placeholder="Write short message" class="form-control" rows="4" required 
                      name="description">{{ old('description') }}</textarea>

            @php
                // Preserve CAPTCHA numbers on validation errors
                $num1 = old('num1', rand(1, 7));
                $num2 = old('num2', rand(1, 5));
            @endphp

            <div class="form-row" style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
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
            
            <input type="hidden" name="num1" value="{{ $num1 }}">
            <input type="hidden" name="num2" value="{{ $num2 }}">

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</div>


<!-- resources/views/footer.blade.php -->
<footer class="footer text-light pt-5 pb-3" style="background-color: rgb(112, 111, 111)">
    <div class="container">
        <div class="row">
            <!-- Branding and Collaboration Message -->
            <div class="col-md-4">
                <div class="d-flex align-items-center">
                    <img src="{{ URL('images/logo.png') }}" alt="Logo" style="max-width: 70px; margin-right: 10px;">
                    <span style="font-weight: bold; font-size: 30px;
                        background: linear-gradient(to right, #e2a17c 10%, #ca794d 100%, rgba(218, 122, 13, 0) 100%);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;">
                        NexOnPackaging
                    </span>
                </div>
                
                <p>We collaborate with people and brands.<br>Lets build something great together.</p>
                <form class="d-flex align-items-center">
                    <input type="email" class="form-control me-2" placeholder="Your Email Address">
                    <button type="submit" class="btn"
                        style="background-color: #faa86d; color:white; font-weight:bold">Submit</button>
                </form>
            </div>

            <!-- Information Section -->
            <div class="col-md-4">
                <h5 class="mb-3">INFORMATION</h5>
                <ul class="list-unstyled">
                    <li><a style=" text-decoration: none;" href="#" class="text-light">Privacy and Security</a>
                    </li>
                    <li><a style=" text-decoration: none;" href="#" class="text-light">Terms and Conditions</a>
                    </li>
                    <li><a style=" text-decoration: none;" href="#" class="text-light">About Us</a></li>
                    <li><a style=" text-decoration: none;" href="#" class="text-light">Contact Us</a></li>
                    {{-- <li><a style=" text-decoration: none;" href="#" class="text-light">Sitemap</a></li> --}}
                    <li><a style=" text-decoration: none;" href="#" class="text-light">Portfolio</a></li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div class="col-md-4">
                <h5 class="mb-3">CONTACT US</h5>
                <p><i class="bi bi-telephone-fill" style="color: #faa86d;"></i> (000) 000-0000</p>
                <p><i class="bi bi-envelope-fill" style="color: #faa86d;"></i> sales@nexonpackaging.com</p>
                <p><i class="bi bi-geo-alt-fill" style="color: #faa86d;"></i> 7919 4th St N # 21584 St. Petersburg, FL
                    33702</p>

                <!-- Social Media Icons -->
                <h6 class="mt-2">Follow Us:</h6>
                <div class="d-flex">
                    <a href="#" class="me-4 text-light"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="me-4 text-light"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="me-4 text-light"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="me-4 text-light"><i class="bi bi-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="text-center mt-1 bg-light" style="color:black;">
    <p class="mb-0">&copy; 2024, www.nexonpackaging.com .All rights reserved.</p>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdown = document.getElementById('dropdownMenu');
        const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
        const dropdownMenu = dropdown.querySelector('.dropdown-menu');

        dropdownToggle.addEventListener('click', function(e) {
            e.preventDefault();
            dropdownMenu.classList.toggle('show');
        });

        dropdown.addEventListener('mouseleave', function() {
            dropdownMenu.classList.remove('show');
        });
    });

    // function validateCaptcha() {
    //     const captchaAnswer = document.getElementById('captcha').value;
    //     if (captchaAnswer != '6') {
    //         alert('Captcha is incorrect. Please try again.');
    //         return false; // Prevent form submission
    //     }
    //     return true; // Allow form submission
    // }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/67082149c141d8b4e3036818/1i9rs4279';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

    <div class="sticky-phone">
        <a href="tel:(321) 310-0141">
            <i class="fas fa-phone-alt"></i>
        </a>
    </div>
</body>

</html>
