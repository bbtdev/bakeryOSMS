<?php
  echo '<h2>Adauga/Schimba program</h2>';
?>
<div>
  <form action="?" method = "post">
    <h3><b>Astazi: </b></h3>
    <label for="select-user-selgros-iasi">Selgros Iasi<select name="user-selgros-iasi" id="select-user-selgros-iasi">
      <?php
        $user_scheduled = getUserByLocatieProgramatiData('Selgros_Iasi', 'astazi');
        $useri = getUseriByLocatie('Selgros_Iasi');
        if (is_null($user_scheduled)) {
          echo '<option value = "nespecificat" selected>nespecificat</option>';
          foreach ($useri as $user) {
            echo "<option value = '$user'>$user</option>";
          }
        }
        else {
          echo '<option value = "nespecificat" selected>nespecificat</option>';
          foreach ($useri as $user) {
            $html = '';
            $html = "<option value = '$user'";
            if ($user == $user_scheduled) {
              $html .= ' selected';
            }
            $html .= ">$user</option>";
            echo $html;
          }
        }
      ?>
    </select></label>
    <label for="select-user-tudor-neculai">Laborator Tudor Neculai<select name="user-tudor-neculai" id="select-user-tudor-neculai">
      <?php
        $user_scheduled = getUserByLocatieProgramatiData('Laborator_Tudor_Neculai', 'astazi');
        $useri = getUseriByLocatie('Laborator_Tudor_Neculai');
        if (is_null($user_scheduled)) {
          echo '<option value = "nespecificat" selected>nespecificat</option>';
          foreach ($useri as $user) {
            echo "<option value = '$user'>$user</option>";
          }
        }
        else {
          echo '<option value = "nespecificat" selected>nespecificat</option>';
          foreach ($useri as $user) {
            $html = '';
            $html = "<option value = '$user'";
            if ($user == $user_scheduled) {
              $html .= ' selected';
            }
            $html .= ">$user</option>";
            echo $html;
          }
        }
      ?>
    </select></label>
    <input type="hidden" name = "data" value = "astazi">
    <input type="submit" name = "addprogramUseri" value = "Adauga">
  </form>
</div>
<div>
  <form action="?" method = "post">
    <h3><b>Maine: </b></h3>
    <label for="select-user-selgros-iasi">Selgros Iasi<select name="user-selgros-iasi" id="select-user-selgros-iasi">
      <?php
        $user_scheduled = getUserByLocatieProgramatiData('Selgros_Iasi', 'maine');
        $useri = getUseriByLocatie('Selgros_Iasi');
        if (is_null($user_scheduled)) {
          echo '<option value = "nespecificat" selected>nespecificat</option>';
          foreach ($useri as $user) {
            echo "<option value = '$user'>$user</option>";
          }
        }
        else {
          echo '<option value = "nespecificat" selected>nespecificat</option>';
          foreach ($useri as $user) {
            $html = '';
            $html = "<option value = '$user'";
            if ($user == $user_scheduled) {
              $html .= ' selected';
            }
            $html .= ">$user</option>";
            echo $html;
          }
        }
      ?>
    </select></label>
    <label for="select-user-tudor-neculai">Laborator Tudor Neculai<select name="user-tudor-neculai" id="select-user-tudor-neculai">
      <?php
        $user_scheduled = getUserByLocatieProgramatiData('Laborator_Tudor_Neculai', 'maine');
        $useri = getUseriByLocatie('Laborator_Tudor_Neculai');
        if (is_null($user_scheduled)) {
          echo '<option value = "nespecificat" selected>nespecificat</option>';
          foreach ($useri as $user) {
            echo "<option value = '$user'>$user</option>";
          }
        }
        else {
          echo '<option value = "nespecificat" selected>nespecificat</option>';
          foreach ($useri as $user) {
            $html = '';
            $html = "<option value = '$user'";
            if ($user == $user_scheduled) {
              $html .= ' selected';
            }
            $html .= ">$user</option>";
            echo $html;
          }
        }
      ?>
    </select></label>
    <input type="hidden" name = "data" value = "maine">
    <input type="submit" name = "addprogramUseri" value = "Adauga">
  </form>
</div>

<?php
  $programari_useri = getAllFromTableOrder('user_program','data DESC');
  echo '<h2>Istoric program</h2>';
  foreach ($programari_useri as $programare_user) {
    echo '<p>' . $programare_user['data'] . ': Selgros Iasi (' . $programare_user['Selgros_Iasi'] . '), Laborator_Tudor_Neculai (' . $programare_user['Laborator_Tudor_Neculai'] . ')</p>';
  }
?>