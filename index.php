<?php
    $sort = "oldest"; // oldest | newest
    $json = file_get_contents("message.json",0,null,null); 
    $result = $tmp = json_decode($json, true); // using a temp variable for testing
    $result = ($sort == "oldest") ? array_reverse($result['conversation']) : $result['conversation'];
    $yourUsername = "firmanjml"; // write your igusername so it will display your messages at the right side.
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">Number of messages sent: <?php echo count($result); ?> | sort by: <?php echo $sort; ?></div>
<div class="container">
  
<?php for ($i = 0; $i < count($result); $i++): ?>
    <?php
        $datetime = explode("T", $result[$i]['created_at']);
        $date = date_format(date_create($datetime[0]),"d M y");
        $n = (substr(explode(".", $datetime[1])[0], 0, 2) > 12) ? "pm" : "am";
        $time = (substr(explode(".", $datetime[1])[0], 0, 2) % 12) . substr(explode(".", $datetime[1])[0], 2) . " " . $n;
    ?>
    <div class="Area">
    <p style="font-size: 10px; color:white; <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'margin-right: 4px;' :  'margin-left: 4px;'?>" class="<?php  echo ($result[$i]['sender'] != $yourUsername) ?  'R' :  'L'?>"><?php echo $date . "<br> " . $time; ?></p>
        <?php  echo ($result[$i]['sender'] != $yourUsername) ?  '<div class="L">' :  '<div class="R">'?>
        <?php $img = ($result[$i]['sender'] != $yourUsername) ? "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSxU35znsBhAWQd5BouLIVtH1P4WNa0JZ_XXpyViHOIARbM2igbNgC6_kp5" : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrEyVlaWx0_FK_sz86j-CnUC_pfEqw_Xq_xZUm5CMIyEI_-X2hRUpx1BHL" ?>
        <img class="pimg" src="<?php echo $img; ?>"=/>
            <div class="tooltip"><?php echo $result[$i]['sender']; ?></div>
        </div>
        <?php if (array_key_exists("media", $result[$i]) == 1): ?>
            <div class="text <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'L leftL' :  'R leftR'?>"><img src="<?php echo $result[$i]['media'];?>"/></div>
        <?php elseif(array_key_exists("media_url", $result[$i]) == 1): ?>
            <div class="text <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'L leftL' :  'R leftR'?>"><img src="<?php echo $result[$i]['media_url'];?>"/></div>
        <?php elseif(array_key_exists("media_share_url", $result[$i]) == 1): ?>
            <div class="text <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'L leftL' :  'R leftR'?>"><img src="<?php echo $result[$i]['media_share_url'];?>"/></div>
        <?php elseif(array_key_exists("video_call_action", $result[$i]) == 1): ?> 
            <div class="text <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'L leftL' :  'R leftR'?>"><b>Video Call</b></div>
        <?php elseif(array_key_exists("heart", $result[$i]) == 1): ?>
            <div class="text <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'L leftL' :  'R leftR'?>">❤️</div>
        <?php else: ?>
            <div class="text <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'L leftL' :  'R leftR'?>"><?php echo $result[$i]['text']; ?></div>
        <?php endif; ?>
    </div>
<?php endfor; ?>
</div>
</body>
</html>
