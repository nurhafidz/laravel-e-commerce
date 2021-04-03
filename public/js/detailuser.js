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
$(document).ready(function() {
    $("#ajaxBtn").click(function() {
        var code = $("#phonecode").val();
        var no = $("#phonenumber").val();
        $.get(
            "/otp/create", // url
            { pcode: code, pno: no }, // data to be submit
            function(data, status, jqXHR) {
                // success callback
                $("#demo2").append("status: " + status);
            }
        );
        $("#ajaxBtn").attr("disabled", "disabled");
        setTimeout(function() {
            $("#ajaxBtn").removeAttr("disabled");
        }, 10 * 60 * 1000);
    });
});
function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);

    return {
        total: t,
        minutes: minutes,
        seconds: seconds
    };
}

function initializeClock(id, endtime) {
    var clock = document.getElementById(id);
    var minutesSpan = clock.querySelector(".minutes");
    var secondsSpan = clock.querySelector(".seconds");

    function updateClock() {
        var t = getTimeRemaining(endtime);
        minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
        secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);

        if (t.total <= 0) {
            clearInterval(timeinterval);
        }
    }

    updateClock();
    var timeinterval = setInterval(updateClock, 1000);
}

$("#ajaxBtn").click(function() {
    var deadline = new Date(Date.parse(new Date()) + 10 * 60 * 1000);
    initializeClock("countdown", deadline);
    $("#tutor").css("display", "none");
    $("#tutor2").css("display", "block");
    setTimeout(function() {
        $("#tutor").show();
    }, 10 * 60 * 1000);
    setTimeout(function() {
        $("#tutor2").hide();
    }, 10 * 60 * 1000);
});

$("#btnotp").click(function() {
    if ($("input[name=otp0]").val().length > 0) {
        if ($("input[name=otp1]").val().length > 0) {
            if ($("input[name=otp2]").val().length > 0) {
                if ($("input[name=otp3]").val().length > 0) {
                    if ($("input[name=otp4]").val().length > 0) {
                        if ($("input[name=otp5]").val().length > 0) {
                            var a = $("input[name=otp0]").val();
                            var c = $("input[name=otp2]").val();
                            var b = $("input[name=otp1]").val();
                            var d = $("input[name=otp3]").val();
                            var e = $("input[name=otp4]").val();
                            var f = $("input[name=otp5]").val();
                            $.ajax({
                                type: "POST",
                                url: "/otp/check",
                                headers: {
                                    "X-CSRF-TOKEN": $(
                                        'meta[name="csrf-token"]'
                                    ).attr("content")
                                },
                                data: { a: a, b: b, c: c, d: d, e: e, f: f },
                                dataType: "json",
                                success: function(data) {
                                    console.log(data);
                                    if (data["status"] == 1) {
                                        $("#otput").show();
                                        $("#otput").html(
                                            '<div class="my-2 px-2 w-full md:w-full overflow-hidden"><div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert"><div class="flex"><div class="py-1"><svg class=" h-6 w-6 text-teal-500 mr-4"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />  <polyline points="22 4 12 14.01 9 11.01" /></svg></div><div><p class="font-bold">Sukses</p><p class="text-sm">No Telepon sudah terhubung</p></div></div></div</div>'
                                        );
                                        $("#otpin").hide();
                                        $("#simpan1").html(
                                            '<button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" required>Simpan</button>'
                                        );
                                    } else {
                                        $("#alerter").show();
                                    }
                                }
                            });
                        }
                    }
                }
            }
        }
    }
});
