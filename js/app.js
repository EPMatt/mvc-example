
function checkPasswords() {
    if(document.getElementById("pwd").value !== document.getElementById("pwd-renew").value){
        document.getElementById("pwd-renew").style.border = "1px solid red";
        document.getElementById("password-sm").innerHTML = "Passwords are not the same";
        disableSubmit();
    }else{
        document.getElementById("pwd-renew").style.border = "1px solid green";
        document.getElementById("password-sm").innerHTML = "";
        enableSubmit();
    };
}

function checkUsername(current) {
    var input = document.getElementById("username");
    if (input.value.length === 0) {
        input.style.border = "1px solid red";
        document.getElementById("username-sm").innerHTML = "Username cannot be empty";
        disableSubmit();
    } else {
        $.post('./users-api-check', { usr: document.getElementById("username").value }, function (d, q, x) {
            if (d == 0 && current!=null && current!=input.value) {
                input.style.border = "1px solid red";
                document.getElementById("username-sm").innerHTML = "The username is already in use";
                disableSubmit();
            }
            else {
                input.style.border = "1px solid green";
                document.getElementById("username-sm").innerHTML = "";
                enableSubmit();
            }
        });
        
    }
}

/* deprecated */
function checkInput(inputId, checkCb) {
    if (!checkCb()) document.getElementById(inputId).style.border = "1px solid red";
    else document.getElementById(inputId).style.border = "1px solid green";
}


function disableSubmit(){
    document.getElementById("submit-button").onclick=null;
}
function enableSubmit(){
    document.getElementById("submit-button").onclick=function(){SHA2("pwd","pwd-crypted","form-submit")};
}

function checkDataTooLong(inputId,inputSmId,len){
    let input=document.getElementById(inputId);
    let inputSm=document.getElementById(inputSmId);
    if(input.value.length>len){
        input.style.border="1px solid red";
        inputSm.innerHTML="Data too long!";
        disableSubmit();
    }else{
        input.style.border="1px solid green";
        inputSm.innerHTML="";
        enableSubmit();
    }
}

function SHA2(uncrypted,crypted,form) {
    var str = document.getElementById(uncrypted).value;
    var buffer = new TextEncoder("utf-8").encode(str);
    return crypto.subtle.digest("SHA-512", buffer).then(
        function (hash) {
            document.getElementById(crypted).value = toHex(hash);
            document.getElementById(form).submit();
        }
    );
}

function toHex(msg) {
    return Array
        .from(new Uint8Array(msg))
        .map(b => b.toString(16).padStart(2, "0"))
        .join("");
}