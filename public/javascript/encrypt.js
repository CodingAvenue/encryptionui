$(document).ready(function(){
    $("#url_result").hide();
    $('.spinner .btn:first-of-type').on('click', function() {
        $('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
    });
    $('.spinner .btn:last-of-type').on('click', function() {
        $('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
    });
});
var result_area = document.getElementById("result");
var iterations = 100000;

function encryptFunction() {
    $("#url_result").hide();
    var code_text = result_area.value;
    var secret_passphrase = document.getElementById("secret_passphrase").value;
    if (!secret_passphrase) {
    	alert("You need a passphrase");
    	return false;
    }
    secret_passphrase = CryptoJS.PBKDF2(secret_passphrase, "IlluminateCrypt0!!", {iteration:iterations});
    var encrypted = CryptoJS.AES.encrypt(code_text, secret_passphrase.words[(secret_passphrase.words.length - 1)].toString());
    var encoded_data = window.btoa(encrypted);
    $("#loader").removeAttr('style');
    $.get(
        base_url + "Track", 
        {
            encrypted_data: encoded_data,
            author: user_email,
            expiration: $("#expiration").val()
        },
        function(output) {
            var long_url = base_url + "Encryptor?data=" + output;
            $("#url_result").removeAttr('style');
            $("#long_url_origins").html(long_url).show();
            $("#copy_trigger").removeAttr("disabled");
            $("#url_result").removeAttr("style");
            $("#url_result").show();
            $("#loader").hide();
        }
    );

    displayData(encoded_data);

    return false;
}

function decryptFunction() {   

    var code_text = result_area.value;
    try {
        var secret_passphrase = document.getElementById("secret_passphrase").value;

        secret_passphrase = CryptoJS.PBKDF2(secret_passphrase, "IlluminateCrypt0!!", {iteration:iterations});
        var decoded_data = window.atob(code_text);
        var decrypted = CryptoJS.AES.decrypt(decoded_data, secret_passphrase.words[(secret_passphrase.words.length - 1)].toString());
        decoded_data = decrypted.toString(CryptoJS.enc.Utf8)
        
    	if (!decoded_data) {
    	    alert("Cannot decrypt");
    	    displayData(code_text);
    	    return false;
        }
        displayData(decoded_data);

        return false;
    } catch (err) {
        displayData(code_text);
    	return false;
    }
}

function displayData(data) {
    result_area.value = "";
    result_area.value = data;
}

$("#copy_trigger").zclip({
    path:zclip_swf,
    copy:function(){return $("#long_url_origins").html();}
});
