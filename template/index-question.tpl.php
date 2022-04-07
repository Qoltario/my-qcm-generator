<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container">
    <h1>Mes questions</h1>
    <a href="./index-answer.php">Réponse</a>
    <a href="/new-question.php">Nouvelle question</a>
    <a href="/index.php">Retour sur les QCM</a>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($questions as $q): ?>
            <tr>
                <td><?= $q->getId() ?></td>
                <td><?= $q->getTitle() ?></td>
                <td>
                    <a href="/edit-question.php?id=<?= $q->getId() ?>">Modifier</a>
                    <a href="/delete-question.php?id=<?= $q->getId() ?>">Supprimer</a>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require '../template/partials/_bottom.tpl.php'; ?>
