<?php

/*
 * Erstellt Lotto Zahlen...
 */

require_once __DIR__ . '/../Zoz.php';

function createNumbers()
{
    // Initialisieren des "Topfes"
    $zoz = new Zoz(range(1, 49));

    $numbers = array();
    for ($i = 1; $i <= 6; $i++) {
        // Ziehen einer Zahl
        $numbers[$i] = $zoz->getOneElement();
    }
    sort($numbers);

    $numbers['Superzahl'] = $zoz->getOneElement();

    return $numbers;
}

// Erstellt 100 Lotto zahlen
$rows = array();
for ($i = 0; $i < 100; $i++) {
    $rows[] = createNumbers();
}

?>
<html>

<body>

    <table width="100%" border="1">

        <!-- Spalten-Beschriftung -->
        <tr>
            <?php foreach ($rows[0] as $key => $value): ?>
                <th><?php echo $key ?></th>
            <?php endforeach; ?>
        </tr>

        <!-- Lotto Zahlen -->
        <?php foreach ($rows as $row): ?>
            <tr>
                <?php foreach ($row as $number): ?>
                <td>
                    <?php echo $number; ?>
                </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach ?>

    </table>

</body>

</html>