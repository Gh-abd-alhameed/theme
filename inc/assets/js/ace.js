// ace editor 
let textarea = document.getElementById("maxart_register_custom_css");
var editor = ace.edit("editor");
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/css");
let form = document.getElementById('form-css');

form.onsubmit = ()=>{
    textarea.innerHTML = editor.getSession.getValue();
}




