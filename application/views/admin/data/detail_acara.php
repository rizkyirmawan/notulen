<!-- Detail Acara -->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('admin') ?>" title="Ke Dasbor" class="tip-bottom">
    <i class="icon-home"></i> Dasbor</a> <a href="<?php echo base_url('admin/list_acara') ?>"> List Data Acara</a> <a href="#" class="current">Detail Acara</a> </div>
    <h1>Detail Acara</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <a href="<?php echo base_url('admin/list_acara') ?>" class="btn btn-success">Kembali</a>
    <div class="row-fluid">
      <div class="span6">
        <div class="accordion" id="collapse-group">
        <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                <h5>Data Acara</h5>
                </a> </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content nopadding">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Field</th>
                      <th>Data</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><b>Nama Pengaju Acara</b></td>
                      <td>: <?php echo $show->pengaju ?></td>
                    </tr>
                    <tr>
                      <td><b>Tempat</b></td>
                      <td>: <?php echo $show->tempat ?></td>
                    </tr>
                    <tr>
                      <td><b>Tanggal</b></td>
                      <td>: <?php echo TanggalIndo($show->tanggal) ?></td>
                    </tr>
                    <tr>
                      <td><b>Pukul</b></td>
                      <td>: <?php echo $show->pukul.' - Selesai' ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list-alt"></i> </span>
            <h5>Acara</h5>
          </div>
          <div class="widget-content"> 
          <?php echo $show->acara ?>
          </div>
        </div>
        <a href="<?php echo base_url('report/undangan_admin/'.$show->id) ?>" class="btn btn-danger btn-large" title="Download PDF"><i class="icon-file"></i></a>
        <?php if(($show->status)=='') { ?>
        <div class="pull-right">
          <a href="<?php echo base_url('admin/send_invite/'.$show->id) ?>" class="btn btn-warning btn-large" title="Kirim Undangan"><i class="icon-envelope"></i></a>
        </div>
        <?php } elseif(($show->status)=='Undangan Terkirim') { ?>
        <div class="pull-right">
          <a href="<?php echo base_url('admin/rollback_invite/'.$show->id) ?>" class="btn btn-default btn-large" title="Rollback Undangan"><i class="icon-envelope"></i></a> 
          <a href="<?php echo base_url('admin/create_notulen/'.$show->id) ?>" class="btn btn-success btn-large" title="Buat Notula"><i class="icon-book"></i></a>
        </div>
        <?php } ?>
      </div> 
  </div>
</div>
<!-- Close Detail Acara -->
