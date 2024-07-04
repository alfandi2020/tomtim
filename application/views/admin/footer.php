<!--   Core JS Files   -->
<script src="<?php echo base_url() ?>/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="<?php echo base_url() ?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?php echo base_url() ?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Chart JS -->
<script src="<?php echo base_url() ?>/assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?php echo base_url() ?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?php echo base_url() ?>/assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?php echo base_url() ?>/assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?php echo base_url() ?>/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="<?php echo base_url() ?>/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>


<!-- Atlantis JS -->
<script src="<?php echo base_url() ?>/assets/js/atlantis.min.js"></script>
<script>
    window.setTimeout(function() {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
    window.setTimeout(function() {
        $(".alert-danger").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>
<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url() ?>/assets/js/setting-demo.js"></script>
<script src="<?php echo base_url() ?>/assets/js/demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/datetime/datetime.js"></script>
<script src="<?php echo base_url() ?>/assets/js/jquery.mask.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    $(function() {
        $('a').filter(function() {
            return this.href == location.href
        }).parent().addClass('active').siblings().removeClass('active')
    })



    // for sidebar menu entirely but not cover treeview
    $('ul.nav .nav-item a').filter(function() {
        return this.href == location.href
    }).parent().addClass('active');

    // for treeview
    $('ul.nav-collapse li a').filter(function() {
        return this.href == location.href
    }).parentsUntil(".nav > .nav.nav-collapse li a").addClass('active');

    $('div.collapse li a').filter(function() {
        return this.href == location.href
    }).parentsUntil(".nav > collapse li a").addClass('show');
</script>
<script>
    // Function ini dijalankan ketika Halaman ini dibuka pada browser
    $(function() {
        setInterval(timestamp, 1000); //fungsi yang dijalan setiap detik, 1000 = 1 detik
    });

    //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
    function timestamp() {
        $.ajax({
            url: '<?php echo base_url('administrator/jam') ?>',
            success: function(data) {
                $('#timestamp').html(data);
            },
        });
    }
</script>

<script>
    //onchange registrasi
    $(document).ready(function() {

    $('#table-report').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
         'url':'getReport'
      },
      'columns': [
          {data: 'no'},
         { data: 'nama' },
         { data: 'paket' },
         { data: 'tagihan' },
         { data: 'penerima' },
         { data: 'periode' },
         { data: 'tanggal' },
         { data: 'nomor_struk' },
         {
            className: 'url',
            data: 'id',
            render: function(data, type, row) {
                if (type === 'display') {
                    $('.delete-confirm').on('click', function (eventx) {
                            eventx.preventDefault();
                        //   var id = $(this).attr('val');
                        const url = $(this).attr('href');
                        swal.fire({
                            title: 'Opss?',
                            text: 'Apakah yakin ingin Delete Pembayaran ?',
                            icon: 'warning',
                            showCancelButton: true,
                    
                        }).then(function(result) {
                            if (result.value) {
                                swal.fire({
                                    title: 'Berhasil',
                                    text: 'Pembayaran berhasil didelete',
                                    icon: 'success',
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                        b.textContent = Swal.getTimerLeft()
                                    }, 100)
                                    },
                                })
                                setTimeout(() => {
                                    window.location.href = url;
                                }, 2000);
                            }else{
                                
                            }
                        });
                    });
                    return '<a target="_blank" class="btn btn-primary" href="pdf/' + data + '" class="url"><i class="fas fa-print"></i></a> &nbsp;&nbsp;&nbsp; <a href="delete_pembayaran/' + data + '" class="btn btn-danger delete-confirm url"><i class="fas fa-trash"></i></a> ';
                }

                return data;
            }
         }
      ],
      
      "sScrollX": "100%",
      
    });
    $('#table-client').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
         'url':'getClient'
      },
      'columns': [
        { "data": null,"sortable": false,
            render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        }
        },
         { data: 'nama' },
         { data: 'status_wa' },
         {
            className: 'url',
            data: 'id',
            render: function(data, type, row) {
                if (type === 'display') {
                    $('.wa-confirm22').on('click', function (e) {
                            e.preventDefault();
                        //   var id = $(this).attr('val');
                        const url = $(this).attr('href');
                        swal.fire({
                            title: 'Opss?',
                            text: 'Apakah yakin ingin Mengirim tagihan?',
                            icon: 'warning',
                            showCancelButton: true,
                    
                        }).then(function(result) {
                            if (result.value) {
                                swal.fire({
                                    title: 'Berhasil',
                                    text: 'Pembayaran berhasil dikirim',
                                    icon: 'success',
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                        b.textContent = Swal.getTimerLeft()
                                    }, 100)
                                    },
                                })
                                setTimeout(() => {
                                    window.location.href = url;
                                }, 2000);
                            }else{
                                
                            }
                        });
                    });
                    return '<a style="color: blue;font-size:20px" href="edit_pelanggan/' + data + '"><i class="icon-note"></i></a> &nbsp;&nbsp;&nbsp; <a href="manual_wa/' + data + '/<?php error_reporting(error_reporting() & ~E_NOTICE); echo $_GET['bulan'] ?>/<?= $_GET['thn'] ?>" style="color: #00d652;font-size:20px" class="wa-confirm22 url"><i class="fab fa-whatsapp"></i></a> ';
                
                }
                return data;
            }
         },
         { data: 'alamat' },
         { data: 'paket' },
         { data: 'kontak' },
         { data: 'email' },
    
      ],
      
      "sScrollX": "100%",
      
    });
    $('#table-client2').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
         'url':'getClient2'
      },
      'columns': [
        { "data": null,"sortable": false,
            render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        }
        },
         { data: 'nama' },
         { data: 'status_wa' },
         {
            className: 'url',
            data: 'id',
            render: function(data, type, row) {
                if (type === 'display') {
                    $('.wa-confirm2').on('click', function (e) {
                            e.preventDefault();
                        //   var id = $(this).attr('val');
                        const url = $(this).attr('href');
                        swal.fire({
                            title: 'Opss?',
                            text: 'Apakah yakin ingin Delete Pembayaran ?',
                            icon: 'warning',
                            showCancelButton: true,
                    
                        }).then(function(result) {
                            if (result.value) {
                                swal.fire({
                                    title: 'Berhasil',
                                    text: 'Pembayaran berhasil didelete',
                                    icon: 'success',
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                        b.textContent = Swal.getTimerLeft()
                                    }, 100)
                                    },
                                })
                                setTimeout(() => {
                                    window.location.href = url;
                                }, 2000);
                            }else{
                                
                            }
                        });
                    });
                    return '<a style="color: blue;font-size:20px" href="edit_pelanggan/' + data + '"><i class="icon-note"></i></a> &nbsp;&nbsp;&nbsp; <a href="manual_wa/' + data + '/<?= $_GET['bulan'] ?>/<?= $_GET['thn'] ?>" style="color: #00d652;font-size:20px" class="wa-confirm2 url"><i class="fab fa-whatsapp"></i></a> ';
                
                }
                return data;
            }
         },
         { data: 'alamat' },
         { data: 'paket' },
         { data: 'kontak' },
         { data: 'email' },
    
      ],
      
      "sScrollX": "100%",
      
    });

    $('.wa-confirm').on('click', function (eventx) {
          eventx.preventDefault();
      const url = $(this).attr('href');
      swal.fire({
          title: 'Opss?',
          text: 'Apakah yakin ingin Mengirim ?',
          icon: 'warning',
          showCancelButton: true,
  
      }).then(function(result) {
          if (result.value) {
            swal.fire({
                title: 'Berhasil',
                text: 'WhatsApp berhasil Terkirim',
                icon: 'success',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                  Swal.showLoading()
                  const b = Swal.getHtmlContainer().querySelector('b')
                  timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                  }, 100)
                },
            })
              setTimeout(() => {
                window.location.href = url;
              }, 2000);
          }else{
            
          }
      });
    });
        $('#layanan').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>/administrator/paket",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {

                        html += '<option value=' + data[i].id_wireless + '>' + "Internet Up to " + data[i].mbps + " Mbps" + " - Rp." + data[i].harga + ' ' + data[i].promo + ' </option>';
            
                    }
                    $('.paketChange').html(html);

                }

            });
        });

    });


    //onchange pembuatan pembayaran pelanggan
    $(document).ready(function() {
        $('#plg').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>/administrator/plg",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var html2 = '';
                    var html3x = '';
                    var total = '';
                    var diskonn ='';
                    var i,j,z;
                    var q,w,e;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_wireless + '>' + "Internet Up to " + data[i].mbps + " Mbps" + " - Rp." + data[i].harga + '</option>';
                        
                        var diskonn = parseInt(data[i].diskon) || 0;
                        var addon1 = parseInt(data[i].addon1) || 0;
                        var addon2 = parseInt(data[i].addon2) || 0;
                        var addon3 = parseInt(data[i].addon3) || 0;
                        var hargaaa = parseInt(data[i].harga) || 0;

                        if (addon1 == 0) {
                            var total = addon1 + addon2 + addon3 + hargaaa - diskonn;
                        }else if (addon2 == 0)
                        {
                            var total = addon1 + addon2 + addon3 + hargaaa - diskonn;
                        }else if (addon3 == 0)
                        {
                            var total = addon1 + addon2 + addon3 + hargaaa - diskonn;
                        }else if (diskonn == 0)
                        {
                            var total = addon1 + addon2 + addon3 + hargaaa - diskonn;
                        }
                        
                        if (diskonn == false) {
                            z = "";
                            html2 += z
                        }else{
                            var reverse = diskonn.toString().split('').reverse().join(''),
                            ribuan = reverse.match(/\d{1,3}/g);
                            ribuan = ribuan.join('.').split('').reverse().join('');
                            html2 += ribuan
                        }
                            
                    
                        var reversee = total.toString().split('').reverse().join(''),
                            ribuan2 = reversee.match(/\d{1,3}/g);
                        ribuan2 = ribuan2.join('.').split('').reverse().join('');
                        html3x += ribuan2;
                        
                    }
                    $('.plgChange').html(html).change();
                    $('.diskonx').val(html2).change();
                     $('.totalx').val(html3x).change();

                }
                
            });
        });
    });
    $(document).ready(function() {
        $('#plg').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>/administrator/plgAddon",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var html2 = '';
                    var html3 = '';
                    var bilangan1 = '';
                    var bilangan2 = '';
                    var bilangan3 = '';
                    var i,e,f,g;
                    for (i = 0; i < 1; i++) {
                        var bilangan1 = data[i].addon1
                        if (bilangan1 == false) {
                            e = "";
                            html += e
                        }else{
                            var reverse1 = bilangan1.toString().split('').reverse().join(''),
                            ribuan1 = reverse1.match(/\d{1,3}/g);
                            ribuan1 = ribuan1.join('.').split('').reverse().join('');
                            html += ribuan1
                        }
                        //addon2
                        var bilangan2 = data[i].addon2
                        if (bilangan2 == false) {
                            f = "";
                            html2 += f
                        }else{
                            var reverse2 = bilangan2.toString().split('').reverse().join(''),
                            ribuan2 = reverse2.match(/\d{1,3}/g);
                            ribuan2 = ribuan2.join('.').split('').reverse().join('');
                            html2 += ribuan2
                        }
                        //addon3
                        var bilangan3 = data[i].addon3
                        if (bilangan3 == false) {
                            f = "";
                            html3 += f
                        }else{
                            var reverse3 = bilangan3.toString().split('').reverse().join(''),
                            ribuan3 = reverse3.match(/\d{1,3}/g);
                            ribuan3 = ribuan3.join('.').split('').reverse().join('');
                            html3 += ribuan3
                        }
                    }
                    $('.plgAddon1').val(html).change();
                    $('.plgAddon2').val(html2).change();
                    $('.plgAddon3').val(html3).change();
                }
            });
        });
    });
    // $(document).ready(function() {
    //     $('#plg').change(function() {
    //         var id = $(this).val();
    //         $.ajax({
    //             url: "<?php echo base_url(); ?>/administrator/plgAddon",
    //             method: "POST",
    //             data: {
    //                 id: id
    //             },
    //             async: true,
    //             dataType: 'json',
    //             success: function(data) {
    //                 var html = '';
    //                 var i;
    //                 for (i = 0; i < 1; i++) {
    //                     var bilangan = data[i].addon2
    //                     var reverse = bilangan.toString().split('').reverse().join(''),
    //                         ribuan = reverse.match(/\d{1,3}/g);
    //                     ribuan = ribuan.join('.').split('').reverse().join('');
    //                     html += ribuan

    //                 }
    //                 $('.plgAddon2').val(html).change();
    //             }
    //         });
    //     });
    // });
    // $(document).ready(function() {
    //     $('#plg').change(function() {
    //         var id = $(this).val();
    //         $.ajax({
    //             url: "<?php echo base_url(); ?>/administrator/plgAddon",
    //             method: "POST",
    //             data: {
    //                 id: id
    //             },
    //             async: true,
    //             dataType: 'json',
    //             success: function(data) {
    //                 var html = '';
    //                 var i;
    //                 for (i = 0; i < 1; i++) {
    //                     var bilangan = data[i].addon3
    //                     var reverse = bilangan.toString().split('').reverse().join(''),
    //                         ribuan = reverse.match(/\d{1,3}/g);
    //                     ribuan = ribuan.join('.').split('').reverse().join('');
    //                     html += ribuan

    //                 }
    //                 $('.plgAddon3').val(html).change();
    //             }
    //         });
    //     });
    // });
    //otomatis onchange value harga
    $(document).ready(function() {
        $('#harga').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>/administrator/harga",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var html2 = '';
                    var i;
                    for (i = 0; i < 1; i++) {
                        var bilangan = data[i].harga;

                        var reverse = bilangan.toString().split('').reverse().join(''),
                            ribuan = reverse.match(/\d{1,3}/g);
                        ribuan = ribuan.join('.').split('').reverse().join('');
                        html += ribuan
                        
                
                    }
                    $('.hargaChange').val(html);

                }

            });
        });
    });
    //hide show diskon
    $(function() {
        $('.diskon_hasil').hide();
        $('#ceklis_diskon').change(function() {
            if ($('#ceklis_diskon').val() == 'show') {
                $('.diskon_hasil').show();
            } else if ($('#ceklis_diskon').val() == 'hide') {
                $('.diskon_hasil').hide();
            }
        });
    });
    //add paket
    $(function() {
        $('.paket_hasil').hide();
        $('#ceklis_promo').change(function() {
            if ($('#ceklis_promo').val() == 'show') {
                $('.paket_hasil').show();
            }
        });
    });
    //hide show add on tv
    $(function() {
        $('.tv_hasil').hide();
        $('#ceklis_tv').change(function() {
            if ($('#ceklis_tv').val() == 'show') {
                $('.tv_hasil').show();
            }
        });
    });



    /*
    $(function() {
        $('#hasil_custom').hide();
        $('#speed_custom').change(function() {
            if ($('#speed_custom').val() == '5') {
                $('#hasil_custom').show();
            } else if ($('#speed_custom').val() == '12') {
                $('#hasil_custom').show();
            } else {
                $('#hasil_custom').hide();
            }
        });

        $('#hasil_custom').hide();
        $('#layanan').change(function() {
            if ($('#layanan').val() == 'Wireless') {
                $('#hasil_custom').hide();
            } else if ($('#layanan').val() == 'Fiber Optik') {
                $('#hasil_custom').hide();
            }
        })
    });
    */

    $(".form_datetime1").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        forceParse: true
    });
    $(document).ready(function() {

        // Format mata uang.
        $('.uang').mask('000.000.000', {
            reverse: true
        });

    })


    //number format rupiah
    var fnf = document.getElementById("formatNumber");
    fnf.addEventListener('keyup', function(evt) {
        var n = parseInt(this.value.replace(/\D/g, ''), 10);
        fnf.value = n.toLocaleString();
    }, false);
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".select22").select2();
    });
