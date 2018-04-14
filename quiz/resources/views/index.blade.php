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
    
    <form action="{{ route('avaliar-respostas') }}" method="POST">
        
        <fieldset>
            <legend>1. De manhã, você:</legend>
            @foreach($gruposDeAlternativas[0] as $alternativa)
                <input type="radio" name="pergunta1" value="{{ $alternativa['id_grupo'] }}" />{{ $alternativa['frase'] }}<br />
            @endforeach            
        </fieldset>

        <fieldset>
            <legend>2. Indo para o trabalho você encontra uma senhora idosa caída na rua.</legend>
            @foreach($gruposDeAlternativas[1] as $alternativa)
                <input type="radio" name="pergunta2" value="{{ $alternativa['id_grupo'] }}" />{{ $alternativa['frase'] }}<br />
            @endforeach
        </fieldset>

        <fieldset>
            <legend>3. Chega no prédio e o elevador está cheio.</legend>
            @foreach($gruposDeAlternativas[2] as $alternativa)
                <input type="radio" name="pergunta3" value="{{ $alternativa['id_grupo'] }}" />{{ $alternativa['frase'] }}<br />
            @endforeach
        </fieldset>

        <fieldset>
            <legend>4. Você chega no trabalho e as convenções sociais te obrigam a puxar assunto.</legend>
            @foreach($gruposDeAlternativas[3] as $alternativa)
                <input type="radio" name="pergunta4" value="{{ $alternativa['id_grupo'] }}" />{{ $alternativa['frase'] }}<br />
            @endforeach
        </fieldset>

        <fieldset>
            <legend>5. A pauta pegou o dia todo, mas você está indo para casa.</legend>
            @foreach($gruposDeAlternativas[4] as $alternativa)
                <input type="radio" name="pergunta5" value="{{ $alternativa['id_grupo'] }}" />{{ $alternativa['frase'] }}<br />
            @endforeach            
            
        </fieldset>
        <br>
        <input type="submit" value="Enviar" />
        
      </form>

</body>
</html>