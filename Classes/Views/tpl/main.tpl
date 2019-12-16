<div>
Имя:
<input type="textbox" id="name"><hr>
Почта:
<input type="textbox" id="mail"><hr>
Сообщение:
<input type="textbox" id="message">
<br>
<button onclick="sendMessage()">Отправить</button>
<hr>
</div>
<div>
Принятые сообщения:
</div>
<div id="messageslist">
</div>

<script>
    refresh();
    function sendMessage()
    {
        let info = {
                name: document.getElementById('name').value,
                mail: document.getElementById('mail').value,
                message: document.getElementById('message').value
            };
        let json = JSON.stringify(info);
        alert (json);

        fetch('/Main/sendMessage/', {
            method: 'POST',
            headers: {'Content-Type': 'application/json;charset=utf-8'},
            body: json
            }).then(response => response.json())
            .then(function(result){
        let jo = result;
        if(jo['status'] != 'ok'){
        alert(jo['e_m']);
        }
        if(jo['status'] == 'ok'){
        document.getElementById('name').value = '';
        document.getElementById('mail').value = '';
        document.getElementById('message').value = '';
        refresh();
        }
        });
}
    function refresh()
    {
        document.getElementById('messageslist').html = '';
        fetch('/Main/getMessage', {
            method: 'POST',
            headers: {'Content-Type': 'application/json;charset=utf-8'}
            }).then(response => response.json())
            .then(result =>
            {
              result.forEach(element=>
                {
                    let html = '';
                    html += '<div style="margin:15"><div>'+element['name']+'</div>';
                    html += '<div>'+element['mail']+'</div>';
                    html += '<div>'+element['message']+'</div></div>';
         
                    document.getElementById('messageslist').innerHTML += html;
         }
              )  
            });
    }
</script>
