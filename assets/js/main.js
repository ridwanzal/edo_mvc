// /*------------------------------------------------------
//  Author 		: M. Ridwan Zalbina
//  Project		: Portofolio Website
//  Start Date	: Dec 1, 2016
//  ------------------------------------------------------*/

$('.galhover').hover(function () {
    $(this).delay(100).addClass('overlay');
}).mouseleave(function () {
    $(this).removeClass('overlay');
});

var imageslist2 = [
    {
        title: 'Deskmodd Logo',
        src: 'https://edo.scafol.id/assets/img/work/logo/deskmodd.png'
    },
    {
        title: 'U Clothing',
        src: 'https://edo.scafol.id/assets/img/work/logo/uclothing.png'
    },
    {
        title: 'E Docs',
        src: 'https://edo.scafol.id/assets/img/work/logo/edocs.png'
    },
    {
        title: 'Palembang Smart City',
        src: 'https://edo.scafol.id/assets/img/work/logo/palsmart.png'
    },
    {
        title: 'Sienger',
        src: 'https://edo.scafol.id/assets/img/work/logo/sienger.png'
    },
    {
        title: 'UT',
        src: 'https://edo.scafol.id/assets/img/work/logo/ut.png'
    },
    {
        title: 'Warm',
        src: 'https://edo.scafol.id/assets/img/work/logo/warm.png'
    },
    {
        title: 'Palembang.com',
        src: 'https://edo.scafol.id/assets/img/work/logo/palembangcom.png'
    },
    {
        title: 'Learning by Doiung',
        src: 'https://edo.scafol.id/assets/img/work/logo/learn.png'
    },
    {
        title: 'Karpet Juaro',
        src: 'https://edo.scafol.id/assets/img/work/logo/karpetjuaro.png'
    },
    {
        title: 'Sanggar Kemilau',
        src: 'https://edo.scafol.id/assets/img/work/logo/kemilau.png'
    },
    {
        title: 'Quicky Uda',
        src: 'https://edo.scafol.id/assets/img/work/logo/quickyuda.png'
    },
    {
        title: 'Pisang Bantet',
        src: 'https://edo.scafol.id/assets/img/work/logo/piban.png'
    },
    {
        title: 'Comnets Logo',
        src: 'https://edo.scafol.id/assets/img/work/logo/comnets.png'
    },
    {
        title: 'Wolf',
        src: 'https://edo.scafol.id/assets/img/work/logo/1.png'
    },
    {
        title: 'Posen',
        src: 'https://edo.scafol.id/assets/img/work/logo/2.png'
    },
    {
        title: 'Epoestic',
        src: 'https://edo.scafol.id/assets/img/work/logo/3.png'
    },
    {
        title: 'Linggau Mengaji',
        src: 'https://edo.scafol.id/assets/img/work/logo/4.png'
    },
    {
        title: 'Linggau Mengaji',
        src: 'https://edo.scafol.id/assets/img/work/logo/5.png'
    },
    {
        title: 'Rodakita',
        src: 'https://edo.scafol.id/assets/img/work/logo/6.png'
    },
    {
        title: 'Iconisce',
        src: 'https://edo.scafol.id/assets/img/work/logo/7.png'
    },
    {
        title: 'dataset ilkom',
        src: 'https://edo.scafol.id/assets/img/work/logo/8.png'
    },
    {
        title: 'ARS',
        src: 'https://edo.scafol.id/assets/img/work/logo/9.png'
    },
    {
        title: 'Pulse',
        src: 'https://edo.scafol.id/assets/img/work/logo/10.png'
    },
    {
        title: 'ICTTC',
        src: 'https://edo.scafol.id/assets/img/work/logo/11.png'
    },
    {
        title: 'Empower',
        src: 'https://edo.scafol.id/assets/img/work/logo/12.png'
    },
    {
        title: '',
        src: 'https://edo.scafol.id/assets/img/work/logo/13.png'
    },
    {
        title: '',
        src: 'https://edo.scafol.id/assets/img/work/logo/14.png'
    },
]

var element = {
    attrslen: function (elemclass) {
        document.getElementsByClassName(elemclass).attributes.length;
    }
}


