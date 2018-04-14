<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script charset="utf-8" src="js/app.js"></script>
    <link rel="stylesheet" href="css/app.css" />
</head>
<body>
    
    <form action="/action_page.php">
        <fieldset>
            <legend>1. De manhã, você:</legend>
            @foreach($series as $serie)
                <input type="radio" name="pergunta1" value="{{ $serie['id'] }}" />{{ $serie['respostas'][mt_rand(0,4)] }}<br />
            @endforeach
            
            <input type="submit" value="Submit now" />
        </fieldset> 
      </form>

</body>
</html>