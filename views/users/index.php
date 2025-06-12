<?php
/**
 * @var array $elements
 */
?>

<a href="<?= base_url('create-user') ?>" title="<?= esc(LANG['actions']['create']) ?>" class="btn btn-blue">
    <?= esc(LANG['actions']['create']) ?>
</a>

<table class="default-table">
    <thead>
        <tr>
            <th scope="col"><?= esc(LANG['users']['attributes']['first_name']) ?></th>
            <th scope="col"><?= esc(LANG['users']['attributes']['last_name']) ?></th>
            <th scope="col"><?= esc(LANG['users']['attributes']['email']) ?></th>
            <th scope="col"><?= esc(LANG['users']['attributes']['administrator']) ?></th>
            <th scope="col"><?= esc(LANG['users']['attributes']['created']) ?></th>
            <th scope="col"><?= esc(LANG['users']['attributes']['updated']) ?></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($elements as $e) : ?>
            <tr>
                <td><?= esc($e['first_name']) ?></td>
                <td><?= esc($e['last_name']) ?></td>
                <td><?= esc($e['email']) ?></td>
                <td><?= $e['administrator'] ? esc(LANG['general']['yes']) : esc(LANG['general']['no']) ?></td>
                <td><?= format_timestamp($e['created']) ?></td>
                <td><?= format_timestamp($e['updated']) ?></td>
                <td class="table-actions"></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    $(() => {
        $('.default-table').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.5/i18n/de-DE.json'
            },
            lengthChange: false,
            pageLength: 10,
            info: false
        });
    });
</script>