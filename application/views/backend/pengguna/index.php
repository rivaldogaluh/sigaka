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
			elseif ($this->session->flashdata('alert') == 'hapus_karyawan'):
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
			<div class="card-header">
				<h1 style="text-align: center">Data Pengguna</h1>
				<?php if ($this->session->userdata('session_hak_akses') == 'manajer'):?>
				<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2"
						data-toggle="modal" data-target="#bootstrap">
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
							<td><img src="<?= base_url() ?>assets/images/portrait/small/profil-circle-512.png" alt="avatar" width="30px" height="30px"></td>
							<td><?= $value['pengguna_username'] ?></td>
							<td><?= $value['pengguna_nama'] ?></td>
							<td><?= $value['pengguna_hak_akses'] ?></td>
							<td>
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 pengguna-lihat" data-toggle="modal" data-target="#lihat" value="<?= $value['pengguna_id'] ?>"
									title="Lihat selengkapnya"><i class="ft-eye"></i></button>
									<?php if ($this->session->userdata('session_hak_akses') == 'manajer'):?>
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 pengguna-edit" data-toggle="modal" data-target="#ubah" value="<?= $value['pengguna_id'] ?>"
									title="Update data pengguna"><i class="ft-edit"></i></button>
								<button
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 pengguna-hapus" data-toggle="modal" data-target="#hapus" value="<?= $value['pengguna_id'] ?>" title="Hapus data pengguna"><i class="ft-trash"></i></button>
									<?php 
										if ($this->session->userdata('session_hak_akses') == 'manajer') 
									?>
								<?php endif; ?>
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
					<label for="nama">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Karyawan"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="tempat">Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir" id="tempat" placeholder="Tempat Lahir"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="tl">Tanggal Lahir</label>
					<div class='input-group'>
						<input type="date" class="form-control" name="tanggal_lahir" id="tl" placeholder="Tanggal Lahir"
							   autocomplete="off" required>
						<div class="input-group-append">
										<span class="input-group-text">
											<span class="ft-calendar"></span>
										</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="alamat">Alamat</label>
					<textarea class="form-control" id="alamat" rows="3" name="alamat" placeholder="Alamat"
							  autocomplete="off" required></textarea>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="tg">Tanggal Bergabung</label>
					<div class='input-group'>
						<input type="date" class="form-control" id="tg" name="tanggal_gabung"
							   placeholder="Tanggal Bergabung" autocomplete="off" required>
						<div class="input-group-append">
										<span class="input-group-text">
											<span class="ft-calendar"></span>
										</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="jabatan">Jabatan</label>
					<select name="jabatan" id="basicSelect" class="form-control">
						<?php
						foreach ($jabatan as $key => $value):
							?>
							<option value="<?= $value['jabatan_id'] ?>"><?= $value['jabatan_nama'] ?></option>
						<?php
						endforeach;
						?>
					</select>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="nohp">Nomor HP</label>
					<input type="number" class="form-control" id="nohp" name="nomor_hp" placeholder="Nomor HP"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="norek">Nomor Rekening</label>
					<input type="number" class="form-control" id="norek" name="nomor_rekening" placeholder="Nomor rekening boleh kosong"
						   autocomplete="off">
				</fieldset>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="simpan" value="Simpan">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>


<!-- Modal lihat -->
<div class="modal fade text-left" id="lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
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
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_alamat">Alamat</label>
					<textarea class="form-control" id="lihat_alamat" rows="3" name="alamat" placeholder="Alamat"
							  autocomplete="off" readonly></textarea>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_tg">Tanggal Bergabung</label>
					<div class='input-group'>
						<input type="date" class="form-control" id="lihat_tg" name="tanggal_gabung"
							   placeholder="Tanggal Bergabung" autocomplete="off" readonly>
						<div class="input-group-append">
										<span class="input-group-text">
											<span class="ft-calendar"></span>
										</span>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
			</div>
		</div>
	</div>
</div>


<!-- Modal update -->
<div class="modal fade text-left" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Karyawan</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('karyawan/update') ?>
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_nama">Nama</label>
					<input type="hidden" id="karyawan_id" name="id">
					<input type="text" class="form-control" name="nama" id="edit_nama" placeholder="Nama Karyawan"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_tempat">Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir" id="edit_tempat" placeholder="Tempat Lahir"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_tl">Tanggal Lahir</label>
					<div class='input-group'>
						<input type="date" class="form-control" name="tanggal_lahir" id="edit_tl" placeholder="Tanggal Lahir"
							   autocomplete="off" required>
						<div class="input-group-append">
										<span class="input-group-text">
											<span class="ft-calendar"></span>
										</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_alamat">Alamat</label>
					<textarea class="form-control" id="edit_alamat" rows="3" name="alamat" placeholder="Alamat"
							  autocomplete="off" required></textarea>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_tg">Tanggal Bergabung</label>
					<div class='input-group'>
						<input type="date" class="form-control" id="edit_tg" name="tanggal_gabung"
							   placeholder="Tanggal Bergabung" autocomplete="off" required>
						<div class="input-group-append">
							<span class="input-group-text">
								<span class="ft-calendar"></span>
							</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="jabatan">Jabatan</label>
					<select name="jabatan" id="jabatan" class="select2 form-control" style="width: 100%">
						<?php
						foreach ($jabatan as $key => $value):
							?>
							<option value="<?= $value['jabatan_id'] ?>"><?= $value['jabatan_nama'] ?></option>
						<?php
						endforeach;
						?>
					</select>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_nohp">Nomor HP</label>
					<input type="number" class="form-control" id="edit_nohp" name="nomor_hp" placeholder="Nomor HP"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_norek">Nomor Rekening</label>
					<input type="number" class="form-control" id="edit_norek" name="nomor_rekening" placeholder="Nomor rekening boleh kosong"
						   autocomplete="off">
				</fieldset>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="update" value="Update">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>


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
