<!-- Detail Notulen -->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url('notulis') ?>" title="Ke Dasbor" class="tip-bottom">
    <i class="icon-home"></i> Dasbor</a> <a href="<?php echo base_url('notulis/list_notulen') ?>"> List Data Notulen</a> <a href="#" class="current">Detail Notulen</a> </div>
    <h1>Detail Notulen</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <a href="<?php echo base_url('notulis/list_notulen') ?>" class="btn btn-success">Kembali</a>
    <div class="row-fluid">
      <div class="span6">
        <div class="accordion" id="collapse-group">
        <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                <h5>Data Notulen</h5>
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
                      <td><b>Nama Notulis</b></td>
                      <td>: <?php echo $show->nama ?></td>
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
                    <tr>
                      <td><b>Peserta Hadir</b></td>
                      <td>
                        <ol>
                        <?php foreach ($kehadiran as $show): ?>
                            <li><?php echo $show->nama ?></li>
                        <?php endforeach; ?>
                        </ol>
                      </td>
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
          <div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Acara</a></li>
              <li><a data-toggle="tab" href="#tab2">Isi Rapat</a></li>
              <li><a data-toggle="tab" href="#tab3">Dokumentasi</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
              <p><?php echo $get_acara->acara ?></p>
            </div>
            <div id="tab2" class="tab-pane">
              <p align="justify"><?php echo $show->isi ?></p>
            </div>
            <div id="tab3" class="tab-pane">
              <p>
                <?php foreach ($images as $show): ?>
                  <img src="<?php echo base_url('assets/img/dokumentasi/'.$show->gambar) ?>" width="40%" height="40%">
                <?php endforeach; ?>
              </p>
            </div>
          </div>
        </div>
        <a href="<?php echo base_url('report/notulen_notulis/'.$show->kode) ?>" class="btn btn-danger btn-large" title="Download PDF"><i class="icon-file"></i></a>
        <div class="pull-right">
          <a href="<?php echo base_url('notulis/send_notulen/'.$show->kode) ?>" class="btn btn-warning btn-large" title="Kirim Notulen"><i class="icon-envelope"></i></a>
        </div>
      </div>
  </div>
</div>
<!-- Close Detail Notulen -->
