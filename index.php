<?php

$timezone = 'Europe/Paris';
date_default_timezone_set($timezone);

$presentTime = new DateTime;
$destinationTime = new DateTime;
$destinationTime->setDate(2021, 01, 01)->setTime(10, 00, 00);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = array_map('trim', $_POST);

    $destinationTime = new DateTime($data['date']);
    $data2 = explode(':', $data['time']);

    $destinationTime->add(new DateInterval('PT' . $data2[0] . 'H' . $data2[1] . 'M'));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="styles.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
    <title>Retour vers le Passé</title>
</head>

<body>
    <div>
        <div>
            <h1>Saisir la date de destination</h1>
            <form method="post" action="index.php">
                <div class="datein">
                    <div>
                        <input type="date" id="start" name="date">
                        <input type="time" id="start" name="time">
                    </div>
                    <button class="btn btn-primary" name="send">Valider</button>
                </div>
            </form>
        </div>
    </div>
    <section>
        <div class="destime">
            <div class="dateprog">
                <div class="sep">
                    <div>
                        <p>MONTH</p>
                    </div>
                    <div class="valOrang">
                        <?php if (!empty($destinationTime)) {
                            echo $destinationTime->format('M');
                        } ?>
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>DAY</p>
                    </div>
                    <div class="valOrang">
                        <?php if (!empty($destinationTime)) {
                            echo $destinationTime->format('d');
                        } ?>
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>YEAR</p>
                    </div>
                    <div class="valOrang">
                        <?php if (!empty($destinationTime)) {
                            echo $destinationTime->format('Y');
                        } ?>
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>AM</p>
                    </div>
                    <div class="rond" style="background-color: <?php if (!empty($destinationTime)) {
                                                                    if ($destinationTime->format('A') === 'PM') {
                                                                        echo 'var(--noir);';
                                                                    } else {
                                                                        echo 'var(--orange);';
                                                                    }
                                                                } ?> ">
                    </div>
                    <div>
                        <p>PM</p>
                    </div>
                    <div class="rond" style="background-color: <?php if (!empty($destinationTime)) {
                                                                    if ($destinationTime->format('A') === 'AM') {
                                                                        echo 'var(--noir);';
                                                                    } else {
                                                                        echo 'var(--orange);';
                                                                    }
                                                                } ?> ">
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>HOUR</p>
                    </div>
                    <div class="valOrang">
                        <?php if (!empty($destinationTime)) {
                            echo $destinationTime->format('h');
                        } ?>
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>MIN</p>
                    </div>
                    <div class="valOrang">
                        <?php if (!empty($destinationTime)) {
                            echo $destinationTime->format('i');
                        } ?>
                    </div>
                </div>
            </div>
            <div class="titre">
                <div class="soutitre">
                    <p class="p2">DESTINATION TIME</p>
                </div>
            </div>
        </div>
        <div class="prestime">
            <div class="dateprog">
                <div class="sep">
                    <div>
                        <p>MONTH</p>
                    </div>
                    <div class="valvert">
                        <?php echo $presentTime->format('M'); ?>
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>DAY</p>
                    </div>
                    <div class="valvert">
                        <?php echo $presentTime->format('d'); ?>
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>YEAR</p>
                    </div>
                    <div class="valvert">
                        <?php echo $presentTime->format('Y'); ?>
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>AM</p>
                    </div>
                    <div class="rond" style="background-color: <?php if ($presentTime->format('A') === 'PM') {
                                                                    echo 'var(--noir);';
                                                                } else {
                                                                    echo 'var(--vert);';
                                                                } ?> ">
                    </div>
                    <div>
                        <p>PM</p>
                    </div>
                    <div class="rond" style="background-color: <?php if ($presentTime->format('A') === 'AM') {
                                                                    echo 'var(--noir);';
                                                                } else {
                                                                    echo 'var(--vert);';
                                                                } ?> ">
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>HOUR</p>
                    </div>
                    <div class="valvert">
                        <?php echo $presentTime->format('h'); ?>
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>MIN</p>
                    </div>
                    <div class="valvert">
                        <?php echo $presentTime->format('i'); ?>
                    </div>
                </div>
            </div>
            <div class="titre">
                <div class="soutitre">
                    <p class="p2">PRESENT TIME</p>
                </div>
            </div>
        </div>
    </section>
    <?php

    $timecoule =  $presentTime->diff($destinationTime);

    ?>
    <section>
        <div class="prestime">
            <div class="dateprog">
                <div class="sep">
                    <div>
                        <p>YEAR</p>
                    </div>
                    <div class="valvert">
                        <?php echo $timecoule->y ; ?>
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>MONTH</p>
                    </div>
                    <div class="valvert">
                        <?php echo $timecoule->m ; ?>
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>DAY</p>
                    </div>
                    <div class="valvert">
                        <?php echo $timecoule->d ; ?>
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>HOUR</p>
                    </div>
                    <div class="valvert">
                        <?php echo $timecoule->h ; ?>
                    </div>
                </div>
                <div class="sep">
                    <div>
                        <p>MIN</p>
                    </div>
                    <div class="valvert">
                        <?php echo $timecoule->i ; ?>
                    </div>
                </div>
            </div>
            <div class="titre">
                <div class="soutitre">
                    <p class="p2">DUREE</p>
                </div>
            </div>
        </div>
        <div class="litre">
        <?php
            $nbminutes = (($timecoule->days)*24*60)+(($timecoule->h)*60)+ $timecoule->i;
            $litres= $nbminutes/10000;
        ?>
        Il faudra <?= $litres ?> litres de carburant pour effectuer ce trajet.
        </div>
    </section>

</body>

</html>
