		</div>
		<div class="col-12 col-md-10">
			<?php
			$kolom=3;
			$barismulai=0;
			$lebarbs=12/$kolom;?>
			<div class="row pb-3">
			<?php
		foreach($melati as $m){
		?>  
				<div class="col-12 col-md-<?=$lebarbs;?>">
					<div class="card mb-3">
						<img class="card-img-top" src="<?php echo base_url('assets/img/avatar3.png') ?>" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title text-center"><?=$m['nama']?></h5>
						</div>
						<p class="card-text">Tinggi <?=$m['tinggi_badan']." "?> cm</p>
					<p class="card-text">Berat Badan: <?=$m['berat_badan']." "?> kg</p>
					<p class="card-text">Usia: <?=$m['usia']." "?> tahun</p>
					</div>
					
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
