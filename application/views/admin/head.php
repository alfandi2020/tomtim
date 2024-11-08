<!DOCTYPE html>

<html lang="en">

 

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>Dashboard Lintas Jaringan Nusantara Jakarta Timur</title>

    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <link rel="icon" href="<?php echo base_url() ?>assets/img/icon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bs-stepper.min.css">

    <!-- Fonts and icons -->
<link rel="stylesheet" href="https://ljn.fantecno.net/assets/sweet-alert/sweetalert2.min.css">
    <script src="https://ljn.fantecno.net/assets/sweet-alert/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugin/webfont/webfont.min.js"></script>

    <script>

        WebFont.load({

            google: {

                "families": ["Lato:300,400,700,900"]

            },

            custom: {

                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],

                urls: ['<?php echo base_url() ?>/assets/css/fonts.min.css']

            },

            active: function() {

                sessionStorage.fonts = true;

            }

        });

    </script>

    <!-- CSS Files -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/atlantis.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/datetime/datetime.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo.css">

    <?php

    function remove_special_characters($user_string)

    {



        // Replaces all spaces using hyphens.

        $user_string = str_replace(' ', '-', $user_string);



        // Removes special chars wothout A to Z and 0 to 9.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $user_string);

    }

    function indonesian_date($timestamp = '', $date_format = 'd F Y', $suffix = '')

    {

        if ($timestamp == NULL)

            return '-';



        if ($timestamp == '1970-01-01' || $timestamp == '0000-00-00' || $timestamp == '-25200')

            return '-';





        if (trim($timestamp) == '') {

            $timestamp = time();

        } elseif (!ctype_digit($timestamp)) {

            $timestamp = strtotime($timestamp);

        }

        # remove S (st,nd,rd,th) there are no such things in indonesia :p

        $date_format = preg_replace("/S/", "", $date_format);

        $pattern = array(

            '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',

            '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',

            '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',

            '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',

            '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',

            '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',

            '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',

            '/November/', '/December/',

        );

        $replace = array(

            'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',

            'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',

            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',

            'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'September',

            'Oktober', 'November', 'Desember',

        );

        $date = date($date_format, $timestamp);

        $date = preg_replace($pattern, $replace, $date);

        $date = "{$date} {$suffix}";

        return $date;

    }

    ?>

</head>