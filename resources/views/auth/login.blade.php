<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!------ Include the above in your HEAD tag ---------->



<!DOCTYPE html><html class=''>
<head>



<script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
<script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>
<script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'>
    
</script><meta charset='UTF-8'><meta name="robots" content="noindex">
<link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
<link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
<link rel="canonical" href="https://codepen.io/dpinnick/pen/LjdLmo?limit=all&page=21&q=service" />

<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<style class="cp-pen-styles">@import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300);



* {
    margin: 0;
    padding: 0;
}
html {
  box-sizing: border-box;
}
*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: inherit;
}
a {
    color: #666;
    text-decoration: none;
}
a:hover {
    color: #4FDA8C;
}

/* BODY */
body {
    position: relative;
    color: #666;
    font: 16px/26px "Raleway", sans-serif;
    text-align: center;
    height: 100%;
    background: -moz-linear-gradient(270deg, rgb(27, 45, 71) 0%, rgb(78, 196, 113) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(27, 45, 71)), color-stop(100%, rgba(78, 196, 113)));
    background: -webkit-linear-gradient(270deg, rgba(27, 45, 71) 0%, rgba(78, 196, 113) 100%);
    background: linear-gradient(180deg, rgba(27, 45, 71) 0%, rgba(78, 196, 113) 100%);
    overflow:hidden;
}

/* BUTTON */
a.button {
    position: absolute;
    left: 20px;
    top: 20px;
    height: auto;
    padding: .8rem 1.0rem;
    font-size: .8rem;
    line-height: normal;
    text-transform: uppercase;
    font-family: 'Proxima Nova', sans-serif;
    font-weight: 700;
    letter-spacing: 0;
    border-radius: 0;
    border: 1px solid #2D515C;
    text-decoration: none;
    color: #fff;
    background-color: transparent;
    -webkit-transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
}
a.button:hover {
    border-color: #2D515C;
    color: #fff;
    padding: 1.0rem 3.2rem;
}
@media only screen and (min-width: 22em) {
    a.button {
        padding: 1.0rem 2.8rem;
        font-size: 1.0rem;
    }
}

/* LOGIN */
.login {
    margin: 0;
    width: 100%;
    height: 100%;
    min-height: 100vh;
}

/* WRAP */
.wrap {
    position: static;
    margin: auto;
    width: 100%;
    height: auto;
    overflow: hidden;
}
.wrap:after {
  content: "";
  display: table;
  clear: both;
}

/* LOGO */
.logo {
    position: absolute;
    z-index: 2;
    top: 0;
    left: 0;
    width: 40px;
    height: 40px;
    background: #4FDA8C;
}
.logo img {
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 30px;
}
.logo a {
    width: 100%;
    height: 100%;
    display: block;
}

/* USER (FORM WRAPPER) */
.user {
    position: relative;
    z-index: 0;
    float: none;
    margin: 0 auto;
    padding-top: 40px;
    width: 100%;
    height: 100vh;
    overflow: auto;
    background: -moz-linear-gradient(48deg, rgba(42,46,54,1) 0%, rgb(255, 255, 255) 100%);
    background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(42,46,54,1)), color-stop(100%, rgba(97,107,125,1)));
    background: -webkit-linear-gradient(48deg, rgba(42,46,54,1) 0%, rgb(255, 255, 255) 100%);
    background: linear-gradient(42deg, rgba(42,46,54,1) 0%, rgba(97,107,125,1) 100%);
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-radius: 0;
    border-top: 1px solid #4FC1B7;
}
.user .actions {
    margin: 1em 0 0;
    padding-right: 10px;
    width: 100%;
    display: block;
    text-align: center;
}
.user .actions a {
    margin: 1em 0;
    width: 90px;
    display: inline-block;
    padding: .2em 0em;
    background-color: #0059ff;
    border: none;
    color: rgb(226, 226, 226);
    cursor: pointer;
    text-align: center;
    font-size: .8em;
    border-radius: 30px 0 0 30px;
    -webkit-box-shadow: 0px 0px 27px -9px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 27px -9px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 27px -9px rgba(0,0,0,0.75);
}
.user .actions a:last-child {
    color: #fff;
    border-radius: 0 30px 30px 0;
    background-color: #28A55F;
    background: -moz-linear-gradient(270deg, rgb(221, 119, 105) 0%, rgb(193, 95, 78) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(105, 221, 120)), color-stop(100%, rgba(78,193,182,1)));
    background: -webkit-linear-gradient(270deg, rgba(105, 221, 120) 0%, rgba(78,193,182,1) 100%);
    background: linear-gradient(180deg, rgba(105, 221, 120) 0%, rgba(78,193,182,1) 100%);
}

