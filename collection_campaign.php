
<html lang="en-GB">
<head>
    <title>add custom campaign</title>
    <script src="https://kit.fontawesome.com/0607049395.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="main_stylesheet.css">
    <link rel="stylesheet" type="text/css" href="form_stylesheet.css">
</head>
<body>
<header class="banner">
    <h1 class="mainHeading"> Add a custom campaign</h1>
</header>


<form class="form" method="post" action="collection_campaign.php">
    <div class="formItem"
    <input type="text" name="campaignName" id="campaignName"<label for="campaignName">Campaign Name</label>
    </div>

    <div class="formItem">
    <input type="text" name="scenario1Name" id="scenario1Name"<label for="scenario1Name">Scenario One Name</label>
    <input type="checkbox" id="scenario1Owned" name="scenario1Owned" value="owned">
    <label for="scenario1Owned"> Owned?</label>
        <input type="checkbox" id="scenario1played" name="scenario1played" value="played">
        <label for="scenario1played"> Played?</label><br>
    </div>


    <div class="formItem">
        <input type="text" name="scenario2Name" id="scenario2Name"<label for="scenario2Name">Scenario Two Name</label>
        <input type="checkbox" id="scenario2Owned" name="scenario2Owned" value="owned">
        <label for="scenario2Owned"> Owned?</label>
        <input type="checkbox" id="scenario2played" name="scenario2played" value="played">
        <label for="scenario2played"> Played?</label><br>
    </div>




</form>
<?php
