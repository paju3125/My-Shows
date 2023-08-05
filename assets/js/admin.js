!(function ($) {
    "use strict";

    //For admin logout
    $(".userprofile li button").click(function () {
        window.location.href = "logout.php";
    });

    //side navigation
    $(document).ready(function () {
        $(".main-sidebar .closebtn").click(function () {
            $(".main-sidebar").removeClass("active");
            $(".services").addClass("active");
        });
    });

    $(document).ready(function () {
        $(".sideMenu").click(function () {
            $(".main-sidebar").addClass("active");
            $(".services").removeClass("active");
        });
    });

    // Main slider Delete
    $("#mainslider .mainbox .delete").click(function () {
        if ($("#mainslider .mainbox").length > 3) {
            var res = confirm("You want to delete a slider.\n Are you sure ?");

            if (res) {
                var img = ($(this).parent(".option").siblings("img").attr("src")).split('/');

                $.ajax({
                    url: 'admindata.php',
                    type: 'post',
                    data: {
                        str: 'deleteslide',
                        img: img[2]
                    },
                    success: function (data) {
                        alert(data);
                        window.location.reload();
                    }
                });
            }
        } else {
            alert("You can't delete slide. \n Atleast 3 slides are required.");
        }
    });

    // Mid slider delete
    $("#midslider .mainbox .delete").click(function () {
        if ($("#midslider .mainbox").length > 3) {
            var res = confirm("You want to delete a slider.\n Are you sure ?");

            if (res) {
                var img = ($(this).parent(".option").siblings("img").attr("src")).split('/');

                $.ajax({
                    url: 'admindata.php',
                    type: 'post',
                    data: {
                        str: 'deletemidslide',
                        img: img[2]
                    },
                    success: function (data) {
                        alert(data);
                        window.location.reload();
                    }
                });
            }
        } else {
            alert("You can't delete slide. \n Atleast 3 slides are required.");
        }
    });

    // Latest Movie delete
    $("#latestmovies .moviebox .deletemovie").click(function () {
        if ($("#latestmovies .moviebox").length > 3) {
            var res = confirm("You want to delete a Movie.\n Are you sure ?");

            if (res) {
                var name = $(this).parent(".btn").siblings("h4").html();

                $.ajax({
                    url: 'admindata.php',
                    type: 'post',
                    data: {
                        str: 'deletemovie',
                        name: name
                    },
                    success: function (data) {
                        alert(data);
                        window.location.reload();
                    }
                });
            }
        } else {
            alert("You can't delete Movies. \n Atleast 3 movies are required.");
        }
    });

    // Old Movie delete
    $("#oldmovies .moviebox .deletemovie").click(function () {
        if ($("#oldmovies .moviebox").length > 3) {
            var res = confirm("You want to delete a Movie.\n Are you sure ?");

            if (res) {
                var name = $(this).parent(".btn").siblings("h4").html();

                $.ajax({
                    url: 'admindata.php',
                    type: 'post',
                    data: {
                        str: 'deletemovie',
                        name: name
                    },
                    success: function (data) {
                        alert(data);
                        window.location.reload();
                    }
                });
            }
        } else {
            alert("You can't delete Movies. \n Atleast 3 movies are required.");
        }
    });

    // Latest Movie edit
    $("#latestmovies .moviebox .editmovie").click(function () {

        $(".sidebar-menu li a").click(function () {
            window.location.reload()
        })

        var name = $(this).parent(".btn").siblings("h4").html();

        $.ajax({
            url: 'admindata.php',
            type: 'post',
            data: {
                str: 'updatemovie',
                name: name
            },
            success: function (data) {
                $("#editmovieform").html(data);

                var allgenre = $("#editmovieform .movieform #allgenre").val().split(" | ");

                $("#editmovieform .movieform input[type=checkbox][name=genre]").each(function () {
                    for (var i = 0; i < allgenre.length; i++) {
                        if ($(this).val() == allgenre[i]) {
                            $(this).prop("checked", true);
                        }
                    }
                });

                edittimeslots("#editmovieform", name);

                $(".services").hide();
                $("#editmovieform").show();
            }
        });
    });

    // Old Movie edit
    $("#oldmovies .moviebox .editmovie").click(function () {
        
        $(".sidebar-menu li a").click(function () {
            window.location.reload()
        })

        var name = $(this).parent(".btn").siblings("h4").html();

        $.ajax({
            url: 'admindata.php',
            type: 'post',
            data: {
                str: 'updatemovie',
                name: name
            },
            success: function (data) {
                $("#editmovieform").html(data);

                var allgenre = $("#editmovieform .movieform #allgenre").val().split(" | ");

                $("#editmovieform .movieform input[type=checkbox][name=genre]").each(function () {
                    for (var i = 0; i < allgenre.length; i++) {
                        if ($(this).val() == allgenre[i]) {
                            $(this).prop("checked", true);
                        }
                    }
                });

                edittimeslots("#editmovieform", name);

                $(".services").hide();
                $("#editmovieform").show();
            }
        });
    });

    $("#addmovieform .movieform input[type=checkbox][name=genre]").click(function () {
        if ($("#addmovieform .movieform input[type=checkbox][name=genre]:checked").length == 4) {
            $("#addmovieform .movieform input[type=checkbox][name=genre]:not(:checked)").prop("disabled", true);
        } else {
            $("#addmovieform .movieform input[type=checkbox][name=genre]:not(:checked)").prop("disabled", false);
        }
    });

    //Edit Main Slider
    $(document).on('click', '#mainslider .mainbox .edit', function () {
        var imgname = ($(this).parent(".option").siblings("img").attr("src")).split('/');
        
        $("#mainslider input#str").val("editslide," + imgname[2]);
        $("#mainslider input#mainfile").trigger("click");
    });

    // Add Main Slider
    $(document).on('click', '#mainslider .maincon .addbox', function () {
        $("#mainslider input#str").val("addslide");
        $("#mainslider input#mainfile").trigger("click");
    });

    // Get Image
    function submitfile(form) {
        $(".services " + form).trigger("submit");
    }

    $(document).on('click', '#midslider .edit', function () {
        $(".editform").removeClass("active")
        $(this).parent(".option").siblings(".editform").addClass("active");
    });

    $(document).on('click', '#midslider .addbox', function () {
        $(".editform").removeClass("active");
        $("#midslider .addbox .editform").addClass("active");
    });

    $(".mainbox .editform .closeform").click(function () {
        $(".editform").removeClass("active");
    });

    $(".addbox .editform .closeform").click(function () {
        window.location.reload();
    });

    var backto = '';
    $("#latestmovies .addbox").click(function () {
        gettimeslots("#addmovieform");
        $(".services").hide();
        $("#addmovieform").show();
        $("#addmovieform #str").val("addmovie,Latest");
        backto = '#latestmovies';
    });

    $("#oldmovies .addbox").click(function () {
        if ($("#oldmovies .moviebox").length < 4) {
            gettimeslots("#addmovieform");
            $(".services").hide();
            $("#addmovieform").show();
            $("#addmovieform #str").val("addmovie,Old");
            backto = '#oldmovies';
        } else {
            alert("Can't Add more than 4 movies");
        }
    });

    function gettimeslots(sec) {
        $.ajax({
            url: 'admindata.php',
            type: 'post',
            data: {
                str: 'gettimeslots'
            },
            success: function (data) {
                data = JSON.parse(data);
                data = data.toString().split(",#,");

                for (var i = 0; i <= 2; i++) {
                    var arr = data[i].split(",");

                    arr.forEach(j => {
                        $(sec + " select#screen" + (i + 1) + " option").each(function () {
                            if ($(this).val() == j) {
                                $(this).prop("disabled", true);
                            }
                        });
                    });
                }
            }
        });
    }

    function edittimeslots(sec, name) {
        $.ajax({
            url: 'admindata.php',
            type: 'post',
            data: {
                str: 'edittimeslots,' + name
            },
            success: function (data) {
                data = JSON.parse(data);
                data = data.toString().split(",#,");

                for (var i = 0; i <= 2; i++) {
                    var arr = data[i].split(",");

                    arr.forEach(j => {
                        $(sec + " select#screen" + (i + 1) + " option").each(function () {
                            if (j.indexOf("$") != -1) {
                                // alert(j.slice(1, j.length));
                                if ($(this).val() == j.slice(1, j.length)) {
                                    $(this).prop("selected", true);
                                }
                            } else {
                                if ($(this).val() == j) {
                                    $(this).prop("disabled", true);
                                }
                            }
                        });
                    });
                }
            }
        });
    }

    $(".movieform input[type=date][name=release]").change(function () {
        // alert("hi");
        var today = new Date();
    
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth()+1).padStart(2, '0');
        var yyyy = today.getFullYear();
        var t = yyyy+"-"+mm+"-"+dd;

        if(t < $(this).val()) {
            $(".movieform select").prop("disabled", true);
            $(".movieform select option").prop("selected", false);
        }
        else {
            $(".movieform select").prop("disabled", false);
        }

        if($(".movieform input[type=date][name=expiry]").val() < $(this).val()) {
            $(".movieform input[type=date][name=expiry]").val("");
        }

        if(t < $(this).val()) {
            $(".movieform input[type=date][name=expiry]").attr("min", $(this).val());
        }
        else {
            $(".movieform input[type=date][name=expiry]").attr("min", t);
        }
    });

    $(".movieform input[type=date][name=expiry]").focus(function () {
        var today = new Date();
    
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth()+1).padStart(2, '0');
        var yyyy = today.getFullYear();
        var t = yyyy+"-"+mm+"-"+dd;

        if(t < $(".movieform input[type=date][name=release]").val()) {
            $(this).attr("min", $(".movieform input[type=date][name=release]").val());
        }
        else {
            $(this).attr("min", t);
        }
    });


    // close movie form
    $(".movieform .closeform").click(function () {
        window.location.reload();
    });

    // all genre in hidden
    $("#addmovieform input[type=checkbox][name=genre]").click(function () {
        var allgenre = new Array;

        $("#addmovieform input[type=checkbox][name=genre]:checked").each(function () {
            allgenre.push($(this).val());
        });

        allgenre = allgenre.join(" | ");
        $("#addmovieform input#allgenre").val(allgenre);
    });


    // show and hide sections and add active class to naviagtion menu 
    $(document).on('click', '.sidebar-menu li a', function (e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                //e.preventDefault();

                $(".services").hide();
                $(target).show();

                if ($(this).parents('.sidebar-menu').length) {
                    $('.sidebar-menu .active').removeClass('active');
                    $(this).closest('li').addClass('active');
                }
            }
        }
    });

    // Active class and section hide / show on page load
    $(document).ready(function () {
        if (window.location.hash) {
            var initial_nav = window.location.hash;
            if ($(initial_nav).length) {
                $(".services").hide();
                $(initial_nav).show();
            }

            $(".sidebar-menu li a").each(function () {
                if ($(this).attr("href") == initial_nav) {
                    $(this).parent("li").siblings().removeClass("active");
                    $(this).closest("li").addClass("active");
                }
            });
        } else {
            $(".services").hide();
            $("#home").show();
        }
    });

    $(window).on('load', function () {
        // Initiate venobox 
        $(document).ready(function () {
            $('.venobox').venobox({
                'share': false
            });

            AOS.init();
        });
    });

    // Apply coupon code --> advanced section

    let confirmMsg = "";
    $("#couponCode .applyToAll").on("click", function () {
        confirmMsg = "Want to apply coupon code to all users ? ";
    });

    $("#couponForm").on("submit", function (e) {

        e.preventDefault()

        if (confirm(confirmMsg)) {
            $.ajax({
                url: 'admindata.php',
                type: 'post',
                data: $("#couponForm").serialize(),
                success: function (data) {
                    let message = document.getElementById('message');

                    message.innerHTML = `<div class="alert alert-success fade show" role="alert">
                                        <strong  mx-100>`+ data + `</strong>
                                   </div>`;
                    setTimeout(function () {
                        message.innerHTML = ''
                    }, 3000);
                    $("#couponForm .user").val("")
                }
            });
        }

    });

    $(".userTable button").on("click", function () {
        let user = $(this).parent('td').siblings().first().text();
        confirmMsg = "Want to apply coupon code to " + user + " ? ";
        $("#couponForm .user").val(user)
        $("#couponForm").submit()
    });

    $(document).ready(function () {
        $.ajax({
            url: 'admindata.php',
            type: 'post',
            data: {
                str: 'getsocialdistanceform'
            },
            success: function (data) {
                $("#socialDistancing").html(data);
            }
        });
    });

})(jQuery);

document.onreadystatechange = function () {
    if (document.readyState !== "complete") {
        document.querySelector("body").style.visibility = "hidden";
        document.querySelector("#preloader").style.visibility = "visible";
    } else {
        document.querySelector("#preloader").style.display = "none";
        document.querySelector("body").style.visibility = "visible";
    }
};