<div>
Имя:
<input type="textbox"><hr>
Почта:
<input type="textbox"><hr>
Сообщение:
<input type="textbox">
<br>
<button onclick="">Отправить</button>
<hr>
<div>
Принятые сообщения:
<?php foreach($param as $item){ ?>
<div> <?=$item["name"]; ?></div>
<div> <?=$item["mail"]; ?></div>
<div> <?=$item["message"]; ?></div>
<?php }?>
</div>

