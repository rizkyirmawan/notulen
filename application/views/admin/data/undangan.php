<!DOCTYPE html>
<html>
<head>
  <title>Undangan Rapat STMIK Bandung</title>
</head>
<body>
    <center><img src="<?php echo base_url('./assets/img/header.jpg') ?>"></center>
    <hr>
    <center>Undangan Rapat</center><hr>
    <p align="right"><?php echo TanggalIndo(date('Y-m-d')) ?></p>
    Kepada <br> 
    Yth. <br>
    Bapak/Ibu Terundang <br>
    di, <br>
    &emsp; Tempat <br>
    <p> Assalamu'alaikum Wr. Wb.<br>
      &emsp; Sehubungan dengan diadakannya <b><i>Acara Rapat</i></b> kami panitia mengundang yang terkait untuk hadir pada: </p>
    <table align="center">
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
          <td>Waktu</td>
          <td>:</td>
          <td><?php echo $show->pukul ?> - Selesai</td>
        </tr>
        <tr>
          <td>Acara</td>
          <td>:</td>
          <td rowspan="2"><?php echo $show->acara ?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <p>Atas perhatian Bapak/Ibu yang kami hormati, kami ucapkan terima kasih. <br> Wassalamu'alaikum Wr. Wb. </p> <br>
  </body>
</html>