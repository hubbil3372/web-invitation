<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $title; ?></h3>
        </div>
        <div class="card-body">
          <?= form_open('', 'class="align-self-center"'); ?>
          <div class="row">
            <div class="col-md-12">
              <div class="mb-4">
                <label class="form-label" for="undanganNama">Nama Undangan</label>
                <input class="form-control <?= form_error('undanganNama') ? 'is-invalid' : null; ?>" id="undanganNama" name="undanganNama" type="text" value="<?= set_value('undanganNama'); ?>">
                <div class="invalid-feedback">
                  <?= form_error('undanganNama') ?>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-4">
                <label class="form-label" for="undanganNoHp">No HP/WA</label>
                <input class="form-control <?= form_error('undanganNoHp') ? 'is-invalid' : null; ?>" pattern="[0-9]+" maxlength="15" id="undanganNoHp" name="undanganNoHp" type="text" value="<?= set_value('undanganNoHp'); ?>">
                <div class="invalid-feedback">
                  <?= form_error('undanganNoHp') ?>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-4">
                <label class="form-label" for="undanganJenis">Jenis Undangan</label>
                <select name="undanganJenis" id="undanganJenis" class="form-control <?= form_error('undanganJenis') ? 'is-invalid' : null; ?>">
                  <option value="">Pilih Jenis</option>
                  <option value="1" <?= set_value('undanganJenis') == '1' ? 'selected' : null ?>>Privasi</option>
                  <option value="0" <?= set_value('undanganJenis') == '0' ? 'selected' : null ?>>Tidak Privasi</option>
                </select>
                <div class="invalid-feedback">
                  <?= form_error('undanganJenis') ?>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-4">
                <label class="form-label" for="undanganStatus">Status Undangan</label>
                <select name="undanganStatus" id="undanganStatus" class="form-control <?= form_error('undanganStatus') ? 'is-invalid' : null; ?>">
                  <option value="">Pilih Status</option>
                  <option value="1" <?= set_value('undanganStatus') == '1' ? 'selected' : null ?>>Aktif</option>
                  <option value="0" <?= set_value('undanganStatus') == '0' ? 'selected' : null ?>>Tidak Aktif</option>
                </select>
                <div class="invalid-feedback">
                  <?= form_error('undanganStatus') ?>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-4">
                <label class="form-label" for="undanganAlamat">Alamat</label>
                <input class="form-control <?= form_error('undanganAlamat') ? 'is-invalid' : null; ?>" id="undanganAlamat" name="undanganAlamat" type="text" value="<?= set_value('undanganAlamat'); ?>">
                <div class="invalid-feedback">
                  <?= form_error('undanganAlamat') ?>
                </div>
              </div>
            </div>
          </div>

          <button class="btn btn-success waitme" type="submit">Simpan</button>
          <?= form_close() ?>

        </div>
      </div>
    </div>
  </div>
</div>