/* TERMS */
@keyframes show_terms {
    0% {
        opacity: 0;
        -webkit-transform: translateY(-110%);
        -moz-transform: translateY(-110%);
        -o-transform: translateY(-110%);
        transform: translateY(-110%);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        -moz-transform: translateY(0);
        -o-transform: translateY(0);
        transform: translateY(0);
    }
}
@keyframes hide_terms {
    0% {
        -webkit-transform: translateY(0);
        -moz-transform: translateY(0);
        -o-transform: translateY(0);
        transform: translateY(0);
        opacity: 1;
    }
    100% {
        -webkit-transform: translateY(-110%);
        -moz-transform: translateY(-110%);
        -o-transform: translateY(-110%);
        transform: translateY(-110%);
        opacity: 0;
    }
}
.terms, .recovery {
    position: absolute;
    z-index: 3;
    margin: 40px 0 0;
    padding: 1.5em 1em;
    width: 100%;
    height: calc(100% - 40px);
    border-radius: 0;
    background: #fff;
    text-align: left;
    overflow: auto;
    will-change: transform;
    -webkit-transform: translateY(-110%);
    -moz-transform: translateY(-110%);
    -o-transform: translateY(-110%);
    transform: translateY(-110%);
    opacity: 0;
    border-radius: 0;
}
.terms.open, .recovery.open {
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -o-transform: translateY(0);
    transform: translateY(0);
    animation: show_terms .5s .2s 1 ease normal forwards;
}
.terms.closed, .recovery.closed {
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -o-transform: translateY(0);
    transform: translateY(0);
    opacity: 1;
    animation: hide_terms .6s .2s 1 ease normal forwards;
}
.terms p, .recovery p {
    margin: 1em 0;
    font-size: .9em;

}
.terms h3, .recovery h3 {
    margin: 2em 0 .2em;
}
.terms p.small {
    margin: 0 0 1.5em;
    font-size: .8em;
}

.recovery form .input {
    margin: 0 0 .8em 0;
    padding: .8em 2em 10px 0;
    width: 100%;
    display: inline-block;
    background: transparent;
    border: 0;
    border-bottom: 1px solid #5A6374;
    outline: 0;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    color: inherit;
    font-family: inherit;
    color: rgb(221, 221, 221);
}
.recovery form .button {
    margin: 1em 0;
    padding: .2em 3em;
    width: auto;
    display: block;
    background-color: #28A55F;
    border: none;
    color: rgb(255, 255, 255);
    cursor: pointer;
    font-size: .8em;
    border-radius: 0px;
    background: rgb(62, 181, 112) 0%;
}
.form-wrap form .button:hover {
    background-color: #4FDA8C;
}
.recovery p.mssg {
    opacity: 0;
    -webkit-transition: opacity 1s .5s ease;
    -moz-transition: opacity 1s .5s ease;
    -o-transition: opacity 1s .5s ease;
    transition: opacity 1s .5s ease;
}
.recovery p.mssg.animate {
    opacity: 1;
}

/* CONTENT */
.content {
    position: fixed;
    z-index: 1;
    float: none;
    margin: 0 auto;
    width: 100%;
    height: 40px;
    background: -moz-linear-gradient(90deg, rgb(62, 181, 102) 0%, rgba(111,226,204,1) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(111,226,204,1)), color-stop(100%, rgba(62,181,169,1)));
    background: -webkit-linear-gradient(90deg, rgba(62,181,169,1) 0%, rgba(111,226,204,1) 100%);
    background: linear-gradient(0deg, rgba(62,181,169,1) 0%, rgba(111,226,204,1) 100%);
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    overflow: hidden;
}

/* TOGGLE */
#toggle-wrap {
    position: absolute;
    z-index: 4;
    top: 40px;
    right: 17px;
    width: 80px;
    height: 1px;
}
#toggle-terms span {
  background: #fff;
  border-radius: 0;
}
/* TOGGLE TERMS */
#toggle-terms {
    position: absolute;
    z-index: 4;
    right: 0;
    top: 0;
    width: 40px;
    height: 40px;
    margin: auto;
    display: block;
    cursor: pointer;
    background: rgba(0, 0, 0, 0.1);
    border-radius: 100%;
    opacity: 0;
    -webkit-transform: translate(-6px, 20px);
    -moz-transform: translate(-6px, 20px);
    -o-transform: translate(-6px, 20px);
    transform: translate(-6px, 20px);
}
/* CIRCLE EFFECT */
#toggle-terms:after {
    position: absolute;
	width: 100%;
	height: 100%;
	pointer-events: none;
	border-radius: 50%;
	content: '';
	-webkit-box-sizing: content-box;
	-moz-box-sizing: content-box;
	box-sizing: content-box;
}
#toggle-terms:before {
	speak: none;
	display: block;
	-webkit-font-smoothing: antialiased;
}
#toggle-terms {
	box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.2);
    -webkit-transition: color 0.3s ease;
    -moz-transition: color 0.3s ease;
    -o-transition: color 0.3s ease;
    transition: color 0.3s ease;
}
#toggle-terms:after {
	top: 0px;
	left: 0px;
	padding: 0;
	z-index: -1;
	background: rgba(0, 0, 0, 0.2);
    -webkit-transition: -webkit-transform 0.2s, opacity 0.3s;
    -moz-transition: -moz-transform 0.2s, opacity 0.3s;
    -o-transition: -o-transform 0.2s, opacity 0.3s;
    transition: transform 0.2s, opacity 0.3s;
}
#toggle-terms.closed {
	color: rgba(0, 0, 0, 0.2);
}
#toggle-terms.closed:after {
	-webkit-transform: scale(1.6);
	-moz-transform: scale(1.6);
	-ms-transform: scale(1.6);
	transform: scale(1.6);
	opacity: 0;
}

