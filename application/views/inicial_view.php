<?php require_once('skin/header.php'); ?>

<?php 

function URLr($a) {
return preg_replace('#(^|\s)(http://([a-zA-Z0-9\-.]?[a-zA-Z0-9?+%~&=_/-])*)#is', '\\1<a href="\\2" target="_blank">\\2</a><br>', $a);
}


?>


	<section>
  	<div class="container">
      <div class="hero-unit">

        <div class="row">
          <div class="span12 title">
            <center>
              <img src="<?=base_url('img/title.png'); ?>">
            </center>
          </div>
          <?php 
          $c = 0;
          $cg = 0;
          foreach ($facebook as $key => $value) : ?>

          <? if(isset($value['picture']) || isset($value['message']) || isset($value['link'])): ?>
              <article>
                <div class="span12 big">
                  <div class="padding20">
                    <div style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; background: rgba(0,0,0,.75); overflow: hidden;  color: rgb(231, 222, 222);">
                      <div class="padding20" style="overflow: hidden;"> <? //Inicio del contenedor gris ?>
                        <div style="overflow: hidden; margin-bottom: 15px;">
                          <div style="float: left;">
                            <img class="img-polaroid2" style="float:left;" src="http://graph.facebook.com/<?=$value['from']['id'];?>/picture?type=square">
                          </div>
                          <div style="float: left; margin-left: 20px;">
                            <h4 style="float:left;"> <?=$value['from']['name'];?></h4>
                          </div>
                          <h4 class="pull-right">Hace <?=time_elapsed($value['created_time']);?></h4>
                        </div>
                        <div style="overflow: hidden; margin-bottom: 15px;">
                          <?php if(isset($value['picture']) && $value['type'] != 'video' ): ?>

                            <? if(isset($gallery[$value['id']])):?>

                              <div class="gal"> <? //Inicio Galeria ?>
                                <? if(count($gallery[$value['id']]['photos']['data'])>1):?>
                                  <? foreach($gallery[$value['id']]['photos']['data'] as $keyimg => $valueimg):?>
                                    

                                  	<? if($keyimg==5):?>
                                    	<div id="images<?=$key;?>" class="collapse"> 
                                	<? endif; ?>

                                    <a class="group<?=$cg?> cboxElement" href="<?=$valueimg['source'];?>">
                                      <img class="img-polaroid imggal" src="<?=$valueimg['images'][5]['source'];?>">
                                    </a>

                                    <? if($keyimg==count($gallery[$value['id']]['photos']['data'])-1):?>
                                    	</div>
                                    <? endif; ?>

                                  <? endforeach;?>

                                  <? if(count($gallery[$value['id']]['photos']['data'])>5):?>
                                    <div class="margin10top margin10bot">
                                    	<button id="btnGaleryMore" type="button" class="btn btn-danger" data-toggle="collapse" data-target="#images<?=$key;?>">
											<?=count($gallery[$value['id']]['photos']['data'])-5;?> Fotos Más...
										</button>
                                    </div>
                                  <? endif; ?>

                                <? endif; ?>

                                

                              </div> <? //Fin Galeria ?>

                              <? $cg++; ?>

                            <? else: ?>

                              <div class="<?=(is_float($c/2)) ? 'float_left' : 'float_right'; ?>">
                                <a class="lightbox" href="<?=$value['picture'];?>">
                                  <img class="img-polaroid imgart" src="<?=$value['picture'];?>">
                                </a>
                              </div>
                              <? $c++; ?>

                            <? endif; ?>

                            <? if (isset($value['message'])): ?>
                              <div class="padding10 float_left"><p> <?=URLr($value['message']);?></p></div>
                            <? endif; ?>


                          <?php elseif($value['type'] == 'video'):  //VIDEOS  ?>

                            <div class="video-container">

                              <? if(strpos($value['link'], "http://youtu.be/") !== false):  //YOUTUBE ?>
                                <? preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $value['link'], $url);?>
                                <iframe id="ytplayer" type="text/html" width="640" height="360" src="https://www.youtube.com/embed/<?=$url[0];?>?theme=light" frameborder="0" allowfullscreen></iframe>
                              <? elseif(strpos($value['link'], "http://www.youtube.com/watch?v=") !== false):  //YOUTUBE OLD ?>
                                <? parse_str( parse_url( $value['link'], PHP_URL_QUERY ), $video_id );?>
                                <iframe id="ytplayer" type="text/html" width="640" height="360" src="https://www.youtube.com/embed/<?=$video_id['v'];?>?theme=light" frameborder="0" allowfullscreen></iframe>
                              <? elseif (strpos($value['link'], "http://vimeo.com/") !== false):  //VIMEO ?>
                                <? sscanf(parse_url($value['link'], PHP_URL_PATH), '/%d', $video_id); ?>
                                <iframe id="ytplayer" src="http://player.vimeo.com/video/<?=$video_id;?>?portrait=0&color=c6b199" width="640" height="360" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                              <? endif; ?>

                            </div>
                              <? if (isset($value['message'])): ?>
                                <div class="padding10 centrado"><p> <?=$value['message'];?></p></div>
                              <? endif; ?>

                          <?php else: ?>

                            <div class="padding20">
                              <? if (isset($value['message'])): ?>
                                <p> <?=URLr($value['message']);?></p>
                              <? elseif (isset($value['link'])): ?>
                                <? if (isset($event[$value['id']])): //EVENTOS ?>
                                  <div class="float_left">
                                    <a href="<?=$value['link'];?>">
                                      <img class="img-polaroid float_left imgeve" name="<?=$event[$value['id']]['name'];?>" src="<?=$event[$value['id']]['picture']['data']['url'];?>">
                                    </a>
                                    <p><h3><strong class="eve">Evento:</strong> <?=$event[$value['id']]['name'];?></h3></p>
                                    <p><strong class="eve">Descripción:</strong> <?=$event[$value['id']]['description'];?></p>
                                    <p><strong class="eve">Fecha:</strong> <?=date("d/m/Y H:i",strtotime($event[$value['id']]['start_time']));?></p>
                                    <p><a target="_blank" class="btn btn-success" href="<?=$value['link'];?>">Ir al Evento</a></p>
                                  </div>
                                <? endif; ?>
                              <? endif; ?>
                            </div>

                          <?php endif; ?>

                        </div>

                        <? // LIKES ?>
                        <?php if(isset($value['likes'])):  //LIKES  ?>
                          <div class="likes">
                            <div class="liketitle"><?=count($value['likes']['data']);?> LIKES:</div>
                            <? foreach ($value['likes']['data'] as $keylikes => $valuelikes): //Inicio Foreach LIKES?>
                              <a class="float_left" style="margin: 0 5px;" href="http://facebook.com/<?=$valuelikes['id'];?>" target="_blank" rel="tooltip" data-toggle="tooltip" data-placement="bottom" title="<?=$valuelikes['name'];?>" data-original-title="Tooltip">
                                <img src="http://graph.facebook.com/<?=$valuelikes['id'];?>/picture?type=square" tittle="<?=$valuelikes['name'];?>">
                              </a>
                            <? endforeach; //Fin Foreach LIKES?>
                          </div>
                        <?php endif; ?> 


                        <? // COMMENTS ?>
                        <?php if(isset($value['comments'])):  //COMENTARIOS  ?>
                          <? foreach ($value['comments']['data'] as $keycom => $valuecom): //Inicio Foreach COMMENTS?>
                            <div class="comments">
                              <? if($keycom == 0): ?><div class="liketitle">COMENTARIOS:</div><? endif; ?>
                              <div class="padding10" style="overflow: hidden;">

                                <div style="overflow: hidden; margin-bottom: 15px;">
                                  <div style="float: left;">
                                  	<a class="float_left" style="margin: 0 5px;" href="http://facebook.com/<?=$valuecom['from']['id'];?>" target="_blank" rel="tooltip" data-toggle="tooltip" data-placement="right" title="<?=$valuecom['from']['name'];?>" data-original-title="Tooltip">
                                    	<img style="float:left;" src="http://graph.facebook.com/<?=$valuecom['from']['id'];?>/picture?type=square" tittle="<?=$valuecom['from']['name'];?>">
                                    </a>
                                  </div>
                                  <div style="float: left; margin-left: 20px;">
                                    <h4 style="float:left;"><?=$valuecom['from']['name'];?></h4>
                                  </div>
                                  <h4 class="pull-right">Hace <?=time_elapsed($valuecom['created_time']);?></h4>
                                </div>
                                <div class="comment">
                                  <?=$valuecom['message'];?>
                                </div>
                              </div>
                            </div>
                          <? endforeach; //Fin Foreach LIKES?>
                        <? endif; ?>


                      </div> <? //Fin del contenedor gris ?>
                    </div>

                  </div>
                </div>
              </article>
            <? endif; ?> 
          <? endforeach; ?>


        </div>

        <? //PAGINACION  ?>

        <div class="padding10">
          <center>
            <div class="pagination pagination-large">
              <?=$links;?>
            </div>
          </center>
        </div>


  		</div>
  	</div>
  </section>







<?php require_once('skin/footer.php'); ?>