$(document).ready(function () {
    const observer = lozad(); // lazy loads elements with default selector as '.lozad'
    observer.observe();
    let local_client_id = '7bcd3b9155bd4ccc80b5aedec639a1dc';
    let local_token = '461833723.7bcd3b9.a8ad995bbf1740aaa4ce3db9b9af7c7b';
    let access_token = '461833723.1677ed0.0bb26120f15745d29d8ae94d4b3f1c6f';
    let url = '';
    let userid = ''
    let imgs = imageslist2;
    let elems = $('#append_images');
    let i = 0;
    const objects = document.getElementsByClassName('asyncImage');
    Array.from(objects).map((item) => {
        // Start loading image
        const img = new Image();
        img.src = item.dataset.src;
        // Once image is loaded replace the src of the HTML element
        img.onload = () => {
            item.classList.remove('asyncImage');
            return item.nodeName === 'IMG' ?
                item.src = item.dataset.src :
                item.style.backgroundImage = `url(${item.dataset.src})`;
        };
    });
    for (i; i < imgs.length; i++) {
        var object = '<div class="item container_mag animated slideInUp"><a href=' + imgs[i].src + '><img title="' + imgs[i].title + '" width="200" src=' + imgs[i].src + '></a></div>';
        elems.append(object);
        $('#preload_gallery').hide();
    }
    
    $('.option1').owlCarousel({
        slideSpeed: 90,
        nav: true,
        items: 4,
        dots: false,
        loop: true,
        lazyLoad: true,
        autoplay: true,
        animateOut: 'fadeOut',
        animateIn: 'flipInX',
        autoHeight: true,
        margin: 5,
        navigation: true,
        paginationSpeed: 800,
        responsiveClass: true,
        URLhashListener: true,
    });

    $('.option2').owlCarousel({
        slideSpeed: 100,
        items: 1,
        dots: true,
        loop: true,
        autoplay: true,
        autoHeight: true,
        margin: 5,
    });

    $('.option3').owlCarousel({
        slideSpeed: 100,
        nav: false,
        items: 1,
        dots: true,
        loop: true,
        lazyLoad: true,
        autoplay: true,
        animateOut: 'fadeOut',
        animateIn: 'flipInY',
        autoHeight: true,
        margin: 5,
        paginationSpeed: 1000,
        responsiveClass: true,
        URLhashListener: true,
    });


    let arr_img = [];
    $.ajax({
        url: "https://api.instagram.com/v1/users/self/media/recent?access_token=461833723.7bcd3b9.a8ad995bbf1740aaa4ce3db9b9af7c7b",
        method: 'GET',
        progress: function (callback) {
            console.log(callback);
        },
        success: function (res) {
            console.log('ajax call bro');
            console.log(res.data);
            let elem = $('#instacontainer');
            let i = 0;
            for (i; i < res.data.length; i++) {
                limit = 12;
                if (i < limit) {
                    let img_uri = res.data[i].images.standard_resolution.url;
                    let object = '<div class="col-lg-4 col-md-4 col-xs-6 col-sm-6 item container_mag2 animated fadeIn"><a href=' + img_uri + '><img loading="lazy" alt=' + img_uri + ' src=' + img_uri + ' style="" class="img_insta"></a></div>';
                    elem.append(object);
                    showImage();
                }
            }
            $('.preload_gallery').hide();
        },
        failure: function (res) {
            console.log(res);
        }
    });

    console.log('imagelist brohhhh')
    console.log(arr_img);
    // $('.container_mag2').magnificPopup({
    //     delegate: 'a', // child items selector, by clicking on it popup will open
    //     type: 'image'
    //     // other options
    // });

    $('.container_mag').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image'
        // other options
    });
    $('#learnmores').on('click', function (event) {
        console.log('kamu klik ini')
        $('html, body').animate({
            scrollTop: $('.fourthsection').offset().top,
        }, 1);
    });


    // document ready
    let prgal = $('.preload_gallery');
    let container = $('#imageList');
    let galhover2 = $('.galhover2');
    $('#searchbar').click(function () {
        $('#searchinput').toggle(function () {
        }).animate({
            "left": "200"
        }, 10);
        $('#searchinput').focus(function () {
        }).onchange(function () {
            $('#searchbar').hide();
            var inputhasvalue = $('#searchinput').val();
            var inputlength = inputhasvalue.length;
            if (inputhasvalue == "") {
                console.log(inputlength);
            } else if (inputhasvalue != "" || inputlength > 0) {
                console.log(inputlength);
            }
        });
    });
    $('#seachinput').css({
        "overflow-x": "hidden",
        "width": "100px",
        "text-overflow": "ellipsis"
    });
    setInterval(function () {
        $('.text_header').fadeOut(100, function () {
            var $this = $(this);
            var $text1 = "Web Development";
            var $text2 = "Graphic Design";
            var $text3 = "UI/UX Design";
            var $text4 = "Android App Dev";
            $this.text($this.text() == $text1 ? $text2 : $this.text() == $text2 ? $text3 : $this.text() == $text3 ? $text4 : $text1);
            $this.toggleClass('first second');
            $this.fadeIn(600);
        });
    }, 1);

    $('.galhover').hover(function () {
        $(this).delay(50).addClass('overlay'); 12
    }).mouseleave(function () {
        $(this).removeClass('overlay');
    });

    // var link_cv = 'http://home/ridwanzal/myweb'
    // $('.mycv').click(function () {
    //     window.location.href = link_cv;
    // });
    var link_ld = 'https://id.linkedin.com/in/mridwanzalbina';
    $('.linkedin').click(function () {
        window.open(link_ld, '_blank');
    });

    onclick_menu();

    var mdnarr = ["91", "92"];
    var mdn = "91";
    uniqueMDN(mdnarr, mdn);
    var v = "085X0250000054014021000001081294254855";
    format(v);
    var name = "M RIDWAN";
    toLowercase(name);
    var trimname = "                    ronda";
    trimStr(trimname);
    var name = "M. Ridwan Zalbina";
    subStr(name, 4, 10);

    var duplicatesArray = [12, 23, 3, 11, 14];
    try {
        var ulid = $('#imageList');
        imageLoad.load(imageslist2, ulid);
    } catch (error) {
        console.log("err : " + error);
    }
});

var almanac = new Date();
function days(hari) {
    var get_hari = almanac.getDay();
    var nama_hari = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday",
        "Friday"
    ];
    var hari = nama_hari[get_hari];
    return hari;
    console.log(hari);
}

function months(hari) {
    var get_bulan = almanac.getMonth();
    var nama_bulan = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July",
        "August", "Sept", "Okt", "Nov", "Dec"
    ];
    var bulan = nama_bulan[get_bulan];
    return bulan;
    console.log(bulan);
}

function year(year) {
    var get_year = almanac.getFullYear();
    return get_year;
    console.log(get_year);
}

function onclick_menu() {
    $('.menu').click(function () {
        $('this').css({
            'color': '#fff'
        });
        console.log("onclick menu");
    });
}

function showImage() {
    $('.container_mag2').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image'
        // other options
    });
}