/* CLOSE ANIMATION*/
@keyframes show_close {
    0% {
        opacity: 0;
        -webkit-transform: translate(-6px, -100px);
        -moz-transform: translate(-6px, -100px);
        -o-transform: translate(-6px, -100px);
        transform: translate(-6px, -100px);
    }
    100% {
        opacity: 1;
        -webkit-transform: translate(-6px, 20px);
        -moz-transform: translate(-6px, 20px);
        -o-transform: translate(-6px, 20px);
        transform: translate(-6px, 20px);
    }
}
@keyframes hide_close {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}
#toggle-terms.open {
    animation: show_close .4s .5s 1 ease normal forwards;
}
#toggle-terms.closed {
    animation: hide_close .2s .0s 1 ease normal forwards;
}
#toggle-terms:hover {
    background: rgba(0, 0, 0, 0.4);
}

/* TOGGLE TERMS CROSS */
#toggle-terms #cross {
    position: absolute;
    z-index: 4;
    height: 100%;
    width: 100%;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
}
#toggle-terms.open #cross {
    -webkit-transition-delay: .9s;
    -moz-transition-delay: .9s;
    -o-transition-delay: .9s;
    transition-delay: .9s;
    -webkit-transition-duration: .2s;
    -moz-transition-duration: .2s;
    -o-transition-duration: .2s;
    transition-duration: .2s;
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
}
#toggle-terms.open #cross span {
    position: absolute;
    z-index: 4;
    -webkit-transition-delay: 0s;
    -moz-transition-delay: 0s;
    -o-transition-delay: 0s;
    transition-delay: 0s;
    -webkit-transition-duration: 0s;
    -moz-transition-duration: 0s;
    -o-transition-duration: 0s;
    transition-duration: 0s;
}
#toggle-terms.open #cross span:nth-child(1) {
    top: 15%;
    left: 19px;
    height: 70%;
    width: 1px;
}
#toggle-terms.open #cross span:nth-child(2) {
    left: 15%;
    top: 19px;
    width: 70%;
    height: 1px;
}
#toggle-terms #cross span:nth-child(1) {
    height: 0;
    -webkit-transition-delay: .625s;
    -moz-transition-delay: .625s;
    -o-transition-delay: .625s;
    transition-delay: .625s;
}
#toggle-terms #cross span:nth-child(2) {
    width: 0;
    -webkit-transition-delay: .375s;
    -moz-transition-delay: .375s;
    -o-transition-delay: .375s;
    transition-delay: .375s;
}

/* SLIDESHOW */
#slideshow {
    position: relative;
    margin: 0 auto;
    width: 100%;
    height: 100%;
    padding: 10px;
    border-radius: 10px 0 0 10px;
}
#slideshow h2 {
    margin: .0em auto .0em auto;
    text-align: center;
    font-size: 1.4em;
    color: #fff;
    line-height: .5em;
}
#slideshow p {
  color: #fff;
  display: none;
}
#slideshow div {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 1em 3em;
    background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
#slideshow .one {
    background-image: url("https://i.postimg.cc/3wTWw9Mm/login1.png");
    background-repeat: no-repeat;
    background-position: 0% 50%;
}
#slideshow .two {
    background-image: url("https://i.postimg.cc/1zs5St6K/login2.png");
    background-repeat: no-repeat;
    background-position: 0% 50%;
}
#slideshow .three {
    background-image: url("https://i.postimg.cc/h46DjMTv/login3.png");
    background-repeat: no-repeat;
    background-position: 0% 5%;
}
#slideshow .four {
    background-image: url("https://i.postimg.cc/436PK8Yg/login4.png");
    background-repeat: no-repeat;
    background-position: 0% -30%;
}

/* FORM ELEMENTS */
input {
    font: 16px/26px "Raleway", sans-serif;
}
.form-wrap {
    width: 100%;
    margin: 2em auto 0;
}
.form-wrap a {
    color: rgb(238, 238, 238);
    padding-bottom: 4px;
    border-bottom: 1px solid #5FD1C1;
}
.form-wrap a:hover {
    color: #fff;
}
.form-wrap .tabs {
    overflow: hidden;
}
.form-wrap .tabs * {
    -webkit-transition: .25s ease-in-out;
    -moz-transition: .25s ease-in-out;
    -o-transition: .25s ease-in-out;
    transition: .25s ease-in-out;
}


