<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('admin') ?>" title="Ke Dasbor" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php echo base_url('admin/list_notulen') ?>"> List Data Notulen</a> <a href="#" class="current">Kirim Hasil Notulen</a> </div>
    <h1>Kirim Hasil Notulen</h1>
  </div>
  <div class="container-fluid">
  <hr>
    <div class="row-fluid">
      <div class="span12">
      <?php 
        echo validation_errors(
          '<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button>','</div>');
      ?>
      <a href="#" onclick="history.go(-1)" class="btn btn-success">Kembali</a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
          </div>
          <div class="widget-content nopadding">
            <?php echo form_open(base_url('admin/send_notulen/'.$show->kode), array('class' => 'form-horizontal')) ?>
            <input type="hidden" name="kode" value="<?php echo $show->kode ?>">
              <div class="control-group">
                <label class="control-label">Kirimkan Ke:</label>
                <div class="controls">
                  <?php foreach ($hadir as $show): ?>
                    <label>
                    <input type="checkbox" name="kehadiran[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Kirim" class="btn btn-info">
              </div>
              <?php echo form_close(); ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
