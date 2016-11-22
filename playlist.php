<?php
$_string = NULL;
$_random = array();
$_songx = array();
$_random[0] = "BIHrkqBFUL4";//Let Her Go
$_random[1] = "lAwYodrBr2Q";//Lost at Sea
$_random[2] = "J7bwSk5pCsg";//Time to Say Goodbye
$_random[3] = "ubBmqOtnJhI";//One of these Days
$_songs = rand(0,count($_random)-1);
$_video = $_random[$_songs];
$content = file_get_contents("http://youtube.com/get_video_info?video_id=".$_video);
$youtube = array();
$youtube["title"] = NULL;
if(!empty($youtube["title"])){
	parse_str($content,$youtube);
	$_hash_title = $youtube["title"];
}elseif(empty($youtube["title"])){
	$youtube["title"] = "Default";
	$_hash_title = $youtube["title"];
}//========================================
//=========================================
$_hash_photo = "//img.youtube.com/vi/".$_video."/hqdefault.jpg";
//=========================================
//img.youtube.com/vi/video_id/hqdefault.jpg
//=========================================
$_string .= ("<script src='..js'></script>");
$_string .= ("<script src='...js'></script>");
$_string .= ("<label for='this' tag='player'><div style='Display:None;' id='".$_video."'></div></label>
<div tag='listen'><marquee direction='right'>".$_hash_title."</marquee></div>
<input type='Checkbox' id='this' style='Display:None;' onChange='checkbox(document.getElementById(this.id))'/>
<style>
marquee{Width:100%;Height:100%;Display:Inline-Block;Display:Flex;Justify-Content:Center;Align-Items:Center;}
[tag='listen']{Width:70%;Height:100%;Display:Inline-Block;Float:Right;Background-Color:rgba(0,0,0,0.4);Margin:0 auto;White-Space:Nowrap;Overflow:Hidden;Box-Sizing:Border-Box;}
[tag='player']{Opacity:0.8;Width:30%;Height:100%;Display:Inline-Block;Background-Size:100% 100%;Background-Position:100% 100%;Background-Repeat:No-Repeat;Background-Image:url('".$_hash_photo."');Float:Left;}
</style>
<script>
	var player;
	function onYouTubePlayerAPIReady() {
			player = new YT.Player('".$_video."',{
			height: '100%',
			width: '100%',
			playerVars:{ 
				'autoplay': 0,
				'controls': 0,
				'showinfo': 0,
				'playlist': '".$_video."',
				'rel': 0
			},
			videoId: '".$_video."',
			events: {
				'onReady': onPlayerReady,
				'onStateChange': onPlayerStateChange
			}
		});
	};
	
	function checkbox(chick){
		if(chick.checked == true){
			document.title='A Moment of Silence ..';
			callPlayer('".$_video."','pauseVideo');
		}else{
			document.title='(".$_hash_title.")..';
			callPlayer('".$_video."','playVideo');		
		};
	};

	function onPlayerReady(event){
		event.target.playVideo();
		document.title='(".$_hash_title.")..';
	};

	function onPlayerStateChange(event) {        
			if(event.data === 0){
			window.location.href=document.URL;
		};
	};
</script>");
$_string = ("<html oncontextmenu='return false' onkeydown='return false' style='Width:100vw;Height:100vh;Margin:0 Auto;Padding:0%;Display:Inline-Block;'>
<head>
	<title>(".$_hash_title.")..</title>
</head>
<body style='Width:100%;Height:100%;Margin:0 Auto;Padding:0%;Display:Inline-Block;'>
".$_string."
</body>
</html>");
echo(preg_replace("/\s+/"," ",$_string));
exit(Header("Content-Type:Text/HTML"));
?>