.form-wrap .tabs h3 {
    float: left;
    width: 50%;
}
.form-wrap .tabs h3 a {
    padding: 0.5em 0;
    text-align: center;
    font-weight: 400;
    display: block;
    color: rgb(240, 240, 240);
    border: 0;
 }
.form-wrap .tabs h3 a.active {
    color: #ccc;
}
.form-wrap .tabs h3 a.active span {
    padding-bottom: 4px;
    border-bottom: 1px solid #5FD1C1;
}
.form-wrap .tabs-content {
    padding: 1.5em 3em;
    text-align: left;
    width: auto;
}
.help-action {
    padding: .4em 0 0;
    font-size: .93em;
}
.form-wrap .tabs-content div[id$="tab-content"] {
    display: none;
}
.form-wrap .tabs-content .active {
    display: block !important;
}
.form-wrap form .input {
    margin: 0 0 .8em 0;
    padding: .8em 2em 10px 0;
    width: 100%;
    display: inline-block;
    background: transparent;
    border: 0;
    border-bottom: 1px solid #e0e0e0;
    outline: 0;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    color: inherit;
    font-family: inherit;
    color: #fff;
}
.form-wrap form .button {
    margin: 1em 0;
    padding: .2em 3em;
    width: auto;
    display: block;
    background-color: #28A55F;
    border: none;
    color: #fff;
    cursor: pointer;
    font-size: .8em;
    border-radius: 30px;
    background: -moz-linear-gradient(270deg, rgba(105,221,201,1) 0%, rgba(78,193,182,1) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(105,221,201,1)), color-stop(100%, rgba(78,193,182,1)));
    background: -webkit-linear-gradient(270deg, rgba(105,221,201,1) 0%, rgba(78,193,182,1) 100%);
    background: linear-gradient(180deg, rgba(105,221,201,1) 0%, rgba(78,193,182,1) 100%);
    -webkit-box-shadow: 0px 0px 37px -9px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 37px -9px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 37px -9px rgba(0,0,0,0.75);
}
.form-wrap form .button:hover {
    background-color: #4FDA8C;
}
.form-wrap form .checkbox {
    margin: 1em 0;
    padding: 20px;
    visibility: hidden;
    text-align: left;
}
.form-wrap form .checkbox:checked + label:after {
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    filter: alpha(opacity=100);
    opacity: 1;
}
.form-wrap form label[for] {
    position: relative;
    padding-left: 20px;
    cursor: pointer;
}
.form-wrap form label[for]:before {
    position: absolute;
    width: 17px;
    height: 17px;
    top: 0px;
    left: -14px;
    content: '';
    border: 1px solid #5A6374;
}
.form-wrap form label[for]:after {
    position: absolute;
    top: 1px;
    left: -10px;
    width: 15px;
    height: 8px;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
    opacity: 0;
    content: '';
    background-color: transparent;
    border: solid #67DAC6;
    border-width: 0 0 3px 3px;
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    transform: rotate(-45deg);
}
.form-wrap .help-text {
    margin-top: .6em;
}
.form-wrap .help-text p {
    text-align: left;
    font-size: 14px;
}
.fa {
    display: none;
}
/* MEDIUM VIEWPORT */
@media only screen and (min-width: 40em) {
    /* GLOBAL TRANSITION */
    * {
      /*transition: .25s ease-in-out;*/
    }
    /* WRAP */
    .wrap {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 600px;
        height: 500px;
        margin: auto;
        border-radius: 10px;
    }
    /* LOGO */
    .logo {
        top: 10px;
        left: 10px;
        width: 40px;
        height: 40px;
        background: none;
    }
    .logo img {
        width: 100%;
    }
    @keyframes show_close {
        0% {
            opacity: 0;
            -webkit-transform: translate(-6px, -100px);
            -moz-transform: translate(-6px, -100px);
            -o-transform: translate(-6px, -100px);
            transform: translate(-6px, -100px);
        }
        100% {
            opacity: 1;
            -webkit-transform: translate(-6px, 18px);
            -moz-transform: translate(-6px, 18px);
            -o-transform: translate(-6px, 18px);
            transform: translate(-6px, 18px);
        }
    }
    /* TOGGLE WRAP */
    #toggle-wrap {
        top: 60px;
        right: calc(50% + 17px);
        height: 80px;
        overflow: hidden;
    }
    #toggle-wrap.closed {
        width: 50%;
    }
    /* TOGGLE TERMS */
    #toggle-terms {
        opacity: 1;
        -webkit-transform: translate(-6px, -100px);
        -moz-transform: translate(-6px, -100px);
        -o-transform: translate(-6px, -100px);
        transform: translate(-6px, -100px);
    }
    #toggle-terms.closed {
        opacity: 1;
        -webkit-transform: translate(-6px, 18px);
        -moz-transform: translate(-6px, 18px);
        -o-transform: translate(-6px, 18px);
        transform: translate(-6px, 18px);
    }

    /* SLIDESHOW */
    #slideshow h2 {
        margin: 4.5em 0 1em;
        font-size: 2em;
    }
    #slideshow h2 span {
        padding: 5px 0;
        border: solid #56a169;
        border-width: 1px 0;
    }
    #slideshow p {
        display: block;
    }
    #slideshow div {
        -webkit-background-size: auto;
        -moz-background-size: auto;
        -o-background-size: auto;
        background-size: auto;
    }
    #slideshow .one {
        background-position: 50% 130%;
    }
    #slideshow .two {
        background-position: 50% 200%;
    }
    #slideshow .three {
        background-position: 50% 300%;
    }
    #slideshow .four {
        background-position: -40% 80%;
    }

    /* CONTENT */
    .content, .content.full {
        position: relative;
        float: left;
        width: 50%;
        height: 500px;
        -webkit-box-shadow: -3px 0px 45px -6px rgba(5, 103, 223, 0.986);
        -moz-box-shadow: -3px 0px 45px -6px rgba(56,75,99,0.61);
        box-shadow: -3px 0px 45px -6px rgba(56,75,99,0.61);
        border-radius: 10px 0 0 10px;
    }
    /* TERMS */
    .terms, .recovery {
        position: absolute;
        width: 50%;
        height: 440px;
        float: left;
        margin: 60px 0 0;
        -webkit-box-shadow: -3px 0px 45px -6px rgba(56,75,99,0.61);
        -moz-box-shadow: -3px 0px 45px -6px rgba(56,75,99,0.61);
        box-shadow: -3px 0px 45px -6px rgba(56,75,99,0.61);
        border-radius: 0 0 0 10px;
    }
    /* USER (FORM WRAPPER) */
    .user {
        padding-top: 0;
        float: left;
        width: 50%;
        height: 500px;
        -webkit-box-shadow: -3px 0px 45px -6px rgba(0, 112, 250, 0.61);
        -moz-box-shadow: -3px 0px 45px -6px rgba(0, 115, 255, 0.61);
        box-shadow: -3px 0px 45px -6px rgba(0, 115, 255, 0.61);
        border-radius: 0 10px 10px 0;
        border: 0;
    }
    .user .actions {
        margin: 0;
        text-align: right;
    }
    /* FORM ELEMENTS */
    .form-wrap {
        margin: 3em auto 0;
    }
    .form-wrap .tabs-content {
        padding: 1.5em 2.5em;
    }
    .tabs-content p {
        position: relative;
    }
    /* ARROW */
    .tabs-content .fa {
        position: absolute;
        top: 8px;
        left: -16px;
        display: block;
        font-size: .8em;
        color: #fff;
        opacity: .3;
        -webkit-transform: translate(0, 0);
        -moz-transform: translate(0, 0);
        -o-transform: translate(0, 0);
        transform: translate(0, 0);
        -webkit-transition: transform .3s .3s ease, opacity .6s .0s ease;
        -moz-transition: transform .3s .3s ease, opacity .6s .0s ease;
        -o-transition: transform .3s .3s ease, opacity .6s .0s ease;
        transition: transform .3s .3s ease, opacity .6s .0s ease;
    }
    .tabs-content .fa.active {
        -webkit-transform: translate(-3px, 0);
        -moz-transform: translate(-3px, 0);
        -o-transform: translate(-3px, 0);
        transform: translate(-3px, 0);
        opacity: .8;
    }
    .tabs-content .fa.inactive {
        -webkit-transform: translate(0, 0);
        -moz-transform: translate(0, 0);
        -o-transform: translate(0, 0);
        transform: translate(0, 0);
        opacity: .3;
    }
}
/* LARGE VIEWPORT */
@media only screen and (min-width: 60em) {
    /* WRAP */
    .wrap {
        width: 900px;
        height: 550px;
    }
    /* CONTENT */
    .content, .content.full {
        height: 550px;
    }
    .terms, .recovery {
        height: 490px;
    }
    /* SLIDESHOW */
    #slideshow h2 {
        margin: 4em 0 1em;
        font-size: 3em;
    }
    #slideshow .four {
        background-position: -82% -330%;
    }
    /* USER (FORM WRAPPER) */
    .user {
        height: 550px;
    }
    .form-wrap {
        margin: 5em auto 0;
    }
    .form-wrap .tabs-content {
        padding: 1.5em 4.9em;
    }
}


