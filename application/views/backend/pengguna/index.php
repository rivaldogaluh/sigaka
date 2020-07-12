<div class="row">
	<div class="col-md-12">
		<div class="card box-shadow-2">
			<?php
			if ($this->session->flashdata('alert') == 'tambah_karyawan'):
				?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Data berhasil ditambahkan
				</div>
			<?php
			elseif ($this->session->flashdata('alert') == 'update_karyawan'):
				?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Data berhasil diupdate
				</div>
			<?php
			elseif ($this->session->flashdata('alert') == 'hapus_pengguna'):
				?>
				<div class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Data berhasil dihapus
				</div>
			<?php
			endif;
			?>
            <?= $this->session->flashdata('message'); ?>
			
			<div class="card-header">
				<h1 style="text-align: center">Data Pengguna</h1>
<<<<<<< HEAD
				<?php if ($this->session->userdata('session_hak_akses') == 'admin' || $this->session->userdata('session_hak_akses') == 'manajer'): ?>
=======
				<?php if ($this->session->userdata('session_hak_akses') == 'admin' || 'manajer'):?>
>>>>>>> 6123fa714bcf54e58e5ab4c42f537d7cf5cf5b35
				<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2" data-toggle="modal" data-target="#bootstrap">
					<i class="ft-plus-circle"></i> Tambah data pengguna
				</button>
				<?php endif; ?>
			</div>
			<hr>
			<div class="card-body">
				<table class="table table-bordered zero-configuration">
					<thead>
					<tr>
						<th>No</th>
						<th>Foto</th>
						<th>Username</th>
						<th>Nama</th>
						<th>Hak Akses</th>
						<td style="text-align: center"><i class="ft-settings spinner"></i></td>
					</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						foreach ($pengguna as $pg => $value):
						?>
						<tr>
							<td><?= $no ?></td>
							<td>
								<img src="<?= base_url('assets/images/profile/') . $value['pengguna_foto']; ?>" alt="avatar" width="30px" height="30px">
							</td>
							<td><?= $value['pengguna_username'] ?></td>
							<td><?= $value['pengguna_nama'] ?></td>
							<td><?= $value['hak_akses'] ?></td>
							<td>
<<<<<<< HEAD
								<?php if ($this->session->userdata('session_hak_akses') == 'admin' || $this->session->userdata('session_hak_akses') == 'manajer'): ?>
								<a href="" class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 update_pengguna" data-toggle="modal" data-target="#ubah<?= $value['pengguna_id']; ?>" title="Update data pengguna"><i class="ft-edit"></i>
								</a>
								<a href="<?= base_url('pengguna/hapus/'). $value['pengguna_id']; ?>"
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 pengguna-hapus" title="Hapus data pengguna" onclick="return confirm('Hapus Data Pengguna?');"><i class="ft-trash"></i>
								</a>
								
=======
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 pengguna-lihat" data-toggle="modal" data-target="#lihat" value="<?= $value['pengguna_id'] ?>" title="Lihat selengkapnya"><i class="ft-eye"></i></button>
									<?php if ($this->session->userdata('session_hak_akses') == 'admin' || 'manajer'):?>
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 pengguna-edit" data-toggle="modal" data-target="#ubah" title="Update data pengguna" value="<?= $value['pengguna_id']; ?>"><i class="ft-edit"></i></button>
								<button
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 pengguna-hapus" data-toggle="modal" data-target="#hapus" value="<?= $value['pengguna_id'] ?>" title="Hapus data pengguna"><i class="ft-trash"></i>
								</button>
>>>>>>> 6123fa714bcf54e58e5ab4c42f537d7cf5cf5b35
									<?php endif;?>
							</td>
						</tr>
						<?php
							$no++;
							endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal tambah -->
<div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Tambah Data Pengguna</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('pengguna/tambah') ?>
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="nama">Nama Lengkap</label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="nama">Password</label>
					<input type="password" class="form-control" name="password1" id="password1" placeholder="Password" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="nama">Ulangi Password</label>
					<input type="password" class="form-control" name="password2" id="password2" placeholder="Ulangi Password" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="jabatan">Hak Akses</label>
<<<<<<< HEAD
					<select name="hak_akses_id" id="hak_akses_id" class="form-control">
						<option value=""></option>
						<?php foreach ($hakakses as $pha): ?>
                            <option value="<?= $pha['hak_akses_id']; ?>"><?= $pha['hak_akses']; ?></option>
						<?php endforeach; ?>
=======
					<select name="pengguna_hak_akses" id="pengguna_hak_akses" class="form-control">
							<option value="">Pilih Hak Akses</option>
							<option value="manajer">Manajer</option>
							<option value="karyawan">Karyawan</option>
>>>>>>> 6123fa714bcf54e58e5ab4c42f537d7cf5cf5b35
					</select>
				</fieldset>
				<!-- <fieldset class="form-group floating-label-form-group">
					<label for="tg">Tanggal Bergabung</label>
					<div class='input-group'>
						<input type="date" class="form-control" id="tg" name="tanggal_gabung" placeholder="Tanggal Bergabung" autocomplete="off" required>
						<div class="input-group-append">
							<span class="input-group-text">
								<span class="ft-calendar"></span>
							</span>
						</div>
					</div>
				</fieldset> -->
				<!-- <fieldset class="form-group floating-label-form-group">
					<label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">   
				</fieldset> -->
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal" value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="simpan" value="Simpan">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>


