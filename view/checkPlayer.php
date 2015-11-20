<?php if ($getType == "Server" AND $ctr == $numOfPlayers) { ?>
<a href="#!" class="btn green accent-5">Start</a>
<input type="hidden" name="room_id" value="<?= $get_Room->getRoom_id(); ?>" id="room_id">
<a href="#!" class="animsition-link waves-effect waves-light  btn green accent-5" data-animsition-out="fade-out" data-animsition-out-duration="200" id="Start" >Start</a>

<?php } elseif ($getType == "Client" AND $ctr == $numOfPlayers) { ?>
    <input type="hidden" name="room_id" value="<?= $get_Room->getRoom_id();  ?>" id="room_id">
    
    <a href=".?room_id=<?= $get_Room->getRoom_id(); ?>&rid=<?= $get_Room->getRid(); ?>&action=brain_StartGame"
        class="animsition-link waves-effect waves-light  btn green accent-5"
        data-animsition-out="fade-out"
        data-animsition-out-duration="200" id="Start_user" style="display:none;">Start</a>
<?php } ?>