/* CSS */
.element {
  opacity: 0.0;
  transform: scale(0.95) translate3d(0,100%,0);
  transition: transform 400ms ease, opacity 400ms ease;
}
.element.active {
  opacity: 1.0;
  transform: scale(1.0) translate3d(0,0,0);
}
.element.inactive {
  opacity: 0.0;
  transform: scale(1) translate3d(0,0,0);
}


</style>
<link href="{{ asset('css/appw.css') }}" rel="stylesheet">
<link href="{{ asset('css/dropdown.css') }}" rel="stylesheet">
<script src="{{ asset('js/dropdown.js') }}" defer></script>

</head>


<body>

    <div id="app">
    <nav class="navbar navbar-expand-md  ">
        <div class="container">
        
                <img id="" class="nav-logo" src="{{ asset('storage').'/luzmaya.png' }}" width="120" alt="">
          
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"> 



                    

                      <div class="nav-item dropdown">
                        <button onclick="myFunction()" class="dropbtn nav-link dropdown-toggle">Cholq'ij</button>
                        <div id="myDropdown" class="dropdown-content">
                          <a href="{{ route('cholqij') }}">Cholq'ij</a>
                          <a href="{{ route('cholqij.hoy') }}">Hoy</a>
                          
                        </div>
                      </div>
                      

