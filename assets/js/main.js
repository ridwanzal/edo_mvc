// /*------------------------------------------------------
//  Author 		: M. Ridwan Zalbina
//  Project		: Portofolio Website
//  Start Date	: Dec 1, 2016
//  ------------------------------------------------------*/
//  var globalRes = {
//   log: "[Logger] ",
//   error: "[Error] ",
//   info: "[Info] "
// };

// var element = {
//   attrslen: function (elemclass) {
//       document.getElementsByClassName(elemclass).attributes.length;
//   }
// }

// function loadtest() {
//   console.log("load test");
//   $.post({
//       url: 'test.txt',
//       type: 'GET',
//       success: function (callback) {
//           try {
//               console.log("test file result" + callback);
//           } catch (e) {
//               console.log(e)
//           }
//       }
//   })
// }

// function loadImage() {
//   console.log("loadimage");
//   var path = "/home/ridwanzal/NetBeansProjects/EdoWeb/public_html/myweb/img/gallery/";
//   $.ajax({
//       url: path,
//       success: function (data) {
//           console.log("ajax " + data);
//           $(data).find("a").attr("href", function (i, val) {
//               if (val.match(/\.(jpe?g|png|gif)$/)) {
//                   $("body").append("<img src='" + path + val + "'>");
//                   console.log('match');
//               }
//           });
//       }
//   });
// }

// $(document).ready(function () {
//   // document ready
//   $('#searchbar').click(function () {
//       $('#searchinput').toggle(function () {
//       }).animate({
//           "left": "200"
//       }, 80);
//       $('#searchinput').focus(function () {
//       }).onchange(function () {
//           $('#searchbar').hide();
//           var inputhasvalue = $('#searchinput').val();
//           var inputlength = inputhasvalue.length;
//           if (inputhasvalue == "") {
//               console.log(inputlength);
//           } else if (inputhasvalue != "" || inputlength > 0) {
//               console.log(inputlength);
//           }
//       });
//   });
//   $('#seachinput').css({
//       "overflow-x": "hidden",
//       "width": "100px",
//       "text-overflow": "ellipsis"
//   });


//   /*------------------------------------------------------
//    Tanggal
//    ------------------------------------------------------*/

//   var almanac = new Date();
//   var year = almanac.getFullYear();
//   var bulan = getMonth(almanac.getMonth() + 1);
//   var hari = almanac.getDay();
//   var daysname = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
//   var hariini = daysname[hari];
//   $('#clock').attr('title', 'Tanggal Hari ini');
//   $('#clock').append("&nbsp;&nbsp;" +
//           hariini + " " + " - " + bulan + " - " + year);
//   $('.searchspan').attr('title', 'Car');
//   // $('#clock').attr('readonly', readonly);	
//   setInterval(function () {
//       $('.text_header').fadeOut(500, function () {
//           var $this = $(this);
//           var $text1 = "Product Branding !";
//           var $text2 = "Bring Idea to Live !";
//           var $text3 = "Go Promote !";
//           var $text4 = "";
//           $this.text($this.text() == $text1 ? $text2 : $this.text()== $text2 ? $text3 : $text1);
//           $this.toggleClass('first second');
//           $this.fadeIn(500);
//       });
//   }, 3500);
  $('.galhover').hover(function () {
      $(this).delay(500).addClass('overlay');
  }).mouseleave(function () {
      $(this).removeClass('overlay');
  });

//   function myMap() {
//       console.log("Masuk map nih");
//       var mapCanvas = document.getElementById("map");
//       var mapOptions = {
//           center: new google.maps.LatLng(51.5, -0.2),
//           zoom: 10
//       }
//       var map = new google.maps.Map(mapCanvas, mapOptions);
//   }
//   var link_cv = 'http://home/ridwanzal/myweb'
//   $('.mycv').click(function () {
//       window.location.href = link_cv;
//   });
//   var link_ld = 'https://id.linkedin.com/in/mridwanzalbina';
//   $('.linkedin').click(function () {
//       window.open(link_ld, '_blank');
//   });

//   /*------------------------------------------------------
//    Pencarian Statis
//    ------------------------------------------------------*/

//   // daftar cari dalam bentuk array
//   var daftar_cari = ["Edo website", "Website edo", "Blog edo",
//       "Web Programming", "Web Design", "Web Development",
//       "Functional Programming", "Pemrograman OOP",
//       "Sekilas tentang JAVASCSRIPT", "Penggunaan CMS",
//       "Membangun framework sendiri", "Development purposes",
//       "Javascript in depth", "Pengenalan linux", "Linux scripting",
//       "Linux shell programming", "Data visualization with JS"
//   ];

