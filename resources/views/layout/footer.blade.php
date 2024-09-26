
<div class="container text-center my-5">
    <h2 id="heading-title">ONE PLACE TO GET YOUR CUSTOM PACKAGING</h2>
    <p>Packing Desire offers a variety of custom packaging solutions and project assistance with pricing and service you'll love.</p>
    
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
                <h5>Free Graphic Designing</h5>
            </div>
        </div>
    </div>
</div>

<!-- HTML Form -->
<div id="custom-quote-form" >
    <h2>GET CUSTOM QUOTE</h2>
    <div class="form-container">
        <form class="px-3" action="{{ route('send.email') }}" method="POST">
            @csrf
            <div class="form-row">
                <input type="text" placeholder="Name" class="form-control" required name="name">
                <input type="text" placeholder="Phone No" class="form-control" required name="phone">
                <input type="email" placeholder="Email Address" class="form-control" required name="email">
            </div>
            
            <div class="form-row">
                <input type="number" placeholder="Quantity" class="form-control" required name="quantity">
                <input type="text" placeholder="Product Name" class="form-control" required name="product_name">
                <select class="form-select" required id="color" name="color">
                    <option selected disabled>Select Color</option>
                    <option value="1">1 color</option>
                    <option value="2">2 color</option>
                    <option value="3">3 color</option>
                    <option value="4">4 color</option>
                    <option value="4/1">4/1 color</option>
                    <option value="4/2">4/2 color</option>
                    <option value="4/3">4/3 color</option>
                    <option value="4/4">4/4 color</option>
                </select>
            </div>
            
            <div class="form-row">
                {{-- <label>Size:</label> --}}
                <input type="text" placeholder="L" class="form-control" required name="length">
                <input type="text" placeholder="W" class="form-control" required name="width">
                <input type="text" placeholder="D" class="form-control" required name="depth">
                <select class="form-select form-select-sm" required name="measurement_unit">
                    <option selected value="inch">inch</option>
                    <option value="cm">cm</option> 
                    <option value="mm">mm</option>
                </select>
            </div>
            
            <textarea placeholder="Write short message" class="form-control" rows="4" required name="description"></textarea>
            
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
                {{-- <div class="d-flex align-items-center mb-1"> --}}
                    <img src="{{ URL('images/paclogo.png') }}" alt="Logo" class="d-flex align-items-center" style="max-width: 190px;"> <!-- Replace with your logo path -->
                    {{-- <h4 class="mb-0">Packaging</h4> --}}
                {{-- </div> --}}
                <p>We collaborate with people and brands.<br>Lets build something great together.</p>
                <form class="d-flex align-items-center">
                    <input type="email" class="form-control me-2" placeholder="Your Email Address">
                    <button type="submit" class="btn" style="background-color: #f76c6c; color:white; font-weight:bold">Submit</button>
                </form>
            </div>

            <!-- Information Section -->
            <div class="col-md-4">
                <h5 class="mb-3">INFORMATION</h5>
                <ul class="list-unstyled">
                    <li><a style=" text-decoration: none;" href="#" class="text-light">Privacy and Security</a></li>
                    <li><a style=" text-decoration: none;" href="#" class="text-light">Terms and Conditions</a></li>
                    <li><a style=" text-decoration: none;" href="#" class="text-light">About Us</a></li>
                    <li><a style=" text-decoration: none;" href="#" class="text-light">Contact Us</a></li>
                    <li><a style=" text-decoration: none;" href="#" class="text-light">Sitemap</a></li>
                    <li><a style=" text-decoration: none;" href="#" class="text-light">Portfolio</a></li>
                </ul>
            </div>
 
            <!-- Contact Section -->
            <div class="col-md-4">
                <h5 class="mb-3">CONTACT US</h5>
                <p><i class="bi bi-telephone-fill" style="color: #f76c6c;"></i> (321) 310-0141</p>
                <p><i class="bi bi-envelope-fill" style="color: #f76c6c;"></i> sales@onixpackaging.com</p>
                <p><i class="bi bi-geo-alt-fill" style="color: #f76c6c;"></i> 7901 4th St N # 21594 St. Petersburg, FL 33702</p>
                
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
    <p class="mb-0">&copy; 2024, www.packingdesire.com .All rights reserved.</p>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdown = document.getElementById('dropdownMenu');
        const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
        const dropdownMenu = dropdown.querySelector('.dropdown-menu');

        dropdownToggle.addEventListener('click', function (e) {
            e.preventDefault();
            dropdownMenu.classList.toggle('show');
        });

        dropdown.addEventListener('mouseleave', function () {
            dropdownMenu.classList.remove('show');
        });
    });

    function validateCaptcha() {
    const captchaAnswer = document.getElementById('captcha').value;
    if (captchaAnswer != '6') {
        alert('Captcha is incorrect. Please try again.');
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

</body>
</html>