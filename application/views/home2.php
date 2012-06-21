<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Website Resmi Program Studi Perencanaan Wilayah dan Kota ITS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" media="screen" href="<?php echo base_url() ?>css/superfish.css" />
        <link rel="stylesheet" media="screen" href="<?php echo base_url() ?>css/superfish-navbar.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>css/reset.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/grid.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery-ui-1.8.5.custom.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/default/default.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url() ?>css/nivo-slider.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <link href="<?php echo base_url() ?>css/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.4.2.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/ddaccordion.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui-1.8.5.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.nivo.slider.js"></script>
        <script src="<?php echo base_url() ?>js/hoverIntent.js"></script>
        <script src="<?php echo base_url() ?>js/superfish.js"></script>

        <script>

            $(document).ready(function(){
                $("ul.sf-menu").superfish({
                    pathClass:  'current'
                });
            });

        </script>
        <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
        </script>
        <script src="Scripts/swfobject_modified.js" type="text/javascript"></script>

        <!--[if lt IE 9]>
              <script type="text/javascript" src="js/html5.js"></script>
        <![endif]-->

        <!--   begin left sidebar code     -->
    </script>
    <script type="text/javascript">
        ddaccordion.init({
            headerclass: "expandable", //Shared CSS class name of headers group that are expandable
            contentclass: "categoryitems", //Shared CSS class name of contents group
            revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
            mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
            collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
            defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
            onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
            animatedefault: false, //Should contents open by default be animated into view?
            persiststate: true, //persist state of opened contents within browser session?
            toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
            togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
            animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
            oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
                //do nothing
            },
            onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
                //do nothing
            }
        })


    </script>

    <style type="text/css">

        .arrowlistmenu{
            width: 180px; /*width of accordion menu*/
        }

        .arrowlistmenu .menuheader{ /*CSS class for menu headers in general (expanding or not!)*/
                                    font: bold 14px Arial;
                                    color: white;
                                    background: black url(titlebar.png) repeat-x center left;
                                    -moz-border-radius-topright: 10px;
                                    -moz-border-radius-bottomright: 10px;
                                    border-top-right-radius: 10px;
                                    border-bottom-right-radius: 10px;
                                    margin-bottom: 10px; /*bottom spacing between header and rest of content*/
                                    text-transform: uppercase;
                                    padding: 4px 0 4px 10px; /*header text is indented 10px*/
                                    cursor: hand;
                                    cursor: pointer;
        }

        .arrowlistmenu .menuheader a{
            color:#fff;
            text-decoration:none;
        }

        .arrowlistmenu .openheader{ /*CSS class to apply to expandable header when it's expanded*/
                                    background-image: url(titlebar-active.png);
        }

        .arrowlistmenu ul{ /*CSS for UL of each sub menu*/
                           list-style-type: none;
                           margin: 0;
                           padding: 0;
                           margin-bottom: 8px; /*bottom spacing between each UL and rest of content*/
        }

        .arrowlistmenu ul li{
            padding-bottom: 2px; /*bottom spacing between menu items*/
        }

        .arrowlistmenu ul li a{
            color: #A70303;
            background: url(arrowbullet.png) no-repeat center left; /*custom bullet list image*/
            display: block;
            padding: 2px 0;
            padding-left: 19px; /*link text is indented 19px*/
            text-decoration: none;
            font-weight: bold;
            border-bottom: 1px solid #dadada;
            font-size: 14px;

        }

        .arrowlistmenu ul li a:visited{
            color: #A70303;
            font-family: ColaborateThinRegular;
        }

        .arrowlistmenu ul li a:hover{ /*hover state CSS*/
                                      color: #fff;
                                      background-color: #F3F3F3;
                                      font-family: ColaborateThinRegular;
        }

    </style>

</head>

