// /*------------------------------------------------------
//  Author 		: M. Ridwan Zalbina
//  Project		: Portofolio Website
//  Start Date	: Dec 1, 2016
//  ------------------------------------------------------*/

$('.galhover').hover(function () {
    $(this).delay(500).addClass('overlay');
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
    // token localhost
    let local_client_id = '7bcd3b9155bd4ccc80b5aedec639a1dc';
    let local_token = '461833723.7bcd3b9.a8ad995bbf1740aaa4ce3db9b9af7c7b';
    let access_token = '461833723.1677ed0.0bb26120f15745d29d8ae94d4b3f1c6f';
    // access endpoint https://api.instagram.com/v1/self/media/recent?access_token=ACCESS_TOKEN
    // /users/self
    // https://api.instagram.com/v1/users/self/?access_token=ACCESS-TOKEN


    // let local_api_call_instagram = 'https://api.instagram.com/v1/users/self/media/recent?access_token=461833723.7bcd3b9.a8ad995bbf1740aaa4ce3db9b9af7c7b';
    let url = '';
    let userid = ''
    $.ajax({
        url: "https://api.instagram.com/v1/users/self/media/recent?access_token=461833723.7bcd3b9.a8ad995bbf1740aaa4ce3db9b9af7c7b",
        method: 'POST',
        contentType: "application/json",
        success: function (res) {
            console.log('ajax call bro');
            console.log(res);
        },
        failure: function (res) {
            console.log(res);
        }
    })

    // alert('uhh')

    let imgs = imageslist2;
    let elems = $('#append_images');
    let i = 0;
    for (i; i < imgs.length; i++) {
        var object = '<div class="item container_mag"><a href=' + imgs[i].src + '><img title="' + imgs[i].title + '" width="150" src=' + imgs[i].src + '></a></div>';
        elems.append(object);
    }
    $('.container_mag').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image'
        // other options
    });
    $('.option1').owlCarousel({
        animateIn: 'fadeIn',
        slideSpeed: 1000,
        nav: true,
        items: 4,
        loop: true,
        dots: false,
        lazyLoad: true,
        autoplay: true,
        animateOut: 'fadeOut',
        animateIn: 'flipInX',
        autoHeight: true,
        margin: 5,
        navigation: true,
        paginationSpeed: 1000,
        responsiveClass: true,
        URLhashListener: true,
    });
    $('.option2').owlCarousel({
        items: 1,
        nav: true,
        loop: true,
        autoplay: true,
    });


    $('.owl-carousel').on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY > 0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });
    $('#learnmores').on('click', function (event) {
        console.log('kamu klik ini')
        $('html, body').animate({
            scrollTop: $('.fourthsection').offset().top,
        }, 300);
    });

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

    // document ready
    let prgal = $('#preload_gallery');
    let container = $('#imageList');
    let galhover2 = $('.galhover2');
    document.getElementById('preload_gallery').style.display = "none";
    if (galhover2.length == 0) {
        document.getElementById('preload_gallery').style.display = "none";
    } else {
        document.getElementById('preload_gallery').style.display = "none";
    }

    $('#searchbar').click(function () {
        $('#searchinput').toggle(function () {
        }).animate({
            "left": "200"
        }, 80);
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


    /*------------------------------------------------------
     Tanggal
     ------------------------------------------------------*/

    var almanac = new Date();
    var year = almanac.getFullYear();
    var bulan = almanac.getMonth() + 1;
    var hari = almanac.getDay();
    var daysname = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var hariini = daysname[hari];
    $('#clock').attr('title', 'Tanggal Hari ini');
    $('#clock').append("&nbsp;&nbsp;" +
        hariini + " " + " - " + bulan + " - " + year);
    $('.searchspan').attr('title', 'Car');
    // $('#clock').attr('readonly', readonly);	
    setInterval(function () {
        $('.text_header').fadeOut(300, function () {
            var $this = $(this);
            var $text1 = "IT Consulting";
            var $text2 = "Web Development";
            var $text3 = "Graphic Design";
            var $text4 = "";
            $this.text($this.text() == $text1 ? $text2 : $this.text() == $text2 ? $text3 : $text1);
            $this.toggleClass('first second');
            $this.fadeIn(500);
        });
    }, 3500);

    $('.galhover').hover(function () {
        $(this).delay(500).addClass('overlay');
    }).mouseleave(function () {
        $(this).removeClass('overlay');
    });

    var link_cv = 'http://home/ridwanzal/myweb'
    $('.mycv').click(function () {
        window.location.href = link_cv;
    });
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

