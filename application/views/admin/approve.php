    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Keanggotaan Jakarta Center Management
        </h1>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box box-solid box-default">
            <!-- box header -->
            <div class="box-header with-border">
              <h3 class="box-title">Approval List</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- box body -->
            <div class="box-body">
              <div class="box-body">
                <table class="table table-bordered table-striped" id="tabel_anggota" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NAMA</th>
                      <th>USIA</th>
                      <th>TEMPAT / TANGGAL LAHIR</th>
                      <th>E-MAIL</th>
                      <th>NO. HP</th>
                      <th>DOMISILI</th>
                      <th>CM/KG</th>
                      <th>STATUS</th>
                      <th>INSENTIF</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                     $no = 1;
                     foreach($approve as $x){
                     ?>
                    <tr>
                      <td align="Center"><?=$no++ ?></td>
                      <td><?=$x->nama?></td>
                      <td><?=$x->usia.' Tahun' ?></td>
                      <td><?=$x->tempat_lahir.' / '.date_indo($x->tgl_lahir)  ?></td>
                      <td><?=$x->email?></td>
                      <td><?=$x->no_telp?></td>
                      <td><?=$x->kota_domisili?></td>
                      <td><?=$x->tinggi_badan.'/'.$x->berat_badan ?></td>
                      <td><?=$x->status?></td>
                      <td><?php $format_angka = number_format($x->insentif, "2", ",", ".");
                            echo "Rp. ".$format_angka; ?></td>
                      <td><a href="<?=site_url("Crud_anggota/approve_detail/$x->id")?>" class="btn btn-success">Approve</a>
                      <td><a href="<?=site_url("Crud_anggota/tolak_anggota/$x->id")?>" class="btn btn-danger">Tolak</a>
                    </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
</section>