</script>

<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
            "sScrollX": "100%",
        });
        $('#basic-datatables2').DataTable({
            "sScrollX": "100%",
        });
    });
    $(document).ready(function() {
        $('#table-user').DataTable({});
    });
    $(document).ready(function() {
        $('#table-user2').DataTable({});
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"> </script>
<script>
    //untuk di chart index
        barChart = document.getElementById('barChart').getContext('2d');
    
 
    var myBarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                label: "Pemasukan Tahun <?php echo date('Y'); ?>",
                backgroundColor: 'rgb(23, 125, 255)',
                borderColor: 'rgb(23, 125, 255)',
                data: [<?php foreach ($Januari as $aa) {
                            foreach ($Februari as $bb) {
                                foreach ($Maret as $cc) {
                                    foreach ($April as $dd) {
                                        foreach ($Mei as $ee) {
                                            foreach ($Juni as $ff) {
                                                foreach ($Juli as $gg) {
                                                    foreach ($Agustus as $hh) {
                                                        foreach ($September as $ii) {
                                                            foreach ($Oktober as $jj) {
                                                                foreach ($November as $kk) {
                                                                    foreach ($Desember as $ll) {
                                                                        echo  $aa->a . "," . $bb->b . "," . $cc->c . "," . $dd->d . "," . $ee->e . "," . $ff->f . "," . $gg->g . "," . $hh->h . "," . $ii->i . "," . $jj->j . "," . $kk->k . "," . $ll->l;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        } ?>],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
        }
    });
    barChart = document.getElementById('barChart_client').getContext('2d');
    var myBarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                label: "Pemasukan Tahun <?php echo date('Y'); ?>",
                backgroundColor: '#02d662',
                borderColor: '#02d662',
                data: [22, 25, 66, 11, 22, 55, 11, 22, ],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
        }
    });

    //count up di index
    $('.count').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 900,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".ktp_sim").change(function() {
            let selectedValA = $(this).val();
            let isAChecked = $(this).prop("checked");
            $(`.ktp_simChange[value=${selectedValA}]`).prop("checked", isAChecked);
        });
    });
    //clone registrasi
    function salindata(f) {
        //kiri data clone
        if (f.salin_to.checked == true) {
            f.nama_pelanggan.value = f.nama.value;
            //$(document).ready(function() {
            $(".ktp_sim").change(function(f) {
                let selectedValA = $(this).val();
                let isAChecked = $(this).prop("checked");
                $(`.ktp_simChange[value=${selectedValA}]`).prop("checked", isAChecked);
            });
            //});
            f.nomor_pelanggan.value = f.nomor.value;
            f.alamat_pelanggan.value = f.alamat.value;
            f.kodepos_pelanggan.value = f.kodepos.value;
            f.kontak_pelanggan.value = f.kontak.value;
            f.email_pelanggan.value = f.email.value;
        } else {
            f.nama_pelanggan.value = "";
            f.nomor_pelanggan.value = "";
            f.alamat_pelanggan.value = "";
            f.kodepos_pelanggan.value = "";
            f.kontak_pelanggan.value = "";
            f.email_pelanggan.value = "";
        }
    }
    $('.CbAB').off('change').on('change', function() {
        $('.CbAB').not(this).prop('checked', this.checked);
    });
</script>
<script>
    /*    function formatBytes(bytes, decimals, binaryUnits) {
        if (bytes == 0) {
        return '0 Bytes';
        }
        var unitMultiple = (binaryUnits) ? 1024 : 1000;
        var unitNames = (unitMultiple === 1024) ? // 1000 bytes in 1 Kilobyte (KB) or 1024 bytes for the binary version (KiB)
            ['Bytes', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB'] : ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        var unitChanges = Math.floor(Math.log(bytes) / Math.log(unitMultiple));
        return parseFloat((bytes / Math.pow(unitMultiple, unitChanges)).toFixed(decimals || 0)) + ' ' + unitNames[unitChanges];
    }
    var chart;

    function requestDatta(interface) {
        $.ajax({
            url: '<?php echo base_url() . 'administrator/interface_x' ?>?interface=combo1',
            datatype: "json",
            success: function(data) {
                var midata = JSON.parse(data);
                if (midata.length > 0) {
                    var TX = parseInt(midata[0].data);
                    var RX = parseInt(midata[1].data);
                    var x = (new Date()).getTime();
                    shift = chart.series[0].data.length > 19;
                    chart.series[0].addPoint([x, TX], true, shift);
                    chart.series[1].addPoint([x, RX], true, shift);
                    document.getElementById("traffic").innerHTML = formatBytes(TX) + " / " + formatBytes(RX);
                } else {
                    document.getElementById("traffic").innerHTML = "- / -";
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.error("Status: " + textStatus + " request: " + XMLHttpRequest);
                console.error("Error: " + errorThrown);
            }
        });
    }

    $(document).ready(function() {
        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });

        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'area', //line,//area

                events: {
                    load: function() {
                        setInterval(function() {
                            requestDatta(document.getElementById("interface").value);
                        }, 1000);
                    }
                }
            },
            title: {
                text: 'Monitoring'
            },
            colors: ['#0866ff', '#ff3112'],
            xAxis: {
                type: 'datetime',
                tickPixelInterval: 150,
                maxZoom: 20 * 1000
            },
            tooltip: {
                pointFormat: ' Download : <b> {point.y}</b><br/>Upload : {point.x}'
            },
            plotOptions: {
                area: {
                    pointStart: 1940,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            yAxis: {
                minPadding: 0.2,
                maxPadding: 0.2,
                title: {
                    text: 'Traffic',
                    margin: 5
                }
            },
            series: [{
                name: 'TX',
                data: []
            }, {
                name: 'RX',
                data: []
            }]
        });
    });*/
</script>
</body>

</html>

