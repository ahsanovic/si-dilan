<script type="text/javascript">
    var table;

    $(document).ready(function() {

        $('#sotk, #wilker')
            .on('change', function() {
                //get the file name
                var fileName = $(this).val().replace("C:\\fakepath\\", "");
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })

        // submit form
        $('#form').on('submit', function(event) {
            event.preventDefault();
            var url;
            let formData = new FormData($('#form')[0]);

            url = "<?= site_url('setting/update') ?>";

            // ajax adding data to database
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {
                    if (data.success) {
                        if (data.status) {
                            $('#btn-save').text('Saving...');
                            $('#btn-save').attr('disabled', true);
                            iziToast.success({
                                title: 'Sukses!',
                                message: 'Data berhasil disimpan',
                                position: 'topRight',
                                timeout: 1000
                            });
                            $('#btn-save').text('Simpan');
                            $('#btn-save').attr('disabled', false);
                        } else {
                            for (let i = 0; i < data.inputerror.length; i++) {
                                $('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
                                $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                            }
                        }
                    } else {
                        iziToast.error({
                            title: 'Error!',
                            message: data.msg,
                            position: 'topRight',
                            timeout: 2000
                        });
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
</script>