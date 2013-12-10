<form>


    <p>Select A device type you own: </p>
    <br>

    <select id='type_id' name ="type_id">

        <?php foreach($device_types as $type): ?>

            <option value="<?=$type['id']?>"> <?=$type['name']?></option>

        <?php endforeach; ?>

    </select>



    <p>Select the manufacturer for your device: </p>
    <br>
    <select id ='company_id' name="company_id">

        <?php foreach($company_names as $name): ?>

            <option value="<?=$name['company_id']?>"> <?=$name['company_name']?></option>

        <?php endforeach; ?>


    </select>

    <input type='button' id="score" value='score'>

    <div id ='result'> </div>


</form>
