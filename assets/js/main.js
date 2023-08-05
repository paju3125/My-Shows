!(function($) {
    "use strict";

    $(document).ready(function() {

        $.ajax({
            url: 'getdata.php',
            type: 'post',
            data: {
                'str': 'searchlist'
            },
            success: function(data) {
                $(".searchbar .search-list").html(data);
            }
        });

        $.ajax({
            url: 'getdata.php',
            type: 'post',
            data: {
                'str': 'getsocialstate'
            },
            success: function(data) {
                if (data == "OFF") {
                    $(".social-images").css({
                        display: "none"
                    });
                }
            }
        });

        $.ajax({
            url: 'getdata.php',
            type: 'post',
            data: {
                'str': 'lmovies'
            },
            success: function(data) {
                $(".owl-lm").trigger("replace.owl.carousel", [data]);
                $(".owl-lm").trigger("refresh.owl.carousel");
            }
        });

        $.ajax({
            url: 'getdata.php',
            type: 'post',
            data: {
                'str': 'popularmovies'
            },
            success: function(data) {
                $('#popularmovies .movie-con').html(data);
            }
        });

        $.ajax({
            url: 'getdata.php',
            type: 'post',
            data: {
                'str': 'omovies'
            },
            success: function(data) {

                $('#oldmovies .movie-con').html(data);
            }
        });

        $.ajax({
            url: 'getdata.php',
            type: 'post',
            data: {
                'str': 'mainslider'
            },
            success: function(data) {
                var path = data.split(',');
                data = '';

                for (var i = 0; path.length - 1 > i; i++) {

                    data += '<div class="item">' +
                        '<li>' +
                        '<div class="banner b' + i + '" data-aos="zoom-in"></div>' +
                        '</li>' +
                        '</div>';
                }

                $(".owl-one").trigger("replace.owl.carousel", [data]);
                $(".owl-one").trigger("refresh.owl.carousel");

                for (var i = 0; path.length - 1 > i; i++) {
                    $(".main-slider .banner.b" + i).css({
                        "background": "url(assets/img/" + path[i] + ") no-repeat center",
                        "background-size": "100% 100%"
                    });

                }

            }

        });

        $.ajax({
            url: 'getdata.php',
            type: 'post',
            data: {
                'str': 'midslider'
            },
            success: function(data) {
                data = JSON.parse(data);
                var d = '';

                for (var i = 0; i < data.length; i++) {
                    d += '<div class="item">' +
                        '<li>' +
                        '<div class="banner b' + i + '">' +
                        '<div class="container">' +
                        '<div class="mid-info" data-aos="fade-left" data-aos-delay="400">' +
                        '<p>Action | Horror</p>' +
                        '<h4>Annabelle</h4>' +
                        '<button><a href="https://youtu.be/TcMBFSGVi1c" class="venobox" data-vbtype="video" data-autoplay="true"><i class="icofont-ui-play"></i></a> Watch Trailer</button>' +
                        '</div></div></div></li></div>';
                }

                $(".owl-two").trigger("replace.owl.carousel", [d]);
                $(".owl-two").trigger("refresh.owl.carousel");

                for (var i = 0; i < data.length; i++) {
                    $('.owl-two .banner.b' + i + ' h4').text(data[i].movie);
                    $('.owl-two .banner.b' + i + ' p').text(data[i].genre);
                    $('.owl-two .banner.b' + i + ' button a').attr("href", data[i].trailer);

                    $('.owl-two .banner.b' + i).css({
                        "background": "url(assets/img/" + data[i].image + ") no-repeat center",
                        "background-size": "100% 100%"
                    });
                }
            }
        });
    });

    var count = 0;

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var loc = getCookie("location");
        var user = getCookie("username");
        var mode = getCookie("mode");

        if (loc != "") {
            $(".theatres a").text(loc);
            $(".theatre").css("transform", "translateY(100%)");
            count = 1;
            $(".theatre h2").addClass("upicon");
        } else {
            $(".theatres a").text("Location");
            $(".theatre").css("transform", "translateY(0%)");
            count = 0;
            $(".theatre h2").removeClass("upicon");
        }

        if (user != "") {
            $(".nav-profile .profile").removeClass("d-none");
            $(".nav-profile button").addClass("d-none");
            $(".nav-profile .profilename, .userprofile").removeClass("d-none");
            $(".nav-profile .profilename span, .userprofile li h4").text(user);

            $.ajax({
                url: 'getdata.php',
                type: 'post',
                data: {
                    'str': 'getallcoupons'
                },
                success: function(data) {
                    if (data != "") {
                        $(".code-list ul").append(data);
                        $(".pull-codes").css({
                            visibility: "visible"
                        });
                    }
                }
            });

            $(".loginbg2 .coupon-content h1").text("heyy, " + user);
        } else {
            $(".nav-profile .profile").addClass("d-none");
            $(".nav-profile button").removeClass("d-none");
            $(".nav-profile .profilename, .userprofile").addClass("d-none");
        }

        if (mode == "light") {
            $("body, #header, section, .mobile-nav-toggle, .mobile-nav").removeClass("dark");
            $("body, #header, section, .mobile-nav-toggle, .mobile-nav").addClass("light");
        } else {
            $("body, #header, section, .mobile-nav-toggle, .mobile-nav").removeClass("light");
            $("body, #header, section, .mobile-nav-toggle, .mobile-nav").addClass("dark");
        }

    }

    $(".userprofile li span").click(function() {
        document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        window.location.href = "index.html";
    });

    $(".searchbar .searchtext").keyup(function() {
        let input = $(this).val().toLowerCase();

        if (input == "") {
            $(".searchbar .search-list li").css({
                display: "none"
            });
            return;
        }

        $(".searchbar .search-list li").each(function() {
            if ($(this).html().toLowerCase().startsWith(input)) {
                $(this).css({
                    display: "block"
                });
            } else {
                $(this).css({
                    display: "none"
                });
            }
        });
    });

    //Indroduction Slider

    window.onload = function() {
        const tl = gsap.timeline({
            defaults: {
                ease: "power1.out"
            }
        });

        tl.to(".text", {
            y: "0%",
            duration: 1,
            stagger: 0.25
        });
        tl.to(".slider", {
            y: "-100%",
            duration: 1.5,
            delay: 0.6
        });
        tl.to(".intro", {
            y: "-100%",
            duration: 1
        }, "-=1");

        checkCookie();
    }

    //For Dark / Light theme

    $(document).ready(function() {
        $(".togglemode").click(function() {
            $(".togglemode").toggleClass("d-none");

            $("body, #header, section, .mobile-nav-toggle, .mobile-nav").toggleClass("light dark");

            if ($("#header").hasClass("dark")) {
                setmodecookie("dark");
            } else {
                setmodecookie("light");
            }
        });
    });


    //Search Button
    $(document).ready(function() {
        $(".searchbtn").click(function() {
            if ($(".searchbar .searchbtn i").hasClass("icofont-close")) {
                $(".searchbar").removeClass("active");
                $(".searchbar .searchtext").val("");
                $(".searchbar .search-list li").css({
                    display: "none"
                });
            } else {
                $(".searchbar").addClass("active");
                $(".searchtext").focus();
            }
            $(".searchbar .searchbtn i").toggleClass("icofont-search-2 icofont-close");
        });
    });

    $(document).ready(function() {
        $(".nav-profile button").click(function() {
            const t1 = gsap.timeline({
                defaults: {
                    ease: "power2.out"
                }
            });

            t1.to(".loginbg", {
                x: "0%",
                duration: 0
            });
            t1.fromTo(".loginbg", {
                y: "-100%",
                opacity: "0"
            }, {
                y: "0%",
                opacity: "1",
                duration: 1
            });
            t1.fromTo(".login-box", {
                y: "50%",
                opacity: "0",
                scale: "0",
            }, {
                y: "0%",
                opacity: "1",
                scale: "1",
                duration: 0.8
            });
        });
    });

    $(document).ready(function() {
        $(".loginbg .closelogin").click(function() {
            document.forms.login.reset();
            document.forms.signup.reset();
            const t1 = gsap.timeline({
                defaults: {
                    ease: "power2.in"
                }
            });

            t1.to(".loginbg", {
                x: "100%",
                opacity: "0",
                duration: 1
            });
        });
    });

    $(document).ready(function() {
        $(".pull-codes").click(function() {
            const t2 = gsap.timeline({
                defaults: {
                    ease: "power2.in"
                }
            });

            t2.to(".loginbg2", {
                x: "0%",
                duration: 1
            });
        });

        $(".loginbg2 .close-code").click(function() {
            const t1 = gsap.timeline({
                defaults: {
                    ease: "power2.in"
                }
            });

            t1.to(".loginbg2", {
                x: "100%",
                duration: 1
            });
        });
    });

    //Show / Hide Password
    $(".toggle-password1").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $(".login input#pass");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    $(".toggle-password2").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $(".sign-up-form input#pass");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    //Locations

    $(document).ready(function() {
        $(".theatres").click(function() {
            const t1 = gsap.timeline({
                defaults: {
                    ease: "power2.out"
                }
            });

            t1.fromTo(".theatre", {
                y: "100%",
                opacity: "0",
            }, {
                y: "0%",
                opacity: "1",
                duration: 1
            });

            t1.fromTo(".theatre ul", {
                y: "-50%",
                opacity: "0",
                //scale: "0",
            }, {
                y: "0%",
                opacity: "1",
                //scale: "1",
                duration: 0.8
            });
        });
    });

    $(document).ready(function() {
        $(".theatre h2").click(function() {
            if (count > 0) {
                const t1 = gsap.timeline({
                    defaults: {
                        ease: "power2.in"
                    }
                });

                t1.to(".theatre", {
                    y: "-100%",
                    opacity: "0.5",
                    duration: 1
                });
            }
        });
    });

    $(".theatre li").click(function() {

        count = 1;
        $(".theatres a").text($(this).text());
        setlocationcookie($(this).text());

        const t1 = gsap.timeline({
            defaults: {
                ease: "power2.in"
            }
        });

        t1.to(".theatre", {
            y: "-100%",
            opacity: "0.5",
            duration: 1
        });

        setTimeout(() => {
            window.location.reload();
        }, 1100);
    });

    // Smooth scroll for the navigation menu and links with .scrollto classes
    var scrolltoOffset = $('#header').outerHeight() - 2;
    $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function(e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                e.preventDefault();

                var scrollto = target.offset().top - scrolltoOffset;

                if ($(this).attr("href") == '#header') {
                    scrollto = 0;
                }

                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu, .mobile-nav').length) {
                    $('.nav-menu .active, .mobile-nav .active').removeClass('active');
                    $(this).closest('li').addClass('active');
                }

                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                    $('.mobile-nav-overly').fadeOut();
                }
                return false;
            }
        }
    });

    // Activate smooth scroll on page load with hash links in the url
    $(document).ready(function() {
        if (window.location.hash) {
            var initial_nav = window.location.hash;
            if ($(initial_nav).length) {
                var scrollto = $(initial_nav).offset().top - scrolltoOffset;
                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');
            }
        }
    });


    // Mobile Navigation
    if ($('.nav-menu').length) {
        // var $mobile_nav = $('.nav-menu').clone().prop({
        //     class: 'mobile-nav d-xl-none'
        // });
        // $('body').append($mobile_nav);
        $('body').prepend('<button type="button" class="mobile-nav-toggle d-xl-none light" data-aos="zoom-in" data-aos-delay="700"><i class="icofont-navigation-menu"></i></button>');
        $('body').append('<div class="mobile-nav-overly"></div>');

        $(document).on('click', '.mobile-nav-toggle', function(e) {
            $('body').toggleClass('mobile-nav-active');
            $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
            $('.mobile-nav-overly').toggle();
        });

        $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
            e.preventDefault();
            $(this).next().slideToggle(300);
            $(this).parent().toggleClass('active');
        });

        $(document).click(function(e) {
            var container = $(".mobile-nav, .mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                    $('.mobile-nav-overly').fadeOut();
                }
            }
        });
    } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
        $(".mobile-nav, .mobile-nav-toggle").hide();
    }

    // Navigation active state on scroll
    var nav_sections = $('section');
    var main_nav = $('.nav-menu, #mobile-nav');

    $(window).on('scroll', function() {
        var cur_pos = $(this).scrollTop() + 200;

        nav_sections.each(function() {
            var top = $(this).offset().top,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                if (cur_pos <= bottom) {
                    main_nav.find('li').removeClass('active');
                }
                main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
            }
            if (cur_pos < 300) {
                $(".nav-menu ul:first li:first").addClass('active');
            }
        });
    });

    // Toggle .header-scrolled class to #header when page is scrolled
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#header').addClass('header-scrolled');
        } else {
            $('#header').removeClass('header-scrolled');
        }
    });

    if ($(window).scrollTop() > 100) {
        $('#header').addClass('header-scrolled');
    }

    // Back to top button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 1500, 'easeInOutExpo');
        return false;
    });

    // jQuery counterUp
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 1000
    });

    // Porfolio isotope and filter
    $(window).on('load', function() {
        var portfolioIsotope = $('.portfolio-container').isotope({
            itemSelector: '.portfolio-item'
        });

        $('#portfolio-flters li').on('click', function() {
            $("#portfolio-flters li").removeClass('filter-active');
            $(this).addClass('filter-active');

            portfolioIsotope.isotope({
                filter: $(this).data('filter')
            });
        });

        // Initiate venobox 
        $(document).ready(function() {
            $('.venobox').venobox({
                'share': false
            });

            AOS.init();
        });
    });

    $(document).ready(function() {
        $('.owl-one').owlCarousel({
            stagePadding: 280,
            loop: true,
            margin: 20,
            nav: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            // navContainer: '.main-slider .custom-nav',
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 0,
                    nav: false
                },
                480: {
                    items: 1,
                    stagePadding: 40,
                    nav: true
                },
                667: {
                    items: 1,
                    stagePadding: 0,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true
                }
            }
        });
    });

    $(document).ready(function() {
        $('.owl-two').owlCarousel({
            stagePadding: 0,
            loop: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 0
                },
                480: {
                    items: 1,
                    stagePadding: 0
                },
                667: {
                    items: 1,
                    stagePadding: 0
                },
                1000: {
                    items: 1
                }
            }
        });
    });

    $(document).ready(function() {

        $('.owl-lm').owlCarousel({
            stagePadding: 0,
            loop: false,
            rewind: true,
            margin: 10,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplaySpeed: 400,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 4
                },
                480: {
                    items: 4
                },
                667: {
                    items: 4
                },
                1000: {
                    items: 4
                }
            }
        });
    });


})(jQuery);

