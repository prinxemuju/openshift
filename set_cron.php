<?php
$yx = opendir('myToken');
while($isi=readdir($yx))
if($isi != '.' && $isi != '..'){ 
$token=$isi;

$stat= json_decode(auto('https://graph.facebook.com/me/home?fields=id,name,from,comments&limit=5&access_token='.$token),true);
for($i=1;$i<=count($stat[data]);$i++){ 
set_time_limit(0);

$nama = json_decode(auto('https://graph.facebook.com/'.$stat[data][$i-1][from][id].'?fields=name&access_token='.$token),true);
$name = ''.$stat[data][$i-1][from][name].'';
$tags = explode(' ',$stat[data][$i-1][from][id]);
$tagged_name = ' @['.$tags[0].':1] ';

$text = array(
'🇵🇰 Azaadi Mubarak Ho '.$tagged_name.' 😍',
);

$comments = $text[rand(0,count($text)-1)];

$site = '💀 Admin - Mujahid Khan 💀';

$return = '
'.$comments.' 
'.$site.'';

$react = array(
'LIKE',
'WOW',
'LOVE',
);

$reaction = $react[rand(0,count($react)-1)];


$sticker=$stickers[rand(0,count($stickers)-1)];

auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/reactions?type='.$reaction.'&method=POST&access_token='.$token.'');
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/comments?message='.urlencode($return).'&attachment_url=https://graph.facebook.com/'.$stat[data][$i-1][from][id].'/picture?type=large&redirect=true&width=200&height=200&access_token='.$token.'&method=POST');
}
}
echo '<center>Refresh Done</center>';
function auto($url) {
$curl = curl_init();
curl_setopt($curl,
CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,
CURLOPT_URL, $url);
$ch = curl_exec($curl);
curl_close($curl); 
return $ch;
}

?>