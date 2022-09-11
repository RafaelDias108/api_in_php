<h1>API REST in PHP</h1>
<img src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/45/000000/external-api-basic-ui-elements-2.2-sbts2018-outline-color-sbts2018.png"/>

<h3>API realizada para fins de aprendizado.</h3>

API REST em PHP sem frameworks.

API utiliza requisições HTTP responsáveis pelas operações básicas necessárias para a manipulação dos dados:

- POST: criar registro;
- GET: leitura dos registros;
- DELETE: excluir as informações;
- PUT: atualizações de registros;

Alguns aplicativos que lidam com navegadores não suportam os métodos PUT ou DELETE, por isso para realizar essas requisições é utilizado o método POST utilizando uma variável <code>_request_method</code> no corpo da requisição com os valores 'DELETE' ou 'PUT'.