//   // autocomplete anonymouse function
//   $(function () {
//       $('#searchinput').autocomplete({
//           source: daftar_cari,
//           width: 80,
//           height: 30,
//           max: 20,
//           scroll: true
//       });
//   });

//   /*------------------------------------------------------
//    Pencarian Statis
//    ------------------------------------------------------*/

//   $('#learnmore').on('click', function (event) {
//       event.preventDefault();
//       $('html,body').animate({
//       }, 500);
//   });

//   onclick_menu();

//   // var mdnarr = ["91", "92"];
//   // var mdn = "91";
//   // uniqueMDN(mdnarr, mdn);
//   // var v = "085X0250000054014021000001081294254855";
//   // format(v);
//   // var name = "M RIDWAN";
//   // toLowercase(name);
//   // var trimname = "                    ronda";
//   // trimStr(trimname);
//   // var name = "M. Ridwan Zalbina";
//   // subStr(name, 4, 10);

//   var duplicatesArray = [12, 23, 3, 11, 14];
//   //    var uniqueArray = duplicatesArray.filter(function (elem, pos) {
//   //        console.log(pos);
//   //        return duplicatesArray.indexOf(elem) == pos;
//   //    });
//   //
//   //    uniqueHelperMDN(duplicatesArray);
//   //    var x = 12
//   //    uniqueHelperMDNT(duplicatesArray, x);
//   loadImage();
//   loadtest();
//   // imageGallery.load();
//   // imageJSON.load();try {
//   //     var ulid  = $('#imageList');
//   //     imageLoad.load(imageslist, ulid);
//   // } catch (error) {
//   //     console.log("err : " + error);
//   // }
//   // localLoad.load();
//   // try {
//   //     var ulid  = $('#imageList');
//   //     imageLoad.load(imageslist, ulid);
//   // } catch (error) {
//   //     console.log("err : " + error);
//   // }

//   /* set year*/
//   let date_full = new Date();
//   let get_year = date_full.getFullYear();
//   $('#printyear').html(get_year);
// });

// /*------------------------------------------------------
// Functions Declaration
// ------------------------------------------------------*/


// var almanac = new Date();
// function days(hari) {
//   var get_hari = almanac.getDay();
//   var nama_hari = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday",
//       "Friday"
//   ];
//   var hari = nama_hari[get_hari];
//   return hari;
//   console.log(hari);
// }

// function getMonth(p_bulan){
//   var nama_bulan = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July",
//   "August", "Sept", "Okt", "Nov", "Dec"
//   ];

//   var bulan = nama_bulan[p_bulan];
//   return bulan;
// }

// /*------------------------------------------------------
// Portofolio Design
// ------------------------------------------------------*/

// function onclick_menu() {
//   $('.menu').click(function () {
//       $('this').css({
//           'color': '#fff'
//       });
//       console.log("onclick menu");
//   });
// }



/*------------------------------------------------------
 Author 	: M. Ridwan Zalbina
 Project	: Portofolio Website
 Start Date	: Dec 1, 2016
 ------------------------------------------------------*/

