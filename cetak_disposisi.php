<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
        header("Location: ./");
        die();
    } else {

        echo '
        <style type="text/css">
            table {
                background: #fff;
                padding: 5px;
            }
            tr, td {
            }
            tr,td {
                vertical-align: top!important;
            }
            .isi {
                height: 300px!important;
            }
            .disp {
                text-align: center;
                padding: 1.5rem 0;
                margin-bottom: .5rem;
            }
            .logodisp {
                float: left;
                position: relative;
                width: 110px;
                height: 110px;
                margin: 0 0 0 1rem;
            }
            #lead {
                width: auto;
                position: relative;
                margin: 25px 0 0 75%;
            }
            .lead {
                font-weight: bold;
                text-decoration: underline;
                margin-bottom: -10px;
            }
            .tgh {
                text-align: center;
            }
            #nama {
                font-size: 2.1rem;
                margin-bottom: -1rem;
            }
            #alamat {
                font-size: 16px;
            }
            .up {
                text-transform: uppercase;
                margin: 0;
                line-height: 2.2rem;
                font-size: 1.5rem;
            }
            .status {
                margin: 0;
                font-size: 1.3rem;
                margin-bottom: .5rem;
            }
            #lbr {
                font-size: 20px;
                font-weight: bold;
            }
            .separator {
               
                margin: -1.3rem 0 1.5rem;
            }
            @media print{
                body {
                    font-size: 12px;
                    color: #212121;
                }
                nav {
                    display: none;
                }
                table {
                    width: 100%;
                    font-size: 12px;
                    color: #212121;
                }
                tr, td {
                   
                    padding: 8px!important;
                }
                tr,td {
                    vertical-align: top!important;
                }
                #lbr {
                    font-size: 20px;
                }
                .isi {
                    height: 200px!important;
                }
                .tgh {
                    text-align: center;
                }
                .disp {
                    text-align: center;
                    margin: -.5rem 0;
                }
                .logodisp {
                    float: left;
                    position: relative;
                    width: 80px;
                    height: 80px;
                    margin: .5rem 0 0 .5rem;
                }
                #lead {
                    width: auto;
                    position: relative;
                    margin: 15px 0 0 75%;
                }
                .lead {
                    font-weight: bold;
                    text-decoration: underline;
                    margin-bottom: -10px;
                }
                #nama {
                    font-size: 20px!important;
                    font-weight: bold;
                    text-transform: uppercase;
                    margin: -10px 0 -20px 0;
                }
                .up {
                    font-size: 17px!important;
                    font-weight: normal;
                }
                .status {
                    font-size: 17px!important;
                    font-weight: normal;
                    margin-bottom: -.1rem;
                }
                #alamat {
                    margin-top: -15px;
                    font-size: 13px;
                }
                #lbr {
                    font-size: 17px;
                    font-weight: bold;
                }
                .separator {
                   
                    margin: -1rem 0 1rem;
                }
            }
        </style>
        <body onload="window.print()">
        <!-- Container START -->
            <div id="colres">
                <div class="disp">';
                    $query2 = mysqli_query($config, "SELECT institusi, nama, status, alamat, logo FROM tbl_instansi");
                    list($institusi, $nama, $status, $alamat, $logo) = mysqli_fetch_array($query2);
                        echo '<img class="logodisp" src="./upload/'.$logo.'"/>';
                        echo '<h6 class="up">'.$institusi.'</h6>';
                        echo '<h5 class="up" id="nama">'.$nama.'</h5><br/>';
                        echo '<h6 class="status">'.$status.'</h6>';
                        echo '<span id="alamat">'.$alamat.'</span>';

                    echo '
                </div>
                <div class="separator"></div>';

                $id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
                $query = mysqli_query($config, "SELECT * FROM tbl_surat_masuk WHERE id_surat='$id_surat'");

                if(mysqli_num_rows($query) > 0){
                $no = 0;
                while($row = mysqli_fetch_array($query)){

                echo '
                    <table>
                        <tbody>
                        <tr>
                        <p style="text-align: center;"><strong><u>S U R A T   T U G A S </u></strong></p>
                        <p style="text-align: center;"><strong><u>No : 0095/FTI/2021</u></strong></p>
                        <p style="text-align: justify;">Sehubungan dengan permintaan dari sentra Pengembangan Masyarakat untuk ini dekan Fakultas Teknologi Informasi Universitas Kristen Duta Wacana Yogyakarta memberikan tugas kepada mahasiswa tersebut di bawah ini  :</p>
                        <p id="left" width="25">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNama : '.$row['kode'].'</p>
                        <p id="left" width="25">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNim/Nik : '.$row['no_agenda'].'</p>
                        <p style="text-align: justify;">Untuk bertugas sebagai narasumber dalam pembekalan alumni Pengembangan Masyarakat yang diselenggarakan pada :    </p>
                        <p id="left" width="25">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTanggal : '.indoDate($row['tgl_diterima']).'</p>
                        <p id="left" width="25">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTEMA/ISI SURAT : '.$row['isi'].'</p>
                        <p id="left" width="25">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAsal Surat : '.$row['asal_surat'].'</p>
                        <p style="text-align: justify;">Demikian Surat Tugas Ini Dibuat Untuk Dapat dipergunakan Sebagaimana Perlunya. </p>
                        <p style="text-align: justify;">&nbsp&nbsp&nbsp<strong><u>D E K A N,</u></strong></p>
                        <br>

                        <p style="text-align: justify;"><strong><u>Katon Wijana S.KOM</u></strong></p>
                        <p style="text-align: justify;"><strong>NIK/NIM :98647583</strong></p>
                        </br>
                        </tr>';
                            }
                        } echo '
                </tbody>
            </table>
           
        </div>
        <div class="jarak2"></div>
    <!-- Container END -->
    </body>';
    }
?>