var otp = '';

document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
        document.querySelector("body").style.visibility = "hidden";
        document.querySelector("#preloader").style.visibility = "visible";
    } else {
        document.querySelector("#preloader").style.display = "none";
        document.querySelector("body").style.visibility = "visible";
    }
}

function getcodeboxelement(index) {
    return document.getElementById("code" + index);
}

function nextcodebox(index, event) {

    var cnt = 0;

    for (let i = 1; i < 5; i++) {
        if (document.getElementById("code" + i).value.length > 0) {
            cnt += 1;
        }
    }

    if (cnt == 4) {
        let getotp = "" + document.getElementById("code1").value + document.getElementById("code2").value + document.getElementById("code3").value + document.getElementById("code4").value;

        if (getotp == otp) {
            // alert("OTP verified");
            document.getElementById("verified").innerText = "";
            document.getElementById("verified").classList.add("spinner-border");

            setTimeout(() => {
                document.getElementById("verified").classList.remove("spinner-border");
                document.getElementById("verified").innerHTML = '<i class="icofont-check-circled" style="font-size:24px; background:none; border-radius:50%; padding: 0px;"></i>';
            }, 1000);
        } else {
            //alert("Reenter OTP !");
            let message = document.getElementById('Loginmessage');

            message.innerHTML = `<div class="alert alert-success" role="alert">
                                    <strong  mx-100>Reenter OTP !</strong>
                                </div>`;
            setTimeout(function() {
                message.innerHTML = ''
            }, 3000);

            document.getElementById("verified").innerText = "";
            document.getElementById("verified").classList.add("spinner-border");

            setTimeout(() => {
                document.getElementById("verified").classList.remove("spinner-border");
                document.getElementById("verified").innerText = 'Get OTP';
            }, 1200);
        }
    }
    if (getcodeboxelement(index).value.length === 1) {
        if (index !== 4) {

            document.getElementById("code" + (index + 1)).disabled = false;
            getcodeboxelement(index + 1).focus();
        } else {
            getcodeboxelement(index).blur();
        }
    }
}

