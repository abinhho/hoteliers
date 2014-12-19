<?php 
echo '<?xml version="1.0" encoding="utf-8"?>' . "\n";
?>
<rss version="2.0"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:admin="http://webns.net/mvcb/"
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    xmlns:content="http://purl.org/rss/1.0/modules/content/">

    <channel>

    <title><?php echo $config['name_page']; ?></title>

    <link><?php echo base_url(); ?></link>
    <description><?php echo $config['description']; ?></description>
    <dc:language></dc:language>
    <dc:creator>HDweb.vn</dc:creator>

    <dc:rights>Copyright <?php echo gmdate("Y", time()); ?></dc:rights>
    <admin:generatorAgent rdf:resource="<?php echo base_url()?>" />

    <?php foreach($items as $row): 
        $link = $this->lib_url->host() . $this->lib_menu->make_link(array($row['catid'] => "") , array($row['ID'] => $row['tieu_de']) );
    ?>

        <item>

          <title><?php echo $row['tieu_de']; ?></title>
          <link><?php echo $link ?></link>
          <guid><?php echo $link ?></guid>

          <description><?php echo $row['description']?></description>
      <pubDate><?php echo date ('r', strtotime($row['date_upd']) );?></pubDate>
        </item>


    <?php endforeach; ?>

    </channel></rss> 