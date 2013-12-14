
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
    <br>

    <select id='device_type' name ='id'>

        <?php foreach($device_types as $type): ?>

            <option value="<?=$type['id']?>"> <?=$type['name']?></option>

        <?php endforeach; ?>

    </select>

    <p>Select A device model you own: </p>
    <br>

    <select id='device_model' name ="model">

        <?php foreach($device_model as $device): ?>

            <option value="<?=$device['id']?>"> <?=$device['model']?></option>

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
</div>


