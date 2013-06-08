<?php echo '<?xml version="1.0" encoding="utf-8"?>' . "\n"; ?>
<rss version="2.0"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:admin="http://webns.net/mvcb/"
     xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     xmlns:content="http://purl.org/rss/1.0/modules/content/">
 
    <channel>
        <title><? echo $nombre_feed; ?></title>
        <link><? echo $url_feed; ?></link>
        <atom:link href="<?=$url_feed;?>" rel="self" type="application/rss+xml" />
        <description><? echo $descripcion; ?></description>
        <author><? echo $autor; ?></author>
        <dc:language><? echo $lenguaje; ?></dc:language>
        <dc:creator><? echo $autor; ?></dc:creator>
        <dc:rights>Copyright <? echo gmdate("Y", time()); ?></dc:rights>
        <admin:generatorAgent rdf:resource="http://www.codeigniter.com/" />
        <managingEditor>alberto at dragost dot com</managingEditor>
        <webMaster>alberto at dragost dot com</webMaster>

        <? foreach ($facebook as $key => $value) : ?>
            <item>
                <title><? if(isset($value['message'])){echo xml_convert(substr($value['message'], 0, 20)."...");}else{echo $value['from']['name'];} ?></title>
                <link><? base_url(); ?></link>
                <guid>
                    <?=$key.$value['from']['name'];?>
                </guid>
                <description>
                    <![CDATA[
                        <? if (isset($value['message'])) {echo word_limiter($value['message'], 100, ' [...]')." ";};?>
                        <? if (isset($value['picture'])) {echo word_limiter($value['picture'], 100, ' [...]')." ";};?>
                        <? if (isset($value['link'])) {echo word_limiter($value['link'], 100, ' [...]')." ";};?>
                    ]]>
                </description>
                <pubDate><?=$value['created_time']; ?></pubDate>
            </item>
        <? endforeach; ?>

    </channel>
</rss>