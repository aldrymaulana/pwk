<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Lokasi Kampus - Website Resmi Program Studi Perencanaan Wilayah dan Kota ITS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" media="screen" href="<?php echo base_url() ?>css/superfish.css" /> 
		<link rel="stylesheet" media="screen" href="<?php echo base_url() ?>css/superfish-navbar.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>css/reset.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/grid.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery-ui-1.8.5.custom.css" type="text/css" media="all">
        <link href="<?php echo base_url() ?>css/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.4.2.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/ddaccordion.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui-1.8.5.custom.min.js"></script>
		<script src="<?php echo base_url() ?>js/hoverIntent.js"></script> 
		<script src="<?php echo base_url() ?>js/superfish.js"></script>
		<script> 
			$(document).ready(function(){ 
				$("ul.sf-menu").superfish({ 
					pathClass:  'current' 
				}); 
			}); 
		</script>
        <!-- Demo only >
        <!--link href="<?php //echo base_url() ?>demo/demo.css" media="screen" rel="stylesheet">
        <style>
            /* Dimensions set via css in MovingBoxes version 2.2.2+ */
            #slider { width: 500px; }
            #slider li { width: 250px; }
        </style>
        <script>
            $(function(){

                $('#slider').movingBoxes({
                    /* width and panelWidth options deprecated, but still work to keep the plugin backwards compatible
                        width: 500,
                        panelWidth: 0.5,
                     */
                    startPanel   : 1,      // start with this panel
                    wrap         : false,   // if true, the panel will "wrap" (it really rewinds/fast forwards) at the ends
                    buildNav     : true,   // if true, navigation links will be added
                    navFormatter : function(){ return "&#9679;"; } // function which returns the navigation text for each panel
                });

            });
        </script-->

        <!--[if lt IE 9]>
              <script type="text/javascript" src="js/html5.js"></script>
        <![endif]-->

        <!--   begin left sidebar code     -->


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
            font-size: 100%;

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
                <div class="header" align="left" style="color: #D4D0C8; position: absolute">
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
                <div class="wrapper" style="padding-left: 135px; padding-top: 10px">

                    <h1 ><a href="<?php echo base_url() ?>"><strong>
                                Program Studi Perencanaan Wilayah dan Kota</strong></a></h1>
                    <ul class="sf-menu sf-navbar">
                        <li><a class="sf-with-ul" href="#">Lab Kota</a>
						<ul>
							<li><a href="#">Info1</a></li>
							<li><a href="#aba">Info2</a></li>
						</ul>
                        <li><a class="sf-with-ul" href="#" >Lab Wilayah</a>
						<ul>
							<li><a href="#">Info1</a></li>
							<li><a href="#aba">Info2</a></li>
						</ul>
						</li>
						<li><a class="sf-with-ul" href="#" >Lab Perencanaan</a>
						<ul>
							<li><a href="#">Info1</a></li>
							<li><a href="#aba">Info2</a></li>
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
                <div class="clearfix">
                    <div class="grid9 first">
                        <h1>Lokasi Kampus</h1>
                        <iframe width="650" height="430" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=institut+teknologi+sepuluh+november&amp;ie=UTF8&amp;hq=institut+teknologi+sepuluh+november&amp;hnear=&amp;ll=-6.774774,109.787417&amp;spn=1.016871,6.015165&amp;t=h&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=institut+teknologi+sepuluh+november&amp;ie=UTF8&amp;hq=institut+teknologi+sepuluh+november&amp;hnear=&amp;ll=-6.774774,109.787417&amp;spn=1.016871,6.015165&amp;t=h" style="color:#0000FF;text-align:center"></a></small>
                    </div>
                    <div class="grid3">
						<ul class="categories">
                        <div class="arrowlistmenu">

                            <h3 class="menuheader " ><a href="<? echo base_url() ?>">Home</a></h3>
                            <h3 class="menuheader expandable">Profil</h3>
                            <ul class="categoryitems">
                                <li><a href="<?php echo base_url() ?>index.php/visimisi">Visi & Misi</a></li><li>
                                <li><a href="<?php echo base_url() ?>index.php/sejarah">Sejarah</a></li>
                                <li><a href="#">Struktur Organisasi</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/kerjasama">Kerja Sama</a></li>
                                <li><a href="<?php echo base_url()?>index.php/lokasikampus">Lokasi Kampus</a></li>
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
                                <li><a href="<? echo base_url() ?>index.php/berita_c">Berita</a></li>
                            </ul>
                        </div>

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