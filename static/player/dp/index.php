<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<meta name="renderer" content="webkit"/>
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" id="viewport" name="viewport">

<title>My DPlayer</title>
<style type="text/css">body,html,.dplayer{padding:0;margin:0;width:100%;color:#aaa;background-color:#000}a{text-decoration:none}#dplayer,#poster{position:fixed;top:0;left:0;right:0;bottom:0;z-index:9;overflow:hidden;object-fit:cover;object-position:center center}#poster{z-index:998;background-color:#000}#poster .play-btn,.play-icon{position:absolute;width:54px;height:54px;left:50%;top:50%;z-index:9999;margin-left:-27px;margin-top:-27px}#poster .play-btn img,.play-icon img{width:54px;height:54px;z-index:990}.play-icon{display:none}</style>
<script src="./jquery.min.js"></script>
<script src="./hls.min.js"></script>
<script src="./DPlayer.min.js"></script>
<link href="./DPlayer.min.css" rel="stylesheet">
</head>
<body>
<div id="shows">
  <div id="poster" style="display: none;">
    <div class="play-btn">
      <img src="./play-icon.png">
    </div>
  </div>
  <div class="play-icon" style="display: none;">
    <img src="./play-icon.png">
  </div>
</div>
<div id="dplayer"></div>
<script type="text/javascript">
function GetQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}
var vurl =  "<?php echo $_GET['url'];?>"; 

	var webdata = {
		set:function(key,val){
			window.sessionStorage.setItem(key,val);
		},
		get:function(key){
			return window.sessionStorage.getItem(key);
		},
		del:function(key){
			window.sessionStorage.removeItem(key);
		},
		clear:function(key){
			window.sessionStorage.clear();
		}
	};

const dp = new DPlayer({
    container: document.getElementById('dplayer'),
  	lang: 'zh-cn',
	autoplay: false,
        preload:'auto',
    video: {
        url: vurl,
        type: 'hls',
      	pic: './4a.gif'
    }
});
	dp.on('loadstart', function () {
    $('.play-icon').css('display', 'block')
  	});
	dp.on('playing', function () {
    $('.play-icon').css('display', 'none')
  	});
	dp.on('pause', function () {
    $('.play-icon').css('display', 'block')
  	});
	dp.on('play', function () {
    $('.play-icon').css('display', 'none')
  	});
  	$('.play-icon').click(function () {
    dp.play()
  	})
  	$('#poster').click(function () {
    $('#poster').css('display', 'none')
    dp.play()
  	})
 	dp.seek(webdata.get('pay'+vurl));
	setInterval(function(){
		webdata.set('pay'+vurl,dp.video.currentTime);
	},1000);
</script>
<div style="display:none">
<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-131417157-1'); </script>
</div>
</body>
</html>
