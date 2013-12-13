
<pre>
Are you supporting Conflict Mineral War? Find out now.

Enter information about a device you own, in the form below.
Select a device type, model and make for your device to find out if your device could potentially be
part of the conflict Mineral war.

</pre>

<div id='about_your_device'>

    <form>

     <div id="cm-tool>"<h3>Device Conflict Minerals tool</h3></div>
    <p>Select A device type you own: </p>
    <br>

    <select id='device_id' name ="id">

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
    <select id ='company_id' name="company_name_id">

        <?php foreach($company_names as $name): ?>

            <option value="<?=$name['company_id']?>"> <?=$name['company_name']?></option>

        <?php endforeach; ?>


    </select>

    <input type='button' id="score" value='score'>

    <div id ='result'> </div>


    </form>
</div>