<body>
<header>
    <nav>
        <div class="containerhead">
            <div class="header" align="left" style="color: #D4D0C8; position: absolute"; z-index:-1;>
                 <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="110" height="80">
                    <param name="movie" value="<?php echo base_url() ?>/gallery/logo.swf">
                    <param name="quality" value="high">
                    <param name="wmode" value="opaque">
                    <param name="swfversion" value="8.0.35.0">
                    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don�t want users to see the prompt. -->
                    <param name="expressinstall" value="Scripts/expressInstall.swf">
                    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                    <!--[if !IE]>-->
                    <object type="application/x-shockwave-flash" data="<?php echo base_url() ?>gallery/logo.swf" width="137.5" height="100">
                        <!--<![endif]-->
                        <param name="quality" value="high">
                        <param name="wmode" value="opaque">
                        <param name="swfversion" value="8.0.35.0">
                        <param name="expressinstall" value="Scripts/expressInstall.swf">
                        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                        <div>
                            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                        </div>
                        <!--[if !IE]>-->
                    </object>
                    <!--<![endif]-->
                </object>
            </div>
            <div class="wrapper" style="padding-left: 135px; padding-top: 10px">

                <h1 ><a href="<?php echo base_url() ?>"><strong>
                            Program Studi Perencanaan Wilayah dan Kota</strong></a></h1>
                <ul class="sf-menu sf-navbar">
                    <li><a class="sf-with-ul" href="#">Lab Kota</a>
                        <ul>
                            <li><a href="#">Profil</a></li>
                            <li><a href="#aba">Anggota</a></li>
                            <li><a href="#aba">Riset dan Publikasi</a></li>
                        </ul>
                    </li>
                    <li><a class="sf-with-ul" href="#" >Lab Wilayah</a>
                        <ul>
                            <li><a href="#">Profil</a></li>
                            <li><a href="#aba">Anggota</a></li>
                            <li><a href="#aba">Riset dan Publikasi</a></li>
                        </ul>
                    </li>
                    <li><a class="sf-with-ul" href="#" >Lab Komputasi</a>
                        <ul>
                            <li><a href="#">Profil</a></li>
                            <li><a href="#aba">Anggota</a></li>
                            <li><a href="#aba">Riset dan Publikasi</a></li>
                        </ul>
                    </li>
                </ul>
                <h3>Fakultas Teknik Sipil dan Perencanaan ITS</h3>
            </div>
        </div>
    </nav>