function sendotp() {

    if (document.getElementById("verified").innerText == "Get OTP") {

        var email = document.forms["signup"]["email"].value;
        if (email == "") {
            // alert("Please enter email id");
            let message = document.getElementById('Loginmessage');

            message.innerHTML = `<div class="alert alert-success" role="alert">
                                    <strong  mx-100>Please enter email id</strong>
                                </div>`;
            setTimeout(function() {
                message.innerHTML = ''
            }, 3000);

            return;
        }
        var res = /^[a-z0-9]{5,}\@gmail\.com$/.test(email);

        if (res === true) {
            otp = "";
            var digits = '0123456789';
            for (let i = 0; i < 4; i++) {
                otp += digits[Math.floor(Math.random() * 10)];
            }
            var sub = "One Time Password (OTP) Confirmation - MY SHOWS ";
            var Body = "<p>Please use Following OTP Code: <span style='color:red; font-size: 24px;'><u><b>" + otp + "</b></u> </span> to complete your Sign Up Process in MY SHOWS</p>";

            Email.send({
                SecureToken: "fbf31702-bb7f-4a4e-9c1c-4ccf17ee777f",
                To: email,
                From: "myshows.g2@gmail.com",
                Subject: sub,
                Body: Body
            }).then(
                message => {
                    if (message == 'OK') {
                        // alert('OTP has been Send Successfully to ' + email);

                        let message = document.getElementById('Loginmessage');

                        message.innerHTML = `<div class="alert alert-success" role="alert">
                                    <strong  mx-100>OTP has been Send Successfully to ${email}</strong>
                                </div>`;
                        setTimeout(function() {
                            message.innerHTML = ''
                        }, 3000);
                    } else {
                        console.error(message);
                        //alert('There is error at sending OTP. ');
                        let message = document.getElementById('Loginmessage');

                        message.innerHTML = `<div class="alert alert-success" role="alert">
                                    <strong  mx-100>There is error at sending OTP. </strong>
                                </div>`;
                        setTimeout(function() {
                            message.innerHTML = ''
                        }, 3000);
                    }
                }
            );
        } else {
            //alert("Enter a Valid email id");

            let message = document.getElementById('Loginmessage');

            message.innerHTML = `<div class="alert alert-success" role="alert">
                                    <strong  mx-100>Enter a Valid email id</strong>
                                </div>`;
            setTimeout(function() {
                message.innerHTML = ''
            }, 3000);
        }
    }
}

