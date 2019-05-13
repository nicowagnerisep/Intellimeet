<h1>Mes Users</h1>

<ul>
    <?php
    foreach ($users as $user) {
        echo '<li>'.$user["name"].' '.$user["surname"].'</li>';
}
    ?>
</ul>

<a href="<?=PROJECT_PATH?>/users/id">lien vers by id</a>
