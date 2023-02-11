
<?php
for ($i = 0; $i < 2; $i++) {?>
    <div class="input-group mb-3">
    <div class="input-group-text">
        <input class="form-check-input mt-0" type="radio" name="final_choice" value="<?php echo($hotelSet[$i]['name'])?>">
    </div>
    <input type="text" class="form-control" readonly disabled value="<?php echo($hotelSet[$i]['name'])?>">
</div>
<?php } ?>