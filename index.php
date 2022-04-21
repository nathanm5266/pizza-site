<?php

include ('config/db_connect.php');

$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

$result = mysqli_query($conn, $sql);

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

explode (',', $pizzas[0]['ingredients']);
// print_r($pizzas);

?>
<!DOCTYPE html>
<html lang="en">

<?php include ('templates/header.php'); ?>

<h4 class="center">Pizzas!</h4>
<div class="container">
    <div class="row">

    <?php foreach($pizzas as $piza): ?>

        <div class="col s6 md3">
            <div class="card z-depth-0">
                <img src="img/pizza.svg" alt="pizza image" class="pizza">
                <div class="card-content center">
                    <h6><?php echo ($piza['title']); ?></h6>
                    <ul>
                        <?php foreach(explode(',', $piza['ingredients']) as $ing): ?>
                            <li><?php echo ($ing); ?></li>
                            <?php endforeach; ?>
                    </ul>
                </div>
                <div class="card-action right-align">
                    <a href="details.php?id=<?php echo $piza['id']?>" class="brand-text">more info</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php if (count($pizzas) >= 3) :?>
            <p>there are 3 or more pizzas</p>
            <?php else:?>
                <p>there are less than 3 pizzas</p>
                <?php endif ;?>


    </div>
</div>

<?php include ('templates/footer.php'); ?>

</html>