/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// var path = "http://localhost/edo/assets/img/work/logo/";



var imageGallery = {
    load: function () {
        console.log("load image gallery");
        try {
            console.log("path res : " + path);
            $.ajax({
                url: path,
                success: function (data) {
                    console.log("ajax " + data);
                    $(data).find("a").attr("href", function (i, val) {
                        if (val.match(/\.(jpe?g|png|gif)$/)) {
                            $("body").append("<img src='" + path + val + "'>");
                            console.log('match');
                        }
                    });
                }
            });
        } catch (err) {
            console.log(e);
        }
    }
}

var imageJSON = {
    load: function () {
        console.log("load image json");
        $.getJSON('../json/image.json', function (data) {
            console.log("image json");
            console.log("callback data result : " + data);
            try {
                var json = JSON.parse(data);
                console.log(json);
            } catch (e) {
                console.log("err" + e);
            }
        });
    }
}

var localLoad = {
    load: function () {
        var url = '/home/ridwanzal/NetBeansProjects/EdoWeb/public_html/myweb/json/image.json';
        console.log("local load");
        try {
            $.getJSON(url, function (data) {
                console.log("get json")
                console.log("data callback : " + data);
            });
        }
        catch (e) {
            console.log("" + e);
        }
    }
}

var imageLoad = {
    load: function (img, ulid) {
        console.log("image method");
        try {
            let i = 0;
            for (i; i < img.length; i++) {
                var li = $('<img title="' + img[i].title + '" class="galhover2 animated fadeIn" src=' + img[i].src + '>').appendTo(ulid);
            }
        }
        catch (e) {
            console.log("" + e);
        }
    },
    hide: function (ulid) {
        $(ulid).remove();
    },
}

var imageLoadCarousel = {
    load: function (img, elem) {
        console.log("image method");
        try {
            let i = 0;
            for (i; i < img.length; i++) {
                var data = $('<div class="item"><img title="' + img[i].title + '" width="150" src=' + img[i].src + '></div>').appendTo(elem);
            }
        }
        catch (e) {
            console.log("" + e);
        }
    },
    hide: function (elem) {
        $(ulid).remove();
    },
}


/* module for using animate css dynamically */
var animate_el = {
    // init element
    init: function (element, animation) {
        element = $(element);
        element.addClass('animated ' + animation);
    },
    // hover element
    hover: function (element, animation) {
        element = $(element);
        element.hover(
            function () {
                element.addClass('animated ' + animation);
            },
            function () {
                //wait for animation to finish before removing classes
                window.setTimeout(function () {
                    element.removeClass('animated ' + animation);
                }, 2000);
            });
    },
    hoverOverlay: function (elementToOverlay, classOverlay) {
        console.log("masuk sini pas hover");
        element = $(elementToOverlay);
        element.hover(function (callbackhover) {
            console.log("callback hover : " + callbackhover);
            $(this).delay(200).addClass(classOverlay);
        }).mouseleave(function () {
            $(this).removeClass(classOverlay);
        });
    },
    // click element
    click: function (element, animation) {
        element = $(element);
        element.click(function () {
            element.addClass('animated ' + animation);
            // wait for animation to finish before removing the class
            window.setTimeout(function () {
                element.removeClass('animated ' + animation);
            }, 2000);
        });
    }
}

