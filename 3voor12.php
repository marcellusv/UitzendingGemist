<?xml version="1.0" encoding="utf-8"?>
	<!-- generator="Podcast Generator 2.4" -->
	<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xml:lang="nl" version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>3voor12</title>
		<link>http://3voor12.vpro.nl/</link>
		<atom:link href="http://verweij.it/3voor12.php" rel="self" type="application/rss+xml" />
		<description>Sinds 1998 het multimediale platform voor popmuziek van de @VPRO. Brengt de beste (live)muziek via @3fm, @NPO_3 en internet http://3voor12.vpro.nl</description>
		<generator>Podcast Generator 2.4 - http://podcastgen.sourceforge.net</generator>
		<lastBuildDate><?php echo date('r', mktime(6,0,0)); ?></lastBuildDate>
		<language>nl</language>
		<copyright>Your copyright notice</copyright>
		<itunes:image href="http://3voor12.vpro.nl/.imaging/stk/3voor12/opengraph/media/3voor12/huisstijl/logos/3voor12_logo_social/original/3voor12_logo_social.png" />
		<image>
			<url>http://3voor12.vpro.nl/.imaging/stk/3voor12/opengraph/media/3voor12/huisstijl/logos/3voor12_logo_social/original/3voor12_logo_social.png</url>
			<title>3voor12</title>
			<link>http://3voor12.vpro.nl/</link>
		</image>
		<itunes:summary>Sinds 1998 het multimediale platform voor popmuziek van de @VPRO. Brengt de beste (live)muziek via @3fm, @NPO_3 en internet http://3voor12.vpro.nl</itunes:summary>
		<itunes:subtitle>3voor12</itunes:subtitle>
		<itunes:author>3voor12</itunes:author>
		<itunes:owner>
		<itunes:name>3voor12</itunes:name>
		<itunes:email>test@nospam.com</itunes:email>
		</itunes:owner>
		<itunes:explicit>no</itunes:explicit>

		<itunes:category text="Music"></itunes:category>

<?php
	for ($dag = 1; $dag <= 15; $dag++)
	{
		$loopdate = time() - 60 * 60 * 24 * $dag;
		$loopyear = date('Y', $loopdate);
		$loopmonth = date('m', $loopdate);
		$loopday = date('d', $loopdate);

		if (date('N', $loopdate) < 5)
		{
			$url = "http://download.omroep.nl/audiologging/r3/$loopyear/$loopmonth/$loopday/";
			$url .= "2100_0000_3voor12_radio_$loopyear$loopmonth$loopday.mp3";
			$head = array_change_key_case(get_headers($url, TRUE));

			if ($head['content-length'][1] <= 8)
				continue;

			echo '			<item>'."\n";
			echo '			<title>3voor12 ('.date('d-m-Y', $loopdate).')</title>'."\n";
			echo '			<itunes:subtitle>Luister de hoogtepunten van 3voor12 van '.date('l d F Y', $loopdate).' terug!</itunes:subtitle>'."\n";
			echo '			<itunes:summary><![CDATA[ Luister de hoogtepunten van 3voor12 van '.date('l d F Y', $loopdate).' terug! ]]></itunes:summary>'."\n";
			echo '			<description>Luister de hoogtepunten van 3voor12 van '.date('l d F Y', $loopdate).' terug!</description>'."\n";
			
			echo '			<link>'.$url.'</link>'."\n";
			echo '			<enclosure url="'.$url.'" length="'.$head['content-length'][1].'" type="audio/mpeg"/>'."\n";
			echo '			<guid>'.$url.'</guid>'."\n";
			echo '			<itunes:duration>3:00:00</itunes:duration>'."\n";
			echo '			<author>test@nospam.com (3voor12)</author>'."\n";
			echo '			<itunes:author>3voor12</itunes:author>'."\n";
			echo '			<itunes:explicit>no</itunes:explicit>'."\n";
			echo '			<pubDate>'.date('r', $loopdate).'</pubDate>'."\n";
			echo '			</item>'."\n";
			echo "\n";
		}
	}
?>
	</channel>
	</rss>
