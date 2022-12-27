var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("demo1Navbar").style.top = "0";
    } else {
        document.getElementById("demo1Navbar").style.top = "-50px";
    }
    prevScrollpos = currentScrollPos;
}

hide_on_scroll({
    nav_id: 'demo1Navbar'
});

(function ($) {
    'use strict';
    /*==================================================================
        [ Daterangepicker ]*/
    try {
        $('.js-datepicker').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "autoUpdateInput": false,
            locale: {
                format: 'DD/MM/YYYY'
            },
        });
    
        var myCalendar = $('.js-datepicker');
        var isClick = 0;
    
        $(window).on('click',function(){
            isClick = 0;
        });
    
        $(myCalendar).on('apply.daterangepicker',function(ev, picker){
            isClick = 0;
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
    
        });
    
        $('.js-btn-calendar').on('click',function(e){
            e.stopPropagation();
    
            if(isClick === 1) isClick = 0;
            else if(isClick === 0) isClick = 1;
    
            if (isClick === 1) {
                myCalendar.focus();
            }
        });
    
        $(myCalendar).on('click',function(e){
            e.stopPropagation();
            isClick = 1;
        });
    
        $('.daterangepicker').on('click',function(e){
            e.stopPropagation();
        });
    
    
    } catch(er) {console.log(er);}
    /*[ Select 2 Config ]
        ===========================================================*/
    
    try {
        var selectSimple = $('.js-select-simple');
    
        selectSimple.each(function () {
            var that = $(this);
            var selectBox = that.find('select');
            var selectDropdown = that.find('.select-dropdown');
            selectBox.select2({
                dropdownParent: selectDropdown
            });
        });
    
    } catch (err) {
        console.log(err);
    }
    

})(jQuery);

document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    // show navbar
    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
     // Your code to run since DOM is loaded and ready
    });

    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });

    function checkvalue(val) {
        if (val === "others") {
            document.getElementById('other_text').style.display = 'block';
        } else {
            document.getElementById('other_text').style.display = 'none';
        }
    }

    $(document).ready(function () {
        $('.select2').select2();
    });

    function tampil_referensi() {

        if (document.getElementById("pilih_referensi").value == "pegawai") {
            document.getElementById("referensi_pegawai").style.display = "block";
        } else {
            document.getElementById("referensi_pegawai").style.display = "none";
        }

        if (document.getElementById("pilih_referensi").value == "siswa") {
            document.getElementById("referensi_siswa").style.display = "block";
        } else {
            document.getElementById("referensi_siswa").style.display = "none";
        }

        if (document.getElementById("pilih_referensi").value == "alumni") {
            document.getElementById("referensi_alumni").style.display = "block";
        } else {
            document.getElementById("referensi_alumni").style.display = "none";
        }

        if (document.getElementById("pilih_referensi").value == "guru_smp") {
            document.getElementById("referensi_guru_smp").style.display = "block";
        } else {
            document.getElementById("referensi_guru_smp").style.display = "none";
        }

        if (document.getElementById("pilih_referensi").value == "calon_siswa") {
            document.getElementById("referensi_calon_siswa").style.display = "block";
        } else {
            document.getElementById("referensi_calon_siswa").style.display = "none";
        }

        if (document.getElementById("pilih_referensi").value == "sosial_media") {
            document.getElementById("referensi_sosmed").style.display = "block";
        } else {
            document.getElementById("referensi_sosmed").style.display = "none";
        }

        if (document.getElementById("pilih_referensi").value == "referensi_langsung") {
            document.getElementById("referensi_langsung").style.display = "block";
        } else {
            document.getElementById("referensi_langsung").style.display = "none";
        }
    }

 /* Tanpa Rupiah */
 var tanpa_rupiah = document.getElementById('tanpa-rupiah');
 tanpa_rupiah.addEventListener('keyup', function(e)
 {
     tanpa_rupiah.value = formatRupiah(this.value);
 });
 
 /* Dengan Rupiah */
 var dengan_rupiah = document.getElementById('dengan-rupiah');
 dengan_rupiah.addEventListener('keyup', function(e)
 {
     dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
 });
 
 /* Fungsi */
 function formatRupiah(angka, prefix)
 {
     var number_string = angka.replace(/[^,\d]/g, '').toString(),
         split    = number_string.split(','),
         sisa     = split[0].length % 3,
         rupiah     = split[0].substr(0, sisa),
         ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
         
     if (ribuan) {
         separator = sisa ? '.' : '';
         rupiah += separator + ribuan.join('.');
     }
     
     rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
     return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
 }

 var rupiah = document.getElementById("rupiah");
 rupiah.addEventListener("keyup", function(e) {
   // tambahkan 'Rp.' pada saat form di ketik
   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
   rupiah.value = formatRupiah(this.value, "Rp. ");
 });
 
 /* Fungsi formatRupiah */
 function formatRupiah(angka, prefix) {
   var number_string = angka.replace(/[^,\d]/g, "").toString(),
     split = number_string.split(","),
     sisa = split[0].length % 3,
     rupiah = split[0].substr(0, sisa),
     ribuan = split[0].substr(sisa).match(/\d{3}/gi);
 
   // tambahkan titik jika yang di input sudah menjadi angka ribuan
   if (ribuan) {
     separator = sisa ? "." : "";
     rupiah += separator + ribuan.join(".");
   }
 
   rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
   return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
 }