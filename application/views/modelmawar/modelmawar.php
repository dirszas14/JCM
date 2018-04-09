		</div>
		<div class="col-12 col-md-10">
			<?php
			$kolom=3;
			$barismulai=0;
			$lebarbs=12/$kolom;?>
			<div class="row pb-3">
			<?php
		foreach($mawar as $m){
		?>  
				<div class="col-12 col-md-<?=$lebarbs;?>">
					<img class="img-fluid model-closeup" src="<?php echo base_url('assets/img/avatar3.png') ?>" alt="Card image cap">
					<p>Nama: <?=$m['nama']?></p>
					<p>Tinggi: <?=$m['tinggi_badan']." "?> cm</p>
					<p>Berat Badan: <?=$m['berat_badan']." "?> kg</p>
					<p>Usia: <?=$m['usia']." "?> tahun</p>
				</div>
				<?php
				$barismulai++;
				if ($barismulai%$kolom == 0) 
					echo '</div><div class="row pb-3">';
				}
				?>
			</div>

		</div>
	</div>
</div>