{{-- 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Cholq'ij
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('cholqij') }}">Cholq'ij</a>
                        <a class="dropdown-item" href="{{ route('cholqij.hoy') }}">Hoy</a>
                        
                       
                          
                        </div>
                      </li> --}}


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('nawales.ver') }}">{{ __('Nawales') }}</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ajqijab.index') }}">{{ __('Ajq\'ijab') }}</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Aprender
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('sopa') }}">Sopa de letras Maya</a>
                          <a class="dropdown-item" href="{{ route('preguntas.index') }}">Juego de Preguntas</a>
                          <a class="dropdown-item" href="{{ route('orden.index') }}">Nombre de los Nawales</a>
                          
                        </div>
                      </li> --}}
                      


 

                      <div class="nav-item dropdown2">
                        <button onclick="dro()" class="dropbtn2 nav-link dropdown-toggle">Aprender</button>
                        <div id="myDropdown2" class="dropdown2-content">
                          <a href="{{ route('sopa') }}">Sopa de letras Maya</a>
                          <a href="{{ route('preguntas.index') }}">Juego de Preguntas</a>
                          <a href="{{ route('orden.index') }}">Nombre de los Nawales</a>
                          
                        </div>
                      </div>





                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Acerca de
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="{{ route('preguntas.index') }}">Documentación</a>
                          <a class="dropdown-item" href="{{ route('orden.index') }}">Este proyecto</a>
                          <a class="dropdown-item" href="#">Personas</a>
                        </div>
                      </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                  
                    <li class="nav-item">
                           
                        </li>
                        
                        @if (Route::has('register'))
                            <li class="nav-item">
                             
                            </li>
                            
                        @endif
                    @else
                    
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                <a class="dropdown-item" href="{{ route('perfil.index') }}">
                                 {{ __('Perfil') }}
                             </a>

                                <a class="dropdown-item" href="{{ route('home') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>


