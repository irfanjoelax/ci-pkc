<?php $this->load->view('layout/header') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">
         <i class="zmdi zmdi-female"></i>&nbsp;
         Data Anggota KOPRI
      </h1>
   </div>

   <!-- Content Row -->
   <div class="row">
      <div class="col-md-12">
         <div class="card shadow border-left-primary">
            <div class="card-body">
               <table class="table table-sm table-bordered table-hover">
                  <thead class="bg-dark text-white">
                     <tr>
                        <th class="header text-center" width="30">No</th>
                        <th class="header" width="300">Nama Anggota</th>
                        <th class="header text-center">Rayon</th>
                        <th class="header text-center">Komisariat</th>
                        <th class="header text-center">Telepon</th>
                        <th class="header text-center">Kaderisasi</th>
                     </tr>
                  </thead>
                  <tbody></tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
<?php $this->load->view('layout/footer') ?>
<script>
   // inisiasi variabel
   var table;

   $(document).ready(function() {

      // DataTable untuk konfigurasi table user pada halaman korcab
      table = $('.table').DataTable({
         "ordering": false,
         "processing": true,
         "serverside": true,
         "ajax": {
            "url": "<?= site_url('korcab/kopri/data') ?>",
            "type": "GET"
         },
         "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
         }
      });
   });
</script>
</body>

</html>