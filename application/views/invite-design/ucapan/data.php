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
 <?php endforeach; ?>