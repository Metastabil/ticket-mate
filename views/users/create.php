<form action="<?= base_url('create-user') ?>" method="post" class="default-form">
    <div class="input-wrapper">
        <label for="first-name">
            <?= esc(LANG['users']['attributes']['first_name']) ?>
            <span class="required">*</span>
        </label>

        <input type="text" name="first-name" id="first-name" placeholder="<?= esc(LANG['users']['attributes']['first_name']) ?>" required />
    </div>

    <div class="input-wrapper">
        <label for="last-name">
            <?= esc(LANG['users']['attributes']['last_name']) ?>
            <span class="required">*</span>
        </label>

        <input type="text" name="last-name" id="last-name" placeholder="<?= esc(LANG['users']['attributes']['last_name']) ?>" required />
    </div>

    <div class="input-wrapper">
        <label for="email">
            <?= esc(LANG['users']['attributes']['email']) ?>
            <span class="required">*</span>
        </label>

        <input type="email" name="email" id="email" placeholder="<?= esc(LANG['users']['attributes']['email']) ?>" required />
    </div>

    <div class="input-wrapper">
        <label for="password">
            <?= esc(LANG['users']['attributes']['password']) ?>
            <span class="required">*</span>
        </label>

        <input type="password" name="password" id="password" placeholder="<?= esc(LANG['users']['attributes']['password']) ?>" required />
    </div>

    <div class="input-wrapper">
        <label for="phone">
            <?= esc(LANG['users']['attributes']['phone']) ?>
        </label>

        <input type="tel" name="phone" id="phone" placeholder="<?= esc(LANG['users']['attributes']['phone']) ?>" />
    </div>

    <div class="input-wrapper">
        <label for="mobile">
            <?= esc(LANG['users']['attributes']['mobile']) ?>
        </label>

        <input type="tel" name="mobile" id="mobile" placeholder="<?= esc(LANG['users']['attributes']['mobile']) ?>" />
    </div>

    <div class="input-wrapper">
        <label for="administrator">
            <?= esc(LANG['users']['attributes']['administrator']) ?>
        </label>

        <select name="administrator" id="administrator">
            <option value="0"><?= esc(LANG['general']['no']) ?></option>
            <option value="1"><?= esc(LANG['general']['yes']) ?></option>
        </select>
    </div>

    <div class="input-wrapper">
        <button type="submit" title="<?= esc(LANG['actions']['save']) ?>" class="btn btn-blue">
            <?= esc(LANG['actions']['save']) ?>
        </button>

        <a href="<?= base_url('users') ?>" title="<?= LANG['actions']['cancel'] ?>" class="btn btn-red">
            <?= LANG['actions']['cancel'] ?>
        </a>
    </div>
</form>