<!-- Modal lihat -->
<div class="modal fade text-left" id="lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Lihat Data Pengguna</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_username">Username</label>
					<input type="text" class="form-control" name="pengguna_username" id="lihat_username" placeholder="Username" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_nama">Nama</label>
					<input type="text" class="form-control" name="pengguna_nama" id="lihat_nama" placeholder="Nama Pengguna" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_password">Password</label>
					<input type="text" class="form-control" name="pengguna_password" id="lihat_password" value="" placeholder="Password" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_hak_akses">Hak Akses</label>
					<input type="text" class="form-control" name="pengguna_hak_akses" id="lihat_hak_akses" value="" placeholder="Hak Akses" autocomplete="off" readonly>
				</fieldset>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal" value="Tutup">
			</div>
		</div>
	</div>
</div>


<!-- Modal update -->
<<<<<<< HEAD
<?php foreach ($pengguna as $value): ?>
<div class="modal fade text-left" id="ubah<?= $value['pengguna_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

=======
<div class="modal fade text-left" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?= base_url('pengguna/update'); ?>" method="post">
>>>>>>> 6123fa714bcf54e58e5ab4c42f537d7cf5cf5b35
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Pengguna</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
<<<<<<< HEAD
			<form action="<?= base_url('pengguna/update'); ?>" method="post">
			<input type="hidden" name="pengguna_id" value="<?= $value['pengguna_id']; ?>">
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_username">Username</label>
					<input type="hidden" id="karyawan_id" name="id">
					<input type="text" class="form-control" name="pengguna_username" id="edit_username" placeholder="Username" value="<?= $value['pengguna_username']; ?>" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_nama">Nama Lengkap</label>
					<input type="text" class="form-control" name="pengguna_nama" id="edit_nama" placeholder="Nama Lengkap" value="<?= $value['pengguna_nama']; ?>" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_pass">Password Lama</label>
					<input type="text" class="form-control" name="pengguna_password" value="<?= $value['pengguna_password']; ?>" id="disabledInput" placeholder="Disabled input here..." disabled>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_pass">Password Lama</label>
					<input type="text" class="form-control" name="passwordbaru1" id="passwordbaru1" placeholder="Password Baru" autocomplete="off">
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_pass">Ulangi Password</label>
					<input type="text" class="form-control" name="passwordbaru2" id="passwordbaru2" placeholder="Password Baru" autocomplete="off">
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_ha">Hak Akses</label>
					<select name="hak_akses_id" id="hak_akses" class="select2 form-control" style="width: 100%">
						<?php foreach ($hakakses as $pha): ?>
							<?php if ($pha['hak_akses_id'] == $value['hak_akses_id']) : ?>
                            	<option value="<?= $pha['hak_akses_id']; ?>" selected><?= $pha['hak_akses']; ?></option>
                            <?php else : ?>
                                <option value="<?= $pha['hak_akses_id']; ?>"><?= $pha['hak_akses']; ?>
                            <?php endif; ?>
						<?php endforeach; ?>
					</select>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_foto">Foto</label>
					<label for="foto"><img src="<?= base_url('assets/images/profile/') . $value['pengguna_foto']; ?>" alt="avatar" width="50px" height="50px">&nbsp;&nbsp;</label>
                        <input type="file" class="form-control" id="pengguna_foto" name="pengguna_foto">   
=======
			
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_nama">Username</label>
					<input type="hidden" id="karyawan_id" name="id">
					<input type="text" class="form-control" name="pengguna_username" id="edit_username" placeholder="Username" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_tempat">Nama Lengkap</label>
					<input type="text" class="form-control" name="pengguna_nama" id="edit_nama" placeholder="Nama Lengkap" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_tempat">Password</label>
					<input type="text" class="form-control" name="pengguna_password" id="edit_password" placeholder=" Password" autocomplete="off" required>
				</fieldset>				
				
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_ha">Hak Akses</label>
					<select name="pengguna_hak_akses" id="hak_akses" class="select2 form-control" style="width: 100%">
						<?php foreach ($hakakses as $pha): ?>
							<?php if ($pha['pengguna_id'] == $value['pengguna_id']) : ?>
                                <option value="<?= $pha['pengguna_id']; ?>" selected><?= $pha['pengguna_hak_akses']; ?></option>
                            <?php else : ?>
                                <option value="<?= $pha['pengguna_id']; ?>"><?= $pha['pengguna_hak_akses']; ?>
                            <?php endif; ?>
						<?php endforeach; ?>
					</select>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="jabatan">Jabatan</label>
					<select name="jabatan" id="jabatan" class="select2 form-control" style="width: 100%">
						
					</select>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_nohp">Nomor HP</label>
					<input type="number" class="form-control" id="edit_nohp" name="nomor_hp" placeholder="Nomor HP" autocomplete="off" required>
>>>>>>> 6123fa714bcf54e58e5ab4c42f537d7cf5cf5b35
				</fieldset>
				
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal" value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="update" value="Update">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<?php endforeach; ?>


<!-- Modal hapus -->
<div class="modal fade text-left" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Hapus Data Pengguna ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal" value="Tutup">
				<div id="hapuspengguna">

				</div>
			</div>
		</div>
	</div>
</div>
