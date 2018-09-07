<?php
$this->title = 'Diagnosa Gejala';
?>
<section id="gejala_diagnosa" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-top: 50px;background-color: #f5f5f5;border-radius: 25px;">
				<center>
				<h3>Klasifikasi Jenis Virus</h3>
				<h4>Isilah data di bawah sesuai dengan gejala yang dialami: </h4>
				</center>
				<br>
				<section>
					<form id="form">
						<table width="100%" class="table table-hover">
							<tr>
								<td width="5%">
									<label class="material-checkbox">
										<input type="checkbox" name="gejala" id="gejala[]">
										<span></span>
									</label>
								</td>
								<td>
									<span><strong>Warna kuning pada bola mata (sklera ikterik) dan Kulit</strong></span>
								</td>
							</tr>
							<tr>
								<td>
									<label class="material-checkbox">
										<input type="checkbox" name="gejala" id="gejala[]">
										<span></span>
									</label>
								</td>
								<td><span><strong>Ada riwayat sakit kuning</strong></span></td>
							</tr>
							<tr>
								<td>
									<label class="material-checkbox">
										<input type="checkbox" name="gejala" id="gejala[]">
										<span></span>
									</label>
								</td>
								<td>
									<span><strong>Tidak nafsu makan, lesu, cepat lelah, dan terasa mual</strong></span>
									
								</td>
							</tr>
							<tr>
								<td><label class="material-checkbox">
									<input type="checkbox" name="gejala" id="gejala[]">
									<span></span>
								</label></td>
								<td>
									
									<span><strong>Pembesaran ukuran hati (rasa tidak nyaman di bagian perut atas, nyeri jika diraba dan terasa lembut)</strong></span>
									
								</td>
							</tr>
							<tr>
								<td><label class="material-checkbox">
									<input type="checkbox" name="gejala" id="gejala[]">
									<span></span>
								</label></td>
								<td>
									
									<span><strong>Bagian empedu nyeri apabila ditekan</strong></span>
									
								</td>
							</tr>
							<tr>
								<td><label class="material-checkbox">
									<input type="checkbox" name="gejala" id="gejala[]">
									<span></span>
								</label></td>
								<td>
									
									<span><strong>Urin berwarna pekat</strong></span>
									
								</td>
							</tr>
							<tr>
								<td><label class="material-checkbox">
									<input type="checkbox" name="gejala" id="gejala[]">
									<span></span>
								</label></td>
								<td>
									
									<span><strong>Demam tinggi dan sering sakit kepala</strong></span>
									
								</td>
							</tr>
							<tr>
								<td>
									<label class="material-checkbox">
										<input type="checkbox" name="gejala" id="gejala[]">
										<span></span>
									</label>
								</td>
								<td><span><strong>Nyeri sendi</strong></span></td>
							</tr>
						</table>
					</form>
				</section>
				<br/>
				<button type="submit" name="hitung1" id="hitung1" class="btn btn-info" style="margin-bottom: 15px; background-color: #1364b5;">Cek Gejala</button>
			</div>
		</div>
	</div>
</section>
<section id="hasil_diagnosis" data-stellar-background-ratio="0.5" style="display: none;">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-top: 50px;background-color: #f5f5f5;border-radius: 25px;">
				<br>
				<h4 class="text-center">Hasil Diagnosa</h4>
				<div class='col-md-6 col-md-offset-3 text-center'>
					<div id="result1"></div>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<center>
					<button class='btn btn-danger' id='cekLab' style="margin-bottom: 280px">Cek Data Lab</button>&nbsp;&nbsp;<a href='?page=cekgejala' class='btn btn-info' id='kembali' style="margin-bottom: 280px">Kembali</a>
					</center>
				</div>
				<br><br>
			</div>
		</div>
	</div>
</section>
<section id="lab_diagnosis" data-stellar-background-ratio="0.5" style="display: none;">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-top: 50px;background-color: #f5f5f5;border-radius: 25px;">
				<?= $this->render('cek-lab') ?>
				<br>
			</div>
		</div>
	</div>
</section>
<br>