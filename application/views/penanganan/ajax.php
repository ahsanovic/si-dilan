<script type="text/javascript">
    var table;

    $(document).ready(function() {

        $('input').on('keyup', function() {
            $(this).removeClass('is-invalid');
        });

        $('#bulan').click(function() {
            $(this).removeClass('is-invalid');
        })

        $('#year').change(function() {
            reload_table()
        });

        $('#hasil-survey, #gambar-perencanaan, #kak, #hps-oe, #berita-hasil, #shop-drawing, #asbuilt-drawing, #bast, #backup-volume, #dokumentasi, #buku-harian')
            .on('change', function() {
                //get the file name
                var fileName = $(this).val().replace("C:\\fakepath\\", "");
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })

        //datatables
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?= site_url('penanganan/get_list') ?>",
                "type": "POST",
                "data": function(data) {
                    data.year = $('#year').val();
                }
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0, 3, 4, 5, 6], //last column
                "orderable": false, //set not orderable
            }, ],

        });

        // submit form
        $('#form').on('submit', function(event) {
            event.preventDefault();
            var url;
            var save_method = $('#save-method').val();
            let formData = new FormData($('#form')[0]);

            if (save_method == 'add') {
                url = "<?= site_url('penanganan/store') ?>";
            } else {
                url = "<?= site_url('penanganan/update') ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {
                    if (data.duplicate) {
                        iziToast.error({
                            title: 'Error!',
                            message: data.msg,
                            position: 'topRight',
                            timeout: 2000
                        });
                        return
                    }

                    if (save_method == 'add') {
                        if (data.status) {
                            $('#btn-save').text('Saving...');
                            $('#btn-save').attr('disabled', true);
                            reload_table();
                            iziToast.success({
                                title: 'Sukses!',
                                message: 'Data berhasil disimpan',
                                position: 'topRight',
                                timeout: 1000
                            });
                            setTimeout(() => {
                                location.href = "<?= site_url('penanganan') ?>";
                            }, 1000)
                        } else {
                            iziToast.error({
                                title: 'Error!',
                                message: 'Cek kembali isian form Anda',
                                position: 'topRight',
                                timeout: 1000
                            });

                            for (let i = 0; i < data.inputerror.length; i++) {
                                $('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
                                $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                            }
                        }
                    } else {
                        if (data.success) {
                            if (data.status) {
                                $('#btn-save').text('Saving...');
                                $('#btn-save').attr('disabled', true);
                                reload_table();
                                iziToast.success({
                                    title: 'Sukses!',
                                    message: 'Data berhasil diupdate',
                                    position: 'topRight',
                                    timeout: 1000
                                });
                                setTimeout(() => {
                                    location.href = "<?= site_url('penanganan') ?>";
                                }, 1000)
                            } else {
                                iziToast.error({
                                    title: 'Error!',
                                    message: 'Cek kembali isian form Anda',
                                    position: 'topRight',
                                    timeout: 1000
                                });

                                for (let i = 0; i < data.inputerror.length; i++) {
                                    $('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
                                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                                }
                            }
                        } else {
                            iziToast.error({
                                title: 'Error!',
                                message: 'Terjadi kesalahan..',
                                position: 'topRight',
                                timeout: 2000
                            });
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    iziToast.error({
                        title: 'Error!',
                        message: 'Terjadi kesalahan..',
                        position: 'topRight',
                        timeout: 2000
                    });

                }
            });
        });

    });

    function reload_table() {
        table.ajax.reload(); //reload datatable ajax 
    }

    function hapus(id) {
        swal({
            title: "Apakah Anda yakin?",
            text: "Data yang dihapus tidak bisa dikembalikan lagi!",
            icon: "warning",
            buttons: true
        }).then((willDelete) => {
            if (willDelete) {
                // ajax delete data to database
                $.ajax({
                    url: "<?= site_url('penanganan/destroy') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        reload_table();
                        iziToast.success({
                            title: 'Sukses!',
                            message: 'Data berhasil dihapus',
                            position: 'topRight',
                            timeout: 1000
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        iziToast.error({
                            title: 'Error!',
                            message: 'Terjadi kesalahan..',
                            position: 'topRight',
                            timeout: 1000
                        });
                    }
                });
            }
        });

    }
</script>