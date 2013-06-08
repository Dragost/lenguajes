<?php require_once('skin/header.php'); ?>


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
          foreach ($facebook as $key => $value) { ?>

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
                          <?php if(isset($value['picture']) && $value['type'] != 'video'): ?>
                            <div class="<?=(is_float($c/2)) ? 'float_left' : 'float_right'; ?>">
                              <a class="lightbox" href="<?=$value['picture'];?>">
                                <img class="img-polaroid imgart" src="<?=$value['picture'];?>">
                              </a>
                            </div>
                              <? if (isset($value['message'])): ?>
                                <div class="padding10 float_left"><p> <?=$value['message'];?></p></div>
                              <? endif; ?>
                            <? $c++; ?>

                          <?php elseif($value['type'] == 'video'): ?>
                            <div class="video-container">
                              <? preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $value['link'], $url);?>
                              <iframe id="ytplayer" type="text/html" width="640" height="360" src="https://www.youtube.com/embed/<?=$url[0];?>?theme=light" frameborder="0" allowfullscreen></iframe>
                            </div>
                              <? if (isset($value['message'])): ?>
                                <div class="padding10 centrado"><p> <?=$value['message'];?></p></div>
                              <? endif; ?>
                          <?php else: ?>
                            <div class="padding20">
                              <? if (isset($value['message'])): ?>
                                <p> <?=$value['message'];?></p>
                              <? elseif (isset($value['link'])): ?>
                                <p><a href="<?=$value['link'];?>"> <?=$value['link'];?> </a></p>
                              <? endif; ?>
                            </div>
                          <?php endif; ?>

                        </div>

                        <? // LIKES ?>
                        <?php if(isset($value['likes'])): ?>
                          <div class="likes">
                            <div class="liketitle"><?=count($value['likes']['data']);?> LIKES:</div>
                            <? foreach ($value['likes']['data'] as $keylikes => $valuelikes): //Inicio Foreach LIKES?>
                              <a class="float_left" style="margin: 0 5px;" href="http://facebook.com/<?=$valuelikes['id'];?>" target="_blank" rel="tooltip" data-toggle="tooltip" data-placement="bottom" title="<?=$valuelikes['name'];?>" data-original-title="Tooltip on bottom">
                                <img src="http://graph.facebook.com/<?=$valuelikes['id'];?>/picture?type=square" tittle="<?=$valuelikes['name'];?>">
                              </a>
                            <? endforeach; //Fin Foreach LIKES?>
                          </div>
                        <?php endif; ?> 


                        <? // COMMENTS ?>
                        <?php if(isset($value['comments'])): ?>
                          <? foreach ($value['comments']['data'] as $keycom => $valuecom): //Inicio Foreach COMMENTS?>
                            <div class="comments">
                              <? if($keycom == 0): ?><div class="liketitle">COMENTARIOS:</div><? endif; ?>
                              <div class="padding10" style="overflow: hidden;">

                                <div style="overflow: hidden; margin-bottom: 15px;">
                                  <div style="float: left;">
                                    <img style="float:left;" src="http://graph.facebook.com/<?=$valuecom['from']['id'];?>/picture?type=square" tittle="<?=$valuecom['from']['name'];?>">
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
                        <?php endif; ?>


                      </div> <? //Fin del contenedor gris ?>
                    </div>

                  </div>
                </div>
              </article>
            <?php endif; ?> 
            <?

          }
          ?>


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