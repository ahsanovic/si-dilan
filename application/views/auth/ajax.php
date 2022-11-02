<script>
    $(document).ready(function() {
        $('input').change(function() {
            $(this).removeClass('is-invalid');
            $(this).next().empty();
        });

        $('#btn-login').click(function(e) {
            e.preventDefault();

            $.ajax({
                url: "<?= site_url('auth/login') ?>",
                type: 'post',
                data: $('#form-login').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.success) {
                        if (data.status) {
                            $('#form-login').trigger('reset');
                            $('#btn-login').text('Signing...').attr('disabled', true);
                            swal({
                                icon: 'success',
                                title: 'Login Berhasil!',
                                timer: 1000,
                                button: false
                            })
                            .then(function() {
                                window.location.href = "<?= site_url('beranda') ?>";
                            });
                        } else {
                            if (data.error == 'password') {
                                swal("Maaf!", "password salah", "error");
                                $('#password').val('');
                            } else if (data.error == 'banned') {
                                swal("Maaf!", "user tidak aktif atau sedang diblokir", "error");
                            } else if (data.error == 'not found') {
                                swal("Maaf!", "user tidak ditemukan", "error");
                            } else {
                                for (let i = 0; i < data.inputerror.length; i++) {
                                    $('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
                                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                                }
                            }
                        }
                    } else {
                        swal("Error!", "Terjadi kesalahan", "error");
                    }

                    $('#btn-login').attr('disabled', false);
                },
                error: function(err) {
                    swal("Error!", "Terjadi kesalahan", "error");
                }
            });
        });
    });
</script>