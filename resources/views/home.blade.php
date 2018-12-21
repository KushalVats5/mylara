<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<html>
 <head>

  <!-- Include the above in your HEAD tag --> 
  <script>
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 300,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
            } else {
                if (classie.has(header,"smaller")) {
                    classie.remove(header,"smaller");
                }
            }
        });
    }
    window.onload = init();
</script> 
 </head> 
 <body> 
  <div id="wrapper"> 
   <header> 
    <div class="container clearfix"> 
     <h1 id="logo"> Quixotic Design </h1> 
     <nav> 
      <a href="">Lorem</a> 
      <a href="">Ipsum</a> 
       @if(isset(Auth::user()->email))
        <a href="{{ url('auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
        @else
    <a href="{{ url('auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        <a href="{{ url('/register') }}"><span class="glyphicon glyphicon-log-in"></span> Register</a>
        @endif
     </nav> 
    </div> 
   </header>
   <!-- /header --> 
   <div id="main"> 
    <div id="content"> 
     <section> 
      <div class="container"> 
       <h1>Header Resize On Scroll with Animations</h1> 
       <p>Cupcake ipsum dolor sit amet lollipop. Macaroon candy cotton candy bear claw macaroon carrot cake pastry icing dessert. Cupcake pastry tart sesame snaps lollipop donut pie. Cookie apple pie toffee lemon drops jelly beans cheesecake sweet roll. Jelly-o soufflé donut candy canes wafer dragée sweet cheesecake. Macaroon caramels pie cookie gummi bears. Ice cream jelly-o toffee cookie gingerbread cookie. Soufflé fruitcake jelly-o jelly chupa chups jelly beans. Dragée marzipan pastry macaroon oat cake muffin soufflé topping liquorice. Jelly-o chocolate cake lollipop.</p> 
       <p>Sugar plum muffin cookie pastry oat cake icing candy canes chocolate. Gummi bears chupa chups fruitcake dessert jelly. Muffin cookie ice cream soufflé pastry lollipop gingerbread sweet. Unerdwear.com bonbon candy marzipan bonbon gummies chocolate cake gummi bears powder. Unerdwear.com tart halvah chocolate cake dragée liquorice. Sugar plum chocolate bar pastry liquorice dragée jelly powder. Jelly tootsie roll applicake caramels. Marzipan candy tootsie roll donut. Gummies ice cream macaroon applicake.</p> 
       <p> <a href="https://www.facebook.com/pratik.chauhan.cp">« Connect With Me | Chauhan PRatik</a><br /> <a href="http://bootsnipp.com/cppratikcp">« Go back to all tutorials?</a> </p> 
      </div> 
     </section> 
     <section class="color"> 
      <div class="container"> 
       <h1>Cupcakes for the people!</h1> 
       <p>Cupcake ipsum dolor sit amet lollipop. Macaroon candy cotton candy bear claw macaroon carrot cake pastry icing dessert. Cupcake pastry tart sesame snaps lollipop donut pie. Cookie apple pie toffee lemon drops jelly beans cheesecake sweet roll. Jelly-o soufflé donut candy canes wafer dragée sweet cheesecake. Macaroon caramels pie cookie gummi bears. Ice cream jelly-o toffee cookie gingerbread cookie. Soufflé fruitcake jelly-o jelly chupa chups jelly beans. Dragée marzipan pastry macaroon oat cake muffin soufflé topping liquorice. Jelly-o chocolate cake lollipop.</p> 
       <p>Sugar plum muffin cookie pastry oat cake icing candy canes chocolate. Gummi bears chupa chups fruitcake dessert jelly. Muffin cookie ice cream soufflé pastry lollipop gingerbread sweet. Unerdwear.com bonbon candy marzipan bonbon gummies chocolate cake gummi bears powder. Unerdwear.com tart halvah chocolate cake dragée liquorice. Sugar plum chocolate bar pastry liquorice dragée jelly powder. Jelly tootsie roll applicake caramels. Marzipan candy tootsie roll donut. Gummies ice cream macaroon applicake.</p> 
      </div> 
     </section> 
     <section> 
      <div class="container"> 
       <h1>Chocolate, vanilla, and red velvet</h1> 
       <p>Cupcake ipsum dolor sit amet lollipop. Macaroon candy cotton candy bear claw macaroon carrot cake pastry icing dessert. Cupcake pastry tart sesame snaps lollipop donut pie. Cookie apple pie toffee lemon drops jelly beans cheesecake sweet roll. Jelly-o soufflé donut candy canes wafer dragée sweet cheesecake. Macaroon caramels pie cookie gummi bears. Ice cream jelly-o toffee cookie gingerbread cookie. Soufflé fruitcake jelly-o jelly chupa chups jelly beans. Dragée marzipan pastry macaroon oat cake muffin soufflé topping liquorice. Jelly-o chocolate cake lollipop.</p> 
       <p>Sugar plum muffin cookie pastry oat cake icing candy canes chocolate. Gummi bears chupa chups fruitcake dessert jelly. Muffin cookie ice cream soufflé pastry lollipop gingerbread sweet. Unerdwear.com bonbon candy marzipan bonbon gummies chocolate cake gummi bears powder. Unerdwear.com tart halvah chocolate cake dragée liquorice. Sugar plum chocolate bar pastry liquorice dragée jelly powder. Jelly tootsie roll applicake caramels. Marzipan candy tootsie roll donut. Gummies ice cream macaroon applicake.</p> 
      </div> 
     </section> 
     <section class="color"> 
      <div class="container"> 
       <h1>Come to me!</h1> 
       <p>Cupcake ipsum dolor sit amet lollipop. Macaroon candy cotton candy bear claw macaroon carrot cake pastry icing dessert. Cupcake pastry tart sesame snaps lollipop donut pie. Cookie apple pie toffee lemon drops jelly beans cheesecake sweet roll. Jelly-o soufflé donut candy canes wafer dragée sweet cheesecake. Macaroon caramels pie cookie gummi bears. Ice cream jelly-o toffee cookie gingerbread cookie. Soufflé fruitcake jelly-o jelly chupa chups jelly beans. Dragée marzipan pastry macaroon oat cake muffin soufflé topping liquorice. Jelly-o chocolate cake lollipop.</p> 
       <p>Sugar plum muffin cookie pastry oat cake icing candy canes chocolate. Gummi bears chupa chups fruitcake dessert jelly. Muffin cookie ice cream soufflé pastry lollipop gingerbread sweet. Unerdwear.com bonbon candy marzipan bonbon gummies chocolate cake gummi bears powder. Unerdwear.com tart halvah chocolate cake dragée liquorice. Sugar plum chocolate bar pastry liquorice dragée jelly powder. Jelly tootsie roll applicake caramels. Marzipan candy tootsie roll donut. Gummies ice cream macaroon applicake.</p> 
      </div> 
     </section> 
     <section> 
      <div class="container"> 
       <h1>Sugar rush, oh my...</h1> 
       <p>Cupcake ipsum dolor sit amet lollipop. Macaroon candy cotton candy bear claw macaroon carrot cake pastry icing dessert. Cupcake pastry tart sesame snaps lollipop donut pie. Cookie apple pie toffee lemon drops jelly beans cheesecake sweet roll. Jelly-o soufflé donut candy canes wafer dragée sweet cheesecake. Macaroon caramels pie cookie gummi bears. Ice cream jelly-o toffee cookie gingerbread cookie. Soufflé fruitcake jelly-o jelly chupa chups jelly beans. Dragée marzipan pastry macaroon oat cake muffin soufflé topping liquorice. Jelly-o chocolate cake lollipop.</p> 
       <p>Sugar plum muffin cookie pastry oat cake icing candy canes chocolate. Gummi bears chupa chups fruitcake dessert jelly. Muffin cookie ice cream soufflé pastry lollipop gingerbread sweet. Unerdwear.com bonbon candy marzipan bonbon gummies chocolate cake gummi bears powder. Unerdwear.com tart halvah chocolate cake dragée liquorice. Sugar plum chocolate bar pastry liquorice dragée jelly powder. Jelly tootsie roll applicake caramels. Marzipan candy tootsie roll donut. Gummies ice cream macaroon applicake.</p> 
      </div> 
     </section> 
    </div> 
   </div>
   <!-- #main --> 
   <footer> 
    <div id="info-bar"> 
     <div class="container clearfix"> 
      <span class="all-tutorials"><a href="https://codepen.io/robgdev/pen/rqwWpr">My CodePen</a></span> 
      <span class="back-to-tutorial"><a href="https://www.facebook.com/profile.php?id=100012607714717">Robert Baca</a></span> 
     </div> 
    </div>
    <!-- /#top-bar --> 
   </footer>
   <!-- /footer --> 
  </div>
  <!-- /#wrapper -->
 </body>
