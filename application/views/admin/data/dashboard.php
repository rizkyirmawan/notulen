<div id="content">
<div id="content-header">
  <div id="breadcrumb"> 
    <a href="#" class="current"><i class="icon-home"></i> Dashboard</a>
  </div>
  <h1>Dashboard</h1>
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
  <a class="btn btn-success" href="<?php echo base_url() ?>admin/list_notulis"> Kelola Data</a>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>List Data Notulis</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Bagian</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($list_notulis as $show): ?>
              <tr class="gradeX">
                <td><?php echo $no ?></td>
                <td><?php echo $show->nama ?></td>
                <td><?php echo $show->email ?></td>
                <td><?php echo $show->no_telp ?></td>
                <td><?php echo $show->role ?></td>
                <?php $no++; endforeach; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  <a class="btn btn-success" href="<?php echo base_url() ?>admin/list_peserta"> Kelola Data</a>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>List Data Peserta</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Bagian</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($list_peserta as $show): ?>
              <tr class="gradeX">
                <td><?php echo $no ?></td>
                <td><?php echo $show->nama ?></td>
                <td><?php echo $show->email ?></td>
                <td><?php echo $show->no_telp ?></td>
                <td><?php echo $show->bagian ?></td>
                <?php $no++; endforeach; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    <a class="btn btn-success" href="<?php echo base_url() ?>admin/list_acara"> Kelola Data</a>
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
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($list_acara as $show): ?>
            <tr class="gradeX">
              <td><?php echo $no ?></td>
              <td><?php echo $show->pengaju ?></td>
              <td><?php echo $show->tempat ?></td>
              <td><?php echo TanggalIndo($show->tanggal) ?></td>
              <td><?php echo $show->pukul ?> - Selesai</td>
              <td><?php if(($show->status)==''){ echo 'Baru Direncanakan'; } else { echo $show->status; } ?></td>
              <?php $no++; endforeach; ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  <a class="btn btn-success" href="<?php echo base_url() ?>admin/list_notulen"> Kelola Data</a>
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
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($list_notulen as $show): ?>
            <tr class="gradeX">
              <td><?php echo $no ?></td>
              <td><?php echo $show->pengaju ?></td>
              <td><?php echo $show->nama ?></td>
              <td><?php echo TanggalIndo($show->tanggal) ?></td>
              <td><?php echo $show->tempat ?></td>
              <td><?php echo $show->pukul ?> - Selesai</td>
              <?php $no++; endforeach; ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    </div>
  </div>
</div>
