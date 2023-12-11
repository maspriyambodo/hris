<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Upload SK BKM</title>
        <link rel="shortcut icon" href="https://simas.kemenag.go.id/favicon.png" type="image/png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/basic.min.css" integrity="sha512-MeagJSJBgWB9n+Sggsr/vKMRFJWs+OUphiDV7TJiYu+TNQD9RtVJaPDYP8hA/PAjwRnkdvU+NsTncYTKlltgiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.css" integrity="sha512-IScV5kvJo+TIPbxENerxZcEpu9VrLUGh1qYWv6Z9aylhxWE4k4Fch3CHl0IYYmN+jrnWQBPlpoTVoWfSMakoKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="bkm-save" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nama:</label>
                                    <input type="text" name="namatxt" required="" class="form-control" autocomplete="off"/>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="form-group">
                                        <label>Tingkat:</label>
                                        <select class="form-select" name="tingkattxt" required="" onchange="Tingkat(this.value);">
                                            <option value="">Pilih Tingkat</option>
                                            <option value="1">Provinsi</option>
                                            <option value="2">Kabupaten</option>
                                            <option value="3">Kecamatan</option>
                                            <option value="4">Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function Tingkat(id) {
                if (id == 1) {
                    show_prov();
                } else if (id == 2) {
                    show_prov();
                    show_kab();
                } else if (id == 3) {
                    show_prov();
                    show_kab();
                    show_kec();
                } else if (id == 4) {
                    show_prov();
                    show_kab();
                    show_kec();
                    show_kel();
                } else {
                    Swal.fire(
                            'Peringatan',
                            'Harap pilih daerah tingkat',
                            'warning'
                            );
                }
            }
            function show_prov() {

            }
            function show_kab() {

            }
            function show_kec() {

            }
            function show_kel() {

            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.27/sweetalert2.min.js" integrity="sha512-mJQ9oQHzLM2zXe1cwiHmnMddNrmjv1YlaKZe1rM4J7q8JTnNn9UgeJVBV9jyV/lVGdXymVx6odhgwNZjQD8AqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>
