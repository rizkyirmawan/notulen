<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('notulis') ?>" title="Ke Dasbor" class="tip-bottom">
    <i class="icon-home"></i> Dashboard</a> <a href="<?php echo base_url('notulis/list_acara') ?>"> List Data Acara</a> <a href="#" class="current">Kirim Undangan Acara</a> </div>
    <h1>Kirim Undangan Acara</h1>
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
            <?php echo form_open(base_url('notulis/send_invite/'.$show->id), array('class' => 'form-horizontal')) ?>
            <div class="control-group">
                <input type="hidden" name="id" value="<?php echo $show->id ?>">
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
              <?php if ($this->session->userdata('role')=='General') { ?>
              <div class="control-group">
                <label class="control-label">Bagian Umum:</label>
                <div class="controls">
                  <?php foreach ($umum as $show): ?>
                    <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Bagian Akademik:</label>
                <div class="controls">
                  <?php foreach ($akademik as $show): ?>
                    <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Dosen:</label>
                <div class="controls">
                  <?php foreach ($dosen as $show): ?>
                    <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Bagian BEM:</label>
                <div class="controls">
                  <?php foreach ($bem as $show): ?>
                    <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <?php } elseif ($this->session->userdata('role')=='Akademik') {?>
              div class="control-group">
                <label class="control-label">Bagian Akademik:</label>
                <div class="controls">
                  <?php foreach ($akademik as $show): ?>
                    <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Dosen:</label>
                <div class="controls">
                  <?php foreach ($dosen as $show): ?>
                    <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <?php } elseif ($this->session->userdata('role')=='BEM') { ?>
              <div class="control-group">
                <label class="control-label">Bagian Akademik:</label>
                <div class="controls">
                  <?php foreach ($akademik as $show): ?>
                    <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Dosen:</label>
                <div class="controls">
                  <?php foreach ($dosen as $show): ?>
                    <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Bagian BEM:</label>
                <div class="controls">
                  <?php foreach ($bem as $show): ?>
                    <label>
                    <input type="checkbox" name="undangan[]" value="<?php echo $show->email ?>" />
                    <?php echo $show->nama ?></label>
                  <?php endforeach; ?>
                </div>
              </div>
              <?php } ?>
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
