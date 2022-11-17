var nama = document.forms.form.nama
var nim = document.forms.form.nim
var email = document.forms.form.email
var jenis_kelamin = document.forms.form.jenis_kelamin
var alamat = document.forms.form.alamat
var departemen = document.forms.form.departemen
var jurusan = document.forms.form.jurusan

function submitForm() {
    resetError()
    var valid = true

    if (nama.value == '') {
        error('nama', 'Nama harus diisi')
        valid = false
    }

    if (email.value == '') {
        error('email', 'Email harus diisi')
        valid = false
    }

    if (jenis_kelamin.value == '') {
        error('jenis_kelamin', 'Jenis kelamin harus dipilih')
        valid = false
    }

    if (alamat.value == '') {
        error('alamat', 'Alamat harus diisi')
        valid = false
    }

    if (departemen.value == 0) {
        error('departemen', 'Departemen harus diisi')
        valid = false
    }

    if (jurusan.value == 0) {
        error('jurusan', 'Jurusan harus diisi')
        valid = false
    }

    return valid
}

function error(id, error) {
    var element = document.getElementById(id + '_error')
    element.innerHTML = error
    element.style.display = 'block'
}

function hideError(id) {
    document.getElementById(id + '_error').style.display = 'none'
}

function resetError() {
    document.querySelectorAll('[id$="_error"]')
        .forEach(function (element) {
            element.style.display = 'none'
        })
    document.getElementById('email_success').style.display = 'none'
}

email.onkeyup = function () {
    var success = document.getElementById('email_success')
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'check_email.php?email=' + email.value)

    xhr.onload = function () {
        if (xhr.responseText == false) {
            error('email', 'Email sudah dipakai')
            success.style.display = 'none'
        } else {
            hideError('email')
            success.style.display = 'block'
        }
    }

    xhr.send()
}

departemen.onchange = function () {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'get_jurusan.php?id=' + departemen.value)

    xhr.onload = function() {
        jurusan.innerHTML = xhr.responseText
    }
    
    xhr.send()
}

resetError()