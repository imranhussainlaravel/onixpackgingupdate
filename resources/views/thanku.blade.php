@include('layout.header')

  <!-- thank-you-wrapper -->
  <section class="thank-you-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="thank-you-page-logo">
            <a href="#">
                <img src="{{ URL('images/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 130px;">
					</a>
          </div>
          
          <div class="thank-you-page-content">
                                   <h2>Thank you !</h2>
            <h1>Your message has been sent to the Sales Team. We will process your request and contact you shortly</h1>
            <a href="{{ route('index.home') }}" class="btn btn-primary arrow-icon"> Go back to Homepage </a>
          </div>
          {{-- <ul class="footer-nav">
            <li> <a href="#">Terms and Conditions </a> </li>
            <li> <a href="#"> Privacy Policy </a> </li>
            <li> <a href="#"> FAQ </a> </li>
            <li> <a href="#"> Contact Us </a> </li>
          </ul> --}}
          <div class="thank-you-copy">
            <p class="mb-0">&copy; 2024, www.onixpackaging.com .All rights reserved.</p>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- thank-you-wrapper -->

  <!-- Scripts -->
  <script src="scripts/index.js"></script>
</body>

</html>

<style>
  
/* thank you page design */
html, body{height: 100%;}
.thank-page-template{background-color: #f2f2f2;}
.thank-you-wrapper{position: relative; height: 100%; }
.thank-you-wrapper > .container{width:780px; margin:0 auto;}
.thank-you-wrapper{text-align: center;}
.thank-you-page-content{position: relative; float:left; width: 100%; background: #f2f2f2; padding:90px; margin:30px 0;box-sizing: border-box;}
.thank-you-page-content::before,
.thank-you-page-content::after { z-index: -1; position: absolute; content: ""; bottom: 15px; left: 10px; width: 50%; top: 80%; max-width: 300px; background: #777; -webkit-box-shadow: 0 15px 10px #777; -moz-box-shadow: 0 15px 10px #777; box-shadow: 0 15px 10px #777; -webkit-transform: rotate(-3deg); -moz-transform: rotate(-3deg); -o-transform: rotate(-3deg); -ms-transform: rotate(-3deg); transform: rotate(-3deg);}
.thank-you-page-content::after { -webkit-transform: rotate(3deg); -moz-transform: rotate(3deg); -o-transform: rotate(3deg); -ms-transform: rotate(3deg); transform: rotate(3deg); right: 10px; left: auto;}
html body .thank-you-wrapper .container{display: table; height: 100%;}
html body .thank-you-wrapper .container > .row{display: table-cell; height: 100%; vertical-align: middle;}
.thank-you-page-logo{float: left; width: 100%;}
.arrow-icon{position: relative; padding-left:55px;}
.arrow-icon::before{ position: absolute; left: 25px; top:20px; content: ""; display: inline-block; box-sizing: border-box; height:10px; width:10px; border-style: solid; border-color: #fff; border-width: 0px 1px 1px 0px; transform: rotate(131deg); transition: border-width 150ms ease-in-out;}
.arrow-icon::after{ content: ""; display: inline-block; width: 20px; background-color: #fff; height: 1px; position: absolute; left:25px; top:25px;}
.thank-you-wrapper ul.footer-nav li a, .thank-you-wrapper ul.footer-nav li a:hover{color:#0a568a;}
.thank-you-wrapper ul.footer-nav li + li::before{ background: rgba(0, 0, 0, 0.3);}
.thank-you-copy p{margin: 0; padding: 0; font-size: 12px;}
.thank-you-page-content h1{position: relative; width: 100%; float: left; margin-bottom: 45px; padding-top: 110px; font-size: 30px; font-weight: 200; line-height: 40px;}
.thank-you-page-content h1::before { content: "\f00c"; top: 0; transform: translateX(-50%); -webkit-transform: translateX(-50%); -ms-transform: translateX(-50%); left: 50%; position: absolute; font-family: "FontAwesome"; font-size:60px; text-align: center; float: left; width: 100px; color: green; height: 100px; text-align: center; line-height: 100px; border: 2px solid green;  border-radius:100%;  -webkit-border-radius:100%; -ms-border-radius:100%;}
.thank-you-page-content .btn{padding-top:13px; padding-bottom:13px; padding-right: 25px;}
ul.footer-nav{text-align: right;}
ul.footer-nav li{display: inline-block; position: relative;}
ul.footer-nav li + li{padding-left: 30px;}
ul.footer-nav li + li::before{content: ""; height: 12px; width: 1px; background: #fff; display: inline-block; position: absolute; top: 3px; left:12px;}
ul.footer-nav{text-align: center; margin: 12px 0;}
ul.footer-nav li p,
ul.footer-nav li{font-size: 12px;font-weight: 400;}
ul.footer-nav li a{ text-decoration:none;}
ul.footer-nav li a, ul.footer-nav li a:hover{color: #fff;}
ul.footer-nav li a:hover{color: #fff; text-decoration: underline;}
ul.footer-nav li p{line-height: normal;}
ul.footer-nav li + li::before{background: #fff;}
.btn-primary { background-color: #175a5a; color:#fff; text-decoration:none; border-color: #0a568a; position:relative;   padding-top: 13px; padding-bottom: 13px; padding-right: 25px;}
.btn-primary::before { position: absolute; left: 25px;
    top: 20px;
    content: "";
    display: inline-block;
    box-sizing: border-box;
    height: 10px;
    width: 10px;
    border-style: solid;
    border-color: #fff;
    border-width: 0px 1px 1px 0px;
    transform: rotate(131deg);
    transition: border-width 150ms ease-in-out;
}
.btn-primary::after { content: ""; display: inline-block; width: 20px; background-color: #fff; height: 1px; position: absolute; left: 25px; top: 25px;}
/* thank you page design */
@media (min-width:360px){
  h2{
    font-size:4.5em;
  }
  .go-home{
    margin-bottom:20px;
  }
}
/* thank you page design */
h2{
    font-family: 'Kaushan Script', cursive;
  font-size:4em;
  letter-spacing:3px;
  color:#175a5a ;
  margin:0;
  margin-bottom:20px;
}
</style>