
function checkPassword(emptyAccepted) {
    if (emptyAccepted && document.getElementById("pwd").value.length === 0) {
        document.getElementById("pwd").style.border = "1px solid rgb(206, 212, 218)";
        document.getElementById("pwd-sm").innerHTML = "";
        enableSubmit();
    } else if (document.getElementById("pwd").value.length >= 8) {
        document.getElementById("pwd").style.border = "1px solid green";
        document.getElementById("pwd-sm").innerHTML = "";
        enableSubmit();
    } else {
        document.getElementById("pwd").style.border = "1px solid red";
        document.getElementById("pwd-sm").innerHTML = "Password is too short. Type in at least 8 characters.";
        disableSubmit();
    };
}

function checkPasswords(emptyAccepted) {
    if (document.getElementById("pwd").value !== document.getElementById("pwd-renew").value) {
        document.getElementById("pwd-renew").style.border = "1px solid red";
        document.getElementById("password-sm").innerHTML = "Passwords are not the same";
        disableSubmit();
    } else if (emptyAccepted && document.getElementById("pwd-renew").value.length === 0) {
        document.getElementById("pwd-renew").style.border = "1px solid rgb(206, 212, 218)";
        document.getElementById("password-sm").innerHTML = "";
        enableSubmit();
    } else {
        if (document.getElementById("pwd").style.border == "1px solid red") {
            document.getElementById("pwd-renew").style.border = "1px solid red";
            disableSubmit();
        } else {
            document.getElementById("pwd-renew").style.border = "1px solid green";
            enableSubmit();
        }
        document.getElementById("password-sm").innerHTML = "";

    }
}

function checkUsername(current) {
    var input = document.getElementById("username");
    if (input.value.length === 0) {
        input.style.border = "1px solid red";
        document.getElementById("username-sm").innerHTML = "Username cannot be empty";
        disableSubmit();
    } else {
        $.post('./users-api-check', { usr: document.getElementById("username").value }, function (d, q, x) {
            if (d == 1 || d == 0 && current === input.value) {
                input.style.border = "1px solid green";
                document.getElementById("username-sm").innerHTML = "";
                enableSubmit();
            }
            else {

                input.style.border = "1px solid red";
                document.getElementById("username-sm").innerHTML = "The username is already in use";
                disableSubmit();
            }
        });

    }
}

/* deprecated */
function checkInput(inputId, checkCb) {
    if (!checkCb()) document.getElementById(inputId).style.border = "1px solid red";
    else document.getElementById(inputId).style.border = "1px solid green";
}


function disableSubmit() {
    document.getElementById("submit-button").onclick = null;
}
function enableSubmit() {
    document.getElementById("submit-button").onclick = submitFoo;
}

function checkDataLength(inputId, inputSmId, minLen, maxLen) {
    let input = document.getElementById(inputId);
    let inputSm = document.getElementById(inputSmId);
    if (input.value.length > maxLen) {
        input.style.border = "1px solid red";
        inputSm.innerHTML = "Data too long!";
        disableSubmit();
    } else if (input.value.length < minLen) {
        input.style.border = "1px solid red";
        inputSm.innerHTML = "Data too short!";
        disableSubmit();
    } else {
        input.style.border = "1px solid green";
        inputSm.innerHTML = "";
        enableSubmit();
    }
}

function SHA2(uncrypted, crypted, form) {
    var str = document.getElementById(uncrypted).value;
    var buffer = new TextEncoder("utf-8").encode(str);
    return crypto.subtle.digest("SHA-512", buffer).then(
        function (hash) {
            document.getElementById(crypted).value = toHex(hash);
            document.getElementById(form).submit();
        }
    );
}


function updateSHA2(uncrypted, crypted, form) {
    var str = document.getElementById(uncrypted).value;
    if (str.length > 0) {
        var buffer = new TextEncoder("utf-8").encode(str);
        return crypto.subtle.digest("SHA-512", buffer).then(
            function (hash) {
                document.getElementById(crypted).value = toHex(hash);
                document.getElementById(form).submit();
            }
        );
    } else document.getElementById(form).submit();
}


function toHex(msg) {
    return Array
        .from(new Uint8Array(msg))
        .map(b => b.toString(16).padStart(2, "0"))
        .join("");
}

function updateBulkSelection() {
    var c = document.getElementById("bulkCheck");
    $('input:checkbox.elem-check').prop('checked', c.checked);
}

function updateSelections() {
    var c = document.getElementById("bulkCheck");
    if ($('input:checkbox.elem-check:checked').length == 0) {
        c.checked = false;
        c.indeterminate = false;
    } else if ($('input:checkbox.elem-check:checked').length == $('input:checkbox.elem-check').length) {
        c.checked = true;
        c.indeterminate = false;
    } else if (c.checked == true || c.checked == false) {
        c.indeterminate = true;
    }
}

function deleteUsers() {
    $('#users-form').prop('action', "users-api-delete-bulk");
    $('#users_table_wrapper select').prop('name', '');
    $('#users-form').submit();
}

function deleteProducts() {
    $('#products-form').prop('action', "products-api-delete-bulk");
    $('#products_table_wrapper select').prop('name', '');
    $('#products-form').submit();
}


function updateProduct(form) {
    $('#' + form + ' input,textarea').trigger('input');
    if (document.getElementById('submit-button').onclick != null) document.getElementById(form).submit();
}

function newProduct(form) {
    $('#' + form + ' input,textarea').trigger('input');
    if (document.getElementById('submit-button').onclick != null) document.getElementById(form).submit();
}

function updateUser(uncrypted, crypted, form) {
    $('#' + form + ' input,textarea').trigger('input');
    if (document.getElementById('submit-button').onclick != null) updateSHA2(uncrypted, crypted, form);
}

function newUser(uncrypted, crypted, form) {
    $('#' + form + ' input,textarea').trigger('input');
    if (document.getElementById('submit-button').onclick!=null) SHA2(uncrypted,crypted,form);
}

function checkProductCode(current) {
    var input = document.getElementById("product-code");
    if (input.value.length === 0) {
        input.style.border = "1px solid red";
        document.getElementById("product-code-sm").innerHTML = "Product code cannot be empty";
        disableSubmit();
    } else {
        $.post('./products-api-check', { pid: input.value }, function (d, q, x) {
            if (d == 1 || d == 0 && current === input.value) {
                input.style.border = "1px solid green";
                document.getElementById("product-code-sm").innerHTML = "";
                enableSubmit();
            }
            else {
                input.style.border = "1px solid red";
                document.getElementById("product-code-sm").innerHTML = "The product code is already in use";
                disableSubmit();
            }
        });
    }

}