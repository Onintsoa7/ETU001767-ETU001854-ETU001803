
  <?php for($i = 0; $i < count($history); $i++){ 
    ?> 
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Objet</th>
      <th>Propriétaire</th>   
      <th>Date de possession</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($history[$i] as $hist){
        foreach($hist as $hi){ ?>
    <tr>
    <td>
        <p class="fw-normal mb-1"><?php echo $hi['objet']; ?></p>
      </td>
      <td>
        <p class="text-muted mb-0"><?php echo $hi['proprio']; ?></p>
      </td>
      <td>
        <p class="text-muted mb-0"><?php echo $hi['temp']; ?></p>
      </td>
    </tr>
    <?php } }?>
  </tbody> 
</table>
  <?php } ?>

<!-- 1 le anna le connecte ato am proposition de le 2 le an le mandefa demande!-->