//  var imageslist2 = [
//     'https://edo.scafol.id/assets/img/work/logo/deskmodd.png',
//     'https://edo.scafol.id/assets/img/work/logo/uclothing.png',
//     'https://edo.scafol.id/assets/img/work/logo/edocs.png',
//     'https://edo.scafol.id/assets/img/work/logo/palsmart.png',
//     'https://edo.scafol.id/assets/img/work/logo/sienger.png',
//     'https://edo.scafol.id/assets/img/work/logo/ut.png',
//     'https://edo.scafol.id/assets/img/work/logo/warm.png',
//     'https://edo.scafol.id/assets/img/work/logo/palembangcom.png',
//     'https://edo.scafol.id/assets/img/work/logo/learn.png',
//     'https://edo.scafol.id/assets/img/work/logo/karpetjuaro.png',
//     'https://edo.scafol.id/assets/img/work/logo/kemilau.png',
//     'https://edo.scafol.id/assets/img/work/logo/quickyuda.png',
//     'https://edo.scafol.id/assets/img/work/logo/piban.png',
//     'https://edo.scafol.id/assets/img/work/logo/comnets.png',
//     'https://edo.scafol.id/assets/img/work/logo/1.png',
//     'https://edo.scafol.id/assets/img/work/logo/2.png',
//     'https://edo.scafol.id/assets/img/work/logo/3.png',
//     'https://edo.scafol.id/assets/img/work/logo/4.png',
//     'https://edo.scafol.id/assets/img/work/logo/5.png',
//     'https://edo.scafol.id/assets/img/work/logo/6.png',
//     'https://edo.scafol.id/assets/img/work/logo/7.png',
//     'https://edo.scafol.id/assets/img/work/logo/8.png',
//     'https://edo.scafol.id/assets/img/work/logo/9.png',
//     'https://edo.scafol.id/assets/img/work/logo/10.png',
//     'https://edo.scafol.id/assets/img/work/logo/11.png',
//     'https://edo.scafol.id/assets/img/work/logo/12.png',
//     'https://edo.scafol.id/assets/img/work/logo/13.png',
//     'https://edo.scafol.id/assets/img/work/logo/14.png',
//   ];

 var imageslist2 = [
     {
         title : 'Deskmodd Logo',
         src : 'https://edo.scafol.id/assets/img/work/logo/deskmodd.png'
     },
     {
         title : 'U Clothing',
         src : 'https://edo.scafol.id/assets/img/work/logo/uclothing.png'
     },
     {
         title : 'E Docs',
         src : 'https://edo.scafol.id/assets/img/work/logo/edocs.png'
     },
     {
         title : 'Palembang Smart City',
         src : 'https://edo.scafol.id/assets/img/work/logo/palsmart.png'
     },
     {
         title : 'Sienger',
         src : 'https://edo.scafol.id/assets/img/work/logo/sienger.png'
     },
     {
         title : 'UT',
         src : 'https://edo.scafol.id/assets/img/work/logo/ut.png'
     },
     {
         title : 'Warm',
         src : 'https://edo.scafol.id/assets/img/work/logo/warm.png'
     },
     {
         title : 'Palembang.com',
         src : 'https://edo.scafol.id/assets/img/work/logo/palembangcom.png'
     },
     {
         title : 'Learning by Doiung',
         src : 'https://edo.scafol.id/assets/img/work/logo/learn.png'
     },
     {
         title : 'Karpet Juaro',
         src : 'https://edo.scafol.id/assets/img/work/logo/karpetjuaro.png'
     },
     {
         title : 'Sanggar Kemilau',
         src : 'https://edo.scafol.id/assets/img/work/logo/kemilau.png'
     },
     {
         title : 'Quicky Uda',
         src : 'https://edo.scafol.id/assets/img/work/logo/quickyuda.png'
     },
     {
         title : 'Pisang Bantet',
         src : 'https://edo.scafol.id/assets/img/work/logo/piban.png'
     },
     {
         title : 'Comnets Logo',
         src : 'https://edo.scafol.id/assets/img/work/logo/comnets.png'
     },
     {
         title : 'Wolf',
         src : 'https://edo.scafol.id/assets/img/work/logo/1.png'
     },
     {
         title : 'Posen',
         src : 'https://edo.scafol.id/assets/img/work/logo/2.png'
     },
     {
         title : 'Epoestic',
         src : 'https://edo.scafol.id/assets/img/work/logo/3.png'
     },
     {
         title : 'Linggau Mengaji',
         src : 'https://edo.scafol.id/assets/img/work/logo/4.png'
     },
     {
         title : 'Linggau Mengaji',
         src : 'https://edo.scafol.id/assets/img/work/logo/5.png'
     },
     {
         title : 'Rodakita',
         src : 'https://edo.scafol.id/assets/img/work/logo/6.png'
     },
     {
         title : 'Iconisce',
         src : 'https://edo.scafol.id/assets/img/work/logo/7.png'
     },
     {
         title : 'dataset ilkom',
         src : 'https://edo.scafol.id/assets/img/work/logo/8.png'
     },
     {
         title : 'ARS',
         src : 'https://edo.scafol.id/assets/img/work/logo/9.png'
     },
     {
         title : 'Pulse',
         src : 'https://edo.scafol.id/assets/img/work/logo/10.png'
     },
     {
         title : 'ICTTC',
         src : 'https://edo.scafol.id/assets/img/work/logo/11.png'
     },
     {
         title : 'Empower',
         src : 'https://edo.scafol.id/assets/img/work/logo/12.png'
     },
     {
         title : '',
         src : 'https://edo.scafol.id/assets/img/work/logo/13.png'
     },
     {
         title : '',
         src : 'https://edo.scafol.id/assets/img/work/logo/14.png'
     },
 ]

 var element = {
    attrslen: function (elemclass) {
        document.getElementsByClassName(elemclass).attributes.length;
    }
}

