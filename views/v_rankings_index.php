<h4>What is conflict Mineral Anyway?</h4>
<h4>Did you know that the war in Eastern Congo is the deadliest war since World War 2, and in modern history,
with an estimated 5.4M death toll? source:<a href="http://en.wikipedia.org/wiki/List_of_wars_and_anthropogenic_disasters_by_death_toll#cite_note-23"> here </a></h4>
Despite uncovered media attention on such a magnitude conflict, since it is disguised as a civil war,
We at CMBuzz urge you to pose yourself some logical questions.
1)What makes it a civil war, if the conflict involves 9 different African nations, within the same region?

Take a close look at Congo's mineral resources map showing a concentration of resources in Eastern Congo, now I think
you are connecting the dot. Isn't that intriguing that the region that is the most terrorized by rapes and other violents abuses
is the same region that has all of the Coltan, as we call it? All they have to do is to instill terror, people leave and now they
can smuggle these minerals without being watched. The problem is - they are being resold to you.
<pre>


  At CMBUZZ, we developed a friendly CM-free tool below to give you an insight on what actions companies are (or are not)
  taking to contribute to the creation of a clean minerals trade in Congo, and ultimately, the reduction of
  conflict there.

  All the rankings and company scores have been determined by The Enough Project, on their efforts toward using and investing in conflict-free minerals in their products.

  Find out more by visiting the Enough Project <a href="http://raisehopeforcongo.org/content/conflict-minerals-company-rankings"> Electronics Company Rankings</a>

 </pre>

  <h4> Are you supporting the conflict Mineral War in Eastern Congo?</h4>
  <h4>Find out now by enter information about a device you own, in the form below.Select a type,
      model and make for your device to find out if your device could potentially be part of the problem.
      Use your consumer power to make more responsible purchasing decisions.</h4>

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


        <div id='company_score'></div>
        <div id ='result'> </div>


    </form>

       <div id ='number_of_devices_owned'></div>


</div>


