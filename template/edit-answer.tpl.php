<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container">
    <form action="" method="POST">
        <label>Intitulé de la réponse</label>
        <input type="text" name="title" value="<?= htmlspecialchars($answer->getTitle()) ?>" required/>
        <input type="submit" name="submit" value="Enregistrer" />

        <select name="id_qcm">
            <?php foreach($questions as $question): ?>
                <option value="<?= $question->getId() ?>" <?php if($answer->getIdQuestion() == $question->getId()): ?>selected<?php endif; ?> >
                    <?= $question->getTitle() ?>
                </option>
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