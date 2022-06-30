<?php
$headers = [
    "API-Key: 7d64ca3869544c469c3e7a586921ba37"
];

$curlSession = curl_init('https://api.sightmap.com/v1/assets/1273/multifamily/units');

curl_setopt($curlSession, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

$res = curl_exec($curlSession);

curl_close($curlSession);

$data = json_decode($res, true);

$listOne = [];
$listTwo = [];

forEach($data["data"] as $asset) {
    if($asset["area"] > 1) {
        array_push($listOne, $asset);
    } else {
        array_push($listTwo, $asset);
    }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Engrain Coding Challenge</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header-container">
        <h1>Engrain Coding Challenge</h1>
    </div>
    <div class="container">
        <div class="container-list">
            <h2>List 1</h2>
            <?php foreach($listOne as $asset): ?>
            <ul class="list">
                <li>Unit Number: <b><?php echo $asset["unit_number"]?></b></li>
                <li>Area (SqFt): <b><?php echo $asset["area"]?></b></li>
                <li>Updated at: <b><?php echo substr($asset["updated_at"], 0, 10)?></b></li>
            </ul>
            <?php endforeach; ?>
        </div>
        <div class="container-list">
            <h2>List 2</h2>
            <?php foreach($listTwo as $asset): ?>
            <ul class="list">
                <li>Unit Number: <b><?php echo $asset["unit_number"]?></b></li>
                <li>Area (SqFt): <b><?php echo $asset["area"]?></b></li>
                <li>Updated at: <b><?php echo substr($asset["updated_at"], 0, 10)?></b></li>
            </ul>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>