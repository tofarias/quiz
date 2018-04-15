# quiz
Baseado nas respostas do usuário, o algoritmo define qual série melhor representa o usuário que está respondendo o quiz.

# Instalação
- Acessar o diretório "quiz"
- No terminal: composer install
- php -S 127.0.1.1:8000 -t public public/index.php

# Design da Solução
- Foi criado um arquivo "database/series.php" que reúne os dados das séries a serem utilizadas neste Quiz.
- Cada Série possui um identificador único.
- No mesmo arquivo foi agrupado as alternativas por série, que também contém a frase a ser exibida para o usuário ao concluir o Quiz.
- A classe "Serie" é reponsável por carregar os dados das séries, embaralhar as alternativas, buscar os identificades e buscar a frase.
- A classe "Quiz" é responsável por organizar as alternativas para cada pergunta juntamente com o identificador da série.
- A classe "Pergunta" define o peso de cada pergunta a ser utilizada no cálculo da avaliação final.
- A classe "Avaliacao" é resposável por calcular a nota de acordo com as respostas e peso de cada pergunta, ordena e busca
a maior nota.