<form>

    <select>

        <?php foreach($device_types as $type): ?>

            <option value="<?=$type['id']?>"> <?=$type['name']?></option>

        <?php endforeach; ?>

    </select>


</form>
