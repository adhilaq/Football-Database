<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Match insert</title>
</head>
<body>
<form action="includes/matchin.inc.php" method="post">
        <input type="text" name="match_id" placeholder="Match ID">
        <input type="text" name="home_id" placeholder="Home ID">
        <input type="text" name="away_id" placeholder="Away ID">
        <input type="text" name="location" placeholder="Location">
        <input type="text" name="matchdate" placeholder="Match Date(dd-mm-yyyy)">
        <input type="text" name="tournament" placeholder="Tournament">
        <input type="text" name="result" placeholder="Result">
        <button type="submit" name="matchin-submit">Insert</button>
</form>
</body>
</html>