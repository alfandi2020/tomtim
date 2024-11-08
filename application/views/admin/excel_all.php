<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=Report-All-Pembayaran.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>

        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Paket Internet</th>
            <th>Tagihan</th>
            <th>Penerima Pembayaran</th>
            <th>Periode</th>
            <th>Tanggal Pembayaran</th>

        </tr>

    </thead>

    <tbody>

        <?php $i = 1;
        if ($excel2 > 0) {
            foreach ($excel2 as $user) {
                $total = $user->tagihan + floatval($user->addon1) + floatval($user->addon2) + floatval($user->addon3) - floatval($user->tagihan_diskon);
        ?>

                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $user->nama ?></td>

                    <td><?php echo $user->paket ?></td>

                    <td><?php echo  $total ?></td>
                    <td><?php echo $user->penerima ?></td>

                    <td><?php echo $user->periode ?></td>

                    <td><?php echo $user->tanggal ?></td>

                </tr>

            <?php
            }
        } else { ?>
            <tr>
                <td>data kosong</td>
            </tr>
        <?php } ?>

    </tbody>

</table>