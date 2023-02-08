<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>idUser</th>
      <th>Objet de rechange</th>   
      <th>Date</th>
      <th>Details</th>
    </tr>
  </thead>
  <tbody>
  <?php for($i = 0; $i < count($objet); $i++){ ?> 
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="https://mdbootstrap.com/img/new/avatars/8.jpg"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1"><?php echo $objet[$i]['nomUser']; ?></p>
            <p class="text-muted mb-0"><?php echo $objet[$i]['email']; ?></p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1"><?php echo $objet[$i]['nomObjet']; ?></p>
      </td>
      <td>
        <p class="text-muted mb-0"><?php echo $objet[$i]['dateEchange']; ?></p>
      </td>
      <td>
      <form action="proposition_con/details" method="get">
        <input type="hidden" value="<?php echo $objet[$i]['idEchange']; ?>"  name="idEchange" id="idEchange">
        <input type="submit" value="Details">
    </form>
  </td>
    </tr>
  <?php } ?>
  </tbody> 
</table>

<!-- 1 le anna le connecte ato am proposition de le 2 le an le mandefa demande!-->