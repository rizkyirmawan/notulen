<div id="content">
<div id="content-header">
  <div id="breadcrumb"> 
    <a href="<?php echo base_url() ?>admin" title="Ke Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <a href="#" class="current">List Data Acara</a> 
  </div>
  <h1>List Data Acara</h1>
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
  <a class="btn btn-info" href="<?php echo base_url() ?>admin/create_acara">
  <i class="icon-plus"></i> Tambah Data</a> 
  <a class="btn btn-warning" title="Cetak PDF" href="<?php echo base_url() ?>report/print_acara">
  <i class="icon-print"></i> Cetak PDF</a>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>List Data Acara</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Pengaju</th>
                <th>Tempat</th>
                <th>Tanggal</th>
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
                <td><?php echo $show->tempat ?></td>
                <td><?php echo TanggalIndo($show->tanggal); ?></td>
                <td><?php echo $show->pukul ?> - Selesai</td>
                <td>
                  <a class="btn btn-default btn-large" href="<?php echo base_url('admin/detail_acara/'.$show->id) ?>" title="Lihat Detail"><i class="icon-eye-open"></i></a> 
                </td>
                <td>
                  <a class="btn btn-success btn-large" href="<?php echo base_url('admin/update_acara/'.$show->id) ?>" title="Edit"><i class="icon-edit"></i></a> 
                  <?php include 'delete_acara.php' ?>
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
