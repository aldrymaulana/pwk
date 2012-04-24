<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/reset.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/grid.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery-ui-1.8.5.custom.css" type="text/css" media="all">
        <link href="<?php echo base_url() ?>css/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.4.2.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/ddaccordion.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui-1.8.5.custom.min.js"></script>
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
                                    margin-bottom: 10px; /*bottom spacing between header and rest of content*/
                                    text-transform: uppercase;
                                    padding: 4px 0 4px 10px; /*header text is indented 10px*/
                                    cursor: hand;
                                    cursor: pointer;
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
            font-size: 90%;

        }

        .arrowlistmenu ul li a:visited{
            color: #A70303;
            font-family: ColaborateThinRegular;
        }

        .arrowlistmenu ul li a:hover{ /*hover state CSS*/
                                      color: #A70303;
                                      background-color: #F3F3F3;
                                      font-family: ColaborateThinRegular;
        }

    </style>

</head>

<body>
<header>
    <nav>
        <div class="container">
            <div class="header" align="left" style="color: #D4D0C8; position: fixed">
                <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="110" height="80">
                    <param name="movie" value="<?php echo base_url() ?>/gallery/logo.swf">
                    <param name="quality" value="high">
                    <param name="wmode" value="opaque">
                    <param name="swfversion" value="8.0.35.0">
                    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                    <param name="expressinstall" value="Scripts/expressInstall.swf">
                    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                    <!--[if !IE]>-->
                    <object type="application/x-shockwave-flash" data="<?php echo base_url() ?>gallery/logo.swf" width="110" height="80">
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
            <div class="wrapper" style="padding-left: 120px">

    <h1 ><a href="<? echo base_url() ?>"><strong>
                            Jurusan Perencanaan Wilayah dan Kota</strong></a></h1>
							
                <ul>
                    <li><a href="#" class="current">Lab Kota</a></li>
                    <li><a href="#" >Lab Wilayah</a></li>
                    <li><a href="#" >Lab Perencanaan</a></li>
                </ul>
				<h3>Fakultas Teknik Sipil dan Perencanaan ITS</h3>
            </div>
        </div>
    </nav>
  
</header>
<section id="content">
    <div class="top">
        <div class="container">
            <div class="clearfix">
                <section id="gallery">
                    <div class="pics">
                        <img src="<?php echo base_url() ?>/images/images/slide1.jpg" alt="" width="495" height="329">
                        <img src="<?php echo base_url() ?>/images/images/slide3.jpg" alt="" width="495" height="329">
                        <img src="<?php echo base_url() ?>/images/images/slide2.jpg" alt="" width="495" height="329">
                        <img src="<?php echo base_url() ?>/images/images/slide4.jpg" alt="" width="495" height="329">
                        <img src="<?php echo base_url() ?>/images/images/slide5.jpg" alt="" width="495" height="329">
                    </div>
                    <a href="#" id="prev"></a>
                    <a href="#" id="next"></a>
                </section>
                <section id="intro">
                    <div class="inner">
                        <h2>Jurusan Perencanaan Wilayah & Tata Kota</h2>
                        <h3>Jl.Teknik Kimia </br> Surabaya 60111</h3>
                        <a href="#" class="extra-button">Tentang Kita</a>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="middle">
        <div class="container">
            <div class="wrapper">
                <div class="grid3 first">
                    <ul class="categories">

                        <div class="arrowlistmenu">

                            <h3 class="menuheader " ><a href="<? echo base_url() ?>">Home</a></h3>
                            <h3 class="menuheader expandable">Profil</h3>
                            <ul class="categoryitems">
                                <li><a href="#">Visi & Misi</a></li>
                                <li><a href="#">Sejarah</a></li>
                                <li><a href="#">Struktur Organisasi</a></li>
                                <li><a href="#">Kerja Sama</a></li>
                                <li><a href="#">Lokasi Kampus</a></li>
                                <li><a href="#">Forum Tanya Jawab</a></li>
                            </ul>

                            <h3 class="menuheader expandable">Civitas Akademika</h3>
                            <ul class="categoryitems">
                                <li><a href="#">Dosen</a></li>
                                <li><a href="#">Karyawan</a></li>
                                <li><a href="#">Mahasiswa</a></li>
                                <li><a href="#">Alumni</a></li>
                            </ul>

                            <h3 class="menuheader expandable">Sumber Daya</h3>
                            <ul class="categoryitems">
                                <li><a href="" >Fasilitas</a></li>
                                <li><a href="">Kurikulum</a></li>
                                <li><a href="">Jurnal</a></li>
                                <li><a href="">Media</a></li>
                                <li><a href="">Ormawa</a></li>
                            </ul>
                            <h3 class="menuheader expandable">Lainnya</h3>
                            <ul class="categoryitems">
                                <li><a href="" >Jalur Penerimaan</a></li>
                                <li><a href="<?echo base_url()?>index.php/berita_c">Berita</a></li>
                            </ul>
                        </div>

                    </ul>
                </div>
                <div class="grid9">
                    <h2>Sekapur Sirih</h2>
                    <p>Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue fermentum nisl. Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede m aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortisissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. </p>
                    <p><a href="#" class="more">Read More</a></p>
                    <section class="images">
                        <figure><a href="#"><img src="<?php echo base_url() ?>/images/images/1page-img1.jpg" alt=""></a></figure>
                        <figure><a href="#"><img src="<?php echo base_url() ?>/images/images/1page-img2.jpg" alt=""></a></figure>
                        <figure><a href="#"><img src="<?php echo base_url() ?>/images/images/1page-img3.jpg" alt=""></a></figure>
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
                        <li><a href="#">Dinas Pariwisata</a></li>
                        <li><a href="#">Bapedda Jatim</a></li>
                    </ul>
                </div>
                <div class="grid3">
                    <h3>Pusat Download</h3>
                    <ul class="list2">
                        <li><a href="#">Content 1</a></li>
                        <li><a href="#">Content 2</a></li>
                        <li><a href="#">Content 3</a></li>
                    </ul>
                </div>
                <div class="grid3">
                    <div id="datepicker"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="wrapper">
            <div class="copy">Site Building <a href="http://dts-itsolution.com">DTS</a></div>
            <address class="phone">
        	Hubungi Kami di <strong>1-123-456-7890</strong>
            </address>
        </div>
    </div>
</footer>
<script type="text/javascript">
    $(document).ready(function() {
        $('.pics').cycle({
            fx: 'toss',
            next:   '#next',
            prev:   '#prev'
        });

        // Datepicker
        $('#datepicker').datepicker({
            inline: true
        });

    });
    swfobject.registerObject("FlashID");
</script>
</body>
</html>