</html>
<style type="text/css">
    /* =Reset default browser CSS. Based on work by Eric Meyer: http://meyerweb.com/eric/tools/css/reset/index.html
-------------------------------------------------------------- */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
  background: transparent;
  border: 0;
  margin: 0;
  padding: 0;
  vertical-align: baseline; }

body {
  line-height: 1; }

h1, h2, h3, h4, h5, h6 {
  clear: both;
  font-weight: normal; }

ol, ul {
  list-style: none; }
 

blockquote {
  quotes: none; }

blockquote:before, blockquote:after {
  content: '';
  content: none; }

del {
  text-decoration: line-through; }

/* tables still need 'cellspacing="0"' in the markup */
table {
  border-collapse: collapse;
  border-spacing: 0; }

a img {
  border: none; }

/* =Scss Variables
-------------------------------------------------------------- */
/* =Global
-------------------------------------------------------------- */
*,
*:before,
*:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; }

body {
  background-color: #3cb5f9;
  color: #505050;
  font-family: "Ubuntu", sans-serif;
  font-weight: 300;
  font-size: 16px;
  line-height: 1.8; }

/* Headings */
h1, h2, h3, h4, h5, h6 {
  line-height: 1;
  font-weight: 300; }

a {
  text-decoration: none;
  color: #3cb5f9; }

a:hover {
  color: #0793e2; }

/* =Template
-------------------------------------------------------------- */
#wrapper {
  width: 100%;
  margin: 0 auto; }

#main {
  background-color: #fff;
  padding-top: 150px; }

