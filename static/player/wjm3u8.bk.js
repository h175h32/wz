var u = navigator.userAgent.toLowerCase();
if((u.indexOf('tablet') != -1)|| (u.indexOf('android') != -1)||(u.indexOf('iphone') != -1) || (u.indexOf('mobile') != -1) || (u.indexOf('ipad') != -1)) 
{
MacPlayer.Html = '<iframe border="0" src="'+maccms.path+'https://img.233vod.com/play/dp/index.html?url='+MacPlayer.PlayUrl+'" width="100%" height="100%" marginWidth="0" frameSpacing="0" marginHeight="0" frameBorder="0" scrolling="no" vspale="0" allowfullscreen="true" noResize></iframe>';
MacPlayer.Show();
}
else
{
document.writeln("<div style='width:100%;background:#000;position:absolute;top:0;left:0;z-index:100'><center style=\"padding:220px 0 10px 0;font-size: 18px;\"><strong><font color=\"red\">抱歉！资源已被删除或不存在....<\/font><\/strong><\/center></div>");
}