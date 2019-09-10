<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ЗD панорамы Рязанского филиала Московского университета МВД России имени В.Я. Кикиотя</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--link href="/style/panarama/fontawesome.min.css" rel="stylesheet" type="text/css"-->
        <link href="/style/panarama/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/style/panarama/main.css" rel="stylesheet" type="text/css">
        
        <link href="/style/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="panorama page">
            <?php
                require_once __DIR__ . '/breadcrumbs.php';
            ?>
            <div class="row">
                <?php foreach($panarama AS $pan):?>
                    <div class="col-md-6 elem grayscale" data-id="<?=$pan['folder']?>">
                        <img src="/upload/panarama/<?=$pan['folder']?>/cover.jpg" alt="<?=$pan['title']?>">
                        <div class="label">
                            <h3><?=$pan['title']?></h3>
                            <p></p>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="modal fade" id="panarama">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Заголовок модального окна</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body" id="container">
                      Содержимое модального окна...
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="/script/panarama/swfobject.js"></script>
        <script type="text/javascript" src="/script/panarama/jquery.min.js"></script>
        <script type="text/javascript" src="/script/panarama/popper.min.js"></script>
        <script type="text/javascript" src="/script/panarama/bootstrap.min.js"></script>
        <script type="text/javascript" src="/script/panarama/pano2vr_player.js"></script>
        <script type="text/javascript">
            $('document').ready(function(){
                $('.elem').on('click',function(){
                    var id = $(this).attr('data-id');
                    var label = $(this).children('.label').children('h3').text();
                    $('#panarama .modal-title').text(label);
                    $("#panarama").modal('show');
                    
                    if (ggHasHtml5Css3D() || ggHasWebGL()) {
			pano=new pano2vrPlayer("container");
                        pano.readConfigUrlAsync('/upload/panarama/'+id+"/pano.xml");
                    } else 
                        if (swfobject.hasFlashPlayerVersion("10.0.0")) {
                            var flashvars = {};
                            var params = {};
                            // enable javascript interface
                            flashvars.externalinterface="1";
                            params.quality = "high";
                            params.bgcolor = "";
                            params.allowscriptaccess = "sameDomain";
                            params.allowfullscreen = "true";
                            var attributes = {};
                            attributes.id = "flashpano";
                            attributes.name = "flashpano";
                            attributes.align = "middle";
                            swfobject.embedSWF(
				"", "container", "100%", "100%","10.0.0", "", flashvars, params, attributes);
                        }
                });
            });
            
        </script>
    </body>
</html>
