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
					<div class="card mb-3">
					<img class="card-img-top model-closeup" data-alt-src="<?=base_url()?>assets/img/<?=$m['foto_closeup'];?>" src="<?=base_url()?>assets/img/<?=$m['foto_fullbody'];?>" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title text-center">
							<?=$m['nama']?>
						</h5>
						<hr style="border-width:2px; color:black;">
					</div>
					<p class="card-text">Tinggi: <?=$m['tinggi_badan']." "?> cm</p>
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
