<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="GET" action="/getLandmark/51.1145113/16.962175">
        <input type="submit" value="getLandmark"></input>
    </form>
    <form method="GET" action="/getAllLandmarks">
        <input type="submit" value="getAllLandmarks"></input>
    </form>
    <form method="POST" action="/updateProperty">
        @csrf
        <input type="hidden" name="property" value="is_favourite">
        <input type="hidden" name="value" value="1">
        <input type="hidden" name="idLandmark" value="207279186">
        <input type="submit" value="updateProperty"></input>
    </form>
    <form method="POST" action="/addComment">
        @csrf
        <input type="hidden" name="content" value="12341234">
        <input type="hidden" name="landmarkId" value="207279186">
        <input type="submit" value="addComment"></input>
    </form>
    <form method="GET" action="/getCommentsForLandmark/207279186">
        <input type="submit" value="getCommentsForLandmark"></input>
    </form>
    <hr>
    <form method="GET" action="/getAllTours">
        <input type="submit" value="getAllTours"></input>
    </form>
    <form method="POST" action="/storeTour">
        @csrf
        <input type="hidden" name="landmarksList" value="123|43534|123312|5445">
        <input type="submit" value="storeTour"></input>
    </form>
    <hr>
    <form method="GET" action="/getReservationsForUser/1">
        <input type="submit" value="getReservationsForUser"></input>
    </form>
    <form method="POST" action="/makeReservation">
        @csrf
        <input type="hidden" name="idUser" value="1">
        <input type="hidden" name="idTour" value="12345">
        <input type="hidden" name="date" value="2022-10-10">
        <input type="submit" value="makeReservation"></input>
    </form>
</body>

</html>