function sendfeed(event) {

    event.preventDefault();
    var email = document.forms["contact"]["email"].value;
    var body = 'Feedback :<br><br><span style="color: black;text-shadow: 1px 1px 0px #dd0e61;font-size: 20px;">' + document.forms["contact"]["message"].value + '</span><br><br>';
    var uname = document.forms["contact"]["name"].value;
    var phno = document.forms["contact"]["phone"].value;

    if (phno != "") {
        body += '<span style="padding: 5px;">Contact : ' + phno + '</span>';
    }

    Email.send({
        SecureToken: "fbf31702-bb7f-4a4e-9c1c-4ccf17ee777f",
        To: "myshows.g2@gmail.com",
        From: email,
        Subject: "Feedback from " + uname,
        Body: '<!DOCTYPE html><html><body><h3 style="border: 2px solid #dd0e61;padding: 20px;width: 500px;height: auto;overflow: hidden;overflow-wrap: break-word;text-align: justify;background: linear-gradient(to right bottom, aquamarine 30%, cyan);">' + body + '</h3></body></html>'
    }).then(
        message => {
            if (message == 'OK') {
                alert("Feedback submitted successfully!");
                document.forms["contact"].reset();
            } else {
                console.error(message);
                alert('There is error at sending message. ');
            }
        }
    );
}

function sign(event) {
    event.preventDefault();

    var c1 = document.forms["signup"]["code1"].value;
    var c2 = document.forms["signup"]["code2"].value;
    var c3 = document.forms["signup"]["code3"].value;
    var c4 = document.forms["signup"]["code4"].value;

    var getotp = "" + c1 + c2 + c3 + c4;

    if (getotp != otp) {
        //alert("Invalid OTP !");
        let message = document.getElementById('Loginmessage');

        message.innerHTML = `<div class="alert alert-success" role="alert">
                                    <strong  mx-100>Invalid OTP !</strong>
                                </div>`;
        setTimeout(function() {
            message.innerHTML = ''
        }, 3000);

        return;
    } else {
        document.forms["signup"].action = "signup.php";
    }

    document.forms["signup"].submit();
}

function setlocationcookie(cvalue) {
    var d = new Date();
    d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    var cname = "location";
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function setmodecookie(cvalue) {
    var d = new Date();
    d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    var cname = "mode";
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}