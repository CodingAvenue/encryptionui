$(document).ready(function(){
    $("#url_result").hide();
});
var result_area = document.getElementById("result");

function encryptFunction() {
    var code_text = result_area.value;
    var secret_passphrase = document.getElementById("secret_passphrase").value;
    
    var encrypted = CryptoJS.AES.encrypt(code_text, secret_passphrase);
    var encoded_data = window.btoa(encrypted);
    $.get(
        base_url + "Track", 
        {
            encrypted_data: encoded_data,
            author: user_email
        },
        function(output) {
            var long_url = base_url + "Encryptor?data=" + output;
            $("#url_result").removeAttr('style');
            $("#long_url_origins").html(long_url).show();
            $("#copy_trigger").removeAttr("disabled");
            $("#url_result").show();
        }
    );

    displayData(encoded_data);

    return false;
}

function decryptFunction() {   

    var code_text = result_area.value;
    var secret_passphrase = document.getElementById("secret_passphrase").value;

    var decoded_data = window.atob(code_text);
    var decrypted = CryptoJS.AES.decrypt(decoded_data, secret_passphrase);
    decoded_data = decrypted.toString(CryptoJS.enc.Utf8)
    
    displayData(decoded_data);

    return false;
}

function displayData(data) {
    result_area.value = "";
    result_area.value = data;
}

$("#copy_trigger").zclip({
   path:zclip_swf,
   copy:function(){return $("#long_url_origins").html();}
});