function loadtest() {
    console.log("load test");
    $.post({
        url: 'test.txt',
        type: 'GET',
        success: function (callback) {
            try {
                console.log("test file result" + callback);
            } catch (e) {
                console.log(e)
            }
        }
    })
}

function loadImage() {
    console.log("loadimage");
    // var path = "/home/ridwanzal/NetBeansProjects/EdoWeb/public_html/myweb/img/gallery/";
    // var path = "../../assets/img/work/logo/";
    // var path = "https://edo.scafol.id/assets/img/work/logo";
    $.ajax({
        url: path,
        success: function (data) {
            // alert(data);
            console.log("ajax " + data);
            $(data).find("a").attr("href", function (i, val) {
                if (val.match(/\.(jpe?g|png|gif)$/)) {
                    $("body").append("<img src='" + path + val + "'>");
                    console.log('match');
                }
            });
        }
    });
}

$(document).ready(function () {

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
    if(galhover2.length == 0){
         document.getElementById('preload_gallery').style.display = "none";
    }else{
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
            $this.text($this.text() == $text1 ? $text2 : $this.text()== $text2 ? $text3 : $text1);
            $this.toggleClass('first second');
            $this.fadeIn(500);
        });
    }, 3500);

    $('.galhover').hover(function () {
        $(this).delay(500).addClass('overlay');
    }).mouseleave(function () {
        $(this).removeClass('overlay');
    });

    // animate_el.hoverOverlay(idToOverlay, classOverlay);

    function myMap() {
        console.log("Masuk map nih");
        var mapCanvas = document.getElementById("map");
        var mapOptions = {
            center: new google.maps.LatLng(51.5, -0.2),
            zoom: 10
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);
    }
    var link_cv = 'http://home/ridwanzal/myweb'
    $('.mycv').click(function () {
        window.location.href = link_cv;
    });
    var link_ld = 'https://id.linkedin.com/in/mridwanzalbina';
    $('.linkedin').click(function () {
        window.open(link_ld, '_blank');
    });

    /*------------------------------------------------------
     Pencarian Statis
     ------------------------------------------------------*/

    // daftar cari dalam bentuk array
    var daftar_cari = ["Edo website", "Website edo", "Blog edo",
        "Web Programming", "Web Design", "Web Development",
        "Functional Programming", "Pemrograman OOP",
        "Sekilas tentang JAVASCSRIPT", "Penggunaan CMS",
        "Membangun framework sendiri", "Development purposes",
        "Javascript in depth", "Pengenalan linux", "Linux scripting",
        "Linux shell programming", "Data visualization with JS"
    ];

    // autocomplete anonymouse function
    $(function () {
        $('#searchinput').autocomplete({
            source: daftar_cari,
            width: 80,
            height: 30,
            max: 20,
            scroll: true
        });
    });

    /*------------------------------------------------------
     Pencarian Statis
     ------------------------------------------------------*/

    $('#learnmore').on('click', function (event) {
        event.preventDefault();
        $('html, body').animate({
        }, 100);
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
    //    var uniqueArray = duplicatesArray.filter(function (elem, pos) {
    //        console.log(pos);
    //        return duplicatesArray.indexOf(elem) == pos;
    //    });
    //
    //    uniqueHelperMDN(duplicatesArray);
    //    var x = 12
    //    uniqueHelperMDNT(duplicatesArray, x);
    // loadImage();
    // loadtest();
    // imageGallery.load();
    // imageJSON.load();
    // localLoad.load();
    try {
        var ulid  = $('#imageList');
        imageLoad.load(imageslist2, ulid);
        // animate the element of the icon
        // animate_el.hoverOverlay(idToOverlay, classOverlay);
    } catch (error) {
        console.log("err : " + error);
    }
});

/*------------------------------------------------------
 Functions Declaration
 ------------------------------------------------------*/

// $(function al() {
// 	alert("I call you man");
// })

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

/*------------------------------------------------------
 Portofolio Design
 ------------------------------------------------------*/

function onclick_menu() {
    $('.menu').click(function () {
        $('this').css({
            'color': '#fff'
        });
        console.log("onclick menu");
    });
}

