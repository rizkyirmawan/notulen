<!DOCTYPE html>
<html>
<head>
  <title>Notulen Rapat <?php echo TanggalIndo(date('Y-m-d')); ?></title>
</head>
<body>
    <center><img src="<?php echo base_url('./assets/img/header.jpg') ?>"></center>
    <hr>
    <center>Notulen Rapat</center><hr>
    <table>
      <tbody>
        <tr>
          <td>Tanggal</td>
          <td>:</td>
          <td><?php echo TanggalIndo($show->tanggal) ?></td>
        </tr>
        <tr>
          <td>Tempat</td>
          <td>:</td>
          <td><?php echo $show->tempat ?></td>
        </tr>
        <tr>
          <td>Pukul</td>
          <td>:</td>
          <td><?php echo $show->pukul ?> - Selesai</td>
        </tr>
        <tr>
          <td>Peserta Hadir</td>
          <td>:</td>
          <td>
            <ol>
            <?php foreach ($hadir as $show): ?>
            <li><?php echo $show->nama ?></li>
            <?php endforeach; ?>
            </ol>
          </td>
        </tr>
        <tr>
          <td>Acara</td>
          <td>:</td>
          <td><?php echo $get_acara->acara ?></td>
        </tr>
      </tbody>
    </table>
    <p align="justify"><?php echo $show->isi ?></p>
    <p><strong>Dokumentasi:</strong></p> <br>
    <?php foreach ($images as $show): ?>
      <img src="<?php echo base_url('assets/img/dokumentasi/'.$show->gambar) ?>" width="20%" height="20%">
    <?php endforeach; ?>
  </body>
</html>