{{-- <link href="{{ asset('css/login.css') }}" rel="stylesheet"> --}}
        <!-- LOGIN MODULE -->
        <div class="login">
            <div class="wrap">
                <!-- TOGGLE -->
                <div id="toggle-wrap">
                    <div id="toggle-terms">
                        <div id="cross">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <!-- TERMS -->
                <div class="terms">
                    <h2>Terminos y condiciones</h2>
                    <p class="small">Última modificación : Octubre 02, 2021</p>
                    <h2>Bienvenido a LuzMaya</h2>
                    <p>Por favor leer estos terminos y condiciones antes de crear una cuenta en esta pagina ya que al crear tu cuenta aceptas todos los terminos y condiciones.</p>
                    <h2>Introducción</h2>
                    <p>Esta página web es propiedad y está operado por LuzMaya Inc.; Aquí se establecen los términos y condiciones bajo los cuales puedes usar nuestra página web y servicios ofrecidos. Esta página web ofrece a los visitantes la posibilidad de acercarce un poco más a los sistemas ancestrales mayas y contactar con un guia espiritual mucho más facil, tener acceso a tu propia agenda virtul donde el usuario podrá poner en práctica el uso del calendario sagrado lunar Cholq'ij. Al acceder o usar la página web de nuestro servicio, usted aprueba que haya leído, entendido y aceptado estar sujeto a estos Términos:.</p>
                    <h3>¿Quién puede usar nuestra página web y los requisitos para crear una cuenta?</h3>
                    <p>Para usar nuestro página web y / o recibir nuestros servicios, debes tener al menos [agregar número] años de edad, o la mayoría de edad legal en tu jurisdicción, y poseer la autoridad legal, el derecho y la libertad para participar en estos Términos como un acuerdo vinculante. No tienes permitido utilizar esta página web y / o recibir servicios si hacerlo está prohibido en tu país o en virtud de cualquier ley o regulación aplicable a tu caso.</p>
                    <h3>Terminos comerciales de nuestro servicio</h3>
                    <p> Los precios que cobramos por usar nuestros servicios se enumeran en  la página web. Nos reservamos el derecho de cambiar nuestros precios para los productos que se muestran en cualquier momento y de corregir los errores de precios que pueden ocurrir inadvertidamente. Información adicional sobre precios e impuestos sobre las ventas está disponible en la página de pagos. 
                    
                    "La tarifa por los servicios y cualquier otro cargo que pueda incurrir en relación con tu uso del servicio, como los impuestos y las posibles tarifas de transacción, se cobrarán mensualmente a tu método de pago.
                    </p>
                    <h3>Retención del derecho a cambiar de oferta</h3>
                    <p>Podemos, sin aviso previo, cambiar los servicios; dejar de proporcionar los servicios o cualquier característica de los servicios que ofrecemos; o crear límites para los servicios. Podemos  suspender de manera permanente o temporal el acceso a los servicios sin previo aviso ni responsabilidad por cualquier motivo, o sin ningún motivo.</p>
                    <h3>Posesión de propiedad intelectual, derechos de autor y logos.</h3>
                    <p>El Servicio y todos los materiales incluidos o transferidos, incluyendo, sin limitación, software, imágenes, texto, gráficos, logotipos, patentes, marcas registradas, marcas de servicio, derechos de autor, fotografías, audio, videos, música y todos los Derechos de Propiedad Intelectual relacionados con ellos, son la propiedad exclusiva de Luz Maya Inc. Salvo que se indique explícitamente en este documento, no se considerará que nada en estos Términos crea una licencia en o bajo ninguno de dichos Derechos de Propiedad Intelectual, y tu aceptas no vender, licenciar, alquilar, modificar, distribuir, copiar, reproducir, transmitir, exhibir públicamente, realizar públicamente, publicar, adaptar, editar o crear trabajos derivados de los mismos.</p>
                    <h3>Derecho a suspender o cancelar la cuenta de usuario</h3>
                    <p>Podemos terminar o suspender de manera permanente o temporal tu acceso al servicio sin previo aviso y responsabilidad por cualquier razón, incluso si a nuestra sola determinación tu violas alguna disposición de estos Términos o cualquier ley o regulación aplicable. Puedes descontinuar el uso y solicitar cancelar tu cuenta y / o cualquier servicio en cualquier momento. Sin perjuicio de lo contrario en lo que antecede, con respecto a las suscripciones renovadas automáticamente a los servicios pagados, dichas suscripciones se suspenderán solo al vencimiento del período correspondiente por el que ya has realizado el pago.</p>
                    <h3>Derecho a cambiar y modificar los Términos</h3>
                    <p>Nos reservamos el derecho de modificar estos términos de vez en cuando a nuestra entera discreción. Por lo tanto, debes revisar estas páginas periódicamente. Cuando cambiemos los Términos de una manera material, te notificaremos que se han realizado cambios importantes en los Términos. El uso continuado de la página web o nuestro servicio después de dicho cambio constituye tu aceptación de los nuevos Términos. Si no aceptas alguno de estos términos o cualquier versión futura de los Términos, no uses o  accedas (o continúes accediendo) a la página web o al servicio.</p>
                    <h3>Emails de promociones y contenido</h3>
                    <p>Acepta recibir de vez en cuando nuestros mensajes y materiales de promoción, por correo postal, correo electrónico o cualquier otro formulario de contacto que nos proporciones (incluido tu número de teléfono para llamadas o mensajes de texto). Si no deseas recibir dichos materiales o avisos de promociones, simplemente avísanos en cualquier momento.</p>
                    <h3>Preferencia de ley y resolución de disputas</h3>
                    <p>Estos Términos, los derechos y recursos provistos aquí, y todos y cada uno de los reclamos y disputas relacionados con este y / o los servicios, se regirán, interpretarán y aplicarán en todos los aspectos única y exclusivamente de conformidad con las leyes sustantivas internas de la Republica de Guatemala, sin respeto a sus principios de conflicto de leyes. Todos los reclamos y disputas se presentarán y usted acepta que sean decididos exclusivamente por un tribunal de jurisdicción competente ubicada en la Ciudad de capital de Guatemala. La aplicación de la Convención de Contratos de las Naciones Unidas para la Venta Internacional de Bienes queda expresamente excluida.</p>
                    
                    <p>For information about how to contact dp, please visit our contact page.</p>     </div>

                <!-- RECOVERY -->
                {{-- <div class="recovery">
                    <h2>Password Recovery</h2>
                    <p>Enter either the <strong>email address</strong> or <strong>username</strong> on the account and <strong>click Submit</strong></p>
                    <p>We'll email instructions on how to reset your password.</p>
                    <form class="recovery-form" action="" method="post">
                        <form class="recovery-form" method="POST" action="{{ route('login') }}">
                            @csrf
    
                        <input type="text" class="input" id="user_recover" placeholder="Ingrese su Correo Electr">
                        <input type="submit" class="button" value="Submit">
                    </form>
                    <p class="mssg">An email has been sent to you with further instructions.</p>
                </div> --}}

                <!-- SLIDER -->
                <div class="content">
                    <!-- LOGO -->
                    <div class="logo">
                        <a href="#">            <img id="" class="" src="{{ asset('storage').'/luzmayalogo.png' }}"  alt="">
                        </a>
                    </div>
                    <!-- SLIDESHOW -->
                    <div id="slideshow">
                        <div class="one">
                            <h2><span>CHOLQ'IJ</span></h2>
                            <p>El calendario sagrado maya se basa en los 9 ciclos lunares los cuales completan 260 días que es el tiempo en el que una persona nace. desde su concepcion hasta su alumbramiento.</p>
                        </div>
                        <div class="two">
                            <h2><span>CÓDICE</span></h2>
                            <p>El Códice Madrid es un libro adivinatorio, pues mediante los diferentes almanaques se daban a conocer los augurios relacionados con las diversas cargas del calendario sagrado de 260 días.</p>
                        </div>
                        <div class="three">
                            <h2><span>Cultura Maya</span></h2>
                            <p>La cultura maya fue una de las principales civilizaciones que se desarrolló en la antigua Mesoamérica. Cultura muy destacada por sus elaborados sistemas.</p>
                        </div>
                        <div class="four">
                            <h2><span>Cargador</span></h2>
                            <p>Cada año se rige por cuatro únicos cargadores, E, Iq', Kej y Noj. Estos ciclos tienen un significado particular dentro del pensamiento ancestral indígena.</p>
                        </div>
                    </div>
                </div>
                <!-- LOGIN FORM -->
                <div class="user">
                    <!-- ACTIONS
                    <div class="actions">
                        <a class="help" href="#signup-tab-content">Sign Up</a><a class="faq" href="#login-tab-content">Login</a>
                    </div>
                    -->
                    <div class="form-wrap">
                        <!-- TABS -->
                    	<div class="tabs">
                            <h3 class="login-tab"><a class="log-in active" href="#login-tab-content"><span>Iniciar Sesión<span></a></h3>
                    		<h3 class="signup-tab"><a class="sign-up" href="#signup-tab-content"><span>Registrarse</span></a></h3>
                    	</div>
                        <!-- TABS CONTENT -->
                    	<div class="tabs-content">
                            <!-- TABS CONTENT LOGIN -->
                    		<div id="login-tab-content" class="active">
                    	



                                    <form class="login-form" method="POST" action="{{ route('login') }}">
                                        @csrf
                
                                    
                                                <input placeholder="Correo Electrónico" id="email  user_login" type="email" class=" input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                                <input placeholder="Contraseña" id="password user_pass" type="password" class="input  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror


                    			
                    				{{-- <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password"> --}}
                    				<input type="checkbox" class="checkbox" checked id="remember_me">
                    				<label for="remember_me">Recuerdame</label>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Iniciar Sesión') }}
                                    </button>
    
                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidó su contraseña?') }}
                                        </a>
                                    @endif --}}
                    			</form>
                                {{-- @if (Route::has('password.request')) --}}
                    			<div class="help-action">
                    				<p><i class="fa fa-arrow-left" aria-hidden="true"></i><a class="forgotd" href="{{ route('password.request') }}">¿Olvidó su contraseña?</a></p>
                    			</div>
                                  {{-- @endif --}}
                    		</div>
                            <!-- TABS CONTENT SIGNUP -->
                    		<div id="signup-tab-content">
                                <form class="signup-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf
                    		

                                    <input placeholder="Nombre completo" id="name" type="text" class="input  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                    				
                    			    <input placeholder="Correo Electrónico" id="email" type="email" class="input  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror






                                <input placeholder="Contraseña" id="password" type="password" class="input  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <input placeholder="Confirma tu contraseña" id="password-confirm" type="password" class="input " name="password_confirmation" required autocomplete="new-password">



                                <input   class="input form-control" type="file" name="foto" id="foto">

                    			  <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar Cuenta') }}
                                </button>

                    			</form>
                    			<div class="help-action">
                    				<p>By signing up, you agree to our</p>
                    				<p><i class="fa fa-arrow-left" aria-hidden="true"></i><a class="agree" href="#">Terms of service</a></p>
                    			</div>
                    		</div>
                    	</div>
                	</div>
                </div>
            </div>
        </div>

<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="{{ asset('js/login.js') }}"></script>

</body></html>












































{{-- 


<div class="container">
    <div class="use" style="color:#0e0e0e";>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inicio de Sesión') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar Sesión') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidó su contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection  --}}
