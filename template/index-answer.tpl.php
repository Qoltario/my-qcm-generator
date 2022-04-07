<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container">
    <h1>Mes réponses</h1>

    <a href="/new-answer.php">Nouvelle réponses</a>
    <a href="/index-question.php">Retour sur les questions</a>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($answers as $answers): ?>
            <tr>
                <td><?= $answers->getId() ?></td>
                <td><?= $answers->getTitle() ?></td>
                <td>
                    <a href="/edit-answer.php?id=<?= $answers->getId() ?>">Modifier</a>
                    <a href="/delete-answer.php?id=<?= $answers->getId() ?>">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require '../template/partials/_bottom.tpl.php'; ?>
