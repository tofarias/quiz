<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script charset="utf-8" src=""></script>
    <link rel="stylesheet" href="" />
</head>
<body>

@isset($resposta)
    <h3>{{ $resposta }}</h3>
@endisset


    <form action="{{ route('avaliar-respostas') }}" method="POST">
        
        <fieldset>
            <legend>1. De manhã, você:</legend>
            @foreach($alternativasDasSeries[0] as $alternativa)
                <label><input type="radio" name="pergunta1" value="{{ $alternativa['id'] }}" />{{ $alternativa['alternativa'] }}</label><br />
            @endforeach            
        </fieldset>

        <fieldset>
            <legend>2. Indo para o trabalho você encontra uma senhora idosa caída na rua.</legend>
            @foreach($alternativasDasSeries[1] as $alternativa)
                <label><input type="radio" name="pergunta2" value="{{ $alternativa['id'] }}" />{{ $alternativa['alternativa'] }}</label><br />
            @endforeach
        </fieldset>

        <fieldset>
            <legend>3. Chega no prédio e o elevador está cheio.</legend>
            @foreach($alternativasDasSeries[2] as $alternativa)
                <label><input type="radio" name="pergunta3" value="{{ $alternativa['id'] }}" />{{ $alternativa['alternativa'] }}</label><br />
            @endforeach
        </fieldset>

        <fieldset>
            <legend>4. Você chega no trabalho e as convenções sociais te obrigam a puxar assunto.</legend>
            @foreach($alternativasDasSeries[3] as $alternativa)
                <label><input type="radio" name="pergunta4" value="{{ $alternativa['id'] }}" />{{ $alternativa['alternativa'] }}</label><br />
            @endforeach
        </fieldset>

        <fieldset>
            <legend>5. A pauta pegou o dia todo, mas você está indo para casa.</legend>
            @foreach($alternativasDasSeries[4] as $alternativa)
                <label><input type="radio" name="pergunta5" value="{{ $alternativa['id'] }}" />{{ $alternativa['alternativa'] }}</label><br />
            @endforeach            
            
        </fieldset>
        <br>
        <input type="submit" value="Enviar" />
        
      </form>

</body>
</html>