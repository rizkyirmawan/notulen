<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('notulis') ?>" title="Ke Dasbor" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php echo base_url('notulis/list_acara') ?>"> List Data Acara</a> <a href="#" class="current">Tambah Data Notulen</a> </div>
    <h1>Tambah Data Notulen</h1>
  </div>
  <div class="container-fluid">
  <hr>
    <div class="row-fluid">
      <div class="span12">
      <?php 
        echo validation_errors(
          '<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button>','</div>');
      ?>
      <?php if($show->tanggal != date('Y-m-d')) { ?>
      <div class="alert alert-error alert-block">
              <h4 class="alert-heading">Peringatan</h4>
              Acara rapat dimulai pada tanggal <strong><?php echo TanggalIndo($show->tanggal) ?></strong> pada pukul <?php echo $show->pukul ?> WIB. Jika peringatan ini muncul, maka acara rapat belum dimulai atau sudah kadaluarsa. Silahkan buat notula pada tanggal yang tertera.</div>
      <a href="#" onclick="history.go(-1)" class="btn btn-success">Kembali</a>
      <?php } else { ?>
      <a href="#" onclick="history.go(-1)" class="btn btn-success">Kembali</a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Form Tambah</h5>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open_multipart(base_url('notulis/create_notulen/'.$show->id), array('class' => 'form-horizontal')) ?>
              <div class="control-group">
                <input type="hidden" name="kode"  value="<?php echo $kodeauto ?>">
                <input type="hidden" name="id_acara" value="<?php echo $show->id ?>">
                <input type="hidden" name="id_notulis"  value="<?php echo $this->session->userdata('id'); ?>">
                <label class="control-label">Pengaju Acara:</label>
                <div class="controls">
                  <input type="text" name="pengaju" class="span5" value="<?php echo $show->pengaju ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tempat:</label>
                <div class="controls">
                  <textarea name="tempat" rows="5" class="span5" readonly><?php echo $show->tempat ?></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tanggal:</label>
                <div class="controls">
                  <input type="text" name="tanggal" class="span5" value="<?php echo TanggalIndo($show->tanggal) ?>" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Pukul:</label>
                <div class="controls">
                  <input type="text" name="pukul" class="span3" value="<?php echo $show->pukul ?> - Selesai" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Isi Rapat:</label>
                <div class="controls">
                  <textarea name="isi" class="textarea_editor span7" rows="15"><?php echo set_value('isi'); ?></textarea>
                </div>
              </div>
              <div class="control-group">
              <label class="control-label">Gambar:</label>
                <div class="controls">
                  <input type="file" name="gambar[]" multiple="multiple" />
                  <span class="help-block blue">Maks. 2MB/File</span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Peserta Yang Hadir:</label>
                <div class="controls">
                  <?php foreach ($invited as $show): ?>
                    <label>
                    <input type="checkbox" name="kehadiran[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Simpan" class="btn btn-info">
                <input type="reset" value="Reset" class="btn btn-default">
              </div>
              <?php echo form_close(); ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
