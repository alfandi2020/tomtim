<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=Report-Client-Pembayaran.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

	<thead>

		<tr>
			<th>No.</th>
			<th>Layanan</th>
			<th>Speed</th>
			<th>Addon 1</th>
			<th>Addon 2</th>
			<th>Addon 3</th>
			<th>Note</th>
			<th>Nama</th>
			<th>Identitas</th>
			<th>Nomor</th>
			<th>Alamat</th>
			<th>Kodepos</th>
			<th>kontak</th>
			<th>Email</th>
			<th>Tindakan</th>
			<th>Nama Pelanggan</th>
			<th>Identitas Pelanggan</th>
			<th>Nomor</th>
			<th>Alamat Pelanggan</th>
			<th>Kodepos Pelanggan</th>
			<th>Npwp</th>
			<th>Kontak Pelanggan</th>
			<th>Email Pelanggan</th>
			<th>Pembayaran</th>
			<th>Tanggal Installasi</th>

		</tr>

	</thead>

	<tbody>

		<?php $i = 1;
		if ($client > 0) {
			foreach ($client as $user) {
		?>

				<tr>
					<td><?php echo $i++ ?></td>
					<td><?php echo $user->layanan ?></td>
					<td><?php echo $user->mbps . " Mbps" ?></td>
					<td><?php echo $user->addon1 ?></td>
					<td><?php echo $user->addon2 ?></td>
					<td><?php echo $user->addon3 ?></td>
					<td><?php echo $user->noteee ?></td>
					<td><?php echo $user->nama ?></td>
					<td><?php echo $user->ktp_sim ?></td>
					<td><?php echo  $user->nomor . "'" ?></td>
					<td><?php echo $user->alamat ?></td>
					<td><?php echo $user->kodepos ?></td>
					<td><?php echo $user->kontak . "'" ?></td>
					<td><?php echo $user->email ?></td>
					<td><?php echo $user->tindakan ?></td>
					<td><?php echo $user->nama_pelanggan ?></td>
					<td><?php echo $user->ktp_sim_pelanggan ?></td>
					<td><?php echo $user->nomor_pelanggan . "'" ?></td>
					<td><?php echo $user->alamat_pelanggan ?></td>
					<td><?php echo $user->kodepos_pelanggan ?></td>
					<td><?php echo $user->npwp ?></td>
					<td><?php echo $user->kontak_pelanggan . "'" ?></td>
					<td><?php echo $user->email_pelanggan ?></td>
					<td><?php echo $user->pembayaran ?></td>
					<td><?php echo $user->tanggal_installasi ?></td>

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