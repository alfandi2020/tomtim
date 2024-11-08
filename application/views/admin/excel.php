<?php

header("Content-type: application/octet-stream");
foreach ($excel as $x) {
    $ff = $x->periode;
    header("Content-Disposition: attachment; filename=Report-Pembayaran-$ff.xls");
}
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
            <th>Diskon</th>
            <th>Total Add on</th>
            <th>Penerima Pembayaran</th>
            <th>Periode</th>
            <th>Tanggal Pembayaran</th>

        </tr>

    </thead>

    <tbody>

        <?php $i = 1;
        if ($excel > 0) {
            foreach ($excel as $user) {
                $total = $user->tagihan + floatval($user->addon1) + floatval($user->addon2) + floatval($user->addon3) - floatval($user->tagihan_diskon);
        ?>

                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $user->nama ?></td>

                    <td><?php echo $user->paket ?></td>
                    <td><?php echo $total ?></td>
                    <td><?php echo $user->tagihan_diskon ?></td>
                    <td><?php echo  floatval($user->addon1) + floatval($user->addon2) + floatval($user->addon3) ?></td>
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
