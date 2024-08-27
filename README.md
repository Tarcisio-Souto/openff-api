<h3 align="center">Open Food Facts</h3>
<br>

<p>
Desafio da Coodesh para criar uma API que obtém dados atualizados do Open Food Facts.
<p>

<br><br>

><h3 align="center">Principais Ferramentas Utilizadas</h3>
<br>

<ul>
    <li>Laravel</li>
    <li>Docker</li>
    <li>NGINX</li>
    <li>MySQL</li>
</ul>
<br>

><h3 align="center">Requisitos</h3>
<br>

<p>
<b>Para customizar/desenvolver a aplicação é necessário ter os recursos abaixo após a clonagem:</b>
<br><br>
<ul>
    <li><b>PHP 8.0</b></li>
    <li><b>Laravel 8</b></li>
    <li>
        <b>Editor de códigos (Visual Studio Code ou outro como o Android Studio)</b>
        <ul><br>
            <li>Visual Studio Code - Disponível em: https://code.visualstudio.com/download</li>
        </ul>  
    </li>
    <br>
    <li>
        <b>Docker</b>
        <ul><br>
            <li>Disponível em: https://docs.docker.com/</li>
        </ul>  
    </li>
    <br>
</ul>

<p><br>

><h3 align="center">Instruções Para Após a Clonagem do Projeto</h3>
<br>

<ul>
    <li>Executar os comandos abaixo:</li>
    <li>composer install</li>
    <li>php artisan key:generate</li>
    <li>docker-compose up -d</li>
</ul>
<br>
<p>
<b>Verificada a conexão com o banco de dados, execute:</b>
<br>
<ul>
    <li>php artisan migrate</li>
    <li>php artisan db:seed --class=ProductsTableSeeder (para popular a tabela inicialmente)</li>
    <li>php artisan schedule:run (para testar o cron da aplicação)</li>
</ul>
<br>

><p>TSS - Vitória/ES - 2024</p>