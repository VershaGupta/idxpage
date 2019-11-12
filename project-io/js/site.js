



window.addEventListener ? 
window.addEventListener("load",mainFunction,false) : 
window.attachEvent && window.attachEvent("onload",mainFunction);


// ******************************************** HELPERS ***********************************************



function map(value, start1, stop1, start2, stop2){
    return start2 + (stop2 - start2) * ((value - start1) / (stop1 - start1));
}



// break down the string from RGB to HEX
function makeSureItIsHex(rgbColor) {    
    if(rgbColor==="rgba(0, 0, 0, 0)" || rgbColor === "transparent"){
        return "#ffffff";
    } else {
        rgbColor = rgbColor.replace("rgb","").replace("a","").replace(")","").replace("(","").replace(" ","").split(",");
        rgbColor = rgbToHex(rgbColor[0], rgbColor[1], rgbColor[2]);
        return rgbColor;
    }
}
    
    
// change RGB to the HEX

function rgbToHex(red, green, blue) {
    var rgb = blue | (green << 8) | (red << 16);
    return '#' + (0x1000000 + rgb).toString(16).slice(1)
}









// COLORS
const blueDark = "#0A2135";
const blueBright = "#2299DD";
const ioRed = "#EF544E";
const white = "#FFFFFF";
const black = "#000000";

var scrollPosition;
var pageLength;
var windowWidth;
var windowHeight;

var mobileMenu = false;



getWindowValues();
    
function getWindowValues() {
	if ($('.hamburger').css("display") != "none") {
        mobileMenu = true;
    } else {
        mobileMenu = false;
    }
    
    scrollPosition = $(window).scrollTop();
    pageLength = $("body").height();
    windowWidth = $(window).width();
    windowHeight = $(window).height();
}


// ******************************************** MAIN JS ***********************************************



