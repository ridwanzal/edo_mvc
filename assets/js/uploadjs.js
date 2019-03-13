/*
 * Upload file generic using xmlhttprequest module
 */

var uploadedfile = ""
var upload = {
    file: function (temp, pathservice, filetype) {
        var filename = IOFrame2.document.getElementById(temp).value;
        /*
         * file not chosen yet
         */
        if (filename === "") {
            console.log("file belum dipilih");
            alert("file belum dipilih");
            return;
        }
        
        if(filename.includes(" ")){
            console.log("file tidak boleh mengandung spasi");
            alert("file tidak boleh mengandung spasi");
        }
        
        /*
         * get filetype (format or extension)
         */
        var filetype = "";
        var arrfile = filename.split(".");
        for (var i in arrfile) {
            if (x == arrfile.length - 1) {
                filetype = arrfile[x];
            }
        }
        /*
         * allowed format in txt and pdf format
         */
        if (filetype !== "txt" || filetype !== "pdf") {
            console.log("file harus dalam format txt");
        }
        var file = IOFrame2.document.getElementById(temp).files[0];

        /*
         * send using formdata()
         */
        var fd = new FormData();
        fd.append('key', filename);
        fd.append('file', file);

        /*
         * create xml http request and event listener
         * path service example '/mwa/Svc?xsv=initbdl&P_ACTION=upload&isget=0'
         */
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener("progress", progress, false);
        xhr.addEventListener("load", complete, false);
        xhr.addEventListener("error", failed, false);
        xhr.addEventListener("abort", uploadCanceled, false);
        xhr.open('POST', pathservice, true);
    },
    /*
     * onprogress
     */
    progress : function(event, elemprogress){
        if(event.lengthComputable){
             var percentComplete = Math.round(evt.loaded * 100 / evt.total);
        var text = percentComplete < 100 ? "Uploading" : "Uploaded";
        document.getElementById(elemprogress).innerHTML = text + " " + percentComplete.toString() + '%';
        }
    },
    /*
     * onfailed
     */
    failed : function(event, elemprogress){
        document.getElementById(elemprogress).innerHTML = ("There was an error attempting to upload the file." + event);
    },
    /*
     * oncomplete
     */
    complete : function(event){
        uploadedfile.target.responseText;
    },
    /*
     * oncanceled
     */
    canceled : function(event){
        document.getElementById(elemprogress).innerHTML = ("The upload has been canceled by the user or browser dropped the connection");
    }
}