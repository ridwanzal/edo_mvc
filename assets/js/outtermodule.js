
var printLiterals = function () {
    var address = "Tebet - Jakarta Selatan"
    ,
            company = "PT. easySoft Indonesia",
            print = `Welcome to ${company} $
    {address}`;
            console.log(print);
}

var printComLiterals = function () {
    var address = "Tebet - Jakarta Selatan",
            company = "PT. easySoft Indonesia",
            print = "Selamat datang di " + company + " " + address + "";
    console.log(print);
}

var checkNum = function (num) {
    var res;
    res = num < 10 ? "less than 10" : "more than 10";
    return res;
}

var checknumChain = function (num) {
    var res;
    res = num > 0 && num < 10 ? "1 to 9 " : num > 10 && num < 20 ? "11 to 19" : "not between 2 condition";
    return res;
}

var uniquenames = function (arr) {
    var valvar = [];
    for (var i = 0; i < arr.length; i++) {
        var mdn = arr[i];
        if (valvar.indexOf(mdn) !== -1) {
            return true;
        }
        valvar.push(mdn);
    }
}

// 085X025000005401402100001081294254855
function format(pValue) {
    var sample = "085X0250000054014021000001081294254855";
    var startwith = pValue.indexOf("08");
    var length = pValue.length;
    var formatMdn;
    if (pValue.indexOf("08") >= 0 && pValue.indexOf("08") <= 25) {
        formatMdn = pValue.substr(26, length);
        console.log("Format MDN Result : " + formatMdn);
    } else {
        formatMdn = pValue(startwith, length);
        console.log(formatMdn);
    }
    var startwith = pValue.indexOf("08");
    var lastIndex = pValue.length;
    var formatMdn = pValue.substr(startwith, lastIndex);
    console.log("Format mdn  : " + formatMdn);

}

var uniqueme = function (mdn) {
    var mdnsplit = mdn.split(',');
    var i = mdnsplit.length;
    while (i--) {
        if (mdnsplit.indexOf(mdnsplit[i]) != i) {
            mdnsplit.splice(i, 1)
        }
    }
}

var toLowercase = function (pStr) {
    var result = pStr.toLowerCase();
    console.log("Result : " + result);
    return result;
}

// trim for space
var trimStr = function (pStr) {
    var result = pStr.trim();
    console.log("Result : " + result);
    return result;
}

var subStr = function (pStr, istart, iend) {
    var result = pStr.substring(istart, iend);
    console.log("Substring result  : " + result);
    return result;
}

var formatUniqueMDN = function (arr, num) {
    $.each(num, function (i, e) {
        if ($.inArray(e, arr) == -1) {
            arr.push(e);
            console.log(e);
        } else {
            console.log("gak bisa add mdn double coi");
            return;
        }
    });
    return arr;
}

var uniqueMDN = function (arr, num) {
    for (var i = 0; i < arr.length; i++) {
        console.log("array length : " + arr.length);
        if (!arr[i].indexOf(num)) {
            arr.push(num);
            console.log(arr);
            console.log("ditambahin");
            console.log(num);
        } else {
            console.log("gak ditambahin")
            return;
        }
    }
    return arr;
}


var arrme = new Array();
var uniqueHelperMDN = function (arr) {
    var a = [];
    var l = arr.length;
    for (var i = 0; i < l; i++)
        if (a.indexOf(arr[i]) === -1 && arr[i] !== '') {
            a.push(arr[i]);
            console.log("No duplicate entry : " + a);
        } else {
            console.log("Duplicate entry");
        }
    return a;
}



var uniqueHelperMDNT = function (arr, num) {
    var a = [];
    var l = arr.length;
    for (var i = 0; i < l; i++)
        if (num.indexOf(arr[i]) === -1 && arr[i] !== '') {
            num.push(arr[i]);
            console.log("No duplicate entry : " + a);
        } else {
            console.log("Duplicate entry");
        }
    return num;
}


var printSomething = function (str) {
    return console.log(str);
}

var printAnother = function () {
    console.log("Learn new thing is good");
}
