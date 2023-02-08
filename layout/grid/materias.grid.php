
<?php
foreach ($listDisciplinas as $list):
    foreach ($list as $d):
        ?>
        <tr>
            <td class="tl"><?php echo $d->getMateria(); ?></td>
            <td class="tc"><?php echo $d->getSerie(); ?></td>
            <td class="tc"><?php echo $d->getPeriodo(); ?></td>
            <td class="tc"><?php echo $d->getCargahoraria(); ?></td>
            <td class="tc"><?php echo $d->getNota(); ?></td>
            <td class="tc"><?php echo $d->getDescricao(); ?></td>
        </tr>
    <?php endforeach; ?>
<?php endforeach; ?>
