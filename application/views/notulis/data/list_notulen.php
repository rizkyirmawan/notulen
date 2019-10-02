<div id="content">
<div id="content-header">
  <div id="breadcrumb"> 
    <a href="<?php echo base_url() ?>notulis" title="Ke Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">List Data Notulen</a> 
  </div>
  <h1>List Data Notulen</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <?php 
    //Cetak Notif
    if($this->session->flashdata('berhasil'))
    {
      echo '<div class="alert alert-info">';
      echo '<button class="close" data-dismiss="alert">×</button>';
      echo $this->session->flashdata('berhasil');
      echo '</div>';
    }
  ?>
  <a class="btn btn-primary" href="<?php echo base_url() ?>notulis/list_acara">
  <i class="icon-flag"></i> Lihat Data Acara</a> 
  <a class="btn btn-warning" title="Cetak PDF" href="<?php echo base_url() ?>report/print_notulen">
  <i class="icon-print"></i> Cetak PDF</a>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>List Data Notulen</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Pengaju Acara</th>
                <th>Notulis</th>
                <th>Tanggal Rapat</th>
                <th>Tempat Rapat</th>
                <th>Pukul</th>
                <th>Detail</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($list as $show): ?>
              <tr class="gradeX">
                <td><?php echo $no ?></td>
                <td><?php echo $show->pengaju ?></td>
                <td><?php echo $show->nama ?></td>
                <td><?php echo TanggalIndo($show->tanggal); ?></td>
                <td><?php echo $show->tempat ?></td>
                <td><?php echo $show->pukul ?> - Selesai</td>
                <td>
                  <a class="btn btn-default btn-large" href="<?php echo base_url('notulis/detail_notulen/'.$show->kode) ?>" title="Lihat Detail"><i class="icon-eye-open"></i></a> 
                </td>
                <td>
                  <a class="btn btn-success btn-large" href="<?php echo base_url('notulis/update_notulen/'.$show->kode) ?>" title="Edit"><i class="icon-edit"></i></a> 
                  <?php include 'delete_notulen.php' ?>
                </td>
                <?php $no++; endforeach; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
