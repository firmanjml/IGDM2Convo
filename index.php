<?php
    $json = file_get_contents("message.json",0,null,null); 
    $result = $tmp = json_decode($json, true);    // using a temp variable for testing
    $result = array_reverse($result['conversation']);
    $yourUsername = "firmanjml";
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">Number of messages sent: <?php echo count($result); ?></div>
<div class="container">
  
<?php for ($i = 0; $i < count($result); $i++): ?>
    
    <div class="Area">
        <?php  echo ($result[$i]['sender'] != $yourUsername) ?  '<div class="L">' :  '<div class="R">'?>
        <?php $img = ($result[$i]['sender'] != $yourUsername) ? "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSxU35znsBhAWQd5BouLIVtH1P4WNa0JZ_XXpyViHOIARbM2igbNgC6_kp5" : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrEyVlaWx0_FK_sz86j-CnUC_pfEqw_Xq_xZUm5CMIyEI_-X2hRUpx1BHL" ?>
        <img class="pimg" src="<?php echo $img; ?>"=/>
            <div class="tooltip"><?php echo $result[$i]['sender']; ?></div>
        </div>
        <?php if (array_key_exists("media", $result[$i]) == 1): ?>
        <div class="text <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'L' :  'R'?> <?php  echo ($result[$i]['sender'] != "firmanjml") ?  '<div class="leftL">' :  '<div class="leftR">'?><img src="<?php echo $result[$i]['media'];?>"/></div>
        <?php elseif(array_key_exists("media_url", $result[$i]) == 1): ?>
            <div class="text <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'L' :  'R'?> <?php  echo ($result[$i]['sender'] != "firmanjml") ?  '<div class="leftL">' :  '<div class="leftR">'?><img src="<?php echo $result[$i]['media_url'];?>"/></div>
        <?php elseif(array_key_exists("media_share_url", $result[$i]) == 1): ?>
            <div class="text <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'L' :  'R'?> <?php  echo ($result[$i]['sender'] != "firmanjml") ?  '<div class="leftL">' :  '<div class="leftR">'?><img src="<?php echo $result[$i]['media_share_url'];?>"/></div>
        <?php elseif(array_key_exists("video_call_action", $result[$i]) == 1): ?>
            <div class="text <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'L' :  'R'?> <?php  echo ($result[$i]['sender'] != "firmanjml") ?  '<div class="leftL">' :  '<div class="leftR">'?><b>Video Call</b></div>
        <?php elseif(array_key_exists("heart", $result[$i]) == 1): ?>
            <div class="text <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'L' :  'R'?> <?php  echo ($result[$i]['sender'] != "firmanjml") ?  '<div class="leftL">' :  '<div class="leftR">'?>❤️</div>
        <?php else: ?>
            <div class="text <?php  echo ($result[$i]['sender'] != $yourUsername) ?  'L' :  'R'?> <?php  echo ($result[$i]['sender'] != "firmanjml") ?  '<div class="leftL">' :  '<div class="leftR">'?><?php echo $result[$i]['text']; ?></div>
        <?php endif; ?>
    </div>
<?php endfor; ?>

</div>


</body>
</html>