function mainFunction(){
    
    // CONSTANTS
    const navHeight = $("nav").height();
    const thicknessOfLines = 2;
    
    
    const mobileMenuMediaQuery = 800;
    var mobileNavOpened = false;
    const hamburgerSlices = 3;
    
    var mobileNavAnimating = false;
    const animationSpeed = 300;
    

    
    
    
    
    
    

    // PLANETS *************************************************************************************
    
    var planetsHero = new Array();
    
    
    var planetsHeroPosX = new Array();
    var planetsHeroPosY = new Array();
    var planetsHeroDiam = new Array();
    var planetsHeroOpacity = new Array();
    var planetsHeroAngle = new Array();
    var planetsHeroSVGTop = new Array();
    var planetsHeroSVGHeight = new Array();
    
    planetsHeroPosX.push(-750);
    planetsHeroPosY.push(200);
    planetsHeroDiam.push(200);
    planetsHeroOpacity.push(0.2);
    planetsHeroAngle.push(45);
    if($("#home-hero").length) {
        planetsHeroSVGTop.push($("#home-hero").offset().top);
        planetsHeroSVGHeight.push($("#home-hero").height());
    }
    
    planetsHeroPosX.push(480);
    planetsHeroPosY.push(600);
    planetsHeroDiam.push(60);
    planetsHeroOpacity.push(0.6);
    planetsHeroAngle.push(-90);
    if($("#home-hero").length) {
        planetsHeroSVGTop.push($("#home-hero").offset().top);
        planetsHeroSVGHeight.push($("#home-hero").height());
    }
    
    planetsHeroPosX.push(500);
    planetsHeroPosY.push(130);
    planetsHeroDiam.push(110);
    planetsHeroOpacity.push(0.5);
    planetsHeroAngle.push(-182);
    if($("#home-hero").length) {
        planetsHeroSVGTop.push($("#home-hero").offset().top);
        planetsHeroSVGHeight.push($("#home-hero").height());
    }
    
    planetsHeroPosX.push(20);
    planetsHeroPosY.push(140);
    planetsHeroDiam.push(30);
    planetsHeroOpacity.push(0.3);
    planetsHeroAngle.push(33);
    if($("#home-hero").length) {
        planetsHeroSVGTop.push($("#home-hero").offset().top);
        planetsHeroSVGHeight.push($("#home-hero").height());
    }
    
    planetsHeroPosX.push(-230);
    planetsHeroPosY.push(340);
    planetsHeroDiam.push(48);
    planetsHeroOpacity.push(0.6);
    planetsHeroAngle.push(88);
    if($("#home-hero").length) {
        planetsHeroSVGTop.push($("#home-hero").offset().top);
        planetsHeroSVGHeight.push($("#home-hero").height());
    }
    
    planetsHeroPosX.push(-90);
    planetsHeroPosY.push(840);
    planetsHeroDiam.push(89);
    planetsHeroOpacity.push(0.2);
    planetsHeroAngle.push(-230);
    if($("#home-hero").length) {
        planetsHeroSVGTop.push($("#home-hero").offset().top);
        planetsHeroSVGHeight.push($("#home-hero").height());
    }
    
    planetsHeroPosX.push(-143);
    planetsHeroPosY.push(10);
    planetsHeroDiam.push(54);
    planetsHeroOpacity.push(0.1);
    planetsHeroAngle.push(-132);
    if($("#home-hero").length) {
        planetsHeroSVGTop.push($("#home-hero").offset().top);
        planetsHeroSVGHeight.push($("#home-hero").height());
    }
    
    planetsHeroPosX.push(89);
    planetsHeroPosY.push(700);
    planetsHeroDiam.push(104);
    planetsHeroOpacity.push(0.3);
    planetsHeroAngle.push(-109);
    if($("#home-hero").length) {
        planetsHeroSVGTop.push($("#home-hero").offset().top);
        planetsHeroSVGHeight.push($("#home-hero").height());
    }
    
    planetsHeroPosX.push(-589);
    planetsHeroPosY.push(630);
    planetsHeroDiam.push(104);
    planetsHeroOpacity.push(0.6);
    planetsHeroAngle.push(-23);
    if($("#home-hero").length) {
        planetsHeroSVGTop.push($("#home-hero").offset().top);
        planetsHeroSVGHeight.push($("#home-hero").height());
    }
    
    planetsHeroPosX.push(789);
    planetsHeroPosY.push(840);
    planetsHeroDiam.push(137);
    planetsHeroOpacity.push(0.3);
    planetsHeroAngle.push(-230);
    if($("#home-hero").length) {
        planetsHeroSVGTop.push($("#home-hero").offset().top);
        planetsHeroSVGHeight.push($("#home-hero").height());
    }
    
    
    
    
    
    
    var planetsCTA = new Array();
    
    var planetsCTAPosX = new Array();
    var planetsCTAPosY = new Array();
    var planetsCTADiam = new Array();
    var planetsCTAOpacity = new Array();
    var planetsCTAAngle = new Array();
    var planetsCTASVGTop = new Array();
    var planetsCTASVGHeight = new Array();
    
    planetsCTAPosX.push(-750);
    planetsCTAPosY.push(120);
    planetsCTADiam.push(80);
    planetsCTAOpacity.push(0.2);
    planetsCTAAngle.push(23);
    if($("#home-cta").length) {
        planetsCTASVGTop.push($("#home-cta").offset().top);
        planetsCTASVGHeight.push($("#home-cta").height());
    }
    
    planetsCTAPosX.push(625);
    planetsCTAPosY.push(250);
    planetsCTADiam.push(130);
    planetsCTAOpacity.push(0.6);
    planetsCTAAngle.push(-234);
    if($("#home-cta").length) {
        planetsCTASVGTop.push($("#home-cta").offset().top);
        planetsCTASVGHeight.push($("#home-cta").height());
    }
    
    planetsCTAPosX.push(100);
    planetsCTAPosY.push(-20);
    planetsCTADiam.push(50);
    planetsCTAOpacity.push(0.3);
    planetsCTAAngle.push(58);
    if($("#home-cta").length) {
        planetsCTASVGTop.push($("#home-cta").offset().top);
        planetsCTASVGHeight.push($("#home-cta").height());
    }
    
    planetsCTAPosX.push(-70);
    planetsCTAPosY.push(370);
    planetsCTADiam.push(60);
    planetsCTAOpacity.push(0.1);
    planetsCTAAngle.push(38);
    if($("#home-cta").length) {
        planetsCTASVGTop.push($("#home-cta").offset().top);
        planetsCTASVGHeight.push($("#home-cta").height());
    }
    
    planetsCTAPosX.push(-320);
    planetsCTAPosY.push(260);
    planetsCTADiam.push(90);
    planetsCTAOpacity.push(0.3);
    planetsCTAAngle.push(98);
    if($("#home-cta").length) {
        planetsCTASVGTop.push($("#home-cta").offset().top);
        planetsCTASVGHeight.push($("#home-cta").height());
    }
    
    
    
    
    
    
    var planetsSignUp = new Array();
    
    var planetsSignUpPosX = new Array();
    var planetsSignUpPosY = new Array();
    var planetsSignUpDiam = new Array();
    var planetsSignUpOpacity = new Array();
    var planetsSignUpAngle = new Array();
    var planetsSignUpSVGTop = new Array();
    var planetsSignUpSVGHeight = new Array();
    
    planetsSignUpPosX.push(-750);
    planetsSignUpPosY.push(240);
    planetsSignUpDiam.push(100);
    planetsSignUpOpacity.push(0.6);
    planetsSignUpAngle.push(229);
    if($("#signup-hero").length) {
        planetsSignUpSVGTop.push($("#signup-hero").offset().top);
        planetsSignUpSVGHeight.push($("#signup-hero").height());
    }
    
    planetsSignUpPosX.push(-690);
    planetsSignUpPosY.push(540);
    planetsSignUpDiam.push(60);
    planetsSignUpOpacity.push(0.3);
    planetsSignUpAngle.push(56);
    if($("#signup-hero").length) {
        planetsSignUpSVGTop.push($("#signup-hero").offset().top);
        planetsSignUpSVGHeight.push($("#signup-hero").height());
    }
    
    planetsSignUpPosX.push(430);
    planetsSignUpPosY.push(700);
    planetsSignUpDiam.push(110);
    planetsSignUpOpacity.push(0.4);
    planetsSignUpAngle.push(-34);
    if($("#signup-hero").length) {
        planetsSignUpSVGTop.push($("#signup-hero").offset().top);
        planetsSignUpSVGHeight.push($("#signup-hero").height());
    }
    
    planetsSignUpPosX.push(340);
    planetsSignUpPosY.push(100);
    planetsSignUpDiam.push(50);
    planetsSignUpOpacity.push(0.6);
    planetsSignUpAngle.push(86);
    if($("#signup-hero").length) {
        planetsSignUpSVGTop.push($("#signup-hero").offset().top);
        planetsSignUpSVGHeight.push($("#signup-hero").height());
    }
    
    planetsSignUpPosX.push(-40);
    planetsSignUpPosY.push(20);
    planetsSignUpDiam.push(60);
    planetsSignUpOpacity.push(0.1);
    planetsSignUpAngle.push(192);
    if($("#signup-hero").length) {
        planetsSignUpSVGTop.push($("#signup-hero").offset().top);
        planetsSignUpSVGHeight.push($("#signup-hero").height());
    }
    
    planetsSignUpPosX.push(-120);
    planetsSignUpPosY.push(470);
    planetsSignUpDiam.push(40);
    planetsSignUpOpacity.push(0.4);
    planetsSignUpAngle.push(-192);
    if($("#signup-hero").length) {
        planetsSignUpSVGTop.push($("#signup-hero").offset().top);
        planetsSignUpSVGHeight.push($("#signup-hero").height());
    }
    
    planetsSignUpPosX.push(20);
    planetsSignUpPosY.push(870);
    planetsSignUpDiam.push(92);
    planetsSignUpOpacity.push(0.1);
    planetsSignUpAngle.push(-2);
    if($("#signup-hero").length) {
        planetsSignUpSVGTop.push($("#signup-hero").offset().top);
        planetsSignUpSVGHeight.push($("#signup-hero").height());
    }
    
    
    
    
    
    
    


    
    
    
    
    draw();
    
    updateValues();
    
    
    
    
    
    
    
    
    
    
    
    
    // smooth scrool to anchor
    var root = $('html, body');

    $('nav a[href^="#"]').click(function() {
        var href = $.attr(this, 'href');
        
        if($(href).length) {
            root.animate({
                scrollTop: $(href).offset().top
            }, 1000, function () {
                window.location.hash = href;
            });
        } else {
            window.location = '/' + href;
        }
        return false;
    });
    
    
    
    
    
    
    
    
    function updateValues() {
        updatePlanets();
    }
    
    
    
    
    
    
    
    function updatePlanets() {
        for(i=0; i<planetsHero.length; i++) {
            planetsHero[i].updateX(windowWidth/2 + planetsHeroPosX[i]);
            planetsHero[i].updateTopOfSVG($("#home-hero").offset().top);
            planetsHero[i].updateSVGHeight($("#home-hero").height());
            
            planetsHero[i].update();
        }
        
        for(i=0; i<planetsCTA.length; i++) {
            planetsCTA[i].updateX(windowWidth/2 + planetsCTAPosX[i]);
            planetsCTA[i].updateTopOfSVG($("#home-cta").offset().top);
            planetsCTA[i].updateSVGHeight($("#home-cta").height());
            
            planetsCTA[i].update();
        }
        
        for(i=0; i<planetsSignUp.length; i++) {
            planetsSignUp[i].updateX(windowWidth/2 + planetsSignUpPosX[i]);
            planetsSignUp[i].updateTopOfSVG($("#signup-hero").offset().top);
            planetsSignUp[i].updateSVGHeight($("#signup-hero").height());
            
            planetsSignUp[i].update();
        }
    }
    
    
    
    
    
    function draw() {
        
        // HOME HERO
        var homeHeroExists = $("#home-hero").length;
        
        if (homeHeroExists) {
            var homeHeroColor = $("#home-hero").parent().css("background-color");
            homeHeroColor = makeSureItIsHex(homeHeroColor);
            var homeHero = SVG('home-hero');
            
            for(var i=0; i<planetsHeroPosX.length;i++) {
                planetsHero.push(new Planet(windowWidth/2 + planetsHeroPosX[i], planetsHeroPosY[i], planetsHeroDiam[i], planetsHeroAngle[i], thicknessOfLines, homeHero, homeHeroColor, planetsHeroOpacity[i], planetsHeroSVGTop[i], planetsHeroSVGHeight[i]));
            }
        }
        
        
        
        
        // HOME CTA
        var homeCTAExists = $("#home-cta").length;
        
        if (homeCTAExists) {
            var homeCTAColor = $("#home-cta").parent().css("background-color");
            homeCTAColor = makeSureItIsHex(homeCTAColor);
            var homeCTA = SVG('home-cta');
            
            for(var i=0; i<planetsCTAPosX.length;i++) {
                planetsCTA.push(new Planet(windowWidth/2 + planetsCTAPosX[i], planetsCTAPosY[i], planetsCTADiam[i], planetsCTAAngle[i], thicknessOfLines, homeCTA, homeCTAColor, planetsCTAOpacity[i], planetsCTASVGTop[i], planetsCTASVGHeight[i]));
            }
        }
        
        
        
        
        // SIGN UP
        var homeSignUpExists = $("#signup-hero").length;
        
        if (homeSignUpExists) {
            var homeSignUpColor = $("#signup-hero").parent().css("background-color");
            homeSignUpColor = makeSureItIsHex(homeSignUpColor);
            var homeSignUp = SVG('signup-hero');
            
            for(var i=0; i<planetsSignUpPosX.length;i++) {
                planetsSignUp.push(new Planet(windowWidth/2 + planetsSignUpPosX[i], planetsSignUpPosY[i], planetsSignUpDiam[i], planetsSignUpAngle[i], thicknessOfLines, homeSignUp, homeSignUpColor, planetsSignUpOpacity[i], planetsSignUpSVGTop[i], planetsSignUpSVGHeight[i]));
            }
        }

    }
    
    
    
    
    
    
    
    
    
    // MOBILE MENU *******************************************************************************
    
    $('.hamburger').click(function() {
        chooseCloseOrOpenMobileMenu();
    });
    
    $('.menu-overlay').click(function() {
        chooseCloseOrOpenMobileMenu();
    });
    
    $('.main-menu-items > a').click(function() {
        chooseCloseOrOpenMobileMenu();
    });
    
    
    function chooseCloseOrOpenMobileMenu() {
        if(!mobileNavAnimating && mobileMenu) {
            if(mobileNavOpened) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        }
    }
    
    
    
    
    
    function openMobileMenu() {
        mobileMenuTimeOut();
        
        menuShow();
        menuOverlayShow();
        menuHamToArrow();
        
        mobileNavOpened = true;
    }
    
    function closeMobileMenu() {
        mobileMenuTimeOut();
        
        menuHide();
        menuOverlayHide();
        menuArrowToHam();
        
        mobileNavOpened = false;
    }
    
    
    
    
    function menuHamToArrow() {
        for (var i=1; i<hamburgerSlices+1;i++) {
            $('.hamburger > span:nth-child('+i+')').removeClass("hamburgerIconTransformToArrow"+i+" hamburgerIconTransformToArrow"+i+"Reset");
            $('.hamburger > span:nth-child('+i+')').addClass("hamburgerIconTransformToArrow"+i+"");
        }
    }
    
    function menuArrowToHam() {
        for (var i=1; i<hamburgerSlices+1;i++) {
            $('.hamburger > span:nth-child('+i+')').removeClass("hamburgerIconTransformToArrow"+i+" hamburgerIconTransformToArrow"+i+"Reset");
            $('.hamburger > span:nth-child('+i+')').addClass("hamburgerIconTransformToArrow"+i+"Reset");
        }
        

    }
    
    function menuArrowToHamReset() {
        for (var i=1; i<hamburgerSlices+1;i++) {
            $('.hamburger > span:nth-child('+i+')').removeClass("hamburgerIconTransformToArrow"+i+" hamburgerIconTransformToArrow"+i+"Reset");
        }
    }
    
    
    
    
    function menuShow() {
        $(".main-menu-items").removeClass("mobileNavOpen mobileNavClose");
        $(".main-menu-items").addClass("mobileNavOpen");
    }
    
    function menuHide() {
        $(".main-menu-items").removeClass("mobileNavOpen mobileNavClose");
        $(".main-menu-items").addClass("mobileNavClose");
    }
    
    function menuReset() {
        $(".main-menu-items").removeClass("mobileNavOpen mobileNavClose");
    }
    
    
    
    
    function menuOverlayShow() {
        $(".menu-overlay").css("display","block");
        $(".menu-overlay").removeClass("menuOverlayShow menuOverlayHide");
        $(".menu-overlay").addClass("menuOverlayShow");
    }
    
    function menuOverlayHide() {
        $(".menu-overlay").removeClass("menuOverlayShow menuOverlayHide");
        $(".menu-overlay").addClass("menuOverlayHide");
        setTimeout(function(){$(".menu-overlay").css("display","none");}, animationSpeed*1.2); 
    }
    
    function menuOverlayReset() {
        $(".menu-overlay").removeClass("menuOverlayShow menuOverlayHide");
        $(".menu-overlay").css("display","none");
    }
    
    
    
    
    
    function mobileMenuTimeOut() {
        mobileNavAnimating = true;
        setTimeout(function(){mobileNavAnimating = false;}, animationSpeed*1.2);
    }
    
    
    
    
    
    
    
    // RESET *************************************************************************************
    
    function resetValues() {
        menuReset();
        menuOverlayReset();
        
        menuArrowToHamReset();
        
        mobileNavAnimating = false;
        
        mobileNavOpened = false;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    // SCROLL AND RESIZE **************************************************************************
    
	$(window).on("scroll", function(e){
        getWindowValues();
        updateValues();
        
        if(mobileNavOpened) closeMobileMenu();
	});


	$( window ).resize(function() {
	  	getWindowValues();
        updateValues();
        
        if(windowWidth > mobileMenuMediaQuery) resetValues();
	});
    
    
    
}








// PLANET OBJECT *************************************************************************************


function Planet(x, y, diameter, angle, thicknessOfLines, svgElement, backgroundColor, opacity, topOfSVG, svgHeight) {
    this.x = x;
    this.y = y;
    var startingY = y;
    this.diameter = diameter;
    this.angle = angle;
    this.thicknessOfLines = thicknessOfLines;
    this.svgElement = svgElement;
    this.backgroundColor = backgroundColor;
    this.topOfSVG = topOfSVG;
    
    var centerX = x-diameter/2;
    var centerY = y-diameter/2;
    
    var circle1;
    var circle2;
    var circle3;
    
    
    var animationTiming = diameter * 150;
    var distanceYMoves = map(opacity, 0.1, 0.6, 50, 750);
    
    
    
    
    var planet1 = svgElement.group();
    // actual big circle
    circle1 = planet1.circle(diameter).attr({
        fill: "none",
        stroke: ((backgroundColor.toLowerCase() === ioRed.toLowerCase()) ? white : ioRed),
        'stroke-width': thicknessOfLines
    });

    // negative circle
    var circle2diameter = 16.0;
    circle2 = planet1.circle(circle2diameter).attr({
        fill: backgroundColor
    });

    // move to center then to outer edge then rotate based on the center
    circle2.move(diameter/2-circle2diameter/2, diameter/2-circle2diameter/2);
    circle2.dmove(-diameter/2, 0);
    circle2.rotate(angle, diameter/2, diameter/2);
    circle2.animate(animationTiming).rotate(angle+360, diameter/2, diameter/2).loop();


    // dot
    var circle3diameter = 5.0;
    circle3 = planet1.circle(circle3diameter).attr({
        fill: blueDark
    });

    // move to center then to outer edge then rotate based on the center
    circle3.move(diameter/2-circle3diameter/2, diameter/2-circle3diameter/2);
    circle3.dmove(-diameter/2, 0);
    circle3.rotate(angle, diameter/2, diameter/2);
    circle3.animate(animationTiming).rotate(angle+360, diameter/2, diameter/2).loop();
    
    planet1.attr({
        opacity: opacity
    })

    // position planet1 where needed
    planet1.move(centerX,centerY);
    
    svgElement.add(planet1);
    
    
    this.update = function() {
        this.adjustParalax();
        
        planet1.move(centerX,centerY);
        
    }
    
    
    this.updateX = function(x) {
        this.x = x;
        centerX = x-diameter/2;
    }
    
    

    
    this.updateTopOfSVG = function(number) {
        topOfSVG = number;
    }
    
    this.updateSVGHeight = function(number) {
        svgHeight = number;
    }
    
    
    this.adjustParalax = function() {
        if(scrollPosition + windowHeight > topOfSVG && scrollPosition < topOfSVG + svgHeight) {
            var start = topOfSVG - windowHeight;
            var end = topOfSVG + svgHeight;
            
            var mapped = map(scrollPosition, start, end, distanceYMoves, 0);
            mapped = mapped - distanceYMoves/2;
            
            y = startingY+mapped;
            centerY = y-diameter/2;
        }
    }

    
    
}










 // VALIDATE FORM *****************************************************************************
    
/*function validateSignUpForm() {
    var formName = "signupForm";
    
    //var name = document.forms[formName]["name"].value.trim();
    var email = document.forms[formName]["email"].value.trim();
    var password = document.forms[formName]["password"].value;
    //var confirmpassword = document.forms[formName]["passwordconfirm"].value;
    
    //var nameReason;
    var emailReason;
    var passwordReason;
    //var passwordConfirmReason;
    
    
    //if(name == "") {
        //nameReason = "Name field cannot be empty";   
    //}
    
    
    
    
    
    if(email == "") {
        emailReason = "Email field cannot be empty";
    } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/.test(email)){
        emailReason = "Input valid email address";
    }
    
    
    
    
    
    
    if(password == "") {
        passwordReason = "Password field cannot be empty";
    } else {
        if (!/([A-Z])/.test(password)) {
            passwordReason = "Password needs to contain at least one uppercase letter";
        } else if (!/([\d])/.test(password)) {
            passwordReason = "Password needs to contain at least one digit";
        } else if (!/([\W])/.test(password)) {
            passwordReason = "Password needs to contain at least one special character";
        } else if (password.length < 8) {
            passwordReason = "Password is too short";
        }
    }
    
    
    
    
    
    //if(confirmpassword == "") {
        //passwordConfirmReason = "Confirm password field cannot be empty";
    //} else if(confirmpassword != password) {
        //passwordConfirmReason = "Passwords do not match";
    //}
               
    

    
    
    
    
    
    
    
    
    //if(nameReason == undefined && emailReason == undefined && passwordReason == undefined && passwordConfirmReason == undefined) {
    if(emailReason == undefined && passwordReason == undefined) {    
        return true;
        
    } else {
        
        /*var nameError = $("form[name='"+formName+"'] .nameError");
        
        if(nameReason != undefined) {
            nameError.text(nameReason);
            nameError.css("display", "block");
            nameError.next().css("border-color", ioRed);
        } else {
            nameError.css("display", "none");
            nameError.next().css("border-color", blueDark);
        }*//*
        
        
        
        var emailError = $("form[name='"+formName+"'] .emailError");
        
        if(emailReason != undefined) {
            emailError.text(emailReason);
            emailError.css("display", "block");
            emailError.next().css("border-color", ioRed);
        } else {
            emailError.css("display", "none");
            emailError.next().css("border-color", blueDark);
        }
        
        
        
        var passwordError = $("form[name='"+formName+"'] .passwordError");
        
        if(passwordReason != undefined) {
            passwordError.text(passwordReason);
            passwordError.css("display", "block");
            passwordError.next().css("border-color", ioRed);
        } else {
            passwordError.css("display", "none");
            passwordError.next().css("border-color", blueDark);
        }
        
        
        
        /*var passwordConfirmError = $("form[name='"+formName+"'] .passwordConfirmError");
        
        if(passwordConfirmReason != undefined) {
            passwordConfirmError.text(passwordConfirmReason);
            passwordConfirmError.css("display", "block");
            passwordConfirmError.next().css("border-color", ioRed);
        } else {
            passwordConfirmError.css("display", "none");
            passwordConfirmError.next().css("border-color", blueDark);
        }*//*
        
        return false;
    }
    
    return false;
}*/







/*function validateLoginForm() {
    var formName = "loginForm";
    
    var email = document.forms[formName]["email"].value.trim();
    var password = document.forms[formName]["password"].value;
    
    var emailReason;
    var passwordReason;
    
    
    
    
    
    if(email == "") {
        emailReason = "Email field cannot be empty";
    } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/.test(email)){
        emailReason = "Input valid email address";
    }
    
    
    
    
    
    
    if(password == "") {
        passwordReason = "Password field cannot be empty";
    }
    
    
    
    
               
    

    
    
    
    
    
    
    
    
    if(emailReason == undefined && passwordReason == undefined) {
        return true;
        
    } else {
        
        
        
        var emailError = $("form[name='"+formName+"'] .emailError");
        
        if(emailReason != undefined) {
            emailError.text(emailReason);
            emailError.css("display", "block");
            emailError.next().css("border-color", ioRed);
        } else {
            emailError.css("display", "none");
            emailError.next().css("border-color", blueDark);
        }
        
        
        
        var passwordError = $("form[name='"+formName+"'] .passwordError");
        
        if(passwordReason != undefined) {
            passwordError.text(passwordReason);
            passwordError.css("display", "block");
            passwordError.next().css("border-color", ioRed);
        } else {
            passwordError.css("display", "none");
            passwordError.next().css("border-color", blueDark);
        }
        
        
        
        return false;
    }
    
    return false;
}*/







/*function validateFinishSignUpForm() {
    var formName = "finishSignupForm";
    
    var appname = document.forms[formName]["appname"].value.trim();
    var domain = document.forms[formName]["domain"].value;
    
    var appnameReason;
    var domainReason;
    //var appnameDuplicate;
    
    
    
    //alert(appname);
    if(appname == "") {
        appnameReason = "App Name field cannot be empty";
        //appnameDuplicate = undefined;
    }
    else {
        if (!/^[a-zA-Z0-9-]{3,20}$/.test(appname)) {
            appnameReason = "App Name must be alphanumeric characters, and from 3 to 15 characters long";
        }
        /*$.ajax({
            url: '/check-appname/?appname='+appname,
            dataType: 'json',
            //contentType: 'text/html',
            //success: function(data){
            success: function(data) {
                //var reply = jsn.parse(data);
                //console.log(JSON.stringify(data));
                //console.log(data);
                //alert(data.IsSiteRegistered);
                if (data.IsSiteRegistered) {
                    appnameReason = "App Name provided already taken";
                }
            }
        });*//*
    }
    //else {

   

    //}
    
    if(domain == "") {
        domainReason = "Domain field cannot be empty";
    } else if (!/(?:[a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?\.)+[a-z0-9][a-z0-9-]{0,61}[a-z0-9]/.test(domain)){
        domainReason = "Domain is invalid";
    }
    
    //alert(appnameDuplicate)
    
    if(appnameReason == undefined && domainReason == undefined) {
        return true;
        
    } else {
        
        var appnameError = $("form[name='"+formName+"'] .appnameError");
        
        if(appnameReason != undefined) {
            appnameError.text(appnameReason);
            appnameError.css("display", "block");
            appnameError.next().css("border-color", ioRed);
        } else {
            appnameError.css("display", "none");
            appnameError.next().css("border-color", blueDark);
        }
        
        
        var domainError = $("form[name='"+formName+"'] .domainError");
        
        if(domainReason != undefined) {
            domainError.text(domainReason);
            domainError.css("display", "block");
            domainError.next().css("border-color", ioRed);
        } else {
            domainError.css("display", "none");
            domainError.next().css("border-color", blueDark);
        }

        /*var appnameDuplicateError = $("form[name='"+formName+"'] .appnameDuplicateError");

        if(appnameDuplicate != undefined) {
            appnameDuplicateError.text(appnameDuplicate);
            appnameDuplicateError.css("display", "block");
            appnameDuplicateError.next().css("border-color", ioRed);
        } else {
            appnameDuplicateError.css("display", "none");
            appnameDuplicateError.next().css("border-color", blueDark);
        }*//*
        
        
        
        return false;
    }
    
    return false;
}*/

















// MAKE NAV STICKY

;( function ( document, window, index ) {

		var nav = document.querySelector( 'nav' );



		var navHeight		= 0,
			navTop			= 0,
			documentHeight	= 0,
			windowHeight    = 0,
			scrollCurrent	= 0,
			scrollPrevious	= 0,
			scrollDelta		= 0;
    

    
		window.addEventListener( 'scroll', function() {
            
            navHeight = nav.offsetHeight;

            
			
			documentHeight	= document.body.offsetHeight;
			windowHeight	= window.innerHeight;
			scrollCurrent	= window.pageYOffset;
			scrollDelta		= scrollPrevious - scrollCurrent;
			navTop			= parseInt( window.getComputedStyle( nav ).getPropertyValue( 'top' ) ) + scrollDelta;
            
            
            // scrolled to the very top; nav sticks to the top
			if( scrollCurrent <= 0 ) {
                nav.style.top = '0px';
            } else if( scrollDelta > 0 ) { // scrolled up; nav slides in
                nav.style.top = ( navTop > 0 ? 0 : navTop ) + 'px';
            } else if( scrollDelta < 0 ) { // scrolled down
                nav.style.top = ( Math.abs( navTop ) > navHeight ? -navHeight : navTop ) + 'px';
			}

			scrollPrevious = scrollCurrent;
		});

	}( document, window, 0 ));