.container {
  width: 80%;
  margin: 0 auto;
  padding: 0 30px; }

section {
  padding: 60px 0; }
  section h1 {
    font-weight: 700;
    margin-bottom: 10px; }
  section p {
    margin-bottom: 30px; }
    section p:last-child {
      margin-bottom: 0; }
  section.color {
    background-color: #3cb5f9;
    color: white; }

/* =Info Bar
-------------------------------------------------------------- */
#info-bar {
  background-color: #3cb5f9; }
  #info-bar a {
    color: white;
    font-size: 14px;
    text-transform: uppercase;
    display: inline-block;
    margin: 0;
    padding: 10px; }
    #info-bar a:hover {
      background-color: #0793e2; }
  #info-bar span.all-tutorials,
  #info-bar span.back-to-tutorial {
    display: block;
    width: 50%; }
  #info-bar span.all-tutorials {
    float: left;
    text-align: left; }
  #info-bar span.back-to-tutorial {
    float: right;
    text-align: right; }

/* =Header
-------------------------------------------------------------- */
header {
  width: 100%;
  height: 150px;
  overflow: hidden;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 999;
  background-color: #0683c9;
  -webkit-transition: height 0.6s;
  -moz-transition: height 0.6s;
  -ms-transition: height 0.6s;
  -o-transition: height 0.6s;
  transition: height 0.6s; }
  header h1#logo {
    display: inline-block;
    height: 150px;
    line-height: 150px;
    float: left;
    font-family: "Oswald", sans-serif;
    font-size: 60px;
    color: white;
    font-weight: 400;
    -webkit-transition: all 0.6s;
    -moz-transition: all 0.6s;
    -ms-transition: all 0.6s;
    -o-transition: all 0.6s;
    transition: all 0.6s; }
  header nav {
    display: inline-block;
    float: right; }
    header nav a {
      line-height: 150px;
      margin-left: 20px;
      color: #9fdbfc;
      font-weight: 700;
      font-size: 18px;
      -webkit-transition: all 0.6s;
      -moz-transition: all 0.6s;
      -ms-transition: all 0.6s;
      -o-transition: all 0.6s;
      transition: all 0.6s; }
      header nav a:hover {
        color: white; }
  header.smaller {
    height: 75px; }
    header.smaller h1#logo {
      width: 150px;
      height: 75px;
      line-height: 75px;
      font-size: 30px; }
    header.smaller nav a {
      line-height: 75px; }

