<div class="container">
    <h2>Selectione um contrato para aceite:</h2>
    <div class="list-group">
        <?php foreach ($listContratos as $item): ?>
        <a class="list-group-item" href="?contrato=<?php echo $item->getId(); ?>">Contrato <?php echo $item->getNome(); ?></a>
        <?php endforeach; ?>
    </div>
</div>