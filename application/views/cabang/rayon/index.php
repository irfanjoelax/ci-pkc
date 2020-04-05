<?php $this->load->view('layout/cabang/header') ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h2>
                        Daftar Rayon
                        <div class="pull-right">
                            <a onclick="addForm()" class="btn btn-primary">Tambah</a>
                        </div>
                    </h2>
                </div>
                
                <table class="table table-bordered table-hover table-striped" id="datatable_user">
                    <thead>
                        <tr>
                            <th class="header" style="width: 50px;">No</th>
                            <th class="header">Nama Rayon</th>
                            <th class="header">Komisariat</th>
                            <th class="header">Email</th>
                            <th class="header">Telepon</th>
                            <th class="header">Status</th>
                            <th class="header" style="width:120px;">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- load form modal  -->
    <?php $this->load->view('cabang/rayon/form') ?>

    <?php $this->load->view('layout/cabang/footer') ?>
    <script>
        // inisiasi variabel
        var table, save_method;

        $(document).ready(function(){

            // DataTable untuk konfigurasi table user pada halaman korcab
            table = $('.table').DataTable({
                "processing" : true,
                "serverside" : true,
                "ajax" : {
                    "url" : "<?php echo site_url('rayon/data') ?>",
                    "type" : "GET"
                }
            });

            $('#modal-form').on('submit', function (e) {
                if (!e.isDefaultPrevented()) {

                    var id_rayon = $('#txt_id').val();

                    if (save_method == "add") url = "<?php echo site_url('rayon/insert') ?>";
                    else url = "rayon/update/"+id_rayon;

                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $('#modal-form form').serialize(),
                        success: function(data){
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                        },
                        error: function(){
                            alert('data not save');
                        }
                    });
                    
                    return false;
                }
            });
        });

        function addForm() {
            save_method = "add";
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Tambah Data Baru');
        }

        function editForm(id) {
            save_method = "edit";
            $('#modal-form form')[0].reset();

            $.ajax({
                url: "rayon/edit/"+id,
                type: "GET",
                dataType:"JSON",
                success: function(data){
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Form');

                    // memasukkan data yang didapatkan dari controller ke form modal
                    $('#txt_id').val(data.id_rayon);
                    $('#txt_nama').val(data.nama_rayon);
                    $('#txt_komisariat').val(data.komisariat_id);
                    $('#txt_alamat').val(data.alamat_rayon);
                    $('#txt_email').val(data.email_rayon);
                    $('#txt_telepon').val(data.telepon_rayon);
                    $('#txt_berdiri').val(data.berdiri_rayon);
                    $('#txt_status').val(data.status_rayon);

                },
                error: function(){
                    alert('data not change');
                }
            });
        }

        function deleteData(id) {
            if (confirm("Are You Sure for delete this ?")) {
                $.ajax({
                    url: "rayon/delete/"+id,
                    type: "POST",
                    success: function(data){
                        table.ajax.reload();
                    },
                    error: function(){
                        alert('data not deleted');
                    }
                });
            }
        }
    </script>
</body>
</html>