</header>
<section id="content">
    <div class="top">
        <div class="container">
            <div class="slider-wrapper theme-default">
                <div id="slider" class="nivoSlider">
                    <?php
                    $counter = 1;
                    foreach ($foto_slide->result() as $foto) {
                        $lokasi_foto = base_url() . $foto->lokasi;
                        $deskripsi = $foto->deskripsi;
                        $link = $foto->link_deskripsi;
                        echo
                        '
                                <img width="1000" height="340" src="' . $lokasi_foto . '" data-thumb="' . $lokasi_foto . '" alt="" title="#htmlcaption' . $counter . '"/>
                            ';
                        echo
                        '
                                <div id="htmlcaption' . $counter . '" class="nivo-html-caption">

                                    <a href="' . $link . '">' . $deskripsi . '</a>
                                </div>
                            ';
                        $counter++;
                    }
                    ?>
                    <!--                end of image-->
                </div>


                <!--            <div id="htmlcaption2" class="nivo-html-caption">
                                <strong>This</strong> is an example of a <em>HTML</em> caption.
                            </div>-->
            </div>
        </div>
    </div>
    <div class="middle">
        <div class="container">
            <div class="wrapper">
                <div class="grid3 first">
                    <ul class="categories">
                        <div class="arrowlistmenu">
                            <h3 class="menuheader expendable"><a href="<?php echo base_url() ?>">Home</a></h3>
                            <h3 class="menuheader expandable">Profil</h3>
                            <ul class="categoryitems">
                                <li><a href="<?php echo base_url() ?>index.php/visimisi">Visi & Misi</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/sejarah">Sejarah</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/struktur">Struktur Organisasi</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/kerjasama">Kerja Sama</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/lokasikampus">Lokasi Kampus</a></li>
                            </ul>
                            <h3 class="menuheader expandable">Civitas Akademika</h3>
                            <ul class="categoryitems">
                                <li><a href="<?php echo base_url() ?>index.php/dosen_c">Dosen</a></li>
                                <li><a href="<?php echo base_url()?>index.php/karyawan">Karyawan</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/mhs_c">Mahasiswa</a></li>
                                <li><a href="#">Alumni</a></li>
                            </ul>
                            <h3 class="menuheader expandable">Sumber Daya</h3>
                            <ul class="categoryitems">
                                <li><a href="">Fasilitas</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/kurikulum">Kurikulum</a></li>
                                <li><a href="">Jurnal</a></li>
                                <li><a href="">Media</a></li>
                                <li><a href="">Budaya Kampus</a></li>
                                <li><a href="">Ormawa</a></li>
                            </ul>
                            <h3 class="menuheader expandable">Jalur Penerimaan</h3>
                            <ul class="categoryitems">
                                <li><a href="http://smits.its.ac.id/">SMITS</a></li>
                            </ul>
                            <h3 class="menuheader expandable">Berita & Agenda</h3>
                            <ul class="categoryitems">
                                <li><a href="<?php echo base_url() ?>index.php/artikel/daftar_berita">Berita</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/artikel/daftar_berita_high">Highlights</a></li>
                            </ul>
                        </div>

                    </ul>
                </div>
                <div class="grid9">
                    <h2>Sekapur Sirih</h2>
                    <p align="justify" >Pembangunan nasional   membutuhkan sumber daya manusia yang berkualitas dan berkemampuan untuk   mengembangkan dan menerapkan ilmu pengetahuan dan teknologi dalam bidang   perencanaan wilayah dan kota.</p>
                    <p align="justify"> Seiring dengan  pelaksanaan   otonomi daerah, kebutuhan sarjana Perencanaan Wilayah dan Kota juga   meningkat,  khususnya untuk memenuhi kebutuhan di Kawasan Timur&nbsp;   Indonesia. </p>
                    <p align="justify" >Pendidikan perencanaan  wilayah   dan kota yang dikembangkan di Program Studi Perencanaan Wilayah dan Kota    (PWK) FTSP-ITS, ditujukan untuk  mencetak sarjana PWK yang mempunyai   kompetensi sebagai perencana (planer) tata ruang wilayah  dan kota,   manajer pembangunankota dan pengembangan masyarakat, akademisi,   peneliti, dan membekali  lulusan yang ingin melanjtukan studi jenjang   yang lebih tinggi (S2 dan S3).</p>
                    <p align="justify" >Bidang kajian yang dikembangkan di Program Studi PWK meliputi :</p>
                    <ul type="disc">
                        <li>Perencanaan Wilayah               (Regional Planning)</li>
                        <li>Perencanaan dan Perancangan Kota                (Urban Planning and Urban Design) </li>
                        <li>Manajemen Perkotaan                 (Urban Management) </li>        <li>        Perencanaan dan Pengelolaan Kawasan Pesisir                 (Urban Planning and Urban Design) </li>
                    </ul>
                    <p align="justify" ></p>
                    <section class="images">
                        <figure><img src="<?php echo base_url() ?>/images/images/1page-img2.jpg" alt=""></figure>
                        <figure><img src="<?php echo base_url() ?>/images/images/1page-img1.jpg" alt=""></figure>
                        <figure><img src="<?php echo base_url() ?>/images/images/1page-img3.jpg" alt=""></figure>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="wrapper">
                <div class="grid3 first">
                    <h3>Follow Us</h3>
                    <ul class="list1">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                    </ul>
                </div>
                <div class="grid3">
                    <h3>Quick Links</h3>
                    <ul class="list2">
                        <li><a href="http://www.its.ac.id">Institut Teknologi Sepuluh November</a></li>
                        <li><a href="#">Dinas Pariwisata</a></li>
                        <li><a href="#">Bapedda Jatim</a></li>
                    </ul>
                </div>
                <div class="grid3">
                    <h3>Pemkab Links</h3>
                    <ul class="list2">
                        <li><a href="http://gresikkab.go.id/">Gresik</a></li>
                        <li><a href="http://www.bangkalankab.go.id/">Bangkalan</a></li>
                        <li><a href="http://www.mojokertokab.go.id/">Mojokerto</a></li>
                        <li><a href="http://www.sumenep.go.id/">Sumenep</a></li>
                        <li><a href="http://www.sidoarjokab.go.id/">Sidoarjo</a></li>
                        <li><a href="http://www.lamongan.go.id/">Lamongan</a></li>
                    </ul>
                </div>
                <div class="grid3">
                    <div id="datepicker">
                 test
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="wrapper">
            <div class="copy">&copy; Copyright by <a href="http://dts-itsolution.com">DTS</a></div>
            <address class="phone">
                Hubungi Kami di <strong>1-123-456-7890</strong>
            </address>
        </div>
    </div>
</footer>

</body>
</html>
