
<p>
Are you supporting the conflict Mineral War in Eastern Congo?
Find out now by enter information about a device you own, in the form below.
<br>
Select a type, model and make for your device to find out
if your device could potentially be part of the problem.

</p>

<div class='about_your_device'>

    <form>

        <div id="cm_tool">Device Conflict Minerals tool </div>
    <p>Select A device type you own: </p>

    <select id='device_type' name ='id'>
        <option value ="" > Select a device </option>

        <?php foreach($device_types as $type): ?>

            <option value="<?=$type['id']?>"> <?=$type['name']?></option>

        <?php endforeach; ?>

    </select>


    <p>Select the manufacturer for your device: </p>
    <select id ='company_id' name="company_id">

        <?php foreach($company_names as $name): ?>

            <option value="<?=$name['company_id']?>"> <?=$name['company_name']?></option>

        <?php endforeach; ?>


    </select>

    <input type='button' id="score" value='Add Device'>

    <div id ='result'> </div>


    </form>
</div>


