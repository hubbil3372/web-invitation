/* function all */
let loaderPage = () => {
  setTimeout(() => {
    $(".fh5co-loader").fadeOut("slow");
  }, 2000);
};

let openInvitation = () => {
  const audioSource = document.getElementById("audio");
  let splashscreen = document.getElementById("splashscreen");
  let page = document.getElementsByClassName("wd-content");
  let audioBtn = document.getElementById("btn-audio");
  $(splashscreen).fadeOut("slow");
  $(page).addClass("d-block").removeClass("d-none");
  $(page).fadeIn("slow");
  audioSource.play();
  $(audioBtn).addClass("playing");
}

const scrollActions = () => {
  let btnTop = document.getElementById("back-top");
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    btnTop.style.display = "block";
  } else {
    btnTop.style.display = "none";
    $(btnTop).fadeOut("slow");
  }
}

const countDown = () => {
  // Set the date we're counting down to
  var countDownDate = new Date("Mar 4, 2023 09:00:00").getTime();

  // Update the count down every 1 second
  var x = setInterval(function () {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    $("#days-text").text(days);
    $("#hours-text").text(hours);
    $("#minutes-text").text(minutes);
    $("#seconds-text").text(seconds);

    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
      $("#days-text").text("0");
      $("#hours-text").text("0");
      $("#minutes-text").text("0");
      $("#seconds-text").text("0");
    }
  }, 1000);
}

const AudioControl = () => {
  const audioSource = document.getElementById("audio");
  let audioBtn = document.getElementById("btn-audio");
  $(audioBtn).on("click", function () {
    if ($(audioBtn).hasClass("playing")) {
      audioSource.pause();
      audioBtn.innerHTML = "<i class=\"fas fa-volume-mute\"></i>";
      $(audioBtn).removeClass("playing");
    } else {
      audioSource.play();
      audioBtn.innerHTML = "<i class=\"fas fa-volume-up\"></i>";
      $(audioBtn).addClass("playing");
    }
  })
}

function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", reveal);

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

const loadDataUcapan = () => {
  const dataUcapan = document.getElementById("data-ucapan");
  const url = $(dataUcapan).data("url");
  $(dataUcapan).load(url);
}


/* execute */
$(document).ready(function () {
  AOS.init({
    easing: "ease-out",
    duration: 800,
  });
  countDown();
  loaderPage();
  AudioControl();
  window.onscroll = () => {
    scrollActions();
  }
  const content = document.getElementsByClassName('wd-content');
  $(content).addClass("d-none");

  $('body').on("click", function (e) {
    if ($(e.target).hasClass("btn-copy")) {
      e.preventDefault();
      let dataText = $(e.target).parent().children()[0];
      let content = $(dataText).text().toString();
      var temp = jQuery("<textarea>");
      jQuery("body").append(temp);
      temp.val(content.replace(/<br ?\/?>/g, "\n")).select();
      document.execCommand("copy");
      temp.remove();
      let htmlAppend = '<i class="fas fa-check-circle"></i> Berhasil Disalin';
      $(e.target).html(htmlAppend);
      console.log($(content).text());
    }
    if ($(e.target).hasClass("btn-to-top")) {
      e.preventDefault();
      $('html, body').animate({
        scrollTop: $('html').offset().top
      }, 500, 'easeInOutExpo');
      return false;
    }

    if ($(e.target).hasClass("submit-form")) {
      e.preventDefault();
      let namaUndangan = $("#form-nama").val();
      let kehadiran = $("#form-kehadiran").val();
      let ucapan = $("#form-ucapan").val();

      if (namaUndangan == "" || kehadiran == "" || ucapan == "") {
        Toast.fire({
          icon: 'error',
          title: 'Isi dulu dong ucapannya!'
        });
        return;
      }

      let base_url = $(e.target).parent();
      $('body').waitMe({
        effect: 'bounce',
        text: '',
        bg: "rgba(255, 255, 255, 0.7)",
        color: "#000",
        maxSize: '',
        waitTime: -1,
        textPos: 'vertical',
        fontSize: '',
        source: '',
        onClose: function () { }
      });

      $.ajax({
        type: "POST",
        url: $(base_url).attr("action"),
        dataType: "JSON",
        data: { ucapanNama: namaUndangan, ucapanKehadiran: kehadiran, ucapanTeks: ucapan },
        success: function (data) {
          $('body').waitMe('hide');
          if (data.status == 'true') {
            Toast.fire({
              icon: 'success',
              title: data.message
            });
            loadDataUcapan();
            $("#form-nama").val("");
            $("#form-ucapan").val("");
          } else {
            Toast.fire({
              icon: 'warning',
              title: data.message
            });
            $("#form-nama").val("");
            $("#form-ucapan").val("");
          }
        }
      });
    }
  })
})