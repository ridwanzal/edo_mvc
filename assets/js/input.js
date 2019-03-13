/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var glres = {
    log: "[LOG]",
    error: "[ERROR]",
    info: "[INFO]"
};

$(document).ready(function () {
    $('#file_up').on('change', function (event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var url = reader.result, outputs = $('#file_res');
            outputs.attr('src', url);
        }
        reader.readAsDataURL(input.files[0]);
        console.log(input.files[0])
        if (input.files[0] !== null) {
            $('#file_up').attr('disabled', true);
        }
    });
    
    printheadline();
    typeConversion();
    copyArray();
});

var typeConversion = function(){
    var x = "34", xnum = +x;
    console.log("Type of x : " + typeof x);
    console.log("Type of x two : " + typeof xnum);
    const ijk = 2;
    console.log("ijk is : " + ijk);
}


var printheadline = function(){
    var x_str = "ini adalah sya yagng baru lo\n"
    console.log(x_str);
}

var copyArray = function(){
    const xj = [11, 23, 234];
    const xjs = [...xj];
    console.log("Array of xj : " + xj);
    console.log("Array copy : " + xjs);
}

var openfile = function (idin, idout) {
    var input, reader, url, output;
    idin.on('change', function (event) {
        input = event.target;
        reader = new FileReader();
        reader.onload = function () {
            console.log("sini")
            url = reader.result, output = idout;
            output.attr('src', url);
        }
        reader.readAsDataURL(input.file[0]);
        console.log(input.file[0]);
    });
}