/* =Footer
-------------------------------------------------------------- */
/* =Extras
-------------------------------------------------------------- */
.clearfix:after {
  visibility: hidden;
  display: block;
  content: "";
  clear: both;
  height: 0; }

/* =Media Queries
-------------------------------------------------------------- */
@media all and (max-width: 660px) {
  /* =Header
  -------------------------------------------------------------- */
  header h1#logo {
    display: block;
    float: none;
    margin: 0 auto;
    height: 100px;
    line-height: 100px;
    text-align: center; }
  header nav {
    display: block;
    float: none;
    height: 50px;
    text-align: center;
    margin: 0 auto; }
    header nav a {
      line-height: 50px;
      margin: 0 10px; }
  header.smaller {
    height: 75px; }
    header.smaller h1#logo {
      height: 40px;
      line-height: 40px;
      font-size: 30px; }
    header.smaller nav {
      height: 35px; }
      header.smaller nav a {
        line-height: 35px; } }
@media all and (max-width: 600px) {
  .container {
    width: 100%; }

  #info-bar a {
    display: block; }
  #info-bar span.all-tutorials,
  #info-bar span.back-to-tutorial {
    width: 100%; }
  #info-bar span.all-tutorials,
  #info-bar span.back-to-tutorial {
    float: none;
    text-align: center; }
  #info-bar span.all-tutorials {
    border-bottom: solid 1px #0793e2; } }
</style>
<script type="text/javascript">
    /*!
 * classie v1.0.0
 * class helper functions
 * from bonzo https://github.com/ded/bonzo
 * MIT license
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true, unused: true */
/*global define: false */
(function(window) {

    'use strict';

    // class helper functions from bonzo https://github.com/ded/bonzo

    function classReg(className) {
        return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
    }

    // classList support for class management
    // altho to be fair, the api sucks because it won't accept multiple classes at once
    var hasClass, addClass, removeClass;

    if ('classList' in document.documentElement) {
        hasClass = function(elem, c) {
            return elem.classList.contains(c);
        };
        addClass = function(elem, c) {
            elem.classList.add(c);
        };
        removeClass = function(elem, c) {
            elem.classList.remove(c);
        };
    } else {
        hasClass = function(elem, c) {
            return classReg(c).test(elem.className);
        };
        addClass = function(elem, c) {
            if (!hasClass(elem, c)) {
                elem.className = elem.className + ' ' + c;
            }
        };
        removeClass = function(elem, c) {
            elem.className = elem.className.replace(classReg(c), ' ');
        };
    }

    function toggleClass(elem, c) {
        var fn = hasClass(elem, c) ? removeClass : addClass;
        fn(elem, c);
    }

    var classie = {
        // full names
        hasClass: hasClass,
        addClass: addClass,
        removeClass: removeClass,
        toggleClass: toggleClass,
        // short names
        has: hasClass,
        add: addClass,
        remove: removeClass,
        toggle: toggleClass
    };

    // transport
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(classie);
    } else {
        // browser global
        window.classie = classie;
    }

})(window);
</script>
<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
