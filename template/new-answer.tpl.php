<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container">
    <form action="" method="POST">
        <label>Les réponses</label>
        <input type="text" name="title" required/>
        <input type="submit" name="submit" value="Enregistrer" />

        <select name="id_question">
            <?php foreach($questions as $question): ?>
                <option value="<?= $question->getId() ?>"><?= $question->getTitle() ?></option>
            <?php endforeach; ?>
        </select>
    </form>
    <?php if(!empty($message)): ?>
    <div class="alert">
        <?= $message ?>
    </div>
    <?php endif; ?>
</div>

<?php require '../template/partials/_bottom.tpl.php'; ?>

