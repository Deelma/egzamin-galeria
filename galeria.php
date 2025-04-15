<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Zdjęcia</h1>
    </header>
    <section id="lewy">
        <h2>Tematy zdjęć</h2>
        <ol>
            <li>Zwierzęta</li>
            <li>Krajobrazy</li>
            <li>Miasta</li>
            <li>Przyroda</li>
            <li>Samochody</li>
        </ol>
    </section>
    <main>
    <section id="srodkowy">
            <?php

            $PDO = new PDO('mysql:host=localhost;dbname=galeria;charset=utf8;port=3306', 'root', '');

            $stmt = $PDO->query('SELECT plik, tytul, polubienia, imie, nazwisko FROM zdjecia JOIN autorzy ON autorzy_id = autorzy.id ORDER BY nazwisko');

            foreach($stmt as $row){

                echo '<div><img src="' . $row['plik'] . '" alt="zdjęcie"><h3>' . $row['tytul'] . '</h3>';

                if($row['polubienia'] > 40){

                    echo '<p>Autor: ' . $row['imie'] . $row['nazwisko'] . '.<br> Wiele osób polubiło ten obraz</p>';

                }else{

                    echo '<p>Autor: ' . $row['imie'] . $row['nazwisko'] . '</p>';

                }

                echo '<a href="' . $row['plik'] .'" download="' . $row['plik'] . '">Pobierz</a>';

                echo '</div>';

            }

            ?>
        </section>
    </main>
        <section id="prawy">
            <h2>Najbardziej lubiane</h2>
            <?php

            $PDO = new PDO('mysql:host=localhost;dbname=galeria;charset=utf8;port=3306', 'root', '');

            $stmt = $PDO->query('SELECT tytul, plik FROM zdjecia WHERE polubienia >= 100');

            foreach($stmt as $row){

                echo '<img src="' . $row['plik'] . '" alt="' . $row['tytul'] . '">';

            }

            $PDO = NULL;

            ?>
            <strong>Zobacz wszystkie zdjęcia</strong>
        </section>
    <footer>
        <h5>Strone wykonał: Nikodem Warmowski</h5>
    </footer>
</body>
</html>