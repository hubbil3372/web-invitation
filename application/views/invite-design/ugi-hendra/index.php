<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= @$title ?? 'Wedding Invitation' ?></title>
  <!-- custom style -->
  <link rel="stylesheet" href="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/css/style.css">
  <!-- icomon  -->
  <link rel="stylesheet" href="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/css/css-icomoon.css">
  <link rel="stylesheet" href="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/lightbox/lightbox.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- JS Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- WaitMe -->
  <link rel="stylesheet" href="<?= base_url(); ?>_assets/vendor/waitme/css/waitMe.min.css">
  <!-- JS -->
  <script src="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/js/jquery-3.6.3.min.js"></script>
  <!-- aos -->
  <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <script src="<?= base_url(); ?>_assets/vendor/waitme/js/waitMe.min.js"></script>
  <script src="<?= base_url() ?>_assets/vendor/sweetalert/js/sweetalert2.all.min.js"></script>
  <!-- custom JS -->
  <script src="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/js/main.js"></script>
  <script src="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/lightbox/lightbox.js"></script>
  <script src="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/js/js-jquery.easing.1.3.js"></script>
</head>

<body>
  <!-- loader -->
  <div id="loader" class="fh5co-loader">
    <div class="loader-bg"></div>
  </div>
  <!-- cover -->
  <div id="splashscreen" class="d-non">
    <div class="splashscreen-bg"></div>
    <div class="tengah">
      <div class="animate__animated animate__slideInUp animate__slow animate__delay-2s">
        <p class="mb-5 fs-3" style="font-family: serif;">The Wedding Of</p>
        <h1 style="font-size:80px;color:white;margin-top:-30px;" class="font-bride fw-bold font-bride-rotate">Ugi
          &amp;
          Hendra </h1>
        <p style="font-family: serif;" class="mt-5">Kepada Yth:</p>
        <div class="py-4 rounded border border-light mb-3">
          <p class="mb-0 fw-bold"><?= $undangan ?></p>
        </div>
        <!-- <a href="javascript:;">
          </a> -->
        <button class="btn wd-btn-primary popup1_open font-lato" onclick="return openInvitation();" data-popup-ordinal="0" id="open_92089009"><i class="fas fa-envelope"></i> BUKA</button>
      </div>
    </div>
  </div>

  <!-- content -->
  <div class="wd-content d-block">
    <header id="fh5co-header" class="fh5co-cover position-relative bg-fullscreen min-vh-100" style="background-image: url('<?= base_url("_assets/template/ugi-hendra/_assets/img/{$private}") ?>');">
      <div id="min-vh-100 position-relative">
        <div class="overlay position-absolute"></div>
        <div class="container position-relative">
          <div class="row justify-content-center">
            <div class="col-md-8 min-vh-100 d-flex justify-content-center">
              <div class="align-self-center text-center">
                <div style="color:#fff;">
                  <h5 class="mb-3 fs-3" style="font-family: serif;color: white;">The Wedding Of</h5>
                  <h1 class="font-bride text-white font-bride-rotate fw-bold display-" style="font-size: 5rem;">
                    Ugi &amp; Hendra </h1>
                  <p class="text-white"><span>04 Maret 2023</span></p>
                  <p>
                    <a href="#fh5co-couple" class="icon-scroll"></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </header>

    <div class="content">
      <div class="couple">
        <div class="container py-5 px-3 reveal">
          <div class="row justify-content-center">
            <div class="col-md-8 mb-3">
              <h1 class="color-primary text-center font-greeting">We Getting Married</h1>
              <p class="text-center fs-opening fst-italic">
                Assalamu'alaikum warahmatullahi wabarakatuh
                Dengan mengharapkan Ridho dan Rahmat Allah SWT, Izinkan kami mengundang sekaligus memohon doa restu dari
                bapak/ibu, teman-teman dan rekan-rekan dalam acara pernikahan kami
              </p>
            </div>
            <div class="col-12 position-relative mb-3">
              <div class="position-absolute start-0 bottom-0 end-0 top-0 d-none d-lg-flex justify-content-center animate-custom">
                <div class="bg-color-primary rounded-circle align-self-center position-relative" style="padding: 2rem;">
                  <div class="position-absolute start-0 bottom-0 end-0 top-0 d-flex justify-content-center">
                    <i class="fas fa-heart align-self-center text-white"></i>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                  <div class="row justify-content-end">
                    <div class="col-8 d-flex justify-content-end">
                      <div class="align-self-center text-end">
                        <h2 class="color-primary fw-bold mb-4" style="font-family: serif;">Ugi Maftuhah, S.Pd</h2>
                        <p class="mb-0 fs-parent fst-italic" style="font-size: 0.5rem;">Putri dari:</p>
                        <h5 class="fs-parent">Bapak Dahlan &amp; Ibu Umamah</h5>
                      </div>
                    </div>
                    <div class="col-4 col-md-3">
                      <img src="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/wife.jpg" alt="wife" class="img-fluid rounded-circle">
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                  <div class="row justify-content-start">
                    <div class="col-4 col-md-3">
                      <img src="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/husband.jpg" alt="husband" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-8 d-flex justify-content-start">
                      <div class="align-self-center">
                        <h3 class="color-primary fw-bold mb-4" style="font-family: serif;">Suhendra Saepudin, S.Kom
                        </h3>
                        <p class="mb-0 fs-parent fst-italic">Putra dari:</p>
                        <h5 class="fs-parent">Bapak Saepudin &amp; Ibu Umah Maemunah</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <p style="white-space: pre-line;" class="text-center fs-ayat fst-italic">
                "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari
                jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya
                diantaramu rasa kasih dan sayang. Sesungguhnya pada yang demikian itu benar-benar
                terdapat tanda-tanda bagi kaum yang berfikir."
                <b>QS Ar-Rum : 21</b>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="wedding-event event-bg position-relative" style="background-image: url('<?= base_url("_assets/template/ugi-hendra/_assets/img/{$event}") ?>');">
        <div class="event-overlay"></div>
        <div class="container py-5 position-relative reveal">
          <div class="row justify-content-center">
            <div class="col-12 mb-3">
              <h2 class="mb-0 text-center text-white font-greeting">Waktu</h2>
            </div>
            <div class="col-12 mb-4 d-flex justify-content-center">
              <div class="d-inline-block me-4">
                <div class="bg-white rounded-circle align-self-center position-relative d-inline-block animate-custom" style="padding: 2rem;">
                  <div class="position-absolute start-0 bottom-0 end-0 top-0 d-flex justify-content-center">
                    <span class="align-self-center text-dark fw-bold" id="days-text">7</span>
                  </div>
                </div>
                <p class="mb-0 fw-bold text-center text-white">Hari</p>
              </div>
              <div class="d-inline-block me-4">
                <div class="bg-white rounded-circle align-self-center position-relative d-inline-block animate-custom" style="padding: 2rem;">
                  <div class="position-absolute start-0 bottom-0 end-0 top-0 d-flex justify-content-center">
                    <span class="align-self-center text-dark fw-bold" id="hours-text">10</span>
                  </div>
                </div>
                <p class="mb-0 fw-bold text-center text-white">Jam</p>
              </div>
              <div class="d-inline-block me-4">
                <div class="bg-white rounded-circle align-self-center position-relative d-inline-block animate-custom" style="padding: 2rem;">
                  <div class="position-absolute start-0 bottom-0 end-0 top-0 d-flex justify-content-center">
                    <span class="align-self-center text-dark fw-bold" id="minutes-text">43</span>
                  </div>
                </div>
                <p class="mb-0 fw-bold text-center text-white">Menit</p>
              </div>
              <div class="d-inline-block me-4">
                <div class="bg-white rounded-circle align-self-center position-relative d-inline-block animate-custom" style="padding: 2rem;">
                  <div class="position-absolute start-0 bottom-0 end-0 top-0 d-flex justify-content-center">
                    <span class="align-self-center text-dark fw-bold" id="seconds-text">7</span>
                  </div>
                </div>
                <p class="mb-0 fw-bold text-center text-white">Detik</p>
              </div>
            </div>
            <div class="col-md-8">
              <div class="row justify-content-center">
                <div class="col-10 col-lg-6 mb-4 mb-lg-0">
                  <div class="card card-body pb-5 card-event text-white">
                    <h3 class="mb-0 fw-bold text-center" style="font-family: serif;">Akad Nikah</h3>
                    <hr>
                    <div class="row">
                      <div class="col-6 text-center">
                        <i class="far fa-lg fa-clock"></i>
                        <p class="mb-0 fw-bold">09:00 - 11:00</p>
                      </div>
                      <div class="col-6 text-center">
                        <i class="far fa-lg fa-calendar"></i>
                        <p class="mb-0 fw-bold">Sabtu, 04 Maret 2023</p>
                      </div>
                      <div class="col-12 mt-5">
                        <p class="fs-3 text-center" style="font-family: serif;">Kediaman Mempelai Wanita</p>
                        <p class="fs-5 text-center" style="font-family: serif;">Kp. Pasir Picung, RT/RW, 14/04, Desa.
                          Cibarani, Kec. Cisata
                          Pandeglang</p>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-10 col-lg-6 mb-4 mb-lg-0">
                  <div class="card card-body pb-5 card-event text-white">
                    <h3 class="mb-0 fw-bold text-center" style="font-family: serif;">Resepsi</h3>
                    <hr>
                    <div class="row">
                      <div class="col-6 text-center">
                        <i class="far fa-lg fa-clock"></i>
                        <p class="mb-0 fw-bold">11:00 - 17:00</p>
                      </div>
                      <div class="col-6 text-center">
                        <i class="far fa-lg fa-calendar"></i>
                        <p class="mb-0 fw-bold">Sabtu, 04 Maret 2023</p>
                      </div>
                      <div class="col-12 mt-5">
                        <p class="fs-3 text-center" style="font-family: serif;">Kediaman Mempelai Wanita</p>
                        <p class="fs-5 text-center" style="font-family: serif;">Kp. Pasir Picung, RT/RW, 14/04, Desa.
                          Cibarani, Kec. Cisata
                          Pandeglang</p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="wedding-galery bg-light py-4 d-none">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12 mb-3">
              <h1 class="color-primary text-center font-greeting">Gallery</h1>
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-md-4 mb-4 reveal">
                  <div class="position-relative event-bg rounded-3" style="background-image: url('<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album1.png');height: 40vh;">
                    <a href="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album1.png" class="position-absolute start-0 end-0 top-0 bottom-0" data-lightbox="roadtrip"></a>
                  </div>
                </div>
                <div class="col-md-4 mb-4 reveal">
                  <div class="position-relative event-bg rounded-3" style="background-image: url('<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album2.png');height: 40vh;">
                    <a href="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album2.png" class="position-absolute start-0 end-0 top-0 bottom-0" data-lightbox="roadtrip"></a>
                  </div>
                </div>
                <div class="col-md-4 mb-4 reveal">
                  <div class="position-relative event-bg rounded-3" style="background-image: url('<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album3.png');height: 40vh;">
                    <a href="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album3.png" class="position-absolute start-0 end-0 top-0 bottom-0" data-lightbox="roadtrip"></a>
                  </div>
                </div>
                <div class="col-md-4 mb-4 reveal">
                  <div class="position-relative event-bg rounded-3" style="background-image: url('<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album4.png');height: 40vh;">
                    <a href="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album4.png" class="position-absolute start-0 end-0 top-0 bottom-0" data-lightbox="roadtrip"></a>
                  </div>
                </div>
                <div class="col-md-4 mb-4 reveal">
                  <div class="position-relative event-bg rounded-3" style="background-image: url('<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album5.png');height: 40vh;">
                    <a href="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album5.png" class="position-absolute start-0 end-0 top-0 bottom-0" data-lightbox="roadtrip"></a>
                  </div>
                </div>
                <div class="col-md-4 mb-4 reveal">
                  <div class="position-relative event-bg rounded-3" style="background-image: url('<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album6.png');height: 40vh;">
                    <a href="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album6.png" class="position-absolute start-0 end-0 top-0 bottom-0" data-lightbox="roadtrip"></a>
                  </div>
                </div>
                <div class="col-md-4 mb-4 reveal">
                  <div class="position-relative event-bg rounded-3" style="background-image: url('<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album6.png');height: 40vh;">
                    <a href="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/img/gallery/album6.png" class="position-absolute start-0 end-0 top-0 bottom-0" data-lightbox="roadtrip"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="wedding-envelope bg-white">
        <div class="container py-5">
          <div class="row">
            <div class="col-12">
              <h3 class="color-primary text-center h3">Doa dan Restu anda merupakan kado terindah untuk kami</h3>
              <p class="color-primary text-center fs-ayat fst-italic">Jika memberi adalah ungkapan tanda kasih, anda dapat memberi kado secara cashless dengan mengirim amplop digital melalui transfer ke rekening berikut:</p>
            </div>
            <div class="col-md-6 mb-4">
              <div class="card card-body bg-light">
                <div class="text-center border-bottom mb-3">
                  <img src="<?= base_url("_assets/template/ugi-hendra/_assets/img/bri.png") ?>" alt="" class="img-fluid w-25">
                </div>
                <!-- <hr> -->
                <div class="copy-wrapper text-center">
                  <p class="mb-0 fw-bold text-center" id="data-copy">386601039547535</p>
                  <p class="text-center color-primary fs-5">A/N : <b>UGI MAFTUHAH</b></p>
                  <button class="btn bg-color-primary text-white btn-copy"><i class="fas fa-copy"></i> Salin No Rekening</button>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="card card-body bg-light">
                <div class="text-center border-bottom mb-3">
                  <h4 class="color-primary">Kirim Kado</h4>
                </div>
                <p class="mb-0 fw-bold text-center" id="data-copy">Alamat Rumah</p>
                <div class="copy-wrapper text-center">
                  <p class="text-center color-primary fs-5">Kp Pasir Picung, RT/RW, 14/04, Desa
                    Cibarani, Kecamatan Cisata
                    Pandeglang, Banten
                  </p>
                  <button class="btn bg-color-primary text-white btn-copy"><i class="fas fa-copy"></i> Salin Alamat</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="wedding-maps-location bg-color-primary">
        <div class="container py-5 reveal">
          <div class="row justify-content-center">
            <div class="col-12 text-center">
              <h1 class="text-white font-greeting">Lokasi</h1>
              <p class="text-white fw-bold" style="font-family: serif;">Kp. Pasir Picung, RT/RW, 14/04, Desa.
                Cibarani, Kec. Cisata
                Pandeglang</p>
            </div>
            <div class="col-md-10">
              <div class="px-3" style="height: 60vh;" id="maps"></div>
              <!-- <iframe width="100%" height="100%" frameborder="0" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=-6.434033946602536,105.9174481919304&amp;key=AIzaSyBkXrQtu34bjG_8Apa0cvNENa_7frfCE2w">
              </iframe> -->
              <!-- <iframe width="100%" height="100%" style="border:0" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBkXrQtu34bjG_8Apa0cvNENa_7frfCE2w
    &q=-6.434033946602536,105.9174481919304">
              </iframe> -->
            </div>
            <div class="col-12 mt-4 d-flex justify-content-center">
              <a class="btn btn-success" target="_blank" href="https://www.google.com/maps/dir/Serang,+Kota+Serang,+Banten/-6.4339527,105.917356/@-6.4338063,105.9173825,21z/data=!4m9!4m8!1m5!1m1!1s0x2e418b0dbb534a61:0x301e8f1fc28b8d0!2m2!1d106.1538519!2d-6.1169309!1m0!3e0"><i class="fas fa-paper-plane"></i> Buka Peta</a>
            </div>
          </div>
        </div>
      </div>

      <script>
        function initMap() {
          const myLatLng = {
            lat: -6.434033946602536,
            lng: 105.9174481919304
          };
          const map = new google.maps.Map(document.getElementById("maps"), {
            zoom: 16,
            center: myLatLng,
          });

          new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello World!",
          });
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=initMap&v=weekly" async></script>

      <div class="wedding-closing">
        <div class="container py-5 reveal">
          <div class="row justify-content-center">
            <div class="col-md-8 text-center">
              <h1 class="color-primary font-greeting">Konfimasi Kehadiran</h1>
            </div>
            <div class="col-md-8">
              <div class="card card-body mb-4">
                <div class="row">
                  <div class="col-12 mb-4">
                    <form action="<?= site_url("ucapan/tambah") ?>" method="post" id="form-ucapan-undangan">
                      <div class="mb-3">
                        <label for="form-nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="form-nama" name="form-nama" placeholder="Nama" required>
                      </div>
                      <div class="mb-3">
                        <label for="form-kehadiran" class="form-label">Konfirmasi</label>
                        <select class="form-control" id="form-kehadiran">
                          <option value="1">Ya, Saya Akan Hadir</option>
                          <option value="0">Maaf, Saya Berhalangan Hadir</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Ucapan</label>
                        <!-- <textarea class="form-control" id="form-ucapan" placeholder="Sampaikan Doa Terbaikmu" rows="3" required></textarea> -->
                        <input type="text" class="form-control" id="form-ucapan" placeholder="Sampaikan Doa Terbaikmu" required value="">
                      </div>
                      <button type="submit" class="btn btn-primary submit-form"><i class="fas fa-paper-plane"></i> Kirim</button>
                    </form>
                  </div>
                  <div class="col-12" id="data-ucapan" data-url="<?= site_url("ucapan/get") ?>">
                    <?php if ($ucapan) : ?>
                      <div class="scrolly pe-3" style="height:50vh;overflow: scroll;">
                        <?php foreach ($ucapan as $key => $value) : ?>
                          <div class="card mb-3">
                            <div class="card-body rounded-3">
                              <div class="row">
                                <div class="col-1 d-none d-lg-block">
                                  <div class="d-inline-block me-2 rounded-circle" style="width: 50px;">
                                    <img src="<?= base_url("_assets/images/profile/PROFILE_20230216090005_2350.png") ?>" alt="" class="img-fluid">
                                  </div>
                                </div>
                                <div class="col-10">
                                  <div class="d-inline-block">
                                    <p class="fw-bold mb-0 text-primary"><span class=""><?= $value->ucapanNama ?></span> <span>
                                        <?= $value->ucapanKehadiran == 1 ? '<i class="fas fa-check-circle text-success"></i> <span class="badge bg-success rouded-3">Hadir</span>' : '<i class="fas fa-check-circle text-success"></i>' ?>
                                      </span></p>
                                    <p class="mb-0" style="font-size: 10px;"> <i class="fas fa-clock"></i> <?= Date("l, d F Y H:i", strtotime($value->ucapanTanggal)) ?></p>
                                    <p class="mb-0"><?= $value->ucapanBase64 != null ? base64_decode($value->ucapanBase64) : $value->ucapanTeks ?></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endforeach;  ?>
                      </div>
                    <?php endif;  ?>
                  </div>
                </div>
              </div>
              <p class="color-primary text-center fs-ayat">
                Merupakan suatu kehormatan dan kebahagiaan bagi kami
                apabila Bapak/Ibu/Teman/Rekan Sekalian berkenan hadir memberikan doa restu. Atas kehadiran serta doa restunya,
                kami ucapkan terima kasih.
              </p>

              <p class="color-primary fs-ayat text-center">Jika bisa hadir kami tunggu
                konfirmasinya, Jika tidak memungkinkan untuk hadir di pernikahan kami,tidak
                mengapa,
                semoga bisa berjumpa di lain kesempatan

                <br>Stay safe & jaga kesehatan ya :)
              </p>
              <p class="color-primary fs-ayat text-center">
                Kami yang berbahagia

                <br>UGI & HENDRA
              </p>
            </div>
          </div>
        </div>
      </div>
      <footer class="bg-color-primary py-3">
        <p class="text-white text-center mb-0">2023 © Ugi & Hendra</p>
      </footer>


    </div>
  </div>
  <div class="fixed-top d-flex justify-content-end pt-3 pe-4">
    <button type="button" class="btn btn-secondary" id="btn-audio">
      <i class="fas fa-volume-up"></i>
    </button>
  </div>

  <div class="fixed-bottom d-flex justify-content-end pb-5 pe-4">
    <a href="#" class="btn btn-secondary btn-to-top" id="back-top" style="display: none;"><i class="fas fa-arrow-up btn-to-top"></i></a>
  </div>
  <audio loop="true" src="<?= base_url("_assets/template/ugi-hendra/") ?>_assets/audio/sound_new.mp3" id="audio"></audio>
</body>

</html>
