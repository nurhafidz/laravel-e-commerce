function myFunction1() {
    var option = document.getElementsByName("jenis_kelamin");

    if (!(option[0].checked || option[1].checked)) {
        document.getElementById("demo").innerHTML =
            "<p class='text-red-600'>Pilih Jenis kelamin</p>";

        return false;
    } else {
        var x = document.getElementById("myDIV1");
        var y = document.getElementById("myDIV2");
        var v = document.getElementById("list2");
        var u = document.getElementById("list1");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            v.classList.remove("bg-gray-100");
            v.classList.remove("border-indigo-500");
            v.classList.remove("text-indigo-500");
            u.classList.add("border-indigo-500");
            u.classList.add("text-indigo-500");
        } else {
            v.classList.add("bg-gray-100");
            v.classList.add("border-indigo-500");
            v.classList.add("text-indigo-500");
            u.classList.add("border-gray-200");
            u.classList.remove("border-indigo-500");
            u.classList.remove("text-indigo-500");
            x.style.display = "none";
            y.style.display = "block";
        }
    }
}

function myFunction2() {
    var tmp = document.getElementById("tmp_lahir");
    var tgl = document.getElementById("tgl_lahir");
    if (tmp.value == "" && tgl.value == "") {
        document.getElementById("demo2").innerHTML =
            "<p class='text-red-600'>Isi data</p>";
        return false;
    }
    if (tmp.value == "") {
        document.getElementById("demo2").innerHTML =
            "<p class='text-red-600'>Isi tempat lahir</p>";
        return false;
    }
    if (tgl.value == "") {
        document.getElementById("demo2").innerHTML =
            "<p class='text-red-600'>Isi tanggal lahir</p>";
        return false;
    } else {
        var x = document.getElementById("myDIV2");
        var y = document.getElementById("myDIV3");
        var v = document.getElementById("list2");
        var j = document.getElementById("list3");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            j.classList.remove("bg-gray-100");
            j.classList.remove("border-indigo-500");
            j.classList.remove("text-indigo-500");
            v.classList.add("border-indigo-500");
            v.classList.add("text-indigo-500");
        } else {
            x.style.display = "none";
            y.style.display = "block";
            j.classList.add("bg-gray-100");
            j.classList.add("border-indigo-500");
            j.classList.add("text-indigo-500");
            v.classList.remove("border-indigo-500");
            v.classList.remove("text-indigo-500");
        }
    }
}

function myFunction3() {
    var a = document.getElementById("province");
    var b = document.getElementById("city");
    var c = document.getElementById("district");
    var d = document.getElementById("kode");
    var e = document.getElementById("alamat");
    if (
        a.value != "" &&
        b.value != "" &&
        c.value != "" &&
        d.value != "" &&
        e.value != ""
    ) {
        var x = document.getElementById("myDIV3");
        var y = document.getElementById("myDIV4");
        var v = document.getElementById("list3");
        var j = document.getElementById("list4");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            j.classList.remove("bg-gray-100");
            j.classList.remove("border-indigo-500");
            j.classList.remove("text-indigo-500");
            v.classList.add("border-indigo-500");
            v.classList.add("text-indigo-500");
        } else {
            x.style.display = "none";
            y.style.display = "block";
            j.classList.add("bg-gray-100");
            j.classList.add("border-indigo-500");
            j.classList.add("text-indigo-500");
            v.classList.remove("border-indigo-500");
            v.classList.remove("text-indigo-500");
        }
    }
    if (
        !(
            a.value != "" ||
            b.value != "" ||
            c.value != "" ||
            d.value != "" ||
            e.value != ""
        )
    ) {
        document.getElementById("demo3").innerHTML =
            "<p class='text-red-600'>Isi data</p>";

        return false;
    }
}

function myFunction4() {
    var x = document.getElementById("myDIV4");
    var y = document.getElementById("myDIV5");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "block";
    }
}
$(document).ready(function() {
    $(".select2").select2();
});

jQuery(document).ready(function() {
    jQuery('select[name="province"]').on("change", function() {
        var provinceID = jQuery(this).val();

        if (provinceID) {
            jQuery.ajax({
                url: "/detailuser/getcity/" + provinceID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    jQuery('select[name="city"]').empty();
                    jQuery.each(data, function(key, value) {
                        $('select[name="city"]').append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.type +
                                " " +
                                value.name +
                                "</option>"
                        );
                    });
                }
            });
        } else {
            $('select[name="city"]').empty();
        }
    });
});
jQuery(document).ready(function() {
    jQuery('select[name="city"]').on("change", function() {
        var regencyID = jQuery(this).val();
        if (regencyID) {
            jQuery.ajax({
                url: "/detailuser/getdistrict/" + regencyID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    jQuery('select[name="district"]').empty();
                    jQuery.each(data, function(key, value) {
                        $('select[name="district"]').append(
                            '<option value="' + key + '">' + value + "</option>"
                        );
                    });
                }
            });
        } else {
            $('select[name="district"]').empty();
        }
    });
});
