<?php require_once('skin/header.php'); ?>


	<section>
  	<div class="container">
      <div class="hero-unit">

        <div class="row">
          <div class="span12 title">
            <center>
              <img src="<?php echo base_url('img/title.png'); ?>">
            </center>
          </div>
          <?php 
          $c = 0;
          foreach ($facebook['data'] as $key => $value) {
           
          ?>
            <article>
              <div class="span12 big">
                <div class="padding20">
                  <div style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; background: rgba(0,0,0,.75); overflow: hidden;  color: rgb(231, 222, 222);">
                    <div class="padding20" style="overflow: hidden;">
                      <div style="overflow: hidden; margin-bottom: 15px;">
                        <div style="float: left;">
                          <img style="float:left;" src="http://graph.facebook.com/<?=$value['from']['id'];?>/picture?type=square"></img>
                        </div>
                        <div style="float: left; margin-left: 20px;">
                          <h4 style="float:left;"><?=$value['from']['name'];?></h4>
                        </div>
                        <h4 class="pull-right">Hace <?=time_elapsed($value['created_time']);?></h4>
                      </div>
                      <div>
                       <?php if(isset($value['picture'])): ?>

                          <img style="<?=(is_float($c/2)) ? 'float:left;' : 'float:right;'; ?> max-width: 300px;" src="<?=substr($value['picture'], 0, -5)."n.jpg";?>"></img>
                          <? $c++; ?>
                        <?php endif; ?>

                      </div>
                    </div>
                  </div>
              <?

              print_r($value);


              
              ?>
                </div>
              </div>
            </article>
            <?

          }
          ?>


        </div>

        <div class="padding20">
          <ul class="pager">
            <li class="previous">
              <a href="#">&larr; Nuevas</a>
            </li>
            <li class="next">
              <a href="#">Viejas &rarr;</a>
            </li>
          </ul>
        </div>

        <div>

  		</div>
  	</div>
  </section>







<?php require_once('skin/footer.php'); ?>